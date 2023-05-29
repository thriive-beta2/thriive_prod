<?php 
include_once get_stylesheet_directory().'/new-header.php'; ?>
<?php 
	if (!is_user_logged_in()) { 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		$username = $current_user->first_name . ' ' . $current_user->last_name;	
	}
?>
<style>
.time_label{
	padding: 0.5% 1%;
    background-color: white;
    border: 1px solid rgba(0, 0, 0, 0.11);
    color: rgba(0, 0, 0, 0.85);
    cursor: pointer;
   /* box-shadow: rgba(0, 0, 0, 0.11) 0px 2px 5px 0px;*/
    border-radius: 5px;
    margin-right: 1%;
	width:30%;
	text-align:center;
	margin-bottom: 15px;
    padding: 10px;
	font-family: Roboto;
}
.checked{
	background: #153483;
	color: #fff;
}
.timslt{
	margin-top:15px;
}

.seltm{
	font-size:18px;
	font-family:Roboto;
	font-weight: 600;
    color: #000;
}
.ui-widget.ui-widget-content{
	position: inherit;
}
.custom-calendar{
	display: flex;
    list-style: none;
    margin: 0 15%;
}
.custom-calendar li{
	cursor: pointer;
    padding-right: 50px;
}
.date-selection{
	box-shadow: rgba(0, 0, 0, 0.08) 0px 11px 16px 0px;
    height: 100px;
    margin: 0px auto;
    overflow: hidden;
    padding: 10px 50px;
    text-align: center;
}
.active_day{
	color: #4f0475;
}
.active_date{
	background: #153483;
	color: #fff;
	border-radius: 50px;
}
.disable{ 
	cursor: none;
}
.disable-text{
	background: #eee;
    border-radius: 50px;
    color: #fff;
}
.disable_time{
	background: #eee;
    color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.11);
    border-radius: 5px;
    margin-right: 1%;
    width: 30%;
    text-align: center;
    margin-bottom: 15px;
    padding: 10px;
    font-family: Roboto;
    cursor: inherit;
}
.d-none{
	display: none;
}
.login_btn{
		padding: 1% 5%;
}
@media screen and (max-width: 600px) {
	.date-selection {
	    padding: 10px !important;
	}
	.custom-calendar {
	    margin: 0px 0px 0px -40px !important
	}
	.custom-calendar li {
	    padding-right: 19px;
	}
	.login_btn{
		padding: 2% 10%;
	}
}
</style>
<?php
$mypost = get_page_by_path($_GET['q'], '', 'therapist');

$post = get_post($mypost->ID);
$payment_type = isset($_GET['pt']) ? $_GET['pt'] : '';
$payment_type_url = isset($_GET['pt']) ? '&pt='.$_GET['pt'] : '';
setup_postdata( $post );
$appointment_cost = get_field('appointment_cost',$mypost->ID);

