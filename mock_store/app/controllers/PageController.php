<?php

define('DEFAULT_SORT', 'completion + interest + potence desc');
define('MAX_CELL_COUNT', 10);

class PageController extends BaseController{
	public function index($sort = DEFAULT_SORT){
		// Modelの呼び出し
		
		if($sort != 'reviewed'){
			$current_dbs = Application::with('company')->with('user')->with('category')->whereRaw("will_release_at >= NOW() OR will_release_at is NULL")->orderByRaw($sort)->take(MAX_CELL_COUNT)->get();
			$past_dbs    = Application::with('company')->with('user')->with('category')->orderByRaw($sort)->take(MAX_CELL_COUNT)->get();
		}else if($sort != 'search'){
			$current_dbs = Application::with('company')->with('user')->with('category')->whereRaw("will_release_at >= NOW() OR will_release_at is NULL")->orderByRaw($sort)->take(MAX_CELL_COUNT)->get();
			$past_dbs    = Application::with('company')->with('user')->with('category')->orderByRaw($sort)->take(MAX_CELL_COUNT)->get();
		}else{
			$current_dbs = Application::with('company')->with('user')->with('reviewer')->with('category')->whereRaw("(will_release_at >= NOW() OR will_release_at is NULL)")->orderByRaw(DEFAULT_SORT)->take(MAX_CELL_COUNT)->get();
			//return Response::json($current_dbs[0]->user['id']);
			$past_dbs    = Application::with('company')->with('user')->with('reviewer')->with('category')->orderByRaw(DEFAULT_SORT)->take(MAX_CELL_COUNT)->get();
		}
		
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
	
	public function updated(){
		return $this->index('updated_at desc');
		
		// テスト
		/*
		Mail::send( 'mail', array('user'=>'ミスター'), function ($e){
        	$e->to( 'mockstore@gmail.com')
            	->from( 'mockstore@gmail.com', 'Mock Store管理者' )
            	->subject( 'テストメール' );
   		});
		*/
	}
	
	public function unupdated(){
		return $this->index('updated_at asc');
	}
	
	public function recentlyStarted(){
		return $this->index('started_developing_at desc');
	}
	
	public function previouslyStarted(){
		return $this->index('started_developing_at asc');
	}
	
	public function reviewed(){
		return $this->index('reviewed');
	}

	public function search(){
		Input::flash();
		if(Input::has('keyword')){
			$keyword = Input::get('keyword');
			$current_dbs = Application::with('company')->with('user')->with('category')->whereRaw("name LIKE '%$keyword%' OR description LIKE '%$keyword%'")->take(MAX_CELL_COUNT)->get();
			$past_dbs    = Application::with('company')->with('user')->with('category')->whereRaw("name LIKE '%$keyword%' OR description LIKE '%$keyword%'")->take(MAX_CELL_COUNT)->get();
			
			if($current_dbs && $past_dbs){
				// Viewの生成
				$view = View::make('index');
				$data = array(
					'title'=>'Mock Store 検索 '.$keyword
				);
				$view->nest('head', 'head', $data);
				$view->nest('header', 'header');
				$view->nest('banner', 'banner');
				$view->nest('global_nav', 'global_nav');
				$view->with('current_dbs', $current_dbs)->with('past_dbs', $past_dbs);
				return $view;
			}
		}
		return Redirect::to('/index');
	}
	
	public function detail($id){
		// Modelの呼び出し
		$app = Application::with('company')->with('user')->find($id);
		$reviews = Review::with('reviewer')->with('feedbacker')->whereRaw("application_id = $id and feedback_id = ''")->get();
		
		if($app && $reviews){
			// Viewの生成
			$view = View::make('detail');
			$data = array(
					'title'=>'Mock Store '.$app->name
				);
			$view->nest('head', 'head', $data);
			$view->nest('header', 'header');
			//$view->nest('footer', 'footer');
			$view->nest('global_nav', 'global_nav');
			$view->with('db', $app);
			$view->with('reviews', $reviews);
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
	
	public function signin(){
		// Modelの呼び出し
		$companies = Company::all();
		if($companies){
			$view = View::make('signin');
			$data = array(
				'title'=>'Mock Store ユーザー登録'
			);
			$view->nest('head', 'head', $data);
			$view->with('companies', $companies);
			return $view;
		}
	}

	public function term(){
		$view = View::make('term');
		$data = array(
		 	'title'=>'Mock Store 利用規約'
		);
		$view->nest('head', 'head', $data);
		$view->nest('header', 'header');
		$view->nest('global_nav', 'global_nav');
		return $view;
	}
	
	public function maintenance(){
		$view = View::make('maintenance');
		$data = array(
		 	'title'=>'Mock Store メンテナンス中'
		);
		$view->nest('head', 'head', $data);
		return $view;
	}
}