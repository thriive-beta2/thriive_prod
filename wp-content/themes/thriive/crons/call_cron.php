<?php 
/* Template Name: Call Cron  */
require '/var/www/html/wp-config.php';
global $wpdb;		
//include_once get_stylesheet_directory().'/new-header.php'; 
/* $whatsrec = $wpdb->get_results("SELECT * FROM send_whatsapp_reminder WHERE DATE(created_date) = '".date("Y-m-d") ."' AND email_sent = 0");
if(!empty($whatsrec)){ 
	foreach($whatsrec as $rs){
		echo $rs->created_date;echo "<br/>";
		$date1 = strtotime($rs->created_date);
		$userow = $wpdb->get_row("SELECT * FROM online_consultation WHERE DATE(created_date) = '".date("Y-m-d") ."' AND uid = '".$rs->uid."'  ORDER BY id DESC LIMIT 1");
		if($userow){	
			$date2 = strtotime($userow->created_date);
			
			echo 'dff'.$userow->created_date;echo "<br/>";
		} else {
			$date2 = date("Y-m-d H:i:s");
		}		
			echo $mins = ($date1 - $date2) / 60;echo "<br/>";
			$uid = $rs->uid;
			$uidmobile = get_user_meta($uid,'mobile',true);
			$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
			if($mins >= 10){
				
			}
				
	}	
}	 */

//include_once get_stylesheet_directory().'/new-header.php'; 
$results = $wpdb->get_results("SELECT k.* FROM knowlarity_after_call k WHERE consultation_update=0 ");
$tempid = '1007290231972305761';

