<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use Auth;

class FollowController extends Controller {

	public function follow($id)
	{
		// Fix stuff
		$user = User::find($id);
		Auth::user()->following()->save($user);
		return redirect('dashboard');
	}

	public function unfollow($id)
	{
		$user = User::find($id);
		Auth::user()->following()->detach($user);
		return redirect('dashboard');
	}

}
