<?php /* Template Name: New Seeker New Register  */ ?>
<?php 
$_SESSION['chat_page'] = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
//get_header();
include_once get_stylesheet_directory().'/new-header.php';

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
<section class="login_ mt-5">
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
		                    <h6>Are You Therapist ? <a href="mailto:admin@thriive.in" class="register_as_therapist">Register here</a></h6>
		                </div>
		            </div>
		            <h5 class="text-center input_level">Sign Up With</h5>
		           
		            <div style="clear:both"></div>

		            <div class="container pd_xs_0">
		                <div class="">
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
		                        <div class="col-md-4 input_level" style="padding-right: 0px">
		                            <h5>Mobile Number *</h5>
		                        </div>
		                        <div class="col-md-8 input_level">
		                            <input data-parsley-required="true" type="text" parsley-type="number" data-parsley-required-message="Mobile is required." class="form-control " id="mobile-number" autocomplete="off" placeholder="Enter your mobile" name="mobile" <?php if(!empty($user_meta['mobile'][0])){ ?>value="<?php echo $user_meta['mobile'][0]; ?>" disabled="disabled" <?php } ?>>
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
		                            <span id="ss_btn"><button class="login_btn" type="submit" name="seeker_submit" id="seeker_submit">Register</button></span>
		                            <span id="vs_btn" style="display: none;"><input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user->ID; ?>">
		                            <button class="login_btn" type="submit" name="verify_mobile" id="verify_mobile">Sign Up</button></span>
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
//get_footer(); ?>


<style>
.tablink:hover, .tselected {
    background-color: #153483;
    color: #fff;
}
.tablink {
    background-color: #fff;
    color: #000;
    float: left;
    border: 1px solid #f2f2f2;
    outline: none;
    cursor: pointer;
    font-size: 17px;
    text-align: center;
    height: 100%;
    padding: 2% 0 3.5% 0;;
    font-family: "Work Sans",'Rupee_Foradian', sans-serif;
    width: 50%;
}
.login_btn {
    background-color: #153483;
    color: #fff;
    font-family: "Work Sans",'Rupee_Foradian', sans-serif ;
    padding: 2% 10%;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border: 1px solid;
}
.register_as_therapist {
    font-family: "Work Sans",'Rupee_Foradian', sans-serif ;
    color: #dd4b39;
    border: 1px solid;
    padding: 1% 2%;
    border-radius: 3px;
    box-shadow: 3px 3px 3px #e4e0e0;
}
.tablink:hover, .tselected {
    background-color: #153483;
    color: #fff;
    font-family: "Work Sans",'Rupee_Foradian', sans-serif;
}
.tabcontent {
    color: #000;
    padding: 100px 20px;
    height: 100%;
    padding: 18px 0px;
    border: 1px solid #f2f2f2;
    background-color: #fff;
    margin-top: -1%;
}
.input_level {
    margin-bottom: 4%;
}
.input_level h5{
    font-size: 16px;
}
.iti__selected-flag {
    z-index: 1;
    position: relative;
    display: flex;
    align-items: center;
    height: auto;
    padding: 9px 6px 9px 8px;
     margin: 0px 0 0 0; 
}








body {
    color: unset;
    overflow-x: hidden;
    font-family: "Work Sans",'Rupee_Foradian', sans-serif !important;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Work Sans",'Rupee_Foradian', sans-serif !important;
    color: #153483;
}
@media (max-width:767px) {
    .width-xs-4{
       width: 33.33333333% !important;
    }
}
@media (min-width:992px) {
    .width-md-3{
        width: 25%;
    }
}
@media (min-width:992px) and (max-width:1199px) {
    .hidden-md {
        display: none !important
    }
}

@media (min-width:1200px) {
    .hidden-lg {
        display: none !important
    }
}






