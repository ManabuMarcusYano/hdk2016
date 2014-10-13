<?php

class PageController extends BaseController{
	public function index(){
		 $view = View::make('index');
		 $data = array(
		 	'title'=>'Mock Store トップ'
		 );
		 $view->nest('head', 'head', $data);
		 $view->nest('header', 'header');
		 $view->nest('banner', 'banner');
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

	// public function showPage($page){
	// 	return $page."ページです";
	// }
}