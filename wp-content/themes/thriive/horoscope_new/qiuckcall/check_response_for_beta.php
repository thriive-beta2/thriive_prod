<?php 
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
include_once get_stylesheet_directory() . '/framework/core-functions.php';

global $wpdb;

$ocid = $_GET['ocid'];

$query = "SELECT * FROM chat_call_conf WHERE oc_id=$ocid ORDER BY id DESC";
$res = $wpdb->get_results($query);

if(count($res)>0){
echo $res[0]->menu;
}
