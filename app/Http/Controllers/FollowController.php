<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use Auth;

class FollowController extends Controller {

	public function follow($username)
	{
		$user = User::where('username', '=', $username)->first();

		if ($user == null) {
			abort(404);
		} else {
			Auth::user()->following()->save($user); // Save could be similar to attach. Check later.
			return redirect('dashboard');
		}
	}

	public function unfollow($username)
	{
		$user = User::where('username', '=', $username)->first();

		if ($user == null) {
			abort(404);
		} else {
			Auth::user()->following()->detach($user);
			return redirect('dashboard');
		}
	}
}
