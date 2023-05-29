<?php $current_user = get_userdata(get_query_var("uid"));
$seeker_id = $current_user->ID;
$seeker_email = $current_user->user_email;
$seeker_name = $current_user->display_name; 
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
}?>
<aside itemscope itemtype="http://schema.org/Physician" itemprop="Physician">
  <figure>
    <div class="imgwrp">
      <?php if(is_mobile()) {
          $healer_image = get_the_post_thumbnail_url( get_the_ID(), 'featured_post_mobile');
        } else {
          $healer_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail');
        } ?>
        <img src="<?php echo $healer_image; ?>" alt="" itemprop="image">
    </div>
    <figcaption>
      <p class="r-name" itemprop="name"><?php echo get_the_title(); ?></p>
      <?php if(have_rows('therapy')) {
        $experience_order = array();
        $tdtchg = array();
        foreach (get_query_var("therapy") as $therapy) {
          if($therapy == 'all-page'  || $therapy == 'all-prediction-page'){
            $tdtchg = getTherapyDtChg($post->ID,'');
          } else if(count(get_query_var("therapy")) == 1){
            $term = get_term_by('slug', $therapy, 'therapy');
            $tdtchg = getTherapyDtChg($post->ID,$term->name);
          } else {
            $tdtchg = getTherapyDtChg($post->ID,'');
          }
        } ?>
        <p class="r-type">
            <?php if(get_query_var("therapy")[0] == 'all-page'  || get_query_var("therapy")[0] == 'all-prediction-page'){ ?>
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
                  if(get_query_var("therapy")[0] == 'all-page' || get_query_var("therapy")[0] == 'all-prediction-page'){
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
            echo "$therapy_Exp of experience";
          } ?>
        </p>
      <?php } 
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
        echo '<p class="r-available">Available Now</p>';
      } if($status == "Busy") {
        echo '<p class="r-busy">Busy Now</p><p class="r-busy-text">Click call/chat to schedule a session</p>';
      } ?>
    </figcaption>
  </figure>
  <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates" style="display:none;">
    <span itemprop="latitude"><?php echo get_field('latitude'); ?></span>
    <span itemprop="longitude"><?php echo get_field('longitude'); ?></span>
  </div>
  <div class="clickgroup">
    <?php if( have_rows('button_enabled','option') ):
      while ( have_rows('button_enabled','option') ) : the_row();
        $temparr = array();
        array_push($temparr,get_sub_field('custom_therapy'));
        foreach(get_sub_field('therapy') as $t){
          array_push($temparr, $t->slug);
        }
        if(in_array(get_query_var("therapy")[0], $temparr)){ ?> 
          <input type="hidden" id="therapist_<?php echo get_the_id(); ?>" value="<?php echo $therapist_email; ?>" />
          <input type="hidden" id="seeker_<?php echo get_the_id(); ?>" value="<?php echo $seeker_email; ?>" />
          <?php /* if (($role1 == 'subscriber' || $role1 =="") && get_sub_field('call_button') == 1){ ?>
            <a class="btnCallnow consult_online_link_oc" id="consult_online_<?php echo get_the_id(); ?>" data-slug="<?php echo $post->post_name; ?>" data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>"><i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>Call Now</a>
          <?php } */
          if (($role1 == 'subscriber' || $role1 =="") && isset($_GET) && $_GET['a'] == "chat"){ ?>
            <input type="hidden" id="chat_event" value="<?php echo $event; ?>">

            <?php /*old_button

                    <a class="btnChatnow start_chat" data-img="<?php echo $url; ?>" data-fromuserid="<?php echo $seeker_id; ?>" data-touserid="<?php echo $therapist_id; ?>" data-tousername="<?php echo $name; ?>" data-from_status="<?php echo $from_status; ?>" data-to_status = "<?php echo $to_status; ?>" data-mobile="" data-msg="<?php echo $msg; ?>" data-slug="<?php echo $post->post_name; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" data-email="<?php echo $therapist_email; ?>"  data-role="<?php echo $role1; ?>"><i class="fa fa-comments-o" aria-hidden="true"></i>Chat Now</a>

            */?>
                  
                  <a class="btnChatnow" data-img="<?php echo $url; ?>" data-fromuserid="<?php echo $seeker_id; ?>" data-touserid="<?php echo $therapist_id; ?>" data-tousername="<?php echo $name; ?>" data-from_status="<?php echo $from_status; ?>" data-to_status = "<?php echo $to_status; ?>" data-mobile="" data-msg="<?php echo $msg; ?>" data-slug="<?php echo $post->post_name; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" data-email="<?php echo $therapist_email; ?>"  data-role="<?php echo $role1; ?>" onclick="create_dialog(this.dataset.touserid, this.dataset.fromuserid, this.dataset.email, this.dataset.msg),clear_chatbox(0);"><i class="fa fa-comments-o" aria-hidden="true"></i>Chat Now</a>


          <?php }
          /* if (($role1 == 'subscriber' || $role1 =="") && get_sub_field('book_now_button') == 1){ ?>
            <a class="btnChatnow book_now_link_oc" id="book_now_<?php echo get_the_id(); ?>" data-slug="<?php echo $post->post_name; ?>" data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" ><i class="fa fa-calendar" aria-hidden="true"></i>Appointment</a>
          <?php } */
        }
      endwhile; 
    endif; ?>
  </div>
</aside>