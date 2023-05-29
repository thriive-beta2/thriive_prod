<?php /* Template Name: New Free SexTherapist online consultation page */ 
include_once get_stylesheet_directory().'/new-header.php'; 
global $wp;
$current_url = add_query_arg( array(), $wp->request ); ?>

 <style>
        body{
            color: unset !important;
        }
        .c_purple {
            color: #673AB7 !important;
        }
        .f_15{
            font-size: 13px;
            font-family: "Work Sans",'Rupee_Foradian', sans-serif;
            margin-bottom: 0px;
        }
        .f_18{   
                font-size: 14px;          
                font-weight: 700;   
                text-align:center;
        }
        .c_red {
            color: #F44336 !important;
			
        }

        .c_pink {
            color: #d0507b !important;
			margin-top: 18px;
        }

        .c_blue {
            color: #3F51B5 !important;
			margin-top: 18px;
        }
        .box_in_purple {
            border: 1px solid #673AB7;
            background-color: #fff;
            box-shadow: 1px 1px 5px #673ab75e;
            border-radius: 20px;
            padding:  10px 5px 10px 5px;
			height: 75px;
        }
        .box_in_red {
            border: 1px solid #E91E63;
            background-color: #fff;
            box-shadow: 1px 1px 5px #e91e6336;
            border-radius: 20px;
            padding:  10px 5px 10px 5px;
			height: 75px;
        }
        .box_in_blue {
            border: 1px solid #3F51B5;
            background-color: #fff;
            box-shadow: 1px 1px 5px #3f51b559;
            border-radius: 20px;
            padding:  10px 5px 10px 5px;
			height: 75px;
        }
        .mb_2 {
            margin-bottom: 2%;
        }
        .banner{
            width: 100%;
            margin: 0 auto;
        }
        
        .och1title{color: #333333 !important; text-align:left;margin-top: 18px;font-weight: 500;font-size:24px;text-align: center;}
        .topreadingList{ padding: 0;}
        .topreadingList .clickgroup a{    padding: 8px 8px;}
        
        @media only screen and (min-width: 600px){
            .banner_image {
                height: 400px;
                width: 100%;
            }
            
            .col-md-4{
                width: 33.3333%;
                padding-left: 16px;
                padding-right: 16px;
            }
			
            
        }
        @media only screen and (max-width: 580px) {
            .col-xs-4 {
                width: 33.3333%;
                padding-left: 10px;
                padding-right: 10px;
            }
			.f_18{   
                font-size: 12px !important; 
			}
            
            .banner{
                width: 100% !important;
                margin: 0 auto;
            }
            .och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important;text-align: center;}
        }
        .img-responsive{
            max-width: 100% !important;
        }
		.ftncul{
			padding:15px;
		}
</style>

<section class="banner">
             <div class="col-md-12" style="padding: 0px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform" <?php } ?>>
                 		<img alt="" class="img-responsive banner_image" src="<?php if (is_mobile()) {echo 'https://www.thriive.in/wp-content/uploads/2020/12/Select-The-Therapy-02-2.jpg';
		}else{echo 'https://www.thriive.in/wp-content/uploads/2020/12/Select-The-Therapy-03-1.jpg';}?>" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?> style="border-radius: 0px"/>

             </div>
</section>
<div style="clear:both"></div>
    <br/>
		<div class="col-md-12 col-xs-12 text-center" style="margin-bottom:2%;">
			<img style="max-width:100%" src="https://www.thriive.in/wp-content/uploads/2020/12/Select-The-Therapy-01-1.jpg">
		</div>	
	
   <!-- <section class="container dexktop_price">
    
        <div class="row">
        
        
            <div class="col-md-3 col-xs-12"></div>
            <div class="col-md-6 col-xs-12">
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <div class="box_in_purple" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                            <h5 class="text-center c_purple f_18">Select the therapy you are interested in</h5>
                            <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #CCCCCC;width: 85%;display:none;">
                            <h5 class="text-center c_purple f_15"></h5>
                            <h5 class="c_red text-center f_15"></h5>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                        <div class="box_in_red">
                            <h5 class="text-center c_pink f_18">Select Expert</h5>
                            <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #CCCCCC;width: 85%;display:none;">
                            <h5 class="text-center c_pink f_15"></h5>
                            <h5 class="c_red text-center f_15"></h5>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                        <div class="box_in_blue">
                            <h5 class="text-center c_blue f_18">Click Call Now</h5>
                            <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #CCCCCC;width: 85%;display:none;">
                            <h5 class="text-center c_blue f_15"></h5>
                            <h5 class="c_red text-center f_15"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12"></div>
        </div>
        
    </section>-->

