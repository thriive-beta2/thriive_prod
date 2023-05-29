<?php /* Template Name: chat-page */
include_once get_stylesheet_directory().'/new-header.php'; 
	if(!is_user_logged_in()){
		header("Location: https://thriive.in/login");
	}
?>

<style>
</style><br>
<div style="width: 100%;text-align: center;display: none;">
<h1 style="font-size: 28px;text-align: center;">LIVE CHAT/VIDEO PAGE</h1>
<br><br>
<h3 style="text-align: center;font-size: 13px;">PLEASE DO NOT LEAVE THIS PAGE UNTIL YOUR CHAT IS COMPLETE</h3>
<br><br>
	<h4 style="font-size: 14px;">Please Refresh If you do not see your session</h4><br><br>
<button onclick="/*check_all_chats();*/ location.reload();" id="check_chat" style="text-align: center;background-image: url('https://thriive.in/wp-content/themes/thriive/horoscope_new/refresh-256x256.png');background-size: contain;width:3rem;height:3rem;"></button><p id="check_btn_text"></p>

<h3 id="session_data" style="font-size: 15px;">CHECKING SESSION DATA...</h3>
</div>

<style type="text/css">
	body{
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	}
	.session_status_parent_container{
		border:solid #0C9F97 2px;
		border-radius: 20px;
		width:23rem;
		margin:0 auto;
	}
	.session_status_therapist_Content{
		display: flex;
		justify-content: center;
		/*background-color: #B7D4FF;*/
		flex-wrap: wrap;
		margin-top: -60px;
	}
	.session_status_therapist_Content_img_container{
		width: 103px;
	    border-radius: 50%;
	    background-color: #fff;
	    padding: 9px 0px;
	    text-align: center;
	}
	.session_status_therapist_Content img{
	    width: 95px;
    	height: 95px;
	    border: 1px solid #0C9F97;
	    border-radius: 50%;
	    background-color: #fff;
	    overflow: hidden;
	    padding: 3px;
	    margin: 0 auto;

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
	    font-size: 18px;
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
		padding: 10px 0px;
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
</style>
<br><br><br><br>
<div class="session_status_parent_container">
	<div class="session_status_therapist_Content">
		<div class="session_status_therapist_Content_img_container">
			<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-No Session ongoing.png">
		</div>
		<p>Checking Session Data</p>
	</div>
		<div class="session_status_separator">
			<img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/seperator.svg">
		</div>
	<div class="session_status_session_status"> ... </div>
	<div class="session_status_session_animation">
		<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/ongoing session.gif">
	</div>
	<div class="session_status_buttons">
		<section class="session_status_button">
			<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Change Therapist.png" onclick="user_browsing(this.dataset.ocid,1)">
			<p class="session_status_button_text">Change Therapist</p>
		</section>
		<section class="session_status_button">
			<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Save session.png" onclick="take_later(this.dataset.ocid,1)">
			<p class="session_status_button_text">Save Session for Later</p>
		</section>
	</div>	
	<div class="session_status_start_chat_btn">
		<section class="session_status_button purple">
			<img src='https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Start Chat.png' data-tid='' data-uid='' data-ocid='' onclick="accept_chat(this.dataset.tid,this.dataset.uid,this.dataset.ocid)">
			<p class="session_status_button_text">Start Chat</p>
		</section>
	</div>
	<div class="session_status_therapist_accept_chat_btn">
		<section class="session_status_button purple">
			<button data-tid='' data-uid='' data-ocid='' onclick="accept_chat(this.dataset.uid,this.dataset.tid,this.dataset.ocid)">Accept Chat</button>
		</section>
	</div>			
	<div class="session_status_open_chat_btn">
		<section class="session_status_button  purple">
			<button data-tid='' data-uid='' data-ocid='' onclick="clear_chatbox(0)">Open Chat</button>
		</section>
	</div>
	<div class="session_status_book_session_now_btn">
		<section class="session_status_button purple">
			<button onclick="window.location.href= '<?php echo get_site_url(). '/talk-to-best-tarot-card-reader-online'?>';">Book a Session Now</button>
		</section>
	</div>	
	<div class="session_status_feedback_btn">
		<section class="session_status_button purple">
			<button onclick="window.location.href = 'https://www.thriive.in/issues-feedback-page';">Feedback</button>
		</section>
	</div>		
</div>
<div class="disable_header_navigation_overlay" onclick="alert('Please Stay On this page Until your session is complete');">
	
</div>
<br><br><br><br><br><br><br>
<!--
<table>
	<tr><td onclick="ChangeDialogue(1)">1</td><td onclick="ChangeDialogue(2)">2</td><td onclick="ChangeDialogue(3)">3</td></tr>
	<tr><td onclick="ChangeDialogue(4)">4</td><td onclick="ChangeDialogue(5)">5</td><td onclick="ChangeDialogue(6)">6</td></tr>
	<tr><td onclick="ChangeDialogue(7)">7</td><td onclick="ChangeDialogue(8)">8</td><td onclick="ChangeDialogue(9)">9</td></tr>
	<tr><td onclick="ChangeDialogue(10)">10</td><td onclick="ChangeDialogue(11)" style="background-color:#ADFCFF">11</td><td style="background-color:#ADFCFF" onclick="ChangeDialogue(12)">12</td></tr>
	<tr><td style="background-color:#ADFCFF" onclick="ChangeDialogue(13)">13</td><td  style="background-color:#ADFCFF" onclick="ChangeDialogue(14)">14</td><td style="background-color:#ADFCFF" onclick="ChangeDialogue(15)">15</td></tr>


</table>
-->

<script type="text/javascript">
globalThis.TherapistData = '';
async function ChangeDialogue(dialogue){
	//OC_ID = 138178;
	/*
		Case Description

		1 -> therapist_didnt_respond = 1;
		2 -> calling_therapist_to_come_online_for_chat = 2;
		3 -> sorry therapist is not available = 3;
		4 -> greatnews therapist is coming online = 4
		5 -> Lets give therapist couple of mins...
		6 -> therapist is ready
		7 -> ongoing session
		8 -> Session ended
		9 -> No ongoing sessions
	*/

	if(TherapistData == ''){
		TherapistData = await LightboxTherapistInfo(OC_ID);
		TherapistData = JSON.parse(TherapistData);
		console.log(TherapistData);
		}else{
		//
		}


	switch(dialogue){
		case 1:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Therapist_didn't Respond`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'therapist_didnt_respond', TherapistData['site_url']));
			enable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;

		case 2:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Calling Therapist to come Online.<br>Please Wait !`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'calling_therapist', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			disable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();

		break;

		case 3:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Sorry Therapist is not Available.`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			enable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;

		case 4:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Great News. Therapist is joining shortly.<br>Please Wait !`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'great_news', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			disable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 5:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Therapist is Setting up.<br>Please Wait !`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'lets_give', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			disable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;		

		case 6:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Therapist is Online. Start Chat.<br>Have a Good Session.`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'therapist_ready', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			show_start_chat_button(TherapistData['tid'],TherapistData['uid'],OC_ID);
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			disable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 7:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Ongoing Session`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'ongoing_session', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			show_open_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			disable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 8:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Session Ended`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'session_ended', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			show_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;

		case 9:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			change_therapist_lightbox_head('No Ongoing Sessions');
			hide_therapist_lightbox_image();
			change_therapist_lightbox_message(``);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			show_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			hide_session_status_separator();
		break;

		case 10:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			change_therapist_lightbox_head('Sorry the session is Expired');
			change_therapist_lightbox_message(`However you session is saved in your wallet you can use it when you want.`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'no_ongoing_sessions', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			show_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 11:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'open_chat', TherapistData['site_url']));
			change_therapist_lightbox_head('New Chat Request');
			change_therapist_lightbox_message(TherapistData['user_data']);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'ongoing_session', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			show_therapist_accept_btn(TherapistData['tid'],TherapistData['uid'],OC_ID);
			enable_header_navigation();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 12:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			change_therapist_lightbox_head('Please Wait');
			change_therapist_lightbox_message('Please wait for user to start the Chat');
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'lets_give', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			hide_therapist_accept_btn(TherapistData['tid'],TherapistData['uid'],OC_ID);
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;

		case 13:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'open_chat', TherapistData['site_url']));
			change_therapist_lightbox_head('Session Started');
			change_therapist_lightbox_message('---');
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'ongoing_session', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			show_open_chat_button();
			hide_therapist_accept_btn(TherapistData['tid'],TherapistData['uid'],OC_ID);
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;

		case 14:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'open_chat', TherapistData['site_url']));
			change_therapist_lightbox_head('Incomplete');
			change_therapist_lightbox_message('Last user Changed Therapist');
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			hide_therapist_accept_btn(TherapistData['tid'],TherapistData['uid'],OC_ID);
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 15:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			change_therapist_lightbox_head('No Ongoing Sessions');
			hide_therapist_lightbox_image();
			change_therapist_lightbox_message(``);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			hide_session_status_separator();
		break;		

		case 16:
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Your Session is saved in your wallet. You can use it at any Convenient time.`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('icon', 'save_session', TherapistData['site_url']));
			enable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;

		case 17:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			change_therapist_lightbox_head('Sesssion Ended Due to Inactivity');
			change_therapist_lightbox_message(`Your Session is saved in your wallet. You can use it at any Convenient time.`);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('icon', 'save_session', TherapistData['site_url']));
			enable_therapist_lightbox_buttons();
			show_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;	

		case 18:
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			change_therapist_lightbox_head('Session Ended Due to Inactivity');
			hide_therapist_lightbox_image();
			change_therapist_lightbox_message(``);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			hide_session_status_separator();
		break;		

	}

	if(dialogue == 1){		

		//console.log(TherapistData);
	}

}

