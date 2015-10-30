<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Comment extends Model {

	protected $fillable = [
		'comment',
	];

	// Return the author(user) of this comment
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Date of publication
    public function datePublished()
    {
        return Carbon::parse($this->created_at)->toDayDateTimeString();
    }

    // Time difference from date of publication
    public function datePublishedDiff()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
