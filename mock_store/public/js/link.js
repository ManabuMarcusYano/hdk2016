$(document).ready(function() {	
	// OSの取得
	var ua = navigator.userAgent;
	var os = "";
	if(ua.indexOf("iPod") > 0 || ua.indexOf("iPhone") > 0){
		os = "iOS";
	} else if (ua.indexOf("Android") > 0){
		os = "Android"
	}

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
				window.location.href = "itms-services://?action=download-manifest&url=" + data.ipa_path;
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

		if(confirm(title + " (" + os + ")を端末にインストールします")){
			$.ajax({
				type: "GET",
				scriptCharset: 'utf-8',
				dataType:'json',
				url: id + "/get",
			}).done(function(data) {
			  	// 絶対パス指定が必要
				window.location.href = data.apk_path
			});
		}
		return false;
	});
	
});