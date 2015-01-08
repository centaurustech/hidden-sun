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

		// Edit (update) Project (PUT)
		Route::put('projects/edit/{id}', array(
			'as' => 'project-edit-put',
			'uses' => 'ProjectsController@update'
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

		// Forgot Password (POST)
		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
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

	// payment/stripe routes (GET)
	Route::get('/projects/contribute/{id}', array(
		'as' => 'project-contribute',
		'uses' => 'ProjectsController@showContribute'
	));

	// Payment-stripe routes (POST)
	Route::post('pay', function(){
		// Use the config for the stripe secret key
		Stripe::setApiKey(Config::get('stripe.stripe.secret'));

		// Get the credit card details submitted by the form
		$token = Input::get('stripeToken');
		$amount = Input::get('amount');
		$amount = (integer) $amount * 100;

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
		    $charge = Stripe_Charge::create(array(
		      "amount" => $amount, // amount in cents
		      "currency" => "usd",
		      "card"  => $token,
		      "description" => 'Charge for my product')
		    );

		} catch(Stripe_CardError $e) {
		    $e_json = $e->getJsonBody();
		    $error = $e_json['error'];
		    // The card has been declined
		    // redirect back to checkout page
		    return Redirect::to('pay')
		        ->withInput()->with('stripe_errors',$error['message']);
		}
		// Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
		// Stripe charge was successfull, continue by redirecting to a page with a thank you message
		return Redirect::to('pay/success');
	});

});

Route::resource('projects', 'ProjectsController');

