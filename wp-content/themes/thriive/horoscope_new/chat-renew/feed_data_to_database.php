<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$var = scandir('json_files');
//print_r($var);
$files_array_raw = array();
$files_array = array();
for($i=0;$i<count($var);$i++){
	if(strpos($var[$i], '.json')){
		if(strpos($var[$i], '_')){
			//echo $var[$i].'<br>';
			$files_array_raw[$i] = $var[$i];

		}
	}
}
$inc = 0;
foreach($files_array_raw as $key){
	$files_array[$inc] = $key;
	$inc++;
}

$file_time_array = array();

$base_filename = '/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/';
foreach ($files_array as $key) {

	$file_time_array[filemtime($base_filename.$key)] = $base_filename.$key;
	
}
ksort($file_time_array);
//print_r($file_time_array);

$array_for_js = array();
$inc = 0;
foreach($file_time_array as $key=>$row){
	$array_for_js[$inc] = $row;
	$inc++;
}

//print_r($array_for_js);
$array_for_js_json = json_encode($array_for_js);
//echo $array_for_js_json;
/*
for($i=0;$i<count($files_array);$i++){
	echo $files_array[$i];
	echo $i;
}
*/


?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="curr_msg"></div>

<script>
	
var js_array = JSON.stringify(<?php echo $array_for_js_json;?>);
js_array = JSON.parse(js_array);
var array_for_js_count = <?php echo count($array_for_js);?>;
var string_count = 0;


function feed_data(){

document.querySelector('#curr_msg').innerText = 'executing_current_operation';
$.post('feed.php',{filename:js_array[string_count],action:'feed'}, function(data){if(data && data.search('&') == -1){document.querySelector('#curr_msg').innerText = data;string_count++; setTimeout('init_feed_data()', 1000);}else{document.querySelector('#curr_msg').innerText = data+'else';}});
}

function init_feed_data(){
	if(string_count<js_array.length){
	document.querySelector('#curr_msg').innerText = 'last operation successful executing next';
	setTimeout('feed_data()', 1000);}else{document.querySelector('#curr_msg').innerText = 'Query Limit Reached';}
}

//console.log(js_array[0]);



</script>