<?php echo $head; ?>
<?php echo $header; ?>
<div id="app_wrapper">
  <div id="app_manage">
    <form id="addApp" action="/app-manage/add" method="post" enctype="multipart/form-data">
      <div id="app_manage_top">
        <div id="logo_file">
          <div id="logo_preview">
            アプリイメージをドロップ
            <input type="file" name="logo_file" accept="image/*" id="logo_file_hidden" />
          </div>
        </div>
        <div id="app_title_file_wrap">
          <div id="app_title_form">
            <input type="text" name="name" value="" placeholder="タイトル" /> <?php echo $errors->first('name'); ?><br />
            <input type="text" name="title" value="" placeholder="英名" /> <?php echo $errors->first('title'); ?>
          </div>
          <div id="app_files">
            <div id="apk_file">
              Android(.apk):<input type="file" name="apk_file"> <?php echo $errors->first('apk'); ?>
            </div>
            <div id="ipa_file">
              iPhone(.ipa):<input type="file" name="ipa_file"> <?php echo $errors->first('ipa'); ?>
            </div>
          </div>
        </div>
      </div>

      <div id="app_images">
        <div id="app_image1" class="app_image">
          <div>
            アプリイメージ1：
          </div>
          <div class="app_image_preview">
            ここにドラッグ&amp;ドロップ
            <input type="file" name="app_image1" accept="image/*" class="app_image_input">
          </div>
        </div>

        <div id="app_image2" class="app_image">
          <div>
            アプリイメージ2：
          </div>
          <div class="app_image_preview">
            ここにドラッグ&amp;ドロップ
            <input type="file" name="app_image2" accept="image/*" class="app_image_input">
          </div>
        </div>

        <div id="app_image3" class="app_image">
          <div>
            アプリイメージ3：
          </div>
          <div class="app_image_preview">
            ここにドラッグ&amp;ドロップ
            <input type="file" name="app_image3" accept="image/*" class="app_image_input">
          </div>
        </div>

      </div>

      <div id="company_id">
        会社：
        <select name="company_id">
          <option selected="selected" value="">会社を選択</option>
          <?php foreach($companies as $company){ ?>
            <option value="<?php echo $company->id ?>"><?php echo $company->name ?></option>
          <?php } ?>
        </select>
        <?php echo $errors->first('company_id'); ?>
      </div>

      <div id="manager_id">
        管理者：
        <select name="manager_id">
          <option selected="selected" value="">管理者を選択</option>
          <?php foreach($users as $user){ ?>
            <option value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
          <?php } ?>
        </select>
        <?php echo $errors->first('manager_id'); ?>
      </div>

      <div id="description">
        説明：<textarea name="description"></textarea>
        <?php echo $errors->first('description'); ?>
      </div>

      <div id="category_id">
        カテゴリ：
        <select name="category_id">
          <option selected="selected" value="">カテゴリを選択</option>
          <?php foreach($categories as $category){ ?>
            <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
          <?php } ?>
        </select>
        <?php echo $errors->first('category_id'); ?>
      </div>
      <div id="developing">
        <div id="started_developing_at">
          開発開始日：<input type="date" name="started_developing_at" value="2014-04-01" />  <?php echo $errors->first('started_developing_at'); ?>
        </div>
        <div id="will_release_at">
          リリース予定日<input type="date" name="will_release_at" value="2015-04-01" />
        </div>
      </div>

      <div id="version">
        バージョン<input type="text" name="version" value="" />  <?php echo $errors->first('version'); ?>
      </div>

      <input type="submit" name="regist" value="登録" />
    </form>
  </div>
</div>
