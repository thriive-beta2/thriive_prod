<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';

$action = $_POST['action'];

//echo $action;

switch($action){
	case 'call_response' :
	$ocid = $_POST['ocid'];
	check_call_response($ocid);
	break;

	case 'place_call_for_video':
	$ocid = $_POST['ocid'];
	$ivr = $_POST['ivr'];
	$phone_number = $_POST['phone_number'];
	$session_duration = $_POST['session_duration'];
	place_calls_for_video($ocid,$ivr,$phone_number,$session_duration);
	break;
};


function check_call_response($ocid){
	global $wpdb;
	$query = "SELECT menu FROM chat_call_conf WHERE oc_id = $ocid";
	$res = $wpdb->get_results($query);
	echo $res[0]->menu;

}

function place_calls_for_video($ocid,$ivr,$phone_number,$session_duration){




	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://etsrds.kapps.in/webapi/enterprise/v1/obd_quickcall.py',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array('customer_number' => '+91'.$phone_number,'k_number' => '+918035387035','ivr_id' => $ivr,'custom_params' => $session_duration.','.$ocid,'is_transactional' => 'yes'),
	  CURLOPT_HTTPHEADER => array(
	    'Authorization: fac5d77a-4ffd-4e02-ad07-3c9f33916bc6'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;
}