<?php 
require '/var/www/html/wp-config.php';
global $wpdb;
$date = date('Y-m-d');
$results = $wpdb->get_results("SELECT * FROM oc_video_call WHERE book_date = '".$date."' ");
if($results){
	foreach($results as $rs){
		$book_time = $rs->book_time;
		$date1 = time();
		$date2 = strtotime($book_time);
		$mins = ($date2 - $date1) / 60;
		if($rs->send_email == 0){
			if($mins <= 5){
				$uuserdata = get_userdata($rs->uid);
				$tuserdata = get_userdata($rs->tid);
				$row = $wpdb->get_row("SELECT * FROM online_consultation WHERE id = '".$rs->oc_id ."' ");
				$link ="https://thriive.in/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/index.php?appid=2dbedd3f03bf4a089b098987a8407baa&channel=".$rs->channel ."&token=&u=ttime";
				$tmsg1 = "Click Here ".$link." to start your Tarot Card reading session with ".$tuserdata->first_name ." ".$tuserdata->last_name ." at ".date("h:i a",strtotime($book_time));
				$tmsg = "<a href='".$link."'>Click Here</a> to start your Tarot Card reading session with ".$uuserdata->first_name ." ".$uuserdata->last_name ." at ".date("h:i a",strtotime($book_time));
				$tmobile = get_user_meta($rs->tid,'mobile',true);
				$umobile = get_user_meta($rs->uid,'mobile',true);
				sendSMS($tmobile,$tmsg);
				sendSMS($umobile,$tmsg);
				$tsubject = "Your Tarot Reading Session starts soon! ";
				
				sendEmail($uuserdata->user_email, $tsubject, $tmsg1);
				$tmsg = "Hello ,<br/>".$uuserdata->first_name ." ".$uuserdata->last_name ." has booked a session with you.Your session will start at ".date("h:i a",strtotime($book_time)). ".Use this link to start you video session: https://thriive.in/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/index.php?appid=2dbedd3f03bf4a089b098987a8407baa&channel=".$rs->channel ."&token=&u=ttime";
				$wpdb->query("UPDATE oc_video_call SET send_email = 1 WHERE id = '". $rs->id ."'");
				sendEmail($tuserdata->user_email, $tsubject, $tmsg);
				
				$alertmsg = "For User : <a href='".$link."'>Click Here</a> to start your Tarot Card reading session with ".$uuserdata->first_name ." ".$uuserdata->last_name ." at ".date("h:i a",strtotime($book_time));
				sendSMS('9821717700',$alertmsg);
				sendSMS('8850630321',$alertmsg);
				sendSMS('9702917993',$alertmsg);
				sendEmail('admin@thriive.in', $tsubject, $tmsg);
			}	
		}	
			
	}
}	
		
?> 