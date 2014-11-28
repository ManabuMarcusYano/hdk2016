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
    $users = User::all();
    $categories = Category::all();
    $view->with('companies', $companies)->with('users',$users)->with('categories',$categories);

    return $view;
  }
  public function postAddApp(){


    $applicationData = Input::only(array(
      "name",
      "company_id",
      "manager_id",
      "description",
      "manager_id",
      "started_developing_at",
      "will_release_at",
      "version"));

      $application =  Application::create($applicationData);

      return var_dump($applicationData);
  }

  public function edit($applicationId){

  }

}
