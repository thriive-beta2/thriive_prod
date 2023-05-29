<?php /* Template Name: New TC tool get details */
if (!is_user_logged_in()) { 
		//$current_user = wp_get_current_user();
		//$current_user->ID = rand(1,100000000);
} else {
	$current_user = wp_get_current_user();	
}
include_once get_stylesheet_directory().'/new-header.php'; 
$namestyle = $genderstyle = $dobstyle = "";
if($current_user->first_name == "" && $current_user->gender == "" && $current_user->dob == ""){
	$genderstyle = $dobstyle = "style='display:none;'";
} else if($current_user->first_name != "" && $current_user->gender == "" && $current_user->dob == "") {
	$namestyle = $dobstyle = "style='display:none;'";
	$genderstyle = "style='display:block;'";
} else if($current_user->first_name != "" && $current_user->gender == "" && $current_user->dob != "") {
	$namestyle = $dobstyle = "style='display:none;'";
	$genderstyle = "style='display:block;'"; 
} else if($current_user->first_name == "" && $current_user->gender != "" && $current_user->dob != "") {
	$dobstyle = $genderstyle = "style='display:none;'";
	$namestyle = "style='display:block;'";
} else if($current_user->first_name != "" && $current_user->gender != "" && $current_user->dob == "") {
	$namestyle = $genderstyle = "style='display:none;'";
	$dobstyle = "style='display:block;'";
} else if($current_user->first_name != "" && $current_user->gender != "" && $current_user->dob != "") {
	$namestyle = $genderstyle = $dobstyle = "style='display:none;'";
} ?>
<style type="text/css">
@media only screen and (min-width: 767px) and (max-width: 2000px) {
	.checked{
		background: #4f0475 !important;
		color: #fff !important;
	}
	.radio_label{
		padding: 0.5% 1%;
	    background: #fff;
	    color: rgba(0, 0, 0, 0.85);
	    cursor: pointer;
	    border-radius: 5px;
	    margin-right: 1%;
	    <!-- width: 50%; -->
	    text-align: center;
	    padding: 10px;
	    font-family: Roboto;
	}
	.form-element-section label{
		font-size: 16px;
	}
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
	.scl-card {
		width: 24px;
		border: 1px solid #fff;
		box-shadow: 0px 1px 2px 2px #d6d0d0;
		border-radius: 5px;
	}

	.overlay {
	    position: absolute;
	    left: 0;
	    top: 0;
	    right: 0;
	    bottom: 0;
	    z-index: 2;
	    background-color: rgba(255,255,255,0.8);
	}
	.overlay-content {
	    position: absolute;
	    transform: translateY(-50%);
	    -webkit-transform: translateY(-50%);
	    -ms-transform: translateY(-50%);
	    top: 50%;
	    left: 0;
	    right: 0;
	    text-align: center;
	    color: #555;
	}
	.btn-primary{
		color: #fff !important;
		background:#F24444 !important;
		border: 0px;
		border-radius: 5px;
		border: 1px solid #F24444;
		padding: 4px 10px;
	}
	.tarotda{
		background-image:url('https://www.thriive.in/wp-content/uploads/2020/09/tarottool-background.jpg');
		background-size: 900px 500px;
		background-position: center;
		background-repeat: no-repeat;
		height: 500px;
		margin-top: 0px;
	}
	.tarname{
		border: 1px solid #4f0475; 
		padding: 20px 11px 36px 11px;
		border-radius: 20px;
		margin-top: 150px;
		margin-bottom: 30px;
		background: #fff;
		height: 153px;
		width: 100%;
	}
	.tardob{
		border: 1px solid #4f0475; 
		padding: 20px 11px 36px 11px;
		border-radius: 20px;
		margin-top: 150px;
		margin-bottom: 30px;
		background: #fff;
		height: 153px;
		width: 100%;
	}
	.targen {
		border: 1px solid #4f0475;
		padding: 14px 4px 24px 5px;
		border-radius: 20px;
		margin-top: 150px;
		margin-bottom: 30px;
		background: #fff;
		width: 100%;
		height: 147px;
		text-align: center;
		
	}
	
	
	.tarq{
		padding-left: 10px;
		padding-right: 10px;
		padding-bottom: 0px; 
		margin-bottom: -15px;
		padding-top: 10px;
		color:#27265F;
		font-family:'Work Sans', san-serif;
	}
	.tarissue {
		border: 1px solid #4f0475;
		border-radius: 20px;
		margin-top: 70px;
		margin-bottom: 30px;
		background: #fff;
		height: 480px;
		text-align: center;
		margin-right: 25%;
		margin-left: 56%;
		width: 60%;
	}
	.tarques {
		border: 1px solid #4f0475;
		padding: 17px 15px;
		border-radius: 20px;
		margin-top: 150px;
		margin-bottom: 30px;
		background: #fff;
		height: 175px;
		margin-left: 232px;
		margin-right: 6px;
		width: 100%;
	}
	.tglabelm{
		padding-left:15%;
		padding-right:12%;
		text-align:center
		
	}
	.tglabelf{
		padding-left:11%;
		border-left:2px solid #4f0475; 
		text-align:center;
		border-radius: 0px;
	}
	.scl-card {
	    width: 50px;
	    border: 1px solid #fff;
	}
	  
	.mobile_card{
	    width: 695px !important;
	}
	.btn-primary{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 30px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	.img-div {
		border: 1px solid #ccc;
		margin: 10px 55px;
		padding: 10px;
		border-radius: 10px;
		max-width:100%;
		height:auto;
	}
	.form-element-section label {
		color: #27265F;
		font-family:'Work Sans', san-serif;
		font-size: 15px;
		font-weight: 600;
	}
	.tttitle{
		font-size: 16px;
		font-weight: 500;
		color:#27265F;
		font-family:'Work Sans', san-serif;
		padding-top: 15px;
	}
	.btn-primary-reading{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	
	form #form_gender {
		width: 100%;
		margin-left: 35%;
		margin-right: 35%;
	}
	form#form_name {
		width: 100%;
		margin-left: 30%;
		margin-right: 30%;
		padding-bottom: 15%;
	}
	form#form_dob {
		width: 100%;
		margin-left: 30%;
		margin-right: 30%;
		padding-bottom: 16%;
	}
	form#form_gender {
		margin-left: 340px;
	}
}	 


