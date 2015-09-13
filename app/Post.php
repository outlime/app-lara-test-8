<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
		'picture',
		'caption',
	];

	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	return $this->belongsToMany('App\User', 'likes', 'post_id', 'user_id')->withTimestamps();
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function isLiked($user)
    {
    	$likes = $user->likes;

    	foreach($likes as $like) {
    		if ($this->id == $like->id) {
    			return true;
    		}
    	}
    	return false;
    }
}
