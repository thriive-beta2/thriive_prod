<?php /* Template Name: Soul Html page */ ?>
<?php include_once get_stylesheet_directory().'/new-header.php'; ?>


<?php 
  global $wpdb;
  $file = get_site_url()."/wp-content/themes/thriive/horoscope_new/json_files/".date('Y-m-d')."-daily_predictions.json";
  if(fopen($file, 'r')){
	  $json_contents = file_get_contents(get_site_url()."/wp-content/themes/thriive/horoscope_new/json_files/".date('Y-m-d')."-daily_predictions.json");
	  $json_horo = json_decode($json_contents,TRUE);
	  //print_r($json_horo);
  }else{
		$date_today = date('Y-m-d');
	$read = "SELECT data FROM zodiac_data ORDER BY SID DESC";
	$read_query = $wpdb->get_results($read, ARRAY_A);
	$json_contents = str_replace('#', "'", $read_query[0]['data']);
	$json_horo = json_decode($json_contents, TRUE);
  }

	if(!is_user_logged_in()){$zodiac = 0;}else{
		$zodiac = 1;
		$user_id = get_current_user_id();
		$metadata = get_user_meta($user_id,$key = '',$single = true );
		$user_dob = strtotime($metadata['dob'][0]);
	}
?>

<div class="container">
<?php while(have_posts()):the_post();
			echo the_content(); 
			endwhile; ?>
</div>


