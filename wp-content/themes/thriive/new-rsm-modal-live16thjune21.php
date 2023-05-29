<!-- Modal -->
<div class="modal fade" id="call_with_healer" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
        <div class="modal-content">
            <div class="row">
              
              <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
				<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                        <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                </button>
              </div>
            </div>
            <div class="modal-body text-center">
              <?php if (!is_user_logged_in()) {
               set_query_var( 'column', 'col-sm-8 col-12');
               set_query_var( 'text_left', 'text-left');
               get_template_part( 'template-parts/new-oc-seeker-login-form-call-modal');
              } ?>      
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login_popup" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
        <div class="modal-content">
        <div class="row">
              <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
				<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                        <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                </button>
              </div>
        </div>
            <div class="modal-body text-center">
                <?php set_query_var( 'column', 'col-sm-8 col-12');
                set_query_var( 'text_left', 'text-left');
                get_template_part( 'template-parts/new-otp-based-login-modal'); ?>        
            </div>
        </div>
    </div>
</div>
<?php if(is_page(32867) || is_page(32300) || is_page(32260) || is_page(32235) || is_page(32377) || is_page(32379) || is_page(32381) || is_page(32258) || is_page(32186) || is_page(32893) || is_page(32905)) { ?>
  <div class="modal fade" id="mobile_verfication_modal" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="error-msg form-error" id="mobileExist"></div>
           <form data-parsley-validate class="form-element-section"  id="form_send_otp">
               <div class="row section col-sm-12 col-12 mx-auto p-0">
  <!--                <a href="<?php echo wp_logout_url( '/login/' ); ?>">&times;</a> -->
  <!--                <a href="" class="otp-form-close close" data-dismiss="modal">&times;</a> -->
                  <div class="form-group col-12">
                      <label for="mobile-number">Please enter your mobile number for verification</label>
  <!--                    <p class="sub-text"></p> -->
                      <input data-parsley-required="true" type="tel" data-parsley-required-message="Mobile is required." class="form-control international-number" id="mobile-number" value="<?php if($current_user->mobile) { '+' . $current_user->countryCode . $current_user->mobile; } ?>">
                  </div>
                  
                  <button type="submit" class="btn d-inline btn-primary" id="send_otp">SEND OTP</button>
               </div>
           </form>                  
           <form data-parsley-validate class="form-element-section" id="mobile_verification">
               <div class="row section col-sm-12 col-12 mx-auto p-0 d-none" id="div_verify_otp">
                  <div class="form-group col-12 ">
                      <label for="mobile-otp">Enter OTP</label>
                      <input data-parsley-required="true" type="text" data-parsley-required-message="OTP is required." data-parsley-maxwords="4" class="form-control" id="mobile-otp" id="mobile-otp">
                      <div class="loading-msg">Loading...</div>
                      <div class="otp-error"></div>
                  </div>
                  <button type="button" class="btn d-inline btn-primary" id="re_send_otp">RESEND OTP</button>
                  <button type="submit" class="btn d-inline btn-primary" id="verify_otp">NEXT</button>
               </div>
           </form>
          </div>
        </div>
      </div>
  </div>
  <?php if(is_user_logged_in()) {
      $current_user = wp_get_current_user();
      if(($current_user->is_mobile_verify) == 0){
          echo '<script type="text/javascript">$("#mobile_verfication_modal").modal();</script>';
      }   
  } 
} ?>
<?php 

