<?php $current_user = wp_get_current_user(); ?>
<div class="row">
    <div class="col-md-3 col-xs-12"></div>
    <div class="col-sm-6 col-xs-12 mx-sm-auto p-0 text-center" id="event_reg_hide">
	<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/logo_thriive.svg" width="100" height="100" alt="Thriive">
        <h2 class="w-100 mt-2 sigup">Sign Up Now</h2>
        <p class="text-center model_header_text mb-2">Please fill in the details and get started</p>
        <div class="" style="padding:0px 5px">
            <form data-parsley-validate id="event_call_seeker_signup_btn" class="form-element-section w-100" action="" method="post">
                <input type="hidden" name="lead_source" id="lead_source">
               <div class="form-group">
                    <input style="border-color: #ced4da !important;" data-parsley-required-message="Email is required." data-parsley-required="true" type="email" class="form-control" id="email-id" name="email-id" placeholder="Enter your email*" autocomplete="off">
                </div>
                <div class="form-group">
                    <input data-parsley-required="true" type="text" parsley-type="number" style="border-color:#ced4da !important"data-parsley-required-message="Mobile is required" class="form-control model_form_input international-number" id="mobile-number" autocomplete="off" placeholder="Enter your mobile" name="mobile" autocomplete="off">
                    <div id="mobile_error_msg" style="color:#e03d2a;"></div>
                </div>
                <button type="submit" class="btn btn-primary" name="call_seeker_signup_btn" id="event_call_seeker_signup_btn">Get Started</button>
            </form>
            <div style="clear:both"></div>
        </div>
        <p class="text-center text_t_c mt-1">By continuing you agree to the <a target="_blank" href="https://www.thriive.in/wp-content/themes/thriive/assets/pdf/general-terms-of-use.pdf"><u> terms of use</u></a></p>
		<hr style="margin-top: 10px;border-top: 1px solid #CCCCCC;width: 100%;">
        <p class="w-100 disclamer footer_login">Already have an account? <span id="eventopenloginform" style="cursor: pointer; color:#282560;"><u> Login Here</u></span></p>
    </div>
    <div class="col-sm-6 col-xs-12 mx-sm-auto p-0 text-center" id="event_reg_unhide" style="display: none;">
        <form data-parsley-validate class="form-element-section w-100" action="" method="post">
            <div id="error_msg_otp" class="error-msg form-error"></div>
            <div id="otp_field">
                <label style="font-size: 20px; font-family: Roboto;font-weight: 600; margin-bottom: 0;">Enter OTP</label>
                <p id="otp_msg"></p>
                <input data-parsley-type="text" style="border-color:#ced4da !important" data-parsley-required-message="OTP is required." data-parsley-required="false" type="text" class="form-control model_form_input" id="mobile-otp" name="mobile_otp" placeholder="OTP" autocomplete="off">
            </div>
            <input type="hidden" id="event_position">
            <input type="hidden" id="event_name">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user->ID; ?>">
            <input type="hidden" id="mobile_number">
            <input type="hidden" id="country_code">
            <input type="submit" name="resend_otp" value="Resend OTP" id="resend_otp" style="border: none; background: none; color: #4f0475; font-weight: 400; font-size: 14px; margin: 10px 0; font-family: Roboto;">
            <button class="login_btn" type="submit" name="verify_mobile" id="verify_mobile_event" style="font-family: Roboto;">Submit</button>
        </form>
    </div>
    <div class="col-md-3 col-xs-12"></div>
</div>
<style>
    .bg_round_facebook{
        font-size: 14px;
        padding: 6px 9px;
        color: #fff;
        background-color: #3b5998;
        border-radius: 50%; 
    }
    .bg_round_google{
        
    }
    .model_login_with_google, .model_login_with_facebook{
        background-color: #fff !important;
        color:#4f0475 !important;
        border: 1px solid #dcd8d8 !important;
    }
    .model_login_with_google{
        text-align: center;
        padding-left: 0px;
        padding-bottom: 2px;
    }
    .model_login_with_google span, .model_login_with_facebook span{
        margin-left: 5px !important;
        font-size: 15px;
        font-family: Calibri;
        color: #000;
    }
    .model_header_text{
        margin:0px;
        color:#a0a0a0;
        font-size: 12px;
    }
    .footer_login{
        color: #000;
        font-weight: 500;
        font-size: 13px;
    }
    .footer_login a{
        color: #0362c7;
        font-weight: 500;
    }
    .text_t_c{
        font-size: 11px;
        color: #a3a4a5;
    }
    ::placeholder {
        color: #d2d1d1 !important;
        font-size: 12px !important;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color:#d2d1d1;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #d2d1d1;
    }
    .signup_submit_modal{
        font-family: Calibri;
        padding: 3px 40px !important;
        border-radius: 3px !important;
    }
	.sigup{
		font-size: 24px;
		font-family: 'Work Sans', sans-serif;
		color: #282560;
		font-weight:600;
	}
</style>
<script type="text/javascript">
    $('#eventopenloginform').on('click', function(){
        $("#login_popup").modal('show');
        $("#regter_modal").modal('hide');
    });
</script>