if(!empty($results)){ 
	foreach($results as $rs){
		$call_uuid = explode("_",$rs->call_uuid);
		$rs1 = $wpdb->get_row("SELECT o.id,o.session_duration,o.def_warn,o.uid,o.email_sms,o.remaining_duration,o.tid,o.payment_txnid FROM online_consultation o WHERE o.call_id LIKE '%". $call_uuid[0] ."%' AND action='call'");
		if($rs1){ 
			$knowlarityrow = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid LIKE '%".$call_uuid[0] ."%' ");
			$call_duration = $knowlarityrow->call_duration; 
			$call_timer = $rs1->remaining_duration;
			$session_duration = $rs1->session_duration;
			$cduration = explode(":",$call_duration);
			$umobile = get_user_meta($rs1->uid, 'mobile', true);
			$remaining_duration = $session_duration - intval($cduration[1]);
			$busy_date = date('Y-m-d H:i:s', strtotime("+5 mins"));
			if($rs->call_status == 'Connected' || $rs->call_status == '${call_status}'){ 
				if($rs->call_transfer_status != 'Not Connected' && $rs->call_transfer_status != 'Missed'){
					
					if($rs->call_transfer_status == 'Connected'){ 
						$wpdb->query("UPDATE online_consultation SET remaining_session = 0,connected=1,remaining_duration='". $remaining_duration."',call_id='". $rs->call_uuid ."',func_name='made 0 by cron',waiting=0,busy_date='".$busy_date."' WHERE  id = '". $rs1->id ."' AND def_warn != 4");
						if(intval($cduration[1]) == 0 && intval($cduration[2]) <= 10){
							$firstpayrow = $wpdb->get_row("SELECT session_duration FROM online_consultation WHERE payment_txnid = '".$rs1->payment_txnid ."' LIMIT 1");
							$wpdb->query("UPDATE online_consultation SET cron_update=3,busy_date='".date("Y-m-d H:i:s")."' WHERE id = '". $rs1->id ."' AND remaining_duration = '". $firstpayrow->session_duration ."'");
							$tempid = "1007290231972305761";
							$link = site_url(); 
							$cgenerated_url = generateBitlyURL($link)['data']['url'];
							$msg = "Hi from Thriive. You have a pending session available. Please click here to select a therapist and take a session.".$cgenerated_url;
							sendSMS($umobile,$msg,$tempid);
						}
						$wpdb->query("UPDATE therapist_availability_status SET prev_session_resp = 0 WHERE tid = '". $rs1->tid ."'");
					} 
				} else {
					$wpdb->query("UPDATE online_consultation SET remaining_duration='".$remaining_duration ."',connected=0,busy_date='".date("Y-m-d H:i:s")."',func_name='call cron',waiting=0,call_id='". $rs->call_uuid ."' WHERE id = '". $rs1->id ."'   AND (def_warn !=1 AND def_warn != 4)");
					$wpdb->query("UPDATE therapist_availability_status SET availability_status = 1,modified_date = '".date("Y-m-d H:i:s")."' WHERE tid = '". $rs1->tid ."'");
					if(intval($cduration[1]) == 0 && intval($cduration[2]) <= 10){
						$firstpayrow = $wpdb->get_row("SELECT session_duration FROM online_consultation WHERE payment_txnid = '".$rs1->payment_txnid ."' LIMIT 1");
						$wpdb->query("UPDATE online_consultation SET cron_update=3,func_name='customer miss cron',busy_date='".date("Y-m-d H:i:s")."' WHERE id = '". $rs1->id ."' AND id = (SELECT MAX(id) as id FROM online_consultation WHERE payuid = '".$rs->payuid ."') AND remaining_duration = '". $firstpayrow->session_duration ."' AND def_warn != 4");
						$tempid = "1007290231972305761";
						$link = site_url(); 
						$cgenerated_url = generateBitlyURL($link)['data']['url'];
						$msg = "Hi from Thriive. You have a pending session available. Please click here to select a therapist and take a session.".$cgenerated_url;
						sendSMS($umobile,$msg,$tempid);
					}	
				}
					
			} else { 
				$wpdb->query("UPDATE online_consultation SET remaining_duration='".$remaining_duration ."',func_name='call cron else',tid_accept=2,busy_date='".$busy_date."',uid_accept=0,email_sms=1,waiting=0,connected=0,call_id='". $rs->call_uuid ."' WHERE id = '". $rs1->id ."'  AND (def_warn !=1 AND def_warn != 4)");
				$wpdb->query("UPDATE therapist_availability_status SET prev_session_resp = prev_session_resp + 1 WHERE tid = '". $rs1->tid ."'");
				$wpdb->query("UPDATE online_consultation SET remaining_duration='".$remaining_duration ."',tid_accept=2,connected=0,busy_date='".$busy_date."',call_id='". $rs->call_uuid ."' WHERE id = '". $rs1->id ."' AND (def_warn =1 OR def_warn = 4)");
				$wpdb->query("UPDATE therapist_availability_status SET prev_session_resp = prev_session_resp + 1 WHERE tid = '". $rs1->tid ."'");
				if(intval($cduration[1]) == 0 && intval($cduration[2]) <= 10){
					
					$firstpayrow = $wpdb->get_row("SELECT session_duration FROM online_consultation WHERE payment_txnid = '".$rs1->payment_txnid ."' LIMIT 1");
					$wpdb->query("UPDATE online_consultation SET cron_update=3,busy_date='".date("Y-m-d H:i:s")."' WHERE id = '". $rs1->id ."'  AND id = (SELECT MAX(id) as id FROM online_consultation WHERE payuid = '".$rs->payuid ."') AND remaining_duration = '". $firstpayrow->session_duration ."'");
					$tempid = '1007684902010570563';
					$msg = "Hi from Thriive. Sorry the selected Therapist is not Reachable right now. Please select another Therapist or take your session whenever convenient";
					sendSMS($umobile,$msg,$tempid);
					$tempid = '1007290231972305761';
					$link = site_url(); 
					$cgenerated_url = generateBitlyURL($link)['data']['url'];
					$msg = "Hi from Thriive. You have a pending session available. Please click here to select a therapist and take a session.".$cgenerated_url;
					sendSMS($umobile,$msg,$tempid);
					//sendSMS('8850630321',$msg,$tempid);
				}
			}
			$wpdb->query("UPDATE knowlarity_after_call SET consultation_update=1 WHERE ID = '". $rs->ID ."'");
				
		} else {
			if($rs->req_status == 'failed'){
				$wpdb->query("UPDATE knowlarity_after_call SET consultation_update=1 WHERE ID = '". $rs->ID ."'");
			}
		}
		
	}	
} 

	


