<?php /* Template Name: New Life Coach online consultation page */ 
include_once get_stylesheet_directory().'/new-header.php'; 
//get_header();
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
		
		.och1title{color: #333333 !important;margin-top: 18px;font-weight: 500;font-size:24px;text-align:center;}
		.och2title{color: #484848 !important;     text-align: left; margin-top: 18px;  margin-bottom: -10px;   font-weight: 500;  font-size: 16px !important;  letter-spacing: -.02em;   font-family: galano,san-serif;  -webkit-font-smoothing: antialiased;}
		.topreadingList{ padding: 0;}
		.topreadingList .clickgroup a{    padding: 8px 8px;}
		.btnConsultnew {
    -moz-border-radius: 15px;
    -webkit-border-radius: 15px;
    -ms-border-radius: 15px;
    border-radius: 15px;
    background: #ec4346;
    color: #fff;
    display: block;
    width: 175px;
    margin: 0 auto;
    padding: 5px;
    text-align: center;
    box-shadow: 0 0 6px #0000008a;
}
.container {
    margin-top: -35px;
}

.hpintimg {
    width: 50%;
    position: absolute;
    margin-top: -38px;
    margin-left: -100px;
}

p.hpisntct {
    margin-bottom: 15px;
    font-size: 16px;
    font-weight: 600;
	padding: 10px;
    background: #815394;
    border-radius: 0 0 25px 25px;
    margin-top: 10px;
	color: #fff;
}

p.hpcncb
{
    margin-bottom: 15px;
    font-size: 16px;
    font-weight: 600;
	padding: 8px 5px 10px 10px;;
    background: #009c91;
    border-radius: 0 0 25px 25px;
    margin-top: 9px !important;
	color: #fff;
}

.hpfeatsec1 {
    width: 45% !important;
    border: 1px solid #cccc;
    text-align: center;
    padding: 0px;
    border-radius: 25px;
    height: 185px;
	box-shadow: 0px 0px 5px 5px #cccccc59;
}

.hpfeatleft {
    background: #ece2eb;
	margin-right: 20px;
	
}
.hpfeatright {
    background: #ccece9;
    
}


p.hpisnt {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 10px;
	margin-top: 10px;
}
p.hpcnc {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 10px;
	margin-top: 10px;
}	
.hpfeatsec {
    margin-top: 40px;
    padding: 0px 15px;
    margin-bottom: 70px;
}

.hpcncb{
	margin-bottom:30px !important;
}

.fread{
	width:50%;
}
#catTabs {
    flex: 1;
    display: none;
}
p.hpcdesc {
    padding: 15px;
    text-align: justify;
	
}
h1.hpctitle {
    font-size: 24px;
    width: 100%;
}
img.hpcintimg {
    width: 20%;
    position: relative;
    margin-top: -21px;
}
p.hpcnc {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 10px;
    margin-top: -11px;
}
		
		
        @media only screen and (min-width: 600px)   {
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
        @media only screen and (max-width: 580px) and (max-width: 767px){
            .col-xs-4 {
                width: 33.3333%;
                padding-left: 10px;
                padding-right: 10px;
            }
            
			.banner{
				width: 100% !important;
				margin: 0 auto;
			}
			.och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:20px !important;text-align:center;}
			
			.hpfeatsec {
    margin-top: 40px;
    padding: 0px 15px;
    margin-bottom: 70px;
}
.hpfeatsec1 {
	width: 45% !important;
    border: 1px solid #cccc;
    text-align: center;
    padding: 0px;
    border-radius: 25px;
	height: 150px !important;
}
.hpfeatleft {
    background: #e7dbe7;
	margin-left: 7px;
	margin-right:0px;
}


.hpfeatright {
    background: #a9d4f7;
    margin-left: 20px;
}
p.hpisnt {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 22px;
}
p.hpcnc {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: -4px;
	margin-top: 0px;
	
}	
p.hpisntct {
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: 600;
	padding: 8px 0px 10px 0px;
    color: #fff;
}
.hpcintimg{
	width: 25% !important;
	position: absolute;
	margin-top: -30px  !important;
	margin-left: -4px !important;
}
#freeReading .readinglist .readingitem figure {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 20px 15px;
}
.fread{
	width:103px !important;
	height:102px;

}
#freeReading .readinglist .readingitem figure figcaption {
    text-align: center;
	padding-left: 25px !important;
}
.hpcncb{
	margin-bottom:0px !important;
	margin-top: 10px !important;
	padding: 8px 0px 10px 0px;
    
}
h1.hpctitle {
    font-size: 20px;
    width: 100%;
    margin-top: 30px;
}
}
h2.hpctitle {
    font-size: 20px;
    width: 100%;
    margin-top: 40px;
    text-align: center;
}

