<?php /* Template Name: New Aura online consultation page */ 
include_once get_stylesheet_directory().'/new-header.php';
 
global $wp;
global $wpdb;
//$current_url = add_query_arg( array(), $wp->request ); ?>

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
	.och1title{color: #333333 !important; text-align:left;margin-top: -5px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important;text-align: center;}
}
.img-responsive{
	max-width: 100% !important;
}
.intimg {
    width: 30%;
    position: absolute;
    margin-top: -20px;
    margin-left: -65px;
}

p.isntct {
    margin-bottom: 15px;
    font-size: 16px;
    font-weight: 600;
}

.featsec1 {
    width: 45% !important;
    border: 1px solid #cccc;
    text-align: center;
    padding: 5px;
    border-radius: 15px;
    height: 185px;
	box-shadow: 0px 0px 5px 5px #cccccc59;
}

.featleft {
    background: #e7dbe7;
    margin-right: 20px;
}
.featright {
    background: #a9d4f7;   
}


p.isnt {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 10px;
}
p.cnc {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 10px;
}	
.featsec {
    margin-top: 20px;
    padding: 0px 15px;
    margin-bottom: 45px;
}

.cncb{
	margin-bottom:30px !important;
}

.fread{
	width:50%;
}
@media (min-width: 320px) and (max-width: 640px) {
.hpfeatsec {
    margin-top: 20px;
    padding: 0px 15px;
    margin-bottom: 20px;
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
.featsec {
    margin-top: 20px;
    padding: 0px 15px;
    margin-bottom: 45px;
}
.featsec1 {
	width: 45% !important;
    border: 1px solid #cccc;
    text-align: center;
    padding: 5px;
    border-radius: 15px;
	height: 152px !important;
}
.featleft {
    background: #e7dbe7;
	margin-left: 7px;
}

.featright {
    background: #a9d4f7;
    margin-left: 0px ;
}
p.isnt {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 10px;
}
p.cnc {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 10px;
}	
p.isntct {
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 600;
}
.intimg{
	width: 65%;
	position: absolute;
	margin-top: -15px  !important;
	margin-left: -48px !important;
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
.cncb{
	margin-bottom:8px !important;
}
#freeReading .readinglist {
    padding: 0px 20px !important;
}
.pints{
	margin-top:0px !important;
}
}
h2.hpctitle {
    font-size: 20px;
    width: 100%;
    margin-top: 40px;
	text-align: center;
}

#topreadingList { 
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
.pints{
	margin-top:-20px;
}

</style>
	
	<br/><br/>
  <div class="row">
	
    <div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
  </div>
    <section class="container dexktop_price">
	<h2 class="och1title" ><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Our Trending Plans  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h2>
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
			 <div class="row" id="topreadingList">
				<div class="seprator my-2">
					<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
				</div>
			  </div>
			<h1 class="och1title" style="margin-bottom: 10px !important;"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Consult Best Aura Readers Online <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h1>
			
			<?php if(have_rows('therapist_data', 'option')):
                while(have_rows('therapist_data', 'option')): the_row();
                    if('aura-reading' == get_sub_field('taxonomy')->slug){
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
            //print_r($ids);
            foreach($ids as $id){
                $paid_session_count = get_post_meta($id ,'paid_session_count',true);
				if($paid_session_count > 0){
					$idsfilter[] = $id;
				}
			} 
			$idstr = implode(",",$idsfilter);
			
			
			$getPost = $wpdb->get_results( 
				"SELECT DISTINCT p.ID,p.post_author FROM wp_posts AS p,wp_postmeta m WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($idstr)  AND m.post_id = p.ID ORDER BY m.meta_key = 'earning_ratio' ASC"
			);
			
			// Loop Start
			if($getPost) : ?>
				<section class="topreadingList" >
                    <?php $tempArr = $available = $busy = $eavailable = $eavailable1 = $iavailable = $ibusy = $mavailable =  array();
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
                        set_query_var('therapy',array('aura-reading'));
						set_query_var( 'inhouse', 0);
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

<style type="text/css">
    .popular_searches{
        width:100%;
        height:13rem;
        overflow: scroll;
    }
</style>
<div class="popular_searches">
    <h3>Popular Searches</h3>
    <ul>
        <li><b>Past Life Regression: </b>
            <a href="https://www.thriive.in/past-life-regression-therapy">past life regression therapy</a>,
            <a href="https://www.thriive.in/past-life-regression-therapy">famous past life regression therapist</a>,
            <a href="https://www.thriive.in/past-life-regression-therapy">find a past life regression therapist</a>,
            <a href="https://www.thriive.in/past-life-regression-therapy">best past life regression therapist in india</a>,
            <a href="https://www.thriive.in/past-life-regression-therapy">past life regression online reading</a>
        </li><br>
        <li><b>Inner Child Healing: </b>
            <a href="https://www.thriive.in/inner-child-healing">inner child healing therapy</a>,
            <a href="https://www.thriive.in/inner-child-healing">inner child healing meditation</a>,
            <a href="https://www.thriive.in/inner-child-healing">meditation to heal inner child</a>
        </li><br>
        <li><b>Hypnotherapy: </b>
            <a href="https://www.thriive.in/hypnotherapy">best hypnotherapist in india</a>,
            <a href="https://www.thriive.in/hypnotherapy">hypnotherapy in india</a>
        </li><br>
        <li><b>Sex Therapy: </b>
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist">sex therapist near me</a>,
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist">online sex therapy</a>
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist">sex therapy counselling</a>,
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist">sex therapy in hindi</a>
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist">online couples sex therapy</a>,
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist">sex therapy for married couples</a>
        </li><br>
        <li><b>Emotional Freedom Technique: </b>
            <a href="https://www.thriive.in/emotional-freedom-technique-eft">emotional freedom technique</a>,
            <a href="https://www.thriive.in/emotional-freedom-technique-eft">eft tapping therapy</a>,
            <a href="https://www.thriive.in/emotional-freedom-technique-eft">emotional therapy techniques</a>,
            <a href="https://www.thriive.in/emotional-freedom-technique-eft">emotional freedom technique in hindi</a>,
            <a href="https://www.thriive.in/emotional-freedom-technique-eft">emotional freedom technique therapy</a>,
            <a href="https://www.thriive.in/emotional-freedom-technique-eft">emotional freedom technique tapping therapy</a>
        </li>   <br>
        <li><b>Life coach: </b>
            <a href="https://www.thriive.in/talk-to-best-life-coach-online">best life coach in india</a>,
            <a href="https://www.thriive.in/talk-to-best-life-coach-online"> life coach therapist</a>,
            <a href="https://www.thriive.in/talk-to-best-life-coach-online">life counseling</a>,
            <a href="https://www.thriive.in/talk-to-best-life-coach-online">best life counseling</a>,
            <a href="https://www.thriive.in/talk-to-best-life-coach-online">best life counseling and coaching</a>,
            <a href="https://www.thriive.in/talk-to-best-life-coach-online">life coach counseling</a>
        </li>   <br>
        <li><b>Counselling: </b>
            <a href="https://www.thriive.in/counseling">online counseling</a>,
            <a href="https://www.thriive.in/counseling">online counselling india</a>,
            <a href="https://www.thriive.in/counseling"> online psychological counselling</a>,
            <a href="https://www.thriive.in/counseling">counseling therapist near me</a>
        </li> <br>        
        <li><b>Tarot Reading: </b>
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free tarot reading online accurate</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free online tarot card reading</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free online tarot reading</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free instant tarot reading</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free tarot card reading in hindi</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free tarot card reading prediction</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">live tarot reading for free</a>,
            <a href="https://www.thriive.in/free-online-tarot-card-reading">free online powerful accurate tarot card reading</a>
        </li>                                
    </ul>


</div>

</div>


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