@media only screen and (min-width: 375px) and (max-width: 480px) {
	
   .scl-card {
	   width: 25px !important;
	   border: 1px solid #fff;
	   box-shadow: 0px 1px 2px 2px #d6d0d0;
	   border-radius: 5px;
   }
   .btn-primary-start{
		color: #fff !important;
		background:#008000 !important;
		border-radius:10px;
		border: 1px solid #008000;
		box-shadow:0px 2px 2px 2px #0000004a;
		padding: 6px 18px !important;
	}
		
	.btn-primary{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 30px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	.img-div {
		border: 1px solid #ccc;
		margin: 10px 55px;
		padding: 10px;
		border-radius: 10px;
		max-width:100%
		height:auto;
	}
	.form-element-section label {
		color: #27265F;
		font-family:'Work Sans', san-serif;
		font-size: 15px;
		font-weight: 600;
	}
	.tttitle{
		font-size: 16px;
		font-weight: 500;
		color:#27265F;
		font-family:'Work Sans', san-serif;
		padding-top: 15px;
	}
	.tarotda{
		background-image:url('https://www.thriive.in/wp-content/uploads/2020/09/tarottool-background-mobile.jpg') !important;
		background-size: 355px 335px !important;
		background-position: center !important;
		background-repeat: no-repeat !important;
		height: 325px !important;
		margin-top:5px !important;
	}
	.tarname{
		border: 1px solid #4f0475 !important; 
		padding: 20px 11px 36px 11px !important;
		border-radius: 20px !important;
		margin-top: 60px !important;
		margin-bottom: 30px !important; 
		background: #fff !important;
		height: 153px !important;
		width: 100% !important;
	}
		
	.tardob{
		border: 1px solid #4f0475 !important; 
		padding: 20px 11px 36px 11px !important;
		border-radius: 20px !important;
		margin-top: 60px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height: 153px !important;
	}
	.targen{
		border: 1px solid #4f0475 !important; 
		padding: 25px 4px 24px 5px !important;
		border-radius: 20px !important;
		margin-top: 60px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height:147px !important;
	}
	.tarq{
		padding-left: 10px !important;
		padding-right: 10px !important;
		padding-bottom: 0px !important;  
		margin-bottom: -15px !important;
		padding-top: 15px;
		color:#27265F;
		font-family:'Work Sans', san-serif;
	}
	.tarissue{
		border: 1px solid #4f0475 !important; 
		border-radius: 20px !important;
		margin-top: 0px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height:460px !important;
	}
	.tarques{
		border: 1px solid #4f0475 !important; 
		padding: 17px 15px !important;
		border-radius: 20px !important;
		margin-top: 30px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height:175px !important;
		margin-left: -30px !important;
		margin-right: -30px !important;
		}
	.tglabelm{
		padding-left:15%;
		padding-right:12%;
		text-align:center
		
	}
	.tglabelf{
		padding-left:11%;
		border-left:2px solid #4f0475; 
		text-align:center;
		border-radius: 0px;
	}
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
	.img-div {
		border: 1px solid #ccc;
		margin: 10px 55px;
		padding: 10px;
		border-radius: 10px;
		max-width:100%;
		height:auto;
	}
	.form-element-section label {
		color: #27265F;
		font-family:'Work Sans', san-serif;
		font-size: 15px;
		font-weight: 600;
	}
	.tttitle{
		font-size: 16px;
		font-weight: 500;
		color:#27265F;
		font-family:'Work Sans', san-serif;
		padding-top: 15px;
	}
	.btn-primary-reading{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
}  


@media only screen and (min-width: 320px) and (max-width: 600px) {
	
   .scl-card {
	   width: 24px;
	   border: 1px solid #fff;
	   box-shadow: 0px 1px 2px 2px #d6d0d0;
	   border-radius: 5px;
    }
   .mobile_card{
		   width: 100% !important;
	}
   .tarotda{
		background-image:url('https://www.thriive.in/wp-content/uploads/2020/09/tarottool-background-mobile.jpg') !important;
		background-size: 355px 335px !important;
		background-position: center !important;
		background-repeat: no-repeat !important;
		height: 325px !important;
		margin-top:5px !important;
	}
	.tarname{
		border: 1px solid #4f0475 !important; 
		padding: 20px 11px 36px 11px !important;
		border-radius: 20px !important;
		margin-top: 60px !important;
		margin-bottom: 30px !important; 
		background: #fff !important;
		height: 153px !important;
		width: 100% !important;
	}
		
	.tardob{
		border: 1px solid #4f0475 !important; 
		padding: 20px 11px 36px 11px !important;
		border-radius: 20px !important;
		margin-top: 60px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height: 153px !important;
	}
	.targen{
		border: 1px solid #4f0475 !important; 
		padding: 25px 4px 24px 5px !important;
		border-radius: 20px !important;
		margin-top: 100px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height:147px !important;
		margin-left: 35px;
	}
	.tarq{
		padding-left: 10px !important;
		padding-right: 10px !important;
		padding-bottom: 0px !important;  
		margin-bottom: -15px !important;
		padding-top: 15px;
		color:#27265F;
		font-family:'Work Sans', san-serif;
	}
	.tarissue{
		border: 1px solid #4f0475 !important; 
		border-radius: 20px !important;
		margin-top: 0px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height:460px !important;
	}
	.tarques{
		border: 1px solid #4f0475 !important; 
		padding: 17px 15px !important;
		border-radius: 20px !important;
		margin-top: 70px !important;
		margin-bottom: 30px !important;
		background: #fff !important;
		height:175px !important;
		
		}
	.tglabelm{
		padding-left:15%;
		padding-right:12%;
		text-align:center
		
	}
	.tglabelf{
		padding-left:11%;
		border-left:2px solid #4f0475; 
		text-align:center;
		border-radius: 0px;
	}
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
	.img-div {
		border: 1px solid #ccc;
		margin: 10px 55px;
		padding: 10px;
		border-radius: 10px;
		max-width:100%;
		height:auto;
	}
	.btn-primary{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 30px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	.form-element-section label {
		color: #27265F;
		font-family:'Work Sans', san-serif;
		font-size: 15px;
		font-weight: 600;
	}
	.tttitle{
		font-size: 16px;
		font-weight: 500;
		color:#27265F;
		font-family:'Work Sans', san-serif;
		padding-top: 15px;
	}
	.btn-primary-reading{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	
	form#form_question {
		width: 100%;
	}
		
	form #form_gender {
		width: 100%;
		margin-left: 0%;
		margin-right: 0%;
	}
	form#form_name {
		width: 100%;
		margin-left: 6%;
		margin-right: 6%;
	}
	form#form_name {
		width: 100%;
		margin-left: 6%;
		margin-right: 6%;
	}
	form#form_issue {
		width: 100%;
		margin-left: 5%;
		margin-right: 5%;
	}
	}


