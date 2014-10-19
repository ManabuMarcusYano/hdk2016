$(document).ready(function() {
    // バナー
	$(".banner").slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: false
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

	// ヘッダ
	var isShowingModal = false;

	$(".list_category, .search_cancel").click(function(){
		if(isShowingModal == false){
			$(".modal_sort").show();
			hideOtherButtonsAndShowModal();
		}else{
			showOtherButtonsAndHideModal();
		}
	});

	$(".list_search").click(function(){
		if(isShowingModal == false){
			$(".modal_search").show();
			hideOtherButtonsAndShowModal();
		}
	});

	$(".list_user").click(function(){
		if(isShowingModal == false){
			$(".modal_user").show();
			hideOtherButtonsAndShowModal();
		}
	});

	function hideOtherButtonsAndShowModal(){
		isShowingModal = true;
		$("#modal_screen").slideDown();
		$(".list_category").children("a").children("img").attr({ src : "img/icon_search.png"});
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
});