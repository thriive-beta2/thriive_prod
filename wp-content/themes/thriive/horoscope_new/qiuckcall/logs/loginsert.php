<?php

$action = $_GET['action'];
if($action == 'write'){
$array = array('ocid' => $_GET['ocid'], 'response' => $_GET['response']);
$json = json_encode($array);
$fp = fopen("/var/www/html/wp-content/themes/thriive/horoscope_new/qiuckcall/logs/therapist-log.json", "a");
fwrite($fp, '-'.$json);
fclose($fp);
}else if($action == 'read'){
	$fp = file_get_contents("/var/www/html/wp-content/themes/thriive/horoscope_new/qiuckcall/logs/therapist-log.json");
	$file_contents = explode('-', $fp);

	foreach($file_contents as $key){
		print_r($key);echo '<br>';
	}
}