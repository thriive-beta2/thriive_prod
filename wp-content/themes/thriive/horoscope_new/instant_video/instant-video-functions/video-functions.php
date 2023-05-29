<?php 
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
include_once get_stylesheet_directory() . '/framework/core-functions.php';

$action = $_POST['action'];
//echo $action;

switch($action){
	case 'get_current_session':
	get_current_session();
	break;

	case 'accept_video_session':
	$ocid = $_POST['ocid'];
	accept_video_session($ocid);
	break;

	case 'start_video_session':
	$ocid = $_POST['ocid'];
	start_video_session($ocid);
	break;

	case 'change_therapist_video':
	$ocid = $_POST['ocid'];
	change_therapist_video($ocid);
	break;

	case 'take_later_video':
	$ocid = $_POST['ocid'];
	take_later_video($ocid);
	break;

	case 'disable_session':
	$ocid = $_POST['ocid'];
	disable_session($ocid);
	break;
}


function get_current_session(){
global $wpdb;
$current_user = wp_get_current_user();
$session_id = $current_user->ID;  
$curr_user_role = $current_user->roles;
foreach($curr_user_role as $key){
if($key == 'therapist' || $key == 'author'){
  $curr_user_role = 'therapist';
}else{
  $curr_user_role = 'user';
}

}
if($curr_user_role == 'therapist'){
	$query = "SELECT * FROM online_consultation WHERE tid=$session_id AND action='videocall' AND payment_status='success' AND therapy_name='meditation' ORDER BY id DESC LIMIT 1";
	$res = $wpdb->get_results($query);
	if(count($res)>0){
		if($res[0]->tid_accept == 0){
			$call_response = check_call_response($res[0]->id);
			if($call_response){
				if($call_response == 1){
					echo 't0,'.$res[0]->id.','.$res[0]->uname;
				}
		}else{
					echo 't5,'.$res[0]->id;
				}
	}else if($res[0]->tid_accept == 1 AND $res[0]->uid_accept == 0){
			echo 't1,'.$res[0]->id.',';
			if(empty($res[0]->call_id)){
				if($res[0]->chat_call_status == 1){
				place_call_for_user($res[0]->id,$res[0]->uid,$res[0]->session_duration);
				}
				create_instant_video_room($res[0]->id,$res[0]->session_duration);	
			}
	
	}else if($res[0]->tid_accept == 1 AND $res[0]->uid_accept == 1){
			echo 't2,'.$res[0]->id.','.$res[0]->call_id.'?prejoin=false&password=123456&name='.$res[0]->tname;
			forbid_further_access_to_room($res[0]->id);
		}else if(($res[0]->tid_accept == '-1' OR $res[0]->uid_accept == '-1' OR ($res[0]->uid_accept == '-2' AND $res[0]->tid_accept == '-3') OR ($res[0]->uid_accept == '-2' AND $res[0]->tid_accept == '-2')) AND $res[0]->def_warn == '0'){
			echo 't4,'.$res[0]->id.','.$res[0]->tname;
			update_therapist_warning($res[0]->id);
		}else{
			echo 't3,'.$res[0]->id;
		}
	}
}else{
	$query = "SELECT * FROM online_consultation WHERE uid=$session_id AND action='videocall' AND payment_status='success' AND therapy_name='meditation' ORDER BY id DESC LIMIT 1";
	$res = $wpdb->get_results($query);
	if(count($res)>0){
		if($res[0]->tid_accept == 0){
			$call_response = check_call_response($res[0]->id);
			if($call_response){
				if($call_response == 1){
					echo 'u1,'.$res[0]->id.','.$res[0]->uname.','.remaining_time($res[0]->created_date);
				}else{
					echo 'u3,'.$res[0]->id.','.$res[0]->uname;
				}
			}else{
			if($res[0]->chat_call_status == 0){
					place_call_to_therapist('place_call_for_video',$res[0]->id,'1000060521',$res[0]->session_duration,$res[0]->tid);
				}
			echo 'u0,'.$res[0]->id.','.$res[0]->uname.','.strtotime($res[0]->created_date);
			}
		}else if($res[0]->tid_accept == 1 AND $res[0]->uid_accept == 0){
			echo 'u2,'.$res[0]->id.','.$res[0]->uname;
		}else if($res[0]->tid_accept == 1 AND $res[0]->uid_accept == 1){
			echo 'u4,'.$res[0]->id.','.$res[0]->uname.','.$res[0]->call_id.'?prejoin=false&name='.$res[0]->uname;
			forbid_further_access_to_room($res[0]->id);
		}else if($res[0]->tid_accept == '-2' AND $res[0]->uid_accept == '-3'){
			echo 'u5,'.$res[0]->id.','.$res[0]->uname;
		}else if($res[0]->tid_accept == '-2' AND $res[0]->uid_accept == '-2'){
			echo 'u5,'.$res[0]->id.','.$res[0]->uname;
		}else if($res[0]->tid_accept == '-1' OR $res[0]->uid_accept == '-1'){
			echo 'u6,'.$res[0]->id.','.$res[0]->uname;
		}else{
			echo 'u7,'.$res[0]->id.','.$res[0]->uname;
		}
	}
}




}

//get_current_session();

function check_call_response($ocid){

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
  CURLOPT_POSTFIELDS => array('action' => 'call_response','ocid' => $ocid),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=hrq88e5cbsb17rnsbp5ag9sls3'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;

}

