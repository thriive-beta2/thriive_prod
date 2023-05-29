<?php 
/* Template Name: Transfer Records */
 echo  "INSERT INTO `online_consultation_archive` SELECT * FROM `online_consultation` WHERE   DATE(`created_date`) <= DATE(NOW() - INTERVAL 3 MONTH) AND remaining_session = 0 AND id NOT IN (SELECT id FROM `online_consultation_archive` WHERE 1) ORDER BY id";
global $wpdb;
$wpdb->query("INSERT INTO `online_consultation_archive` SELECT * FROM `online_consultation` WHERE   DATE(`created_date`) <= DATE(NOW() - INTERVAL 4 MONTH) AND remaining_session = 0 AND id NOT IN (SELECT id FROM `online_consultation_archive` WHERE 1) ORDER BY id"); 
//$wpdb->query("DELETE FROM `online_consultation` WHERE DATE(`created_date`) <= DATE(NOW() - INTERVAL 4 MONTH) AND remaining_session = 0 ORDER BY id ");
?>