<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\User;
use Auth;

class ChangeProfileRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$user = Auth::user();

		return [
			'name' => 'required|max:64|alpha_spaces',
			'email' => 'required|email|max:255|unique:users,email,' . $user->id,
			'bio' => 'max:32',
			'website' => 'url|max:32'
		];

		// Username changes not yet allowed due to unpredictable behavior.
		// 'username' => 'required|,
	}

}
