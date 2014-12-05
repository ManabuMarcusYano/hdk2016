var isApp = false;
$(window).load(function() {
	// OSの取得
	var ua = navigator.userAgent;
	var os = "";
	if(ua.indexOf("iPod") > 0 || ua.indexOf("iPhone") > 0　|| ua.indexOf("iPad") > 0){
		os = "iOS";
	} else if (ua.indexOf("Android") > 0){
		os = "Android";
	}

	if(ua.indexOf("MockStore") > 0){
		location.href = "native://getUserData/";
	}

	$("#login").submit(function(){
		var mail_address = $(this).children(".mail_address").val();
		var password = $(this).children(".password").val();
		if(mail_address != "" && password != "" && ua.indexOf("MockStore") > 0){
			location.href = "native://setUserData/" + mail_address + "/" +password;
			return (os == "iOS");
		}
		return true;
	});

	// 新規登録
	$(".signin_button").click(function(){
		var error = "";
		var username = $("#username").val();
		var company = $("#company").val();
		var role = $("#role").val();
		var mail_address = $("#mail_address").val();
		// var password = $("#password").val();
		// var password_confirmation = $("#password_confirmation").val();

		if(!username){ error += "・ユーザー名を入力してください\n" ; }
		if(company == 0){ error += "・会社を選択してください\n" ; }
		if(role == 0){ error += "・ユーザーレベルを選択してください\n" ; }
		if(!username){ error += "・メールアドレスを入力してください\n" ; }
		// if(!password){ message += "・パスワードを入力してください\n" ; }
		// if(password && password != password_confirmation){ message += "・パスワードが一致しません\n" ; }

		if(error){
			alert(error);
			return false;
		}
		return true;
	});

	// レビューバリデート
	$("#post_review").click(function(){
		var error = "";
		var title = "";
		var message = "";
		var confirmation = "";
		title = $(this).parent().find("input[name=title]").val();
		message = $(this).parent().find("textarea[name=message]").val();

		var completion = $("#completion").find("input[name=completion]").val();
		// var interest = $("#interest").find("input[name=interest]").val();
		// var potence = $("#potence").find("input[name=potence]").val();

		//confirmation = "下記の内容でレビューを投稿しますか？\n" + "完成度:" + completion + "\n面白さ:" + interest + "\n将来性:" + potence + "\n" + title + "\n" + message; 
		if(completion != undefined) {
			confirmation = "下記の内容でレビューを投稿しますか？\n" + "評価:" + completion + "\n" + title + "\n" + message; 
		}else{
			confirmation = "下記の内容でレビューを投稿しますか？\n" + title + "\n" + message; 
		}

		if(!title){ error += "タイトルを入力してください\n"; }
		if(!message){ error += "レビュー詳細を入力してください\n"; }
		if(error){
			alert(error);
			return false;
		}
		if(confirm(confirmation)){
			return true;
		}
		return false;
		
	});

	// 検索開始
	$(".search_icon").click(function(){
		var keyword = $(".search_box").val();
		location.href = "/search?keyword="+keyword;
	});

	// 各セル
	$(".ranking_mod").click(function(){
		var id = $(this).attr("id"); 
		window.location.href = "/" + id;
		return true;
	});

	// iOS DLボタン
	$(".btn_ios").click(function(){
		var ranking_mod = $(this).parent().parent();
		var id = ranking_mod.attr("id");
		var title = ranking_mod.children(".ranking_upper").children(".ranking_info").children(".app_title").text();
		if(os != "iOS"){
			alert("お使いの端末ではアプリをインストールすることができません");
			return false;
		}
		if(confirm(title + " (" + os + ")を端末にインストールします")){
			$.ajax({
				type: "GET",
				scriptCharset: 'utf-8',
				dataType:'json',
				url: id + "/get",
			}).done(function(data) {
			  	// 絶対パス指定が必要
			  	if(data != ""){
					window.location.href = "itms-services://?action=download-manifest&url=" + data.ipa_path;
				}else{
					alert("ipaの準備ができていないようです");
				}
			});
		}
		return false;
	});

	// Android DLボタン
	$(".btn_android").click(function(){
		var ranking_mod = $(this).parent().parent();
		var id = ranking_mod.attr("id");
		var title = ranking_mod.children(".ranking_upper").children(".ranking_info").children(".app_title").text();
		if(os != "Android"){
			alert("お使いの端末ではアプリをインストールすることができません");
			return false;
		}

		if(confirm(title + " (" + os + ")を端末にダウンロードします")){
			$.ajax({
				type: "GET",
				scriptCharset: 'utf-8',
				dataType:'json',
				url: id + "/get",
			}).done(function(data) {
			  	// 絶対パス指定が必要
			  	if(data != ""){
					window.location.href = data.apk_path;
				}else{
					alert("apkの準備ができていないようです");
				}
			});
		}
		return false;
	});

	$(".btn_mock_stoe_app_ios").click(function(){
		if(os != "iOS"){
			alert("お使いの端末ではアプリをインストールすることができません");
			return false;
		}
	});

	$(".btn_mock_stoe_app_android").click(function(){
		if(os != "Android"){
			alert("お使いの端末ではアプリをインストールすることができません");
			return false;
		}
	});

	// レビュー削除
	$(".action_delete").click(function(){
		var id = $(this).parent().parent().attr("comment_id");
		if(confirm("レビューを削除してもよろしいですか？")){
			location.href = id + "/delete/review";
		}
	});

});

function getUserDataFromNative(mail_address, password){
		mail_address_val = $('form').children('.mail_address').val();
		password_val = $('form').children('.password').val();
		if(mail_address_val == ""){
			$('form').children('.mail_address').val(mail_address);
		}
		if(password_val == ""){
			$('form').children('.password').val(password);
		}
		// alert("mail_address from native : " + mail_address);
}
