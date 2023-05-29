<?php
require '/var/www/html/wp-config.php';
global $wpdb;
//if(wp_get_current_user()->roles[0] == 'administrator'){
if($_POST['API_key'] == 'ugfvsuhgghvhyugkysvghuvbkerlgunkhsvoawn'){
	
//print_r($_POST);

$agent = '+91'.$_POST['agent'];
$customer = '+91'.$_POST['customer'];
$time = $_POST['timer'];
$payment_id = $_POST['payment_id'];
$POST_fields = '{
  "k_number": "+917411782154",
  "agent_number": "'.$agent.'",
  "customer_number": "'.$customer.'",
  "caller_id": "+918048160943",
  "additional_params":{"object_id": "1","user_id": "2", "call_log_id" : 1,"timeout":"'.$time.'"}
}';

$userdata = $wpdb->get_row("SELECT user_id FROM wp_usermeta WHERE meta_key = 'mobile' AND meta_value = '".$_POST['customer']."'");
$uid = $userdata->user_id; 

$therapistdata = $wpdb->get_row("SELECT user_id FROM wp_usermeta WHERE meta_key = 'mobile' AND meta_value = '".$_POST['agent']."'");
$tid = $therapistdata->user_id; 


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/makecall',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$POST_fields,
  CURLOPT_HTTPHEADER => array(
    'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
    'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;


}
 


if(strpos($response, 'success')>0){
	$callresp = json_decode($response,true); 
	$connected = 1;  
	$uid_accept = 1;
	$tid_accept = 1;
	$date = date("Y-m-d");
	$call_id = $callresp['success']['call_id'];
	$remaining_session =0;			
	$busy_date = date('Y-m-d H:i:s', strtotime("+". $time . " mins"));
	$wpdb->query("UPDATE online_consultation SET busy_date='".$busy_date."',remaining_session=0 WHERE payuid = '".$payment_id."' LIMIT 1");
	$sessionrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE payuid = '".$payment_id."' ORDER BY id DESC LIMIT 1");
	$wait_time = date('Y-m-d H:i:s',strtotime('+'. $sessionrow->session_duration .'minutes'));
	$usrdet = get_user_meta($tid,0);
	$date = date("Y-m-d H:i:s");
	
	$tuserdata = get_userdata($tid);
	
	$post_id = get_user_meta($tid, 'post_id', true);
	$post = get_post($post_id);
	$data = array(
		'uid' => $sessionrow->uid,
		'uname'	=> $sessionrow->uname,
		'uemail' => $sessionrow->uemail,
		'tid' => $tid,
		'def_warn'  => 1,
		'call_id'  => $call_id,
		'tname'	=> $post->post_title,
		'temail' => $tuserdata->user_email,
		'action' =>  "call",
		'package' => $sessionrow->package,
		'therapy_name' => $sessionrow->therapy_name,
		'category_name' => $sessionrow->category_name,
		'waiting' => 1,
		'connected' => 1,
		'no_of_sessions' => 1,
		'remaining_session' => 0,
		'pkgdescription' => $sessionrow->pkgdescription,
		'session_duration' => $time,
		'remaining_duration' => 0,
		'amount' => $sessionrow->amount,
		'tid_accept' => $tid_accept,
		'uid_accept' => $uid_accept,
		'payment_status' => $sessionrow->payment_status,
		'payment_txnid' => $sessionrow->payment_txnid,
		'coupon_code' => $sessionrow->coupon_code,
		'busy_date' => $busy_date,
		'created_date' => $date,
		'modified_date' => $date
	);
	
	$wpdb->insert("online_consultation",$data);
	echo json_encode(array('status' => 'success', 'call_id' => json_decode($response)->success->call_id));
	//echo '<h1 style="color:green">Call Successfully Placed</h1>';
  //header("location: https://www.thriive.in/knowlarity-data?stat=success");
}else{
	echo json_encode(array('status'=>'fail'));
  echo '<h1 style="color:red">Failed To place the call</h1>';
  echo $response;
  //header("location: https://www.thriive.in/knowlarity-data?stat=fail");
}

?>