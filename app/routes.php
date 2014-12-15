<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/', 'HomeController@showHomepage');
Route::get('projects', 'ProjectsController@index');
Route::get('projects/create', 'ProjectsController@createProject');
Route::get('signup', 'HomeController@showSignupPage');
Route::get('login', 'HomeController@showLogin');

Route::resource('projects', 'ProjectsController');
Route::resource('users', 'UsersController');
