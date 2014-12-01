<?php echo $head; ?>
<?php echo $header; ?>

<div class = "ranking_mod_break"></div>

<div class = "ranking_mod" id = "<?php echo $db->id; ?>">
    <div class = "ranking_upper">
        <p class = "ranking_number"><?php //echo $i?></p>
        <div "ranking_icon">
            <img src="<?php echo $db->logo_path ? $db->logo_path : 'img/no_app_icon.jpg' ; ?>" class = "app_icon">
        </div>
        <div class = "ranking_info">
            <p class = "app_title" ><?php echo $db->name; ?></p>
            <p class = "app_developer"><?php echo $db->company['name']; ?>/<?php echo $db->user['username']; ?></p>
            <div class = "app_star" data-score="<?php echo ($db->completion) ;?>"></div>
            <p class = "app_period">アップデート<span class = "app_days"><?php echo $db->update_count; ?></span>回</p>
            <p class = "app_period">アップデートから<span class = "app_days"><?php echo floor(( strtotime(date('Y-m-d H:i:s')) - strtotime($db->updated_at) ) / ( 60 * 60 * 24 ));?></span>日</p>
            <p class = "app_period">開発から<span class = "app_days"><?php echo floor(( strtotime(date('Y-m-d')) - strtotime($db->started_developing_at) ) / ( 60 * 60 * 24 ));?></span>日</p>
        </div>
    </div>
    <div class = "ranking_lower">
        <img src="<?php echo strtotime( $db->started_developing_at) >= strtotime(date('Y-m-d H:i:s', strtotime("- 1 month")) ) ? 'img/icon_new.png' : 'img/icon_old.png'; ?>" class = "icon_new icon">
        <img src="img/icon_review.png" class = "icon_review icon btn_write_review" name = "<?php echo $db->name; ?>" app_id = "<?php echo $db->id; ?>">
        <img src="img/btn_android_dl.png" class = "btn_android icon" <?php if(!$db->apk_path){ ?>style="visibility:hidden;"<?php } ?> >
        <img src="img/btn_ios_dl.png" class = "btn_ios icon" <?php if(!$db->ipa_path){ ?>style="visibility:hidden;"<?php } ?>>
    </div>
</div>

<ul class ="tab">
    <li class = "select">詳細</li>
    <li class = "deselct">レビュー</li>
</ul>
<div class = "wrapper">
    <section class = "app_imgs">
        <div class = "app_img_container"><img src="<?php echo $db->image1_path; ?>" class = "app_img" data-lightbox = "1" /></div>
        <div class = "app_img_container"><img src="<?php echo $db->image2_path; ?>" class = "app_img" data-lightbox = "2" /></div>
        <div class = "app_img_container"><img src="<?php echo $db->image3_path; ?>" class = "app_img" data-lightbox = "3" /></div>
    </section>
    <hr class = "separation" />
    <p class = "detail_content"><?php echo nl2br($db->description); ?></p>
    <hr class = "separation" />
    <div class = "detail_content">
    	<ul class = "detail_info">
            <li>カテゴリー : <?php echo $db->category['name']; ?></li>
            <li>最終アップデート : <?php echo date('Y/m/d', strtotime($db->updated_at)); ?></li>
            <li>開発開始 : <?php echo date('Y/m/d', strtotime($db->started_developing_at)); ?></li>
            <li>リリース予定日 : <?php echo is_null($db->will_release_at) ? '未定' : date('Y/m/d', strtotime($db->will_release_at)); ?></li>
            <li>バージョン : <?php echo $db->version; ?></li>
        </ul>
    </div>
</div>

<div class = "wrapper disnon">
<section class = "review_summary detail_content">
	<div class = "review_summary_left">
        <p class = "">レビュー</p>
        <a class = "review_total"><?php echo round(($db->completion), 1) ;?></a>
        <div class = "app_star" data-score="<?php echo ($db->completion);?>"></div>
    </div>
    <div class = "review_summary_right">
        <p><span class="review_count"><?php echo $db->review_count ;?></span>件の評価<br /><br />
        <!--
        <ul>
            <li>評価<?php echo round($db->completion, 1) ;?> <div class = "app_star" data-score="<?php echo $db->completion ;?>"></div></li>
            <li>面白さ <?php echo round($db->interest, 1) ;?> <div class = "app_star" data-score="<?php echo $db->interest ;?>"></div></li>
            <li>将来性 <?php echo round($db->potence, 1) ;?> <div class = "app_star" data-score="<?php echo $db->potence ;?>"></div></li>
        </ul>
        -->
    </div>
</section>
<img src = "img/btn_write_review.png" class = "write_review btn_write_review" name = "<?php echo $db->name; ?>" app_id = "<?php echo $db->id; ?>">

<?php foreach($reviews as $review){ ?>
<hr class = "separation">
    <div class = "detail_content comment" comment_id = "<?php echo $review->id ;?>">
    	<div class = "action_box">
        	<img src = "img/btn_unlike.png" class = "action_like">
            <?php if(Auth::user()->id == $review->reviewer_id){ ?> <img src = "img/btn_delete.png" class = "action_delete">
        	<img src = "img/btn_edit.png" class = "action_edit"> <?php } ?>
            <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'owner'){ ?><img src = "img/btn_feedback.png" class = "action_feedback btn_write_review" comment_id = "<?php echo $review->id ;?>" app_id = "<?php echo $db->id; ?>" name = "<?php echo $db->name; ?>"><?php }?>
        </div>
    	<p class = "comment_title"><?php echo $review->title ;?></p>
        <div class = "app_star" data-score="<?php echo ($review->completion);?>"></div><p class = "commenter"><?php echo $review->reviewer['username'] ;?> - <?php echo date('Y/m/d', strtotime($review->created_at));?></p>
        <p class = "comment_message"><?php echo $review->message ;?></p>
    </div>
<?php } ?>

</div>
<?php //echo $footer; ?>
<script type="text/javascript">
	$(".list_search").css("visibility", "hidden");
	state = t_state.ONLY_BACK;
	$(".list_category").children("a").children("img").attr({ src : "img/icon_back.png"});
</script>
<?php echo $global_nav; ?>