<?php /* Template Name: All prediction consultation page */ 
// include_once get_stylesheet_directory().'/header1.php'; 
get_header();
global $wp;
$current_url = add_query_arg( array(), $wp->request ); ?>
<style>
    .f_12{
        font-size: 12px;
        color: #000000ab;
        font-family: 'Open Sans',sans-serif;
        font-weight: bold;
    }
    .f_8{
        font-size: 8px;
    }
    .f_10{
        font-size: 10px;
    }
    .arrow_icon {
        margin-top: 70%;
    }

    .column img:hover{
        border-radius: 47%;
        box-shadow: 1px 1px 20px 1px #120eaf;
    }
    .column_arrow{
        float: left;
        width: 7%;
        padding: 2px;
        padding-top: 6%;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    @media screen and (max-width: 480px) {
        h1 {
            font-size: 16px !important;
            color: #000;
            font-family: 'Open Sans',sans-serif;
            font-weight: bold;
        }
        h5{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .f_12{
            font-size: 11px;
            color: #000000ab;
            font-family: 'Open Sans',sans-serif;
            font-weight: bold;
        }
        .blob {
            background: #f3f3f3;
            border-radius: 50%;
            height: 61px;
            width: 20px;

            box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
            transform: scale(1);
            animation: pulse 2s infinite;
        }
        h3 {
            font-size: 16px;
            font-weight: 600;
            font-family: roboto;
            color: #000;
            }
            .freemin{
                margin-bottom:0px !important;
            }
            
        h2 {
            font-size: 18px !important;
        }
            
    }
    
    h1 {
            font-size: 17px !important;
            color: #000 !important;
            font-family: 'Open Sans',sans-serif !important; 
            font-weight: bold !important;
        }
    h5  {
            font-family: 'Open Sans',sans-serif !important;
			margin-top: 10px !important;
            margin-bottom: 10px !important;
        }
  
	.pgtitle {
            font-size: 26px;
			font-family: 'Open Sans',sans-serif !important; 
			margin-top: 15px;
			text-align: center;
        }
    
    
    .blob {
    background: #f3f3f3;
    border-radius: 50%;
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
    transform: scale(1);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
    }

    70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
    }

    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
    }
}
.tlistpage{
    display: flex;
}


* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 28.33%;
  margin:9px;
  border-radius: 10px;
  height:100%;
  padding-bottom: 5px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}

.packrup{
    text-align: center;
    padding-top: 5px;
    padding-bottom: 2px;
    font-family: Segoe UI, Roboto, open sans, sans-serif;
    color: #000;
    font-weight: 700;
}



.packdur{margin-top: -12px;font-weight:600;font-family:Segoe UI, Roboto, open sans, sans-serif;}

