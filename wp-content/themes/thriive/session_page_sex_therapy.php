<?php /* Template Name: sex-therapy-session-page */
include_once get_stylesheet_directory().'/new-header.php'; 
$current_user = wp_get_current_user();
if (!is_user_logged_in()) 
	{ 
		wp_redirect('/login/');
		exit();
	}

if($current_user->caps['therapist']==1){
	echo '<script>globalThis.therapist_value = 1;</script>';
}else{
	echo '<script>globalThis.therapist_value = 0;</script>';
}

//echo get_the_id();


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
	.footerwrap {
    bottom:0;
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
	.session_status_begin_session_btn{
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
	/*table{
		margin: 0 auto;
	}
table td{
	padding: 30px;
	border: solid;
}*/
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
	<div class="session_status_begin_session_btn">
		<section class="session_status_button  purple">
			<button data-tid='' data-uid='' data-ocid='' onclick="begin_session_appointment();">Begin Session</button>
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

<div id="block_landscape_chat" style="    display: none;
    height: 100vh;
    width: 100%;
    position: absolute;
    top: 0;
    z-index: 999999999;
    align-items: center;
    text-align: center;
    padding: 10px;
    background-color: blue;
    font-size: 24px;
    color: yellow;">
	Sorry we dont support landscape mode for chat at the moment.
</div>

<!--<table>
	<tr><td onclick="ChangeDialogue(1)">1</td><td onclick="ChangeDialogue(2)">2</td><td onclick="ChangeDialogue(3)">3</td></tr>
	<tr><td onclick="ChangeDialogue(4)">4</td><td onclick="ChangeDialogue(5)">5</td><td onclick="ChangeDialogue(6)">6</td></tr>
	<tr><td onclick="ChangeDialogue(7)">7</td><td onclick="ChangeDialogue(8)">8</td><td onclick="ChangeDialogue(9)">9</td></tr>
	<tr><td onclick="ChangeDialogue(10)">10</td><td onclick="ChangeDialogue(11)" style="background-color:#ADFCFF">11</td><td style="background-color:#ADFCFF" onclick="ChangeDialogue(12)">12</td></tr>
	<tr><td style="background-color:#ADFCFF" onclick="ChangeDialogue(13)">13</td><td  style="background-color:#ADFCFF" onclick="ChangeDialogue(14)">14</td><td style="background-color:#ADFCFF" onclick="ChangeDialogue(15)">15</td></tr>
	<tr><td style="background-color:#ADFCFF" onclick="ChangeDialogue(16)">16</td><td  style="background-color:#ADFCFF" onclick="ChangeDialogue(17)">17</td><td style="background-color:#ADFCFF" onclick="ChangeDialogue(18)">18</td></tr>


</table>-->
<style>
	.therapist_data{
		display: table;
	}
	.back_btn{
		display: block;
	}
	.call_actions{
		display: block;
	}
	.himg{
		display: block;
		width: 50px;
		padding: 5px;
		border-radius: 50%;
	}
	.hsection{
		display: table-cell;
		vertical-align: middle;
		color: #fff;
		font-weight: 400;
		font-size: 19px;
	}
	#knowlarity_video{
		opacity: 0;
	    height: 80% !important;
	    width: 95% !important;
	    position: fixed !important;
	    top: 8% !important;
	    left: 2% !important;
	    z-index: 9999999;
	    transition: ease 1s;
	}

	#video_container{
		display: none;
		width: 100%;
	    height: 100vh;
	    background-color: rgba(0,0,0,0.7);
	    position: fixed;
	    top: 0px;
	    left: 0px;
	    z-index: 999999;
	}

	.emoji_icon img{
		top:1px !important;
		position:relative;
	    width: 25px !important;
	    height: 25px !important;		
	}

	#click_attatch img{
	    width: 25px;
	    position: relative;
	    left: -3px;
	    top: -2px;
	}
	.messages-header{
		height:65px;
		background-color: #272660;
	}
	#chat-timer{
		background-color: #009F9A;
	}
	.msg{
		background-color: #272660;
	}
