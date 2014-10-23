$(document).ready(function() {

	// テキストリア
	//$(".message_box").autosize();

    // バナー
	$(".banner").slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: false,
		dots: false,
		easing: true
	});

	// アプリ画像
	$(".app_imgs").slick({
		infinite: false,
		slidesToShow: 1.86,
		slidesToScroll: 2,
		autoplay: false,
		arrows: false,
		dots: false,
		adaptiveHeight: true,
		touchThreshold: 20
	});
	
	// タブ
	$(".tab li").click(function(){
		var num = $(".tab li").index(this);
		$(".wrapper").addClass("disnon");
		$(".wrapper").eq(num).removeClass("disnon");
		$(".tab li").removeClass("select");
		$(".tab li").addClass("deselect");
		$(this).addClass("select");
		$(this).removeClass("deselect");
	});
	
	// レート
	$(".app_star").raty({
		halfShow     : true,
		readOnly     : true,
		starHalf     : 'lib/raty-2.7.0/lib/images/star-half.png',
   		starOff      : 'lib/raty-2.7.0/lib/images/star-off.png',
    	starOn       : 'lib/raty-2.7.0/lib/images/star-on.png',
  		score: function() {
    	return $(this).attr('data-score');
  		}
	});

	// レート レビュー
	$("#review_form .app_star").raty({
		halfShow     : true,
		readOnly     : false,
		starHalf     : 'lib/raty-2.7.0/lib/images/star-half.png',
   		starOff      : 'lib/raty-2.7.0/lib/images/star-off.png',
    	starOn       : 'lib/raty-2.7.0/lib/images/star-on.png',
  		score: function() {
    	return $(this).attr('data-score');
    	}
  	});

	// イイネ
	$(".action_like").click(function(){
		$(this).attr({src : "img/btn_like.png"});
		return false;
	});

	// フィードバック
	$(".comment").click(function(){
		var comment = $(this);
		var id = $(this).attr("comment_id");
		$.ajax({
				type: "GET",
				scriptCharset: 'utf-8',
				dataType:'json',
				url: id + "/feedbacks/get",
			}).done(function(data) {
				var count = Object.keys(data).length; //フィードバック数	
				for(var i = 0 ; i < count ; i++){
					var json = data[i];
					var html = '<div class = "feedback"><p><span class = "feedback_title">' + json.title + '</span><br />' + json.reviewer.name + ' - ' + formatDate(json.created_at) + '</p>' + json.message + '</div>';
					comment.append(html);
					comment.children(".feedback").slideDown();					
				}
				comment.off();
			});
	});

	// レビューを書く
	$(".btn_write_review").click(function(){
		if(isShowingModal == false){
			hideOtherButtonsAndShowModal();
			showReviewModalDialog();
			var title = "";
			var message = "";
			//title = $(this).parent().parent().children(".ranking_upper").children(".ranking_info").children(".app_title").html();


			//if(!title){
				title = $(this).attr("name");
			//}
			message = title + "をプレイしてレビューしよう！";
			$(".message_box").attr({placeholder : message});
		}
		return false;
	});

	// ヘッダ
	var isShowingModal = false;
	$(".list_category, .search_cancel").click(function(){
		if(isShowingModal == false){
			switch(state){
				case t_state.ONLY_BACK :
					history.back();
					break;
				case t_state.NORMAL : 
				default :
					$(".modal_sort").show();
					hideOtherButtonsAndShowModal();
					hideReviewModalDialog();
				break;
			}
		}else{
			switch(state){
				case t_state.ONLY_BACK :
					showOtherButtonsAndHideModal();
					$(".list_category").children("a").children("img").attr({ src : "img/icon_back.png"});
					break;
				case t_state.NORMAL : 
				default :
					showOtherButtonsAndHideModal();
					break;
			}
		}
	});

	$(".list_search").click(function(){
		if(isShowingModal == false){
			$(".modal_search").show();
			hideOtherButtonsAndShowModal();
			hideReviewModalDialog();
		}
	});

	$(".list_user").click(function(){
		if(isShowingModal == false){
			$(".modal_user").show();
			hideOtherButtonsAndShowModal();
			hideReviewModalDialog();
		}
	});

	function hideOtherButtonsAndShowModal(){
		isShowingModal = true;
		$("#modal_screen").slideDown();
		$(".list_category").children("a").children("img").attr({ src : "img/icon_back.png"});
		$(".list_search").css("visibility" , "hidden");
		$(".list_user").css("visibility" , "hidden");
	}

	function showOtherButtonsAndHideModal(){
		isShowingModal = false;
		$(".modal_sort").hide();
		$(".modal_search").hide();
		$(".modal_user").hide();
		$("#modal_screen").slideUp();
		$(".list_category").children("a").children("img").attr({ src : "img/icon_category.png"});
		$(".list_search").css("visibility" , "visible");
		$(".list_user").css("visibility" , "visible");
	}

	function showReviewModalDialog(){
		$("#review_form").show();
	}

	function hideReviewModalDialog(){
		$("#review_form").hide();
	}

	// 日付のフォーマット
	function formatDate(date){
		var temp = date.split(" ");
		temp = temp[0].split("-");
		date = temp[0] + "/" + temp[1] + "/" + temp[2];
		return date;
	} 
});

var t_state = {
		NORMAL : 0,
		ONLY_BACK : 1,
	}
var state = t_state.NORMAL;