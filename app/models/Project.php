<?php

class Project extends BaseModel {

	public function getGenreListAttribute() {
		$genreList = '';
		$genreNames = [];
		
		foreach ($this->genres as $genre) {
			if(sizeof($this->genres) <= 1) {
				$genreList = $genre->genre;
			} else {
				if(isset($genre->genre)){
					$genreList = $genre->genre . ', ' . $genreList;
				}
			}
		}

		$len = strlen($genreList);
		
		if($genreList[$len - 2] == ','){
			$genreList[$len - 2] = '';
		}

		return $genreList;
	}

	public function getDonationTotalAttribute() {
		$donationsTotal = 0;
		$pattern = "/^ch_[A-Za-z0-9]+/";

		foreach ($this->donations as $donation) {
			preg_match($pattern, $donation->stripe_charge_id, $charge_id_match, PREG_OFFSET_CAPTURE);;

			if(!empty($charge_id_match) && $donation->stripe_charge_id == $charge_id_match[0][0]){
				$donationsTotal += (integer)$donation->amount;
			}
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
		$fundingGoal = number_format($this->funds_goal, 0, ".", ",");
		return $fundingGoal;
	}

	public function getVideoUrlAttribute() {

			$parsedURL = parse_url($this->youtube_url_provided);
			$host = isset($parsedURL['host']) ? $parsedURL['host'] : false;

			if($host == "www.youtube.com" xor $host == "youtube.com") {
				$video_id = (isset($parsedURL['query'])) ? substr($parsedURL['query'], 2) : false;
				$videoURL = "//www.youtube.com/embed/" . $video_id;
			} else {
				$videoURL = false;
			}

		return $videoURL;
	}

	public function getThumbnailUrlAttribute() {
		$providedURL = trim($this->youtube_url_provided);

		if($providedURL == "none provided" || empty($providedURL)) {
			$creator_email = $this->email;
			$thumbnailURL = Gravatar::src($creator_email, 1024);
		} else {
			$parsedURL = parse_url($providedURL);
			$host = isset($parsedURL['host']) ? $parsedURL['host'] : false;

			if($host == "www.youtube.com" xor $host == "youtube.com") {
				$video_id = (isset($parsedURL['query'])) ? substr($parsedURL['query'], 2) : "none";
			} else {
				$video_id = "none";
			}

			$thumbnailURL =	"//img.youtube.com/vi/" . $video_id . "/0.jpg";
		}

		return $thumbnailURL;
	}

	// Add your validation rules here
	public static $rules = [
		'project_title'			=> 'required|max:100',
		'synopsis'				=> 'required|max:2000',
		'funds_start_date'		=> 'required',
		'funds_end_date'		=> 'required',
		'funds_goal'			=> 'required',
		'stage'					=> 'required',
		'youtube_url_provided' 	=> 'regex:/^((http(?:s)?\:\/\/))?(www\.)?youtube\.com\/watch\?v\=[a-zA-Z0-9\-]*/',
		'status'				=> '',
		'user_id'				=> 'required'
		];

	//temporary rules for updating a project
	public static $rules_for_update = [
		'project_title'			=> 'required|max:100',
		'synopsis'				=> 'required|max:2000',
		'funds_goal'			=> 'required',
		'stage'					=> 'required',
		'youtube_url_provided' 	=> 'regex:/^((http(?:s)?\:\/\/))?(www\.)?youtube\.com\/watch\?v\=[a-zA-Z0-9\-]*/',
		'user_id'				=> 'required'
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