function change_therapist_lightbox_image(url){
		document.querySelector('.session_status_therapist_Content img').src = url;
}

function change_therapist_lightbox_head(data){
		document.querySelector('.session_status_therapist_Content p').innerHTML = data;
}

function change_therapist_lightbox_message(data){
		document.querySelector('.session_status_session_status').innerHTML = data;
}

function change_therapist_lightbox_animation(url){
		document.querySelector('.session_status_session_animation img').src = url;
}

function hide_therapist_lightbox_image(){
		document.querySelector('.session_status_therapist_Content_img_container').style.visibility = 'hidden';
}

function show_therapist_lightbox_image(){
		document.querySelector('.session_status_therapist_Content_img_container').style.visibility = 'unset';
}

function hide_session_status_separator(){
		document.querySelector('.session_status_separator').style.display = 'none';
}

function show_session_status_separator(){
		document.querySelector('.session_status_separator').style.display = 'block';
}

function enable_therapist_lightbox_buttons(){
	show_therapist_lightbox_buttons();
	document.querySelector('.session_status_buttons').style.pointerEvents = 'unset';
	document.querySelector('.session_status_buttons').style.cursor = 'pointer';
	document.querySelectorAll('.session_status_buttons img')[0].dataset.ocid = OC_ID;
	document.querySelectorAll('.session_status_buttons img')[1].dataset.ocid = OC_ID;
	document.querySelectorAll('.session_status_buttons img')[0].style.filter = 'drop-shadow(2px 2px 2px black)';
	document.querySelectorAll('.session_status_buttons img')[1].style.filter = 'drop-shadow(2px 2px 2px black)';
	document.querySelectorAll('.session_status_buttons img')[0].style.opacity = 'unset';
	document.querySelectorAll('.session_status_buttons img')[1].style.opacity = 'unset';
}

