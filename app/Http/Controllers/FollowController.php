<?php namespace Pastiche\Http\Controllers;

use Pastiche\Http\Requests;
use Pastiche\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Pastiche\User;
use Auth;
use Session;

class FollowController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function follow($username)
	{
		$user = User::where('username', '=', $username)->first();

		if ($user == null) {
			abort(404);
		} else {
			Auth::user()->following()->save($user);
			Session::flash('flash_success', 'Your are now following ' . $user->name);
			return redirect('/' . $username);
		}
	}

	public function unfollow($username)
	{
		$user = User::where('username', '=', $username)->first();

		if ($user == null) {
			abort(404);
		} else {
			Auth::user()->following()->detach($user);
			Session::flash('flash_success', 'Your are no longer following ' . $user->name);
			return redirect('/' . $username);
		}
	}
}
