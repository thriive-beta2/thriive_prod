<?php /* Template Name: Issues Feedback  page */ 
$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/new-header.php';
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

.smiley-header {
    width: 35%;
    overflow: hidden;
    margin: 0 auto;
    position: relative;
    text-align: center;
}
	.smiley-header img{
		width:25%;
		margin:0px -10px;
		opacity: 0.7;
	}
.feedback_catg {
    width: 25%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 0 auto;
}
	.feedback_catg div{
		width:40%;
		text-align: center;
	    margin: 5px;
	    border-radius: 11%;
    	padding: 10px;
	}

	.feedback_catg div img{
		width:65%;
	}

	.feedback_catg input{
		margin: 0;
	}
	.feedback_catg label{
		color:#59595B;
		font-weight: 500;
		display: inline;
	} 
	.feedback_catg textarea{
		width:100%;
		height:5rem;
	}
	.feedback_form1{
		height:0px;
		overflow: hidden;
		text-align: center;
		transition: ease-in-out 0.5s;
		padding-left: 5%;
		background-color: #f4f4f4;
		border-radius: 10%;
	}

	.feedback_form1 table{
		border: none;
	}
	.feedback_form2 table{
		border: none;
	}
	.feedback_form1 button{
		margin:0 auto;
		display: block;
	}
	.feedback_form2 {
		height:0px;
		overflow: hidden;
		text-align: center;
		transition: ease-in-out 0.5s;
		padding-left: 5%;
		background-color: #f4f4f4;
		border-radius: 10%;
	}
	.feedback_form3{
		height:0px;
		overflow: hidden;
		text-align: center;
		transition: ease-in-out 0.5s;
		padding-left: 5%;
		background-color: #f4f4f4;
		border-radius: 10%;
	}
	.feedback_form3 button{
		margin:0 auto;
		display: block;
	}
	.feedback_form3 button{
		margin:0 auto;
		display: block;
	}
	.spacer{
		height:15px;
	}
	.issue_parent{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0px;
    background-color: rgba(0,0,0,0.8);
	}
	.issue_modal{
	width: 40%;
    background-color: #fff;
    border-radius: 15px;
    text-align: center;
    color: #58595B;
    font-size: 20px;
    margin: 0 auto;
    top: 35%;
    position: relative;
    padding: 10px;

	}
	.issue_modal img{
		width: 30%;
    overflow: hidden;
    margin: 0 auto;
	}







@media screen and (max-width:767px) and (min-width:320px){
	.smiley-header{
		width:100%;
		overflow: hidden;
		margin:0 auto;
		position: relative;
		text-align: center;
	}
	.smiley-header img{
		width:25%;
		margin:0px -10px;
		opacity: 0.7;
	}
	.feedback_catg{
		width:100%;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}
	.feedback_catg div{
		width:40%;
		text-align: center;
	    margin: 5px;
	    border-radius: 11%;
    	padding: 10px;
}
	

	.feedback_catg div img{
		width:65%;
	}

	.feedback_catg input{
		margin: 0;
	}
	.feedback_catg label{
		color:#59595B;
		font-weight: 500;
		display: inline;
	} 
	.feedback_catg textarea{
	    width: 92%;
	    max-width: 92%;
	    height: 6rem !important;
	    margin-bottom: 10px !important;
	    border: solid 1px #EDEDED;
 		border-radius: 10px;
}	
	
	.feedback_form1{
		height:0px;
		width: 80% !important;
		overflow: hidden;
		text-align: center;
		transition: ease-in-out 0.5s;
		margin-bottom: 10px;
	}
	.feedback_form1 button{
	    margin: 0 auto;
	    display: block;
	    background-color: #467EE0;
	    width: 7rem;
	    outline: none;
	    border: none;
	    border-radius: 4px;
	    color: #fff;
	    padding: 5px;
	}
	.feedback_form2,.feedback_form3{
		height:0px;
		width: 80% !important;
		overflow: hidden;
		text-align: center;
		transition: ease-in-out 0.5s;
		margin-bottom: 10px;
	}
	.feedback_form2 button,.feedback_form3 button {
	    margin: 0 auto;
	    display: block;
	    background-color: #467EE0;
	    width: 7rem;
	    outline: none;
	    border: none;
	    border-radius: 4px;
	    color: #fff;
	    padding: 5px;
	}
	.spacer{
		height:15px;
	}

	.issue_parent{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0px;
    background-color: rgba(0,0,0,0.8);
	}
	.issue_modal{
	width: 90%;
    background-color: #fff;
    border-radius: 15px;
    text-align: center;
    color: #58595B;
    font-size: 20px;
    margin: 0 auto;
    top: 35%;
    position: relative;
    padding: 10px;

	}
	.issue_modal img{
		width: 30%;
    overflow: hidden;
    margin: 0 auto;
	}

}


</style>
<br><br>
<?php 
global $wpdb;
if(isset($_GET['ocid'])){
	$wpdb->query("UPDATE online_consultation SET waiting=0 WHERE id='".$_GET['ocid']."'");	
	$ocid = $_GET['ocid'];
	$callid = $_GET['callid'];
} else {
	$lastrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE uid = '".$current_user->ID ."' ORDER BY id DESC LIMIT 1");
	//print_r($lastrow);
	$ocid = $lastrow->id;
	$callid = $lastrow->call_id;
}	

