<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        return view('user.dashboard');
    }

    public function showProfile($username)
    {
        // Isn't this stupid?
    	if (Auth::check()) {
    		// Return a profile page with settings and stuff
    	} else {
    		// Return a public profile view
    	}
    }

}
