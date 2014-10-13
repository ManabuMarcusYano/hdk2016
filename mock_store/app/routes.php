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

// Route::get('about', function()
// {
// 	return "このサイトについて";
// });

// Route::get('page', 'PageController@index');

// Route::get('page/{page}', 'PageController@showPage');
