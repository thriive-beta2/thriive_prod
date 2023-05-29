<?php 
require '/var/www/html/wp-config.php';
global $wpdb;
$date = date('Y-m-d');
$results = $wpdb->get_results("SELECT v.*,o.therapy_name,o.tname FROM oc_video_call v,online_consultation o WHERE book_date = '".$date."' AND v.oc_id = o.id AND email_sms = 0");
if($results){
	foreach($results as $rs){
		$book_time = $rs->book_time;
		$date1 = time();
		$date2 = strtotime($book_time);
		$mins = ($date2 - $date1) / 60;
		//if($rs->send_email == 0){
			$uuserdata = get_userdata($rs->uid);
			$tuserdata = get_userdata($rs->tid);
			$tmobile = get_user_meta($rs->tid,'mobile',true);
			$umobile = get_user_meta($rs->uid,'mobile',true);
			if($mins <= 10){
				$link = get_site_url()."/appointment";
	
				$tsubject = "You have an Appointment booking for ".date("dS M Y",strtotime($book_time)).", ".date("h:i a",strtotime($book_time));
				$msg = "Hello ".$uuserdata->first_name ." ".$uuserdata->last_name .", your session with ".$rs->tname ." starts at ".date("h:i a",strtotime($book_time)).". Please log in the Dashboard and go to the Appoitment page to start the session immediately. ".$link." .Once the session is complete, please encourage them to take another session from the Thriive website. The link for the same has been sent to the user. All the best for your session, we hope you follow the Thriive standard and have a succesful session. Love & Light, Team Thriive";
				$tsubject = "Your session with ".$rs->tname ." starts in 10 minutes.";
				sendEmail($tuserdata->user_email, $tsubject, $msg);
				sendEmail('admin@thriive.in', $tsubject, $msg);
				sendEmail('prathamesh@thriive.in', $tsubject, $msg);
				
				$tempid = "1007723331729603665";
				$tmsg =	"Hello, your session with ".$uuserdata->first_name ." ".$uuserdata->last_name ." starts at ".date("h:i a",strtotime($book_time)).". Please log in the Dashboard and go to the Appointment page to start the session immediately. ".$link.". Love & Light, Team Thriive";
				sendSMS($tmobile,$tmsg,$tempid);
				sendSMS("8850630321",$tmsg,$tempid);		

				//$tempid = "1007723331729603665";
				$tmsg = "Hello, your session with ".$rs->tname ." starts at ".date("h:i a",strtotime($book_time)).". Please log in the Dashboard and go to the Appointment page to start the session immediately. ".$link.". Love & Light, Team Thriive";	
				sendSMS($umobile,$tmsg,$tempid);
				sendSMS("8850630321",$tmsg,$tempid);
				$wpdb->query("UPDATE online_consultation SET email_sms = 1 WHERE id = '". $rs->oc_id ."'");
			}	
					
		//}
	}	
}	
	