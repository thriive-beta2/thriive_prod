<?php /* Template Name: New Oc Session Thank you page */ 
session_start();
global $wpdb;
$current_user = wp_get_current_user();

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
/* if($oc_id != ''){
	$sessionrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE   id = '".$oc_id ."'");
} else { */ 
	
	$sessionrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE  uid = '".$current_user->ID ."'   AND remaining_session > 0  AND category_name = '".$_GET['c']."' LIMIT 1"); 
	/* echo "SELECT * FROM online_consultation WHERE  uid = '".$current_user->ID ."'   AND remaining_session > 0  AND category_name = '".$_GET['c']."' LIMIT 1"; */
//} 

//sendEmail($sessionrow->uemail, 'tsubject', 'tmsg');exit();
//if(isset($_SESSION['no_of_sessions'])){ 
if($sessionrow >0){
		if($sessionrow->session_duration != 0){
			$session_duration = $sessionrow->session_duration;
		} else {
			$session_duration = 10;
			$sessionrow->session_duration = 10;
		}	
		$wait_time = date('Y-m-d H:i:s',strtotime('+'. $sessionrow->session_duration .'minutes'));
		$_SESSION["wait_time"] =  $wait_time; 
		$usrdet = get_user_meta($mypost->post_author,0);
		$date = date("Y-m-d H:i:s");
		$tid =  $mypost->post_author;
		$therapiststatus = getTherapistConsultStatus($tid);
		//print_r($therapiststatus); 
		$uid =  $current_user->ID;
		$payment_txnid = $sessionrow->payment_txnid;
		$data = array(
			'uid' => $current_user->ID,
			'uname'	=> $sessionrow->uname,
			'uemail' => $sessionrow->uemail,
			'tid' => $mypost->post_author,
			
			//'tname'	=> $usrdet['first_name'][0] ." ".$usrdet['last_name'][0],
			'tname'	=> $mypost->post_title,
			'temail' => $tuserdata->user_email,
			'action' => $action,
			'package' => $sessionrow->package,
			'therapy_name' => $therapy,
			'waiting' => 1,
			'cron_update' => 0,
			'session_duration' => $session_duration,
			'category_name' => $sessionrow->category_name,
			'amount' => $sessionrow->amount,
			'payment_status' => $sessionrow->payment_status,
			'payment_txnid' => $payment_txnid,
			'payuid' => $sessionrow->payuid,
			'coupon_code' => $sessionrow->coupon_code,
			'busy_date' => date('Y-m-d H:i:s'),
			'created_date' => $date,
			'modified_date' => $date
		);
		$tname = $data['tname'];
		$therapy_name = $data['therapy_name'];
		$session_duration = $data['session_duration'];

//print_r($data);

		$uname = $data['uname'];
		$sessionarr = explode(",",$freemins);
		if($action == 'book_latercall'){
			$data['action'] =  "call";
		}else if($action == 'book_laterchat' || $action == 'chat'){
			$data['action'] =  "chat";	
		}	
		$data['no_of_sessions'] = 1;
		$data['pkgdescription'] = $sessionrow->pkgdescription;
		if($action == 'chat'){ 
			$data['remaining_session'] = 0;
		} else {
			$data['remaining_session'] = 1;
		} 
		 
	//	$wpdb->insert("online_consultation",$data);
		$wpdb->query("INSERT INTO online_consultation (uid,uname,uemail,tid,tname,temail,action,package,therapy_name,category_name,waiting,session_duration,remaining_duration,amount,payment_status,payment_txnid,clevertap,no_of_sessions,pkgdescription,remaining_session,coupon_code,busy_date,payment_date,created_date,modified_date) VALUES('".$data['uid']."','".$data['uname']."','".$data['uemail']."','".$data['tid']."','".$data['tname']."','".$data['temail']."','".$data['action']."','".$data['package']."','".$data['therapy_name']."','".$data['category_name']."','".$data['waiting']."','".$session_duration."','". $sessionrow->remaining_duration ."','".$data['amount']."','".$data['payment_status']."','".$data['payment_txnid']."','".$sessionrow->clevertap ."','".$data['no_of_sessions']."','".$data['pkgdescription']."','".$data['remaining_session']."','".$data['coupon_code']."','".$data['busy_date']."','".$sessionrow->payment_date."','".$data['created_date']."','".$data['modified_date']."')");
		$lastid = $wpdb->insert_id; 
		$data = array('oc_id'=>$lastid,'uid' => $current_user->ID,'tid' => $mypost->post_author,'therapy_name' => $therapy  ,'action' => $data['action'],'created_date' => $date);
		
		
		$row = $wpdb->get_row("SELECT feedback FROM QA_feedback WHERE payuid = '".$sessionrow->payuid ."' ");
		$faqdata = json_decode($row->feedback);
		$tmobile = get_user_meta($mypost->post_author,'mobile',true);
		$umobile = get_user_meta($sessionrow->uid,'mobile',true);
		$name = urlencode($faqdata->name);
		$dob = urlencode($faqdata->dob);
		$tidmobile = get_user_meta($tid,'mobile',true);
		$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
			
		$issue_catg2 = urlencode($faqdata->issue_catg2);
		$issue_catg3 = urlencode($faqdata->issue_catg3);
		$issue_catg4 = urlencode($faqdata->issue_catg4);
		$issue_catg5 = urlencode($faqdata->issue_catg5);
		$issuestr = $issue_catg2.','.$issue_catg3.','.$issue_catg4.','.$issue_catg5;
		if($sessionrow->uid != '78072'){
			$url = "https://media.smsgupshup.com/GatewayAPI/rest?userid=2000209699&password=!7Tb5Q@t&send_to=".$tidmobile."&v=1.1&format=json&msg_type=TEXT&method=SENDMESSAGE&msg=You%20have%20".$sessionrow->session_duration ."%20min%20".$action."%20session%20with%20".$name."%2C%20DOB%3A%20".$dob."%2C%20Issue%3A%20".$issuestr;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($ch);
			curl_close($ch);
		}	
		if(strpos($sessionrow->uname, "@") !== false){
		    $uname = explode('@', $sessionrow->uname)[0];
		} else{
		    $uname = $sessionrow->uname;
		}
		$uidmobile = get_user_meta($uid,'mobile',true);
		$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
		$tidmobile = get_user_meta($tid,'mobile',true);
		$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
		
		if($action == 'call' && $therapiststatus->availability_status == 1 && ($sessionrow->remaining_session > 0)){
			
			
			$call_redirect = 1; 
		
			$password="password";
			$encrypted_ocid = openssl_encrypt($lastid,"AES-128-ECB",$password);
			$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
		
			
			$therapy_name = ucfirst(str_replace('-', ' ', $therapy));
			$tmsg = $uname." has booked an Instant Call session for therapy ".$therapy_name." for ".$session_duration ." minutes. Answer the call from +91 8048891009 to start your session.Love & Light - Thriive Wellness.";
			$tempid = '1007698550154971004';
			sendSMS($tidmobile,$tmsg,$tempid);
			
			
			$curl = curl_init();
			//+918048166487
			$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048160943","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($session_duration)));
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

			curl_close($curl);
			$callresp = json_decode($response,true);
			
	
			if(!empty($callresp)){
				if($callresp['success']['status'] == 'success'){
					$connected = 1; 
					$uid_accept = 1;
					$tid_accept = 1;
					$call_id = $callresp['success']['call_id'];
					$remaining_session =0;
					//$busy_date = $data['busy_date'];
				}
			} 
			$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',modified_date = '".date('Y-m-d H:i:s')."',waiting=1,remaining_session=0,email_sms=0,call_id = '".$call_id."',func_name='sess".$response."' WHERE id='".$lastid."'");	
		    $tmsg = "Hi,<br/>".$uname." has booked an Instant Call session with you. Their payment for ".$sessionrow->pkgdescription ." minutes session is successful.<br/>You will receive a call from +91 8048891009, please answer this call to start your session. For a successful session, ensure that you have a strong network connection on your device.<br/><br/> Note: We now have an auto disconnect feature, wherein the call will disconnect once the purchased session time is over. Please encourage your client to extend the session by purchasing another session from the Thriive website.<br/><br/>Love and Light,<br/>Team Thriive ";
			$tsubject = "New Session from ".$uname ." - ".$lastid;
			sendEmail($tuserdata->temail, $tsubject,$tmsg); 
			
			
		} elseif($action == 'call') { 
			$wpdb->query("UPDATE online_consultation SET cron_update=2,waiting=0,remaining_session=1,func_name='call session thankyou' WHERE id='".$lastid."' AND payment_status = 'success'");	
			
		}	
		
		if($action == 'chat' && $therapiststatus->availability_status == 1 && ($sessionrow->remaining_session > 0)){
			//$umsg = "Your client ". $uname ." has taken ".$sessionrow->pkgdescription ." and is waiting for a response from you. Please login to your account and start online chat with the client . ";
			

			$call_chat_history = array(
				'tid' => $mypost->post_author,
				'uid' => $current_user->ID,
				'oc_id' => $lastid
				
			);
			$wpdb->insert("call_chat_history",$call_chat_history);
			$tempid = '1007645385754747483';
			$password="password";
			$encrypted_tid = openssl_encrypt($tid,"AES-128-ECB",$password);
			$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
			$encrypted_tid = openssl_encrypt($tid,"AES-128-ECB",$password);
			$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
			$therapy_name = ucfirst(str_replace('-', ' ', $therapy));
			$tmsg = $uname." has booked an Instant Chat Session for therapy ".$therapy_name." for ".$session_duration ." minutes. Please start the session within the next 2 minutes.Love & Light - Thriive Wellness";
			$tempid = '1007167654222090993';
			sendSMS($tmobile,$tmsg,$tempid);
			//sendSMS('8850630321',$tmsg,$tempid);
			
			if($uidmobile == '9561437211'){
				sendSMS('9820080865',$tmsg,$tempid);
				sendEmail('vinay@thriive.in','9561437211 has taken call session', '9561437211 has taken call session');
				sendEmail('prathamesh@thriive.in','9561437211  has taken chat session', '9561437211 has taken chat session');
			}
			//sendSMS('8850630321',$tmsg,$tempid);
			//$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
			$tsubject = "New Session from ".$uname ." - ".$lastid;
			$tmsg = "Hi,<br/><br/>".$uname." has booked an Instant Chat session with you. Their payment for ".$sessionrow->package ." minutes session is successful.<br/><br/>Please start the session within the next 2 minutes. For a successful session, ensure that you have a strong internet connection on your device.<br/><br/>Note: We now have an auto disconnect feature, wherein the chat will disconnect once the purchased session time is over. Please encourage your client to extend the session by purchasing another session from the Thriive website.<br/><br/>Love & Light,<br/>Team Thriive";
			sendEmail($tuserdata->temail, $tsubject,$tmsg);
			$mobile = get_user_meta($mypost->ID,'mobile',true);
		    
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
			$wpdb->query("UPDATE online_consultation SET remaining_session = 0 WHERE id='".$lastid."'");
			
		} elseif($action == 'chat') {
			$wpdb->query("UPDATE online_consultation SET cron_update=2,remaining_session=1,uid_accept=-2,tid_accept=-2,func_name='chat session thankyou' WHERE id='".$lastid."' AND payment_status = 'success'");	
			
		}		
		$wpdb->query("UPDATE online_consultation SET remaining_session=0 WHERE payment_txnid = '".$payment_txnid ."' AND id !='".$lastid."'");
		$tempid = "1007921355648742887";
		$alertmsg = $uname ." connected via ".$action." to ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0]." for ". $sessionrow->package ." and for therapy ".$therapy." on thriive";
		
		//sendEmail('accountmanager1@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
		//sendSMS('7208811389',$alertmsg,$tempid);
		//sendSMS('9820686971',$alertmsg,$tempid);
		sendSMS('9930502459',$alertmsg,$tempid);
		//sendSMS('8850630321',$alertmsg,$tempid);
		//sendSMS('7506765361',$alertmsg,$tempid);
		//sendEmail($tuserdata->user_email, $tsubject, $tmsg);
		//sendEmail('prathamesh@thriive.in', $tsubject,$tmsg);
		
		$term = get_term_by('slug', $therapy, 'therapy');
		 
		 
		?>
		<div class="container octhank" >
		           
					<?php 
					if($therapiststatus->availability_status == 1){
					?>	
					<!--<div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px;">
		                <h5 class="text-center">We hope you have a wonderful session.</h5>
		            </div>-->
		            <?php 
					}
					if($_GET['a'] == 'call'){ 
		            	/* if($_GET['t'] == 'all-page' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology' || $_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'vastu-shastra'){ */ //} 
						
						if($therapiststatus->availability_status == 1){
						?>	
						<!--<div class="imgcontainer mt2">
							<img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
						</div>
			            <div class="text-center ">
			                <h5 class="text-center" style="margin:5px 5px;padding:5px 5px;">Please wait for  <?php echo $post->post_title; ?> to Accept the Session. </h5>
			            </div>-->
		        	<?php } 
					}
					if($_GET['a'] == 'chat') { 
						if($therapiststatus->availability_status == 1){
						?>
						<!--<div class="imgcontainer">
			                <img src="wp-content/uploads/2020/07/chat_2.png" alt="" class="avatar" width="60" height="60">
			            </div>
		        		<div class="text-center footer_text">
			                 <h5 class="text-center" style="padding-left: 10px; padding-right: 10px;color: #666666d9;">Please wait for <?php echo $post->post_title; ?> to Accept the Chat. You will also Receive an SMS. Thank You.</h5>
			            </div>-->
			        <?php } 
					}	
					if($_GET['t'] == 'tarot-card-reading'){
						$label = "Tarot";
						$link = "/talk-to-best-tarot-card-reader-online";
					}else if($_GET['t'] == 'life-coach'){
						$label = "Life Coach";
						$link ="/talk-to-best-life-coach-online";
					}else if($_GET['t'] == 'hypno-therapy'){
						$label = "Hypnotherapy";
						$link = "/hypnotherapy";
					}else if($_GET['t'] == 'inner-child-healing'){
						$label = "Inner Child Healing";
						$link = "/inner-child-healing";
					}else if($_GET['t'] == 'sex-therapist'){
						$label = "Sex Therapist";
						$link ="/consult-top-sex-therapists-online";
					}else if($_GET['t'] == 'past-life-regression'){
						$label = "Past Life Regression";
						$link = "/past-life-regression-therapy";
					}else if($_GET['t'] == 'counseling-consulting'){
						$label = "Counseling";
						$link = "/counseling";
					}else if($_GET['t'] == 'eft-emotional-freedom-technique'){
						$label = "EFT Emotional Freedom Technique";
						$link = "/eft-emotional-freedom-technique";
					}else if($_GET['t'] == 'Appointment'){
						$label = "Appointment";
						$link ="/book-tarot-reading-by-appointment";
					}else if($_GET['t'] == 'nutritionist'){
						$label = "Nutritionist";
						$link = "/consult-nutritionist-online";
					}else if($_GET['t'] == 'vastu'){
						$label = "Vastu";
						$link ="/vastu";
					}else if($_GET['t'] == 'numerology'){
						$label = "Numerology";
						$link = "/talk-to-best-numerologist-online";
					}else if($_GET['t'] == 'Free Covid Session'){
						$label = "Free Covid Session";
						$link = "/consult-covid-counselor-online";
					} else if($_GET['t'] == 'angel-reading'){
						$label = "Angel Reading";
						$link = "/angel-reading";
					} else if($_GET['t'] == 'cosmic-astrology'){
						$label = "Astrology";
						$link = "/talk-to-best-astrology-online";
					}else if($_GET['t'] == 'meditation'){
						$label = "Meditation";
						$link = "/meditation-video-call";
					}
					if($therapiststatus->availability_status >= 2){
					?>
					<div class="text-center mt-2" style="margin:bottom:10px;">
		                <h5 class="text-center">Sorry, the therapist you had chosen is busy currently. Please go to <a href="<?php echo $link; ?>"><?php echo $label;?> Listing Page</a> to select another available therapist. <br/><br/>Please note your session is in your account and you do not need to make another payment.</h5>
		            </div>
					<?php exit();
					} 
			        ?>
		            <!--<div style="clear:both"></div>
			        <div class="" style="border-top: 1px dashed;"></div>
			        <div class="text-center mt-2" style=" padding: 5px;">
		               
						<h5 class="text-center" >For any further queries or concerns please reach us at support@thriive.in</h5>
		            </div>
					<div class="" style="border-top: 1px dashed;"></div>
		            <div class="text-center footer_text">
		                 
		            </div><br>
		        </div>-->


