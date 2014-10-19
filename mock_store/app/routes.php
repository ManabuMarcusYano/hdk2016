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

// ページ表示
Route::get('/', 'PageController@index');
Route::get('/index', function(){
	return Redirect::to('/');
});
Route::get('/{page}', 'PageController@detail')->where('page', '[0-9]+');
Route::get('/login', 'PageController@login');
Route::get('/term', 'PageController@term');

// API
Route::get('/{page}/get', 'AppController@getAppInfo');

// テスト
Route::get('/user', 'User@showUser');
Route::get('/hello', function(){
});