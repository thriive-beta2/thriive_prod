<?php /* Template Name: Coupon Payment details page */ 
if (!is_user_logged_in()) { 
	wp_redirect('/login/');
	exit();
}
$current_user = wp_get_current_user();
include_once get_stylesheet_directory().'/header1.php'; ?>
<style>
    .f_12 {
        font-size: 12px;
    }

    .f_8 {
        font-size: 8px;
    }

    .f_10 {
        font-size: 10px;
    }

    .text_red {
        color: red;
    }

    .text_line {
        text-decoration: line-through;
        color: #b5a8a8;
		font-weight:700;
    }

    .popular_btn {
        background-color: #e51212;
        color: #fff;
        border-radius: 10px;
        margin-left: -14px;
        margin-right: -14px;
		margin-bottom: 7px;
		font-size: 15px !important;
		font-weight: 600;
    }

    .text_box {
        background-color: #fff;
        border: 1px solid #f2f2f2;
        padding: 10px 5px;
        height: 100px;
        margin-bottom: 15%;
        border-radius: 10px;
        box-shadow: 1px 1px 4px #0000000d;
    }

    .head_text {
        padding: 0px 5px;
    }
    h4 {
		font-size: 18px;
	    color: #000;
	    font-family: Calibri;
	}
	h5 {
		font-size: 15px;
	    color: #000;
	    font-family: Calibri;
	}
	@media only screen and (max-width: 600px) {
		h4 {
			font-size: 16px;
		    color: #000;
		    font-family: Calibri;
		}
		h5 {
			font-size: 14px;
		    color: #000;
		    font-family: Calibri;
		}
		.ocpackage{
			padding-left:0px !important; padding-right:0px !important;
		}
		.mostp{margin-bottom:-7% !important;z-index:1;}
		
    }
	
	
	@media only screen and (min-width: 620px) {
	.popular_btn { margin-left: 110px !important;       margin-right: 110px  !important; }
		}
	
	   @media screen and (max-width: 480px) {
		.blob {
            background: #f3f3f3;
            border-radius: 50%;
            height: 48px;
            width: 20px;
			box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
            transform: scale(1);
            animation: pulse 2s infinite;
        }
		.mostp{margin-bottom:-7% !important;z-index:1;}
	}
	
	.input_class{
    	line-height: 1.5;
	    border: 1px solid #ced4da;
	    border-radius: .25rem;
	    padding: .375rem .75rem;
    }
	
	.btn-success{
		border-radius: 10px;
	}
	
	.pdesc{margin: 0px;font-size:15px;font-family:Calibri;font-weight: 600;line-height: 1.2;color:#656565;}
	.pdescs{color:#000;font-size:20px;font-family:Calibri;font-weight: 700;margin-top: 10px;margin-bottom: 0px;}
	.pdescss{color:#6565656e;font-size:13px;font-family:Calibri;font-weight: 700;margin-top: 0px;}
	
	input.btn.btn-success.qc{margin:3%;}
	
	
	.blob {
	background: #f3f3f3;
	border-radius: 50%;
	box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
	transform: scale(1);
	animation: pulse 2s infinite;
}

@keyframes pulse {
	0% {
		transform: scale(0.95);
		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
	}

	70% {
		transform: scale(1);
		box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
	}

	100% {
		transform: scale(0.95);
		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
	}
}	

.mostp{margin-bottom:-2%;z-index:1;}
	

</style>

<?php if($current_user->roles[0] == 'subscriber'){
	$slug = $_GET['q'];
	$action = $_GET['a'];
	$therapy = $_GET['t'];
	$mypost = get_page_by_path($_GET['q'], '', 'therapist');
	$post = get_post($mypost->ID);
	setup_postdata( $post ); 
	if($action == "video_call"){
		$date_time = $_POST['selected_date'].'_'.$_POST['time'];
	} else {
		$date_time = "";
	} ?>
	<section>
        <div class="container ocpackage">
            <div class="">
            	<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="back-btn" style="display:none;"> < BACK </a>
                <div class="box_c col-md-12">
                    <h2 class="text-center" style="font-size:25px; font-family:Calibri !important;margin-bottom:0px;font-weight: 600; color:#4f0475 ;margin-bottom:10px;"><i class="fa fa-check-circle" style="font-size:23px;color:#f9b031"></i>Pick Your plan</h2>
				   <div style="clear:both"></div>
					<p class="text-center pdescs">100% Money Back Guarantee</p>
					<p class="text-center pdescss">If you are not satisfied, Get 100% of your money back!</p>
					<?php if( have_rows('coupon_prices','option') ):
					 	// loop through the rows of data
					    while ( have_rows('coupon_prices','option') ) : the_row();
					    	$temparr = array();
					    	foreach(get_sub_field('therapy') as $t){
					    		array_push($temparr,get_sub_field('custom_therapy'));
					    		array_push($temparr, $t->slug);
					    	}
					    	if(in_array($therapy, $temparr)){
					    		foreach(get_sub_field('package_details') as $call){ 
					    			echo "<form method='post' action='".PAYU_BASE_URL."'>";
					    			$hash_string = '';
									$posted = array();
									$posted['key'] = MERCHANT_KEY;
									$posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20); 
									$posted['amount'] = $call['discount_price'];
									$posted['firstname'] = $current_user->first_name != "" ? $current_user->first_name : $current_user->user_email;
									$posted['email'] = $current_user->user_email; 
									$posted['phone'] = $current_user->mobile; 
									$posted['productinfo'] = $therapy;
									$posted['udf1'] = $call['title'];
									$posted['udf2'] = $call['discount_percent'];
									$posted['udf3'] = $slug;
									$posted['udf4'] = get_field('coupon_code','option');
									$posted['udf5'] = $date_time;
									$hash = '';
									$hashVarsSeq = explode('|', HASH_SEQUENCE);
									foreach($hashVarsSeq as $hash_var) {
								    	$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
										$hash_string .= '|';
									}
									$hash_string .= SALT;
									$hash = strtolower(hash('sha512', $hash_string)); ?>
								
									<?php if($call['is_popular']){ ?>
											<div class="col-md-3 col-xs-1"></div>
							    			<div class="col-md-6 col-xs-10 mostp" style="">
					                            <p class="text-center popular_btn">HURRY UP!! Last Few Mins Left</p>
					                        </div>
											<div class="col-md-3 col-xs-1"></div>
											<div style="clear:both"></div>
					                <?php } ?>
									<div class="col-xs-12 col-md-4"></div>
						    		<div class="col-xs-12 col-md-4" style="margin-top:10px;">
						    			
				                        <div class="text_box" style="<?php if($call['title'] == "20 mins Love Relationship Consult"){echo "height:120px !important;";} ?>">
				                            <div class="head_text">
				                                <div class="row">
				                                   <?php if($call['title']){ ?>
					                                    <div class="col-md-9 col-xs-9">
					                                        <h4 class="text-left"><strong><?php echo $call['title']; ?></strong></h4>
					                                    </div>
				                                    <?php }
				                                    if($call['discount_price']){ ?>
					                                    <div class="col-md-3 col-xs-3">
					                                        <h5><strong>&#8377; <?php echo $call['discount_price']; ?></strong></h5>
					                                    </div>
				                                    <?php } 
				                                    if($call['description']){ ?>
					                                    <div class="col-md-9 col-xs-9">
					                                    	<?php // if($therapy == 'all-page' || $therapy == 'cosmic-astrology' || $therapy == 'numerology' || $therapy == 'tarot-card-reading' || $therapy == 'angel-reading'){ ?>
					                                        	<h5 class="text-left text_red" style="font-weight: 600;"><strong><?php echo $call['description']; ?></strong></h5>
					                                        <?php /* } if($therapy == 'counseling-consulting' || $therapy == 'life-coach' || $therapy == 'meditation'){ ?>
					                                        	<h5 class="text-left text_red"><strong><?php echo $call['discount_percent']." mins per session"; ?></strong></h5>
					                                        <?php }*/ ?>
					                                    </div>
					                                <?php }
					                                if($call['price']){ ?>
					                                    <div class="col-md-3 col-xs-3">
					                                        <h5 class="text_line">&#8377; <?php echo $call['price']; ?></h5>
					                                    </div>
					                                <?php } ?>
				                                </div>
				                                <div style="clear:both"></div>
				                                <div>
				                                	<div>
				                                		<div class="text-center">
				                                        	<input type="hidden" name="key" value="<?php echo MERCHANT_KEY; ?>" />
															<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
															<input type="hidden" name="txnid" value="<?php echo (empty($posted['txnid'])) ? '' : $posted['txnid']  ?>" /> 
															<input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
															<input type="hidden" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
															<input type="hidden" name="email"  value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
															<input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
															<input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"/>
															<input type="hidden" name="surl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&a='.$action.'&t='.$therapy;?>" />   
															<input type="hidden" name="furl" value="<?php echo OC_PAYU_RETURN_URL.'?q='.$slug.'&a='.$action.'&t='.$therapy;?>" />
															<input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
															<input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
															<input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
															<input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
															<input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
															<?php  echo "<td><input type='submit' name='pay_online_consultation' class='btn btn-success qc' value='Select Plan'></td>";?>
		                                        		</div>
				                            		</div>
				                        		</div>
				                            </div>
				                        </div>
				                    </div>
									<div class="col-xs-12 col-md-4"></div>	
									<div style="clear:both"></div>
				                <?php echo "</form>";
				            	}
					        }
				        endwhile; 
				    endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<div style="clear: both; margin-bottom: 10%;"></div>
<?php include_once get_stylesheet_directory().'/footer1.php'; ?>