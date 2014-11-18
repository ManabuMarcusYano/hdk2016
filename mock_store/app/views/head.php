<?php if(Session::get('layout') == 'sp'){ // スマホ用 ?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<meta name="viewport" content="width=270, user-scalable=no">
	<!--<meta name="apple-mobile-web-app-capable" content="yes" />-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
	<title><?php if(!empty($title)){ echo $title; }?></title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/term.css" />
    <link rel="stylesheet" type="text/css" href="lib/slick-1.3.11/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="lib/raty-2.7.0/lib/jquery.raty.css" />
    <link rel="stylesheet" type="text/css" href="lib/lightbox/css/lightbox.css" />
    <script src="lib/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery.autosize.js" type="text/javascript"></script>
    <script src="lib/slick-1.3.11/slick/slick.min.js" type="text/javascript"></script>
    <script src="lib/raty-2.7.0/lib/jquery.raty.js" type="text/javascript"></script>
    <script src="lib/lightbox/js/lightbox.min.js" type="text/javascript"></script>
    <script src="js/ui.js" type="text/javascript"></script>
    <script src="js/link.js" type="text/javascript"></script>
</head>
<body>

<?php }else{ // PC用 ?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
	<title><?php if(!empty($title)){ echo $title; }?></title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/term.css" />
    <link rel="stylesheet" type="text/css" href="css/common_pc.css" />
    <link rel="stylesheet" type="text/css" href="css/login_pc.css" />
    <link rel="stylesheet" type="text/css" href="css/term_pc.css" />
    <!--<link rel="stylesheet" type="text/css" href="lib/slick-1.3.11/slick/slick.css" />-->
    <link rel="stylesheet" type="text/css" href="lib/raty-2.7.0/lib/jquery.raty.css" />
    <link rel="stylesheet" type="text/css" href="lib/lightbox/css/lightbox.css" />
    <script src="lib/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery.autosize.js" type="text/javascript"></script>
    <!--<script src="lib/slick-1.3.11/slick/slick.min.js" type="text/javascript"></script>-->
    <script src="lib/raty-2.7.0/lib/jquery.raty.js" type="text/javascript"></script>
    <script src="lib/lightbox/js/lightbox.min.js" type="text/javascript"></script>
    <script src="js/ui.js" type="text/javascript"></script>
    <script src="js/link.js" type="text/javascript"></script>
</head>
<body>

<?php } ?>