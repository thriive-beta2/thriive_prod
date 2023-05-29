<?php /* Template Name: Numerology Report */ ?>

<?php
require_once 'horoscope_new/VedicRishiClient.php';

if(!is_user_logged_in()){
	header("Location: https://www.thriive.in/numerology-predictions");
}



include_once get_stylesheet_directory().'/new-header.php';
//echo 'test';

$day = $_POST['dob_day'];
$month = $_POST['dob_month'];
$year = $_POST['dob_year'];
$name = $_POST['input_name'];
$data_status = $_POST['date_data'];
$name_status = $_POST['name_data'];



$user = get_current_user_id();




if(count($_POST)<1){ 
	//echo 'true';
	$query = "SELECT * FROM user_numerology_activity_data WHERE user_id = $user ORDER BY SID DESC LIMIT 1" ;
	$res = $wpdb->get_results($query, ARRAY_A);
	$arr = explode("/", $res[0]['searched_date']);
	$day = $arr[1];
	$month = $arr[0];
	$year = $arr[2];
	$name = $
	$name = $res[0]['searched_name'];
	//print_r($name);
}





//[START] This code enters the data in log table

$searched_date =$month.'/'.$day.'/'.$year;
$compare_date = $res[0]['searched_date'];

if($compare_date == $searched_date && $res[0]['searched_name'] == $name){
	//echo 'same same';
}else{
$log_query = "INSERT INTO user_numerology_activity_data (user_id, searched_date, searched_name) VALUES ('$user', '$searched_date', '$name')";
$wpdb->query($log_query);
//echo $log_res;
}

//[END] This code enters the data in log table









$dob = '"'.$month.'/'.$day.'/'.$year.'"';
if($data_status == 0){
	

	$query = "SELECT * FROM wp_usermeta WHERE user_id = $user AND meta_key = 'dob'";
	$res = $wpdb->get_results($query, ARRAY_A);
	$meta_id = $res[0]['umeta_id'];


	if(!$res){
		$query = "INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES ('$user', 'dob', $dob)";
		$wpdb->query($query);
		//echo $res;
	}else{
		$query = "UPDATE wp_usermeta SET meta_value = $dob WHERE umeta_id = $meta_id";
		$wpdb->query($query);
		//echo $res;
	}
}

if($name_status == 0){
	

	$query = "SELECT * FROM wp_usermeta WHERE user_id = $user AND meta_key = 'first_name'";
	$res = $wpdb->get_results($query, ARRAY_A);
	$meta_id = $res[0]['umeta_id'];
	$update_name = '"'.$name.'"';

	if(!$res){
		$query = "INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES ('$user', 'first_name', $update_name)";
		$wpdb->query($query);
		//echo $res;
	}else{
		$query = "UPDATE wp_usermeta SET meta_value = $update_name WHERE umeta_id = $meta_id";
		//print_r($query);
		$wpdb->query($query);
		//echo 'name';
		//echo $res;
	}
}








$data = array(
'date' => $day,
'month' => $month,
'year' => $year,
'full_name' => $name
);

$resourceName = "numerological_numbers";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$numerology = json_decode($responseData, TRUE);
$numerology['challenge_numbers'] = implode(',', $numerology['challenge_numbers']);







$data = array(
'date' => $day,
'month' => $month,
'year' => $year,
'full_name' => $name
);

$resourceName = "personal_day_prediction";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$personal_day = json_decode($responseData, TRUE);





?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta  name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">

</head>
<body>
	<div class="report-container">
		<h2>Your Numerology Report</h2>
			<div class="head-box">
				<a href=<?php echo '"https://www.thriive.in/detailed-numerology-report/?report=personal_day_number&num='.$personal_day['personal_day_number'].'"';?>><div class="num-box head-num" style="overflow: hidden;"><p class="main-p" ><p  class="inner-text" style="color:#6e0092 !important;">Personal<br>Numerology<br>Prediction</p><div class="inner" style="color:#282560;text-decoration: underline;text-decoration-color: #282560 ;text-underline-offset:2px;"><?php echo $personal_day['personal_day_number'];?></div></p></div></a>
			</div>

			<table class="box-table" cellspacing="5 !important" >
				<tr><td style="">
					<a href=<?php echo '"https://www.thriive.in/detailed-numerology-report/?report=lifepath_number&num='.$numerology['lifepath_number'].'"';?>><div class="num-box"><p class="main-p"><p class="inner-text">Lifepath<br>Number</p><div class="inner" style="color:#fe7c7c !important;text-decoration: underline;text-decoration-color: #fe7c7c ;text-underline-offset:2px;"><?php echo $numerology['lifepath_number'];?></div></p></div></a>
				</td><td>
					<a href=<?php echo '"https://www.thriive.in/detailed-numerology-report/?report=personality_number&num='.$numerology['personality_number'].'"';?>><div class="num-box"><p class="main-p"><p class="inner-text"  >Personality Number</p><div class="inner" style="color:#feae60 !important;text-decoration: underline;text-decoration-color: #feae60 ;text-underline-offset:2px;"><?php echo $numerology['personality_number'];?></div></p></div></a></a>
				</td></tr>

				<tr><td>
					<a href=<?php echo '"https://www.thriive.in/detailed-numerology-report/?report=expression_number&num='.$numerology['expression_number'].'"';?>><div class="num-box"><p class="main-p"><p class="inner-text" >Expression Number</p><div class="inner" style="color:#beb302 !important;text-decoration: underline;text-decoration-color: #beb302 ;text-underline-offset:2px;"><?php echo $numerology['expression_number'];?></div></p></div></a>
				</td><td>
					<a href=<?php echo '"https://www.thriive.in/detailed-numerology-report/?report=soul_urge_number&num='.$numerology['soul_urge_number'].'"';?>><div class="num-box"><p class="main-p"><p class="inner-text">Soul Urge<br>Number</p><div class="inner" style="color:#60d0fe !important;text-decoration: underline;text-decoration-color: #60d0fe ;text-underline-offset:2px;"><?php echo $numerology['soul_urge_number'];?></div></p></div></a>
				</td></tr>

				<tr><td>
					<div class="num-box"><p class="main-p"><p class="inner-text">Subconscious Number</p><div class="inner" style="color:#8960fe !important;"><?php echo $numerology['subconscious_self_number'];?></div></p></div>
				</td><td>
					
					<div class="num-box"><p class="main-p"><p class="inner-text">Challenge Numbers</p><div class="inner challenge" style="color:#0b7e85 !important;"><?php echo $numerology['challenge_numbers'];?></div></p></div>
				</td></tr>

		</table>
	</div>

  <div class="seprator mb-3">
  	<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>

<div class="ask-ques">
	<h2>Ask a question</h2>
	<p>from our expert Numerologist</p>
	<button class="btnConsult" style="margin-bottom: 1rem;" onclick="window.open('https://www.thriive.in/talk-to-best-numerologist-online?utm_source=numerlogy-tool');">Consult Now</button>
</div>

<?php include_once get_stylesheet_directory().'/new-footer.php';?>