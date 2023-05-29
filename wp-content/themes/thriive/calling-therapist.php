<?php /* Template Name: Therapist Calling */ 
$current_user = wp_get_current_user();
if (!is_user_logged_in()){ 
		wp_redirect('/login/');
		exit();
}
include_once get_stylesheet_directory().'/new-header.php';
 
if(isset($_POST['calling'])){
	
	$uid = $_POST['uid']; 
	$lastid = $_POST['lastid'];
	$uname = $_POST['uname']; 
	$productinfo = $_POST['productinfo']; 
	$session_duration = $_POST['session_duration'];
	$uidmobile = get_user_meta($uid,'mobile',true);
	$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
	$tid = $_POST['tid'];
	$therapiststatus = getTherapistConsultStatus($tid);
	$tidmobile = get_user_meta($tid,'mobile',true);
	$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
	//$sessionarr = explode(",",$_POST['udf2']);
	
	if($therapiststatus->availability_status == 1){
		$curl = curl_init();
		$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048160943","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> $session_duration));
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
		$busy_date = date('Y-m-d H:i:s');
		if(!empty($callresp)){
			if($callresp['success']['status'] == 'success'){
				$connected = 1; 
				$uid_accept = 1;
				$tid_accept = 1;
				$call_id = $callresp['success']['call_id'];
				$remaining_session =0;
				$session_duration = $session_duration + 5;
				$busy_date = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
			} 
		} 
		$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',waiting=1,email_sms=1,call_id = '".$call_id."',busy_date = '".$busy_date."',func_name='new".$response."' WHERE id='".$lastid."'"); 
	}/*  else {
		$wpdb->query("UPDATE online_consultation SET cron_update=2,waiting=0,remaining_session=1,func_name='call thankyou' WHERE id='".$lastid."' AND payment_status = 'success'");	
		
	} */
	
}	
?>
<a class="navbar-brand" href="<?php echo get_site_url() ?>"><img src="<?php echo get_template_directory_uri() .'/horoscope_new/Thriive-logo/Logo-02.png';?>" style="width:120px;height:45px;margin:227px 0px 0px 129px;"/></a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
setTimeout('window.location.href="<?php echo site_url();?>/new-call-page"',5000);

					
</script>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>