#topReaders { 
  margin-top: 10px;
  display: block; 
}

.maillist{list-style: disc outside none;
    display: list-item;
    margin-left: 25px;
}
p.counhead {
    font-size: 16px;
    padding: 0px 20px;
	font-weight:600;
}
p.counheaddesc {
    padding: 0px 20px;
    font-size: 16px;
	text-align: justify;
}
			
        }
        .img-responsive{
            max-width: 100% !important;
        }
		.topreadingList {
    padding: 0;
    margin-bottom: 45px;
}
</style>
<!-- Desktop -->

<div class="container">
	<div class="row">
	<h1 class="hpctitle" style="margin-bottom: -18px;margin-top: 15px; font-size: 24px;">Life Coach</h1>
		<div class="col-md-12 col-xs-12 hpfeatsec">
			<div class="col-md-6 col-xs-6 hpfeatsec1 hpfeatleft">
				<a href="#topReaders">
				<p class="hpisnt">Instant <br>Counsultation</p>	
				<img class="hpcintimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/CAll-Icons-14.svg';?>">
				<p class="hpcnc">Call/Chat Now<br>₹ 499/- (20 mins)</p>				
				<p class="hpisntct">Counsult Now ></p>
				
				</a>
			</div>

			<div class="col-md-6 col-xs-6 hpfeatsec1 hpfeatright">
				<a href="https://www.thriive.in/life-coach">
				<p class="hpisnt">Book Your  <br>Appointment</p>
				<img class="hpcintimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Calender-Icons-15.svg';?>">
				<p class="hpcnc">Consult<br>Top Experts</p>
				<p class="hpcnc hpcncb">Schedule Now ></p>
				
				</a>
			</div>
		</div>

	</div>  
</div>


<div class="container">
	  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
  </div>
  </div>


<div class="container">
	<div class="row">
		<h2 class="hpctitle">What is Life Coaching?</h2>
		<p class="hpcdesc">A Life Coach is a wellness professional who, through a strategic process, cuts through the chaos of life to bring out your best potential. By understanding your personality, and your issues, they will help you employ winning strategies to apply in your day-to-day life, career, relationships, and work towards restoring your mental health.<p>
		
		<p class="counhead">Types of Life Coaching</p>
		<p class="counheaddesc">If the tiniest triggers fill you with rage, or you mostly feel drained out and exhausted, you can benefit from Life Coaching. By undergoing life coaching for Anger Management, or Emotional Fatigue, you can address these issues and also correct your approach to how you manage these emotions.</p>
		<p class="counheaddesc" style="margin-bottom:35px;">Even people struggling with clinical Depression, Addiction, Lack of Clarity can benefit from consulting a Life Coach to manage their condition better. Life Coaching is also helpful for solving  Family Issues, Career Issues, De-motivation, etc.</p>
	
	</div>
	
