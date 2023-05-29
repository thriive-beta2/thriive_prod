<?php 
	if(is_mobile()) {
		$blog_image = get_the_post_thumbnail($id = null, 'featured_blog_mobile', array('alt' => get_the_title(), 'title'=>get_the_title())); 
	} else {
		$blog_image = get_the_post_thumbnail($id = null, 'featured_blog', array('alt' => get_the_title(), 'title'=>get_the_title()));
	}


$blog_image_add = explode('"', $blog_image)[5];
echo $image_url;
?>








