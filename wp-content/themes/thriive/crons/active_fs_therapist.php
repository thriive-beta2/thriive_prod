<?php require '/var/www/html/wp-config.php';
$ids = array();
if(have_rows('free_therapist_data', 'option')):
    while(have_rows('free_therapist_data', 'option')): the_row();
        $temp = explode(",",get_sub_field('display_ids'));  
        foreach($temp as $t){
            array_push($ids,$t);
        }
    endwhile;
endif;
foreach ($ids as $id) {
	$session_count = get_post_meta($id, 'free_session_count',true);
	$is_active = get_post_meta($id, 'active_for_free_session',true);
	if($session_count > 0 && $is_active == 0){
		update_post_meta($id,'active_for_free_session',1);
	}
}
?>