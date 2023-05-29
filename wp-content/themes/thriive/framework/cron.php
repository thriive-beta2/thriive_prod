<?php 
add_filter( 'cron_schedules', 'cron_schedule_intervals' );
function cron_schedule_intervals( $schedules ) {
    $schedules['every_fifteen_minutes'] = array(
            'interval'  => 900,
            'display'   => __( 'Every 15 Minutes', 'textdomain' )
    );
    $schedules['every_daily'] = array(
            'interval'  => 86400,
            'display'   => __( 'Every Daily', 'textdomain' )
    );
    $schedules['every_five_minutes'] = array(
            'interval'  => 300,
            'display'   => __( 'Every 5 Minutes', 'textdomain' )
    );
    return $schedules;
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'webhook_after_call' ) ) {
    wp_schedule_event( time(), 'every_fifteen_minutes', 'webhook_after_call' );
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'bday_wishes_to_therapist' ) ) {
    wp_schedule_event( time(), 'every_daily', 'bday_wishes_to_therapist' );
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'package_renewal_remainder' ) ) {
    wp_schedule_event( time(), 'every_daily', 'package_renewal_remainder' );
}

// Schedule an action if it's not already scheduled
// if ( ! wp_next_scheduled( 'calculate_response_count' ) ) {
//     wp_schedule_event( time(), 'every_fifteen_minutes', 'calculate_response_count' );
// }

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'del_myoperator_assigned_users' ) ) {
    wp_schedule_event( time(), 'every_daily', 'del_myoperator_assigned_users' );
}

// Hook into that action that'll fire every fifteen minutes
add_action( 'webhook_after_call', 'cron_tosave_webhook_after_call' );
// Save after call data from thriive crm to thriive site
function cron_tosave_webhook_after_call() {
	global $wpdb;
	$last_id = $wpdb->get_results("SELECT id FROM webhook_after_call ORDER BY id DESC LIMIT 1");
    $handle = curl_init();
	$url = "http://thriivecrm.com/thriive-api/thriive_api.php/?tag=connecting_call&id=".$last_id[0]->id;
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($handle);
	curl_close($handle);
	$decode = json_decode($output);
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
		}
	}
}

// Hook into that action that'll fire once a day
add_action( 'bday_wishes_to_therapist', 'cron_tosend_therapist_bday_wishes' );
// Send Email & SMS to therapist to wish them with bday wishes 
function cron_tosend_therapist_bday_wishes() {
	$user_data = getAllTherapistByRole('therapist');
	if($user_data){
		$currentDate = date('d/m');
		foreach($user_data as $user){
			$dob = $user['dob'];
			if(!empty($dob)){
				$dob = strtotime($dob);
				$dob = date("d/m", $dob);
				if($dob == $currentDate){
					$username = $user['name'];
					$useremail = $user['email'];
					$mobileNo = $user['mobile'];
					$subject = "$username, a very happy birthday from Thriive.in";
				    $msg = "Hi $username,<br><br>
				    	Happy Birthday!<br><br>
						All of us here at Thriive.in hope that your special day is as wonderful and extraordinary as you are.<br><br>
						We’d like to take this opportunity to also appreciate the fabulous work you are doing in bringing solace to so many lives through your healing practices. As we continue to create a revolution in the world of 							wellness, it is a great joy to have you as part of the journey.<br><br>
						Stay amazing, always!<br><br>
						Love & light,<br>
						Team Thriive<br><br>
						<em style='color: #615c5c;'>
							Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
						<em>";
				    sendEmail($useremail, $subject, $msg);
				    sendEmail('pooja@thriive.in',$subject, $msg);
				    $msg = "Dear $username, Wishing you a memorable day and a year filled with love, harmony and health. All of us here at Thriive.in hope that your special day is as wonderful and extraordinary as you are.";
				    sendSMS($mobileNo, $msg);
				}
			}
		}
	}
}

