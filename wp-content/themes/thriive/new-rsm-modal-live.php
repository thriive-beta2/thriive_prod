<!-- Modal -->
<div class="modal fade" id="call_with_healer" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
        <div class="modal-content">
            <div class="row">
              
              <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
				<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                        <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                </button>
              </div>
            </div>
            <div class="modal-body text-center">
              <?php if (!is_user_logged_in()) {
               set_query_var( 'column', 'col-sm-8 col-12');
               set_query_var( 'text_left', 'text-left');
               get_template_part( 'template-parts/new-oc-seeker-login-form-call-modal');
              } ?>      
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login_popup" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog <?php if (!is_user_logged_in()){ echo "modal-lg"; } ?>" role="document">
        <div class="modal-content">
        <div class="row">
              <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
				<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                        <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                </button>
              </div>
        </div>
            <div class="modal-body text-center">
                <?php set_query_var( 'column', 'col-sm-8 col-12');
                set_query_var( 'text_left', 'text-left');
                get_template_part( 'template-parts/new-otp-based-login-modal'); ?>        
            </div>
        </div>
    </div>
</div>
<?php if(is_page(32867) || is_page(32300) || is_page(32260) || is_page(32235) || is_page(32377) || is_page(32379) || is_page(32381) || is_page(32258) || is_page(32186) || is_page(32893) || is_page(32905)) { ?>
  <div class="modal fade" id="mobile_verfication_modal" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="error-msg form-error" id="mobileExist"></div>
           <form data-parsley-validate class="form-element-section"  id="form_send_otp">
               <div class="row section col-sm-12 col-12 mx-auto p-0">
  <!--                <a href="<?php echo wp_logout_url( '/login/' ); ?>">&times;</a> -->
  <!--                <a href="" class="otp-form-close close" data-dismiss="modal">&times;</a> -->
                  <div class="form-group col-12">
                      <label for="mobile-number">Please enter your mobile number for verification</label>
  <!--                    <p class="sub-text"></p> -->
                      <input data-parsley-required="true" type="tel" data-parsley-required-message="Mobile is required." class="form-control international-number" id="mobile-number" value="<?php if($current_user->mobile) { '+' . $current_user->countryCode . $current_user->mobile; } ?>">
                  </div>
                  
                  <button type="submit" class="btn d-inline btn-primary" id="send_otp">SEND OTP</button>
               </div>
           </form>                  
           <form data-parsley-validate class="form-element-section" id="mobile_verification">
               <div class="row section col-sm-12 col-12 mx-auto p-0 d-none" id="div_verify_otp">
                  <div class="form-group col-12 ">
                      <label for="mobile-otp">Enter OTP</label>
                      <input data-parsley-required="true" type="text" data-parsley-required-message="OTP is required." data-parsley-maxwords="4" class="form-control" id="mobile-otp" id="mobile-otp">
                      <div class="loading-msg">Loading...</div>
                      <div class="otp-error"></div>
                  </div>
                  <button type="button" class="btn d-inline btn-primary" id="re_send_otp">RESEND OTP</button>
                  <button type="submit" class="btn d-inline btn-primary" id="verify_otp">NEXT</button>
               </div>
           </form>
          </div>
        </div>
      </div>
  </div>
  <?php if(is_user_logged_in()) {
      $current_user = wp_get_current_user();
      if(($current_user->is_mobile_verify) == 0){
          echo '<script type="text/javascript">$("#mobile_verfication_modal").modal();</script>';
      }   
  } 
} ?>


<div class="modal fade" id="takelater1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog " style="margin-top: 200px;" role="document">
		<div class="modal-content" style="padding: 15px 15px 0px 15px;text-align: center;">
			
			<div class="row">
              
              <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: 10px;">
									
					<div class="col-sm-10 col-xs-10 text-center" >	
						<span class="packtext">	Your session is saved in your account.<br> You can log back on to use it at any convenient time.<br><a id="laterlink" href="#"><button class='browse_btn session-btn btnCallnow'  >OK</button></a></span>
					</div>	
					<div class="col-sm-2 col-xs-2 text-center" >
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
								<span aria-hidden="true" style="font-size: 33px;">&times;</span>
						</button>
					</div>	
				
				</div>		
              </div>
            </div>
			
			
			
		</div>
	</div>
</div>

<script type="text/javascript">



	$('#select_therapy').on('change', function() {
		var url = $(this).val(); // get selected value
		if (url) { // require a URL
		  window.location = url; // redirect
		}
		return false;
	});
  
  $("#d_opensignupform, #d_opensignupform1, #d_opensignupform2, #d_opensignupform3, #m_opensignupform, #m_opensignupform1, #m_opensignupform2, #m_opensignupform3").on('click', function(){
    $(".modal-body #reg_unhide #payment").val(0);
    $("#call_with_healer").modal('show');
  });

  $('#openloginform').on('click', function(){
    $("#call_with_healer").modal('hide');
    $("#login_popup").modal('show');
  });

  $('#opensignupform').on('click', function(){
    $("#call_with_healer").modal('show');
    $("#login_popup").modal('hide');
  });

  $('#headeropenlogin, #openloginfromsidemenu').on('click', function(){
    $("#login_popup").modal('show');
  });

  $('#opensignupmodal, #opensignupmodal1').on('click',function(){
    $("#lead_source").val('tarot-tool');
    $("#call_with_healer").modal('show');
  });
  
  $(".regter").on('click', function(){
    var position = $(this).attr('data-position');
    $("#lead_source").val($("#event_title_"+position).val());
    $("#event_position").val(position);
    $("#call_with_healer").modal('show');
  });
  
  $('#sub').on('click',function(){
    $("#lead_source").val('Numerology_tool');
    $("#call_with_healer").modal('show');
  });

  $('.login0').on('click',function(){
    $("#lead_source").val('zodiac_compatibility_tool');
    $("#call_with_healer").modal('show');
  });

  $('#freesession_register').on('click',function(){
    var ailment_id = s_ailment = t_ailment = "";
    if($('#selectailment').val() == 1) {
      ailment_id = 1;
      s_ailment = "Other";
      t_ailment = $("input[name=typeailment]").val();
    } else if($('#selectailment').val() != 0){
      ailment_id = $('#selectailment').val();
      s_ailment = $('#selectailment').find(':selected').data('termname');
    }
    var therapies = $(".ftherapies:checked").map(function() {return this.id;}).toArray().join(", ");
    document.cookie='rfs_ailment_id' + "=" + ailment_id;
    document.cookie='rfs_s_ailment' + "=" + s_ailment;
    document.cookie='rfs_t_ailment' + "=" + t_ailment;
    document.cookie='rfs_therapies' + "=" + therapies;
    $("#call_with_healer").modal('show');
  });
</script>