<?php /* Template Name: New Coupon Payment Apage */ 
if (!is_user_logged_in()) { 
	wp_redirect('/login/');
	exit();
}
$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php'; 
$code = base64_decode($_GET['code']);

if($code == 'THRIIVE20'){
	$code = 'THR20';
	
}	

$cpncnt = $wpdb->get_var("SELECT count(*) FROM coupon_code_consultation WHERE coupon_code = 'THR50' AND uid = '".$current_user->ID ."'");
$cpncnt1 = $wpdb->get_var("SELECT count(*) FROM coupon_code_consultation WHERE coupon_code = 'THR20'  AND uid = '".$current_user->ID ."'");

if($cpncnt > 0 && $code == 'THR50'){
	wp_redirect('/');
	exit(); 
	
}elseif($cpncnt1 > 0 && $code == 'THR20'){
	wp_redirect('/');
	exit();
}	
?>
<style>
.btnpopup {
	  font-size: 13px;
    display: inline-block;
    font-weight: 600;
    border: 1px solid #27265f;
    padding: 8px 9px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 10px;
    -ms-border-radius: 20px;
    border-radius: 5px;
    margin-right: 5px;width: 25%;
}	
</style>
<?php
	if($current_user->roles[0] == 'subscriber'){
		$slug = $_GET['q'];
		$action = $_GET['a'];
		$therapy = $_GET['t'];
		$cat_name = $_GET['c'];
		/* if($cat_name == ""){
			$cat_name = "silver-readers";
		} */
		if(have_rows('therapist_data', 'option')):
			while(have_rows('therapist_data', 'option')): the_row();
				if($cat_name == get_sub_field('taxonomy')->slug){
					$ids = get_sub_field('display_ids');  
				}
			endwhile;
		endif;
		$mypost = get_page_by_path($_GET['q'], '', 'therapist');
		$post = get_post($mypost->ID);
		$idarr = explode(",",$ids);
		if(!in_array($mypost->ID,$idarr)){
		
			exit();
		}
		setup_postdata( $post ); 
		if($action == "video_call" || $action == "book_later"){
			$date_time = $_POST['selected_date'].'_'.$_POST['time'];
		} else {
			$date_time = "";
		} 
		$sessioncnt = $wpdb->get_row("SELECT session_count  FROM session_taken_per_user WHERE uid = '". $current_user->ID ."'");
		if($sessioncnt){
			$session_count = $sessioncnt->session_count;
		} else {
			$session_count = 0;
		}
		?>
    <div class="container">
        <div class="row">
			<section class="widgetblock">
                <div class="pick_plan_head text-center">
                    <p class="pick_plan_head"><i><img class="payimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/THRIIVE_Payment_Page_tick.jpg'; ?>" alt=""> </i> Select Your Plan</p>
                </div>
				<div id="remainingdiv"></div>
				<div class="monebk text-center">
                    <p>100% Money Back Guarantee</p>
                </div> 
			
			</section>
        </div>
        <div class="row">
           <div class="col-md-12 col-xs-12">
				<div class="col-md-3 col-xs-3 packmobile">
					<p class="labelhed" style="font-weight:600;">30 Mins</p>
				</div>
				<div class="col-md-3 col-xs-3 packmobile">
					<p class="labelhed" style="font-weight:600;">20 Mins</p>
				</div>
				<div class="col-md-3 col-xs-3 packmobile">
					<p class="labelhed" style="font-weight:600;">10 Mins</p>
				</div>
				<div class="col-md-3 col-xs-3 packmobile">
					<p class="labelhed" style="font-weight:600;">3 Mins</p>
				</div>
		<?php if( have_rows('coupon_prices','option') ):
			// loop through the rows of data
			$m=0;$k=0;$amountarr = $uniquetext =array();
			
			while ( have_rows('coupon_prices','option') ) : the_row();
				$temparr = array();
				if(strtoupper(get_sub_field('user_coupon_code')) == strtoupper($code) && get_sub_field('custom_therapy') == $_GET['c']){
					foreach(get_sub_field('therapy') as $t){
						array_push($temparr,get_sub_field('custom_therapy'));
						array_push($temparr, $t->slug);
					}
					//if(in_array($therapy, $temparr)){
						foreach(get_sub_field('package_details') as $call){ 
							if($call['discount_price']){
								$sessions = explode(" ",$call['no_of_sessions']);
								$plan_title = $call['title'];
								$plan_cost = $call['discount_price'];
								$coupon_code = get_field('coupon_code','option');
								if($call['is_popular']){
									echo "<form method='post' action='".PAYU_BASE_URL."'>";
								} else {
									echo "<form method='post' action='".PAYU_BASE_URL."'>";
								}                                    
								$hash_string = '';
								 
								$posted = array(); 
								$posted['key'] = MERCHANT_KEY;
								$posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20); 
								$posted['amount'] =  $call['discount_price'];
								$posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_login;
								$posted['email'] = $current_user->user_email; 
								$posted['phone'] = $current_user->mobile; 
								$posted['productinfo'] = $therapy;
								$posted['udf1'] = $call['title'];
								$no_of_sessions = explode(" ",$call['no_of_sessions']);
								if($m < 4){
										$amountarr[] = $posted['amount'];
										if($m == 0 ){
											$k=0;
										}
										if($m == 1){
											$k=1;
										}
										if($m == 2 ){
											$k=2;
										}
										if($m == 3){
											$k=3;
										}
									} else {
										if($m == 4 || $m == 8){
											$k=0;
										}
										if($m == 5 || $m == 9 ){
											$k=1;
										}
										if($m == 6 || $m == 10 ){
											$k=2;
										}
										if($m == 7 || $m == 11 ){
											$k=2;
										}
									}
								$posted['udf2'] = $posted['amount'].','.$call['no_of_sessions'].','.$call['description'].','.$amountarr[$k].','.$call['session_duration'].','.$action.','.$code.','.$cat_name.','.$session_count;
								$posted['udf3'] = $slug;
								$posted['udf4'] = $code;
								$posted['udf5'] = $date_time;
								$posted['udf6'] = $action;
								$hash = '';
								$hashVarsSeq = explode('|', HASH_SEQUENCE);
								foreach($hashVarsSeq as $hash_var) {
									$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
									$hash_string .= '|';
								}
								$hash_string .= SALT;
								$hash = strtolower(hash('sha512', $hash_string));
							
						?>
						 <input type="hidden" name="key" value="<?php echo MERCHANT_KEY; ?>" />
						<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
						<input type="hidden" name="txnid" value="<?php echo (empty($posted['txnid'])) ? '' : $posted['txnid']  ?>" /> 
						<input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
						<input type="hidden" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
						<input type="hidden" name="email"  value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
						<input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
						<input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"/>
						<input type="hidden" name="surl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&a='.$action.'&t='.$therapy;?>" />   
						<input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&a='.$action.'&t='.$therapy;?>" />
						<input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
						<input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
						<input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
						<input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
						<input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
						<input type="hidden" name="udf6" value="<?php echo (empty($posted['udf6'])) ? '' : $posted['udf6']; ?>" />
						<?php
						} 
						if($m % 4  == 0){
							$pkgname = '30 Mins';
						} else {
							if($m % 4  == 1){
								$pkgname = '20 Mins';
							}else if($m % 4  == 1){
								$pkgname = '10 Mins';
							}	else {
								$pkgname = '3 Mins';
							}
						}
						//$sessiondata = $wpdb->get_row("SELECT COALESCE(sum(remaining_session), 0) as remaining_session  FROM online_consultation WHERE uid = '". $current_user->ID ."' AND therapy_name = '".$_GET['t']."'  AND payment_status='success' AND remaining_session > 0");
						$m++;
						if($remaining_flag == 0){ ?>
							
							<div class="col-md-3 col-xs-3 packmobile <?php  if($call['is_popular']){ echo "mostpb";}?>">
								<button type='submit'  data-therapist='$slug' data-plan_title='$plan_title' data-no_of_sessions='$no_of_sessions' data-plan_cost='$plan_cost' data-action='$action' data-therapy='$therapy' id='paid_payment_button' >
									<div class="newst"><?php if($call['new']){ echo "New";}?></div>
									<a><p class="mostp"><?php  if($call['is_popular']){ echo "Most Popular";}?></p><p class="pick_plan_head_cont ind_pack_cont" style="color:#272660;font-weight:600;"><span>₹ <?php echo $call['discount_price'];?></span></p>	
									<p class="packdesc"> <?php //if($call['no_of_sessions'] > 1){ echo 'Pack of '.$sessions[0];}?></p>
									</a>
								</button>	
							</div> 
							
						<?php 	
						} 
					
							echo "</form>";
								
							} 
						//} 
					}	
				endwhile; 
			endif; ?>
                   
           </div>
         </div>
        <div class="" style="display:none;">
			<p class="textdesc">Package can be used across different Soul Therapies and Therapists within 12 Months</p>
		</div>

		<div class="textsecr">
			<img class="sspy1" src="https://beta1.thriive.in/wp-content/uploads/2021/01/ssl.jpg"/>
			<p class="textsedesc">100% Secure payment powered by SSL</p>
		</div>

		<div class="textsecr">
			<img class="sspy" src="https://beta1.thriive.in/wp-content/uploads/2021/01/start-image.jpg"/>
			<p class="textsedesc">Our sessions are highly rated by our customers</p>
		</div>

		<div class="col-md-12 col-xs-12 " style="padding:0px !important">

			<div class="col-md-4 col-xs-4 trubu">
				<p class="trubut">4.5/5</p>
				<p class="trubutdesc"><span>Google Rating</span></p>	
			</div>

			<div class="col-md-4 col-xs-4 trubu">
				<p class="trubut">80%</p>
				<p class="trubutdesc"><span>Follow up sessions</span></p>	
			</div>

			<div class="col-md-4 col-xs-4 trubu">
				<p class="trubut">1000+</p>
				<p class="trubutdesc" ><span>sessions in last week</span></p>	
			</div>

		</div>


