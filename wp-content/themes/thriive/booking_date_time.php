<?php /* Template Name: Booking Date Time page */ 
get_header(); ?>
<?php 
	if (!is_user_logged_in()) { 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		$username = $current_user->first_name . ' ' . $current_user->last_name;	
	}
	get_header();
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
	background: #4f0475;
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
    margin: 0 26%;
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
	/*background: #4eccc4;*/
	background: #4f0475;
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
@media screen and (max-width: 600px) {
	.date-selection {
	    padding: 10px !important;
	}
	.custom-calendar {
	    margin: 0 !important;
	}
	.custom-calendar li {
	    padding-right: 22px;
	}
}
</style>
<?php
$mypost = get_page_by_path($_GET['q'], '', 'therapist');
$post = get_post($mypost->ID);
setup_postdata( $post );
// $current_date = date('d');
// $current_day = date('N');
// $dt = new DateTime;
// $dt->setISODate($dt->format('o'), $dt->format('W'));
// $year = $dt->format('o');
// $week = $dt->format('W');
?>
<div class="container">
	<!--<h1>Booking Date & Time</h1>-->
	<form method="post" action="<?php echo home_url('payment-details').'?q='.$_GET['q'].'&a='.$_GET['a'].'&t='.$_GET['t'];?>" id="booking-form">
		<div style="margin-bottom: 10%;">
			<!-- <div class="date-selection">
				<h5 class="seltm">Choose Your Slot</h5>
				<ul class="custom-calendar">
					<?php 
					/* do {
					    $html = "<li data-date='".$dt->format('Y-m-d')."' data-week='".$dt->format('N')."'>";
					    if($dt->format('N') < $current_day){
					    	$html .= "<div class='calendar-option disable'>";
					    	$html .= "<div class='cal-day'>".$dt->format('D')."</div>";
					    	$html .= "<div class='cal-date disable-text'>".$dt->format('d')."</div>";
					    	$html .= "</div>";
					    } else if($current_date == $dt->format('d')){
					    	$html .= "<div class='calendar-option'>";
					    	$html .= "<div class='cal-day active_day'>".$dt->format('D')."</div>";
					    	$html .= "<div class='cal-date active_date'>".$dt->format('d')."</div>";
					    	$html .= "</div>";
					    } else {
					    	$html .= "<div class='calendar-option'>";
					    	$html .= "<div class='cal-day'>".$dt->format('D')."</div>";
					    	$html .= "<div class='cal-date'>".$dt->format('d')."</div>";
					    	$html .= "</div>";
					    }
					    $html .= "</li>";
					    $dt->modify('+1 day');
					    echo $html;
					} while ($week == $dt->format('W')); */ ?>
				</ul>
			</div> -->
			<!-- <div mbsc-form>
			    <div class="mbsc-form-group">
			        <div class="mbsc-form-group-title">Choose Your Slot</div>
			        <div id="week"></div>
			    </div>
			</div> -->
			<div class="date-selection">
				<h5 class="seltm">Choose Your Slot</h5>
				<ul class="custom-calendar">
					<?php $i = 1;
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
			<div class="timslt">
				<h5 class="seltm"> Select Time</h5>
				<input type="radio" name="time" id="9" value="09:00:00" style="display: none;" required="required"/><label class="time_label" for="9">9:00 PM</label>
				<input type="radio" name="time" id="10" value="10:00:00" style="display: none;"/><label class="time_label" for="10">10:00 PM</label>
				<input type="radio" name="time" id="11" value="11:00:00" style="display: none;"/><label class="time_label" for="11">11:00 PM</label>
				<input type="radio" name="time" id="12" value="12:00:00" style="display: none;"/><label class="time_label" for="12">12:00 PM</label>
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
		    </div>
		    <div id="time-error-msg" style="color:#e03d2a;"></div>
		    <!-- <div id="bookdate"></div> -->
		    <input type="hidden" name="selected_date" id="selected_date" value="<?php echo date('Y-m-d'); ?>">
		    <input type="hidden" id="tid" value="<?php echo $post->post_author; ?>">
		    <div class="text-center"><input type="submit" id="btn-form" value="Submit" class="login_btn" style="padding: 1% 2%;" /></div>
		</div>
	</form>
