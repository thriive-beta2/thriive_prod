<?php require_once('/var/www/html/wp-load.php');
include_once get_template_directory() . '/framework/core-functions.php';

	$results = getTTotalCountCall("",ARRAY_A);
	// default values for review count
	 $revValue = array('1'=>5,'2'=>10);
	// default values for rating count
	 $ratValue = array('1'=>2.5,'2'=>5,'3'=>7.5,'4'=>10);
	foreach($results as $result){
		if($result['wac_count'] != 0){
			$total_call = $result['wac_count'];
			$connected_call = getTCallCountByStatus($result['u_mobile'],'connected');
			if($connected_call != 0){
				$call_calculate = ($connected_call / $total_call) * 80;
				$review_count = count(getTReviewRatingCount($result['ID'],'review'));
				$rating_count = count(getTReviewRatingCount($result['ID'],'rating')); 
				if($review_count > 1){
					$revRate = $revValue[2];
				} else if($review_count == 1){
					$revRate = $revValue[1];
				} else {
					$revRate = 0;
				}
				if($rating_count > 3) {
					$ratingRate = $ratValue[4];
				} else if($rating_count == 3) {
					$ratingRate = $ratValue[3];
				} else if($rating_count == 2) {
					$ratingRate = $ratValue[2];
				} else if($rating_count == 1) {
					$ratingRate = $ratValue[1];
				} else {
					$ratingRate = 0;
				}
				$response_rate = $call_calculate + $revRate + $ratingRate;
				$formatRate = number_format((float)$response_rate, 2, '.', '');
				update_post_meta($result['ID'],'response_count', $formatRate);
				echo 'success';
			} else {
				update_post_meta($result['ID'],'response_count', 0);
				echo 'default';
			}
		}
	}
?>