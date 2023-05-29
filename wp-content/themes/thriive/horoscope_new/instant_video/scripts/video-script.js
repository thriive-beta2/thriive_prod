globalThis.get_current_session_init_initiator = 0;
globalThis.init_timer = 0;

function get_current_session(){
	//alert('yes');
	$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php",{ action: "get_current_session" },
		function(data){
			//alert(data);
			if(data){
				console.log(data);
        		let ret_data = data.split(",");
        		console.log(ret_data);

        		globalThis.oc_id = ret_data[1];

        		switch(ret_data[0]){
        			case 'u0':
        			document.querySelector('.accept_modal_timer_video').style.display = "block";
        			get_current_session_init_delayed(get_current_session_init_initiator);
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		            //waiting_timer(ret_data[3]);
        			break;

        			case 'u1':
        			document.querySelector('.accept_modal_timer_video').style.display = "block";
        			document.querySelector('.timer_text_video').innerText = "Great news!! Therapist is coming online.";
            		document.querySelector('.timer_img_video').style.display= 'none';
            		get_current_session_init(get_current_session_init_initiator);
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		            


		            if(init_timer == 0){
		            globalThis.remaining_time = ret_data[3];
		            init_timer = 1;
		            waiting_timer(ret_data[3]);
		        	}
            		break;

            		case 'u2':
            		document.querySelector(".accept_modal_table_video").innerHTML =
		            '<table class="acc_table"><tr><td style="color:#fff;font-size:14px">Therapist Accepted Session request</td><td><button class="acc_btn" onclick="start_session(' +
		            ret_data[1]+
		            ');" style="background-color:#fec031" class="session-btn">START SESSION</button></td></tr></table>';
		            if(document.querySelector("#fc_frame") !== null){
		            	document.querySelector("#fc_frame").style.zIndex = "0";
		          	}
		            document.querySelector(".accept_modal_video").style.display = "block";
		          	get_current_session_init_initiator = 1;
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		          	break;

            		case 'u3':
        			document.querySelector('.accept_modal_timer_video').style.display = "block";
        			document.querySelector('.timer_text_video').innerText = "Therapist is not Responding";
            		document.querySelector('.timer_img_video').style.display= 'none';
            		document.querySelectorAll('.browse_btn_video')[0].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[1].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[0].dataset.ocid = oc_id;
            		document.querySelectorAll('.browse_btn_video')[1].dataset.ocid = oc_id;
            		get_current_session_init_initiator = 1;
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		          	break;

		          	case 'u4':
		          	if(document.querySelector('.acc_btn') !== null){
		          	document.querySelector('.acc_btn').innerText = "Starting";
		          	}
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		          	window.location.replace(ret_data[3]);
		          	break;

		          	case 'u5':
		          	if(document.querySelector('#session_data') !== null){
		            	document.querySelector('#session_data').innerText = "No Active Sessions";
		          	document.querySelector('.accept_modal_timer_video').style.display = "block";
        			document.querySelector('.timer_text_video').innerText = "Therapist is not Responding";
            		document.querySelector('.timer_img_video').style.display= 'none';
            		document.querySelectorAll('.browse_btn_video')[0].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[1].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[0].dataset.ocid = oc_id;
            		document.querySelectorAll('.browse_btn_video')[1].dataset.ocid = oc_id;
		            }
		            document.querySelector('.accept_modal_timer_video').style.display = "block";
        			document.querySelector('.timer_text_video').innerText = "Therapist is not Responding";
            		document.querySelector('.timer_img_video').style.display= 'none';
            		document.querySelectorAll('.browse_btn_video')[0].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[1].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[0].dataset.ocid = oc_id;
            		document.querySelectorAll('.browse_btn_video')[1].dataset.ocid = oc_id;
		          	break;

		          	case 'u6':
		          	document.querySelector('.accept_modal_timer_video').style.display = "block";
        			document.querySelector('.timer_text_video').innerText = "Therapist is not Responding";
            		document.querySelector('.timer_img_video').style.display= 'none';
            		document.querySelectorAll('.browse_btn_video')[0].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[1].disabled = false;
            		document.querySelectorAll('.browse_btn_video')[0].dataset.ocid = oc_id;
            		document.querySelectorAll('.browse_btn_video')[1].dataset.ocid = oc_id;
		          	break;

		          	case 'u7':
					if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "No Active Sessions";}
		          	break;

            		case 't0':
            		document.querySelector(".accept_modal_table_video").innerHTML =
		            '<table class="acc_table"><tr><td style="color:#fff;font-size:14px">Please Accept instant video request from ' +
		            ret_data[2] +
		            '</td><td><button class="acc_btn" onclick="accept_video_session(' +
		            ret_data[1]+
		            ');" style="background-color:#fec031" class="session-btn">ACCEPT</button></td></tr></table>';
		            if(document.querySelector("#fc_frame") !== null){
		            	document.querySelector("#fc_frame").style.zIndex = "0";
		        	}
		          	document.querySelector(".accept_modal_video").style.display = "block";
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		          	break;

		          	case 't1':
		          	document.querySelector(".accept_modal_table_video").innerHTML =
		            '<table class="acc_table"><tr><td style="color:#fff;font-size:14px">Please Wait for user to start the session</td></tr></table>';
		            if(document.querySelector("#fc_frame") !== null){document.querySelector("#fc_frame").style.zIndex = "0";}
		            document.querySelector(".accept_modal_video").style.display = "block";
		            get_current_session_init(get_current_session_init_initiator);
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}
		            break;

		          	case 't2':
		          	document.querySelector(".accept_modal_table_video").innerHTML =
		            '<table class="acc_table"><tr><td style="color:#fff;font-size:14px">User Started Session Please Wait</td></tr></table>';
		            if(document.querySelector("#fc_frame") !== null){
		            	document.querySelector("#fc_frame").style.zIndex = "0";
		        	}
		            document.querySelector(".accept_modal_video").style.display = "block";
		            window.location.replace(ret_data[2]);
		            if(document.querySelector('#session_data') !== null){document.querySelector('#session_data').innerText = "One Active Session";}		          	
		            break;

		            case 't3':		          	
		            if(document.querySelector('#session_data') !== null){
		            	document.querySelector('#session_data').innerText = "No Active Sessions";
		            }
		            break;

		            case 't4':		          	
		            if(document.querySelector('#session_data') !== null){
		            	document.querySelector('#session_data').innerText = "Last User Changed Therapist";
		            }
		            break;

		            case 't5':		          	
		            if(document.querySelector('#session_data') !== null){
		            	document.querySelector('#session_data').innerText = "Please Accept Session Over Call and Refresh This page";
		            }
		            break;				            
        		}




			}
		}
		);
} 

