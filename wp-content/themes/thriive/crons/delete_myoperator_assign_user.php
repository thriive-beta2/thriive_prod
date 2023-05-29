<?php require '/var/www/html/wp-config.php';
global $wpdb;
$five_hours_ago = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")))."-5 hours"));
$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE call_timestamp = '".$five_hours_ago."'");