<?php 
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';

$query = "SELECT id,uid_accept,tid_accept, FROM online_consultation WHERE action='chat'  LIMIT 5";
$res = $wpdb->get_results($query);

//print_r($res[0]->id);

foreach($res as $key){

	print_r($key->id);
	if($key->chat_start_time == ''){
		echo '0';
	}
	$duration = explode(' ', $key->package)[0];
	$id = $key->id;
echo	$query1 = "UPDATE online_consultation SET session_duration = $duration WHERE id=$id";echo '<br>';
	
	//$wpdb->query($query1);
}