@media screen and (max-width:767px) and (min-width:320px){

	.messages-header{
		height:65px;
		background-color: #272660;
	}
	#chat-timer{
		background-color: #009F9A;
		margin-top: 65px;
	}

}
</style>
<!--
<div class="messages-header1" style="position: unset;height: 65px;">
	<div class="back_btn">
			<img style="width: 30px;filter: invert(1);" src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/PngItem_4678363.png" class="himg">
	</div>
	<div class="therapist_data">
		<section class="hsection">
			<img style="border-radius: 50%;width: 55px;" src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/new_user_icon.png" class="himg">
		</section>
		<section class="hsection">Therapist Name</section>
	</div>
	<div class="call_actions">
		<section class="hsection">
			<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/video-call-1.png" class="himg">
		</section>
		<section class="hsection">
			<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/pngtree-phone-icon-in-solid-circle-png-image_2380227.jpg" class="himg">
		</section>
	</div>
</div>
-->
<div id="video_container">
	<img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/video-call-1.png" style="width: 20%;position: fixed;top: 45%;left: 40%;background-color: #fff;padding: 10px;/* border: solid 0px #fff; */border-radius: 4px;transition: ease 1s" class='video_loader'>
</div>


<script type="text/javascript">


function begin_session_appointment(){

}


function createFrame(source) {
	frame = document.createElement('iframe');
	frame.setAttribute('src', encodeURI(source));
	frame.setAttribute('id', 'knowlarity_video');
	frame.style.height = "100%";
	frame.style.width = "100%";
	frame.style.position = 'absolute';
	frame.style.top = '0';
	frame.style.left = '0';
	frame.setAttribute('allow', 'camera; microphone; fullscreen; display-catpure; autoplay');
	let class123 = 'deep-linking-mobile__button_primary';
	check_for_web_enabled();
	return frame;
}

function init_videocall(room_name) {
	room_name = room_name.trim();
	document.querySelector('#video_container').style.display = 'unset';
	//var x = document.getElementById('_roomName').value;
	if (room_name) {
		container = document.getElementById('video_container');
		var url = new URL(room_name, 'https://meetings.knowlarity.com/');
		console.log(url);
		container.append(createFrame(url.href));
	} else {
		alert('please enter room name')
	}
}

function check_for_web_enabled(){
	setTimeout(function(){document.querySelector('#knowlarity_video').style.opacity = '1'}, 3000);
	/*let enable_status = enable_web_video();
	alert(enable_status);
	if(enable_status == 1){
		document.querySelector('#knowlarity_video').style.opacity = '1';
	}else{
		alert(enable_status);
		setTimeout('enable_web_video();', 1000);
	}*/
}

function enable_web_video(){
	let response;
	if(document.querySelectorAll('.deep-linking-mobile__button')[1] !== undefined){
		document.querySelectorAll('.deep-linking-mobile__button')[1].click();
		response = 1;
	}else{
		response = 0;
	}	
	return response;
}

function video_loader_animate(){
    if(document.querySelector('.video_loader').style.borderRadius == ''){
        document.querySelector('.video_loader').style.borderRadius = '0%';
    }
    let curr_border_radius = document.querySelector('.video_loader').style.borderRadius;

    if(curr_border_radius == '0%'){
        document.querySelector('.video_loader').style.backgroundColor = '#fff';
        document.querySelector('.video_loader').style.borderRadius = '35%';
    }else{
        document.querySelector('.video_loader').style.backgroundColor = '#B4FC72';
        document.querySelector('.video_loader').style.borderRadius = '0%';
    }
}

var video_loader_animate_interval = setInterval('video_loader_animate()',1000);



function disable_call_btn(){

	if(therapist_value == 0){
	disabled_calls = true;
	console.log(disabled_calls);
			if(document.querySelectorAll('.call_btn')[0] != undefined){
				document.querySelectorAll('.call_btn')[0].style.pointerEvents = "none";
				document.querySelectorAll('.call_btn')[0].style.filter = "grayscale(1) blur(2px)";
				document.querySelectorAll('.call_btn')[0].removeAttribute('onclick');
				setTimeout('enable_call_btn(true);', 60000);
	
	}else{
		disable_call_btn_check();
	}

	if(document.querySelectorAll('.call_btn')[1] != undefined){
		document.querySelectorAll('.call_btn')[1].style.pointerEvents = "none";
		document.querySelectorAll('.call_btn')[1].style.filter = "grayscale(1) blur(2px)";
		document.querySelectorAll('.call_btn')[1].removeAttribute('onclick');
		setTimeout('enable_call_btn(true);', 60000);
	}else{
		disable_call_btn_check();
	}
}
}



