<?php /* Template Name: video-call-links */ ?>
<?php
if(wp_get_current_user()->caps['administrator']){
	if(wp_get_current_user()->caps['administrator'] != 1){
		die('forbidden');	}
}else{die('forbidden');};



$query = "SELECT * FROM `oc_video_call`  ORDER BY id DESC";
$fdata = $wpdb->get_results($query);
//print_r($fdata);
include_once get_stylesheet_directory().'/new-header.php';
$fdata_array = array();



for($i=0;$i<count($fdata);$i++){
//echo count($fdata);
if($fdata[$i]->book_date >= date('Y-m-d')){
	$fdata_array[$i]['date'] = $fdata[$i]->book_date;
	$fdata_array[$i]['stime'] = $fdata[$i]->book_time;
	$fdata_array[$i]['etime'] = $fdata[$i]->end_time;
	$fdata_array[$i]['channel'] = $fdata[$i]->channel;
	$fdata_array[$i]['tid'] = $fdata[$i]->tid;
	$fdata_array[$i]['uid'] = $fdata[$i]->uid;
	$fdata_array[$i]['sno'] = $fdata[$i]->id;
	$fdata_array[$i]['action'] = $fdata[$i]->action;

}else{}}
print_r($fdata_array);
for($i=0;$i<count($fdata_array);$i++){
	$fdata_array[$i]['temail'] = get_user_meta($fdata_array[$i]['tid'], 'nickname')[0];
	$fdata_array[$i]['uemail'] = get_user_meta($fdata_array[$i]['uid'], 'nickname')[0];
	$fdata_array[$i]['tphone'] = get_user_meta($fdata_array[$i]['tid'], 'mobile')[0];
	$fdata_array[$i]['uphone'] = get_user_meta($fdata_array[$i]['uid'], 'mobile')[0];
	$fdata_array[$i]['tname'] = get_user_meta($fdata_array[$i]['tid'], 'first_name')[0].' '.get_user_meta($fdata_array[$i]['tid'], 'last_name')[0];
	$fdata_array[$i]['uname'] = get_user_meta($fdata_array[$i]['uid'], 'first_name')[0].' '.get_user_meta($fdata_array[$i]['uid'], 'last_name')[0];
	//$fdata_array[$i]['ulink'] = get_site_url().'/video_call/?appid=2dbedd3f03bf4a089b098987a8407baa&channel='.$fdata_array[$i]['channel'].'&token=&u=utime';
	//$fdata_array[$i]['tlink'] = get_site_url().'/video_call/?appid=2dbedd3f03bf4a089b098987a8407baa&channel='.$fdata_array[$i]['channel'].'&token=&u=ttime';
	//$fdata_array[$i]['ulink'] = get_site_url().'/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/index.php?appid=2dbedd3f03bf4a089b098987a8407baa&channel='.$fdata_array[$i]['channel'].'&token=&u=utime';
	$fdata_array[$i]['tlink'] ="https://video.knowlarity.com/room/".$fdata_array[$i]['channel']."?&password=123456&prejoin=false&name=".$fdata_array[$i]['tname'];
	$fdata_array[$i]['ulink'] ="https://video.knowlarity.com/room/".$fdata_array[$i]['channel']."?&prejoin=false&name=".$fdata_array[$i]['uname'];
	
	//$fdata_array[$i]['tlink'] = get_site_url().'/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/index.php?appid=2dbedd3f03bf4a089b098987a8407baa&channel='.$fdata_array[$i]['channel'].'&token=&u=ttime';
		
}
//print_r($fdata);

//print_r($fdata_array);
?>



<style type="text/css">
		.sch_app{
			width:100%;
		}
		table {
    table-layout: fixed;
    width: 100%;  
    border:2px solid; 
}

		td{
			word-wrap: break-word;
			border:solid 1px !important;
			padding:5px;
			width: max-content;
		}
		.video_table_head{
			font-weight:bold;
		}
</style>

<div class="sch_app">
				<h2 style="font-size: 22px;text-align: center;">Video Call Appointments</h2>
				<table class="table-bordered table-striped">
					<tr class="video_table_head"><td>S.No</td><td>Therapist Link</td><td>Therapist Email</td><td>Therapist Phone</td><td>User Link</td><td>User Email</td><td>User Phone</td><td>Date</td><td>Action</td></tr>
					<?php foreach($fdata_array as $call_data){?>
					<tr><td><?php echo $call_data['sno'];?><td><?php echo $call_data['tlink'];?></td><td><?php echo $call_data['temail'];?></td><td><?php echo $call_data['tphone'];?></td><td><?php echo $call_data['ulink'];?></td><td><?php echo $call_data['uemail'];?></td><td><?php echo $call_data['uphone'];?></td></td><td><?php echo $call_data['date'];?><br><?php echo $call_data['stime'];?>-<?php echo $call_data['etime'];?></td><td><?php echo $call_data['action'];?></td></tr>
					<?php }?>
				</table>
			</div>


