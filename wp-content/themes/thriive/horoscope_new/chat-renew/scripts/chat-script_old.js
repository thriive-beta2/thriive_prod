globalThis.dialogue_status = 0;
globalThis.dialog_id = 0;
globalThis.default_size = [];
globalThis.default_size_opp = [];
globalThis.prev_dialog_stat = '';
globalThis.prev_dialog_id;

function create_dialog(to, from, mail,msg){
	var dialogue = '<div class="main-messages"></div>';
		//alert(from +'  '+ to + '  '+ mail);
		if(dialogue_status == 0){
		document.body.innerHTML += dialogue;}
		var log_name = '';

		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'tname',to:to,from:from},function(data){if(data){document.querySelector('.messages-header').children[0].innerText = data;}else{document.querySelector('.messages-header').children[0].innerText = mail.split('@')[0];}});

		document.querySelector('.main-messages').innerHTML = '<div class="messages-header"><p style="color:#fff;margin:0;">'+log_name+'</p><p style="color:#fff;margin:0;border-bottom: solid;width: 17px;" onclick="hide_chat_box()" id="hide_chat_box"></p><p style="color: #fff;margin: 0;border-left: dotted 4px;padding: 5px;cursor: pointer;" onclick="div_options()"></p><p style="color: #fff;margin: 0;cursor: pointer;" onClick="clear_chatbox(1)">X</p></div><div class="chat_options"><table id="chat_options_table"><tbody><tr><td data-from="'+from+'" data-to="'+to+'" onClick="block_user(this.dataset.from, this.dataset.to)" style="cursor:pointer" id="nUser">Block</td></tr><tr><td><a href="https://www.thriive.in/faq-chat" style="cursor:pointer">FAQ</a></td></tr><tr><td data-from="'+from+'" data-to="'+to+'" onClick="complete_chat(this.dataset.from, this.dataset.to)" style="cursor:pointer" id="nUser">Complete</td></tr><tr><td onClick="incomplete()" style="cursor:pointer" id="nUser">User Not Available</td></tr></tbody></table></div><div class="messages"><p style="font-size:12px;padding: 10px;color: #4F0475;">We have connected you with Manish . This conversation is completely private and confidential.</p></div><div class="emoji_container" style="z-index:9999999999999"><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😊</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😊</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😄</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😁</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😆</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😅</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😂</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">🤣</p>	<p class="emojis" onClick = "insert_emoji(this.children[0].alt)">☺️</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😇</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">🙂</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">🙃</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😉</p>	<p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😌</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😍</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">🥰</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😘</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😋</p><p class="emojis" onClick = "insert_emoji(this.children[0].alt)">😛</p>		</div></div><div class="msg"><div class="input_div"><div class="emoji_icon" id="emoji_icon" onClick="hide_emoji()">😊</div><input type="text" name="ind-message" id="ind-message"><input type="file" name="file" class="file_attatch"><button type="button" id="click_attatch" onclick="click_attatch()"></button></div><button type="button" id="send" onclick="write_to_file()"><i class="fa fa-paper-plane" aria-hidden="true" style="margin: 0 auto;"></i></button></div><div class="scripts" style="display:none"></div>';
		var action = 'create';
		globalThis.mail_to = mail;
		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php?data=1 ', {from: from, to: to, mail:mail, action:action}, function(data){$('.messages').append(data);var elem = document.querySelector('.messages');elem.scrollTop = elem.scrollHeight;});
		//auto_read();
		//alert(this.innerText);
		globalThis.from = from;
		globalThis.to = to;
		globalThis.mail = mail;
		globalThis.msg = msg;
		dialog_id = to;
		if(dialogue_status == 1){
		//clearInterval(interval_read);

		
		}
		//globalThis.interval_read = setInterval('read()', 1000);

		if(typeof arr_count == 'undefined'){
			globalThis.read_interval = setInterval('read()',10000);
		}
		if(dialogue_status==0){setTimeout('read()', 3000)};

		dialogue_status = 1;





		globalThis.all_dialogues = document.querySelectorAll('.start_chat');
		globalThis.dialogues_array = [];
		if(prev_dialog_stat.length>0){
			all_dialogues[prev_dialog_id].parentElement.nextSibling.innerText = prev_dialog_stat;
		}
		for(i=0;i<all_dialogues.length/2;i++){
			dialogues_array[i] = all_dialogues[i].dataset.touserid;
			if(dialog_id == dialogues_array[i]){
				prev_dialog_stat = all_dialogues[i].parentElement.nextSibling.innerText;
				prev_dialog_id = i; 
				all_dialogues[i].parentElement.nextSibling.innerText = "Active";
			}
		}
		var input = document.getElementById("ind-message");
		input.addEventListener("keyup", function(event) {
		  if (event.keyCode === 13) {
		   event.preventDefault();
		   document.getElementById("send").click();
		  }
		});
		

		}
		
