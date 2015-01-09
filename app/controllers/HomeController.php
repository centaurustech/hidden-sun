<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHomepage()
	{
		// get some random project to display on the homepage
		$random_project = Project::random(1)->get();
		return View::make('index')->with('random_project', $random_project);
	}
	
	public function showLogin()
	{
		/*$email = Input::get('email');
		$password = Input::get('password');
		
		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    		return Redirect::intended('/');
		} else {
    		Session::flash('errorMessage', 'Failed to authenticate.');
    		
    		return Redirect::back();
		}
		*/
		return View::make('auth.login');
	}
	
	public function showSignupPage()
	{
		return View::make('signup');
	}
	
	
	public function showInstructions(){
		return View::make('howitworks');
	}
	
	public function showAdmin(){
		return View::make('aboutus');
	}
}
