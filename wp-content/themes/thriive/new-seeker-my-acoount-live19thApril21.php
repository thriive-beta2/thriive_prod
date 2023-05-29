<?php /* Template Name: New seeker my account page */ 
session_start();?>
<?php

	if (!is_user_logged_in()) 
	{ 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		//if user's is Therapist then redirect to therapist dashboard 
		if(in_array("therapist", $current_user->roles))
		{
			wp_redirect('/therapist-account-dashboard/');
			exit();
		}
			if (strpos($_SESSION['chat_page'], '/therapist') !== false) {
				echo $site_referer = $_SESSION['chat_page'];
				unset($_SESSION['chat_page']);
				wp_redirect($site_referer);
				exit();
   }
	}
?>
<?php 
	//get_header(); 
	include_once get_stylesheet_directory().'/new-header.php';
?>
<style>
	#nUser{
		display: none;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		clevertap.profile.push({
			"Site": {
				"Name": "<?php echo $current_user->first_name . ' ' . $current_user->last_name; ?>",
				"Email": "<?php echo $current_user->user_email; ?>",
				"Phone": "<?php echo $current_user->countryCode.$current_user->mobile; ?>",
				"DOB": new Date("<?php echo $current_user->dob; ?>"),
		   		"Role": "Subscriber",
		 	}
		});
	});
