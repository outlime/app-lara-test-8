<?php namespace Pastiche\Http\Controllers;

use Pastiche\Http\Requests;
use Pastiche\Http\Controllers\Controller;

use Illuminate\Http\Request; // use Illuminate\Database\Eloquent\ModelNotFoundException;

use Pastiche\Http\Requests\ChangeProfileRequest;
use Pastiche\Http\Requests\ChangePasswordRequest;

use Hash;
use Validator;
use File;
use Session;
use Input;
use Auth;
use Pastiche\User;
use Pastiche\Post;

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

    public function changeProfilePic()
    {
        $user = Auth::user();

        if ($user->profile_pic != 'default-placeholder.png') {
            File::delete(storage_path() . '/app/images/user/' . $user->profile_pic);
        }

        $extension = Input::file('picture')->getClientOriginalExtension();
        $filename = sha1(time()) . '.' . $extension;

        $user->profile_pic = $filename;
        $user->save();
 
        Input::file('picture')->move(storage_path() . '/app/images/user/', $filename);

        Session::flash('flash_success', 'Your profile picture has been updated!');
        return redirect($user->username);
    }

    public function changeProfile(ChangeProfileRequest $request)
    {
        $user = Auth::user();

        $user->update($request->except('username'));

        Session::flash('flash_success', 'Your profile has been updated!');
        return redirect('settings');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        $request->all();

        if (!Hash::check(Input::get('oldpassword'), $user->password)) {
            return redirect('settings')->withErrors('The old password is incorrect.');
        } else {
            $user->update($request->only('password'));
        }

        Session::flash('flash_success', 'Your password has been updated!');
        return redirect('settings');
    }

    public function search()
    {
        $query = Input::get('query');

        $results = User::where('username', 'LIKE', '%'.$query.'%')->orWhere('name', 'LIKE', '%'.$query.'%')->get();

        return view('user.search', compact('results', 'query'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('user.settings', compact('user'));
    }

    public function logout()
    {
        return redirect('auth/logout');
    }
}
