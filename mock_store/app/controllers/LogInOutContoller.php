<?php

class LogInOutController extends BaseController{
	public function logIn(){
		 // バリデーション省略
		if(Auth::attempt(Input::only('mail_address', 'password'))){
			return Redirect::intended('/');
		}
		return Redirect::back()->withInput();		
	}

	public function logOut(){
		Auth::logout();
		return Redirect::to('/login');
	}
}