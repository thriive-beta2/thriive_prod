<?php get_header(); ?>	
<script> lead_form_id = <?php echo $post->ID; ?></script>
<?php 
	// If user already registered
	if(is_user_logged_in()) 
	{ 
		$current_user = wp_get_current_user();
		if(($current_user->is_mobile_verify)==1)
		{
			$redirect = site_url('/my-account-page/');
			echo "<script>window.location.href = '$redirect';</script>";			
		}
	} 
	
	
	if (have_posts())
	{
		the_post();
		?>
		<div class="container">
			<h1 class="entry-title w-100 blog-title mt-3"><?php the_title()?></h1>
			<div class="col-12 p-0 blog-wrapper text-justify blog-single-txt pb-2">
				<?php 
					the_content();
				?>
				<div class="m-1 divider"></div>
				<section class="section form-element-wrapper">
					<div class="container">
					<?php
						set_query_var( 'column', 'col-sm-4 col-12');
						set_query_var( 'text_left', '');
						set_query_var( 'lead_form_id', get_the_id());
						get_template_part('template-parts/seeker-login-form');
					?>
					</div>
				</section>
			</div>
		</div>
		<?php
		get_template_part('template-parts/seeker-mobile-otp-validation');
	}
	
	if(is_user_logged_in())
	{
		if(($current_user->is_mobile_verify)==0)
		{
			?>
			<script type="text/javascript">
				//$('.iti__country[data-dial-code="91"]').addClass('');
				$("#mobile_verfication_modal").modal();
			</script>
			<?php
		}	
	}
?>
<style>
h1 {
    font-size: 24px !important;
    font-weight: 400;
}

.model_header_text {
    margin: 0px;
    color: #a0a0a0;
    font-size: 12px;
}
.text-center {
    text-align: center!important;
}


.blog-wrapper .btn-primary {
    background: #4f0475;
    border-color: #77787b;
}

</style>
<?php get_footer(); ?>