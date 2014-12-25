<?php

class MockAppController extends BaseController{

  private $s3;
  private $gameTitle;

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

    // テキストとファイルを分けて考える

    // テキスト
    $applicationData = Input::only(array(
      'name',
      'company_id',
      'manager_id',
      'description',
      'category_id',
      'started_developing_at',
      'will_release_at',
      'version'
    ));
	
    // $this->gameTitle = Input::get('title');
	$this->gameTitle = date('YmdHis');


    // ファイル
    $logoImage = Input::hasFile('logo_file') ? Input::file('logo_file') : null;
    $appImage1 = Input::hasFile('app_image1') ? Input::file('app_image1') : null;
    $appImage2 = Input::hasFile('app_image2') ? Input::file('app_image2') : null;
    $appImage3 = Input::hasFile('app_image3') ? Input::file('app_image3') : null;
    $apkFile = Input::hasFile('apk_file') ? Input::file('apk_file') : null;
    $ipaFile = Input::hasFile('ipa_file') ? Input::file('ipa_file') : null;
	
	
	Session::put('name', $applicationData['name']);
	Session::put('company_id', $applicationData['company_id']);
	Session::put('manager_id', $applicationData['manager_id']);
	Session::put('description', $applicationData['description']);
	Session::put('category_id', $applicationData['category_id']);
	Session::put('started_developing_at', $applicationData['started_developing_at']);
	Session::put('will_release_at', $applicationData['will_release_at']);
	Session::put('version', $applicationData['version']);

    // apk,ipa,plistのバリデーションを追加
    // Illuminate\Validation\Validatorを拡張するべき
    $this->extendValidation();

    // バリデーション
    $validator = Validator::make(
      array(
        'name'                  => $applicationData['name'],
        //'title'                 => $this->gameTitle,
        'company_id'            => $applicationData['company_id'],
        'manager_id'            => $applicationData['manager_id'],
        'description'           => $applicationData['description'],
        'category_id'           => $applicationData['category_id'],
        'started_developing_at' => $applicationData['started_developing_at'],
        'version'               => $applicationData['version'],
        'logo' => $logoImage,
        'img1' => $appImage1,
        'img2' => $appImage2,
        'img3' => $appImage3,
        'apk'  => $apkFile,
        'ipa'  => $ipaFile
      ),
      array(
        'name'                  => 'required',
        //'title'                 => 'required | alpha_num',
        'company_id'            => 'required',
        'manager_id'            => 'required',
        'description'           => 'required',
        'category_id'           => 'required',
        'started_developing_at' => 'required',
        'version'               => 'required',
        'logo' => 'image',
        'img1' => 'image',
        'img'  => 'image',
        'img'  => 'image',
        'apk'  => 'apk',
        'ipa'  => 'ipa'
      ),
      array(
        'apk'       => '※ .apkファイルを選択してください',
        'ipa'       => '※ .ipaファイルを選択してください',
        'required'  => '※入力されていません',
		'required_name'  => '※モック名が入力されていません',
		'required_dev'  => '※モック名が入力されていません',
		'required_version' => '※バージョンが入力されていません',
        'alpha_num' => '※英数字のみでお願いします'
      )
    );

    // 引っかかったらエラーメッセージとともにリダイレクト
    if ($validator->fails()){
      return Redirect::to('/app-manage/add')->withErrors($validator);
    }


    $logo_dir = Config::get('const.logo_dir');
    $img_dir = Config::get('const.img_dir');
    $ipa_dir = Config::get('const.ipa_dir');
    $apk_dir = Config::get('const.apk_dir');

    // アップロードとDB追加の準備
    $this->s3 = App::make('aws')->get('s3');

    $logo_path = $this->createfilePath($logoImage,$logo_dir);
    $applicationData['logo_path'] = $logo_path;
    $this->uploadS3($logoImage,$logo_dir);

    $image1_path = $this->createfilePath($appImage1,$img_dir,'_img1');
    $applicationData['image1_path'] = $image1_path;
    $this->uploadS3($appImage1,$img_dir,'_img1');

