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

<?php $i = 1; while($i <= 10){ ?>
<div class = "ranking_mod">
    <div class = "ranking_upper">
        <p class = "ranking_number"><?php echo $i?></p>
        <div "ranking_icon">
        	<img src="app_icon/app_icon_test1.png" class = "app_icon">
        </div>
        <div class = "ranking_info">
            <p class = "app_title" >グリモア〜私立グリモワール魔法学園〜</p>
            <p class = "app_developer">アプリボット/浮田光樹</p>
            <p class = "app_star">★★★★★</p>
            <p class = "app_period">開発から<span class = "app_days">10日</span><p>
        </div>
    </div>
    <div class = "ranking_lower">
        <img src="img/icon_new.png" class = "icon_new icon">
        <img src="img/icon_review.png" class = "icon_review icon">
        <img src="img/btn_android_dl.png" class = "btn_android icon">
        <!--<img src="img/btn_ios_dl.png" class = "btn_ios icon">-->
    </div>
</div>
<?php $i++; } ?>
</div>
<div class = "wrapper disnon">
<p>歴代</p>
</div>
<?php echo $footer; ?>
<?php echo $global_nav; ?>
