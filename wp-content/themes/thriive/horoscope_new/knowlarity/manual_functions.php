<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////**********************This API is Created by AKASH Last Updated 23-Nov-2021 10:58PM***********************//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


require '/var/www/html/wp-config.php';
global $wpdb;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = $_POST['action'];
switch ($action) {
	case 'payuid_check':
		$payuid = $_POST['payuid'];
		payuid_check($payuid);
		break;
	case 'submit_values':
		$payuid = $_POST['payuid'];
		$therapist_number = $_POST['therapist_number'];
		$user_number = $_POST['user_number'];
		$duration = $_POST['duration'];
		submit_values($payuid,$therapist_number,$user_number,$duration);
		break;
	case 'appointment_call':
		$payuid = $_POST['payuid'];
		$therapist_number = $_POST['therapist_number'];
		$user_number = $_POST['user_number'];
		$duration = $_POST['duration'];
		placeAppointmentCall($payuid,$therapist_number,$user_number,$duration);
		break;
}

function payuid_check($payuid){
	global $wpdb;
	$query = "SELECT * FROM online_consultation WHERE payuid = '$payuid' ORDER BY id DESC LIMIT 1";
	$res = $wpdb->get_results($query, ARRAY_A);
	if(count($res)>0){
		$uid = $res[0]['uid'];
		$tid = $res[0]['tid'];
		$query = "SELECT meta_value,user_id FROM wp_usermeta WHERE ( user_id = $uid AND meta_key = 'mobile') OR (user_id = $tid AND meta_key = 'mobile')";
		$res = $wpdb->get_results($query, ARRAY_A);
		if(COUNT($res) < 2){
			echo return_msg('fail', 'One user does not have a phone number');
		}else if(strlen(str_replace(' ', '', $res[0]['meta_value']))  != '10'){
			$cuid = $res[0]['user_id'];
			$query = "SELECT meta_value FROM wp_usermeta WHERE user_id = $cuid AND meta_key='nickname'";
			$uname = $wpdb->get_results($query, ARRAY_A)[0]['meta_value'];
			echo return_msg('fail', 'User '.$uname.' does not have a valid phone number', str_replace(' ', '', $res[0]['meta_value']));
			return;
		}else if(strlen(str_replace(' ', '', $res[1]['meta_value'])) != '10'){
			$cuid = $res[1]['user_id'];
			$query = "SELECT meta_value FROM wp_usermeta WHERE user_id = $cuid AND meta_key='nickname'";
			$uname = $wpdb->get_results($query, ARRAY_A)[0]['meta_value'];
			echo return_msg('fail', 'User '.$uname.' does not have a valid phone number', str_replace(' ', '', $res[1]['meta_value']));
			return;
		}else{

			if($res[0]['user_id'] == $uid){
				$user_mobile = $res[0]['meta_value'];
			}else if($res[0]['user_id'] == $tid){
				$therapist_mobile = $res[0]['meta_value'];
			}

			if($res[1]['user_id'] == $uid){
				$user_mobile = str_replace(' ', '', $res[1]['meta_value']);
			}else if($res[1]['user_id'] == $tid){
				$therapist_mobile = str_replace(' ', '', $res[1]['meta_value']);
			}

			echo return_msg('success', $therapist_mobile, $user_mobile);

		}



	}else{
		echo return_msg('fail', 'This payuid. does not exist');
	}

}



function submit_values($payuid,$therapist_number,$user_number,$duration){
global $wpdb;





$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/knowlarity/api_data.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('agent' => $therapist_number,'customer' => $user_number,'timer' => $duration,'payment_id' => $payuid,'API_key' => 'ugfvsuhgghvhyugkysvghuvbkerlgunkhsvoawn'),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=poigib49pprhj44kphuao3u141'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

if(json_decode($response)->status == 'success'){

$admin = wp_get_current_user()->data->user_login;
$operation = json_encode(array(
		'admin' => $admin,
		'tnumber' => $therapist_number,
		'unumber' => $user_number,
		'duration' => $duration,
		'payuid' => $payuid,
		'call_id' => json_decode($response)->call_id,
		'time' => date("Y-m-d H:i:s")
	));
$query = "INSERT INTO manual_call_record (admin,operation) VALUES ('$admin', '$operation')";
if($wpdb->query($query)==1){
	echo 'success';
}else{
	echo 'fail';
}	
}
}


function return_msg($status,$msg1,$msg2 =''){
	$error_array = array(
		'status' => $status,
		'msg1' => $msg1,
		'msg2' => $msg2
	);
	return json_encode($error_array);
}




function placeAppointmentCall($payuid,$therapist_number,$user_number,$duration){
global $wpdb;





$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/knowlarity/appointment_call.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('agent' => $therapist_number,'customer' => $user_number,'timer' => $duration,'payment_id' => $payuid,'API_key' => 'ugfvsuhgghvhyugkysvghuvbkerlgunkhsvoawn'),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=poigib49pprhj44kphuao3u141'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

if(json_decode($response)->status == 'success'){

$admin = wp_get_current_user()->data->user_login;
$operation = json_encode(array(
		'admin' => 'AppointmentCall',
		'tnumber' => $therapist_number,
		'unumber' => $user_number,
		'duration' => $duration,
		'payuid' => $payuid,
		'call_id' => json_decode($response)->call_id,
		'time' => date("Y-m-d H:i:s")
	));
$query = "INSERT INTO manual_call_record (admin,operation) VALUES ('$admin', '$operation')";
if($wpdb->query($query)==1){
	echo 'success';
}else{
	echo 'fail';
}	
}
}