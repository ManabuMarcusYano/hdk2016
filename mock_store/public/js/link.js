$(document).ready(function() {	
	// OSの取得
	var ua = navigator.userAgent;
	alert(ua);
	var os = "";
	if(ua.indexOf("iPod") > 0 || ua.indexOf("iPhone") > 0　|| ua.indexOf("iPad") > 0){
		os = "iOS";
	} else if (ua.indexOf("Android") > 0){
		os = "Android"
	}

	$("form").submit(function(){
		var mail_address = $(this).children(".mail_address").val();
		var password = $(this).children(".password").val();
		if(mail_address != undefined && password != undefined){
			if(os == "iOS"){
				open("native://setUserData/" + mail_address + "/" +password);
			}else if(os == "Android"){
				//jsInterface.setUserData(mail_address, password);
				location.href = "native://setUserData/" + mail_address + "/" +password;
				return false;
			}
		}
		return true;
	});
	
	if(os == "iOS"){
		location.href = "native://getUserData/";
	}else if(os == "Android"){
		//jsInterface.getUserData();
		location.href = "native://getUserData/";
	}


	// 新規登録
	$(".signin_button").click(function(){
		var message = "";
		var username = $("#username").val();
		var company = $("#company").val();
		var role = $("#role").val();
		var mail_address = $("#mail_address").val();
		// var password = $("#password").val();
		// var password_confirmation = $("#password_confirmation").val();

		if(!username){ message += "・ユーザー名を入力してください\n" ; }
		if(company == 0){ message += "・会社を選択してください\n" ; }
		if(role == 0){ message += "・ユーザーレベルを選択してください\n" ; }
		if(!username){ message += "・メールアドレスを入力してください\n" ; }
		// if(!password){ message += "・パスワードを入力してください\n" ; }
		// if(password && password != password_confirmation){ message += "・パスワードが一致しません\n" ; }

		if(message){
			alert(message);
			return false;
		}
		return true;
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
	
});

function getUserDataFromNative(mail_address, password){
		alert("mail_address");
		$('form').children('.mail_address').val(mail_address);
		$('form').children('.password').val(password);
}