?>
<div class="smiley-header"> 
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Red%20Smiley.png">
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Yellow%20Smiley.png">
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Blue%20Smiley.png">
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Green%20Smiley.png">
</div>

<h1 style="color:#467EE0;font-size: 18px;margin: 2rem auto;">Your Feedback Is Always Appreciated!</h1>

<h1 style="color:#404041;font-size: 18px;margin: 2rem auto;">What Would You Like Help With?</h1>
<div class="feedback_catg">
	<div onclick="open_feedback(1);"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Call.png"><br>
		<h2 style="color:#404041;font-size: 18px;margin-top: 1rem;margin-bottom: 2rem;">Call</h2></div>
	<div onclick="open_feedback(2);"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Chat.png"><br>
		<h2 style="color:#404041;font-size: 18px;margin-top: 1rem;margin-bottom: 2rem;">Chat</h2></div>
	<div style="width:62%;text-align: left;" class="feedback_form1">
		<p style="color:#59595B;font-size: 18px;font-weight: 600; margin-top: 1rem;margin-bottom: 1rem;">Please Select Issue:</p>
		<input type="hidden" name="ocid" value="<?php echo $ocid; ?>" >
		<input type="hidden" name="callid" value="<?php echo $callid; ?>" >
		<input type="hidden" id="click_pos" value="" >
    
		<table cellpadding="5px;" style="border:none !important">
			<tr><td><input type="radio" name="call_opinion" value="Call Incomplete"></td><td><label for="1">Call Incomplete</label></td></tr>
			<tr><td><input type="radio" name="call_opinion" value="Call was not clear"></td><td><label for="2">Call was not clear</label></td></tr>
			<tr><td><input type="radio" name="call_opinion" value="Did not recieve the call"></td><td><label for="3">Did not recieve the call</label></td></tr>
			<tr><td><input type="radio" name="call_opinion" value="I was asked to pay again"></td><td><label for="4">I was asked to pay again</label></td></tr>
			<tr><td><input type="radio" onclick="opentext();"  name="call_opinion" value="Other"></td><td><label for="5">Other</label></td></tr>
		</table>
		<textarea name="others" class="others" placeholder="Your Text Here..." ></textarea>
		<a  onclick="submitfeedback();"><button >Submit</button></a>
	</div>
	<div onclick="open_feedback(3);"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Appointment.png"><br>
		<h2 style="color:#404041;font-size: 18px;margin-top: 1rem;margin-bottom: 2rem;">Appointment</h2></div>
	<div onclick="open_feedback(4);"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive%20Feedback%20-Icons%201024x1024_Others.png"><br>
		<h2 style="color:#404041;font-size: 18px;margin-top: 1rem;margin-bottom: 2rem;">Others</h2></div>
	<div style="width:62%;text-align: left;" class="feedback_form2">
		<p style="color:#59595B;font-size: 18px;font-weight: 600; margin-top: 1rem;margin-bottom: 1rem;">Please Select Issue:</p>
		<table cellpadding="5px;" style="border:none !important;">
			<tr><td><input type="radio" name="call_opinion" id="1" value="Call Incomplete"></td><td><label for="1">Call Incomplete</label></td></tr>
			<tr><td><input type="radio" name="call_opinion" value="Call was not clear"></td><td><label for="2">Call was not clear</label></td></tr>
			<tr><td><input type="radio" name="call_opinion" value="Did not receive the call"></td><td><label for="3">Did not receive the call</label></td></tr>
			<tr><td><input type="radio" name="call_opinion" value="I was asked to pay again"></td><td><label for="4">I was asked to pay again</label></td></tr>
			<tr><td><input type="radio" onclick="opentext();"  name="call_opinion" value="Other"></td><td><label for="5">Other</label></td></tr>
		</table>
		<textarea name="others"  class="others1" placeholder="Your Text Here..." ></textarea>
		<a  onclick="submitfeedback();"><button >Submit</button></a>
	</div>
	<div style="width:62%;text-align: left;display:none;" class="feedback_form3" >
	
		<textarea name="others"  class="others2" placeholder="Your Text Here..." ></textarea>
		<a  onclick="submitfeedback();"><button >Submit</button></a>
	</div> 
</div>

<div class="issue_parent" id="thankyoumodal" style="display:none;">
	<div class="issue_modal" >
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive Feedback -Icons 1024x1024_Popup.png"><br><br>
		<p>
			  Thank you for your feedback. We will get back to you shortly.
		</p>
	</div>
</div>
<div class="issue_parent" id="feedbackumodal" style="display:none;">
	<div class="issue_modal" >
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/feedback/1024X1024/Thriive Feedback -Icons 1024x1024_Popup.png"><br><br>
		<p>
			  Thank you for your feedback. We have added back session into your account.
		</p>
	</div>
</div>



