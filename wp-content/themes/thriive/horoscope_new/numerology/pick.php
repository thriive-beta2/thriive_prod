<?php

require_once 'VedicRishiClient.php';


$num_data = array();

for($i=1;$i<10;$i++){

$data = array(
'date' => 7,
'month' => 03+$i,
'year' => 1988,
'full_name' => "Ajeet"
);

//$resourceName = "numerological_numbers";
$resourceName = "numerological_numbers";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
array_push($num_data, $responseData);


//echo $responseData."<br><br><br><br><br>";
}


$num = count($num_data)+5;
if($num){
$data = array(
'date' => 7,
'month' => $num,
'year' => 1988,
'full_name' => "Ajeet"
);

//$resourceName = "numerological_numbers";
$resourceName = "numerological_numbers";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
array_push($num_data, $responseData);


//echo $responseData."<br><br><br><br><br>";

}

$num =count($num_data);
if($num = 11){
$data = array(
'date' => 18,
'month' => 05,
'year' => 1970,
'full_name' => "Ajeet"
);

//$resourceName = "numerological_numbers";
$resourceName = "numerological_numbers";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
array_push($num_data, $responseData);

//echo $responseData."<br><br><br><br><br>";

}

//print_r(count($num_data));


$lifepath_array= array();
$lifepath = array();


////////////////////////////////////////////////////////////////////
//This if statement is responsible for storing data inside json file
////////////////////////////////////////////////////////////////////

$json_array = array();
echo $num;

if($num){

////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting lifepath number reports [START]
///////////////////////////////////////////////////////////////////////////////////////////////////

for($i=1;$i<10;$i++){
$data = array(
'date' => 7,
'month' => 03+$i,
'year' => 1988,
'full_name' => "Ajeet"
);
$resourceName = "lifepath_number";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$lifepath_pred = json_decode($responseData, TRUE);
array_push($lifepath_array, $responseData);
}

$num = count($num_data)+5;
if($num){
$data = array(
'date' => 7,
'month' => $num,
'year' => 1988,
'full_name' => "Ajeet"
);

$resourceName = "lifepath_number";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
array_push($lifepath_array, $responseData);
}


$num =count($num_data);
if($num = 11){
$data = array(
'date' => 18,
'month' => 05,
'year' => 1970,
'full_name' => "Ajeet"
);

$resourceName = "lifepath_number";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
array_push($lifepath_array, $responseData);

}


$lifepath_keys = array();
foreach($lifepath_array as $key){
	$lifepath_decode = json_decode($key, TRUE);

	$lifepath_report = implode(' ', $lifepath_decode['report']);
	array_push($lifepath_keys, $lifepath_report) ;

}
	$lifepath = array(
		"1" => $lifepath_keys[0],
		"2" => $lifepath_keys[1],
		"3" => $lifepath_keys[2],
		"4" => $lifepath_keys[3],
		"5" => $lifepath_keys[4],
		"6" => $lifepath_keys[5],
		"7" => $lifepath_keys[6],
		"8" => $lifepath_keys[7],
		"9" => $lifepath_keys[8],
		"11" => $lifepath_keys[9],
		"22" => $lifepath_keys[10],
	);
	//print_r($lifepath);

////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting lifepath number reports [END]
//$lifepath contains all the reports for respective lifepath numbers
///////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting Personality number reports [START]
///////////////////////////////////////////////////////////////////////////////////////////////////




$name = '';
$personality_data_array = array();
for($i=0;$i<9;$i++){
	$name = $name.'jo';
	$personality_data_array[$i] = $name;
	
}

for($i=0;$i<9;$i++){

	$data = array(
'date' => 18,
'month' => 05,
'year' => 1970,
'full_name' => $personality_data_array[$i]
);

$resourceName = "personality_number";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$personality_decode = json_decode($responseData, TRUE);
$personality[$personality_decode['personality_number']] = $personality_decode['report'][0];

}

//print_r($personality);

////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting Personality number reports [END]
//$personality contains all the reports for respective personality numbers
///////////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting Expression number reports [START]
///////////////////////////////////////////////////////////////////////////////////////////////////

$name = '';
for($i=0;$i<9;$i++){
	$name = $name.'a';
$expression_number_data_array[$i] = $name;
}

$expression_number_data_array[9] = 'aaaaaaaaaaa';
$expression_number_data_array[10] = 'aaaaaaaaaaaaaaaaaaaaaa';
$expression_number_data_array[11] = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';


for($i=0;$i<12;$i++){
	$data = array(
'date' => 18,
'month' => 05,
'year' => 1970,
'full_name' => $expression_number_data_array[$i]
);

$resourceName = "expression_number";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$expression_number_decode = json_decode($responseData, TRUE);
$expression[$expression_number_decode['expression_number']] = implode(' ', $expression_number_decode['report']);

}
//print_r($expression);


////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting Expression number reports [END]
//$expression contains all the reports for respective expression numbers
///////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting Soul Urge Number reports [START]
///////////////////////////////////////////////////////////////////////////////////////////////////


$name = '';
for($i=0;$i<9;$i++){
	$name = $name.'a';
$soul_urge_number_data_array[$i] = $name;
}

$soul_urge_number_data_array[9] = 'aaaaaaaaaaa';
$soul_urge_number_data_array[10] = 'aaaaaaaaaaaaaaaaaaaaaa';
$soul_urge_number_data_array[11] = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';


for($i=0;$i<12;$i++){
	$data = array(
'date' => 18,
'month' => 05,
'year' => 1970,
'full_name' => $soul_urge_number_data_array[$i]
);

$resourceName = "soul_urge_number";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$soul_urge_number_decode = json_decode($responseData, TRUE);
$soul[$soul_urge_number_decode['soul_urge_number']] = implode(' ', $soul_urge_number_decode['report']);

}

//print_r($soul);

////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting Soul Urge Number reports [END]
//$soul contains all the reports for respective Soul Urge Numbers
///////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting personal_day_prediction reports [START]
///////////////////////////////////////////////////////////////////////////////////////////////////




for($i=1;$i<=20;$i++){
	$data = array(

'date' => 18,
'month' =>$i,
'year' => 1970,
'full_name' => 'default'
);

$resourceName = "personal_day_prediction";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->callAPi($resourceName, $data);
$personal_day_decode = json_decode($responseData, TRUE);
$personal_day_array[$personal_day_decode['personal_day_number']] = $personal_day_decode['report'][0];
}

for($i=1;$i<10;$i++){
	$personal_day[$i]	 = $personal_day_array[$i];
}
$personal_day[11] = $personal_day_array[11];
$personal_day[22] = $personal_day_array[22];

//print_r($personal_day);

////////////////////////////////////////////////////////////////////////////////////////////////////
//code for collecting personal day prediction reports [END]
//$personal_day contains all the reports for respective personal day numbers
///////////////////////////////////////////////////////////////////////////////////////////////////

$json_array = array(
	'lifepath_number' => $lifepath,
	'personality_number' => $personality,
	'expression_number' => $expression,
	'soul_urge_number' => $soul,
	'personal_day_number' => $personal_day
);

$json_array_encode = json_encode($json_array);

//echo $json_array_encode;

$fp = fopen('json_files/fixed_data.json', 'w');
fwrite($fp, $json_array_encode);
fclose($fp);


}



