<?php if (is_mobile()) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container blog-wrapper">
	    	<div class="mt-3 font_blog_title_xs">
		        <?php if ( is_singular()) :
					the_title( '<h1 class="entry-title w-100 blog-title mt-3">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title w-100 blog-title mt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
	        	<div style="clear: both;"></div>
		        <div class="mx-auto p-0 d-flex blog-list-details">
		            <div class="col-md-4 col-xs-4 font_blog_title_xs pd-0">
		                <div class="entry-meta">
		                    <?php thriive_posted_by();?>
		                </div>
		            </div>
		            <div class="col-md-4 col-xs-5 font_blog_title_xs">
		                <div class=""><span class="icon-new-calender_1 icon-event"></span> <span><?php the_date('j M, Y');?></span></div>
		            </div>
		            <div class="col-md-2 col-xs-3 font_blog_title_xs pd-0">
		                <!--<div class=""><a href="#comments"><span class="icon-new-comment icon-event" style="margin: 0px;"></span><?php //comments_number('0');?> Comments </a></div>-->
		            </div>
		        </div>
	       	 	<div style="clear: both;"></div>
		        <div class="col-xs-12" style="padding-left: 0px ">
		            <div class="text-left">
		                <div class="thriive-social-block hide-block show-block mb-3">
		                    <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
		                </div>
		            </div>
		        </div>
	        	<div style="clear: both;"></div>
	        	<div class="">
	            	<div class="col-md-12 col-xs-12 p-0 blog-wrapper text-justify blog-single-txt pb-2" style="font-family:Roboto, sans-serif;margin-top: -7%;font-size: 14px;">
	                	<?php $tr = apply_filters('the_content', get_the_content()); 
						$tr_leanth = str_word_count($tr);
						$tr_leanth_break = 180;
						for ($x = 1; $x <= $tr_leanth ; $x++){
					  		if($x <= $tr_leanth_break){
					  			echo "<br>" . implode(' ', array_slice(explode(' ', $tr), 0, $tr_leanth_break)); ?>
	                			<div class="break_">
	                    			<div class="break_content_mobile">
		                        		<?php $therapies = wp_get_post_terms(get_the_ID(),'therapy');
										foreach ($therapies as $therapy_term):
											set_query_var( 'therapy_term', $therapy_term  );
											$therapy_image = get_field('therapy_image', $therapy_term);
											$therapy_img = wp_get_attachment_image_src( $therapy_image,'thumbnail' );
											$therapy_term->name;
											$therapy_term->slug;
										endforeach; ?>
										<div class="row break_row">
				                            <div class="col-md-12 col-xs-12 text-center">
				                                <a class="btn" href="https://www.thriive.in/therapist?therapy=<?php echo $therapy_term->slug;?>">
				                                    <div class="text-center">
				                                      <!--  <p class="break_content">Connect With Related Therapist</p>-->
				                                    </div>
				                                </a>
				                            </div>
				                        </div>
	                    			</div>
	                			</div>
	                			<?php break;
	                		} 
	                	}
						for ($x = 1; $x <= $tr_leanth; $x++) {
					  		if($x > $tr_leanth_break){
					  			echo implode(' ', array_slice(explode(' ', $tr), $tr_leanth_break, $tr_leanth_break));?>
	                			<div class="break_">
	                    			<div class="break_content_mobile">
				                        <?php $therapies = wp_get_post_terms(get_the_ID(),'therapy');
										foreach ($therapies as $therapy_term):
											set_query_var( 'therapy_term', $therapy_term  );
											$therapy_image = get_field('therapy_image', $therapy_term);
											$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' );
									    endforeach; ?>
										<div class="row break_row">
				                            <div class="col-md-12 col-xs-12 text-center">
				                                <a class="btn" role="button" href="https://www.thriive.in/therapist?therapy=<?php echo $therapy_term->slug;?>">
				                                    <div class="text-center">
				                                        <!--<p class="break_content">Connect With Related Therapist</p>-->
				                                    </div>
				                                </a>
				                            </div>
				                        </div>
	                    			</div>
	                			</div>
	                			<?php break;
							}
						}
						echo implode(' ', array_slice(explode(' ', $tr), $tr_leanth_break * 2, $tr_leanth)); ?>
		                <div class="text-center">
		                    <a href="" class="btn share-cta mb-3 hidden-xs"><i class="icon-new-share p-1"></i>SHARE</a>
		                    <div class="thriive-social-block hide-block show-block mb-3">
		                        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
		                    </div>
		                </div>
						<div class="m-3 divider mt_2_per divider_therapist"></div>
	                	<div style="clear: both;"></div>
		                <div class="row register_row mb-3">
		                    <div class="col-md-12 col-xs-12 text-center">
		                        <a class="" href="https://www.thriive.in/therapist-landing-page#sing_up_">
		                            <div class="text-center">
		                             <!--   <p class="register_therapist"> Are You Therapist? Register Now</p>-->
		                            </div>
		                        </a>
		                    </div>
		                </div>
	                	<div style="clear: both;"></div>
	            	</div>
	            	<div style="clear: both;"></div>
	            	<div class="m-3 divider mt_2_per divider_therapist"></div>
	            	<div style="clear: both;"></div>
	            <div class="col-md-3 col-xs-12">
	                <h3 class="text-center" style="font-size: 20px;"> Recommended For You </h3>
	                <hr>
	                <?php
						$related_posts = thriive_get_related_content(get_the_ID(),3,'videos','category');
						if ($related_posts->have_posts()):
						while ($related_posts->have_posts()): $related_posts->the_post();?>
	                <div class="row">
	                    <div class="col-md-12 col-lg-12 col-xs-12">
	                        <?php
                                $post_categories = get_post_primary_category($post->ID, 'category');
                            ?>
	                        <?php if (has_post_thumbnail()):?>
	                        <div class="blog-banner">
	                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('blog-header', array('alt' => get_the_title(), 'title' => get_the_title())); ?></a>
	                        </div>
	                        <?php endif;?>
	                    </div>
	                    <div class="col-md-12 col-lg-12 col-xs-12">
	                        <a href="<?php the_permalink();?>">
	                            <?php
                                    the_title( '<h5 class="entry-title text-justify w-100 mt-3" style="font-size:16px;">', '</h5>' );
                                ?>
	                        </a>
	                        <div class="entry-meta f13">
	                            <?php thriive_posted_by();?>
	                        </div>
	                    </div>
	                </div>
	                <?php endwhile;
					?>
	                <?php
						endif;
						wp_reset_query();
					?>
	               
	                <div style="clear: both;"></div>
	                <div class="m-3 divider mt_2_per divider_therapist"></div>

	                <!-- related post shorted By taging -->
	                <?php $orig_post = $post;
						global $post;
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
						$tag_ids = array();
						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$args=array(
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=>5,
						'caller_get_posts'=>1
						);
						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) {
						echo '<div id="related" class="text-center"><h4>Related Posts</h4><div class="row mt-3 mb-4">';
						while( $my_query->have_posts() ) {
						$my_query->the_post(); ?>
	                <div class="col-md-4 mb-3">
	                    <div class="ncc">
	                        <div class="img-responsive">
	                            <div class="blog-banner">
	                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('blog-header', array('alt' => get_the_title(), 'title' => get_the_title())); ?></a>
	                            </div>
	                        </div>
	                        <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>" rel="nofollow">
	                            <h5 class="entry-title text-justify w-100 mt-3"><?php the_title(); ?></h5>
	                        </a>
	                        <div class="entry-meta f13">
	                            <?php thriive_posted_by();?>
	                        </div>
	                        <?php the_excerpt(); ?>
	                    </div>
	                </div>
	                <?php }
						echo '</div></div>';
						}
						}
						$post = $orig_post;
						wp_reset_query(); ?>


	                <div class="mb-3 mt-3">
	                    <?php 
					$related_therapists = thriive_get_related_content(get_the_ID(),4,'therapist','therapy');
						if (!empty($related_therapists) && $related_therapists->have_posts()):?>
	                    <h3 class="text-center mb-3"> Related Therapist </h3>
	                    <?php 
							while ($related_therapists->have_posts()):$related_therapists->the_post();
								if(is_mobile()) {
									$therapist_image = get_the_post_thumbnail($id = null, 'featured_post_mobile', array('alt' => get_the_title(), 'title'=>get_the_title()));
								} else {
									$therapist_image = get_the_post_thumbnail($id = null, 'thumbnail', array('alt' => get_the_title(), 'title'=>get_the_title()));
								}
						?>
	                    <div class="row">
	                        <div class="col-md-3 col-xs-4 mb-3 wrapper-listing-post">
	                            <div class="healer-circle" style="height:100px;width: 100px">
	                                <div class="inner-healer-circle">
	                                    <a href="<?php echo get_the_permalink(); ?>">
	                                        <?php echo $therapist_image; ?>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-md-9 col-xs-8 pt-4">
	                            <h5>
	                                <a class=" f18" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?>
	                                    <p style="font-size:14px">
	                                        <?php echo getTherapistLocation(get_the_id()); ?>
	                                    </p>
	                                </a>
	                            </h5>
	                        </div>
	                    </div>
	                    <?php endwhile;?>
	                    <div class="text-center">
	                        <a role="button" href="<?php echo get_site_url()?>/therapist?therapy=<?php echo $therapy_term->slug;?>" class="text-center btn_blog_single btn f13" role="button"> View More Therapist
	                        </a>
	                    </div>
	                    <div class="m-3 divider mt_2_per divider_therapist"></div>
	                    <?php endif; wp_reset_query();?>
	                </div>
	                <div style="clear: both;"></div>
	                <div class="mt-3">
	                    <?php
					$therapies = wp_get_post_terms(get_the_ID(),'therapy');
						if (!empty($therapies)):?>
	                    <h3 class="text-center mb-3">Related Therapies</h3>
	                    <?php
						foreach ($therapies as $therapy_term):
						set_query_var( 'therapy_term', $therapy_term  );
						$therapy_image = get_field('therapy_image', $therapy_term);
						$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' );
						?>
	                    <div class="row">
	                        <div class="col-md-4 col-xs-3">
	                            <img title="" src="<?php echo $therapy_img[0]; ?>" alt="">
	                        </div>
	                        <div class="col-md-8 col-xs-9" style="padding: 7% 1%">
	                            <h5><a class="text-center font_roboto" href="<?php echo get_term_link($therapy_term->term_id); ?>"><?php echo $therapy_term->name; ?></a></h5>
	                        </div>
	                    </div>
	                    <?php 
					endforeach;
					?>
	                    <?php
					endif;
				?>
	                </div>
	            </div>
				</br>
	        </div>
			
			
	    </div>
	</div>
