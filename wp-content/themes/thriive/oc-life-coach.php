<?php /* Template Name: Life Coach online consultation page */ 
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
		.och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: 18px !important;font-weight: 600 !important; font-size:15px !important}
            
    }
    
    h1 {
            font-size: 17px !important;
            color: #000 !important;
            font-family: 'Open Sans',sans-serif !important; 
            font-weight: bold !important;
        }
    h5  {
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }
    h2 {
            font-size: 30px;
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

.och1title{color: #333333 !important; text-align:left;margin-top: 18px;margin-bottom: -18px;font-weight: 500;font-size:24px}
.och2title{color: #484848 !important;     text-align: left; margin-top: 18px;  margin-bottom: -10px;   font-weight: 500;  font-size: 16px !important;  letter-spacing: -.02em;   font-family: galano,san-serif;  -webkit-font-smoothing: antialiased;}

.packdur{margin-top: -12px;font-weight:600;font-family:Segoe UI, Roboto, open sans, sans-serif;}

.plansel{padding-top:10px;font-family:Segoe UI, Roboto, open sans, sans-serif;text-align:center;font-weight: 600;}
.freemin {    margin-top: -20px; font-family:Segoe UI, Roboto, open sans, sans-serif;   font-weight: 600;    text-align: center;    margin-bottom: -15px; color:#ff0000b8}
hr{    margin-top: -5px;    border-color: #b3b9b9;    margin-bottom: 20px;    width: 60%;}
</style>
<!-- Desktop -->
<section class="hidden-xs" >
    <div class="container">
         <div class="row">
             <div class="col-md-12" style="padding: 0px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform" <?php } ?>>
                 <!--<img src="/wp-content/uploads/2020/07/banner.jpg" class="img-responsive" alt="signup now" style="padding-top: 20px;">-->	
                 <img src="/wp-content/uploads/2020/08/Stress-Coach-Landing-page-2-01.jpg" class="img-responsive" alt="signup now" style="padding-top: 20px;">
             </div>
         </div>
     </div>

   <!--  <div class="container"> 
        <h2 class="plansel"><i class="fa fa-check-circle" style="font-size:23px;color:#f9b031"></i>Select the plan and consult now</h2> 
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"style="margin-bottom:10px;">           
            <div class="column" style="background-color:#fff; text-align:center;border: 1px solid #ccc;box-shadow: 1px 1px 5px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform1" <?php } ?>>
                <h3 class="packrup">5 Mins</h3>
                <hr>
                
                <p class="freemin">₹ 99</p>
              </div>
              <div class="column" style="background-color:#fff;text-align:center;border: 1px solid #ccc;box-shadow: 1px 1px 5px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform2" <?php } ?>>
                <h3 class="packrup" >20 Mins</h3>
                <hr>
                
                <p class="freemin">₹ 499</p>
              </div>
              <div class="column" style="background-color:#fff;text-align:center;border: 1px solid #ccc;box-shadow: 1px 1px 5px;" <?php if (!is_user_logged_in()){ ?>id="d_opensignupform3" <?php } ?>>
                <h3 class="packrup">2 Sessions</h3>
                <hr>
                
                <p class="freemin">₹ 899</p>
              </div>
            </div>
            <div class="col-md-2"></div>
            <div class="" style="clear: :both"></div>
              
        </div>
    </div>-->
   </section>
    <!-- Mobile -->
   <section class="hidden-sm hidden-xl hidden-lg">
     <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding: 0px;" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform" <?php } ?>>
                <img src="/wp-content/uploads/2020/08/Stress-Coach-Landing-page-2-01.jpg" class="img-responsive" alt="signup now" style="padding-top: 20px;">
            </div>
        </div>
    </div>
      <div class="" style="clear: :both"></div>
    
    <div style="clear:both"></div>
         
   <!--  <div class="container"> 
            <h2 class="plansel"><i class="fa fa-check-circle" style="font-size:23px;color:#f9b031"></i>Select the plan and consult now</h2> 
        <div class="row">
              <div class="column" style="background-color:#fff; text-align:center;border: 1px solid #ccc;box-shadow: 1px 1px 5px;" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform1" <?php } ?>>
                <h3 class="packrup">5 Mins</h3>
                <hr>
                
                <p class="freemin">₹ 99</p>
              </div>
              <div class="column" style="background-color:#fff;text-align:center;border: 1px solid #ccc;box-shadow: 1px 1px 5px;" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform2" <?php } ?>>
                <h3 class="packrup">20 Mins</h3>
                <hr>
                
                <p class="freemin">₹ 499</p>
              </div>
              <div class="column" style="background-color:#fff;text-align:center;border: 1px solid #ccc;box-shadow: 1px 1px 5px;" <?php if (!is_user_logged_in()){ ?>id="m_opensignupform3" <?php } ?>>
                <h3 class="packrup">2 Sessions</h3>
                <hr>
                
                <p class="freemin">₹ 899</p>
              </div>
        </div>
    </div>-->
   </section>
<header class="">
	<div class="banner-home">
		<div class="container">			
			<!--<select id="select_therapy" class="form-control mb-2 mt-2">
                <option value="<?php echo get_site_url()."/consult-online-with-counselor"; ?>"<?php echo $current_url == 'consult-online-with-counselor' ? 'selected': ''; ?>>All</option>
                <option value="<?php echo get_site_url()."/talk-to-best-counselor-online"; ?>" <?php echo $current_url == 'talk-to-best-counselor-online' ? 'selected': ''; ?>>Mental Health Coach</option>
                <option value="<?php echo get_site_url()."/talk-to-best-life-coach-online"; ?>" <?php echo $current_url == 'talk-to-best-life-coach-online' ? 'selected': ''; ?>>Stress Coach</option>
                <option value="<?php echo get_site_url()."/talk-to-best-meditation-online"; ?>" <?php echo $current_url == 'talk-to-best-meditation-online' ? 'selected': ''; ?>>Meditation Coach</option>
            </select>-->
			<h1 class="och1title">Get 1-to-1 Session with a Highly Qualified and Vetted Counselors that you can Trust</h1>
			<h2 class="och2title">Our therapists are experts in a wide range of therapies and mental health conditions.</h2></br>
			<div class="" style="clear: :both"></div>
			<?php
			$posts_per_page = 4;
			$start = 0;
			$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
			$start = ($paged-1)*$posts_per_page;
			// $getPost = $wpdb->get_results( 
			// 	"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN (58801,56778,54410,46561,57587,44780,42571,48564,55467,36458,40360,39041,35986,38354,36348,38096,56007,54569,53551,49935)"
			// );

            $getPost = $wpdb->get_results( 
                "SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN (56007,56778,36458,57587,39041,59975,58794,62765)"
            );

			// Loop Start
			if($getPost) : ?>
				<div class="therapist-wrapper section-loop-wrapper row">
					<div class="section_therapies_list therapiest_list col-12 col-sm-8 p-sm-0">
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
                            set_query_var('therapy','life-coach');
                            get_template_part( 'template-parts/content-detail-oc-listing');
                        }
                        wp_reset_postdata(); ?>		
					</div>
				</div>
			<?php endif; ?>
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
<div class="modal fade" id="mobile_verfication_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
            <div class="error-msg form-error" id="mobileExist"></div>
         <form data-parsley-validate class="form-element-section"  id="form_send_otp">
             <div class="row section col-sm-12 col-12 mx-auto p-0">
