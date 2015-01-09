<?php

class ProfileController extends BaseController {

	public function user($id) {
		$user = User::where('id', '=', $id);
		$projects = User::find($id)->projects()->get();
		$id = Auth::id();

		if($user->count()){
			$user = $user->first();
			return View::make('profile.user')->with(array('user' => $user, 'projects' => $projects));
		}
		return App::abort(404);
	}
}