function disable_therapist_lightbox_buttons(){
	document.querySelector('.session_status_buttons').style.pointerEvents = 'none';
	document.querySelector('.session_status_buttons').style.cursor = 'not-allowed';
	document.querySelectorAll('.session_status_buttons img')[0].style.filter = 'grayscale(1)';
	document.querySelectorAll('.session_status_buttons img')[1].style.filter = 'grayscale(1)';
	document.querySelectorAll('.session_status_buttons img')[0].style.opacity = '0.5';
	document.querySelectorAll('.session_status_buttons img')[1].style.opacity = '0.4';

}

function hide_therapist_lightbox_buttons(){
	document.querySelector('.session_status_buttons').style.display = 'none';
}

function show_therapist_lightbox_buttons(){
	document.querySelector('.session_status_buttons').style.display = 'flex';
}

function hide_start_chat_button(){
	document.querySelector('.session_status_start_chat_btn').style.display = 'none';	
}

function show_start_chat_button(tid,uid,ocid){
	document.querySelector('.session_status_start_chat_btn img').dataset.tid = tid;
	document.querySelector('.session_status_start_chat_btn img').dataset.uid = uid;
	document.querySelector('.session_status_start_chat_btn img').dataset.ocid = ocid;
	document.querySelector('.session_status_start_chat_btn').style.display = 'block';	
	document.querySelector('.session_status_start_chat_btn img').style.filter = 'drop-shadow(2px 2px 2px black)';	
}

function show_open_chat_button(){
	document.querySelector('.session_status_open_chat_btn').style.display = 'inline';
}

function hide_open_chat_button(){
	document.querySelector('.session_status_open_chat_btn').style.display = 'none';
}

function hide_book_session_now_btn(){
	document.querySelector('.session_status_book_session_now_btn').style.display = 'none';		
}

function show_book_session_now_btn(){
	document.querySelector('.session_status_book_session_now_btn').style.display = 'inline';		
}

function show_feedback_btn(){
	document.querySelector('.session_status_feedback_btn').style.display = 'inline';	
}

function show_therapist_accept_btn(tid,uid,ocid){
	document.querySelector('.session_status_therapist_accept_chat_btn button').dataset.tid = tid;
	document.querySelector('.session_status_therapist_accept_chat_btn button').dataset.uid = uid;
	document.querySelector('.session_status_therapist_accept_chat_btn button').dataset.ocid = ocid;
	document.querySelector('.session_status_therapist_accept_chat_btn').style.display = 'inline';
}

