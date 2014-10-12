<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=270, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />	
</head>
<body>
<a>Mock Store</a>
<a>
<?php
	require_once('mysql_connect.php');
	$link = connect();
	$query = 'SELECT * from os';
	
// 	$today = date("Y年m月d日 H時i分s秒");
// 	print $today;
// 	$link = mysql_connect('localhost', 'root', 'root') or die(mysql_error()); 
// 	mysql_select_db('mock_store') or die(mysql_error());

	$result = mysql_query($query) or die(mysql_error());
	while ($data = mysql_fetch_array($result)) {
 	 	echo '<p>' . $data['id'] . ':' . $data['platform'] . ':' . $data['os'] . "</p>\n";
	}
	echo $row[0];
?>
</a>
</body>
</html>
