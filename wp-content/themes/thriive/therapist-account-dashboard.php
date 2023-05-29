<?php /* Template Name: Therapist account dashboard */ ?>
<?php
	if (!is_user_logged_in()) 
	{ 
		wp_redirect('/login/');
		exit();
	} 
	else 
	{
		$current_user = wp_get_current_user();
		$current_user_name = $current_user->first_name.' '.$current_user->last_name;
		if(get_post_status($current_user->post_id)=='pending-payments' || get_post_status($current_user->post_id) != 'publish') {
			wp_redirect(get_permalink(274));
		}

		$address =json_decode($current_user->address);
		$userPost = get_post($current_user->post_id);
		//if user's role is subscriber then redirect to seeker dashboard 
		if($current_user->roles[0] == 'subscriber')
		{
			wp_redirect('my-account-page/');
			exit();
		}
	}
/*
	
	echo "<pre>";
	print_r($userPost); 
	echo "</pre>";
*/
	
?>
<?php get_header(); ?>


<style>
        h1 {
            color: green;
        }
                
        /* toggle in label designing */
        .toggle {
            position : relative ;
            display : inline-block;
            width : 100px;
            height : 36px;
            background-color: red;
            border-radius: 35px;
            border: 2px solid gray;
        }
                
        /* After slide changes */
        .toggle:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 32px;
            border-radius: 50%;
            background-color: gray;
            top: 1px; 
            left: 1px;
            transition:  all 0.5s;
        }
                
        
                
        /* Checkbox checked effect */
        .checkbox:checked + .toggle::after {
            left : 49px; 
        }
                
        /* Checkbox checked toggle label bg color */
        .checkbox:checked + .toggle {
            background-color: green;
        }
                
        /* Checkbox vanished */
        .checkbox { 
            display : none;
        }
    </style>	
</style>

								
				