<header class="">
    <div class="banner-home">
        <div class="container">         
<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php echo get_site_url()."/free-online-counselling-and-therapy-sessions-from-indias-leading-experts"; ?>"<?php echo $current_url == 'free-online-counselling-and-therapy-sessions-from-indias-leading-experts' ? 'selected': ''; ?>>Select Therapy</option>
                <option value="<?php echo get_site_url()."/free-online-astrology-consultation"; ?>" <?php echo $current_url == 'free-online-astrology-consultation' ? 'selected': ''; ?>>Astrology</option>
                <option value="<?php echo get_site_url()."/free-numerology-session"; ?>" <?php echo $current_url == 'free-numerology-session' ? 'selected': ''; ?>>Numerology</option>
                <option value="<?php echo get_site_url()."/free-online-tarot-card-reading-session"; ?>" <?php echo $current_url == 'free-online-tarot-card-reading-session' ? 'selected': ''; ?>>Tarot Card Reading</option>
                <option value="<?php echo get_site_url()."/free-online-meditation-session"; ?>"<?php echo $current_url == 'free-online-meditation-session' ? 'selected': ''; ?>>Meditation</option>
                <option value="<?php echo get_site_url()."/free-inner-child-healing-session"; ?>"<?php echo $current_url == 'free-inner-child-healing-session' ? 'selected': ''; ?>>Inner Child Healing</option>
                <option value="<?php echo get_site_url()."/free-past-life-regression-session"; ?>"<?php echo $current_url == 'free-past-life-regression-session' ? 'selected': ''; ?>>Past Life Regression</option>
                <option value="<?php echo get_site_url()."/free-online-ayurveda-session"; ?>"<?php echo $current_url == 'free-online-ayurveda-session' ? 'selected': ''; ?>>Ayurveda</option>
                <option value="<?php echo get_site_url()."/free-online-counselling-therapy"; ?>"<?php echo $current_url == 'free-online-counselling-therapy' ? 'selected': ''; ?>>Counseling</option>
                <option value="<?php echo get_site_url()."/free-online-counseling-from-a-life-coach"; ?>"<?php echo $current_url == 'free-online-counseling-from-a-life-coach' ? 'selected': ''; ?>>Life Coach</option>
                <option value="<?php echo get_site_url()."/free-hypnotherapy-session"; ?>"<?php echo $current_url == 'free-hypnotherapy-session' ? 'selected': ''; ?>>Hypnotherapy</option>
                <option value="<?php echo get_site_url()."/book-a-free-nutritionist-session-online"; ?>"<?php echo $current_url == 'book-a-free-nutritionist-session-online' ? 'selected': ''; ?>>Nutritionist</option>
                <option value="<?php echo get_site_url()."/talk-to-best-sex-therapist-online-for-free"; ?>"<?php echo $current_url == 'talk-to-best-sex-therapist-online-for-free' ? 'selected': ''; ?>>Sex Therapy</option>
                <option value="<?php echo get_site_url()."/free-session-theta-healing"; ?>"<?php echo $current_url == 'free-session-theta-healing' ? 'selected': ''; ?>>Theta Healing</option>
                <option value="<?php echo get_site_url()."/free-online-vastu-shastra-consultation"; ?>"<?php echo $current_url == 'free-online-vastu-shastra-consultation' ? 'selected': ''; ?>>Vastu Shastra</option>
				<option value="<?php echo get_site_url()."/free-consulatation-for-pranic-healing"; ?>"<?php echo $current_url == 'free-consulatation-for-pranic-healing' ? 'selected': ''; ?>>Pranic Healing</option>
				<option value="<?php echo get_site_url()."/free-online-reiki-consultation"; ?>"<?php echo $current_url == 'free-online-reiki-consultation' ? 'selected': ''; ?>>Reiki</option>
                
            </select>
             <div class="row">
                <div class="seprator my-2">
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
                </div>
              </div>
            <?php if(have_rows('free_therapist_data', 'option')):
                while(have_rows('free_therapist_data', 'option')): the_row();
                    if('sex-therapist' == get_sub_field('taxonomy')->slug){
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
            if($getPost) { ?>
                <h1 class="och1title">Consult Best Sex Therapist</h1>
                <section class="topreadingList">
                    <?php $tempArr = $available = $busy = array();
                    foreach ( $getPost as $posts ) {
                        $post = get_post($posts->ID);
                        $status = getTherapistStatus($post->ID);
                        if($status == "Available"){
                            array_push($available,$posts->ID);
                        } 
                        if($status == "Busy"){
                            array_push($busy,$posts->ID);
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
                        if($post->active_for_free_session){
                            setup_postdata( $post );
                            set_query_var('therapy',array('sex-therapist'));
                            set_query_var('payment_type','free');
                            get_template_part( 'template-parts/therapist-content');
                        } /* else { ?>
                            <p>Free Session for the day has been booked</p>
                        <?php } */
                    }
                    wp_reset_postdata(); ?>     
                </section>
            <?php } ?>
        </div>
    </div>
</header>
<div class="">
  <div class="row">
    <div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>	
  <h4 class="ftnc">Terms & Conditions</h4>
	<div class="container">
		<div class="row">
				<ul class="ftncul">
					<li class="ftncli ">This is a free online discussion/session with a therapist*.</li>
					<li class="ftncli ">This session will be for a maximum of a 15-20 mins*.</li>
					<li class="ftncli ">There are limited trial sessions, subject to availability*.</li>
					<li class="ftncli ">Each person can avail only one free trial session*.</li>
				</ul> 
				<p class="fdtnc" style="font-size: 14px;">*For detailed terms & condition <a href="#">click here</a></p>
		</div>
	</div>
  <!--<div class="row">
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
  </div> -->

   <!-- <section class="widgetblock">
        <h2 class="wdgt-head mt-2 mb-1 text-center">FAQs</h2>
        <section class="faqAccordian" style="margin-top:2%" itemscope itemtype="http://schema.org/FAQPage">
            <?php //while(have_rows('faq')) : the_row();?>
            <div class="card">
                <div class="card-header open" itemprop="mainEntity" itemscope itemtype="http://schema.org/Question">
                    <button class="btn btn-link" itemprop="name"><?php the_sub_field('faq_title') ?></button>
                    <div class="panel collapse" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
                        <p itemprop="text"><?php the_sub_field('faq_description')?></p>
                    </div>
                </div>
            </div>
            <?php //endwhile;?>
        </section>
    </section> -->
  
  

<!--  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
    <div class="row">
        <section id="faqblock" class="widgetblock">
            <h2 class="wdgt-head mt-2 mb-1 text-center">FAQs</h2>
            <section id="accordion" class="faqAccordian" itemscope itemtype="http://schema.org/FAQPage">
                <?php $i = 0; 
                while(have_rows('faq')) : the_row();?>
                    <div class="card">
                        <div class="card-header <?php echo $i==0 ?'open':''; ?>" id="heading<?php echo $i; ?>" >
                            <h5 class="mb-0" itemprop="mainEntity" itemscope itemtype="http://schema.org/Question">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>" itemprop="name">
                                <?php the_sub_field('faq_title') ?>
                                </button>
                                <span class="icon"></span>  
                            </h5>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $i==0 ?'show':''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
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
</div>-->
</div>
    <div style="clear:both"></div>
    <br/>
<?php include_once get_stylesheet_directory().'/new-footer.php'; 
if (is_user_logged_in()){ 
    if(checkfreesessionbyuser($current_user->ID)->count > 0){ ?>
        <div class="modal fade" id="alreadyused" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
                        <img src="<?php echo site_url().'/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg'; ?>" width="100" height="100" alt="Thriive">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                                <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                        </button>
                      </div>
                    </div>
                    <div class="modal-body text-center">
                      <p>You have already used free session.</p>      
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">$("#alreadyused").modal();</script>
    <?php } if(checkuserisallowedfs($current_user->ID)->count == 0){ ?>
        <div class="modal fade" id="regforfs" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
                        <img src="<?php echo site_url().'/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg'; ?>" width="100" height="100" alt="Thriive">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                                <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                        </button> -->
                      </div>
                    </div>
                    <div class="modal-body text-center">
                       <p>You are not registered for free session.<br/><a href="<?php echo site_url().'/free-online-therapy';?>" style="color: #27265f;font-weight:600;"><u>Click here to register.</u></a></p>     
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">$("#regforfs").modal();</script>
    <?php }
} ?>