<?php

class Genre extends BaseModel {

	// protected $appends = array('genre');
	
	public function getGenreAttribute() {
		//loop through $this->genres making a comma seperated list, return it.
		$genre = $this->attributes['genre'];
		//$genre_list = implode(', ', $genre_list);
		return $genre . ',';
	}
		
	// Add your validation rules here
	public static $rules = [
		'genre'		=> 'required|max:50'
		];

	protected $table = 'genres';

	public function projects()
	{
		return $this->hasMany ('Project');
	}

	protected $fillable = array('genre');

}