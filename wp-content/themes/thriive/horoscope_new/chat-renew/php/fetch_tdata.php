<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
//echo $_POST['date'];

$action = $_POST['action'];

if($action == 'date'){
}

switch ($action) {
	case 'date':
		$tid = $_POST['tid'];
		$date = $_POST['date'];		
		curr_date($tid,$date);	
		break;

	case 'range':
		$tid = $_POST['tid'];
		$start = $_POST['start'];
		$end = $_POST['end'];

		$WHERE = 'DATE(created_date) BETWEEN "'.$start.'" AND "'.$end.'"';


		date_range($tid,$WHERE);	
		break;
	
	default:
		
		break;
}



function curr_date($tid,$date){
	global $wpdb;
$query = "SELECT * FROM online_consultation LEFT JOIN chat_call_conf ON online_consultation.id = chat_call_conf.oc_id WHERE tid=$tid AND created_date LIKE '%$date%' ORDER BY online_consultation.id DESC";
$res = $wpdb->get_results($query);

$increment = 0;
foreach($res as $key){
	$tid = $key->tid;
	$query = "SELECT COUNT(id) as num,id as id FROM online_consultation WHERE created_date LIKE '%$date%' AND tid = $tid AND tid_accept != 6 AND tid_accept != 1 AND tid_accept != 5";
	$res1 = $wpdb->get_results($query);
	$res[$increment]->rejected = $res1[0]->num;
	$increment++;
//	print_r($res1);echo '<br>';
}

$JSON = json_encode($res);
echo $JSON;
}


function date_range($tid,$WHERE){
		global $wpdb;
$query = "SELECT * FROM online_consultation  WHERE tid=$tid AND $WHERE ORDER BY online_consultation.id DESC";
//echo $query;
$res = $wpdb->get_results($query);
$JSON = json_encode($res);
echo $JSON;	
}


?>