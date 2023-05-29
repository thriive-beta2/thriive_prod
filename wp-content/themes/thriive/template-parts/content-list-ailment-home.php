<?php $ailment_image = get_field('ailment_image', $ailment_term); 
		$ailment_img = wp_get_attachment_image_src( $ailment_image, 'thumbnail' );
?>
<div class="col-12 section-wrapper-listing p-0">
	<div class="connect-healer-circle">
		<div class="inner-healer-circle">
			<a href="<?php echo get_term_link( $ailment_term->slug, 'ailment' );?>?utm_source=homepage&utm_medium=<?php echo (is_mobile()) ? 'mobile' : 'desktop'; ?>&utm_campaign=<?php echo $ailments_name ;?>&utm_term=<?php echo (is_tax('therapy')) ? get_the_title() : $ailment_term->name; ?>&utm_content=<?php echo $position;?>">
				<img title="<?php echo $ailment_term->name; ?>" src="<?php echo $ailment_img[0]; ?>" alt="<?php echo $ailment_term->name; ?>">
			</a>
		</div>
	</div>
	<div class="txt-wrap mt-3">
		<h5><a href="<?php echo get_term_link( $ailment_term->slug, 'ailment' );?>?utm_source=homepage&utm_medium=<?php echo (is_mobile()) ? 'mobile' : 'desktop'; ?>&utm_campaign=<?php echo $ailments_name;?>&utm_term=<?php echo (is_tax('therapy')) ? get_the_title() : $ailment_term->name; ?>&utm_content=<?php echo $position;?>"><?php echo $ailment_term->name; ?></a></h5>
		<?php
			if(!empty($sub_title))
			{
				?><p class="text-highlight mb-3"><?php echo $sub_title; ?></p><?php
			}
		?>
	</div>
</div>