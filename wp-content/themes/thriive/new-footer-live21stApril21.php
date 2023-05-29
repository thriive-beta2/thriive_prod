
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thriive
 */ 


?>

  <footer class="footerwrap mt-3">
    <div class="contactdetails">
      <aside class="contact">
       <div>
          <h4 class="hdh4">Contact Us</h4>
          <p>support@thriive.in </p>
        </div>
      </aside>
      <aside class="social">
        <h4 class="hdh4">Follow us</h4>
        <div class="ssbx">
          <a href="https://www.facebook.com/thriiveindia" target="_blank" class="ss fb"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/ss-fb.svg'; ?>" alt=""></a>
          <a href="https://www.instagram.com/thriiveindia/" target="_blank" class="ss insta"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/ss-insta.svg'; ?>" alt=""></a>
          <a href="https://in.linkedin.com/company/thriive-india-group" target="_blank" class="ss in"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/ss-in.svg'; ?>" alt=""></a>
          <a href="https://www.youtube.com/channel/UCmN0ipKhWCOlvAbLKvzp1Ww" target="_blank" class="ss yt"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/ss-yt.svg'; ?>" alt=""></a>
          <a href="https://twitter.com/thriiveindia" target="_blank" class="ss tw"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/ss-tw.svg'; ?>" alt=""></a>
        </div>
      </aside>
    </div>
    <p class="copyrights">© <?php echo date('Y'); ?> THRIIVE ART & SOUL LLP. All Rights Reserved.</p>
    <p class="copyrights">Please ensure to have read the <a href="https://www.thriive.in/wp-content/themes/thriive/assets/pdf/general-terms-of-use.pdf">T&C</a> and disclaimer prior to using the services of our website.</p>


  </footer>
  <?php $current_user = wp_get_current_user(); ?>  
  <input type="hidden" name = "session_user" id="session_user" value="<?php echo $current_user->ID ?>" />
  <div class="table-responsive">
    <div id="user_details"></div>
    <div id="user_model_details"></div>
  </div>
  <?php if(isset($_GET['chat']) && $_GET['chat'] == 'yes'){
    echo "<script>check_box_open()</script>";
  } 
  wp_footer(); ?>
  <?php include_once get_stylesheet_directory().'/new-rsm-modal.php'; ?>
 <script src=<?php echo "'".  get_site_url().'/wp-content/themes/thriive/js/timepicki.js?v=2021226.0'."'";?>></script>

<!--<script src="<?php// echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/chat-renew/scripts/chat-script.js?v=20210420.22"></script>-->






 
<?php
$current_user = wp_get_current_user()->ID;
$curr_role = get_user_meta($current_user)['wp_capabilities'];
$curr_name = get_user_meta($current_user)['first_name'][0];
if(strpos($curr_role[0], 'subscriber')!=false){
  $curr_role = 'sub';
}else if(strpos($curr_role[0], 'therapist')!=false){
  $curr_role = 'therapist';
}

if($curr_role == 'sub'){?>

<style>
  #nUser{
    display: none;
  }
</style>

<?php }?>


<?php include_once '/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/chat_modals/modals.php'; ?>
<style>
  .accept_modal,.accept_modal_timer{
    width:100%;
  height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
    display: none;
    z-index: 9991;
  }
  .accept_modal1{
    width:100%;
  height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
   
    z-index: 9991;
  }
  .accept_modal_table{
    display: block;
    background: transparent;
    width: max-content;
    padding: 10px;
    border-radius: 10px;
    margin: 0 auto;
    margin-top: 8vh;
    color:#fff;
  }
  .acc_table{
    width: 100%;
    text-align: center;
    border:none !important;
  }
  .acc_table tr{
  }

.mesgt {
    float: left;
    padding: 15px;
}
.msutn {
    margin-left: 105px;
}
.session-btn {
    padding: 5px;
    border-radius: 5px;
    margin: 5px;
}
p.timer_text,p.timer_text1 {
   color: #fff;
   font-size: 14px;
}
.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   float:left;
   margin-top: 15px
}
div#accept_modal1 {
   color: #ffbd2c;
}
.msutn {
   margin-left: 10px;
   clear: both;
}
.session-btn {
   padding: 5px;
   border-radius: 5px;
   margin: 2px;
   width: 135px;
   font-size: 14px;
}
.mainsessin{
	margin-left: 235px;
}
.timer_img{
	width:50px;
	margin-left: 20px;
}

