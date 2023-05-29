<?php /* Template Name: Availability Business page */ 
if (!is_user_logged_in()) { 
  wp_redirect('/login/');
  exit();
}

$current_user = wp_get_current_user();//print_r($current_user);
include_once get_stylesheet_directory().'/new-header.php';?>
<style>

 

.border {

  width: 100%;
  border: 0px solid #ccc !important;
  
}


.btnweek,.btnalldays{
	width: 125px;
} 



@media (min-width: 320px) and (max-width: 640px){

	/* business model css */
	#dis_html{
		margin-left: -27px;
		margin-right: 10px;
	}
	.slider:before{
		height: 20px !important;
		width: 20px !important;
	}
	.switch{
		width: 55px !important;
		height: 25px !important;
	}
	.businesstitle{
		font-size: 22px;
		font-weight: 600;
		color: #27265f;
		width: 100%;
		margin: 0 auto;
		text-align: center;
		margin-bottom: 10px;
	}
	.bmknmore{
		color: #27265f;
		font-size: 12px;
		font-weight: 600;
	}
	.yttitle{
		font-size: 22px;
		font-weight: 600;
		color: #27265f;
		width: 100%;
		margin: 0 auto;
		text-align: center;
		margin-bottom: 10px;
	}
	.ytherapy{
		font-size: 18px;
		font-weight: 600;
		background: #000;
		padding: 10px;
		color: #fff;
	}
	.ytduration{
		font-size: 14px;
		font-weight: 600;
		margin-left: -54px;
		text-align: center;
	}
	.ytprice{
		font-size: 14px;
		font-weight: 600;
		margin-left: -18px;
		text-align: center;
	}
	.ytgstprice{
		font-size: 14px;
		font-weight: 600;
		text-align: center;
		
	}
	.ytearning{
		font-size: 14px;
		font-weight: 600;
		text-align: center;
		
	}
	.yttimming{
		font-size: 22px;
		font-weight: 600;
		color: #27265f;
		width: 100%;
		margin: 0 auto;
		text-align: center;
		margin-bottom: 10px;
	}
	.ytavailability{
		font-size: 14px;
		font-weight: 600;
		margin-left: -32px;
		text-align: center;
	}
	.ytstarttime{
		font-size: 14px;
		font-weight: 600;
		width: 100px;
			
	}
	.ytendtime{
		font-size: 14px;
		font-weight: 600;
		width: 100px;
		margin-left: 15px;		
	}
	.minstitle{
		width:90px;
		margin-left: -20px;
	}
	.fake-label{
		margin-left: 5px;
		font-size: 13px;
	}
	.alldays{
		width:90px;
		margin-left: -20px;
	}
	.weekdaytitle{
		width:115px;
		margin-left: -20px;
	}
	.ytinstantservice{
		font-size: 16px;
		font-weight: 600;
	}
	.communication-channel-appointment{
		font-size: 16px;
		font-weight: 600;
	}
	.intdesc{
		width: 100%;
		padding: 0px 15px;
	}
	.appdesc{
		width: 100%;
		padding: 0px 15px;
	}
	.btnweek ,.btnalldays {
		background-color: #e7e7e7; 
		color: black;
		border: none;
		padding: 8px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 13px;
		margin-left: 18px !important;
		cursor: pointer;
		width: 60px !important;
		font-weight: 600;
	}
	input#start0alldays {
		width: 85px;
	}
	input#end0alldays {
		width: 85px;
		margin-left: 10px;
	}
	.starttme{
		width:80px;
	}
	.endtme{
		width:80px;
		margin-left: 10px;
	}
	.acceptterm{
		width:320px;
	}
	.yttnc{
		padding: 0px 10px;
	}
	
	/*business model end heres*/
}

