<?php

class GenresController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /genres
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /genres/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /genres
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /genres/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id = 1)
	{
		dd("you made it");
		//$genre = Genre::find($id);
		//return View::make('genres.show')->with('genre', $genre);
		//return "you made it to " . $genre;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /genres/{id}/edit
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
	 * PUT /genres/{id}
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
	 * DELETE /genres/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}