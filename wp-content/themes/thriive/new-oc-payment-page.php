<?php /* Template Name: New Payment page */ 
if (!is_user_logged_in()) { 
  wp_redirect('/login/');
  exit();
}
$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php'; ?> 
<style type="text/css">
    @media only screen and (max-width: 580px) {
           .slick-slide {
               margin: 0px 5px !important;
           }
       }
       .slick-slide {
           margin: 0px 20px;
       }

       .slick-slide img {
           width: 100%;
       }

       .slick-slider {
           position: relative;
           display: block;
           box-sizing: border-box;
           -webkit-user-select: none;
           -moz-user-select: none;
           -ms-user-select: none;
           user-select: none;
           -webkit-touch-callout: none;
           -khtml-user-select: none;
           -ms-touch-action: pan-y;
           touch-action: pan-y;
           -webkit-tap-highlight-color: transparent;
       }

       .slick-list {
           position: relative;
           display: block;
           overflow: hidden;
           margin: 0;
           padding: 0;
       }

       .slick-list:focus {
           outline: none;
       }

       .slick-list.dragging {
           cursor: pointer;
           cursor: hand;
       }

       .slick-slider .slick-track,
       .slick-slider .slick-list {
           -webkit-transform: translate3d(0, 0, 0);
           -moz-transform: translate3d(0, 0, 0);
           -ms-transform: translate3d(0, 0, 0);
           -o-transform: translate3d(0, 0, 0);
           transform: translate3d(0, 0, 0);
       }

       .slick-track {
           position: relative;
           top: 0;
           left: 0;
           display: block;
       }

       .slick-track:before,
       .slick-track:after {
           display: table;
           content: '';
       }

       .slick-track:after {
           clear: both;
       }

       .slick-loading .slick-track {
           visibility: hidden;
       }

       .slick-slide {
           display: none;
           float: left;
           height: 100%;
           min-height: 1px;
       }

       [dir='rtl'] .slick-slide {
           float: right;
       }

       .slick-slide img {
           display: block;
       }

       .slick-slide.slick-loading img {
           display: none;
       }

       .slick-slide.dragging img {
           pointer-events: none;
       }

       .slick-initialized .slick-slide {
           display: block;
       }

       .slick-loading .slick-slide {
           visibility: hidden;
       }

       .slick-vertical .slick-slide {
           display: block;
           height: auto;
           border: 1px solid transparent;
       }

       .slick-arrow.slick-hidden {
           display: none;
       }
     .payclass{
       margin-top:16px !important;
     }
     .popular_btn{
       font-size:14px !important;
     }
     .c_purple {
      color: #153483 !important;
     }
     .text_box_free {
        background-color: #fff;
        border: 1px solid #f2f2f2;
        padding: 10px 5px;
        height: 135px;
        margin-bottom: 15%;
        border-radius: 10px;
        box-shadow: 1px 1px 4px #0000000d;
    }
    h5 {
      font-size: 15px;
      color: #000;
      font-family: sans-serif;
    }
    .text_line_free {
      text-decoration: line-through;
      color: #b5a8a8;
      font-weight: 700;
    }
	.package_accordion ul li {
    padding: 0;
    margin: 0;
    margin-right: 10px;
    position: relative;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    flex-shrink: 0;
}
.f_12 {
    font-size: 14px !important;
    font-weight: 600;
}
</style>
<?php if($current_user->roles[0] == 'subscriber'){
    $slug = $_GET['q'];
    $action = $_GET['a'];
    $therapy = $_GET['t'];
    $payment_type = isset($_GET['pt']) ? $_GET['pt'] : '';
    $mypost = get_page_by_path($_GET['q'], '', 'therapist');
    $post = get_post($mypost->ID);
    setup_postdata( $post ); 
    if($action == "video_call" || $action == "book_later"){
        $date_time = $_POST['selected_date'].'_'.$_POST['time'];
    } else {
        $date_time = "";
    } ?>
    <div class="container">
        <div class="row">
    
          
				<div id="remainingdiv"></div>
		<?php 	
//AND therapy_name = '".$_GET['t']."'
	$sessiondata = $wpdb->get_row("SELECT remaining_session,session_duration  FROM online_consultation WHERE uid = '". $current_user->ID ."'  AND payment_status='success' AND remaining_session > 0 ");
	if($sessiondata->remaining_session > 0){ ?>	
		<script>
			$('#remainingdiv').append("You have an Existing Session of <?php echo $sessiondata->session_duration;?> min.<br/>Press Continue to check if Therapist is Available & Start your Session Now.<br/><br/> ");
		</script>	
	<?php 
	   if($_GET['t'] == 'tarot-card-reading' || $_GET['t'] == 'angel-reading' || $_GET['t'] == 'vastu-shastra' || $_GET['t'] == 'cosmic-astrology' || $_GET['t'] == 'aura-reading'  || $_GET['t'] == 'numerology' || $_GET['t'] == 'sex-therapist' || $_GET['t'] == 'counseling-consulting' || $_GET['t'] == 'meditation' || $_GET['t'] == 'life-coach'){
		?>
			

		<script>
		$('#remainingdiv').append('		 <div class="text-center"><button type="button" class="contbtn"><a href="<?php echo site_url();?>/session-thankyou-page?q=<?php echo $_GET["q"];?>&a=<?php echo $_GET["a"];?>&t=<?php echo $_GET["t"]; ?>"><span class="clicktxt">Continue</span></a></button><br/></div>');
		</script>
	
	<?php 
		}
	}
	if($sessiondata->remaining_session == 0){ 	
	?>
            <section class="widgetblock ">
                <div class="heading_payment">
                    <p><i><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/2020-09-25_.png'; ?>" alt=""> </i> Pick your plan</p>
                </div>
                <div class="money_back">
                    <p>100% Money Back Guarantee</p>
                </div>
                <?php 
		
				if( have_rows('coupon_prices','option') ):
                    // loop through the rows of data
                    while ( have_rows('coupon_prices','option') ) : the_row();
                        $temparr = array();
                        foreach(get_sub_field('therapy') as $t){
                            array_push($temparr,get_sub_field('custom_therapy'));
                            array_push($temparr, $t->slug);
                        }
                        if(in_array($therapy, $temparr)){ ?>
                            <div class="coupon_code" id="opencouponform">
                                <p><i><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/2020-09-25.png'; ?>" width="25" alt=""> </i> Apply Coupon Code</p>
                            </div>
                            <p id="coupon_msg" style="color: red;" class="text-center"></p>
                            <form method="post" style="display: none;" id="coupon_form" class="text-center">
                                <input type="hidden" id="slug" value="<?php echo $slug; ?>" />
                                <input type="hidden" id="action" value="<?php echo $action; ?>" />
                                <input type="hidden" id="therapy" value="<?php echo $therapy; ?>" />
                                <input type="text" id="coupon_code" autocomplete="off" class="input_class" />
                                <input type="button" name="apply_coupon" class="btn btn-coupon" id="apply_coupon" value="Apply" />
                            </form>
                        <?php } 
                    endwhile; 
                endif; ?> 
            </section>
          
        </div>
        <?php if($payment_type == ""){ ?>
        <div class="row">
            <section class="widgetblock">
                <section class="package_accordion">
                    <ul>
                        <?php if( have_rows('package_details','option') ):
                            // loop through the rows of data
                            while ( have_rows('package_details','option') ) : the_row();
                                $temparr = array();
                                array_push($temparr,get_sub_field('custom_therapy'));
                                foreach(get_sub_field('therapy') as $t){
                                    array_push($temparr, $t->slug);
                                }
                                if(in_array($therapy, $temparr)){
                                    foreach(get_sub_field('call_packages') as $call){ 
                                      $plan_title = $call['title'];
                                      $plan_cost = $call['discount_price'];
                                        if($call['is_popular']){
                                            echo "<li class='most_popular'><form method='post' action='".PAYU_BASE_URL."'>";
                                        } else {
                                            echo "<li class='payclass'><form method='post' action='".PAYU_BASE_URL."'>";
                                        }                                    
                                        $hash_string = '';
                                        $posted = array();
                                        $posted['key'] = MERCHANT_KEY;
                                        $posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20); 
                                        $posted['amount'] = $call['discount_price'];
                                        $posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_login;
                                        $posted['email'] = $current_user->user_email; 
                                        $posted['phone'] = $current_user->mobile; 
                                        $posted['productinfo'] = $therapy;
                                        $posted['udf1'] = $call['title'];
                                        $posted['udf2'] = $posted['amount'].','.$call['no_of_sessions'].','.$call['description'].','.$amountarr[$k].','.$call['session_duration'].','.$action;
                                        $posted['udf3'] = $slug;
                                        $posted['udf4'] = '';
                                        $posted['udf5'] = $date_time;
                                        $hash = '';
                                        $hashVarsSeq = explode('|', HASH_SEQUENCE);
                                        foreach($hashVarsSeq as $hash_var) {
                                            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                                            $hash_string .= '|';
                                        }
                                        $hash_string .= SALT;
                                        $hash = strtolower(hash('sha512', $hash_string)); ?>
                                        <?php if($call['is_popular']){ ?>
                                            <div class="col-md-12 col-xs-12" style="padding:0px">
                                                <p class="text-center popular">Most Popular</p>
                                            </div>
                                        <?php } ?>
                                        <div class="text_box">
                                            <div class="head_text">
                                                <div class="row">
                                                    <?php if($call['title']){ ?>
                                                        <div class="col-md-6 col-xs-6 text-center">
                                                            <p class="text-center f_18 payment_heading"><?php echo $call['title']; ?></p>
                                                        </div>
                                                    <?php } 
                                                    if($call['discount_percent']){ ?>
                                                        <div class="col-md-6 col-xs-6">
                                                            <p class="text-center f_22 c_purple payment_heading" style="margin-bottom:0px;">&#8377; <?php echo $call['discount_price']; ?>/-</p>
                                                            <!-- <p class="text-center f_12 c_red">(2 min + 3 min free)</p> -->
                                                        </div>
                                                    <?php } ?>
                                                   <!-- <hr style="margin-left: 17px;border-top: 1px solid #c4c4c4;margin-right:17px;width:100%;margin-top: 0px;">-->
                                                    <?php if($call['discount_price'] && $call['price']) { ?>
                                                       <!-- <div class="col-md-6 col-xs-6 text-center">
                                                            
															<p class="text-center f_12 c_red"><?php echo $call['discount_percent']; ?></p>
														</div>
														<div class="col-md-6 col-xs-6 text-center">
                                                            <p class="text-center f_14 payment_heading" style="text-decoration:line-through; color:#cecece">&#8377; <?php echo $call['price']; ?>/-</p>
                                                        </div>-->
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <!-- <button class="btn popular_btn">GET STARTED</button> -->
                                                <input type="hidden" name="key" value="<?php echo MERCHANT_KEY; ?>" />
                                                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                                                <input type="hidden" name="txnid" value="<?php echo (empty($posted['txnid'])) ? '' : $posted['txnid']  ?>" /> 
                                                <input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
                                                <input type="hidden" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
                                                <input type="hidden" name="email"  value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
                                                <input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
                                                <input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"/>
                                                <input type="hidden" name="surl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&a='.$action.'&t='.$therapy;?>" />   
                                                <input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&a='.$action.'&t='.$therapy;?>" />
                                                <input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
                                                <input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
                                                <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
                                                <input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
                                                <input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
                                                <?php  echo "<td><input type='submit' name='pay_online_consultation' class='btn popular_btn' data-therapist='$slug' data-plan_title='$plan_title' data-plan_cost='$plan_cost' data-action='$action' data-therapy='$therapy' id='paid_payment_button' value='Pay Now'></td>";?>
                                            </div>
                                        </div>
                                        <?php echo "</form></li>";
                                    } 
                                } 
                            endwhile; 
                        endif; ?>
                    </ul>
                </section>
            </section>
        </div>
      <?php } 
	
      ?>
        <div class="row">
            <section class="widgetblock">
                <div class="heading_payment">
                    <p style="font-size: 16px;font-weight: 600;">100% Secure payment Powered by <i><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/ssl.png'; ?>" width="50" alt=""> </i> </p>
                </div>
                <div class="heading_payment">
                    <p ><i><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/star.png'; ?>" alt="" width="250"> </i></p>
                    <p style="font-size: 14px;">Our sessions are highly rated by our customer</p>
                </div>
            </section>
        </div>
        <div class="row">
            <section class="widgetblock">
                <div class="col-xs-4 col-md-4">
                    <p class="text-center f_28 text-center c_green">4.5/5</p>
                    <p class="rating_text f_12 text-center">High Customer Satisfaction</p>
                </div>
                <div class="col-xs-4 col-md-4">
                    <p class="text-center f_28 text-center c_green">349+ </p>
                    <p class="rating_text f_12 text-center">Session in Last Week</p>
                </div>
                <div class="col-xs-4 col-md-4">
                    <p class="text-center f_28 text-center c_green">80%</p>
                    <p class="rating_text f_12 text-center">Follow Up Sessions</p>
                </div>
            </section>
        </div>
		<?php 
		}
	
		?>
    </div>
<?php } 
include_once get_stylesheet_directory().'/new-footer.php'; 
if (is_user_logged_in()){ 
    if(checkfreesessionbyuser($current_user->ID)->count > 0 && $payment_type == "free"){ ?>
        <div class="modal fade" id="alreadyused" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
                        <img src="http://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/logo_thriive.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                                <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                        </button> -->
                      </div>
                    </div>
                    <div class="modal-body text-center">
                      <p>You have already used free session.</p>      
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">$("#alreadyused").modal();</script>
    <?php } if(checkuserisallowedfs($current_user->ID)->count == 0 && $payment_type == "free"){ ?>
        <div class="modal fade" id="regforfs" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
                        <img src="http://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/logo_thriive.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                                <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                        </button> -->
                      </div>
                    </div>
                    <div class="modal-body text-center">
                      <p>You are not registered for free session.<br/><a href="<?php echo site_url().'/free-session-landing-page';?>">Click here to register.</a></p>      
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">$("#regforfs").modal();</script>
    <?php }
} ?>