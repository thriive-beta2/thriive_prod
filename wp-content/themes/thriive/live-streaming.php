<?php /* Template Name: Live Streaming Page */ ?>
<?php get_header(); ?>
<?php function getRecommendedYTVideos(){
	$curl_handle=curl_init();
  	curl_setopt($curl_handle,CURLOPT_URL,'https://www.googleapis.com/youtube/v3/search?key=AIzaSyD0C8oeMTcKO5PgpPRIwRP5smUrYocX-o8&channelId=UCmN0ipKhWCOlvAbLKvzp1Ww&part=snippet,id&order=date&maxResults=6');
  	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
  	$buffer = json_decode(curl_exec($curl_handle),true);
  	curl_close($curl_handle);
  	return $buffer;
} ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5 mb-2">
            <img class="img-responsive" src="https://www.thriive.in/wp-content/uploads/live_streaming.jpg" alt="">
        </div>
    </div>
</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main">	
		<?php if (is_mobile()) { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container blog-wrapper">
			    	<div class="mt-3 font_blog_title_xs">
			    		<?php if ( is_singular()) :
							//the_title( '<h1 class="entry-title w-100 blog-title mt-4 text-center">', '</h1>' );
						else :
							//the_title( '<h2 class="entry-title w-100 blog-title mt-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif; ?>
				        <header class="entry-header text-center w-100">
				        	<?php if( get_field('video_mobile') ):
					            $video = get_field('video_mobile');
					            echo $video; 
					        endif; ?>
				        </header>
			        	<div style="clear: both;"></div></br>
			        	<script src="https://apis.google.com/js/platform.js"></script>
						<div class="g-ytsubscribe" data-channelid="UCmN0ipKhWCOlvAbLKvzp1Ww" data-layout="full" data-count="hidden"></div>
						<div style="clear:both;"></div>
				        <div class="col-xs-12" style="padding-left: 0px;margin-top: 10px; ">
				            <div class="text-left">
				                <div class="thriive-social-block hide-block show-block mb-3">
				                    <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
				                </div>
				            </div>
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
						                <a href="<?php echo get_site_url();?>/home-page-blog-form">
						                    <img alt="Wellness Blog" title="Wellness Blog" style="width:100%" class="img-responsive" src="<?php echo get_template_directory_uri();?>/assets/images/wellness-blogs.png" />
						                </a>
						            </div>
						        </div>
						        
						    </div>
						</div>
						<div class="m-3 divider mt_2_per divider_therapist"></div>
			        	<div style="clear: both;"></div>
			        	<div class="container search-result-wrapper">
							<?php $flexible_content = get_field("flexible_content");
							if($flexible_content){
								foreach($flexible_content as $section){
									if($section['acf_fc_layout'] == 'ailments_widget'){
										if(!empty($section['ailments_widget_item'])){ ?>
											<section class="container connect-healer-section slider-home text-center">
											    <div class="row">
			                                        <a href="<?php echo $section['ailments_widget_url']?>"><h2 class="w-100 mb-4 text-left font_weight_6"><?php echo $section['ailments_widget_title']; ?></h2></a>
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
											<?php wp_reset_query();
										}
									} else if($section['acf_fc_layout'] == 'blogs_widget'){
										if(!empty($section['blogs_widget_item'])){ ?>
				                            <section class="all_slider_issues">
				                                <a href="<?php echo $section['blog_widget_url']?>"><h2 class="title-w3 section_title font_weight_6"><?php  echo $section['blog_widget_title'];?></h2></a>
				                                <section class="blogs slider  blogs__">
				                                    <?php foreach($section['blogs_widget_item'] as $post) {
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
	                								} ?>
	                        					</section>
	                    					</section>
											<div class="clear"></div>
											<div class="m-3 divider"></div>
										<?php }
									}
								}
							} ?>
						</div>
						<div style="clear: both;"></div>
			        	<div class="">
			            	<div class="col-md-3 col-xs-12">
			                	<h3 class="text-center"> Recommended Videos </h3>
								<div class="m-3 divider mt_2_per divider_therapist"></div>
			                	<?php $buffer = getRecommendedYTVideos();
								if (!empty($buffer)):
									foreach($buffer['items'] as $items):?> 
			                			<div class="row">
			                				<div class="col-md-12 col-lg-12 col-xs-12">
			                        			<div class="blog-banner">
						                            <iframe width="100%" height="200" src="<?php echo 'https://www.youtube-nocookie.com/embed/'.$items['id']['videoId'].'?controls=0'; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						                        </div>
			                    			</div>		
			                    			<div class="col-md-12 col-lg-12 col-xs-12 pb-2 pt-1" >
												<h5 class="entry-title text-justify w-100 mt-3" style="height:80px; overflow:hidden;"><?php echo $items['snippet']['title']; ?></h5>
											</div>
			                			</div>
										<hr>
			                		<?php endforeach; 
			                	endif; ?>
				                <div class="text-center">
				                    <a role="button" href="https://www.youtube.com/thriiveartandsoul" class="text-center btn_blog_single btn f13" role="button" target="_blank">View More</a>
				                </div>
				                <div style="clear: both;"></div>		                	
			            	</div>
			        	</div>
			    	</div>
				</div>
			</article>
		<?php } else { ?>
			<article id="post-<?php the_ID();?>"<?php post_class(); ?>>
				<div class="container blog-wrapper">
					<div class="row">
						<?php if ( function_exists('yoast_breadcrumb') ) 
							{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} 
						?>
						<?php
							if ( is_singular() ) :
								//the_title( '<h1 class="entry-title w-100 blog-title text-center mt-5">', '</h1>' );
							else :
								//the_title( '<h2 class="entry-title w-100 blog-title mt-5"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
						?>	
						<header class="entry-header text-center w-100">
							<?php if( get_field('video_desktop') ):
					            $video = get_field('video_desktop');
					            echo $video; 
					        endif; ?>
						</header>
					</div>
					<div style="clear: both;"></div>
		        </div>
				</br>
		        <div class="container">
		        	<div class="row">
		        		<script src="https://apis.google.com/js/platform.js"></script>
						<div class="g-ytsubscribe" data-channelid="UCmN0ipKhWCOlvAbLKvzp1Ww" data-layout="full" data-count="hidden"></div>
						<div style="clear:both;"></div>
		        	</div>
		        </div>
				<div style="clear: both;"></div><br/>
				<div class="container search-result-wrapper">
					<?php $flexible_content = get_field("flexible_content");
					if($flexible_content){
						foreach($flexible_content as $section){
							if($section['acf_fc_layout'] == 'ailments_widget'){
								if(!empty($section['ailments_widget_item'])){ ?>
									<section class="container connect-healer-section slider-home text-center">
									    <div class="row">
	                                        <a href="<?php echo $section['ailments_widget_url']?>"><h2 class="w-100 mb-4 text-left font_weight_6"><?php echo $section['ailments_widget_title']; ?></h2></a>
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
									<?php wp_reset_query();
								}
							} else if($section['acf_fc_layout'] == 'blogs_widget'){
								if(!empty($section['blogs_widget_item'])){ ?>
		                            <section class="all_slider_issues">
		                                <a href="<?php echo $section['blog_widget_url']?>"><h2 class="title-w3 section_title font_weight_6"><?php  echo $section['blog_widget_title'];?></h2></a>
		                                <section class="blogs slider  blogs__">
		                                    <?php foreach($section['blogs_widget_item'] as $post) {
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
            								} ?>
                    					</section>
                					</section>
									<div class="clear"></div>
									<div class="m-3 divider"></div>
								<?php }
							}
						}
					} ?>
				</div>
				<div style="clear: both;"></div>
			    <div class="container">
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<?php $buffer = getRecommendedYTVideos();
							if (!empty($buffer)): ?>
								<h4 class="text-center"> Recommended Videos </h4>
								<div class="m-3 divider mt_2_per divider_therapist"></div>
								<?php foreach($buffer['items'] as $items):?> 
									<div class="col-md-4 col-lg-4 col-xs-12 pb-4">
										<div class="blog-banner">
											<iframe width="100%" height="300" src="<?php echo 'https://www.youtube-nocookie.com/embed/'.$items['id']['videoId'].'?controls=0'; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>		
			                    		<div class="col-md-12 col-lg-12 col-xs-12 pb-2 pt-1" style="max-height: 65px;">
											<h5 class="entry-title text-justify w-100 mt-3" ><?php echo $items['snippet']['title']; ?></h5>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
							<div style="clear: both;"></div>
							<div class="text-center">
								<a role="button" href="https://www.youtube.com/thriiveartandsoul" class="text-center btn_blog_single btn f13" role="button" target="_blank">View More</a>
							</div>
							<div style="clear: both;"></div>
							<div class="m-3 divider mt_2_per divider_therapist"></div>
						</div>
					</div>			
					
				</div>
			    
			</article>
		<?php } ?>
		<style>
			@media only screen and (max-width: 600px) {
		        ul li {
		            margin-left: 16px;
		        }
				.blog-banner a img{
					height: 140px !important;
				}
				.blog-title{
					font-size: 18px !important;
				}
				.font_blog_title_xs{
					font-size: 11px !important;
				}
				.pd-0{
					padding: 0px !important;
				}
				.break_{
					background-color: #ffffff;
				    font-weight: 900;
				    margin:5px;
				}
				.break_row{
					background-color: #ffffff;
		    		font-weight: 500;
		    		border: 1px solid #a7a7a7;
		    		border-radius: 5px;
		    		box-shadow: 1px 1px 4px #cacaca;
				}
				.break_content{
					font-weight: 500;
				    font-size: 14px;
				    font-family: 'Merienda', cursive;
				    color: #4f0475;
				    margin: 0px;
				    padding: 5px 0px;
				}
				.register_row{
					background-color: #ffffff;
		    		border: 1px solid #dd4b39;
		    		border-radius: 5px;
		    		box-shadow: 5px 5px 5px #e4e0e0;
		    		margin: 0px;
				}
				.register_therapist{
					font-weight: 500;
				    font-size: 14px;
				    font-family: 'Roboto';
				    color: #522923;
				    margin: 0px;
				    padding: 5px 0px;
				}
				.f13{
					font-size: 13px;
				}
				span span a{
					color: #007bff !important;
					font-weight: 600;
				}
			}
			.break_{
				background-color: #ffffff;
			    font-weight: 900;
			    margin:5px;
			}
			.break_row{
				background-color: #4f04750d;
				font-weight: 500;
				border: 1px solid #a7a7a7;
				border-radius: 5px;
				box-shadow: 1px 1px 4px #cacaca;
		        margin: 0% 8%;
			}
			.break_content{
				font-weight: 600;
			    font-size: 14px;
			    font-family: Roboto, sans-serif;
			    color: #4f0475;
			    margin: 0px;
			    padding: 8px 0px;
			}
			.register_row{
				background-color: #ffffff;
				border: 1px solid #dd4b39;
				border-radius: 5px;
				box-shadow: 5px 5px 5px #e4e0e0;
				margin: 0px;
			}
			.register_therapist{
				font-weight: 600;
			    font-size: 16px;
			    font-family: 'Roboto';
			    color: #522923;
			    margin: 0px;
			    padding: 15px 0px;
			}
			span span a{
				color: #4f0475 !important;
				font-weight: 600;
			}
			.f18{
				font-size: 18px;
			}
			.font_roboto{
				font-family: Roboto !important;
			}
			.recommend_subtitle{
				font-size: 17px;
		        color: #674677;
		        font-weight: 500;
			}
		    .text-highlight {
		        font-style: italic;
		    }
			.btn_blog_single{
				border-radius: 5px;
				color:#fff;
				background-color: #4f0475;
			}
			.img_radius_50pr img {
				border-radius: 50% !important;
			}
			.attachment-featured_post_mobile,.attachment-thumbnail{
				border-radius: 50% !important;
			}
			p a{
				color: #4f0475;
				font-width: 600;
			}
			.ncc p{
				display: none;
			}
			.blog-banner a img{
				height: 140px !important;
			}
		    .f16{
		        font-size: 16px;
		    }
			hr {margin-top: 0rem !important;}
			a:hover {
    			color: #fff;
    		}
		</style>		
	</main>	
</div>
<?php get_footer(); ?>