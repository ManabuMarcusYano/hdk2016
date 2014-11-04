<?php

class UserController extends BaseController{
	public function register(){
		Input::flash();
		if(
		Input::has('username') &&
		Input::has('company') &&
		Input::has('role') &&
		Input::has('mail_address') &&
		Input::has('domain') &&
		Input::has('password') &&
		Input::has('password_confirmation')
		)
		{
			$username = Input::get('username');
			$company = Input::get('company');
			$role = Input::get('role');
			$mail_address = Input::get('mail_address');
			$domain = Input::get('domain');
			$password = Input::get('password');
			$password_confirmation = Input::get('password_confirmation');
			
			if($password == $password_confirmation){
				$mail_address = $mail_address.$domain;
				
				// 重複ユーザーかチェック
				$count = User::where('mail_address', '=', $mail_address)->count();
				if($count>0){
					// ユーザー重複
					return Redirect::to('/signin')->withInput();
				}
				
				// Model
				$user = new User();
				$user->company_id = $company;
				$user->mail_address = $mail_address;
				$user->username = $username;
				//$user->password = Hash::make($password);
				$user->password = $password;
				$user->role = $role;
				$user->save();
				
				return Redirect::to('/login')->withInput();
				
			}
			return Redirect::to('/signin')->withInput();
		}
		return Redirect::to('/signin')->withInput();
	}
}