function enable_call_btn(incall = false){
	if(therapist_value == 0){
console.log('incall123 -> ' + incall);
if(incall == true){
	disabled_calls = false;	
    if(document.querySelectorAll('.call_btn')[0] != undefined){
    	document.querySelectorAll('.call_btn')[0].style.pointerEvents = "unset";
		document.querySelectorAll('.call_btn')[0].style.filter = "unset";
		document.querySelectorAll('.call_btn')[0].setAttribute('onclick', 'place_call_trigger(from);initiate_place_call_vars();');
	
	}

    if(document.querySelectorAll('.call_btn')[1] != undefined){
    	document.querySelectorAll('.call_btn')[1].style.pointerEvents = "unset";
		document.querySelectorAll('.call_btn')[1].style.filter = "unset";
		document.querySelectorAll('.call_btn')[1].setAttribute('onclick', 'place_call_trigger(from);initiate_place_call_vars();'); 
	}
}else{
	alert('Your Session is over please book a new one or please reach out to thriive support');
}

}
    
}

function disable_call_btn_check(){
	setTimeout('disable_call_btn()',50);
	//console.log('called');
}



function insert_call_prompt(from_value){
	let version;
	if(from_value == from){
		version = 'user';
	}else{
		version = 'therapist';
	}

	if(version == 'therapist'){
		$('.messages').append(generate_call_prompt_html(from_value));
	}else if(version == 'user'){
		$('.messages').append(generate_call_prompt_html(from_value));
	}

    scrollToBottom();

}


function generate_call_prompt_html(from_value,id = ''){
	let html;
	let version;
	if(from_value == 'expired'){
		version = 'expired';
	}else if(from_value == from){
		version = 'user';
	}else{
		version = 'therapist';
	}
	if(version == 'therapist'){
		disable_call_btn();
		html = `<div id="${id}" class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">The user is initiating a call<br>You will receive a call shortly
<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/ongoing session.gif" style="width: 46px;"></section></a></div>`;
	}else if(version == 'user'){		
		disable_call_btn();
		html = `<div id="${id}" class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">Requesting Call to Therapist...<br>Please Wait...
<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/ongoing session.gif" style="width: 46px;"></section></a></div>`;
	}else if(version == 'expired'){
		html = `<div id="${id}" class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">This Call Link is Expired!!<br>
<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-No Session ongoing.png" style="width: 46px;"></section></a></div>`
	}
return html;
}


function generate_video_prompt_html(from_value,id = '',video_start=''){
	let html;
	let version;
	if(from_value == 'expired'){
		version = 'expired';
	}else if(from_value == from && video_start != 'video_start'){
		version = 'user';
	}else if(from_value != from && video_start == 'video_start'){
		version = 'video_start';
	}else if(from_value != from && video_start != 'video_start'){
		version = 'therapist';
	}
	if(version == 'therapist'){
		html = `<div id="${id}" class="book_another_session call_video_prompt" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">The User Wants to initiate a Video Call<br>Would you like to accept??<a href="#" onclick="initiate_place_video_vars(); 
			notify_user_for_video_call();"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">Yes, </b>Start The Video Call</section></a><a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">No, </b>Continue with chat Only</section></a></div>`;
      setTimeout('disable_video_link('+id+','+from_value+')', 60000);
	}else if(version == 'user'){
		html = `<div id="${id}" class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">Requesting Video Call to Therapist...<br>Please Wait...
<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/ongoing session.gif" style="width: 46px;"></section></a></div>`;
	}else if(version == 'expired'){
		html = `<div id="${id}" class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">This Video Call Link is Expired!!<br>
<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-No Session ongoing.png" style="width: 46px;"></section></a></div>`
	}else if(version == 'video_start'){
		initiate_place_video_vars();
		  html = `<div id="${id}"></div>`;

		/*html = `<div id="${id}" class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      ">Therapist is online click below to start Video_Call<br>
<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/png/Website Screen_Icon-No Session ongoing.png" style="width: 46px;"></section></a></div>`;*/
	}else{
		html = `<div id="${id}" class="book_another_session" style="
		  display:none;
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:10px;
      "></div>`
	}
return html;
}


function disable_call_link(id){
	if(document.getElementById(id) != null){
		document.getElementById(id).outerHTML = generate_call_prompt_html('expired',id);
	}
}

function disable_video_link(id,from_value=''){
	if(from_value == from){
		return;
	}
	if(document.getElementById(id) != null){
		document.getElementById(id).outerHTML = generate_video_prompt_html('expired',id);
	}
}


