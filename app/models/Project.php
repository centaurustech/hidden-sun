<?php

class Project extends BaseModel {
	
	public function getGenreListAttribute() {
		$genreList = '';
		$genreNames = [];
		foreach ($this->genres as $genre) {
			if(sizeof($this->genres) <= 1) {
				$genreList = $genre->genre;
			} else {
				// concat genre->name thing with ,
					$genreList = $genreList . $genre->genre . ', ';
			}
		}

		return $genreList;
	}

	public function getDonationTotalAttribute() {
		$donationsTotal = 0;

		foreach ($this->donations as $donation) {
			$donationsTotal += (integer)$donation->amount;
		}
		
		$donationsTotal /= 100;
		return $donationsTotal;
	}

	public function getFundingProgressAttribute() {
		$fundingGoal = (integer) $this->funds_goal;
		$fundingProgress = round(($this->donation_total / $fundingGoal) * 100);

		return $fundingProgress;
	}

	public function getFundingGoalAttribute() {
		$number = $this->funds_goal;
		$decimals = 0;
		$dec_point = ".";
		$thousands_sep = ",";

		$fundingGoal = number_format($number, $decimals, $dec_point, $thousands_sep);

		return $fundingGoal;
	}

	// Add your validation rules here
	public static $rules = [
		'project_title'		=> 'required|max:100',
		'synopsis'			=> 'required|max:2000',
		'funds_start_date'	=> 'required',
		'funds_end_date'	=> 'required',
		'funds_goal'		=> 'required',
		'stage'				=> 'required',
		'video_url'			=> '',
		'thumbnail_url'		=> '',
		'status'			=> '',
		'user_id'			=> 'required'
		];

	//temporary rules for updating a project
	public static $rules_for_update = [
		'project_title'		=> 'required|max:100',
		'synopsis'			=> 'required|max:2000',
		'funds_goal'		=> 'required',
		'stage'				=> 'required',
		'video_url'			=> '',
		'user_id'			=> 'required'
	];
	
	// Database relationships

	protected $table = 'projects';

	public function user()
	{
    	return $this->belongsTo('User');
	}

	public function genres()
	{
		return $this->belongsToMany('Genre');
	}

	public function donations()
	{
		return $this->hasMany('Donation');
	}

	// Don't forget to fill this array
	protected $fillable = [];

	public function scopeRandom($query, $size=1)
	{
		return $query->orderBy(DB::raw('RAND()'))->take($size);
	}

	public function scopePopular($query)
	{
		return null;
	}

}

