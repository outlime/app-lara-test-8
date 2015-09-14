<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');

// Like/Unlike and Follow/Unfollow should probably be post.
// Modify later.

// Remeber to move some stuff to post controller.
// A similar comment has been made to UserController.

Route::get('/', 'UserController@showDashboard');

Route::get('login', 'Auth\AuthController@login');
Route::get('register', 'Auth\AuthController@register');

Route::get('dashboard', 'UserController@showDashboard');
Route::get('newpost', 'UserController@showDashboard'); // What's this for?

Route::post('newpost', 'PostController@createPost');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// Keep stuff with wildcards on the bottom
Route::get('{username}', 'UserController@showProfile');

Route::get('{username}/posts/{id}', 'PostController@showPost');
Route::get('{username}/posts/{id}/remove', 'PostController@showPost'); // ** NOT YET DONE

Route::get('{username}/follow', 'FollowController@follow');
Route::get('{username}/unfollow', 'FollowController@unfollow');

Route::get('{username}/posts/{id}/like', 'PostController@likePost');
Route::get('{username}/posts/{id}/unlike', 'PostController@unlikePost');

Route::post('{username}/posts/{id}/comment', 'PostController@commentPost');
Route::post('{username}/posts/{id}/uncomment', 'PostController@uncommentPost'); // ** NOT YET DONE