<?php echo $head; ?>
<img src="img/logo.png" class="login_logo" />
<div class = "login_box">
	<form action = "/login" method = "post">
	<input type="text" name="mail_address" maxlength="50" placeholder="ID" class = "id_box" />
    <input type="text" name="password" maxlength="30" placeholder="Password" class = "password_box" />
    <input type="submit" value="LOGIN" class = "login_button" />
    </form>
</div>
<p class = "can_not_login"><a href="/signin">新規登録はこちら</a></p>
<p class = "can_not_login"><!--<a href="">ログインができない方</a>--></p>
<?php //echo $footer; ?>
<p class="copyright">Applibot, Inc.<p>