@media (max-width:767px) {
    .container_xs {}

    .col-xs-12 {
        width: 100% !important;
    }

    .col-xs-11 {
        width: 91.66666667% !important;
    }

    .col-xs-10 {
        width: 83.33333333% !important;
    }

    .col-xs-9 {
        width: 75% !important;
    }

    .col-xs-8 {
        width: 66.66666667% !important;
    }

    .col-xs-7 {
        width: 58.33333333% !important;
    }

    .col-xs-6 {
        width: 50% !important;
    }

    .col-xs-5 {
        width: 41.66666667% !important;
    }

    .col-xs-4 {
        width: 33.33333333% !important;
    }

    .col-xs-3 {
        width: 25% !important;
    }

    .col-xs-2 {
        width: 16.66666667% !important;
    }

    .col-xs-1 {
        width: 8.33333333% !important;
    }

    .col-xs-pull-12 {
        right: 100% !important;
    }

    .col-xs-pull-11 {
        right: 91.66666667% !important;
    }

    .col-xs-pull-10 {
        right: 83.33333333% !important;
    }

    .col-xs-pull-9 {
        right: 75% !important;
    }

    .col-xs-pull-8 {
        right: 66.66666667% !important;
    }

    .col-xs-pull-7 {
        right: 58.33333333% !important;
    }

    .col-xs-pull-6 {
        right: 50%
    }

    .col-xs-pull-5 {
        right: 41.66666667%
    }

    .col-xs-pull-4 {
        right: 33.33333333%
    }

    .col-xs-pull-3 {
        right: 25%
    }

    .col-xs-pull-2 {
        right: 16.66666667%
    }

    .col-xs-pull-1 {
        right: 8.33333333%
    }

    .col-xs-pull-0 {
        right: auto
    }

    .col-xs-push-12 {
        left: 100%
    }

    .col-xs-push-11 {
        left: 91.66666667%
    }

    .col-xs-push-10 {
        left: 83.33333333%
    }

    .col-xs-push-9 {
        left: 75%
    }

    .col-xs-push-8 {
        left: 66.66666667%
    }

    .col-xs-push-7 {
        left: 58.33333333%
    }

    .col-xs-push-6 {
        left: 50%
    }

    .col-xs-push-5 {
        left: 41.66666667%
    }

    .col-xs-push-4 {
        left: 33.33333333%
    }

    .col-xs-push-3 {
        left: 25%
    }

    .col-xs-push-2 {
        left: 16.66666667%
    }

    .col-xs-push-1 {
        left: 8.33333333%
    }

    .col-xs-push-0 {
        left: auto
    }

    .col-xs-offset-12 {
        margin-left: 100%
    }

    .col-xs-offset-11 {
        margin-left: 91.66666667%
    }

    .col-xs-offset-10 {
        margin-left: 83.33333333%
    }

    .col-xs-offset-9 {
        margin-left: 75%
    }

    .col-xs-offset-8 {
        margin-left: 66.66666667%
    }

    .col-xs-offset-7 {
        margin-left: 58.33333333%
    }

    .col-xs-offset-6 {
        margin-left: 50%
    }

    .col-xs-offset-5 {
        margin-left: 41.66666667%
    }

    .col-xs-offset-4 {
        margin-left: 33.33333333%
    }

    .col-xs-offset-3 {
        margin-left: 25%
    }

    .col-xs-offset-2 {
        margin-left: 16.66666667%
    }

    .col-xs-offset-1 {
        margin-left: 8.33333333%
    }

    .col-xs-offset-0 {
        margin-left: 0
    }

    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-xs-1,
    .col-xs-10,
    .col-xs-11,
    .col-xs-12,
    .col-xs-2,
    .col-xs-3,
    .col-xs-4,
    .col-xs-5,
    .col-xs-6,
    .col-xs-7,
    .col-xs-8,
    .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px
    }

    .col-xs-1,
    .col-xs-10,
    .col-xs-11,
    .col-xs-12,
    .col-xs-2,
    .col-xs-3,
    .col-xs-4,
    .col-xs-5,
    .col-xs-6,
    .col-xs-7,
    .col-xs-8,
    .col-xs-9 {
        float: left
    }
    .logo{
        margin-left: 1px;
    }
    .contact_us_map{
        width: 100%;
        height: 450px;
    }
}


