<?php

class UserController extends BaseController{
	public function register(){
		$error = "";
		Input::flash();
		if(
		Input::has('username') &&
		Input::has('company') &&
		Input::has('role') &&
		Input::has('mail_address') &&
		Input::has('domain')
		)
		{
			$username = Input::get('username');
			$company = Input::get('company');
			$role = Input::get('role');
			$mail_address = Input::get('mail_address');
			$domain = Input::get('domain');
			//$password = Input::get('password');
			$password_confirmation = Input::get('password_confirmation');
			
			if(true){
				$mail_address = $mail_address.$domain;
				
				// 重複ユーザーかチェック
				$count = User::where('mail_address', '=', $mail_address)->count();
				if($count>0){
					// ユーザー重複
					$error = "既に登録されています。";
					return Redirect::to('/signin')->withInput()->with('error', $error);
				}
				
				// パスワード生成
				$password = str_random(10);
				
				// Model¸
				$user = new User();
				$user->company_id = $company;
				$user->mail_address = $mail_address;
				$user->username = $username;
				$user->password = $password;
				$user->role = $role;
				$user->save();
				
				Mail::send( 'mail', array('username'=> $username, 'password' => $password), function ($e) use($mail_address){
					$e
					->to($mail_address)
					->from('mockstore@applibot.co.jp', 'Mock Store管理者')
					->subject('Mock Storeの登録ありがとうございます');
   				});
				
				return Redirect::to('/login')->withInput();
				
			}
			$error = "パスワードが一致しません。";
			return Redirect::to('/signin')->withInput()->with('error', $error);
		}
		$error = "入力漏れがあります。";
		return Redirect::to('/signin')->withInput()->with('error', $error);;
	}
	
	public function allPasswordChange(){
		$users = User::all();
		foreach($users as $user){
			$id = $user->id;
			$this->passwordChange($id);
		}
	}
	
	public function passwordChange($id){
		set_time_limit(600);
		$user = User::find($id);
		if(!empty($user)){
			// パスワード生成
			$password = "bonbaie30";
			
			$username = $user->username;
			$mail_address = $user->mail_address;
			
			$user->password = $password;
			$user->save();
			
			echo str_pad('',1);
            flush();
			
			/*
			Mail::send( 'passwordchange', array('username'=> $username, 'password' => $password), function ($e) use($mail_address){
				$e
				->to($mail_address)
				->from('mockstore@applibot.co.jp', 'Mock Store管理者')
				->subject('Mock Storeパスワード登録・変更のお知らせ');
			});
			*/
			
			 echo 'your password: '.$password.' id: '.$id;
		}else{
			// echo 'no user found';
		}
	}
	
	public function showPassword($id){
			$user = User::find($id);
			if(!empty($user)){
				$password =  $user->password;
				echo 'your pw:'.$password;
			}
			return; 
	}
}