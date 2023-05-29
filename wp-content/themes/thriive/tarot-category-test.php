<?php /* Template Name: Tarot Category Test */ 
include_once get_stylesheet_directory().'/new-header.php';
 
global $wp;
global $wpdb;
//$current_url = add_query_arg( array(), $wp->request ); 
/* echo $sql = "SELECT DISTINCT(uid) as uid FROM online_consultation WHERE 1 LIMIT 0,10000";
$result = $wpdb->get_results($sql,OBJECT);
	$paytxarr = array();
    foreach ( $result as $r ) {
		echo "SELECT COUNT(*) FROM user_session_taken WHERE uid = '".$r->uid ."'";
		$chkuser = $wpdb->get_var("SELECT COUNT(*) FROM user_session_taken WHERE uid = '".$r->uid ."'");
		$sesscnt = $wpdb->get_var("SELECT COUNT(DISTINCT(payment_txnid)) FROM online_consultation WHERE uid = '".$r->uid ."' AND payment_status = 'success'");
		if($chkuser == 0){
			echo "INSERT INTO user_session_taken (uid,session_taken,created_date) VALUES ('".$r->uid."','".$sesscnt."',NOW())";
			$wpdb->query("INSERT INTO user_session_taken (uid,session_taken,created_date) VALUES ('".$r->uid."','".$sesscnt."',NOW())");
		}  else {
			$updatecnt = $sesscnt + $chkuser;
			$wpdb->query("UPDATE user_session_taken SET session_taken = '".$updatecnt."' WHERE  uid = '".$r->uid."'");
			
		}	
	}
	exit(); */ 
?>

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
    margin-left: 35px;
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
    margin-left: 35px;
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


.banner_50{
  margin-top: 10px;
  margin-bottom: 10px;
  border-radius: 10px;
  width:100%;
}

.banner_50 img{
}
.inner_img{
  background-image: url("https://www.thriive.in/wp-content/uploads/2022/02/thriive-web-banner_1920.jpg");
  width: 100%;
  height:180px;
      background-position: center;
    background-repeat: no-repeat;
    margin: 0 auto;
    border-radius: 10px;
}


@media (min-width: 320px) and (max-width: 640px) {

.dexktop_price{
	background-color: #fff;
	padding:15px;
	z-index:9;
}

.banner_50{
  margin-top: -20px;
  margin-bottom: 10px;
  border-radius: 10px;
  width:100%;
}

.banner_50 img{
}
.inner_img{
  background-image: url("https://www.thriive.in/wp-content/uploads/2022/02/thriive-web-banner_480x50-1.jpg");
  width: 97%;
  height:50px;
      background-position: center;
    background-repeat: no-repeat;
    margin: 0 auto;
    border-radius: 10px;
    background-size: cover;
}

.hpfeatsec {
    
    padding: 0px 0px;
    margin-bottom: 0px;
    margin-left: 0px;
}

.featsec {
    margin-left: 0px;
}

}

</style>

<div class="container">
	<div class="row">
	<h1 class="hpctitle" style="margin-bottom: 15px;margin-top: -20px;">Instant Online Tarot Reading</h1>
		<!--<div class="col-md-12 col-xs-12 featsec">
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
				<p class="isnt">Tarot By<br>Appointment</p>
				<p class="cnc cncb">Book Now!</p>
				<p class="isntct pints">₹ 699</p>
				<img class="intimg" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Thriive-Tarot-Page-02.png';?>">
				</a>
			</div>
		</div>-->

	</div>  
</div>	



<!--<div class="container text-center banner_50" style="">
<div class="inner_img">
  

</div>
</div>-->

  <div class="row">
	<!--<div class="col-md-12 col-xs-12" style="display:none">
		<p style="font-size:15px;margin-left:5px;text-align:center;">* User(s) Outside India please use Tarot By Appointment </p>
	</div>-->
    <!--<div class="seprator mb-3">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>-->
  </div>
   <section class="container dexktop_price">
		<!--<h2 class="och1title" ><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Select Reader Category  <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h2>-->
	

