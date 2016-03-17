<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;
	
	protected $guarded = [];
	protected $visible = ['id', 'company_id', 'username']; // PW、メールアドレスは隠す
	
	public function setPasswordAttribute($value){
		$this->attributes['password'] = Hash::make($value);
	}
}
