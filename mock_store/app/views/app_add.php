<?php echo $head; ?>
<?php echo $header; ?>
<div id="wrapper">
  <div style="height: 100px;"></div>
  <form id="addApp" action="/app-manage/add" method="post">
    <div>
      <div id="logo_preview" style="width: 100px; height: 100px; background: white;"></div>
    </div>
    <div>
      <input type="file" name="logo_file" accept="image/*" multiple />
    </div>
    <div>
      タイトル：<input type="text" name="name" value="" />
    </div>

    <div>
      <input type="file" name="apk_file">
    </div>
    <div>
      <input type="file" name="ipa_file">
    </div>


    <div>
      <input type="file" name="app_images" accept="image/*">
    </div>

    <div>
      会社：
      <select name="company_id">
        <option selected="selected" value="0">会社を選択</option>
        <?php foreach($companies as $company){ ?>
          <option value="<?php echo $company->id ?>"><?php echo $company->name ?></option>
        <?php } ?>
      </select>
    </div>
    <div>
      管理者：
      <select name="manager_id">
        <option selected="selected" value="0">管理者を選択</option>
        <?php foreach($users as $user){ ?>
          <option value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
        <?php } ?>
      </select>
    </div>
    <div>
      説明：<textarea name="description"></textarea>
    </div>
    <div>
      カテゴリ：
      <select name="manager_id">
        <option selected="selected" value="0">カテゴリを選択</option>
        <?php foreach($categories as $category){ ?>
          <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        <?php } ?>
      </select>
    </div>
    <div>
      開発開始日：<input type="date" name="started_developing_at" value="2014-04-01" />
    </div>
    <div>
      リリース予定日<input type="date" name="will_release_at" value="2015-04-01" />
    </div>
    <div>
      バージョン<input type="text" name="version" value="" />
    </div>

    <input type="submit" name="regist" value="登録" />
  </form>


</div>
