<?php
$basePath = '/var/www/html';
//require $basePath.'/wp-config.php';
global $wpdb;


$action = $_POST['action'];

//echo $action;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$fp = fopen('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/testjson/therapist.json', 'w');
fwrite($fp, $action);
fclose($fp);

$contents = file_get_contents('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/testjson/therapist.json');

print_r($contents);



/*
$query = "SELECT * FROM online_consultation WHERE ID = 56582";
$res = $wpdb->get_results($query);
print_r($res);	
*/
