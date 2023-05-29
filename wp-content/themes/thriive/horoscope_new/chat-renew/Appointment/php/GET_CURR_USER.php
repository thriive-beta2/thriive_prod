<?php 
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);



if($_POST['action'] == 'get_curr_user'){
  get_curr_user();
}else if($_POST['action'] == 'support'){
  support($_POST['txnid']);
}else if($_POST['action'] == 'add_session'){
  add_session($_POST['ocid'],$_POST['comment']);
}else if($_POST['action'] == 'remove_session'){
  remove_session($_POST['ocid']);
}else if($_POST['action'] == 'alert_support'){
  alert_support($_POST['ocid'],$_POST['mode']);
}
/*
else if($_POST['action'] == 'reconnect_chat'){
  reconnect_chat($_POST['ocid']);
}
*/




///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________GET_CURR_USER_____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


function get_curr_user(){
  global $wpdb;
  $current_user = wp_get_current_user();
  $session_id = $current_user->ID;  
  $curr_user_role = $current_user->roles;
  foreach($curr_user_role as $key){
    if($key == 'therapist' || $key == 'author'){
      $curr_user_role = 'therapist';
    }else{
      $curr_user_role = 'user';
    }
  }

  if($curr_user_role=='therapist'){

$query = "SELECT *,oc_video_call.oc_id,oc_video_call.book_date,oc_video_call.book_time,oc_video_call.end_time,oc_video_call.id AS 'vid' FROM online_consultation INNER JOIN oc_video_call ON online_consultation.id = oc_video_call.oc_id WHERE online_consultation.tid=$session_id AND online_consultation.action='appointment_chat' AND payment_status='success' AND therapy_name = 'Appointment' AND tid_accept != 6 ORDER BY oc_video_call.book_date DESC, oc_video_call.book_time DESC LIMIT 20";

$res = $wpdb->get_results($query);



for($i = (count($res)-1); $i>=0; $i--){

  $book_time = $res[$i]->book_date.' '.$res[$i]->book_time;
  $current_time = date("Y-m-d H:i:s");

  if(strtotime($book_time) > strtotime($current_time) OR (strtotime($book_time) < strtotime($current_time) AND strtotime($current_time) < (strtotime($book_time)+3600))){
    $res[0] = $res[$i];
    $res[0]->id = $res[$i]->oc_id;
    if(strpos($res[0]->uname, '@') > 0){
      $res[0]->uname = explode('@', $res[0]->uname)[0];
    }

    if(strpos($res[0]->tname, '@') > 0){
      $res[0]->tname = explode('@', $res[0]->tname)[0];
    }
    
    //print_r($res[0]);
    break;
  }

}



    $res[0]->id = $res[0]->oc_id;

    if(count($res)>0){
    if($res[0]->uid_accept=='-2'){
      //late_therapist($res[0]->id,$res[0]->busy_date);
      echo 't5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->def_warn;
    }else if($res[0]->tid_accept==0){
      //late_therapist($res[0]->id,$res[0]->busy_date);
      $book_date = date($res[0]->book_date.' '.$res[0]->book_time);
      $end_date  = date($res[0]->book_date.' '.$res[0]->end_time);
      
      if(strtotime($book_date) > strtotime(date('y-m-d H:i:s'))){
        $date_string = date("d-M",strtotime($book_date)).' '.date("h:i a",strtotime($book_date));
        echo 't7,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu.','.$date_string.','.$res[0]->session_duration;
        return;
      }else if (strtotime($end_date) < strtotime(date('y-m-d H:i:s'))){
        $date_string = date("d-M",strtotime($end_date)).' '.date("h:i a",strtotime($end_date));
        echo 't8,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu.','.$date_string.','.$res[0]->session_duration;;
        return;
      }else if(strtotime($end_date) > strtotime(date('y-m-d H:i:s')) AND strtotime($book_date) < strtotime(date('y-m-d H:i:s'))){
        $date_string = date("d-M",strtotime($end_date)).' '.date("h:i a",strtotime($end_date));
        echo 't9,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu.','.$date_string.','.$res[0]->session_duration;
        return;
      }else{
        echo 'u3,';
      }




      echo 't5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;     
    }else if($res[0]->tid_accept==1 AND $res[0]->uid_accept==0){
      //late_therapist($res[0]->id,$res[0]->busy_date);
      echo 't1,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->def_warn;
      send_accept_sms($res[0]->id,$res[0]->uid);
      if($res[0]->chat_call_status == 2){
      place_accept_call($res[0]->id);
        }
    }else if($res[0]->tid_accept==1 AND $res[0]->uid_accept==1){
      echo 't2,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->uemail. ',' . $res[0]->chat_start_time . ',' . $res[0]->session_duration. ',' . $res[0]->added_duration_in_seconds . ',' . $res[0]->total_duration_in_secs;
    }else if($res[0]->tid_accept==2){
      echo 't3,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->def_warn.','.$query;
    }else if($res[0]->tid_accept=='-1'){
      echo 't4,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }else if($res[0]->tid_accept=='-2'){
      echo 't5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }
  }else{
      echo 't6,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->def_warn;
    }

  }else{
$query = "SELECT *,oc_video_call.oc_id,oc_video_call.book_date,oc_video_call.book_time,oc_video_call.end_time,oc_video_call.id AS 'vid' FROM online_consultation INNER JOIN oc_video_call ON online_consultation.id = oc_video_call.oc_id WHERE online_consultation.uid=$session_id AND online_consultation.action='appointment_chat' AND payment_status='success' AND therapy_name = 'Appointment' AND tid_accept != 6 ORDER BY oc_video_call.book_date DESC, oc_video_call.book_time DESC LIMIT 20";

$res = $wpdb->get_results($query);

//print_r($res);



for($i = (count($res)-1); $i>=0; $i--){

  $book_time = $res[$i]->book_date.' '.$res[$i]->book_time;
  $current_time = date("Y-m-d H:i:s");

  if(strtotime($book_time) > strtotime($current_time) OR (strtotime($book_time) < strtotime($current_time) AND strtotime($current_time) < (strtotime($book_time)+3600))){
    $res[0] = $res[$i];
    $res[0]->id = $res[$i]->oc_id;

    if(strpos($res[0]->uname, '@') > 0){
      $res[0]->uname = explode('@', $res[0]->uname)[0];
    }

    if(strpos($res[0]->tname, '@') > 0){
      $res[0]->tname = explode('@', $res[0]->tname)[0];
    }


    //print_r($res[0]);
    break;
  }

}



    if(($res[0]->tid_accept==0 OR $res[0]->tid_accept=='-1') && count($res)>0){

/* 
      //***This code is removed as call prompt to therapist is not needed in appointment***
     

     if($res[0]->chat_call_status<1){
          place_call_to_therapist($res[0]->id,'1000060521',$res[0]->session_duration);
      }
      if($res[0]->chat_call_status==1){
          check_for_response($res[0]->id);
      }
      /*$call_menu = check_for_response($res[0]->id);
      if($call_menu == 'A'){
          reject_chat($ocid);
      }*/

/*      
      $ret_menu = check_response_from_therapist($res[0]->id);
      
      if($ret_menu == 'NaN'){$ret_menu = 'NaN';}else{if($ret_menu == 'None'){echo 'u5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.',';

        if($res[0]->chat_call_status==1){
          check_for_response($res[0]->id);
        }
    }}
*/
      $ret_menu = 'NaN';
/*     $curr_ocid = $res[0]->id;
      $query1 = "SELECT * FROM oc_video_call WHERE oc_id = $curr_ocid ORDER BY id DESC LIMIT 1";
      $res1 = $wpdb->get_results($query1);
*/
      $book_date = date($res[0]->book_date.' '.$res[0]->book_time);
      $end_date  = date($res[0]->book_date.' '.$res[0]->end_time);
      
      if(strtotime($book_date) > strtotime(date('y-m-d H:i:s'))){
        $date_string = date("d-M",strtotime($book_date)).' '.date("h:i a",strtotime($book_date));
        echo 'u6,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu.','.$date_string;
        return;
      }else if (strtotime($end_date) < strtotime(date('y-m-d H:i:s'))){
        $date_string = date("d-M",strtotime($end_date)).' '.date("h:i a",strtotime($end_date));
        echo 'u7,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu.','.$date_string;
        return;
      }else if(strtotime($end_date) > strtotime(date('y-m-d H:i:s')) AND strtotime($book_date) < strtotime(date('y-m-d H:i:s'))){
        $date_string = date("d-M",strtotime($end_date)).' '.date("h:i a",strtotime($end_date));
        echo 'u8,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu.','.$date_string;
        return;
      }else{
        echo 'u3,';
      }


      //echo 'u0,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu;
    }else if($res[0]->uid_accept=='-2'){
      echo 'u5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }else if($res[0]->tid_accept==1 AND $res[0]->uid_accept==0){
      echo 'u1,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->temail;
    }else if($res[0]->tid_accept==1 AND $res[0]->uid_accept==1){
      //send_accept_sms($res[0]->id,$res[0]->uid);
      echo 'u2,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->oc_id . ',' . $res[0]->chat_start_time . ',' . $res[0]->session_duration . ', '. $res[0]->added_duration_in_seconds . ',' . $res[0]->total_duration_in_secs;
    }else if($res[0]->tid_accept=='-2' AND $res[0]->remaining_session==1){
      echo 'u4,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }else{
      echo 'u3,'.$res[0]->id;
    }

  }
echo ',u3,end';
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________GET_CURR_USER_____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________SEND_SMS_ACCEPT_____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////

function send_accept_sms($ocid,$uid){
  global $wpdb;
    $mob_no = get_user_meta($uid)['mobile'][0];
    $msg = 'Hi from Thriive. The Therapist has accepted your Chat request. Please click on the link to start chat or go to your Dashboard to Start Chat - https://bit.ly/3v6tHCD';
    $query = "SELECT email_sms FROM online_consultation WHERE id=$ocid";
    $result = $wpdb->get_results($query);
    if($result[0]->email_sms==0){
      sendSMS($mob_no,$msg,'1007023623328159255');
    $query = "UPDATE online_consultation SET email_sms=1 WHERE id=$ocid";
    $wpdb->query($query);
    }else if($result[0]->email_sms==1){
      //sendSMS($mob_no,$msg,'1007023623328159255');
    //$query = "UPDATE online_consultation SET email_sms=2 WHERE id=$ocid";
    //$wpdb->query($query);
    }



}








///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________SEND_SMS_ACCEPT_____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________PLACE ACCEPT CALL___________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


function place_accept_call($ocid){
  global $wpdb;
    $query = "SELECT uid FROM online_consultation WHERE id=$ocid";
    $u_id = $wpdb->get_results($query)[0]->uid;
    $query = "SELECT meta_value FROM wp_usermeta where user_id=$u_id AND meta_key='mobile'";
    $mobile = $wpdb->get_results($query)[0]->meta_value;
    $query = "UPDATE online_consultation SET chat_call_status=3 WHERE id=$ocid";
    $wpdb->query($query);
    $curl = curl_init();
  
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/qiuckcall/test.php?customer_number='.$mobile.'&k_number=8035387035&ivr_id=1000060519&custom_params=123456',
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
      $response;

      $fp = fopen("/var/www/html/wp-content/themes/thriive/horoscope_new/qiuckcall/logs/therapist-log.json", "a");
      fwrite($fp, $response);
      fclose($fp);


      //echo $response;

}






///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________PLACE ACCEPT CALL_________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________PLACE CALL TO THERAPIST___________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


function place_call_to_therapist($ocid,$ivr,$duration){
    global $wpdb;
    $url = 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/qiuckcall/test.php?customer_number=8850418307&k_number=8035387035&ivr_id='.$ivr.'&custom_params='.$ocid;
    //echo $url;
    $place_call = 1;
  $busy_date = date('Y-m-d H:i:s', strtotime("+". $duration . " mins"));
    $query = "UPDATE online_consultation SET chat_call_status=1,busy_date='$busy_date' WHERE id=$ocid";
    $wpdb->query($query);
    $query = "SELECT tid FROM online_consultation WHERE id=$ocid";
    $u_id = $wpdb->get_results($query)[0]->tid;
    $query = "SELECT meta_value FROM wp_usermeta where user_id=$u_id AND meta_key='mobile'";
    $mobile = $wpdb->get_results($query)[0]->meta_value;
    $curl = curl_init();
  
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/qiuckcall/test.php?customer_number='.$mobile.'&k_number=8035387035&ivr_id='.$ivr.'&custom_params='.$duration.','.$ocid,
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
      $response;

      $fp = fopen("/var/www/html/wp-content/themes/thriive/horoscope_new/qiuckcall/logs/therapist-log.json", "a");
      fwrite($fp, $response);
      fclose($fp);
}







///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________PLACE CALL TO THERAPIST___________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________CHECK FOR RESPONSE___________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


function check_for_response($ocid){
  global $wpdb;
    $query = "SELECT uid FROM online_consultation WHERE id=$ocid";
    $u_id = $wpdb->get_results($query)[0]->uid;
    $query = "SELECT meta_value FROM wp_usermeta where user_id=$u_id AND meta_key='mobile'";
    $mobile = $wpdb->get_results($query)[0]->meta_value;
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://thriive.in/wp-content/themes/thriive/horoscope_new/qiuckcall/check_response_for_beta.php/?ocid='.$ocid,
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

  $call_menu = $response;
  if($call_menu == 2 OR $call_menu == 'None'){
    $query = "UPDATE online_consultation SET chat_call_status=2 WHERE id=$ocid";
    $wpdb->query($query);
    $curl = curl_init();
  
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/qiuckcall/test.php?customer_number='.$mobile.'&k_number=8035387035&ivr_id=1000060522&custom_params=123456',
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
      $response;

      $fp = fopen("/var/www/html/wp-content/themes/thriive/horoscope_new/qiuckcall/logs/therapist-log.json", "a");
      fwrite($fp, 'intoit');
      fclose($fp);

      $query = "UPDATE online_consultation SET tid_accept='-2',uid_accept='-2' WHERE id=$ocid";
      $wpdb->query($query);
  }else if($call_menu==1){  
    $query = "UPDATE online_consultation SET chat_call_status=2 WHERE id=$ocid";
    $wpdb->query($query);
    /*$curl = curl_init();
  
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/qiuckcall/test.php?customer_number=8962155372&k_number=8035387035&ivr_id=1000057656&custom_params=123456',
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
      $response;*/
  }
};




///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________CHECK FOR RESPONSE___________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________CHECK FOR RESPONSE_FROM THERAPIST_________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////



function check_response_from_therapist($ocid){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/chat_call_response/chat_call_response.php?ocid='.$ocid,
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
return $response;

}


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________CHECK FOR RESPONSE_FROM THERAPIST_________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////  


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________SUPPORT_________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////  



function support($txnid){
  global $wpdb;
  //$query = "SELECT id,uid,tid,uname FROM online_consultation WHERE payment_txnid='$txnid' ORDER BY id DESC LIMIT 1";
  $query = "SELECT * FROM online_consultation LEFT JOIN knowlarity_after_call ON online_consultation.call_id = knowlarity_after_call.call_uuid WHERE online_consultation.payment_txnid='$txnid' ORDER BY online_consultation.id DESC LIMIT 1";
  $res = $wpdb->get_results($query);
  if(count($res)>0){
  echo $res[0]->id.','.$res[0]->uid.','.$res[0]->tid.','.$res[0]->uname.','.$res[0]->tname.','.$res[0]->action.','.$res[0]->created_date.','.$res[0]->payment_txnid.','.$res[0]->remaining_session;

  if($res[0]->call_uuid != NULL){
    echo ','.$res[0]->customer_number.','.$res[0]->call_date.','.$res[0]->call_time.','.$res[0]->call_status.','.$res[0]->call_transfer_status.','.$res[0]->agent_number.','.$res[0]->customer_duration.','.$res[0]->remaining_session;
  }else{
    echo ',notest';
  }

  }else{
    echo 'error';
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________SUPPORT_________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////  



///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________ADD_SESSION_______________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////  

function add_session($ocid,$comment){
  global $wpdb;
  $date = date('Y-m-d H:i:s');
  $administrator = wp_get_current_user()->data->user_login;
  $string = 'positive '.$date.'-> '.$administrator;

  $json_string = array(
      'status' => 'positive',
      'date'   => $date,
      'administrator' => $administrator,
      'comment' => $comment
    );

  $json_string = json_encode($json_string);  


  if($ocid){
    $query = "UPDATE online_consultation SET remaining_session=1,func_name='add_session1',support_modification='$json_string' WHERE id=$ocid";
    echo $wpdb->query($query);
  }else{
    echo 0;
  }
}


/*
function add_session($ocid){
  global $wpdb;

  $date = date('Y-m-d H:i:s');
  $string = 'positive '.$date;

  $query = "SELECT tid_accept,uid_accept,action FROM online_consultation WHERE id=$ocid";
  $res = $wpdb->get_results($query);

  if(($res[0]->tid_accept == 6 || ($res[0]->tid_accept == 1 AND $res[0]->uid_accept == 1)) AND $res[0]->action == 'chat'){
    $query = "UPDATE online_consultation SET remaining_session=1,tid_accept='-2',uid_accept='-3',chat_start_time=NULL,chat_end_time=NULL,support_modification='$string' WHERE id=$ocid";
    echo $wpdb->query($query);
  }else{
        if($ocid){
          $query = "UPDATE online_consultation SET remaining_session=1,support_modification='$string' WHERE id=$ocid";
          echo $wpdb->query($query);
        }else{
          echo 0;
      }
  }
}
*/

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________ADD SESSION_______________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////  




///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________REMOVE_SESSION____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////  

function remove_session($ocid){
  global $wpdb;
  $date = date('Y-m-d H:i:s');
  $string = 'negative '.$date;
  if($ocid){
    $query = "UPDATE online_consultation SET tid_accept='-5',uid_accept='-5',remaining_session=0,support_modification='$string' WHERE id=$ocid";
    echo $wpdb->query($query);
  }else{
    echo 0;
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________REMOVE SESSION____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________alert Support____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


function alert_support($ocid,$mode){
    global $wpdb;
    if($mode == 'num'){
          $query = "SELECT tname,uname,payment_txnid FROM online_consultation WHERE id=$ocid";
          $res = $wpdb->get_results($query);

          $to = 'accountmanager2@thriive.in';
          $from = 'akash@thriive.in';
          $body = 'Possible phone number Exchanged between Therapist-> '.$res[0]->tname.' and User-> '.$res[0]->uname.' on transaction-id-> '.$res[0]->payment_txnid;
          $subject = '!!Possible Phone Number Exchanged!!';
          $headers .= 'From: noreply@thriive.in' . "\r\n";
          if(mail($to,$subject,$body,$headers)){
            echo 'alert_sent';
          }
    }else if($mode == 'email'){
        $query = "SELECT tname,uname,payment_txnid FROM online_consultation WHERE id=$ocid";
        $res = $wpdb->get_results($query);
        $to = 'accountmanager2@thriive.in';
        $from = 'akash@thriive.in';
        $body = 'Possible e-mail Exchanged between Therapist-> '.$res[0]->tname.' and User-> '.$res[0]->uname.' on transaction-id-> '.$res[0]->payment_txnid;
        $subject = '!!Possible E-mail Exchanged!!';
        $headers .= 'From: noreply@thriive.in' . "\r\n";
        if(mail($to,$subject,$body,$headers)){
          echo 'alert_sent';
        }
    }
}



///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________alert Support____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________Reconnect_session____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 
/*
function reconnect_chat($ocid){
  global $wpdb;
  $query = "SELECT * FROM online_consultation WHERE id=$ocid";
  $duration = 10;
  $res = $wpdb->get_results($query);
  $now_date = date('Y-m-d h:i:s');
  $busy_date = date('Y-m-d h:i:s');
  //print_r(json_encode($res));
  $json = '&&&'.json_encode($res);
  $query = "UPDATE online_consultation SET original_data = CONCAT(original_data, '$json') where id = $ocid";
  if($wpdb->query($query) == 1){
    $query = "UPDATE online_consultation SET tid_accept=0, uid_accept=0,session_duration=$duration,chat_start_time=NULL,chat_end_time=NULL,created_date='$now_date', busy_date='$busy_date'";
    echo $query;
  }
}

*/









///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________Reconnect_session____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 