.plansel{padding-top:10px;font-family:Segoe UI, Roboto, open sans, sans-serif;text-align:center;font-weight: 600;}
.freemin {    margin-top: -20px; font-family:Segoe UI, Roboto, open sans, sans-serif;   font-weight: 600;    text-align: center;    margin-bottom: -15px; color:#ff0000b8}
hr{    margin-top: -5px;    border-color: #b3b9b9;    margin-bottom: 9px;    width: 60%;}
</style>
<!-- Desktop -->
<section class="hidden-xs" >
    <div class="container">
         <div class="row">
             <div class="col-md-12" style="padding: 0px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform" <?php } ?>>
                 <img src="/wp-content/uploads/2020/07/Prediction_camp_1_Banner.jpg" class="img-responsive" alt="signup now" style="padding-top: 20px;">
             </div>
         </div>
     </div>
	<div class="container">
        <h2 class="pgtitle">Consult India's best expert in Astrology, Numerology, Tarot & Angel Card Reading</h2>
        <div class="row">
			<div class="col-md-2 col-xs-2"></div>
			<div class="col-md-8 col-xs-2">
			<div class="col-md-2 col-xs-2">
                <div class="thumbnail">
                    <img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-1.png" alt="Lights" style="width:100%">
                    <div class="caption">
                        <h5 class="text-center">Select Expert</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="thumbnail arrow_icon">
                    <a href="" target="_blank">
                        <img src="/wp-content/uploads/2020/07/Arrow1.png" alt="Nature" style="width:100%">
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xs-2 ">
                <div class="thumbnail">
                    <div class="">
                        <img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-2.png" alt="Fjords" style="width:100%">
                    </div>
                    <div class="caption">
                        <h5 class="text-center">Sign Up</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="thumbnail arrow_icon">
                    <a href="" target="_blank">
                        <img src="/wp-content/uploads/2020/07/Arrow1.png" alt="Fjords" style="width:100%">

                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <div class="thumbnail">
                    <div class="">
                        <img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-3.png" alt="Fjords" style="width:100%">
                    </div>
                    <div class="caption">
                        <h5 class="text-center">Payment</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="thumbnail arrow_icon">
                    <a href="" target="_blank">
                        <img src="/wp-content/uploads/2020/07/Arrow1.png" alt="Fjords" style="width:100%">
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <div class="thumbnail">
                    <img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-4.png" alt="Fjords" style="width:100%">
                    <div class="caption">
                        <h5 class="text-center">Call/Chat</h5>
                    </div>
                </div>
            </div>
			
			
			</div>
			<div class="col-md-2 col-xs-2"></div>
            
        </div>
    </div>

   </section>
    <!-- Mobile -->
   <section class="hidden-sm hidden-xl hidden-lg">
     <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding: 0px;" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform" <?php } ?>>
                <img src="/wp-content/uploads/2020/07/Prediction_camp_1_Banner.jpg" class="img-responsive" alt="signup now" style="padding-top: 20px;">
            </div>
        </div>
    </div>
      <div class="" style="clear: :both"></div>
    
    <div class="container">
       <h1 class="mt-3 text-bold">Consult India's best expert in Astrology, Numerology, Tarot &amp; Angel Card Reading</h1>
        <div class="row">
           <div>
            <div class="col-xs-2" style="padding-left:1px;padding-right:1px;margin-left: 15px;">
                <div>
                    <img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-1.png" class="img-responsive img_icon" alt="">
                </div>
            </div>
            <div class="col-xs-1" style="padding:5px;padding-top:5%">
                <div>
                    <img src="/wp-content/uploads/2020/07/Arrow1.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-xs-2 " style="padding-left:1px;padding-right:1px">
                <div><img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-2.png" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-1" style="padding:5px;padding-top:5%">
                <div>
                    <img src="/wp-content/uploads/2020/07/Arrow1.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-xs-2 " style="padding-left:1px;padding-right:1px">
                <div>
                    <img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-3.png" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-1" style="padding:5px;padding-top:5%">
                <div>
                    <img src="/wp-content/uploads/2020/07/Arrow1.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-xs-2" style="padding-left:1px;padding-right:1px">
                <div><img src="/wp-content/uploads/2020/07/Iphone_XR_Screen_Icon-4.png" class="img-responsive" alt=""></div>
            </div>               
           </div>
        </div>
    </div>
    <div style="clear:both"></div>
         <div class="container">
                <div class="row">
                    <div class="col-xs-3" style="padding: 0px;">
                        <div class="text" style="padding-left: 3px;padding-right: 3px;">
                            <h5 class="text-center f_12">Select Expert</h5>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="text">
                            <h5 class="text-center f_12">Sign Up</h5>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="text">
                            <h5 class="text-center f_12">Payment</h5>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="text">
                            <h5 class="text-center f_12">Call / Chat</h5>
                        </div>
                    </div>
                </div>
            </div>
        
   </section>