<style type="text/css">
		.therapist_catagories{
			width: 100%;
		    display: flex;
		    justify-content: space-evenly;
		   /*  padding-top: 18px; */
		    /*margin: 18px 0px;*/
		}
		.therapist_catagories img{
			display: block;
			width:20%;
		    border-radius: 7px 7px 0 0;

		}
		#therapist_catagory{
			display: block;
		    width: 20%;
		    height: 4rem;
		    border-radius: 22px;
		}
		.available_prices{
			display: flex;
		    justify-content: space-evenly;
		    margin-top: 0px;
		    padding-top: 24px;
		    text-align: center;
		    border: solid #1858A3;
		    /*background-color: rgba(24,88,163,0.08);*/
		    border-radius: 5px;

		}
		.individual_price{
			display: block;
		    font-size: 28px;
		    color: #1556A4;
		    font-weight: 500;
		    min-width: 120px;
		}
		.individual_price span{
			color: #1556A4;
		}
		.individual_price p{
			display: block;
		    font-size: 17px;
		    color: #727274;
		}
		.horizontal_line{
			border-right: solid 2px #AFAFB0;
		    margin-top: -7px;
		    height: 60px;
		}
		.aside_border_gold{
			border: 2px solid #1858A3 !important;
		}
		.aside_border_silver{
			border: 2px solid #29A6DE !important;
		}
		.r-type{
			display: none;
		}
@media screen and (max-width:767px) and (min-width:320px){
			.therapist_catagories{
			width: 100%;
		    display: flex;
		    justify-content: space-evenly;
		    margin: 0px;
		}
		.therapist_catagories img{
			display: block;
		    width: 50%;
		    height: 50px;
		    border-radius: 7px 7px 0 0;
		    border-bottom: none;

		}

		.therapist_catagories:first-child{
			border-right: none;
		}
		.therapist_catagories:last-child{
			border-left:none;
		}
/*		.therapist_catagories img:hover{
			outline: solid 2px #1559A5;
		}*/
		#therapist_catagory{
			display: block;
		    width: 20%;
		    height: 4rem;
		    border-radius: 22px;
		}
		.available_prices{
			display: flex;
		    justify-content: space-evenly;
		    margin-top: 0px;
		    padding-top: 12px;
		    text-align: center;
		    margin-bottom: -10px;
		    border-radius: 0 0 5px 5px;

		}

		.available_prices p{
			margin-bottom: 5px;

		}
		.individual_price{
			display: block;
		    font-size: 16px;
		    color: #1556A4;
		    font-weight: 500;
		    min-width: 0px;
		}
		.individual_price span{
			color: #27265F;
		}
		.individual_price p{
			display: block;
		    font-size: 14px;
		    color: #727274;
		}
		.horizontal_line{
			border-right: solid 2px #AFAFB0;
			height: 2.6rem;
		}
		.topreadingList aside {
			border-radius: 5px !important;
			position: relative;
		}
		.topreadingList{
			padding:0 15px !important;
		}

		.topreadingList .clickgroup {
		    display: flex;
		    justify-content: center;
		    margin-left: 15px !important;
		    margin-right: -35px;
		}
		.topreadingList figure figcaption .r-exp {
		    font-size: 14px;
		    position: absolute;
		    left: 15px;
		    width: 80px;
		    top: 85px;
		    text-align: center;
		    font-weight: 500;
		}
}
</style>
	<div class="therapist_catagories">
		<img src="/wp-content/themes/thriive/assets/images/Reader page Buttons-01-U.svg?v=1.1" onclick="readerlist(1);" id='silver' class="pack" style="border: 1px solid #29A6DE;border-bottom: none;">
		<img src="/wp-content/themes/thriive/assets/images/Reader page Buttons-02-S.svg?v=1.4"  onclick="readerlist(2);" id='gold' class="pack" style="border: 1px solid #1858A3;border-bottom: none;">
		<!--<img src="/wp-content/themes/thriive/assets/images/Reader page Buttons-03-U.svg?v=1.1" onclick="readerlist(3);" id="platinum" class="pack" style="border: 1px solid #985396;border-bottom: none;">-->
	</div>

	<div class="available_prices">
		<div class="individual_price"><span>₹149/-</span><br><p>3 Mins</p></div>
		<div class="horizontal_line"></div>
		<div class="individual_price"><span>₹299/-</span><br><p>10 Mins</p></div>
		<div class="horizontal_line"></div>
		<div class="individual_price"><span>₹599/-</span><br><p>20 Mins</p></div>
		<div class="horizontal_line"></div>
		<div class="individual_price"><span>₹899/-</span><br><p>30 Mins</p></div>
	</div>




	</section>

	
