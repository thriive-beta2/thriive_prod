<?php $current_user = wp_get_current_user();
$seeker_id = $current_user->ID;
$seeker_email = $current_user->user_email;
$seeker_name = $current_user->display_name;
$post = get_query_var('post'); 
$onlinedetails = get_query_var('onlinedetails'); 
$postcnt = get_query_var('postcnt');
$remaining_session = get_query_var('remaining_session');
$count = get_query_var('count');
$html = get_query_var('htmlsync');
$html1 =  get_query_var('htmlsync1');
//$pkg = get_query_var('pkg');
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

if($role1== "subscriber"){
  $arr = get_user_meta($therapist_id, 'first_name');
  $name = $arr[0];
} else {
  $name = $therapist_details->display_name;
}

$url = get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' );  
if(!is_mobile()){
  $event = 'desktop'; 
} else {
  $event = 'mobile';
} 
$status = getTherapistStatus($post->ID);
$therapy_terms = get_term_by('slug',$onlinedetails->therapy_name, 'therapy');

if($count == 0){
	$html1	='<h2 class="sessdet">Sessions  Booked</h2>';
 		
}	

$html1	.= '<table class="table table-bordered table-striped ">

	
	<tr>
		<td class="sessiontext">Therapist Name</td>
		<td class="sessiondata">'.get_the_title().'</td>
	</tr>
	
	<tr>
		<td class="sessiontext">Therapy Name</td>
		<td class="sessiondata">'. $therapy_terms->name .'</td>
	</tr>
	
	
	<tr>
		<td class="sessiontext">Status</td>
		<td';
		if($status == 'Available') {  
		$html1 .= ' class=r-available';
		} else { 
			$html1	.= ' class=r-busy'; 
		} 
		$html1	.= '>'.$status.'</td>
	</tr>
	
	<tr>
		<td class="sessiontext">Start Session </td>
		<td class="sessiondata">
		<div class="clickgroup">';
		
			if (($role1 == "subscriber" || $role1 =="")){ 
				$_SESSION["no_of_sessions"] = 1;
				if($remaining_session > 0){
					$_SESSION["no_of_sessions"] = 1;
			
					$html1	.= '<a class="btnCallnow" href="#"  data-toggle="modal" data-target="#'.$onlinedetails->id .'" value="Select"><i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>Call Now</a><a href="#" class="btn " data-toggle="modal" data-target="#ch'.$onlinedetails->id .'"><i class="fa fa-comments-o" aria-hidden="true"></i>Chat Now</a>';
				
				} else {
				
					$html1	.= '<a class="btnCallnow" data-toggle="modal" data-target="#noc'.$onlinedetails->id .'" href="#"  value="Select"><i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>Call Now</a>
					<a class="btn" href="#" data-toggle="modal" data-target="#no"'.$onlinedetails->id .'"><i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>Chat Now</a>';
					
			
				} 
			
				
				$html1	.= '<div class="modal fade" id="noc'.$onlinedetails->id .'" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog" style="margin-top: 200px;" role="document">
						<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align:center;">
							
								Do you still wish to continue to new payment?
							<div class=""  style="margin-top:15px;"><a href="'.site_url().'"/new-payment-apage?q="'.$post->post_name.'"&a=call&t="'.get_query_var("therapy")[0].'" class="btn popular_btn"  style="margin-left: 50px; width: 25%; text-align: center;">Yes</a>
								<a href="#" data-dismiss="modal" style="width: 25%;margin-left: 10px;text-align: center;">No</a>
							</div>
							<div class="modal-body text-center">
								  
							</div>
						</div>
					</div>
				</div>';
				$html1	.= '<div class="modal fade" id="no'.$onlinedetails->id .'" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog " style="margin-top: 200px;" role="document">
						<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align:center;">
							
								Do you still wish to continue to new payment?
							<div class=""  style="margin-top:15px;">	
								<a href="'.site_url().'"/payment-details?q="'.$post->post_name .'"&a=chat&t="'.get_query_var("therapy")[0].'" class="btn popular_btn" style="margin-left: 50px; width: 25%; text-align: center;">Yes</a>
								<a href="#" data-dismiss="modal" style="width: 25%;margin-left: 10px;text-align: center;">No</a>
							</div>
							<div class="modal-body text-center">
								  
							</div>
						</div>
					</div>
				</div>';
				$html1	.= '<div class="modal fade" id="'.$onlinedetails->id .'" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog" style="margin-top: 200px;" role="document">
						<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align:center;">
								You  have '.$remaining_session .' session of	Rs. '.number_format((float)$onlinedetails->amount, 2, '.', '') .'	<br/>
								Use session from existing pack ?<br/>
							<div class=""  style="margin-top:15px;">		
								<a href="'.site_url().'"/session-thankyou-page?q="'.$post->post_name .'"&a=call&t="'.get_query_var("therapy")[0].'"&oc_id="'. $onlinedetails->id .'" class="btn popular_btn"  style="margin-left: 10px; width: 25%; text-align: center;">Yes</a>
								<a href="#" data-dismiss="modal" style="width: 25%;margin-left: 25px;text-align: center;">No</a>
							</div>
							<div class="modal-body text-center">
								  
							</div>
						</div>
					</div>
				</div>';
				$html1	.= '<div class="modal fade" id="ch'.$onlinedetails->id .'" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog" style="margin-top: 200px;" role="document">
						<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align:center;">
							You  have '.$remaining_session .' session  of	Rs. '.number_format((float)$onlinedetails->amount, 2, '.', '') .'<br/>
								Use session from existing pack ?<br/>
							<div class=""  style="margin-top:15px;">		
								<a href="'.site_url().'"/session-thankyou-page?q="'.$post->post_name .'"&a=chat&t="'.get_query_var("therapy")[0].'"&oc_id="'.$onlinedetails->id .'" class="btn popular_btn"  style="margin-left: 10px; width: 25%; text-align: center;">Yes</a>
								<a href="#" data-dismiss="modal" style="width: 25%;margin-left: 25px;text-align: center;">No</a>
							</div>
							<div class="modal-body text-center">
								  
							</div>
						</div>
					</div>
				</div>';
			
			
			}
			
            
       
		$html1	.= 	'</div>
		 </td>
	</tr> 
	
</table>';
set_query_var('htmlsync1',$html1);
iF($count == ($postcnt-1)){
	echo $html;
	echo $html1;
}