<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thriive
 */

?>

<!-- delete User popup -->
<div class="modal fade" id="delete_user_popup" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
	        <!-- commented bcoz duplicate id issue so changed id -->
<!--          <form data-parsley-validate class="form-element-section"  id="formrequest_news_letter" name="request_news_letter" action="#" method="post"> -->
         <form data-parsley-validate class="form-element-section"  id="form_delete_user" name="request_news_letter" action="" method="post">
	         <div class="row section col-sm-12 col-12 mx-auto p-0">
		        <div class="col-12">
			        <p id="delete_default_msg">Hey! Are you sure you no longer want to be a part of the Thriive Tribe?</p>
				 	<div id="result_delete_user" style="display:none;">
					 	<h5>WE ARE GOING TO MISS YOU!</h5>
					 	<p>We are sorry you had to experience this. Could you tell us what went wrong and made you take this step? Do let us know so we can make changes to straighten out things for a better experience in future.</p>
					 	<p>Your reason for leaving Thriive:</p>
					 	<div class="radio">
						 	<label><input type="radio" value="Website Content" name="delete_reason" style="margin-right: 10px;" data-parsley-required-message="Reason is required." data-parsley-errors-container="#reason_holder" required>Website Content</label>
						</div>
						<div class="radio">
							<label><input type="radio" value="Promotional notifications" name="delete_reason" style="margin-right: 10px;" data-parsley-required-message="Reason is required." data-parsley-errors-container="#reason_holder" required>Promotional notifications</label>							
						</div>
						<div class="radio disabled">
							<label><input type="radio" value="Other" name="delete_reason" style="margin-right: 10px;" data-parsley-required-message="Reason is required." data-parsley-errors-container="#reason_holder" required>Other</label>							
						</div>
						<div id="reason_holder"></div>
						<div class="form-group" id="tell_us_more_block" style="display:none;">
							<label>Tell us more</label>
							<textarea rows="3" id="tell_us_more" class="form-control" data-parsley-required-message="Tell us more is required." required></textarea>
						</div>
				 	</div>
				</div>
			  	<?php
				  	$current_user = wp_get_current_user();
					if(in_array("therapist", $current_user->roles))
					{
						$page_id = "339";
					}
					else if(in_array("subscriber", $current_user->roles))
					{
						$page_id = "548";
					}
			  	?>
			  	<button type="button" class="btn d-inline btn-primary" id="btnNo" data-dismiss="modal" onclick="location.href='<?php echo get_permalink($page_id); ?>';">No</button>
	            <button type="button" class="btn d-inline btn-primary" id="delete_user">Yes</button>
	            <button type="submit" class="btn btn-primary" id="delete_reason_submit" style="display: none;">Unsubscribe</button>	            
	         </div>
         </form>                  
        </div>
      </div>
    </div>
  </div>

<div style="clear:both"></div>
    <style>
        .option_ul{
            list-style-type: none;
            padding-bottom: 2%;
            overflow: hidden;
/*            background-color: #f2f2f23d;*/
            margin-bottom: 10%;
        }
        .option_li{
            float: left;
        }
        .option_li a,.option_li span{
            display: block;
            padding: 8px 25px;
            background-color: #fcfcfc;
            text-decoration: none;
            margin:10px;
            border-radius: 8px;
        }
        @media screen and (min-width: 480px) {
            .option_li a,.option_li span{
                margin:3px 10px !important;
            }
        }
    </style>
