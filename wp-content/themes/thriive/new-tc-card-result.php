<?php /* Template Name: New TC tool card result */ 
if (count($_POST)<1) { 
	wp_redirect('/login/');
	exit();
} else {
	$current_user = wp_get_current_user();	
}
include_once get_stylesheet_directory().'/new-header.php'; 
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
		   margin: 10px 385px !important;
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
		font-family: 'Merienda', cursive;
		color: #4f0475;
		font-size: 14px;
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
		font-size: 12px;
	}
	</style>
	<div class="container">
		<div class="text-center mb-3 img-div"><img src="<?php echo get_the_post_thumbnail_url($card->ID); ?>" class="card-img" /></div>
		<h2 style="color:#27265F;"><?php echo $card->post_title; ?></h2>
		<p style="text-align: justify;color:#231F20;">
			<?php if( have_rows('tool',$card->ID) ):
				$is_default = false;
			    while( have_rows('tool',$card->ID) ) : the_row();
			    	if(get_sub_field('issues') != $_GET['i']){
			    		$always = true;
			    	} elseif(get_sub_field('issues') == $_GET['i'] && !empty(get_sub_field('issues_description'))){
			    		$always = false;
			    		while( have_rows('issues_description') ) : the_row();
		    				echo get_sub_field('description');
		    			endwhile;
			    	} elseif(get_sub_field('issues') == $_GET['i'] && empty(get_sub_field('issues_description'))){
			    		$always = false;
			    		$is_default = true;
			    	} 
			    endwhile;
			    if($is_default || $always){
			    	while( have_rows('tool',$card->ID) ) : the_row();
			    		if(get_sub_field('issues') == 'Default card reading'){
				    		if( have_rows('issues_description') ):
				    			while( have_rows('issues_description') ) : the_row();
				    				echo get_sub_field('description');
				    			endwhile;
				    		endif;
				    	}
			    	endwhile;
			    }
			endif; ?>
		</p>
		<div class="text-center"><a href="<?php echo home_url('free-online-tarot-card-reading'); ?>" class="btn btn-primary">Try Another Reading</a></div>
		<div class="row text-center qmaindiv">
			<div class="col-md-12 col-xs-12"><p class="qhead">Did you get your question answered?</p></div>       
		    <div class="col-md-12 col-xs-12">sometimes the online readings are just not enough and what you really need is to talk to a real live person</div>
		    <div class="col-md-12 col-xs-12 mt-3">
			    <a href="<?php echo home_url('talk-to-best-tarot-card-reader-online'); ?>" class="btn btn-primary">Call or Chat <br/>with online tarot card reader now</a>
			</div>
		</div>
	</div>
	<br/><br/><br/>
<?php }
include_once get_stylesheet_directory().'/new-footer.php';  ?>