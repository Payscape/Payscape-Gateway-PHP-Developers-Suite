<?php 
		$server = 'localhost';
		$userid = 'root';
		$userpass = '';
		$dbname = 'payscape';
		$conn = mysqli_connect($server, $userid, $userpass) or die('No connection.');
		mysqli_select_db($conn, $dbname);
?>