<?php

class Donation extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'amount' => 'required|integer|min:100',
		'stripe_charge_id' => 'required|unique:donations,stripe_charge_id|regex:/^ch_[A-Za-z0-9]+/'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function project()
	{
    	return $this->belongsTo('Project');
	}
}