function clear_chatbox(num){
	
	if(num == 0){
		document.querySelector('.main-messages').style.display ='block';
	}else{
		dialogue_status = 0;
		document.querySelector('.main-messages').style.display = 'none'}	
}


/*
function write_to_file(){

	var action = "write";
	var msg = document.querySelector('#ind-message').value;
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {from:from, to:to, mail:mail, action:action, msg:msg, filename:filename},function(data){$('.messages').append(data);});
	alert('test');
}
*/



/*function write_to_file(){

		var img_data = new FormData();
		var action = 'write';
		img_data.append('img', document.querySelector('.file_attatch').files[0]);
		img_data.append('msg', document.querySelector('#ind-message').value);
		img_data.append('action', action);
		//var msg = document.querySelector('#ind-message').value;
		//var action = 'write';
		//$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {from:from, to:to, mail:mail, action:action, msg:msg, filename:filename},function(data){$('.messages').append(data);});
		$.ajax({
			url:'wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',
			method:'post',
			data:img_data,
			contentType:false,
			cache: false,
			processData:false,
			success:function(data){$('#messages').html(data);}
		});
}*/




var attatch_status = 0;
function write_to_file(){
		var form_data = new FormData();
		var action = 'write';
		form_data.append('img', document.querySelector('.file_attatch').files[0]);
		form_data.append('msg', document.querySelector('#ind-message').value);
		form_data.append('action', action);
		form_data.append('from', from);
		form_data.append('to', to);
		form_data.append('mail', mail);
		form_data.append('filename', filename);
		form_data.append('text_msg', msg);
		//var msg = document.querySelector('#form_data.append('action', action);ind-message').value;
		//var action = 'write';
		//$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {from:from, to:to, mail:mail, action:action, msg:msg, filename:filename},function(data){$('.messages').append(data);});
		if(document.querySelector('.file_attatch').files.length>0){attatch_status = 1;}
		if(document.querySelector('#ind-message').value.trim().length == 0 && attatch_status == 0){
			alert('please type in a message');
		}else{
		$.ajax({
			url:'wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',
			method:'post',
			data:form_data,
			contentType:false,
			cache: false,
			processData:false,
			success:function(response){//$('.scripts').html(response);
			console.log(response);
			}
		});}
		document.querySelector('#ind-message').value = "";
		document.querySelector('.file_attatch').value = "";
		attatch_status = 0;


}






function read(){
		//console.log('script');
		if(typeof arr_count !== 'undefined'){
			clearInterval(read_interval);
		}

		if(arr_count || arr_count == 0){
		var action = 'read';
		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {from:from, to:to, action:action, filename:filename, arr_count:arr_count,mail_to:mail_to},function(data){$('.messages').append(data);if(data){setTimeout('run_read();',1000);}});}else{console.log('else');}
}

function run_read(){
	read();
}

function click_attatch(){
	document.querySelector('.file_attatch').dispatchEvent(new MouseEvent('click'));
}

var hide_status = 1;

function hide_chat_box(){
	if(hide_status == 1){
		if(document.body.clientWidth < 700){
			document.querySelector('.main-messages').style.bottom = "-95%";
			//document.querySelector('.msg').style.display = "none";
			hide_status = 0;		
		}else{
			document.querySelector('.main-messages').style.bottom = "-45%";
			//document.querySelector('.msg').style.display = "none";
			hide_status = 0;
		}
	}else{
	document.querySelector('.main-messages').style.bottom = "0%";
	//document.querySelector('.msg').style.display = "block";
	hide_status = 1;
	}
}

//setInterval('check_all_chats()', 5000);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



