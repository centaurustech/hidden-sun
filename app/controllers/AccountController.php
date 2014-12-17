<?php
class AccountController extends BaseController {

	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {

			$email = Input::get('email');
			$password = Input::get('password');
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');
			$city = Input::get('city');
			$state = Input::get('state');

			// Activation Code
			$activation_code = str_random(60);

			$create = User::create(array(
				'email' => $email,
				'password' => Hash::make($password),
				'first_name' => $first_name,
				'last_name' => $last_name,
				'city' => $city,
				'state' => $state,
				'activation_code' => $activation_code,
				'active' => 0
			));

			if($create) {
				return Redirect::route('home')->with('global', 'Your account has been created! We have sent you an email to activate your account.');
			}
		}
	}
}