<div class="d-flex col-12 col-sm-12 mt-10 wrapper-listing section-wrapper-listing p-0 flex-wrap tlistpage" itemscope itemtype="http://schema.org/Physician" itemprop="Physician">
	<div class="therapiest-listing-wrapper d-flex flex-wrap col-12 p-0">
	<div class="col-sm-6 col-xs-4 col-lg-4 wrapper-listing-post therapiest-card-img ">
		<div class="healer-circle mt-2">
			<div class="inner-healer-circle">
				<a href="<?php echo get_permalink(); ?>">
				<?php 
					if(is_mobile()) {
						$healer_image = the_post_thumbnail('featured_post_mobile', array('alt' => get_the_title(), 'title'=>get_the_title(),'itemprop'=>'image')); 
					} else {
						$healer_image = the_post_thumbnail('thumbnail', array('alt' => get_the_title(), 'title'=>get_the_title(),'itemprop'=>'image'));
					} 
					echo $healer_image; ?>			
				</a>
			</div>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-mark.png" class="verify-img" alt="">
		</div>
	</div>	
	<div class="col-sm-6 col-xs-8 col-lg-8 txt-wrap " style="padding:10px 8px 0px 8px !important;">
		<h2 itemprop="name"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
<?php 

		$therapist_details = get_users(array('meta_key' => 'post_id','meta_value' => get_the_id()));
		$therapist_id = $therapist_details[0]->ID;
//echo "<pre>";
//print_r($therapist_details);
		//echo "Therapist ID==".$therapist_id."online_status==".is_user_online($therapist_id)."post id==".get_the_id();
		 if(is_user_online($therapist_id) && $therapist_id != '')
{
   echo '<h2 class="online_headTxt" style="float:right;color:green"><span class="onlinestat_circle">&nbsp;</span> Online</h2>';
 }
 else
 {
   echo '<h2 class="offline_headTxt" style="float:right;color:#999"><span class="offlinestat_circle">&nbsp;</span> Offline</h2>';
 }
		
		?>
		<!-- <p class="m-0 localtion-wrapper"><?php echo get_field('therapist_title'); ?></p> -->
		<?php
			if(have_rows('therapy')) {
				$experience_order = array();
				if(isset($_GET) && $_GET['therapy']){
					$term = get_term_by('slug', $_GET['therapy'], 'therapy');
					$tdtchg = getTherapyDtChg($post->ID,$term->name);
				} else {
					$tdtchg = getTherapyDtChg($post->ID,'');
				}
				?>
				<p style="font-family: Segoe UI;line-height: 1.36;" class="m-0 font-14 tt-text">
					<?php if(isset($_GET) && $_GET['therapy']){ ?>
					<span itemprop="medicalSpecialty">
					<?php } else {?>
						<span class="more_therapiest_listpg" itemprop="medicalSpecialty">
					<?php } 
						$total_count = count($tdtchg);
						$count = 1;
						foreach($tdtchg as $t){
							if(isset($_GET) && $_GET['therapy']){
								echo $t['tname'];
							} else {
								echo $t['tname'] . ($total_count == $count ? '.' : ', ');
							}
							$experience_order [$count] = $t['experience'];
							$charges += $t['charges']; 
							$count++;
						}
						?>
					</span>
				</p>
				<p style="font-family: Segoe UI;line-height: 1.36;" class="m-0 font-14">
					<?php $current_year = date("Y");
						$current_month = date("m");
						array_multisort( $experience_order, SORT_ASC, $tdtchg );
						$therapy_Exp = getTherapistExperience($experience_order['0']);
				
						echo "$therapy_Exp experience overall";
					?>
				</p>
				<?php
			}
		?>
		<?php if(!empty(get_field('avg_rating'))) { ?>
			<!-- <p>
	    		<?php for($i=1;$i<=get_field('avg_rating');$i++){ ?>
	    			<span class="fa fa-star"></span>
	    		<?php } ?>
	    		<?php $leftstar = 5 - (int)get_field('avg_rating'); ?>
	    		<?php for($i=1;$i<=$leftstar;$i++){ ?>
	    			<span class="fa fa-star-o"></span>
	    		<?php } ?>
			</p> -->
			<?php $args = array(
				'rating'=>get_field('avg_rating'),
				'type'=>'rating',
				'number'=>0,
				'echo'=>true
			);
			star_rating($args); ?>
		<?php } ?>
		
		<div class="row">
		<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="col-md-8 col-xs-12 font-14">
			<?php $area = get_field('area');
			$splitarea = explode(",",$area);
			if($area) { ?>
				<p style="font-family: Segoe UI;" class=' m-0'>
					<span itemprop="addressLocality"><?php echo $splitarea[0]; ?></span>, 
					<span class="tcity" itemprop="addressRegion"><?php echo $splitarea[1].'  '; ?></span>&nbsp;
					<?php if(is_mobile()){ 
					 if($post->distance) {echo '<span class="fa fa-map-marker mr-1 fa-md mg-5"></span>'.$post->distance; }
				} ?>
				</p>
			<?php } ?>
		</div>
		<div class="col-md-4 col-xs-12 font-14">
			<?php if(!is_mobile()){ 
					 if($post->distance) {echo '<span class="fa fa-map-marker mr-1 fa-md mg-5"></span>'.$post->distance; }
				} ?>
		</div>
		</div>
		<?php if(isset($_GET) && $_GET['therapy'] && $charges != 0){ ?>
			<p style="font-family: Segoe UI;line-height: 1.36;" class="m-0 font-14">
				<?php echo 'Fees: &#8377; '.$charges; ?>
			</p>
		<?php } ?>
		<?php 
        if(!is_mobile()){
            if(getLatestReview(get_the_id())){ ?>
			<p style="font-family: Segoe UI; font-size:14px;"><span class="more_therapiest"><?php echo '&ldquo;'.end(getLatestReview(get_the_id())).'&rdquo;'; ?></span></p>
		<?php } } ?>
		<?php //if($post->distance) { echo "<p class='m-0'>Distance: $post->distance</p>"; } ?>
		<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates" style="display:none;">
			<span itemprop="latitude"><?php echo get_field('latitude'); ?></span>
			<span itemprop="longitude"><?php echo get_field('longitude'); ?></span>
		</div>

		<?php $current_user = wp_get_current_user();
		 $seeker_id = $current_user->ID;
		     $seeker_email = $current_user->user_email;
	
		 $seeker_name = $current_user->display_name;
		if(count($current_user->roles) > 1)
		 $role1 =  $current_user->roles[1];
		else
			 $role1 =  $current_user->roles[0];
		
		
			$therapist_email = $therapist_details[0]->data->user_email;
			//echo site_url();
		$msg = $seeker_name ." was trying to contact,when you were offline" ;
		
		if($seeker_id != '')
			$from_status = 1;
		else
		$from_status = 0;	
		$therapist_id = $therapist_details[0]->ID;
	
		 if($role1== "subscriber")
		 {
		$arr = get_user_meta($therapist_id, 'first_name');
		$name = $arr[0];
		 }
	 else
	 {
		 $name = $therepist_data->display_name;
	 }
		
		$therapist_mobile = get_user_meta($therapist_id,'mobile');
			$therapist_countrycde = get_user_meta($therapist_id,'countryCode');
		?>
		<input type="hidden" name = "mobile_<?php echo $therapist_id ?>" id="mobile_<?php echo $therapist_id ?>" value="<?php echo $therapist_mobile[0]; ?>" />
		<input type="hidden" name = "countrycode_<?php echo $therapist_id ?>" id="countrycode_<?php echo $therapist_id ?>" value="<?php echo $therapist_countrycde[0]; ?>" />
		<input type="hidden" name = "msg<?php echo $therapist_id ?>" id="msg_<?php echo $therapist_id ?>" value="<?php echo $msg ?>" />
		<input type="hidden" name = "session_user" id="session_user" value="<?php echo $current_user->ID ?>" />
		

		<?php
		//echo "==".is_user_online($therapist_id);
		$output = '<div class="btn_groups">';
 if(is_user_online($therapist_id) && $therapist_id != '')
{
   $to_status = 1;
 }
 else
 {
	  $to_status = 0;
 }
	$url = get_the_post_thumbnail_url( get_the_id(), 'post-thumbnai' );	
	if(!is_mobile()){
		$event = 'desktop'; 
	} else {
		$event = 'mobile';
	}
 $output .= '<div id="start_chat_button_'.$therapist_id.'">
 <input type="hidden" id="chat_event" value="'.$event.'">
