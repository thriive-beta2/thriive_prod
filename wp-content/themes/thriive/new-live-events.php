<?php /* Template Name: New Live Event Page */ 
include_once get_stylesheet_directory().'/new-header.php'; ?>
<style>
	imgs {
  		float: left;
	}
</style>
<div class="container">
	<div class="row"> 
		<div class="col-md-12 col-xs-12">
			<section class="all_slider_Therapists news_feed_contect">
				<h1 class="text-center" style="font-size:22px !important;color: #27265f;font-family: 'Work Sans', sans-serif;">Upcoming Free Live Sessions</h1>
				<div class="col-md-12 col-xs-12 text-center" style="margin-bottom:2%;">
					<img style="max-width:100%" src="https://www.thriive.in/wp-content/uploads/2020/10/Step-Indicator-Zoom-Session-Mobile-New.jpg">
				</div>
				<section class="" style="margin-top:2%" id="event_page">
					<div>
						<?php $i = 0; 
						$current_date = date('d/m/Y');
						$current_time = date('h:i a');
						$current_user = wp_get_current_user();
						while(have_rows('custom_shreans_events')) : the_row();?>
							<div class="col-md-6 col-xs-12" style="margin-bottom:6%;">
								<div class="" style="padding:0px;">
									<p><img class="imgs" src="<?php the_sub_field('event_image')?>" alt="" style="width:100%;"/></p>
								</div>
								<div class="">
									<p style="font-size: 16px;margin-bottom: 5px;font-weight: 600;font-family: open sans, sans-serif;"><?php the_sub_field('event_title')?></p>
									<p style="font-size: 14px;font-weight: 400;font-family: open sans, sans-serif;margin-bottom: 5px;"><i class="fa fa-calendar"></i> <?php the_sub_field('event_date')?> &nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_sub_field('event_time'); if(get_sub_field('end_time')){echo " to "; the_sub_field('end_time');} ?></p>
									<!--<p style="font-size: 14px;font-weight: 400;font-family: open sans, sans-serif;margin-bottom: 5px;"><?php the_sub_field('event_time')?></p>-->
									<?php $result = geteventtext(get_sub_field('event_title'),$current_user->ID); 
									if(!is_user_logged_in()){ ?>
										<div class="text-center">
											<input type="hidden" id="event_title_<?php echo $i; ?>" value="<?php the_sub_field('event_title')?>">
											<button class="regter btn btnConsult text-center" data-position="<?php echo $i; ?>">Register</button>
										</div>
									<?php }
									if(is_user_logged_in() && empty($result)){ ?>
										<div class="text-center">
											<input type="hidden" class="uid" value="<?php echo $current_user->ID; ?>">
											<input type="hidden" id="event_title_<?php echo $i; ?>" value="<?php the_sub_field('event_title')?>">
											<button class="event_login btn btnConsult text-center" data-position="<?php echo $i; ?>">Register</button>
										</div>
									<?php }
									if (is_user_logged_in() && !empty($result)){ 
										if($current_date == get_sub_field('event_date') && ($current_time >= get_sub_field('event_time') && $current_time <= get_sub_field('end_time')) ){ ?>
												<div class="text-center">
													<button id="zomink" class="btn btnConsult text-center" ><a style="color:#fff;" target="_blank" href="<?php the_sub_field('zoom_link') ?>">Zoom Link</a></button>
												</div>
										<?php } else { ?>
											<div class="text-center">
												<p style="font-weight: bold; color: red; font-family: Segoe UI; line-height: 1.36;" id="error_<?php echo $i; ?>"></p>
												<button class="nozomink btn btnConsult text-center" data-position="<?php echo $i; ?>">Zoom Link</button>
												<!-- <button class="btn btn-primary text-center">Event Ended</button> -->
											</div>
										<?php }
									} ?>
									<!--<button class="btn btn-primary"" target="_blank" style="display:none;color:#fff;"><a href="<?php the_sub_field('youtube_link') ?>">Youtube Link</a></button>-->
								</div>
							</div>
							<?php $i++;
						endwhile;?>
					</div>
				</section>
			</section>
		</div>
	</div>
	  <div class="seprator mb-3">
  	<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>

	<div class="ask-ques">
		<h2>Ask a question</h2>
		<p>To our expert Tarot Card Reader</p>
		<button class="btnConsult" style="margin-bottom: 1rem;" onclick="window.open('https://www.thriive.in/talk-to-best-tarot-card-reader-online?utm_source=live-page');">Consult Now</button>
	</div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>