function hide_therapist_accept_btn(){
	document.querySelector('.session_status_therapist_accept_chat_btn').style.display = 'none';
}

function hide_feedback_btn(){
	document.querySelector('.session_status_feedback_btn').style.display = 'none';	
}

function disable_header_navigation(){
	document.querySelector('.disable_header_navigation_overlay').style.height = document.querySelector('#headermain').clientHeight+'px';
	document.querySelector('.disable_header_navigation_overlay').style.display = 'block'; 
	document.querySelector('#headermain').style.pointerEvents = 'none';
}

function enable_header_navigation(){
	document.querySelector('#headermain').style.pointerEvents = 'unset';
	document.querySelector('.disable_header_navigation_overlay').style.display = 'block';
}

function set_data_to_lightbox_buttons(button,action,ocid){
	if(button == 'change_therapist'){
	    document.querySelectorAll('.session_status_buttons img')[0].dataset.ocid = ocid;			
	}else if(button == 'save_session'){

	}else if(button == 'start_chat'){

	}else if(button == 'open_chat'){

	}

}

function return_therapist_lightbox_image_urls(type,name,site_url){
	if(type == 'icon'){
		switch(name){
			case 'change_therapist':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Change Therapist.png';
			case 'save_session':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Save session.png';
			case 'no_ongoing_sessions':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-No Session ongoing.png';
			case 'open_chat':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Open Chat.png';				

		}
	}else if(type == 'animation'){
		switch(name){
			case 'therapist_didnt_respond':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website%20Screen_Icon-Therapist%20Didn%E2%80%99t%20respond.png';
			case 'calling_therapist':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/Calling therapist.gif';
			case 'therapist_not_available':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Therapist not available.png';
			case 'great_news':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/great news.gif';
			case 'lets_give':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/give couple of mins.gif';
			case 'therapist_ready':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/seession ongoing.gif';
			case 'ongoing_session':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/open chat.gif';
			case 'session_ended':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Session Ended 2.png';
			case 'no_ongoing_sessions':
				return site_url+'/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-Session Ended 1.png';
		}
	}
}

async function LightboxTherapistInfo(ocid){
	let returndata = '';
	await $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php', {action: 'LightboxTherapistInfo',ocid:ocid}, function(data){
		if(data){
			returndata = data;
		}
	});
	return returndata;
}




function test(ocid){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php', {action: 'LightboxTherapistInfo',ocid:ocid}, function(data){
		if(data){
			console.log(data);
			returndata = data;
		}
	});
}


</script>








<!--
<style>
	.lightbox_for_session_details{
		width:50%;
		height: 13rem;
		border:solid 2px #039F95;
		margin:0 auto;
		border-radius: 10px;
		text-align: center;
		position: absolute;
	    top: 14rem;
	    left: 25%;
	    background-color: #fff;
	}	
	.lightbox_for_session_details_first_heading{
		font-size: 18px;
    	color: #363361;
	}
	.call_anim_container{
    display: table;
    margin: 0 auto;
    width: 20%;
	}
	.lightbox_for_session_details_session_status{
		margin-top: 10px;
	}
	.lightbox_for_session_details_buttons{
		    display: flex;
    justify-content: space-evenly;
	}
	.lightbox_for_session_details_buttons button{
		display: block;
    padding: 5px;
    border-radius: 7px;
    outline: none;
    border: 2px solid #F5C800;
    background-color: #FFD933;
	}
	.lightbox_for_session_details_call_gif{
		text-align: center;
		margin:15px;
	}
	.lightbox_for_session_details_call_gif img{
		width:50px;
	}

	.layover_test{
		display: block;
	    background-color: rgba(0,0,0,0.6);
	    width: 100%;
	    height: 13vh;
	    position: absolute;
	    top: 0;
	    left: 0;
	    z-index: 1030;
	}


</style>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="lightbox_for_session_details">
	<section class="lightbox_for_session_details_first_heading">
		3 Mins Session with <br> Manish Jadhav
	</section>
	<section class="lightbox_for_session_details_session_status">
		<p>Getting Session Details...</p>
	</section>
	<section class="lightbox_for_session_details_call_gif">
		<img src="https://freesvg.org/img/phone-call-icon.png">
	</section>
	<section class="lightbox_for_session_details_buttons">
		<button onclick="alert('this button is enabled')">Change Therapist</button>
		<button onclick="alert('this button is enabled')">Take Session Later</button>
	</section>
</div>

<div class="layover_test" onclick="alert('please stay on this page while your session is processing');">
	
</div>

<br>
<br><br><br>
-->
<script type="text/javascript">
	
          

</script>


<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
