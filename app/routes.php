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

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@showHomepage'
));

Route::get('projects/discover', array(
	'as' => 'projects-discover',
	'uses' => 'ProjectsController@index'
));

//Route::get('projects/create', 'ProjectsController@createProject');
//Route::get('login', 'HomeController@showLogin');

//Route::resource('projects', 'ProjectsController');

// if we were doing restful routing...
//Route::resource('account', 'AccountController');

Route::get('/user/{user_id}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

// Routes for authenticated users
Route::group(array('before' => 'auth'), function() {

	// Sign out (GET)
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignout'
	));

	// Change password (GET)
	Route::get('account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	// CSRF Protected group within authenticated users
	Route::group(array('before' => 'csrf'), function(){
			// Change password (GET)
		Route::post('account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));
	});
});

// Routes for unauthenticated users
Route::group(array('before' => 'guest'), function(){

	// CSRF protection
	Route::group(array('before' => 'csrf'), function(){
		// Create account (POST)
		Route::post('/account/create', array(	
				'as' 	=> 'account-create-post',
				'uses' 	=> 'AccountController@postCreate'
		));

		// Sign-in (POST)
		Route::post('/account/sign-in', array(
			'as' 	=> 'account-sign-in-post',
			'uses' 	=> 'AccountController@postSignin'
		));
	});

	// Sign-in (GET)
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignin'
	));


	// Create account (GET)
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{activation_code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));
});