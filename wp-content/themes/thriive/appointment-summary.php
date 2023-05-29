<?php session_start(); /* Template Name: Appointment Summary */ 
include_once get_stylesheet_directory().'/new-header.php'; 

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
	
	header("Location: ".site_url()."/therapist-appointment-page");
}
$posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_login;
$posted['email'] = $current_user->user_email;  
$posted['phone'] = $current_user->mobile; 

$posted['udf2'] = $_POST['amount'].',1,Appointment,'.$_POST['amount'].',0,'.$_POST['actionvia'];
$posted['udf5'] =  $_POST['selected_date'].','.$_POST['time'].','.$_POST['a'].','.$_POST['therapyname'];
$_SESSION['appointmentdate'] = $_POST['selected_date'].','.$_POST['time'];
$_SESSION['action'] = $_POST['actionvia'];
$_SESSION['a'] = $_POST['a'];
$_SESSION['therapy'] = $_POST['therapyname'];
$posted['udf3'] =  $_SESSION['therapist'] = $_POST['therapistname'].','.$_POST['selected_date'].','.$_POST['time'];
$posted['productinfo'] = 'Appointment';
$mypost = get_page_by_path($_POST['therapistname'], '', 'therapist');

$post = get_post($mypost->ID);
$posted['udf1'] =  $_POST['therapyname']; 
$posted['amount'] = $_SESSION['amount'] = $_POST['amount'];
$hash = '';
$hashVarsSeq = explode('|', HASH_SEQUENCE);
foreach($hashVarsSeq as $hash_var) {
	$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	$hash_string .= '|';
}

$hash_string .= SALT;
$hash = strtolower(hash('sha512', $hash_string));
$term = get_term_by('slug', $_SESSION['therapy'], 'therapy');

?>
<br/>
<style>
.appointment-summary-card p {
	width: 77% !important;
	
}	
77%
</style>
<div class="container" style="min-height: 550px;">
	<div class="appointment-summary-card"> 
		<h2 class="summtxt">Appointment Summary</h2><br/>
		<div class="appointment-summary-hr"></div>
		<p class="atherapisttxt ">Therapist Name : <b><?php echo $post->post_title; ?></b></p>
		<p class="atherapisttxt">Therapy Name :<b> <?php echo $term->name; ?></b></p>
		<p class="atherapisttxt">Session Date : <b><?php echo date("dS M Y, h:i a",strtotime($_SESSION['appointmentdate'])); ?></b></p>

		<div class="appointment-summary-hr"></div>
		<div class="container">
		<form method='post' action='<?php echo PAYU_BASE_URL;?>'>
			<div >
				<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
				<input type="hidden" name="txnid" value="<?php echo (empty($posted['txnid'])) ? '' : $posted['txnid']  ?>" /> 
				<input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
				<input type="hidden" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
				<input type="hidden" name="email"  value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
				<input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
				<input type="hidden" name="udf1"   value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
				<input type="hidden" name="udf2"   value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
				<input type="hidden" name="udf3"   value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
				<input type="hidden" name="category_name"   value="<?php echo $_POST['therapyname']; ?>" />
				<input type="hidden" name="udf5"   value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
				<input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"/>
				<input type="hidden" name="surl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$_SESSION['therapist'].'&a='.$_SESSION['action'].'&t='.$_SESSION['therapy'];?>" />   
				<input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$_SESSION['therapist'].'&a='.$_SESSION['action'].'&t='.$_SESSION['therapy'];?>" />
				<input type="hidden" name="key" value="<?php echo MERCHANT_KEY; ?>" />
				<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>	
				<input type="hidden" id="tid" name="tid" value="<?php echo $post->post_author; ?>">
				<div class="text-center"><input type="submit"   value="Confirm"  class="login_btn appointment-summary-confirm-btn"/></div>
				</div>
			</form>	
		</div>
	</div>	
</div>	
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
