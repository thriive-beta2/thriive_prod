<?php
	$current_user = wp_get_current_user();
	$address = json_decode($current_user->address);
	$countries = $wpdb->get_results("SELECT * FROM countries ORDER BY name ASC");
?>
<div class="">
			<div class="text-center section i_w_p col-12 mx-sm-auto p-0">
			<div class="col-12 mt-3 text-center">
<!-- 			<a href="" class="btn btn-primary m-3">SIGN UP NOW</a> -->
				<?php 
				if(get_query_var("call_consult")){
					$login_url = add_query_arg('flg', '1', get_permalink(419));
				}else{
					$login_url = get_permalink(419);
				}
				?>
			<!--	<h3 class="w-100 signup-text-top">Already Registered? <a href="<?php// echo $login_url; ?>" class="">Click here</a> to LOGIN</h3>-->
				
			</div>	
				
			<h5 class="w-100">Sign Up Now</h5>
			<p class="text-center model_header_text mb-2">Please fill in the details and get started</p>
				
			</div>
		</div>
		<div class="row section i_w_p <?php echo $text_left; ?> mx-auto">
			<form data-parsley-validate=""  class="form-element-section" action="" method="post">
				<?php
					if(isset($_GET['event_id']) && isset($_GET['query']))
					{
						?>
						<input type="hidden" name="txtEventId" value="<?php echo $_GET['event_id']; ?>">
						<input type="hidden" name="txtQuery" value="<?php echo $_GET['query']; ?>">
						<?php
					} 
					elseif(!empty($lead_form_id))
					{
						?>
						<input type="hidden" name="lead_form_id" value="<?php echo $lead_form_id; ?>">
						<!-- <input type="hidden" name="destination_url" value="<?php echo get_field('destination_url'); ?>"> -->
						<input type="hidden" name="submission_email" value="<?php echo htmlspecialchars(get_field('submission_email')); ?>">
						<?php
					}
				?>
			  <div class="form-group">
			   <!-- <label for="firstname">Name *</label>-->
			    <input data-parsley-required="true" data-parsley-required-message="First Name is required." data-parsley-pattern="/^[a-zA-Z ]*$/" data-parsley-pattern-message="Valid characters: Alphabets and space." type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your Name" style="border-color:#ced4da !important">
			  </div>
			  
			  <div class="form-group">
			    <!--<label for="email">Email *</label>-->
			    <input data-parsley-type="email" data-parsley-required-message="Email is required."  data-parsley-required="true" type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" style="border-color:#ced4da !important">
			  </div>
			  
			 <!-- <div class="form-group"> -->
			  <!--  <label for="pwd">Password </label> -->
			   <!-- <div class="input-group"> -->
			        <!-- <input data-parsley-required="true" type="password" data-parsley-errors-container="#pwd-holder" data-parsley-required-message="Password is required."  data-parsley-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/" data-parsley-pattern-message="<div>Password must contain at least:</div><ol><li>One character</li><li>One number</li><li>One special character</li><li>Six characters in length</li></ol>" class="form-control" id="pwd" name="password"> -->
			     <!--   <input data-parsley-required="true" type="password" data-parsley-errors-container="#pwd-holder" data-parsley-required-message="" class="form-control" id="pwd" name="password">
			        <span class="input-group-addon togglePassword" style="cursor: pointer;"><i class="fa fa-eye-slash"></i></span> -- >
		      	</div>		
		      	<div id="pwd-holder"></div>	    
			<!--  </div> -->
			  <!-- <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="<?php // echo RECAPTCHA_SITE_KEY ?>" data-callback="recaptchaCallback"></div>
              </div>
              <input id="reCaptchaField" data-parsley-errors-container="#errorContainer" data-parsley-required="true" value="" type="text" style="display:none;">
                  <span id='errorContainer'></span>
              <br/> -->
              
			  <button type="submit" class="btn btn-primary" name="signup_seeker_submit" id="signup_submit">Submit</button>
			</form>
		</div>
		<script src='https://www.google.com/recaptcha/api.js' async defer /></script>