$userrow = $wpdb->get_row("SELECT id,created_date,tid,busy_date,waiting,action,uid,therapy_name FROM online_consultation WHERE uid = '".$current_user->ID ."'    AND action='call'  AND payment_status='success' ORDER BY id DESC LIMIT 1");
$flag = 0;
//AND tid_accept = 0 AND remaining_session > 0
$wait_time = date('Y-m-d H:i:s',strtotime('+1 mins'));
if($userrow){ 
	if($userrow->waiting == 1){
		$expiry_time = date('Y-m-d H:i:s', strtotime("+5 mins",strtotime($userrow->busy_date)));
		if(strtotime(date('Y-m-d H:i:s')) < strtotime($expiry_time)){
		  //foreach($isexist as $is){
			$cdate = $userrow->created_date;
			$oc_id = $userrow->id;
			$action = $userrow->action;
			$tid = $userrow->tid;
			$postdetails = get_post_meta($tid,'post_name',true);
			
			if($_SESSION["wait_time"] != ''){
				$wait_time = $_SESSION["wait_time"];
				
				 
			} else {
				$wait_time = date('Y-m-d H:i:s',strtotime('+1 mins'));
				$_SESSION["wait_time"] =  $wait_time; 
			}
			

	$_SESSION["wait_time"] = $wait_time;
?>


<div class="accept_modal1" >
	
	<div id="demo2" style="text-align:center;padding:15px;height: 36%;margin: 0 auto;"></div>
	<div class="col-md-12 col-xs-12 mainsessin">
		<div class="col-md-6 col-xs-6 mesgt">

			<div id="demo" style="display:inline-block;"></div>
		</div>
		
		<div class="col-md-6 col-xs-6 mesgt">
			<div class="col-md-2 col-xs-2 msutn">
				<button class="wait_btn session-btn" id="btnwait" onclick="wait('<?php echo $userrow->busy_date;?>','<?php echo $userrow->id;?>');" disabled>Wait Again</button>
			</div>
			<div class="col-md-2 col-xs-2 msutn">
				<button class="browse_btn session-btn" id="btntimer" onclick="browse('<?php echo $userrow->id;?>','<?php echo $userrow->tid;?>','<?php echo $userrow->uid;?>','<?php echo $userrow->action;?>','<?php echo $userrow->therapy_name;?>'), this.style.border = '4px solid #fff'" onMouseOver="this.style.backgroundColor='#fff', this.style.border='2px solid #fff'" disabled>Change<br> Therapist</button>
			</div>
			<div class="col-md-2 col-xs-2 msutn">
				<button class="browse_btn session-btn" id="takelater" onclick="takelater('<?php echo $userrow->id;?>','<?php echo $userrow->action;?>','<?php echo $userrow->therapy_name;?>'), this.style.border = '4px solid #fff';" onMouseOver="this.style.backgroundColor='#fff', this.style.border='2px solid #fff'" disabled>Take Session Later</button>
			</div>
		</div> 
	</div>
	
</div>
<script> 
  
var countDownDate = new Date('<?php echo $wait_time; ?>').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  console.log('Call Ajax');
	
 $.ajax({ 
		 
        url: myajax.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'chkrejection','oc_id': '<?php echo $oc_id; ?>'},
        success: function (data) { 
			console.log('Call Working');
		    document.getElementById("demo2").innerHTML = "";
			document.getElementById("demo").innerHTML = "<p class='timer_text1' style='text-align:center'>Calling Therapist. Please Wait.<br/><span style='color:#fec031;'>" + minutes + "m " + seconds + "s </span></p>";
			
			if (distance < 0) { 
				console.log('Call Therapist Not Responding');
				if(data == 0){
					clearInterval(x);
					//document.getElementById("demo2").innerHTML = "";
					document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding </p>";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);		
					$('#takelater').prop('disabled',false);		
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					$.ajax({ 
		
						url: ajax_object.ajax_url,
						type: 'POST',
						dataType : 'html',
						data: {'action': 'resetwaiting','oc_id': '<?php echo $oc_id; ?>','actionc': '<?php echo $action; ?>'},
						success: function (data) {
							
							$('#btnwait').prop('disabled',false);
							$('#btntimer').prop('disabled',false);	
							$('#takelater').prop('disabled',false);	
							$('#btnwait').css('background-color','#fec031');;
							$('#btntimer').css('background-color','#fec031');
							$('#takelater').css('background-color','#fec031');	
					
						}
					}); 	
				} else if(data == 1){ 
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);
					$('#takelater').prop('disabled',false);	
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					document.getElementById("demo").innerHTML = "";
					document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Calling Therapist. Please Wait.<br/></p><img style='width:100px;height:100px;' src='<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>'/></div>";
					$('#btnwait').hide();
					$('#btntimer').hide();
					$('#takelater').hide();
				} else if(data == 2){ 
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);
					$('#takelater').prop('disabled',false);	
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					document.getElementById("demo2").innerHTML = "";
					document.getElementById("demo2").style.display = "none";

					document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding </p>";
					$('#btnwait').hide();
					$('#btntimer').show();
					$('#takelater').show();	
				}   
					
			} else if(data == 1){ 
				document.getElementById("demo").innerHTML = "";
				document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt' style='text-align:center'><p class='timer_text1'>Calling Therapist .Please Wait.<br/><img style='width:100px;height:100px;' src='<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>'/></div>";
				$('#btnwait').prop('disabled',false);
				$('#btntimer').prop('disabled',false);	
				$('#takelater').prop('disabled',false);	
				$('#btnwait').css('background-color','#fec031');;
				$('#btntimer').css('background-color','#fec031');
				$('#takelater').css('background-color','#fec031');	
				$('#btnwait').hide();
				$('#btntimer').hide();
				$('#takelater').hide();
				console.log("Therapist answered");
			}else if(data == 2){ 
				document.getElementById("demo2").innerHTML = "";
				document.getElementById("demo2").style.display = "none";
				document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding </p>";
				$('#btnwait').prop('disabled',false);
				$('#btntimer').prop('disabled',false);
				$('#takelater').prop('disabled',false);	
				$('#btnwait').css('background-color','#fec031');;
				$('#btntimer').css('background-color','#fec031');
				$('#takelater').css('background-color','#fec031');	
				console.log("Therapist Rejected");
				$('#btnwait').hide();
				$('#btntimer').show();	
				$('#takelater').show();	
			} 
		}
    });  
  
}, 1000);



