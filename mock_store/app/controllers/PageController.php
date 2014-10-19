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
			// $view->nest('ranking_mod1', 'ranking_mod1', array('current_dbs' => $current_dbs));
			// $view->nest('ranking_mod2', 'ranking_mod2', array('past_dbs' => $past_dbs));
			//$view->nest('footer', 'footer');
			$view->nest('global_nav', 'global_nav');
			$view->with('current_dbs', $current_dbs)->with('past_dbs', $past_dbs);
			return $view;
		}
	}

	public function detail($id){
		// Modelの呼び出し
		$db = Application::with('company')->with('user')->find($id);
		if($id){
			// Viewの生成
			$view = View::make('detail');
			$data = array(
					'title'=>'Mock Store 詳細'
				);
			$view->nest('head', 'head', $data);
			$view->nest('header', 'header');
			//$view->nest('footer', 'footer');
			$view->nest('global_nav', 'global_nav');
			$view->with('db', $db);
			return $view;
		}
	}

	public function login(){
		$view = View::make('login');
		$data = array(
		 	'title'=>'Mock Store ログイン'
		);
		$view->nest('head', 'head', $data);
		return $view;
	}

	public function term(){
		$view = View::make('term');
		$data = array(
		 	'title'=>'Mock Store 利用規約'
		);
		$view->nest('head', 'head', $data);
		return $view;
	}
}