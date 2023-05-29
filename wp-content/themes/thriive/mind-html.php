<?php /* Template Name: Mind Html page */ 
include_once get_stylesheet_directory().'/new-header.php'; ?>
<div class="container">
<?php while(have_posts()):the_post();
			echo the_content(); 
			endwhile; ?>
</div>
<div class="row">
	<div class="seprator my-2">
		<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
	</div>
</div>
<div class="container">
  <!-- talk to counselor now -->
  <div class="row">
    <section id="counselor_accordion_block" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-1 text-center">Talk To A Counselor Now!</h2>
      <section id="counselor_accordion" class="ew_accordion">
        <ul>
          <li class="open">
            <div class="bgholder relationship active">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/talk-2-counselor-bg.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/talk-2-counselor-bg-lg1.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Relationship<br>Counselling</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Save your relationship by building stronger bond and more fulﬁlling connections with your partner.</p>
                  <p>Consult a Couple's Therapist today</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-counselor-online" class="counsellink"></a>
        </li>
		
		<li class="">
            <div class="bgholder stress-couching">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Stress-Coach-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Stress-Coach-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Stress<br>Coach</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Learn how to relieve stress, manage anxiety, and reduce tension. We don't have to just live with stress till it becomes chronic, seek help and feel the bliss of being stress-free.</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-life-coach-online" class="counsellink"></a>
        </li>
		
		<li class="">
            <div class="bgholder stress-couching">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Covid-IMage-2-bg.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Covid-IMage-lg.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Covid<br>Counseling</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Feeling worried all the time about catching the Covid-19 virus? With Covid counseling, you can work towards being in a peaceful state, even during the pandemic!</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/consult-covid-counselor-online" class="counsellink"></a>
        </li>
		
		<li class="">
            <div class="bgholder family-therapy">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Meditation-Coaching-301x401.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Meditation-Coaching-278x201.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Meditation<br>Coaching</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Feel like you just can't meditate? Meditation needs practice just like yoga, consult our expert coaches and improve your physical and mental well-being with meditation. Learn to focus, calm your busy mind, and learn how to meditate correctly.</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-meditation-online" class="counsellink"></a>
        </li>
		
        <li class="">
            <div class="bgholder family-therapy">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Family-Therapy-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Family-Therapy-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Family<br>Therapy</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>If dysfunctional is how you describe your family, then Family Counseling is what you need! Get to the root of family issues and resolve them to build a happy, peaceful family.</p>
                  <!--<p>Consult a Couple's Therapist today</p>-->
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-counselor-online" class="counsellink"></a>
        </li>
        
        
        <li class="">
            <div class="bgholder stress-couching">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Confidence-&-Self-Esteem-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Confidence-&-Self-Esteem-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Confidence <br>& Self Esteem</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Lack of confidence can hamper every area of your life. But it doesn't have to be that way. You have the power to change, and our expert counselours will show you how! Understand your true worth, and start seeing yourself in a positive light!</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-life-coach-online" class="counsellink"></a>
        </li>
		
		<li class="">
            <div class="bgholder family-therapy">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Sleep-Coaching-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Sleep-Coaching-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Sleep<br>Coaching</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Can't sleep well through the night? Seek help before you become a zombie!</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-counselor-online" class="counsellink"></a>
        </li>
		
        <li class="">
            <div class="bgholder family-therapy">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Work-Place-Stress-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Work-Place-Stress-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Work Place<br>Stress</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Work stress, when not corrected, can take a toll on your overall well-being. Find out how to strike a healthy work-life balance with counselling. </p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-life-coach-online" class="counsellink"></a>
        </li>
		
        </ul>
      </section>
        
    </section>
  </div>
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
  <!-- horizontal accordian -->
  <?php if( have_rows('free_meditation_video') ): ?>
    <div class="row">
      <section id="meditation_accordion_block" class="widgetblock">
	  
        <h2 class="wdgt-head mt-2 mb-1 text-center">Free Meditation Videos</h2>
        <section id="meditationVideos"  class="ewHorizontalAccordian" >
          <ul>
            <?php $i = 0;
            while ( have_rows('free_meditation_video') ) : the_row(); ?>
                <li <?php if($i == 0){echo 'class="open"'; } ?>>
                <a href="<?php echo get_sub_field('video_link'); ?>">
                    <div class="bgholder">
                      <div style="background-image:url(<?php echo get_sub_field('image_mobile'); ?>)" class="bgimage d-block d-lg-none" ></div>
                      <div style="background-image:url(<?php echo get_sub_field('image_desktop'); ?>)" class="bgimage d-none d-lg-block"></div>
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
    <div class="row">
      <div class="seprator my-2">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
      </div>
    </div>
  <?php endif; ?>
  <!-- horizontal accordian -->
  <?php if( have_rows('free_guided_breathwork') ): ?>
    <div class="row">
      <section id="breathing_accordion_block" class="widgetblock">
        <h2 class="wdgt-head mt-2 mb-1 text-center">Free Guided Breathwork</h2>
        <section id="breathingVideos" class="ewHorizontalAccordian" >
          <ul>
            <?php $i = 0;
            while ( have_rows('free_guided_breathwork') ) : the_row(); ?>
                <li <?php if($i == 0){echo 'class="open"'; } ?>>
                  <a href="<?php echo get_sub_field('video_link'); ?>">
                    <div class="bgholder">
                      <div style="background-image:url(<?php echo get_sub_field('video_image_mobile'); ?>)" class="bgimage d-block d-lg-none" ></div>
                      <div style="background-image:url(<?php echo get_sub_field('video_image_desktop'); ?>)" class="bgimage d-none d-lg-block"></div>
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
    <div class="row">
      <div class="seprator my-2">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
      </div>
    </div>
  <?php endif; ?>
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
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg '; ?>" alt="">
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
    <section id="largetService" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-4 text-center">India's leading Online<br>Counselling Service</h2>
      <ul id="sectionlist" class="row px-3">
        <li class="sectionitem col-sm-4">
          <a href="#">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/happyuser.svg'; ?>" alt="">
              <figcaption>100000+ Happy Users</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="#">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/private.svg'; ?>" alt="">
              <figcaption>100% Private & Conﬁdential</figcaption>
            </figure>
          </a>
        </li>
        <li class="sectionitem col-sm-4">
          <a href="#">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/verified.svg'; ?>" alt="">
              <figcaption>Veriﬁed Therapist</figcaption>
            </figure>
          </a>
        </li>
        
      </ul>
    </section>
  </div>
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
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
    <div class="seprator mb-1">
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
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>