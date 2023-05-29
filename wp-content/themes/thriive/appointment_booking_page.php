<?php /* Template Name: Appointment Booking Page */ 
include_once get_stylesheet_directory().'/new-header.php';
 
global $wp;
global $wpdb;
if (!is_user_logged_in()) { 
	wp_redirect('/login/');
	exit();
} else {
	$current_user = wp_get_current_user();
	$username = $current_user->first_name . ' ' . $current_user->last_name;	
}
if(have_rows('therapist_data', 'option')):
	while(have_rows('therapist_data', 'option')): the_row();
		if($_GET['c'] ==  get_sub_field('taxonomy')->slug){
			$ids = get_sub_field('display_ids');  
		}
	endwhile;
endif;
$idarr = explode(",",$ids);
$idarr[] = 77786;
$idarr[] = 30227; 
$mypost = get_page_by_path($_GET['q'], '', 'therapist');
if(!in_array($mypost->ID,$idarr)){
	
	exit();
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
	/* font-family: Roboto; */
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
    height: 150px;
    margin: 0px auto;
    overflow: scroll;
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
/* .login_btn{
		padding: 1% 5%;
} */
@media screen and (max-width: 600px) {
	.date-selection {
	    padding: 10px !important;
		height: 100px;
	}
	.custom-calendar {
	    margin: 0px 0px 0px -23px !important
	}
	.custom-calendar li {
	    padding-right: 19px;
	}
	/* .login_btn{
		padding: 2% 10%;
	} */
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
<link href="<?php echo get_template_directory_uri();?>/assets/css/mobiscroll.javascript.min.css" rel="stylesheet" />
<script src="<?php echo get_template_directory_uri();?>/assets/js/mobiscroll.javascript.min.js"></script>
<!--<button onclick="goBack()" style="margin: 0px 20px 0px; background: none;border: none;"> < Back</button>
<script>
function goBack() {
  window.location.href='<?php echo site_url();?>/sex-therapy-appointment-page';
}
</script>--> 
<div class="container" style="min-height: 600px;">
	<!--<h1>Booking Date & Time</h1>-->
	<form method='post' action='<?php echo site_url();?>/appointment-summary-sex-therapy'>
	
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
						$i++;
					} while($i <= 100);  ?>
				
				<!--<div id="demo-1-week"></div>-->
				</ul>
			</div>
			<script>
			
		/* mobiscroll.setOptions({
					theme: 'ios',
					themeVariant: 'light'
				});

			var customCal =	mobiscroll.datepicker('#demo-1-week', {
					controls: ['calendar'],
					min: new Date('<?php echo date("Y-m-d");?>'),
					display: 'inline',
					calendarType: 'week',
					calendarSize: 1
				});

 */				
			</script>
			<p style="text-align:center;margin-top:30px;">
				<img src="<?php echo get_template_directory_uri() .'/assets/images/loader.gif'; ?>" id="tarotloader" style="display:none;width:125px;"/>
			</p>
			<div class="timslt">
				
		    </div>
		    <div id="time-error-msg" style="color:#e03d2a;"></div>
		    <input type="hidden" name="selected_date" id="selected_date" value="<?php echo date('Y-m-d'); ?>">
			<input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$_GET['q'].'&a='.$_GET['a'].'&t='.$_GET['t'];?>" />
			
			<input type="hidden" name="therapyname" id="therapy" value="<?php echo $_GET['c']; ?>">
			<input type="hidden" name="therapistname"  id="therapist" value="<?php echo $_GET['q']; ?>">
			<input type="hidden" name="actionvia"  id="action" value="<?php echo $_GET['a']; ?>">
			<input type="hidden" name="amount"   value="<?php echo $appointment_cost; ?>">
			<input type="hidden" name="a" value="<?php echo $_GET['action']; ?>">
		    <input type="hidden"  id="tid" value="<?php echo $post->post_author; ?>">
		    <div class="text-center"><input type="submit"  id="appsubmit" value="Submit" class="login_btn" style="display:none;padding: 2% 7% !important;font-size: 15px;" /></div>
		</div>
	</form>
</div>
<?php
//}
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
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php 
include_once get_stylesheet_directory().'/new-footer.php';
?>

<script>
var select_dt = $('#selected_date').val();
var tid = $('#tid').val();

$("input[name='udf5']").val('<?php echo date("Y-m-d");?>');
	$('.custom-calendar li').on('click',function(e){
		$('#appsubmit').css('display','none');
		if($('.custom-calendar li .calendar-option div').hasClass('active_day') && $('.custom-calendar li .calendar-option div').hasClass('active_date')){
			$('.custom-calendar li .calendar-option div').removeClass('active_day');
			$('.custom-calendar li .calendar-option div').removeClass('active_date');
		}
		$(this).find('div.cal-day').addClass('active_day');
		$(this).find('div.cal-date').addClass('active_date');
		var selected_date = $(this).attr('data-date'); 
	/* 	var dateObj = customCal.getVal();
		var month = dateObj.getMonth() + 1; //months from 1-12
		var day = dateObj.getDate();
		var year = dateObj.getFullYear();

		
		var newdate = year + "-" + month + "-" + day; */
		//alert(newdate);
		$('#selected_date').val(selected_date);
		$("input[name='udf5']").val(selected_date);
		$('#bookdate').val(selected_date);
		var select_dt = $('#selected_date').val();
		var tid = $('#tid').val();
		//$('#noslot').addClass('d-none');
		var flag=0;	
		var currentRequest = null; 
			$('#tarotloader').show();
			$('.timslt').html('');
		
			currentRequest = $.ajax({ 
				url: '<?php echo site_url();?>/appointment-date',
				type: 'POST',
				dataType : 'html',
				data: {'date': select_dt, 'tid': tid},
				beforeSend : function() {           
					if(currentRequest != null) {
						currentRequest.abort();
					}
				},
				success: function (data) {
				
					$('#tarotloader').hide();
					$('.timslt').html(data);
					var newdata = data.trim();
					if(newdata != 'No Slots Available'){
						$('#appsubmit').css('display','flex');
					} else {
						$('#appsubmit').css('display','none');
					}	
					
				}
			}); 
		
	});
	  
	
	
		var currentRequest = null;  
		
	
		$('#tarotloader').show();
		$('.timslt').html('');
			
		currentRequest = $.ajax({ 
			url: '<?php echo site_url();?>/appointment-date',
			type: 'POST',
			dataType : 'html',
			data: {'date': select_dt, 'tid': tid},
			beforeSend : function() {           
				if(currentRequest != null) {
					currentRequest.abort();
				}
			},
			success: function (data) {
				console.log(data);
				$('#tarotloader').hide();
				$('.timslt').html(data);
				var newdata = data.trim();
				if(newdata != 'No Slots Available'){
					$('#appsubmit').css('display','flex');
				} else {
					$('#appsubmit').css('display','none');
				}	
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
		} else {
			$('#booking-form').submit();
		}
	});
</script>