</style>
<section>
	<div class="container">
		
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 col-xs-12">
	
		<!--<h2 class="entry-title w-100 blog-title mt-3 mb-4" id="hide_text">Enter your mobile number to complete your profile.</h2>-->
		
			<?php global $wpdb;
			$current_user = wp_get_current_user();
			$mobile_no = "";
			//echo "<pre>";print_r($current_user);
			if(!empty($current_user->data)){
				$check_caller_entry = $wpdb->get_row("SELECT meta_value FROM wp_usermeta WHERE user_id = ".$current_user->data->ID ." and meta_key = 'mobile'");
				if($check_caller_entry){
					$mobile_no = $check_caller_entry->meta_value;
				}
				
			}
			?>
			<form data-parsley-validate class="form-element-section" method="post" novalidate>
				<?php wp_nonce_field('availability_therapist'); ?>
				<!--<div id="hide_mob">
					<div class="col-md-4 input_level">
						<h5>Mobile Number *</h5>
					</div>
					<div class="col-md-8 input_level">
						<div class="input-group">
							<input type="number" class="form-control international-number" name ="mobile" id="mobile" required data-parsley-errors-container="#error_msg" style="border-color: #54515142 !important;" autocomplete="off" value="<?php echo $mobile_no;?>"/>
						</div>
					</div>
					<div id="error_msg"></div>
					<div class="col-md-12 input_level  text-center">
						<input class="login_btn" type="submit" name="check_mobile_no" value="Submit" id="availability_therapist">
					</div>
				</div>-->
			<?php
	//$mobile = $_POST['mobile'];
	//$mobile =$mobile_no;
	$members = get_users(array(
			'meta_key' => 'mobile', 
			'meta_value'   => 'subscriber',
			'meta_value' => $mobile_no
		)
	);
	$html = "";
	//echo $mobile_no;
	//print_r($members);
	$existData = array();
	//echo $members[0]->data->ID;
	//if(in_array('therapist', $members[0]->roles)) {
		$postID = get_user_meta($members[0]->data->ID, 'post_id', true);
		$html .= "<input type='hidden' name='post_id' value='".$postID."' />";
		if($bank_details){
			$ahn = $bank_details['account_holder_name'];
			$bn = $bank_details['bank_name'];
			$an = $bank_details['account_number'];
			$ifsc = $bank_details['ifsc_code'];
		}else{
			$ahn = "";
			$bn = "";
			$an = "";
			$ifsc = "";
		}
		
		$html .= "
		<div class='border'>
			<div class='form-group'>
				<div class='col-md-12  col-xs-12'>
					<label for='timming' class='yttimming'>Timing</label>
				</div>
			</div>
		
			<div class='form-group'>
				<div class='col-md-12  col-xs-12'>
					<div class='col-md-3 col-xs-3'>
						<label for='availability' class='ytavailability' >Availability</label>
					</div>
					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<label for='time' class='ytstarttime'>Start Time</label>
						</div>
						<div class='col-md-3 col-xs-3'><label for='time' class='ytendtime'>End Time</label></div>
					</div>
				</div>
			</div> ";
		
		$querystr2 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key LIKE '%availability%' ORDER BY `wp_postmeta`.`meta_id` ASC ";
		$result2 = $wpdb->get_results( $querystr2, OBJECT ); 
		
		
		$r=0;$monday =$tuesday =$wednesday = $thursday = $friday = $saturday = $sunday  = 0;
		//echo 'r'.$r;echo "<br/>";
		$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key = 'availability_0_all_days' AND meta_value=1";
		$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
		$alldays = count($result4);
		$weekday = 'alldays';	
		if($alldays == 0){
			$html .= "<div class='form-group' id='alldays1'>
					<div class='row'>
						<div class='col-md-12  col-xs-12'>
							<div class='checkbox col-md-3 col-xs-3'>
								<label for='alldays' class='alldays' style='float:left'>
									<input type='checkbox'  onclick='enabledays();' id='alldays' name='availability_all_days['alldays'][]' value='1' />
									<span class='fake-input'></span>
									<span class='fake-label'>All Days</span>
								</label>

							</div>
							<div class=''>
								<div class='col-md-3 col-xs-3'>
									<input type='text' placeholder='Start Time' name='availability_start_time[alldays][]' id='start0$weekday' class='form-control alldays' readonly />


								</div>
								<div class='col-md-3 col-xs-3'>
									<input type='text' placeholder='End Time' name='availability_end_time[alldays][]'  id='end0$weekday' class='form-control alldays' readonly />
								</div>
							</div>	
							<div class='col-md-3 col-xs-3'>
								<button type='button' class='form-control  btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add</button>
							</div>
					
						</div>	
					</div>
				</div>";
			
		} else {
			$k=1;$m=0;
			//echo "<pre>";print_r($result2);exit();
			for($g=0;$g < count($result2);$g++){
				
				$weekday = 'alldays';
				$label = 'All Days';
					
				if($result2[$g]->meta_key == 'availability_0_all_days' && $result2[$g]->meta_value == 1){
					//if($result2[$g]->meta_key == 'availability_0_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_0_time'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						//if($result5[0]->meta_value =='Monday'){
							$counter = $result5[0]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="
								<div class='form-group' id='$weekday$k'>
									<div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='checkbox  col-md-3 col-xs-3'>";
												if($m == 0){
													$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
													<input type='checkbox'   onClick='enabledays(\"$weekday\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
													<span class='fake-input'></span>
													<span class='fake-label'>".$label."</span>
													</label>";
												}
											$html .="</div>
											<div class=''>
												<div class='col-md-3 col-xs-3'>
													<input type='text' id='start$p$weekday' placeholder='Start Time'  name='availability_start_time[$weekday][]' class='form-control alldays ' value='".$start_time."' required/>
												</div>
												<div class='col-md-3 col-xs-3'>
													<input type='text' id='end$p$weekday' placeholder='End Time' name='availability_end_time[$weekday][]' class='form-control alldays ' value='".$end_time."' required/>
												</div>
											</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control  btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$startarr = explode(":",$start_time);
								$endarr = explode(":",$end_time);
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});
								$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							$r++;
							
						//} 
					//}
				}	
			} 
				
		}
			$html .= "<div id='alldaysdiv'></div>";
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Monday' ";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$monday = count($result4);
			$weekday = 'monday';	
			if($monday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='monday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Monday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Monday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start$weekday0' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value=''  readonly/>


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='End Time' id='end$weekday0' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=1;$m=0;$r=0;
				//echo "<pre>";print_r($result2);exit();
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						if($result5[0]->meta_value =='Monday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'monday';
							$label = 'Monday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$endarr = explode(":",$end_time);
								$startarr = explode(":",$start_time);
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			
			$html .= "<div id='mondaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Tuesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$tuesday = count($result4);
			$weekday = 'tuesday';	
			if($tuesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3' >
							<label for='tuesday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Tuesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Tuesday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value=''  readonly/>


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			} else {
				$k=0;$r=0;$m=0;
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Tuesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'tuesday';
							$label = 'Tuesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3' style='float:left'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='tuesdaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Wednesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$wednesday = count($result4);
			$weekday = 'wednesday';
			if($wednesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3' >
							<label for='wednesday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Wednesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Wednesday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			}  else {
				$k=1;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Wednesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'wednesday';
							$label = 'Wednesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){ 
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required />
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
									disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='wednesdaydiv'></div>";  	
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Thursday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$thursday = count($result4);
			$weekday = 'thursday';
			if($thursday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='thursday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Thursday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Thursday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>
				
				";
				$html .= "<div id='thursdaydiv'></div>";  
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Thursday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'thursday';
							$label = 'Thursday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required />
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
									disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='thursdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Friday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$friday = count($result4);
			$weekday = 'friday';
			if($friday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='friday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Friday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Friday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday'  name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Friday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'friday';
							$label = 'Friday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$weekday$p' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$weekday$p' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='fridaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Saturday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$saturday = count($result4);
			$weekday = 'saturday';
			if($saturday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='saturday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Saturday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Saturday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Saturday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'saturday';
							$label = 'Saturday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  id='start$p$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='saturdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Sunday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$sunday = count($result4);
			$weekday = 'sunday';
			if($sunday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='sunday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Sunday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Sunday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				 
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
					
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Sunday'){
							$weekday = 'sunday';
							$label = 'Sunday';
							$counter = $result2[$g]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='sundaydiv'></div>"; 	
		 $html .= "</div>";
	//}	
							
				//print_r($checked);
		//if(in_array('0',$existData)){
		echo	$html .= "<div class='form-group text-center'><input class='login_btn' type='submit' name='submit_business' value='Save'/></div>";?>
				<input type="hidden" id="counter" value="1"/>
				<!--<div id="dis_html"></div>-->
			</form>
		</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</section>	
	


<script>
function enabledays(){
	if($("#alldays").is(':checked')){ 
	 	$('.alldays').timepicki({
			show_meridian:false,
			min_hour_value:0,
			max_hour_value:23,
		
			overflow_minutes:true,
			increase_direction:'up',
			disable_keyboard_mobile: true
		});
		$(".week").val('');
		$(".alldays").prop("readonly", false);
		$(".alldays").prop("required", true);
		$(".alldays").prop("disabled", false);
		$(".btnalldays").prop("disabled", false);
		$(".btnweek").prop("disabled", true);
		
		$(".week").prop("readonly", true);
		$(".week").prop("required", false);
		$(".week").prop("disabled", true);
		
		$(".days").prop("checked", false);
		
		
	}	else { 
		$(".alldays").prop("readonly", true);
		$(".days").prop("disabled", false);
		$(".btnalldays").prop("disabled", true);
		//$(".week").prop("readonly", false);
		//$(".week").prop("required", true);
		$(".alldays").prop("required", false);
		
		$(".alldays").val('');
	}
		
	  
}
function enabletime(weekday,i){ 
	if($("#"+weekday).is(':checked')){
		$("."+weekday).timepicki({
			 show_meridian:false,min_hour_value:0,
			max_hour_value:23,
		
			overflow_minutes:true,
			increase_direction:'up',
			disable_keyboard_mobile: true
		}); 
		//$(".alldays").prop("disabled", true);
		$("#alldays").prop("checked", false);
		//$("#alldays").prop("disabled", true);
		$(".btn"+weekday).prop("disabled", false);
		$("."+weekday).prop("readonly", false);
		$("."+weekday).prop("disabled", false);
		$("."+weekday).prop("required", true);
		$(".alldays").val('');
		$(".alldays").prop("readonly", true);
		$(".alldays").prop("required", false);
		$(".alldays").prop("disabled", true);
		/* $("#alldays").prop("disabled", true); */
		
	}	else {
		//$(".alldays").prop("disabled", false);
		$("."+weekday).val('');
		$(".btn"+weekday).prop("disabled", true);
		$("#alldays").prop("disabled", false);
		$("."+weekday).prop("readonly", true);
		$("."+weekday).prop("disabled", true);
		$("."+weekday).prop("required", false);
		
	}
}

function removerow(weekday,i){
	$('#'+weekday+i).remove();
}
function addalldaystime(){ 
	 $.ajax({
	    url: myajax.ajax_url,
	    type: 'POST',  
	    data: {'action': 'addalldaystime'},
	    success: function (data) { 
			$('#alldaysdiv').append(data);
	    },
		error: function (err) {
			console.log('error. :  ' + err);
		}
	});	 
	
}	 
function addmondaytime(weekday){ 
	var i = $('#counter').val();
	i++
	$('#counter').val(i);
	 $.ajax({
	    url: myajax.ajax_url,
	    type: 'POST',  
	    data: {'action': 'addmondaytime','weekday':weekday,'i':i},
	    success: function (data) { 
			$('#'+weekday+'div').append(data);
	    },
		error: function (err) {
			console.log('error. :  ' + err);
		}
	});	 
	
}
</script>
<?php
include_once get_stylesheet_directory().'/new-footer.php';?>
<script>
$(".alldays").timepicki({
	show_meridian:false,min_hour_value:0,
	max_hour_value:23,

	overflow_minutes:true,
	increase_direction:'up',
	disable_keyboard_mobile: true
}); 
$(".week").timepicki({
	 show_meridian:false,min_hour_value:0,
	max_hour_value:23,

	overflow_minutes:true,
	increase_direction:'up',
	disable_keyboard_mobile: true
}); 
</script>