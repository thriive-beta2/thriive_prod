<?php 
require '/var/www/html/wp-config.php';
global $wpdb;
$auth = $_GET['auth'];
$call_date = $_GET['cdate'];
//print_r($_GET);
if($auth == 'fetch123' ){
	$query = "SELECT * FROM knowlarity_after_call WHERE call_date='$call_date'";
	//echo $query;
	$res = $wpdb->get_results($query);

	//print_r($res);
	$decode = json_encode($res);
	print_r($decode);
}else{echo 'no';}
