<?php /* Template Name: New Login page */ ?>
<?php session_start();  ?>
<?php 
$_SESSION['chat_page'] = $_SERVER["HTTP_REFERER"];
	if (is_user_logged_in()) 
	{ 
		$current_user = wp_get_current_user();
		//if user's is Therapist then redirect to therapist dashboard 
		if($current_user->roles[0] == 'therapist')
		{
			wp_redirect('/therapist-account-dashboard/');
		}
		else
		{
			wp_redirect('/my-account-page/');
		}
		exit();
	}
?>
<?php get_header(); ?> 
<section class="login_">
    <div class="container">
        <div class="row">
            <div class="tabs_ col-md-3"></div>
            <div class="tabs_ col-md-6">
                <a href="<?php echo get_permalink( get_page_by_path( 'seeker-regsiter-landing-page' ) );?>" class="tablink">Register</a>
                <a href="<?php echo get_permalink( get_page_by_path( 'login' ) );?>" class="tablink tselected" style="float:right">Login</a>
            </div>
            <div class="tabs_ col-md-3"></div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <?php if($_REQUEST['error']=='user_exists') {
            echo "<div class='error-msg form-error'>It seems you already have an account, please login to continue</div>";
        } ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-xs-12">
                <div class="tabcontent">
                    <h5 class="text-center"> Login With </h5>
                    <div class="row">
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
                    </div>
                    <div style="clear:both"></div>

                    <div class="container">
                        <div class="row">
                            <form data-parsley-validate action="" method="post" style="width:100%">
                                <div class="col-md-4 input_level input-group">
                                    <h5>Email *</h5>
                                </div>
                                <div class="col-md-8 input_level">
                                    <input data-parsley-type="email" data-parsley-required-message="Email is required."  data-parsley-required="true" type="email" class="form-control" autocomplete="off" id="email" name="email" placeholder="Enter email">
                                </div>

                                <div class="col-md-4 input_level">
                                    <h5>Password *</h5>
                                </div>
                                <div class="col-md-8 input_level">
                                    <input data-parsley-required="true" type="password" data-parsley-required-message="Password is required." data-parsley-errors-container="#pwd-holder" class="form-control" id="pwd" autocomplete="off" name="password" placeholder="Enter password">
                                </div>
								<?php 
								if(isset($_GET['flg'])){ ?>
								<input type="hidden" id="call_consult" value="<?php echo $_SERVER['HTTP_REFERER'] ?>" name="call_consult" />
								<?php } ?>
                                <div class="error-msg form-error"><?php echo $error_login; ?></div>
                                <div class="col-md-12 input_level  text-center">
                                    <button class="login_btn" type="submit" name="login_submit" id="login_submit">Login</button>
                                </div>
                                <div class="col-md-6 input_level">
                                    <a class="f_password text-highlight" href="/forgot-password/">
                                        <p>Forgot Password ?</p>
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