</article>
<div style="clear: both;"></div>
<?php } else { ?>
	<article id="post-<?php the_ID();?>"<?php post_class(); ?>>
		<div class="container blog-wrapper">
			<div class="row">
				<div class="category-name ">
					<span class="cat-<?php echo $post_categories['primary_category']->slug;?> cat-icon-set blog-icon-set"> </span>
					<span class="text-highlight"><?php echo $post_categories['primary_category']->name;?></span>
				</div>
				<?php if ( is_singular() ) :
					the_title( '<h1 class="entry-title w-100 blog-title text-center mt-3">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title w-100 blog-title mt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>	
				<section class="col-md-12">
					<div class="mx-auto p-0 d-flex blog-list-details">
						<div class="col-md-4 col-xs-4 font_blog_title_xs pd-0">
							<div class="entry-meta">
								<?php thriive_posted_by();?>
							</div>
						</div>
						<div class="col-md-4 col-xs-5 font_blog_title_xs">
							<div class=""><span class="icon-new-calender_1 icon-event"></span> <span><?php the_date('j M, Y');?></span></div>
						</div>
						<div class="col-md-2 col-xs-3 font_blog_title_xs pd-0">
							<!--<div class=""><a href="#comments"><span class="icon-new-comment icon-event" style="margin: 0px;"></span><?php //comments_number('0');?> Comments </a></div>-->
						</div>					
					</div>
				</section>
			</div>
			<div style="clear: both;"></div>
            <section class="col-md-12 col-xs-12 blog-wrapper text-justify blog-single-txt pb-2" style="font-family:Roboto, sans-serif;margin-top:-2%;font-size: 16px;">
				<?php $tr = apply_filters('the_content', get_the_content());
				//print_r(mb_substr($tr,0,8000));
				$tr_leanth = str_word_count($tr);
				$tr_leanth_break = 160;
				for ($x = 1; $x <= $tr_leanth ; $x++) {
					if($x <= $tr_leanth_break){
				  		echo "<br>" . implode(' ', array_slice(explode(' ', $tr), 0, $tr_leanth_break)); ?>
						<div class="break_">
							<div class="break_content_mobile">
				    			<?php $therapies = wp_get_post_terms(get_the_ID(),'therapy');
									foreach ($therapies as $therapy_term):
										set_query_var( 'therapy_term', $therapy_term  );
										$therapy_image = get_field('therapy_image', $therapy_term);
										$therapy_img = wp_get_attachment_image_src( $therapy_image,'thumbnail' );
										$therapy_term->name;
										$therapy_term->slug; ?>
								<?php endforeach; ?>
								<div class="row break_row">
									<div class="col-md-12 col-xs-12 text-center">
										<a class="" href="https://www.thriive.in/therapist?therapy=<?php echo $therapy_term->slug;?>">
											<div class="text-center">
												<!--<p class="break_content">Click Here To Get Related Therapist </p>-->
											</div>
										</a>
									</div>
								</div>
						    </div>
						</div>
				    	<?php break;
				  	}
				}
				for ($x = 1; $x <= $tr_leanth; $x++) {
					if($x > $tr_leanth_break){
				  		echo implode(' ', array_slice(explode(' ', $tr), $tr_leanth_break, $tr_leanth_break));?>
						<div class="break_">
				   			<div class="break_content_mobile">
								<?php $therapies = wp_get_post_terms(get_the_ID(),'therapy');
								foreach ($therapies as $therapy_term):
									set_query_var( 'therapy_term', $therapy_term  );
									$therapy_image = get_field('therapy_image', $therapy_term);
									$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' ); ?>
								<?php endforeach; ?>
								<div class="row break_row">
									<div class="col-md-12 col-xs-12 text-center">
										<a class="" href="https://www.thriive.in/therapist?therapy=<?php echo $therapy_term->slug;?>">
											<div class="text-center">
												<!--<p class="break_content">Click Here To Get Related Therapist </p>-->
											</div>
										</a>
									</div>
								</div>
							</div>
				    	</div>
				    	<?php break;
				  	}
				}
				echo implode(' ', array_slice(explode(' ', $tr), $tr_leanth_break * 2, $tr_leanth)); ?>
				<div class="text-center">
					<a href="" class="btn share-cta mb-3 hidden-xs"><i class="icon-new-share p-1"></i>SHARE</a>
					<div class="thriive-social-block hide-block show-block mb-3"> 
						<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					</div>
				</div>
				<div class="m-3 divider mt_2_per divider_therapist"></div>
				<div style="clear: both;"></div>
				<div class="row register_row mb-3">
					<div class="col-md-12 col-xs-12 text-center">
						<a class="" href="https://www.thriive.in/therapist-landing-page#sing_up_">
							<div class="text-center">
								<!--<p class="register_therapist"> Are You Therapist? Register Now</p>-->
							</div>
						</a>
					</div>
				</div>
			</section>
			<section class="col-md-3 col-xs-12">
				<?php $related_therapists = thriive_get_related_content(get_the_ID(),4,'therapist','therapy');
				if (!empty($related_therapists) && $related_therapists->have_posts()):?>
					<h3 class="text-center"> Related Therapist </h3><hr>
					<?php while ($related_therapists->have_posts()):$related_therapists->the_post();
						if(is_mobile()) {
							$therapist_image = get_the_post_thumbnail($id = null, 'featured_post_mobile', array('alt' => get_the_title(), 'title'=>get_the_title()));
						} else {
							$therapist_image = get_the_post_thumbnail($id = null, 'thumbnail', array('alt' => get_the_title(), 'title'=>get_the_title())); 
						} ?>
                        <div class="row">
	                        <div class="col-md-3 col-xs-4 mb-3 wrapper-listing-post">
	                            <div class="healer-circle" style="height:100px;width: 100px">
	                                <div class="inner-healer-circle">
	                                    <a href="<?php echo get_the_permalink(); ?>">
	                                        <?php echo $therapist_image; ?>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-md-9 col-xs-8 pt-4" style="padding-left:25%">
	                            <h5>
	                                <a class="f16" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?>
	                                    <p style="font-size:12px;margin-top:5px;">
	                                        <?php echo getTherapistLocation(get_the_id()); ?>
	                                    </p>
	                                </a>
	                            </h5>
	                        </div>
	                    </div>
					<?php endwhile; 
				endif;
				wp_reset_query();
				$therapies = wp_get_post_terms(get_the_ID(),'therapy');
				if (!empty($therapies)): ?>
					<h3 class="text-center">Related Therapies</h3><hr>
					<?php foreach ($therapies as $therapy_term):
						set_query_var( 'therapy_term', $therapy_term  );
						$therapy_image = get_field('therapy_image', $therapy_term);
						$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' ); ?>
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<img title="" src="<?php echo $therapy_img[0]; ?>" alt="">
							</div>
							<div class="col-md-8 col-xs-8" style="padding: 7% 1%">
								<h5><a class="text-center" href="<?php echo get_term_link($therapy_term->term_id); ?>"><?php echo $therapy_term->name; ?></a></h5>
							</div>
						</div>
					<?php endforeach;
				endif;?>
                <div id="comments">
					<?php if(get_comments_number()){ ?>
						<div class="rfa_comment comments-area">
						    <h4 class="text-center">Comments</h4>
						    <ol class="comment-list">
						    	<?php        //Gather comments for a specific page/post 
						        $comments = get_comments(array(
						            'post_id' => get_the_id(),
						            'status' => 'approve' //Change this to the type of comments to be displayed
						        ));
						        //Display the list of comments
						        wp_list_comments(array(
						            'per_page' => 10, //Allow comment pagination
						            'reverse_top_level' => false //Show the latest comments at the top of the list
						        ), $comments); ?>
						    </ol>
						</div>
					<?php } ?>
				</div>
			</section>
        </div>
		<div style="clear: both;"></div>
        <div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<?php $related_posts = thriive_get_related_content(get_the_ID(),3,'videos','category');
					if (!empty($related_posts) && $related_posts->have_posts()):?>
						<h3 class="text-center"> Recommended For You </h3>
						<?php while ($related_posts->have_posts()): $related_posts->the_post();?> 
							<div class="col-md-4 col-lg-4 col-xs-12">
								<?php $post_categories = get_post_primary_category($post->ID, 'category'); 
								if (has_post_thumbnail()): ?>
									<div class="blog-banner">
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail('blog-header', array('alt' => get_the_title(), 'title' => get_the_title())); ?></a>
									</div>
									<a href="<?php the_permalink();?>">
										<?php the_title( '<h5 class="entry-title text-justify w-100 mt-3 recommend_subtitle">', '</h5>' ); ?>
									</a>
									<div class="entry-meta f13">
										<?php thriive_posted_by();?>
									</div>
								<?php endif; ?>
							</div>
						<?php endwhile;
					endif;
					wp_reset_query(); ?>
					<div style="clear: both;"></div>
					<div class="m-3 divider mt_2_per divider_therapist"></div>
				</div>
			</div>
		</div>
	   	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $orig_post = $post;
					global $post;
					$tags = wp_get_post_tags($post->ID);
					if ($tags) {
						$tag_ids = array();
						foreach($tags as $individual_tag) {
							$tag_ids[] = $individual_tag->term_id;
						}
						$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>5,
							'caller_get_posts'=>1
						);
						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) {
							echo '<div id="related" class="text-center"><h4>Related Posts</h4><div class="row mt-3 mb-4">';
							while( $my_query->have_posts() ) {
								$my_query->the_post(); ?>
								<div class="col-md-4">
									<div class="ncc">
										<div class="img-responsive">
											<div class="blog-banner">
												<a href="<?php the_permalink();?>"><?php the_post_thumbnail('blog-header', array('alt' => get_the_title(), 'title' => get_the_title())); ?></a>
											</div>
										</div>
										<a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>" rel="nofollow">
											<h5 class="entry-title text-justify w-100 mt-3 recommend_subtitle"><?php the_title(); ?></h5>
										</a>
										<?php the_excerpt(); ?>
									</div>
								</div>
							<?php }
							echo '</div></div>';
						}
					}
					$post = $orig_post;
					wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</article>
<?php } ?>