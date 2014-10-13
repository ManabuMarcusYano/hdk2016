<?php echo $head; ?>
    <link rel="stylesheet" type="text/css" href="../../public/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/common.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/login.css" />

<img src="img/logo.png" class="login_logo" />
<div class = "login_box">
	<form action = "/">
	<input type="text" name="id" maxlength="20" placeholder="ID" class = "id_box" />
    <input type="text" name="password" maxlength="20" placeholder="Password" class = "password_box" />
    <input type="submit" value="LOGIN" class = "login_button" />
    </form>
	<!--<div class = "login_button"><p>LOGIN</p></div>-->
</div>
<p class = "can_not_login"><a href="">ログインができない方</a></p>
<?php //echo $footer; ?>
<p class="copyright">CyberAgent<p>
