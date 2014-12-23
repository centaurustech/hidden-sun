<?php

class Genre extends BaseModel {

	// protected $appends = array('genre');


	// Add your validation rules here
	public static $rules = [
		'genre'		=> 'required|max:50'
		];

	protected $table = 'genres';

	public function projects()
	{
		return $this->belongsToMany('Project');
	}

	protected $fillable = array('genre');

}