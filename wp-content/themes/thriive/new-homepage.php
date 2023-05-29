<?php /* Template Name: New Homepage */ 
include_once get_stylesheet_directory().'/new-header.php'; ?>
<div id="closesearch">
<div class="container">
<?php while(have_posts()):the_post();
			echo the_content(); 
			endwhile; ?>

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

<div class="row">
	<div class="seprator my-2">
		<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
	</div>
</div>

<div class="container">
  <!-- talk to counselor now -->
    <div class="row">
    <section id="hpfreeReading" class="widgetblock">
      
      <section class="hpreadinglist"  id="hpct1">
        <aside class="hpreadingitem tarot">
          <a href="<?php echo site_url().'/mind'; ?>">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Card_130x128-Mind.jpg';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Card_130x128-Mind.jpg'?> 1080w" src="" />
              <figcaption> 	 
			  <p class="hp-name">Mind</p>
			  <p class="hp-type">Mental Health I Counselling I Free Meditation</p>
			  <p class="hp-type"><b>Starts @ Rs. 299/-</b></p>
			  </figcaption>
			  <i><img class="nextfree hidden-md" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
            </figure>
          </a>
        </aside>
        <aside class="hpreadingitem numerology">
          <a href="<?php echo site_url().'/body'; ?>">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Card_130x128-Body.jpg';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Card_130x128-Body.jpg';?> 1080w" src="" />
              <figcaption> 	 
			  <p class="hp-name">Body</p>
			  <p class="hp-type">Sex Therapy I Ayurveda I Yoga I Past Life Regression</p>
			  <p class="hp-type"><b>Starts @ Rs. 299/-</b></p>
			  </figcaption>
			  <i><img class="nextfree hidden-md" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
            </figure>
          </a>
        </aside>
        <aside class="hpreadingitem angel">
          <a href="<?php echo site_url().'/soul'; ?>">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Card_130x128-Soul.jpg'; ?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Card_130x128-Soul.jpg'; ?> 1080w" src="" />
              <figcaption> 	 
			  <p class="hp-name">Soul</p>
			  <p class="hp-type">Tarot I Astrology I Numerology I Vastu</p>
			  <p class="hp-type"><b>Starts @ Rs. 99/-</b></p>
			  </figcaption>
			  <i><img class="nextfree hidden-md" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
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
    <section id="freeReading" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-2 text-center">Free Online Reading</h2>
      <section class="readinglist"  id="hpct2">
        <aside class="readingitem tarot">
          <a href="<?php echo site_url().'/free-online-tarot-card-reading'; ?>">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot.png';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot-lg.png'?> 1080w" src="" />
              <figcaption>Pick a Tarot Card & Get Instant Reading</figcaption> 	 <i><img class="nextfree hidden-md" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
            </figure>
          </a>
        </aside>
        <aside class="readingitem numerology">
          <a href="https://www.thriive.in/numerology-predictions">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-numberology.png';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-numberology-lg.png';?> 1080w" src="" />
              <figcaption>Instant Numerology Chart</figcaption> 	 <i><img class="nextfree hidden-md" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
            </figure>
          </a>
        </aside>
        <aside class="readingitem angel">
          <a href="https://www.thriive.in/zodiac-signs-compatibility">
            <figure>
              <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Love-Compatibility-Card-01.png'; ?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Love-Compatibility-Card-01.png'; ?> 1080w" src="" />
              <figcaption>Love Compatibility for Zodiac Signs</figcaption> 	 <i><img class="nextfree hidden-md" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
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
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg '; ?>" alt="">
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
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg '; ?>" alt="">
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
      <section class="mediawrapper" id="hpct3">
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