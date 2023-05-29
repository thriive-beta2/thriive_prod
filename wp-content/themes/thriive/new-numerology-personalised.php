<?php /* Template Name: Numerology Personalised */ ?>
<?php  
include_once get_stylesheet_directory().'/new-header.php';


if(!is_user_logged_in()){
	header("Location: https://www.thriive.in/numerology-predictions");
}



$get_report = $_GET['report'];
$get_num =  intval($_GET['num']);
//print_r($_REQUEST);

if(fopen(get_site_url()."/wp-content/themes/thriive/horoscope_new/numerology/json_files/fixed_data.json", 'r')){
	
	$json_file_content = file_get_contents(get_site_url()."/wp-content/themes/thriive/horoscope_new/numerology/json_files/fixed_data.json");
	$numerology = json_decode($json_file_content, TRUE);
	//print_r($numerology);
	//echo 'true';
}else{header("Location: https://www.thriive.in/numerology-predictions");};

//echo get_site_url()."/wp-content/themes/thriive/horoscope_new/numerology/json_files/fixed_data.json";


$report_format = str_replace('_', ' ', $get_report);
$report_format = ucwords($report_format);


$spell_number = array(
	1 => 'One',
	2 => 'Two',
	3 => 'Three',
	4 => 'Four',
	5 => 'Five',
	6 => 'Six',
	7 => 'Seven',
	8 => 'Eight',
	9 => 'Nine',
	11 => 'Eleven',
	22 => 'Twenty Two',
	33 => 'Thirty Three'
	);
?>

<!DOCTYPE html>
<html>
<head>

	<meta  name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	<title></title>
</head>
<body>

<div class="report-wrapper">
<button class="back-btn" onClick="goBack();">< BACK</button>
<div class="report-head">
<h2><?php echo $report_format;?></h2>
</div>
<div class="report-number">
<div><p><?php echo $get_num;?></p></div><p class="alphanumeric"><?php echo $spell_number[$get_num];?></p>
</div>
<div class="report-text">
	<p>
		<?php if(isset($numerology[$get_report][$get_num])){echo $numerology[$get_report][$get_num];}else{echo 'You Are Extra Ordinary';}?>
	</p>
</div>




</div>

<script type="text/javascript">
	function goBack() {
  window.history.back()
}
</script>
  <div class="seprator mb-3">
  <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>

	<div class="ask-ques">
		<h2>Ask a question</h2>
		<p>from our expert Numerologist</p>
		<button class="btnConsult" style="margin-bottom: 1rem;" onclick="window.open('https://www.thriive.in/talk-to-best-numerologist-online?utm_source=numerlogy-tool');">Consult Now</button>
	</div>

<?php include_once get_stylesheet_directory().'/new-footer.php';?>