<?php /* Template Name: New contact-us */ ?>
<?php include_once get_stylesheet_directory().'/new-header.php'; ?>
<section class="banner contact-us">
	<div class="container">	
			<div class="m-4 divider"></div>
			
		
		<div class="row section i_w_p col-12 p-0 mx-auto">
		<?php echo do_shortcode('[gravityform id=27 title=false description=false ajax=true]'); ?>
		</div>
<style>
	/* Gravity Form Customize */
	.gravity_form_wrapper
	{
		margin-top: 0 !important;
	}
	.gravity_form
	{
		margin: 0;
	}
	.gravity_form li
	{
		list-style: none;
	}
	.gravity_form textarea 
	{
	    max-height: 80px !important;
	    border: thin solid #4f0475;
	    border-radius: 5px;
	}
	.gravity_form label 
	{
	    font-size: 14px !important;
	    font-weight: 400 !important;
	    margin: 0;
	}
	.gravity_form input[type="text"], .gravity_form select 
	{
	    border: thin solid #4f0475;
	    border-radius: 5px;
	    height: 38px;
	    width: 100% !important;
	}
	.gravity_form input[type="file"]
	{
		border:none;
		width: 100% !important;
	}
	.gravity_form .ginput_container_fileupload span 
	{
	    font-size: 12px;
	    opacity: 0.7;
	}
	.gravity_form input[type="submit"]
	{
		color: #fff;
	    background: #4f0475;
	    border: 0px;
	    border-radius: 10px;
	    border: 1px solid #4f0475;
	    margin: 0 auto !important;
	    padding: 8px 29px;
	    display: block !important;
	    transition: .2 ease-in-out;
	}
	.gravity_form input[type="submit"]:hover
	{
		border:thin solid #4f0475;
		color: #4f0475;
		background: #fff;
	}
	.gravity_form li.gfield.gfield_error, .gravity_form .validation_error
	{
		border:none !important;
		margin: 0;
		padding: 0;
		background: transparent !important;
	}
	.gravity_form.validation_message, .gravity_form .validation_error
	{
	    font-weight: 400 !important;
	    padding: 0 !important;
	}
	/* Gravity Form */
</style>			
	</div>
	
	<div class="container">
			<h3 class="header-text">We’d Love To Hear From You!</h3>
			<div class="d-flex wrapper">
				<!--<div class="col-12 col-md-6">
					<div class="d-flex mx-auto  user-details">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Sonia Rao" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/sonia_rao.png" alt="Sonia Rao" />
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Sonia Rao</h5>
							<p class="user_designation">Editor-in-Chief</p>
							<p class="user_email">contenteditor@thriive.in</p>
						</div>
					</div>
				</div>-->
				<div class="col-12 col-md-6">
					<div class="user-details d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Kaivan Bhavsar" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/kaivan_bhavsar.png" alt="Kaivan Bhavsar"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Kaivan Bhavsar</h5>
							<p class="user_designation">Business Manager</p>
							<p class="user_email">kaivanb@thriive.in</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="user-details  d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Manish Jadhav" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/manish_jadhav.png" alt="Manish Jadhav"/>
							</div>
						</div>
						<div class="col-7 col user-details-div">
							<h5 class="user_name">Manish Jadhav</h5>
							<p class="user_info">Product Manager</p>
							<p class="user_email">manishj@thriive.in</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Balaji Golekar" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/balaji_golekar.png" alt="Balaji Golekar"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Balaji Golekar</h5>
							<p class="user_info">Head, Events</p>
							<p class="user_email">events@thriive.in</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Mishika Munot" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/mishika_munot.png" alt="Mishika Munot"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Mishika Munot</h5>
							<p class="user_role">Relationship Manager,</p>
							<p class="user_info">Alternative Therapists</p>
							<p class="user_email">accountmanager1@thriive.in</p>
						</div>
					</div>
				</div>
<!--
				<div class="col-12 col-md-6">
				<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ProfileImage-THR2144352-150x150.jpg"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Komal Raturi</h5>
							<p class="user_role">Astt. Relationsship Manager,</p>
							<p class="user_info">Alternative Therapists</p>
							<p class="user_email">accountmanager2@thriive.in</p>
						</div>
					</div>
				</div>
-->
<!--
				<div class="col-12 col-md-6">
				<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ProfileImage-THR2144352-150x150.jpg"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Kaivan Bhavsar</h5>
							<p class="user_info">Head, Promotions</p>
							<p class="user_email">promotions@thriive.in</p>
						</div>
					</div>
				</div>
-->
				<div class="col-12 col-md-6">
				<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Avanti Jadhav" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/avanti _dharmesh.png" alt="Avanti Jadhav"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Avanti Jadhav</h5>
							<p class="user_info">Account-in-Charge</p>
							<p class="user_email">avanti@thriive.in</p>
						</div>
					</div>
				</div>
				<!--<div class="col-12 col-md-6">
				<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Pramod Sahu" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/pramod_sahu.png" alt="Pramod Sahu"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Pramod Sahu</h5>
							<p class="user_info">Astt. Accounts-in-Charge</p>
							<p class="user_email">promotions@thriive.in</p>
						</div>
					</div>
				</div> -->
				<div class="col-12 col-md-6">
				<div class="user-details col d-flex mx-auto">
						<div class="col-5">
							<div class="user-circle-image">
								<img title="Urvi Dedhia" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/urvi_dedhia.png" alt="Urvi Dedhia"/>
							</div>
						</div>
						<div class="col-7 user-details-div">
							<h5 class="user_name">Urvi Dedhia</h5>
							<p class="user_info">Administrator</p>
							<p class="user_email">admin@thriive.in</p>
						</div>
					</div>
				</div>
			</div>
			<div class="m-4 divider"></div>
	</div>
	<div class="container gmap-continer">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.2507947127115!2d77.49234995104601!3d12.697047224233025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae4335e07a77a9%3A0x5eaabb7ba3bc75d3!2sPyramid+Valley+International!5e0!3m2!1sen!2sin!4v1542777135336" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>	
	
	
	
</section>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>