<section class="dashboard-head">
	<div class="container therapist-dashboard-container"><br/><br/>
		<?php
					$sessiondata = $wpdb->get_results("SELECT o.id,o.category_name,o.payment_txnid,o.tid,o.uid,c.book_date,c.book_time,o.uname FROM online_consultation o,oc_video_call c WHERE o.tid = '". $current_user->ID ."'  AND CONCAT(c.book_date, ' ', c.book_time) >= '".date("Y-m-d H:i:s")."'  AND o.payment_status = 'success' AND o.id = c.oc_id");
					if(!empty($sessiondata)){
						echo "<h3>Upcoming Appointments</h3>";
						$duparr = array();	
						foreach($sessiondata as $sd){
							if(strpos($sd->uname, "@") !== false){
								$uname = explode('@', $sd->uname)[0];
							} else{
								$uname = $sd->uname;
							}							
					?>	
					<table class="table table-bordered table-striped ">	
						<tr>
							<td><a href="<?php echo site_url();?>/appointment"><b><?php echo ucwords(str_replace("-"," ",$sd->category_name)).'-'.$uname.'-'.date("dS M Y",strtotime($sd->book_date)).'-'.date("h:i a",strtotime($sd->book_time));?></b></a></td>
						</tr>
						
					</table>	
<?php
						}
					}
					 ?>			
			
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12 wrapper-listing-post">						
				<div class="healer-circle mt-3">
					<div class="inner-healer-circle">
						<?php  echo wp_get_attachment_image($userPost->profile_picture);?>
					</div>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/icon-mark.png" class="verify-img" alt="">
				</div>					
			</div>
			<?php 
			$idsarr = array();$i=0;
			if(have_rows('therapist_data', 'option')):
				while(have_rows('therapist_data', 'option')): the_row();
					if('tarot-card-reading' == get_sub_field('taxonomy')->slug){
					  $idsstr = get_sub_field('display_ids');  
					}
					/* if('angel-reading' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					} */
					/* if('life-coach' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					} */
					/* if('counseling-consulting' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					} */
					
					/* if('cosmic-astrology' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					} */
					/* if('meditation' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					} */
					if('silver-readers' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					}
					if('gold-readers' == get_sub_field('taxonomy')->slug){
					  $idsstr .= ",".get_sub_field('display_ids');  
					}
					/* if('platinum-readers' == get_sub_field('taxonomy')->slug){
					  $ids .= ",".get_sub_field('display_ids');  
					} */
					if(('eft-appointment' ==  get_sub_field('taxonomy')->slug) || ('plr-appointment-page' == get_sub_field('taxonomy')->slug) || ('inner-child-healing'  == get_sub_field('taxonomy')->slug) || ('sex-therapy'  == get_sub_field('taxonomy')->slug) || ('love-therapy'  == get_sub_field('taxonomy')->slug)){
						
						$idsstr1 .= get_sub_field('display_ids');
						if($i > 0){
							$idsstr1 .= ",";	
						}
					//	echo 'idsstr'.$i;echo "<br/>";
						$i++;	
					}	
				endwhile;
			endif;
			$idsstr .= ",30227,77786";
		//	$idsstr1 .= ",77786";
			
			
			$idsarr = explode(",",$idsstr);
			$idsarr1 = explode(",",$idsstr1);
		//	print_r($idsarr1);
			//echo 'post_id'.$current_user->post_id;
			?>
			<div class="col-lg-7 col-md-8 col-sm-12 col-12 txt-wrap">
				<h3 class=""><?php echo $userPost->post_title;?></h3>
				<p><?php echo get_field("therapist_title",$userPost->ID); ?></p>
				<p class="localtion-wrapper"><?php echo $userPost->about;?></p>
				<?php 
				if(in_array($current_user->post_id,$idsarr)){
					$availability = $wpdb->get_row("SELECT * FROM therapist_availability_status WHERE tid = '".$current_user->ID ."'");
					if($availability->availability_status == 4){
						$status = '';
					} else {
						$status = 'checked';	
					}
					?>	
					<div class="btn secondary-btn btn_box1" style="width:100% !important;">
						<label style="color:green;">Available</label>
						<center style="padding:15px">
							<input type="checkbox" id="switch" class="checkbox" <?php echo $status; ?> onchange="changeavailability();"/>
							<label for="switch" class="toggle">
								
							</label>
						</center>
						<label style="color:red;">Unavailable</label>		
					</div>
				<?php 
				}
				?>	
					<div class="my-event-btn">
						<a class="btn secondary-btn btn_box1" href="<?php echo get_permalink(274); ?>?edit-step=1">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/editprofile_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">EDIT PROFILE</span>
						</a>
						<!--<a class="btn secondary-btn btn_box1 delete_user" data-toggle="modal" data-target="#delete_user_popup">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/delete_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">DELETE PROFILE</span>
						</a> -->
						<a class="btn secondary-btn btn_box1 create_badge" data-toggle="modal" href="#" data-target="#show_badge">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">VIEW BADGE</span>
						</a>
						<!--<a class="btn secondary-btn btn_box1" href="<?php //echo site_url().'/therapist-chat-history/'?>">
							<img src="<?php //echo site_url(); ?>/wp-content/themes/thriive/assets/images/newchat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">VIEW CHAT</span>
						</a>-->
					<?php 
						
					if(in_array($current_user->post_id,$idsarr)){	

					?>	
						<a class="btn secondary-btn btn_box1" href="https://www.thriive.in/chat-page" style="background-color: #039BE5 !important;color: #fff !important;">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/newchat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">LIVE CHAT</span>
						</a>
						

					<?php 
					}	
					if(in_array($current_user->post_id,$idsarr1)){ 
					?>
						<a class="btn secondary-btn btn_box1" href="https://www.thriive.in/appointment" style="background-color: #F5C5FF !important;color: #fff !important;">
							<!--<a onclick="alert('Coming Soon')" class="btn secondary-btn btn_box1" href="#" style="background-color: #F5C5FF !important;color: #fff !important;">-->
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/newchat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">Appointment Page</span>
						</a>
						
					<?php
					}
						if($current_user->ID == 15680){
						?>

						<a class="btn secondary-btn btn_box1" href="https://www.thriive.in/instant-video" style="background-color: #FFB235 !important;color: #fff !important;">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/newchat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">Instant Video</span>
						</a>						

						<?php }?>

						<!--<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/seeker-my-account-edit/?download_report=yes'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">EXPORT CHAT</span>
						</a>-->
						<!--<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/therapist-call-history/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/chat_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">CALL HISTORY</span>
						</a>-->
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/change-password/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/password_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">CHANGE PASSWORD</span>
						</a>
						<?php $therapist_url = get_site_url().'/therapist/'.$userPost->post_name; ?>
						<a class="btn secondary-btn btn_box1" href="<?php echo $therapist_url;?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/user_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">VIEW PROFILE</span>
						</a>
					<?php 
					if(in_array($current_user->post_id,$idsarr1)){ 
					?>	
						<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/availability-business-model'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/password_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">Add Timing</span>
						</a>
					<?php 
					}
					?>	
						<!--<a class="btn secondary-btn btn_box1" href="<?php echo site_url().'/therapist-session-details/'?>">
							<img src="<?php echo site_url(); ?>/wp-content/themes/thriive/assets/images/password_icon.png" class="iconz1" alt="">
							<span class="icon_txt1">Session Details</span>
						</a>-->
					</div>
				
				<?php if(isset($_GET['download_report']))
					{
						export_csv();
					}
				?>
			</div>
		</div>


	<?php 
	if($current_user->ID){
			$current_user_id = $current_user->ID;
			$current_date = date("Y-m-d H:i:s");
			$query = "SELECT * FROM online_consultation WHERE action='videocall' AND uid = $current_user_id AND busy_date > '$current_date' ORDER BY id DESC LIMIT 1";
			$res = $wpdb->get_results($query);
			//print_r($res);
			if(strlen($res[0]->call_id)>0){
				//echo $res[0]->call_id.'?prejoin=false&name='.$res[0]->uname;
			
			
	?>	

<style>
	.instant_video_link{
		text-align: center;
	    border: solid 1px;
	    border-radius: 10px;
	    padding: 10px 40px;
	    width: 100%;
	    margin: 0 auto;
	    display: block;
	    margin-left: 25px;
	    background-color: #FEE86C;
	}
</style>

	<div class="instant_video_link">
		<p style="font-size: 18px;">If You were accidentally dropped off your call please click on this link</p>
		<a href="<?php echo $res[0]->call_id.'?prejoin=false&name='.$res[0]->uname;?>"><p style="width: 100%;overflow: hidden;word-break: break-all;" id="video_link">ReJoin Video Call</p>
	</div>	


<?php }} ?>





		
		<?php 
			$query = "SELECT * FROM oc_video_call WHERE tid=$current_user->ID and action='videocall' ORDER BY id DESC";
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
				$oc_id = $fdata[0]->oc_id;		
				$uid = $fdata[0]->uid;
				$channel = $fdata[0]->channel;
				$query = "SELECT * FROM wp_usermeta where user_id=$uid AND meta_key='first_name'";
				$fdata = $wpdb->get_results($query);
				$uname = $fdata[0]->meta_value;	
				$add_hour = 3600;
				$end_time = strtotime($app_time)+3600;

				if(time()>strtotime($app_time) AND time()<$end_time AND strtotime(date('Y-m-d')) == strtotime($app_date)){
					//$vlink = get_site_url().'/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/index.php?appid=2dbedd3f03bf4a089b098987a8407baa&channel='.$channel.'&token=&u=ttime';
					$vlink = 'https://video.knowlarity.com/room/'.$channel.'?password=123456&custom_var='.$oc_id.'&prejoin=false&name='.$current_user_name;
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
						<div class="m-4 divider"></div>	
			<div class="sch_app" style="width:100%">
				<h2 style="font-size: 22px;text-align: center;">Video Call Appointments</h2>
				<table class="table table-bordered table-striped">
					<tr><td>User Name</td><td><?php echo $uname;?></td></tr>
					<tr><td>Appointment date</td><td><?php echo $app_date;?></td></tr>
					<tr><td>Appointment time</td><td><?php echo $app_time;?></td></tr>
					<tr><td><button class="btnConsult" id="callbtn" onclick="location.href='<?php echo $vlink;?>'">Voice Call</button></td><td><button class="btnConsult" style="width:10rem;" onclick="location.href='<?php echo $vlink;?>'">Start Video Call</button></td></tr>
				</table>
			</div><?php }?>	
		
			<div class="m-4 divider"></div>