</div>

   	 <section class="container dexktop_price">
	 <!--<h2 class="och1title"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Our Trending Plans  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h2>
       <div class="row">
           <div class="col-md-3 col-xs-12"></div>
           <div class="col-md-6 col-xs-12">
               <div class="row">
                   <div class="col-md-4 col-xs-4">
                       <div class="box_in_purple" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                           <h5 class="text-center c_purple f_16">10 mins</h5>
                           <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #eee;width:80%;">
                           <h5 class="c_red text-center f_15">&#8377; 299/-</h5>
                       </div>
                   </div>
                   <div class="col-md-4 col-xs-4">
                       <div class="box_in_red" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                           <h5 class="text-center c_pink f_18">20 mins</h5>
                           <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #eee;width:80%;">
                           <h5 class="c_red text-center f_15">&#8377; 499/-</h5>
                       </div>
                   </div>
                   <div class="col-md-4 col-xs-4">
                       <div class="box_in_blue" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                           <h5 class="text-center c_blue f_18">40 mins</h5>
                           <hr style="margin-bottom: 5px;margin-top: 0px;border-top: 2px solid #eee;width:80%;">
                           <h5 class="c_red text-center f_15">&#8377; 899/-</h5>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-md-3 col-xs-12"></div>
       </div>-->
	   
   </section>

<header class="">
	<div class="banner-home">
		<div class="container">			
			<!--<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php echo get_site_url()."/consult-online-with-counselor"; ?>"<?php echo $current_url == 'consult-online-with-counselor' ? 'selected': ''; ?>>All</option>
                <option value="<?php echo get_site_url()."/talk-to-best-counselor-online"; ?>" <?php echo $current_url == 'talk-to-best-counselor-online' ? 'selected': ''; ?>>Mental Health Coach</option>
                <option value="<?php echo get_site_url()."/talk-to-best-life-coach-online"; ?>" <?php echo $current_url == 'talk-to-best-life-coach-online' ? 'selected': ''; ?>>Stress Coach</option>
                <option value="<?php echo get_site_url()."/talk-to-best-meditation-online"; ?>" <?php echo $current_url == 'talk-to-best-meditation-online' ? 'selected': ''; ?>>Meditation Coach</option>
            </select>-->
			 <div class="row">
				<div class="seprator my-2">
					<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
				</div>
			  </div>
			<h1 class="och1title" id="topReaders">Our Top Therapist</h1> 
			<div class="" style="clear: :both"></div>
			<?php if(have_rows('therapist_data', 'option')):
        while(have_rows('therapist_data', 'option')): the_row();
            if('life-coach' == get_sub_field('taxonomy')->slug){
              $ids = get_sub_field('display_ids');  
            }
        endwhile;
      endif;
			$posts_per_page = 4;
			$start = 0;
			$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
			$start = ($paged-1)*$posts_per_page;
			// $getPost = $wpdb->get_results( 
			// 	"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN (58801,56778,54410,46561,57587,44780,42571,48564,55467,36458,40360,39041,35986,38354,36348,38096,56007,54569,53551,49935)"
			// );

            $getPost = $wpdb->get_results( 
                "SELECT DISTINCT p.ID,p.post_author FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($ids)"
            );

			// Loop Start
			if($getPost) : ?>
				<section class="topreadingList">
                        <?php $tempArr = $available = $busy = array();
                        foreach ( $getPost as $posts ) {
                            $post = get_post($posts->ID);
                           /*  $status = getTherapistStatus($post->ID);
                            if($status == "Available"){
                                array_push($available,$posts->ID);
                            } 
                            if($status == "Busy"){
                                array_push($busy,$posts->ID);
                            }    */ 
							$getid = $wpdb->get_row("SELECT * FROM therapist_availability_status WHERE tid = '".$posts->post_author ."' AND availability_status != 4");
							if($getid){
								array_push($available,$posts->ID);
							}	
                        }
                        $tempArr = array_merge($available,$busy);
						$tempArr = assoc_array_shuffle($tempArr);
                        foreach($tempArr as $t){
                            $post = get_post($t);
                            // if(!empty($posts->distance)){
                            //     $post->distance = round($posts->distance,1).' km';
                            // }
                            // if(!empty($posts->response_count)){
                            //     $post->response_count = $posts->response_count;
                            // }
                            setup_postdata( $post );
                            set_query_var('therapy',array('life-coach'));
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
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
</div>

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
    </section>
</div>

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