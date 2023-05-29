<?php $current_user = wp_get_current_user();
$seeker_id = $current_user->ID;
$seeker_email = $current_user->user_email;
$seeker_name = $current_user->display_name;
$post = get_query_var('post'); 

/* echo 'post_author'.$post->post_author; */
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
$sessiondata = $wpdb->get_row("SELECT  * FROM appointment_session_details WHERE uid = '". $current_user->ID ."'  AND therapy_name = '".get_query_var("therapy")[0]."' AND payment_status='success' AND sessions_pending > 0");
$therapyarr = explode("-",get_query_var("therapy")[0]);

$healer_image = get_the_post_thumbnail_url(get_the_ID());
$count_char = strlen(wp_strip_all_tags (get_post_field('post_content', $post->ID)));
$stringCut = substr(get_post_field('post_content', $post->ID), 0, 150);
$post = get_query_var('post'); 

$exp_year = explode('/', get_field('therapy_2_experience'))[2];
$curr_year = date('Y');
$totalExp = $curr_year - $exp_year;

if($exp_year == ''){
  $totalExp  = 1;
}


?>
<br>

<div class="sex-therapy-therapist-card-container">
    <div class="sex-therapy-therapist-card">
        <div class="sex-therapy-therapist-card-row sex-therapy-therapist-card-row1">
            <p class="sex-therapy-therapist-card-tname"><?php echo get_the_title(); ?></p>
            <p class="sex-therapy-therapist-card-therapy"><?php echo ucwords($therapyarr[0]);?> Therapist</p>
        </div>
        <div class="sex-therapy-therapist-card-row sex-therapy-therapist-card-row2">
            <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $healer_image; ?>"  alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" itemprop="image"></a>
            <div class="sex-therapy-therapist-card-about-therapist">
                <p class="sex-therapy-therapist-card-about-therapist-head">
                    About Me
                </p>
                <p class="sex-therapy-therapist-card-about-therapist-cont">
                    <?php echo  $stringCut;if($count_char > 50){   echo '...';} ?>
                </p>
                <p class="sex-therapy-therapist-card-about-therapist-exp">
                  <?php echo $totalExp;?> Years of Experience
                </p>                
                <p class="sex-therapy-therapist-card-about-therapist-session-duration" style="margin-bottom:10px;">
                    Session Duration : 30 Mins
                </p> 
                <?php  
                        if(!empty(get_field('avg_rating'))) { 
                          $args = array(
                            'rating'=>get_field('avg_rating'),
                            'type'=>'rating',
                            'number'=>0,
                            'echo'=>true
                          );
                          star_rating($args); 
                        } 
                ?>               
            </div>
        </div>
        <div class="sex-therapy-therapist-card-row sex-therapy-therapist-card-row3">
            <button class="btnChatnow book_now_sex_link_oc " id="book_now_<?php echo get_the_id(); ?>" data-slug="<?php echo $post->post_name; ?>" data-current_user="<?php echo base64_encode($current_user->ID);?>" data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" data-sessions="<?php echo $sessiondata->sessions_pending; ?>">Book Appointment</button>
        </div>
    </div>
</div>



<br>




