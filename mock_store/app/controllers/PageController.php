<?php

class PageController extends BaseController{
	public function index(){
		return "ページ一覧";
	}

	public function showPage($page){
		return $page."ページです";
	}

}