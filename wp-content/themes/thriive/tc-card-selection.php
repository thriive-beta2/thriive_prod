<?php /* Template Name: TC tool card selection */
if (!is_user_logged_in()) { 
	wp_redirect('/login/');
	exit();
} else {
	$current_user = wp_get_current_user();	
}
get_header(); ?>
<style type="text/css">
	.scl-card {
		width: 24px;
		border: 1px solid #fff;
	}
	@media only screen and (max-width: 600px) {
	    .mobile_card{
	           padding: 0px !important;
	   }
	}
	@media only screen and (min-width: 600px) {
	    .mobile_card{
	           width: 695px !important;
	   }
	   .scl-card {
	       width: 50px;
	       border: 1px solid #fff;
	   }
	}
	.overlay {
	    position: absolute;
	    left: 0;
	    top: 0;
	    right: 0;
	    bottom: 0;
	    z-index: 2;
	    background-color: rgba(255,255,255,0.8);
	}
	.overlay-content {
	    position: absolute;
	    transform: translateY(-50%);
	    -webkit-transform: translateY(-50%);
	    -ms-transform: translateY(-50%);
	    top: 50%;
	    left: 0;
	    right: 0;
	    text-align: center;
	    color: #555;
	}
</style>
<div class="container mobile_card">
	<form id="form_card_selection" class="form-element-section" action="" method="post">
		<div class="form-group">
	  		<h5 for="card">Please select one card from the deck below</h5>
	  		<!-- <div class="overlay" style="display: none;">
	  			<div class="overlay-content">
	  				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" alt="Loading..." style="width: 50px;">
	  			</div>
	  		</div> -->
	  		<!-- <img src = "<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" class="loader" style="display:none; width: 100px;" id="loader"> -->
	  		<div class="card-selection">
		  		<?php $cards = getTarotCardTool();
		  		foreach($cards as $c){
		  			echo "<input type='radio' id='$c->ID' name='card' value='$c->ID' style='display: none;' />";
		  			echo "<label for='$c->ID'><img src='/wp-content/uploads/2020/09/default.jpg' class='scl-card' /></label>";
		  		} ?>
		  	</div>
		  	<div class="text-center" id="selected_card"></div>
	    	<div id="card_error" style="color:#e03d2a;"></div>
	  	</div>
	  	<input type="hidden" name="uid" id="uid" value="<?php echo $current_user->ID; ?>">
	  	<input type="hidden" name="issue" id="issue" value="<?php echo $_GET['i']; ?>">
	  	<input type="hidden" name="lastid" id="lastid" value="<?php echo $_GET['lid']; ?>">
	  	<input type="hidden" name="selectedcard" id="selectedcard">
	  	<div class="text-center"><input type="button" id="card_shuffle" value="Shuffle" class="btn btn-primary" /><input type="submit" id="tc_tool_submit" name="tc_tool_submit" value="Get My Reading" class="btn btn-primary" /></div>
	</form>
</div>
<br/><br/><br/>
<?php get_footer(); ?>
<script type="text/javascript">
	$(document).on("click", "input[name='card']" , function() {
        var cid = $('input[name="card"]:checked').val();
		$('#selectedcard').val(cid);
		$('#form_card_selection').attr('action', window.location.protocol + "//" + window.location.host + "/card-result?c="+cid);
		$.ajax({
	       	url: ajax_object.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'getcarddetails', 'cid': cid},
	       	success: function (data) {
	       		data = $.parseJSON(data);
	       		$('#card_error').text("");
	       		$('#selected_card').html('<img src="'+data.resData+'" width="80" height="80" />')
	       	}
	    });
    });
	// $('input[name="card"]').click(function () {
		
	// });
	$("#card_shuffle").on('click',function() {
		//$('.overlay').css('display','block');
		$('#selected_card').html("");
		$('#selectedcard').val("");
	    $('.card-selection').load(" .card-selection");
	});
	$('#form_card_selection').on('submit', function(e){
		if($('#selectedcard').val() == ""){
			$('#card_error').text("Please select card");
			return false;
		} else {
			return true
		}
	});
</script>