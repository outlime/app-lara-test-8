<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\PostRequest;
use App\Post;
use App\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        $myFollowers = Auth::user()->followers;
        $myFollowing = Auth::user()->following;
        return view('user.dashboard', compact('myFollowers', 'myFollowing'));
    }

    public function showProfile($username)
    {
        // Remember to add public profile
        // This profile can only be seen by an authenticated user
        // Add a username later, for now id is used
        $user = User::find($username);

        if ($user) {
            if (Auth::user()->isFollowing($user)) 
                $isFollowing = true;
            else 
                $isFollowing = false;
            return  view('user.profile', compact('user', 'isFollowing'));
        } else {
            abort(404);
        }
        
        
    }

    public function createPost(PostRequest $request)
    {
        $post = new Post($request->all());

        Auth::user()->posts()->save($post);

        return redirect('dashboard');
    }

}
