<?php /* Template Name: zod-compatibility-form */ 
include_once get_stylesheet_directory().'/new-header.php';
if(is_user_logged_in()){
	$user_id = get_current_user_id();
	$metadata = get_user_meta($user_id,$key = '',$single = true );
	$user_dob = strtotime($metadata['dob'][0]);
	if(strlen($metadata['dob'][0])>3){
$zodiac_array = array(
			0 => 'virgo',
			1 => 'scorpio',
			2 => 'capricorn',
			3 => 'pisces',
			4 => 'taurus',
			5 => 'cancer',
			6 => 'leo',
			7 => 'libra',
			8 => 'sagittarius',
			9 => 'aquarius',
		   10 => 'aries',
		   11 => 'gemini'
		);

 if(date('m/d', $user_dob)<=date('m/d', strtotime("02/18")) AND date('m/d', $user_dob)>=date('m/d', strtotime("01/21"))){$user_zodiac = 9;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("03/19")) AND date('m/d', $user_dob)>=date('m/d', strtotime("02/19"))){$user_zodiac = 3;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("04/19")) AND date('m/d', $user_dob)>=date('m/d', strtotime("03/20"))){$user_zodiac =10;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("05/20")) AND date('m/d', $user_dob)>=date('m/d', strtotime("04/20"))){$user_zodiac = 4;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("06/20")) AND date('m/d', $user_dob)>=date('m/d', strtotime("05/21"))){$user_zodiac =11;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("07/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("06/21"))){$user_zodiac = 5;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("08/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("07/23"))){$user_zodiac = 6;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("09/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("08/23"))){$user_zodiac = 0;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("10/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("09/23"))){$user_zodiac = 7;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("11/21")) AND date('m/d', $user_dob)>=date('m/d', strtotime("10/23"))){$user_zodiac = 1;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("12/21")) AND date('m/d', $user_dob)>=date('m/d', strtotime("11/22"))){$user_zodiac = 8;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("12/31")) AND date('m/d', $user_dob)>=date('m/d', strtotime("12/22"))){$user_zodiac = 2;}
else if(date('m/d', $user_dob)<=date('m/d', strtotime("01/21")) AND date('m/d', $user_dob)>=date('m/d', strtotime("01/01"))){$user_zodiac = 2;}



}else{
	if(strpos(json_encode($_COOKIE), '^')>1){
	$str1 = strpos(json_encode($_COOKIE), '^').'test<br>';
	$str2 = strrpos(json_encode($_COOKIE), '^').'test<br>';
	$str3 = $str2-$str1;
	$str4 = substr(json_encode($_COOKIE), $str1+1, $str3-1);
	$str_array = explode(',', $str4);
	$user_dob = '1/1/2020';
	$zodiac_array[$user_zodiac] = strtolower($str_array[0]);
	$partner_zodiac = strtolower($str_array[1]);
	}
}}else{
	if(strpos(json_encode($_COOKIE), '^')>1){
	$str1 = strpos(json_encode($_COOKIE), '^').'test<br>';
	$str2 = strrpos(json_encode($_COOKIE), '^').'test<br>';
	$str3 = $str2-$str1;
	$str4 = substr(json_encode($_COOKIE), $str1+1, $str3-1);
	$str_array = explode(',', $str4);
	$user_dob = '1/1/2020';
	$zodiac_array[$user_zodiac] = strtolower($str_array[0]);
	$partner_zodiac = strtolower($str_array[1]);
	}}

?>