</div>
<?php
/*$dt = new DateTime;
$dt->setISODate($dt->format('o'), $dt->format('W'));
$year = $dt->format('o');
$week = $dt->format('W');
?>
<table>
    <tr>
        <td><?php echo $dt->format('F Y'); ?></td>
    </tr>
    <tr>
<?php
do {
    echo "<td>" . $dt->format('D') . "<br>" . $dt->format('d') . "</td>\n";
    $dt->modify('+1 day');
} while ($week == $dt->format('W'));
?>
    </tr>
</table><br/><br/>
<?php */get_footer(); ?>
<script>
	$('.custom-calendar li').on('click',function(e){
		if($('.custom-calendar li .calendar-option div').hasClass('active_day') && $('.custom-calendar li .calendar-option div').hasClass('active_date')){
			$('.custom-calendar li .calendar-option div').removeClass('active_day');
			$('.custom-calendar li .calendar-option div').removeClass('active_date');
		}
		$(this).find('div.cal-day').addClass('active_day');
		$(this).find('div.cal-date').addClass('active_date');
		var selected_date = $(this).attr('data-date');
		$('#selected_date').val(selected_date);
		var select_dt = $('#selected_date').val();
		var tid = $('#tid').val();
		$('input:radio').each(function () {
			var dt = new Date();
			var day = dt.getDate();
			var month = dt.getMonth()+1;
			var date = dt.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
			var time = dt.getHours();
			var id = $(this).attr('id');
			$.ajax({
		       	url: ajax_object.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'checkalreadybooked', 'date': select_dt, 'tid': tid},
			   	success: function (data){
			   		data = $.parseJSON(data);
			   		$.each(data.resData, function(index, value) {
			   			var res = value.split(":");
			   			if(((select_dt == date || select_dt != date) && id == res[0]) || (select_dt == date && id<=time+1)){
						    $('#'+id).next('label').removeClass('time_label');
							$('#'+id).next('label').addClass('disable_time');
						} else if((select_dt == date || select_dt != date) && id != res[0]){
						    $('#'+id).next('label').removeClass('disable_time');
							$('#'+id).next('label').addClass('time_label');
						}  
					});
		       	}
		   	});
			if(select_dt == date && id<=time+1){
				$(this).next('label').removeClass('time_label');
				$(this).next('label').addClass('d-none');
			}  else if(select_dt != date){
				$('input:radio').next('label').removeClass('disable_time');
				$('input:radio').next('label').removeClass('d-none');
				$('input:radio').next('label').addClass('time_label');
			}
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
		$.ajax({
	       	url: ajax_object.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'checkalreadybooked', 'date': select_dt, 'tid': tid},
		   	success: function (data){
		   		data = $.parseJSON(data);
		   		$.each(data.resData, function(index, value) {
		   			var res = value.split(":");
		   			if(select_dt == date && id == res[0]){
					    $('#'+id).next('label').removeClass('time_label');
						$('#'+id).next('label').addClass('disable_time');
					}
				});
	       	}
	   	});
		if(select_dt == date && id<=time+1){
			$(this).next('label').removeClass('time_label');
			$(this).next('label').addClass('d-none');
		} else {
			$(this).next('label').addClass('time_label');
			$(this).next('label').removeClass('d-none');
		}
	});
	$('input:radio').click(function () {
		$('input:radio').next('label').removeClass("checked");
		$('input:radio:checked').next('label').addClass("checked");
	});
	$('#btn-form').on('click', function(e){
		e.preventDefault();
		if (!$('input[type="radio"]').is(":checked")) {
			$('#time-error-msg').text('Please select time for video call');
		} else{
			$('#booking-form').submit();
		}
	});
</script>