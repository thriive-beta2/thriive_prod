
<?php /* Template Name: call-page1 */
?>

<?php 
include_once get_stylesheet_directory().'/new-header.php'; 
$current_user = wp_get_current_user();
if (!is_user_logged_in()) 
	{ 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		$current_user_name = $current_user->first_name.' '.$current_user->last_name;
		//if user's is Therapist then redirect to therapist dashboard 
		if(in_array("therapist", $current_user->roles))
		{
			wp_redirect('/therapist-account-dashboard/');
			exit();
		}
			if (strpos($_SESSION['chat_page'], '/therapist') !== false) {
				echo $site_referer = $_SESSION['chat_page'];
				unset($_SESSION['chat_page']);
				wp_redirect($site_referer);
				exit();
   }
	}


			
?>
<style>

td {
  text-align: center;
}


	body{
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	}

	.modal-body img{
		width:50px;
		height:50px;
	}
	.session_status_parent_container{
		border:solid #0C9F97 2px;
		border-radius: 20px;
		width: 35%;
		margin:0 auto;
	}
	.session_status_therapist_Content{
		display: flex;
		justify-content: center;
		/*background-color: #B7D4FF;*/
		flex-wrap: wrap;
		/*margin-top: -60px;*/
	}

	.session_status_therapist_Content_row1{
		margin-top: -70px;
	}
	.session_status_therapist_Content_img_container{
		/*width: 103px;*/
	    border-radius: 50%;
	    background-color: #fff;
	    padding: 9px 0px;
	    text-align: center;
	}
	.session_status_therapist_Content img{
	    width: 120px;
	    /*height: 140px;*/
	    border: 1px solid #0C9F97;
	    border-radius: 50%;
	    background-color: #fff;
	    overflow: hidden;
	    padding: 3px;
	    margin: 0 auto;

	}

	.session_status_therapist_Content_img_container-mainImage img{
		width: 120px;
    height: 120px;
	}
	.session_status_therapist_Content p{

	    width: 100%;
	    text-align: center;
	    color: #363361;
	    margin: 0;
	    font-size: 20px;
	    font-weight: 600;

	}
	.session_status_session_status{
	    width: 100%;
	    text-align: center;
	    padding: 5px;
	    font-weight: 600;
	    color: #363361;
	    font-size: 14px;
	}
	.session_status_separator{
		width:100%;
		margin-top: 10px;
		margin-bottom: 10px;
		text-align: center;
	}
	.session_status_separator img{
		width: 50%;
	    border: none;
	    padding: 0;
	    margin: 0;
	    border-radius: 0;
	}
	.session_status_session_animation{
		text-align: center;
		padding: 10px;
	}
	.session_status_session_animation img{
		width: 70px;
		height: 65px;
	    border: none;
	    padding: 0;
	    margin: 0;
	    border-radius: 0;
	}
	.session_status_buttons{
		width:100%;
		display: none;
		justify-content: space-evenly;
		/*padding: 10px 0px;*/
	}
	.session_status_buttons img{
		border: none;
	    width: 75px;
	    height: 65px;
	    padding: 0px;
	    margin: 0px;
	}
	.session_status_button{
		text-align: center;
		width: 100%;
	}

	.session_status_button button{
		display: inline;
	    margin: 10px;
	    padding: 5px;
	    border-radius: 8px;
	    border: solid 2px #E4F200;
	    background-color: #FFED41;
	}
	.session_status_button_text{
		font-size: 14px !important;
		font-weight: 600;
		width:100%;
		margin: 10px 0px;
	}
	.session_status_start_chat_btn{
		display: none;
	}
	.session_status_book_session_now_btn{
		display: none;
	}
	.session_status_feedback_btn{
		display: none;
	}
	.session_status_open_chat_btn{
		display: none;
	}
	.session_status_therapist_accept_chat_btn{
		display: none;
	}
	.disable_header_navigation_overlay{
		position: fixed;
		top:0;
		width: 100%;
	}
	.purple button{
		background-color: #9E569C;
		color:#fff;
		font-weight: 500;
		border:none;
		margin-bottom: 50px;
	}
	table{
		margin: 0 auto;
	}
table td{
	padding: 30px;
	border: solid;
}

.modal-dialog{
	margin-top: 45vh;
}

