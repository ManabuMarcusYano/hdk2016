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
        <div class = "app_img_container"><img src="app_img/hunter.jpg" class = "app_img" /></div>
        <div class = "app_img_container"><img src="app_img/hunter.jpg" class = "app_img" /></div>
        <div class = "app_img_container"><img src="app_img/hunter.jpg" class = "app_img" /></div>
    </section>
    <hr class = "separation" />
    <p class = "detail_content">ひとつのボードを囲んで、みんなでワイワイ楽しめる！<br/ >
不思議なモンスターたちが飛び出すボードの上で、<br/ >
ドキドキハラハラのボードゲーム大会！<br/ >
【スゴモン・ゲーム紹介】<br/ >
▼ルールは簡単！<br/ >
スゴロクのようにダイスを振って、出た目を進んで土地を購入！<br/ >
自分の土地を発展させながら、資産を１番稼いだ人が勝ち！<br/ >
▼モンスターを集めよう！<br/ >
「所持金を2倍にする」「相手の土地を奪う」など、ゲームを有利にするスキルを持ったモンスターたちが多数登場！<br/ >
モンスターをゲットして、育てて、自分だけのオリジナルデッキで勝負に挑もう！<br/ >
ボードの上で何が起きるかは、もう誰にも分からない！?<br/ >
▼家族と、友達と、その場で対戦！<br/ >
近くにいる友達や家族と最大4人まで同時対戦できるぞ！<br/ >
2vs2のチーム戦も可能！<br/ >
もちろん消費するスタミナはたったの1人分。<br/ >
▼全国のプレイヤーと対決！<br/ >
オンラインで全国の相手と戦うモードを搭載。<br/ >
全国のプレイヤーを相手に、あなたのモンスターで挑め！<br/ >
ランキング上位者には豪華プレゼント！
</p>
    <hr class = "separation" />
    <div class = "detail_content">
    	<ul class = "detail_info">
        	<li>責任者</li>
            <li>会社名</li>
            <li>カテゴリー</li>
            <li>アップデート日</li>
            <li>バージョン</li>
            <li>対応端末</li>
            <li>容量</li>
        </ul>
    </div>
</div>

<div class = "wrapper disnon">

<p>レビュー</p>

</div>
<?php //echo $footer; ?>
<?php echo $global_nav; ?>
