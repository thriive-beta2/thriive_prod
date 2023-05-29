<?php /* Template Name: Therapy List Template */ 
get_header(); ?>

<div class="banner-home">
	<?php while(have_posts()):the_post();?>
	<div class="container ">
		<div class="justify-content-center flex-column text-center">
			<h1><?php the_title();?></h1>
			<?php the_content();?>
		</div>
		<div class="blog-filter-txt float-none d-block mx-auto">
			<div class="filter-wrapper therapies-filter-wrapper">
				<div class="tags-inner float-none">
					<div class="row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3">
							<h4>Find Therapy</h4>
						</div>
						<div class="form-group col-12 col-sm-7 col-md-8 col-lg-9">
							<input type="text" name="therapy" id="searchTherapy" autocomplete="off" class="form-control col-md-10" value="" placeholder="Search Therapy" />
			    			<div id="resulttherapy"></div>
			    		</div>
					</div>
				</div>
			</div>
			<div class="section_therapies_list therapies_list">
			<?php
				$therapy_args = array(
				    'taxonomy' => 'therapy',
				    //'parent' => 0,  
				    'hide_empty' => false,
					//'number' => 4,
				    'meta_query' => true,
				    'order'    => 'DEC',
					'orderby'  => 'featured_therapy',
        			'meta_key' => 'featured_therapy',
				);
				$therapy_terms = new WP_Term_Query( $therapy_args );
			?>			
				<div class="row">
					<?php foreach($therapy_terms->get_terms() as $therapy_term){ 
							$taxonomyArray1 = array('taxonomy' => 'therapy', 'parent' => $therapy_term->term_id, 'hide_empty' => false);
							$sub_therapy = get_terms($taxonomyArray1);
							$therapy_image = get_field('therapy_image','therapy_'.$therapy_term->term_id);
							if(is_mobile()) { 
								$therapy_img = wp_get_attachment_image_src($therapy_image, 'featured_post_mobile');
							} else {
								$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' );
							}
							$therapist_args =  array(
								'post_type' => 'therapist',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'therapy',
										'field'    => 'slug',
										//'terms'    => $therapy_term->slug,
									),
								),
							);
							$therapists = get_posts($therapist_args);
							$all_ailments = getMapAilmentByTherapy($therapy_term->term_id); ?>
				 
				<div class="col-12 col-sm-4 col-lg-3 mt-2 text-center th-listing-wrapper">
					<div class="dblock-img">
						<a href="<?php echo get_term_link( $therapy_term->slug, 'therapy' );?>"><img title="<?php echo $therapy_term->name?>" src="<?php echo $therapy_img[0]; ?>" alt="<?php echo $therapy_term->name?>"></a>
					</div>
					<h3 class="w-100"><a href="<?php echo get_term_link( $therapy_term->slug, 'therapy' );?>"><?php echo $therapy_term->name?></a></h3>
				</div>
				<?php } ?>			
			</div>
		</div>
		<?php endwhile;?>
	</div>
</div>
<?php get_footer(); ?>