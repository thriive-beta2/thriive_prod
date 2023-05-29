<?php /* Template Name: Seeker New Register  */ ?>
<?php session_start();  ?>
<?php 
$_SESSION['chat_page'] = $_SERVER["HTTP_REFERER"];
get_header();
if (is_user_logged_in()) { 
	$current_user = wp_get_current_user();
	if($current_user->roles[0] == 'therapist')
	{
		wp_redirect('/therapist-account-dashboard/');
		exit();
	}
	if(($current_user->is_mobile_verify)==1)
	{
		wp_redirect(site_url());
		//exit();
	}
	$user_meta = get_user_meta($current_user->ID);
} 
if(isset($_GET['uid'])){
    $current_user = get_userdata($_GET['uid']);
    $user_meta = get_user_meta($current_user->ID);
}
?>
<section class="login_">
    <div class="container">
        <div class="row">
            <div class="tabs_ col-md-3"></div>
            <div class="tabs_ col-md-6">
                <a href="<?php echo get_permalink( get_page_by_path( 'seeker-regsiter-landing-page' ) );?>" class="tablink tselected">Register</a>
                <a href="<?php echo get_permalink( get_page_by_path( 'login' ) );?>" class="tablink" style="float:right">Login</a>
            </div>
            <div class="tabs_ col-md-3"></div>
        </div>
    </div>
</section>
<section class="">
	<div class="container">
		<div class="row">
		    <div class="col-md-3"></div>
		    <div class="col-md-6 col-xs-12">
		        <div class="tabcontent">
		            <div class="row input_level" style="text-align:center">
		                <div class="col-md-12 col-xs-12 text-right mr-2" style="padding-right: 5%">
		                    <h6>Are You Therapist ? <a href="<?php echo get_permalink( get_page_by_path( 'therapist-landing-page')).'#sing_up_'; ?>" class="register_as_therapist"> Register here </a></h6>
		                </div>
		            </div>
		            <h5 class="text-center input_level">Sign Up With</h5>
		            <!-- <div class="row" style="text-align:center">
		            	<?php echo do_shortcode('[TheChamp-Login]') ?>
		                <div class="col-md-6 col-xs-6 input_level text-right">
		                    <a href="" class="fb btn facebook-link-wrapper model_login_with_facebook">
		                        <i class="fa fa-facebook bg_round_facebook"></i>
		                        <span class="hidden-xs">FACEBOOK</span><span class="hidden-lg hidden-md hidden-sm">Facebook</span>
		                    </a>
		                </div>
		                <div class="col-md-6 col-xs-6 input_level text-left">
		                    <a href="" class="google-link-wrapper social-btn-wrapper model_login_with_google">
		                        <i class=""><img width="16px" height="16px" src="<?php echo get_site_url().'/wp-content/uploads/google_icon.png';?>" alt=""></i>
		                        <span class="hidden-xs">GOOGLE</span>
		                        <span class="hidden-lg hidden-md hidden-sm">Google</span>
		                    </a>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-2 hidden-xs" style="margin-right:4%">
		                </div>
		                <div class="col-md-3 col-xs-5" style="padding:0px">
		                </div>
		                <div class="col-md-1 col-xs-2" style="padding:0px">
		                    <h5 style="text-align:center">Or</h5>
		                </div>
		                <div class="col-md-3 col-xs-5" style="padding:0px">
		                </div>
		                <div class="col-md-2 hidden-xs">
		                </div>
		            </div> -->
		            <div style="clear:both"></div>

		            <div class="container pd_xs_0">
		                <div class="row">
		                    <form data-parsley-validate =""  class="form-element-section" action="" method="post" id="seeker_submit">
		                    	<div id="error_msg" class="error-msg form-error"></div>
			                   	<?php if(isset($_GET['event_id']) && isset($_GET['query'])) {?>
									<input type="hidden" name="txtEventId" value="<?php echo $_GET['event_id']; ?>">
									<input type="hidden" name="txtQuery" value="<?php echo $_GET['query']; ?>">
									<?php
								} elseif(!empty($lead_form_id)) { ?>
									<input type="hidden" name="lead_form_id" value="<?php echo $lead_form_id; ?>">
									<input type="hidden" name="submission_email" value="<?php echo htmlspecialchars(get_field('submission_email')); ?>">
								<?php } ?>
		                        <div class="col-md-4 input_level">
		                            <h5>Full Name *</h5>
		                        </div>
		                        <div class="col-md-8 input_level">
		                            <input data-parsley-required="true" data-parsley-required-message="Full Name is required." data-parsley-pattern="/^[a-zA-Z ]*$/" data-parsley-pattern-message="Valid characters: Alphabets and space." parsley-type="alphanum" class="form-control" id="firstname" name="firstname" autocomplete="off" placeholder="Enter your fullname" <?php if($current_user->ID != 0){ ?>value="<?php echo $current_user->user_login; ?>" disabled="disabled" <?php } ?>>
		                        </div>
		                        <div class="col-md-4 input_level">
		                            <h5>Email *</h5>
		                        </div>
		                        <div class="col-md-8 input_level">
		                            <input data-parsley-type="email" data-parsley-required-message="Email is required."  data-parsley-required="true" type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Enter your email"<?php if($current_user->ID != 0){ ?>value="<?php echo $current_user->user_email; ?>" disabled="disabled" <?php } ?>>
		                        </div>
		                        <div class="col-md-4 input_level">
		                            <h5>Password *</h5>
		                        </div>
		                        <div class="col-md-8 input_level">
		                            <div class="input-group">
									    <input data-parsley-required="true" type="password" data-parsley-required-message="Password is required." data-parsley-errors-container="#pwd-holder" class="form-control" id="pwd" name="password" autocomplete="off" placeholder="Enter your password">
									</div>
									<div id="pwd-holder"></div>	
		                        </div>
		                        <?php if(!isset($current_user->thechamp_provider)) {?>
		                        <div class="col-md-4 input_level">
		                            <h5>Mobile Number *</h5>
		                        </div>
		                        <div class="col-md-8 input_level">
		                            <input data-parsley-required="true" type="text" parsley-type="number" data-parsley-required-message="Mobile is required." class="form-control international-number" id="mobile-number" autocomplete="off" placeholder="Enter your mobile" name="mobile" <?php if(!empty($user_meta['mobile'][0])){ ?>value="<?php echo $user_meta['mobile'][0]; ?>" disabled="disabled" <?php } ?>>
		                        </div>
		                        <div id="otp_field" style="display: none;">
			                        <div class="col-md-4 input_level">
			                            <h5>OTP *</h5>
			                        </div>
			                        <div class="col-md-8 input_level">
			                            <input parsley-type="number" data-parsley-required-message="OTP is required." data-parsley-maxwords="4" class="form-control" id="mobile-otp" name="mobile_otp" placeholder="Enter otp">
			                        </div>
			                    </div>
		                    <?php } ?>
		                        <div class="col-md-12 input_level  text-center">
		                        	<input type="hidden" id="event_name">
		                            <span id="ss_btn"><button class="login_btn" type="submit" name="seeker_submit" id="seeker_submit">Get Started</button></span>
		                            <span id="vs_btn" style="display: none;"><input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user->ID; ?>">
		                            <button class="login_btn" type="submit" name="verify_mobile" id="verify_mobile">Register</button></span>
		                        </div>
		                        <p class="disclamer text-right" style="margin-right: 2%;">By signing up, I agree to <a href="https://www.thriive.in/wp-content/themes/thriive/assets/pdf/general-terms-of-use.pdf" target="_blank" style="color: #4f0475; font-weight: 500;">T&amp;C</a></p>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-3"></div>
		</div>
	</div>