<!--                <a href="<?php echo wp_logout_url( '/login/' ); ?>">&times;</a> -->
<!--                <a href="" class="otp-form-close close" data-dismiss="modal">&times;</a> -->
                <div class="form-group col-12">
                    <label for="mobile-number">Please enter your mobile number for verification</label>
<!--                    <p class="sub-text"></p> -->
                    <input data-parsley-required="true" type="tel" data-parsley-required-message="Mobile is required." class="form-control international-number" id="mobile-number" value="<?php if($current_user->mobile) { '+' . $current_user->countryCode . $current_user->mobile; } ?>">
                </div>
                
                <button type="submit" class="btn d-inline btn-primary" id="send_otp">SEND OTP</button>
             </div>
         </form>                  
         <form data-parsley-validate class="form-element-section" id="mobile_verification">
             <div class="row section col-sm-12 col-12 mx-auto p-0 d-none" id="div_verify_otp">
                
                <div class="form-group col-12 ">
                    <label for="mobile-otp">Enter OTP</label>
                    <input data-parsley-required="true" type="text" data-parsley-required-message="OTP is required." data-parsley-maxwords="4" class="form-control" id="mobile-otp" id="mobile-otp">
                    <div class="loading-msg">Loading...</div>
                    <div class="otp-error"></div>
                </div>
                <button type="button" class="btn d-inline btn-primary" id="re_send_otp">RESEND OTP</button>
                <button type="submit" class="btn d-inline btn-primary" id="verify_otp">NEXT</button>
             </div>
         </form>
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
<?php } 
if(is_user_logged_in()) {
    $current_user = wp_get_current_user();
    if(($current_user->is_mobile_verify) == 0){
        echo '<script type="text/javascript">$("#mobile_verfication_modal").modal();</script>';
        echo $current_user->is_mobile_verify;
    }   
} ?>
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
</script>