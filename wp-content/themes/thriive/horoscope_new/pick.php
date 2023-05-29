<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once 'VedicRishiClient.php';
require_once '/var/www/html/wp-config.php';


global $wpdb;

$horo_array = array();
for($i=1;$i<=12;$i++){



$data = array(
'date' => $i+11,
'month' => $i,
'year' => "1988",
'hour' => 4,
'minute' => 0,
'latitude' => 25.123,
'longitude' => 82.34,
'timezone' => 5.5
);


$resourceName = "daily_nakshatra_prediction";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);
//echo $responseData;

$array_one = json_decode($responseData, TRUE);

//print_r($array_one);
//echo $array_one["birth_moon_sign"];
//echo "<h1>".$i."</h1>";
//echo "<br><br>";
//$array_two = array($array_one['birth_moon_sign']=>$array_one['prediction']);
array_push($horo_array, $array_one);
//print_r($horo_array);

}





$array_one_json = json_encode($horo_array);
//print_r($horo_array[0]);




//print_r($horo_array[0]['Virgo']['luck']);
//print_r($horo_array[0]['prediction']['luck']);


//print_r($horo_array);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
$fp = fopen("/var/www/html/wp-content/themes/thriive/horoscope_new/json_files/".date('Y-m-d')."-daily_predictions.json", "w");
fwrite($fp, $array_one_json);
fclose($fp);

$date_curr = date('Y-m-d');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$replace_array_one_json = str_replace("'", '#', $array_one_json);

$insert = "INSERT INTO zodiac_data (pick_date , data) values ('$date_curr' , '$replace_array_one_json')";
$res = $wpdb->query($insert);
echo $res;

//echo count($horo_array);
//echo "<br><h1>".$array_one['sun_sign'];
//echo "<br><h3>".$array_one['prediction']['luck'];
//echo "<br><h1>".$array_one['luck'];
?>