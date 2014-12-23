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

Route::get('projects/unfunded', 'ProjectsController@showUnfunded');

Route::get('/user/{user_id}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

Route::get('projects/sortbygenre/{id}', function($id){
	return "you made it" . $id;
});

// Routes for authenticated users
Route::group(array('before' => 'auth'), function() {

	// Sign out (GET)
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignout'
	));

	// Account settings page (GET)
	Route::get('/account/settings', array(
		'as' => 'manage-account',
		'uses' => 'AccountController@showManageAccount'
	));

	// Change password (GET)
	Route::get('account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	// edit personal information (GET)
	Route::get('account/update-personal', array(
		'as' => 'account-edit-personal',
		'uses' => 'AccountController@showEditPersonal'
	));

	// Create project (GET)
	Route::get('projects/create', array(
		'as' => 'projects-create',
		'uses' => 'ProjectsController@create'
	));

	// CSRF Protected group within authenticated users
	Route::group(array('before' => 'csrf'), function(){
		// Change password (POST)
		Route::post('account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));

		// Create Project (POST)
		Route::post('projects/create', array(
			'as' => 'projects-create-post',
			'uses' => 'ProjectsController@store'
		));

		// Edit personal information (PUT)
		Route::put('account/update-personal/{id}', array(
			'as' => 'account-edit-personal-put',
			'uses' => 'AccountController@updatePersonalInformation'
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

Route::resource('projects', 'ProjectsController');

