<?php require '/var/www/html/wp-config.php';


/*$read = "SELECT data FROM zodiac_data ORDER BY SID DESC LIMIT 1";
	$read_query = $wpdb->get_results($read, ARRAY_A);
	$json_contents = str_replace('#', "'", $read_query[0]['data']);
	$json_horo = json_decode($json_contents, TRUE);
	echo ($json_contents);
*/


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 

        $uname = 'Akash';
        $time = '5';
        $tempid = '1007626109948372388';
        $tmsg = $uname." has booked a Video Meditation session for ".$time.". Answer the video call from +91 8048891009 to start your session.Love & Light - Thriive Wellness.";
        sendSMS('7999886050',$tmsg,$tempid);
        $subject = 'New';
        //sendEmail('akash@thriive.in', $subject, $tmsg);
  


//print_r(wp_get_current_user()->data->user_login);



?>








<?php
/*
$tid = 22343;
$date = '2021-07-30';
function curr_date($tid,$date){
  global $wpdb;
$query = "SELECT * FROM online_consultation LEFT JOIN chat_call_conf ON online_consultation.id = chat_call_conf.oc_id WHERE tid=$tid AND created_date LIKE '%$date%' ORDER BY online_consultation.id DESC";
$res = $wpdb->get_results($query);
$JSON = json_encode($res);
echo $JSON;
}
curr_date($tid,$date);
*/
?>


<table>
<tr><td>tid</td><td>tname</td><td>temail</td><td>Session Count</td><td>Reject</td></tr>

<?php
/*
$query = "SELECT DISTINCT tid, MAX(tname) as tname, MAX(temail) as temail, MAX(created_date) as created_date FROM online_consultation WHERE created_date > '2021-07-01 00:00:00' GROUP BY tid ORDER BY created_date DESC";
$res = $wpdb->get_results($query);
  

foreach($res as $key){
  $tid = $key->tid;
  $query = "SELECT DISTINCT tid, MAX(tname) as tname, MAX(temail) as temail, COUNT(tid) as count  FROM online_consultation WHERE created_date > '2021-07-01 00:00:00' AND tid=$tid GROUP BY tid";
  $res1 = $wpdb->get_results($query);
//print_r($res1);
  $query1 = "SELECT DISTINCT tid, MAX(tname) as tname, MAX(temail) as temail, COUNT(tid) as count FROM online_consultation WHERE created_date > '2021-07-01 00:00:00' AND tid=$tid AND (tid_accept='-2' OR tid_accept='2') AND (uid_accept='-2' OR uid_accept='-3' OR uid_accept='0')  GROUP BY tid";
  $res2 = $wpdb->get_results($query1);
//echo $query1.'<br>';
//print_r($res2);
//echo '<br>';
echo '<tr><td>'.$res1[0]->tid.'</td><td>'.$res1[0]->tname.'</td><td>'.$res1[0]->temail.'</td><td>'.$res1[0]->count.'</td><td>';

if(count($res2)<1){
echo '0</td></tr>';
}else{
echo $res2[0]->count.'</td></tr>';  
}

}


*/



?>
</table>













<table>
<tr><td>Txnid</td><td>uid</td><td>uname</td><td>uemail</td><td>Session Count</td><td>mobile</td><td>amount</td></tr>



<?php

//$query = "SELECT DISTINCT uid, MAX(uname) as uname,MAX(uemail) as uemail, COUNT(uid) as Cuid FROM online_consultation LEFT JOIN wp_usermeta ON online_consultation.uid = wp_usermeta.user_id AND wp_usermeta.meta_value = 'mobile' GROUP BY online_consultation.uid WHERE online_consultation.created_date > '2021-10-01 00:00:00'";
//$query = "SELECT DISTINCT uid, MAX(uname) as uname,MAX(uemail) as uemail, COUNT(uid) as Cuid FROM online_consultation_archive WHERE created_date > '2020-10-01 00:00:00' GROUP BY online_consultation_archive.uid;";
/*
$query = "SELECT DISTINCT payment_txnid,MAX(uid) as uid, MAX(uname) as uname,MAX(uemail) as uemail, COUNT(uid) as Cuid,MAX(amount) as amount,MAX(payment_status) as payment_status FROM online_consultation WHERE created_date > '2021-09-01 00:00:00' AND created_date < '2021-10-11 00:00:00' AND payment_status = 'success' GROUP BY online_consultation.payment_txnid";
$res = $wpdb->get_results($query);

$query = "SELECT * FROM wp_usermeta WHERE meta_key = 'mobile'";
$res1 = $wpdb->get_results($query);

//print_r($res1);

foreach($res as $key){
  //print_r($key);
  echo "<tr><td>".$key->payment_txnid."</td><td>".$key->uid."</td><td>".$key->uname."</td><td>".$key->uemail."</td><td>".$key->Cuid."</td>";

  foreach($res1 as $key1){
    if($key1->user_id == $key->uid){
      //print_r($key1);
      echo "<td>".$key1->meta_value."</td>";
      break 1;
    }else{
      ;
    }
  }
//echo '<br>';
echo "<td>".$key->amount."</td></tr>";


}

//include_once get_stylesheet_directory().'/new-header.php';
$basePath = '/var/www/html';
//require $basePath.'/wp-config.php';
?>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<button onclick="test();">click</button>
<script>

function test(){
	$.post("horoscope_new/chat-renew/php/test.php",
          {action:'add_remaining_session'},
          function(data){            
            if(data){
              console.log(data);
            }
          }
        );
}

</script>





<?php



*/



/*
	$customer_number = '7999886050';
	$k_number = '8035387035';
	$ivr_id = '1000060521';
	$custom_params = '5,123456';
	$duration = 5;
	$ocid = 12345;

      $fp = fopen("/var/www/html/wp-content/themes/thriive/horoscope_new/qiuckcall/logs/therapist-log.json", "a");
      fwrite($fp, 'intoit');
      fclose($fp);

*/



/*
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

curl_close($curl);
echo $response;

*/



?>