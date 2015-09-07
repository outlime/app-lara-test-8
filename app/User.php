<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // This function allows us to get a list of users following us
	public function followers()
	{
	    return $this->belongsToMany('App\User', 'followers', 'follow_id', 'user_id')->withTimestamps();
	}

	// Get all users we are following
	public function following()
	{
	    return $this->belongsToMany('App\User', 'followers', 'user_id', 'follow_id')->withTimestamps();
	}

	// Check if I am following this user
	public function isFollowing($user)
	{
		$myFollowing = $this->following;
		foreach ($myFollowing as $followedUser) {
			if ($followedUser->id == $user->id) {
				return true;
			}
		}
		return false;
	}
}
