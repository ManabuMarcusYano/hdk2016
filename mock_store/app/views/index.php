<?php echo $head; ?>
<?php echo $header; ?>
<?php echo $banner; ?>

<link rel="stylesheet" type="text/css" href="../../public/css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../public/css/common.css" />
<ul class ="tab">
    <li class = "select">開発中</li>
    <li class = "deselct">歴代</li>
</ul>
<div class = "wrapper">

<?php $i = 1; foreach($current_dbs as $db){ ?>

<div class = "ranking_mod" id = "<?php echo $db->id; ?>">
    <div class = "ranking_upper">
        <p class = "ranking_number"><?php echo $i?></p>
        <div "ranking_icon">
            <img src="<?php echo $db->logo_path ? $db->logo_path : 'img/no_app_icon.jpg' ; ?>" class = "app_icon">
        </div>
        <div class = "ranking_info">
            <p class = "app_title" ><?php echo $db->name; ?></p>
            <p class = "app_developer"><?php echo $db->company['name']; ?>/<?php echo $db->user['name']; ?></p>
            <div class = "app_star" data-score="2"></div>
            <p class = "app_period">開発から<span class = "app_days"><?php echo( strtotime(date('Y-m-d')) - strtotime($db->started_developing_at) ) / ( 60 * 60 * 24 );?></span>日<p>
        </div>
    </div>
    <div class = "ranking_lower">
        <img src="<?php echo strtotime( $db->started_developing_at) >= strtotime(date('Y-m-d H:i:s', strtotime("- 1 month")) ) ? 'img/icon_new.png' : 'img/icon_old.png'; ?>" class = "icon_new icon">
        <img src="img/icon_review.png" class = "icon_review icon icon btn_write_review" name = "<?php echo $db->name; ?>" app_id = "<?php echo $db->id; ?>">
        <img src="img/btn_android_dl.png" class = "btn_android icon">
        <img src="img/btn_ios_dl.png" class = "btn_ios icon">
    </div>
</div>

<?php $i++; } ?>

</div>
<div class = "wrapper disnon">

<?php $i = 1; foreach($past_dbs as $db){ ?>

<div class = "ranking_mod" id = "<?php echo $db->id; ?>">
    <div class = "ranking_upper">
        <p class = "ranking_number"><?php echo $i?></p>
        <div "ranking_icon">
            <img src="<?php echo $db->logo_path ? $db->logo_path : 'img/no_app_icon.jpg' ; ?>" class = "app_icon">
        </div>
        <div class = "ranking_info">
            <p class = "app_title" ><?php echo $db->name; ?></p>
            <p class = "app_developer"><?php echo $db->company['name']; ?>/<?php echo $db->user['name']; ?></p>
            <div class = "app_star" data-score="3.5"></div>
            <p class = "app_period">開発から<span class = "app_days"><?php echo( strtotime(date('Y-m-d')) - strtotime($db->started_developing_at) ) / ( 60 * 60 * 24 );?></span>日<p>
        </div>
    </div>
    <div class = "ranking_lower">
        <img src="<?php echo strtotime( $db->started_developing_at) >= strtotime(date('Y-m-d H:i:s', strtotime("- 1 month")) ) ? 'img/icon_new.png' : 'img/icon_old.png'; ?>" class = "icon_new icon">
        <img src="img/icon_review.png" class = "icon_review icon" name = "<?php echo $db->name; ?>">
        <img src="img/btn_android_dl.png" class = "btn_android icon">
        <img src="img/btn_ios_dl.png" class = "btn_ios icon">
    </div>
</div>

<?php $i++; } ?>

</div>

<div class = "ranking_mod_break"></div>

<?php // echo $footer; ?>
<?php echo $global_nav; ?>
