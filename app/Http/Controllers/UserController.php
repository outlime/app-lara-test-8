<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request; // use Illuminate\Database\Eloquent\ModelNotFoundException;

use Auth;
use App\User;

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

        $posts = $user->posts()->get();

        return  view('user.profile', compact('user', 'currentUser', 'isFollowing', 'posts'));
    }

    public function search()
    {
        $query = \Input::get('query');

        $results = User::where('username', 'LIKE', '%'.$query.'%')->orWhere('name', 'LIKE', '%'.$query.'%')->get();

        return view('user.search', compact('results', 'query'));
    }

    public function logout()
    {
        return redirect('auth/logout');
    }
}
