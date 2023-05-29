<?php 
require '/var/www/html/wp-config.php';
global $wpdb;
/* $results = $wpdb->get_results("SELECT DISTINCT(payuid) as payuid FROM online_consultation  WHERE MONTH(created_date) = '04' AND YEAR(created_date) = '2022' AND payment_status = 'success' AND payuid = '15040765620' ORDER BY id DESC LIMIT 10");
if(!empty($results)){ 
	foreach($results as $rs){
			$row = $wpdb->get_row("SELECT created_date FROM online_consultation  WHERE payuid = '". $rs->payuid ."' LIMIT 1");
			echo "UPDATE online_consultation SET payment_date = '". $row->created_date ."' WHERE payuid = '". $rs->payuid ."'";echo "<br/>";
			$wpdb->query("UPDATE online_consultation SET payment_date = '". $row->created_date ."' WHERE  payuid = '". $rs->payuid ."'");
	}
} */ 
$results = $wpdb->get_results("SELECT * FROM online_consultation  WHERE payment_status = 'success' GROUP BY payment_txnid LIMIT 13000,3000");
if(!empty($results)){
	foreach($results as $rs){
		$sessioncnt = $wpdb->get_row("SELECT * FROM `session_taken_per_user` WHERE uid = '".$rs->uid ."'");
		if(!$sessioncnt){
			$wpdb->insert("session_taken_per_user",array('session_count'=>1,'modified_date' => date('Y-m-d H:i:s'),'uid' => $rs->uid));
		} else {
			$wpdb->update("session_taken_per_user",array('session_count'=> ($sessioncnt->session_count)+1,'modified_date' => date('Y-m-d H:i:s')),array('uid'=>$rs->uid));
		}
	}	 
}	

//curl --get 'https://konnect.knowlarity.com:8100/update-stream/{SR_API_KEY}/konnect' --verbose


?>