<?php 
	if(is_tax('therapy') && !isset($_GET['area'])){
		$term = get_queried_object();
		$hyperlocalwitharea = get_field('hyperlocal_keyword_with_area',$term);
		$hyperlocal = get_field('hyperlocal_keyword',$term);
		if($hyperlocalwitharea) {
            echo "<div class='container' style='background-color: #f2f2f23d'>";
			echo "<h3 class='mb-3'>Searches related to $term->name</h3>";
			$explodekeyword = explode(', ', $hyperlocalwitharea);
            echo "<div class='option_ul'>";
			foreach ($explodekeyword as $keyword) {
				$keywordurl = str_replace(' ', '+', $keyword);
                echo "<li class='option_li'><a href='?area=$keywordurl&therapy=$term->slug'>$term->name in $keyword </a></li>";
//				echo "<span><a href='?area=$keywordurl&therapy=$term->slug' style='background: #fff; border-radius: 5px;  padding: 6px; font-size: 14px; margin-right: 20px; font-weight: 500;'>$term->name in $keyword </a></span>";
			}
			echo "</div>";
			echo "</div>";
		} else if($hyperlocal){
			echo "<div class='container' style='background-color: #f2f2f23d'>";
			echo "<h3 class='mb-3'>Searches related to $term->name</h3>";
			$explodekeyword = explode(',', $hyperlocal);
            echo "<div class='option_ul'>";
			foreach ($explodekeyword as $keyword) {
                echo "<li class='option_li'><span>$keyword</span></li>";
//				echo "<span style='background: #fff; border-radius: 5px;  padding: 6px; font-size: 14px; margin-right: 20px; font-weight: 500;'>$keyword</span><span style='margin:0 3%;'>";
			}
            echo "</div>";
			echo "</div>";
		}
	} 
	if(!empty($_GET)){
		if($_GET['therapy'] || $_GET['area']){
			$term = get_term_by( 'slug', $_GET['therapy'], 'therapy');
			$area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
			$hyperlocalwitharea = get_field('hyperlocal_keyword_with_area',$term);
			$hyperlocal = get_field('hyperlocal_keyword',$term);
			if($hyperlocalwitharea) {
				echo "<div class='container' style='background-color: #f2f2f23d'>";
				echo "<h3 class='mb-3'>Searches related to $term->name in $area</h3>";
				$explodekeyword = explode(', ', $hyperlocalwitharea);
	            echo "<div class='option_ul'>";
				foreach ($explodekeyword as $keyword) {
					$keywordurl = str_replace(' ', '+', $keyword);
	                echo "<li class='option_li'><a href='?area=$keywordurl&therapy=$term->slug'>$term->name in $keyword </a></li>";
	//				echo "<span><a href='?area=$keywordurl&therapy=$term->slug' style='background: #fff; border-radius: 5px;  padding: 6px; font-size: 14px; margin-right: 20px; font-weight: 500;'>$term->name in $keyword </a></span>";
				}
				echo "</div>";
				echo "</div>";
			} else if($hyperlocal){
				echo "<div class='container' style='background-color: #f2f2f23d'>";
				echo "<h3 class='mb-3'>Searches related to $term->name</h3>";
				$explodekeyword = explode(',', $hyperlocal);
	            echo "<div class='option_ul'>";
				foreach ($explodekeyword as $keyword) {
	                echo "<li class='option_li'><span>$keyword</span></li>";
	//				echo "<span style='background: #fff; border-radius: 5px;  padding: 6px; font-size: 14px; margin-right: 20px; font-weight: 500;'>$keyword</span>";
				}
				echo "</div>";
				echo "</div>";
			}
		}
	}