<div class="main-container">
	<div class="chosen-zod">
		<form method="POST" action="<?php echo get_site_url()?>/zodiac-signs-compatibility-report">
			<h1>Love Compatibility</h1>
			<div class="first-zod" id="first-zod">
				<?php
					if($user_dob){
						echo '<img src="'.get_site_url().'/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/'.$zodiac_array[$user_zodiac].'.svg" id="first-selection"><br><input type="text" name="first-selecion" id="first-input" value="'.$zodiac_array[$user_zodiac].'">
				<p class="select_sign">'.ucfirst($zodiac_array[$user_zodiac]).'</p><script>var default_selection = 1;</script>';
					}else{
						echo '<img src="'.get_site_url().'/wp-content/themes/thriive/horoscope_new/Compatibility/images/no-selection.png" id="first-selection" style="border:2px solid;"><br><input type="text" name="first-selecion" id="first-input" value="">
							<p class="select_sign">Select Your Sign</p><script>var default_selection = 0;</script>';
					}
				?>
					
			</div>
			<div class="first-zod plus">
				<p class="plus-sign">+</p>	
			</div>

			<div class="first-zod" id="second-zod">
				<?php if($partner_zodiac){
					echo '<img src="'.get_site_url().'/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/'.$partner_zodiac.'.svg" id="second-selection" style="">
				<input type="text" name="second-selection" id="second-input" value="'.$partner_zodiac.'">
				<p class="select_sign">'.ucfirst($partner_zodiac).'<script>var default_selection2 = 1;</script></p>';
				}else{
					echo '<img src="'.get_site_url().'/wp-content/themes/thriive/horoscope_new/Compatibility/images/no-selection.png" id="second-selection" style="border:2px solid;">
				<input type="text" name="second-selection" id="second-input" value="">
				<p class="select_sign">Select Partner Sign</p><script>var default_selection2 = 0;</script>';

				}?>
				
			</div><br>
			<?php if(is_user_logged_in()){
				echo '<button type="button" id="zod-sub" class="btncom login1" onClick="check_partner();">Compatibility</button>';
			}else{
				echo '<button type="button" id="zod-sub" class="btncom login0" onClick="set_cookie()">Compatibility</button>';
			}
			?>
			<button type="button" onclick="reset_zod();" class="btnresetzod"><u>Reset</u></button>
		</form>
		<div style="text-align: center; width: 100%;color: red;visibility: hidden;margin-top: 5px;margin-bottom: 5px;" id="Err_msg">Please press reset to change Zodiac sign</div>
	</div>
	<div class=zod-list>
		<h3>Choose the Zodiac Sign</h3>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aries.svg" id="Aries" value="Aries" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aries</p><p class="zod_dob">3/21 - 4/19</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/taurus.svg" id="Taurus" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Taurus</p><p class="zod_dob">4/20 - 5/20</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/gemini.svg" id="Gemini" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Gemini</p><p class="zod_dob">5/21 - 6/20</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/cancer.svg" id="Cancer" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Cancer</p><p class="zod_dob">6/21 - 7/22</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/leo.svg" id="Leo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Leo</p><p class="zod_dob">7/23 - 8/22</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/virgo.svg" id="Virgo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Virgo</p><p class="zod_dob">8/23 - 9/22</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/libra.svg" id="Libra" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Libra</p><p class="zod_dob">9/23 - 10/22</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/scorpio.svg" id="Scorpio" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Scorpio</p><p class="zod_dob">10/23 - 11/21</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/sagittarius.svg" id="Sagittarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Sagittarius</p><p class="zod_dob">11/22 - 12/21</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/capricorn.svg" id="Capricorn" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Capricorn</p><p class="zod_dob">12/22 - 1/19</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aquarius.svg" id="Aquarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aquarius</p><p class="zod_dob">1/20 - 2/18	</p>	
		</div>
		<div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/pisces.svg" id="Pisces" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Pisces</p><p class="zod_dob">2/19 - 3/20	</p>	
		</div>
	</div>
</div>
 <div class="seprator mb-3">
  <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>
<div class="ask-ques">
		<h2 style="font-size: 14px !important; ">Know with whom you share the best and worst relations with, based on your Zodiac Sign from our expert Astrologer</h2>
		<p></p>
		<button class="btnConsult" style="margin-bottom: 1rem;" onclick="window.open('<?php echo get_site_url();?>/talk-to-best-astrologer-online');">Consult Now</button>
	</div>

