<?php $current_user = wp_get_current_user(); ?>
<div class="row">
    <div class="col-md-3 col-xs-12"></div>
    
    <div class="col-sm-6 col-xs-12 mx-sm-auto p-0 text-center" id="otp_reg_hide">
        <h2 class="w-100 mt-2 loginnow">Login Now</h2>
        <p class="text-center model_header_text mb-2">Please fill in the details and get started</p>
        <div class="" style="padding:0px 5px">
            <form data-parsley-validate id="otp_login_form" class="form-element-section w-100" action="" method="post">
                <div id="error_msg1" class="error-msg form-error"></div>
                <div class="form-group">
                    <input data-parsley-required="true" type="text" parsley-type="number" style="border-color:#ced4da !important"data-parsley-required-message="Mobile is required" class="form-control model_form_input international-number1" id="mobile-num" autocomplete="off" placeholder="Enter your mobile" name="mobile" autocomplete="off">
                    <div id="otpmob_error_msg1" style="color:#e03d2a;"></div>
                </div>
                <button type="submit" class="btn btnotp" name="otp_login_btn" id="otp_login_btn">Get Started</button>
            </form>
            <div style="clear:both"></div>
        </div>
		<hr style="margin-top: 10px;border-top: 1px solid #CCCCCC;width: 100%;">
        <p class="w-100 disclamer footer_login mt-3">Don't have an account? <span id="opensignupform" style="cursor: pointer; color: #282560;"><u> Sign Up</u> </span></p>
    </div>
    <div class="col-sm-6 col-xs-12 mx-sm-auto p-0 text-center" id="otp_reg_unhide" style="display: none;">
        <form data-parsley-validate class="form-element-section w-100" action="" method="post">
            <div id="error_msg_otp1" class="error-msg form-error"></div>
            <div id="otp_field">
                <label style="font-size: 20px; font-family: Roboto;font-weight: 600; margin-bottom: 0;">Enter OTP</label>
                <p id="otp_msg1"></p>
                <input data-parsley-type="text" style="border-color:#ced4da !important" data-parsley-required-message="OTP is required." data-parsley-required="false" type="text" class="form-control model_form_input" id="mob-otp" name="mobile_otp" placeholder="OTP" autocomplete="off">
            </div>
            <input type="hidden" name="user_id" id="otp_user_id" value="<?php echo $current_user->ID; ?>">
			<input type="hidden" id="slug">
            <input type="hidden" id="action">
            <input type="hidden" id="therapy">
            <input type="hidden" id="cat">
			
            <input type="hidden" id="otp_mobile_number">
            <input type="hidden" id="otp_country_code">
            <button class="login_btn" type="submit" name="otp_login_verify" id="otp_login_verify" style="font-family: 'Work Sans', sans-serif;margin-top: 10px;">Submit</button>
            <input type="submit" name="resend_otp" value="Resend OTP" id="resend_otp1" style="border: none; background: none; color: #4f0475; font-weight: 400; font-size: 14px; margin: 10px 0; font-family: 'Work Sans', sans-serif;">
        </form>
    </div>
    <div class="col-md-3 col-xs-12"></div>
</div>
<style type="text/css">
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
        font-size: 16px;
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
    .btnotp{
        -moz-border-radius: 0 15px 0 15px;
        -webkit-border-radius: 0 15px 0 15px;
        -ms-border-radius: 0 15px 0 15px;
        border-radius: 0 15px 0 15px;
        background: #282560;
        color: #fff;
        display: block;
        width: 120px;
        margin: 0 auto;
        padding: 5px;
        text-align: center;
    }
    .international-number1 {
        padding-left: 91px !important;
    }
    .loginnow {
        font-size: 24px;
        font-family: "Work Sans", sans-serif;
        color: #282560;
    }
    .form-element-section button {
        display: block;
        margin: 0 auto;
        
    }
</style>