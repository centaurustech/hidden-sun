<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $rules = array(
		'first_name'	=> 'max:50',
		'last_name'		=> 'max:50',
		'city'			=> 'max:50',
		'state'			=> 'max:25',
		'email'			=> 'required|max:50|email|unique:users',
		'password'		=> 'required|min:6|max:100',
		'password_again'=> 'required|same:password',
		'phone_number'	=> 'max:25'
	);

	protected $fillable = array('first_name', 'last_name', 'city', 'state', 'email', 'password', 'password_temp', 'activation_code', 'active', 'phone_number');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function projects()
	{
		return $this->hasMany ('Project')
	}

}