<!--New Thankyou page design-->




<style type="text/css">


	.therapist_data_img{
		
	}
	.therapist_data_img img{
		border-radius: 50%;
		width: 10rem;
		height: 10rem;
	}
	.therapist_data{
		width:100%;
		padding: 1% 5% 0 5%;
		display: flex;
    	justify-content: center;

	}
	.therapist_data_info_p{
		margin:0;
		padding: 0;
		line-height: 1.8;
		color: #6D6D6D;
	}
	.therapist_data_info{
		display: table-cell;
		vertical-align: middle;
	}
	.thankyou_desclaimer{
		display:block;
		margin:0 auto;
		width: 100%;
		text-align: center;
		background-color: #5EAA48;
    	padding: 3% 0;
	}
	.thankyou_desclaimer_thankyou{
		font-size: 28px;
		margin-bottom: 5px;
		color: #fff;

	}
	.thankyou_desclaimer_details{
		font-size: 18px;
		margin-bottom: 5px;
		color:#fff;

	}
	.session_duration{
		width:100%;
		text-align: center;
		margin:0 auto;
		background-color: #FFCF0C;
	    margin-top: 1%;
	    padding: 1% 0px;
	    font-weight: 500;
	}
	.therapist_data_cont{
				border: solid 2px #CECECE;
	}
	.thankyou_instructions{
		display:flex;
		width: 90%;
		justify-content: center;
    	margin: 0 auto;
	}
	.therapist_data_info_p_name{
		font-weight: 600;
		transform: scale(1,1.3);
		font-size: 22px;
		margin-top: 1.8rem;
	}





