<header class = "header">
	<ul class = "header_box">
        <li class="list_category"><a><img src="img/icon_category.png" class = "icon_category" /></a></li>
        <li class="list_logo"><a href = ""><img src="img/logo.png" class = "header_logo"/></a></li>
        <li class="list_search"><a><img src="img/icon_search.png" class = "icon_search" /></a></li>
        <li class="list_user"><a><img src="img/icon_user.png" class = "icon_user" /></a></li>
    </ul>
</header>
<div class="header_break"></div>
<div id = "modal_screen">
    <div class = "sorts modal_sort">
        <div class = "sort"><a>開発開始日が新しい順</a></div>
        <hr class = "separation" />
        <div class = "sort"><a>開発開始日が古い順</a></div>
        <hr class = "separation" />
        <div class = "sort"><a>アップデート日が新しい順</a></div>
        <hr class = "separation" />
        <div class = "sort"><a>アップデート日が古い順</a></div>
    </div>
    <div class = "sorts modal_search">
        <div class = "sort">
        	<form action = "">
            	<img src = "img/icon_search.png" class = "search_icon"><input type="search" name="keyword" maxlength="15" placeholder="Search" class = "search_box" /><a class = "search_cancel">Cancel</a>
            </form>
    	</div>
    </div>
    <div class = "sorts modal_user">
		<div class = "modal_box">
            <img src = "img/icon_user_l.png" class = "user_icon">
            <p class = "user_info">張銀修<br />jang_eunsue@applibot.co.jp</p>
            <a class = "user_term" href="/term">利用規約</a><a class = "user_logout" href = "/login">ログアウト</a><div class = "clearfix"></div>
		</div>
    </div>
    <div id = "review_form" class = "sorts modal_user">
   		<div class = "modal_box">
            <ul>
                <li>完成度<div class = "app_star" data-score="3"></div></li>
                <li>面白さ<div class = "app_star" data-score="3"></div></li>
                <li>将来性<div class = "app_star" data-score="3"></div></li>
       		</ul>
            <form action = "">
            	<input type="text" name="title" maxlength="20" placeholder="タイトル" class = "title_box"  autofocus="autofocus" required />
                <textarea name="message" class = "message_box" placeholder = "" cols = "18" rows ="9" wrap = "physical" required></textarea>
                <input type="submit" value="投稿する" class = "submit_button" />
            </form>
        </div>
	</div>
</div>