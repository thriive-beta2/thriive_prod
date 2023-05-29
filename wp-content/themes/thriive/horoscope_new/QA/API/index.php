<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
global $wpdb;
if($_POST['apiKey'] != 'QA15062022'){
	die('You are not authorized for using this Api');
}

$action = $_POST['action'];

switch($action){
	case 'feedDataToDB':
	feedDataToDB($_POST['data']);
	return;
}


function feedDataToDB($data){
	
print_r(json_decode($data));
	 


}

function checkForExistingData($payuid){

}