<button type="button" class="btn btn-info btn-xs btn-big start_chat" data-img ="'.$url.'" data-fromuserid = "'.$seeker_id.'" data-touserid="'.$therapist_id.'" data-tousername="'.$name.'" data-from_status = "'.$from_status.'" data-to_status = "'.$to_status.'" data-mobile="'.$therapist_countrycde[0].$therapist_mobile[0].'" data-msg="'.$msg.'" data-email="'.$therapist_email.'"  data-role="'.$role1.'" style="border-radius: 5px;"><i class="fa fa-comments-o" aria-hidden="true"></i>Chat Now</button></div>';
$output .= '</div>';
		
		?> 

		<div class="mt-2" style="font-family: Roboto">
			<?php if (!is_mobile() && ($role1 == 'subscriber' || $role1 =="")){ ?>
				<a style="border-radius:5px" href="" id="consult_online_<?php echo get_the_id(); ?>" data-type="1" class="btn btn-primary btn-big consult_online_link"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>
		<?php 	   if($role1 == 'subscriber' || $role1 =="")

echo $output;
?> 
			<?php }	?>
		</div>
	</div>
	<div class="col-md-12" style="margin-bottom:-13px;">
	    <?php 
        if(is_mobile()){
            if(getLatestReview(get_the_id())){ ?>
			<p class="mt-2" style="font-family: Segoe UI; font-size:13px;"><span class="more_therapiest"><?php echo '&ldquo;'.end(getLatestReview(get_the_id())).'&rdquo;'; ?></span></p>
		<?php } } ?>
	</div>

	<div class="col-12 mt-1 text-center p-0 m-btn consult_btnGrp" style="font-family: Roboto">	
		<?php if(wp_is_mobile() && ($role1 == 'subscriber' || $role1 =="")){ ?>
			<a href="" id="call_now_<?php echo get_the_id(); ?>" class="btn btn-primary btn-big call_now_link"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>
			
<?php  if($role1 == 'subscriber' || $role1 =="")
echo $output;
?> 
		<?php }	?>
	</div>
	<?php $therapist_details = get_users(array('meta_key' => 'post_id','meta_value' => get_the_id()));
			$therapist_email = $therapist_details[0]->data->user_email;
			$current_user = wp_get_current_user();
		    $seeker_email = $current_user->user_email;
			?>
			<input type="hidden" id="therapist_<?php echo get_the_id(); ?>" value="<?php echo $therapist_email; ?>" />
			<input type="hidden" id="seeker_<?php echo get_the_id(); ?>" value="<?php echo $seeker_email; ?>" />
			
	<?php
		if(wp_is_mobile()){ ?>

			<a href="tel:01234567890" id="call_link_<?php echo get_the_id(); ?>" style="pointer-events: none;color:white;height:10px">01234 567 890</a>
				
		<?php } ?>
		
	</div>
	<div class="m-1 divider col-12"></div>
</div>