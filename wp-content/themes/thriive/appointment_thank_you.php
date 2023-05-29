<?php /* Template Name: Appointment Thank you Page */

$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php';
	

?>
<style>
	.imgcontainer{
	    text-align: center;
	}
	.avatar{
	    border-radius: 50%;
	}
	.footer_text{
	    margin-top: 25px;
	}
	.tlistpage{
		background: #fff;
	}
	.text-center{
		font-family: open sans, sans-serif !important;
	}
	
	@media only screen and (max-width: 600px) {
		.octhank{padding-left:0px;padding-right:0px}
		.contg{font-weight:600;}
	}
	
	h5{color: #666666d9 !important;}
</style>
	<section>
		
				<div class="container octhank">
		            <div class="imgcontainer mt2">
		                <img src="wp-content/uploads/2020/07/chech.png" alt="" class="avatar" width="60" height="60">
		            </div>
		            <div class="text-center mt-2" style="margin:bottom:10px; padding:0px 15px;">
		                <h5 class="text-center">Thank you for booking an Appointment with us.</h5>
		            </div>
		            <div style="clear:both"></div>
					 <div class="text-center mt-2" style="margin:bottom:10px; padding:0px 15px;">
		                <h5 class="text-center">You have a Appointment With <?php echo $_POST['tname'];?> on<br/> <b> <?php echo date("dS M Y h:i a",strtotime($_POST['appointment_date']));?></b></h5>
		            </div>
		            <div style="clear:both"></div>
					
		        </div>
					
	



<style type="text/css">


	.therapist_data_img{
		
	}
	.therapist_data_img img{
		border-radius: 50%;
		width: 10rem;
		height: 10rem;
	}
	.therapist_data{
		width:100%;
		padding: 1% 5% 0 5%;
		display: flex;
    	justify-content: center;

	}
	.therapist_data_info_p{
		margin:0;
		padding: 0;
		line-height: 1.8;
		color: #6D6D6D;
	}
	.therapist_data_info{
		display: table-cell;
		vertical-align: middle;
	}
	.thankyou_desclaimer{
		display:block;
		margin:0 auto;
		width: 100%;
		text-align: center;
		background-color: #5EAA48;
    	padding: 3% 0;
	}
	.thankyou_desclaimer_thankyou{
		font-size: 28px;
		margin-bottom: 5px;
		color: #fff;

	}
	.thankyou_desclaimer_details{
		font-size: 18px;
		margin-bottom: 5px;
		color:#fff;

	}
	.session_duration{
		width:100%;
		text-align: center;
		margin:0 auto;
		background-color: #FFCF0C;
	    margin-top: 1%;
	    padding: 1% 0px;
	    font-weight: 500;
	}
	.therapist_data_cont{
				border: solid 2px #CECECE;
	}
	.thankyou_instructions{
		display:flex;
		width: 90%;
		justify-content: center;
    	margin: 0 auto;
	}
	.therapist_data_info_p_name{
		font-weight: 600;
		transform: scale(1,1.3);
		font-size: 22px;
		margin-top: 1.8rem;
	}





@media (min-width: 320px) and (max-width: 640px) {
	.therapist_data_img{
		display: table-cell;
		text-align: center;
	}
	.therapist_data_img img{
		border-radius: 50%;
		width: 7rem;
		height: 7rem;
	}
	.therapist_data{
		width:100%;
		padding: 5% 5% 0 5%;
		display: table;

	}
	.therapist_data_info_p{
		margin:0;
		padding: 0;
		line-height: 1.5;
		color: #6D6D6D;
	}
	.therapist_data_info{
		display: table-cell;
		vertical-align: middle;
	}
	.thankyou_desclaimer{
		display:block;
		margin:0 auto;
		width: 100%;
		text-align: center;
		background-color: #5EAA48;
    	padding: 3% 0;
	}
	.thankyou_desclaimer_thankyou{
		font-size: 20px;
		margin-bottom: 5px;
		color: #fff;

	}
	.thankyou_desclaimer_details{
		font-size: 14px;
		margin-bottom: 5px;
		color:#fff;

	}
	.session_duration{
		width:100%;
		text-align: center;
		margin:0 auto;
		background-color: #FFCF0C;
	    margin-top: 5%;
	    padding: 1% 0px;
	    font-weight: 500;
	}
	.therapist_data_cont{
				border: solid 2px #CECECE;
	}
	.thankyou_instructions{
		display:block;
		width: 90%;
		justify-content: unset;
    	margin: unset;
	}
	.therapist_data_info_p_name{
		font-weight: 600;
		transform: scale(1,1.3);
		font-size: unset;
		margin-top: unset;
	}
}
</style>

<div class="thankyou_desclaimer">
	<p class="thankyou_desclaimer_details">You have a <?php //echo ucfirst(explode(',',$_POST['udf2'])[5]);?> Session With</p>
</div>
<?php 
if(isset($_POST['appointconfirm'])){
	$_POST['status'] = "success";
	saveOCAppointmentData($_POST);
	$thrarr = explode(",",$_SESSION['therapist']);

	$mypost = get_page_by_path($thrarr[0], '', 'therapist');
	$post = get_post($mypost->ID);
?>
<div class="therapist_data_cont">
	<div class="therapist_data">
		<div class="therapist_data_img"><img src="<?php echo get_the_post_thumbnail_url( $mypost->ID, 'featured_post')?>"></div>
		<div class="therapist_data_info">
			<p class="therapist_data_info_p therapist_data_info_p_name" style=""><?php echo $post->post_title ;?></p>
			<p class="therapist_data_info_p">Session Booked</p>

		</div>	
	</div>
	<div class="session_duration">
		<p class="therapist_data_info_p" style="color: #000 !important;">Session Duration 30 Mins</p>
	</div>
	
</div>
<br>
<div class="thankyou_instructions">
	<ul>
		<li><p class="therapist_data_info_p">In case of any trouble during the session use <a href="<?php echo site_url();?>/issues-feedback-page">Issues/ Feedback </a> link in Menu.</p>
		</li>
		<li><p class="therapist_data_info_p">For any further queries or concerns please reach us at support@thriive.in</p></li>
	</ul>
	</section>
</div>
<?php 
} else {
	
	wp_redirect('/login/');
}	 
include_once get_stylesheet_directory().'/new-footer.php'; ?>

<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}

</script>