@media (min-width:768px) {

    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9 {
        float: left
    }

    .col-sm-12 {
        width: 100%
    }

    .col-sm-11 {
        width: 91.66666667%
    }

    .col-sm-10 {
        width: 83.33333333%
    }

    .col-sm-9 {
        width: 75%
    }

    .col-sm-8 {
        width: 66.66666667%
    }

    .col-sm-7 {
        width: 58.33333333%
    }

    .col-sm-6 {
        width: 50%
    }

    .col-sm-5 {
        width: 41.66666667%
    }

    .col-sm-4 {
        width: 33.33333333%
    }

    .col-sm-3 {
        width: 25%
    }

    .col-sm-2 {
        width: 16.66666667%
    }

    .col-sm-1 {
        width: 8.33333333%
    }

    .col-sm-pull-12 {
        right: 100%
    }

    .col-sm-pull-11 {
        right: 91.66666667%
    }

    .col-sm-pull-10 {
        right: 83.33333333%
    }

    .col-sm-pull-9 {
        right: 75%
    }

    .col-sm-pull-8 {
        right: 66.66666667%
    }

    .col-sm-pull-7 {
        right: 58.33333333%
    }

    .col-sm-pull-6 {
        right: 50%
    }

    .col-sm-pull-5 {
        right: 41.66666667%
    }

    .col-sm-pull-4 {
        right: 33.33333333%
    }

    .col-sm-pull-3 {
        right: 25%
    }

    .col-sm-pull-2 {
        right: 16.66666667%
    }

    .col-sm-pull-1 {
        right: 8.33333333%
    }

    .col-sm-pull-0 {
        right: auto
    }

    .col-sm-push-12 {
        left: 100%
    }

    .col-sm-push-11 {
        left: 91.66666667%
    }

    .col-sm-push-10 {
        left: 83.33333333%
    }

    .col-sm-push-9 {
        left: 75%
    }

    .col-sm-push-8 {
        left: 66.66666667%
    }

    .col-sm-push-7 {
        left: 58.33333333%
    }

    .col-sm-push-6 {
        left: 50%
    }

    .col-sm-push-5 {
        left: 41.66666667%
    }

    .col-sm-push-4 {
        left: 33.33333333%
    }

    .col-sm-push-3 {
        left: 25%
    }

    .col-sm-push-2 {
        left: 16.66666667%
    }

    .col-sm-push-1 {
        left: 8.33333333%
    }

    .col-sm-push-0 {
        left: auto
    }

    .col-sm-offset-12 {
        margin-left: 100%
    }

    .col-sm-offset-11 {
        margin-left: 91.66666667%
    }

    .col-sm-offset-10 {
        margin-left: 83.33333333%
    }

    .col-sm-offset-9 {
        margin-left: 75%
    }

    .col-sm-offset-8 {
        margin-left: 66.66666667%
    }

    .col-sm-offset-7 {
        margin-left: 58.33333333%
    }

    .col-sm-offset-6 {
        margin-left: 50%
    }

    .col-sm-offset-5 {
        margin-left: 41.66666667%
    }

    .col-sm-offset-4 {
        margin-left: 33.33333333%
    }

    .col-sm-offset-3 {
        margin-left: 25%
    }

    .col-sm-offset-2 {
        margin-left: 16.66666667%
    }

    .col-sm-offset-1 {
        margin-left: 8.33333333%
    }

    .col-sm-offset-0 {
        margin-left: 0
    }
}

@media (min-width:992px) {

    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9 {
        float: left
    }

    .col-md-12 {
        width: 100%
    }

    .col-md-11 {
        width: 91.66666667%
    }

    .col-md-10 {
        width: 83.33333333%
    }

    .col-md-9 {
        width: 75%
    }

    .col-md-8 {
        width: 66.66666667%
    }

    .col-md-7 {
        width: 58.33333333%
    }

    .col-md-6 {
        width: 50%
    }

    .col-md-5 {
        width: 41.66666667%
    }

    .col-md-4 {
        width: 33.33333333%
    }

    .col-md-3 {
        width: 25%
    }

    .col-md-2 {
        width: 16.66666667%
    }

    .col-md-1 {
        width: 8.33333333%
    }

    .col-md-pull-12 {
        right: 100%
    }

    .col-md-pull-11 {
        right: 91.66666667%
    }

    .col-md-pull-10 {
        right: 83.33333333%
    }

    .col-md-pull-9 {
        right: 75%
    }

    .col-md-pull-8 {
        right: 66.66666667%
    }

    .col-md-pull-7 {
        right: 58.33333333%
    }

    .col-md-pull-6 {
        right: 50%
    }

    .col-md-pull-5 {
        right: 41.66666667%
    }

    .col-md-pull-4 {
        right: 33.33333333%
    }

    .col-md-pull-3 {
        right: 25%
    }

    .col-md-pull-2 {
        right: 16.66666667%
    }

    .col-md-pull-1 {
        right: 8.33333333%
    }

    .col-md-pull-0 {
        right: auto
    }

    .col-md-push-12 {
        left: 100%
    }

    .col-md-push-11 {
        left: 91.66666667%
    }

    .col-md-push-10 {
        left: 83.33333333%
    }

    .col-md-push-9 {
        left: 75%
    }

    .col-md-push-8 {
        left: 66.66666667%
    }

    .col-md-push-7 {
        left: 58.33333333%
    }

    .col-md-push-6 {
        left: 50%
    }

    .col-md-push-5 {
        left: 41.66666667%
    }

    .col-md-push-4 {
        left: 33.33333333%
    }

    .col-md-push-3 {
        left: 25%
    }

    .col-md-push-2 {
        left: 16.66666667%
    }

    .col-md-push-1 {
        left: 8.33333333%
    }

    .col-md-push-0 {
        left: auto
    }

    .col-md-offset-12 {
        margin-left: 100%
    }

    .col-md-offset-11 {
        margin-left: 91.66666667%
    }

    .col-md-offset-10 {
        margin-left: 83.33333333%
    }

    .col-md-offset-9 {
        margin-left: 75%
    }

    .col-md-offset-8 {
        margin-left: 66.66666667%
    }

    .col-md-offset-7 {
        margin-left: 58.33333333%
    }

    .col-md-offset-6 {
        margin-left: 50%
    }

    .col-md-offset-5 {
        margin-left: 41.66666667%
    }

    .col-md-offset-4 {
        margin-left: 33.33333333%
    }

    .col-md-offset-3 {
        margin-left: 25%
    }

    .col-md-offset-2 {
        margin-left: 16.66666667%
    }

    .col-md-offset-1 {
        margin-left: 8.33333333%
    }

    .col-md-offset-0 {
        margin-left: 0
    }
}