$results = $wpdb->get_results("SELECT DISTINCT(payuid) as payuid FROM online_consultation  WHERE payment_status = 'success' AND payuid != '' AND payment_date = '' ORDER BY id DESC LIMIT 50");		
if(!empty($results)){ 
	foreach($results as $rs){  
		$row = $wpdb->get_row("SELECT created_date FROM online_consultation  WHERE payuid = '". $rs->payuid ."' LIMIT 1");
		echo "UPDATE online_consultation SET payment_date = '". $row->created_date ."' WHERE payuid = '". $rs->payuid ."'";echo "<br/>";
		$wpdb->query("UPDATE online_consultation SET payment_date = '". $row->created_date ."' WHERE  payuid = '". $rs->payuid ."'"); 
	}
}	


$results = $wpdb->get_results("SELECT k.* FROM transaction_info k WHERE 1 ORDER BY info_id DESC LIMIT 1000");
if(!empty($results)){ 
	foreach($results as $rs){  
		
		$row = $wpdb->get_var("SELECT COUNT(*) FROM online_consultation  WHERE payment_txnid = '".$rs->txnid ."'  AND payment_status = 'success'");
		if($row == 0){
			echo $rs->uemail;echo "<br/>";
			$freemins = $rs->udf2;
			$sessionarr = explode(",",$freemins);
			//print_r($sessionarr);
			
			$productinfo = $rs->productinfo;
			$date = $rs->created_date;
			
			$package = $rs->udf1;
			$txnid = $rs->txnid;
			$payuid = $rs->payuid;
			$udf3 = explode(",",$rs->udf3);
			//print_r($udf3);
			$firstname = $rs->firstname;
			$therapist_name = $wpdb->get_row("SELECT post_author,ID,post_title FROM wp_posts WHERE post_name = '". $udf3[0] ."'");
			$tid = $therapist_name->post_author;
			$tuserdata = get_userdata($therapist_name->post_author);
			$temail = $tuserdata->user_email;	
			//$tfirst_name = $tuserdata->first_name .' '.$tuserdata->last_name;
			$tfirst_name = $therapist_name->post_title;
			$coupon = $cat_name = '';
			if($sessionarr[6] != ''){
				$coupon = $sessionarr[6];	
			}	
			if($sessionarr[7] != '' && $productinfo != 'Appointment'){
				$cat_name = $sessionarr[7];	
			} 
			$email = $rs->uemail;
			$userdata = $wpdb->get_row("SELECT ID FROM wp_users WHERE user_email = '". $email ."'");
			$uid = '';
			if($userdata){
				$uid = $userdata->ID; 
			}	
			$status = $rs->payment_status;
			$data = array( 
				'uid' => $uid,
				'uname'	=> $firstname,
				'uemail' => $email,
				'tid' => $tid,
				'tname'	=> $tfirst_name,
				'temail' => $temail,
				'coupon_code' => $coupon,
				'package' => $package,
				'therapy_name' => $productinfo, 
				'category_name' => $cat_name, 
				'cron_update' => 1,
				'payment_status' => $status,
				'payment_txnid' => $txnid,
				'payment_date' => $date,
				'created_date' => $date,
				'modified_date' => $date
			);
		
			$data['no_of_sessions'] = 1;
			
			$amount = $sessionarr[0];
			$data['amount'] = $amount;
			$action  = $sessionarr[5];
			$no_of_sessions = explode(" ", $sessionarr[1]);
			$data['no_of_sessions'] = 1;
			$data['action'] = $action;
			$data['pkgdescription'] = $sessionarr[2];
			$data['remaining_duration'] =  $data['session_duration'] = $sessionarr[4];
			//$data['remaining_duration'] =  0;
			$session_duration = $sessionarr[4] + 5;
			$data['busy_date'] = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
			if($coupon != '' && $coupon != '-' && $coupon != 'NA'){
				$is_applied = "Yes";
			} else {
				$is_applied = "No";
			}
				
			if($status == 'success' && $productinfo != 'Appointment' && $action != 'call'){
				$data['remaining_session'] = 0;
			}	else {
				$data['remaining_session'] = 1;
			}
			$busy_date = $data['busy_date'];
			if($action == 'book_latercall'){
				$data['action'] =  "call";
			}elseif($action == 'book_laterchat'){
				$data['action'] =  "chat";	
			}	
			if(strpos($firstname, "@") !== false){
				$uname = explode('@', $firstname)[0];
			} else{
				$uname = $firstname;
			}
			$uidmobile = get_user_meta($uid,'mobile',true);
			$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
			$tidmobile = get_user_meta($tid,'mobile',true);
			$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
			$therapiststatus = getTherapistConsultStatus($tid);
			if($productinfo != 'Appointment'){ 
				/* echo "hg";
				echo "<pre>";print_r($data); */
				$wpdb->insert("online_consultation",$data);
				echo 'ds'.$lastid = $wpdb->insert_id;
				if($coupon != '' && $coupon != '-' && $coupon != 'NA'){
					$couponresult['oc_id'] = $lastid;
					$couponresult['uid'] = $uid;
					$couponresult['coupon_code'] = $coupon;
					$couponresult['created_date'] = $couponresult['modified_date'] = date("Y-m-d H:i:s");
					$wpdb->insert("coupon_code_consultation",$couponresult);
				}
				if($status == 'success' && $productinfo == 'Appointment'){
					/* $book_date_time = $udf3[1].','.$udf3[2];
					$split_datetime = explode(",",$book_date_time);
					$timestamp = strtotime($split_datetime[1]) + 300*60;
					$endtime = date('H:i:s', $timestamp);
					$video_data = array(
						'oc_id' => $lastid,
						'tid' => $tid,
						'uid' => $uid,
						'call_time' => '40',
						'channel' => rand().time(),
						'action' => $action,
						'book_date' => date("Y-m-d",strtotime($split_datetime[0])),
						'book_time' => date("H:i:s",strtotime($split_datetime[1])),
						'end_time' => $endtime == '00:00:00'?'23:59:59':$endtime,
						'page_id' => 0,
						'status' => 0
					);
					if($action == "videocall" ||  $action == "call" || $action == "chat"){
						$video_data['channel'] = rand().time();
						create_room($video_data['channel']);
					}	
					$wpdb->insert("oc_video_call",$video_data); */
					//$tmsg = "Your client ".$uname." has taken  taken a slot for video call session on ".date("dS M Y",strtotime($split_datetime[0]))." at ".date("h:i a",strtotime($split_datetime[1])).". Please login to your account and start online video call with the client on thriive.in"; 
					/* $tmsg = $uname." has booked a Premium session at ".date("h:i a",strtotime($split_datetime[1]))." on ".date("dS M Y",strtotime($split_datetime[0])).". Please start the session 5 minutes in advance to avoid any delay.Love & Light - Thriive Wellness.";
					
					$tempid = '1007557749947996534';
					
					sendSMS($tidmobile,$tmsg,$tempid); */
					//sendSMS('8850630321',$tmsg,$tempid);
					/* $tmsg = "Hi,<br/>".$uname." has booked a Premium audio/ video session with you. Their payment for  ".$split_datetime[0]." at ".$split_datetime[1]." session is successful.<br/>Please start the session 5 minutes before the scheduled time, to avoid any delay.<br/><br/>Please Note:<br/>There is no auto complete for video call. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.<br/><br/>Note: This is an internet based audio/ video call, so ensure you have a strong internet connection. Also, ensure that you sit in a well-lit area, with little to no background noise. Once the session is over, please encourage your client to extend the session by buying another session from the Thriive website.<br/>Love & Light,<br/>Team Thriive.";  
					sendEmail($temail, $tsubject, $tmsg); */
					//sendEmail('admin@thriive.in', $tsubject, $tmsg);
				}	
			} 
			if($action == 'call' && $status == 'success'  && $productinfo != 'Appointment' && $therapiststatus->availability_status == 1){
				
				$curl = curl_init();
				//+918048166487
				$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048160943","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($sessionarr[4])));
				
				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/makecall',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS =>json_encode($data),
				  CURLOPT_HTTPHEADER => array(
					'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
					'x-api-key:SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
					'Content-Type: application/json'
				  ),
				));

				$response = curl_exec($curl);
				
				$callresp = json_decode($response,true); 
				curl_close($curl);
				print_r($callresp);
		
				if(!empty($callresp)){
					if($callresp['success']['status'] == 'success'){
						$connected = 1; 
						$uid_accept = 1;
						$tid_accept = 1;
						$call_id = $callresp['success']['call_id'];
						$remaining_session =0;
						$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',remaining_session=0,waiting=1,email_sms=0,call_id = '".$call_id."',func_name='know".$response."' WHERE id='".$lastid."'");	
					}
				}
				
				if(strpos($firstname, "@") !== false){
					$uname = explode('@', $firstname)[0];
				} else{
					$uname = $firstname;
				}
				$tsubject = "New Session from ".$uname ." - ".$lastid;
				$usrdet = get_user_meta($tid,0);
				
				$tmsg = "Hi,<br/>".$uname." has booked an Instant Call session with you. Their payment for ".$sessionarr[4]." minutes session is successful.<br/>You will receive a call from +91 8048891009, please answer this call to start your session. For a successful session, ensure that you have a strong network connection on your device.<br/><br/> Note: We now have an auto disconnect feature, wherein the call will disconnect once the purchased session time is over. Please encourage your client to extend the session by purchasing another session from the Thriive website. ";
			
				sendEmail($tuserdata->user_email, $tsubject, $tmsg);
			//	sendEmail('prathamesh@thriive.in', $tsubject, $tmsg);
			
				//$tmsg = "Your client ".$uname ." has taken ".$sessionarr[2] ." and is waiting for a session with you. Please click on link given to accept the session with client within the next 2 minutes on thriive.in";
				$tempid = '1007698550154971004';
				$therapy_name = ucfirst(str_replace('-', ' ', $productinfo));
				$tmsg = $uname." has booked an Instant Call session for therapy ".$therapy_name." for ".$sessionarr[4]." minutes. Answer the call from +91 8048891009 to start your session.Love & Light - Thriive Wellness.";
				sendSMS($tidmobile,$tmsg,$tempid);
				//sendSMS('8850630321',$tmsg,$tempid);
				
				if($uidmobile == '9561437211'){
					sendSMS('9820080865',$tmsg,$tempid);
					sendEmail('vinay@thriive.in','9561437211 has taken call session', '9561437211 has taken call session');
					sendEmail('prathamesh@thriive.in','9561437211 has taken call session', '9561437211 has taken call session');
				}
			} elseif($action == 'call'  && $productinfo != 'Appointment') { 
				$wpdb->query("UPDATE online_consultation SET cron_update=2,waiting=0,remaining_session=1,func_name='call sessionlate payment' WHERE id='".$lastid."' AND payment_status = 'success'");	
				
			}
			if($action == 'chat' && $status == 'success' && $therapiststatus->availability_status == 1){
				$tempid = '1007167654222090993';
				$therapy_name = ucfirst(str_replace('-', ' ', $productinfo));
				$tmsg = $uname." has booked an Instant Chat Session for therapy ".$therapy_name." for ".$sessionarr[4]." minutes. Please start the session within the next 2 minutes.Love & Light - Thriive Wellness";
				sendSMS($tidmobile,$tmsg,$tempid);
				
				if($uidmobile == '9561437211'){
					sendSMS('9820080865',$tmsg,$tempid);
					sendEmail('vinay@thriive.in','9561437211 has taken chat session', '9561437211 has taken chat session');
					sendEmail('prathamesh@thriive.in','9561437211  has taken chat session', '9561437211 has taken chat session');
				}
				//sendSMS('8850630321',$tmsg,$tempid);
				$tsubject = "New Session from ".$uname." -".$lastid;
				$tmsg = "Hi,<br/><br/>".$uname." has booked an Instant Chat session with you. Their payment for ".$sessionarr[4]." minutes session is successful.<br/><br/>Please start the session within the next 2 minutes. For a successful session, ensure that you have a strong internet connection on your device.<br/><br/>Note: We now have an auto disconnect feature, wherein the chat will disconnect once the purchased session time is over. Please encourage your client to extend the session by purchasing another session from the Thriive website.<br/><br/>Love & Light,<br/>Team Thriive";
				sendEmail($temail, $tsubject, $tmsg);
				//sendEmail('prathamesh@thriive.in', $tsubject, $tmsg);
				//sendEmail('admin@thriive.in', $tsubject, $tmsg); 
				
			}  elseif($action == 'chat') {
				$wpdb->query("UPDATE online_consultation SET cron_update=2,uid_accept=-2,tid_accept=-2,remaining_session=1,func_name='chat late payment' WHERE id='".$lastid."' AND payment_status = 'success'");	
				
			}
			
		}	
	}	
}  
if(have_rows('therapist_data', 'option')):
	while(have_rows('therapist_data', 'option')): the_row();
		/*if('tarot-card-reading' == get_sub_field('taxonomy')->slug){
			$ids = get_sub_field('display_ids');  
		}
		 if('angel-reading' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		} 
		if('life-coach' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		}
		if('counseling-consulting' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		}
		if('sex-therapist' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		} */ 
		/* 
		if('numerology' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		}
		if('cosmic-astrology' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		}
		if('meditation' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		}
 */		if('silver-readers' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		}
		if('gold-readers' == get_sub_field('taxonomy')->slug){
		  $ids .= ",".get_sub_field('display_ids');  
		} 
		
	endwhile;
