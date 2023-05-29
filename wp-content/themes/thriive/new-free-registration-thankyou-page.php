<?php /* Template Name: New Free Session Thank you page */ 
if (!is_user_logged_in()) { 
  wp_redirect('/');
  exit();
}
$current_user = wp_get_current_user();

include_once get_stylesheet_directory().'/new-header.php'; 
 ?>
<style>
		.banner{
			width: 100%;
			margin: 0 auto;
		}
</style>
			<section class="banner">
					 <div class="col-md-12" style="padding: 0px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform" <?php } ?>>
								<img alt="" class="img-responsive banner_image" src="<?php if (is_mobile()) {echo 'https://www.thriive.in/wp-content/uploads/2020/12/Select-The-Therapy-02.jpg';
				}else{echo 'https://www.thriive.in/wp-content/uploads/2020/10/Home-Page-Banner-Desktop-1280x400-1-1.jpg';}?>" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>  style="border-radius: 0px"/>

					 </div>
		</section>
<div class="container">
  	<div class="row">

<div id="freesessionthanku" style="">

			<p class="freethnk"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"></i> Thank you <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"></i> </p>
			<p class="freemsg">Thank you for registering for free trial session.</p>
			<p class="freemsg">Our team will get in touch with you shortly.</p>
		  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
  
		<div class="row">
		<section id="freeReading" class="widgetblock" style="padding:0px 35px;">
		  <h2 class="wdgt-head mt-2 mb-2 text-center">Free Online Reading</h2>
		  <section class="readinglist">
			<aside class="readingitem tarot">
			  <a href="https://www.thriive.in/free-online-tarot-card-reading">
				<figure>
				  <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot-lg.png';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot-lg.png'?> 1080w" src="" />
				  <figcaption>Pick a Tarot Card & Get Instant Reading</figcaption> 	 <i><img class="nextfree" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
				</figure>
			  </a>
			</aside>
		  </section>
		</section>
		</div>
			
		</div>

  	</div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?> 
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>