@media (min-width:1200px) {

    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9 {
        float: left
    }

    .col-lg-12 {
        width: 100%
    }

    .col-lg-11 {
        width: 91.66666667%
    }

    .col-lg-10 {
        width: 83.33333333%
    }

    .col-lg-9 {
        width: 75%
    }

    .col-lg-8 {
        width: 66.66666667%
    }

    .col-lg-7 {
        width: 58.33333333%
    }

    .col-lg-6 {
        width: 50%
    }

    .col-lg-5 {
        width: 41.66666667%
    }

    .col-lg-4 {
        width: 33.33333333% !important;
    }

    .col-lg-3 {
        width: 25%
    }

    .col-lg-2 {
        width: 16.66666667%
    }

    .col-lg-1 {
        width: 8.33333333%
    }

    .col-lg-pull-12 {
        right: 100%
    }

    .col-lg-pull-11 {
        right: 91.66666667%
    }

    .col-lg-pull-10 {
        right: 83.33333333%
    }

    .col-lg-pull-9 {
        right: 75%
    }

    .col-lg-pull-8 {
        right: 66.66666667%
    }

    .col-lg-pull-7 {
        right: 58.33333333%
    }

    .col-lg-pull-6 {
        right: 50%
    }

    .col-lg-pull-5 {
        right: 41.66666667%
    }

    .col-lg-pull-4 {
        right: 33.33333333%
    }

    .col-lg-pull-3 {
        right: 25%
    }

    .col-lg-pull-2 {
        right: 16.66666667%
    }

    .col-lg-pull-1 {
        right: 8.33333333%
    }

    .col-lg-pull-0 {
        right: auto
    }

    .col-lg-push-12 {
        left: 100%
    }

    .col-lg-push-11 {
        left: 91.66666667%
    }

    .col-lg-push-10 {
        left: 83.33333333%
    }

    .col-lg-push-9 {
        left: 75%
    }

    .col-lg-push-8 {
        left: 66.66666667%
    }

    .col-lg-push-7 {
        left: 58.33333333%
    }

    .col-lg-push-6 {
        left: 50%
    }

    .col-lg-push-5 {
        left: 41.66666667%
    }

    .col-lg-push-4 {
        left: 33.33333333%
    }

    .col-lg-push-3 {
        left: 25%
    }

    .col-lg-push-2 {
        left: 16.66666667%
    }

    .col-lg-push-1 {
        left: 8.33333333%
    }

    .col-lg-push-0 {
        left: auto
    }

    .col-lg-offset-12 {
        margin-left: 100%
    }

    .col-lg-offset-11 {
        margin-left: 91.66666667%
    }

    .col-lg-offset-10 {
        margin-left: 83.33333333%
    }

    .col-lg-offset-9 {
        margin-left: 75%
    }

    .col-lg-offset-8 {
        margin-left: 66.66666667%
    }

    .col-lg-offset-7 {
        margin-left: 58.33333333%
    }

    .col-lg-offset-6 {
        margin-left: 50%
    }

    .col-lg-offset-5 {
        margin-left: 41.66666667%
    }

    .col-lg-offset-4 {
        margin-left: 33.33333333%
    }

    .col-lg-offset-3 {
        margin-left: 25%
    }

    .col-lg-offset-2 {
        margin-left: 16.66666667%
    }

    .col-lg-offset-1 {
        margin-left: 8.33333333%
    }

    .col-lg-offset-0 {
        margin-left: 0
    }
}

</style>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>