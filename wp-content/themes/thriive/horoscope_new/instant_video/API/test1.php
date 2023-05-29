<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
include_once get_stylesheet_directory() . '/framework/core-functions.php';
global $wpdb;




$customer_number = get_user_meta($user_id)['mobile'][0];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/instant_video/API/API.php?',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('action' => 'place_call_for_video','ocid' => '66587','ivr' => '1000060521','phone_number' => '7999886050','session_duration' => '4'),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=hrq88e5cbsb17rnsbp5ag9sls3'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo json_decode($response)->status;
//sendEmail("akash@thriive.in", "query", $response);


if(json_decode($response)->status == 'Success'){
	echo 123456;
	$query = "UPDATE online_consultation SET chat_call_status = 1 WHERE id = '66587'";
	echo $query;
	$wpdb->query($query);
}else{
	echo 321654;
	$query = "UPDATE online_consultation SET rem_time = '$response' WHERE id = $ocid";
	$wpdb->query($query);
}