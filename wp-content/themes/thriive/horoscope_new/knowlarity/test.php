<?php

$curl = curl_init();
$cdate = '2021-04-16';
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://thriive.in/wp-content/themes/thriive/horoscope_new/knowlarity/fetch_data_for_beta.php?auth=fetch123&cdate='.$cdate,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


/*
$url = 'https://thriive.in/knowlarity/?call_date=1&call_time=1&customer_status=1&customer_number=1&call_duration=1&call_uuid=1&call_status=1';
$ch = curl_init($url);
$result = curl_exec($ch);
//echo  $result;
curl_close($ch);
    */
?>