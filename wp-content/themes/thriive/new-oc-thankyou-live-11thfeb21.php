<?php /* Template Name: New Oc Thank you page */ 
// if (!is_user_logged_in()) { 
// 	wp_redirect('/login/');
// 	exit();
// } 
$current_user = wp_get_current_user();
// echo '<pre>'; print_r($current_user); echo '</pre><br/><br/>';
// echo '<pre>'; print_r(get_userdata(16203)); echo '</pre>'; exit;
include_once get_stylesheet_directory().'/new-header.php';
?>
<?php $slug = $_GET['q'];
	$mypost = get_page_by_path($slug, '', 'therapist');
	$post = get_post($mypost->ID);
	$tuserdata = get_userdata($post->post_author);
	setup_postdata( $post );
	$txnid = $_POST["txnid"];
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
	<section>
		<?php if(!empty($_POST) && $_POST['free_status'] == 'success' && isset($_GET['pt']) && $_GET['pt'] == "free"){
				$userId = $_POST['uid'];
				$user = get_user_by('id',$userId);
				$mins = $_POST['mins'];
				$uname = $user->first_name != "" ? $user->first_name : $user->user_email;
				$action = $_GET['a'];
				$therapy = $_GET['t'];
				saveFreeOCData($userId,$uname,$user->user_email,$post->post_author,$tuserdata->first_name.' '.$tuserdata->last_name,$tuserdata->user_email,$_GET['a'],$_GET['t'],"0",$mins,"yes",$_POST['booking_date'],$post->ID,$user->mobile,$tuserdata->mobile); ?>
				<script type="text/javascript">
					$(document).ready(function(){
						var date = new Date("YYYY-MM-DD");
						clevertap.event.push("Payment Success", {
						    "Page Source": window.location.href,
						    "Therapist": "<?php echo $slug; ?>",
						    "Therapy": "<?php echo $therapy; ?>",
						    "Coupon Applied": "No",
						    "Plan Type": "Free",
						    "Action": "<?php echo $action; ?>",
						    "Date": date,
						});
					});
				</script>
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
		                <h5 class="text-center" >Incase of any issue you can reach us on <br><a href="">support@thriive.in</a></h5>
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
			$freemins = explode(",",$_POST['udf2']);							   
			if($_POST['status'] == 'success' && $hash == $_POST["hash"]) {
				saveOCData($userId,$_POST["firstname"],$_POST["email"],$post->post_author,$tuserdata->first_name.' '.$tuserdata->last_name,$tuserdata->user_email,$_GET['a'],$_POST['udf1'],$_POST["productinfo"],$_POST["amount"],"success",$txnid,"yes",$user->mobile,$tuserdata->mobile,$_POST['udf2'],$_POST['udf4'],$_POST['udf5'],$post->ID); ?>  
				<script type="text/javascript">
					$(document).ready(function(){
						var date = new Date("YYYY-MM-DD");
						clevertap.event.push("Payment Success", {
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
	        	<div class="container octhank">
		            <div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px;">
		                <h5 class="text-center">Thank you for your payment</h5>
		            </div>
		            <?php if($_GET['a'] == 'call'){ 
		            	if($_GET['t'] == 'all-page' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology' || $_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading'){?>
				            <div class="imgcontainer mt2">
				                <img src="wp-content/uploads/2020/07/Screenshot_117.png" alt="" class="avatar" width="60" height="60">
				            </div>
				            <!--  <div class="text-center mt-2">
				                <h5 class="text-center">Your First <?php echo $freemins[0]; ?>  are free</h5>
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
			        <!--  <div class="text-center mt-2" style=" padding: 5px;">
		              <h5 class="text-center contg">Have more questions to ask your previous expert?</h5>
					<?php 	
					   if($_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'vastu-shastra' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'numerology'){
						?>
						 <h5 class="text-center"><b><a href="<?php echo get_site_url()."/new-payment-apage?q=".$_GET['q']."&a=".$_GET['a']."&t=".$_GET['t']; ?>">Click here</a> to continue consultation</b></h5>
						<?php 
					    } else {
						?>
						<h5 class="text-center"><b><a href="<?php echo get_site_url()."/payment-details?q=".$_GET['q']."&a=".$_GET['a']."&t=".$_GET['t']; ?>">Click here</a> to continue consultation</b></h5>
						<?php 	
						}
						?>
		
		            </div>-->
					<div class="" style="border-top: 1px dashed;"></div>
		            <div class="text-center footer_text">
		                 <h5 class="text-center" >Incase of any issue you can reach us on <br><a href="">support@thriive.in</a></h5>
		            </div><br>
		        </div>			
			<?php } else { 
				$plan_title = $_POST['udf1'];
				$plan_cost = $_POST["amount"];
				$is_applied = !empty($_POST['udf4'])?"Yes":"No";
				$coupon_code = !empty($_POST['udf4'])?$_POST['udf4']:"";
				$action = $_GET['a'];
				$therapy = $_POST["productinfo"];
				saveOCData($userId,$_POST["firstname"],$_POST["email"],$post->post_author,$tuserdata->first_name.' '.$tuserdata->last_name,$tuserdata->user_email,$_GET['a'],$_POST['udf1'],$_POST["productinfo"],$_POST["amount"],"failed",$txnid,"no",$current_user->mobile,$tuserdata->mobile,$_POST['udf2'],$_POST['udf4'],$_POST['udf5'],$post->ID); ?>
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