?>
<div style="clear:both"></div>
<footer class="footer-wrapper">
		
	<div class="mt-4 container text-left h-100">
		
		<!-- <div class="row footer-menu-item">
			<div class="col-12 col-md footer-menu-list-wrapper">
				<h2>Thriive <span class="fa fa-plus-square"></span></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu1',
						'menu_id' => 'footer_menu1',
						'menu_class' => 'footer-menu',            
					));
				?>
			</div>
			<div class="col-12 col-md footer-menu-list-wrapper">
				<h2>For Seekers <span class="fa fa-plus-square"></span></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu2',
						'menu_id' => 'footer_menu2',
						'menu_class' => 'footer-menu',            
					));
				?>
			</div>
			<div class="col-12 col-md footer-menu-list-wrapper">
				<h2>For Therapist <span class="fa fa-plus-square"></span></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu3',
						'menu_id' => 'footer_menu3',
						'menu_class' => 'footer-menu',            
					));
				?>
			</div>
			<div class="col-12 col-md footer-menu-list-wrapper">
				<h2>More <span class="fa fa-plus-square"></span></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu4',
						'menu_id' => 'footer_menu4',
						'menu_class' => 'footer-menu',            
					));
				?>
			</div>
			<div class="col-12 col-md ">
				<h2>Social <span class="fa fa-plus-square"></span></h2>
				<ul class="footer-menu-list-hide">
					<li><a href="https://www.facebook.com/thriiveindia" target="_blank">Facebook</a></li>
					<li><a href="https://twitter.com/thriiveindia" target="_blank">Twitter</a></li>
					<li><a href="https://www.linkedin.com/in/thriive-india-390795187/" target="_blank">Linkedin</a></li>
					<li><a href="https://www.youtube.com/thriiveartandsoul" target="_blank">Youtube</a></li>
					<li><a href="https://www.instagram.com/thriiveindia/" target="_blank">Instagram</a></li>
				</ul>
			</div>
		</div> -->

		<div class="mt-2 row text-center" style="padding-top: 10px;">
			<!-- <h4 class="w-100">thriive social</h4> -->
			<p class="w-100">© <?php echo date('Y'); ?> THRIIVE ART & SOUL LLP. All Rights Reserved.</p>
		</div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="request_popup" tabindex="-1" role="dialog" aria-labelledby="request_popup" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center form-element-section">
	  	<p class="text-highlight" id="adminPopupDefault">We, at Thriive, aim to respond promptly to your queries and questions. Please provide us the reason in the box below for our account manager’s information.</p>
	  	<p class="text-highlight" id="result_accountManager"></p>
	  	<div class="form-group">
	  	 <textarea rows="3" class="form-control" id="accountMsg"></textarea>
	  	</div>
         <button type="button" class="btn btn-primary d-inline" data-dismiss="modal">CLOSE</button>      
         <button type="button" class="btn btn-primary d-inline" id="contact_account_manager">Submit</button>
         
         
      </div>

    </div>
  </div>
</div>


<!-- Sharing options -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <?php echo do_shortcode('[TheChamp-Sharing]');?>
    </div>
  </div>
</div>

<div class="modal fade" id="request_for_blog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
<!-- 	duplcated id issue rename form id         -->
<!--          <form data-parsley-validate class="form-element-section"  id="form_request_for_blog" name="request_for_blog" action="#" method="post"> -->
         <form data-parsley-validate class="form-element-section"  id="form_request_for_blog2" name="request_for_blog" action="" method="post">
	         <?php //wp_nonce_field('request_for_blog'); ?>
	         <div class="row section col-sm-12 col-12 mx-auto p-0">
		        <div class="col-12">
				 	<div id="result_blog"></div>
				</div>
			  	
			  	<button type="button" class="btn d-inline btn-primary" id="btn_cancel_blog" data-dismiss="modal">CANCEL</button>
