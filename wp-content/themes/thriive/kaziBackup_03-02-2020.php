<?php /* Template Name: New Home Page bk-3 */ ?>
<?php get_header(); ?>
<?php $rows = get_field('banner_section'); ?>
<div class="container mr_3_per">
    
<div class="hidden-lg hidden-md hidden-xl">
    <div class="col-md-12 col-xs-12" style="padding: 0px 0px">
        <section class="search-top">
            <div class="">
                <div class="row mt-4" style="margin-bottom: -2%;">
                    <div class="col-12 p-0">
                        <?php echo get_search_form(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div style="clear: both"></div>
    
<?php echo the_content(); ?>
</div>

<div class="container mb_5_per hidden-lg hidden-md hidden-xl">
    <div class="row">
        <div class="col-xs-6" style="padding-right: 7.5px">
            <div class="menu_s">
                <a href="https://www.thriive.in/therapist">
                    <img style="width:100%" alt="Connect With Therapist" title="Connect With Therapist" class="img-responsive" src="<?php echo get_template_directory_uri();?>/assets/images/Image-1.png" />
                </a>
            </div>
        </div>
        <div class="col-xs-6" style="padding-left: 7.5px">
            <div class="menu_s">
                <a href="https://www.thriive.in/therapies">
                    <img alt="Search Therapy" title="Search Therapy" style="width:100%" class="img-responsive" src="<?php echo get_template_directory_uri();?>/assets/images/Image-2.png" />
                </a>
            </div>
        </div>
        <div class="col-xs-6" style="padding-right: 7.5px">
            <div class="menu_s">
                <a href="https://www.thriive.in/ailments-listing">
                    <img alt="Find Cure" title="Find Cure" style="width:100%" class="img-responsive" src="<?php echo get_template_directory_uri();?>/assets/images/find-cure.png" />
                </a>
            </div>
        </div>
        <div class="col-xs-6" style="padding-left: 7.5px">
            <div class="menu_s">
                <a href="https://www.thriive.in/blog">
                    <img alt="Wellness Blog" title="Wellness Blog" style="width:100%" class="img-responsive" src="<?php echo get_template_directory_uri();?>/assets/images/wellness-blogs.png" />
                </a>
            </div>
        </div>
        
    </div>
</div>
<div class="m-3 divider mt_2_per divider_therapist"></div>
<div style="clear: both !important"></div>

<div class="container search-result-wrapper">
		<?php
			$flexible_content = get_field("flexible_content");
			if($flexible_content)
			{
				foreach($flexible_content as $section)
				{
					if($section['acf_fc_layout'] == 'therapist_widget')
					{
						if(!empty($section['therapist_widget_item']))
						{
							?>
								<section class="container search-therapist slider-home">
									<div class="row text-center">
                                        <a href="<?php echo $section['therapist_widget_url']; ?>">
										  <h2 class="w-100 text-left font_weight_6"><?php echo $section['therapist_widget_title']; ?></h2></a>
                                        <?php set_query_var('widget_name', $section['therapist_widget_title']); ?>
										<div class="swiper-home-blog w-100 therapist__">
											<div class="slider_content">
												<?php 
													$i=1;
													foreach($section['therapist_widget_item'] as $post) 
													{
														$sub_title = $post['therapist_subtitle'];
														$post = $post['therapist'][0];
														if($i<=12)
														{
															//setup_postdata($post);
															set_query_var( 'sub_title', $sub_title );
                                                            set_query_var('position', $i);
															?><div class="m-1 br_1 card_effects">  <?php get_template_part( 'template-parts/content-list-therapist-home'); ?></div><?php 
															$i++;
														}
													}
												?>
											</div>
										</div>
									</div>
								</section>
								<div style="clear: both !important"></div>
								<div class="m-3 divider mt_2_per divider_therapist"></div>
							<?php
							wp_reset_query();
						}
					 }
					else if($section['acf_fc_layout'] == 'therapies_widget')
					{
						if(!empty($section['therapies_widget_item']))
						{
							?>
								<section class="container search-therapies related-therapies slider-home">
									<div class="row section_therapies">
                                        <a href="<?php echo $section['therapies_widget_url'];?>">
										  <h2 class="w-100 text-left font_weight_6"><?php echo $section['therapies_widget_title']; ?></h2></a>
                                        <?php set_query_var('widget_name', $section['therapies_widget_title']); ?>
										<div class="swiper-home-blog w-100 top_therapies__">
											<div class="slider_content">
												<?php 
													$i=1;
													foreach ($section['therapies_widget_item'] as $therapy_term ) 
													{
														$sub_title = $therapy_term['therapy_subtitle'];
														$therapy_term = $therapy_term['therapy'];
														if($i<=12)
														{
															set_query_var( 'sub_title', $sub_title  );
															set_query_var( 'therapy_term', $therapy_term  );
															set_query_var( 'position', $i  );
															?><div class="m-1 br_1 card_effects"> <?php get_template_part( 'template-parts/content-list-therapies-home'); ?></div><?php 
															$i++;
														}
													} 
												?>
											</div>
										</div>	
									</div>
								</section>
								<div style="clear: both !important"></div>
								<div class="m-1 divider divider_therapies"></div>
							<?php
							wp_reset_query();
						}
					}
					else if($section['acf_fc_layout'] == 'ailments_widget')
					{
						if(!empty($section['ailments_widget_item']))
						{
							?>
								<section class="container connect-healer-section slider-home text-center">
								    <div class="row">
                                        <a href="<?php echo $section['ailments_widget_url']?>">
								            <h2 class="w-100 mb-4 text-left font_weight_6"><?php echo $section['ailments_widget_title']; ?></h2></a>
                                        <?php set_query_var('ailments_name', $section['ailments_widget_title']); ?>
								        <div class="swiper-home-blog w-100 ailments__">
								            <div class="slider_content">

								                <?php 
													$i=1;
													foreach ( $section['ailments_widget_item'] as $ailment_term ) 
													{
														$sub_title = $ailment_term['ailment_subtitle'];
														$ailment_term = $ailment_term['ailment'];
														if($i<=12)
														{
															set_query_var( 'sub_title', $sub_title  );
															set_query_var( 'ailment_term', $ailment_term  );
															set_query_var( 'position', $i  );
															?><div class="m-1 br_1 height_card card_effects"> <?php get_template_part( 'template-parts/content-list-ailment-home'); ?></div><?php 
															$i++;
														}
													} 
												?>
								            </div>
								        </div>
								    </div>
								</section>
								<div style="clear: both !important"></div>
								<div class="m-1 divider divider_issues"></div>
							<?php
							wp_reset_query();
						}
					}
					else if($section['acf_fc_layout'] == 'events_widget')
					{
						if(!empty($section['events']))
						{
							?>
								<section class="container search-events">
									<div class="row text-center slider-home">
                                        <a href="<?php echo $section['event_widget_url']?>">
										  <h2 class="w-100 text-left font_weight_6"><?php echo $section['event_widget_title']; ?></h2></a>
                                        <?php set_query_var('event_name', $section['event_widget_title']); ?>
										<div class="swiper-home-blog w-100 upcomming_events__">
											 <div class="slider_content">
												<?php 
													$i=1;
													foreach($section['events'] as $post)
													{
														$sub_title = $post['event_subtitle'];
														$post = $post['event'][0];
														if($i<=12)
														{
															set_query_var( 'sub_title', $sub_title  );
															set_query_var( 'position', $i);
															?><div class="m-1 br_1 height_card_event card_effects"> <?php get_template_part( 'template-parts/content-list-event-home');?></div><?php	
															$i++;
														}
													} 
												?>	
											</div>
										</div>	
									</div>
								</section>
								<div style="clear: both !important"></div>
								<div class="m-1 divider divider_event"></div>
							<?php
							wp_reset_query();
						}
					}
					else
					{
						if(!empty($section['custom_widget_item']))
						{
							?>
								<section class="container search-therapist slider-home">
									<div class="row text-center">
										<?php
											if(!empty($section['custom_widget_url']))
											{
												?>
												 <a href="<?php echo $section['custom_widget_url']; ?>"> 
													<h2 class="w-100 mt-md-3 text-left font_weight_6"><?php echo $section['custom_widget_title']; ?></h2>
												 </a> 
                                                <?php set_query_var('modalities_name', $section['custom_widget_title']);?>
												<?php
											}
											else
											{
												?>
													<h2 class="w-100 mt-20 text-left"><?php echo $section['custom_widget_title']; ?></h2>
												<?php
											}
										?>
										<div class="swiper-home-blog w-100 modalities__">
											<div class="slider_content">
												<?php 
													$i=1;
													foreach ($section['custom_widget_item'] as $data ) 
													{
														if($i<=12)
														{
															set_query_var( 'img_id', $data['image'] );
															set_query_var( 'title', $data['title'] );
															set_query_var( 'link', $data['url'] );
                                                            set_query_var('position', $i);
															?><div class="m-1 br_1 card_effects pd_b_5">  <?php get_template_part( 'template-parts/content-list-home-modalities'); ?></div><?php 
															$i++;
															//print_r($data);
														}
													} 
												?>		
											</div>
										</div>
									</div>
								</section>
								<div style="clear: both !important"></div>
								<div class="m-1 divider divider_modalities"></div>
							<?php 
						}
						wp_reset_query();
					}
				}
			}
		?>
</div>

    <section class="container">
        <?php
			$flexible_content = get_field("flexible_content");
// 			echo "<pre style='display:none;'>";print_r($flexible_content);echo"</pre>";
			if($flexible_content)
			{
                foreach($flexible_content as $section)
				{
					if($section['acf_fc_layout'] == 'blogs_widget')
					{
						if(!empty($section['blogs_widget_item']))
						{?>
        <section class="all_slider_issues">
            <a href="<?php echo $section['blog_widget_url']?>">
                <h2 class="title-w3 section_title font_weight_6"><?php  echo $section['blog_widget_title'];?></h2>
            </a>
            <section class="blogs slider  blogs__">
                <?php
                    foreach($section['blogs_widget_item'] as $post) {
                        if($post['blog'][0]){
                            foreach($post['blog']as $p){?>
                <?php if (has_post_thumbnail( $p->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'single-post-thumbnail' ); ?>
                <div class="slide news_feed blogs_section">
                    <img title="<?php $p->post_title?>" alt="<?php $p->post_title?>" class="blog_img" src="<?php echo $image[0]; ?>">
                    <a class="hidden-xs" href="<?php echo get_permalink($p->ID); ?>">
                        <h6 class="text-center blog_title mt-3"><?php echo implode(' ', array_slice(explode(' ', $p->post_title), 0, 12)); ?></h6>
                    </a>
                    <a class="hidden-xl hidden-lg hidden-md" href="<?php echo get_permalink($p->ID); ?>">
                        <h6 class="text-center blog_title mt-3"><?php echo implode(' ', array_slice(explode(' ', $p->post_title), 0, 5)); ?></h6>
                    </a>
                </div>
                <?php endif; ?>
                <?php }
                    }
                }?>
            </section>
        </section>
        <div class="clear"></div>
        <div class="m-3 divider"></div>
        <?php
                        }
                    }
                }
            } 
        ?>

    </section>

<!--
    <section class="container">
        <section class="all_slider_issues">
            <a href="">
                <h2 class="title-w3 section_title font_weight_6">Watch wellness videos</h2>
            </a>
            <section class="blogs_video slider videos__">
                <?php while(have_rows('wellness_videos')) : the_row();?>
                <div class="slide news_feed blogs_section">
                    <div>
                        <iframe width="100%" height="100%" src="<?php the_sub_field('link')?>" frameborder="0" style="border-top-right-radius: 10px;border-top-left-radius: 10px;" allowfullscreen></iframe>
                    </div>
                    <div class="hidden-xs" target="_blank" href="">
                        <h6 class="text-center blog_title"><?php the_sub_field('title')?></h6>
                    </div>
                    <div class="hidden-xl hidden-lg hidden-md" target="_blank" href="">
                        <h6 class="text-center blog_title"><?php the_sub_field('title')?></h6>
                    </div>
                </div>
                <?php endwhile;?>
            </section>
        </section>
    </section>
    <div class="clear"></div>
    <div class="m-3 divider"></div>
-->
          
    <section class="container all_slider_Therapists news_feed_contect">
        <h2 class="title-w3  section_title mt-3 font_weight_6">Media Coverage</h2>
        <section class="blogs slider">
            <?php while ( have_rows('news_feed') ) : the_row();?>
            <div class="slide news_feed">
                <a href="<?php the_sub_field('news_feed_url'); ?>" target="_blank" rel="nofollow">
                    <img title="<?php the_sub_field('news_feed_title');?>" alt="<?php the_sub_field('news_feed_title');?>" class="blog_img" src="<?php the_sub_field('news_feed_image');?>">
<!--
                    <h6 class="text-center blog_title mt-3">
                        <?php //$media_title = the_sub_field('news_feed_title');?>
                    </h6>
-->
                </a>
            </div>
            <?php endwhile; ?>
        </section>
    </section>
    <div class="m-3 divider divider_news"></div>
    <div style="clear:both"></div>
                                    
    <div class="carousel-inner container">
        <div class="item carousel-item active">
            <div class="">
                <h3 class="w-100 text-left mb-4 mt-2 font_weight_6">What our users have to say</h3>
            </div>
            <div class="testmonual_fetch slider">
                <?php while ( have_rows('testimonial') ) : the_row();?>
                <div class="slide">
                    <div class="testimonial"><?php the_sub_field('description')?>
                        <div class="media">
                            <div class="media-body">
                                <div class="overview">
                                    <div class="name">
                                        <h6><?php the_sub_field('name')?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <div style="clear:both"></div>

    <section class="container all_slider_Therapists news_feed_contect">
    <h2 class="title-w3  section_title mt-3 font_weight_6">FAQs</h2>
    <section class="" style="margin-top:2%" itemscope itemtype="http://schema.org/FAQPage">
        <?php while(have_rows('faq')) : the_row();?>
        <div class="accordion_content" itemprop="mainEntity" itemscope itemtype="http://schema.org/Question">
            <button class="accordion" itemprop="name"><?php the_sub_field('faq_title') ?></button>
            <div class="panel" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
                <p itemprop="text"><?php the_sub_field('faq_description')?></p>
            </div>
        </div>
        <?php endwhile;?>
    </section>
</section>
    <div style="clear:both"></div>

<?php get_footer(); ?>