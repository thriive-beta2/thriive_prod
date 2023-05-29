<?php
if(count($_GET)>1){
	$customer_number = '+91'.$_GET['customer_number'];
	$k_number = '+91'.$_GET['k_number'];
	$ivr_id = $_GET['ivr_id'];
	$custom_params = $_GET['custom_params'];
}else{
	$customer_number = '+917999886050';
	$k_number = '+917411782154';
	$ivr_id = '1000060521';
	$custom_params = '5,123456';
}

print_r($_GET);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://etsrds.kapps.in/webapi/enterprise/v1/obd_quickcall.py',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('customer_number' => $customer_number,'k_number' => $k_number,'ivr_id' => $ivr_id,'custom_params' => $custom_params,'is_transactional' => 'yes'),
  CURLOPT_HTTPHEADER => array(
    'Authorization: fac5d77a-4ffd-4e02-ad07-3c9f33916bc6'
  ),
));

$response = curl_exec($curl);
print_r($response);
curl_close($curl);
echo $response;

