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

    //$upload_path = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/app";

    $error = [];
    //$server = 'https://mockstore.s3.amazonaws.com/';

    $applicationData = Input::only(array(
      "name",
      "company_id",
      "manager_id",
      "description",
      "manager_id",
      "started_developing_at",
      "will_release_at",
      "version"));

      $logoImage = Input::hasFile('logo_file') ? Input::file('logo_file') : null;
      $logo_path = $this->createfilePath($logoImage,'/app_icon');
      $applicationData["logo_path"] = $logo_path;

      $appImage1 = Input::hasFile('app_image1') ? Input::file('app_image1') : null;
      $image1_path = $this->createfilePath($appImage1,'/app_img');
      $applicationData["image1_path"] = $image1_path;

      $appImage2 = Input::hasFile('app_image2') ? Input::file('app_image2') : null;
      $image2_path = $this->createfilePath($appImage2,'/app_img');
      $applicationData["image2_path"] = $image2_path;

      $appImage3 = Input::hasFile('app_image3') ? Input::file('app_image3') : null;
      $image3_path = $this->createfilePath($appImage3,'/app_img');
      $applicationData["image3_path"] = $image3_path;

      $apkFile = Input::hasFile('apk_file') ? Input::file('apk_file') : null;
      $apk_path = $this->createfilePath($apkFile,'/app/apk');
      $applicationData["apk_path"] = $apk_path;

      $plistFile = Input::hasFile('plist_file') ? Input::file('plist_file') : null;
      $ipa_path = $this->createfilePath($plistFile,'/app/ipa');
      $applicationData["ipa_path"] = $ipa_path;

      $ipaFile = Input::hasFile('ipa_file') ? Input::file('ipa_file') : null;

      $this->uploadApp($apkFile,'/app/apk');
      $this->uploadApp($ipaFile,'/app/ipa');
      $this->uploadApp($plistFile,'/app/ipa');
      $this->uploadApp($logoImage,'/app_icon');
      $this->uploadApp($appImage1,'/app_img');
      $this->uploadApp($appImage2,'/app_img');
      $this->uploadApp($appImage3,'/app_img');

      // $application =  Application::create($applicationData);

      return $applicationData;
  }

  public function edit($applicationId){
  }

  // TODO 環境によって切り替え
  private function createFilePath($file,$folder){
    if($file !== null){
      return 'https://mockstore.s3.amazonaws.com/'.'development'.$folder.'/'.$file->getClientOriginalName();
    } else {
      return '';
    }
  }

  private function uploadApp($file,$folder){
    if($file === null){ return; }
    // $uploadPath = 'https://mockstore.s3.amazonaws.com/'.'development'.$folder.'/'.$file->getClientOriginalName();
    $uploadPath = public_path().$folder.'/'.$file->getClientOriginalName();
    $filePath = $file->getRealPath();
    File::move($filePath, $uploadPath);
  }

}
