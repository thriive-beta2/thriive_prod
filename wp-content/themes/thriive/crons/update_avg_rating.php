<?php require '/var/www/html/wp-config.php';
include_once get_template_directory() . '/framework/core-functions.php';
$args = array(
    'post_status' => 'publish',
    'post_type' => 'therapist',
    'post_parent' => 0,
    'numberposts' => '-1'
);
$posts = get_posts($args);
$avgrate = "";
foreach ($posts as $post) {
    if (get_post_meta($post->ID, 'review_details')) {
        $existingRows = get_post_meta($post->ID, 'review_details', true);
        $avgrate = calculateAvgRating($post->ID,$existingRows);
	update_field('avg_rating',$avgrate,$post->ID);
	echo $avgrate;
    }
}
//echo $avgrate;
?>
