<?php 
function savewaittime(){
	global $wpdb;
	$busy_date = $_POST['busy_date'];
	$oc_id = $_POST['oc_id'];
	$_SESSION['expired'] = 0;

	$row = $wpdb->get_row("SELECT * FROM online_consultation  WHERE id = '".$oc_id."'");
	echo $_SESSION['wait_time'] = date('Y-m-d H:i:s', strtotime('+'.$row->session_duration.' minutes'));
	$wpdb->query("UPDATE online_consultation SET  busy_date = '". $_SESSION['wait_time'] ."',tid_accept=0 WHERE id = '".$oc_id."'");
	$tsubject = "New Session from ".$row->uname ." - ".$row->id;
//	$link = site_url()."/accept-reject?ocid=".$row->id;
	$cgenerated_url = generateBitlyURL($link)['data']['url'];
	$tmsg = "Your client ".$row->uname ." has taken ".$row->package ." and is waiting for a session with you. Please click on link given to accept the session with client within the next 2 minutes on thriive.in";
	sendEmail($row->temail, $tsubject, $tmsg);
	$tmsg = "Your client ".$row->uname ." has taken ".$row->package ." and is waiting for a session with you. Please click on link ".$cgenerated_url." to accept the session with client within the next 2 minutes on thriive.in";
	$tempid = '1007507627626666229';
	$tmobile = get_user_meta($row->tid, 'mobile', true);
	
	sendSMS($tmobile,$tmsg,$tempid);
	
	exit();
}
function whatsapp_payment_reminder(){
	global $wpdb; 
	$therapy_name = $_POST['therapy_name']; 
	$therapist = $_POST['therapist']; 
	$mypost = get_page_by_path($therapist, '', 'therapist');
	$category_name = $_POST['category_name'];  
	$session_type = $_POST['session_type']; 
	$uid = $_POST['uid']; 
	/* $url = "https://media.smsgupshup.com/GatewayAPI/rest?userid=2000209699&password=!7Tb5Q@t&send_to=8850630321&v=1.1&format=json&msg_type=TEXT&method=SENDMESSAGE&msg=Hello+Thriiver%21%0AYou+are+almost+done.+All+you+have+to+do+is+complete+the+payment+and+you+can+get+started+with+booking+a+session.+%0AClick+here+to+complete+your+payment+thriive.in";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$response = curl_exec($ch);
	curl_close($ch);  */
	$wpdb->query("INSERT INTO send_whatsapp_reminder (uid,tid,therapy_name,category_name,session_type,created_date) VALUES ('".$uid."','".$mypost->ID."','".$therapy_name."','".$category_name."','".$session_type."','".date('Y-m-d H:i:s')."')");
	echo "1";exit();
}	
function checkknowresponse(){
	global $wpdb; 
	$data = array();
	$call_uuid = $_POST['call_uuid'];
	$know_remaining_duration = $_POST['know_remaining_duration'];
	$original_duration = $_POST['original_duration'];
	$event_type = $_POST['event_type'];
	//$call_duration = $_POST['call_duration'];
	$business_call_type = $_POST['business_call_type'];
	$knowrec = $wpdb->get_row("SELECT * FROM online_consultation WHERE call_id LIKE '%".$call_uuid ."%'");
	//$duration_left = round($know_remaining_duration - ($call_duration/60),0);
	$duration_left = round($_POST['duration_left'],0);
	$response =  explode("#",$business_call_type);
	//echo json_encode($knowrec,true);
	//if($call_uuid == $response_uuid){
		$event_check = 0;
		if($event_type == 'AGENT_ANSWER' || $event_type == 'AGENT_CALL'){
			$data['message'] = '<p>Calling Therapist,Please Wait.</p>';
			$event_check = 1;	
			/* $wpdb->query("UPDATE online_consultation SET func_name='AGENT_CALL' WHERE call_id LIKE '%".$call_uuid ."%'"); */
		}	
		if($event_type == 'CUSTOMER_CALL'){
			$data['message'] = '<p>Therapist has answered. You will receive a call now.</p>';
			$event_check = 1;
		}
		if($event_type == 'CUSTOMER_ANSWER'){
			$data['message'] = '<p>Therapist has picked up the call.</p>';
			$event_check = 1;
		}
		if($event_type == 'BRIDGE'){
			$data['message'] = '<p>Your call is in progress.<br/> Balance Time is '.$know_remaining_duration.' mins.</p>';
			/* $wpdb->query("UPDATE online_consultation SET func_name='BRIDGE' WHERE call_id LIKE '%".$call_uuid ."%'"); */
			$event_check = 1;
		}
		if($event_type == 'HANGUP'){
			$event_check = 1;
		}
		$umobile = get_user_meta($knowrec->uid, 'mobile', true);
		$tempid = "1007290231972305761";
		if($response[0] == 'Agent Missed'){
			
			$data['message'] = '<p>Therapist Not Responding. Please select an option below.</p>';
			if($original_duration == $know_remaining_duration){
				
				$data['option'] = 2;	
			} else {
				$data['option'] = 3;
			}	
		} elseif($response[0]== 'Customer Missed'){
			$data['message'] = '<p>Sorry.Network Error.Please select an option below.</p>';
			$wpdb->query("UPDATE therapist_availability_status SET availability_status = 1,modified_date = '".date("Y-m-d H:i:s")."' WHERE tid = '". $knowrec->tid ."'");
			
			if($original_duration == $know_remaining_duration){
				$data['option'] = 2;	
			} else {
				$data['option'] = 3;
			}
		} elseif($duration_left > 0 && $event_check == 0) {
			if($duration_left == $original_duration){
				$data['message'] = '<p>Please select an option below.</p>';
				$data['option'] = 2;
			} else {
				$data['message'] = '<p>Call Disconnected. To Call back use button below.<br/> Balance Time is '.$duration_left.' mins.</p>';
				sleep(4);
				$data['option'] = 3;
			}	
		} elseif($duration_left <= 0  && $event_check == 0)  { 
			$data['message'] = '<p>Time Up. Please select an option below.</p>';
			$data['option'] = 4;
			
		} 		
		//}	
	/* } elseif($knowrec && $duration_left > 0)  {
		$data['message'] = '<p>Incase of Call drop,you can call back</p>';
		$data['option'] = 3;
	} else { 
		$data['message'] = '<p>Hope you had a wonderful previous session.</p>';
		$data['option'] = 4;
		
	}	 */
	echo json_encode($data,true);
	exit(); 
}	
function submit_feedback(){ 
	global $wpdb; 
	$call_opinion = $_POST['call_opinion'];
	$session_type = $_POST['session_type'];
	$ocid = $_POST['ocid']; 
	$callid = $_POST['callid'];
	$others = $_POST['others'];
	$qy = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid LIKE '%".$callid."%'");
	$call_duration = $qy->call_duration;
	$call_timer = $qy->call_timer;
	$onlinerow = $wpdb->get_row("SELECT * FROM online_consultation WHERE id = '".$ocid."'");
	$existrow = $wpdb->get_row("SELECT * FROM call_feedback WHERE ocid = '".$ocid."'");
	if($existrow == 0){
		$query = "INSERT INTO call_feedback (session_type,call_opinion,call_drop,others,ocid,created_date) VALUES ('".$session_type."','".$call_opinion."','". $qy->drop_id ."','".$others."','".$ocid."',NOW())"; 
		$wpdb->query($query);
		if($session_type == 1){
			if(!empty($qy)){
				$cduration = explode(":",$call_duration);
			}
			if($cduration[1] != '00'){
				$callpercentage = ($cduration[1]/$call_timer) * 100 . ' %';
			} else {
				$callpercentage = 0;
			}	
			if(($qy->drop_id != 900 || $callpercentage < 75)){
				$remaining_duration = $call_timer - $cduration[1];
				$wpdb->query("UPDATE online_consultation SET cron_update = '".$qy->drop_id ."'  WHERE id='".$ocid."'");
				echo "1";
				$tmsg = $callpercentage.' '.$remaining_duration.' '.$onlinerow->payment_txnid;
				//sendEmail("prathamesh@thriive.in","Feedback Received", $tmsg);
			}  else {
				$wpdb->query("UPDATE online_consultation SET waiting=0 WHERE id='".$ocid."'");
				echo "2";
			}
			
		} else {
			echo "2";

		}	
	} else {
		echo "2";
	}	
	$tmsg = "Feedback received for payment id ".$onlinerow->payment_txnid;

	sendEmail("support@thriive.in","Feedback Received", $tmsg); 
	//sendEmail("admin@thriive.in","Feedback Received", $tmsg); 
	$tempid = '1007943756109807663';
	$msg = "We have received your feedback and will revert shortly. Thank you for your patience. Love & Light - Thriive Wellness";
	$umobile = get_user_meta($onlinerow->uid, 'mobile', true);
	sendSMS($umobile,$msg,$tempid); 
	//sendSMS('8850630321',$msg,$tempid); 
	
	exit(); 
}	
function response(){
	global $wpdb;
	$ocid = $_POST['oc_id'];
	$res = $_POST['res'];
	$onlinerow = $wpdb->get_row("SELECT * FROM online_consultation WHERE id='".$ocid."' AND remaining_session > 0");
	if($onlinerow){
		$expiry_time = date('Y-m-d H:i:s', strtotime("+".$onlinerow->session_duration ." mins",strtotime($onlinerow->busy_date)));
		if(strtotime(date('Y-m-d H:i:s')) < strtotime($expiry_time)){
			$session_duration = ($onlinerow->session_duration) ;
			/* $busy_date = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
			$wpdb->query("UPDATE online_consultation SET remaining_session=0,busy_date = '".$busy_date."' WHERE id='".$_GET['ocid']."'"); */
			$callresp = array();
			if($res == 1){
				$uidmobile = get_user_meta($onlinerow->uid,'mobile',true);
				$tidmobile = get_user_meta($onlinerow->tid,'mobile',true);
				$curl = curl_init();
				$data1['additional_params'] = array("object_id"=> "1","user_id"=>"2", "call_log_id"=> 1,"timeout"=> $session_duration);
				$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048160943","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($onlinerow->session_duration)));
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
					'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
					'Content-Type: application/json'
				  ),
				));

				$response = curl_exec($curl);

				curl_close($curl);
				$callresp = json_decode($response,true);
				//print_r($callresp);
			} /* elseif($_GET['accept'] == 2){
				$wpdb->query("UPDATE online_consultation SET uid_accept=0,busy_date = '".date('Y-m-d H:i:s')."' WHERE id='".$_GET['ocid']."'");
			} */
			$connected = 0;$uid_accept = 0;
			if(!empty($callresp)){
				if($callresp['success']['status'] == 'success'){
					$connected = 1; 
					$uid_accept = 1;
					$tid_accept = 1;
					$call_id = $callresp['success']['call_id'].'_0';
					$remaining_session =0;
					$busy_date = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
				}
			} else {
				$uid_accept = 0;
				$tid_accept = $res;
				$remaining_session =$onlinerow->remaining_session;
				$busy_date = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
			}
			$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',call_id = '".$call_id."',busy_date = '".$busy_date."' WHERE id='".$ocid."'");
		} else {
			echo "Link Expired";exit();
		}	
		
	}  else {
		echo "Session Over";exit();
	}	
		
}

