<?php /* Template Name: New sex therapy landing page */ 
include_once get_stylesheet_directory().'/new-header.php'; 
global $wp;
$current_url = add_query_arg( array(), $wp->request ); ?>

 <style>
        body{
            color: unset !important;
        }
		.banner{
			width: 100%;
			margin: 0 auto;
		}
		.conimg{
			width:100px;
			height:100px;
		}
		.meetexperts + .btn-expretwrap .btnexpertsmore{
			width: 150px !important;
			padding:10px !important;
		}
		.och1title{color: #333333 !important; text-align:left;margin-top: 18px;font-weight: 500;font-size:24px;text-align: center;}
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
    text-align: center;
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

#topReaders { 
  margin-top: 10px;
  display: block; 
}

.maillist{list-style: disc outside none;
    display: list-item;
    margin-left: 25px;
	}

		
@media only screen and (max-width: 767px) and (min-width: 320px) {
        .img-responsive{
            max-width: 100% !important;
        }
		.wdgt-head1{
			font-size:22px;
		}
		.conimg{
			width:50px;
			height:50px;
		}
		.ythc{
			font-size:18px !important;
		}
		.ythcdesc{
			font-size:14px !important;	
		}
		.och1title{color: #333333 !important; text-align:left;margin-top: 40px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important;text-align: center;}
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
</style>

<div class="container">
	<div class="row">
	<h1 class="hpctitle" style="margin-bottom: -18px;margin-top: 15px; font-size: 24px;">Sex Therapy</h1>
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
				<a href="https://www.thriive.in/consult-sex-therapist-by-book-appointment">
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
		<div class="col-md-12 col-xs-12">
			<h2 class="wdgt-head1 mt-2 mb-1 text-center">Let’s Talk About Sex</h2>
			<p style="text-align: justify;">Did you know that half of the world’s population experiences sexual issues at some point in their lives? Yet, it’s still a taboo topic, and seeking help can be embarrassing. Here at Thriive, we bust the myth and mystery around sex therapy by making certified sex therapists accessible, private, and confidential. In addition, every therapist is a verified expert in their field.</p>

			<p style="text-align: justify;">If you’re looking to improve your sex life, look no further.</p>
		</div>
		<div class="col-md-12 col-xs-12">
			<h2 class="wdgt-head1 mt-2 mb-1 text-center">What Is Sex Therapy?</h2>
			<p style="text-align: justify;">Sex therapy is therapy with a certified sex therapist that can help you solve issues with your sexual health due to either mental, emotional, or physical problems.</p>
				<p>Sex Therapy Can Help Individuals With:</p>
				<ul class="ftncul">
				<li class="ftncli ">Low libido, low to no desire for intimacy,</li>
				<li class="ftncli ">Emotional detachment when it comes to sex, sexual problems,</li>
				<li class="ftncli ">Improper sexual functions, erectile dysfunction treatment, other sexual health conditions,</li>
				<li class="ftncli ">Understanding their sexuality and how to take care of themselves.</li>
				</ul>
				
				<p>Sex Therapy Can Help Couples:</p>
				<ul class="ftncul">
				<li class="ftncli ">Rectify physical, emotional or mental health reasons affecting their sex life,</li>
				<li class="ftncli ">Understand the blocks affecting their sexual health, erectile dysfunction cure, </li>
				<li class="ftncli ">Experience greater sexual intimacy and joy,</li>
				<li class="ftncli ">Understand their sexuality and how to take care of themselves.</li>
				</ul>
				<!--<a href="https://www.thriive.in/consult-top-sex-therapists-online"><button class="btnConsult">Consult Now</button></a>-->
				<div class="row">
				<div class="seprator mb-3">
				<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
				</div>
				</div>		
		</div>


<div class="container">
		<div class="row">
			<section id="breathing_accordion_block" class="widgetblock">
				<h2 class="wdgt-head text-center" style="margin-top: 35px !important;">How Therapy Works On Thriive</h2>
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
							<div class="seprator mb-3">
				<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
				</div>
		</div>
</div>			
	



  
    <section id="topReaders" class="widgetblock">
      <h2 class="wdgt-head text-center">Our Top Therapists</h2>
      <?php if(have_rows('therapist_data', 'option')):
                while(have_rows('therapist_data', 'option')): the_row();
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
				"SELECT DISTINCT p.ID,p.post_author FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($ids)"
			);

			// Loop Start
			if($getPost) : ?>
				<section class="topreadingList">
                    <?php $tempArr = $available = $busy = array();
                    foreach ( $getPost as $posts ) {
                        $post = get_post($posts->ID);
                     /*    $status = getTherapistStatus($post->ID);
                        if($status == "Available"){
                            array_push($available,$posts->ID);
                        } 
						if($status == "Busy"){
                                array_push($busy,$posts->ID);
                            } */
                        $getid = $wpdb->get_row("SELECT * FROM therapist_availability_status WHERE tid = '".$posts->post_author ."' AND availability_status != 4");
						if($getid){
							array_push($available,$posts->ID);
						}                          
                    }
					
                    $tempArr = array_merge($available,$busy);
					$tempArr = assoc_array_shuffle($tempArr);
                    foreach($tempArr as $t){
                        $post = get_post($t);
						setup_postdata( $post );
                        set_query_var('therapy',array('sex-therapist'));
                        get_template_part( 'template-parts/therapist-content');
                    }
                    wp_reset_postdata(); ?>		
				</section>
			<?php endif; ?>
      <!--<p class="text-center ">
        <a href="https://www.thriive.in/talk-to-astrologer-online" class="readmore">View more <img src="<?php //echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-readMore.png'; ?>" alt=""></a>
      </p>-->
    </section>
  
		<!--<div class="text-center">
			<h3 class="yth">Why Thriive?</h3>
			<div class="col-md-12 col-xs-12">
				<img alt="" class="img-responsive conimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Sex-Therapy-Landing-Page-Banner-Confidential.svg'; ?>"/>
				<h4 class="ythc">Confidential</h4>
				<p class="ythcdesc">All your information is totally private and confidential. Stay anonymous throughout the consultation.</p>
			</div>
			<div class="col-md-12 col-xs-12">
				<img alt="" class="img-responsive conimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Sex-Therapy-Landing-Page-Banner-Credible.svg'; ?>"/>
				<h4 class="ythc">Credible</h4>
				<p class="ythcdesc">We are not a listing platform. We've pulled together the best sex counsellor and specialists out there to help you</p>
			</div>
			<div class="col-md-12 col-xs-12">
				<img alt="" class="img-responsive conimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Sex-Therapy-Landing-Page-Banner-Compassionate.svg'; ?>"/>
				<h4 class="ythc">Compassionate</h4>
				<p class="ythcdesc">Every problem is unique. Our counsellor are never dismissive of your situation.</p>
			</div>
		</div>-->

		
	</div>
</div>


<div class="container">

    
     <!-- <div class="row">
        <section class="widgetblock">
          <h2 class="wdgt-head mt-2 mb-1 text-center">Meet our Experts</h2>
          <section class="meetexperts">
            <a href="#"><img src="https://www.thriive.in/wp-content/uploads/2020/10/nellu-expert.jpg" alt="" class="wrap"></a>
            <a href="#"><img src="https://www.thriive.in/wp-content/uploads/2020/10/ujwal-expert.jpg" alt="" class="wrap"></a>
            <a href="#"><img src="https://www.thriive.in/wp-content/uploads/2020/10/Naseem-expert.jpg" alt="" class="wrap"></a>
            <a href="#"><img src="https://www.thriive.in/wp-content/uploads/2020/10/aarti-expert.jpg" alt="" class="wrap"></a>
          </section>
          <div class="btn-expretwrap">
            <a href="https://www.thriive.in/consult-top-sex-therapists-online" class="btnexpertsmore">Consult Now</a>
          </div>
        </section>
      </div>
    <div class="row">
      <div class="seprator mb-3">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
      </div>
    </div>-->
  
  <div class="row">
    <section id="testimonials" class="widgetblock">
      <h2 class="wdgt-head text-center" style="margin-top: 35px;">Sucess Stories</h2>
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
            <section class="widgetblock">
                <div class="col-xs-4 col-md-4">
                    <p class="text-center f_28 text-center c_green mb-0">100000+</p>
                    <p class="rating_text f_12 text-center">Happy Users</p>
                </div>
                <div class="col-xs-4 col-md-4">
                    <p class="text-center f_28 text-center c_green mb-0">4.5/5 </p>
                    <p class="rating_text f_12 text-center">Google Rating</p>
                </div>
                <div class="col-xs-4 col-md-4">
                    <p class="text-center f_28 text-center c_green mb-0">4.9/5</p>
                    <p class="rating_text f_12 text-center">Facebook Rating</p>
                </div>
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
    
	</div>
</div>
<script>
function filtertherapy(){
	var mins = $(".chkmins:checked");
	var therapy_id =  $( "#selecttherapy" ).val();
	var joi=',';
	var fields = mins.serializeArray();
	var procvalue='';
	jQuery.each(fields, function(i, field){
		//alert(field.value);
		if(i>0){
			procvalue= procvalue+joi+field.value;
		} else {
			procvalue=procvalue+field.value ;
		}
	});
		
	var cost = $("#cost").val();
	$.ajax({ 
		
        url: myajax.ajax_url,
        type: 'POST',
        data: {'action': 'filtertherapy','mins': procvalue,'cost': cost,'therapy_id': therapy_id},
        success: function (data) { //alert(data);
			$('#therapyres').html(data);
        }
      }); 
}

</script>

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