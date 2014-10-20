<?php echo $head; ?>
<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="../../public/css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../public/css/common.css" />

<div class = "ranking_mod_break"></div>

<div class = "ranking_mod" id = "<?php echo $db->id; ?>">
    <div class = "ranking_upper">
        <p class = "ranking_number"><?php //echo $i?></p>
        <div "ranking_icon">
            <img src="<?php echo $db->logo_path ? $db->logo_path : 'img/no_app_icon.jpg' ; ?>" class = "app_icon">
        </div>
        <div class = "ranking_info">
            <p class = "app_title" ><?php echo $db->name; ?></p>
            <p class = "app_developer"><?php echo $db->company['name']; ?>/<?php echo $db->user['name']; ?></p>
            <div class = "app_star" data-score="3.5"></div>
            <p class = "app_period">開発から<span class = "app_days"><?php echo( strtotime(date('Y-m-d')) - strtotime($db->started_developing_at) ) / ( 60 * 60 * 24 );?>日</span><p>
        </div>
    </div>
    <div class = "ranking_lower">
        <img src="img/icon_new.png" class = "icon_new icon">
        <img src="img/icon_review.png" class = "icon_review icon">
        <img src="img/btn_android_dl.png" class = "btn_android icon">
        <img src="img/btn_ios_dl.png" class = "btn_ios icon">
    </div>
</div>

<ul class ="tab">
    <li class = "select">詳細</li>
    <li class = "deselct">レビュー</li>
</ul>
<div class = "wrapper">
    <section class = "app_imgs">
        <div class = "app_img_container"><img src="<?php echo $db->image1_path; ?>" class = "app_img" /></div>
        <div class = "app_img_container"><img src="<?php echo $db->image1_path; ?>" class = "app_img" /></div>
        <div class = "app_img_container"><img src="<?php echo $db->image1_path; ?>" class = "app_img" /></div>
    </section>
    <hr class = "separation" />
    <p class = "detail_content"><?php echo $db->description; ?></p>
    <hr class = "separation" />
    <div class = "detail_content">
    	<ul class = "detail_info">
            <li>カテゴリー : <?php echo $db->category['name']; ?></li>
            <li>最終アップデート : <?php echo date('Y年m月d日', strtotime($db->updated_at)); ?></li>
            <li>開発開始 : <?php echo date('Y年m月d日', strtotime($db->started_developing_at)); ?></li>
            <li>バージョン : <?php echo $db->version; ?></li>
        </ul>
    </div>
</div>

<div class = "wrapper disnon">

<p>レビュー</p>

</div>
<?php //echo $footer; ?>
<?php echo $global_nav; ?>
