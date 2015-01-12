<?php

class ProfileController extends BaseController {

	public function showProfile($id) {
		$user = User::find($id);

		if(count($user)){
			$projects = User::find($id)->projects()->get();
			$profile = $user->profiles->toArray();
			return View::make('profile.user')->with(array('user' => $user, 'profile' => $profile, 'projects' => $projects));
		}
		return Redirect::route('home');
	}
}