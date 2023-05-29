<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
include_once get_stylesheet_directory() . '/framework/core-functions.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$room_id = rand().time();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://vapi.knowlarity.com/v1/apis/auth/token?scope=API',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'refresh_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im1hbmlzaGpAdGhyaWl2ZS5pbiIsInByb2ZpbGVfaWQiOjEsImFjY291bnRfaWQiOjIwNiwiaWF0IjoxNjE5Nzg4MDU5fQ.IyRFtB3GSIaQ5NOn-hgXCYRBDqzQPuWk5R1fctHz_h0',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: u1KsTH3zwr0rh2z7x1Wz2fAZToirNHh6c2ibqT58',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$access_token = json_decode($response)->access_token;

if($access_token){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://vapi.knowlarity.com/v1/apis/room?scope=API',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'project_id=294&roomname='.$room_id.'&password=123456',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: u1KsTH3zwr0rh2z7x1Wz2fAZToirNHh6c2ibqT58',
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: '.$access_token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
echo json_decode($response)->data->link;
}