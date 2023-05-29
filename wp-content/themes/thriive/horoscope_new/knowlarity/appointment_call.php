<?php
require '/var/www/html/wp-config.php';
global $wpdb;
//if(wp_get_current_user()->roles[0] == 'administrator'){
if($_POST['API_key'] == 'ugfvsuhgghvhyugkysvghuvbkerlgunkhsvoawn'){
	
//print_r($_POST);

$agent = '+91'.$_POST['agent'];
$customer = '+91'.$_POST['customer'];
$time = $_POST['timer'];
$payment_id = $_POST['payment_id'];
$POST_fields = '{
  "k_number": "+917411782154",
  "agent_number": "'.$agent.'",
  "customer_number": "'.$customer.'",
  "caller_id": "+918048891009",
  "additional_params":{"object_id": "1","user_id": "2", "call_log_id" : 1,"timeout":"'.$time.'"}
}';

$userdata = $wpdb->get_row("SELECT user_id FROM wp_usermeta WHERE meta_key = 'mobile' AND meta_value = '".$_POST['customer']."'");
$uid = $userdata->user_id; 

$therapistdata = $wpdb->get_row("SELECT user_id FROM wp_usermeta WHERE meta_key = 'mobile' AND meta_value = '".$_POST['agent']."'");
$tid = $therapistdata->user_id; 


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/makecall',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$POST_fields,
  CURLOPT_HTTPHEADER => array(
    'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
    'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
if(strpos($response, 'success')>0){
  echo json_encode(array('status' => 'success'));
}

}
 