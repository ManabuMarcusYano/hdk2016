<?php

class PageController extends BaseController{
	public function index(){
		// Modelの呼び出し
		define('MAX_CELL_COUNT', 10);
		$current_dbs = Application::with('company')->with('user')->take(MAX_CELL_COUNT)->orderby('id', 'desc')->get();
		$past_dbs = Application::with('company')->with('user')->take(MAX_CELL_COUNT)->get();
		if($current_dbs && $past_dbs){

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
			return $view->with('current_dbs', $current_dbs)->with('past_dbs', $past_dbs);
		}
	}

	public function detail($page){
		// Modelの呼び出し

		// Viewの生成
		$view = View::make('detail');
		$data = array(
				'title'=>'Mock Store 詳細'
			);
		$view->nest('head', 'head', $data);
		$view->nest('header', 'header');
		$view->nest('footer', 'footer');
		$view->nest('global_nav', 'global_nav');
		return $view;
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