<?php


$basePath = '/var/www/html';
require $basePath.'/wp-config.php';



$action = $_POST['action'];

switch($action){
	case 'feedDataToDB':
	feedDataToDB(stripslashes($_POST['data']));
	return;
}


function feedDataToDB($data){
	global $wpdb;
	//print_r(json_decode($data));
	$json_data = $data;
	$data = json_decode($data);
	$payuid = $data->payuid;
	$uid = $data->uid;

	$existingData = checkForExistingData($payuid);

	if($existingData == 0){
		$query = "INSERT INTO QA_feedback (payuid,feedback,uid) VALUES ('$payuid','$json_data','$uid')";
		//$faqdata = json_decode($data);
		$row = $wpdb->get_row("SELECT session_duration,action,tid FROM online_consultation WHERE payuid = '".$data->payuid ."' LIMIT 1");
		$session_duration = $row->session_duration;
		$action = $row->action;
		$tid  = $row->tid; 
		$name = urlencode($data->name);
		$dob = urlencode($data->dob);
		$tidmobile = get_user_meta($tid,'mobile',true);
		$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
			
		$issue_catg2 = urlencode($data->issue_catg2);
		$issue_catg3 = urlencode($data->issue_catg3);
		$issue_catg4 = urlencode($data->issue_catg4);
		$issue_catg5 = urlencode($data->issue_catg5);
		$issuestr = $issue_catg2.','.$issue_catg3.','.$issue_catg4.','.$issue_catg5;
		$url = "https://media.smsgupshup.com/GatewayAPI/rest?userid=2000209699&password=!7Tb5Q@t&send_to=".$tidmobile."&v=1.1&format=json&msg_type=TEXT&method=SENDMESSAGE&msg=You%20have%20".$session_duration."%20min%20".$action."%20session%20with%20".$name."%2C%20DOB%3A%20".$dob."%2C%20Issue%3A%20".$issuestr;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		curl_close($ch);
		
		
		if($wpdb->query($query) == 1){
			echo 'data inserted';
		}else{
			echo 'data not inserted';
		}
	}else{
		echo $existingData;
	}
}

function checkForExistingData($payuid){
	global $wpdb;
	$query = "SELECT payuid FROM QA_feedback WHERE payuid = '$payuid'";
	$res = $wpdb->get_results($query);

	if(count($res)>0){
		return '1';
	}else{
		return '0';
	}
}