@media (min-width: 320px) and (max-width: 640px) {
	.therapist_data_img{
		display: table-cell;
		text-align: center;
	}
	.therapist_data_img img{
		border-radius: 50%;
		width: 7rem;
		height: 7rem;
	}
	.therapist_data{
		width:100%;
		padding: 5% 5% 0 5%;
		display: table;

	}
	.therapist_data_info_p{
		margin:0;
		padding: 0;
		line-height: 1.5;
		color: #6D6D6D;
	}
	.therapist_data_info{
		display: table-cell;
		vertical-align: middle;
	}
	.thankyou_desclaimer{
		display:block;
		margin:0 auto;
		width: 100%;
		text-align: center;
		background-color: #5EAA48;
    	padding: 3% 0;
	}
	.thankyou_desclaimer_thankyou{
		font-size: 20px;
		margin-bottom: 5px;
		color: #fff;

	}
	.thankyou_desclaimer_details{
		font-size: 14px;
		margin-bottom: 5px;
		color:#fff;

	}
	.session_duration{
		width:100%;
		text-align: center;
		margin:0 auto;
		background-color: #FFCF0C;
	    margin-top: 5%;
	    padding: 1% 0px;
	    font-weight: 500;
	}
	.therapist_data_cont{
				border: solid 2px #CECECE;
	}
	.thankyou_instructions{
		display:block;
		width: 90%;
		justify-content: unset;
    	margin: unset;
	}
	.therapist_data_info_p_name{
		font-weight: 600;
		transform: scale(1,1.3);
		font-size: unset;
		margin-top: unset;
	}
}
</style>