<?php 
	if($current_user->ID == 15680){
			$current_date = date("Y-m-d H:i:s");
			$query = "SELECT * FROM online_consultation WHERE action='videocall' AND uid = 15680 AND busy_date > '$current_date' ORDER BY id DESC LIMIT 1";
			$res = $wpdb->get_results($query);
			//print_r($res);
			if(strlen($res[0]->call_id)>0){
				//echo $res[0]->call_id.'?prejoin=false&name='.$res[0]->uname;
			
			
	?>	

<style>
	.instant_video_link{
		text-align: center;
	    border: solid 1px;
	    border-radius: 10px;
	    padding: 10px 40px;
	    width: 100%;
	    margin: 0 auto;
	    display: block;
	    margin-left: 25px;
	    background-color: #FEE86C;
	}
</style>

	<div class="instant_video_link">
		<p style="font-size: 18px;">If You were accidentally dropped off your call please click on this link</p>
		<a href="<?php echo $res[0]->call_id.'?prejoin=false&name='.$res[0]->uname;?>"><p style="width: 100%;overflow: hidden;word-break: break-all;" id="video_link">ReJoin Video Call</p>
	</div>	


<?php }} ?>




<?php //this section is not needed 
/*
REMOVE ID -> tad269
*/
?>



		<div class="m-4 divider"></div>	
		<!--Free  sessions [START]-->
		<?php
				$used_session_count = array();
			$remaining_sessions = 5;
			if(is_user_logged_in()){
				global $wpdb;
				$current_user_id = get_current_user_id();
				$query = "SELECT * FROM free_online_consultation WHERE tid=$current_user_id";
				$run = $wpdb->get_results($query, true);
				$total_sessions = count($run);
				$run_json = json_encode($run);
				$run = json_decode($run_json, true);
				$created_date = date("m", strtotime($run[$total_sessions-1]['created_date']));
				$current_month = date("m", time());

				if($total_sessions<6){
					for($i=$total_sessions-1;$i>-1;$i--){
						$used_session_count[$i] = date("m", strtotime($run[$i]['created_date']));
						
					}	
				}else{
					for($i=$total_sessions-1;$i>=$total_sessions-5;$i--){
					$used_session_count[$i] = date("m", strtotime($run[$total_sessions-1]['created_date']));
				}
				}

				foreach($used_session_count as $key){
					if($key == $current_month){
						$remaining_sessions = $remaining_sessions-1;
					}
				}
			}
		?>

	
		 <h2 style="font-size: 22px;text-align: center;">Free Session Count</h2>
		<div class="remaning_sessions">
			 
			<table class="table table-bordered table-striped">
				<tr><td>Total Free Sessions Taken</td><td><?php echo $total_sessions;?></td></tr>
				<tr><td>Current Month Free Sessions</td><td><?php echo $remaining_sessions;?> / 5</td></tr>
			</table>
			
		</div>
		 
		<!--Free sessions [END]-->
		
		
		
		</div>
	</div>
