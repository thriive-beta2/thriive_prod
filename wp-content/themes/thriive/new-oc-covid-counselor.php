<?php /* Template Name: New Covid Counselor online consultation page */ 
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
            font-size: 12px;
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
			.och1title{color: #333333 !important; text-align:left;margin-top: 18px;font-weight: 600 !important; font-size:15px !important;text-align:center;}
        }
        .img-responsive{
            max-width: 100% !important;
        }
</style>




<style>
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
    margin-top: 0px;
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
  margin-bottom: -10px;
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
.header_img{
  width:80%;margin: 15px auto;
}
.header_img img{
  width: 100%;height: 100%;
}

@media (min-width: 320px) and (max-width: 640px) {
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
    margin-top: 40px;
}
h2.hpctitle {
    font-size: 20px;
    width: 100%;
    margin-top: 40px;
  text-align: center;
}

.header_img{
  width:100%;margin: 15px auto;
}
.header_img img{
  width: 100%;height: 60%;
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
  text-align:justify;
}

#topReaders { 
  margin-top: 10px;
  display: block; 
}

.maillist{list-style: disc outside none;
    display: list-item;
    margin-left: 25px;
  }

</style>
















<!-- Desktop -->
<div class="container">
  <div class="row">
  <h1 class="hpctitle" style="margin-bottom: -18px;margin-top: 15px;">Free Mental Health Counseling For Covid
Related Anxiety &amp; Depression</h1><br><br><br>
  <!--<p style="text-align: center;width:100%;">We are here to save your Mental health.</p>-->
  </div>  
</div>
	 
<div class="header_img" style="">
  <img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/Inside Page-1-TOGO-04.jpg" style="">
</div>


  
<div class="container" style="margin-top: 15px;margin-bottom: -30px;">
    <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
  </div>
  </div>

<div class="container">
    <h2 class="hpctitle">Why Do I need online therapy for covid related trauma ?</h2>
    <p class="hpcdesc">We are just not fighting a global pandemic, we are also face-to-face with a silent killer- mental
health issues. Close to 50% of the world population is grappling with mental health due to after
effects of the Pandemic. Covid Counseling with Thriive is a FREE 20-minute session, with
verified and trained mental health counselors. It is an initiative where we are offering FREE
counseling to anyone and everyone affected by the Covid pandemic in India.<p>
    
    <p class="counheaddesc"><b>Who can avail free online therapy ?</b></p>
    <div style="clear: both;"></div>
      <div><ul>
        <li>Frontline workers grappling with emotional exhaustion</li>
        <li>Individuals Grieving the loss of friends or family</li>
        <li>Individuals Experiencing lockdown fatigue</li>
        <li>Individuals Experiencing Anxiety and stress due to loss of financial security and social connections</li>
        <li>Individuals in desperate need of emotional support</li>
        <li>Individuals seeking mental recovery during/post-infection</li>
        <li>Individuals seeking mental recovery during/post-infection</li>
        <li>Individuals looking for free online therapy/need to talk to a therapist for free</li>

      </ul></div>
        <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
  </div>
    <p class="counheaddesc"><i>Please be mindful that this is a free counseling service meant for those who need
help with their mental health problems. Misusing the service will mean depriving
someone who actually needs it. Click here to share our therapy services - help us
reach more and more people.</i></p>
      <p style="color:blue !important;text-decoration: underline;width:100%;text-align: center;margin:-10px 0px !important;cursor: pointer;" onclick="copylink();"><b>Copy And Share</b></p>
<p class="counheaddesc" style="text-align: center;margin-bottom: -5px;"><br>Help us reach more more people.<br><br>
<div class="text-center">
		                    
		                    <div class="thriive-social-block hide-block show-block">
		                        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
		                    </div>
</div>

</p>
    <p class="counheaddesc" style="margin-bottom:45px;"><b><i>Disclaimer: This is not a medical service for the treatment of COVID +ve patients.
This is solely to improve mental health care.</i></b> 
</p>
</div>

<script type="text/javascript">
  function copylink(){
  navigator.clipboard.writeText('https://www.thriive.in/consult-covid-counselor-online');
  alert('copied to clipboard');
}
</script>

  
  

<div class="container" style="margin-top:-25px;">

  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
  </div>
</div>



   
<?php 
$_SESSION['covid_sessions'] = 1;
?>
<header class="">
	<div class="banner-home">
		<div class="container">			
<!--			<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php /*echo get_site_url()."/talk-to-best-counselor-online"; ?>" <?php echo $current_url == 'talk-to-best-counselor-online' ? 'selected': ''; ?>>Mental Health Coach</option>
                <option value="<?php echo get_site_url()."/talk-to-best-life-coach-online"; ?>" <?php echo $current_url == 'talk-to-best-life-coach-online' ? 'selected': ''; ?>>Stress Coach</option>
                <option value="<?php echo get_site_url()."/talk-to-best-meditation-online"; ?>" <?php echo $current_url == 'talk-to-best-meditation-online' ? 'selected': ''; ?>>Meditation Coach</option>
				<option value="<?php echo get_site_url()."/consult-covid-counselor-online"; ?>" <?php echo $current_url == 'consult-covid-counselor-online' ? 'selected': ''; */?>>Covid Counselor</option>
            </select>
			<div class="row">
				<div class="seprator my-2">
					<img src="<?php //echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
				</div>
			  </div>-->
			<h1 class="och1title"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Our Best Online Therapists (Book a Free Session Now) <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h1>
			<?php /* if(have_rows('therapist_data', 'option')):
        while(have_rows('therapist_data', 'option')): the_row();
            if('counselling' == get_sub_field('taxonomy')->slug){
              $ids = get_sub_field('display_ids');  
            }
        endwhile;
      endif; */
			$posts_per_page = 4;
			$start = 0;
			$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
			$start = ($paged-1)*$posts_per_page;
			
			$str_to_arr = "37778,58874,58413,51082,58583,60044,68516,64649,44119,70139,59225,32524,57410,60363,58918,51737,28027,64144,68983,53487,55159,39614,29668,53731,59993,60482,37333,54990,47374,59997,60484,51074,75758,76792,76122,76058,75768,76534,75928,76059,75793,75779,76305,76019,75745,76123,75755,76086,75845,75748,75799,75892,75854,73668,73002,66238,51673";
			$arr = explode(",",$str_to_arr);
			shuffle($arr);
			//echo $str_to_arr = implode(",",$arr);
			?>
			<section class="topreadingList">
				
			<?php 
			//print_r($arr);
			$count = 1;
			foreach($arr as $ar){
				if($count <= 10){
					$posts = $wpdb->get_row( 
					"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID = '".$ar."'"
					);
				//print_r($getPost);
			// Loop Start
			
				if($posts) : ?>
                        <?php $tempArr = $available = $busy = array();
                        //foreach ( $getPost as $posts ) {
                            $post = get_post($posts->ID);
							$status = getTherapistStatus($post->ID);
                            if($status == "Available"){
                              
								setup_postdata( $post );
								set_query_var('therapy',array('counselling'));
								get_template_part( 'template-parts/covid-therapist-content');
								$count++;
							}
						//}
                        wp_reset_postdata(); ?>		
			
			<?php endif; 
				}
			}
			?>
				</section>
		</div>
	</div>
</header>

 <div class="row">
    <div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
</div>
<div class="container">
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
<?php  include_once get_stylesheet_directory().'/new-footer.php'; ?>