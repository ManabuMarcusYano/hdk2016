<?php echo $head; ?>
<img src="img/logo.png" class="login_logo" />
<div class = "login_box">
	<form action = "/login" method = "post">
    <input type="text" name="username" maxlength="50" placeholder="ユーザー名(本名)" class = "username_box id_box" />
    <!--<input type="text" name="username" maxlength="50" placeholder="所属会社" class = "username_box id_box" />-->
   
    <select name = "company" class = "username_box id_box">
      <option value = "サンプル1" label = "--所属会社--">--所属会社--</option>
      <option value = "サンプル2" label = "アプリボット">アプリボット</option>
      <option value = "サンプル3" label = "サムザップ">サムザップ</option>
      <option value = "サンプル4" label = "Cyber X">Cyber X</option>
      <option value = "サンプル5" label = "他/無所属">他/無所属</option>
    </select>

    <!--<input type="text" name="role" maxlength="50" placeholder="ユーザーレベル" class = "username_box id_box" />-->
    
    <select name = "role" class = "username_box id_box">
      <option value = "サンプル1" label = "--ユーザーレベル--">--ユーザーレベル--</option>
      <option value = "サンプル2" label = "一般ユーザー">一般ユーザー</option>
      <option value = "サンプル3" label = "責任者/開発担当者">責任者/開発担当者</option>
    </select>
    
	<input type="text" name="mail_address" maxlength="50" placeholder="メールアドレス" class = "id_box" />
    <input type="text" name="password" maxlength="30" placeholder="パスワード" class = "password_box" />
    <input type="text" name="password" maxlength="30" placeholder="パスワード(確認)" class = "password_box" />
    <input type="submit" value="ユーザー登録" class = "login_button" />
    </form>
</div>
<p class = "can_not_login"><a href="/login">ログイン画面にもどる</a></p>
<?php //echo $footer; ?>
<p class="copyright">Applibot, Inc.<p>
