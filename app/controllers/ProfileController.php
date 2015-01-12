<?php

class ProfileController extends BaseController {

	public function showProfile($id) {
		$user = User::find($id);
		$projects = User::find($id)->projects()->get();
		$profile = $user->profiles->toArray();

		//$email = $user->email;
		//$full_name = $user->first_name . ' ' . $user->last_name;

		// returns the src for an img tag
		//$gravatar = Gravatar::src($email, 1024);

		if($user->count()){
			return View::make('profile.user')->with(array('user' => $user, 'profile' => $profile, 'projects' => $projects));
		}
		return App::abort(404);
	}
}