function insert_new_chat_header(){
  document.querySelector('.messages-header').innerHTML = `<p style="display:none;">This is added here as the therapist name is inserted after the chat window is loaded on to the first Element of messages header the chat page layout and sex_therapy_session_page layout for chat is different as of now 20-Apr-2022</p>  <div class="back_btn" onclick="clear_chatbox();">
      <img style="width: 30px;filter: invert(1);" src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/PngItem_4678363.png" class="himg">
  </div>
  <div class="therapist_data">
    <section class="hsection">
      <img style="border-radius: 50%;width: 55px;height:55px;" src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/new_user_icon.png" class="himg">
    </section>
    <section class="hsection">.............</section>
  </div>
  <div class="call_actions"><!--
    <section class="hsection" id="Yuser">
      <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/new_send_icon.png" class="himg" onclick="place_video_trigger(from);">
    </section>-->
    <section class="hsection" id="Yuser">
      <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/new_call_icon.png" class="himg call_btn" onclick="place_call_trigger(from);initiate_place_call_vars();">
    </section>
  </div>`;
/*  
  document.querySelector('.messages-header').style.height = '65px';
  document.querySelector('.messages-header').style.backgroundColor = '#272660';
  document.querySelector('#chat-timer').style.backgroundColor = '#009F9A';
  document.querySelector('.msg').style.backgroundColor = '#272660';

  if(window.screen.width < 413){
  document.querySelector('#chat-timer').style.marginTop = '65px';
  }*/
}

function insert_call_option_in_chat(){
	var test = `<div style="text-align: center;background-color: #80E5FF;padding: 10px;font-weight: 500;" onclick="initiate_place_call_vars();">Call Now</div>`;
	document.querySelector('.main-messages').childNodes[3].insertAdjacentHTML('afterend', test);

}

function place_call_trigger(from_user){
	if(disabled_calls === false){
	document.querySelector('#ind-message').value = 'hide,call,'+from_user;
	write_to_file();
	}
}

function place_video_trigger(from_user){	
	document.querySelector('#ind-message').value = 'hide,video,'+from_user;
	write_to_file();
}


function initiate_place_call_vars(){
	let duration = document.querySelector('#chat-timer').children[1].innerText.split('m')[0];
	place_call(OC_ID,duration);

}

function place_call(ocid,duration){
		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/Appointment/php/chat_functions.php', {action: 'calling_info',ocid:ocid,duration:duration}, function(data){
		if(data){
			console.log(data);
		}
	});
}	

function notify_user_for_video_call(){
	document.querySelector('#ind-message').value = 'hide,video_start,';
	write_to_file();
}

function initiate_place_video_vars(){	
	let duration = document.querySelector('#chat-timer').children[1].innerText.split('m')[0];
	place_video(OC_ID,duration,from);	
}

function place_video(ocid,duration,from){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/Appointment/php/chat_functions.php', {action: 'video_info',ocid:ocid,duration:duration,from:from}, function(data){
		if(data.length > 30){
			console.log(data);
			init_videocall(data);
		}else{
			alert('some error');
		}
	});
}

function change_new_chat_header_user_img(img_link = ''){
	if(document.querySelectorAll('.himg')[1] != undefined){
		if(img_link != ''){
		document.querySelectorAll('.himg')[1].setAttribute('src', img_link);
		}else{
			return;
		}		
	}
}

function change_new_chat_header_tname(tname=''){
	if(document.querySelectorAll('.hsection')[1] != undefined){
		if(tname == ''){
			document.querySelectorAll('.hsection')[1].innerText = 'Therapist';
		}else{
			document.querySelectorAll('.hsection')[1].innerText = tname;
		}
	}
}