?>
<button onclick="goBack()" style="margin: 0px 20px 0px; background: none;border: none;"> < Back</button>
<script>
function goBack() {
  window.location.href='<?php echo site_url();?>/therapist-call-chat-video-page?q=<?php echo $_GET["q"];?>&a=<?php echo $_GET["a"];?>&t=<?php echo $_GET["t"];?>';
}
</script>
<div class="container">
	<!--<h1>Booking Date & Time</h1>-->
	<?php //echo PAYU_BASE_URL;?>
	<form method='post' action='<?php echo site_url();?>/appointment-summary'>
	
		<div style="margin-bottom: 10%;">
			
			<div class="date-selection">
				<h5 class="seltm">Choose Your Slot</h5>
				<ul class="custom-calendar">

				<?php 			
					$i = 1;
					$date = date('Y-m-d');
					$html = "<li data-date='".date('Y-m-d')."'>";
					$html .= "<div class='calendar-option'>";
					$html .= "<div class='cal-day active_day'>".date('D')."</div>";
					$html .= "<div class='cal-date active_date'>".date('d')."</div>";
					$html .= "</div>";
					$html .= "</li>";
					echo $html;
					do{
						$inc = ' + '.$i.' days';
						$html = "<li data-date='".date('Y-m-d', strtotime($date.$inc))."'>";
						$html .= "<div class='calendar-option'>";
				    	$html .= "<div class='cal-day'>".date('D', strtotime($date.$inc))."</div>";
				    	$html .= "<div class='cal-date'>".date('d', strtotime($date.$inc))."</div>";
				    	$html .= "</div>";
				    	$html .= "</li>";
				    	echo $html;
						//echo date('Y-m-d', strtotime($date.$inc)).'<br/>';
						$i++;
					} while($i <= 6); ?>
				</ul>
			</div>
			<div id="loader" style="display:none;text-align:center;margin-top:50px;"><img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/loading.gif"/>
			</div>
			<div id="timeresult">
			<div class="timslt">
				
				<h5 class="seltm"> Select Time</h5>
				
				
				
				<input type="radio" name="time" id="01" value="01:00:00" style="display: none;"/><label class="time_label" for="01">1:00 AM</label>
				<input type="radio" name="time" id="02" value="02:00:00" style="display: none;"/><label class="time_label" for="02">2:00 AM</label>
				<input type="radio" name="time" id="03" value="03:00:00" style="display: none;"/><label class="time_label" for="03">3:00 AM</label>
				<input type="radio" name="time" id="04" value="04:00:00" style="display: none;"/><label class="time_label" for="04">4:00 AM</label>
				<input type="radio" name="time" id="05" value="05:00:00" style="display: none;"/><label class="time_label" for="05">5:00 AM</label>
				<input type="radio" name="time" id="06" value="06:00:00" style="display: none;"/><label class="time_label" for="06">6:00 AM</label>
				<input type="radio" name="time" id="07" value="07:00:00" style="display: none;"/><label class="time_label" for="07">7:00 AM</label>
				<input type="radio" name="time" id="08" value="08:00:00" style="display: none;"/><label class="time_label" for="08">8:00 AM</label>
				<input type="radio" name="time" id="09" value="09:00:00" style="display: none;" required="required"/><label class="time_label" for="09">9:00 AM</label>
				<input type="radio" name="time" id="10" value="10:00:00" style="display: none;"/><label class="time_label" for="10">10:00 AM</label>
				<input type="radio" name="time" id="11" value="11:00:00" style="display: none;"/><label class="time_label" for="11">11:00 AM</label>
				<input type="radio" name="time" id="12" value="12:00:00" style="display: none;"/><label class="time_label" for="12">12:00 AM</label>
				<input type="radio" name="time" id="13" value="13:00:00" style="display: none;"/><label class="time_label" for="13">1:00 PM</label>
				<input type="radio" name="time" id="14" value="14:00:00" style="display: none;"/><label class="time_label" for="14">2:00 PM</label>
				<input type="radio" name="time" id="15" value="15:00:00" style="display: none;"/><label class="time_label" for="15">3:00 PM</label>
				<input type="radio" name="time" id="16" value="16:00:00" style="display: none;"/><label class="time_label" for="16">4:00 PM</label>
				<input type="radio" name="time" id="17" value="17:00:00" style="display: none;"/><label class="time_label" for="17">5:00 PM</label>
				<input type="radio" name="time" id="18" value="18:00:00" style="display: none;"/><label class="time_label" for="18">6:00 PM</label>
				<input type="radio" name="time" id="19" value="19:00:00" style="display: none;"/><label class="time_label" for="19">7:00 PM</label>
				<input type="radio" name="time" id="20" value="20:00:00" style="display: none;"/><label class="time_label" for="20">8:00 PM</label>
				<input type="radio" name="time" id="21" value="21:00:00" style="display: none;"/><label class="time_label" for="21">9:00 PM</label>
				<input type="radio" name="time" id="22" value="22:00:00" style="display: none;"/><label class="time_label" for="22">10:00 PM</label>
				<input type="radio" name="time" id="23" value="23:00:00" style="display: none;"/><label class="time_label" for="23">11:00 PM</label>
				<input type="radio" name="time" id="24" value="24:00:00" style="display: none;"/><label class="time_label" for="24">12:00 AM</label>
				
				<label for="noslot" id="noslot">No Slot Available</label>
		    </div>
		    <div id="time-error-msg" style="color:#e03d2a;"></div>
		    <!-- <div id="bookdate"></div> --> 
		    <input type="hidden" name="selected_date" id="selected_date" value="<?php echo date('Y-m-d'); ?>">
			<input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$_GET['q'].'&a='.$_GET['a'].'&t='.$_GET['t'];?>" />
			
			<input type="hidden" name="therapyname" id="therapy" value="<?php echo $_GET['t']; ?>">
			<input type="hidden" name="therapistname"  id="therapist" value="<?php echo $_GET['q']; ?>">
			<input type="hidden" name="actionvia"  id="action" value="<?php echo $_GET['a']; ?>">
			<input type="hidden" name="amount"   value="<?php echo $appointment_cost; ?>">
			<input type="hidden" name="a" value="<?php echo $_GET['action']; ?>">
		    <input type="hidden"  id="tid" value="<?php echo $post->post_author; ?>">
		    <div class="text-center"><input type="submit"   value="Submit" class="login_btn" style="" /></div>
			</div>
		</div>
	</form>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; 