get_current_session();

function get_current_session_init(initiator){
	if(initiator == 0){
		setTimeout('get_current_session();', 15000);
	}
}

function get_current_session_init_delayed(initiator){
	if(initiator == 0){
		setTimeout('get_current_session();', 30000);
	}
}

function accept_video_session(ocid){
		$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php", {action:"accept_video_session",ocid:ocid}, 
			function(data){
				if(data){
					console.log(data);
					if(data == 1){
						get_current_session();						
					}else if(data == 'no_condition_match'){
						alert('Some Error Please Contact Thriive Support With ErrCode ->  #AVS132');
					}else{
						console.log(data);
					}
				}
			});
}

function start_session(ocid){
		$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php",{action:"start_video_session",ocid:ocid},
			function(data){
				if(data){
					if(data == 1){
						get_current_session();
					}else{
						console.log(data);
					}
				}
			});
}

function change_therapist_video(ocid){
	$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php", {action:"change_therapist_video",ocid:ocid},
		function(data){
			if(data){
					if(data == 1){
						window.location.replace('https://www.thriive.in/meditation-video-call');
					}else{
						window.location.replace('https://www.thriive.in/meditation-video-call');
					}				
			}
		});
}

function take_later_video(ocid){
	$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php", {action:"take_later_video",ocid:ocid},
		function(data){
			if(data){
					if(data == 1){
						get_current_session();
					}else{
						console.log(data);
					}				
			}
		});
}

function waiting_timer(response){
	if(response == 'expired'){

	$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php",{action:"disable_session",ocid:oc_id},function(data){
		console.log(data);
	});

	document.querySelector('.accept_modal_timer_video').style.display = "block";
	document.querySelector('.timer_text_video').innerText = "Therapist is not Responding";
	document.querySelector('.timer_img_video').style.display= 'none';
	document.querySelectorAll('.browse_btn_video')[0].disabled = false;
	document.querySelectorAll('.browse_btn_video')[1].disabled = false;
	document.querySelectorAll('.browse_btn_video')[0].dataset.ocid = oc_id;
	document.querySelectorAll('.browse_btn_video')[1].dataset.ocid = oc_id;
	return;
}else{
	let min = remaining_time.split(':')[0];
	let sec = remaining_time.split(':')[1];

	if(min == 0 && sec == 0){
		min = 'timer';
		sec = ' expired';
	$.post("wp-content/themes/thriive/horoscope_new/instant_video/instant-video-functions/video-functions.php",{action:"disable_session",ocid:oc_id},function(data){
		console.log(data);
	});

	document.querySelector('.accept_modal_timer_video').style.display = "block";
	document.querySelector('.timer_text_video').innerText = "Therapist is not Responding";
	document.querySelector('.timer_img_video').style.display= 'none';
	document.querySelectorAll('.browse_btn_video')[0].disabled = false;
	document.querySelectorAll('.browse_btn_video')[1].disabled = false;
	document.querySelectorAll('.browse_btn_video')[0].dataset.ocid = oc_id;
	document.querySelectorAll('.browse_btn_video')[1].dataset.ocid = oc_id;

	}else if(sec == 0){
		min--;
		sec = 59;
	}else{
		sec = sec-1;
	}

	//document.querySelector('#test321').innerText = min+':'+sec;
	remaining_time = min+':'+sec;

	init_waiting_timer();

}







/*
	let created_time = parseInt($time),
		waiting_time = $time+300,
		current_time = parseInt(Date.parse(Date())),
		remaining_minuts = ((((waiting_time-Date.parse(Date()))/1000)/60).toFixed(2)).toString(),
		approximate_seconds = remaining_minuts.split('.')[1];
	let proximate_seconds = ((60*approximate_seconds)/100).toFixed(0);
	let	time_string = remaining_minuts.split('.')[0]+':'+approximate_seconds;
		if(current_time > waiting_time){
			//alert('yes');
		}else{
			//alert('No');
		}







	//document.querySelector('#test321').innerText = new Date(waiting_time)+'>>>>>>>>>>'+new Date(parseInt(current_time));

	*/
}
function init_waiting_timer(){
setTimeout('waiting_timer();',1000);
}

