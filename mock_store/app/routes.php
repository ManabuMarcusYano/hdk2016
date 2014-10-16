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
	// $data = User::all();
	// echo 'Review';
 	// echo var_dump($data);
	// User::create(array('company_id' => 1, 'mail_address' => 'test@test.com', 'password' => 'hogehoge'));
	// $user = User::find(1);
	// echo $user->mail_address;

	// $users = User::all();
	// foreach ($users as $user) {
	// 	echo $user->mail_address;
	// }

	$user = User::create(array('mail_address' => 'tea@test.com', 'password' => 'hogehoge'));

	// $user = new User;
	// $user->mail_address = "test@test.com";
	// $user->password = "hogehoge";
	// $user->save();
});