</style>
<div class="container ">
	<div class="row section col-12 mx-auto tarotda">
		<form id="form_name" class="form-element-section tarname" action="" method="post" <?php echo $namestyle; ?>>
			<div class="form-group">
		    	<label for="firstname">Name* <span id="name_error" style="color:#27265F;font-family:'Work Sans', san-serif;"></span></label>
		    	<input autocomplete="off" placeholder="Enter Your Name" style="border-radius: 5px;border-color: #4f0475 !important;" type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $current_user->first_name;?>">
		    	<!--<div id="name_error" style="color:#e03d2a;"></div>-->
		  	</div>	
		  	<div class="text-center">
		  		<input type="button" class="btn btn-primary" id="btn_name" value="Next" />
		  		<!-- <input type="button" class="btn btn-primary" id="btn_name_skip" value="Skip" /> -->
		  	</div>
		</form>
		<form  id="form_dob" class="form-element-section tardob" action="" method="post" <?php echo $dobstyle; ?>  >
			<div class="form-group" >
		  		<label for="dob">Date of birth* <span id="dob_error" style="color:#e03d2a;"></span></label>
		  		<div class="input-container">
			  		<i class="fa fa-calendar-check-o icon"></i>
			    	<input autocomplete="off" placeholder="Enter Date of Birth" type="text" id="dob" name="dob" class="form-control" value="<?php echo $current_user->dob; ?>" style="padding-left: 50px;border-color: #4f0475 !important; ">
			    </div>
		    	<!--<div id="dob_error" style="color:#e03d2a;"></div>-->
				<div class="text-center">
					<input type="button" class="btn btn-primary" id="btn_dob" value="Next" />
					<!-- <input type="button" class="btn btn-primary" id="btn_dob_skip" value="Skip" /> -->
		  	</div>
		  	</div>
		  	
		</form>
		<form id="form_gender" class="form-element-section" action="" method="post" <?php echo $genderstyle; ?>>
			<div class="form-group targen" style="">
			  	<!--<h5>Gender*</h5><br/>-->
				<div class="col-md-6 col-xs-6 text-center">
			  	<input  type="radio" id="male" name="genders" value="Male" style="display: none;">
			  	<label style="" class="radio_label" for="male" <?php if($current_user->gender == 'Male'){ echo 'class="checked radio_label"'; } else { echo 'class="radio_label"'; } ?>> <img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-02.png" alt="male" style="width:75px;" /><br/>Male</label>
				</div>
				<div class="col-md-6 col-xs-6 text-center">
			  	<input type="radio" id="female" name="genders" value="Female" style="display: none;"> 
			  	<label style="" for="female" <?php if($current_user->gender == 'Female'){ echo 'class="checked radio_label"'; } else { echo 'class="radio_label"'; } ?>><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-01.png" alt="female" style="width:75px;" /><br/>Female</label>
				</div>
			  	<div id="gender_error" style="color:#e03d2a;"></div>
			</div>
		  	<!-- <input type="button" id="btn_gender" value="Next" class="btn btn-primary" /> -->
			<!-- <button type="button" class="btn btn-primary" id="btn_gender_skip">Skip</button> -->
		  	
		</form>
		
		<form id="form_issue" class="form-element-section" action="" method="post" <?php if($current_user->first_name != "" && $current_user->gender != "" && $current_user->dob != "") { ?>style="display: block;"<?php } else { ?>style="display: none;"<?php } ?>>
			<div class="form-group tarissue">
		  		<h5 class="tarq">Select the Issue you would like to get the reading for!*</h5><br/>
				<div class="col-md-6 col-xs-6" style="text-align:center">
		    	<input type="radio" id="career" name="issues" value="Career" style="display: none;">
			  	<label class="radio_label" for="career"><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-03.png" alt="career" style="width:80px;" /><br/>Career</label><br/>
				</div>
				<div class="col-md-6 col-xs-6" style="text-align:center">
			  	<input type="radio" id="love" name="issues" value="Love" style="display: none;">
			  	<label class="radio_label" for="love"><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-04.png" alt="love" style="width:80px;" /><br/>love</label><br/>
				</div>
				
				<div class="col-md-6 col-xs-6" style="clear: both;text-align:center">
			  	<input type="radio" id="relationship" name="issues" value="Relationship" style="display: none;">
			  	<label class="radio_label" for="relationship"><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-05.png" alt="relationship" style="width:80px;" /><br/>Relationship</label><br/>
				</div>
				<div class="col-md-6 col-xs-6" style="text-align:center">
			  	<input type="radio" id="health" name="issues" value="Health" style="display: none;">
			  	<label class="radio_label" for="health"><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-06.png" alt="health" style="width:80px;" /><br/>Health</label><br/>
				</div>
				<div class="col-md-6 col-xs-6" style="text-align:center">
			  	<input type="radio" id="marriage" name="issues" value="Marriage" style="display: none;">
			  	<label class="radio_label" for="marriage"><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-07.png" alt="marriage" style="width:80px;" /><br/>Marriage</label><br/>
				</div>
				<div class="col-md-6 col-xs-6" style="text-align:center">
			  	<input type="radio" id="education" name="issues" value="Education" style="display: none;">
			  	<label class="radio_label" for="education"><img src="https://www.thriive.in/wp-content/uploads/2020/09/Icons-08.png" alt="education" style="width:80px;" /><br/>Education</label><br/>
				</div>
				
			  	<div id="issue_error" style="color:#e03d2a;"></div>
		  	</div>
		  	<!-- <input type="button" id="btn_issue" value="Next" class="btn btn-primary" /> -->
		</form>
		</br>
		<div style="clear:both"></div>
		<form id="form_question" class="form-element-section" action="" method="post" style="display: none;" >
			<div class="form-group tarques">
		  		<label for="question">Enter a question* <span id="question_error" style="color:#e03d2a;"></span></label>
		    	<textarea maxlength="200" id="txtquestion" name="question" class="form-control" autocomplete="off" placeholder="Please type your question..."></textarea>
		    	
		    	<div class="text-center">
					<input type="button" class="btn btn-primary" id="btn_question" value="Next" />
		  		</div>
		  	<!-- <button style="margin-top:15px" type="button" class="btn btn-primary" id="btn_question">Next</button> -->
			</div>
		  	
		</form>
	</div>
