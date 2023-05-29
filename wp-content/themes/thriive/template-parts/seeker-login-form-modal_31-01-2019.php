<?php
	$current_user = wp_get_current_user();
	$address = json_decode($current_user->address);
	$countries = $wpdb->get_results("SELECT * FROM countries ORDER BY name ASC");
?>
<div class="col-sm-7 col-12 mx-sm-auto p-0 text-center mt-4">
	<h5 class="w-100">Sign Up With</h5>
	<div class="col-12 mt-3">
		<?php echo do_shortcode('[TheChamp-Login]') ?>
		<div class="text-center" style="border-spacing: 10px;">
			<a href="" class="facebook-link-wrapper social-btn-wrapper">
				<i class="fa fa-facebook"></i>
				<span>FACEBOOK</span>
			</a>
			<a href="" class="google-link-wrapper social-btn-wrapper">
				<i class="fa fa-google-plus"></i>
				<span>GOOGLE</span>
			</a>
		</div>
	</div>
	<div class="col-12 mt-3">Or</div>	
</div>
<div id="error_msg_div" class="error-msg form-error error_msg_div"></div>
<div class="row section <?php echo $column . ' ' . $text_left; ?> mx-auto">
	<form data-parsley-validate id="seeker_reg_form_modal" class="form-element-section" action="" method="post">
		<?php if(isset($_GET['event_id']) && isset($_GET['query']))
			{ ?>
				<input type="hidden" name="txtEventId" value="<?php echo $_GET['event_id']; ?>">
				<input type="hidden" name="txtQuery" value="<?php echo $_GET['query']; ?>">
			<?php }
			if(isset($_GET['therapy']))
			{ ?>
				<input type="hidden" name="lead_source" value="<?php echo $_GET['therapy']; ?>">
			<?php } ?>
			<div class="form-group">
			    <input data-parsley-required="true" data-parsley-required-message="Full Name is required." data-parsley-pattern="/^[a-zA-Z ]*$/" data-parsley-pattern-message="Valid characters: Alphabets and space." type="text" class="form-control" id="firstname" name="firstname" placeholder="Full Name">
			</div>
			<div class="form-group">
			    <input data-parsley-type="email" data-parsley-required-message="Email is required."  data-parsley-required="true" type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
			<div class="form-group">
			    <div class="input-group">
			        <input data-parsley-required="true" type="password" data-parsley-errors-container="#pwd-holder" data-parsley-required-message="Password is required."  data-parsley-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/" data-parsley-pattern-message="<div>Password must contain at least:</div><ol><li>One character</li><li>One number</li><li>One special character</li><li>Six characters in length</li></ol>" class="form-control" id="pwd" name="password" style="width:50% !important;" placeholder="Password">
			        <!-- <span class="input-group-addon togglePassword" style="cursor: pointer;"><i class="fa fa-eye-slash"></i></span> -->
		      	</div>		
		    	<div id="pwd-holder"></div>
		    </div>
		    <input type="hidden" id="button_name" value="">
		<button type="submit" class="btn btn-primary signup_submit_modal" name="signup_seeker_submit" id="signup_submit_modal">Submit</button>
	</form>
	<div class="col-12 text-right">
		<?php 
		if(get_query_var("call_consult")){
			$login_url = add_query_arg('flg', '1', get_permalink(419));
		}else{
			$login_url = get_permalink(419);
		}
		?>
		<p class="w-100 signup-text-top disclamer">Already have an account? <a href="<?php echo $login_url; ?>" class="">Log In</a></p>
	</div>
</div>