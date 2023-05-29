<?php /* Template Name: New Tarot card reader tool */
include_once get_stylesheet_directory().'/new-header.php';  ?>
<style type="text/css">
@media only screen and (min-width: 767px) and (max-width: 2000px) {
	.btn-primary{
		color: #27265F !important;
		background:#DEDEDE !important;
		padding: 5px 55px;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		border:1px solid #DEDEDE;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
	}
	
	.btn-primary-shuffle{
		color: #27265F !important;
		background:#DEDEDE !important;
		padding: 5px 55px;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		border:1px solid #DEDEDE;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
	}
	
	.btn-primary:hover{
		color: #27265F !important;
	}
	.cardimg{
		width:50%
	}
	.scl-card {
    	width: 50px !important;
       	border: 1px solid #fff;
		box-shadow: 0px 1px 2px 2px #d6d0d0;
		border-radius: 5px;
   	}
   	.mobile_card{
	    width: 695px !important;
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
	.btn-primary-start{
		color: #fff !important;
		background:#27265F !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		padding: 6px 35px;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 500;
		font-size: 16px;
	}
	.tttitle{
		text-align: center;
		font-size: 20px;
		font-weight: 500;
		color:#27265F;
		font-family:'Work Sans', san-serif;
	}
	.ttdesc{
		font-size: 14px;
		font-weight: 500;
		color:#231F20;
		font-family:'Work Sans', san-serif;
		text-align: center;
	}
}	

@media only screen and (min-width: 375px) and (max-width: 480px) {
	
    .scl-card {
	   width: 25px !important;
	   border: 1px solid #fff;
	   box-shadow: 0px 1px 2px 2px #d6d0d0;
	   border-radius: 5px;
    }
    .btn-primary-start{
		color: #fff !important;
		background:#27265F !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		padding: 6px 18px !important;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 500;
		font-size: 16px;
	}
		
	.btn-primary{
		color: #27265F !important;
		background:#DEDEDE !important;
		border: 1px solid #DEDEDE;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
	}
	.btn-primary-shuffle{
		color: #27265F !important;
		background:#DEDEDE !important;
		border: 1px solid #DEDEDE;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
	}
	
	.tttitle
		{
		text-align: center;
		font-size: 20px;
		font-weight: 500;
		color:#27265F;
		font-family:'Work Sans', san-serif;
		padding-top: 15px;
	}
	.ttdesc{
		font-size: 14px;
		font-weight: 500;
		color:#231F20;
		font-family:'Work Sans', san-serif;
	}
		.cardimg{
			width:100%
		}
	}

@media only screen and (min-width: 320px) and (max-width: 480px) {
	.scl-card {
		width: 24px;
		border: 1px solid #fff;
		box-shadow: 0px 1px 2px 2px #d6d0d0;
		border-radius: 5px;
	}
	.mobile_card{
		width: 100% !important;
	}
	.btn-primary-start{
		color: #fff !important;
		background:#27265F !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		padding: 6px 18px;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 500;
		font-size: 16px;
	}
		
	.btn-primary{
		color: #27265F !important;
		background:#DEDEDE !important;
		border: 1px solid #DEDEDE;
		padding: 8px 40px;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
	}
	.btn-primary-shuffle{
		color: #27265F !important;
		background:#DEDEDE !important;
		border: 1px solid #DEDEDE;
		padding: 6px 40px;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
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
	.tttitle{
		text-align: center;
		font-size: 20px;
		font-weight: 600;
		color:#27265F;
		font-family:'Work Sans', san-serif;
		padding-top: 15px;
	}
		
	.ttdesc{
		font-size: 14px;
		font-weight: 500;
		color:#231F20;
		font-family:'Work Sans', san-serif;
	}
}
</style>

<div class="container">
	<h3 class="tttitle">Free Online Daily Tarot Reading</h3>
	<p class="ttdesc">Starting each day with this Tarot reading is a terrific way to get psyched for all the possibilities - and avoid possible pitfalls. Get your reading and have a great day!</p>
</div>
<div class="container mobile_card">
	<?php if (is_user_logged_in()) { ?>
		<!-- <a href="<?php echo home_url('tc-tool-get-details'); ?>"><img class="cardimg" src="/wp-content/uploads/2020/09/card-bg.jpg"></a></br></br> -->
		<div class="overlay d-none">
  			<div class="overlay-content">
  				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" alt="Loading..." style="width: 50px;">
  			</div>
  		</div>
		<div class="card-selection text-center">
	  		<?php $cards = getTarotCardTool();
	  		foreach($cards as $c){
	  			$url = home_url('tc-tool-get-details');
	  			echo "<input type='radio' id='$c->ID' name='card' value='$c->ID' style='display: none;' />";
	  			echo "<label for='$c->ID'><a href='$url'><img src='/wp-content/uploads/2020/09/tarottollbackground-1.png' class='scl-card'/></a></label>";
	  		} ?>
	  	</div>
		<div class="text-center" style="margin-top:10px">
			<input type="button" id="card_shuffle" value="Shuffle" class="btn btn-primary" style="margin-right: 10px;"/>
			<a href="<?php echo home_url('tc-tool-get-details'); ?>" class="btn btn-primary-start">Start Reading</a>
		</div>
	<?php } ?>
	<?php if (!is_user_logged_in()) { ?>
		<!-- <a href="<?php echo home_url('tc-tool-get-details'); ?>"><img class="cardimg" src="/wp-content/uploads/2020/09/card-bg.jpg"></a></br></br> -->
		<div class="overlay d-none">
  			<div class="overlay-content">
  				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" alt="Loading..." style="width: 50px;">
  			</div>
  		</div>
		<div class="card-selection text-center">
	  		<?php $cards = getTarotCardTool();
	  		foreach($cards as $c){
	  			$url = home_url('tc-tool-get-details');
	  			echo "<input type='radio' id='$c->ID' name='card' value='$c->ID' style='display: none;' />";
	  			echo "<label for='$c->ID'><a href='$url'><img src='/wp-content/uploads/2020/09/tarottollbackground-1.png' class='scl-card'/></a></label>";
	  		} ?>
	  	</div>
		<div class="text-center" style="margin-top:10px">
			<input type="button" id="card_shuffle" value="Shuffle" class="btn btn-primary" style="margin-right: 10px;"/>
			<a href="<?php echo home_url('tc-tool-get-details'); ?>" class="btn btn-primary-start">Start Reading</a>
		</div>
	<?php } ?>
</div>
  <div class="seprator mb-3">
  	<img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>

	<div class="ask-ques">
		<h2>Ask a question</h2>
		<p>To our expert Tarot Card Reader</p>
		<button class="btnConsult" style="margin-bottom: 1rem;" onclick="window.open('https://www.thriive.in/talk-to-best-tarot-card-reader-online?utm_source=tarot-tool');">Consult Now</button>
	</div>
<br/><br/><br/>
<script type="text/javascript">
	$("#card_shuffle").on('click',function() {
		$(".overlay").removeClass("d-none");
		setTimeout(function() {
            $(".overlay").addClass("d-none");
        }, 3000);
	    $('.card-selection').load(" .card-selection");
	});
</script>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>