var waiting_user = 0;
var curr_user;
	function check_all_chats(){

		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'get_curr_user'},function(data){console.log(data);
			if(data){
				let ret_data = data.split(',');
				if(ret_data[0]=='t0'){
					document.querySelector('.accept_modal_table').innerHTML = '<table class="acc_table"><tr><td style="color:#fff;font-size:14px">Please Accept chat request from '+ret_data[4]+'</td><td><button onclick="accept_chat('+ret_data[2]+','+ret_data[1]+','+ret_data[5]+');" style="background-color:#fec031" class="session-btn">ACCEPT</button></td></tr></table;';
					document.querySelector('.accept_modal').style.display = 'block';
				}else if(ret_data[0]=='t1'){
					document.querySelector('.accept_modal_table').innerHTML = '<table class="acc_table"><tr><td style="color:#fff">Please Wait for User to Start Chat</td><td></td></tr></table>';
					document.querySelector('.accept_modal').style.display = 'block';
				}else if(ret_data[0]=='t2' && dialogue_status==0){
					if(document.querySelector('.main-messages')){
						if(document.querySelector('.main-messages').style.display=='none'){
						location.reload();}
					}
					create_dialog(ret_data[2], ret_data[1], ret_data[6],'test');
					document.querySelector('.accept_modal').style.display = 'none';
				}else if(ret_data[0]=='t3' && dialogue_status==0){										
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal_timer').style.display="none";	
					document.querySelector('.timer_img').style.display="none";	
				}else if(ret_data[0]=='t4'){
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal_timer').style.display="none";	
					document.querySelector('.timer_img').style.display="none";	
				}else if(ret_data[0]=='t5'){
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal_timer').style.display="none";
					document.querySelector('.timer_img').style.display="none";
					if(ret_data[6]==0){document.querySelector('.user_exit').style.display='block';setTimeout(function(){document.querySelector('.user_exit').style.display='none';},10000)}
					setTimeout(function(){def_warning(ret_data[5]);},2000)

					if(dialogue_status==1){clear_chatbox(1);}	
				}else if(ret_data[0]=='u0'){
					document.querySelector('.wait_btn').dataset.ocid = ret_data[5];
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelectorAll('.browse_btn')[0].dataset.ocid = ret_data[5];
					document.querySelectorAll('.browse_btn')[1].dataset.ocid = ret_data[5];
					document.querySelector('.accept_modal_timer').style.display="block";
					document.querySelector('.accept_modal_timer').style.fontSize="24px";
										
					if(waiting_user==0){run_timer(ret_data[5]);}					
				}else if(ret_data[0]=='u1'){
					document.querySelector('.accept_modal').innerHTML = '<div class="accept_modal_table"><table class="acc_table"><tr><td><p style="margin:0;text-align:left;color:#fff;">Therapist has accepted the session. Please click to start Chat</p><p style="margin:0;text-align:left;color:#D4A74D;font-weight:600;">'+ret_data[3]+'</p></td><td><button onclick="accept_chat('+ret_data[1]+','+ret_data[2]+','+ret_data[5]+');" style="background-color:#fec031" class="session-btn">ACCEPT</button></td></tr></table></div>';
					document.querySelector('.accept_modal').style.display = 'block';
					document.querySelector('.accept_modal_timer').style.display="none";	
					document.querySelector('.timer_img').style.display="none";
					waiting_user = 5;									
				}else if(ret_data[0]=='u2' && dialogue_status==0){
					if(document.querySelector('.main-messages')){
					if(document.querySelector('.main-messages').style.display=='none'){
						location.reload();}
					}
					waiting_user = 5;	
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal_timer').style.display="none";	
					document.querySelector('.timer_img').style.display="none";	
					create_dialog(ret_data[1], ret_data[2], ret_data[6],'test');
												
				}else if(ret_data[0]=='u3'){
					if(dialogue_status==1 /*&& document.querySelectorAll('.start_chat1').length < 3*/){clear_chatbox(1);}
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal_timer').style.display="none";														
				}else if(ret_data[0]=='u4'){
					if(document.querySelector('.main-messages')){
					if(document.querySelector('.main-messages').style.display=='none'){
						location.reload();}
					}
					if(dialogue_status==1){clear_chatbox(1);}
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.accept_modal_timer').style.display="none";	
					document.querySelector('.timer_img').style.display="none";													
				}else if(ret_data[0]=='u5'){
					if(dialogue_status==1){clear_chatbox(1);}
					document.querySelector('.accept_modal').style.display = 'none';
					document.querySelector('.timer_text').style.display = 'none';
					document.querySelectorAll('.browse_btn')[0].disabled = false;
    				document.querySelectorAll('.browse_btn')[1].disabled = false;
    				document.querySelectorAll('.browse_btn')[0].dataset.ocid = ret_data[5];
    				document.querySelectorAll('.browse_btn')[1].dataset.ocid = ret_data[5];
    				document.querySelectorAll('.browse_btn')[0].dataset.action = 1;
    				document.querySelectorAll('.browse_btn')[1].dataset.action = 1;
					document.querySelector('.accept_modal_timer').style.display="block";
					document.querySelector('.accept_timer').style.width="175px";
					document.querySelector('.accept_timer').style.fontSize="18px";
					document.querySelectorAll('.browse_btn')[0].style.backgroundColor = '#fec031';
    				document.querySelectorAll('.browse_btn')[1].style.backgroundColor = '#fec031';					
					document.querySelector('.accept_timer').innerText = 'Please Select any other Therapist and take a session';	
					document.querySelector('.timer_img').style.display="none";													
				}
			}
			if(data){
			init_check_all_chats();
			}

		});

}
check_all_chats();

