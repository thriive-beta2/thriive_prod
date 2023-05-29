<?php /* Template Name: seeker my account page */ 
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
<?php get_header(); ?>
<section class="banner-home">
	<div class="container">
		<div class="row w-70">
			<div class="col-12 text-center section">
				<h1 class="w-100">My Account</h1>
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
						<!--<a class="btn secondary-btn btn_box1"  data-toggle="modal" data-target="#delete_user_popup" href="">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/delete_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">DELETE</span> 
						</a> -->
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/user-chat-history/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">VIEW CHAT</span>
						</a>
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/therapist/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/newchat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">START NEW CHAT</span>
						</a>
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/seeker-my-account-edit/?download_report=yes'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">EXPORT CHAT</span>
						</a>
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/seeker-call-history/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">CALL HISTORY</span>
						</a>
							<?php if(isset($_GET['download_report']))
							{
								export_csv();
							}
							?>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto count-wrapper">
				<div class="col text-center">	
					<input type="hidden" name = "session_user" id="session_user" value="<?php echo $current_user->ID ?>" />
					<?php $result = fetch_user_therapist();
					if($result){
						$output = '<table class="table table-bordered table-striped desk_tablevw" id="chat_user_details"><tr> <th widht="30%">User Name</th><th widht="20%">Last Conversation (Date&Time)</th><th width="10%">Action</th><th width="10%">Status</th></tr>';
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
						 		$output .= '<button type="button" class="btn btn-info btn-xs start_chat" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$therapist_details->data->display_name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-role ="'.$current_user->roles[0].'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'" >Start Chat</button>';
						 	}
					 		$output .= '</td><td>'.$is_blocked.'</td></tr>';
						}
						$output .= '</table>';
						echo $output;

						// mobile view starts here
						$output2 = '<section class="mobi_tableview">
						<div class="container">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><table class="table" id="chat_user_details_mobile">';
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
							 	$output2 .= '<td id="start_chat_button_'.$therapist_id.'"><button type="button" class="btn btn-info btn-xs start_chat" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$therapist_details->data->display_name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-role ="'.$current_user->roles[0].'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'" >Start Chat</button></td>';
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
get_footer(); ?>