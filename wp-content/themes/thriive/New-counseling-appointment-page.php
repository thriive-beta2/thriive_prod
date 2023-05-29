<?php /* Template Name: New Counseling appointment page */ 
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
				font-size: 16px;             
				font-family: "Work Sans",'Rupee_Foradian', sans-serif;             
				font-weight: 700;   
				text-align:center;
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
		
		.och1title{color: #333333 !important; text-align:left;margin-top: 18px;font-weight: 500;font-size:24px;text-align: center;}
		.topreadingList{ padding: 0;}
		.topreadingList .clickgroup a{    padding: 8px 8px;}
				p.hpcdesc {
    padding: 15px;
    text-align: center;
}	
		
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
            
			.banner{
				width: 100% !important;
				margin: 0 auto;
			}
			.och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important;text-align: center;}
        }
        .img-responsive{
            max-width: 100% !important;
        }
		.topreadingList figure .imgwrp {
		   background: none !important;
		   background-size: contain;
		   width: 100%;
		   height: auto;
		   display: flex;
		   justify-content: center;
		   margin-bottom: 10px;
		 
		}
		.topreadingList figure {
		   display: block;
		   margin-bottom: 0;
		}
		.topreadingList figure .imgwrp img {
			width: 100% !important;
			height: 100% !important;
			-moz-border-radius: 29px;
			-webkit-border-radius: 29px;
			-ms-border-radius: 29px;
			border-radius: 0px !important;
		}
		.topreadingList .clickgroup {
		
			margin-top: 10px;
		}
		.och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important;text-align: center;}
		h1.hpctitle {
			font-size: 20px;
			width: 100%;
			margin-top: 15px;
		}
</style>


<?php 
global $wpdb;

?>
<div class="container">
	<div class="row">
		<h1 class="hpctitle">About Counseling</h1>
		<p class="hpcdesc">Counselling is when a certified counsellor, trained in various psychological methods, helps solve your issues through a combination of tools, and therapy. They create a safe non-judgemental space to help you identify, accept, and resolve mental conflict and emotional distress.<p>
	
	</div>
	
</div>
<header class="">
	<div class="banner-home">
		<div class="container">			
			<div class="row">
				<div class="seprator my-2">
					<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
				</div>
			</div>
			<div id="therapyres">	
				<?php if(have_rows('therapist_data', 'option')):
					while(have_rows('therapist_data', 'option')): the_row();
						if('all-appointment-page' ==  get_sub_field('custom_therapy')){
							$ids = get_sub_field('display_ids');  
						}
					endwhile;
				endif;

				$posts_per_page = 4;
				$start = 0;
				$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
				$start = ($paged-1)*$posts_per_page;
				$idsfilter = array();
				if($ids != ""){
					$ids = explode(",",$ids); 
				}
				
				foreach($ids as $id){
					$paid_session_count = get_post_meta($id ,'paid_session_count');
					//if($paid_session_count[0] > 0){
						
						$idsfilter[] = $id;
					//}
				}	
				$idstr = implode(",",$idsfilter);
			
				$getPost = $wpdb->get_results( 
					"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN (28027,44854,30993,20330,37710,64385,28253,30796,64144,68983,29186,31417,57608,30352,15302,55158,6968,34300,66233,55915,73002,47999)"
				);
				
				// Loop Start
				if($getPost) : ?>
					<h1 class="och1title">Consult Top Experts</h1>
					<p style="font-size: 12px;text-align: center;">(By Appointment Only)</p>
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
							set_query_var( 'post', $post);
							set_query_var('therapy',array('counseling-consulting'));
							get_template_part( 'template-parts/therapist-appointment-content');
							
						}
						wp_reset_postdata(); ?>		
					</section>
				<?php endif; ?>
			</div>	
		</div>
	</div>
</header>
<!--<div class="container">
  <div class="row">
    <div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
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
			<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
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
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
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
    
	</div>
</div>-->


    <div style="clear:both"></div>
    <br/>

<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>