</section>
<div class="modal fade" id="mobile_verfication_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      	<div class="modal-content">
	        <!-- Modal body -->
	        <div class="modal-body">
		        <div class="error-msg form-error" id="mobileExist"></div>
	         	<form data-parsley-validate class="form-element-section"  id="form_send_otp">
		         	<div class="row section col-sm-12 col-12 mx-auto p-0">
			        	<div class="form-group col-12">
					 		<label for="mobile-number">Enter Mobile Number</label>
							<input data-parsley-required="true" type="tel" data-parsley-required-message="Mobile is required." class="form-control international-number" id="mobile-number" value="<?php if($current_user->mobile){ echo '+' . $current_user->countryCode . $current_user->mobile; } ?>">
				  		</div>
				  		<button type="submit" class="btn d-inline btn-primary" id="send_otp1">SEND OTP</button>
		         	</div>
	         	</form>                  
	         	<form data-parsley-validate  class="form-element-section" id="mobile_verification">
		         	<div class="row section col-sm-12 col-12 mx-auto p-0 d-none" id="div_verify_otp">
				  		<div class="form-group col-12 ">
					 		<label for="mobile-otp">Enter OTP</label>
					 		<input data-parsley-required="true" type="text" data-parsley-required-message="OTP is required." data-parsley-maxwords="4" class="form-control" id="mobile-otp" id="mobile-otp">
				  		</div>
				  		<button type="button" class="btn d-inline btn-primary" id="re_send_otp">RESEND OTP</button>
		            	<button type="submit" class="btn d-inline btn-primary" id="verify_otp" data-redirect="<?php echo get_permalink(548); ?>">NEXT</button>
		         	</div>
	         	</form>
	        </div>
      	</div>
    </div>
</div>
<?php if (is_user_logged_in()) { 
	if(($current_user->is_mobile_verify)==0 && isset($current_user->thechamp_provider)) { ?>
		<script type="text/javascript">
			$("#mobile_verfication_modal").modal();
		</script>
	<?php 	}
}
//get_footer(); 
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
