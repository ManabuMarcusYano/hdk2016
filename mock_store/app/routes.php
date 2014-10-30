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

// ソート
Route::get('/updated', 'PageController@updated');
Route::get('/unupdated', 'PageController@unupdated');
Route::get('/recentlyStarted', 'PageController@recentlyStarted');
Route::get('/previouslyStarted', 'PageController@previouslyStarted');
Route::get('/reviewed', 'PageController@reviewed');

// 検索
Route::post('/search', 'PageController@search');

Route::get('/{page}', 'PageController@detail')->where('page', '[0-9]+');
Route::get('/login', 'PageController@login');
Route::get('/term', 'PageController@term');

// API
Route::get('/{page}/get', 'AppController@getAppInfo');
Route::get('/{page}/feedbacks/get', 'AppController@getAppFeedbacks');
Route::post('/{page}/post/review', 'AppController@postReview');


// テスト
Route::get('/user', 'User@showUser');
Route::get('/hello', function(){
});

// Auth
Route::when('/', 'auth');
Route::when('/', 'userAgent');

Route::post('login', function(){
     // バリデーション省略
	
	if(Auth::attempt(Input::only('mail_address', 'password'))){
		return Redirect::intended('/');
	}
	return Redirect::back()->withInput();
});


Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/login');
});