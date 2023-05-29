<?php require '/var/www/html/wp-config.php';
$ids = array();
if(have_rows('therapist_data', 'option')):
    while(have_rows('therapist_data', 'option')): the_row();
        $temp = explode(",",get_sub_field('display_ids'));  
		
        foreach($temp as $t){
            array_push($ids,$t);
        }
    endwhile;
endif;
$ids = array_unique($ids);
foreach ($ids as $id) {
	$paid_session_count = get_post_meta($id ,'paid_session_count');

	if($paid_session_count[0] == 0){
		$post = get_post($id);
		$post_modified = strtotime($post->post_modified);
		$current_date = strtotime("now");
		$seconds =  $current_date - $post_modified;
		$hours = $seconds / 1800;
		if($hours >= 1){ 
			update_post_meta($id,'paid_session_count',2);
		}
		
	}
}
?>
