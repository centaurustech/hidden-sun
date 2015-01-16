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

	public function getVideoUrlAttribute() {
		$providedURL = $this->youtube_url_provided;
		$parsedURL = parse_url($providedURL);

		$sub11 = substr($providedURL, 0, 11);
		$sub15 = substr($providedURL, 0, 15);
		$sub23 = substr($providedURL, 0, 23);
		$sub24 = substr($providedURL, 0, 24);

		if($sub24 == "https://www.youtube.com/" xor $sub23 == "http://www.youtube.com/" xor $sub15 == "www.youtube.com" xor $sub11 == "youtube.com") {
			
			$video_id = (isset($parsedURL['query'])) ? substr($parsedURL['query'], 2);
			$videoURL = "//www.youtube.com/embed/" . $video_id;
		} else {
			$videoURL = false;
		}

		return $videoURL;
	}

	public function getThumbnailUrlAttribute() {
		$providedURL = $this->youtube_url_provided;

		if($this->youtube_url_provided == "none provided") {
			$creator_email = $this->email;
			$thumbnailURL = Gravatar::src($creator_email, 1024);
		} else {

			$parsedURL = parse_url($providedURL);

			$sub11 = substr($providedURL, 0, 11);
			$sub15 = substr($providedURL, 0, 15);
			$sub23 = substr($providedURL, 0, 23);
			$sub24 = substr($providedURL, 0, 24);

			if($sub24 == "https://www.youtube.com/" xor $sub23 == "http://www.youtube.com/" xor $sub15 == "www.youtube.com" xor $sub11 == "youtube.com") {
				$video_id = (isset($parsedURL['query'])) ? substr($parsedURL['query'], 2);
			} else {
				$video_id = "none";
			}

			$thumbnailURL =	"//img.youtube.com/vi/" . $video_id . "/0.jpg";
		}

		return $thumbnailURL;
	}

	// Add your validation rules here
	public static $rules = [
		'project_title'		=> 'required|max:100',
		'synopsis'			=> 'required|max:2000',
		'funds_start_date'	=> 'required',
		'funds_end_date'	=> 'required',
		'funds_goal'		=> 'required',
		'stage'				=> 'required',
		'youtube_url_provided' => 'regex:/^((http(?:s)?\:\/\/))?(www\.)?youtube\.com\/watch\?v\=[a-zA-Z0-9\-]*/',
		'status'			=> '',
		'user_id'			=> 'required'
		];

	//temporary rules for updating a project
	public static $rules_for_update = [
		'project_title'		=> 'required|max:100',
		'synopsis'			=> 'required|max:2000',
		'funds_goal'		=> 'required',
		'stage'				=> 'required',
		'youtube_url_provided' => 'regex:/^((http(?:s)?\:\/\/))?(www\.)?youtube\.com\/watch\?v\=[a-zA-Z0-9\-]*/',
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
	protected $fillable = ['project_title', 'synopsis', 'funds_goal', 'stage', 'video_url', 'user_id'];

	public function scopeRandom($query, $size=1)
	{
		return $query->orderBy(DB::raw('RAND()'))->take($size);
	}

	public function scopePopular($query)
	{
		return null;
	}

}

