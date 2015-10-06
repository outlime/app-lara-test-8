<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use Socialize;
use Auth;
use App\User;

class AccountController extends Controller {

	public function serviceRedirect($service) {
		$services = array('github', 'facebook', 'google');

		if (!in_array($service, $services)) {
			abort(404);
		} else {
			return Socialize::with($service)->redirect();
		}
	}
	
	public function serviceCallback($service) {
		try {
			$services = array('github', 'facebook', 'google');

			if (!in_array($service, $services)) {
				abort(404);
			} else {
				$user = Socialize::with($service)->user();
	            // print_r($user); die; // Debug only

			}            
        } catch (Exception $e) {
            return Redirect::to('oauth/' . $service);
        }

        $authUser = $this->findOrCreateUser($service, $user);
        // print_r($authUser); die; // Debug only

        Auth::login($authUser, true);

        return Redirect::to('dashboard');
	}

	private function findOrCreateUser($service, $serviceUser)
    {
        if ($authUser = User::where('service_id', $serviceUser->id)->first()) {
            return $authUser;
        }

        // WARNING: No checking of repeated username/email yet.
        if ($service == 'github') { // For Github
        	return User::create([
	        	'username' => $serviceUser->nickname,
	            'name' => $serviceUser->name,
	            'email' => $serviceUser->email,
	            'service_id' => $serviceUser->id
	        ]);
        } else { // For Facebook and Google
        	return User::create([
	        	'username' => strtolower(str_replace(' ', '', $serviceUser->name)),
	            'name' => $serviceUser->name,
	            'email' => $serviceUser->email,
	            'service_id' => $serviceUser->id
	        ]);
        }
        
    }

}