<header class="therapist_list">
		<div class="banner-home">
			
				<div class="container">			
					 <div class="row" id="topreadingList">
						<div class="seprator my-2">
							<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
						</div>
						<div class="seprator my-2">
							<img src="<?php echo get_template_directory_uri() .'/assets/images/loader.gif'; ?>" id="tarotloader" style="display:none;width:125px;"/>
						</div>	
						<input type="hidden" id="newcategory" value="2"/> 
						<div id="readerlist">	
							
						</div>
					  </div>
						
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
<script>

function change_catagory_images(catagory){
	if(catagory == 'silver'){
		$('#silver').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-01-S.svg?v=1.1');
		$('#gold').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-02-U.svg?v=1.1');
		$('#platinum').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-03-U.svg?v=1.1');
		change_catagory_images_background_border('silver');
	}else if(catagory == 'gold'){		
		$('#silver').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-01-U.svg?v=1.1');
		$('#gold').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-02-S.svg?v=1.4');
		$('#platinum').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-03-U.svg?v=1.1');
		change_catagory_images_background_border('gold');
	}else if(catagory == 'platinum'){
		$('#silver').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-01-U.svg?v=1.1');
		$('#gold').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-02-U.svg?v=1.1');
		$('#platinum').attr('src', '/wp-content/themes/thriive/assets/images/Reader page Buttons-03-S.svg?v=1.1');
		change_catagory_images_background_border('platinum');		
	}
}

function change_catagory_images_background_border(catagory){
	let catagory_images = document.querySelectorAll('.therapist_catagories img');
	if(catagory == 'silver'){
		catagory_images[0].style.backgroundColor = '#29A6DE';
		catagory_images[1].style.backgroundColor = 'unset';
		//catagory_images[2].style.backgroundColor = 'unset';
		change_prices_border('silver');
		if(check_screen_width() < 767){
		remove_catagory_images_border_respectively('silver');
		}	
	}else if(catagory == 'gold'){		
		catagory_images[0].style.backgroundColor = 'unset';
		catagory_images[1].style.backgroundColor = '#1858A3';
		//catagory_images[2].style.backgroundColor = 'unset';
		change_prices_border('gold');
		if(check_screen_width() < 767){
		remove_catagory_images_border_respectively('gold');}
	}else if(catagory == 'platinum'){
		catagory_images[0].style.backgroundColor = 'unset';
		catagory_images[1].style.backgroundColor = 'unset';
		//catagory_images[2].style.backgroundColor = '#9F579D';
		change_prices_border('platinum');	
		if(check_screen_width() < 767){
		remove_catagory_images_border_respectively('platinum');}
	}

}

function remove_catagory_images_border_respectively(catagory){
	let catagory_images = document.querySelectorAll('.therapist_catagories img');
	if(catagory == 'silver'){
		catagory_images[0].style.borderRight = '1px solid #29A6DE';
		catagory_images[1].style.borderLeft = 'none';
		catagory_images[1].style.borderRight = '1px solid #1858A3';
		//catagory_images[2].style.borderLeft = 'none';
		//catagory_images[2].style.borderBottomRightRadius = 'none';
		change_prices_border('silver');
	}else if(catagory == 'gold'){		
		catagory_images[0].style.borderRight = 'none';
		catagory_images[1].style.border = 'solid 1px #1858A3';
		catagory_images[1].style.borderBottom = 'none';
		//catagory_images[2].style.borderLeft = 'none';
		change_prices_border('gold');
	}else if(catagory == 'platinum'){
		catagory_images[0].style.borderRight = 'none';
		catagory_images[1].style.borderLeft = '1px solid #1858A3';
		catagory_images[1].style.borderRight = 'none';
		//catagory_images[2].style.borderLeft = '1px solid #9F579D';
		change_prices_border('platinum');	
	}
}

