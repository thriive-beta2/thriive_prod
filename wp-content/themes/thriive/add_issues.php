<?php /* Template Name: Add Issue for therapy */ 
get_header(); ?>

<section>
	<div class="container">
		<h2 class="entry-title w-100 blog-title mt-3 mb-4" id="hide_text">Enter your mobile number to complete your profile.</h2>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 col-xs-12">
				<form data-parsley-validate class="form-element-section" method="post" novalidate>
					<?php wp_nonce_field('add_issues'); ?>
					<div id="hide_mob">
						<div class="col-md-4 input_level">
	                        <h5>Mobile Number *</h5>
	                    </div>
	                    <div class="col-md-8 input_level">
	                    	<div class="input-group">
	                    		<input type="number" class="form-control international-number" name ="mobile" id="mobile" required data-parsley-errors-container="#error_msg" style="border-color: #54515142 !important;" autocomplete="off" />
	                    	</div>
	                    </div>
	                    <div id="error_msg"></div>
	                    <div class="col-md-12 input_level  text-center">
							<input class="login_btn" type="submit" name="check_mobile_no" value="Submit" id="add_issues">
						</div>
					</div>
					<div id="dis_html"></div>
				</form>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</section>
<?php if(isset($ti_msg) || !empty($ti_msg)) { ?>
<div class="modal fade" id="review_msg" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <!-- Modal body -->
            <div class="modal-body w-70">
                <p><?php echo $ti_msg; ?></p>
                <a href="<?php echo get_site_url(); ?>" class="btn d-inline btn-primary">Close</a>
            </div>
        </div>
    </div>
</div>
<script>
    $("#review_msg").modal("show");
</script>
<?php } ?>

<?php get_footer(); ?>