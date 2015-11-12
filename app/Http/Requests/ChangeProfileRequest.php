<?php namespace Pastiche\Http\Requests;

use Pastiche\Http\Requests\Request;

use Pastiche\User;
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

		// This might be extremely stupid
		if ($user->isOauth()) {
			return [
				'bio' => 'max:32',
				'website' => 'url|max:32'
			];
		} else {
			return [
				'name' => 'required|min:3|max:64|alpha_spaces',
				'email' => 'required|email|max:255|unique:users,email,' . $user->id,
				'bio' => 'max:32',
				'website' => 'url|max:32'
			];
		}
		

		// Username changes not yet allowed due to unpredictable behavior.
		// 'username' => 'required|,
	}

}