.user_exit{
  	width:100%;
	height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
    display: none;
    z-index: 9991;
  }
 .exit_text{
    color: #ffbd2c;
    margin-top: 4rem;
    text-align: center;
 }
@media screen and (max-width:767px) and (min-width:320px){
.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   float: left;
   margin-top: 10px;
   width:25px;
   font-size: 24px;
}
.timer_img{
	width:50px;
	margin-left: 65px;
}
div#accept_modal1 {
   color: #ffbd2c;
}
.msutn {
   margin-left: 10px;
   clear: both;
}
.session-btn {
   padding: 5px;
   border-radius: 5px;
   margin: 2px;
   width: 135px;
   font-size: 14px;
}
.mainsessin {
    margin-left: 0px !important;
}
  .accept_modal_table{
    display: block;
    background: transparent;
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    margin: 0 auto;
    margin-top: 8vh;
    color:#fff;
  }	



}


</style>



<div class="user_exit">
	<div class="exit_text">USER EXITED THE CHAT!! SESSION INCOMPLETE</div>
</div>


<div class="accept_modal_timer">
	<div class="col-md-12 col-xs-12 mainsessin">
		<div class="col-md-6 col-xs-6 mesgt">

		<p class="timer_text">Please Wait for Therapist. You will also receive an SMS once accepted chat</p>
		<div class="accept_timer" id="accept_timer"><?php if($_SESSION){if($_SESSION['curr_time']){echo $_SESSION['curr_time'];}else{echo '4:59';}}else{echo '4:59';}?></div><img class="timer_img" src="">
		</div>
		<div class="col-md-6 col-xs-6 mesgt">
		<div class="col-md-2 col-xs-2 msutn">
		<button class="wait_btn session-btn" disabled="true" data-ocid="0" onclick="user_waiting(this.dataset.ocid);">Wait Again</button>
		</div>
		<div class="col-md-2 col-xs-2 msutn">
		<button class="browse_btn session-btn" disabled="true" onclick="user_browsing(this.dataset.ocid,this.dataset.action);" data-ocid='0' data-action="0">Change Therapist</button>
		</div>
		<div class="col-md-2 col-xs-2 msutn">
		<button class="browse_btn session-btn" disabled="true" onclick="take_later(this.dataset.ocid,this.dataset.action);" data-ocid='0' data-action="0">Take Session Later</button>
		</div>
		</div>
	</div>
</div>

<div class="marked_icomplete_msg">
	<h5></h5>
</div>



<div class="accept_modal" style="">
		<div class="accept_modal_table">
			<h4>Please Accept Chat Request From</h4>
			<table class="acc_table">
			</table>
		</div>
</div>
<?php 
global $wpdb;

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
			

	$_SESSION["wait_time"] = $wait_time;
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
		 
        url: ajax_object.ajax_url,
        type: 'POST',
		dataType : 'html',
        data: {'action': 'chkrejection','oc_id': '<?php echo $oc_id; ?>'},
        success: function (data) { 
			
			// Output the result in an element with id="demo"
			//if(data == 0){
				document.getElementById("demo2").innerHTML = "";
				document.getElementById("demo").innerHTML = "<p class='timer_text1'>Please Wait for Therapist. You will also receive an SMS once accepted . <br/><span style='color:#fec031;'>" + minutes + "m " + seconds + "s </span></p>";
			//}
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
		
		url: ajax_object.ajax_url,
		type: 'POST',
		dataType : 'html',
		data: {'action': 'resetwaiting','oc_id': oc_id,'actionc': action},
		success: function (data) {
			
	
		}
	});
}
function response(oc_id,res){
	$.ajax({ 
		
		url: ajax_object.ajax_url,
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
		
        url: ajax_object.ajax_url,
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
		
        url: ajax_object.ajax_url,
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
		
        url: ajax_object.ajax_url,
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
		
						url: ajax_object.ajax_url,
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


</body>
</html>