<div class="thankyou_desclaimer">
	<p class="thankyou_desclaimer_thankyou">Thank you for your Payment</p>
	<p class="thankyou_desclaimer_details">You have a <?php echo $data['action'];?> Session With</p>
</div>

<div class="therapist_data_cont">
	<div class="therapist_data">
		<div class="therapist_data_img"><img src="<?php echo get_the_post_thumbnail_url( $mypost->ID, 'featured_post');?>"></div>
		<div class="therapist_data_info">
			<p class="therapist_data_info_p therapist_data_info_p_name" style=""><?php echo $tname; ?></p>
			<p class="therapist_data_info_p"><?php echo ucfirst(str_replace('-', ' ', $therapy_name)) ;?></p>
			<p class="therapist_data_info_p">Session Booked</p>

		</div>	
	</div>
	<div class="session_duration">
		<p class="therapist_data_info_p" style="color: #000 !important;">Session Duration <?php echo $session_duration;?>Mins</p>
	</div>
</div>
<br>
<div class="thankyou_instructions">
	<ul>
		<li><p class="therapist_data_info_p">Please follow Live Session updates below.</p></li>
		<li><p class="therapist_data_info_p">Incase call disconnects Please Wait. You will Get a Call Back option.</p></li>
		<li><p class="therapist_data_info_p">In case of any trouble during the session use Issues/ Feedback link in Menu. ( Call Disconnected, Network Issues )</p></li>
		<li><p class="therapist_data_info_p">Please watch below for instructions related to session status and in case of call drop during the session. </li>
	</ul>
</div>


<!--Ends Here-->



<!--This code is added here to redirect user from thankyou page to chat page -->
<!--Code added by Akash on 08-mar-2022 21:03 -->

<?php
	if($_GET['a'] == 'chat'){
		?>

			<script type="text/javascript">
				function redirect_to_chat_page(){
					window.location.replace("<?php echo get_site_url().'/chat-page';?>");
				}
				setTimeout('redirect_to_chat_page();', 5000);
			</script>

		<?php
	}

?>




<!--Code Ends-->
		
				
	
	<?php
	
	unset($_SESSION['no_of_sessions']);
	
} else {
	wp_redirect('login'); exit;
?>

	<h5 class="text-center">Sorry  your session has expired. </h5>
<?php	
}	
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php 
include_once get_stylesheet_directory().'/new-footer.php'; ?>
