<?php /* Template Name: zod-compatibility-report */ ?>

<?php
if(is_user_logged_in()){

if(count($_POST)<1){
	if(!isset($_COOKIE['zod_data'])){
		header("Location: ".get_site_url()."/zodiac-signs-compatibility");
	}else{
		$zod_cookie_array = explode(',', $_COOKIE['zod_data']);
		$zod_one = $zod_cookie_array[0];
		$zod_two = $zod_cookie_array[1];
	}	
}else{
	$zod_one = $_POST['first-selecion'];
	$zod_two = $_POST['second-selection'];
}}else{
	header("Location: ".get_site_url()."/zodiac-signs-compatibility");
}


include_once get_stylesheet_directory().'/new-header.php';
setcookie('zod_data', $zod_one.','.$zod_two, time() + (86400 * 30), "/");
require_once 'horoscope_new/VedicRishiClient.php';
$data = array(
'zodiacName' => 'Taurus',
'partnerZodiacName' => 'Gemini'
);
$resourceName = "zodiac_compatibility/".$zod_one."/".$zod_two."";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callApi($resourceName,$data);
$array_json = json_decode($responseData, TRUE);
?>

	<button class="back-btn" onClick="window.location = <?php echo '`'.get_site_url();?>/zodiac-signs-compatibility`" style="position:relative">< BACK</button>

<div class="main-container">
<div class="chosen-zod">
			<h1>Love Compatibility for</h1>
			<div class="first-zod" id="first-zod">
				<img src=<?php echo get_site_url().'/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/'.strtolower($array_json['your_sign']).'.svg"'?> id="first-selection"><br>
				<p  class="zodsign"><?php echo $array_json['your_sign']?></p>	
			</div>
			<div class="first-zod plus-first-zod">
				<p class="plus-sign">+</p>	
			</div>
			
			<div class="first-zod" id="second-zod">
				<img src=<?php echo get_site_url().'/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/'.strtolower($array_json['your_partner_sign']).'.svg"'?> id="second-selection">
				<p class="zodsign"><?php echo $array_json['your_partner_sign']?></p>
			</div><br>
			<div style="display:flex;justify-content: center">
			<div class="pi">
			<div class="chart-inner">
			</div>
			</div><div style="line-height: 3rem;font-weight: bold;margin-left:10px;font-size:20px;"><?php echo $array_json['compatibility_percentage']?>%</div>
			</div>
			<div class="percent-compatibility">
				<p><b>Overall Compatibility</b></p>
				</div>
				<p class="comp-report"><?php echo $array_json['compatibility_report']?></p>
			
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
<script type="text/javascript">
	var comp_perc = <?php echo $array_json['compatibility_percentage']?>;
	var full = 360;
	var per = (360*comp_perc)/100;
	document.querySelector('.pi').style.background = "conic-gradient(#C70039 "+per+"deg,#FF8EB7 0)";
	function goBack() {
  	window.history.back()
	}

</script>

<?php include_once get_stylesheet_directory().'/new-footer.php';?>