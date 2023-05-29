<?php 
include '/var/www/html/wp-config.php';
$role=$_GET['u'];
$channel = $_GET['channel'];
$query = "SELECT * FROM oc_video_call WHERE channel='$channel'";
$data = $wpdb->get_results($query);
$timer_time;
if($channel == 'expired'){
  die('this link is expired');
}else{
  $query = "SELECT * FROM oc_video_call WHERE channel='$channel'";
  $data = $wpdb->get_results($query);
  $end_time= $data[0]->call_time;
  if(count($data)<1){
    die('this link is expired');
  }
}
if($role == 'ttime'){
if($data[0]->utime > $data[0]->ttime){
  $timer_time = $data[0]->ttime;
}else{
  $timer_time = $data[0]->utime;
}

$total_time = $data[0]->call_time;
$total_time = 60*$total_time;
$total_time = $total_time-$timer_time;
$total_time = $total_time/60;
$total_time = strval($total_time);
$total_time = explode('.', $total_time);
$min_count = $total_time[0];
$total_time[1] = $total_time[1]*10;
$sec_count = 60*$total_time[1]/100;
$total_time = $min_count.':'.$sec_count;
}else if($role == 'utime'){

if($data[0]->utime > $data[0]->ttime){
  $timer_time = $data[0]->ttime;
}else{
  $timer_time = $data[0]->utime;
}

$total_time = $data[0]->call_time;
$total_time = 60*$total_time;
$total_time = $total_time-$timer_time;
$total_time = $total_time/60;
$total_time = strval($total_time);
$total_time = explode('.', $total_time);
$min_count = $total_time[0];
$total_time[1] = $total_time[1]*10;
$sec_count = 60*$total_time[1]/100;
$total_time = $min_count.':'.$sec_count;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Basic Video Call -- Agora</title>
  <link rel="stylesheet" href="./vendor/bootstrap.min.css">
  <link rel="stylesheet" href="./index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style type="text/css">
    body{
      background-color: #1C1C1C !important;
      background-image: url("<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/No-Video-Call2.svg");
    background-position: center;
    background-size: 10%;
    background-repeat: no-repeat;
    background-color: black;
    width: 100%;
    height: 100vh;
    }
    #join-form{
      display:none;
    }
    #local-player{
    position: absolute;
    width: 75px;
    height: 110px;
    bottom: 2%;
    right: 3%;
    border-radius: 5px;
    overflow: hidden;
    background-image: url("<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/No-Video-Call2.svg");
    background-position: center;
    background-size: 50%;
    background-repeat: no-repeat;
    background-color: black;
    }

    #local-player div{
    background-color: transparent !important;
    }

    #remote-playerlist{
    width: 70%;
    height: 100%;
    overflow: hidden;
    margin: 0 auto;
    }
    .player{
      width: 100%;
    height: 100vh;
    }
    .player-name{
      display: none;
    }
    .end_button{
    width: 100%;
    position: absolute;
    background-color: transparent;
    text-align: center;
    bottom: 5%;
    }
    .end_button button{
    background-image: url(<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/End-Call.svg);
    background-position: center;
    background-size: contain;
    width: 4rem;
    background-repeat: no-repeat;
    height: 3.2rem;
    background-color: transparent;
    border: none;
    outline: none;
    }

    .end_button .block_video{
    background-image: url(<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/Video-Call.svg);
    background-position: center;
    background-size: contain;
    width: 4rem;
    background-repeat: no-repeat;
    height: 3.2rem;
    background-color: transparent;
    border: none;
    outline: none;
    }


    .thriive_logo{
      position: absolute;
    top: 1%;
    left: 1%;
    border-radius: 5px;
    overflow: hidden;
    padding: 5px;
    background-color: #fff;
    }
    .video_timer{
    color: #fff;
    width: 3rem;
    height: 2rem;
    text-align: center;
    position: absolute;
    right: 0px;
    top: 0px;
    background: #000;
    }
    @media screen and (max-width:767px) and (min-width:320px){
    	#remote-playerlist{
    width: 100%;
    height: 100%;
    overflow: hidden;
    }
    }
    
  </style>
