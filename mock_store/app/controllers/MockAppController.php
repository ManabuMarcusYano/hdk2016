<?php

class MockAppController extends BaseController{

  public function appList(){
    $view = View::make('app_manage');
    $data = array(
      'title'=>'Mock Store アプリ管理'
    );
    $view->nest('head', 'head', $data);
    $view->nest('header', 'header');
    $view->nest('global_nav', 'global_nav');

    return $view;
  }

  public function getAddApp(){
    $view = View::make('app_add');
    $data = array(
      'title'=>'Mock Store 新しいアプリ'
    );
    $view->nest('head', 'head', $data);
    $view->nest('header', 'header');
    $view->nest('global_nav', 'global_nav');

    $companies = Company::all();
    $view->with('companies', $companies);

    return $view;
  }
  public function postAddApp(){
    $view = View::make('app_add');
    $data = array(
      'title'=>'Mock Store 新しいアプリ'
    );
    $view->nest('head', 'head', $data);
    $view->nest('header', 'header');
    $view->nest('global_nav', 'global_nav');

    $companies = Company::all();
    $view->with('companies', $companies);

    return $view;
  }

  public function edit($applicationId){

  }

}
