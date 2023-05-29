<?php /* Template Name: Numerology Front */ 
include_once get_stylesheet_directory().'/new-header.php';
//print_r($_POST);

?>
<?php
if(is_user_logged_in()){
	$user_id = get_current_user_id();
	$metadata = get_user_meta($user_id,$key='',$single=true);
	$user_dob=date('Y/m/d', strtotime($metadata['dob'][0]));
	$user_username;
} 
if(strlen($metadata['dob'][0]>5)){
	$date_data = 1;
}else{
	$date_data = 0;
}
if(strlen($metadata["first_name"][0])>3){
	$name_data = 1;
}else{
	$name_data = 0;
}
	$action = 'action="'.get_site_url().'/numerology-report"';
	$action_id = 'sub-login';
	$month_data = array(
		1 => '<option value="01">January</option>',
		2 => '<option value="02">Febuary</option>',
		3 => '<option value="3">March</option>',
		4 => '<option value="4">April</option>',
		5 => '<option value="5">May</option>',
		6 => '<option value="6">June</option>',
		7 => '<option value="7">July</option>',
		8 => '<option value="8">August</option>',
		9 => '<option value="9">September</option>',
		10=> '<option value="10">October</option>',
		11=> '<option value="11">November</option>',
		12=> '<option value="12">December</option>'
	);
	$month_names = array(
		1 => 'January',
		2 => 'Febuary',
		3 => 'March',
		4 => 'April',
		5 => 'May',
		6 => 'June',
		7 => 'July',
		8 => 'August',
		9 => 'September',
		10=> 'October',
		11=> 'November',
		12=> 'December'
	);
	echo '
			<div class="num-form-container">
			<form class="num-form" method="POST" '.$action.'>
			<h2>Free Personalised</h2>
			<p class="head-break">Numerology Report</p><br>
			<p class="head-cont">
			To start your free personalised reading,
			<br>
			complete The information below
			<br><br>
			</p>
			<input type="text" class="hidden" value="'.$name_data.'" name="name_data">
			<input type="text" class="hidden" value="'.$date_data.'" name="date_data">
			<label for="input_name">Your Name</label><br>
			<input type="text" name="input_name" id="input_name" required placeholder="Enter Name" value="'.$metadata["first_name"][0].' '.$metadata["last_name"][0].'" required>
			<br>
			<div style="margin-bottom:0;"><label>Enter Your Birth Date</label></div>
			<div class="dt main-dt">
			<select name="dob_day" class="s-dt">';
if(is_user_logged_in()  AND strlen($metadata['dob'][0])>5){
for($i=1;$i<32;$i++){
		if($i == date('d', strtotime($metadata['dob'][0]))){
			echo '<option value="'.$i.'" selected="true">'.$i.'</option>';
		}else{
			echo '<option value="'.$i.'">'.$i.'</option>';
		}}}else{
			echo '<option value="day" selected="true" disabled="true">Day</option>';
			for($i=1;$i<32;$i++){
			echo '<option value="'.$i.'">'.$i.'</option>';
		}}
		echo '</select>';


if(is_user_logged_in() AND strlen($metadata['dob'][0])>5){
		echo '<select name="dob_month" class="s-dt"><option>Month</option>';
	for($i=1;$i<13;$i++){
	if($i < date('m',strtotime($metadata['dob'][0]))){
	echo $month_data[$i];
	}elseif($i == date('m',strtotime($metadata['dob'][0]))){
	echo '<option value="'.$i.'" selected = "true">'.$month_names[$i].'</option>';
	}elseif($i > date('m',strtotime($metadata['dob'][0]))){
	echo $month_data[$i];
	}
	}
	}else{
	echo '<select name="dob_month" class="s-dt">
	<option selected="true" disabled="true">Month</option>';
	for($i=1;$i<13;$i++){
	echo '<option value="'.$i.'">'.$month_names[$i].'</option>';
	}	
	}
	echo '</select><select name="dob_year" class="s-dt">';



	if(is_user_logged_in()  AND strlen($metadata['dob'][0])>5){
	for($i=date('Y');$i>=1930;$i--){
	if($i == date('Y', strtotime($metadata['dob'][0]))){
	echo '<option value="'.$i.'" selected="true">'.$i.'</option>';
	}else{
	echo '<option value="'.$i.'">'.$i.'</option>';
	}};
	}else{
	echo '<option value="Year" selected="true" disabled="true">Year</option>';
	for($i=2020;$i>=1930;$i--){
	echo '<option value="'.$i.'">'.$i.'</option>';
	}
	}
	echo '</select></div>';
	if(is_user_logged_in()){
	echo '
	<div style="visibility:hidden;" id="invalid_date_error"><p style="color:red;margin-bottom:-20px;padding:3px;text-align:center;font-size:16px;font-weight:500;">Please Select a valid Date</p></div>
	<div class="form-submit" style="display:none;"><input type="submit" value="Submit" id="sub1" class="btnConsult sub"></div>
	</form></div>
	<div class="form-submit"><input type="button" value="Submit" id="sub2" class="btnConsult sub" onclick="inp_check()"></div>
	</form></div>
	';	
	}else{
	echo '<div class="form-submit"><input type="button" value="Submit" id="sub" class="btnConsult sub"></div></form></div>';
	}
	?>
  <div class="seprator mb-3">
  	<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>

	<div class="ask-ques">
		<h2>Ask a question</h2>
		<p>from our expert Numerologist</p>
		<button class="btnConsult" style="margin-bottom: 1rem;" onclick="window.open('https://www.thriive.in/talk-to-best-numerologist-online?utm_source=numerlogy-tool');">Consult Now</button>
	</div>
	<script>
		var sub_check = document.querySelectorAll('.s-dt');
		var input_name = document.querySelector('#input_name').value;
		if(input_name.trim.length == 0){
			document.querySelector('#input_name').value = "";
		}

		function inp_check(){
        	if(sub_check[0].value == 'Day'){
        	invalid_date();
        	}else if(sub_check[1].value == 'Month'){invalid_date();}else if(sub_check[2].value == 'Year'){
        	invalid_date();
        	}else if(document.querySelector('#input_name').value.trim().length == 0){
        	invalid_name();
        	}else{        document.querySelector('#sub1').dispatchEvent(new MouseEvent('click'));    
        	}
    	}
		function invalid_date(){
		document.querySelector('#invalid_date_error').firstElementChild.innerHTML = "Please Select a valid Date";
    	document.querySelector('#invalid_date_error').style.visibility = "visible";
		setTimeout(function(){document.querySelector('#invalid_date_error').style.visibility = "hidden";}, 3000);
		}
		function invalid_name(){
		document.querySelector('#invalid_date_error').firstElementChild.innerHTML = "Pease Enter a Valid Name";
		document.querySelector('#invalid_date_error').style.visibility = "visible";
		setTimeout(function(){document.querySelector('#invalid_date_error').style.visibility = "hidden";}, 3000);
		}
	</script>
<?php include_once get_stylesheet_directory().'/new-footer.php';?>