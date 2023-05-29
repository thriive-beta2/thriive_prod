<script src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/chat-renew/scripts/chat-script.js?v=20210423.13"></script>
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
    height: 26%;
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
   text-align: center;
}
p.timer_text1 {
   color: #fff;
   font-size: 18px;
   text-align: center;
}
.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   float:left;
   margin-top: 15px;
   text-align: center;
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
    margin-top: 2rem;
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
   text-align: center;
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

<script>
  //alert('<?php echo $curr_role;?>');

</script>

<?php
if($curr_role=='sub'){
  $query = "SELECT * FROM online_consultation WHERE uid=$current_user AND action='chat' ORDER BY id DESC LIMIT 1";
  $res = $wpdb->get_results($query);
  $rem_time = $res[0]->rem_time;
  $current_time1 = date('Y-m-d H:i:s');
  $current_time = strtotime(date('Y-m-d H:i:s'));
  $rem_time1 = strtotime($res[0]->rem_time);
  $busy_date = strtotime($res[0]->created_date);
  $res_time = $current_time-$busy_date;
  $res_time_diff = $current_time-$busy_date;
  $res_time = gmdate('i:s', $res_time);
  //$res_time = $res_time/60;
  $res_time_array = explode(':', $res_time);

  if($res_time_diff<0){
  	$dis_time = '4:59';
  	session_start();
	$_SESSION['curr_time'] = '4:59';
  }else if($res_time_array[0]>4){
  	$dis_time = '0:00';
  	session_start();
	$_SESSION['curr_time'] = '0:00';
  }else{
  	$min = $res_time_diff/60;
  	$minr = round($res_time_diff/60,1);
  	//$minr = explode('.', $minr);
  	//if()
  	$dis_time = 300-($minr*60);
  	$dis_time = explode('.', $dis_time);
  	$dis_time = $dis_time[0];
  	$dis_time = gmdate('i:s',$dis_time);
  	session_start();
	$_SESSION['curr_time'] = $dis_time;
  }

  if(is_page(59025)){
  	  	session_start();
	$_SESSION['curr_time'] = '4:59';
	$dis_time = "4:59";
  }










  //$rem_time = explode(':', $rem_time);

  /*$sec = 0;
  if($rem_time[0] != 0){
    $sec = $sec+($rem_time[0]*60);
  }
  if($rem_time[1]!=0){
    $sec = $sec+$rem_time[1];
  }
  if(($current_time-$sec)>$busy_date){
    $rem_time = '0:00';
  }*/

}
?>
<script>
  console.log(`<?php print_r($min.'--'.$minr);?>`);
</script>

<div class="user_exit">
  <div class="exit_text">USER EXITED THE CHAT!! SESSION INCOMPLETE</div>
</div>


<div class="accept_modal_timer">
  <div class="col-md-12 col-xs-12 mainsessin">
    <div class="col-md-6 col-xs-6 mesgt">

    <p class="timer_text">Please Wait for Therapist. You will also receive an SMS once accepted chat</p>
    <div class="accept_timer" id="accept_timer"><?php if($_SESSION){if($_SESSION['curr_time']){echo $_SESSION['curr_time'];}else{echo $dis_time;}}else{echo $dis_time;}?></div><img class="timer_img" src="">
    </div>
    <div class="col-md-6 col-xs-6 mesgt">
    <div class="col-md-2 col-xs-2 msutn">
    <button class="wait_btn session-btn" disabled="true" data-ocid="0" onclick="user_waiting(this.dataset.ocid);" style="display: none;">Wait Again</button>
    </div>
    <div class="col-md-2 col-xs-2 msutn">
    <button class="browse_btn session-btn" disabled="false" onclick="user_browsing(this.dataset.ocid,this.dataset.action);this.style.backgroundColor='#fff';" data-ocid='0' data-action="0">Change Therapist</button>
    </div>
    <div class="col-md-2 col-xs-2 msutn">
    <button class="browse_btn session-btn" disabled="false" onclick="take_later(this.dataset.ocid,this.dataset.action);this.style.backgroundColor='#fff';" data-ocid='0' data-action="0">Take Session Later</button>
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


