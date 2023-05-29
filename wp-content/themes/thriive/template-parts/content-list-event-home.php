<?php 
	if(is_mobile()) {
		$event_image = get_the_post_thumbnail($id = null, 'thumbnail', array('alt' => get_the_title(), 'title'=>get_the_title()));
	} else {
		$event_image = get_the_post_thumbnail($id = null, 'thumbnail', array('alt' => get_the_title(), 'title'=>get_the_title()));
	}
	    $event_facilitator = get_field('facilitator');
	if (get_field('facilitator')){
		$facilitator = get_field('facilitator');
		
	}else{
		$event_healers = get_field('healer');
		foreach ($event_healers as $event_healer) {
	       $healer_arr[] = $event_healer->post_title;
	   	}
	   	$facilitator = implode(', ', $healer_arr);
	}
?>
<div class="col-12 p-0">
	<div class="event-circle">
		<a href="<?php echo the_permalink();?>?utm_source=homepage&utm_medium=<?php echo (is_mobile()) ? 'mobile' : 'desktop'; ?>&utm_campaign=<?php echo $event_name;?>&utm_term=<?php echo (is_tax('therapy')) ? get_the_title() : the_title(); ?>&utm_content=<?php echo $position;?>">
			<div class="inner-event-circle">
				<?php echo $event_image; ?>
			</div>
		</a>
	</div>
	<div class="txt-wrap mt-3">
		<h5 class="font_14_xs"><a href="<?php echo the_permalink();?>?utm_source=homepage&utm_medium=<?php echo (is_mobile()) ? 'mobile' : 'desktop'; ?>&utm_campaign=<?php echo $event_name;?>&utm_term=<?php echo (is_tax('therapy')) ? get_the_title() : the_title(); ?>&utm_content=<?php echo $position;?>" class="text-highlight"><?php the_title(); ?></a></h5>
		<!-- <p class=""><?php echo $facilitator; ?> </p> -->
		<?php
			if(!empty($sub_title))
			{
				?><p class="asd text-highlight mb-3"><?php echo $sub_title; ?></p><?php
			}
		?>
	</div>
</div>