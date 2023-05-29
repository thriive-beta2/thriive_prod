<?php
$basePath = '/var/www/html';
require $basePath.'/wp-config.php';
include_once get_stylesheet_directory() . '/framework/core-functions.php';
			
	$url = "";
	global $wpdb;
	if(count($_GET)<1){

	}else{
	  $curr_ocid = $_GET['ocid'];
      $query = 'SELECT menu FROM chat_call_conf WHERE oc_id = '.$curr_ocid;
      $ret_menu = $wpdb->get_results($query);
      if(count($ret_menu)<1){
      	echo 'NaN';
      }else{
      	print_r($ret_menu[0]->menu);	
      }
    }