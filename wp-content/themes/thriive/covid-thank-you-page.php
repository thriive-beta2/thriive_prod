<?php /* Template Name: Covid Thank you page */ 
session_start();

$current_user = wp_get_current_user();
//print_r($current_user);
include_once get_stylesheet_directory().'/new-header.php';
$slug = $_GET['q'];
$action = $_GET['a'];
$therapy = $_GET['t'];
$mypost = get_page_by_path($_GET['q'], '', 'therapist'); 


$post = get_post($mypost->ID);

$tuserdata = get_userdata($post->post_author);
?>
<style>
	.imgcontainer{
	    text-align: center;
	}
	.avatar{
	    border-radius: 50%;
	}
	.footer_text{
	    margin-top: 25px;
	}
	.tlistpage{
		background: #fff;
	}
	@media only screen and (max-width: 600px) { 
		.octhank{padding-left:0px;padding-right:0px}
		.contg{font-weight:600;}
	}
	
	h5{color: #666666d9 !important;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
if(isset($_SESSION['covid_sessions'])){
	global $wpdb;
	$user_email = $current_user->user_email;
	$uname = $current_user->display_name ;
	$wait_time = date('Y-m-d H:i:s',strtotime('+20 minutes'));
	$usrdet = get_user_meta($mypost->post_author,0);
	//print_r($tuserdata);exit();
	$date = date("Y-m-d H:i:s");
	$tid =  $mypost->post_author;
	$uid =  $current_user->ID;
	$data = array(
		'uid' => $current_user->ID,
		'uname'	=> $uname,
		'uemail' => $user_email,
		'tid' => $mypost->post_author,
		
		'tname'	=> $usrdet['first_name'][0] ." ".$usrdet['last_name'][0],
		'temail' => $tuserdata->user_email,
		'action' => $action,
		'package' => '20 Mins Quick Conult',
		'therapy_name' => 'Free Covid Session',
		'waiting' => 1,
		'session_duration' => 20,
		'amount' => 0,
		'payment_status' => 'success',
		'payment_txnid' => '',
		'coupon_code' => '',
		'busy_date' => $wait_time,
		'created_date' => $date,
		'modified_date' => $date
	);
	$uname = $data['uname'];
		
	$data['no_of_sessions'] = 1;
	$data['pkgdescription'] = '20 Mins Quick Conult';
	$data['remaining_session'] = 1;
	
	$wpdb->insert("online_consultation",$data);
		
	$lastid = $wpdb->insert_id; 
	$data = array('oc_id'=>$lastid,'uid' => $current_user->ID,'tid' => $mypost->post_author,'therapy_name' => $therapy  ,'action' => $data['action'],'created_date' => $date);
	
	$wpdb->insert("online_session_details",$data); 
	
	$tmobile = get_user_meta($mypost->post_author,'mobile',true);
	$umobile = get_user_meta($current_user->uid,'mobile',true);

	if(strpos($uname, "@") !== false){
		$uname = explode('@', $uname)[0];
	} else{
		//$uname = $sessionrow->uname;
	}	
	if($action == 'call'){
		$tmsg = "Your client ".$uname ." has taken 20 Mins Quick Conult and is waiting for a session with you. Please click on link given to accept the session with client within the next 2 minutes on thriive.in";
		
	
	
		$password="password";
		$encrypted_ocid = openssl_encrypt($lastid,"AES-128-ECB",$password);
		$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
		$tempid = '1007507627626666229';
		sendSMS($tmobile,$tmsg,$tempid);

		$uidmobile = get_user_meta($uid,'mobile',true);
		$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
		$tidmobile = get_user_meta($tid,'mobile',true);
		$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
		$curl = curl_init();
		$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048166487","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> 20));
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
	
		if(!empty($callresp)){
			if($callresp['success']['status'] == 'success'){
				$connected = 1; 
				$uid_accept = 1;
				$tid_accept = 1;
				$call_id = $callresp['success']['call_id'];
				$remaining_session =0;
			}
		} 
		$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',remaining_session=0,waiting=1,email_sms=0,call_id = '".$call_id."' WHERE id='".$lastid."'");	
	
			
	
		$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
		$tsubject = "New Session from ".$uname ." - ".$lastid;
		sendEmail($uemail, $tsubject,$tmsg);
		$tmsg ="Hello ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0] .",<br/>Your client ".$uname ." has taken 20 Mins Quick Conult and is waiting for a session with you .";
		
	
					
		$tmsg .= "<br/><br/> Please Note:<br/>There is no auto disconnect for calls. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.";
		$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
		$therapy = "Free Covid Session";
		$alertmsg = $uname ." connected via ".$action." to ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0]." for 20 Mins Quick Conult and for therapy ".$therapy." on thriive";
		$tempid = "1007921355648742887";
		sendSMS('9930502459',$alertmsg,$tempid);
		sendSMS('8850630321',$alertmsg,$tempid);
		sendSMS('8369415594',$alertmsg,$tempid);
	}
	unset($_SESSION['covid_sessions']);?>
	<div class="container octhank">
		            <div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px;">
		                <h5 class="text-center">We hope you have a wonderful session.</h5>
		            </div>
		            <?php if($_GET['a'] == 'call'){ 
		            	if($_GET['t'] == 'all-page' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology' || $_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'vastu-shastra'){?>
				            <div class="imgcontainer mt2">
				                <img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
				            </div>
				          
				        <?php } ?>
			         
			            <div class="text-center ">
			                 <h5 class="text-center" style="margin:5px 5px;padding:5px 5px;">Please wait for  <?php echo $post->post_title; ?> to Accept the Session. </h5>
			            </div>
		        	<?php } ?>
		            <div style="clear:both"></div>
			        <div class="" style="border-top: 1px dashed;"></div>
			        <div class="text-center mt-2" style=" padding: 5px;">
		              
						
						<h5 class="text-center" >Incase of any issue you can reach us on <br><a href="">support@thriive.in</a></h5>
		            </div>
					<div class="" style="border-top: 1px dashed;"></div>
		            <div class="text-center footer_text">
		                 
		            </div><br>
		        </div>
<?php 				
} else {
	wp_redirect('login'); exit;
?>

	<h5 class="text-center">Sorry  your session has expired. </h5>
<?php	
}			
include_once get_stylesheet_directory().'/new-footer.php'; ?>