<!--
<aside itemscope itemtype="http://schema.org/Physician" itemprop="Physician">
  <figure>
    <div class="imgwrp">
      <?php /* if(is_mobile()) {
          $healer_image = get_the_post_thumbnail_url( get_the_ID(), 'featured_post_mobile');
        } else { */
          $healer_image = get_the_post_thumbnail_url(get_the_ID());
       // } ?>
        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $healer_image; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" itemprop="image"></a>
    </div>
	
    <figcaption>
      <p class="r-name" itemprop="name"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
      <?php
	 // echo get_post_field('post_content', $post->ID); 
	$count_char = strlen(wp_strip_all_tags (get_post_field('post_content', $post->ID)));
	$stringCut = substr(get_post_field('post_content', $post->ID), 0, 150);
	
	?>
	<div class="abt-more">  <div class="excerpt-content-rm showmore-txt-wrapper"><?php echo  $stringCut;if($count_char > 50){   echo '...';} ?></div></div>
	<p class="therapistdesc"> </p>
	<?php 
	if(have_rows('therapy')) {
        $experience_order = array();
        $tdtchg = array();
        foreach (get_query_var("therapy") as $therapy) {
          if($therapy == 'all-appointment-page'  || $therapy == 'all-prediction-page'){
            $tdtchg = getTherapyDtChg($post->ID,'');
          } else if(count(get_query_var("therapy")) == 1){
            $term = get_term_by('slug', $therapy, 'therapy');
            $tdtchg = getTherapyDtChg($post->ID,$term->name);
          } else {
            $tdtchg = getTherapyDtChg($post->ID,'');
          }
        } ?>
		
        <p class="r-type">
            <?php if(get_query_var("therapy")[0] == 'all-appointment-page' ){ ?>
                <span class="more_therapiest_listpg" itemprop="medicalSpecialty">
              <?php } else if(count(get_query_var("therapy")) == 1){ ?>
                <span itemprop="medicalSpecialty">
              <?php } else { ?>
                <span class="more_therapiest_listpg" itemprop="medicalSpecialty">
              <?php } 
                $total_count = count($tdtchg);
                $count = 1;
                $charges = '';
                foreach($tdtchg as $t){
                  if(get_query_var("therapy")[0] == 'all-page' || get_query_var("therapy")[0] == 'all-prediction-page' || get_query_var("therapy")[0] == 'all-free-session'){
                    echo $t['tname'] . ($total_count == $count ? '.' : ', ');
                  } else if(count(get_query_var("therapy")) == 1){
                    echo $t['tname'];
                  } else {
                    echo $t['tname'] . ($total_count == $count ? '.' : ', ');
                  }
                  $experience_order [$count] = $t['experience'];
                  $charges += $t['charges']; 
                  $count++;
                } ?>
            </span>
          </p>
		 
        <p class="r-exp">
          <?php $current_year = date("Y");
          $current_month = date("m");
          foreach ($experience_order as $key => $value){
            $ord[] = strtotime($value);
          }
          array_multisort($ord, SORT_ASC, $experience_order);
          if(is_array($experience_order) || is_object($experience_order)){
            $therapy_Exp = getTherapistExperience($experience_order['0']);
            echo "$therapy_Exp of Experience";
          } ?>
        </p>
		
			
	 
	  
	<?php   
    } 
	?>
	 <!-- this line was already commented <p class="costxt"> <b><?php echo ' &#8377; '.$appointment_cost = get_field('appointment_cost',$post->ID).' Per Session';?></b></p>-->
	 <!--
   <?php
	  get_the_content();
			                 ?>
                                   
                             
		<p class="timetxt"> <i class="fa fa-clock-o" ></i><?php echo 'Session Duration : 35-40 mins';?></p>
	<?php
      if(!empty(get_field('avg_rating'))) { 
        $args = array(
          'rating'=>get_field('avg_rating'),
          'type'=>'rating',
          'number'=>0,
          'echo'=>true
        );
        star_rating($args); 
      } 
      $status = getTherapistStatus($post->ID);
      if($status == "Available"){
        //echo '<p class="r-available">Available Now</p>';
      } if($status == "Busy") {
       // echo '<p class="r-busy">Busy Now</p><p class="r-busy-text">Click call/chat to schedule a session</p>';
      } ?>
    </figcaption>
  </figure>
  <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates" style="display:none;">
    <span itemprop="latitude"><?php echo get_field('latitude'); ?></span>
    <span itemprop="longitude"><?php echo get_field('longitude'); ?></span>
  </div>
  <div class="clickgroup">
  		<a class="btnChatnow book_now_sex_link_oc " id="book_now_<?php echo get_the_id(); ?>" data-slug="<?php echo $post->post_name; ?>" data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" data-sessions="<?php echo $sessiondata->sessions_pending; ?>" ><i class="fa fa-calendar" aria-hidden="true"></i>Book Appointment</a>
  
  </div>
</aside>
-->