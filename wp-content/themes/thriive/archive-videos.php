<?php /* Template Name: New Videos list */
	include_once get_stylesheet_directory().'/new-header.php';  
	if (have_posts()):?>
<section class="">
    <div class="container">
        <header class="page-header">
            <div class="row text-center">
                
                <h1 class="page-title blog_single_heading w-100 mt_0 mt_mobile">Videos</h1>
				
                <div class="col-md-12">
                    <div class="blog-cat-list">
                        
                        <div class="menue_mobile_space" style="clear:both;"></div>
                        <!-- Swiper -->
                        <!--
				  <div class="swiper-container blog-list-icon">
				    <div class="swiper-wrapper">
					    <?php 
						    $terms = get_terms('category', array('hide_empty'=>'true'));
						    foreach ($terms as $term):
						?>						
				      <div class="swiper-slide"><a href="<?php echo get_term_link($term);?>"><span class="icon-new-heart <?php echo $term->slug; ?> blog-icon-set"> </span> <span class="text-highlight"><?php echo $term->name;?></span></a></div>
				      <?php endforeach;?>
				    </div>
				    <div class="swiper-button-next"></div>
				    <div class="swiper-button-prev"></div>
				  </div>
-->
                    </div>
                </div>
				
            </div>
        </header>
        <div style="clear: both;"></div>
        <div class="row mt_25p blog-listing-content-wrapper">
            <?php while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/post/content-post-loop',get_post_type() );
			endwhile;
			?>
        </div>
        <div class="blog-post-navigation">
            <?php the_posts_navigation( array(
	        	'prev_text' => __('Next Page', 'theme_textdomain'),
	        	'next_text' => __('previous Page', 'theme_textdomain'),
	        	'screen_reader_text' => __('Posts navigation', 'theme_textdomain')
			));?>
        </div>
    </div>
</section>
<?php 
	else :
		get_template_part('template-parts/content', 'none');
	endif;
include_once get_stylesheet_directory().'/new-footer.php';
?>
<style>
    div.scrollmenu {
        overflow: auto;
    }
    div.scrollmenu a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 0px 14px 10px 14px;
        text-decoration: none;
        font-size: 15px;
    }
    .mt_0 {
        margin-top: 0px ;
    }
    @media only screen and (max-width: 600px) {
        
        .menue_mobile_space{
            margin-bottom: 25%;
        }
        .mt_mobile {
            margin-top: 20px;
            margin-bottom:1rem!important; 
        }
        .blog_single_heading {
            margin-bottom: 5px;
        }
        .mt_25p {
            margin-top: -25% !important;
        }
        .section {
            margin-top: 0px !important;
        }
        .blog_single_heading {
            font-size: 30px !important;
        }
        .f13 {
            font-size: 13px;
        }
        .blog-title {
            font-size: 16px !important;
        }
    }
</style>