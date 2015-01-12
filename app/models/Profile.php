<?php

class Profile extends \Eloquent {
	protected $fillable = ['user_id', 'title', 'summary', 'profile_img', 'website_url'];

	public function user(){
		return $this->belongsTo('User');
	}
}