<?php 

global $wpdb;
$current_user = wp_get_current_user()->ID;
echo "SELECT id,created_date,tid,busy_date,waiting,action,uid FROM online_consultation WHERE uid = '".$current_user ."'  AND remaining_session > 0 AND tid_accept = 0 AND action='call' AND payment_status='success' ORDER BY id DESC";
$userrow = $wpdb->get_row("SELECT id,created_date,tid,busy_date,waiting,action,uid FROM online_consultation WHERE uid = '".$current_user ."'  AND remaining_session > 0 AND tid_accept = 0 AND action='call' AND payment_status='success' ORDER BY id DESC");
$flag = 0;

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
			if($postdetails->post_author != $tid){
				$flag = 1;
			}

			if($_SESSION["wait_time"] != ''){
				$wait_time = $_SESSION["wait_time"];
				
				 
			} else {
				$wait_time = date('Y-m-d H:i:s',strtotime('+5 minutes'));
				$_SESSION["wait_time"] =  $wait_time; 
			}
			
		
	echo "wait_time".$_SESSION["wait_time"] = $wait_time;
?>


<div class="accept_modal1" >
	
	<div id="demo2" style="display:inline-block;text-align:center;padding:15px;"></div>
	<div class="col-md-12 col-xs-12 mainsessin">
		<div class="col-md-6 col-xs-6 mesgt">

			<div id="demo" style="display:inline-block;"></div>
		</div>
		
		<div class="col-md-6 col-xs-6 mesgt">
			<div class="col-md-2 col-xs-2 msutn">
				<button class="wait_btn session-btn" id="btnwait" onclick="wait('<?php echo $userrow->busy_date;?>','<?php echo $userrow->id;?>');" disabled>Wait Again</button>
			</div>
			<div class="col-md-2 col-xs-2 msutn">
				<button class="browse_btn session-btn" id="btntimer" onclick="browse('<?php echo $userrow->id;?>','<?php echo $userrow->tid;?>','<?php echo $userrow->uid;?>','<?php echo $userrow->action;?>');" disabled>Change Therapist</button>
			</div>
			<div class="col-md-2 col-xs-2 msutn">
				<button class="browse_btn session-btn" id="takelater" onclick="takelater('<?php echo $userrow->id;?>','<?php echo $userrow->action;?>');" disabled>Take Session Later</button>
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
    $.ajax({ 
		 
        url: myajax.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'chkrejection','oc_id': '<?php echo $oc_id; ?>'},
        success: function (data) { 
			alert(data);
			// Output the result in an element with id="demo"
			if(data == 0){
				document.getElementById("demo2").innerHTML = "";
				document.getElementById("demo").innerHTML = "<p class='timer_text1'>Please Wait for Therapist. You will also receive an SMS once accepted call. <br/><span style='color:#fec031;'>" + minutes + "m " + seconds + "s </span></p>";
			}
			  // If the count down is over, write some text 
			if (distance < 0) { 
				if(data == 0){
					clearInterval(x);
					document.getElementById("demo2").innerHTML = "";
					document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding </p>";
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
						data: {'action': 'resetwaiting','oc_id': '<?php echo $oc_id; ?>','actionc': '<?php echo $action; ?>'},
						success: function (data) {
							
							$('#btnwait').prop('disabled',false);
							$('#btntimer').prop('disabled',false);	
							$('#takelater').prop('disabled',false);	
							$('#btnwait').css('background-color','#fec031');;
							$('#btntimer').css('background-color','#fec031');
							$('#takelater').css('background-color','#fec031');	
					//alert(data);
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
					document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Therapist has accepted the session. You will receive a Call shortly</p></div>";
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
					document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding </p>";
					$('#btnwait').hide();
					$('#btntimer').show();
					$('#takelater').show();	
				}   
					
			} else if(data == 1){ //alert(data);
				document.getElementById("demo").innerHTML = "";
				document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Therapist has accepted the session. You will receive a Call shortly</p></div>";
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
				document.getElementById("demo2").innerHTML = "";
				document.getElementById("demo").innerHTML = "<p class='timer_text1'>Therapist is not Responding </p>";
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

</script>
<?php 	
		} else {
			echo "Link Expired"; 
		}	
	}
}
?>
<div class="modal fade" id="takelater1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog " style="margin-top: 200px;" role="document">
		<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align: center;">
			
			
			<span class="packtext">	Your session is saved in your account.<br> You can log back on to use it at any convenient time.<br><button class='browse_btn session-btn'  onclick='document.getElementById("takelater1").style.display=`none`'>OK</button></span>
			
			<div class="modal-body text-center">
		  
			</div>
		</div>
	</div>
</div>

<script>
function takelater(oc_id,action){
	$("#takelater1").modal('show');
	$.ajax({ 
		
		url: myajax.ajax_url,
		type: 'POST',
		dataType : 'html',
		data: {'action': 'resetwaiting','oc_id': oc_id,'actionc': action},
		success: function (data) {
			
	
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
function browse(oc_id,tid,uid,action){
	$.ajax({ 
		
        url: myajax.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'browse','oc_id': oc_id,'tid': tid,'uid': uid,'mode': action},
        success: function (data) { 
			
			if(data == 1){
				window.location.href="/talk-to-best-tarot-card-reader-online";
			}
			
			
		}
    }); 
	
	
}	
function wait(busy_date,oc_id){
  
    var countDownDate = new Date().getTime() + 5 * 60000;
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
    }); 
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
			document.getElementById("demo").innerHTML =  "<p class='timer_text1'>Please Wait for Therapist. You will also receive an SMS once accepted . <br/><span style='color:#fec031;'>"+ minutes + "m " + seconds + "s </span></p>";
			
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
		
						url:'wp-content/themes/thriive/framework/businessmodel-functions.php',
						type: 'POST',
						dataType : 'html',
						data: {'action': 'resetwaiting','oc_id': '<?php echo $oc_id; ?>'},
						success: function (data) {
							
						}
					}); 	
				
				} else if(data == 1){ 
					document.getElementById("demo").innerHTML = "";
					document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Therapist has accepted the session. You will receive a Call shortly</p></div>";
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
				document.getElementById("demo2").innerHTML = "<div class='col-md-12 col-xs-12 mesgt'><p class='timer_text1'>Therapist has accepted the session. You will receive a Call shortly</p></div>";
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

