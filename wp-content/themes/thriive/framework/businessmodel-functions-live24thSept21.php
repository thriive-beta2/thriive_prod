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
	sendEmail("admin@thriive.in","Feedback Received", $tmsg); 
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
				$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048166487","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($onlinerow->session_duration)));
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
					'x-api-key: lF4vZUSwA8Jab0ABWsITtxwM1ZwL6h2jZDdCTX30',
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
				echo $tid_accept = 3;exit(); 
			} else {
				echo $tid_accept = 1;exit();
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