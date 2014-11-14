<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	</head>
<body>
<div class = "login_box">
        <p>{{$username}}さん</p>
        <p>Mock Storeのパスワードが登録・変更されました。<br />
        このメールアドレスになります<br />
        あなたのパスワードは<br />
        {{$password}}<br/>
        です。<br />
        下記リンクからログインしてください。</p>
        <p>
        <div class = "signin_button"><a href="http://mockstore.applibot.co.jp/login">ログイン</a></div>
        </div>        
        <p class = "can_not_login"><a href="mailto:mockstore@applibot.co.jp?subject=Mock Storeお問い合わせ">お問い合わせ</a></p>
</body>
</html>