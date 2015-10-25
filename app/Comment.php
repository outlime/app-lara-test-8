<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = [
		'comment',
	];

	// Return the author(user) of this comment
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
