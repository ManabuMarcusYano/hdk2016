<?php if(Session::get('layout') == 'sp'){ // スマホ用 ?>

<header class = "header">
  <ul class = "header_box">
        <li class="list_category"><a><img src="/img/icon_category.png" class = "icon_category" /></a></li>
        <li class="list_logo"><a href = "/"><img src="/img/logo.png" class = "header_logo"/></a></li>
        <li class="list_search"><a><img src="/img/icon_search.png" class = "icon_search" /></a></li>
        <li class="list_user"><a><img src="/img/icon_user.png" class = "icon_user" /></a></li>
    </ul>
</header>
<div class="header_break"></div>

<div id = "modal_screen">
    <div class = "sorts modal_sort">
        <div class = "sort"><a href="/recentlyStarted">開発開始日が新しい順</a></div>
        <hr class = "separation" />
        <div class = "sort"><a href="/previouslyStarted">開発開始日が古い順</a></div>
        <hr class = "separation" />
        <div class = "sort"><a href="/updated">アップデート日が新しい順</a></div>
        <hr class = "separation" />
        <div class = "sort"><a href="/unupdated">アップデート日が古い順</a></div>
    </div>
    <div class = "sorts modal_search">
        <div class = "sort">
          <form action = "/search?keyword="  method = "get">
              <img src = "/img/icon_search.png" class = "search_icon"><input type="search" name="keyword" maxlength="15" placeholder="Search" class = "search_box" /><a class = "search_cancel">Cancel</a>
            </form>
      </div>
    </div>
    <div class = "sorts modal_user">
		<div class = "modal_box">
            <img src = "/img/icon_user_l.png" class = "user_icon">
            <p class = "user_info"><?php if(Auth::user()){ echo Auth::user()->username.'<br />'.Auth::user()->mail_address.'<br />権限: '.Auth::user()->role; }?></p>
            <a class = "user_term" href="/term">利用規約</a><a class = "user_logout" href = "/logout">ログアウト</a><div class = "clearfix"></div>
		</div>
    </div>
    <div id = "review_form" class = "sorts modal_user">
   		<div class = "modal_box">
            <form action = "" method = "post">
            	<?php if(Auth::user()){ if(Auth::user()->role == 'admin' || Auth::user()->role == 'owner'){ ?>
                <ul><a>評価</a><div class = "app_star" id = "completion" data-score="3"></div></li>
                    <!--<li>面白さ<div class = "app_star" id = "interest" data-score="3"></div></li>
                    <li>将来性<div class = "app_star" id = "potence" data-score="3"></div></li>-->
                </ul>
                <input type="hidden" name = "rate_valid" value = "1" id = "rate_valid" />
                <?php }}?>
            	<input type="text" name="title" maxlength="20" placeholder="タイトル" class = "title_box" required />
                <textarea name="message" class = "message_box" placeholder = "" cols = "18" rows ="5" wrap = "physical" required></textarea>
                <input type="submit" value="投稿する" class = "submit_button"  id="post_review" />
                <input type="hidden" name = "user_id" value="<?php if(Auth::user()){ if(Auth::user()){ echo Auth::user()->id; }} ?>" />
                <input type="hidden" name = "feedback_id" value = "" id = "feedback_id" />
            </form>
        </div>
	</div>
</div>

<?php }else{ // PC用 ?>

<header class = "header">
	<ul class = "header_box">
        <li class="list_logo"><a href = "/"><img src="/img/logo.png" class = "header_logo"/></a></li>
        <!--レイアウトの調整のため非表示-->
        <!--<li class="list_common list_sort"><a href="/recentlyStarted">▽開発開始日が新しい順</a></li>
        <li class="list_common list_sort"><a href="/previouslyStarted">▽開発開始日が古い順</a></li>
        <li class="list_common list_sort"><a href="/updated">▽アップデート日が新しい順</a></li>
        <li class="list_common list_sort"><a href="/unupdated">▽アップデート日が古い順</a></li>-->
        <li class="list_search_icon"><img src = "/img/icon_search.png" class = "search_icon_img"></li>
        <li class=""><form action = "/search"  method = "get"><input type="search" name="keyword" maxlength="15" placeholder="Search" class = "search_box" /></form></li>
        <li class="list_common list_user_info"><a><?php if(Auth::user()){ echo Auth::user()->username.'/権限: '.Auth::user()->role; }?></a></li>
        <li class="list_common"><a href = "/term">利用規約</a></li>
        <li class="list_common"><a href = "/logout">ログアウト</a></li>
        <!--<li class="list_common"><a href = "/app-manage">新規モック登録</a></li>-->
        <li class="list_common"><a href = "/app-manage/add">新規モック登録</a></li>
        <?php if(Auth::user()->role == 'admin'){ ?><li class="list_common critical"><a href = "/allpasswordchange">全PW変更</a></li><?php } ?>
    </ul>
</header>
<div class="header_break"></div>


<div id = "modal_screen">
    <div id = "review_form" class = "sorts modal_user">
    	<img src = "/img/button_close.png" class = "form_button_close">
   		<div class = "modal_box">
            <form action = "" method = "post">
            	<?php if(Auth::user()){ if(Auth::user()->role == 'admin' || Auth::user()->role == 'owner'){ ?>
                <ul>
                    <li>評価<div class = "app_star" id = "completion" data-score="3"></div></li>
                    <!--<li>面白さ<div class = "app_star" id = "interest" data-score="3"></div></li>
                    <li>将来性<div class = "app_star" id = "potence" data-score="3"></div></li>-->
                </ul>
                <input type="hidden" name = "rate_valid" value = "1" id = "rate_valid" />
                <?php }} ?>
            	<input type="text" name="title" maxlength="20" placeholder="タイトル" class = "title_box" required />
                <textarea name="message" class = "message_box" placeholder = "" cols = "18" rows ="5" wrap = "physical" required></textarea>
                <input type="submit" value="投稿する" class = "submit_button" />
                <input type="hidden" name = "user_id" value="<?php if(Auth::user()){ echo Auth::user()->id; } ?>" />
                <input type="hidden" name = "feedback_id" value = "" id = "feedback_id" />
            </form>
        </div>
	</div>
</div>

<?php } ?>