function init_check_all_chats(){
	setTimeout('check_all_chats();', 1000);
}






//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function def_warning(ocid){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'warn',ocid:ocid},function(data){});
}
















function run_timer(ocid){
	if(waiting_user==5){ 
		/*alert('test');*/}else{
	let full_time =  document.querySelector('.accept_timer').innerText;
	let rem_time = full_time.split(':');
if(rem_time[0]==0 && rem_time[1]==0){
    document.querySelector('.accept_timer').innerText = 'Therapist is not Responding';
    document.querySelector('.accept_timer').style.fontSize = '14px';
    document.querySelector('#accept_timer').style.width = '100%';
    document.querySelector('.timer_img').style.display="none";	
    document.querySelector('.timer_text').style.display = 'none';
    document.querySelector('.wait_btn').disabled = false;
    document.querySelectorAll('.browse_btn')[0].disabled = false;
    document.querySelectorAll('.browse_btn')[1].disabled = false;
    document.querySelectorAll('.browse_btn')[0].style.backgroundColor = '#fec031';
    document.querySelectorAll('.browse_btn')[1].style.backgroundColor = '#fec031';
    document.querySelector('.wait_btn').style.backgroundColor = '#fec031';
    document.querySelector('.wait_btn').style.color = '#251a2b';
    document.querySelector('.browse_btn').style.color = '#251a2b';
    reject_chat('-','-',ocid);
    

    waiting_user = 2;	
}else if(rem_time[1]==0){
let min = rem_time[0]-1;
let sec = 59;
let time_string = min+':'+sec;
document.querySelector('.accept_timer').innerText = time_string;
waiting_user = 1;	
}else{
let min = rem_time[0];
let sec = rem_time[1]-1;
if(sec == 9 || sec == 8 || sec == 7  || sec == 6  || sec == 5  || sec == 4  || sec == 3  || sec == 2  || sec == 1  || sec == 0 ){
	sec = '0'+sec;
}
let time_string = min+':'+sec;
document.querySelector('.accept_timer').innerText = time_string;
if(sec==30 || sec==0 || sec==59 || sec==58){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'set_time',curr_time:time_string,ocid:ocid},function(data){console.log(data);
		if(data){
			console.log(data);
		}
	});
}
waiting_user = 1;	
}

init_run_timer(ocid);
}	
}

function init_run_timer(ocid){
	//f(user_waiting==5){}
	if(waiting_user==1){
	setTimeout(function(){run_timer(ocid);},1000);}
}

//setInterval('check_all_chats();', 1000);

/*
function user_waiting(ocid){
	document.querySelector('.accept_timer').innerText = '4:59';
	 document.querySelector('#accept_timer').style.fontSize = '24px';	
    document.querySelector('.timer_text').style.display = 'block';
    document.querySelector('.timer_img').style.display="block";
    document.querySelector('#accept_timer').style.width = '25px';
	run_timer(ocid);
	revive_therapist(ocid);
	document.querySelector('.wait_btn').disabled = true;
  	document.querySelectorAll('.browse_btn')[0].disabled = true;
  	document.querySelectorAll('.browse_btn')[1].disabled = true;  	
    document.querySelectorAll('.browse_btn')[0].style.backgroundColor = '#fff';
    document.querySelectorAll('.browse_btn')[1].style.backgroundColor = '#fff';
    document.querySelector('.wait_btn').style.backgroundColor = '#fff';
    $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'busy_ther',ocid:ocid},function(data){console.log(data);});
    $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'set_time',curr_time:time_string,ocid:ocid},function(data){console.log(data);
		if(data){
			console.log(data);
		}
	});

};*/

