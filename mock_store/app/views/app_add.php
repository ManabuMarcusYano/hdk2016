<?php echo $head; ?>
<?php echo $header; ?>
<div class = "ranking_mod_break"></div>
<?php if($errors->count() > 0){ ?>
  <div class = "maintenance_box alert_box">
	  <p>
			<?php
            	if($errors->has('name')){ echo "※名前が入力されていません<br />" ;}
				if($errors->has('company_id')){ echo "※会社が選択されていません<br />";}
            	if($errors->has('manager_id')){ echo "※管理者が入力されていません<br />";}
            	if($errors->has('description')){ echo "※モックの説明が入力されていません<br />";}
            	if($errors->has('category_id')){ echo "※カテゴリが入力されていません<br />";}
				if($errors->has('started_developing_at')){ echo "※開発開始日が入力されていません<br />";}
				if($errors->has('version')){ echo "※バージョンが入力されていません<br />";}
				if($errors->has('apk')){ echo "※apkが選択されていません<br />";}
				if($errors->has('ipa')){ echo "※ipaが選択されていません<br />";}	
            ?>
	  </p>
  </div>
<?php }?>

<div class = "wrapper" >
<form id="addApp" action="/app-manage/add" method="post" enctype="multipart/form-data">
  <div id="app_manage_top">
      <div id="app_title_file_wrap">
          <div id="app_title_form">
            <input class = "form_box" type="text" name="name" value="<?php echo Session::get('name'); ?>" placeholder="モック名 or プロジェクト名" /><br />
            <!--<input class = "form_box" type="text" name="title" value="" placeholder="英名" />-->
          </div>
          
          <div class = "logo_file app_img_container">
              <p class = "drop_here">Enterpise ipa (iPhone)</p>
              <p class = "ipa_name"></p>
              <input type="file" name="ipa_file" accept = ".ipa" class="icon_image_input ipa" />
          </div>
          
          <div class = "logo_file app_img_container">
              <p class = "drop_here">署名付き apk (Android)</p>
              <p class = "apk_name"></p>
              <input type="file" name="apk_file" accept = ".apk" class="icon_image_input apk" />
          </div>
          
          <div class = "logo_file app_img_container">
              <p class = "drop_here">アイコン(152 x 152)</p>
              <input type="file" name="logo_file" accept="image/*" id="logo_file_hidden" class="icon_image_input" />
			  <!--<?php if(Session::has('logo_path')){ ?> <img src="<?php echo Session::get('logo_path'); ?>"> <?php }?>-->
          </div>
          
      </div>
  </div>
      
  
        

      <div class = "app_imgs">
          <div class="app_image_preview app_img_container">
            <p class = "drop_here">スクリーンショット(320 x 568)</p>
            <input type="file" name="app_image1" accept="image/*" class="app_image_input">
          </div>

          <div class="app_image_preview app_img_container">
            <p class = "drop_here">スクリーンショット(320 x 568)</p>
            <input type="file" name="app_image2" accept="image/*" class="app_image_input">
          </div>

          <div class="app_image_preview app_img_container">
            <p class = "drop_here">スクリーンショット(320 x 568)</p>
            <input type="file" name="app_image3" accept="image/*" class="app_image_input">
          </div>
        
      </div>

  <div id = "company_id">
    <select class = "form_box" name = "company_id">
      <option selected="selected" value = "">--会社--</option>
      <?php foreach($companies as $company){ ?>
          <option value="<?php echo $company->id ?>"<?php if(Session::get('company_id') == $company->id){ echo "selected"; } ?>><?php echo $company->name?></option>
      <?php } ?>
    </select>
  </div>

  <div id = "manager_id">
    <select class = "form_box" name="manager_id">
      <option selected = "selected" value="">--管理者--</option>
      <?php foreach($users as $user){ ?>
        <option value = "<?php echo $user->id ?>"<?php if(Session::get('manager_id') == $user->id){ echo "selected"; } ?>><?php echo $user->username ?></option>
      <?php } ?>
    </select>
  </div>

  <div id = "description">
	<textarea name="description" class = "message_box description_box" placeholder = "モックの説明(全角1000文字以内)"><?php echo Session::get('description'); ?></textarea>
  </div>
        
  <div id = "category_id">
    <select class ="form_box" name="category_id">
      <option selected="selected" value="">--カテゴリ--</option> 
      <?php foreach($categories as $category){ ?>
          <option value="<?php echo $category->id ?>"<?php if(Session::get('category_id') == $category->id){ echo "selected"; } ?>><?php echo $category->name ?></option>
      <?php } ?>
    </select>
    
  </div>
      
  <div id = "developing">
	<div id = "started_developing_at">
		<a class = "date_index">開発開始日</a>
        <input class = "form_box form_date" type="date" name="started_developing_at" value="<?php if(empty(Session::get('started_developing_at'))){ echo date('Y-m-d'); }else{ echo Session::get('started_developing_at'); } ?>" />
		
    </div>
    
    <div id = "will_release_at">
    <a class = "date_index">ストア掲載期限</a>
        <input class = "form_box form_date" type="date" name="will_release_at" value="<?php if(empty(Session::get('will_release_at'))){ echo date('Y-m-d',strtotime("+1 day"));; }else{ echo Session::get('will_release_at'); } ?>"/>
    </div>
  </div>
  
  <div id = "version">
	<input class = "form_box" type="text" name="version" value="<?php echo Session::get('version'); ?>" placeholder = "バージョン" />
  </div>
  
  <div id = "event_id" class = "form_box">
  	<input class = "" type="radio" name="event_id" value="NULL" checked="checked"/>イベント指定なし
  	<?php foreach($events as $event){ ?>
  		<input class = "" type="radio" name="event_id" value="<?php echo $event->id; ?>" <?php if(Session::get('event_id') == $event->id){ echo "checked"; } ?> /><?php echo $event->title; ?>
	<?php } ?>
  </div>
  
  <input class = "signin_button" type="submit" name="regist" value="モック登録" />
</form>
</div>

<?php echo $global_nav; ?>