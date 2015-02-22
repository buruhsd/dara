<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

protected $table = 'users';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public static $rules = [
        'first_name' => 'required',
        'email' => 'required|email|unique:users,email,:id',
        'password' => 'confirmed|required|min:5',
        'recaptcha_response_field' => 'required|recaptcha',
    ];

	protected $fillable = ['first_name', 'last_name', 'email', 'password'];
	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
