<!-- The core Firebase JS SDK   is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-storage.js"></script>
<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyD2FP1evAtrtUpSeUwfNB8EwB99uJJAQZw",
    authDomain: "thriive-4bbd3.firebaseapp.com",
    databaseURL: "https://thriive-4bbd3-default-rtdb.firebaseio.com",
    projectId: "thriive-4bbd3",
    storageBucket: "gs://thriive-4bbd3.appspot.com",
    messagingSenderId: "228923631497",
    appId: "1:228923631497:web:6b71a8d7b360c27c87a358",
    measurementId: "G-3E78629LN0"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>


<style type="text/css">
  .stars img{
    width:14%;
  }
  .stars{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  #star1{
    filter: invert(1);
  }
  #star2{
    filter: invert(1);
  }
  .star_label{
    margin:0 !important;
    width: 100%;
    font-size: 1.2rem;
    padding-bottom: 9px;
    color: #7064A0;
  }
</style>
<?php if(1==1){ if( is_page(74075) || is_page(78002) || is_page(77203) || is_page(59025) || is_page(71622) || is_page(71271) || is_page(71345) || is_page(71656) /*|| is_page(548)*/ ){
    $curr_session_type = "none";
    if($current_user->caps['therapist']==1){
    $cid = $current_user->ID;
    $query = "SELECT * FROM online_consultation WHERE tid=$cid ORDER BY id DESC LIMIT 1";
    $curr_session_type = $wpdb->get_results($query)[0]->action;
    $curr_therapy_type = $wpdb->get_results($query)[0]->therapy_name;
    $curr_ocid = $wpdb->get_results($query)[0]->id;
    ?>

    <style type="text/css">
      #Yuser{
        display: none;
      }
    </style>

    <?php
  }else{
    $cid = $current_user->ID;
    $query = "SELECT * FROM online_consultation WHERE uid=$cid ORDER BY id DESC LIMIT 1";
    $curr_session_type = $wpdb->get_results($query)[0]->action;
    $curr_therapy_type = $wpdb->get_results($query)[0]->therapy_name;
    $curr_ocid = $wpdb->get_results($query)[0]->id;
    //print_r($curr_session_type);
    ?>



    <style type="text/css">
      #nUser{
        display: none;
      }
    </style>

    <?php
  } ?>

<noscript>
<div class="javascript_check" style="width: 100%;
    overflow: hidden;
    text-align: center;
    height: 30vh;
    background-color: #FB9903;
    flex-wrap: wrap;
    display: flex;
    word-wrap: break-word;
    position: fixed;
    bottom: 0;">
  <p style="font-size: 1.1rem;
    word-break: break-word;
    white-space: normal;
    margin-top: 10vh;
    text-align: center;
    width: 100%;">Java Sript Off !!!<br>
Please turn on Java Script from you web browser settings and refresh page.</p>
</div>
</noscript>

<?php



  if($curr_session_type == 'chat' AND $curr_therapy_type != 'Appointment'){
  ?>
<script src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/chat-renew/scripts/chat-script.js?v=20220124.239"></script>
<script>OC_ID = <?php echo $curr_ocid;?>;</script>
<?php }else if($curr_session_type == 'videocall' AND $curr_therapy_type == 'meditation'){
include "/var/www/html/wp-content/themes/thriive/horoscope_new/instant_video/video-modals/video-modals.php";

}else{

    $query1 = "SELECT * FROM online_consultation WHERE tid=$cid AND action='chat' AND payment_status='success' ORDER BY id DESC LIMIT 1";
    $previous_session = $wpdb->get_results($query1)[0]->tid_accept;
    //print_r($previous_session);
      if($previous_session == '-1' || $previous_session == '-2'){
          echo '<script>document.querySelector("#session_data").innerText = "Last User Changed The Therapist";</script>';        
      }else{
          echo '<script>document.querySelector("#session_data").innerText = "No Active Chat Sessions";
            //change_session_detail_lightbox_message("No ongoing sessions");
          </script>';
      } 
}

}}?>
<?php

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"></script>

<style>
  .accept_modal,.accept_modal_timer{
    width:100%;
    height: 25%;
    position: fixed;
    bottom:0;
    left:0;
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
    text-align: center;
}
.msutn {
    margin-left: 105px;
}
.session-btn {
    padding: 5px;
    border-radius: 5px;
    margin: 5px;
}
/* p.timer_text,p.timer_text1 {
   color: #fff;
   font-size: 16px !important;
   text-align: left;
   padding-top: 16px !important;
} */
.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   float:left;
   margin-top: 15px;
   text-align: left;
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
  width: 50px;
    position: absolute;
    margin-top: 20px;
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

 .user_offline{
    width:100%;
  height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
    display: none;
    z-index: 9991;
  }
 .exit_offline{
    color: #ffbd2c;
    margin-top: 2rem;
    text-align: center;
 }
@media screen and (max-width:767px) and (min-width:320px){

.browse_btn{
  font-size: 15px !important;
}

.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   /*float: left;*/
   margin-top: 10px;
   width:100%;
   font-size: 24px;
   text-align: left;
}
.timer_img{
  width:50px;
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
  <div class="exit_text">USER EXITED THE CHAT!! SESSION INCOMPLETE <button onclick="document.querySelector('.user_exit').style.display='none'">OK</button></div>
</div>

<div class="user_offline">
  <div class="exit_offline">USER WENT OFFLINE!! SESSION INCOMPLETE <button onclick="document.querySelector('.user_exit').style.display='none'">OK</button></div>
</div>


<div class="accept_modal_timer">
  <div class="col-md-12 col-xs-12 mainsessin">
    <div class="col-md-6 col-xs-6 mesgt">

    <p class="timer_text">Calling therapist to come online for the chat</p>
    <div class="accept_timer" id="accept_timer" style="display:none">Loading...</div><img class="timer_img" src="<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>">
    </div>
    <div class="col-md-6 col-xs-6 mesgt">
    <div class="col-md-2 col-xs-2 msutn">
    <button class="wait_btn session-btn" disabled="true" data-ocid="0" onclick="user_waiting(this.dataset.ocid);" style="display: none;">Wait Again</button>
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
if($current_user->ID == 61378){
?>

<div class="javascript_check" style="width: 100%;
    overflow: hidden;
    text-align: center;
    height: 30vh;
    background-color: #FB9903;
    flex-wrap: wrap;
    display: flex;
    word-wrap: break-word;
    position: fixed;
    bottom: 0;">
  <p style="font-size: 1.1rem;
    word-break: break-word;
    white-space: normal;
    margin-top: 10vh;
    text-align: center;
    width: 100%;">It seems that Your javascript is off Please turn it on in your browser settings to proceed further</p>
</div>


<script>
  function javascript_status(status){
  if(status != "none"){
    document.querySelector('.javascript_check').style.display= "none";    
  }else{
    init_javascript_status();
  }
}

function init_javascript_status(){
  javascript_status(document.querySelector('.javascript_check').style.display);
}

init_javascript_status();
</script>

<?php
}
?>




<!--
<script>
  function javascript_status(status){
  if(status != "none"){
    document.querySelector('.javascript_check').style.display= "none";    
  }else{
    init_javascript_status();
  }
}

function init_javascript_status(){
  javascript_status(document.querySelector('.javascript_check').style.display);
}

init_javascript_status();
</script>
-->