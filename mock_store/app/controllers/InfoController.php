<?php

class InfoController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

		$ret = [
			'result'  => true,
			'data' => 
			[
				'information' => '本日のお知らせ'
			]
		];

		return Response::json($ret, 200, $headers, JSON_UNESCAPED_UNICODE);
	}

}