// Hook into that action that'll fire once a day
add_action( 'package_renewal_remainder', 'cron_packages_renewal_email_one_month_before_expiry');
// Send a remainder Email to therapist of their package renewal before one month of package expiry
function cron_packages_renewal_email_one_month_before_expiry(){
    $user_data = getAllTherapistByRole('therapist');
	if($user_data){
		$nextMonthExpiry = date('d/m/Y', strtotime('+1 month'));
		$yesterdayExpired = date('d/m/Y',strtotime("-1 days"));
		foreach($user_data as $user){
			$packageCharges = $user['package']->package_charges;
			if($packageCharges > 0){
				if($user['transaction']){
					$expiry_date = strtotime($user['transaction']->end_date);
					$expiry_date = date("d/m/Y", $expiry_date);
					
					$users_id = $user['id'];
					$post_id = $user['post_id'];
					$username = $user['name'];
					$useremail = $user['email'];
					$package_page_link = get_permalink(414);
					
					//One month before package expire
					if($nextMonthExpiry == $expiry_date){
						$subject = "It doesn’t have to be goodbye!";
					    $msg = "Hi $username,<br><br>
					    	Can you believe it? It’s been almost a year since you’ve been a part of India’s largest light network! How has this year been? We’d love to hear your experiences with <a href='www.thriive.in'>www.thriive.in</a>. 						Please email us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a>.<br><br>
							We thought that this would be a great time to reach out and let you know that your registration is about to expire in 30 days. Please do review your profile page and see if you have any benefits you’d like to 							take advantage of...it’s still not too late!<br><br>
							Next year we plan to grow even bigger and brighter, and we hope that you’ll be there to shine with us. There’s lot of exciting upgrades to the packages, check them out: $package_page_link.<br><br>
							If you have any questions or would like to renew, get in touch with your Account Manager ASAP at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
							Let’s keep healing the world together.<br><br>
							Love & light,<br>
							Team Thriive<br><br>
							<em style='color: #615c5c;'>
								Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
							<em>";
					    sendEmail($useremail, $subject, $msg);
					}
					
					//after package expired
					if($yesterdayExpired == $expiry_date){
						$package_page_link = get_permalink(414);
						$subject = "One more chance  to shine with THRIIVE!";
					    $msg = "Hi $username,<br><br>
					    	Your annual package has expired. Can you imagine, it’s already been a year! How did you feel being a part of India’s largest network of light? We’d love to hear your experiences, please email us at <a 									href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a>.<br><br>
							I know we’ve told you this before, but next year promises to be even bigger and brighter! Come, shine with us! Click here to view the exciting new packages we have for you: $package_page_link.<br><br>
							To renew your package or for any questions, please email <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
							Let’s keep healing the world together.<br><br>
							Love & light,<br>
							Team Thriive<br><br>
							<em style='color: #615c5c;'>
								Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
							<em>";
						update_field('select_package','129',$post_id); 	//129 is id of Earth package.
						sendEmail($useremail, $subject, $msg);
					}
				}
			}
		}
	}
}

// // Hook into that action that'll fire every fifteen minutes
// add_action( 'calculate_response_count', 'cron_calculate_response_count_for_therapist' );
// // Calculate therapist response depending on call, review and rating 
// function cron_calculate_response_count_for_therapist() {
// 	$results = getTTotalCountCall("",ARRAY_A);
// 	// default values for review count
// 	 $revValue = array('1'=>5,'2'=>10);
// 	// default values for rating count
// 	 $ratValue = array('1'=>2.5,'2'=>5,'3'=>7.5,'4'=>10);
// 	foreach($results as $result){
// 		if($result['wac_count'] != 0){
// 			$total_call = $result['wac_count'];
// 			$connected_call = getTCallCountByStatus($result['u_mobile'],'connected');
// 			if($connected_call != 0){
// 				$call_calculate = ($connected_call / $total_call) * 80;
// 				$review_count = count(getTReviewRatingCount($result['ID'],'review'));
// 				$rating_count = count(getTReviewRatingCount($result['ID'],'rating')); 
// 				if($review_count > 1){
// 					$revRate = $revValue[2];
// 				} else if($review_count == 1){
// 					$revRate = $revValue[1];
// 				} else {
// 					$revRate = 0;
// 				}
// 				if($rating_count > 3) {
// 					$ratingRate = $ratValue[4];
// 				} else if($rating_count == 3) {
// 					$ratingRate = $ratValue[3];
// 				} else if($rating_count == 2) {
// 					$ratingRate = $ratValue[2];
// 				} else if($rating_count == 1) {
// 					$ratingRate = $ratValue[1];
// 				} else {
// 					$ratingRate = 0;
// 				}
// 				$response_rate = $call_calculate + $revRate + $ratingRate;
// 				$formatRate = number_format((float)$response_rate, 2, '.', '');
// 				update_post_meta($result['ID'],'response_count', $formatRate);
// 			} else {
// 				update_post_meta($result['ID'],'response_count', 0);
// 			}
// 		}
// 	}
// }

// Hook into that action that'll fire once a day
add_action( 'del_myoperator_assigned_user', 'cron_delete_my_operator_assigned_users' );
// Delete my operator assigned users after 30 days 
function cron_delete_my_operator_assigned_users() {
	global $wpdb;
    $month_ago = date("Y-m-d",strtotime(date("Y-m-d",strtotime(date("Y-m-d")))."-1 month"));
    $wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE date(call_timestamp) = '".$month_ago."'");
}
?>