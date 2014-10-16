<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PageController@index');
Route::get('/index', 'PageController@index');

Route::get('/login', 'PageController@login');

Route::get('/user', 'User@showUser');

Route::get('/hello', function(){
	//EloquentORMでデータの取得
	// $data = Application::all();
	if($data = User::find(0)){
	 	echo $data->mail_address;
	}else{
		echo 'failed';
	}
	// echo 'Applcation<br />';


	// if($user = User::create(array('mail_address' => 'tea@test.com', 'password' => 'hogehoge'))){
	// 	echo 'Successful';
	// }else{
	// 	echo 'failure';
	// }
});