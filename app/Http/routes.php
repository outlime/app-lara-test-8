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

Route::get('/', 'UserController@showDashboard');
Route::get('dashboard', 'UserController@showDashboard');

Route::get('login', 'Auth\AuthController@login');
Route::get('register', 'Auth\AuthController@register');

Route::get('logout', 'UserController@logout');
Route::get('settings', 'UserController@settings');


Route::post('search', 'UserController@search');
Route::post('newpost', 'PostController@createPost');

Route::post('changeprofile', 'UserController@changeProfile');
Route::post('changepassword', 'UserController@changePassword');
Route::post('changeprofilepic', 'UserController@changeProfilePic');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// OAuth Services
Route::get('oauth/{service}', 'AccountController@serviceRedirect');
Route::get('oauth/{service}/callback', 'AccountController@serviceCallback');

// User Actions
Route::get('{username}', 'UserController@showProfile');

Route::get('{username}/posts/{id}', 'PostController@showPost');
Route::get('{username}/posts/{id}/remove', 'PostController@removePost');

Route::get('{username}/follow', 'FollowController@follow');
Route::get('{username}/unfollow', 'FollowController@unfollow');

Route::get('{username}/posts/{id}/like', 'PostController@likePost');
Route::get('{username}/posts/{id}/unlike', 'PostController@unlikePost');

Route::post('{username}/posts/{id}/comment', 'PostController@commentPost');
Route::get ('{username}/posts/{pid}/uncomment/{cid}', 'PostController@uncommentPost');