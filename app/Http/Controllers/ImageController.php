<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Image;
use App\User;

class ImageController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function showUserImage($size, $filename)
	{
		$image = Image::make(storage_path() . '\app\images\user\\' . $filename);

		if ($size == 'md') {
			$image->fit(200,200);
		} elseif ($size == 'sm') {
			$image->fit(50,50);
		} elseif ($size == 'xs') {
			$image->fit(30,30);
		} else {
			abort(404);
		}

		return $image->response();
	}

	public function showPostImage($size, $filename)
	{
		$image = Image::make(storage_path() . '\app\images\post\\' . $filename);

		if ($size == 'preview') {
			// Preview size
		} elseif ($size == 'full') {
			// Full size
		} else {
			abort(404);
		}

		return $image->response();
	}

}
