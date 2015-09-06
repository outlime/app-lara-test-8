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

Route::get('/', 'UserController@showDashboard');

Route::get('login', 'Auth\AuthController@login');

Route::get('register', 'Auth\AuthController@register');

Route::get('logout', 'Auth\AuthController@logout');

Route::get('dashboard', 'UserController@showDashboard');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// Keep stuff with wildcards on the bottom
// Route::get('{username}', 'UserController@showProfile');