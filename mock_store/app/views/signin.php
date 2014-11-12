<?php echo $head; ?>
<img src="img/logo.png" class="login_logo" />
<div class = "login_box">
	<?php if(!empty(Session::get('error'))){ ?><div class = "form_box error"><?php echo Session::get('error'); ?></div><?php } ?>
	<form action = "/register" method = "post">
    <input type="text" name="username" maxlength="50" placeholder="ユーザー名(本名)" class = "form_box" id ="username" value = "<?php echo Input::old('username'); ?>" autofocus required />
   
    <select name = "company" class = "form_box" id = "company">
        <option value = "0" label = "--会社--">--会社--</option>
    	<?php foreach($companies as $company){?>
    		<option value = "<?php echo $company->id; ?>" label = "<?php echo $company->name; ?>"<?php if(Input::old('company') == $company->id){ echo "selected"; } ?>><?php echo $company->name; ?></option>
        <?php } ?>
    </select>
    
    <select name = "role" class = "form_box" id = "role" >
        <!--<option value = "user" label = "--ユーザーレベル--">--ユーザーレベル--</option>-->
        <option value = "user" label = "一般ユーザー">一般ユーザー</option>
        <!--<option value = "owner" label = "開発責任者">開発責任者</option>-->
    </select>
    
	<input type="text" name="mail_address" maxlength="50" placeholder="メールアドレス" class = "form_box mail_address_box" id = "mail_address"  value = "<?php echo Input::old('mail_address'); ?>" required />
    	
    <select name = "domain" class = "form_box domain_box">
    	<?php foreach($companies as $company){?>
    		<option value = "@<?php echo $company->domain; ?>" label = "@<?php echo $company->domain; ?>" <?php if(Input::old('domain') == "@".$company->domain){ echo "selected"; } ?>>@<?php echo $company->domain; ?></option>
        <?php } ?>
    </select>
    
    <!--<input type = "text" name = "password" maxlength="30" placeholder="パスワード" class = "form_box" id = "password" required />
    <input type = "text" name = "password_confirmation" maxlength="30" placeholder="パスワード(確認)" class = "form_box" id = "password_confirmation" required />-->
    <input type = "submit" value = "ユーザー登録" class = "signin_button" />
    </form>
</div>
<p class = "can_not_login"><a href="/login">ログイン画面にもどる</a></p>
<?php //echo $footer; ?>
<p class="copyright">Applibot, Inc.<p>