function TherapistCallInfo(){
	
  global $wpdb;
  $ocid = $_POST['oc_id'];
  $query = "SELECT tid,tname,session_duration,uid,temail,uname,action FROM online_consultation WHERE id = '".$ocid."'";
  $res = $wpdb->get_row($query);
  $tid = $res->tid;
  $therapist_image = get_therapist_image($tid);
  $therapist_name = $res->tname;
  $user_name = $res->uname;
  $session_duration = $res->session_duration;
  
  $therapist_data_string = $session_duration.' Mins '.ucfirst($res->action) .' Session with<br> '.$therapist_name;
  $user_data_string = 'You have a '.$session_duration.' min Chat Request From '.$user_name;
  $data_array = array(
    'img' => $therapist_image,
    'data' => $therapist_data_string,
    'site_url' => get_site_url(),
    'tid' => $res->tid,
    'uid' => $res->uid,
    'temail' => $res->temail,
    'user_data' => $user_data_string

  );

  echo json_encode($data_array); 
  exit();
}
function get_therapist_image($tid){
    global $wpdb;

      $query = "SELECT ID FROM wp_posts WHERE post_author=$tid AND post_type='therapist' AND post_status='publish'";
      $res = $wpdb->get_results($query);
      $post = $res[0]->ID;
      return get_the_post_thumbnail_url($post,'post_thumbnail');
}