endif;
echo 'ids'.$ids;
$dateInTwoWeeks = date("Y-m-d",strtotime('-2 weeks'));
$therapist = array_unique(explode(",",$ids));

  foreach ($therapist as $user) {
	$tid =  $user ;
	
	$currentdate = date("Y-m-d H:i:s");
	$users = $wpdb->get_row("SELECT post_author FROM wp_posts WHERE ID = '".$tid."' ");
	$busycount = $wpdb->get_row("SELECT * FROM online_consultation WHERE tid = '". $users->post_author ."' AND busy_date >= '".$currentdate ."'  AND payment_status = 'success' LIMIT 1");
	$tcount = $wpdb->get_row("SELECT * FROM therapist_availability_status WHERE tid = '". $users->post_author ."' ");
	
	if($busycount == 0){
		if($tcount->availability_status != 4){
			if($tcount->prev_session_resp > 3){
				$available = 4;
				$auto_deactive = 1;
				$date = date("Y-m-d H:i:s");
				$data = array('tid' => $tcount->tid,'availability_status'=> $available,'auto_deactive'=> $auto_deactive,'created_date' => $date);
				$wpdb->insert("therapist_availability_details",$data);
				$tmsg = "Dear Therpaist, you have been marked unavailable on Thriive dashboard due to missed sessions. Please log in when you are available only..Love & Light - Thriive Wellness";
				$tempid = "1007108135979294514";
				$tidmobile = get_user_meta($tcount->tid,'mobile',true);
				$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
				sendSMS($tidmobile,$tmsg,$tempid);
			} else { 
				$available = 1;	
				$auto_deactive = $tcount->auto_deactive;
			}
		} else {
			$available = 4;	
			$auto_deactive = $tcount->auto_deactive;
			
		} 
	} else {
		if($tcount->availability_status != 4){	
			if($busycount->action == 'call'){
				$available = 2;
			} elseif($busycount->action == 'chat'){	
				$available = 3;
			}
			if($tcount->prev_session_resp > 3){
				$auto_deactive = 1;	
				$available = 4;
				$date = date("Y-m-d H:i:s");
				$data = array('tid' => $tcount->tid,'availability_status'=> $available,'auto_deactive'=> $auto_deactive,'created_date' => $date);
				$wpdb->insert("therapist_availability_details",$data);
				$tmsg = "Dear Therpaist, you have been marked unavailable on Thriive dashboard due to missed sessions. Please log in when you are available only..Love & Light - Thriive Wellness";
				$tempid = "1007108135979294514";
				$tidmobile = get_user_meta($busycount->tid,'mobile',true);
				$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
				sendSMS($tidmobile,$tmsg,$tempid);
			} 	 
		} else {
			$available = 4;	
			$auto_deactive = $tcount->auto_deactive;
		} 
		
	}	
	$date = date("Y-m-d H:i:s");	
	if(count($tcount) == 1){
		
	
		$wpdb->query("UPDATE therapist_availability_status SET availability_status = '".$available."',auto_deactive='".$auto_deactive."',modified_date ='".$date."' WHERE tid = '". $users->post_author ."'");
	} else {
		$wpdb->query("INSERT INTO therapist_availability_status (tid,availability_status,auto_deactive,modified_date) VALUES ('". $users->post_author ."','".$available."','".$auto_deactive."','".$date."')  ");
	}		
	
 } 
 
//include_once get_stylesheet_directory().'/new-footer.php'; 
?>