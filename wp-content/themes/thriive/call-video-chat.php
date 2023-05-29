<?php /* Template Name: Call Video Chat page */ 
include_once get_stylesheet_directory().'/new-header.php'; 

	if(in_array('therapist', wp_get_current_user()->roles)){
		$user_role = 'tid';
		$user_role_link = 'ttime';
	}else{
		$user_role = 'uid';
		$user_role_link = 'utime';
	}
	$query = "SELECT * FROM oc_video_call WHERE $user_role=$current_user->ID ORDER BY id DESC";
	$vdata = $wpdb->get_results($query);
	$fdata = array();
	$pdata = array();

	for($i=0;$i<count($vdata);$i++){
		if($vdata[$i]->book_date == date('Y-m-d')){
			$fdata[$i] = $vdata[$i];
		}
	}
	foreach($fdata as $key){
		$book_time = strtotime($key->book_time)+60*60;
		if(strtotime($key->book_time) < time() AND time() < $book_time){
			$pdata[0] = $key;
		}
	}	
	if(count($pdata)!=0){
		$app_time = $pdata[0]->book_time;
		$app_date = $pdata[0]->book_date;
		$uid = $pdata[0]->uid;
		$channel = $pdata[0]->channel;
		$query = "SELECT * FROM wp_usermeta where user_id=$uid AND meta_key='first_name'";
		$fdata = $wpdb->get_results($query);
		$tname = $fdata[0]->meta_value;
		
	}




$t = $_GET['t']; 
$q = $_GET['q'];
$current_user = wp_get_current_user();
$seeker_id = $current_user->ID;
if($seeker_id != '')
  $from_status = 1;
else
  $from_status = 0; 
$therapy = $_GET['t']; 
	if (!is_user_logged_in()) { 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		$username = $current_user->first_name . ' ' . $current_user->last_name;	
	}
?>
<style>
		p.commtxt {
			font-size: 18px;
			font-weight: 600;
			text-align: center;
		}
		.terms {
				text-align: center;
				font-size: 14px;
				padding: 0px 15px;
			}
			.footerwrap {
    bottom: 0;
    left: 0;
    right: 0;
    position: fixed;
}
</style>
<!--<button onclick="goBack()" style="margin: 0px 20px 0px; background: none;border: none;"> < Back</button>-->
<script>
function goBack() {
  window.location.href='<?php echo site_url();?>/book-tarot-reading-by-appointment';
  window.history.back()
}
</script>
<section class="topreadingList">
	<p class="commtxt">Select Communication Mode</p>
<div class="clickgroup">

	<a  href='<?php echo site_url();?>/booking-date-and-time?q=<?php echo $_GET['q'];?>&a=call&t=<?php echo $therapy.$pt;?>&action=call'  class='btn btn_popular acallbtn' ><i class="fa fa-phone" aria-hidden="true" ></i>Voice Call</a>
	
	<!--<a  href='<?php echo site_url();?>/booking-date-and-time?q=<?php echo $_GET['q'];?>&a=book_laterchat&t=<?php echo $therapy.$pt;?>&action=chat'  class='btn' ><i class="fa fa-comments-o" aria-hidden="true"></i>Chat Now</a>-->
	 
	<a  href='<?php echo site_url();?>/booking-date-and-time?q=<?php echo $_GET['q'];?>&a=videocall&t=<?php echo $therapy.$pt;?>&action=call' class='btn videobtn' ><i class="fa fa-video-camera" aria-hidden="true"></i>Video Call</a>
	 
</div>
</section>

<div class="terms">
		<br/>
		
			 *For Video Calls: Please ensure you have good network and internet access to receive video calls. 
			
		 
		  

</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; 