    $image2_path = $this->createfilePath($appImage2,$img_dir,'_img2');
    $applicationData['image2_path'] = $image2_path;
    $this->uploadS3($appImage2,$img_dir,'_img2');

    $image3_path = $this->createfilePath($appImage3,$img_dir,'_img3');
    $applicationData['image3_path'] = $image3_path;
    $this->uploadS3($appImage3,$img_dir,'_img3');

    $apk_path = $this->createfilePath($apkFile,$apk_dir);
    $applicationData['apk_path'] = $apk_path;
    $this->uploadS3($apkFile,$apk_dir);


    // ipaとplistは少し特殊
    if($ipaFile !== null){
      $ipa_path = Config::get('const.s3_url').Config::get('const.env').Config::get('const.ipa_dir').'/'.$this->gameTitle.'.plist';
      $applicationData['ipa_path'] = $ipa_path;
      // plistファイルを一旦作成
      $localPlistPath = $this->createPlist($applicationData['name'],$applicationData['version']);
      $this->uploadS3($ipaFile,$ipa_dir);
      $this->putObject($ipa_dir.'/'.$this->gameTitle.'.plist',$this->gameTitle.'.plist');
      File::delete($this->gameTitle.'.plist');
    }
	
	Session::forget('name');
	Session::forget('company_id');
	Session::forget('manager_id');
	Session::forget('description');
	Session::forget('category_id');
	Session::forget('started_developing_at');
	Session::forget('will_release_at');
	Session::forget('version');

    $application =  Application::create($applicationData);

    $view = View::make('app_add_comp');
	$data = array(
      'title'=>'Mock Store 新しいアプリ'
    );
    $view->nest('head', 'head', $data);
	$view->nest('header', 'header');
    $view->nest('global_nav', 'global_nav');
	return  $view->with($applicationData);
  }

  public function edit($applicationId){
  }

  private function createFilePath($file,$dir,$prefix = ''){
    if($file !== null){
      $s3_url_env = Config::get('const.s3_url').Config::get('const.env').$dir;
      $filename = $this->gameTitle.$prefix.'.'.$file->getClientOriginalExtension();
      return $s3_url_env.'/'.$filename;
    } else {
      return '';
    }
  }

  private function uploadS3($file,$dir,$prefix = ''){
    if($file === null){ return false; }
    $filename = $this->gameTitle.$prefix.'.'.$file->getClientOriginalExtension();

    $this->putObject($dir.'/'.$filename ,$file->getRealPath());
  }

  private function putObject($dir_filename,$sourcePath){
    try{
      $this->s3->putObject(array(
        'Bucket'     => 'mockstore',
        'Key'        => Config::get('const.env').$dir_filename,
        'SourceFile' => $sourcePath,
        'ACL'        => 'public-read',
      ));
      return true;
    } catch (S3Exception $e) {
      return false;
    }
  }

  private function createPlist($name,$version){
    $filename = 'template.plist';
    $plist = @simplexml_load_file($filename);
    if($plist){
      $dom = new DOMDocument('1.0');
      $dom->formatOutput = true;

      $filename =$this->gameTitle.'.plist';

      $dict = $plist->dict->array->dict;
      $assets = $dict->array;
      $assets->dict->addChild('key','url');
      $url = Config::get('const.s3_url').Config::get('const.env').Config::get('const.ipa_dir').'/'.$this->gameTitle.'.ipa';
      $assets->dict->addChild('string',$url);

      $metadata = $dict->dict;
      $metadata->addChild('key','bundle-version');
      $metadata->addChild('string',$version);
      $metadata->addChild('key','title');
      $metadata->addChild('string', $name);

      $dom->loadXML($plist->asXML());
      $dom->encoding = 'utf-8';
      $dom->save($filename);

      return true;
    } else {
      return false;
    }
  }

  // バリデーションの拡張
  private function extendValidation(){
    Validator::extend('apk', function($attribute, $value, $parameters)
    {
      return $value->getClientOriginalExtension() == 'apk';
    });
    Validator::extend('ipa', function($attribute, $value, $parameters)
    {
      return $value->getClientOriginalExtension() == 'ipa';
    });
  }

}
