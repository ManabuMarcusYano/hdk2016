<?php echo $head; ?>
<?php echo $header; ?>
<div id="wrapper">
  <div style="height: 100px;"></div>
  <form id="addApp" action="/app-manage/add" method="post">
    <div>
      <div id="logo_preview" style="width: 100px; height: 100px; background: white;"></div>
    </div>
    <div>
      <input type="file" name="logo_file">
    </div>
    <div>
      タイトル：<input type="text" name="name" value="" />
    </div>
    <div>
      会社：
      <select name="company_id">
        <option selected="selected">会社を選択</option>
        <?php foreach($companies as $company){ ?>
          <option value="<?php echo $company->id ?>"><?php echo $company->name ?></option>
        <?php } ?>
      </select>
    </div>
    <div>
      マネージャー：<input type="text" name="manager_id" value="" />
    </div>
    <div>
      説明：<textarea name="diescription"></textarea>
    </div>
    <div>
      カテゴリ：<input type="text" name="category_id" value="">
    </div>
    <div>
      開発開始日：<input type="date" name="started_develop_at" value="2015/04/01" value="" />
    </div>
    <div>
      リリース予定日<input type="text" name="will_release_at" value="">
    </div>
    <div>
      バージョン<input type="text" name="version" value="">
    </div>

    <input type="submit" name="reist" value="登録">
  </form>

    //var_dump($companies);


</div>
