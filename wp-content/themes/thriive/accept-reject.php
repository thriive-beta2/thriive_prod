<?php /* Template Name: Accept / Reject page */ 
//$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php';

global $wpdb;

$password="password";
/* $tid = openssl_decrypt($_GET['tid'],"AES-128-ECB",$password);  
$uid = openssl_decrypt($_GET['uid'],"AES-128-ECB",$password);   */
$ocid = $_GET['ocid'];  

if(isset($_GET['ocid']) ){ 
	$onlinerow = $wpdb->get_row("SELECT * FROM online_consultation WHERE id='".$ocid."' AND remaining_session > 0 AND action='call' AND call_id = ''");
	if($onlinerow){
		$expiry_time = date('Y-m-d H:i:s', strtotime("+". $onlinerow->session_duration ." mins",strtotime($onlinerow->busy_date)));
		
		if(strtotime(date('Y-m-d H:i:s')) < strtotime($expiry_time)){
			
			$session_duration = ($onlinerow->session_duration);
			/* $busy_date = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
			$wpdb->query("UPDATE online_consultation SET remaining_session=0,busy_date = '".$busy_date."' WHERE id='".$_GET['ocid']."'"); */
			$callresp = array();	
			$connected = 0;$uid_accept = 0;
			$busy_date = $expiry_time;
			if($_GET['accept'] == 1){
				$uidmobile = get_user_meta($onlinerow->uid,'mobile',true);
				$tidmobile = get_user_meta($onlinerow->tid,'mobile',true);
				$curl = curl_init();
				$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048166487","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($onlinerow->session_duration)));
				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/makecall',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS =>json_encode($data),
				  CURLOPT_HTTPHEADER => array(
					'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
					'x-api-key: lF4vZUSwA8Jab0ABWsITtxwM1ZwL6h2jZDdCTX30',
					'Content-Type: application/json'
				  ),
				));

				$response = curl_exec($curl);

				curl_close($curl);
				$callresp = json_decode($response,true);
				print_r($callresp);
			
		
				if(!empty($callresp)){
					if($callresp['success']['status'] == 'success'){
						$connected = 1; 
						$uid_accept = 1;
						$tid_accept = 1;
						$call_id = $callresp['success']['call_id'];
						$remaining_session =0;
						$busy_date = $expiry_time;
					}
				} 
				$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',waiting=0,email_sms=1,call_id = '".$call_id."',busy_date = '".$busy_date."' WHERE id='".$_GET['ocid']."'");
			} elseif($_GET['accept'] == 2) {
				$uid_accept = 0;
				$tid_accept = $_GET['accept'];
				$remaining_session =$onlinerow->remaining_session;
				
				$busy_date = date('Y-m-d H:i:s', strtotime("+". $onlinerow->session_duration ."  mins"));
				if($onlinerow->email_sms == 0){
					$msg = "Hi from Thriive. Sorry the selected Therapist is not Reachable right now. Please select another Therapist or take your session whenever convenient";
					$umobile = get_user_meta($onlinerow->uid, 'mobile', true);
					$tempid = '1007684902010570563';
					sendSMS($umobile,$msg,$tempid); 
				}
				$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',waiting=0,email_sms=1,call_id = '".$call_id."',busy_date = '".$busy_date."' WHERE id='".$_GET['ocid']."'");
			}
			
			
			
		
	
			if((isset($_GET['ocid']) && $onlinerow > 0 && ($onlinerow->tid_accept == 0)) && (!isset($_GET['accept']))){
					
			?> 
			
			<div class="modal fade" id="login_popup1" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog " style="margin-top: 200px;" role="document">
					<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align: center;">
						
						
						<span class="packtext">	Do you wish to </span>
						<div class=""  style="margin-top:15px;">
							
							 <a href="<?php echo site_url();?>/accept-reject?ocid=<?php echo $_GET['ocid'];?>&accept=1"><button type="button" class="contbtn"><span class="clicktxt">Accept</span></button></a>
							<a href="<?php echo site_url();?>/accept-reject?ocid=<?php echo $_GET['ocid'];?>&accept=2"><button type="button" class="contbtn" style="background:lightgrey !important;"><span class="clicktxt">Reject</span></button></a>
						 
						</div>
						<div class="modal-body text-center">
					  
						</div>
					</div>
				</div>
			</div>
			<script>
				$(document).ready(function(){
					
					$("#login_popup1").modal('show');
				});
			</script>
			<?php 

			}
		} else { 
			echo "Link Expired";
		}	
		
	}  else {
		echo "Session Over";
	}
}		
?>
</body>

<script>
$('.accept_modal1').css('display','none');	
</script>


<?php 
include_once get_stylesheet_directory().'/new-footer.php'; 
?>
</html>