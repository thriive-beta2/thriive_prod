

<script src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/instant_video/scripts/video-script.js?v=20210914.127"></script>

<style>
  .accept_modal_video,.accept_modal_timer_video{
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
  .accept_modal_table_video{
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
p.timer_text_video,p.timer_text_video1 {
   color: #fff;
   font-size: 16px !important;
   text-align: left;
   padding-top: 16px !important;
}
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
.timer_img_video{
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
.timer_img_video{
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
  .accept_modal_table_video{
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



<div class="accept_modal_timer_video">
  <div class="col-md-12 col-xs-12 mainsessin">
    <div class="col-md-6 col-xs-6 mesgt">

    <p class="timer_text_video">Calling therapist to come online for the Video Call</p>
    <div class="accept_timer" id="accept_timer" style="display:none">Loading...</div><img class="timer_img_video" src="<?php echo get_template_directory_uri() .'/assets/images/image3.gif'; ?>">
    </div>
    <div class="col-md-6 col-xs-6 mesgt">
    <div class="col-md-2 col-xs-2 msutn">
    <button class="browse_btn_video session-btn" disabled="true" onclick="change_therapist_video(this.dataset.ocid);" data-ocid='0' data-action="0">Change Therapist</button>
    </div>
    <div class="col-md-2 col-xs-2 msutn">
    <button class="browse_btn_video session-btn" disabled="true" onclick="take_later_video(this.dataset.ocid);" data-ocid='0' data-action="0">Take Session Later</button>
    </div>
    </div>
  </div>
</div>


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



<div class="marked_icomplete_msg">
  <h5></h5>
</div>



<div class="accept_modal_video" style="">
    <div class="accept_modal_table_video">
      <h4>Please Accept Chat Request From</h4>
      <table class="acc_table">
      </table>
    </div>
</div>

