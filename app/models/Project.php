<?php

class Project extends BaseModel {
	
	public function getGenreListAttribute() {
		$genreList = '';

		foreach ($this->genres as $genre) {
			if(sizeof($this->genres) <= 1) {
				$genreList = $genre->genre;
			} else {
				// concat genre->name thing with ,
				if($genre !== null) {
					$genreList = $genreList . $genre->genre . ', ';
				} else {
					$genreList = $genreList . $genre;
				}
			}
		}
		
		return $genreList;
	}

	// Add your validation rules here
	public static $rules = [
		'project_title'		=> 'required|max:100',
		'synopsis'			=> 'required|max:2000',
		'start_date'		=> '',
		'complete_date'		=> '',
		'funds_end_date'	=> 'required',
		'funds_current'		=> 'required',
		'funds_goal'		=> 'required',
		'stage'				=> 'required',
		'video_url'			=> '',
		'user_id'			=> 'required'
		];

	protected $table = 'projects';

	public function user()
	{
    	return $this->belongsTo('User');
	}

	public function genres()
	{
		return $this->belongsToMany('Genre');
	}

	// Don't forget to fill this array
	protected $fillable = [];

}

  