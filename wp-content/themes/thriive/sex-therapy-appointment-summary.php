<?php session_start(); /* Template Name: Sex Therapy Appointment Summary */ 
include_once get_stylesheet_directory().'/new-header.php'; 
global $wpdb;

if (!is_user_logged_in()) { 
	wp_redirect('/login/');
	exit();
} else {
	$current_user = wp_get_current_user();
	$username = $current_user->first_name . ' ' . $current_user->last_name;	
}

$hash_string = '';
$posted = array();
$posted['key'] = MERCHANT_KEY;
$posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20); 

if(empty($_POST)){
	
	header("Location: ".site_url());
}

$sessiondata = $wpdb->get_row("SELECT  * FROM appointment_session_details WHERE uid = '". $current_user->ID ."'  AND therapy_name = '".$_POST['therapyname']."' AND payment_status='success' AND sessions_pending > 0");
//if($sessiondata >0){
$posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_email;
$posted['email'] = $current_user->user_email;  
$posted['phone'] = $current_user->mobile; 
$posted['udf2'] = $_POST['udf2'];

$posted['udf5'] =  $_POST['selected_date'].','.$_POST['time'].','.$_POST['therapyname'];
$_SESSION['appointmentdate'] = $_POST['selected_date'].','.$_POST['time'];
$_SESSION['action'] = $_POST['actionvia'];
$_SESSION['a'] = $_POST['a'];
$_SESSION['therapy'] = $_POST['therapyname'];
$_SESSION['therapist'] = $_POST['therapistname'].','.$_POST['selected_date'].','.$_POST['time'];
$posted['productinfo'] = 'Appointment';
$mypost = get_page_by_path($_POST['therapistname'], '', 'therapist');
//print_r($mypost);
$post = get_post($mypost->ID);
$posted['udf1'] =  $post->post_title; 
$mypost = get_page_by_path($_SESSION['therapist'], '', 'therapist');
$posted['amount'] = $_SESSION['amount'] = $_POST['amount'];
$hash = '';
$hashVarsSeq = explode('|', HASH_SEQUENCE);
foreach($hashVarsSeq as $hash_var) {
	$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	$hash_string .= '|';
}
$tuserdata = get_userdata($post->post_author);
$hash_string .= SALT;
$hash = strtolower(hash('sha512', $hash_string));
$term = get_term_by('slug', $_SESSION['therapy'], 'therapy');

$posted['udf3'] =  $_SESSION['therapy'];
$sessiondata = $wpdb->get_row("SELECT  * FROM appointment_session_details WHERE uid = '". $current_user->ID ."'  AND therapy_name = '".$_SESSION['therapy']."' AND payment_status='success' AND sessions_pending > 0");
//print_r($sessiondata);
//action='<?php echo site_url();/appointment-thank-you'
?>
<br/> 

<style type="text/css">


</style>


<div class="appointment-summary-card">
<h2 class="summtxt">Appointment Summary</h2><br/>
<div class="appointment-summary-hr"></div>
<p class="atherapisttxt apppointment-summary-card-aligin-right">Therapist Name :</p><p> <b><?php echo $post->post_title; ?></b></p><br/>
<p class="atherapytxt apppointment-summary-card-aligin-right">Therapy Name :</p><p> <b><?php echo ucwords(str_replace("-"," ",$_SESSION['therapy'])); ?></b></p>
<p class="sessiondonetxt apppointment-summary-card-aligin-right">Session Date :</p><p> <b><?php echo date("dS M Y",strtotime($_SESSION['appointmentdate']));echo '<br>'.date("h:i a",strtotime($_SESSION['appointmentdate']));  ?></b></p>  

<div class="appointment-summary-hr"></div> 
<div class="container">
<?php

if($sessiondata){
	$action_url = site_url()."/appointment-thank-you";
} else {
	$action_url = site_url()."/therapy-payment-page?q=".$_POST['therapistname']."&t=Appointment&c=".$_SESSION['therapy'];
}	
?>
<form method='post' action="<?php echo $action_url; ?>" method="post">
	<div >
		<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		<input type="hidden" name="txnid" value="<?php echo (empty($posted['txnid'])) ? '' : $posted['txnid']  ?>" /> 
		<input type="hidden" name="amount" value="<?php echo $sessiondata->amount; ?>" />
		<input type="hidden" name="firstname" value="<?php echo $current_user->user_login; ?>" />
		<input type="hidden" name="email"  value="<?php echo $current_user->user_email; ?>" />
		<input type="hidden" name="phone" value="<?php echo $current_user->mobile; ?>" />
		<input type="hidden" name="tname"   value="<?php echo $tuserdata->first_name.' '.$tuserdata->last_name; ?>" />
		<input type="hidden" name="tid"   value="<?php echo $post->post_author; ?>" />
		<input type="hidden" name="uid"   value="<?php echo $current_user->ID; ?>" />
		
		<input type="hidden" name="temail"   value="<?php echo $tuserdata->user_email; ?>" />
		<input type="hidden" name="appointment_date"   value="<?php echo $_SESSION['appointmentdate']; ?>" />
		<input type="hidden" name="payment_txnid"   value="<?php echo $sessiondata->payment_txnid; ?>" />
		<input type="hidden" name="therapy_name"   value="Appointment" />
		<input type="hidden" name="category_name"   value="<?php echo $_SESSION['therapy']; ?>" />
	
		
		
		<div class="text-center" onclick="document.querySelector('.confirm_layover').style.display = 'block';"><input type="submit"  name="appointconfirm" value="Confirm"  class="login_btn appointment-summary-confirm-btn"/></div>
		</div>
	</form>	
</div>	
</div>

<div>
</div>

<div class="confirm_layover" style="display:none;position: fixed;top: 0;left: 0;background-color: rgba(0,0,0,0.7);width: 100%;height: 100vh;z-index: 9999;">
<p style="width: 100%;text-align: center;line-height: 5vh;color: #fff;font-size: 20px;top: 41%;position: relative;"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/give%20couple%20of%20mins.gif" style="width: 25%;border-radius: 22px;"><br>Please Wait ...</p>
</div>
<style>
.footerwrap {
	position : absolute;	
	
}	

</style>
<?php 
/* } else {
	wp_redirect('login'); exit;
} */
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php 
//onclick="appointsummary();"
include_once get_stylesheet_directory().'/new-footer.php'; ?>

