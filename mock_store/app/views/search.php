<?php echo $head; ?>
<?php echo $header; ?>

<div class = "wrapper">
<?php $i = 1; foreach($current_dbs as $db){ ?>

<div class = "ranking_mod" id = "<?php echo $db->id; ?>" style = "background:<?php if($db->event['color'] != null && strtotime(date($db->event['start_at'])) <= strtotime(date('Y-m-d')) && strtotime(date('Y-m-d')) <= strtotime(date($db->event['end_at']))){ echo $db->event['color']; }?>">
    <div class = "ranking_upper">
        <p class = "ranking_number"></p>
        <div "ranking_icon">
            <img src="<?php echo $db->logo_path ? $db->logo_path : 'img/no_app_icon.jpg' ; ?>" class = "app_icon">
        </div>
        <div class = "ranking_info">
            <p class = "app_title" ><?php echo $db->name; ?></p>
            <p class = "app_developer"><?php echo $db->company['name']; ?>/<?php echo $db->user['username']; ?></p>
            <div class = "app_star" data-score="<?php echo ($db->completion + $db->interest + $db->potence) / 3 ;?>"></div>
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

<div class = "ranking_mod_break"></div>

<?php // echo $footer; ?>
<?php echo $global_nav; ?>
