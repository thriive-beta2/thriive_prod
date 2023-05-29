<?php /* Template Name: Body Html page */ ?>
<?php include_once get_stylesheet_directory().'/new-header.php'; ?>
 
<!--<div class="container">
<?php //while(have_posts()):the_post();
		//	echo the_content(); 
		//	endwhile; ?>
</div>-->
<div id="closesearch">
 <div class="row">
<section class="featuredimage featuredSearch" style="width:100%">
		<img alt="build a healthy relationship between your body and you." title="build a healthy relationship between your body and you." class="" src="<?php if (is_mobile()) {echo 'https://www.thriive.in/wp-content/uploads/2020/10/body-mobile.png';
		}else{echo 'https://www.thriive.in/wp-content/uploads/2020/10/Home-Page-Banner-Desktop-1280x400-2.jpg';}?>" src="" />
		<div class="searchformwrapper mb-3 mb-lg-5">
		<?php //echo get_search_form(); ?>
		</div>
</section>
</div>
<div class="row searchbodyform">
  <div class="searchformwrapper mb-1">
    <?php echo get_search_form();
    $html = "<div class='form-group all_ailments d-none'><div class='issue_box'><ul>";
    $ailments = get_ailment_by_therapy();
    foreach ($ailments as $k => $v) {
      $name = str_replace("'", "*", $v->name);
      $htmlname = "issues"."[]";
      $select = 'selectAilment("'.$v->slug.'")';
      $html .= "<div class='therapy_issues'><li class='label_issues' onclick='$select'>$v->name</li></div>";
    }
    $html .= "</ul></div></div>";
    echo $html; ?>
    <div class="no-results" style="display: none;">No Results</div>
  </div>	
</div>
</div>
<div class="container" id="closesearch1">
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
    </div>
  </div>
  <div class="row">
    <section id="bodyExperts" class="widgetblock">
     <h2 class="wdgt-head mt-2 mb-4 text-center"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Red.svg"/></i>  Connect With The Experts  <i><img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Red.svg"/></i></h2>
      <ul id="sectionlist1" class="row px-3">
        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/find-online-the-best-sex-therapist">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Sex_Therapy.svg'; ?>" alt="Sex Therapy" title="Sex Therapy">
              <figcaption>Sex Therapy</figcaption>
            </figure>
          </a>
        </li>
          <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/consult-nutritionist-online">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Nutrition.svg'; ?>" alt="Nutrition" title="Nutrition">
                <figcaption>Nutrition</figcaption>
              </figure>
            </a>
          </li>
        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/consult-hypnotherapy-expert">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Hypnotherapy.svg'; ?>" alt="Hypnotherapy" title="Hypnotherapy">
              <figcaption>Hypnotherapy</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/consult-past-life-regression-expert">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Past_Life.svg'; ?>" alt="Past Life Regression" title="Past Life Regression">
              <figcaption>Past Life Regression</figcaption>
            </figure>
          </a>
        </li>

        <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/consult-yoga-experts">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Yoga.svg'; ?>" alt="Yoga" title="Yoga">
                <figcaption>Yoga</figcaption>
              </figure>
            </a>
          </li>
		   <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/consult-ayurveda-experts-online">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Ayurveda.svg'; ?>" alt="Ayurveda" title="Ayurveda">
              <figcaption>Ayurveda</figcaption>
            </figure>
          </a>
        </li>
          <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/consult-theta-healing-expert">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Theta_Healing.svg'; ?>" alt="Theta Healing" title="Theta Healing">
                <figcaption>Theta Healing</figcaption>
              </figure>
            </a>
          </li>
          <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/consult-inner-child-healing-expert">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icon_Innerchild.svg'; ?>" alt="Innerchild Healing" title="Innerchild Healing">
                <figcaption>Innerchild Healing</figcaption>
              </figure>
            </a>
          </li>
		  <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/consult-pranic-healers-online">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Pranic-Healing.svg'; ?>" alt="Pranic Healing" title="Pranic Healing">
                <figcaption>Pranic Healing</figcaption>
              </figure>
            </a>
          </li>
		  <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/consult-reiki-practitioner-online">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Reiki.svg'; ?>" alt="Reiki" title="Reiki">
                <figcaption>Reiki</figcaption>
              </figure>
            </a>
          </li>
		   <li class="sectionitem col-6 col-sm-3">
            <a href="">
              <figure>
                
                <figcaption></figcaption>
              </figure>
            </a>
          </li>
		  <li class="sectionitem col-6 col-sm-3">
            <a href="">
              <figure>
                
                <figcaption></figcaption>
              </figure>
            </a>
          </li>
			
      </ul>
    </section>
  </div>
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
    </div>
  </div>      

  <?php if( have_rows('free_yoga_videos') ): ?>
    <div class="row">
    <section id="meditation_accordion_block" class="widgetblock">
	
      <h2 class="wdgt-head mt-2 mb-1 text-center"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Dark_Green.svg"/></i>  Free Yoga Videos  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Dark_Green.svg"/></i>  </h2>
      <section id="meditationVideos"  class="ewHorizontalAccordian" >
        <ul>
            <?php // loop through the rows of data
            $i = 0;
            while ( have_rows('free_yoga_videos') ) : the_row(); ?>
                <li <?php if($i == 0){echo 'class="open"'; } ?>>
                <a href="<?php echo get_sub_field('video_link'); ?>">
                    <div class="bgholder">
                      <div alt="<?php echo get_sub_field('video_title'); ?>" title="<?php echo get_sub_field('video_title'); ?>" style="background-image:url(<?php echo get_sub_field('video_image_mobile'); ?>)" class="bgimage d-block d-lg-none" ></div>
                      <div alt="<?php echo get_sub_field('video_title'); ?>" title="<?php echo get_sub_field('video_title'); ?>" style="background-image:url(<?php echo get_sub_field('video_image_desktop'); ?>)" class="bgimage d-none d-lg-block"></div>
                      <div class="iconplay"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-meditation-play.svg'; ?>" alt=""></div>
                    </div>
                    <div class="captionText">
                      <p class="title"><?php echo get_sub_field('video_title'); ?></p>
                      <p><?php echo get_sub_field('video_description'); ?></p>
                    </div>
                </a>
                </li>
            <?php $i++; 
            endwhile; ?>
        </ul>
      </section>
  </div>
<?php endif; ?>


  
   <div class="row">
    <div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>

  <?php if(have_rows('meet_our_experts')): ?>
    <div class="row">
      <section class="widgetblock">
        <h2 class="wdgt-head mt-2 mb-1 text-center">Meet Our Experts</h2>
        <section class="meetexperts">
          <?php while ( have_rows('meet_our_experts') ) : the_row(); ?>
          <a href="#"><img src="<?php echo get_sub_field('expert_image'); ?>" alt="" class="wrap"></a>
        <?php endwhile; ?>
        </section>
        <!--<div class="btn-expretwrap">
          <a href="#" class="btnexpertsmore">Get Started for just Rs 99/-</a>
        </div>-->
      </section>
    </div>
    <div class="row">
      <div class="seprator mb-3">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
      </div>
    </div>
  <?php endif; ?>
  <div class="row">
    <section id="testimonials" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-1 text-center"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Testimonials  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h2>
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
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
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
  
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
    </div>
  </div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>