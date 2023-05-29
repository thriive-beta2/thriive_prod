<?php /* Template Name: New Tarot card online consultation page */ 
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

<div class="container">
	<div class="row">
	<h1 class="hpctitle" style="margin-bottom: -18px;margin-top: -20px;">Tarot Card Reading</h1>
		<div class="col-md-12 col-xs-12 featsec">
			<div class="col-md-6 col-xs-6 featsec1 featleft">
				<a href="#topreadingList">
				<p class="isnt">Instant <br>Tarot Reading</p>	
				<p class="cnc">Call/Chat Now!</p>
				<p class="isntct">₹ 99</p>
				<img class="intimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Thriive-Tarot-Page-03.png';?>">
				</a>
			</div>

			<div class="col-md-6 col-xs-6 featsec1 featright">
				<a href="https://www.thriive.in/book-tarot-reading-by-appointment">
				<p class="isnt">Premium <br>Tarot Reading</p>
				<p class="cnc cncb">Book Now!</p>
				<p class="isntct pints">₹ 999</p>
				<img class="intimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Thriive-Tarot-Page-02.png';?>">
				</a>
			</div>
		</div>

	</div>  
</div>	
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
			<!--<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php echo get_site_url()."/talk-to-astrologer-online"; ?>"<?php echo $current_url == 'talk-to-astrologer-online' ? 'selected': ''; ?>>Select Type of Reading</option>
                <option value="<?php echo get_site_url()."/talk-to-best-astrologer-online"; ?>" <?php echo $current_url == 'talk-to-best-astrologer-online' ? 'selected': ''; ?>>Astrology</option>
                <option value="<?php echo get_site_url()."/talk-to-best-numerologist-online"; ?>" <?php echo $current_url == 'talk-to-best-numerologist-online' ? 'selected': ''; ?>>Numerology</option>
                <option value="<?php echo get_site_url()."/talk-to-best-tarot-card-reader-online"; ?>" <?php echo $current_url == 'talk-to-best-tarot-card-reader-online' ? 'selected': ''; ?>>Tarot Card Reading</option>
                <option value="<?php echo get_site_url()."/talk-to-best-angel-card-reader-online"; ?>"<?php echo $current_url == 'talk-to-best-angel-card-reader-online' ? 'selected': ''; ?>>Angel Card Reading</option>
                <option value="<?php echo get_site_url()."/vastu"; ?>"<?php echo $current_url == 'vastu' ? 'selected': ''; ?>>vastu</option>
            </select> -->
			 <div class="row" id="topreadingList">
				<div class="seprator my-2">
					<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
				</div>
			  </div>
			<h1 class="och1title" style="margin-bottom: 10px !important;"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Consult Best Tarot Card Readers  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h1>
			
			
			<!-- fixed inhouse therapist start -->
			
			<?php
           /*  
            $static_id1 = new stdClass();
            $static_id1->ID = 71174;
            $static_id2 = new stdClass();
            $static_id2->ID = 25285;
            $static_id3 = new stdClass();
            $static_id3->ID = 30212;
            $static_id4 = new stdClass();
            $static_id4->ID = 44834;
			$static_id5 = new stdClass();
            $static_id5->ID = 46473;
			$static_id6 = new stdClass();
            $static_id6->ID = 2458;
            


            $getPost = array(
                0 => $static_id1,
                1 => $static_id2,
                2 => $static_id3,
                3 => $static_id4,
                4 => $static_id5,
                5 => $static_id6
            );
            if(have_rows('therapist_data', 'option')):
                while(have_rows('therapist_data', 'option')): the_row();
                    if('tarot-card-reading' == get_sub_field('taxonomy')->slug){
                      $ids = get_sub_field('display_ids');  
                    }
                endwhile;
            endif;
            $posts_per_page = 4;
            $start = 0;
            $paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // 
                $ids = explode(",",$ids); 
            }
            foreach($ids as $id){
                $paid_session_count = get_post_meta($id ,'paid_session_count');
                if($paid_session_count[0] > 0){
                    
                    $idsfilter[] = $id;
                }
            }   
            $idstr = implode(",",$idsfilter);
            if($getPost) : */ ?>
               <!-- <section class="topreadingList">
                    <?php /* $tempArr = $available = $busy = array();
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
                       
                        setup_postdata( $post );
                        set_query_var( 'post', $post);
						set_query_var( 'inhouse', 1);
                        set_query_var('therapy',array('tarot-card-reading'));
                        get_template_part( 'template-parts/therapist-content');
                    }
                    wp_reset_postdata(); */ ?>     
                </section>
            <?php //endif; ?>
            </div>-->
			<!-- fixed inhouse therapist end -->
			
			
			
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
            $idsfilter = array();
            if($ids != ""){
                $ids = explode(",",$ids); 
            }
            //print_r($ids);
            foreach($ids as $id){
                $paid_session_count = get_post_meta($id ,'paid_session_count',true);
				if($id == 71174 || $id== 25285 || $id== 30212 || $id== 46473){
					$idsfilter[] = $id;
				} else {
					if($paid_session_count > 0){
						$idsfilter[] = $id;
					}
				}
					
            } 
            $idstr = implode(",",$idsfilter);
			$getPost = $wpdb->get_results( 
				"SELECT DISTINCT p.ID FROM wp_posts AS p,wp_postmeta m WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($idstr)  AND m.post_id = p.ID ORDER BY m.meta_key = 'earning_ratio' ASC"
			);

			// Loop Start
			if($getPost) : ?>
				<section class="topreadingList" >
                    <?php $tempArr = $available = $busy = $eavailable = $eavailable1 = $iavailable = $ibusy = $mavailable =  array();
                    foreach ( $getPost as $posts ) {
                        $post = get_post($posts->ID);
                        $status = getTherapistStatus($post->ID);
						if($posts->ID != 71174 && $posts->ID != 25285 && $posts->ID != 30212 && $posts->ID != 46473 && $posts->ID != 10811){
							//array_push($available,$posts->ID);
							$earning_ratio = get_post_meta($posts->ID,'earning_ratio',true);
							if($status == "Available"){
								
								if($earning_ratio == 3){
									array_push($eavailable1,$posts->ID);
								} /* else {
									if($earning_ratio == 1){
										array_push($eavailable,$posts->ID);
									} else {
										array_push($available,$posts->ID);
									}
								}	  */
								
							} 
							if($status == "Busy"){
								array_push($busy,$posts->ID);
							}  
						} elseif($posts->ID != 10811) {
							array_push($inhouse,$posts->ID);
							if($status == "Available"){
								array_push($iavailable,$posts->ID);
							} 
							if($status == "Busy"){
								array_push($ibusy,$posts->ID);
							} 
						} else {
							array_push($mavailable,$posts->ID);
							
						}	                          
                    }
					//$tempArr = array_merge($busy,$mavailable);
					$tempArr = array_merge($mavailable,$available);
					$tempArr = array_merge($eavailable,$tempArr);
					$tempArr = array_merge($eavailable1,$tempArr);
                   // $tempArr = array_merge($ibusy,$tempArr);
                    $tempArr = array_merge($iavailable,$tempArr);
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
	


