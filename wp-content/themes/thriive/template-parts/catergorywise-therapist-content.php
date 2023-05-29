<?php $current_user = wp_get_current_user();
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
}
$inhouse_therapist = array(71174,25285,30212,44834,46473,2458);
$inhouse = get_query_var("inhouse");
?>
<style> 
/* .busybtn:hover {
	border: 1px solid #000 !important;
	color:#000 !important;
} */
</style>
<?php  $earning_ratio = get_post_meta($post->ID,'earning_ratio',true);?>
<aside itemscope itemtype="http://schema.org/Physician" itemprop="Physician">
  <figure>
    <div class="imgwrp">
      <?php if(is_mobile()) {
          $healer_image = get_the_post_thumbnail_url( get_the_ID(), 'featured_post_mobile');
        } else {
          $healer_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail');
        } ?>
        <a href="<?php echo get_permalink(); ?>"><img  src="<?php echo $healer_image; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" itemprop="image"></a>
    </div>
	<?php //echo $earning_ratio = get_post_meta(get_the_id(),'earning_ratio',true); ?>
    
    <figcaption>
      <p class="r-name" itemprop="name"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
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
		  <p><?php  $languages = getTherapistLanguage($post->ID); ?></p>
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
	$consultrow = getTherapistConsultStatus($post->post_author);
	/* $chatrow =  getTherapistChatStatus($post->post_author); */
     //if($status == "Available"){ 
		if($consultrow){
			if($consultrow->availability_status == 2){
				$status = "On Call";
				
			} else if($consultrow->availability_status == 3){
				$status = "On Chat";
				
			} else if($consultrow->availability_status != 4){
				$status = "Available";
				echo '<p class="r-available">Available Now</p>';
			} else {
				$status = "Busy";
			}	
			
		} else {
			$status = "Available";
			echo '<p class="r-available">Available Now</p>';
		} 
		  
   // } 
	if($status == "Busy" || $status == "On Call" || $status == "On Chat") {
		if($status == "On Call"){
			echo '<p class="r-busy">On Call</p>';
		} elseif($status == "On Chat"){
			echo '<p class="r-busy">On Chat</p>';
		} else {
			echo '<p class="r-busy">Busy Now</p>';
		}	
       
    } ?>
    </figcaption>
  </figure> 
  <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates" style="display:none;">
    <span itemprop="latitude"><?php echo get_field('latitude'); ?></span>
    <span itemprop="longitude"><?php echo get_field('longitude'); ?></span>
  </div>
  <div class="clickgroup">
    <?php if(get_query_var('payment_type')) { ?>
      <input type="hidden" class="payment_type" value="<?php echo get_query_var('payment_type'); ?>">
    <?php } 
    if( have_rows('button_enabled','option') ):
      while ( have_rows('button_enabled','option') ) : the_row();
        $temparr = array();
        array_push($temparr,get_sub_field('custom_therapy'));
        foreach(get_sub_field('therapy') as $t){
          array_push($temparr, $t->slug);
        }
        if(in_array(get_query_var("therapy")[0], $temparr)){ ?> 
          <input type="hidden" id="therapist_<?php echo get_the_id(); ?>" value="<?php echo $therapist_email; ?>" />
          <input type="hidden" id="seeker_<?php echo get_the_id(); ?>" value="<?php echo $seeker_email; ?>" />
          <?php 
		  if(get_query_var('payment_type')){
				if (($role1 == 'subscriber' || $role1 =="") ){ 
					$sessiondata = $wpdb->get_row("SELECT COALESCE(sum(remaining_session), 0) as remaining_session FROM online_consultation WHERE uid = '". $current_user->ID ."' AND tid = '". $therapist_id ."' AND therapy_name = '".get_query_var("therapy")[0]."' AND remaining_session > 0 ");
				?>
					<a class=" <?php if($status != "Busy" && $status != "On Call" && $status != "On Chat"){ echo ' consult_online_link_oc btnCallnow'; } else { echo "busybtn";} ?>" id="consult_online_<?php echo get_the_id(); ?>" data-slug="<?php echo $post->post_name; ?>" data-waiting="<?php echo $sessiondata->waiting; ?>" data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>"  style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo 'border: 1px solid #27265f ;background-color:#fff;color:#eb0029;';} else { echo "color: #fff;";}?>"><i class="fa fa-phone <?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo "busybtn"; }?>" aria-hidden="true"  style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo "color: red;";} else { echo "color: #fff;";}?>"></i>Call Now</a>
			<?php  
			}
          } else {
            if (($role1 == 'subscriber' || $role1 =="")){ 
				//echo get_query_var("category_name")[0];echo "<br/>";
				
				$sessiondata = $wpdb->get_row("SELECT  remaining_session,waiting,category_name,action,therapy_name,tid  FROM online_consultation WHERE uid = '". $current_user->ID ."'   ORDER BY id DESC LIMIT 1");
				//echo 'sessiondata'.$sessiondata->category_name;echo "<br/>";
			?>
				
			
					<a <?php if((($sessiondata->category_name != get_query_var("category_name")[0]) && $sessiondata->remaining_session > 0) && get_query_var("therapy")[0] == 'tarot-card-reading' && $status != "Busy" && $status != "On Call" && $status != "On Chat"){ ?>data-toggle="modal" data-target="#call<?php echo get_the_id();?>" class="btnCallnow" <?php } else { ?> class=" <?php if($status != "Busy" && $status != "On Call" && $status != "On Chat"){ echo ' consult_online_link_oc btnCallnow'; } else { echo "busybtn";} ?>" <?php } ?> id="consult_online_<?php echo get_the_id(); ?>" data-slug="<?php echo $post->post_name; ?>" data-waiting="<?php echo $sessiondata->waiting; ?>" data-cat="<?php echo get_query_var("category_name")[0];?>"  data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" data-remaining="0" style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo 'border: 1px solid #27265f ;background-color:#fff;color:#eb0029;';} else { echo "color: #fff;";}?>"><i class="fa fa-phone <?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo "busybtn"; }?>" aria-hidden="true"  style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo "color: red;";} else { echo "color: #fff;";}?>"></i>Call Now </a>
<?php  
	$postrow = $wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_status = 'publish' AND post_author = '".$sessiondata->tid ."' AND post_type='therapist'");
	
	if($sessiondata->category_name == ''){
		$sessiondata->category_name = 'silver-readers';
	}	
					
?>
<div class="modal fade" id="call<?php echo get_the_id();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				You have a Balance session under <?php  if($sessiondata){ echo ucfirst(str_replace('-', ' ', $sessiondata->category_name)); } ?> category !!
			</div>
			<div class="modal-footer">
				
				<button type="button" class="contbtn"><a href="<?php echo site_url();?>/new-payment-apage?q=<?php echo $postrow->post_name;?>&a=call&t=<?php echo $sessiondata->therapy_name;?>&c=<?php echo $sessiondata->category_name;?>"><span class="clicktxt">Go To  <?php echo ucfirst(str_replace('-', ' ', $sessiondata->category_name));?></a></span></button>
				<a href="#" class="consult_online_link_oc btnCallnow" data-slug="<?php echo $post->post_name; ?>" data-waiting="<?php echo $sessiondata->waiting; ?>" data-cat="<?php echo get_query_var("category_name")[0];?>"  data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" id="consult_online_<?php echo get_the_id(); ?>" data-remaining="0" style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo 'border: 1px solid #27265f ;background-color:#fff;color:#eb0029;';} else { echo "color: #fff;";}?>"><button type="button" data-dismiss="modal" class="contbtn">Pay & Continue</button></a>
			</div>
		</div>
	</div>
</div>
			<?php
				//if($inhouse == 1){

        //if(is_page(61300) || is_page(59009)){
			?>	

			<input type="hidden" id="chat_event" value="<?php echo $event; ?>">
          <a <?php if((($sessiondata->category_name != get_query_var("category_name")[0]) && $sessiondata->remaining_session > 0) && get_query_var("therapy")[0] == 'tarot-card-reading' && $status != "Busy" && $status != "On Call" && $status != "On Chat"){ ?>data-toggle="modal" data-target="#chat<?php echo get_the_id();?>" class="btnChatnow" <?php } else { ?> class="btnChatnow <?php if($status != "Busy" && $status != "On Call" && $status != "On Chat") {  echo "start_chat_oc";}  else { echo "busybtn";}?>"<?php } ?> data-img="<?php echo $url; ?>" data-fromuserid="<?php echo $seeker_id; ?>" data-touserid="<?php echo $therapist_id; ?>" data-tousername="<?php echo $name; ?>" data-from_status="<?php echo $from_status; ?>"   data-to_status = "<?php echo $to_status; ?>" data-cat="<?php echo get_query_var("category_name")[0];?>" data-mobile="" data-msg="<?php echo $msg; ?>" data-slug="<?php echo $post->post_name; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" data-email="<?php echo $therapist_email; ?>"  data-role="<?php echo $role1; ?>" style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") {  echo 'border: 1px solid #27265f ;background-color:#fff;color:#eb0029;'; } ?>"><i class="fa fa-comments-o <?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo "busybtn"; }?>" aria-hidden="true" style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo "color: red;";} else { echo "color: #27265f;";}?>"></i>Chat Now </a>
			<div class="modal fade" id="chat<?php echo get_the_id();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					
					<div class="modal-body">
						You have a Balance session under <?php  if($sessiondata){ echo ucfirst(str_replace('-', ' ', $sessiondata->category_name)); } ?> category !!
					</div>
					<div class="modal-footer">
						
						<button type="button" class="contbtn"><a href="<?php echo site_url();?>/new-payment-apage?q=<?php echo $postrow->post_name;?>&a=chat&t=<?php echo $sessiondata->therapy_name;?>&c=<?php echo $sessiondata->category_name;?>"><span class="clicktxt">Go To  <?php echo ucfirst(str_replace('-', ' ', $sessiondata->category_name));?></a></span></button>
						<a href="#" class="consult_online_link_oc btnCallnow" data-slug="<?php echo $post->post_name; ?>" data-waiting="<?php echo $sessiondata->waiting; ?>" data-cat="<?php echo get_query_var("category_name")[0];?>"  data-from_status="<?php echo $from_status; ?>" data-therapy="<?php echo get_query_var("therapy")[0]; ?>" id="consult_online_<?php echo get_the_id(); ?>" data-remaining="0" style="<?php if($status == "Busy" || $status == "On Call" || $status == "On Chat") { echo 'border: 1px solid #27265f ;background-color:#fff;color:#eb0029;';} else { echo "color: #fff;";}?>"><button type="button" data-dismiss="modal" class="contbtn">Pay & Continue</button></a>
					</div>
				</div>
			</div>
		</div>


        <?php //}?>
																								 
					<input type="hidden" id="chat_event" value="<?php echo $event; ?>">
					
            <?php   
			
					$_SESSION['no_of_sessions'] = 1;     
				
				}
            										  
			}
        }
      endwhile; 
    endif; ?>
  </div>
  
</aside>
</div>

