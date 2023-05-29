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
}else if($_POST['action'] == 'delivery_stat'){
  delivery_stat($_POST['ocid']);
}else if($_POST['action'] == 'alert_support'){
  alert_support($_POST['ocid'],$_POST['mode']);
}else if($_POST['action'] == 'test_call'){
  place_call_to_therapist($_POST['ocid'],'1000060521','15');
}




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
    $query = "SELECT * FROM online_consultation WHERE tid=$session_id AND action='chat' AND payment_status='success' ORDER BY id DESC LIMIT 1";
    $res = $wpdb->get_results($query);
    if(count($res)>0){
    if($res[0]->uid_accept=='-2'){
      //late_therapist($res[0]->id,$res[0]->busy_date);
      echo 't5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->def_warn;
    }else if($res[0]->tid_accept==0){
      //late_therapist($res[0]->id,$res[0]->busy_date);
      echo 't0,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;     
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
    }else if($res[0]->tid_accept=='-4'){
      echo 't7,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }
  }else{
      echo 't6,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->def_warn;
    }

  }else{
    $query = "SELECT * FROM online_consultation WHERE uid=$session_id AND action='chat' AND payment_status='success' ORDER BY id DESC LIMIT 1";
    $res = $wpdb->get_results($query);
    if(($res[0]->tid_accept==0 OR $res[0]->tid_accept=='-1') && count($res)>0){
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

      
      $ret_menu = check_response_from_therapist($res[0]->id);
      
      if($ret_menu == 'NaN'){$ret_menu = 'NaN';}else{if($ret_menu == 'None'){echo 'u5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.',';

        if($res[0]->chat_call_status==1){
          check_for_response($res[0]->id);
        }
    }}



      echo 'u0,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$check.','.$ret_menu;
    }else if($res[0]->uid_accept=='-2'){
      echo 'u5,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }else if($res[0]->tid_accept==1 AND $res[0]->uid_accept==0){
      

      if($res[0]->chat_call_status==1){
          check_for_response($res[0]->id);
        }
      echo 'u1,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id.','.$res[0]->temail;
    }else if($res[0]->tid_accept==1 AND $res[0]->uid_accept==1){
      send_accept_sms($res[0]->id,$res[0]->uid);
      echo 'u2,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id . ',' . $res[0]->chat_start_time . ',' . $res[0]->session_duration . ', '. $res[0]->added_duration_in_seconds . ',' . $res[0]->total_duration_in_secs;
    }else if($res[0]->tid_accept=='-2' AND $res[0]->remaining_session==1){
      echo 'u4,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
    }else if($res[0]->tid_accept=='-4' AND $res[0]->remaining_session==1){
      echo 'u6,'.$res[0]->tid.','.$res[0]->uid.','.$res[0]->tname.','.$res[0]->uname.','.$res[0]->id;
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
      //echo $response;
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
  $query = "SELECT * FROM online_consultation LEFT JOIN knowlarity_after_call ON online_consultation.call_id = knowlarity_after_call.call_uuid WHERE online_consultation.payuid='$txnid' ORDER BY online_consultation.id DESC LIMIT 1";
  $res = $wpdb->get_results($query);
  if(count($res)>0){
  echo $res[0]->id.','.$res[0]->uid.','.$res[0]->tid.','.$res[0]->uname.','.$res[0]->tname.','.$res[0]->action.','.$res[0]->created_date.','.$res[0]->payuid.','.$res[0]->remaining_session;

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
    $query = "UPDATE online_consultation SET remaining_session=1,func_name='add_session1',support_modification='$json_string' WHERE id=$ocid LIMIT 1";
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
    $query = "UPDATE online_consultation SET tid_accept='-5',uid_accept='-5',remaining_session=0,support_modification='$string' WHERE id=$ocid LIMIT 1";
    echo $wpdb->query($query);
  }else{
    echo 0;
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________REMOVE SESSION____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 




///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________chat_delivery_stat____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 


function delivery_stat($ocid){
    global $wpdb;
    $query = "SELECT * FROM chat_delivery_stat WHERE ocid = $ocid";
    $res = $wpdb->get_results($query);

    print_r($res);


}


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________chat_delivery_stat____________________________________________//
/////////////////////////////////////////////////////////////////////////////////////////////////////// 


///////////////////////////////////////////////////////////////////////////////////////////////////////
//_________________________________________alert Support____________________________________________//
///////////////////////////////////////////////////////////////////////////////////////////////////////


function alert_support($ocid,$mode){
    global $wpdb;
    if($mode == 'num'){
          $query = "SELECT tname,uname,payment_txnid FROM online_consultation WHERE id=$ocid";
          $res = $wpdb->get_results($query);

          $to = 'account_manager2@thriive.in';
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
        $to = 'account_manager2@thriive.in';
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