<?php
class AccountController extends BaseController {

	public function getSignin(){
		return View::make('account.signin');
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function postSignin(){

		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-sign-in')->withErrors($validator)->withInput();
		} else {

			$remember = (Input::has('remember')) ? true : false;
			//attempt user sign in
			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1
			), $remember);

			if($auth){
				//redirect to the intended page
				return Redirect::intended('/');
			} else {
				return Redirect::route('account-sign-in')->with('global', 'Please check your email and password and try again. Have you activated your account?');
			}
		}
		return Redirect::route('account-sign-in')->with('global', 'There was a problem signing into your account. Have you activated your account?');
	}

	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules_signup);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {

			$email = Input::get('email');
			$password = Input::get('password');
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');

			// Activation Code
			$activation_code = str_random(60);

			$user = User::create(array(
				'email' => $email,
				'password' => Hash::make($password),
				'first_name' => $first_name,
				'last_name' => $last_name,
				'city' => $city,
				'state' => $state,
				'activation_code' => $activation_code,
				'active' => 0
			));

			if($user) {

				// Send activation email -> problems here
				Mail::send('emails.auth.newaccount', array('link' => URL::route('account-activate', $activation_code), 'email' => $email), function($message) use ($user) {
					$message->to($user->email)->subject('Activate Your Account');
				});

				return Redirect::route('home')->with('global', 'Your account has been created! We have sent you an email to activate your account.');
			}
		}
	}

	public function getActivate($activation_code) {
		$user = User::where('activation_code', '=', $activation_code)->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first();

			//Update user to active state
			$user->active 			= 1;
			$user->activation_code 	= '';

			if($user->save()) {
				return Redirect::route('home')->with('global', 'You have successfully activated your account!');
			}
		} else {
			return Redirect::route('home')->with('global', 'Oops! Somehthing went wrong when activation your account. Please try again.');
		}
	}

	public function getChangePassword() {
		return View::make('account.password');
	}

	public function postChangePassword() {
		$validator = Validator::make(Input::all(), array(
			'old_password' => 'required',
			'new_password' => 'required|min:6|max:100',
			'new_password_again' => 'required|same:new_password'
		));

		if($validator->fails()){
			return Redirect::route('account-change-password')->withErrors($validator);
		} else {

			$user = User::find(Auth::user()->id);

			$old_password = Input::get('old_password');
			$new_password = Input::get('new_password');

			if(Hash::check($old_password, $user->getAuthPassword())){
				$user->password = Hash::make($new_password);

				if($user->save()){
					return Redirect::route('home')->with('global', 'Your password has been changed successfully!');
				}
			} else {
				return Redirect::route('account-change-password')->with('global', 'Your old password is incorrect.');
			}

		}

		return Redirect::route('account-change-password')->with('global', 'Your password could not be changed.');
	}

	public function getForgotPassword(){
		return View::make('account.forgot');
	}

	public function postForgotPassword() {
		$validator = Validator::make(Input::get('email'), array(
			'email' => 'required|email'
		));

		if($validator->fails()) {
			return Redirect::route('account-forgot-password')->withErrors($validator)->withInput();
		} else {
			$user = User::where('email', '=', Input::get('email'));

			if($user->count()) {
				$user = $user->first();

				$code = str_random(60);
				$password = str_random(10);

				$user->code = $code;
				$user->password_temp = Hash::make($password);

				if($user->save()) {
					Mail::send('emails.auth.forgot', array(
						'link' => URL::route('account-recover', $code), 
						'email' => $user->email, 
						'password' => $password, 
						function($message) use ($user) {
							$message->to($user->email, $user->email)->subject('Your new password');
						}));

					return Redirect::route('home')->with('global', 'We have sent you a new password by email.');
				}
			}
		}
		return Redirect::route('account-forgot-password')->with('global', 'Could not request new password.');
	}

	public function getRecover($code) {
		$user = User::where('code', '=', $code)->where('password_temp', '!=', '');

		if($user->count()){
			$user = $user->first();

			$user->password = $user->password_temp;
			$user->password_temp = '';
			$user->code = '';

			if($user->save()){
				return Redirect::route('home')->with('global', 'Your account has been recovered and you can sign in with your new password');
			}
		}
		return Redirect::route('home')->with('global', 'Could not recover your account');
	}

	// Method to update personal account information
	public function updatePersonalInformation($id){
		$user_to_update = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules_update_personal_info);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} 
		else {

			$user_to_update->first_name = Input::get('first_name');
			$user_to_update->last_name = Input::get('last_name');
			$user_to_update->phone_number = Input::get('phone_number');
			$user_to_update->city = Input::get('city');
			$user_to_update->state = Input::get('state');

			$user_to_update->save();

			return Redirect::route('manage-account');
		}
		//return Redirect::route('manage-account');
	}

	public function showManageAccount() {
		$current_user = Auth::user();
		return View::make('account.manage')->with('current_user', $current_user);
	}

	public function showEditPersonal() {
		$current_user = Auth::user();
		return View::make('account.edit-personal')->with('current_user', $current_user);
	}



}
