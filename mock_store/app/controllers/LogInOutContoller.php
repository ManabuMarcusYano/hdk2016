<?php

class LogInOutController extends BaseController{
	public function logIn(){
		 // バリデーション省略
		 Session::put('mail_address', Input::get('mail_address'));
		Session::put('password', Input::get('password'));
		if(Auth::attempt(Input::only('mail_address', 'password'))){
			return Redirect::intended('/');
		}
		return Redirect::to('/login');
	}

	public function logOut(){
		Auth::logout();
		return Redirect::to('/login');
	}
}