if (is_user_logged_in()){ 
    if(checkfreesessionbyuser($current_user->ID)->count > 0 && $payment_type == "free"){ ?>
        <div class="modal fade" id="alreadyused" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
                        <img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/logo_thriive.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
                                <span aria-hidden="true" style="font-size: 33px;">&times;</span>
                        </button> -->
                      </div>
                    </div>
                    <div class="modal-body text-center">
                      <p>You have already used free session.</p>      
                    </div>
                </div>
            </div> 
        </div>
        <script type="text/javascript">$("#alreadyused").modal();</script>
    <?php }
} ?>
<script>
$("input[name='udf5']").val('<?php echo date("Y-m-d");?>');
	$('.custom-calendar li').on('click',function(e){ 
		if($('.custom-calendar li .calendar-option div').hasClass('active_day') && $('.custom-calendar li .calendar-option div').hasClass('active_date')){
			$('.custom-calendar li .calendar-option div').removeClass('active_day');
			$('.custom-calendar li .calendar-option div').removeClass('active_date');
		}
		$(this).find('div.cal-day').addClass('active_day');
		$(this).find('div.cal-date').addClass('active_date');
		var selected_date = $(this).attr('data-date');
		$('#selected_date').val(selected_date);
		$("input[name='udf5']").val(selected_date);
		$('#bookdate').val(selected_date);
		var select_dt = $('#selected_date').val();
		var tid = $('#tid').val();
		//$('#noslot').addClass('d-none');
		var flag=0;	
	//	$('#noslot').removeClass('d-none');
		$('input:radio').each(function () { 
			var dt = new Date();
			var day = dt.getDate();
			var month = dt.getMonth()+1;
			$(this).next('label').addClass('d-none');
			$(this).next('label').removeClass('disable_time');
			var date = dt.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
			var time = dt.getHours();
			var id = $(this).attr('id');
			$('#timeresult').css('display','none');
			$.ajax({
		       	url: myajax.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'checkalreadybooked', 'date': select_dt, 'tid': tid},
			   	beforeSend: function(){
					$('#loader').delay(2000).show();
					
				},
				complete: function(){
					$('#loader').hide();
					$('#timeresult').css('display','inline');
				},
				
				success: function (data){
			   		data = $.parseJSON(data);
					if(data['resData'] != ""){ 
						$('#noslot').addClass('d-none'); 
						$('.login_btn').removeClass('d-none');
						$.each(data['resData'], function(index, value) {
							
								var res = value.split(":");//alert('select_dt'+select_dt+'date'+date);
								if(select_dt == data['dateData'][0] && id == res[0] ){
									if(id< time+6 && select_dt ==  date){ 
										//return false;
										$('#'+id).next('label').removeClass('time_label');
										$('#'+id).next('label').addClass('d-none');
										
									} else {
										$('#'+id).next('label').addClass('time_label');
										$('#'+id).next('label').removeClass('d-none');
									}		
									
								} 
							
						});  
						
					}	else { 
						$('#noslot').removeClass('d-none');
						$('.login_btn').addClass('d-none');
					}	
					
			   		$.each(data['greyData'], function(index, value) { 
						var res = value.split(":");
						if(select_dt ==  data['dateData'][0] && id == res[0] ){ 
							if(id< time+6 && select_dt ==  date){
								
								return false;
								
							}	
							$('#'+id).next('label').addClass('disable_time');
							$('#'+id).next('label').removeClass('time_label');
							$('#'+id).next('label').removeClass('d-none');
						} 
						 
					});  
		       	}
				
		   	});
			
			
			
		});
		
		
	});
	$('input:radio').each(function () {
		var dt = new Date();
		var day = dt.getDate();
		var month = dt.getMonth()+1;
		var date = dt.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
		var time = dt.getHours();
		var id = $(this).attr('id');
		var select_dt = $('#selected_date').val();
		var tid = $('#tid').val();
		$("input[name='udf5']").val(select_dt);
		$(this).next('label').addClass('d-none');
		$.ajax({
	       	url: myajax.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'checkalreadybooked', 'date': select_dt, 'tid': tid},
		   	beforeSend: function(){
				$('#loader').show();
				$('#timeresult').hide();
			},
			complete: function(){
				$('#loader').delay(2000).hide();
				$('#timeresult').show();
			},
			
			success: function (data){
				data = $.parseJSON(data);
				if(data['resData'] != ""){ 
					$('#noslot').addClass('d-none');
					$('.login_btn').removeClass('d-none');
					
					$.each(data['resData'], function(index, value) { 
						var res = value.split(":");
						if(select_dt == date && id == res[0] && id>=time+6){ 
							$('#'+id).next('label').addClass('time_label');
							$('#'+id).next('label').removeClass('d-none');
						} 
						
					}); 
					
				} else {
					$('#noslot').removeClass('d-none');
					$('.login_btn').addClass('d-none');
				}	
				$.each(data['greyData'], function(index, value) { 
					var res = value.split(":");
					if(select_dt ==  date && id == res[0] && id>=time+6){ 
						$('#'+id).next('label').addClass('disable_time');
						$('#'+id).next('label').removeClass('time_label');
						$('#'+id).next('label').removeClass('d-none');
					} 
					
				});  
	       	} 
	   	});
		/* if(select_dt == date && id<=time+1){
			$('#'+id).next('label').removeClass('time_label');
			$('#'+id).next('label').addClass('d-none');	
		} else {  
			$(this).next('label').addClass('time_label');
			$(this).next('label').removeClass('d-none');
		}   */
	});
	/* $( "form" ).on( "submit", function(e) {
 
		var dataString = $(this).serialize();
		 alert(dataString);
		 alert('<?php echo PAYU_BASE_URL;?>'); 
	
			   	
		$.ajax({
			type: "POST",
			url:'https://test.payu.in/_payment',
			data:dataString,
			success: function () {
			
			}
		});
		e.preventDefault();
	});  */
	 
	$('input:radio').click(function () {
		$('input:radio').next('label').removeClass("checked");
		$('input:radio:checked').next('label').addClass("checked");
	});
	$('#btn-form').on('click', function(e){
		e.preventDefault();
		if (!$('input[type="radio"]').is(":checked")) {
			$('#time-error-msg').text('Please select time for video call');
		} else {
			$('#booking-form').submit();
		}
	});
</script>