<div class="modal fade" id="takelater1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog " style="margin-top: 200px;" role="document">
		<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align: center;">
			
			
			<span class="packtext">	Your session is saved in your account.<br> You can log back on to use it at any convenient time.<br><button class='browse_btn session-btn'  onclick='document.getElementById("takelater1").style.display=`none`'>OK</button></span>
			
			<div class="modal-body text-center">
		  
			</div>
		</div>
	</div>
</div>
<script>
function takelater(oc_id,action){
	$("#takelater1").modal('show');
	jQuery.ajax({ 
		
		url: 'https://www.thriive.in/wp-admin/admin-ajax.php',
		type: 'POST',
		dataType : 'html',
		data: {'action': 'resetwaiting','oc_id': oc_id,'actionc': action},
		success: function (data) {
			
	
		}
	});
}
function response(oc_id,res){
	jQuery.ajax({ 
		
		url: 'https://www.thriive.in/wp-admin/admin-ajax.php',
		type: 'POST',
		dataType : 'html',
		data: {'action': 'response','oc_id': oc_id,'res': res},
		success: function (data) { alert(data);
			$('.response').prop('disabled',true);
			$('#tres').html(data);
				
	
		}
	});
}
function browse(oc_id,tid,uid,action){
	jQuery.ajax({ 
		
        url: 'https://www.thriive.in/wp-admin/admin-ajax.php',
        type: 'POST',
		dataType : 'html',
        data: {'action': 'browse','oc_id': oc_id,'tid': tid,'uid': uid,'mode': action},
        success: function (data) { 
			
			if(data == 1){
				window.location.href="/talk-to-best-tarot-card-reader-online";
			}
			
			
		}
    }); 
	
	
}	
function wait(busy_date,oc_id){
  
    var countDownDate = new Date().getTime() + 5 * 60000;
    $('#btnwait').prop('disabled',true);
    $('#btntimer').prop('disabled',true);
	$('#takelater').prop('disabled',true);
	$('#btnwait').css('background-color','#fff');;
	$('#btntimer').css('background-color','#fff');
	$('#takelater').css('background-color','#fff');	
    jQuery.ajax({ 
		
        url: 'https://www.thriive.in/wp-admin/admin-ajax.php',
        type: 'POST',
		dataType : 'html',
        data: {'action': 'savewaittime','busy_date': busy_date,'oc_id': oc_id},
        success: function (data) { 
			
		}
    }); 
  // Update the count down every 1 second
  var x = setInterval(function() {
	
    // Get today's date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
   // alert(distance);
    // Time calculations for days, hours, minutes and seconds
	 
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
   // document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    jQuery.ajax({ 
		
        url: 'https://www.thriive.in/wp-admin/admin-ajax.php',
        type: 'POST',
		dataType : 'html',
        data: {'action': 'chkrejection','oc_id': '<?php echo $oc_id; ?>'},
        success: function (data) { 
			// Output the result in an element with id="demo"
			document.getElementById("demo2").innerHTML = "";
			document.getElementById("democall").innerHTML =  "<p class='timer_text1'>Please Wait for Therapist. You will also receive an SMS once accepted . <br/><span style='color:#fec031;'>"+ minutes + "m " + seconds + "s </span></p>";
			
			  // If the count down is over, write some text 
			if (distance < 0) { //alert(data);
				if(data == 0){
					clearInterval(x);
					document.getElementById("democall").innerHTML = "<p class='timer_text1'>Therapist is not Responding.</p>";
					document.getElementById("demo2").innerHTML = "";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);		
					$('#takelater').prop('disabled',false);		
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					jQuery.ajax({ 
		
						url: 'https://www.thriive.in/wp-admin/admin-ajax.php',
						type: 'POST',
						dataType : 'html',
						data: {'action': 'resetwaiting','oc_id': '<?php echo $oc_id; ?>'},
						success: function (data) {
							
						}
					}); 	
				
				} else if(data == 1){ 
					document.getElementById("democall").innerHTML = "";
					document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Therapist has accepted the session. You will receive a Call shortly</p></div>";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);
					$('#takelater').prop('disabled',false);	
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					$('#btnwait').hide();
					$('#btntimer').hide();	
					$('#takelater').hide();	
					
				} else if(data == 2){ 
					document.getElementById("democall").innerHTML = "<p class='timer_text1'>Therapist is not Responding</p>";
					document.getElementById("demo2").innerHTML = "";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);	
					$('#takelater').prop('disabled',false);	
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					$('#btnwait').hide();
					$('#btntimer').show();
					$('#takelater').show();	
				}   
					
			} else if(data == 1){ //alert(data);
				document.getElementById("democall").innerHTML = "";
				document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Therapist has accepted the session. You will receive a Call shortly</p></div>";
				$('#btnwait').prop('disabled',false);
				$('#btntimer').prop('disabled',false);
				$('#takelater').prop('disabled',false);	
				$('#btnwait').css('background-color','#fec031');;
				$('#btntimer').css('background-color','#fec031');
				$('#takelater').css('background-color','#fec031');	
				$('#btnwait').hide();
				$('#btntimer').hide();	 
				$('#takelater').hide();	
			}else if(data == 2){ //alert(data);
				document.getElementById("democall").innerHTML = "<p class='timer_text1'>Therapist is not Responding.</p>";
				document.getElementById("demo2").innerHTML = "";
				$('#btnwait').prop('disabled',false);
				$('#btntimer').prop('disabled',false);
				$('#takelater').prop('disabled',false);	
				$('#btnwait').css('background-color','#fec031');;
				$('#btntimer').css('background-color','#fec031');
				$('#takelater').css('background-color','#fec031');		
				$('#btnwait').hide();
				$('#btntimer').show();
				$('#takelater').show();	
			}
		}
    }); 
  }, 1000);
}

/* //start reordering therapist hardcoded
function reorder_static_therapist(){

var test = document.querySelectorAll('.topreadingList aside .clickgroup input ');
var id = [test[0].id,test[3].id,test[6].id,test[9].id];
for(i=0;i<6;i++){
id[i] = id[i].split("_")[1];
}
var asides = document.querySelectorAll('.topreadingList aside');
var new_asides = [];
for(i=0;i<6;i++){
if(id[i] == '44834'){
    new_asides[0] = asides[i];
}else if(id[i] == '25285'){
    new_asides[1] = asides[i];
}else if(id[i] == '30212'){
    new_asides[2] = asides[i];
}
else if(id[i] == '71174'){
    new_asides[3] = asides[i];
}
else if(id[i] == '46473'){
    new_asides[4] = asides[i];
}
else if(id[i] == '2458'){
    new_asides[5] = asides[i];
}
}

document.querySelector('.topreadingList').innerHTML = new_asides[0].outerHTML + new_asides[1].outerHTML + new_asides[2].outerHTML + new_asides[3].outerHTML+ new_asides[4].outerHTML+ new_asides[5].outerHTML;
}

reorder_static_therapist(); */

</script>

<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>


