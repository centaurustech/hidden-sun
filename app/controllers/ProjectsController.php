<?php

class ProjectsController extends \BaseController {
	/**
	 * Display a listing of projects
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('genre')) {
			$genre_id = Input::get('genre');
			$projects = Genre::find($genre_id)->projects;
		} else {
			$projects = Project::has('genres')->paginate(10);
		}
		
		$genres = Genre::where('parent_genre', '=', '1')->get();
		return View::make('projects.index')->with(array('projects' => $projects, 'genres' => $genres));
	}

	/**
	 * Show the form for creating a new project
	 *
	 * @return Response
	 */
	public function create()
	{
		$main_genres = Genre::where('parent_genre', '=', '1')->get();
		$secondary_genres = Genre::all();
		return View::make('projects.create')->with(array('main_genres' => $main_genres, 'secondary_genres' => $secondary_genres));
	}

	/**
	 * Store a newly created project in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Project::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$allInput = Input::all();
			$newProject = new Project();

			$newProject->project_title 	= $allInput['project_title'];
			$genre_id					= (integer) $allInput['genre'];
			$genre2_id					= (integer) $allInput['genre2'];
			$genre3_id					= (integer) $allInput['genre3'];
			$newProject->synopsis  		= $allInput['synopsis'];
			$newProject->start_date     = $allInput['start_date'];
			$newProject->complete_date  = $allInput['complete_date'];
			$newProject->funds_end_date = $allInput['funds_end_date'];
			$newProject->funds_current  = $allInput['funds_current'];
			$newProject->funds_goal  	= $allInput['funds_goal'];
			$newProject->stage 			= $allInput['stage'];
			$newProject->video_url  	= $allInput['video_url'];
			$newProject->user_id 		= $allInput['user_id'];

			$newProject->save();

			$project_id = $newProject->id;
			$project = Project::find($project_id);
			$project->genres()->attach($genre_id);
			$project->genres()->attach($genre2_id);
			$project->genres()->attach($genre3_id);

			return Redirect::action('ProjectsController@index');
		}

		Project::create($data);

		return Redirect::route('projects.index');
	}

	/**
	 * Display the specified project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::findOrFail($id);
		$funds_current = (integer) $project->funds_current;
		$funds_goal = (integer) $project->funds_goal;
		$funding_progress = ($funds_current / $funds_goal) * 100;
		return View::make('projects.show')->with(array('project' => $project, 'funding_progress' => $funding_progress));
	}

	/**
	 * Show the form for editing the specified project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);

		return View::make('projects.edit', compact('project'));
	}

	/**
	 * Update the specified project in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Project::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$project->update($data);

		return Redirect::route('projects.index');
	}

	/**
	 * Remove the specified project from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Project::destroy($id);

		return Redirect::route('projects.index');
	}

	public function showFunded(){


	}

	public function showNew() {


	}



}
