<?php /* Template Name: New Oc Thank you page123 */ 
$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php';

if($_POST['status'] == 'success'){
?>

	<script type="text/javascript">
			fbq('track', 'Purchase', {currency: "INR", value: <?php echo $_POST['amount']; ?>});
			
	</script>

<?php
}
$slug = $_GET['q'];

	$mypost = get_page_by_path($slug, '', 'therapist');
	if($_POST["productinfo"] == 'Appointment'){
		$udf3 = explode(",",$_POST["udf3"]);
		$mypost = get_page_by_path($udf3[0], '', 'therapist');
	}
	
	$post = get_post($mypost->ID);
	
	$tuserdata = get_userdata($post->post_author);
	setup_postdata( $post );
	$txnid = $_POST["txnid"];
	$mihpayid = $_POST["mihpayid"];



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
	.text-center{
		font-family: open sans, sans-serif !important;
	}
	
	@media only screen and (max-width: 600px) {
		.octhank{padding-left:0px;padding-right:0px}
		.contg{font-weight:600;}
	}
	
	h5{color: #666666d9 !important;}
</style>
 
<?php $hash = getOCHash($_POST); ?>
<script>
	
</script>
	<section>
		<?php if(!empty($_POST) && $_POST['free_status'] == 'success' && isset($_GET['pt']) && $_GET['pt'] == "free"){
				$userId = $_POST['uid'];
				$user = get_user_by('id',$userId);
				$mins = $_POST['mins'];
				$uname = $user->first_name != "" ? $user->first_name : $user->user_email;
				$action = $_GET['a'];
				$therapy = $_GET['t'];
				saveFreeOCData($userId,$uname,$user->user_email,$post->post_author,$tuserdata->first_name.' '.$tuserdata->last_name,$tuserdata->user_email,$_GET['a'],$_GET['t'],"0",$mins,"yes",$_POST['booking_date'],$post->ID,$user->mobile,$tuserdata->mobile); ?>
				
				<div class="container octhank">
		            <div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px; padding:0px 15px;">
		                <h5 class="text-center">Thank you for booking a free session with us.</h5>
		            </div>
		            <?php if($_GET['a'] == 'call'){ ?>
		            	<div class="imgcontainer mt2">
			                <img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
			            </div>
			            <div class="text-center mt-2" style="padding:0px 15px;">
			                <h5 class="text-center">The session will last for 20 minutes.</h5>
			            </div>
			            <div class="text-center mt-2" style="padding:0px 15px;">
			                <h5 class="text-center">Please keep your phone line available.</h5>
			            </div>
			            <div class="text-center" style="padding:0px 15px;">
			                 <h5 class="text-center" style="margin:5px 5px;padding:5px 5px;">You will receive a call from <?php echo $post->post_title; ?> soon</h5>
			            </div>
		        	<?php } ?>
		            <div style="clear:both"></div>
			        <div class="" style="border-top: 1px dashed;"></div>
			        <div class="text-center footer_text">
		                <h5 class="text-center" >For any further queries or concerns please reach us at support@thriive.in</h5>
		            </div>
					<div class="" style="border-top: 1px dashed;"></div>
		        </div>
		<?php } else if(!empty($_POST) && !isset($_GET['pt']) && $_GET['pt'] == ""){
			$user = get_user_by('email', $_POST["email"]);
			$userId = $user->ID;
			$plan_title = $_POST['udf1'];
			$plan_cost = $_POST["amount"];
			$is_applied = !empty($_POST['udf4'])?"Yes":"No";
			$coupon_code = !empty($_POST['udf4'])?$_POST['udf4']:"";
			$action = $_GET['a'];
			$therapy = $_POST["productinfo"];
			if($_POST['udf2'] != ""){
				$freemins = explode(",",$_POST['udf2']);
			}	
			$therapiststatus = getTherapistConsultStatus($post->post_author);
			//echo "fdsfd";print_r($_POST);	 	
		
			if($_POST['status'] == 'success' && $hash == $_POST["hash"]) {
				
			?>	
			
				
				<script type="text/javascript"> 
				
						window.dataLayer = window.dataLayer || [];
						dataLayer.push({
						 'event' : 'Purchase',
						 'currencyCode' : 'INR',
						 'transactionId': '',
						 'transactionAffiliation': "<?php echo $therapy; ?>",
						 'transactionTotal': "<?php echo $plan_cost; ?>", 
						 'transactionTax': 0,
						 'transactionShipping': 0,
						 'transactionProducts': [{
						   'sku': "<?php echo $therapy; ?>",
						   'name': "<?php echo $slug; ?>",
						   'category': "<?php echo $therapy; ?>",
						   'price': "<?php echo $plan_cost; ?>",  
						   'quantity': 1 
						 }]
						}); 
				</script>	
			<?php 	
				
				if($_POST["productinfo"] == 'Appointment'){
			?>
				<script>
					$(document).ready(function(){
						var date = new Date("YYYY-MM-DD");
						clevertap.event.push("Payment Success", { 
							"Page Source": window.location.href,
							"Therapist": "<?php echo $slug; ?>",
							"Therapy": "<?php echo $_POST['udf1']; ?>",
							"Plan Title": "<?php echo $plan_title; ?>",
							"Plan Cost": <?php echo $plan_cost; ?>,
							"Coupon Applied": "<?php echo $is_applied; ?>",
							"Coupon Code": "<?php echo $coupon_code; ?>",
							"Plan Type": "Paid",
							"Action": "Appointment Chat",
							"Date": date,
							//"payuid": "<?php echo $mihpayid;?>",
							"txnid": "<?php echo $txnid;?>"
						});
					}); 
					
				</script>
			<?php 	
					
				if($_GET["c"] == 'sex-therapy' || $_GET["c"] == 'love-therapy'){
					$session_booked = $_POST['udf2'];
				}	else {
					$session_booked = 1;
				}	
						saveAppointmentData($userId,$post->post_author,$_POST["firstname"],$_POST["udf1"],$_POST["amount"],"success",$txnid,$_POST['udf2'],$_POST["email"]);
						$_POST['uid'] = $userId;
						$_POST['tid'] = $post->post_author;
						$_POST['therapy_name'] = $_POST['productinfo'];
						$_POST['category_name'] = $_POST['udf1'];
						$_POST['tname'] = $mypost->post_title;
						$_POST['temail'] = $tuserdata->user_email;
						$_POST['payment_txnid'] = $txnid;
						$_POST['appointment_date'] = $_POST['udf5'];
						$_POST['status'] = "success";		
						//echo "fdsfd";print_r($_POST);exit();
						saveOCAppointmentData($_POST);
			?>
					<script> 
						
						//setTimeout('window.location.href="<?php echo site_url();?>/appointment-booking-page?q=<?php echo $_GET["q"];?>&t=Appointment&c=<?php echo $_GET["c"];?>"',1000);
					</script>
				<?php 		
					//}  else {
					
						/* $_POST['uid'] = $userId;
						$_POST['tid'] = $post->post_author;
						$_POST['therapy_name'] = $_POST['productinfo'];
						$_POST['category_name'] = $_POST['udf1'];
						$_POST['tname'] = $mypost->post_title;
						$_POST['temail'] = $tuserdata->user_email;
						$_POST['payment_txnid'] = $txnid;
						$_POST['appointment_date'] = $_POST['udf5'];
						$_POST['status'] = "success";		
						//print_r($_POST);exit();
						saveOCAppointmentData($_POST); */
						
					//}	
					
				} else {
					$lastid = saveOCData($userId,$_POST["firstname"],$_POST["email"],$post->post_author,$mypost->post_title,$tuserdata->user_email,$_GET['a'],$_POST['udf1'],$_POST["productinfo"],$_POST["amount"],"success",$txnid,"yes",$user->mobile,$tuserdata->mobile,$_POST['udf2'],$_POST['udf4'],$_POST['udf5'],$post->ID,$mihpayid); 
					if($_GET['a'] == 'call'){
				?>
					<script>
			//	setTimeout('window.location.href="<?php echo site_url();?>/new-call-page"',5000);

				  
				</script>
					
				<?php
					}
				}	
				?>  
				
	        	<div class="container octhank">
		          
		           
					
		            <?php 
					if($_GET['t'] == 'tarot-card-reading'){
						$label = "Tarot";
						$link = "/talk-to-best-tarot-card-reader-online";
					}/* else if($_GET['t'] == 'life-coach'){
						$label = "Life Coach";
						$link ="/talk-to-best-life-coach-online";
					} */
					else if($_GET['t'] == 'hypno-therapy'){
						$label = "Hypnotherapy";
						$link = "/hypnotherapy";
					}else if($_GET['t'] == 'inner-child-healing'){
						$label = "Inner Child Healing";
						$link = "/inner-child-healing";
					}
					else if($_GET['t'] == 'past-life-regression'){
						$label = "Past Life Regression";
						$link = "/past-life-regression-therapy";
					}
					else if($_GET['t'] == 'eft-emotional-freedom-technique'){
						$label = "EFT Emotional Freedom Technique";
						$link = "/eft-emotional-freedom-technique";
					}else if($_GET['t'] == 'Appointment'){
						$label = "Appointment";
						$link ="/book-tarot-reading-by-appointment";
					}/*else if($_GET['t'] == 'nutritionist'){
						$label = "Nutritionist";
						$link = "/consult-nutritionist-online";
					}else if($_GET['t'] == 'vastu'){
						$label = "Vastu";
						$link ="/vastu";
					}else if($_GET['t'] == 'numerology'){
						$label = "Numerology";
						$link = "/talk-to-best-numerologist-online";
					} else if($_GET['t'] == 'Free Covid Session'){
						$label = "Free Covid Session";
						$link = "/consult-covid-counselor-online";
					}else if($_GET['t'] == 'angel-reading'){
						$label = "Angel Reading";
						$link = "/angel-reading";
					} */ 
					else if($_GET['t'] == 'cosmic-astrology'){
						$label = "Astrology";
						$link = "/talk-to-best-astrology-online";
					} /* else if($_GET['t'] == 'meditation'){
						$label = "Meditation";
						$link = "/meditation-video-call";
					} */
					if($therapiststatus->availability_status >= 2 && $_POST["productinfo"] != 'Appointment'){
					?>
					<div class="text-center mt-2" style="margin:bottom:10px;">
		                <h5 class="text-center">Sorry, the therapist you had chosen is busy currently. Please go to <a href="<?php echo $link; ?>"><?php echo $label;?> Listing Page</a> to select another available therapist. <br/><br/>Please note your session is in your account and you do not need to make another payment.</h5>
		            </div>
					<?php exit();
					} 	
					if($_GET['a'] == 'call'){ 
		            	/* if($_GET['t'] == 'all-page' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology' || $_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'all-prediction-page'){ } */ 
						if($therapiststatus->availability_status == 1){
						
						?>
						<div class="imgcontainer mt2">
							<img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
				        </div>
						<h5 class="text-center" style="margin:5px 5px;padding:5px 5px;">Please wait for  <?php echo $post->post_title; ?> to Accept the Session. </h5>
		        	<?php 
						}
					} 
					?>
			        <div style="clear:both"></div>
			        <div class="" style="border-top: 1px dashed;"></div>
			       
		            </div>
					

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
	<p class="thankyou_desclaimer_details">You have a <?php echo ucfirst(explode(',',$_POST['udf2'])[5]);?> Session With</p>
</div>

<div class="therapist_data_cont">
	<div class="therapist_data">
		<div class="therapist_data_img"><img src="<?php echo get_the_post_thumbnail_url( $mypost->ID, 'featured_post')?>"></div>
		<div class="therapist_data_info">
			<p class="therapist_data_info_p therapist_data_info_p_name" style=""><?php echo $post->post_title ;?></p>
			<p class="therapist_data_info_p"><?php echo ucfirst(str_replace('-', ' ', $_POST['productinfo']));?></p>
			<p class="therapist_data_info_p">Session Booked</p>

		</div>	
	</div>
	<div class="session_duration">
		<p class="therapist_data_info_p" style="color: #000 !important;">Session Duration <?php if($_POST['productinfo'] != 'Appointment'){ echo explode(',',$_POST['udf2'])[4]; } else { echo '30';} ?> Mins</p>
	</div>
	
</div>
<br>
<div class="thankyou_instructions">
	<ul>
		<li><p class="therapist_data_info_p">Please follow Live Session updates below.</p></li>
		<li><p class="therapist_data_info_p">Incase call disconnects Please Wait. You will Get a Call Back option.</p></li>
		<li><p class="therapist_data_info_p">In case of any trouble during the session use Issues/ Feedback link in Menu. ( Call Disconnected, Network Issues )</p></li>
	</ul>
</div>


<!--Ends Here-->






			<?php } else { 
				
				
				$plan_title = $_POST['udf1'];
				$plan_cost = $_POST["amount"];
				$is_applied = !empty($_POST['udf4'])?"Yes":"No";
				$coupon_code = !empty($_POST['udf4'])?$_POST['udf4']:"";
				$action = $_GET['a'];
				$therapy = $_POST["productinfo"];
				if($_POST["productinfo"] == 'Appointment'){
					if($_GET["c"] == 'sex-therapy' || $_GET["c"] == 'love-therapy'){
						saveAppointmentData($userId,$post->post_author,$_POST["firstname"],$_POST["udf1"],$_POST["amount"],"failed",$txnid,$_POST['udf2'],$_POST["email"]);
					}   else {
					
						$_POST['uid'] = $userId;
						$_POST['tid'] = $post->post_author;
						$_POST['therapy_name'] = $_POST['productinfo'];
						$_POST['category_name'] = $_POST['udf1'];
						$_POST['tname'] = $mypost->post_title;
						$_POST['temail'] = $tuserdata->user_email;
						$_POST['payment_txnid'] = $txnid;
						$_POST['appointment_date'] = $_POST['udf5'];
						$_POST['status'] = "failed";
						saveOCAppointmentData($_POST);
						
					}	
						
				} else {
					saveOCData($userId,$_POST["firstname"],$_POST["email"],$post->post_author,$tuserdata->first_name.' '.$tuserdata->last_name,$tuserdata->user_email,$_GET['a'],$_POST['udf1'],$_POST["productinfo"],$_POST["amount"],"failed",$txnid,"no",$current_user->mobile,$tuserdata->mobile,$_POST['udf2'],$_POST['udf4'],$_POST['udf5'],$post->ID,$mihpayid);
				}
				?>
				<script type="text/javascript">
					$(document).ready(function(){
						var date = new Date("YYYY-MM-DD");
						clevertap.event.push("Payment Failure", {
						    "Page Source": window.location.href,
						    "Therapist": "<?php echo $slug; ?>",
						    "Therapy": "<?php echo $therapy; ?>",
						    "Plan Title": "<?php echo $plan_title; ?>",
    						"Plan Cost": "<?php echo $plan_cost; ?>",
						    "Coupon Applied": "<?php echo $is_applied; ?>",
						    "Coupon Code": "<?php echo $coupon_code; ?>",
						    "Plan Type": "Paid",
						    "Action": "<?php echo $action; ?>",
						    "Date": date,
						});
					});
				</script>
				<script>
						/* window.dataLayer = window.dataLayer || [];
						dataLayer.push({
						 'event' : 'Purchase', 
						 'currencyCode' : 'INR',
						 'transactionId': '',
						 'transactionAffiliation': "<?php echo $therapy; ?>",
						 'transactionTotal': "<?php echo $plan_cost; ?>", 
						 'transactionTax': 0,
						 'transactionShipping': 0,
						 'transactionProducts': [{
						   'sku': "<?php echo $therapy; ?>",
						   'name': "<?php echo $slug; ?>",
						   'category': "<?php echo $therapy; ?>",
						   'price': "<?php echo $plan_cost; ?>",  
						   'quantity': 1 
						 }]
						}); */
				</script>
				<div class="col-12 col-sm-8 p-sm-0" style="color:red;">
					<?php echo "Sorry! Your transaction has been failed. Please try again"; ?>
				</div>
			<?php } 
		} else {
			wp_redirect('login'); exit;
		} ?>
	</section>

<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>

<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}

</script>
 


<!--This code is added here to redirect user from thankyou page to chat page -->
<!--Code added by Akash on 08-mar-2022 21:03 -->

<?php
	if(($_GET['a'] == 'chat' || $_GET['a'] == 'call') && $_POST['status'] == "success"){
		include '/var/www/html/wp-content/themes/thriive/horoscope_new/QA/part/QApart.php';
		?>

			<script type="text/javascript">
				function redirect_to_chat_page(){
					//window.location.replace("<?php echo get_site_url().'/chat-page';?>");
				}
				//setTimeout('redirect_to_chat_page();', 5000);
			</script>

		<?php
	}

?>




<!--Code Eds-->