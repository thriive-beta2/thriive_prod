<?php
require '/var/www/html/wp-config.php';
global $wpdb;
$num = $_POST['num'];
$query = "SELECT user_id FROM wp_usermeta WHERE meta_value = $num";
$res = $wpdb->get_results($query);

if(count($res)>0){
$uid = $res[0]->user_id;
$query = "SELECT * FROM wp_usermeta WHERE user_id = $uid AND (meta_key = 'first_name' OR meta_key='last_name' OR meta_key='mobile')";
$res = $wpdb->get_results($query);
$return_string = $res[0]->meta_value.','.$res[1]->meta_value.','.$res[2]->meta_value;
print_r($return_string);


}else{echo 'error404,';}






?>