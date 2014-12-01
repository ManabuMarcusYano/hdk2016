<?php echo $head; ?>
<img src="img/logo.png" class="login_logo" />
<div class = "login_box">
	<form action = "/login" method = "post" id="login">
	<input type="text" name="mail_address" maxlength="50" placeholder="メールアドレス" class = "form_box mail_address" value="<?php echo Session::get('mail_address'); ?>"/>
    <input type="password" name="password" maxlength="30" placeholder="パスワード" class = "form_box password"  value="<?php echo Session::get('password'); ?>" />
    <input type="submit" value="ログイン" class = "login_button" />
    </form>
</div>
<!--<p class = "can_not_login"><a href="/signin">新規登録はこちら</a></p>-->
<p class = "can_not_login"><a href="download.html">Mock Storeアプリのダウンロード</a></p>
<p class = "can_not_login"><!--<a href="">ログインができない方</a>--></p>
<?php //echo $footer; ?>
<p class="copyright">Applibot, Inc.<p>