<script type="text/javascript">
	globalThis.SelectedQuery;
	function submitfeedback(){
		var click_pos = document.getElementById('click_pos').value;
		var session_type = click_pos;
		var call_opinion;
		if(click_pos == 1 || click_pos == 2){
			var others= $('.others').val();
			 $('table input[type="radio"]').each(function(){
				if($(this).is(':checked')){
					call_opinion = $(this).parent().next().find('label').text();
				}
			});
		} else if(click_pos == 3){ 
			var others= $('.others1').val();
			$('table input[type="radio"]').each(function(){
				if($(this).is(':checked')){
					call_opinion = $(this).parent().next().find('label').text();
				}
			});
		}  else if(click_pos == 4){ 
			var others= $('.others2').val();
			
		}		
		
		var ocid = $('input[name=ocid]').val();
		var callid = $('input[name=callid]').val();
		$.ajax({ 
			
			url: myajax.ajax_url,
			type: 'POST',
			dataType : 'html',
			data: {'action': 'submit_feedback','session_type': session_type,'call_opinion': call_opinion,'ocid': ocid,'callid': callid,'others': others },
			success: function (data) {
				
				setTimeout(function(){ window.location.href="/talk-to-best-tarot-card-reader-online"; }, 3000);
				if(data == 1){
					$('#feedbackumodal').show(); 
				} else {
					$('#thankyoumodal').show();
				}
			}
		});		
		
	}
	function open_feedback(click_pos){
		document.getElementById('click_pos').value = click_pos;
		$('.others').val('');
		document.querySelector('.feedback_form3').style.height = "0";
		document.querySelector('.feedback_form3').style.display = "none";
		
		switch(click_pos){
			case 1:
				SelectedQuery = 'call';
				document.querySelectorAll('.feedback_form1 label')[0].innerText = "Call Incomplete";
				document.querySelectorAll('.feedback_form1 label')[1].innerText = "Call was not clear";
				document.querySelectorAll('.feedback_form1 label')[2].innerText = "Did not receive the call";
				document.querySelectorAll('.feedback_form1 label')[3].innerText = "I was asked to pay again";
				document.querySelector('.feedback_form1').style.height = "375px";
				document.querySelector('.feedback_form2').style.height = "0";
				document.querySelectorAll('.feedback_catg div')[0].style.backgroundColor = "#f4f4f4";
				document.querySelectorAll('.feedback_catg div')[1].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[3].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[4].style.backgroundColor = "transparent";								
				break;
			case 2:
				SelectedQuery = 'chat';
				document.querySelectorAll('.feedback_form1 label')[0].innerText = "Could not start the Chat";
				document.querySelectorAll('.feedback_form1 label')[1].innerText = "I was asked to pay again";
				document.querySelectorAll('.feedback_form1 label')[2].innerText = "Therapist did not respond midway";
				document.querySelectorAll('.feedback_form1 label')[3].innerText = "Chat was incomplete";
				
				//document.querySelectorAll('.feedback_form1 call_opinion')[0].value = "Could not start the Chat";
				/* document.querySelectorAll('.feedback_form1 input')[1].value = "I was asked to pay again";
				document.querySelectorAll('.feedback_form1 input')[2].value = "Therapist did not respond midway";
				document.querySelectorAll('.feedback_form1 input')[3].value = "Chat was incomplete"; */
				document.querySelector('.feedback_form1').style.height = "375px";
				document.querySelector('.feedback_form2').style.height = "0";
				document.querySelectorAll('.feedback_catg div')[0].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[1].style.backgroundColor = "#f4f4f4";
				document.querySelectorAll('.feedback_catg div')[3].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[4].style.backgroundColor = "transparent";
				break;
			case 3:
				SelectedQuery = 'appointment';
				document.querySelectorAll('.feedback_form2 label')[0].innerText = "I want to reschedule";
				document.querySelectorAll('.feedback_form2 label')[1].innerText = "Link was not working";
				document.querySelectorAll('.feedback_form2 label')[2].innerText = "I did not recieved the link";
				document.querySelectorAll('.feedback_form2 label')[3].innerText = "Session stopped midway";
				document.querySelector('.feedback_form2').style.height = "375px";
				document.querySelector('.feedback_form1').style.height = "0";
				document.querySelector('.feedback_form3').style.display = "none";
				document.querySelectorAll('.feedback_catg div')[0].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[1].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[3].style.backgroundColor = "#f4f4f4";
				document.querySelectorAll('.feedback_catg div')[4].style.backgroundColor = "transparent";
				break;
			case 4:
				SelectedQuery = 'others';
				document.querySelector('.feedback_form2').style.height = "0";
				document.querySelector('.feedback_form1').style.height = "0";
				document.querySelector('.feedback_form3').style.height = "200px";
				document.querySelector('.feedback_form3').style.display = "block";
				document.querySelectorAll('.feedback_catg div')[0].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[1].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[3].style.backgroundColor = "transparent";
				document.querySelectorAll('.feedback_catg div')[4].style.backgroundColor = "#f4f4f4";
				break;	
				
		}
	}
</script>
<?php 
include_once get_stylesheet_directory().'/new-footer.php';

?>