</head>
<body>



  <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> Joined room successfully. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> Joined room successfully. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
  <div class="container">
    <form id="join-form">
      <div class="row join-info-group">
          <div class="col-sm">
            <p class="join-info-text">AppID</p>
            <input id="appid" type="text" placeholder="enter appid" required>
            <p class="tips">If you don`t know what is your appid, checkout <a href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#a-nameappidaapp-id">this</a></p>
          </div>
          <div class="col-sm">
            <p class="join-info-text">Token(optional)</p>
            <input id="token" type="text" placeholder="enter token">
            <p class="tips">If you don`t know what is your token, checkout <a href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#a-namekeyadynamic-key">this</a></p>
          </div>
          <div class="col-sm">
            <p class="join-info-text">Channel</p>
            <input id="channel" type="text" placeholder="enter channel name" required>
            <p class="tips">If you don`t know what is your channel, checkout <a href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#channel">this</a></p>
          </div>
      </div>

      <div class="button-group">
        <button id="join" type="submit" class="btn btn-primary btn-sm">Join</button>
        <button id="leave" type="button" class="btn btn-primary btn-sm" disabled>Leave</button>
      </div>
    </form></div>

    
        <div style="display:flex;">
        <div id="remote-playerlist"></div>       
        <div id="local-player" class="player">
        <p id="local-player-name" class="player-name"></p>
        </div>
        </div>
        <div class="end_button">
          <button onclick="end_call()"></button>
          <button class="block_video" onclick="block_video()"></button>
        </div>
        <div class="video_scripts" style="display: none;">         
        </div>
        <div class="video_timer">
          <?php echo $total_time;?>
        </div>

  <script src="./vendor/jquery-3.4.1.min.js"></script>
  <script src="./vendor/bootstrap.bundle.min.js"></script>
  <script src="./AgoraRTC_N-4.2.1.js"></script>
  <script src="./index.js"></script>
  <script type="text/javascript">
      var end = document.querySelector('.end_button');
      var vid_status = document.querySelector('#remote-playerlist').style.display;
      var status = 0;
      var time_spent = 0;
      var role = '<?php echo $role;?>';
      var both_online = 0;
      var video_block_bg = 0;
      var video_block_bg_def = 0;
      function check_end(){
      let action = 'check';
      var channel = document.querySelector('#channel').value;
      $.post('video_functions.php',{channel:channel, action:action, status:status, time_spent:time_spent, role:role}, function(data){
        console.log(data);
        status = 1;
        time_spent = time_spent+2;
        var data_array = data.split('|');
        var vcone = data_array[0];
        var vctwo = data_array[1];
        var vcthree = data_array[2]
        var vcfour = data_array[3];


        if(vctwo == 1 && role == 'ttime'){
        	document.querySelector('#remote-playerlist').style.display = 'none';
        }else if(vctwo == 0 && role == 'ttime'){
        	document.querySelector('#remote-playerlist').style.display = 'block';
        }else if(vcthree == 1 && role == 'utime'){
        	document.querySelector('#remote-playerlist').style.display = 'none';
        }else if(vcthree == 0 && role == 'utime'){
        	document.querySelector('#remote-playerlist').style.display = 'block';
        }

        if(vctwo == 1 && role == 'utime'){
        	document.querySelector('#local-player video').style.display = 'none';
        	document.querySelector('.block_video').style.backgroundImage = "url('<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/No-Video-Call.svg')";
        }else if(vctwo == 0 && role == 'utime'){
        	document.querySelector('#local-player video').style.display = 'block';
        	document.querySelector('.block_video').style.backgroundImage = "url('<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/Video-Call.svg')";

        }else if(vcthree == 1 && role == 'ttime'){
        	document.querySelector('#local-player video').style.display = 'none';
        	document.querySelector('.block_video').style.backgroundImage = "url('<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/No-Video-Call.svg')";
        }else if(vcthree == 0 && role == 'ttime'){
        	document.querySelector('#local-player video').style.display = 'block';
        	document.querySelector('.block_video').style.backgroundImage = "url('<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/video_call/Agora_Web_SDK_FULL/Video-Call.svg')";

        }

        if(data_array[4] == 1){
          time_spent = 0;          
        }
        if(data_array[3] == 1){
          vcone = 1;
        }
        if(vcone == 1 || vcfour == 1){
          location.href = "<?php echo get_site_url();?>/my-account-page";
          }
      });
      }
      function end_call(){
        let action = 'end';
        let channel = document.querySelector('#channel').value;
        $.post('video_functions.php', {channel:channel,action:action}, function(data){});
      }

      function block_video(){
      	let channel = document.querySelector('#channel').value;
      	let action = "block";
      	$.post('video_functions.php', {action:action,channel:channel,role:role,vid_status:vid_status}, function(data){console.log(data);});
   	  }

      function video_timer(){
      	var rtime = document.querySelector('.video_timer').innerText;
        var full_time = rtime.split(':');
        if(full_time[1] == 00){
          full_time[0] = full_time[0]-1;
          full_time[1] = 59;
        }else if(full_time[0] == 00 && full_time[1] == 00){}else{
          full_time[0] = full_time[0];
          full_time[1] = full_time[1]-1;
        }
        let time_string = full_time[0]+':'+full_time[1];
        document.querySelector('.video_timer').innerText = time_string;

      	if(both_online >-1  && document.querySelector('#remote-playerlist').childElementCount == 0){
      		check_left();
      	}else if(both_online>0 && document.querySelector('#remote-playerlist').childElementCount>0){
      		both_online = 10;
      	}
        /*if(role=='ttime' && time_spent == 30){
            $.post('video_functions.php', {action:'update_time'})
        }*/

      }

      function init_video_timer(){
      	var remote_status = document.querySelector('#remote-playerlist').childElementCount;
      	var rtime = document.querySelector('.video_timer').innerText;
      	if(remote_status>0){
      		both_online = 10;
			setInterval('video_timer()', 1000);
			clearInterval(init_video_timer_interval);      		
      	}

      }

      function check_left(){
      	both_online = both_online-1;
      	if(both_online == 0){
      		location.href = "<?php echo get_site_url();?>/my-account-page";
      	}
      }

      var init_video_timer_interval = setInterval('init_video_timer()',1000);
      setInterval('check_end()', 2000);


  </script>
</body>
</html>
