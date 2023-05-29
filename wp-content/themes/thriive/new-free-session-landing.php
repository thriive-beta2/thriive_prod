<?php /* Template Name: New Free Session Landing page */ 
include_once get_stylesheet_directory().'/new-header.php'; 
if (is_user_logged_in()) {
	$current_user = wp_get_current_user();
} ?>
<div class="container">
  	<div class="row">
		
			<h1 class="fheading text-center" id="freesessionformheding" >Register For A Trial Session</h1>
		
  		<?php /* $availability = get_field('availability',30227);
  		$temp = array();
		foreach ($availability as $a) {
			$temp1 = array();
			if($a['all_days']){
				foreach($a['time'] as $t){
					array_push($temp1, $t['start_time'].'-'.$t['end_time']);
				}
				$temp['all_days'] = $temp1;
			} else {
				foreach($a['time'] as $t){
					array_push($temp1, $t['start_time'].'-'.$t['end_time']);

				}
				$temp[$a['day']] = $temp1;
			}
			
		} echo '<pre>'; print_r($temp); */ ?>
		<div id="freesessionform">
	  		<form method="POST">
	  			<div class="form-group">
				    <label for="selectailment" class="d-block">Select your Ailment</label>
			    	<select class="form-control" id="selectailment">
			    		<option value="0">Select Ailment</option>
			    		<?php $ailments = get_ailment_by_therapy();
					    foreach ($ailments as $k => $v) { ?>
					      <option value="<?php echo $v->term_id; ?>" data-termname = "<?php echo $v->name; ?>"><?php echo $v->name; ?></option>
					    <?php } ?>
					    <option value="1" data-termname = "Other">Other</option>
			    	</select>
			    </div>
			    <div id="sailment_error" class="text-center" style="color:red;"></div>
		    	<div class="form-group tagrp" style="display: none;">
				    <label for="typeailment" class="tyailment">If not listed, please type your Ailment below</label>
				    <input type="text" class="form-control typailment" name="typeailment" id="typeailment" value="">
				</div>
				<div id="tailment_error" class="text-center" style="color:red;"></div>
				<div class="form-group" id="r_therapies">
					<img src = "<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" class="loader" style="display:none; width: 100px;" id="therapy_loader">
				</div>
				<div class="form-group col-md-12 col-xs-12">
					<h4 class="theading">Select Preferred Therapies </br><span style="font-size:15px;color:#000;font-weight: 400;">(maximum 3)</span></h4>
					<?php if( have_rows('custom_landing','option') ):
						while ( have_rows('custom_landing','option') ) : the_row();
							$selected_taxonomy = get_sub_field('selected_taxonomy');
							$selected_url = get_sub_field('selected_url');
							$term = get_term_by('id', $selected_taxonomy, 'therapy'); ?>
							<div class="col-md-12 col-xs-12 checktherapies">
								<label>
									<input type="checkbox" class="ftherapies" id="<?php echo $term->name; ?>" value="<?php echo $term->name; ?>">
									<p for="<?php echo $term->name; ?>" class="ftname"> <?php echo $term->name; ?></p>
								</label>
		  					</div>
						<?php endwhile;
					endif; ?>
				</div>
				<div id="therapies_error" class="text-center" style="color:red;"></div>
				<div id="freesession_error" class="text-center" style="color:red;"></div>
				<?php if (!is_user_logged_in()) { ?>
					<div class="text-center">
					<input type="button" class="btn btn-primary" id="freesession_register" value="Register Now">
					</div>
				<?php } else { ?>
					<input type="hidden" name="uid" id="uid" value="<?php echo $current_user->ID; ?>">
					<input type="hidden" name="uname" id="uname" value="<?php echo $current_user->first_name.' '.$current_user->last_name; ?>">
					<input type="hidden" name="uemail" id="uemail" value="<?php echo $current_user->user_email; ?>">
					<input type="hidden" name="umobile" id="umobile" value="<?php echo $current_user->mobile; ?>">
					<div class="text-center">
					<input type="button" class="btn btn-primary" id="confirm" value="Confirm">
					</div>
				<?php } ?>
		    </form>
		</div>
		<div id="freesessionthanku" style="display: none;">
		<section class="banner" style="width:100%;">
					 <div class="col-md-12" style="padding: 0px;">
								<img alt="" class="img-responsive banner_image" src="<?php if (is_mobile()) {echo 'https://www.thriive.in/wp-content/uploads/2020/10/Home-Page-Banner-Mobile-806x431-3.png';
				}else{echo 'https://www.thriive.in/wp-content/uploads/2020/10/Home-Page-Banner-Desktop-1280x400-3.jpg';}?>" />

					 </div>
		</section>
			<p class="freethnk">Thank you</p>
			<p class="freemsg">Thank you for registering for free trial session.</p>
			<p class="freemsg">Our team will get in touch with you shortly.</p>
		  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
  
		<div class="row">
		<section id="freeReading" class="widgetblock" style="padding:0px 35px;">
		  <h2 class="wdgt-head mt-2 mb-2 text-center">Free Online Reading</h2>
		  <section class="readinglist">
			<aside class="readingitem tarot">
			  <a href="https://www.thriive.in/free-online-tarot-card-reading">
				<figure>
				  <img alt="" class="" srcset="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot.png';?> 400w, <?php echo get_template_directory_uri() .'/assets/images/newsoulimg/reading-tarot-lg.png'?> 1080w" src="" />
				  <figcaption>Pick a Tarot Card & Get Instant Reading</figcaption> 	 <i><img class="nextfree" src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-next.svg'; ?>"></i>
				</figure>
			  </a>
			</aside>
		  </section>
		</section>
		</div>
			
		</div>
		<div class="tnc">
	    <h4 class="ftnc" id="freesessionformtnc">Terms & Conditions</h4>
	    <ul class="ftncul" id="freesessionformtc">
	    	<li class="ftncli ">This is a free online discussion/session with a therapist*.</li>
			<li class="ftncli ">This session will be for a maximum of a 15-20 mins*.</li>
			<li class="ftncli ">There are limited trial sessions, subject to availability*.</li>
			<li class="ftncli ">Each person can avail only one free trial session*.</li>
		</ul>
		<p class="dtnc" id="dtnc">*For detailed terms & condition <a href="#">click here</a></p>
		</div>
  	</div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?> 
