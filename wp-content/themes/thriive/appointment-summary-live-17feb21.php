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
	
	header("Location: ".site_url()."/book-tarot-reading-by-appointment");
}
$posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_email;
$posted['email'] = $current_user->user_email; 
$posted['phone'] = $current_user->mobile; 


$posted['udf5'] =  $_POST['selected_date'].','.$_POST['time'].','.$_POST['a'];
$_SESSION['appointmentdate'] = $_POST['selected_date'].','.$_POST['time'];
$_SESSION['action'] = $_POST['actionvia'];
$_SESSION['therapy'] = $_POST['therapyname'];
$_SESSION['therapist'] = $_POST['therapistname'];
$posted['productinfo'] = $_SESSION['therapy'];
$mypost = get_page_by_path($_POST['therapistname'], '', 'therapist');

$post = get_post($mypost->ID);
$mypost = get_page_by_path($_SESSION['therapist'], '', 'therapist');
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
<style>

h2.summtxt {
    font-size: 20px;
    text-align: center;
    font-weight: 600;
}
p.atherapisttxt {
	text-align:center;
    padding: 0px 15px;
}
p.atherapytxt {
	text-align:center;
    padding: 0px 15px;
}
p.sessiondonetxt {
	text-align:center;
    padding: 0px 15px;
}
p.apaytxt {
	text-align:center;
    padding: 0px 15px;
}
.footerwrap {
    bottom: 0;
    left: 0;
    right: 0;
    position: fixed;
}

@media (min-width: 320px) and (max-width: 640px) {
h2.summtxt {
    font-size: 20px;
    text-align: center;
    font-weight: 600;
}
p.atherapisttxt {
	text-align: left !important;
    padding: 0px 15px;
}
p.atherapytxt {
	text-align: left !important;
    padding: 0px 15px;
}
p.sessiondonetxt {
	text-align: left !important;
    padding: 0px 15px;
}
p.apaytxt {
	text-align: left !important;
    padding: 0px 15px;
}
}

</style>
<br/>
<h2 class="summtxt">Appointment Summary</h2><br/>
<p class="atherapisttxt">Therapist Name : <b><?php echo $post->post_title; ?></b></p>
<p class="atherapytxt">Therapy Name : <?php echo $term->name; ?></p>
<p class="sessiondonetxt">Session Date : <b><?php echo date("dS M Y, h:i a",strtotime($_SESSION['appointmentdate'])); ?></b></p>
<p class="apaytxt">Fees: <b><?php echo '&#8377; '.$_SESSION['amount'];?></b>
<div class="container">
<form method='post' action='<?php echo PAYU_BASE_URL;?>'>
	<div style="margin-bottom: 10%;">
		<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		<input type="hidden" name="txnid" value="<?php echo (empty($posted['txnid'])) ? '' : $posted['txnid']  ?>" /> 
		<input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
		<input type="hidden" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
		<input type="hidden" name="email"  value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
		<input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
		<input type="hidden" name="udf5"   value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
		<input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"/>
		<input type="hidden" name="surl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$_SESSION['therapist'].'&a='.$_SESSION['action'].'&t='.$_SESSION['therapy'];?>" />   
		<input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$_SESSION['therapist'].'&a='.$_SESSION['action'].'&t='.$_SESSION['therapy'];?>" />
		<input type="hidden" name="key" value="<?php echo MERCHANT_KEY; ?>" />
		<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>	
		<input type="hidden" id="tid" name="tid" value="<?php echo $post->post_author; ?>">
		<div class="text-center"><input type="submit"   value="Confirm"  class="login_btn"/></div>
		</div>
	</form>	
</div>	
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
