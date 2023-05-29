$(document).ready(function() {

  // modal popup starts here
    $("#modal_anchbtn1").click(function () {      
      $(".shade_bg1").fadeIn();
      $("#popVid1").fadeIn();   
    });
    $("#cls_btn1").click(function () {      
      $(".shade_bg1").fadeOut();
      $("#popVid1").fadeOut();
      $('#popVid1 video').trigger('pause');
    });

    $("#modal_anchbtn2").click(function () {
      $(".shade_bg1").fadeIn();
      $("#popVid2").fadeIn();
    });
    $("#cls_btn2").click(function () {
      $(".shade_bg1").fadeOut();
      $("#popVid2").fadeOut();
      $('#popVid2 video').trigger('pause');
    });

    $("#modal_anchbtn3").click(function () {
      $(".shade_bg1").fadeIn();
      $("#popVid3").fadeIn();
    });
    $("#cls_btn3").click(function () {
      $(".shade_bg1").fadeOut();
      $("#popVid3").fadeOut();
      $('#popVid3 video').trigger('pause');
    });

    $("#modal_anchbtn4").click(function () {
      $(".shade_bg1").fadeIn();
      $("#popVid4").fadeIn();
    });
    $("#cls_btn4").click(function () {
      $(".shade_bg1").fadeOut();
      $("#popVid4").fadeOut();
      $('#popVid4 video').trigger('pause');
    });

    $("#modal_anchbtn5").click(function () {
      $(".shade_bg1").fadeIn();
      $("#popVid5").fadeIn();
    });
    $("#cls_btn5").click(function () {
      $(".shade_bg1").fadeOut();
      $("#popVid5").fadeOut();
      $('#popVid5 video').trigger('pause');
    });

    $("#modal_anchbtn6").click(function () {
      $(".shade_bg1").fadeIn();
      $("#popVid6").fadeIn();
    });
    $("#cls_btn6").click(function () {
      $(".shade_bg1").fadeOut();
       $("#popVid6").fadeOut();
       $('#popVid6 video').trigger('pause');
    });
  // modal popup ends here


    // slider starts here   
    $("#wrapper_Hold section").each(function(e) {
      if (e != 0)
          $(this).hide();
    });
    
    $("#btn_Right").click(function(){
        if ($("#wrapper_Hold section:visible").next().length != 0)
            $("#wrapper_Hold section:visible").next().show().prev().hide();
        else {
            $("#wrapper_Hold section:visible").hide();
            $("#wrapper_Hold section:first").show();
        }
        return false;
    });

    $("#btn_Left").click(function(){
        if ($("#wrapper_Hold section:visible").prev().length != 0)
            $("#wrapper_Hold section:visible").prev().show().next().hide();
        else {
            $("#wrapper_Hold section:visible").hide();
            $("#wrapper_Hold section:last").show();
        }
        return false;
    });

    // slider ends here  
 
});

    
