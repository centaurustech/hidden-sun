<?php

class Genre extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'project_title'		=> 'required|max:100',
		'synopsis'			=> 'required|max:1000',
		'start_date'		=> 'required',
		'complete_date'		=> '',
		'funds_end_date'	=> 'required',
		'funds_current'		=> 'required',
		'funds_goal'		=> 'required',
		'stage'				=> 'required',
		'video_url'			=> '',

		];
		// 'title' => 'required'

	protected $table = 'genres';

	public function user()
	{
    	return $this->belongsTo('User');
	}

	public function projects()
	{
		return $this->belongsToMany('Project');
	}

	// Don't forget to fill this array
	protected $fillable = [];

}