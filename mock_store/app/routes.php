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

Route::get('/', function(){
	return "トップページ";
});

Route::get('about', function(){
	return "このサイトについて";
});

// Route::get('page/1', function(){
// 	return "1ページ";
// });

// Route::get('page/2', function(){
// 	return "2ページ";
// });

// Route::get('3/kakeru/7/ha', function(){
// 	return "21";
// });

// Route::get('page/{page}', function($page = 'なし'){
// 	return $page.'目が表示されました。';
// });

Route::get('page', 'PageController@index');

Route::get('page/{page}', 'PageController@showPage');