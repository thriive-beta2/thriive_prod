<?php
	$current_user = wp_get_current_user();
	$address = json_decode($current_user->address);
	$countries = $wpdb->get_results("SELECT * FROM countries ORDER BY name ASC");
?>
<div class="row">
    <div class="col-md-3 col-xs-12"></div>
    <div class="col-sm-6 col-xs-12 mx-sm-auto p-0 text-center">
        <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/logo.png" width="60" height="60" alt="Thriive">
        <h5 class="w-100 mt-2">Sign Up Now</h5>
        <p class="text-center model_header_text mb-2">Please fill in the details and get started</p>
        <!--        <div class="col-md-12 mt-3">Or</div>-->
    <div id="error_msg_div" class="error-msg form-error error_msg_div"></div>
        <div class="" style="padding:0px 5px">
            <form data-parsley-validate id="seeker_reg_form_modal" class="form-element-section w-100" action="" method="post">
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
                    <input data-parsley-required="true" style="border-color:#ced4da !important" data-parsley-required-message="Full Name is required." data-parsley-pattern="/^[a-zA-Z ]*$/" data-parsley-pattern-message="Valid characters: Alphabets and space." parsley-type="alphanum" type="text" class="form-control model_form_input" id="firstname" name="firstname" placeholder="Full Name*">
                </div>
                <div class="form-group">
                    <input data-parsley-type="email" style="border-color:#ced4da !important" data-parsley-required-message="Email is required." data-parsley-required="true" type="email" class="form-control model_form_input" id="email" name="email" placeholder="Enter your email*">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input data-parsley-required="true" type="password" data-parsley-errors-container="#pwd-holder" data-parsley-required-message="Password is required." class="form-control model_form_input" style="border-color:#ced4da !important" id="pwd" name="password" style="width:50% !important;" placeholder="Password*">
                        <!-- <span class="input-group-addon togglePassword" style="cursor: pointer;"><i class="fa fa-eye-slash"></i></span> -->
                    </div>
                    <div id="pwd-holder"></div>
                </div>
                <input type="hidden" id="button_name" value="">
                <button type="submit" class="btn btn-primary signup_submit_modal" name="signup_seeker_submit" id="signup_submit_modal">Get Started</button>
            </form>
            <div class="col-md-12">
                <p class="text-center text_t_c mt-3 mb-2" style="margin:0px;">---------Or Sign Up With----------</p>
                <?php echo do_shortcode('[TheChamp-Login]') ?>
                <div class="text-center" style="border-spacing: 10px;">
                    <a href="" class="facebook-link-wrapper social-btn-wrapper model_login_with_facebook">
                        <i class="fa fa-facebook bg_round_facebook"></i>
                        <span class="hidden-xs">FACEBOOK</span><span class="hidden-lg hidden-md hidden-sm">Facebook</span>
                    </a>
                    <a href="" class="google-link-wrapper social-btn-wrapper model_login_with_google">
                        <i class=""><img width="16px" height="16px" src="<?php echo get_site_url().'/wp-content/uploads/google_icon.png';?>" alt=""></i>
                        <span class="hidden-xs">GOOGLE</span>
                        <span class="hidden-lg hidden-md hidden-sm">Google</span>
                    </a>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <p class="text-center text_t_c mt-1">By continuing you agree to the <a target="_blank" href="https://www.thriive.in/wp-content/themes/thriive/assets/pdf/general-terms-of-use.pdf"><u> terms of use</u></a></p><br>
        <div class="col-md-12 text-center">
            <?php 
		if(get_query_var("call_consult")){
			$login_url = add_query_arg('flg', '1', get_permalink(419));
		}else{
			$login_url = get_permalink(419);
		}
		?>
            <p class="w-100 disclamer footer_login">Already have an account? <a href="<?php echo $login_url; ?>" class=""> Log In</a></p>
        </div>
    </div>
    <div class="col-md-3 col-xs-12"></div>
</div>

<style>
    
</style>