.have_more_questions{
	width: max-content;
    text-align: center;
    padding: 5px;
    font-weight: 600;
    color: #363361;
    font-size: 18px;
    margin: 0 auto;
    color: #F5EBFD;
    border-radius: 10px;
    font-size: 18px;
    font-weight: 500;
    padding: 5px 15px;
    background-color: #9F529C;
}

.extend_your_session_now a{
	color: #C27778;
    font-weight: 600;
    font-size: 16px;
}
.session_status_buttons1{
	display: none;
}

.session_status_buttons img{
	width: 58px;
    height: 58px;
}

#knowmessage p{
	font-size: 14px;
}

.yes_with_same_therapist_option a {
    color: #fff;
}
.accept_modal1 {
    width: 100%;
    height: 25%;
    position: fixed;
    bottom: 0;
    background-color: #19194B;
    z-index: 9991;
    display: none;
}












@media (min-width: 320px) and (max-width: 660px) {	

td {
  text-align: center;
}

	body{
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	}

	.modal-body img{
		width:50px;
		height:50px;
	}
	.session_status_parent_container{
		border:solid #0C9F97 2px;
		border-radius: 20px;
		width: 85%;
		margin:0 auto;
	}
	.session_status_therapist_Content{
		display: flex;
		justify-content: center;
		/*background-color: #B7D4FF;*/
		flex-wrap: wrap;
		/*margin-top: -60px;*/
	}

	.session_status_therapist_Content_row1{
		margin-top: -70px;
	}
	.session_status_therapist_Content_img_container{
		/*width: 103px;*/
	    border-radius: 50%;
	    background-color: #fff;
	    padding: 9px 0px;
	    text-align: center;
	}
	.session_status_therapist_Content img{
	    width: 120px;
	    /*height: 140px;*/
	    border: 1px solid #0C9F97;
	    border-radius: 50%;
	    background-color: #fff;
	    overflow: hidden;
	    padding: 3px;
	    margin: 0 auto;

	}

	.session_status_therapist_Content_img_container-mainImage img{
		width: 120px;
    height: 120px;
	}
	.session_status_therapist_Content p{

	    width: 100%;
	    text-align: center;
	    color: #363361;
	    margin: 0;
	    font-size: 20px;
	    font-weight: 600;

	}
	.session_status_session_status{
	    width: 100%;
	    text-align: center;
	    padding: 5px;
	    font-weight: 600;
	    color: #363361;
	    font-size: 14px;
	}
	.session_status_separator{
		width:100%;
		margin-top: 10px;
		margin-bottom: 10px;
		text-align: center;
	}
	.session_status_separator img{
		width: 50%;
	    border: none;
	    padding: 0;
	    margin: 0;
	    border-radius: 0;
	}
	.session_status_session_animation{
		text-align: center;
		padding: 10px;
	}
	.session_status_session_animation img{
		width: 70px;
		height: 65px;
	    border: none;
	    padding: 0;
	    margin: 0;
	    border-radius: 0;
	}
	.session_status_buttons{
		width:100%;
		display: none;
		justify-content: space-evenly;
		/*padding: 10px 0px;*/
	}
	.session_status_buttons img{
		border: none;
	    width: 75px;
	    height: 65px;
	    padding: 0px;
	    margin: 0px;
	}
	.session_status_button{
		text-align: center;
		width: 100%;
	}

	.session_status_button button{
		display: inline;
	    margin: 10px;
	    padding: 5px;
	    border-radius: 8px;
	    border: solid 2px #E4F200;
	    background-color: #FFED41;
	}
	.session_status_button_text{
		font-size: 14px !important;
		font-weight: 600;
		width:100%;
		margin: 10px 0px;
	}
	.session_status_start_chat_btn{
		display: none;
	}
	.session_status_book_session_now_btn{
		display: none;
	}
	.session_status_feedback_btn{
		display: none;
	}
	.session_status_open_chat_btn{
		display: none;
	}
	.session_status_therapist_accept_chat_btn{
		display: none;
	}
	.disable_header_navigation_overlay{
		position: fixed;
		top:0;
		width: 100%;
	}
	.purple button{
		background-color: #9E569C;
		color:#fff;
		font-weight: 500;
		border:none;
		margin-bottom: 50px;
	}
	table{
		margin: 0 auto;
	}
table td{
	padding: 30px;
	border: solid;
}

.modal-dialog{
	margin-top: 45vh;
}

.have_more_questions{
	width: max-content;
    text-align: center;
    padding: 5px;
    font-weight: 600;
    color: #363361;
    font-size: 18px;
    margin: 0 auto;
    color: #F5EBFD;
    border-radius: 10px;
    font-size: 18px;
    font-weight: 500;
    padding: 5px 15px;
    background-color: #9F529C;
}

.extend_your_session_now a{
	color: #C27778;
    font-weight: 600;
    font-size: 16px;
}
.session_status_buttons1{
	display: none;
}

.session_status_buttons img{
	width: 58px;
    height: 58px;
}

#knowmessage p{
	font-size: 14px;
}

}