</section>

<section class="dashboard-content">
	<div class="container">
		<!--<div class="row section review-seeker">
			<h4 class="col-12 col-sm-7 mx-auto">Seeker Reviews</h4>
		
			<?php  for ($x = 1; $x < 4; $x++) {
				$keyValue = 'ref_'.$x;
				if($x==1){
				  	$refName = $userPost->first_reference_name;
				} else if($x==2){
					$refName = $userPost->second_reference_name;
				} else if($x==3){
					$refName = $userPost->third_reference_name;
				}
			?>
		
			<div class="col-12 col-sm-7 mx-auto mt-2">
				<p><?php echo $current_user->$keyValue;?></p>
				<div class="text-highlight"><?php echo $refName;?></div>
			</div>
			
			
			<?php  } ?>
		</div>
		<div class="m-4 divider"></div>-->
		<?php $package = get_post($userPost->select_package[0]); 
			$transaction = get_post($current_user->transaction);
			$valid_till = get_field("end_date",$current_user->transaction);
		?>
		<div class="row dashboard-package">
			<div class="col-lg-4 col-md-4 col-sm-3 col-12">
				<div class="package-wrapper">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images//package3.png" class="img-fluid mobi_picDashbrd" alt="">
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-9 col-12">
				<h6 class="mobi_headtxt"><?php echo $package->post_title;?> package </h6>
				<div class="package-price mobi-pckgCont">
					<span class="package-price">INR <?php echo $package->package_charges;?>/-</span>
						<p class="mt-1">
							<?php
								if($valid_till)
								{
									echo "Valid Till : " . $valid_till;
								}
							?>
						</p>
				</div>
			</div>
			
			<div class="col-offset-lg-8 col-offset-md-8 col-sm-12 col-12 mt-4 ther_btnsGrp2">
				<?php if($package->post_title != 'Fire'){ ?>
				<div class="ther_btns2">
					 <button type="button" class="btn btn-primary btnMobi" onclick="location.href='<?php echo get_permalink(406) . "/?action=upgrade-package"; ?>';">UPGRADE</button>
				</div>
				<?php } ?>
				
				<div class="ther_btns2">
					<a href="<?php echo site_url(); ?>/package-details/" class="btn btn-primary btnMobi" target="_blank">KNOW MORE</a>
				</div>
				
				<div class="ther_btns2">
					<?php
						if($package->package_charges > 0)
						{
							$codeD = $current_user->user_email.$current_user->ID . time();  
							$code = sha1( $codeD );
							$renewal_url = get_permalink(274) . "/?package=renew&token=" . $code . "&token_id=" . $current_user->ID . "&token_for=" . $current_user->user_email;
							?> <a href="<?php echo get_permalink(406) . "/?action=renew-package"; ?>"><button type="button" class="btn btn-primary btnMobi">RENEW</button></a> <?php
						}
					?>
				</div>
				
			</div>
		</div>
		<div class="m-4 divider"></div>
		<div class="row section dashboard-therapies-details">
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Therapies</h6>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress((($userPost->therapy) ? $userPost->therapy :0),$package->number_of_therapies);?>" aria-valuemin="0" aria-valuemax="100" <?php if($package->post_title != 'Fire'){ ?> style="width:<?php echo calculateProgress($userPost->therapy,$package->number_of_therapies);?>%" <?php } ?>></div>
					</div>
					<div class="text-center text-highlight"><?php echo ($userPost->therapy) ? $userPost->therapy :0; ?> / <?php if($package->post_title == 'Fire'){ echo "&infin;"; }else { echo $package->number_of_therapies; } ?></div>
					<div class="sub-text">To add more therapies contact us at accountmanager1@thriive.in</div>
				</div>
				
				<div class="col-2">
					<a href="edit-therapies" class="text-highlight link-dashboard-details">></a>
				</div>
				
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Gallery Images</h6>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress($userPost->gallery,$package->number_of_images);?>"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo calculateProgress($userPost->gallery,$package->number_of_images);?>%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo (($userPost->gallery ) ? $userPost->gallery :0);?> / <?php echo $package->number_of_images;?></div>
					<div class="sub-text">Add images to enhance your profile page</div>
				</div>
				
				<div class="col-2">
					<a href="my-gallery" class="text-highlight link-dashboard-details">></a>
				</div>
				
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Gallery Videos</h6>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress($userPost->videos,$package->number_of_videos);?>"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo calculateProgress($userPost->videos,$package->number_of_videos);?>%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo (($userPost->videos ) ? $userPost->videos :0);?> / <?php echo $package->number_of_videos;?></div>
					<div class="sub-text">Add videos to enhance your profile page</div>
				</div>
				
				<div class="col-2">
					<a href="/my-gallery" class="text-highlight link-dashboard-details">></a>
				</div>
				
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Event/ Workshops</h6>
				</div>
				<div class="col-6 col-sm-6">
					<?php
						$createdThriiveEvent = explode(",",get_user_meta($current_user->ID,'my_events',true));
						$createdThriiveEvent = count(array_filter($createdThriiveEvent));
					?>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress($createdThriiveEvent,$package->number_of_events);?>"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo calculateProgress($createdThriiveEvent,$package->number_of_events);?>%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo $createdThriiveEvent; ?> / <?php echo $package->number_of_events;?></div>
					<div class="sub-text">You can upload an event on your profile page but promotion and listing of the event on our website is only available for Water/Fire package.</div>
				</div>
				
				<div class="col-2">
					<a href="<?php echo get_permalink(1909); ?>" class="text-highlight link-dashboard-details">></a>
				</div>
				
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>My Blog</h6>
					<?php
						//echo get_post_meta($current_user->post_id, 'my_blogs');
						//print_r(count(get_post_meta($current_user->post_id, 'my_blogs')[0]));
					?>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow=""aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo count(array_filter(get_field('my_blogs', $current_user->post_id))); ?> / &infin;</div>
					<div class="sub-text">Articles added here will be displayed on your profile page</div>
				</div>
				
				<div class="col-2">
					<a href="<?php echo get_permalink(1873); ?>" class="text-highlight link-dashboard-details">></a>
				</div>
				
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Request For Blog</h6>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress((($userPost->request_for_blog) ? $userPost->request_for_blog :0),$package->request_for_blog);?>"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo calculateProgress((($userPost->request_for_blog) ? $userPost->request_for_blog :0),$package->request_for_blog);?>%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo (($userPost->request_for_blog) ? $userPost->request_for_blog :0);?> / <?php echo $package->request_for_blog;?></div>
					<div class="sub-text">Get featured in our blogs.This feature is available only for Fire package.</div>
				</div>
				
				<div class="col-2">
					<?php 
					$blogRequestCount =  (($userPost->request_for_blog) ? $userPost->request_for_blog :0);
					if(($blogRequestCount)<($package->request_for_blog)){
					?>
						<a href="#" data-toggle="modal" data-target="#request_for_blog"  class="text-highlight link-dashboard-details">></a>
					<?php 	
					}
					?>
					
				</div>
				
			</div>
			<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Request For Newsletters</h6>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress((($userPost->request_for_news_letter) ? $userPost->request_for_news_letter :0),$package->request_for_news_letter);?>"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo calculateProgress((($userPost->request_for_news_letter) ? $userPost->request_for_news_letter :0),$package->request_for_news_letter);?>%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo (($userPost->request_for_news_letter) ? $userPost->request_for_news_letter :0);?> / <?php echo $package->request_for_news_letter;?></div>
					<div class="sub-text">Get featured in our newsletter.This feature is available only for Fire package</div>
				</div>
				<div class="col-2">
					<?php 
					$newslRequestCount =  (($userPost->request_for_news_letter) ? $userPost->request_for_news_letter :0);
					if(($newslRequestCount)<($package->request_for_news_letter)){
					?>
						<a href="#" data-toggle="modal" data-target="#request_for_news" class="text-highlight link-dashboard-details">></a>
					<?php 	
					}
					?>
				</div>
			</div>
			<?php if($package->ID != '129'){ ?>
				<div class="col-12 col-sm-7 d-flex mx-auto mt-3 p-0">
				<div class="col-4 col-sm-4">
					<h6>Request For Promotion</h6>
				</div>
				<div class="col-6 col-sm-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo calculateProgress((($userPost->promotion_count) ? $userPost->promotion_count :0),$package->request_for_promotion);?>"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo calculateProgress((($userPost->promotion_count) ? $userPost->promotion_count :0),$package->request_for_promotion);?>%"></div>
					</div>
					<div class="text-center text-highlight"><?php echo (($userPost->promotion_count) ? $userPost->promotion_count :0);?> / <?php echo $package->request_for_promotion;?></div>
					<div class="sub-text">Get featured in our promotion.This feature is available only for Water & Fire package</div>
					<?php if($userPost->promotion_count < $package->request_for_promotion){ ?>
						<form method="post">
							<input type="hidden" name="post_id" value="<?php echo $current_user->post_id;?>"/>
							<input type="submit" name="paid_promotion" value="Send a request" class="btn btn-primary" />
						</form>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="m-4 divider"></div>
		
		<div class="row section pb-5">
			<div class="col-12 col-sm-7 mx-auto text-center">
				<p>For any additional requirements contact your account manager</p>
				 <button type="button" class="btn btn-primary request_popup" data-toggle="modal" data-target="#request_popup">CONTACT ACCOUNT MANAGER</button>
			</div>
		</div>
		
		
	</div>
</section>
<!--
<div class="badge_wrapper">
	<p><?php echo $current_user->first_name.' '.$current_user->last_name;?></p>
</div>
<div class="badge_wrapper_download"></div>
-->


 <div class="modal fade" id="show_badge" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
        	 <button type="button" class="close" data-dismiss="modal">&times;</button>
        	<div class="badge_view_wrapper">
				<p><?php echo $current_user->first_name.' '.$current_user->last_name;?></p>
			</div>
			<div class="text-center">
				<a href="" download="badge_image.png" class="badge-btn" download> <i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD BADGE</a>
			</div>
        	               
        </div>
      </div>
    </div>
 </div> 
<style>
p.timer_text2 {
    padding: 15px;
    font-size: 16px;
	color:#fec031;
}
.ares {
	background-color:#fec031;
	
}
.rres {
	background-color:#fff;
}
.restxt {
	padding: 15px;
}
.msutn1 {
   margin-left: 10px;
   clear: both;
}
</style>

<?php 
include_once get_stylesheet_directory().'/new-footer.php'; 
//get_footer(); ?>