</script>
<section class="banner-home">
	<div class="container">
		<div class="row w-70">
			<div class="col-12 text-center section">
				<h1 class="w-100 myacctn">My Account</h1>
				<p class="w-100">
					<span class="text-highlight"><?php echo $current_user->first_name . ' ' . $current_user->last_name; ?> :</span><span> Joined On <?php echo date( "dS M, Y", strtotime($current_user->user_registered) ); ?> </span>
				</p>
				<div class="col-12">
					<div class="my-event-btn">
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/seeker-my-account-edit/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/editprofile_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">
								EDIT PROFILE
							</span>
							
						</a>
						<!-- <a class="btn secondary-btn btn_box1"  data-toggle="modal" data-target="#delete_user_popup" href="">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/delete_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">DELETE</span>
						</a> -->
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/user-chat-history/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">VIEW CHAT</span>
						</a>
						<!-- <a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/therapist/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/newchat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">START NEW CHAT</span>
						</a> -->
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/seeker-my-account-edit/?download_report=yes'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">EXPORT CHAT</span>
						</a>
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/seeker-call-history/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">CALL HISTORY</span>
						</a>
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/session-details/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">SESSION DETAILS</span>
						</a>																																						
							<?php if(isset($_GET['download_report']))
							{
								export_csv();
							}
							?>
					</div>
				</div>
			</div>
			<?php /* $videoresult = checkpermission($current_user->ID,'subscriber'); 
			if($videoresult){ ?>
				<div class="col-12 col-sm-7 d-flex mx-auto count-wrapper">
					<h5>Video Call</h5>
				</div>
				<div class="col-12 col-sm-7 d-flex mx-auto count-wrapper">
					<div class="col text-center">
						<?php $vdoutput = '<table class="table table-bordered table-striped desk_tablevw"><tr><th widht="30%">User Name</th><th widht="20%">Date&Time</th><th width="10%">Action</th></tr>';
						foreach($videoresult as $vr){
							$therapist_details = get_userdata($vr->tid);
							$page_url = get_permalink($vr->page_id);
							$vdoutput .= '<tr><td>'.$therapist_details->data->display_name.'</td><td>'.$vr->book_date.' '.$vr->book_time.'</td><td><a href="'.$page_url.'"><button type="button" class="btn btn-primary btnMobi">Start a Video Call</button></a></td></tr>';
						}
						$vdoutput .= '</table>';
						echo $vdoutput; ?>
						<section class="mobi_tableview">
							<div class="container">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<?php $vmoutput = '<table class="table">';
										foreach ($videoresult as $vr) {
											$therapist_details = get_userdata($vr->tid);
											$page_url = get_permalink($vr->page_id);
											$vmoutput .= '<tbody><tr><th widht="30%">User Name</th><td>'.$therapist_details->data->display_name.'</td></tr><tr><th widht="20%">Date&Time</th><td>'.$vr->book_date.' '.$vr->book_time.'</td></tr><tr><th width="10%">Action</th><td><a href="'.$page_url.'"><button type="button" class="btn btn-primary btnMobi" style="font-size: 14px; width: auto;">Start a Video Call</button></a></td></tr></tbody>';
										}
										$vmoutput .= '</table>'; 
										echo $vmoutput; ?>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>			
			<?php } */ ?>

		<div class="container">
			<div class="row">
					<div class="seprator mb-1">
					  <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
					</div>
			</div>
		</div>


		<?php 
			$query = "SELECT * FROM oc_video_call WHERE uid=$current_user->ID and action='videocall' ORDER BY id DESC";
			$sdata = $wpdb->get_results($query);
			$call_stat;
			$fdata = array();
			if(count($sdata)!=0){
				foreach($sdata as $data){
					$end = $data->book_time;
					$end = strtotime($end)+3600;
					if(strtotime($data->book_date) == strtotime(date('Y-m-d')) AND strtotime($data->book_time)<time() AND time()<$end){
					$fdata[0] = $data;
					}
					
				}
				$app_time = $fdata[0]->book_time;
				$app_date = $fdata[0]->book_date;
				$uid = $fdata[0]->tid;
				$channel = $fdata[0]->channel;
				$query = "SELECT * FROM wp_usermeta where user_id=$uid AND meta_key='first_name'";
				$fdata = $wpdb->get_results($query);
				$tname = $fdata[0]->meta_value;	
				$add_hour = 3600;
				$end_time = strtotime($app_time)+3600;

				if(time()>strtotime($app_time) AND time()<$end_time AND strtotime(date('Y-m-d')) == strtotime($app_date)){
					$vlink = get_site_url().'/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/index.php?appid=2dbedd3f03bf4a089b098987a8407baa&channel='.$channel.'&token=&u=utime';
					$call_stat = 1;	
				}else{
					$vlink = '';
					$call_stat = 0;
				}				
			}
			?>

			<style type="text/css">
				.app_table td{
					padding:10px;
				}
			</style>
			<?php if($call_stat == 1){?>
			<div class="sch_app" style="width:100%">
				<h2 style="font-size: 22px;text-align: center;">Video Call Appointments</h2>
				<table class="table table-bordered table-striped">
					<tr><td>therapist_name</td><td><?php echo $tname;?></td></tr>
					<tr><td>appointment date</td><td><?php echo $app_date;?></td></tr>
					<tr><td>appointment time</td><td><?php echo $app_time;?></td></tr>
					<tr><td colspan="2" style="text-align:center;"><button class="btnConsult call_now_btn" style="width:10rem;" onclick="location.href='<?php echo $vlink;?>'">Start Video Call</button></td></tr>
				</table>
			</div><?php }?>	









			<div class="col-md-12 col-sm-12 d-flex mx-auto count-wrapper">
				<div class="col text-center">	
				<h2 class="w-100 myacctn">Last Conversation</h2>
					<input type="hidden" name = "session_user" id="session_user" value="<?php echo $current_user->ID ?>" />
					<?php $result = fetch_user_therapist();
					if($result){
						$output = '<table class="table table-responsive table-bordered table-striped desk_tablevw" id="chat_user_details"><tr> <th widht="30%">User Name</th><th widht="20%">Last Conversation (Date&Time)</th><th width="10%">Action</th><th width="10%">Status</th></tr>';
						foreach($result as $row) {
							$is_block_query = $wpdb->get_var("SELECT block_status FROM chat_block_users WHERE to_user_id = $row->from_user_id AND from_user_id = $row->to_user_id");
							$is_blocked = $is_block_query == 1 ? 'Blocked' : 'Active';
							$therapist_details = get_userdata($row->to_user_id);
							$therapist_email = $therapist_details->data->user_email;
							$seeker_email = $current_user->user_email;
							$seeker_name = $current_user->display_name;
							$last_coversation = last_login_chat($row->from_user_id,$row->to_user_id);
							$msg = $seeker_name ." was trying to contact,when you were offline" ;
							$seeker_id = $current_user->ID;
							if($seeker_id != '')
								$from_status = 1;
							else
								$from_status = 0;	
							$therapist_id = $therapist_details->ID;
							if(is_user_online($therapist_id)) {
								$to_status = 1;
							} else {
								$to_status = 0;
							} ?>
							<input type="hidden" name = "mobile_<?php echo $therapist_id ?>" id="mobile_<?php echo $therapist_id ?>" value="<?php echo $therapist_mobile[0]; ?>" />
							<input type="hidden" name = "countrycode_<?php echo $therapist_id ?>" id="countrycode_<?php echo $therapist_id ?>" value="<?php echo $therapist_countrycde[0]; ?>" />
							<input type="hidden" name = "msg<?php echo $therapist_id ?>" id="msg_<?php echo $therapist_id ?>" value="<?php echo $msg ?>" />	
							<?php $therapist_mobile = get_user_meta($therapist_id,'mobile');
							$therapist_countrycde = get_user_meta($therapist_id,'countryCode');	
						 	$output .= '<tr><td>'.$therapist_details->first_name.' '.$therapist_details->last_name.'</td><td>'.$last_coversation.'</td><td id="start_chat_button_'.$therapist_id.'">';
						 	if($is_block_query == 1){
						 	} else {
						 		/*$output .= '<button type="button" class="btn btn-info btn-xs start_chat" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$therapist_details->data->display_name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-role ="'.$current_user->roles[0].'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'" >Start Chat</button>';*/


						 		$in_query="SELECT incomplete_status FROM chat_block_users WHERE (to_user_id=$seeker_id AND from_user_id=$therapist_id)OR(to_user_id=$therapist_id AND from_user_id=$seeker_id) LIMIT 1";
						 		$in_res = $wpdb->get_results($in_query);
						 		$com_query = "SELECT complete_status FROM chat_block_users WHERE from_user_id=$seeker_id and to_user_id=$therapist_id OR from_user_id=$therapist_id and to_user_id=$seeker_id LIMIT 1";
						 		$com_res = $wpdb->get_results($com_query);
						 		if((count($in_res)>0 AND $in_res[0]->incomplete_status==1)AND(count($com_res)>0 AND $com_res[0]->complete_status==1)){
						 			$output .= '<p>Marked as Incomplete to restart chat contact support@thriive.in</p>';$is_blocked="incomplete";
						 			//$output .= '<button type="button" class="btn btn-info btn-xs start_chat" disabled="true";>Completed</button>';$is_blocked="Complete";
						 		}else if(count($in_res)>0 AND $in_res[0]->incomplete_status==1){
						 			$output .= '<p>Marked as Incomplete to restart chat contact support@thriive.in</p>';$is_blocked="incomplete";
						 		}else if(count($com_res)>0 AND $com_res[0]->complete_status==1 AND $in_res[0]->incomplete_status==0){
						 			$output .= '<button type="button" class="btn btn-info btn-xs start_chat" disabled="true";>Completed</button>';$is_blocked="Complete";
						 		}else{
						 		$output .= '<button type="button" class="btn btn-info btn-xs start_chat1" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$therapist_details->data->display_name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-role ="'.$current_user->roles[0].'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'"  onclick="create_dialog(this.dataset.touserid, this.dataset.fromuserid,  this.dataset.email, this.dataset.msg),clear_chatbox(0)">Start Chat</button>';}
						 	}
					 		$output .= '</td><td>'.$is_blocked.'</td></tr>';
						}
						$output .= '</table>';
						echo $output;

						// mobile view starts here
						$output2 = '<section class="mobi_tableview">
						<div class="container">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><table class="table table-bordered" id="chat_user_details_mobile">';
						foreach($result as $row){
							$is_block_query = $wpdb->get_var("SELECT block_status FROM chat_block_users WHERE to_user_id = $row->from_user_id AND from_user_id = $row->to_user_id");
							$is_blocked = $is_block_query == 1 ? 'Blocked' : 'Active';
							$therapist_details = get_userdata($row->to_user_id);
							$therapist_email = $therapist_details->data->user_email;
		     				$seeker_email = $current_user->user_email;
		 					$seeker_name = $current_user->display_name;
							$last_coversation = last_login_chat($row->from_user_id,$row->to_user_id);
							//echo $current_user->role;
							$msg = $seeker_name ." was trying to contact,when you were offline" ;
							$seeker_id = $current_user->ID;
							if($seeker_id != '')
								$from_status = 1;
							else
								$from_status = 0;	
							$therapist_id = $therapist_details->ID;
							if(is_user_online($therapist_id)){
								$to_status = 1;
							} else {
								$to_status = 0;
							} ?>
							<input type="hidden" name = "mobile_<?php echo $therapist_id ?>" id="mobile_<?php echo $therapist_id ?>" value="<?php echo $therapist_mobile[0]; ?>" />
							<input type="hidden" name = "countrycode_<?php echo $therapist_id ?>" id="countrycode_<?php echo $therapist_id ?>" value="<?php echo $therapist_countrycde[0]; ?>" />
							<input type="hidden" name = "msg<?php echo $therapist_id ?>" id="msg_<?php echo $therapist_id ?>" value="<?php echo $msg ?>" />	
							<?php $therapist_mobile = get_user_meta($therapist_id,'mobile');
							$therapist_countrycde = get_user_meta($therapist_id,'countryCode');	
					 		$output2 .= '<tbody><tr><th widht="30%">User Name</th><td>'.$therapist_details->first_name.' '.$therapist_details->last_name.'</td></tr> <tr><th widht="20%">Last Conversation (Date&Time)</th><td>'.$last_coversation.'</td></tr> <tr><th width="10%">Action</th>';
							if($is_block_query == 1){
								$output2 .= '<td></td>';
							} else {
							 	/*$output2 .= '<td id="start_chat_button_'.$therapist_id.'"><button type="button" class="btn btn-info btn-xs start_chat" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$therapist_details->data->display_name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-role ="'.$current_user->roles[0].'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'" >Start Chat</button></td>';*/

							 	$in_query="SELECT incomplete_status FROM chat_block_users WHERE (to_user_id=$seeker_id AND from_user_id=$therapist_id)OR(to_user_id=$therapist_id AND from_user_id=$seeker_id) LIMIT 1";
						 		$in_res = $wpdb->get_results($in_query);
						 		$com_query = "SELECT complete_status FROM chat_block_users WHERE from_user_id=$seeker_id and to_user_id=$therapist_id OR from_user_id=$therapist_id and to_user_id=$seeker_id LIMIT 1";
						 		$com_res = $wpdb->get_results($com_query);
						 		if((count($in_res)>0 AND $in_res[0]->incomplete_status==1)AND(count($com_res)>0 AND $com_res[0]->complete_status==1)){
						 			$output2 .= '<td><p>Marked as Incomplete to restart chat contact support@thriive.in</p></td>';$is_blocked="incomplete";
						 			//$output2 .= '<td><button type="button" class="btn btn-info btn-xs start_chat" disabled="true";>Completed</button></td>';$is_blocked="Complete";
						 		}else if(count($in_res)>0 AND $in_res[0]->incomplete_status==1){
						 			$output2 .= '<td><p>Marked as Incomplete to restart chat contact support@thriive.in</p></td>';$is_blocked="incomplete";
						 		}else if(count($com_res)>0 AND $com_res[0]->complete_status==1 AND $in_res[0]->incomplete_status==0){
						 			$output2 .= '<td><button type="button" class="btn btn-info btn-xs start_chat" disabled="true";>Completed</button></td>';$is_blocked="Complete";
						 		}else{
							 	$output2 .= '<td id="start_chat_button_'.$therapist_id.'"><button type="button" class="btn btn-info btn-xs start_chat1" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$therapist_details->data->display_name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-role ="'.$current_user->role.'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'" onclick="create_dialog(this.dataset.touserid, this.dataset.fromuserid, this.dataset.email, this.dataset.msg),clear_chatbox(0);" >Start Chat</button></td>';}
							}
					 		$output2 .= '</tr><tr><th>Status</th><td>'.$is_blocked.'</td></tr></tbody>';
						}
						$output2 .= '</table></div></div></div></section>';
						echo $output2;
					} ?>
				</div>
			</div>	
		</div>				
	</div>
</section>
<?php
	foreach($totalContactedTherapist as $contactedTherapistId)
	{
		$healer_data = get_userdata($contactedTherapistId);
		?>
			<!-- Modal -->
			<div class="modal fade" id="connect_with_healer_<?php echo $contactedTherapistId; ?>" tabindex="-1" role="dialog" aria-labelledby="connect_with_healer" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-body text-center">
				  	<form data-parsley-validate  class="form-element-section" action="" method="POST">	
					  	<?php wp_nonce_field('connect_with_healer'); ?>
					  	<input name="postId" type="hidden" value="<?php echo $healer_data->post_id; ?>">
				  		<div class="form-group">
							<div class="row  w-70">
								<label for="communication" class="col-12">Communication Mode</label>
									<?php $communication_modes = get_field('communication_mode', $healer_data->post_id); ?> 																		
									<?php foreach($communication_modes as $communication_mode) {?>									
										<div class="checkbox-wrapper col-6">
										<input type="checkbox" name="communication[]" value="<?php echo $communication_mode ?>" id="<?php echo $communication_mode ?>" data-parsley-multiple="communication" data-parsley-errors-container="#message-holder" required>
										<label for="<?php echo $communication_mode ?>"><?php echo $communication_mode ?></label>
									</div>									
								<?php } ?>												
									<div id="message-holder"></div>
						  	</div>
						</div>				        
			         <button type="submit" class="btn btn-primary" name="btnConnectWithHealer" data-dismiss="modal1">SUBMIT</button>			         
				  	</form>
			      </div>			
			    </div>
			  </div>
			</div>
	<?php }
//get_footer(); ?>
<div class="banner-home">
	<div class="container">	
	
		<div id="therapyres">	
			<section class="topreadingList">	
<?php	
		$sessiondata = $wpdb->get_results("SELECT * FROM online_consultation WHERE uid = '". $current_user->ID ."'  AND no_of_sessions > 1 AND payment_status = 'success' ORDER BY id DESC ");
		$i=0;$k=0;
		if(!empty($sessiondata)){ 
			
			$duparr = array();$html = "";
			foreach($sessiondata as $sd){
				$val = 	$sd->tid ;
				//if(!in_array($val,$duparr)){
					$duparr[] = $val;
					$posts = $wpdb->get_row( 
						"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.post_author = '". $sd->tid ."'"
					);
					$remaindetails = $wpdb->get_row("SELECT COALESCE(sum(remaining_session), 0) as remaining_session FROM online_consultation WHERE uid = '". $current_user->ID ."' AND no_of_sessions = '". $sd->no_of_sessions ."' AND amount = '".number_format((float)$sd->amount, 2, '.', '')."' AND payment_status = 'success'");
					set_query_var('remaining_session', $remaindetails->remaining_session);
					//echo "<h2 class='sessdet'>Package Booked</h2>";
					if($i == 0){
						$html .= '<h2 class="sessdet">Booked Package</h2>';$i++;
					}	
					
					$html .= '<table class="table table-bordered table-striped ">';
					
					$html .= '<tr >
							<td class="sessiontext">Package Name</td>
							<td class="sessiondata">'.$sd->package.'</td>
						</tr>
						<tr>
							<td class="sessiontext">Total Sessions</td>
							<td class="sessiondata">'. $sd->no_of_sessions .'</td>
						</tr>
						<tr>
							<td class="sessiontext">Remaining Session</td>
							<td class="sessiondata">'.$sd->remaining_session.'</td>
						</tr>
						<tr>
							<td class="sessiontext">Purchased Date</td>
							<td class="sessiondata">'.date("dS M Y",strtotime($sd->created_date)).'</td>
						</tr>';
					$html .= '</table>';	
					
						//echo "<h2 class='sessdet'>Package Details</h2>";
				 
						if($posts) : ?>
							
								<?php $tempArr = $available = $busy = array();
								
									$post = get_post($posts->ID);
									$status = getTherapistStatus($post->ID);
									if($status == "Available"){
										array_push($available,$posts->ID);
									} 
									if($status == "Busy"){
										array_push($busy,$posts->ID);
									}                           
								
									set_query_var('post', $post);
									set_query_var('count', $k);$k++;
									set_query_var('postcnt',count($sessiondata));
									set_query_var('onlinedetails',$sd);
									set_query_var('therapy',array($sd->therapy_name));
									set_query_var('htmlsync',$html);
									get_template_part('template-parts/therapist-user-content');
									
								
								wp_reset_postdata(); ?>		
							
						<?php endif;
					
			}
				//echo $html;
				//echo $html1;
		}
	 ?>			
				
				</section>
			</div>	
		</div>
	</div>
<div class="terms">
			<h4 class="ftnc" >Terms & Conditions for Packages.</h4>
				<ul class="ftncul" style="padding: 10px;">
					<li class="ftncli ">All packages expire after one year from the date of purchase.</li>
					<li class="ftncli ">This Session Credit can be used within the validity period to book a session with the same Therapist.</li>
					<li class="ftncli ">Packages of multiple session can also be used to book sessions across different Soul Therapies and Therapists with 12 months.</li>
					<li class="ftncli "><a style="color: #007bff;text-decoration: underline;" href="https://www.thriive.in/soul">Click Here</a> to select a different Therapist or Therapy. Use "Existing Package" on payment page to book a session for the same session amount.</li>
					<li class="ftncli ">If the session is cancelled by the Therapist, the user will receive a session credit on their account.</li>
					<li class="ftncli ">In case of an issue, the user may write to support@thriive.in.</li>
				</ul> 
</div>	
<style>
	
	.btn_common,.btn-info,.btn_link1,.btn-primary,.anch_link1 {
	    color: #fff !important;
	    background-color: #19194a !important;
	    border-color: #19194a !important;
	    border-top-right-radius: 20px !important;
	    border-bottom-left-radius: 20px !important;
	    padding: 6px 30px !important;
	    margin: 5%;
	}
	.btn_common:hover,.btn-info:hover,.btn_link1:hover,.btn-primary:hover,.anch_link1:hover {
	    color: #19194a !important;
	    background-color:#fff  !important;
	    border-color: #19194a !important;
	    border-top-right-radius: 20px !important;
	    border-bottom-left-radius: 20px !important;
	    padding: 6px 30px !important;
	    margin: 5%;
	}
.user-sub-action-wrapper {
    color: #fff;
    margin: 0;
    padding: 5px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    background: #f9f9f9;
    display: none;
    position: absolute;
    float: none;
    right: 0;
    left: auto;
    width: 267px;
    z-index: 99999;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
    top: 22px;
    border-radius: 10px;
}
.user-sub-action-wrapper .avatar_img {
    position: absolute;
    left: 10px;
    top: 9px;
    width: 40px;
    height: 40px;
    border-radius: 50px;
}
.user-sub-action-wrapper ul li span {
    font-size: 16px;
    display: block;
    color: #000;
}
.btn_box1 {
    width: 22%;
    min-height: 82px;
    border-radius: 5px;
    background: none !important;
    color: #4f0475 !important;
    padding: 10px !important;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    margin: 0px 1% 2% 0;
    border: 1px solid #4d4d4f;
}
.my-event-btn {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    align-content: center;
}
.banner-home a.btn.secondary-btn.btn_box1 {
    width: 23.6%;
}
.icon_txt1 {
    display: inline-block;
    text-align: center;
    font-size: 13px;
    line-height: 20px;
    width: 100%;
    margin: 10px 0 0 0;
    padding: 0;
}
@media (max-width:600px) {
	.banner-home a.btn.secondary-btn.btn_box1 {
	    width: 49%;
	}
	div.active{
		display: block;
	}
}


.user-sub-action-wrapper ul li a{
	color: #000 !important;
}

.myacctn{
	font-size:22px !important;
}

body {
    color: unset;
    overflow-x: hidden;
    font-family: "Work Sans",'Rupee_Foradian', sans-serif !important;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Work Sans",'Rupee_Foradian', sans-serif !important;
    color: #153483;
}



</style>

<style type="text/css">


		@media screen and (max-width:767px) and (min-width:320px){
		.topreadingList{
			padding: 0;
		}

		.clickgroup{
			display: inline-block !important;
			margin-left: -6px !important;
		}
		.btnCallnow{
			height: 2rem;
		    width: 83px;
		    text-align: center;
		    padding: 0px !important;
		    line-height: 2rem;
		}
		.fa-phone{
			color: #fff;
    		margin-right: 5px;
		}
		.btn{
			height: 32px;
		    padding: 5px !important;
		    width: 89px;
		}
		.fa-comments-o{
			margin-right: 3px;
		}
		.book_now_link_oc{
			height: 33px;
    		padding: 5px !important;
		    width: 115px;
		    line-height: 22px;
		    margin-top: 10px;
		}
		.fa-calendar{
			margin-right: 5px;
		}
		
		}
		
	</style>


<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>