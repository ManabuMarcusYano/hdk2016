<?php
require_once('db_config.php');

function connect(){
		$link = mysql_connect(DB_SERVER, DB_USER, DB_PASSWD) or die(mysql_error()); 
		$select = mysql_select_db(DB_NAME) or die(mysql_error());
		return $link;
}

function close($link){
	 mysql_close($link);
}

function prepare($valuse){
	return mysql_real_escape_string($value);
}
?>
