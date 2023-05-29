<?php /* Template Name: Seeker Register for Shreans Daga  */ 
get_header(); ?>
<style>
	imgs {
  		float: left;
	}
</style>
<div class="container">
	<div class="row"> 
		<div class="col-md-12 col-xs-12">
			<section class="all_slider_Therapists news_feed_contect">
				<h1 class="text-center" style="font-size:22px !important">Upcoming Free Live Sessions</h1>
				<div class="col-md-12 col-xs-12 text-center" style="margin-bottom:2%;">
					<img src="https://www.thriive.in/wp-content/uploads/2020/09/Step-Indicator-Zoom-Session_Mobile-1.jpg">
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
											<button class="regter btn btn-primary text-center" data-position="<?php echo $i; ?>">Register</button>
										</div>
									<?php }
									if(is_user_logged_in() && empty($result)){ ?>
										<div class="text-center">
											<input type="hidden" class="uid" value="<?php echo $current_user->ID; ?>">
											<input type="hidden" id="event_title_<?php echo $i; ?>" value="<?php the_sub_field('event_title')?>">
											<button class="event_login btn btn-primary text-center" data-position="<?php echo $i; ?>">Register</button>
										</div>
									<?php }
									if (is_user_logged_in() && !empty($result)){ 
										if($current_date == get_sub_field('event_date') && ($current_time >= get_sub_field('event_time') && $current_time <= get_sub_field('end_time')) ){ ?>
												<div class="text-center">
													<button id="zomink" class="btn btn-primary text-center" ><a style="color:#fff;" target="_blank" href="<?php the_sub_field('zoom_link') ?>">Zoom Link</a></button>
												</div>
										<?php } else { ?>
											<div class="text-center">
												<p style="font-weight: bold; color: red; font-family: Segoe UI; line-height: 1.36;" id="error_<?php echo $i; ?>"></p>
												<button class="nozomink btn btn-primary text-center" data-position="<?php echo $i; ?>">Zoom Link</button>
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
</div>
<!-- Modal -->
<div class="modal fade" id="regter_modal" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
    	<div class="modal-content">
	    	<div class="modal-header" style="border-bottom: 0px;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        		<span aria-hidden="true" style="font-size: 33px;">&times;</span>
	        	</button>
	      	</div>
      		<div class="modal-body text-center">
	  			<?php set_query_var( 'column', 'col-sm-8 col-12');
		  			set_query_var( 'text_left', 'text-left');
		  			get_template_part( 'template-parts/event-signup-modal'); ?>	  	
      		</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	$(".regter").on('click', function(){
		var position = $(this).attr('data-position');
		$("#lead_source").val($("#event_title_"+position).val());
		$("#event_position").val(position);
		$("#regter_modal").modal('show');
	});
	$(".nozomink").on('click',function(){
		var position = $(this).attr('data-position');
		$("#error_"+position).text('The link will be made available once the event starts.');
	});
	$('.event_login').on('click',function(){
		var position = $(this).attr('data-position');
		var uid = $('.uid').val();
		$.ajax({
	       	url: ajax_object.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'register_for_event', 'position': position, 'uid': uid},
	       	success: function (data) {
	       		$('#event_page').load(' #event_page');
	       	}
	    });
	});
</script>
<?php get_footer(); ?>