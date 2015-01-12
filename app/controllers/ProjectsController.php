<?php
class ProjectsController extends \BaseController {


	/**
	 * Display a listing of projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Project::with('user');
		$search = Input::get('search');

		if(!is_null($search)) {
			$query->where('project_title', 'like', '%' . $search . '%')->orWhere('synopsis', 'like', '%' . $search . '%');
			$projects = $query->orderBy('created_at', 'desc')->paginate(10);
		} elseif(Input::has('genre')) {
			$genre_id = Input::get('genre');
			$projects = Genre::find($genre_id)->projects;
		} else {
			$projects = Project::has('genres')->paginate(10);
		}

		foreach ($projects as $project){
			$funding_goal = (integer) $project->funds_goal;
			$funding_progress = round(($project->donation_total / $funding_goal) * 100);
			$project['funding_progress'] = $funding_progress;
			
			$funding_ends = new Carbon($project->funds_end_date);
			$now = Carbon::now();
			$days_left = ($funding_ends->diff($now)->days < 1) ? 'today' : $funding_ends->diffForHumans($now);
			$project['days_left'] = $days_left;
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

			$current_user_email = Auth::user()->email;
			$thumbnail_url = Gravatar::src($current_user_email, 1024);

			$newProject->project_title 		= $allInput['project_title'];
			$genre_id						= (integer) $allInput['genre'];
			$genre2_id						= (integer) $allInput['genre2'];
			$genre3_id						= (integer) $allInput['genre3'];
			$newProject->synopsis  			= $allInput['synopsis'];
			$newProject->funds_goal  		= $allInput['funds_goal'];
			$newProject->funds_start_date 	= $allInput['funds_start_date'];
			$newProject->funds_end_date 	= $allInput['funds_end_date'];
			$newProject->stage 				= $allInput['stage'];
			$newProject->video_url  		= $allInput['video_url'];
			$newProject->thumbnail_url		= $thumbnail_url;
			$newProject->user_id 			= $allInput['user_id'];

			$newProject->save();

			$project_id = $newProject->id;
			$project = Project::find($project_id);
			$project->genres()->attach($genre_id);
			$project->genres()->attach($genre2_id);
			$project->genres()->attach($genre3_id);

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
		$creator = User::find($project->user_id);
		return View::make('projects.show')->with(array('project' => $project, 'creator' => $creator));
	}

	/**
	 * Show the form for editing the specified project.
	 *
	 * @param  int  $id
	 * @return Responsed
	 */
	public function edit($id)
	{
		$this_project = Project::find($id);
		$main_genres = Genre::where('parent_genre', '=', '1')->get();
		$secondary_genres = Genre::all();
		return View::make('projects.edit')->with(array('this_project' => $this_project, 'main_genres' => $main_genres, 'secondary_genres' => $secondary_genres));
	}

	public function endProject($id)
	{
		$project = Project::find($id);
		return View::make('projects.endproject')->with(array('project' => $project));
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

	public function updateStatus($id)
	{
		$project = Project::find($id);
		$project->status = Input::get('status');
		$project->save();

		return Redirect::route('manage-projects');
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

	public function showMyProjects() {
		$user = Auth::user();
		$projects = $user->projects()->get();
	
		return View::make('projects.self')->with(array('user' => $user, 'projects' => $projects));
	}

	public function showContribute($id) {
		$project = Project::findOrFail($id);
		return View::make('projects.fund')->with('project', $project);
	}

	public function doDonation($id) {
		return View::make('projects.fund');
	}

}
