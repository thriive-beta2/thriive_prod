<?php
if(!$_GET['call_date'] || !$_GET['call_time'] || !$_GET['customer_status'] || !$_GET['customer_number'] || !$_GET['call_duration'] || !$_GET['call_uuid'] || !$_GET['call_status']){
	$e_array = array(
		'status' => 'failed',
		'call_status' => 'Invalid Parameters'
	);
	$response = json_encode($e_array);
	echo $response;	

}else{
	$optional_array = array(
		0 => 'customer_call_duration',
		1 => 'call_transfer_duration',
		2 => 'call_transfer_status',
		3 => 'agent_list',
		4 => 'agent_number',
		5 => 'menu',
		6 => 'recording_url',
		7 => 'client_variable_1',
		8 => 'client_variable_2' 
	);

	for($i=0;$i<count($optional_array);$i++){
		if(!$_GET[$optional_array[$i]]){
			$_GET[$optional_array[$i]] = '';
		}else{};
	}

//print_r($_GET);



	$array1 = array(
		'status' => 'success',
		'request_id' => '1234-1234-123-123-12345678'
	);
	$response = json_encode($array1);
	echo $response;
}

 
?>