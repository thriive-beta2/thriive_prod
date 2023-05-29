<?php 
	//print_r( $therapy_term );
	$therapy_image = get_field('therapy_image', $therapy_term);
		$therapy_img = wp_get_attachment_image_src( $therapy_image, 'thumbnail' );
	?>
<div class="col-12 text-center p-0">
    <div class="banner-logo">
        <a href="<?php //echo get_term_link($therapy_term->term_id); ?>?utm_source=homepage&utm_medium=<?php echo (is_mobile()) ? 'mobile' : 'desktop'; ?>&utm_campaign=<?php echo $widget_name;?>&utm_term=<?php echo (is_tax('therapy')) ? get_the_title() : $therapy_term->name ; ?>&utm_content=<?php echo $position;?>">
            <img title="<?php echo $therapy_term->name; ?>" src="<?php echo $therapy_img[0]; ?>" alt="<?php echo $therapy_term->name; ?>">
        </a>
    </div>
    <h5><a href="<?php //echo get_term_link($therapy_term->term_id); ?>??utm_source=homepage&utm_medium=<?php echo (is_mobile()) ? 'mobile' : 'desktop'; ?>&utm_campaign=<?php echo $widget_name;?>&utm_term=<?php echo (is_tax('therapy')) ? get_the_title() : $therapy_term->name ; ?>&utm_content=<?php echo $position;?>"><?php echo $therapy_term->name; ?></a></h5>
    <?php
			if(is_singular('therapist'))
			{
				$therapy_Exp = getTherapistExperience($therapy_Exp);
				
				echo "<p>$therapy_Exp Experience</p>";
				if($therapy_charge)
				{
					echo "<p style='display:none;'>&#8377; $therapy_charge</p>";
				}
			}
			if(!empty($sub_title))
			{
				?><p class="text-highlight mb-3"><?php echo $sub_title; ?></p><?php
			}
		?>
</div>