function place_call_to_therapist($action,$ocid,$ivr,$session_duration,$user_id){
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
  CURLOPT_POSTFIELDS => array('action' => $action,'ocid' => $ocid,'ivr' => '1000060521','phone_number' => $customer_number,'session_duration' => $session_duration),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=hrq88e5cbsb17rnsbp5ag9sls3'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
if(json_decode($response)->status == 'Success'){
	$query = "UPDATE online_consultation SET chat_call_status = 1 WHERE id = $ocid";
	$wpdb->query($query);
}else{
	$query = "UPDATE online_consultation SET rem_time = '$response' WHERE id = $ocid";
	$wpdb->query($query);
}

}


function accept_video_session($ocid){
	global $wpdb;
	$query = "SELECT tid_accept FROM online_consultation WHERE id = $ocid";
	$res = $wpdb->get_results($query);
	if($res[0]->tid_accept == 1){
		echo 0;
	}else if($res[0]->tid_accept == 0){
		$query = "UPDATE online_consultation SET tid_accept = 1 WHERE id=$ocid";
		echo $wpdb->query($query);
		
	}else{echo 'no_condition_match';}
}


function place_call_for_user($ocid,$user_id,$session_duration){
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
  CURLOPT_POSTFIELDS => array('action' => 'place_call_for_video','ocid' => $ocid,'ivr' => '1000060519','phone_number' => $customer_number,'session_duration' => $session_duration),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=hrq88e5cbsb17rnsbp5ag9sls3'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
if(json_decode($response)->status == 'Success'){
	$query = "UPDATE online_consultation SET chat_call_status = 2 WHERE id = $ocid";
	$wpdb->query($query);
}else{
	$query = "UPDATE online_consultation SET rem_time = '$response' WHERE id = $ocid";
	$wpdb->query($query);
}
}


function start_video_session($ocid){
	global $wpdb;
	$query = "SELECT uid_accept FROM online_consultation WHERE id = $ocid";
	$res = $wpdb->get_results($query);
	if($res[0]->uid_accept == 1){
		echo 0;
	}else if($res[0]->uid_accept == 0){
		$query = "UPDATE online_consultation SET uid_accept = 1 WHERE id=$ocid";
		echo $wpdb->query($query);
	}else{echo 'no_condition_match';}
}





function create_instant_video_room($ocid,$session_duration){
echo $session_duration;
global $wpdb;
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
$extended_duration = ($session_duration+2)*60;
settype($extended_duration, 'integer');
$firstDate = date('Y-m-d', strtotime(date('Y-m-d H:i:s'))).'T'.date('H:i:s', strtotime(date('Y-m-d H:i:s')));
$extendedDate = date('Y-m-d', strtotime(date('Y-m-d H:i:s'))+$extended_duration).'T'.date('H:i:s', strtotime(date('Y-m-d H:i:s'))+$extended_duration);

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
  CURLOPT_POSTFIELDS => 'project_id=294&roomname='.$room_id.'&password=123456&auto_end_meeting=1&starts_at='.$firstDate.'&ends_at='.$extendedDate,
  CURLOPT_HTTPHEADER => array(
    'x-api-key: u1KsTH3zwr0rh2z7x1Wz2fAZToirNHh6c2ibqT58',
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: '.$access_token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
$link = json_decode($response)->data->link;
settype($link, 'string');
$query = "UPDATE online_consultation SET call_id = '$link' WHERE id=$ocid";
$wpdb->query($query);
}
}

function change_therapist_video($ocid){
	global $wpdb;
	$query = "UPDATE online_consultation SET tid_accept = '-2',uid_accept='-3',func_name='change_therapist_video' WHERE id=$ocid";
	echo $wpdb->query($query);
}

function take_later_video($ocid){
	global $wpdb;
	$query = "UPDATE online_consultation SET tid_accept = '-2',uid_accept='-2',func_name='take_later_video' WHERE id=$ocid";
	echo $wpdb->query($query);	
}

function forbid_further_access_to_room($ocid){
	global $wpdb;
	$query = "UPDATE online_consultation SET connected = connected+1 WHERE id=$ocid";
	$wpdb->query($query);

	$query = "SELECT connected FROM online_consultation WHERE id = $ocid";
	$res = $wpdb->get_results($query);

	if($res){
		if($res[0]->connected == 2){
			$query = "UPDATE online_consultation SET tid_accept = 6 WHERE id=$ocid";
			$wpdb->query($query);
		}
	}

}


function remaining_time($created_date){
	$created_date = strtotime($created_date);
	$waiting_duration = $created_date+300;
	$current_date = strtotime(date("Y-m-d H:i:s"));
	$remaining_duration = $current_date - $waiting_duration;

	if($remaining_duration < 0){
		$remaining_duration = explode(".",round((($remaining_duration*(-1))/60), 2));
		$remaining_seconds  = round((60 * $remaining_duration[1])/100,0);
	}else{
		return "expired";
	}
	return $remaining_duration[0].':'.$remaining_seconds;
}

function disable_session($ocid){
	global $wpdb;
	$query = "SELECT uid_accept FROM online_consultation WHERE id=$ocid";
	$res = $wpdb->get_results($query);

	if($res[0]->uid_accept != '0' OR $res[0]->tid_accept != '0'){
		$query = "UPDATE online_consultation SET uid_accept = '-1',tid_accept= '-1',remaining_session=1,func_name='disable_session' WHERE id=$ocid";
		return $wpdb->query($query);
	}else{

	}


}


function update_therapist_warning($ocid){
	global $wpdb;
	$query = "SELECT def_warn FROM online_consultation WHERE id=$ocid";
	$res = $wpdb->get_results($query);

	if($res[0]->def_warn == 0){
		$query = "UPDATE online_consultation SET def_warn=1 WHERE id=$ocid";
		$wpdb->query($query);
	}else{
		
	}
}