globalThis.TherapistData = '';
async function ChangeDialogue(dialogue,date_string='',uname='',session_duration=''){
	//OC_ID = 514;
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
		//console.log(TherapistData);
		}else{
		//
		}


	switch(dialogue){
		case 1:
			console.log('case => 1');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 2');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 3');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 4');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 5');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 6');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 7');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			invoke_default_message('user');
		break;	

		case 8:
			console.log('case => 8');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 9');
			change_new_chat_header_tname(TherapistData['uname']);
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
			console.log('case => 10');
			change_new_chat_header_tname(TherapistData['uname']);
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
			console.log('case => 11');
			change_new_chat_header_tname(TherapistData['uname']);
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
			console.log('case => 12');
			change_new_chat_header_tname(TherapistData['uname']);
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
			console.log('case => 13');
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
			invoke_default_message('therapist');
			change_new_chat_header_tname(TherapistData['uname']);
		break;

		case 14:
			console.log('case => 14');
			change_new_chat_header_tname(TherapistData['uname']);
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
			console.log('case => 15');
			change_new_chat_header_tname(TherapistData['uname']);
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
			console.log('case => 16');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
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
			console.log('case => 17');
			change_new_chat_header_tname(TherapistData['uname']);
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			change_therapist_lightbox_head('Please Wait');
			change_therapist_lightbox_message('Your Session is Scheduled at <br> '+date_string);
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
		case 18:
			console.log('case => 18');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`This session expired at <br> `+ date_string);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;
		case 19:
			console.log('case => 19');
			change_new_chat_header_user_img(TherapistData['img']);
			change_new_chat_header_tname(TherapistData['tname']);
			change_therapist_lightbox_image(TherapistData['img']);
			change_therapist_lightbox_head(TherapistData['data']);
			change_therapist_lightbox_message(`Waiting For Therapist to Come Online <br>Session Ends at ` + date_string);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'lets_give', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_open_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			disable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
			init_check_all_chats();
		break;
		case 20:
			console.log('case => 20');
			change_new_chat_header_tname(TherapistData['uname']);
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'open_chat', TherapistData['site_url']));
			change_therapist_lightbox_head(session_duration + ' Mins Appointment Session With ' +uname);
			change_therapist_lightbox_message(`Please Begin The session By Clicking Below <br> Session Ends at ` + date_string);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'ongoing_session', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_open_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			disable_header_navigation();			
			show_therapist_accept_btn(TherapistData['tid'],TherapistData['uid'],OC_ID);
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;
		case 21:
			console.log('case => 21');
			change_new_chat_header_tname(TherapistData['uname']);
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			change_therapist_lightbox_head(session_duration + ' Mins Session With ' +uname);
			change_therapist_lightbox_message(`This session expired at <br> `+ date_string);
			change_therapist_lightbox_animation(return_therapist_lightbox_image_urls('animation', 'therapist_not_available', TherapistData['site_url']));
			disable_therapist_lightbox_buttons();
			hide_therapist_lightbox_buttons();
			hide_start_chat_button();
			hide_book_session_now_btn();
			hide_feedback_btn();
			hide_open_chat_button();
			enable_header_navigation();
			hide_therapist_accept_btn();
			show_therapist_lightbox_image();
			show_session_status_separator();
		break;
		case 22:
			console.log('case => 22');
			change_therapist_lightbox_image(return_therapist_lightbox_image_urls('icon', 'no_ongoing_sessions', TherapistData['site_url']));
			change_therapist_lightbox_head('Please Wait');
			change_therapist_lightbox_message('Your Session is Scheduled at <br> '+date_string);
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
	}

	if(dialogue == 1){		

		//console.log(TherapistData);
	}

}

function invoke_default_message(user_type = ''){
	if(user_type == 'user'){
		      setTimeout(() => {
          $('.messages').append(` <p id="in-conversation-with" style="font-size: 19px;padding: 10px;font-weight: 500;color: #272659; margin-top: 30px; text-align: center;height: 100%;/* line-height: 1; */padding-top: 34%;">Press Call button to call Therapist anytime during your session.<br>Have a good session.

            <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/new_call_icon.png" class="himg call_btn" onclick="place_call_trigger(from);initiate_place_call_vars();" style="margin: 0 auto;margin-top: 51%;width: 85px;"><img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/seperator.svg" alt="" style="margin-top: 10%;">

            </p>`);
          scrollToBottom();
      }, 1000);
	}else if(user_type == 'therapist'){
		      setTimeout(() => {
          $('.messages').append(` <p id="in-conversation-with" style="font-size: 14px;padding: 10px;font-weight: 500;color: #272659; margin-top: 15px; text-align: center;">We have connected you with user.<br>Have a good session

            </p>`);
          scrollToBottom();
      }, 1000);
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

function show_begin_session_button(){
	document.querySelector('.session_status_begin_session_btn').style.display = 'inline';	
}

function hide_begin_session_button(){
	document.querySelector('.session_status_begin_session_btn').style.display = 'none';	
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
	await $.post('wp-content/themes/thriive/horoscope_new/chat-renew/Appointment/php/chat_functions.php', {action: 'LightboxTherapistInfo',ocid:ocid}, function(data){
		if(data){
			returndata = data;
		}
	});
	return returndata;
}




function test(ocid){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/Appointment/php/chat_functions.php', {action: 'LightboxTherapistInfo',ocid:ocid}, function(data){
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
<style>
.footerwrap {	
	
}	

</style>

<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>
