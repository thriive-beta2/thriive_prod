<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include '/var/www/html/wp-config.php';

$channel = $_POST['channel'];
$action = $_POST['action'];
$filename = "/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/".$channel.".json";
//print_r($_POST);
if($action == 'check'){
	$status = $_POST['status'];
	$time_spent = $_POST['time_spent'];
	$role = $_POST['role'];
	check_end($filename, $status, $time_spent, $channel, $role);
}else if($action == 'end'){
	end_call($filename);
}else if($action == 'block'){
	$vid_status = $_POST['vid_status'];
	$role = $_POST['role'];
	block_video($filename,$role,$vid_status);
}

function check_end($filename, $status, $time_spent, $channel, $role){
	global $wpdb;
if(file_exists($filename)){
	$file_contents = file_get_contents($filename);
	$file_contents = json_decode($file_contents);
	if($file_contents[0] == 1 and $status == 0){
	$fp = fopen($filename, "w");
	$file_contents[0] = '0';
	$content = json_encode($file_contents);
	fwrite($fp, $content);
	echo '0';	
	}else{
		print_r($file_contents[0]);
		if($file_contents[1] == 0){
			echo '|0';
		}else if($file_contents[1] == 1){
			echo '|1';
		}
		if($file_contents[2] == 0){
			echo "|0";
		}else if($file_contents[2] == 1){
			echo '|1';
		}
	}
}else{
	$fp = fopen($filename, "w");
	$content = array("0","0","0");
	$content = json_encode($content);
	fwrite($fp, $content);
//	print_r($content);
}
	
	if($time_spent >= 30){	
	$query = "SELECT * FROM oc_video_call WHERE channel='$channel'";
	$data = $wpdb->get_results($query);
	$curr_time = $data[0]->$role;
	$curr_time = $curr_time +30;
	$query = "UPDATE oc_video_call SET $role=$curr_time  WHERE channel='$channel'";
	$query_run = $wpdb->query($query);
	$query = "SELECT * FROM oc_video_call WHERE channel='$channel'";
	$data = $wpdb->get_results($query);
	$utime = $data[0]->utime;
	$ttime = $data[0]->ttime;
	if($utime >= $ttime){
		$act_time = $ttime;	
	}else if($ttime >= $utime){
			$act_time = $utime;	
	
	}
	if($act_time >= 5400){
		$query = "UPDATE oc_video_call SET channel='expired'  WHERE channel='$channel'";
		$query_run = $wpdb->query($query);
		$fp = fopen($filename, "w");
		$content = array("1");
		$content = json_encode($content);
		fwrite($fp, $content);
		echo '|1';		
	}else{ echo '|0';}
	echo '|1';

	
}}

function end_call($filename){
	$fp = file_get_contents($filename);
	$file_contents = json_decode($fp);
	$file_contents[0] = 1;
	$fp = fopen($filename, "w");
	$content = json_encode($file_contents);
	fwrite($fp, $content);
}

function block_video($filename, $role){
	$fp = file_get_contents($filename);
	$file_contents = json_decode($fp);

	if($role == 'utime' AND $file_contents[1] == 0){
		$file_contents[1] = 1;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);
	}else if($role == 'utime' AND $file_contents[1] == 1){
		$file_contents[1] = 0;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'ttime' AND $file_contents[2] == 0){
		$file_contents[2] = 1;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'ttime' AND $file_contents[2] == 1){
		$file_contents[2] = 0;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}		
	






/*	if($role == 'utime' AND $file_contents[1] == 2){
		echo 'yes';
		$file_contents[1] = 4;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'ttime' AND $file_contents[1] == 1){
		$file_contents[1] = 3;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'ttime' AND $file_contents[1] == 3){
		$file_contents[1] = 1;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'ttime' AND $file_contents[1] == 0){
		$file_contents[1] = 1;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'utime' AND $file_contents[1] == 0){
		$file_contents[1] = 2;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'utime' AND $file_contents[1] == 4){
		$file_contents[1] = 2;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'ttime' AND $file_contents[1] == 4){
		$file_contents[1] = 3;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}else if($role == 'utime' AND $file_contents[1] == 3){
		$file_contents[1] = 2;
		$fp = fopen($filename, "w");
		$content = json_encode($file_contents);
		fwrite($fp, $content);		
	}
	*/

	
}







?>