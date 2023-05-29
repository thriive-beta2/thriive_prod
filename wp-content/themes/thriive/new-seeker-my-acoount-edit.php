<?php /* Template Name: New seeker my account edit page */ ?>
<?php 
	if (!is_user_logged_in()) 
	{ 
		wp_redirect('/seeker-regsiter-landing-page/');
		exit();
	} 
	else 
	{
		$current_user = '';		//reset the variable
		$current_user = wp_get_current_user();	
		
		//if($current_user->roles[0] == 'therapist')
		if(in_array("therapist", $current_user->roles))
		{
			wp_redirect('/therapist-account-dashboard/');
			exit();
		}
		$address = json_decode($current_user->address);
		$countries = $wpdb->get_results("SELECT * FROM countries ORDER BY name ASC");
	}
	//print_r($_SERVER);
?>
<?php //get_header(); 
	include_once get_stylesheet_directory().'/new-header.php';
?>
<style type="text/css">
	.input-container{
		display: -ms-flexbox;     
		display: flex;     
		width: 100%;     
		margin-bottom: 15px;
	}
	.input-container i{
		padding: 10px; 
		padding-right: 0px; 
		color: #4f0475; 
		min-width: 50px; 
		text-align: center; 
		margin-right: -40px; 
		z-index: 999; 
		border-right: 1px solid #f0f0f0;
	}
	.iti--separate-dial-code{
		width: 100%;
	}
</style>
<section class="mt-5">
	<div class="container">
		<div class="row section col-12 mx-auto">
			<div class="col-md-3 col-xs-12"></div>
			<div class="col-md-6 col-xs-12 d-flex mb-4 ">
				<a href="/my-account-page" class="back-btn"> ≺ BACK </a>
			</div>
			<div class="col-md-3 col-xs-12"></div>
			
			<div class="col-md-3 col-xs-12"></div>
			<div class="col-md-6 col-xs-12">
				<form data-parsley-validate  class="form-element-section" action="" method="post">
				<?php wp_nonce_field('update_seeker'); ?>
			  <div class="form-group">
			  	<h5><label for="firstname">First Name*</label></h5>
			    <input data-parsley-required="true" data-parsley-required-message="First Name is required." type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $current_user->first_name;?>">
			  </div>
			  <!-- <div class="form-group">
			    <label for="lastname">Last Name</label>
			    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $current_user->last_name;?>">
			  </div> -->
			  
			  <div class="form-group">
			  	<h5>
			  		<label for="email">Email*</label>
			  	</h5>
			    <input data-parsley-type="email" data-parsley-required-message="Email is required."  data-parsley-required="true" type="email" class="form-control" id="email" name="email" value="<?php echo $current_user->user_email;?>" disabled>
			  </div>	  
			  
			  <div class="form-group">
			  	<h5><label for="mobile">Mobile*</label></h5>
			    <input data-parsley-required="true" type="text" data-parsley-required-message="Mobile is required." class="form-control" id="mobile" name="mobile" value="<?php echo $current_user->mobile;?>" readonly>
			  </div>

			  <div class="form-group">
			  	<h5><label for="gender" style="margin-right: 15px;">Gender*</label></h5>
			  	<input type="radio" id="male" name="gender" value="male" <?php if($current_user->gender == "Male"){ echo 'checked'; }?> >
			  	<label for="male"style="margin-right: 15px;">Male</label>
			  	<input type="radio" id="female" name="gender" value="female" <?php if($current_user->gender == "Female"){ echo 'checked'; }?>>
			  	<label for="female">Female</label>
			  </div>

			  <div class="form-group">
			  	<h5><label for="dob">Date of birth*</label></h5>
			  	
			    <div class="input-container" style="margin-left: -3%">
			    	<i class="fa fa-calendar-check-o icon"></i>
			    	<input type="text" name="birthday" class="date_picker form-control" value="<?php echo $current_user->dob;?>" style="padding-left: 50px;">
			    </div>
			  </div>
			  
			  <!-- <div class="regsiter-form-section">
			  <div class="form-group">
			    <label for="country" class="d-block">Country*</label>
			    <select class="mb-2 form-control select-list-item select-dropdown-list" id="country" name="country" data-parsley-errors-container="#country_select_error" data-parsley-required-message="Country is required." required>
					<?php if($address->country == '') { ?> <option value="">No country selected</option> <?php } ?> 
					<?php foreach($countries as $key => $value) { ?>
						<option country_id="<?php print_r( $value->id );?>" value="<?php print_r( $value->name );?>" <?php echo ($address->country != '' && $value->name == $address->country)?'selected':''?>><?php print_r( $value->name );?></option>
					<?php } ?>
				</select>
				<div id="country_select_error"></div>
			  </div>
			  <div class="form-group">
				
				<label for="state" class="d-block">State*</label>
				<select class="mb-2 form-control select-list-item select-dropdown-list" id="state" name="state" data-parsley-errors-container="#state_select_error" data-parsley-required-message="State is required." required <?php echo ($address->state == '')?'disabled':'';?>>
					<?php if($address->state != '') { CountryStateChange(); } else { ?>
				    	<option value="">Select country first *</option>
				    <?php } ?>
				</select>
				<div id="state_select_error"></div>
			  </div>
			  <div class="form-group">
				
				<label for="city" class="d-block">City*</label>
				<select class="mb-2 form-control select-list-item select-dropdown-list" id="city" name="city" data-parsley-errors-container="#city_select_error" data-parsley-required-message="City is required." required <?php echo ($address->city == '')?'disabled':'';?>>
					<?php if($address->city != '') { StateCityChange(); } else { ?>
				    	<option value="">Select state first *</option>
				    <?php } ?>
				</select>
				<div id="city_select_error"></div>
			  </div>

			  </div> -->
			<div class="text-center">
				<button type="submit" class="btn btn_common" name="update_seeker_submit" id="signup_submit">Update</button>
			</div>
			</form>
			</div>
			<div class="col-md-3 col-xs-12"></div>
		</div>
	</div>
</section>


<?php //get_footer();
	include_once get_stylesheet_directory().'/new-footer.php';
 ?>