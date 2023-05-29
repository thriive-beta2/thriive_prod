<?php /* Template Name: New sex therapy payment page */ 
 
include_once get_stylesheet_directory().'/new-header.php'; 
global $wp;

$current_user = wp_get_current_user();
if(have_rows('therapist_data', 'option')):
	while(have_rows('therapist_data', 'option')): the_row();
		if($_GET['c'] ==  get_sub_field('taxonomy')->slug){
			$ids = get_sub_field('display_ids');  
		}
	endwhile;
endif;

$idarr = explode(",",$ids);
$idarr[] = 77786;
$idarr[] = 30227; 

$mypost = get_page_by_path($_GET['q'], '', 'therapist');

if(!in_array($mypost->ID,$idarr)){
	
	exit();
}
if($current_user->roles[0] == 'subscriber'){
  //echo $_POST['selected_date'].'_'.$_POST['time'];
    $slug = $_GET['q'];
    $action = $_GET['a'];
    $therapy = $_GET['t'];
    $cat_name = $_GET['c'];
	
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
<div class="container">
	 
		<div class="pick_plan_head text-center">
			<p class="pick_plan_head"><i><img class="payimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/THRIIVE_Payment_Page_tick.jpg'; ?>" alt=""> </i> Select Your Plan</p>
		</div>
		<div id="remainingdiv"></div>
	<?php 	
	$sessiondata = $wpdb->get_row("SELECT remaining_session,session_duration,category_name,no_of_sssesions  FROM online_consultation WHERE uid = '". $current_user->ID ."'  AND category_name = '".$_GET['c']."' AND payment_status='success'");
	?>			
				
	<div class="row">
		
		<div class="col-md-12 col-xs-12">
			<?php 
		$html = "";
		if( have_rows('package_details','option') ):
			// loop through the rows of data
			$m=0;$k=0;$amountarr = $uniquetext =array();
			while ( have_rows('package_details','option') ) : the_row();
				$temparr = array();
				
				array_push($temparr,get_sub_field('custom_therapy'));
				foreach(get_sub_field('therapy') as $t){
					array_push($temparr, $t->slug);
				}
				if(in_array($cat_name, $temparr)){		
				foreach(get_sub_field('call_packages') as $call){ 
			
					if($call['discount_price']){
						
						$sessions = explode(" ",$call['no_of_sessions']);
						$plan_title = $call['title'];
						$plan_cost = $call['discount_price'];
						//$no_of_sessions = $call['no_of_sessions'];
						if($call['is_popular']){
							echo "<form method='post' action='".PAYU_BASE_URL."'>";
						} else {
							echo "<form method='post' action='".PAYU_BASE_URL."'>";
						}                                    
						$hash_string = '';
						$posted = array();
						$posted['key'] = MERCHANT_KEY;
						$posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20); 
						if($current_user->ID == 72123 || $current_user->ID == 29239 || $current_user->ID == 14704){ 
							$posted['amount'] = 1;
						} else {
							$posted['amount'] = $call['discount_price'];
						}	
						//$posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_email;
						$posted['firstname'] = $current_user->user_login;
						$posted['email'] = $current_user->user_email; 
						$posted['phone'] = $current_user->mobile; 
						$posted['productinfo'] = $therapy;
						$posted['udf1'] = $cat_name;
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
								$k=3;
							}
						}
						
						
						/* if($no_of_sessions[0] > 1){
							$posted['udf2'] = $call['no_of_sessions'];
						} else { */
							$posted['udf2'] = $call['no_of_sessions'];
						//}
						
					
						$posted['udf3'] = $slug;
						$posted['udf5'] = $_POST['appointment_date'];
						
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
						<input type="hidden" name="surl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&c='.$cat_name.'&t='.$therapy;?>" />   
						<input type="hidden" name="furl" value="<?php echo FAILURE_PAYU_RETURN_URL;?>" />
						<input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
						<input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
						<input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
						
						<input type="hidden" name="udf4" class="selected_coupon_code" value="" /> 
						<input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
			<?php 
					} 
					 ?>
						 
						<div class="col-md-4 col-xs-4 packmobile <?php  if($call['is_popular']){ echo "mostpb";}?>">
							<button type='submit'  data-therapist='$slug' data-plan_title='$plan_title' data-no_of_sessions='$no_of_sessions' data-plan_cost='$plan_cost' data-action='$action' data-therapy='$therapy' id='paid_payment_button' >
								<div class="newst"><?php if($call['new']){ echo "New";}?></div>
								<a><p class="mostp"><?php  if($call['is_popular']){ echo "Most Popular";}?></p><p class="pick_plan_head_cont ind_pack_cont" style="color:#272660;font-weight:600;margin-top:16px;"><p style="font-weight:bold;">₹ <?php echo $call['discount_price'];?></p><p class="packdesc"><?php echo $call['no_of_sessions']." ";?></p></p>	
								
								</a>
							</button>	
						</div> 
					 	
					<?php 	
					echo "</form>";		
				} 
				}
				endwhile; 
			
			endif;
			
			?>
			
				
			
		</div>
	</div>
	
	<div class="">
		<p class="textdesc">Therapist can be changed after each session.</p>
	</div>
	
	<div class="row">
    
          <?php if($payment_type == ""){ ?>
            <section class="widgetblock">
               
				
                <?php 
				$k=0;
				if( have_rows('coupon_prices','option') ):
                    // loop through the rows of data
                    while ( have_rows('coupon_prices','option') ) : the_row();
                        $temparr = array();
                        foreach(get_sub_field('therapy') as $t){
                            array_push($temparr,get_sub_field('custom_therapy'));
                            array_push($temparr, $t->slug);
                        }
						//print_r($temparr);
                        if($k == 0){ ?>
							
                             <p id="coupon_msg" style="color: red;" class="text-center"></p>
                        <?php $k++;
						} 
                    endwhile; 
                endif; ?> 
            </section>
          <?php } ?>
        </div>
	<div class="textsecr">
			<div class="monebk text-center">
				<p>100% Money Back Guarantee</p>
			</div> 
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
<?php 
} ?>
<style>
.footerwrap {
	position : absolute;	
	
}	

</style>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>