<header class="">
	<div class="banner-home">
		<div class="container">			
			<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php echo get_site_url()."/talk-to-astrologer-online"; ?>"<?php echo $current_url == 'talk-to-astrologer-online' ? 'selected': ''; ?>>Select Type of Reading</option>
                <option value="<?php echo get_site_url()."/talk-to-best-astrologer-online"; ?>" <?php echo $current_url == 'talk-to-best-astrologer-online' ? 'selected': ''; ?>>Astrology</option>
                <option value="<?php echo get_site_url()."/talk-to-best-numerologist-online"; ?>" <?php echo $current_url == 'talk-to-best-numerologist-online' ? 'selected': ''; ?>>Numerology</option>
                <option value="<?php echo get_site_url()."/talk-to-best-tarot-card-reader-online"; ?>" <?php echo $current_url == 'talk-to-best-tarot-card-reader-online' ? 'selected': ''; ?>>Tarot Card Reading</option>
                <option value="<?php echo get_site_url()."/talk-to-best-angel-card-reader-online"; ?>"<?php echo $current_url == 'talk-to-best-angel-card-reader-online' ? 'selected': ''; ?>>Angel Card Reading</option>
				<option value="<?php echo get_site_url()."/vastu"; ?>"<?php echo $current_url == 'vastu' ? 'selected': ''; ?>>Vastu</option>
            </select>
			<?php
			$posts_per_page = 4;
			$start = 0;
			$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
			$start = ($paged-1)*$posts_per_page;
			// $getPost = $wpdb->get_results( 
			// 	"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN (10837,49066,56051,57610,43430,28115,28105,53297,24228,6691,24458,35704,37615,44311,53045,33942,60989,54118,60780,51880,56419,57395,28860,26884,14018,24785,22252,19080,26271,28851,56790,49358,48058,46673,46301,40534,24771,27840,29268,37610,29910,7785,5639,8249,39039,26595,29520,40307,27115,28449,10720,23958,54125,21266,46893,35416,41592,27385,39555,35345,36364)"
			// );
            $getPost = $wpdb->get_results( 
             "SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN (30227)"
            );

			// Loop Start
			if($getPost) : ?>
				<div class="therapist-wrapper section-loop-wrapper row">
					<div class="section_therapies_list custom_therapiest_list col-12 col-sm-8 p-sm-0">
						<?php $tempArr = $available = $busy = array();
                        foreach ( $getPost as $posts ) {
                            $post = get_post($posts->ID);
                            $status = getTherapistStatus($post->ID);
                            if($status == "Available"){
                                array_push($available,$posts->ID);
                            } 
                            if($status == "Busy"){
                                array_push($busy,$posts->ID);
                            }                           
                        }
                        $tempArr = array_merge($available,$busy);
                        foreach($tempArr as $t){
                            $post = get_post($t);
                            // if(!empty($posts->distance)){
                            //     $post->distance = round($posts->distance,1).' km';
                            // }
                            // if(!empty($posts->response_count)){
                            //     $post->response_count = $posts->response_count;
                            // }
                            setup_postdata( $post );
                            set_query_var('therapy','all-prediction-page');
                            get_template_part( 'template-parts/content-detail-oc-listing');
                        }
                        wp_reset_postdata(); ?>		
					</div>
				</div>
			<?php endif; ?>
            <!-- <div id="loadMore" class="btn btn-success">View more</div> -->
		</div>
	</div>
</header>
	<div class="carousel-inner container">
        <div class="item carousel-item active">
            <div class="">
                <h3 class="w-100 text-left mb-4 mt-2 font_weight_6" style="font-family: 'Merienda', cursive;color: #4F0499;">Our happy users</h3>
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
	<div class="divider"></div>
    <div style="clear:both"></div>
    <br/>
<!-- Modal -->
<div class="modal fade" id="call_with_healer" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
    <div class="modal-content">
        <div class="modal-header" style="border-bottom: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="font-size: 33px;">&times;</span>
            </button>
        </div>
      <div class="modal-body text-center">
	  	<?php if (!is_user_logged_in()) {
		  	set_query_var( 'column', 'col-sm-8 col-12');
		  	set_query_var( 'text_left', 'text-left');
		  	get_template_part( 'template-parts/oc-seeker-login-form-call-modal');
	  	} ?>	  	
      </div>
    </div>
  </div>
</div>
<?php if (!is_user_logged_in()){ ?>
<div class="modal fade" id="connect_with_healer_login" tabindex="-1" role="dialog" aria-labelledby="connect_with_healer_login" aria-hidden="true">
  <div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
	  	<?php
		  	set_query_var( 'column', 'col-sm-8 col-12');
		  	set_query_var( 'text_left', 'text-left');
		  	set_query_var( 'call_consult' , '1');
		  	get_template_part( 'template-parts/seeker-login-form-modal');
	  	?>
      </div>
	</div>
  </div>
</div>
<?php } ?>
<?php // include_once get_stylesheet_directory().'/footer1.php'; 
get_footer(); ?>
<script type="text/javascript">
	$('#select_therapy').on('change', function() {
		var url = $(this).val(); // get selected value
		if (url) { // require a URL
		  window.location = url; // redirect
		}
		return false;
	});
    $("#d_opensignupform, #d_opensignupform1, #d_opensignupform2, #d_opensignupform3, #m_opensignupform, #m_opensignupform1, #m_opensignupform2, #m_opensignupform3").on('click', function(){
        $(".modal-body #reg_unhide #payment").val(0);
        $("#call_with_healer").modal('show');
    });
    // $(document).ready(function () {
    //     var size_li = $(".custom_therapiest_list > div.tlistpage").length;
    //     var x=4;
    //     $(".custom_therapiest_list > div.tlistpage:lt("+x+")").show();
    //     $("#loadMore").click(function () {
    //         x = (x+4 <= size_li) ? x+4 : size_li;
    //         $('.custom_therapiest_list > div.tlistpage:lt('+x+')').show();
    //         if(x == size_li){
    //             $("#loadMore").css("display","none");
    //         }
    //     });
    // });
</script>