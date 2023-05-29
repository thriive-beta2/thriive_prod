<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
global $wpdb;


$action = $_POST['action'];


if($action == 'check_appointment_session'){
	$payuid = $_POST['payuid'];
	check_appointment_session($payuid);
	
}else if($action == 'updateAppointment'){
	$new_therapist = $_POST['new_therapist'];
	$new_date = $_POST['new_date'];
	$new_time = $_POST['new_time'];
	$new_therapy = $_POST['new_therapy'];
	$ocid = $_POST['oc_id'];
	$new_email = $_POST['new_email'];
	$new_name = $_POST['new_name'];
	$comment = $_POST['comment'];

	updateAppointment($new_therapist,$new_date,$new_time,$new_therapy,$ocid,$new_email,$new_name,$comment);

}else if($action == 'fetch_new_therapist'){
	$tid = $_POST['new_therapist'];
	fetchNewTherapist($tid);
	
}



function updateAppointment($new_therapist,$new_date,$new_time,$new_therapy,$ocid,$new_email,$new_name,$comment){
	global $wpdb;

	$current_user = wp_get_current_user();
	$currentAdmin = $current_user->data->user_login;
	$currentDate = date('Y-m-d H:i:s');

	$supportData = array(
			'status'=> 'Positive',
			'administrator' => $currentAdmin,
			'date' => $currentDate,
			'comment' => $comment
		);

	$supportString = json_encode($supportData);


	$query1 = "UPDATE online_consultation SET tid=$new_therapist,category_name='$new_therapy',tname = '$new_name',temail = '$new_email', support_modification = '$supportString' WHERE id = $ocid LIMIT 1";
	$query2 = "UPDATE oc_video_call SET tid=$new_therapist,book_date='$new_date',book_time='$new_time' WHERE oc_id = $ocid LIMIT 1";

	if($wpdb->query($query1) == 1){
		if($wpdb->query($query2) == 1){
			echo '1';
		}else{
			echo '2';
		}
	}else{
		echo '3';
	}

//print_r($query2);

	//echo $query2.'<br>'.$query1;



};


function fetchNewTherapist($tid){
	global $wpdb;
	$query = "(SELECT * FROM wp_users JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id AND wp_usermeta.meta_key = 'first_name' WHERE ID=$tid LIMIT 1)
UNION
(SELECT * FROM wp_users JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id AND wp_usermeta.meta_key = 'last_name' WHERE ID=$tid LIMIT 1)";
	$res = $wpdb->get_results($query);

	$therapistName = $res[0]->meta_value.' '.$res[1]->meta_value;

	echo $res[0]->user_email.','.$therapistName;

	//print_r($res);

}



function check_appointment_session($payuid){
	
	global $wpdb;
	
	//$query = "SELECT * FROM online_consultation JOIN oc_video_call ON online_consultation.id = oc_video_call.oc_id WHERE payuid = $payuid AND therapy_name = 'Appointment' ORDER BY id DESC LIMIT 1";


	$query1 = "SELECT * FROM online_consultation WHERE payuid=$payuid AND therapy_name = 'Appointment' ORDER BY id DESC LIMIT 1";
	$res1 = $wpdb->get_results($query1);

	if(count($res1)>0){
			$ocid = $res1[0]->id;
			$query2 = "SELECT * FROM oc_video_call WHERE oc_id = $ocid ORDER BY id DESC LIMIT 1";
			$res2 = $wpdb->get_results($query2);

				if(count($res2)>0){
					$result = $res1[0]->tname.','.$res1[0]->uname.','.$res1[0]->category_name.','.$res2[0]->book_date.','.$res2[0]->book_time.','.$res1[0]->tid.','.$res1[0]->id.','.'0';
				}else{
					$result = $res1[0]->tname.','.$res1[0]->uname.','.$res1[0]->category_name.','.'Manual Call'.','.'Manual Call'.','.$res1[0]->tid.','.$res1[0]->id.','.'1';
				}


	}else{
		$result = 'none';
	}
		print_r($result);

	//print_r($res);


}





//echo $action;
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$fp = fopen('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/testjson/therapist.json', 'w');
fwrite($fp, $action);
fclose($fp);

$contents = file_get_contents('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/testjson/therapist.json');

print_r($contents);
*/


/*
$query = "SELECT * FROM online_consultation WHERE ID = 56582";
$res = $wpdb->get_results($query);
print_r($res);	
*/
