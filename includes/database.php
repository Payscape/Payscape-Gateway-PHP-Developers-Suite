<?php 

	$server = 'localhost';
	$userid = 'tonto';
	$userpass = 'tonto';
	$dbname = 'payscape';
	$conn = mysql_connect($server, $userid, $userpass) or die('No luck for you, boy.');
	mysql_select_db($dbname, $conn);
	
?>        