</div>
<div class="container mobile_card">
	
	<form id="form_card_selection" class="form-element-section" action="" method="post" style="display: none;" >
		<div class="form-group" >
	  		<h5 class="tttitle">Please select one card from the deck below</h5>
	  		<div class="overlay d-none">
	  			<div class="overlay-content">
	  				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" alt="Loading..." style="width: 50px;">
	  			</div>
	  		</div>
	  		<div class="card-selection">
		  		<?php $cards = getTarotCardTool();
				$cardid = array();
		  		foreach($cards as $c){
					$cardid[] = $c->ID;	
		  			echo "<input type='radio' id='$c->ID' name='card' value='$c->ID' style='display: none;' />";
		  			echo "<label for='$c->ID'><img src='/wp-content/uploads/2020/09/Tarot-Card-back.png' class='scl-card'/></label>";
		  		} 
				echo implode(",",$cardid);
				?>
		  	</div>
		  	<div class="text-center" id="selected_card"></div>
	    	<div id="card_error" style="color:#e03d2a;"></div>
	  	</div>
	  	<input type="hidden" name="uid" id="uid" value="<?php echo $current_user->ID; ?>">
	  	<input type="hidden" name="uname" id="uname">
	  	<input type="hidden" name="gender" id="gender">
	  	<input type="hidden" name="birthday" id="birthday">
	  	<input type="hidden" name="issue" id="issue">
	  	<input type="hidden" name="question" id="question">
	  	<input type="hidden" name="selectedcard" id="selectedcard">
	  	<div class="text-center"><!--<input type="button" id="card_shuffle" value="Shuffle" class="btn btn-primary" style="margin-right: 10px;"/>-->

	  	<?php if(!is_user_logged_in()){
	  			echo '<button id="opensignupmodal1" type="button" class="btnConsult">Get My Readings</button>';
	  		}else{echo '<input type="submit" id="tc_tool_submit opensignupmodal1" name="tc_tool_submit" value="Get My Reading" class="btn btn-primary-reading" />';}?>
	  	</div>
	</form>
	
