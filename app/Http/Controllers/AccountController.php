<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AccountController extends Controller {

	public function redirectToProvider() {
		return Socialize::with('github')->redirect();
	}

	public function handleProviderCallback() {
		$user = Socialize::with('github')->user();
	}

}
