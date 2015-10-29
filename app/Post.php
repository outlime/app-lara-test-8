<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model {

	protected $fillable = [
		'picture',
		'caption',
	];

    // Return the author(user) of this post
	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Return all the likes of this post
    public function likes()
    {
    	return $this->belongsToMany('App\User', 'likes', 'post_id', 'user_id')->withTimestamps();
    }

    // Return all the comments of this post
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    // Date of publication
    public function datePublished()
    {
        return Carbon::parse($this->created_at)->toDayDateTimeString();
    }

    // Time differnce from date of publication
    public function datePublishedDiff()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    // Check whether a user likes this post
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
