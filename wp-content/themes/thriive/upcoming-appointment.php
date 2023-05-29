<?php /* Template Name: Upcoming Appintment */ 
$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php';

if (!is_user_logged_in()) 
	{ 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		
	}
include_once get_stylesheet_directory().'/new-header.php';
?>
<div class="banner-home">
	<div class="container">	
		<div id="therapyres">	
			
			<section class="topreadingList">
			<a href="/my-account-page" class="back-btn"> < BACK </a>
								
				<?php
					echo "SELECT o.id,o.category_name,o.payment_txnid,o.tid,o.uid,c.book_date,c.book_time,o.uname FROM online_consultation o,oc_video_call c WHERE o.tid = '". $current_user->ID ."'  AND DATE(c.book_date) >= 'CURDATE()' AND TIME(c.book_time) > 'NOW()' AND o.payment_status = 'success' AND o.id = c.oc_id";
					$sessiondata = $wpdb->get_results("SELECT o.id,o.category_name,o.payment_txnid,o.tid,o.uid,c.book_date,c.book_time,o.uname FROM online_consultation o,oc_video_call c WHERE o.tid = '". $current_user->ID ."'  AND DATE(c.book_date) >= CURDATE() AND TIME(c.book_time) > NOW() AND o.payment_status = 'success' AND o.id = c.oc_id");

					if(!empty($sessiondata)){
						echo "<h3>Upcoming Appointments</h3>";
						$duparr = array();	
						foreach($sessiondata as $sd){
							set_query_var('appointment_details',$sd);
							get_template_part('template-parts/upcoming-appointment');
						}
					}
					 ?>			
				
				</section>
			</div>	
		</div>
	</div>		
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
