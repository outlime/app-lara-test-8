<?php namespace Pastiche\Services;

use Pastiche\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		$reserved_words = 'login,register,logout,dashboard,cpanel,settings,images,auth,password';

		return Validator::make($data, [
			'name' => 'required|min:3|max:64|alpha_spaces',
			'username' => 'required|min:3|max:64|unique:users|alpha_num|not_in:' . $reserved_words,
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
