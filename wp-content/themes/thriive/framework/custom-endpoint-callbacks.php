<?php
    
// Callback for my operator assign masked number Endpoint
function my_operator_call_connection( WP_REST_Request $request ) {  
    global $wpdb;
    $parameters = $request->get_params();
    $node_id = $parameters['node_id'];
    $timestamp = $parameters['timestamp'];
    $clid = $parameters['clid'];
    $receiver_mobile = ""; 
    $caller = get_users( array(
                "meta_key" => "mobile",
                "meta_value" => $clid,
                "fields" => "ID",
                "meta_compare" => "LIKE"
            ) );
    $receiver_details = $wpdb->get_row("SELECT mon.receiver_id as receiver_id,moc.anon_uuid as anon_uuid FROM my_operator_number_allocation mon JOIN my_operator_call_masking_details moc ON mon.cmd_id = moc.id WHERE mon.caller_id IN (".implode(',',$caller).") AND mon.is_deleted = 0 AND moc.node_id = '".$node_id."' LIMIT 1");
    
    $receiver = get_user_by("id",$receiver_details->receiver_id);
    $user_meta=get_userdata($caller[0]);
    $user_roles=$user_meta->roles; //array of roles the user is part of.
    $is_seeker = 0;
    if(in_array('subscriber',$user_roles)){
        $is_seeker = 1;
    }

    if(isset($receiver->countryCode)){ 
        $cc = $receiver->countryCode;
        if($cc == "0"){
            $cc = "91";
        }
        $receiver_mobile = $cc."-".str_replace(" ","",$receiver->mobile);
    }else{
        preg_match("/\d*(\d{10})/", $receiver->mobile, $match);
        $receiver_mobile = "91-".str_replace(" ","",$match[1]);  
    }
    $anon_uuid = $receiver_details->anon_uuid;
    $resp = array("action"=>"tts",
                  "value"=>"Welcome to Thrive.in, This call may be recorded for training and quality purpose",
                  "operation"=>"dial-numbers",
                  "operation_data"=>array("data"=>[$receiver_mobile],"dial_method"=>"serial","anon_uuid"=>$anon_uuid));
    
    //save call details in my_operator_call_history table
    $data = array('node_id' => $node_id,
                  'caller_id' => $caller[0],
                  'receiver_id' => $receiver_details->receiver_id,
                  'is_call'=>1,
                  'is_seeker'=>$is_seeker);
    $format = array('%s','%d','%d','%d','%d');
    $wpdb->insert('my_operator_call_history',$data,$format);
    
    return new WP_REST_Response( $resp, 200 );
}

// function my_operator_wac(WP_REST_Request $request){
//     global $wpdb;
//     $data = $request->get_params();
//     print_r($request);exit;
//     $decoded_data = json_decode($data,true);
//     $uid = $decoded_data['_ai'];
//     $caller_number = $decoded_data['_cr'];
//     $call_starttime_sec = $decoded_data['_st'];
//     $call_endtime_sec = $decoded_data['_et'];
//     $call_duration = $decoded_data['_dr'];
//     $call_status = $decoded_data['_su'];
//     $event = $decoded_data['_ev'] == 1 ? 'incoming' : 'outgoing';
//     $file_url = $decoded_data['_fu'];
//     $received_by = json_encode($decoded_data['_ld'][0]);
    
//     if($call_status == 1){
//         $call_status = 'connected';
//     }else if($call_status == 2){
//         $call_status = 'missed';
//     }else if($call_status == 3){
//         $call_status = 'voicemail';
//     }else {
//         $call_status = 'invalid';
//     }
    
//     date_default_timezone_set('Asia/Kolkata');
//     $submit_date = date('Y-m-d');
//     $submit_time = date('h:ia');

//     $query = "INSERT INTO `webhook_after_call`(`uid`, `caller_number`, `call_starttime_sec`, `call_endtime_sec`, `call_duration`, `call_status`, `event`, `file_url`, `received_by`,`created_date`, `time`) VALUES ('".$uid."','".$caller_number."','".$call_starttime_sec."','".$call_endtime_sec."','".$call_duration."','".$call_status."','".$event."','".$file_url."','".$received_by."','".$submit_date."','".$submit_time."')";
//     $excute_sql  = mysqli_query($connection,$query);

   
//     if($excute_sql){
//             if($call_status == 'connected'){
//                 $acf_url = "http://thriivecrm.com/php_feedback_therapist/after_call_feedback.php?acf=$uid";
//                 $bitly_link = generateBitlyURL($acf_url)['data']['url'];
//                 $msg_to_mobile = "Thankyou for connecting to us. Please give your valuable feedback for our betterment. $bitly_link";
//                 sendSMS($caller_number,$msg_to_mobile);
//             }else{
//                 $mail_send_to_admin = "events2@thriive.in";
//                 $mail_subject = "Missed call on thriive CRM";
//                 $message = "Hello,"."<br>"."User has tried to connect to a therapist.Following is the detail for missed called received."."<br>"."Caller Number : ".$caller_number;
//                 $headers = "MIME-Version: 1.0" . "\r\n";
//                 $headers .= "Reply-To: The Sender <lead@thriivecrm.com>\r\n"; 
//                 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//                 $headers .= 'From: Thriive Art and soul <lead@thriivecrm.com>';
//                 mail($mail_send_to_admin,$mail_subject,$message,$headers);
//             }
//     }
//     return new WP_REST_Response( $resp, 200 );
// }