function change_prices_border(catagory){
	let catagory_prices_container = document.querySelector('.available_prices');
	if(catagory == 'silver'){
		catagory_prices_container.style.border = '2px solid #29A6DE';
		catagory_prices_container.style.borderTopLeftRadius = '0';
		catagory_prices_container.style.borderTopRightRadius = '5px solid #29A6DE';
		change_prices_background_color('silver');
	}else if(catagory == 'gold'){		
		catagory_prices_container.style.border = '2px solid #1858A3';
		catagory_prices_container.style.borderTopLeftRadius = '5px solid #1858A3';
		catagory_prices_container.style.borderTopRightRadius = '5px solid #1858A3';
		change_prices_background_color('gold');
	}else if(catagory == 'platinum'){
		catagory_prices_container.style.border = '2px solid #985396';
		catagory_prices_container.style.borderTopRightRadius = '0';
		catagory_prices_container.style.borderTopLeftRadius = '5px solid #985396';	
		change_prices_background_color('platinum');
	}
}

function change_prices_background_color(catagory){
	/*
	let	catagory_prices_container = document.querySelector('.available_prices');
	if(catagory == 'silver'){
		catagory_prices_container.style.backgroundColor = 'rgba(41,166,222,0.05)';
	}else if(catagory == 'gold'){		
		catagory_prices_container.style.backgroundColor = 'rgba(24,88,163,0.05)';
	}else if(catagory == 'platinum'){
		catagory_prices_container.style.backgroundColor = 'rgba(152,83,150,0.05)';	
	}
	*/
}

function change_catagory_prices(catagory){
	if(catagory == 'silver'){
		document.querySelectorAll('.individual_price')[0].children[0].innerText = '₹99/-';
		document.querySelectorAll('.individual_price')[1].children[0].innerText = '₹199/-';
		document.querySelectorAll('.individual_price')[2].children[0].innerText = '₹399/-';
		document.querySelectorAll('.individual_price')[3].children[0].innerText = '₹599/-';		
	}else if(catagory == 'gold'){		
		document.querySelectorAll('.individual_price')[0].children[0].innerText = '₹149/-';
		document.querySelectorAll('.individual_price')[1].children[0].innerText = '₹299/-';
		document.querySelectorAll('.individual_price')[2].children[0].innerText = '₹599/-';
		document.querySelectorAll('.individual_price')[3].children[0].innerText = '₹899/-';
	}else if(catagory == 'platinum'){
		document.querySelectorAll('.individual_price')[0].children[0].innerText = '₹199/-';
		document.querySelectorAll('.individual_price')[1].children[0].innerText = '₹399/-';
		document.querySelectorAll('.individual_price')[2].children[0].innerText = '₹799/-';
		document.querySelectorAll('.individual_price')[3].children[0].innerText = '₹1199/-';		
	}
}

function change_therapist_dialogue_border(catagory = 'gold'){

	//This work is now being done inside therapist-content.php

}

function check_screen_width(){
	let ScreenWidth = screen.width;
	return ScreenWidth;
}

</script>

<script>
//var newcategory = $('#newcategory').val();
//if(newcategory == 0){
	
	readerlist(1);
//}
function readerlist(tab){
	var currentRequest = null;    
	$('#tarotloader').show();
	$('#readerlist').html('');
	$('.modal-backdrop.show').css('display','none');
	currentRequest = $.ajax({ 
	
		url: '<?php echo site_url();?>/therapy-categorywise-page',
		type: 'POST',
		dataType : 'html',
		data: {'tab': tab},
		beforeSend : function() {           
			
			if(currentRequest != null) {
				currentRequest.abort();
			}
		},
		success: function (data) {
			$('#tarotloader').hide();
			$('#readerlist').html(data);
			var newcategory1 = $('#newcategory').val();
			//alert(newcategory1);
			$('#newcategory').val(newcategory1);
		}
	}); 
	if(tab == 1){	
		change_catagory_images('silver');
		change_catagory_prices('silver');
		change_therapist_dialogue_border('silver');
		
	}
	if(tab == 2){	
		change_catagory_images('gold');
		change_catagory_prices('gold');
		change_therapist_dialogue_border('gold');
	}
	
}
</script>
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


include_once get_stylesheet_directory().'/new-footer.php';
?>


