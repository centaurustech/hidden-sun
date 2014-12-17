<?php 

use Illuminate\Routing\Controller;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.signup');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$allInput = Input::all();
			$newUser = new User();

			if (Input::has('phone_number')){
				$newUser->phone_number = $allInput['phone_number'];
			}

			$newUser->first_name = $allInput['first_name'];
			$newUser->last_name  = $allInput['last_name'];
			$newUser->city       = $allInput['city'];
			$newUser->state      = $allInput['state'];
			$newUser->email      = $allInput['email'];
			$newUser->password   = $allInput['password'];

			$newUser->save();
			return Redirect::action('HomeController@showHomepage');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}