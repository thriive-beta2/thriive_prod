<?php /* Template Name: New Oc Session Thank you page */ 
session_start();
global $wpdb;
$current_user = wp_get_current_user();

include_once get_stylesheet_directory().'/new-header.php';
$slug = $_GET['q'];
$action = $_GET['a'];
$therapy = $_GET['t'];
$oc_id = $_GET['oc_id'];

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
	$sessionrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE  uid = '".$current_user->ID ."'   AND remaining_session > 0  LIMIT 1");
//}

//sendEmail($sessionrow->uemail, 'tsubject', 'tmsg');exit();
//if(isset($_SESSION['no_of_sessions'])){ 
if($sessionrow >0 && isset($_SESSION['no_of_sessions'])){
		//$umsg = "You have used 1 session for ".$sessionrow->package .'. '; 
		$usrdet = get_user_meta($mypost->post_author,0);
		$date = date("Y-m-d H:i:s");
	
		$data = array(
			'uid' => $current_user->ID,
			'uname'	=> $sessionrow->uname,
			'uemail' => $sessionrow->uemail,
			'tid' => $mypost->post_author,
			'tname'	=> $usrdet['first_name'][0] ." ".$usrdet['last_name'][0],
			'temail' => $tuserdata->user_email,
			'action' => $action,
			'package' => $sessionrow->package,
			'therapy_name' => $therapy,
			'amount' => $sessionrow->amount,
			'payment_status' => $sessionrow->payment_status,
			'payment_txnid' => $sessionrow->payment_txnid,
			'coupon_code' => $sessionrow->coupon_code,
			'created_date' => $date,
			'modified_date' => $date
		);
		$sessionarr = explode(",",$freemins);
		if($action == 'book_latercall'){
			$data['action'] =  "call";
		}elseif($action == 'book_laterchat'){
			$data['action'] =  "chat";	
		}	
		$data['no_of_sessions'] = 1;
		$data['pkgdescription'] = $sessionrow->pkgdescription;
		$data['remaining_session'] = 0;
		$wpdb->insert("online_consultation",$data);
		$lastid = $wpdb->insert_id; 
		$data = array('oc_id'=>$lastid,'uid' => $current_user->ID,'tid' => $mypost->post_author,'therapy_name' => $therapy  ,'action' => $data['action'],'created_date' => $date);
		$wpdb->insert("online_session_details",$data); 
		$result = oc_assign_masked_number_to_user($mypost->user_email,$sessionrow->uemail);
		$wpdb->query("UPDATE online_consultation SET remaining_session = (remaining_session-1),modified_date = '".$date."' WHERE id='". $sessionrow->id ."'");
		
		/* if($_GET['t'] == "nutritionist"){
			$goals = array("1"=>"Weight Loss","2"=>"Weight Gain","3"=>"Eat Right");		
			$medcon = array("1"=>"Diabetes","2"=>"Hypertension","3"=>"High Cholestrol","4"=>"Heart Disease","5"=>"Kidney Disease","6"=>"Lung Disease","7"=>"None","8"=>"Other");	
			$userdetails = $wpdb->get_row("SELECT data FROM nutritionist_data WHERE user_id = '". $uid ."' ORDER BY nd_id DESC LIMIT 1");
			$last_user = json_decode($userdetails->data,true);	
		}
		 */
		$tmobile = get_user_meta($mypost->post_author,'mobile',true);
		$umobile = get_user_meta($sessionrow->uid,'mobile',true);

	//	print_r($usrdet);exit();
		/* while ( have_rows('package_details','option') ) : the_row();
			foreach(get_sub_field('call_packages') as $call){ 
				if($call['title'] == $sessionrow->package && $call['no_of_sessions'] == $sessionrow->no_of_sessions .' Session'){
					$tdescmsg = ' for '.$call['description'];
					
				}
			}
		endwhile;  */
		
		if($action == 'call'){
			
			$tmsg = "Your client ".$sessionrow->uname ." has taken ".$sessionrow->pkgdescription ." and is waiting for a session with you. Please call on the ".$result['masked_number']." to connect with client within the next 2 minutes.";
			
		
			$tmsg .= ".Love and Light,Team Thriive";
			sendSMS($tmobile,$tmsg);
		
			
		    if($_GET['a'] == 'call'){ 
					
		       $tmsg =	"You have  1 session from ".$sessionrow->package .".You will get a call from ". $post->post_title ." within 24 hrs so please keep your phone line free.";
				
			}			
			$tmsg1 = "Love and Light,Team Thriive";
			sendSMS($umobile,$tmsg.$tmsg1);
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
			$tsubject = "Action required in 2 mins";
			sendEmail($sessionrow->uemail, $tsubject,$tmsg);
			$tmsg ="Hello ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0] .",<br/>Your client ".$sessionrow->uname ." has taken ".$sessionrow->pkgdescription ." and is waiting for a session with you .<br/>Please call on the ".$result['masked_number']." to connect with client within the next 2 minutes.";
			
			
						
			$tmsg .= "<br/><br/> Please Note:<br/>There is no auto disconnect for calls. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.";
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
			/* if($_GET['t'] == "nutritionist"){ 
				$tmsg .= "Goals :".$goals[$last_user['goals']];
				if($last_user['height'] != ""){
					$tmsg .= "Their BMI index is  ".round($last_user['bmi'],2).". Their Height is  ".$last_user['height'].". Their Weight is  ".$last_user['weight'].". DOB :".$last_user['dob'];
				}
				if($last_user['medcon'] != ""){
					$tmsg .= " Medical Condition : ";
					$medconarr =  explode(",",$last_user['medcon']);
					foreach($medconarr as $ma){
						$tmsg .= $medcon[$ma];
						if($ma == 8){
							$tmsg .= " Other Reason ".$last_user['otherreason'];
						}
					}
					
				}	
				
			} */
		}
		
		if($action == 'chat'){
			$tmsg = "Your client ". $sessionrow->uname ." has taken ".$sessionrow->pkgdescription ." and is waiting for a response from you. Please login to your account and start online chat with the client . ";
			
			/* if($_GET['t'] == "nutritionist"){
				$tmsg .= "Goals :".$goals[$last_user['goals']];
				if($last_user['height'] != ""){
					$tmsg .= ". Their BMI index is  ".round($last_user['bmi'],2).". Their Height is  ".$last_user['height'].". Their Weight is  ".$last_user['weight'].". DOB :".$last_user['dob'];
				}
				if($last_user['medcon'] != ""){
					$tmsg .= "<br/> Medical Condition : ";
					$medconarr =  explode(",",$last_user['medcon']);
					foreach($medconarr as $ma){
						$tmsg .= $medcon[$ma];
						
					}
					
				}	
				
				$tmsg .= "Love and Light,Team Thriive";
			} */
			sendSMS($tmobile,$tmsg);
			
		    $tmsg = "Hello,You have  1 session from ".$sessionrow->package .". To connect with ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0] ." click on start chat to connect with an expert.";
			$tmsg1 = "Love and Light,Team Thriive,*Terms & conditions apply";
			sendSMS($umobile,$tmsg.$tmsg1);
			
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
			$tsubject = "Action required in 2 mins";
			sendEmail($sessionrow->uemail, $tsubject,$tmsg);
			
		     $tmsg = "Hello ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0].",<br/>Your client ".$sessionrow->uname ." is waiting for a session with you.<br/><br/>";
			
			$tmsg .="Chat needs to begin within 2 minutes<br/>Their payment is completed for ".$sessionrow->pkgdescription ."<br/><br/>Connect NOW with the client on your dashboard<br/><br/> Please Note:<br/>There is no auto complete for chat. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.";
			$mobile = get_user_meta($mypost->ID,'mobile',true);
		    //sendEmailWithInvoice($temail, $tsubject, $tmsg, $uid, 'therapist', 'oc_invoice.php');
			/* if($_GET['t'] == "nutritionist"){
				$tmsg .= "<br/><br/>Goals :".$goals[$last_user['goals']]."<br/>";
				if($last_user['height'] != ""){
					$tmsg .= "Their BMI index is  ".round($last_user['bmi'],2)."<br/><br/>Their Height is  ".$last_user['height']."<br/><br/> Their Weight is  ".$last_user['weight']."<br/><br/>DOB :".$last_user['dob'];
				}
				if($last_user['medcon'] != ""){
					$tmsg .= " Medical Condition : ";
					$medconarr =  explode(",",$last_user['medcon']);
					foreach($medconarr as $ma){
						$tmsg .= $medcon[$ma]."<br/>";
						
					}
					
				}	
			} */
			
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
		}	
		$alertmsg = $sessionrow->uemail ." connected via ".$action." to ".$usrdet['first_name'][0] ." ".$usrdet['last_name'][0]." for ". $sessionrow->package ." and for therapy ".$therapy." on thriive";
		// sendEmail('manishj@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
		//sendEmail('accountmanager1@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
		sendSMS('7208811389',$alertmsg);
		sendSMS('9820686971',$alertmsg);
		sendSMS('9930502459',$alertmsg);
		sendSMS('9323322504',$alertmsg);
		sendSMS('8369415594',$alertmsg);
		sendEmail($tuserdata->user_email, $tsubject, $tmsg);
		
		
		$term = get_term_by('slug', $therapy, 'therapy');
		
		 
		?>
		<div class="container octhank">
		            <div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px;">
		                <h5 class="text-center">Thank you for your payment</h5>
		            </div>
		            <?php if($_GET['a'] == 'call'){ 
		            	if($_GET['t'] == 'all-page' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology' || $_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'vastu-shastra'){?>
				            <div class="imgcontainer mt2">
				                <img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
				            </div>
				            <!--<div class="text-center mt-2">
				                <h5 class="text-center">Your First <?php echo $sessionrow->package; ?>  Sessions are free</h5>
				            </div>-->
				        <?php } ?>
			            <div class="text-center mt-2">
			                <h5 class="text-center">Please keep your phone line free</h5>
			            </div>
			            <div class="text-center ">
			                 <h5 class="text-center" style="margin:5px 5px;padding:5px 5px;">You will receive a call from <?php echo $post->post_title; ?> soon</h5>
			            </div>
		        	<?php } if($_GET['a'] == 'chat') { ?>
						<div class="imgcontainer">
			                <img src="wp-content/uploads/2020/07/chat_2.png" alt="" class="avatar" width="60" height="60">
			            </div>
		        		<div class="text-center footer_text">
			                 <h5 class="text-center" style="padding-left: 10px; padding-right: 10px;color: #666666d9;"><?php echo $post->post_title; ?> is waiting for you to connect. please click the <strong>Chat Now</strong> button to start the chat</h5>
			            </div>
			        <?php } ?>
			        <?php if($_GET['a'] == 'chat') {?>
			            <div class="col-sm-3 col-xs-12"></div>
		            	<div class="col-sm-6 col-xs-12 p-sm-0">
		            		<section class="topreadingList">
								<?php set_query_var('uid',$userId);
								set_query_var('therapy',array($_GET['t'])); 
								get_template_part( 'template-parts/therapist-content1'); ?>
							</section>
						</div> 
						<div class="col-sm-3 col-xs-12"></div>
					<?php } ?>
		            <div style="clear:both"></div>
			        <div class="" style="border-top: 1px dashed;"></div>
			        <div class="text-center mt-2" style=" padding: 5px;">
		                <!--<h5 class="text-center contg">Have more questions to ask your previous expert?</h5>-->
		                <!--<h5 class="text-center"><b><a href="<?php echo get_site_url()."/payment-details?q=".$_GET['q']."&a=".$_GET['a']."&t=".$_GET['t']; ?>">Click here</a> to continue consultation</b></h5>-->
						 <?php 
					   if($_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'vastu-shastra' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology'){
						?>
						 <!--<h5 class="text-center"><b><a href="<?php echo get_site_url()."/new-payment-apage?q=".$_GET['q']."&a=".$_GET['a']."&t=".$_GET['t']; ?>">Click here</a> to continue consultation</b></h5>-->
						<?php 
					    } else {
						?>
						<!--<h5 class="text-center"><b><a href="<?php echo get_site_url()."/payment-details?q=".$_GET['q']."&a=".$_GET['a']."&t=".$_GET['t']; ?>">Click here</a> to continue consultation</b></h5>-->
						<?php 	
						}
						?>
						<!--<h5 class="text-center"><b><a href="<?php echo get_site_url()."/new-payment-apage?q=".$_GET['q']."&a=".$_GET['a']."&t=".$_GET['t']; ?>">Click here</a> to continue consultation</b></h5>-->
						<h5 class="text-center" >Incase of any issue you can reach us on <br><a href="">support@thriive.in</a></h5>
		            </div>
					<div class="" style="border-top: 1px dashed;"></div>
		            <div class="text-center footer_text">
		                 
		            </div><br>
		        </div>	
		<!--<div class="container octhank">
		            <div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px; padding:0px 15px;">
		                <h5 class="text-center">Thank you ,your session with <?php echo $post->post_title;?> for <?php echo $term->name.' via '.$action;?> is booked.Remaining Session is <?php echo ($remaindetails->remaining_session) - 1;?></h5>
		            </div>
		            <?php 
					if($_GET['a'] == 'call'){ ?>
		            	<div class="imgcontainer mt2">
			                <img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
			            </div>
			            
			            <div class="text-center" style="padding:0px 15px;">
			                 <h5 class="text-center" style="margin:5px 5px;padding:5px 5px;">You will receive a call from <?php echo $post->post_title; ?> soon</h5>
			            </div>
		        	<?php 
					} ?>
		            <div style="clear:both"></div>
			        <div class="" style="border-top: 1px dashed;"></div>
			        <div class="text-center footer_text">
		                <h5 class="text-center" >Incase of any issue you can reach us on <br><a href="">support@thriive.in</a></h5>
		            </div>
					<div class="" style="border-top: 1px dashed;"></div>
		        </div>-->
	<?php  
	//} else { ?>
		<!--<h5 class="text-center">Sorry  no more  session with <?php echo $post->post_title;?> for <?php echo $term->name.' via '.$action;?> is remaining.</h5>-->
	<?php
	//}
	unset($_SESSION['no_of_sessions']);
	
} else {
	wp_redirect('login'); exit;
?>

	<h5 class="text-center">Sorry  your session has expired. </h5>
<?php	
}	
include_once get_stylesheet_directory().'/new-footer.php'; ?>