</div>
<br/><br/><br/>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
<script type="text/javascript">
	$('#btn_name').on('click',function(e){
		var uname = $.trim($('#firstname').val());
		if(uname == ""){
			$('#name_error').text('Name is required');
		} else {
			$('#name_error').text('');
			$('#uname').val(uname);
			$('#form_name').css('display','none');
			$('#form_dob').css('display','block');
		}
	});
	$('#btn_name_skip').on('click',function(e){
		$('#form_name').css('display','none');
		$('#form_dob').css('display','block');
	});
	$('#btn_gender').on('click',function(e){
		if (!$('input[type="radio"][name="genders"]').is(":checked")) {
			$('#gender_error').text('Gender is required');
		} else {
			$('#gender_error').text('');
			$('#gender').val($("input[name='genders']:checked").val());
			$('#form_gender').css('display','none');
			$('#form_issue').css('display','block');
		}
	});
	$('#btn_gender_skip').on('click',function(e){
		$('#form_gender').css('display','none');
		$('#form_issue').css('display','block');
	});
	$('#btn_dob').on('click',function(e){
		if($('#dob').val() == ""){
			$('#dob_error').text('DOB required');
		} else {
			$('#dob_error').text('');
			$('#birthday').val($('#dob').val());
			$('#form_dob').css('display','none');
			$('#form_gender').css('display','block');
		}
	});
	$('#btn_dob_skip').on('click',function(e){
		$('#form_dob').css('display','none');
		$('#form_gender').css('display','block');
	});
	$('#btn_issue').on('click',function(e){
		if (!$('input[type="radio"][name="issues"]').is(":checked")) {
			$('#issue_error').text('Issues is required');
		} else {
			$('#issue_error').text('');
			$('#issue').val($("input[name='issues']:checked").val());
			$('#form_issue').css('display','none');
			$('#form_question').css('display','block');
		}
	});
	$('#btn_question').on('click',function(e){
		var question = $.trim($('#txtquestion').val());
		if (question == "") {
			$('#question_error').text('Question is required');
		} else {
			$('#question_error').text('');
			$('#question').val(question);
			$('#form_question').css('display','none');
			$('#form_card_selection').css('display','block');
			$('.tarotda').css('display','none');
		}
	});
	$(document).on("click", "input[name='card']" , function() {
		// var uid = $('#uid').val();
		// var name = $('#uname').val();
		// var gender = $('#gender').val();
		// var dob = $('#dob').val();
		var issue = $('#issue').val();
		// var question = $('#question').val();
        var card = $('input[name="card"]:checked').val();
		$('#selectedcard').val(card);
		$.ajax({
	       	url: myajax.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'getcarddetails', 'cid': card},
	       	success: function (data) {
	       		data = $.parseJSON(data);
	       		$('#card_error').text("");
	       		window.location.hash = '#selected_card';
	       		$('#selected_card').html('<img class="img-div" src="'+data.resData+'" width="200" height="200" />');
	       		$('#form_card_selection').attr('action', window.location.protocol + "//" + window.location.host + "/card-result?c="+card+"&i="+issue);
	       	}
	    });
	    // $.ajax({
	    //    	url: ajax_object.ajax_url,
	    //    	type: 'POST',
	    //    	data: {'action': 'savetctooldata', 'uid': uid, 'name': name, 'gender': gender, 'dob': dob, 'issue': issue, 'question': question, 'card': card},
	    //    	success: function (data) {
	    //    		$('#form_card_selection').attr('action', window.location.protocol + "//" + window.location.host + "/card-result?c="+card);
	    //    		$('#form_card_selection').submit();
	    //    	}
	    // });
    });
	$('#tc_tool_submit').on('click',function(e){
		// var uid = $('#uid').val();
		// var name = $('#name').val();
		// var gender = $('#gender').val();
		// var dob = $('#dob').val();
		// var issue = $('#issue').val();
		// var question = $('#question').val();
		var card = $('#selectedcard').val();
		if (card == "") {
			$('#card_error').text('Please select card');
			return false;
		} else {
			$('#card_error').text('');
			return true;
			// $('#form_card_selection').attr('action', window.location.protocol + "//" + window.location.host + "/card-result?c="+card);
		    //$('#form_card_selection').submit();
			// $.ajax({
		 //       	url: ajax_object.ajax_url,
		 //       	type: 'POST',
		 //       	data: {'action': 'tc_tool_userdetails', 'uid': uid, 'name': name, 'gender': gender, 'dob': dob, 'issue': issue, 'question': question, 'card': card},
		 //       	success: function (data) {
		       		
		 //       	}
		 //    });
		}
	});
	$("#card_shuffle").on('click',function() {
		$(".overlay").removeClass("d-none");
		setTimeout(function() {
            $(".overlay").addClass("d-none");
        }, 1000);
		$('#selected_card').html("");
		$('#selectedcard').val("");
	    $('.card-selection').load(" .card-selection");
	});
	$('input[name="genders"]').click(function () {
		$('input[name="genders"]').next('label').removeClass("checked");
		$('input[name="genders"]:checked').next('label').addClass("checked");
		$('#gender').val($("input[name='genders']:checked").val());
		$('#form_gender').css('display','none');
		$('#form_issue').css('display','block');
	});
	$('input[name="issues"]').click(function () {
		$('input[name="issues"]').next('label').removeClass("checked");
		$('input[name="issues"]:checked').next('label').addClass("checked");
		$('#issue').val($("input[name='issues']:checked").val());
		$('#form_issue').css('display','none');
		$('#form_question').css('display','block');
	}); 
</script>