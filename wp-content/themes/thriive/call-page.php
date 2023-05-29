<?php /* Template Name: call-page */

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
</style>
<h1 style="font-size: 28px;">Call Session Page</h1>
<br><p style="color:#2ccf51;">** Please refresh to see updated Call options.Call back can be used for 1 hour after payment</p>
<?php 
if(is_user_logged_in()) {
  $current_user = wp_get_current_user();
 
	   

$userrow = $wpdb->get_row("SELECT   id,created_date,tid,busy_date,waiting,action,uid,therapy_name,pkgdescription,tname,uname,session_duration,remaining_duration,payment_txnid,call_id,tid_accept,remaining_session FROM online_consultation WHERE uid = '".$current_user->ID ."'    AND action='call'  AND payment_status='success' ORDER BY id DESC LIMIT 1");
$userrow1 = $wpdb->get_row("SELECT created_date,remaining_duration FROM online_consultation WHERE uid = '".$current_user->ID ."'  AND action='call'  AND payment_txnid='". $userrow->payment_txnid ."' AND payment_status='success' ORDER BY id  LIMIT 1");

$timestamp = strtotime($userrow1->created_date); 
/* echo 'new_date'.date("Y-m-d H:i:s",strtotime("-1 hour")); 
echo 'new_date'.date("Y-m-d H:i:s",$timestamp) */; 
$therapiststatus = getTherapistConsultStatus($userrow->tid);
//$userrow->remaining_duration > 0 && 
/* echo $therapiststatus->availability_status;echo "<br/>";
echo $userrow1->created_date;echo "<br/>";
echo $userrow->remaining_duration;echo "<br/>"; */
if($userrow->therapy_name != 'Appointment' || $userrow->remaining_session > 0){
	$knowcall = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid LIKE '%".$userrow->call_id ."%'");
	$oc_id = $userrow->id;
	$call_redirect = 0;
	
?>


<br>

<table class="table table-bordered table-striped ">

	
	<tr>
		<td>Therapist name</td>
		<td><?php echo $userrow->tname;?></td>
	</tr>
	<tr>
		<td>Package name</td>
		<td><?php echo $userrow->pkgdescription;?></td>
	</tr>
	<tr>
		<td>Therapy Name</td>
		<td><?php echo ucfirst(str_replace('-', ' ', $userrow->therapy_name));?></td>
	</tr>
	
	<tr>
		<td>Call Session</td>
		<td><?php echo $userrow->session_duration;?> Mins</td>
	</tr>
	<tr>
		<td>Balance Time</td>
		<td><?php if(count($knowcall) > 0 && $userrow->remaining_duration > 0){ echo $userrow->remaining_duration;} else { echo $userrow->session_duration; } ?> Mins</td>
	</tr>
	
	<?php 
	$disabled = "";
	if($userrow->call_id != ''){ 
		if(count($knowcall) == 0 || $therapiststatus->availability_status != 1){ 
			$style =  "background-color:#dee2e6";
			$disabled = "disabled";
		} else { 
			if(($userrow->remaining_duration > 0 && (count($knowcall) > 0)) && ($timestamp > strtotime("-1 hour"))){ 
				$style =  "background:#282560;color:#fff;";
			} else { 
				$style =  "background:#dee2e6 !important"; 
				$disabled = "disabled";
			} 
		} 
	}  else { 
		$style =  "background:#dee2e6 !important";
		$disabled = "disabled";	
	}
	?>
	<tr>  
		<td><button class="btnConsult" onclick="window.location.reload();" ><i class="fa fa-refresh" aria-hidden="true"  style="color: #fff;"></i>Refresh</button></td><td><button id='btncallback2' class='btnConsult' onclick='callback(<?php echo $oc_id;?>);' style="<?php echo $style; ?>" <?php echo $disabled;?>>Call Back</button></td>
	</tr>
	
	
	
</table>

<div class="accept_modal1" style="display:none;">
	
	<div id="demo4" style="text-align:center;padding:15px;height: 36%;margin: 0 auto;"></div>
	<div id="demo3" class="col-md-6 col-xs-6" style="display:inline-block;"></div>
	
	
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script>
function callback(oc_id){ 
	
	$.ajax({ 
			 
			url: myajax.ajax_url,
			type: 'POST',
			dataType : 'html',
			data: {'action': 'lastocid','oc_id': oc_id},
			success: function (data) { 
				var callout = 0;
			
				if(data != ''){ 
						
					// Update the count down every 1 second
					var x = setInterval(function() {
					var newoc_id =data;
					
					$('.accept_modal1').css('display','block');
					  if(callout == 0){	
							$.ajax({ 
								 
								url: myajax.ajax_url,
								type: 'POST',
								dataType : 'html',
								data: {'action': 'chkrejection','oc_id': newoc_id},
								success: function (data) { 
									  
									if(data == 1){ 
										document.getElementById("demo4").style.display = "block";
										document.getElementById("demo3").innerHTML = "";
										document.getElementById("demo4").innerHTML = "<div class='col-md-12 col-xs-12 mesgt' style='text-align:center'><p class='timer_text1'>Calling Therapist .Please wait for  therapist to Accept the Session.<br/><img style='width:100px;height:100px;' src='<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>'/></div>";
										
										$('#btncallback2').prop('disabled',true);
										$('#btncallback2').css('background-color','#dee2e6'); 
										
										console.log("Therapist answered");
									}else if(data == 2){ 
										//$('.mainsessin').css('display','block');
										callout = 3;
										
									}else if(data == 3){ 
										callout = 3;
										
									}else if(data == 4){ 
										callout = 4;
										
									}  
								}
							});  
						} else if(callout == 1){ 
							
							document.getElementById("demo3").innerHTML = "";
							document.getElementById("demo4").innerHTML = "<div class='col-md-12 col-xs-12 mesgt' style='text-align:center'><p class='timer_text1'>Calling Therapist .Please wait for  therapist to Accept the Session.<br/><img style='width:100px;height:100px;' src='<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>'/></div>";
							
							console.log("Therapist answered");
						} else if(callout == 2){ 
						
							document.getElementById("demo3").innerHTML = "";
							document.getElementById("demo4").style.display = "none";
							document.getElementById("demo3").innerHTML = "<div class='col-md-6 col-xs-6 mesgt'><p class='timer_text1'>Therapist Not Responding</p></div>";
							
							//$('.mainsessin').css('display','block');
						} else if(callout == 3){
							clearInterval(x);
							document.getElementById("demo3").innerHTML = "";
							document.getElementById("demo4").style.display = "block";
							document.getElementById("demo4").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Incase of any call drop , please click on call back after refresh </p></div>";
							$('#btncallback2').prop('disabled',false);
							$('#btncallback2').css('background-color','#282560'); 
							$('#btncallback2').css('color','#fff'); 
							$('.mainsessin').css('display','none');
							//$('#btncallback2').prop('disabled',false);
							//setTimeout('window.location.href="<?php echo site_url();?>/career-page/call-page"',4000);
						//	$('#btncallback2').css('background-color','#fec031');
							
						}else if(callout == 4){ 
							
							document.getElementById("demo3").innerHTML = "";
							document.getElementById("demo4").innerHTML = "<div class='col-md-12 col-xs-12 mesgt' style='text-align:center'><p class='timer_text1'>Thank you for the Session.Hope you had a wondurful one !!!</div>";
							
							console.log("Therapist answered");
						}	
					}, 3000);
				}	
				
			}
		});  
}


</script>

<?php  
	}  else {
		if($therapiststatus->availability_status != 1) { 
			$cron_update = 0;
			if($userrow->call_id != ''){ if(count($knowcall) == 0 || ($knowcall->call_uuid !=  $userrow->call_id) ){  $cron_update = 0; } } else { $cron_update = 2;}
			$wpdb->query("UPDATE online_consultation SET cron_update='".$cron_update."',func_name = 'call-page' WHERE id='".$userrow->id ."'");	
			echo "<h1 style='font-size: 28px;'>Therapist Busy</h1>";
		} else {
			echo "<h1 style='font-size: 28px;'>NO ACTIVE SESSION</h1>";
		}
	
	
	}
	
	include_once get_stylesheet_directory().'/new-footer.php'; 
}
?>
