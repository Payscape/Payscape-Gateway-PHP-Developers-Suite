<h1>Payscape Wrapper Lab</h1>

<?php 

	$default_time_zone = date_default_timezone_get();

	$date = date('YmdHis');


$utc_str = gmdate("YmdHis", time());
$utc = strtotime($utc_str);

echo "<br>DATE: $date";
echo "<br>GMDATE: $utc_str";

echo "<br>UTC DATE: $utc";

//gmdate produces what we need for the UTC Timestamp


$time = time();

echo "<br>DEFAULT PHP TIME ZONE: $default_time_zone";

echo "<br>TIME: $time<br>";

if (date_default_timezone_get()) {
	echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}
?>

