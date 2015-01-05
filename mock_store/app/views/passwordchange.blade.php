<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	</head>
<body>
<div>
    <p>{{$username}}さん</p>
    <p>Mock Storeのパスワードが登録・変更されました。<br />
    IDはこのメールアドレスになります<br />
    あなたのパスワードは<br />
    {{$password}}<br/>
    です。<p>
    <p>【PC版】下記リンクからログインしてください。<br />
	<a href="http://mockstore.applibot.co.jp/login">http://mockstore.applibot.co.jp/login</a>
    </p>
    <p>【アプリ版】下記リンクからアプリをダウンロードしてください。<br />
	<a href="http://mockstore.applibot.co.jp/download.html">http://mockstore.applibot.co.jp/download.html</a>
    </p>      
    <p class = "can_not_login"><a href="mailto:mockstore@applibot.co.jp?subject=Mock Storeお問い合わせ">お問い合わせ</a></p>
</div>  
</body>
</html>