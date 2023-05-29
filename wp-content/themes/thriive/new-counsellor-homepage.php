<?php /* Template Name: New Counselor Home page */ ?>

<?php include_once get_stylesheet_directory().'/new-header.php'; ?>




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

<div class="container">
	<div class="row">
	<h1 class="hpctitle" style="margin-bottom: -18px;margin-top: 15px;">Online Counseling & Therapy</h1>
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
				<a href="https://www.thriive.in/consult-counselor-by-appointment">
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
    <h1 class="hpctitle">What Is Online Counseling?</h1>
    <p class="hpcdesc">Online counseling is when a certified mental health counselor, trained in various psychological methods, helps solve your issues through a combination of tools and therapy via the internet. They create a safe, non-judgemental space to help you identify, accept, and resolve mental conflict and emotional distress. <p>
    
    <p class="counheaddesc"><b>What Are the Benefits of Online Counseling?</b></p>
    <div style="clear: both;"></div>
      <div><ul>
        <li>Gain access to mental health counselors from multiple geographic locations.</li>
        <li>Avail counseling and anxiety treatment from the comfort of your home.</li>
        <li>Attend online therapy anywhere, anytime.</li>
        <li>Explore over 1000+ verified mental health professionals.</li>
      </ul></div>
        <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
  </div> 

  <h1 class="hpctitle">What Is the Difference Between Counseling and Psychotherapy</h1>
    <p class="hpcdesc">While there are many similarities between the two, mental counseling and psychotherapy have a few key differences.<br><br> Traditional therapy deals mostly with chronic physical and mental issues, often resulting from past events. Here, the expert tries to find and heal the root cause.<br><br>Counseling is when two people (the counselor and patient) work together to solve a specific problem using a combination of techniques. These issues usually are, but not limited to:<p>
    <div style="clear: both;"></div>
      <div><ul>
        <li>Stress and Fatigue</li>
        <li>Mental illness (Anxiety or Depression)</li>
        <li>Grief</li>
        <li>Loneliness</li>
        <li>Substance Abuse, Addictions, Eating Disorders and Phobias</li>
        <li>Low Confidence and Self-Esteem</li>
        <li>Negative Mindset</li>
      </ul></div>
        <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
</div>


      <h1 class="hpctitle">What Are the Different Types of Mental Counseling?</h1>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline">Individual Counseling</h2> is for resolving internal emotional, and mental issues. This includes Anger Management, Family Problems, Demotivation, Phobias, Addiction, Depression & Anxiety Treatment, and Emotional Fatigue.
	<p>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline">Teen Counseling:</h2> Teenage years are a confusing and vulnerable phase. Teenagers are navigating several new issues, most of which are emotionally and mentally draining. <br>Career Issues, Lack of Confidence, Demotivation, Lack of Clarity, Clinical Depression, Emotional Fatigue, and Childhood Trauma are a few issues that Teen Counseling can help with.
	<p>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline">Relationship Counseling</h2> helps couples develop a healthy attitude and the required skills for fostering a healthy relationship. It addresses issues such as mental and emotional incompatibility, helps couples understand what and how much they should invest in a relationship, and how to take care of themselves as a part of that unit.
	<p>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline"> Family Counseling or Family Therapy</h2>  is for dysfunctional families looking for ways to create better co-existence. During a family counseling session, the online therapist either works with the family or with individuals to identify and address personal issues. Family counseling helps all members of the family work on their confidence and well-being and understand how to be a healthy unit of a family.
	<p>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline">Marriage Counseling or Couples Therapy</h2> is meant for couples either getting married or already married. It allows the pair to understand what they should expect from their marriage and how they can create a healthy companionship. <br>Marriage Counseling is also recommended for couples dealing with cheating, intimacy and compatibility issues, communication problems, and other issues affecting their married life.
	<p>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline">Sex Therapy or Sex Counseling</h2> is for all kinds of intimacy and sexuality issues. It is meant for couples or individuals facing sexual problems such as impotence, erectile dysfunction, low libido, and confidence issues. It is also meant for individuals who are struggling to understand or accept their sexuality. 
	<p>
    <p class="hpcdesc"><h2 style="font-size: 16px;display: inline">Depression Counseling -</h2> Depression is a serious mood disorder that requires timely psychiatric counseling to help a person get over it and learn to live a healthy life. However, depression is treatable, wherein the counselor helps in identifying the triggers and teaches coping mechanisms. 
	<p>
 

    






</div>


	
	

<div class="container">

  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/New-Project-seperate.svg'; ?>" alt="">
    </div>
  </div>
  

	
  <div class="row">
    <section id="topReaders" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-4 text-center">Our Top Therapists</h2>
      <?php if(have_rows('therapist_data', 'option')):
                while(have_rows('therapist_data', 'option')): the_row();
                    if('counseling-consulting' == get_sub_field('taxonomy')->slug){
                      $ids = get_sub_field('display_ids');  
                    }
                endwhile;
            endif;

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
							//array_push($available,$posts->ID);
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
                        set_query_var('therapy',array('counseling-consulting'));
                        get_template_part( 'template-parts/therapist-content');
                    }
                    wp_reset_postdata(); ?>		
				</section>
			<?php endif; ?>
      <!--<p class="text-center ">
        <a href="https://www.thriive.in/talk-to-astrologer-online" class="readmore">View more <img src="<?php //echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-readMore.png'; ?>" alt=""></a>
      </p>-->
    </section>
  </div>

  
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
    <div class="seprator">
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