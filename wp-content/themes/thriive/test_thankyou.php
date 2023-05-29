<?php /* Template Name: test_thankyou */

/* $curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://konnectprodstream3.knowlarity.com:8200/update-stream/28637081-d7a7-4bf5-96aa-c79fbf2aba42/konnect?source=router",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    'authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
	'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE'
  ),
));

$response = curl_exec($curl);

$callresp = json_decode($response,true);
echo "<pre>";print_r($callresp); */
/*
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
  CURLOPT_POSTFIELDS =>json_encode($data),
  CURLOPT_HTTPHEADER => array(
	'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
	'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
	'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$callresp = json_decode($response,true);
print_r($callresp);exit();
 */
?>

<script>
URL = "https://konnect.knowlarity.com:8100/update-stream/28637081-d7a7-4bf5-96aa-c79fbf2aba42/konnect"
source = new EventSource(URL);
source.onmessage = function (event) {
	var data = JSON.parse(event.data)
	console.log('Received an event .......');
	console.log(data);
}

</script>






