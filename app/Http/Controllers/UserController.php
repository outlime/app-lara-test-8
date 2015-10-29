<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request; // use Illuminate\Database\Eloquent\ModelNotFoundException;

use File;
use Session;
use Input;
use Auth;
use App\User;
use App\Post;

class UserController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        $posts = Post::latest('created_at')->get();
        $posts = $posts->filter(function($post)
        {
            return Auth::user()->isFollowing($post->user);
        });

        return view('user.dashboard', compact('posts'));
    }

    public function showProfile($username)
    {
        // Remember to add public profile
        // This profile can only be seen by an authenticated user
        $currentUser = Auth::user();
        $user = User::where('username', '=', $username)->first();
        
        if ($user === null) {
           abort(404);
        }

        if (Auth::user()->isFollowing($user)) {
            $isFollowing = true;
        } else {
            $isFollowing = false;
        }

        return  view('user.profile', compact('user', 'currentUser', 'isFollowing'));
    }

    public function editProfilePic($username)
    {
        $user = User::where('username', '=', $username)->first();

        if ($user === null || Auth::user()->username != $username) {
           abort(404);
        }

        if ($user->profile_pic != 'default-placeholder.png') {
            File::delete('uploads/userprofile/' . $user->profile_pic);
        }

        $extension = Input::file('picture')->getClientOriginalExtension();
        $filename = sha1(time()) . '.' . $extension;

        $user->profile_pic = $filename;
        $user->save();
 
        Input::file('picture')->move('uploads/userprofile', $filename);

        Session::flash('flash_success', 'Your profile picture has been updated!');
        return redirect($username);
    }

    public function search()
    {
        $query = \Input::get('query');

        $results = User::where('username', 'LIKE', '%'.$query.'%')->orWhere('name', 'LIKE', '%'.$query.'%')->get();

        return view('user.search', compact('results', 'query'));
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function logout()
    {
        return redirect('auth/logout');
    }
}