</script>


<?php 
		} else {
			//echo "Link Expired";
		}	
	}
}
?>

<div class="modal fade" id="takelater1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog " style="margin-top: 200px;" role="document">
		<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align: center;">
			
			<div class="row">
              
              <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: 10px;">
									
					<div class="col-sm-10 col-xs-10 text-center" >	
						<span class="packtext">	Your session is saved in your account.<br> You can log back on to use it at any convenient time.<br><a id="laterlink" href="#"><button class='browse_btn session-btn btnCallnow'  >OK</button></a></span>
					</div>	
					<div class="col-sm-2 col-xs-2 text-center" >
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
								<span aria-hidden="true" style="font-size: 33px;">&times;</span>
						</button>
					</div>	
				
				</div>		
              </div>
            </div>
			
			
			
		</div>
	</div>
</div>
<script>
function takelater(oc_id,action,therapy_name){
	$("#takelater1").modal('show');
	$.ajax({ 
		
		url: myajax.ajax_url,
		type: 'POST',
		dataType : 'html',
		data: {'action': 'resetwaiting','oc_id': oc_id,'actionc': action},
		success: function (data) {
			var link = document.getElementById("laterlink");
			
			
			if(therapy_name == 'tarot-card-reading'){
				link.setAttribute("href", "<?php echo site_url();?>/talk-to-best-tarot-card-reader-online");
			}else if(therapy_name == 'life-coach'){
				link.setAttribute("href", "<?php echo site_url();?>/talk-to-best-life-coach-online");
			}else if(therapy_name == 'hypno-therapy'){
				link.setAttribute("href", "<?php echo site_url();?>/hypnotherapy");
			}else if(therapy_name == 'inner-child-healing'){
				link.setAttribute("href", "<?php echo site_url();?>/inner-child-healing");
			}else if(therapy_name == 'sex-therapist'){
				link.setAttribute("href", "<?php echo site_url();?>/consult-top-sex-therapists-online");
			}else if(therapy_name == 'past-life-regression'){
				link.setAttribute("href", "<?php echo site_url();?>/past-life-regression-therapy");
			}else if(therapy_name == 'counseling-consulting'){
				link.setAttribute("href", "<?php echo site_url();?>/counseling");
			}else if(therapy_name == 'eft-emotional-freedom-technique'){
				link.setAttribute("href", "<?php echo site_url();?>/eft-emotional-freedom-technique");
			}else if(therapy_name == 'Appointment'){
				link.setAttribute("href", "<?php echo site_url();?>/book-tarot-reading-by-appointment");
			}else if(therapy_name == 'nutritionist'){
				link.setAttribute("href", "<?php echo site_url();?>/consult-nutritionist-online");
			}else if(therapy_name == 'vastu'){
				link.setAttribute("href", "<?php echo site_url();?>/vastu");
			}else if(therapy_name == 'numerology'){
				link.setAttribute("href", "<?php echo site_url();?>/talk-to-best-numerologist-online");
			}else if(therapy_name == 'Free Covid Session'){
				link.setAttribute("href", "<?php echo site_url();?>/consult-covid-counselor-online");
			}
		}
	});
}
function response(oc_id,res){
	$.ajax({ 
		
		url: myajax.ajax_url,
		type: 'POST',
		dataType : 'html',
		data: {'action': 'response','oc_id': oc_id,'res': res},
		success: function (data) { alert(data);
			$('.response').prop('disabled',true);
			$('#tres').html(data);
				
	
		}
	});
}
function browse(oc_id,tid,uid,action,therapy_name){
	$.ajax({ 
		
        url: myajax.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'browse','oc_id': oc_id,'tid': tid,'uid': uid,'mode': action},
        success: function (data) { 
			
			if(data == 1){
				if(therapy_name == 'tarot-card-reading'){
					window.location.href="/talk-to-best-tarot-card-reader-online";
				}else if(therapy_name == 'life-coach'){
					window.location.href="/talk-to-best-life-coach-online";
				}else if(therapy_name == 'hypno-therapy'){
					window.location.href="/hypnotherapy";
				}else if(therapy_name == 'inner-child-healing'){
					window.location.href="/inner-child-healing";
				}else if(therapy_name == 'sex-therapist'){
					window.location.href="/consult-top-sex-therapists-online";
				}else if(therapy_name == 'past-life-regression'){
					window.location.href="/past-life-regression-therapy";
				}else if(therapy_name == 'counseling-consulting'){
					window.location.href="/counseling";
				}else if(therapy_name == 'eft-emotional-freedom-technique'){
					window.location.href="/eft-emotional-freedom-technique";
				}else if(therapy_name == 'Appointment'){
					window.location.href="/book-tarot-reading-by-appointment";
				}else if(therapy_name == 'nutritionist'){
					window.location.href="/consult-nutritionist-online";
				}else if(therapy_name == 'vastu'){
					window.location.href="/vastu";
				}else if(therapy_name == 'numerology'){
					window.location.href="/talk-to-best-numerologist-online";
				}else if(therapy_name == 'Free Covid Session'){
					window.location.href="/consult-covid-counselor-online";
				}
				
			}
			
			
		}
    }); 
	
	
}	
function wait(busy_date,oc_id){
  
    /* var countDownDate = new Date().getTime() + 5 * 60000;
    $('#btnwait').prop('disabled',true);
    $('#btntimer').prop('disabled',true);
	$('#takelater').prop('disabled',true);
	$('#btnwait').css('background-color','#fff');;
	$('#btntimer').css('background-color','#fff');
	$('#takelater').css('background-color','#fff');	
    $.ajax({ 
		
        url: myajax.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'savewaittime','busy_date': busy_date,'oc_id': oc_id},
        success: function (data) { 
			
		}
    });  */
  // Update the count down every 1 second
  var x = setInterval(function() {
	
    // Get today's date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
   // alert(distance);
    // Time calculations for days, hours, minutes and seconds
	 
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("demo").innerHTML = "<p class='timer_text1'>Calling Therapist .Please Wait.<br/><span style='color:#fec031;'>" + minutes + "m " + seconds + "s </span></p>";
	
    // Output the result in an element with id="demo"
   // document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
  $.ajax({ 
		
        url: myajax.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'chkrejection','oc_id': '<?php echo $oc_id; ?>'},
        success: function (data) { 
			// Output the result in an element with id="demo"
			document.getElementById("demo2").innerHTML = "";
			document.getElementById("demo").innerHTML =  "<p class='timer_text1'>Calling Therapist .Please Wait.<br/><span style='color:#fec031;'>"+ minutes + "m " + seconds + "s </span></p>";
			
			  // If the count down is over, write some text 
			if (distance < 0) { //alert(data);
				if(data == 0){
					clearInterval(x);
					document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding.</p>";
					document.getElementById("demo2").innerHTML = "";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);		
					$('#takelater').prop('disabled',false);		
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					$.ajax({ 
		
						url: myajax.ajax_url,
						type: 'POST',
						dataType : 'html',
						data: {'action': 'resetwaiting','oc_id': '<?php echo $oc_id; ?>'},
						success: function (data) {
							
						}
					}); 	
				
				} else if(data == 1){ 
					document.getElementById("demo").innerHTML = "";
					document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Calling Therapist.Please Wait.<br/><span style='color:#fec031;'></p></div><div class='col-md-12 col-xs-12 mesgt'><img style='width:100px;height:100px;' src='<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>'/></div>";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);
					$('#takelater').prop('disabled',false);	
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					$('#btnwait').hide();
					$('#btntimer').hide();	
					$('#takelater').hide();	
					
				} else if(data == 2){ 
					document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding</p>";
					document.getElementById("demo2").innerHTML = "";
					$('#btnwait').prop('disabled',false);
					$('#btntimer').prop('disabled',false);	
					$('#takelater').prop('disabled',false);	
					$('#btnwait').css('background-color','#fec031');;
					$('#btntimer').css('background-color','#fec031');
					$('#takelater').css('background-color','#fec031');	
					$('#btnwait').hide();
					$('#btntimer').show();
					$('#takelater').show();	
				}   
					
			} else if(data == 1){ //alert(data);
				document.getElementById("demo").innerHTML = "";
				document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Calling Therapist.Please Wait.<br/><span style='color:#fec031;'></p></div><div class='col-md-12 col-xs-12 mesgt'><img style='width:100px;height:100px;' src='<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>'/></div>";
				$('#btnwait').prop('disabled',false);
				$('#btntimer').prop('disabled',false);
				$('#takelater').prop('disabled',false);	
				$('#btnwait').css('background-color','#fec031');;
				$('#btntimer').css('background-color','#fec031');
				$('#takelater').css('background-color','#fec031');	
				$('#btnwait').hide();
				$('#btntimer').hide();	 
				$('#takelater').hide();	
			}else if(data == 2){ //alert(data);
				document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding.</p>";
				document.getElementById("demo2").innerHTML = "";
				$('#btnwait').prop('disabled',false);
				$('#btntimer').prop('disabled',false);
				$('#takelater').prop('disabled',false);	
				$('#btnwait').css('background-color','#fec031');;
				$('#btntimer').css('background-color','#fec031');
				$('#takelater').css('background-color','#fec031');		
				$('#btnwait').hide();
				$('#btntimer').show();
				$('#takelater').show();	
			}
		}
    }); 
  }, 1000);
}
</script>
<script type="text/javascript">



	$('#select_therapy').on('change', function() {
		var url = $(this).val(); // get selected value
		if (url) { // require a URL
		  window.location = url; // redirect
		}
		return false;
	});
  
  $("#d_opensignupform, #d_opensignupform1, #d_opensignupform2, #d_opensignupform3, #m_opensignupform, #m_opensignupform1, #m_opensignupform2, #m_opensignupform3").on('click', function(){
    $(".modal-body #reg_unhide #payment").val(0);
    $("#call_with_healer").modal('show');
  });

  $('#openloginform').on('click', function(){
    $("#call_with_healer").modal('hide');
    $("#login_popup").modal('show');
  });

  $('#opensignupform').on('click', function(){
    $("#call_with_healer").modal('show');
    $("#login_popup").modal('hide');
  });

  $('#headeropenlogin, #openloginfromsidemenu').on('click', function(){
    $("#login_popup").modal('show');
  });

  $('#opensignupmodal, #opensignupmodal1').on('click',function(){
    $("#lead_source").val('tarot-tool');
    $("#call_with_healer").modal('show');
  });
  
  $(".regter").on('click', function(){
    var position = $(this).attr('data-position');
    $("#lead_source").val($("#event_title_"+position).val());
    $("#event_position").val(position);
    $("#call_with_healer").modal('show');
  });
  
  $('#sub').on('click',function(){
    $("#lead_source").val('Numerology_tool');
    $("#call_with_healer").modal('show');
  });

  $('.login0').on('click',function(){
    $("#lead_source").val('zodiac_compatibility_tool');
    $("#call_with_healer").modal('show');
  });

  $('#freesession_register').on('click',function(){
    var ailment_id = s_ailment = t_ailment = "";
    if($('#selectailment').val() == 1) {
      ailment_id = 1;
      s_ailment = "Other";
      t_ailment = $("input[name=typeailment]").val();
    } else if($('#selectailment').val() != 0){
      ailment_id = $('#selectailment').val();
      s_ailment = $('#selectailment').find(':selected').data('termname');
    }
    var therapies = $(".ftherapies:checked").map(function() {return this.id;}).toArray().join(", ");
    document.cookie='rfs_ailment_id' + "=" + ailment_id;
    document.cookie='rfs_s_ailment' + "=" + s_ailment;
    document.cookie='rfs_t_ailment' + "=" + t_ailment;
    document.cookie='rfs_therapies' + "=" + therapies;
    $("#call_with_healer").modal('show');
  });
</script>