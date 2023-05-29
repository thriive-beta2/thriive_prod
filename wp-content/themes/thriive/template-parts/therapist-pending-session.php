<?php $current_user = wp_get_current_user();
$seeker_id = $current_user->ID;
$seeker_email = $current_user->user_email;
$seeker_name = $current_user->display_name;
$post = get_query_var('post'); 
$onlinedetails = get_query_var('onlinedetails'); 

/* $action = get_query_var('action');
$oc_id = get_query_var('oc_id'); */

$remaining_session = get_query_var('remaining_session');
/* print_r($post);
echo 'post_author'.$post->post_author; */
$therapist_details = get_user_by('ID',$post->post_author);
$therapist_id = $therapist_details->ID; 
$therapist_email = $therapist_details->data->user_email;
$role1 = '';
if(!empty($current_user->roles)){
  if(count($current_user->roles) > 1)
    $role1 =  $current_user->roles[1];
  else
    $role1 =  $current_user->roles[0];
}
$msg = $seeker_name ." was trying to contact,when you were offline" ;
if($seeker_id != '')
  $from_status = 1;
else
  $from_status = 0; 
if($role1== "subscriber"){
  $arr = get_user_meta($therapist_id, 'first_name');
  $name = $arr[0];
} else {
  $name = $therapist_details->display_name;
}
$therapist_mobile = get_user_meta($therapist_id,'mobile');
$therapist_countrycde = get_user_meta($therapist_id,'countryCode'); 
if(is_user_online($therapist_id) && $therapist_id != ''){
  $to_status = 1;
} else {
  $to_status = 0;
}
$url = get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' );  
if(!is_mobile()){
  $event = 'desktop'; 
} else {
  $event = 'mobile';
}
$status = getTherapistStatus($post->ID);
  

?>



	
	<?php 
	$therapy_terms = get_term_by('slug',get_query_var("therapy")[0], 'therapy');
	$gettherapydetails = get_therapistpending_onlinesession($current_user->ID,$therapist_id,$onlinedetails->no_of_sessions);

	$ref_user = get_userdata($onlinedetails->uid);
	$query = "SELECT d.uname,d.created_date,d.action,d.remaining_duration,d.chat_start_time,d.chat_end_time,d.session_duration,d.payment_txnid FROM online_consultation d WHERE d.id = '". $onlinedetails->id ."' ORDER BY id DESC ";
	$result = $wpdb->get_results($query);
	
	foreach($result as $sd){
		$flag = 0;//$k= 0;
		if($sd->action == 'call'){
			if(($sd->session_duration) != ($sd->remaining_duration)){
				$flag = 1;
				$duration =  ($sd->session_duration) - ($sd->remaining_duration);
				$duration = round($duration,0);
			}	
			
		}elseif($sd->action == 'chat'){
			
			$start_chat_time = date("Y-m-d H:i:s",strtotime($sd->chat_start_time));
			$end_chat_time = $sd->chat_end_time;
			if($sd->chat_end_time != ''){ 
				$duration = (strtotime($end_chat_time) - strtotime($start_chat_time)) / 60;
				$duration = round($duration,0);
				if($duration >= $sd->session_duration){ 
					$flag = 1;
				}	
			} 
		}
		if($flag == 1){
		
			if(strpos($sd->uname, "@") !== false){
				$uname = explode('@', $sd->uname)[0];
			} else{
				$uname = $sd->uname;
			}		
	?>
		<table class="table table-bordered table-striped ">	
			<tr>
				<td>Therapy Name</td>
				<td><?php echo $therapy_terms->name;?></td>
			</tr>
			<tr>
				<td>Package name</td>
				<td><?php echo $onlinedetails->pkgdescription;?></td>
			</tr>
			<tr>
				<td>Payment ID</td>
				<td><?php echo $sd->payment_txnid;?></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><?php echo $uname;?></td>
			</tr>
			<tr>
				<td>Duration</td>
				<td><?php echo $duration;?></td>
			</tr>
			
			<tr>
				<td>Session Date | Mode</td>
				<td><?php echo date("dS M Y H:i a",strtotime($sd->created_date)).' | '.$sd->action;?></td>
			</tr>
		</table>	
	<?php 	
		}
	}
	?>
	

<?php 

?>
