<?php /* Template Name: New Numerology online consultation page */ 
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
				font-family: "Work Sans",'Rupee_Foradian', sans-serif;             
				font-weight: 700;         
		}
        .c_red {
            color: #F44336 !important;
        }

        .c_pink {
            color: #d0507b !important;
        }

        .c_blue {
            color: #3F51B5 !important;
        }
        .box_in_purple {
            border: 1px solid #673AB7;
            background-color: #fff;
            box-shadow: 1px 1px 5px #673ab75e;
            border-radius: 20px;
            padding: 10px 0px 10px 0px;
        }
        .box_in_red {
            border: 1px solid #E91E63;
            background-color: #fff;
            box-shadow: 1px 1px 5px #e91e6336;
            border-radius: 20px;
            padding: 10px 0px 10px 0px;
        }
        .box_in_blue {
            border: 1px solid #3F51B5;
            background-color: #fff;
            box-shadow: 1px 1px 5px #3f51b559;
            border-radius: 20px;
            padding: 10px 0px 10px 0px;
        }
        .mb_2 {
            margin-bottom: 2%;
        }
		.banner{
			width: 100%;
			margin: 0 auto;
		}
		
		.och1title{color: #333333 !important; text-align:left;margin-top: 18px;font-weight: 500;font-size:24px;text-align:center;}
		.topreadingList{ padding: 0;}
		.topreadingList .clickgroup a{    padding: 8px 8px;}
		
        @media only screen and (min-width: 600px) and (max-width: 767px)  {
            .banner_image {
                height: 400px;
                width: 100%;
            }
            
            .col-md-4{
                width: 33.3333%;
                padding-left: 16px;
                padding-right: 16px;
            }
			.banner{
				width: 100% !important;
				margin: 0 auto;
			}
        }
        @media only screen and (max-width: 580px) {
            .col-xs-4 {
                width: 33.3333%;
                padding-left: 10px;
                padding-right: 10px;
            }
            
			.banner{
				width: 100% !important;
				margin: 0 auto;
			}
			.och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important;text-align:center;}
        }
        .img-responsive{
            max-width: 100% !important;
        }
</style>

<section class="banner">
        <img alt="" class="img-responsive banner_image" src="<?php if (is_mobile()) {echo 'https://www.thriive.in/wp-content/uploads/2021/01/Soul-Listing-Page_Numerologist-Mobile.jpg';
		}else{echo 'https://www.thriive.in/wp-content/uploads/2021/01/Soul-Listing-Page_Numerologist-Desktop.jpg';}?>" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>  style="border-radius: 0px"/>
    </section>
    <section class="container dexktop_price">
	<h2 class="och1title"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Our Trending Plans  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h2>
        <div class="row">
            <div class="col-md-3 col-xs-12"></div>
            <div class="col-md-6 col-xs-12">
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <div class="box_in_purple" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                            <h5 class="text-center c_purple f_18">&#8377; 99/-</h5>
                            <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #CCCCCC;width: 85%;">
                           <!-- <h5 class="text-center c_purple f_15">2 mins +</h5>-->
                            <h5 class="c_red text-center f_15">3 mins</h5>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="box_in_red"<?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                            <h5 class="text-center c_pink f_18">&#8377; 199/-</h5>
                            <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #CCCCCC;width: 85%;">
                           <!-- <h5 class="text-center c_pink f_15">5 mins +</h5>-->
                            <h5 class="c_red text-center f_15">10 mins</h5>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="box_in_blue" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                            <h5 class="text-center c_blue f_18">&#8377; 399/-</h5>
                            <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #CCCCCC;width: 85%;">
                            <!--<h5 class="text-center c_blue f_15">10 mins +</h5>-->
                            <h5 class="c_red text-center f_15">20 mins</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12"></div>
        </div>
		
    </section>


<header class="">
	<div class="banner-home">
		<div class="container">			
			<!--<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php echo get_site_url()."/talk-to-astrologer-online"; ?>"<?php echo $current_url == 'talk-to-astrologer-online' ? 'selected': ''; ?>>Select Type of Reading</option>
                <option value="<?php echo get_site_url()."/talk-to-best-astrologer-online"; ?>" <?php echo $current_url == 'talk-to-best-astrologer-online' ? 'selected': ''; ?>>Astrology</option>
                <option value="<?php echo get_site_url()."/talk-to-best-numerologist-online"; ?>" <?php echo $current_url == 'talk-to-best-numerologist-online' ? 'selected': ''; ?>>Numerology</option>
                <option value="<?php echo get_site_url()."/talk-to-best-tarot-card-reader-online"; ?>" <?php echo $current_url == 'talk-to-best-tarot-card-reader-online' ? 'selected': ''; ?>>Tarot Card Reading</option>
                <option value="<?php echo get_site_url()."/talk-to-best-angel-card-reader-online"; ?>"<?php echo $current_url == 'talk-to-best-angel-card-reader-online' ? 'selected': ''; ?>>Angel Card Reading</option>
                <option value="<?php echo get_site_url()."/vastu"; ?>"<?php echo $current_url == 'vastu' ? 'selected': ''; ?>>Vastu</option>
            </select>-->
			<h1 class="och1title"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Consult Best Numerologists  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i></h1>
			<?php if(have_rows('therapist_data', 'option')):
                while(have_rows('therapist_data', 'option')): the_row();
                    if('numerology' == get_sub_field('taxonomy')->slug){
                      $ids = get_sub_field('display_ids');  
                    }
                endwhile;
            endif;
		//	echo 'ids'.$ids;
			$posts_per_page = 4;
			$start = 0;
			$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
			$start = ($paged-1)*$posts_per_page;
			$getPost = $wpdb->get_results( 
				"SELECT DISTINCT p.ID,p.post_author FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($ids)"
			);

			// Loop Start
			if($getPost) : ?>
				<section class="topreadingList">
                    <?php $tempArr = $available = $busy = array();
                    foreach ( $getPost as $posts ) {
                        $post = get_post($posts->ID);
                        $getid = $wpdb->get_row("SELECT * FROM therapist_availability_status WHERE tid = '".$posts->post_author ."' AND availability_status != 4");
						if($getid){
							$earning_ratio = get_post_meta($posts->ID,'earning_ratio',true);
							if($earning_ratio == 3){		
								array_push($available,$posts->ID);
							}
						}                       
                    }
                    $tempArr = array_merge($available,$busy);
					$tempArr = assoc_array_shuffle($tempArr);
                    foreach($tempArr as $t){
                        $post = get_post($t);
                        
                        setup_postdata( $post );
                        set_query_var('therapy',array('numerology'));
                        get_template_part( 'template-parts/therapist-content');
                    }
                    wp_reset_postdata(); ?>		
				</section>
			<?php endif; ?>
		</div>
	</div>
</header>
<div class="container">
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


</div>


    <div style="clear:both"></div>
    <br/>
<?php 
function assoc_array_shuffle($array)
{
    $orig = array_flip($array);
    shuffle($array);
    foreach($array AS $key=>$n)
    {
        $data[$n] = $orig[$n];
    }
    return array_flip($data);
}
include_once get_stylesheet_directory().'/new-footer.php'; ?>