function lastocid(){
	global $wpdb;
	$oc_id = $_POST['oc_id'];
	$rejectedrow1 = $wpdb->get_row("SELECT * FROM online_consultation WHERE id = '".$oc_id."' ");
	$rejectedrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE payment_txnid = '".$rejectedrow1->payment_txnid ."' ORDER BY id DESC LIMIT 1");
	$oc_id = $rejectedrow->id;
	$knowlarityrow = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid LIKE '%".$rejectedrow->call_id ."%' ");
	$therapiststatus = getTherapistConsultStatus($rejectedrow->tid);
	//echo $rejectedrow->call_id;
	//if($therapiststatus->availability_status == 1){
		if($knowlarityrow){
			$call_duration = $knowlarityrow->call_duration; 
			$call_timer = $rejectedrow->session_duration;
			$remaining_duration = $rejectedrow->remaining_duration;
			if($call_timer > 0){
			
				$cduration = explode(":",$call_duration);
				//if(intval($cduration[1]) != 00){
					$callpercentage = (intval($remaining_duration)/$call_timer) * 100 . ' %';
				/* } else {
					$callpercentage = 0;
				} */	
				$uidmobile = get_user_meta($rejectedrow->uid,'mobile',true);
				$tidmobile = get_user_meta($rejectedrow->tid,'mobile',true);
				
				$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
				$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
				//if($callpercentage > 0){ 	
					if($rejectedrow->def_warn != 4){
						$tempid = '1007824189679473273';
						$link = get_site_url().'/new-call-page'; 
						$cgenerated_url = generateBitlyURL($link)['data']['url'];
						$msg = "Hi from Thriive. Incase your call got disconnected, please call back therapist here.".$cgenerated_url." ( Valid for 1 hour only)";
						sendSMS($uidmobile,$msg,$tempid);
						//sendSMS('8850630321',$msg,$tempid);
					}
				//	$remaining_duration = $call_timer - $remaining_duration;
					$callresp = array();

					
					$curl = curl_init();
					$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048160943","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($remaining_duration)));
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
						'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
						'Content-Type: application/json'
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$callresp = json_decode($response,true); 
					if(!empty($callresp)){
						if($callresp['success']['status'] == 'success'){
							$connected = 1; 
							$uid_accept = 1;
							$tid_accept = 1;
							$call_id = $callresp['success']['call_id'];
							$remaining_session =0;
							$call_time = $remaining_duration + 5;
							$busy_date = date('Y-m-d H:i:s', strtotime("+". $call_time . " mins"));
							$wpdb->query("INSERT INTO online_consultation (uid,uname,uemail,tid,tname,temail,action,package,therapy_name,category_name,waiting,session_duration,remaining_duration,amount,payment_status,payment_txnid,no_of_sessions,pkgdescription,remaining_session,tid_accept,uid_accept,coupon_code,clevertap,busy_date,payment_date,created_date,modified_date) SELECT uid,uname,uemail,tid,tname,temail,action,package,therapy_name,category_name,waiting,session_duration,remaining_duration,amount,payment_status,payment_txnid,no_of_sessions,pkgdescription,remaining_session,tid_accept,uid_accept,coupon_code,clevertap,busy_date,payment_date,created_date,modified_date FROM `online_consultation` WHERE  id='".$oc_id ."'");
							$newoc_id = $wpdb->insert_id;
							$date = date("Y-m-d H:i:s");
							/* if($call_id == ''){
								$call_id = $rejectedrow->call_id;
							} */
							$wpdb->query("UPDATE `online_consultation` SET cron_update=0,connected=1,tid_accept=1,session_duration = '".$remaining_duration."',remaining_duration = '".$remaining_duration."',uid_accept=1,def_warn=4,func_name='res".$response."',call_id='".$call_id."',busy_date='".$busy_date."',created_date = '".$date."' WHERE  id='".$newoc_id."'");
							$wpdb->query("UPDATE `online_consultation` SET remaining_session = 0 WHERE  id='".$oc_id."'");
							//sendEmail("prathamesh@thriive.in","Call Back", $call_duration.' '.$rejectedrow->payment_txnid .' '.$callpercentage);
						 	
							echo $oc_id = $newoc_id;exit(); 
						}
					}
					
					
				/* } else {
					echo 4;exit(); 
				}	 */
			} else {
				echo 4;exit(); 
			}	
		} 	
	/* } else {
		echo 2;exit(); 
	} */
}
function liveresponse(){
	global $wpdb;
	$oc_id = $_POST['oc_id'];
	$remaining_duration = $_POST['remaining_duration'];
	$rejectedrow1 = $wpdb->get_row("SELECT * FROM online_consultation WHERE id = '".$oc_id."' ");
	$rejectedrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE payment_txnid = '".$rejectedrow1->payment_txnid ."' ORDER BY id DESC LIMIT 1");
	$therapiststatus = getTherapistConsultStatus($rejectedrow->tid);
	$call_timer = $rejectedrow->session_duration;
	if($call_timer > 0){
	
		$uidmobile = get_user_meta($rejectedrow->uid,'mobile',true);
		$tidmobile = get_user_meta($rejectedrow->tid,'mobile',true);
		
		$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
		$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
		if($rejectedrow->def_warn != 4){
				$tempid = '1007824189679473273';
				$link = get_site_url().'/call-page'; 
				$cgenerated_url = generateBitlyURL($link)['data']['url'];
				$msg = "Hi from Thriive. Incase your call got disconnected, please call back therapist here.".$cgenerated_url." ( Valid for 1 hour only)";
				sendSMS($umobile,$msg,$tempid);
			}
			$callresp = array();

			
			$curl = curl_init();
			$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048891009","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($remaining_duration)));
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
				'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
				'Content-Type: application/json'
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$callresp = json_decode($response,true); 
			if(!empty($callresp)){
				if($callresp['success']['status'] == 'success'){
					$connected = 1; 
					$uid_accept = 1;
					$tid_accept = 1;
					$call_id = $callresp['success']['call_id'];
					$remaining_session =0;
					$busy_date = date('Y-m-d H:i:s', strtotime("+". $remaining_duration . " mins"));
					$wpdb->query("INSERT INTO online_consultation (uid,uname,uemail,tid,tname,temail,action,package,therapy_name,category_name,waiting,session_duration,remaining_duration,amount,payment_status,payment_txnid,no_of_sessions,pkgdescription,remaining_session,tid_accept,uid_accept,coupon_code,busy_date,payment_date,created_date,modified_date) SELECT uid,uname,uemail,tid,tname,temail,action,package,therapy_name,category_name,waiting,session_duration,remaining_duration,amount,payment_status,payment_txnid,no_of_sessions,pkgdescription,remaining_session,tid_accept,uid_accept,coupon_code,busy_date,payment_date,created_date,modified_date FROM `online_consultation` WHERE  id='".$oc_id ."'");
					$newoc_id = $wpdb->insert_id;
					$date = date("Y-m-d H:i:s");
					$wpdb->query("UPDATE `online_consultation` SET cron_update=0,connected=1,tid_accept=1,uid_accept=1,def_warn=4,func_name='res".$response."',call_id='".$call_id."',busy_date='".$busy_date."',remaining_duration='". $rejectedrow->remaining_duration ."',session_duration='". $rejectedrow->remaining_duration ."',created_date = '".$date."' WHERE  id='".$newoc_id."'");
					$wpdb->query("UPDATE `online_consultation` SET remaining_session = 0 WHERE  id='".$oc_id."'");
					echo $oc_id = $newoc_id;exit(); 
				}
			}
	} else {
		echo 4;exit(); 
	}	
	exit();
	
}
function chkrejection(){ 
	global $wpdb;
	$oc_id = $_POST['oc_id'];
	$_SESSION['expired'] = 0;
	
	//$wpdb->query("UPDATE online_consultation SET waiting=1 WHERE id = '".$oc_id."' ");
	$rejectedrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE id = '".$oc_id."' ");
	if($rejectedrow->call_id == ''){
		echo $tid_accept = 2;exit();  
	} else {
		if($rejectedrow->connected == 1){
			if (strpos($rejectedrow->call_id, '_') == true) {
				$knowlarityrow = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid LIKE '%".$rejectedrow->call_id ."%' ");
	
				if($knowlarityrow){
					$call_duration = $knowlarityrow->call_duration;
					$call_timer = $rejectedrow->session_duration;
					$remaining_duration = $rejectedrow->remaining_duration;
					$remaining_session = $rejectedrow->remaining_session;
					$cduration = explode(":",$call_duration);
					$callpercentage = (intval($remaining_duration)/$call_timer) * 100 . ' %';
					/* if($callpercentage > 0){
						$remaining_duration = $call_timer - intval($cduration[1]);
						
						echo $tid_accept = 3;exit(); 
					} else {
						echo $tid_accept = 4;exit();
					} */
					if($remaining_session > 0){		
						echo $tid_accept = 3;exit();
					} else {
						echo $tid_accept = 4;exit();
					}		
				} else {
					echo $tid_accept = 1;exit();
				}
			}  else {
				if($rejectedrow->tid_accept == 2){
					echo $tid_accept = 2;exit();	
				} else {
					echo $tid_accept = 1;exit();	
				}
			}  	
		} else {
			echo $tid_accept = 2;exit(); 
		}	
	}
	exit();
	if($tid_accept == 2){
		/* $msg = "Hi from Thriive. Sorry the selected Therapist is not Reachable right now. Please select another Therapist or take your session whenever convenient";
		$umobile = get_user_meta($rejectedrow->uid, 'mobile', true);
		$tempid = '1007684902010570563'; */
		//sendSMS($umobile,$msg,$tempid); 
	}
	
}
function resetwaiting(){
	global $wpdb;
	$oc_id = $_POST['oc_id'];
	$action = $_POST['actionc'];
	$_SESSION['expired'] = 1;
	$query = "UPDATE online_consultation SET waiting=0"; 
	if($action == 'chat'){
		$query .= ",tid_accept=0 ";
	}
	$query .= " WHERE id = '".$oc_id."' ";
	$wpdb->query($query);
	
	exit();
}
function browse(){
	global $wpdb;
	$oc_id = $_POST['oc_id'];
	$tid = $_POST['tid'];
	$uid = $_POST['uid'];
	$action = $_POST['mode'];
	$query = "UPDATE online_consultation SET tid_accept=2,waiting=0  WHERE id = '".$oc_id."' "; 
	$wpdb->query($query);
	if($action == 'chat'){
		$query = "UPDATE chat_block_users SET complete_status = 1 WHERE to_user_id = '".$uid."' AND from_user_id = '".$tid."' "; 
		$wpdb->query($query);
		$query = "UPDATE chat_block_users SET complete_status = 1 WHERE to_user_id = '".$tid."' AND from_user_id = '".$uid."' "; 
		$wpdb->query($query);
	}
	
	echo "1";
	exit();
}
function savepaymentoption(){
	$_SESSION['paymentoption'] = $_POST;
}
	
?>