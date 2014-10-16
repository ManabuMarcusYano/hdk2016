<?php

class AppController extends BaseController{
	public function index(){
		// Modelの呼び出し
		$dbs = Application::all();
		foreach($dbs as $db){
			var_dump($db);
		}

		// if($dbs){
		// 	// Viewの生成 
		// 	$view = View::make('index');
		// 	$data = array(
		// 		'title'=>'Mock Store トップ'
		// 	);
		// 	$view->nest('head', 'head', $data);
		// 	$view->nest('header', 'header');
		// 	$view->nest('banner', 'banner');
		// 	$view->nest('footer', 'footer');
		// 	$view->nest('global_nav', 'global_nav');
		// 	return $view->with('dbs', $dbs);
		// }
	}

	public function login(){
		$view = View::make('login');
		$data = array(
		 	'title'=>'Mock Store ログイン'
		);
		$view->nest('head', 'head', $data);
		//$view->nest('footer', 'footer');
		return $view;
	}
}