<script type="text/javascript">
	 function getCookie(name){
	    var re = new RegExp(name + "=([^;]+)");
	    var value = re.exec(document.cookie);
	    return (value != null) ? unescape(value[1]) : null;
  	}
	$(document).ready(function() {
	    $('#selectailment').select2();
	    if(getCookie("rfs_ailment_id")){
	    	$('#selectailment').val(getCookie("rfs_ailment_id"));
			$('.select2-selection__rendered').attr('title', getCookie("rfs_s_ailment"));
			$('.select2-selection__rendered').text(getCookie("rfs_s_ailment"));
			if(getCookie("rfs_ailment_id") != "0" && getCookie("rfs_ailment_id") != "1"){
				$.ajax({
				   	url: myajax.ajax_url,
				   	type: 'POST',
				   	data: {'action': 'gettherapy_byailment', 'ailment': getCookie("rfs_ailment_id")},
				   	beforeSend: function () {
						$('#therapy_loader').show();
					},
				   	success: function (data) {
				   		$('#therapy_loader').hide();
				   		$('#r_therapies').html('');
				   		$('#sailment_error').text('');
				   		var jsonObj = JSON.parse(data);
				   		var html = "<img src = 'wp-content/themes/thriive/assets/images/loader.gif' class='loader' style='display:none; width: 100px;' id='therapy_loader'><h4 class='rheading'>Recommended Therapies</h4>";
				   		$.each(jsonObj, function (k, v) {
				   			html += '<p class="rther">'+v+'</p>';
						});
						$('#r_therapies').html(html);
				   	},
				   	complete: function (data) {},
				   	error: function (err) {}
				});
			}
			if(getCookie("rfs_t_ailment")){
				$('.tagrp').css('display','block');
				$('#typeailment').val(getCookie("rfs_t_ailment"));
			}
			if(getCookie("rfs_therapies")){
				$.each(getCookie("rfs_therapies").split(','), function (k, v) {
					$('input:checkbox[id="'+$.trim(v)+'"]').attr('checked',true);
				});
			}
	    } else {
	    	$('#selectailment').val(0);
			$('.select2-selection__rendered').attr('title', 'Select Ailment');
			$('.select2-selection__rendered').text('Select Ailment');
	    }
	});
 	$(".ftherapies:input:checkbox").on('change',function(){
		if ($(".ftherapies:input:checkbox:checked").length > 3){
            this.checked = false;
            window.location.hash = '#therapies_error';
            $('#therapies_error').text("Maximum 3 can be selected.");
        }
 	});
	$('#selectailment').on('change',function(){
		var ailment = $(this).val();
		if(ailment != "0" && ailment != "1"){
			$("input[name=typeailment]").val("");
			$.ajax({
			   	url: myajax.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'gettherapy_byailment', 'ailment': ailment},
			   	beforeSend: function () {
					$('#therapy_loader').show();
				},
			   	success: function (data) {
			   		$('#therapy_loader').hide();
			   		$('#r_therapies').html('');
			   		$('#sailment_error').text('');
			   		var jsonObj = JSON.parse(data);
			   		var html = "<img src = 'wp-content/themes/thriive/assets/images/loader.gif' class='loader' style='display:none; width: 100px;' id='therapy_loader'><h4 class='rheading'>Recommended Therapies</h4>";
			   		$.each(jsonObj, function (k, v) {
			   			html += '<p class="rther">'+v+'</p>';
					});
					$('#r_therapies').html(html);
			   	},
			   	complete: function (data) {},
			   	error: function (err) {}
			});
		} else if(ailment == "1"){ 
			$('.tagrp').css('display','block');
			$('#r_therapies').html('');
		} else {
			$('#r_therapies').html("<img src = 'wp-content/themes/thriive/assets/images/loader.gif' class='loader' style='display:none; width: 100px;' id='therapy_loader'>");
		}
	});
	$('#confirm').on('click',function(){
		var uid = $('#uid').val();
		var uname = $('#uname').val();
		var uemail = $('#uemail').val();
		var umobile = $('#umobile').val();
		var select_id = $('#selectailment').val();
		var select_ailment = $('#selectailment').find(':selected').data('termname');
		var type_ailment = $("#typeailment").val();
		var therapies = $(".ftherapies:checked").map(function() {return this.id;}).toArray().join(", ");
		if(select_id == "0"){
			$('#sailment_error').text('Please select your issue');
		} else {
			$('#sailment_error').text('');
		}
		if(select_id == "1" && type_ailment == ""){
			$('#tailment_error').text('Please enter your issue');
		} else {
			$('#tailment_error').text('');
		}
		if(!$('input[type="checkbox"]').is(":checked")){
			$('#therapies_error').text('Please choose your interested therapies');
		} else {
			$('#therapies_error').text('');
		}
		if((select_id != "0" && select_id != "1" && type_ailment == "" && $('input[type="checkbox"]').is(":checked")) || (select_id == "1" && type_ailment != "" && $('input[type="checkbox"]').is(":checked"))) {
			$.ajax({
			   	url: myajax.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'savefreesession', 'uid': uid, 'uname': uname, 'uemail': uemail, 'umobile': umobile, 'select_ailment': select_ailment, 'type_ailment':type_ailment, 'therapies': therapies},
			   	success: function (data) {
			   		if(document.cookie){
				    	document.cookie='rfs_ailment_id' + "=0";
				    	document.cookie='rfs_s_ailment' + "=Select Ailment";
				    	document.cookie='rfs_t_ailment' + "=";
				    	document.cookie='rfs_therapies' + "=null";
				    }
			   		data = $.parseJSON(data);
			   		if(data.resStatus == "success"){
						location.replace("https://www.thriive.in/thank-you-for-registration-for-free-trial");
			   			/*$('#freesessionform').css('display','none');
			   			$('#freesessionformheding').css('display','none');
			   			$('#freesessionformtnc').css('display','none');
			   			$('#freesessionformtc').css('display','none');
			   			$('#dtnc').css('display','none');
			   			$('#freesessionthanku').css('display','block');*/
			   		}
			   		if(data.resStatus == "error"){
			   			$('#freesession_error').text(data.resMessage);
			   		}
			   	},
			   	complete: function (data) {},
			   	error: function (err) {}
			});
		}
	});
</script>