<?php  /* Template Name: Appointment Date */ 
$tid = $_POST['tid'];
$date = $_POST['date'];

global $wpdb;
$querystr = "SELECT ID FROM wp_posts  WHERE post_author = '".$tid."' ";
$dates = array(
	0 => 'Sunday',
	1 => 'Monday',
	2 => 'Tuesday',
	3 => 'Wednesday',
	4 => 'Thursday',
	5 => 'Friday',
	6 => 'Saturday',
);

$weekday = date('l', strtotime( $date));
$therapist = $wpdb->get_row( $querystr,OBJECT);
$availability = get_post_meta($therapist->ID,'availability',true);
if($availability > 0){
	$available = 0;
	$html = "";
	for($i =0;$i < $availability;$i++){
		$count =  get_post_meta($therapist->ID,'availability_'.$i.'_time',true);
		$day =  get_post_meta($therapist->ID,'availability_'.$i.'_day',true);
		$days =  get_post_meta($therapist->ID,'availability_'.$i.'_all_days',true);
		if($weekday == $day || $days == 1){
			
			for($j = 0;$j < $count;$j++){ 
				
				$start_time = date("H:i:s",strtotime(get_post_meta($therapist->ID,'availability_'.$i.'_time_'.$j.'_start_time',true)));
				
				$end_time = date("H:i:s",strtotime(get_post_meta($therapist->ID,'availability_'.$i.'_time_'.$j.'_end_time',true)));
				$seconds = strtotime($end_time) - strtotime($start_time);
				$hours = $seconds /3600;
				
				for($k=1;$k <= ceil($hours);$k++){ 
					if($k ==1){ 
						$newstart_time = $start_time;
					}
					$newend_time = date('H:i:s',strtotime($newstart_time.'+1 hour'));
					
					$result = $wpdb->get_results("SELECT book_time FROM `oc_video_call` WHERE tid = ".$tid." AND status = 0 AND book_date = '".$date."' AND (HOUR(book_time) BETWEEN '".$newstart_time."' AND '".$newend_time."')",OBJECT); 
					if(empty($result)){
						$timearr = explode(":",$newstart_time);
						$limit_date = strtotime('+6 hours'); 
						$check_date = strtotime($date.' '.$newstart_time); 
						if($check_date >= $limit_date){
							$available++; 
					?>
						
						<input type="radio" name="time" id="<?php echo $timearr[0];?>" value="<?php echo $newstart_time; ?>" style="display: none;"/><label class="time_label" for="<?php echo $timearr[0];?>"><?php echo date("h:i A",strtotime($newstart_time)); ?></label>
					<?php 
						}
					} else {
						
						$limit_date = strtotime('+6 hours'); 
						$check_date = strtotime($date.' '.$newstart_time); 
						if($check_date >= $limit_date){
							$available++; 
					?>
						
						<input type="radio" name="time" id="<?php echo $timearr[0];?>" value="<?php echo $newstart_time; ?>" style="display: none;"/><label class="disable_time" for="<?php echo $timearr[0];?>"><?php echo date("h:i A",strtotime($newstart_time)); ?></label>
					<?php
						}	
					}	
					
					$newstart_time = $newend_time;
				} 
					
			}
		?>
			
		<?php	
		}
	}
	if($available == 0){
		
		echo 'No Slots Available';exit();
	} else {
		echo "<script>
			$('input:radio').click(function () {
					$('input:radio').next('label').removeClass('checked');
					$('input:radio:checked').next('label').addClass('checked');
				});
			</script>";
	}		
		
}  else {
	echo 'No Slots Available';exit();
}	



?>