<div class="content">
      <div class="simple-marquee-container">
        <div class="marquee">
          <ul class="marquee-content-items">

            <?php
            if($zodiac != 1){
             for($i=0;$i<=11;$i++){
            echo '<li><span class="zod">'.$json_horo[$i]['birth_moon_sign'].' -  </span><span class="luck">'.$json_horo[$i]['prediction']['luck'].'</span></li>';}}else{            
            if(date('m/d', $user_dob)<=date('m/d', strtotime("02/18")) AND date('m/d', $user_dob)>=date('m/d', strtotime("01/21"))){$user_zodiac = 9;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("03/19")) AND date('m/d', $user_dob)>=date('m/d', strtotime("02/19"))){$user_zodiac = 3;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("04/19")) AND date('m/d', $user_dob)>=date('m/d', strtotime("03/20"))){$user_zodiac =10;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("05/20")) AND date('m/d', $user_dob)>=date('m/d', strtotime("04/20"))){$user_zodiac = 4;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("06/20")) AND date('m/d', $user_dob)>=date('m/d', strtotime("05/21"))){$user_zodiac =12;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("07/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("06/21"))){$user_zodiac = 5;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("08/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("07/23"))){$user_zodiac = 6;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("09/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("08/23"))){$user_zodiac = 0;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("10/22")) AND date('m/d', $user_dob)>=date('m/d', strtotime("09/23"))){$user_zodiac = 7;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("11/21")) AND date('m/d', $user_dob)>=date('m/d', strtotime("10/23"))){$user_zodiac = 1;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("12/21")) AND date('m/d', $user_dob)>=date('m/d', strtotime("11/22"))){$user_zodiac = 8;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("12/31")) AND date('m/d', $user_dob)>=date('m/d', strtotime("12/22"))){$user_zodiac = 2;}
			else if(date('m/d', $user_dob)<=date('m/d', strtotime("01/21")) AND date('m/d', $user_dob)>=date('m/d', strtotime("01/01"))){$user_zodiac = 2;}

			for($i=0;$i<13;$i++){
				echo '<li><span class="zod">'.$json_horo[$user_zodiac]['birth_moon_sign'].' -  </span><span class="luck">'.$json_horo[$user_zodiac]['prediction']['luck'].'</span></li>';
			}}?>
          </ul>
        </div>
      </div>
    </div>

<div class="container">
  <div class="row">
    <section id="luckyday" class="pb-4">
      
      <div class="seprator mb-3">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
      </div>
      <p class="slogan text-center">Consult Online Now For <span class="font-strike">&#8377; 499</span> &#8377; 199</p>
      <ul id="sectionlist" class="row readingCats">
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icons-01.png';?>" alt="">
              <figcaption>Tarot Card</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-astrologer-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icons-02.png';?>" alt="">
              <figcaption>Astrology</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-numerologist-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/numerology-soul.png';?>" alt="">
              <figcaption>Numerology</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-angel-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icons-04.png';?>" alt="">
              <figcaption>Angel Card Reading</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/vastu">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icons-05.png';?>" alt="">
              <figcaption>Vastu</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="#">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icons-06.png';?>" alt="">
              <figcaption>Premium Readers</figcaption>
            </figure>
          </a>
        </li>
      </ul>
      <a href="https://www.thriive.in/talk-to-astrologer-online" class="btnConsult"> Consult Now</a>
    </section>
  </div>
  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
  <div class="row">
    <section id="freeReading" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-2 text-center">Free Online Reading</h2>
      <section class="readinglist">
        <aside class="readingitem tarot">
          <a href="https://www.thriive.in/free-online-tarot-card-reading">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot.png';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot-lg.png'?> 1080w" src="" />
              <figcaption>Pick a Tarot Card & Get Instant Reading</figcaption><i><img class="nextfree hidden-md" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/icon-next.svg"></i>
            </figure>
          </a>
        </aside>
        <aside class="readingitem numerology">
          <a href="https://www.thriive.in/numerology-predictions">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-numberology.png';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-numberology-lg.png';?> 1080w" src="" />
              <figcaption>Instant Numerology Chart</figcaption><i><img class="nextfree hidden-md" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/icon-next.svg"></i>
            </figure>
          </a>
        </aside>
        <aside class="readingitem angel">
          <a href="https://www.thriive.in/zodiac-signs-compatibility">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Love-Compatibility-Card-01.png'; ?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Love-Compatibility-Card-01.png'; ?> 1080w" src="" />
              <figcaption>Love Compatibility for Zodiac Signs</figcaption><i><img class="nextfree hidden-md" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/icon-next.svg"></i>
            </figure>
          </a>
        </aside>
      </section>
    </section>
  </div>
  
   <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
  <div class="row">
    <section id="breathing_accordion_block" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-1 text-center">How Therapy Works On Thriive</h2>
      <section id="HowWorks">
        <figure class="selectExpert">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/select-expert.svg'; ?>" alt="">
          <figcaption>
            Select Expert
          </figcaption>
        </figure>
        <figure class="signup">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/signup.svg'; ?>" alt="">
          <figcaption>
            Sign Up
          </figcaption>
        </figure>
        <figure class="payment">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/payment.svg'; ?>" alt="">
          <figcaption>
            Payment
          </figcaption>
        </figure>
        <figure class="chat">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/chat.svg'; ?>" alt="">
          <figcaption>
            Call / Chat
          </figcaption>
        </figure>            
      </section>
    </section>
  </div>
  
  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
  <div class="row">
    <section id="topReaders" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-4 text-center">Our Top Readers</h2>
      <?php if(have_rows('therapist_data', 'option')):
                while(have_rows('therapist_data', 'option')): the_row();
                    if('tarot-card-reading' == get_sub_field('taxonomy')->slug){
                      $ids = get_sub_field('display_ids');  
                    }
                endwhile;
            endif;

			$posts_per_page = 4;
			$start = 0;
			$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
			$start = ($paged-1)*$posts_per_page;
			$getPost = $wpdb->get_results( 
				"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($ids)"
			);

			// Loop Start
			if($getPost) : ?>
				<section class="topreadingList">
                    <?php $tempArr = $available = $busy = array();
                    foreach ( $getPost as $posts ) {
                        $post = get_post($posts->ID);
                        $status = getTherapistStatus($post->ID);
                        if($status == "Available"){
                            array_push($available,$posts->ID);
                        } 
                                                 
                    }
                    $tempArr = array_merge($available,$busy);
                    foreach($tempArr as $t){
                        $post = get_post($t);
                        // if(!empty($posts->distance)){
                        //     $post->distance = round($posts->distance,1).' km';
                        // }
                        // if(!empty($posts->response_count)){
                        //     $post->response_count = $posts->response_count;
                        // }
                        setup_postdata( $post );
                        set_query_var('therapy',array('tarot-card-reading'));
                        get_template_part( 'template-parts/therapist-content');
                    }
                    wp_reset_postdata(); ?>		
				</section>
			<?php endif; ?>
      <p class="text-center ">
        <a href="https://www.thriive.in/talk-to-astrologer-online" class="readmore">View more <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-readMore.png'; ?>" alt=""></a>
      </p>
    </section>
  </div>
  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
  <div class="row">
    <section id="topReaders" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-2 text-center">Answers For Your Life Problems </h2>
      <ul id="sectionlist" class="row px-3 lifeproblems">
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon-2_Career.png'; ?>" alt="">
              <figcaption>Career</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon-2_Love.png'; ?>" alt="">
              <figcaption>Love</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon-2_Health.png';  ?>" alt="">
              <figcaption>Health</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon-2_Relationship.png'; ?>" alt="">
              <figcaption>Relationship</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon-2_Marriage.png'; ?>" alt="">
              <figcaption>Marriage</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon-2_Education.png'; ?>" alt="">
              <figcaption>Education</figcaption>
            </figure>
          </a>
        </li>
      </ul>
    </section>
  </div>
  <div class="row">
    <div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
    <div class="row">
    <section id="testimonials" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-1 text-center">Testimonials</h2>
      <img class="iconTestimony" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-testimony.svg'; ?>" alt="" />
      <section class="testimonialSlider">
        <div class="owl-carousel owl-theme">
          <?php while ( have_rows('testimonial') ) : the_row();?>
		        <div class="item">
              <div class="testimonyBx">
                <p><?php the_sub_field('description')?></p>
                <p><?php the_sub_field('name')?></p>
              </div>
            </div>
          <?php endwhile; ?>
        </div>	
      </section>
    </section>
  </div>
  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
        <div class="row">
        <section id="faqblock" class="widgetblock">
            <h2 class="wdgt-head mt-2 mb-1 text-center">FAQs</h2>
            <section id="accordion" class="faqAccordian" itemscope itemtype="https://schema.org/FAQPage">
    	        <?php $i = 0; 
                while(have_rows('faq')) : the_row();?>
                    <div class="card" itemprop="mainEntity" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="card-header <?php echo $i==0 ?'open':''; ?>" id="heading<?php echo $i; ?>" >
                            <h5 class="mb-0" itemprop="name">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                <?php the_sub_field('faq_title') ?>
                                </button>
                                <span class="icon"></span>	
                            </h5>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $i==0 ?'show':''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div class="card-body" itemprop="text"><?php the_sub_field('faq_description')?></div>
                        </div>
                    </div>
                    <?php $i++;
                endwhile;?> 
            </section>
        </section>
    </div>
  <div class="row">
    <div class="seprator">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
<div class="row">
    <section id="mediablock" class="widgetblock mb-3">
      <h2 class="wdgt-head mt-1 mb-3 text-center">Media On Us</h2>
      <section class="mediawrapper">
        <aside class="mediaitem text-center" style="max-height: 60px;border-radius: 0px;">
		<a href="https://yourstory.com/herstory/2019/07/digital-platform-thriive-mental-wellness" target="_blank" rel="nofollow" tabindex="0">
                   <img title="" alt="" class="img-responsive" src="https://www.thriive.in/wp-content/uploads/2019/11/media-05.jpg" style="max-width: 100%;">
		</a>
		</aside>
        <aside class="mediaitem text-center" style="max-height: 60px;border-radius: 0px;">
			<a href="https://m.dailyhunt.in/news/india/english/yourstory-epaper-yourstory/this+digital+platform+believes+the+pursuit+of+wellness+is+important+to+thriive+in+the+modern+world-newsid-125052726" target="_blank" rel="nofollow" tabindex="0">
                   <img title="" alt="" class="img-responsive" src="https://www.thriive.in/wp-content/uploads/2019/11/media-02.jpg" style="max-width: 100%;">
			</a>
		</aside>
        <aside class="mediaitem text-center" style="max-height: 60px;border-radius: 0px;">
			<a href="https://indianexpress.com/article/parenting/health-fitness/meditation-benefits-children-energy-5835255/" target="_blank" rel="nofollow" tabindex="0">
                   <img title="" alt="" class="img-responsive" src="https://www.thriive.in/wp-content/uploads/2019/11/media-04.jpg" style="max-width: 100%;">
			</a>
		</aside>
      </section>
    </section>
</div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>