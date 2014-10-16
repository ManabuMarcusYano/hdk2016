<?php

class PageController extends BaseController{
	public function index(){
		// Modelの呼び出し
		define('MAX_CELL_COUNT', 10);
		$current_$dbs = Application::with('company')->with('user')->take(MAX_CELL_COUNT)->get();
		if($dbs){
			// Viewの生成
			$view = View::make('index');
			$data = array(
				'title'=>'Mock Store トップ'
			);
			$view->nest('head', 'head', $data);
			$view->nest('header', 'header');
			$view->nest('banner', 'banner');
			$view->nest('footer', 'footer');
			$view->nest('global_nav', 'global_nav');
			return $view->with('dbs', $dbs);
		}
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