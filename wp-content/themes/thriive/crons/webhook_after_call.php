<?php require '/var/www/html/wp-config.php';
include_once get_template_directory() . '/framework/core-functions.php';
global $wpdb;
$last_id = $wpdb->get_results("SELECT id FROM webhook_after_call ORDER BY id DESC LIMIT 1");
$handle = curl_init();
$url = "http://thriivecrm.com/thriive-api/thriive_api.php/?tag=connecting_call&id=".$last_id[0]->id;
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($handle);
curl_close($handle);
$decode = json_decode($output);
$uid_array = array(1538,2866,13196,1342,13136,23830,15004,15006,21067,25051,24515,22618,15240,14630,4399,13569,8982,7922,14179,15222,24641,27748,22366,21793,21643,19939,13567,14903,15434,19860,14676,15119,2843,992,13039,24033,8796,21952,17752,20416,14749,24407,18644,21245,19533,23780,17723,18105,15586,1721,993,1893,17858,19370,14717,14336,15518,17848,15680,18770,15940,18008,2553,25264,24374,23896,23291,25616,25651,25302,16429,21421,21238,25317,24802,25463,24632,24123,21750,25043,21407,20689,22491,24376,18149,19902,19371,17959,19004,18091,18933,24503,24171,23905,24031,24034,22923,8004,22953,22235,22205,16626,4476,18081,17540,16477,21539,17702,26391,22918,22648,23463,23061,18929,22690,22480,21417,20143,15291,15673,13179,6843,689,18556,9406,16709,648,2869,23963,2000,3993,24865,15203,17149,17891,950,14249,7006,21388,24937,14749,14836,14982,26711,27298,586,28015,19883,8982,31103);
if($decode->status == "success"){
	foreach($decode->data as $d){
    	$wpdb->insert("webhook_after_call",array(
			"id" => $d->id,
			"uid" => $d->uid,
			"caller_number" => $d->caller_number,
			"call_starttime_sec" => $d->call_starttime_sec,
			"call_endtime_sec" => $d->call_endtime_sec,
			"call_duration" => $d->call_duration,
			"call_status" => $d->call_status,
			"event" => $d->event,
			"file_url" => $d->file_url,
			"received_by" => $d->received_by,
			"feedback" => $d->feedback,
			"comments" => $d->comments,
			"created_date" => $d->created_date,
			"time" => $d->time
		));
		$caller = get_users(array(
    		'meta_key'     => 'mobile',
    		'meta_value'   => $d->caller_number,
    		'meta_compare' => '=',
		));
		if($caller){
			if(in_array($caller[0]->data->ID,$uid_array)){
				$cemail = $caller[0]->data->user_email;
				$cmobile = $caller[0]->countryCode.$caller[0]->mobile;
				$ctid = $caller[0]->post_id;
				$cslug = get_post($ctid)->post_name; 
				$call_url = get_site_url()."/therapist-account-dashboard";
				$cgenerated_url = generateBitlyURL($call_url)['data']['url'];
				$cmsg = "Your valuable feedback will help us serve you better! Click here ".$cgenerated_url." to share your feedback.";
				sendSMS($cmobile,$cmsg);
				$csub = "Your feedback is important to us";
				$cbody = "Hello ".$caller[0]->first_name.",<br/><br/>We hope you are enjoying using our platform.<br/><br/>To serve you and our users better, we are constantly working on the constructive feedback we receive from our experts and users.<br/><br/>We would love to hear from you as well! Please <a href='".$call_url."'>CLICK HERE</a> to share your valuable feedback.<br/><br/>Love and Light,<br/>Team Thriive";
				sendEmail($cemail,$csub,$cbody);
				if($d->received_by != 'null'){
					$received_by = json_decode($d->received_by);
					$receiver = get_users(array(
			    		'meta_key'     => 'mobile',
			    		'meta_value'   => substr($received_by->_rr[0]->_na,2),
			    		'meta_compare' => '=',
					));
					if($receiver){
						$remail = $receiver[0]->data->user_email;
						$rmobile = $received_by->_rr[0]->_na;
						$rev_url = get_site_url()."/review-form?t=".$cslug;
						$rgenerated_url = generateBitlyURL($rev_url)['data']['url'];
						$rmsg = "We want to serve you better & would love to hear from you. Click Here ".$rgenerated_url." to share your valuable feedback.";
						sendSMS($rmobile,$rmsg);
						$rsub = "Your feedback is important to us";
						$rbody = "Hello,<br/><br/>We want to serve you better & would love to hear from you.<br/><br/><a href='".$rev_url."'>Click Here</a> to share your valuable feedback & insights on your experience of talking to an expert on Thriive.<br/><br/>Continue your consultation further.<br/>Talk to ".$caller[0]->first_name." now!<br/><br/>Love & Light,<br/>Team Thriive";
						sendEmail($remail,$rsub,$rbody);					
					}
				}
			}
		}			
	}
}