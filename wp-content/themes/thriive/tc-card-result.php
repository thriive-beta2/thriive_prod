<?php /* Template Name: TC tool card result */ 
if (!is_user_logged_in()) { 
	wp_redirect('/login/');
	exit();
} else {
	$current_user = wp_get_current_user();	
}
get_header(); 
if($_GET['c']){
	$card = get_post($_GET['c']); ?>
<style type="text/css">
	.card-img{
		width: 200px; 
		height: 300px;
	}
	.img-div{
		border: 1px solid #ccc;
		margin: 10px 55px;
		padding: 10px;
		border-radius: 10px;
	}
@media only screen and (min-width: 620px) {
	.img-div {
		   border: 1px solid #ccc;
		   margin: 10px 444px !important;
		   padding: 10px;
		   border-radius: 10px;
	   }
	}
	.qmaindiv{
		border: 1px solid #ccc;
		border-radius: 15px;
		padding: 15px;
		margin: 10px 0px;
	}
	.qhead{
		color: #27265F;
		font-size: 18px;
		font-family: 'Work Sans', san-serif;
		text-align:center;
		font-weight: 600;
	}
	.btn-primary{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 16px;
	}
	.btn-primary-box{
		color: #FFFFFF !important;
		background:#27265F !important;
		border: 1px solid #27265F;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	.btn-primary-box1{
		color: #27265F !important;
		background:#FFFFFF !important;
		border: 1px solid #27265F;
		padding: 6px 40px !important;
		box-shadow:0px 2px 2px 2px #0000004a;
		border-top-right-radius: 15px !important;
		border-bottom-left-radius: 15px !important;
		font-family:'Work Sans', san-serif;
		font-weight: 600;
		border-radius:0px;
		font-size: 14px;
	}
	
</style>
	<div class="container">
		<div class="text-center mb-3 img-div"><img src="<?php echo get_the_post_thumbnail_url($card->ID); ?>" class="card-img" /></div>
		<h2 style="color:#27265F;font-family: 'Work Sans', san-serif;"><?php echo $card->post_title; ?></h2>
		<p style="text-align: justify;color:#231F20;"><?php if( have_rows('tool',$card->ID) ):
		    while( have_rows('tool',$card->ID) ) : the_row();
		    	// if(get_sub_field('issues') == $_GET['i']){
		    	// 	echo get_sub_field('issues_description');
		    	// } else 
		    	if(get_sub_field('issues') == 'Default card reading'){
		    		if( have_rows('issues_description') ):
		    			while( have_rows('issues_description') ) : the_row();
		    				echo get_sub_field('description');
		    			endwhile;
		    		endif;
		    	}
		    endwhile;
		endif; ?></p>
		<div class="text-center"><a href="<?php echo home_url('free-online-tarot-card-reading'); ?>" class="btn btn-primary">Try Another Reading</a></div>
		<div class="row qmaindiv text-center">
			<div class="col-md-12 col-xs-12"><p class="qhead">Speak To A Tarot Professional Now</p></div>       
		    <div class="col-md-12 col-xs-12" style="font-size: 14px;color:#231F20;font-family: 'Work Sans', san-serif;">Sometimes the online readings are just not enough and what you really need is to talk to a real live person.</div>
		    <div class="col-md-4"></div>
			<div class="col-md-2 col-xs-6 mt-3">
			   <a href="<?php echo home_url('talk-to-best-tarot-card-reader-online'); ?>" class="btn btn-primary-box">Call Now</a>
			</div>
			<div class="col-md-2 col-xs-6 mt-3">
				<a href="<?php echo home_url('talk-to-best-tarot-card-reader-online'); ?>" class="btn btn-primary-box1">Chat Now</a>
			</div>
			<div class="col-md-4"></div>
			
		</div>
	</div>
	<br/><br/><br/>
<?php }
get_footer(); ?>