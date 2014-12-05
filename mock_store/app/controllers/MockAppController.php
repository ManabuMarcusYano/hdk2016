<?php

class MockAppController extends BaseController{

  private $s3;

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

    $error = [];

    $applicationData = Input::only(array(
      "name",
      "company_id",
      "manager_id",
      "description",
      "manager_id",
      "started_developing_at",
      "will_release_at",
      "version")
    );

    $logo_dir = Config::get('const.logo_dir');
    $img_dir = Config::get('const.img_dir');
    $ipa_dir = Config::get('const.ipa_dir');
    $apk_dir = Config::get('const.apk_dir');

    $logoImage = Input::hasFile('logo_file') ? Input::file('logo_file') : null;
    $logo_path = $this->createfilePath($logoImage,$logo_dir);
    $applicationData["logo_path"] = $logo_path;

    $appImage1 = Input::hasFile('app_image1') ? Input::file('app_image1') : null;
    $image1_path = $this->createfilePath($appImage1,$img_dir);
    $applicationData["image1_path"] = $image1_path;

    $appImage2 = Input::hasFile('app_image2') ? Input::file('app_image2') : null;
    $image2_path = $this->createfilePath($appImage2,$img_dir);
    $applicationData["image2_path"] = $image2_path;

    $appImage3 = Input::hasFile('app_image3') ? Input::file('app_image3') : null;
    $image3_path = $this->createfilePath($appImage3,$img_dir);
    $applicationData["image3_path"] = $image3_path;

    $apkFile = Input::hasFile('apk_file') ? Input::file('apk_file') : null;
    $apk_path = $this->createfilePath($apkFile,$apk_dir);
    $applicationData["apk_path"] = $apk_path;

    $plistFile = Input::hasFile('plist_file') ? Input::file('plist_file') : null;
    $ipa_path = $this->createfilePath($plistFile,$ipa_dir);
    $applicationData["ipa_path"] = $ipa_path;

    $ipaFile = Input::hasFile('ipa_file') ? Input::file('ipa_file') : null;

    $application =  Application::create($applicationData);

    $this->s3 = App::make('aws')->get('s3');
    $this->uploadS3($logoImage,$logo_dir);
    $this->uploadS3($appImage1,$img_dir);
    $this->uploadS3($appImage2,$img_dir);
    $this->uploadS3($appImage3,$img_dir);
    $this->uploadS3($apkFile,$apk_dir);
    $this->uploadS3($ipaFile,$ipa_dir);
    $this->uploadS3($plistFile,$ipa_dir);

    return  $applicationData;
  }

  public function edit($applicationId){
  }

  private function createFilePath($file,$dir){
    if($file !== null){
      return Config::get('const.s3_url').Config::get('const.env').$dir.'/'.$file->getClientOriginalName();
    } else {
      return '';
    }
  }


  private function uploadS3($file,$dir){
    if($file === null){ return false; }
    try{
      $this->s3->putObject(array(
        'Bucket'     => 'mockstore',
        'Key'        => Config::get('const.env').$dir.'/'.$file->getClientOriginalName(),
        'SourceFile' => $file->getRealPath(),
      ));
    } catch (S3Exception $e) {
      return false;
    }
    return true;
  }

}