<script>

	if(default_selection == 1){
		var first_selection = 1;	
	}else{
		var first_selection = 0;
	}
	if(default_selection2 == 1){
		var second_selection = 1;	
	}else{
		var second_selection = 0;
	}	

	function reset_zod(){
		first_selection = 0;
		second_selection = 0;
		document.querySelector('#first-selection').src = '<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/no-selection.png';
    	document.querySelector('#first-zod p').innerText = 'Select Your Sign';
    	document.querySelector('#second-selection').src = '<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/no-selection.png';
    	document.querySelector('#second-zod p').innerText = 'Select Partner Sign';
    	document.querySelector('#first-selection').style.border = '2px solid';
    	document.querySelector('#second-selection').style.border = '2px solid';
    	document.querySelector('#zod-sub').type = "button";
	}
	function doit(link, val){
    if(first_selection == 0){
    	first_selection = 1;
    	document.querySelector('#first-selection').src = link;
    	document.querySelector('#first-zod p').innerText = val;
    	document.querySelector('#first-input').value = val;
    	document.querySelector('#first-selection').style.border = 'none';
	}else if(second_selection == 0 & first_selection == 1){
		second_selection =1;
		document.querySelector('#zod-sub').type = "submit";
		document.querySelector('#second-selection').src = link;
    	document.querySelector('#second-zod p').innerText = val;
    	document.querySelector('#second-input').value = val;
    	document.querySelector('#second-selection').style.border = 'none';
    	
	}else if(first_selection == 1 & second_selection == 1){
		Err_msg();
	}
}
	function set_cookie(){
		var temp_zod1 = document.querySelectorAll('.select_sign')[0].innerText;
		var temp_zod2 = document.querySelectorAll('.select_sign')[1].innerText;
		if(temp_zod1 != "Select Your Sign" && temp_zod2 != "Select Partner Sign"){
		var cookie_text = '^'+temp_zod1+','+temp_zod2+'^';
		document.cookie = cookie_text;
		
	}
	}
	function Err_msg(){
    if(document.querySelector('#Err_msg').style.visibility == 'hidden' || document.querySelector('#Err_msg').style.visibility == ""){
    document.querySelector('#Err_msg').innerText = 'Please press reset to change Zodiac sign';
    document.querySelector('#Err_msg').style.visibility = 'visible';
	}else{document.querySelector('#Err_msg').style.visibility = 'hidden';}
    setTimeout(function(){document.querySelector('#Err_msg').style.visibility = 'hidden';}, 3000);
	}

	function check_partner(){
	if(document.querySelector('.select_sign').innerText == "Select Your Sign"){
		if(document.querySelector('#Err_msg').style.visibility == 'hidden' || document.querySelector('#Err_msg').style.visibility == ""){
    document.querySelector('#Err_msg').innerText = 'Please Select Your Sign';
    document.querySelector('#Err_msg').style.visibility = 'visible';
	}else{document.querySelector('#Err_msg').style.visibility = 'hidden';}
    setTimeout(function(){document.querySelector('#Err_msg').style.visibility = 'hidden';}, 3000);
	}else if(document.querySelectorAll('.select_sign')[1].innerText == "Select Partner Sign"){
	if(document.querySelector('#Err_msg').style.visibility == 'hidden' || document.querySelector('#Err_msg').style.visibility == ""){
    document.querySelector('#Err_msg').innerText = 'Please Select Partner Sign';
    document.querySelector('#Err_msg').style.visibility = 'visible';
	}else{document.querySelector('#Err_msg').style.visibility = 'hidden';}
    setTimeout(function(){document.querySelector('#Err_msg').style.visibility = 'hidden';}, 3000);
	}}

</script>
<?php include_once get_stylesheet_directory().'/new-footer.php';?>