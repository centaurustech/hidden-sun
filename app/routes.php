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

Route::get('/donation-total/{id}', array(
	'as' => 'donation-total',
	'uses' => 'ProjectsController@showDonationTotal'
));

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@showHomepage'
));

Route::get('/howitworks', array(
	'as' => 'howto',
	'uses' => 'HomeController@showInstructions'	
));

Route::get('/aboutus', array(
	'as' => 'about',
	'uses' => 'HomeController@showAdmin'
));

Route::get('projects/discover', array(
	'as' => 'projects-discover',
	'uses' => 'ProjectsController@index'
));

Route::get('projects/show/{id}', array(
	'as' => 'project-show',
	'uses' => 'ProjectsController@show'
));

Route::get('projects/unfunded', 'ProjectsController@showUnfunded');

Route::get('/user/{id}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));
//make the stripe payment page
Route::post('/projects/donate/{id}', array(
	'as' => 'donation-create',
	'uses' => 'DonationsController@create'
));

// Payment-stripe routes (POST)
Route::post('/donate', array(
	'as' => 'donate',
	'uses' => 'DonationsController@donate'
));

// Routes for authenticated users
Route::group(array('before' => 'auth'), function() {

	// Sign out (GET)
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignout'
	));

		// Manage projects/My Projects page (GET)
		Route::get('/projects/my-projects', array(
			'as' => 'manage-projects',
			'uses' => 'ProjectsController@showMyProjects'
		));

	//Manage profile page
	Route::get('user/profile', array(
		'as' => 'profile', 
		'uses' => 'ProfileController@showProfile'
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

	// edit self projects (GET)
	Route::get('account/edit-project/{project_id}', array(
		'as' => 'project-edit',
		'uses' => 'ProjectsController@edit'
	));

	// end own project (GET)
	Route::get('account/end-project/{project_id}', array(
		'as' => 'project-end',
		'uses' => 'ProjectsController@endProject'
	));

	// Create project (GET)
	Route::get('/projects/create', array(
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

		// Edit (update) Project (PUT)
		Route::put('projects/edit/{project_id}', array(
			'as' => 'project-edit-put',
			'uses' => 'ProjectsController@update'
		));

		// Edit (update) Project Status (PUT)
		Route::post('projects/edit/status/{project_id}', array(
			'as' => 'project-edit-status-post',
			'uses' => 'ProjectsController@updateStatus'
		));

		// Edit personal information (PUT)
		Route::put('account/update-personal/{user_id}', array(
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

		// Forgot Password (POST)
		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));

		// Make Donation (POST)
		Route::post('projects/contribute/{id}', array(
			'as' => 'project-contribute-post',
			'uses' => 'ProjectsController@doDonation'
		));
	});

	// Forgot Password (GET)
	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));

	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));

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

//Route::resource('projects', 'ProjectsController');