</style>

<?php 
if(is_user_logged_in()) {
  $current_user = wp_get_current_user();
 
$userrow = $wpdb->get_row("SELECT   id,created_date,tid,busy_date,waiting,action,uid,therapy_name,pkgdescription,tname,uname,session_duration,remaining_duration,payment_txnid,call_id,tid_accept,remaining_session,category_name FROM online_consultation WHERE uid = '".$current_user->ID ."'    AND action='call'  AND payment_status='success' ORDER BY id DESC LIMIT 1");
//echo "SELECT created_date,session_duration FROM online_consultation WHERE uid = '".$current_user->ID ."'  AND action='call'  AND payment_txnid='". $userrow->payment_txnid ."' AND payment_status='success' AND def_warn != 4 ORDER BY id  DESC LIMIT 1";
$userrow1 = $wpdb->get_row("SELECT created_date,session_duration FROM online_consultation WHERE uid = '".$current_user->ID ."'  AND action='call'  AND payment_txnid='". $userrow->payment_txnid ."' AND payment_status='success' AND def_warn != 4 ORDER BY id  DESC LIMIT 1");

 $timestamp = strtotime($userrow1->created_date);
$therapist_image =  get_therapist_image($userrow->tid);

$therapiststatus = getTherapistConsultStatus($userrow->tid);
$_GET['t'] = $userrow->therapy_name;
$flag =0;
if($userrow->therapy_name != 'Appointment' || $userrow->remaining_session > 0){
	$knowcall = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid LIKE '%".$userrow->call_id ."%'");
	$oc_id = $userrow->id;
	//echo 'oc_id'.$oc_id;
	$post_name = $wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_author = '".$userrow->tid ."' AND post_status = 'publish' AND post_type = 'therapist'");
	if($_GET['t'] == 'tarot-card-reading'){
		$label = "Tarot";
		$link = "/talk-to-best-tarot-card-reader-online";
	}else if($_GET['t'] == 'life-coach'){
		$label = "Life Coach";
		$link ="/talk-to-best-life-coach-online";
	}else if($_GET['t'] == 'hypno-therapy'){
		$label = "Hypnotherapy";
		$link = "/hypnotherapy";
	}else if($_GET['t'] == 'inner-child-healing'){
		$label = "Inner Child Healing";
		$link = "/inner-child-healing";
	}else if($_GET['t'] == 'sex-therapist'){
		$label = "Sex Therapist";
		$link ="/consult-top-sex-therapists-online";
	}else if($_GET['t'] == 'past-life-regression'){
		$label = "Past Life Regression";
		$link = "/past-life-regression-therapy";
	}else if($_GET['t'] == 'counseling-consulting'){
		$label = "Counseling";
		$link = "/counseling";
	}else if($_GET['t'] == 'eft-emotional-freedom-technique'){
		$label = "EFT Emotional Freedom Technique";
		$link = "/eft-emotional-freedom-technique";
	}else if($_GET['t'] == 'Appointment'){
		$label = "Appointment";
		$link ="/book-tarot-reading-by-appointment";
	}else if($_GET['t'] == 'nutritionist'){
		$label = "Nutritionist";
		$link = "/consult-nutritionist-online";
	}else if($_GET['t'] == 'vastu'){
		$label = "Vastu";
		$link ="/vastu";
	}else if($_GET['t'] == 'numerology'){
		$label = "Numerology";
		$link = "/talk-to-best-numerologist-online";
	}else if($_GET['t'] == 'Free Covid Session'){
		$label = "Free Covid Session";
		$link = "/consult-covid-counselor-online";
	} else if($_GET['t'] == 'angel-reading'){
		$label = "Angel Reading";
		$link = "/angel-reading";
	} else if($_GET['t'] == 'cosmic-astrology'){
		$label = "Astrology";
		$link = "/talk-to-best-astrology-online";
	}
	//echo $link ;

	$disabled = "";$style1 = "";$style2 = "";$message = "";
	if($userrow->call_id != ''){ 
		if($userrow->remaining_session > 0 && (count($knowcall) > 0)){ 
			//$style =  "background:#282560;color:#fff;";
			$call_duration = $knowcall->call_duration; 
			$call_timer = $knowcall->call_timer;
			
			$cduration = explode(":",$call_duration);
			$remaining_duration = $call_timer - $cduration[1];
			$style = "filter: drop-shadow(black 2px 2px 2px); opacity: unset;filter:unset;cursor: unset;pointer-events: unset;";
			$style1 = "display:flex;";
			$disabled = "disabled";
			$message = "Please use the option below";
			$flag = 1;
		} else {
			
			//echo 'remaining_duration'.$userrow->remaining_duration;
			if(($timestamp - strtotime("-24 hours") > 0) && ($userrow->remaining_duration > 0)){
				if($userrow->remaining_session == 0 && $userrow->remaining_duration > 0 && count($knowcall) > 0){	
				
				$style =  "filter:grayscale(1);cursor: not-allowed;pointer-events: none;";
			
				if($userrow->remaining_duration > 0){ $balance_time =  $userrow->remaining_duration; } else { $balance_time =   $userrow->session_duration; }
				$message = "Call Disconnected. To Call back use button below.<br/> Balance Time is ".$balance_time." mins.";
				$style2 = "display:flex;";
				} else if(count($knowcall) > 0){
					$message = "Please use the option below";
					$style1 = "display:flex;";
				} else {
					$message = "Calling Therapist,please wait...";	
				}
				$flag = 1;
			} else {
				$message = "No Active Sessions.";
				$style1 = $style2 = "display:none;";
			}		
		}	
	} else { 
		$style =  "filter:grayscale(1);cursor: not-allowed;pointer-events: none;";
		$disabled = "disabled";	
	}
	 
	?>


<br><br>

<br>
<?php 
if($flag == 0){
	$therapist_image = site_url()."/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-No Session ongoing.png";
	
}	
?>
<div class="session_status_parent_container">
	<div class="session_status_therapist_Content session_status_therapist_Content_row1">
		<div class="session_status_therapist_Content_img_container session_status_therapist_Content_img_container-mainImage">
			<img src="<?php echo $therapist_image; ?>">
		</div>
		<p><?php 
		$therapist_name = $userrow->tname;
		$user_name = $userrow->uname;
		$session_duration = $userrow->session_duration;
		if($flag == 1){
			echo $therapist_data_string = $session_duration.' Mins '.ucfirst($userrow->action) .' Session with<br> '.$therapist_name;
		} else {
			echo $therapist_data_string = "";
		}	
	  ?></p>
	  <div class="session_status_separator">
			<img src="<?php echo get_template_directory_uri();?>/assets/images/newsoulimg/seperator.svg">
		</div>
	
	  <div id="knowmessage" class="session_status_therapist_Content"><p><?php echo $message;?></p></div>
	<input type="hidden" id = "uuid" value="<?php echo $userrow->call_id;?>" />
	<input type="hidden" id = "know_remaining_duration" value="<?php if($userrow->remaining_duration > 0){ echo $userrow->remaining_duration; } else { echo $userrow->session_duration; } ?>" />
	<input type="hidden" id = "original_duration" value="<?php echo $userrow1->session_duration; ?>" />
	</div>
	<div class="session_status_separator">
		<img src="<?php echo get_template_directory_uri();?>/assets/images/newsoulimg/seperator.svg">
	</div>
	
	<div class="session_status_session_status"></div>
	
	<div id="knowresponse"></div>
	
	<div class="session_status_buttons1" style="<?php echo $style1; ?>">
		<section class="session_status_button">
			<img src="<?php echo get_template_directory_uri();?>/assets/images/Website Screen_Icon-Change Therapist.png" onclick="browse('<?php echo $userrow->id;?>','<?php echo $userrow->tid;?>','<?php echo $userrow->uid;?>','<?php echo $userrow->action;?>','<?php echo $userrow->therapy_name;?>');">
			<p class="session_status_button_text">Change Therapist</p>
		</section> 
		<section class="session_status_button">
			<img src="<?php echo get_template_directory_uri();?>/assets/images/Website Screen_Icon-Save session.png" onclick="takelater('<?php echo $userrow->id;?>','<?php echo $userrow->action;?>','<?php echo $userrow->therapy_name;?>');">
			<p class="session_status_button_text">Save Session for Later</p>
		</section>
	</div>	

	<div class="session_status_buttons" style="<?php echo $style2; ?>">
		<section class="session_status_button">
			<a href="#" data-toggle="modal" data-target="#calldrop"><img src="<?php echo get_template_directory_uri();?>/assets/images/Call_Dropped.png"  style="filter: drop-shadow(black 2px 2px 2px); opacity: unset;">
			<p class="session_status_button_text" style="margin-bottom: 3px;">Call Dropped ?</p><p class="click_here" style="color:#23AE94;font-weight: 600;">Click Here</p>
			</a>
		</section>
		
		<section class="session_status_button">
			<a onclick="redirect_to_isses_feedback();"><img src="<?php echo get_template_directory_uri();?>/assets/images/issues.png"   style="filter: drop-shadow(black 2px 2px 2px); opacity: unset; ">
			<p class="session_status_button_text" style="margin-bottom: 3px;">Issues / Feedback</p><p class="click_here" style="color:#1557A3;font-weight: 600;">Click Here</p>
			</a>
		</section>
	</div>
	<div id="faqdiv" style="display:none;">	
		<p class="session_status_session_status have_more_questions">Have More Questions ?</p>	
		<p class="session_status_session_status extend_your_session_now"><a  href="#" onclick="show_therapist_selection_layover();">Extend Your Session Now</a></p>	
	</div>	
</div>	
<script> 

	URL = "https://konnect.knowlarity.com:8100/update-stream/28637081-d7a7-4bf5-96aa-c79fbf2aba42/konnect"
	source = new EventSource(URL);
	source.onmessage = function (event) {
		var data = JSON.parse(event.data);
		var uuid = $('#uuid').val();
		var original_duration = $('#original_duration').val();
		var know_remaining_duration = $('#know_remaining_duration').val();
			
		var live_duration_left = 0;		
		if(uuid == data.uuid){	
			console.log('Received an event .......');
			
			console.log(data.uuid);
			console.log(data.event_type);
			console.log(know_remaining_duration - (data.call_duration/60));
			if(data.hasOwnProperty('call_duration')){
				live_duration_left = know_remaining_duration - (data.call_duration/60);
				$('#know_remaining_duration').val(Math.round(live_duration_left));
				$('#durationbal').html(Math.round(live_duration_left));
				
			} 
			$.ajax({ 
				
				url: myajax.ajax_url,
				type: 'POST',
				dataType : 'JSON',
				data: {'action': 'checkknowresponse','call_uuid': data.uuid,'know_remaining_duration': know_remaining_duration,'duration_left':live_duration_left,'original_duration':original_duration,'event_type':data.event_type,'business_call_type':data.business_call_type},
				success: function (data) {
					$('.session_status_buttons').css('display','none');
					$('.session_status_buttons1').css('display','none');
					
					//$('#knowresponse').html(data);
					if(data.option == 2){
						$('.session_status_buttons1').css('display','flex');
						$('.session_status_buttons').css('display','none');
						
					} else if(data.option == 3){
						$('.session_status_buttons').css('display','flex');
						$('.session_status_buttons1').css('display','none');
					}else if(data.option == 4){
						$('#faqdiv').css('display','block');
					}		
					$('#knowmessage').html(data.message);	
						
				}
			});
		} 
	}
	</script>
<div class="modal fade" id="calldrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="session_status_session_status"><?php if($therapiststatus->availability_status == 1) { echo "<p style='color:#009f98;height: 0px;font-size: 20px;'>Therapist Online</p>";}else { echo "<p style='color:red;height: 0px;font-size: 20px;'>Therapist Offline</p>";}?>
			</div>
    
    

			<div class="modal-body" style="justify-content: space-evenly;display: flex;align-items: center;">
				
			
				<div>
					<img src="<?php echo get_template_directory_uri();?>/assets/images/Call_Dropped.png" id='btncallback2'  onclick='callback(<?php echo $oc_id;?>);'  style="<?php if($therapiststatus->availability_status == 4) { echo $style; } ?>"><br/>
					<p class="session_status_button_text">Callback</p>
				</div>
				
<div class="session_status_session_status"> You have <div id="durationbal" style="display: inline;"><?php echo $userrow->remaining_duration; ?></div> Mins of Balance Time left</div>	
				<div>
					<img src="<?php echo get_template_directory_uri();?>/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Change Therapist.png" onclick="window.location.reload();" data-ocid="514" style="filter: drop-shadow(black 2px 2px 2px); opacity: unset;width: 59px;">
					<br/>
					<p class="session_status_button_text">Refresh</p>
				</div>	
			</div>
			
		</div> 
	</div>
</div>

<style>
	.therapist_selection_modal{
width: 70%;
    background-color: #fff;
    border-radius: 5px;
    padding: 10px;
    margin: 0 auto;
    display: block;
    margin-top: 40vh;
	}
	.Therapist_selection_option{
		    display: block;
    background-color: #9F529C;
    color: #fff;
    text-align: center;
    border-radius: 4px;
    margin-bottom: 10px;
    padding: 5px;
	}
	.yes_with_same_therapist_options_parent{
	display: flex;
    justify-content: space-evenly;
    margin-bottom: 10px;
    height: 0px;
    /*height: 0px;*/
    overflow: hidden;
    transition: height 1s;
	}
	.yes_with_same_therapist_option{
		    display: block;
    /* background-color: #1557A3; */
    color: #fff;
    padding: 5px;
    border-radius: 5px;
	}
	.therapist_selection_modal_layover{
		display: none;
		width: 100%;
    height: 100vh;
    background-color: rgba(0,0,0,0.7);
    position: fixed;
    top: 0; 
	}
</style>
<div class="therapist_selection_modal_layover" onclick="hide_therapist_selection_layover(event);">
<div class="therapist_selection_modal">
	<div class="Therapist_selection_option" onclick="show_yes_with_same_therapist_option();">Yes With Same Therapist</div>
	<div class="yes_with_same_therapist_options_parent">
		<div class="yes_with_same_therapist_option" style="background-color: #1557A3;"><a href="<?php echo site_url();?>/new-payment-apage/?q=<?php echo $post_name->post_name;?>&a=chat&t=<?php echo $userrow->therapy_name;?>&c=<?php echo $userrow->category_name;?>">Chat Session</a></div>
		<div class="yes_with_same_therapist_option" style="background-color: #23AE94;"><a href="<?php echo site_url();?>/new-payment-apage/?q=<?php echo $post_name->post_name;?>&a=call&t=<?php echo $userrow->therapy_name;?>&c=<?php echo $userrow->category_name;?>">Call Session</a></div>
	</div>
	<div class="Therapist_selection_option"><a style="color:#fff;" href="<?php echo site_url().$link;?>">No With Another Therapist</a></div>
</div>
</div>



<div class="modal fade" id="issues" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				<a> Issues / Feedback</a>
			</div>
			
		</div>
	</div>
</div>

<script>
	function redirect_to_isses_feedback(){
		if(confirm('Are you sure to redirect to Issue/Feedback Page ?')){
			window.location.href = "<?php echo site_url();?>/issues-feedback-page";
		}
	}
	function hide_therapist_selection_layover(e){
		if(e.target === e.currentTarget){
			document.querySelector('.therapist_selection_modal_layover').style.display = 'none';
		}else{
			//alert('child');
		}
	}

	function show_therapist_selection_layover(){
		document.querySelector('.therapist_selection_modal_layover').style.display = 'block';
	}

	function show_yes_with_same_therapist_option(){
		document.querySelector('.yes_with_same_therapist_options_parent').style.height = '31px';
	}
</script>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php  
	}  else {
		echo "<h1 style='font-size: 28px;'>No Ongoing Sessions</h1>";
	
	}
	
	include_once get_stylesheet_directory().'/new-footer.php'; 
}
?>
<script>

globalThis.TherapistData = '';
globalThis.OC_ID = '<?php echo $oc_id;?>';
//ChangeDialogue(5,'<?php echo $oc_id;?>');
function callback(oc_id){ 
	$('#btncallback2').prop('disabled',true);
	$('#btncallback2').css('filter','grayscale(1)');
	$('#calldrop').modal('hide');
	var remaining_duration = $('#know_remaining_duration').val();
	$.ajax({ 
			 
			url: myajax.ajax_url,
			type: 'POST',
			dataType : 'html',
			data: {'action': 'liveresponse','oc_id': oc_id,'remaining_duration': remaining_duration},
			success: function (data) { 
				if(data == 2){
					$('#knowmessage').html('<p>Sorry ,the therapist not available</p>');
				}	
					
				location.reload();
			}
		});  
}



</script>