</div>
</br>
</br>
</br>
</br>
</br>
</br>

<?php } 
?>
<script>
	

	function ashta_validate(stat){
    if(stat == 1){
        if(document.getElementsByName('m_day')[1].value == "null"){ashta_errors('m_day_desk')}else 
        if(document.getElementsByName('m_month')[1].value == "null"){ashta_errors('m_month_desk')}else
        if(document.getElementsByName('m_year')[1].value == "null"){ashta_errors('m_year_desk')}else 
        if(document.getElementsByName('m_hour')[1].value == "null"){ashta_errors('m_hour_desk')}else 
        if(document.getElementsByName('m_min')[1].value == "null"){ashta_errors('m_min_desk')}else
        if(document.getElementsByName('f_day')[1].value == "null"){ashta_errors('f_day_desk')}else
    	if(document.getElementsByName('f_month')[1].value == "null"){ashta_errors('f_month_desk')}else 
		if(document.getElementsByName('f_year')[1].value == "null"){ashta_errors('f_year_desk')}else 
		if(document.getElementsByName('f_hour')[1].value == "null"){ashta_errors('f_hour_desk')}else 
		if(document.getElementsByName('f_min')[1].value == "null"){ashta_errors('f_min_desk')}else{document.querySelectorAll('#ashta_sub')[1].dispatchEvent(new MouseEvent('click'));}
    }else if(stat == 0){
    	if(document.getElementsByName('m_day')[0].value == "null"){ashta_errors('m_day_desk');}else 
        if(document.getElementsByName('m_month')[0].value == "null"){ashta_errors('m_month_desk')}else
        if(document.getElementsByName('m_year')[0].value == "null"){ashta_errors('m_year_desk')}else 
        if(document.getElementsByName('m_hour')[0].value == "null"){ashta_errors('m_hour_desk')}else 
        if(document.getElementsByName('m_min')[0].value == "null"){ashta_errors('m_min_desk')}else
        if(document.getElementsByName('f_day')[0].value == "null"){ashta_errors('f_day_desk')}else
    	if(document.getElementsByName('f_month')[0].value == "null"){ashta_errors('f_month_desk')}else 
		if(document.getElementsByName('f_year')[0].value == "null"){ashta_errors('f_year_desk')}else 
		if(document.getElementsByName('f_hour')[0].value == "null"){ashta_errors('f_hour_desk')}else 
		if(document.getElementsByName('f_min')[0].value == "null"){ashta_errors('f_min_desk')}else{document.querySelectorAll('#ashta_sub')[0].dispatchEvent(new MouseEvent('click'));}
    }
}

	function ashta_errors(err_type){
		if(err_type=='m_day_desk'){
			document.querySelector('.m_birth_date_desk').style.color = "red";
			document.querySelector('.m_birth_date_desk').innerText = "Please enter a valid day";
			document.querySelector('#m_birth_date_mobile').style.color = "red";
			document.querySelector('#m_birth_date_mobile').innerText = "Please enter a valid day";
			setTimeout('ashta_error_restore("m_day_desk")', 3000);
		}else if(err_type=='m_month_desk'){
			document.querySelector('.m_birth_date_desk').style.color = "red";
			document.querySelector('.m_birth_date_desk').innerText = "Please enter a valid month";
			document.querySelector('#m_birth_date_mobile').style.color = "red";
			document.querySelector('#m_birth_date_mobile').innerText = "Please enter a valid month";
			setTimeout('ashta_error_restore("m_month_desk")', 3000);
		}else if(err_type=='m_year_desk'){
			document.querySelector('.m_birth_date_desk').style.color = "red";
			document.querySelector('.m_birth_date_desk').innerText = "Please enter a valid year";
			document.querySelector('#m_birth_date_mobile').style.color = "red";
			document.querySelector('#m_birth_date_mobile').innerText = "Please enter a valid Year";
			setTimeout('ashta_error_restore("m_year_desk")', 3000);
		}else if(err_type=='m_hour_desk'){
			document.querySelector('.m_birth_time_desk').style.color = "red";
			document.querySelector('.m_birth_time_desk').innerText = "Please enter a valid Hour";
			document.querySelector('.m_birth_time_mobile').style.color = "red";
			document.querySelector('.m_birth_time_mobile').innerText = "Please enter a valid Hour";
			setTimeout('ashta_error_restore("m_hour_desk")', 3000);
		}else if(err_type=='m_min_desk'){
			document.querySelector('.m_birth_time_desk').style.color = "red";
			document.querySelector('.m_birth_time_desk').innerText = "Please enter a valid Min";
			document.querySelector('.m_birth_time_mobile').style.color = "red";
			document.querySelector('.m_birth_time_mobile').innerText = "Please enter a valid Min";
			setTimeout('ashta_error_restore("m_hour_desk")', 3000);
		}else if(err_type=='f_day_desk'){
			document.querySelector('.f_birth_date_desk').style.color = "red";
			document.querySelector('.f_birth_date_desk').innerText = "Please enter a valid date";
			document.querySelector('#f_birth_date_mobile').style.color = "red";
			document.querySelector('#f_birth_date_mobile').innerText = "Please enter a valid date";
			setTimeout('ashta_error_restore("f_day_desk")', 3000);
		}else if(err_type=='f_month_desk'){
			document.querySelector('.f_birth_date_desk').style.color = "red";
			document.querySelector('.f_birth_date_desk').innerText = "Please enter a valid month";
			document.querySelector('#f_birth_date_mobile').style.color = "red";
			document.querySelector('#f_birth_date_mobile').innerText = "Please enter a valid month";
			setTimeout('ashta_error_restore("f_month_desk")', 3000);
		}else if(err_type=='f_year_desk'){
			document.querySelector('.f_birth_date_desk').style.color = "red";
			document.querySelector('.f_birth_date_desk').innerText = "Please enter a valid Year";
			document.querySelector('#f_birth_date_mobile').style.color = "red";
			document.querySelector('#f_birth_date_mobile').innerText = "Please enter a valid Year";
			setTimeout('ashta_error_restore("f_year_desk")', 3000);
		}else if(err_type=='f_hour_desk'){
			document.querySelector('.f_birth_time_desk').style.color = "red";
			document.querySelector('.f_birth_time_desk').innerText = "Please enter a valid Hour";
			document.querySelector('.f_birth_time_mobile').style.color = "red";
			document.querySelector('.f_birth_time_mobile').innerText = "Please enter a valid Hour";
			setTimeout('ashta_error_restore("f_hour_desk")', 3000);
		}else if(err_type=='f_min_desk'){
			document.querySelector('.f_birth_time_desk').style.color = "red";
			document.querySelector('.f_birth_time_desk').innerText = "Please enter a valid Min";
			document.querySelector('.f_birth_time_mobile').style.color = "red";
			document.querySelector('.f_birth_time_mobile').innerText = "Please enter a valid Min";
			setTimeout('ashta_error_restore("f_hour_desk")', 3000);
		}else if(err_type=='m_day_mobile'){
			document.querySelector('.m_birth_date_mobile').style.color = "red";
			document.querySelector('.m_birth_date_mobile').innerText = "Please enter a valid date";
			setTimeout('ashta_error_restore("f_hour_desk")', 3000);
		}

	}
	function ashta_error_restore(err_type){
		if(err_type == 'm_day_desk' || err_type == 'm_month_desk' || err_type == 'm_year_desk'){
			document.querySelector('.m_birth_date_desk').style.color = "black";
			document.querySelector('.m_birth_date_desk').innerText = "Birth Date";
			document.querySelector('#m_birth_date_mobile').style.color = "black";
			document.querySelector('#m_birth_date_mobile').innerText = "Birth Date";			
		}else if(err_type == 'm_hour_desk' || err_type == 'm_min_desk'){
			document.querySelector('.m_birth_time_desk').style.color = "black";
			document.querySelector('.m_birth_time_desk').innerText = "Birth Time";
			document.querySelector('.m_birth_time_mobile').style.color = "black";
			document.querySelector('.m_birth_time_mobile').innerText = "Birth Time";
		}else if(err_type == 'f_day_desk' || err_type == 'f_month_desk' || err_type == 'f_year_desk'){
			document.querySelector('.f_birth_date_desk').style.color = "black";
			document.querySelector('.f_birth_date_desk').innerText = "Birth Date";
			document.querySelector('#f_birth_date_mobile').style.color = "black";
			document.querySelector('#f_birth_date_mobile').innerText = "Birth Date";			
		}else if(err_type == 'f_hour_desk' || err_type == 'f_min_desk'){
			document.querySelector('.f_birth_time_desk').style.color = "black";
			document.querySelector('.f_birth_time_desk').innerText = "Birth Time";
			document.querySelector('.f_birth_time_mobile').style.color = "black";
			document.querySelector('.f_birth_time_mobile').innerText = "Birth Time";				
		}
	}




</script>
<?php 

include_once get_stylesheet_directory().'/new-footer.php'; ?>