<!-- 	duplcated id issue rename form id  		  	 -->
<!-- 	            <button type="button" class="btn d-inline btn-primary" id="submit_request_blog" name="submit_request_blog">REQUEST</button> -->
<button type="button" class="btn d-inline btn-primary submit_request_blog_id" id="submit_request_blog2" name="submit_request_blog">REQUEST</button>

	         </div>
         </form>                  
        </div>
      </div>
    </div>
 </div>
  
 <div class="modal fade" id="request_for_news" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
         <form data-parsley-validate class="form-element-section"  id="formrequest_news_letter" name="request_news_letter" action="" method="post">
	         <?php wp_nonce_field('request_news_letter'); ?>
	         <div class="row section col-sm-12 col-12 mx-auto p-0">
		        <div class="col-12">
				 	<div id="result_news"></div>
				</div>
			  	
			  	<button type="button" class="btn d-inline btn-primary" id="btn_cancel_news" data-dismiss="modal">CANCEL</button>
	            <button type="button" class="btn d-inline btn-primary" id="submit_request_news_letter" name="submit_request_news_letter">REQUEST</button>
	         </div>
         </form>                  
        </div>
      </div>
    </div>
 </div>
  
  
 <div class="modal fade" id="contact_admin" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
         <form data-parsley-validate class="form-element-section"  id="form_request_for_blog" name="request_for_blog" action="" method="post">
	         <?php //wp_nonce_field('request_for_blog'); ?>
	         <div class="row section col-sm-12 col-12 mx-auto p-0">
		        <div class="form-group col-12">
				 	<label for="mobile-number">Content</label>
				  	</div>
			  	
			  	<button type="button" class="btn d-inline btn-primary" id="btn_cancel_admin">CANCEL</button>
	            <button type="submit" class="btn d-inline btn-primary submit_request_blog_id" id="submit_request_blog" name="submit_request_blog">REQUEST</button>
	         </div>
         </form>                  
        </div>
      </div>
    </div>
 </div>
<?php 
				$current_user = wp_get_current_user();
				?>	
				<input type="hidden" name = "session_user" id="session_user" value="<?php echo $current_user->ID ?>" />
<div class="table-responsive">
      <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>

 <div class="modal fade" id="renewPackage" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
         <div class="form-element-section">
	         <div class="row section col-sm-12 col-12 mx-auto p-0">
		        <div class="form-group col-12 renew_text text-center">
				 	Hey! We at Thriive are excited about you joining us for yet another year of spreading healing light to the world.
				</div>
				<div class="form-group col-12 renew_text_msg text-center"></div>
			  	<button type="button" class="btn d-inline btn-primary" data-dismiss="modal" id="closeRenewPackage">CANCEL</button>
	            <button type="button" class="btn d-inline btn-primary" id="btnRenwPackage">Renew Now</button>
	         </div>
         </div>                  
        </div>
      </div>
    </div>
 </div>
</footer>
<?php if(is_singular('post')){ ?>
<div class="subscribe_footer">
	<div class="container">
		<div class="row w-70">
			<div class="col-12">
				<span class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></span>
				<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true tabindex=49]'); ?>
			</div>
		</div>
	</div>
	
</div>
<?php }?>
<?php 
if(isset($_GET['chat']) && $_GET['chat'] == 'yes')
{
echo "<script>check_box_open()</script>";
}
 ?>
<?php wp_footer(); ?>
<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
<script type='text/javascript' src="<?php echo site_url() ?>/wp-content/themes/thriive/js/ajax06122019.js?id=<?php echo rand(); ?>"></script>
<!-- Quora Pixel Code (JS Helper) -->
<script>
!function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
qp('init', 'a1f258d387944a499b7c09965cdb5588');
qp('track', 'ViewContent');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/a1f258d387944a499b7c09965cdb5588/pixel?tag=ViewContent&noscript=1"/></noscript>
<!-- End of Quora Pixel Code -->

<?php /* if(!is_archive('therapist') && !is_page('therapist-account-dashboard') && !is_page('my-account-page') && !is_singular('therapist') && !is_page('talk-to-best-numerologist-online') && !is_page('talk-to-best-angel-card-reader-online') && !is_page('talk-to-best-tarot-card-reader-online') && !is_page('talk-to-best-astrologer-online')  && !is_page('talk-to-astrologer-online')) { ?>
<!-- start freshchat -->
<script>
  function initFreshChat() {
    window.fcWidget.init({
      token: "874e936b-4467-4f77-89a1-824acbc3e9cd",
      host: "https://wchat.freshchat.com"
    });
  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>
<!-- end freshchat -->
<?php } */ ?>

</body>
</html>