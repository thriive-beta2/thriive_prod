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
				 	<?php /* $codelen = strlen($current_user->countryCode); */ ?>
<!-- 				 	<input data-parsley-required="true" type="tel" data-parsley-required-message="Mobile is required." class="form-control international-number" id="mobile-number" pattern="[1-9]{1}[0-9]{9}" value="<?php if($current_user->mobile){ echo '+' . $current_user->countryCode . substr($current_user->mobile, $codelen); } ?>"> -->
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
			  	<?php $login_via = get_user_meta(wp_get_current_user()->ID,'thechamp_provider', true);
			  	if(!empty($lead_form_id) && !empty($login_via))
					{
						?>
						<input type="hidden" name="lead_form_id" id="lead_form_id" value="<?php echo $lead_form_id; ?>">
						<!-- <input type="hidden" name="destination_url" value="<?php echo get_field('destination_url'); ?>"> -->
						<input type="hidden" name="submission_email" id="submission_email" value="<?php echo htmlspecialchars(get_field('submission_email')); ?>">
						<?php
					} ?>
			  	<button type="button" class="btn d-inline btn-primary" id="re_send_otp">RESEND OTP</button>
	            <button type="submit" class="btn d-inline btn-primary" id="verify_otp" data-redirect="<?php echo !empty(get_field('destination_url')) ? get_field('destination_url') : get_permalink(548); ?>">NEXT</button>
	         </div>
         </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="account_in_review_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
         <form data-parsley-validate class="form-element-section"  id="review_account">
	         <div class="row section col-sm-12 col-12 mx-auto p-0">
		        <div class="form-group col-12">
				 	<label >Your account has been created successfully. <br>You will be informed via email/Sms once the account has been verified by Thriive Account Manager.</label>
					</div><a href="<?php echo wp_logout_url( '/login/' ); ?>" class=" mx-auto btn btn-primary">  &nbsp;&nbsp;&nbsp; OK  &nbsp;&nbsp;&nbsp;  </a>
	         </div>
	          
         </form>                  
        </div>
      </div>
    </div>
  </div>