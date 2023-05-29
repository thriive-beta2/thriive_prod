<?php $therapy_image = get_field('therapy_image', $therapy_term);
$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' ); ?>

	<a href="<?php echo site_url().'/'.$therapy_term->custom_link; ?>"><div class="therapy">
		<table><tr><td><h5><?php echo $therapy_term->name; ?></h5></td></tr></table>
		<img title="<?php echo $therapy_term->name; ?>" src="<?php echo $therapy_img[0]; ?>" alt="<?php echo $therapy_term->name; ?>">
			<div class="lower_bg">Begin Therapy ></div>
	</div></a>
