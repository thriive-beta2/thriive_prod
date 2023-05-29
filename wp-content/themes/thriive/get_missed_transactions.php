<?php /* Template Name: missed Transaction page */ 


$var1 = $_REQUEST['txnid']; 
//print_r($_REQUEST);
//$var2 = '2021-03-09 11:00:00';
$hash_string = 'fsZR5l|verify_payment|'.$var1.'|C0SiMqcB';
$hash = strtolower(hash('sha512', $hash_string)); 
$data['key'] = 'fsZR5l';
$data['command'] = 'verify_payment';
$data['hash'] = $hash;  
$data['var1'] = $var1;
//$data['var2'] = $var2; 
$endpoint = 'https://www.thriive.in/testapi'; 
$url = 'https://info.payu.in/merchant/postservice.php?form=2';
// Initializes a new cURL session
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

        
// Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  $data);

// Execute cURL request with all previous settings
//curl_setopt($curl, CURLOPT_URL, $endpoint);
$response = curl_exec($curl);
$alldata = json_decode($response,true);
$data = array();
echo "<pre>";print_r($alldata['transaction_details']);
foreach($alldata['transaction_details'] as $ad){
	$data['txnid'] = $ad['txnid'];
	$data['payuid'] = $ad['mihpayid'];
	$data['transaction_amount'] = $ad['transaction_amount'];
	$data['productinfo'] = $ad['productinfo'];
	$data['firstname'] = $ad['firstname'];
	$data['udf1'] = $ad['udf1'];
	$data['udf2'] = $ad['udf2'];
	$data['udf3'] = $ad['udf3'];
	$data['created_date'] = $ad['addedon'];
	$data['payment_status'] = $ad['status']; 
	$data['bank_ref_no'] = $ad['bank_ref_num'];
	
}



//print_r($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $endpoint);
// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

        
// Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  $data);

// Execute cURL request with all previous settings
//curl_setopt($curl, CURLOPT_URL, $endpoint);
$response = curl_exec($curl);

/* $entityBody = file_get_contents('https://beta1.thriive.in/testapi');
print_r($entityBody);
$entityBody = explode("&", $entityBody);
echo $entityBody[1]; */
/* $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl); */
// Close cURL session
 //curl_setopt($curl, CURLOPT_URL, $endpoint);
// $response = curl_exec($curl);
 //$alldata = json_decode($response,true);
//echo "<pre>";print_r($alldata);
//echo "<pre>";print_r($alldata);


// Execute cURL request with all previous settings
//curl_setopt($curl, CURLOPT_URL, $endpoint);
//$response = curl_exec($curl);

