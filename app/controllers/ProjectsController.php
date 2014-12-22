<?php
class ProjectsController extends \BaseController {
	/**
	 * Display a listing of projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::has('genres')->paginate(10);
		return View::make('projects.index')->with('projects', $projects);
	}

	/**
	 * Show the form for creating a new project
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
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

			$newProject->project_title = $allInput['project_title'];
			$newProject->synopsis  = $allInput['synopsis'];
			$newProject->start_date = $allInput['start_date'];
			$newProject->complete_date = $allInput['complete_date'];
			$newProject->funds_end_date = $allInput['funds_end_date'];
			$newProject->funds_curent = $allInput['funds_curent'];
			$newProject->funds_goal = $allInput['funds_goal'];
			$newProject->stage = $allInput['stage'];
			$newProject->video_url = $allInput['video_url'];

			$newProject->save();
			return Redirect::action('ProjectsController@index');
		}

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

		return View::make('projects.show', compact('project'));
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