function revive_therapist(ocid){
	//$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'revive',ocid:ocid},function(data){console.log(data)});
}

function user_browsing(ocid,act){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'browse',ocid:ocid,act:act},function(data){console.log(data);
		if(data){
			if(data=1){
				window.location.replace('https://www.thriive.in/talk-to-best-tarot-card-reader-online');
			}else{alert('please try later');}
		}
	});
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'set_time',curr_time:'reset'},function(data){
		if(data){
		}
	});
}




		function hide_emoji(){
    if(document.querySelector('.emoji_container').style.display == "" || document.querySelector('.emoji_container').style.display == "none"){
    document.querySelector('.emoji_container').style.display = "block";
    }else{document.querySelector('.emoji_container').style.display = "none";}
    	//console.log();
	}
		function insert_emoji(EL){
			document.querySelector('#ind-message').value += EL;
			console.log(EL);
		}




	var default_title = document.title;
	var num = 0;
	function title(){
		document.tile = default_title;
    if(document.title == "Therapist account dashboard"){
        document.title = "New Message";
    }else{
        document.title = default_title;
    }}
/*
	function new_message(){
		var check_int = setInterval(function(){num = num+1;console.log('num');}, 1000);
		if(num<6){
			title();
			console.log('if');
		}else{
			clearInterval(check_int);
		}
	}
*/



	function div_options(){
	if(document.querySelector('.chat_options').style.display == "none" || document.querySelector('.chat_options').style.display == ""){
    document.querySelector('.chat_options').style.display = "block"
	}else{
    document.querySelector('.chat_options').style.display = "none"
	}
	}


function feed_data(){
	
	var test = document.querySelectorAll('.start_chat');
	var test_length = test.length/2;
	var test_array = [];
	var id_string = "";
	let action = 'feed';
	for(i=0;i<test_length;i++){
	    id_string += test[i].dataset.fromuserid +'_'+ test[i].dataset.touserid + "|";
	}	
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {action:action,id_string:id_string},
					function(data){console.log(data);}
				);

}

function complete_chat(from,to){
	if(confirm('Completing Chat means you will no longer be able to chat within this session are You sure?')){
	let action = 'complete';
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {action:action,from:from,to:to},
					function(data){console.log(data); if(data == 1){location.reload();}else{alert('please try later');}}
				);
}
}


function incomplete(){
	let action = 'incomplete';
	if(confirm('Mark This Chat as Incomplete?')){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:action,to:to,from:from},function(data){console.log(data);if(data==1){location.reload();}else{console.log(data);location.reload();}});
}
}








function accept_chat(to,from,oc_id){
	//console.log(to+'----'+from);
	waiting_user=5;
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {action:'accept_chat',to:to,from:from,oc_id},function(data){console.log(data);
		if(data){
			let data_arr1 = data.split(',');
			if(data_arr1[1]=='therapist'){
				//document.querySelector('.accept_modal_table').innerHTML = '<table class="acc_table"><tr><td>Please Wait for the user</td><td><button onclick="reject_chat('+to+','+from+','+oc_id+')">REJECT</button></td></tr></table>';
			}else{
			let msg = 'test';
			create_dialog(to, from, data,msg);
			document.querySelector('.accept_modal').style.display = 'none';
			document.querySelector('.accept_modal_timer').style.display = 'none';
			}
		}

	});
}


function reject_chat(to,from,ocid){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {action:'reject_chat',to:to,from:from,ocid:ocid},function(data){console.log(data);
		if(data){
			if(data == 'tr'){
				document.querySelector('.accept_modal').style.display = 'none';
			}else if(data == 'error'){
				console.log('please try later');
			}
		}


	});
}


function take_later(ocid,act){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'browse',ocid:ocid,act:2},function(data){console.log(data);
		if(data){
				document.querySelector('.exit_text').innerHTML = "Your session is saved in your account.<br> You can log back on to use it at any convenient time.<br><button class='browse_btn session-btn' onclick='document.querySelector(`.user_exit`).style.display=`none`'>OK</button>";
				document.querySelector('.user_exit').style.display='block';
				document.querySelector('.accept_modal_timer').style.display = "none";


			if(data=1){


			}else{alert('please try later');}
		}
	});
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php',{action:'set_time',curr_time:'reset'},function(data){
		if(data){
		}
	});
}