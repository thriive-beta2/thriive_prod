<?php include_once get_stylesheet_directory().'/new-header.php';
$term = get_queried_object();
$ailment_image = get_field("ailment_image","ailment_" . $term->term_id);
$ailment_img = wp_get_attachment_image_src( $ailment_image, 'thumbnail' ); ?>

<style>


	.ailtite{
    color: #F24A50;
    margin-top: -15px;
	}
	.relationship_header_cont{

	}
	.relationship_header_cont h2{
	color: #F5404F;
    font-size: 35px;
    text-align: center;
	}

	.relationship_header_p{
	text-align: center;
    padding: 0px 25px;
    font-weight: 500;
    line-height: 20px;
    font-size: 22px;
	}
	.therapy{
	width: 10rem;
    height: max-content;
    background-color: #CCECE9;
    border-radius: 20px;
    overflow: hidden;
    text-align: center;
    margin-bottom:2rem;
    position: relative;
    min-height: 12rem;
	}
		.therapy table{
	vertical-align: middle;
    text-align: center;
    width: 100%;
    min-height: 3rem;
	}
	.therapy img{
		height:8rem;
	}
	.therapy h5{
    margin-top: 8px;
    margin-bottom: -10px;
    color: #000;
    font-weight: 500;
	}
	.therapies_coll{
	display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
	}

	.lower_bg{
	text-align: center;
    font-size: 16px;
    font-weight: 400;
    height: 2rem;
    background-color: #009C91;
    line-height: 1.9rem;
    color: #fff;
    position: absolute;
    bottom: 0px;
    width: 100%;
	}
	.relation_articles{
		display: block;
	}
	.art_img{
    display: block;
    height: 20rem;
    width: 100%;
    margin: 0 auto;
    border-radius: 20px;
    position:relative;
    overflow: hidden;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
	}
	.art_img p{
	color: #fff;
    font-size: 24px;
    text-align: center;
    position: absolute;
    bottom: 0px;
    margin: 0px !important;
    font-weight: 500;
    width: 100%;
    background: rgba(000,000,000,0.5);
    height: 3rem;
    line-height: 3rem;
	}
	.relation_articles h2{
	font-size: 35px !important;
    color: #000 !important;
    text-align: center !important;
	}
	.art_cont{
    width: 100%;
    text-align: left;
    margin: 0 auto;
    font-size: 20px;
	}
	.abt-section h1{
	color: #F5404F;
    font-size: 35px;
    text-align: center;
	}
	.relation_articles{
    width: 100%;
    margin: 0 auto;
    display: contents;
	}
		.search-articles h3{
		font-size: 35px !important;
    color: #000 !important;
    text-align: center !important;
	}
	.lower_bg a{
		color:#fff;
	}
	.blog_cont{
    display: block;
    width: 46%;
    margin: 0 auto;
	}
		.ref_a{
	background-color: #262561;
    padding: 5px;
    color: #fff;
    border-radius: 5px;
    margin-left: 42%;
    font-size: 15px;
	}
		.author_p{
		color:#ED434A;
		float: left;
		display: inline !important;
		width:100%;
		margin-bottom:30px;
		padding:5px 0px;
	}
		.section{
		margin-top:0px;
		margin-bottom: 0px;
	}





@media only screen and (min-width: 320px) and (max-width: 600px) {

	.ailtite{
	font-size: 26px;
    color: #F24A50;
	}
	.relationship_header_cont{

	}
	.relationship_header_cont h2{
	color: #F5404F;
    font-size: 22px;
    text-align: center;
	}

	.relationship_header_p{
	text-align: center;
    padding: 0px 25px;
    font-weight: 500;
    line-height: 20px;
	}
	.therapy{
    width: 10rem !important;
    height: max-content !important;
    background-color: #CCECE9;
    border-radius: 20px;
    overflow: hidden;
    text-align: center !important;
    margin-bottom: 2rem;
    position: relative;
    min-height: 11rem;
	}
	.therapy table{
	vertical-align: middle;
    text-align: center;
    width: 100%;
    min-height: 3rem;
	}
	.therapy img{
		height:7rem;
		margin-top: -15px;
	}
	.therapy h5{
	margin-top: 8px;
    margin-bottom: -10px;
    color: #000;
    font-weight: 500;
    font-size:16px;
    padding: 6px;
    display: inline-block;

	}
	.therapies_coll{
	display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
	}

	.lower_bg{
	text-align: center;
    font-size: 16px;
    font-weight: 400;
    height: 2rem;
    background-color: #009C91;
    line-height: 1.9rem;
    color: #fff;
    width: 100%;position: absolute;
    bottom: 0px;
    width: 100%;
	
	}
	.lower_bg a{
		color:#fff;
	}
	.relation_articles{
		display: block;
	}
	.art_img{
    display: block;
    height: 10rem;
    width: 100%;
    margin: 0 auto;
    border-radius: 20px;
    position:relative;
    overflow: hidden;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
	}
	.art_img p{
	color: #fff;
    font-size: 14px;
    text-align: center;
    position: absolute;
    bottom: 0px;
    margin: 0px !important;
    width: 100%;
    background: rgba(000,000,000,0.5);
    height: 2rem;
    line-height: 2rem;
	}
	.relation_articles h2{
	font-size: 22px !important;
    color: #000 !important;
    text-align: center !important;
	}
	.art_cont{
	 width: 90%;
    text-align: left;
    margin: 0 auto;
    font-size: 13px;
	}
	.abt-section h1{
	color: #F5404F;
    font-size: 22px;
    text-align: center;
	}
	.relation_articles{
    width: 100%;
    margin: 0 auto;
    display: contents;
	}
	.search-articles h3{
		font-size: 22px !important;
    color: #000 !important;
    text-align: center !important;
	}
	.blog_cont{
    display: block;
    width: 90%;
    margin: 0 auto;
	}
	.section{
		margin-top:0px;
		margin-bottom: 0px;
	}
	.ref_a{
	background-color: #262561;
    padding: 5px;
    color: #fff;
    border-radius: 5px;
    font-size: 15px;
    margin-left: %;

	}
	#read_now_break::after{
		content:"\a";
		white-space: pre;
	}
	.author_p{
		color:#ED434A;
		float: left;
		display: inline !important;
		width:100%;
		margin-bottom:30px;
		padding:5px 0px;
	}


}
</style>










<div class="container">
  	<div class="banner-logo-healing justify-content-center flex-column text-center connect-healer-circle">
		<div class="inner-healer-circle">
			<!--<img title="<?php echo $term->name; ?>" src="<?php echo $ailment_img[0]; ?>" alt="<?php echo $term->name; ?>" >-->
		</div>
	</div>
  	<div>
  		<div class="text-justify">
			<h1 class="w-100 text-center ailtite"><?php echo $term->name; ?></h1>
			<?php if($term->description){ ?>
				<div class="abt-more ">
					<div class="excerpt-content-rm showmore-txt-wrapper">
		            	<?php echo wp_trim_words($term->description,50);?>
		            	<a href="#" class="eclip-more-link">...Read more</a>
		            </div>
		            <div class="readmore-content-wrapper showmore-txt-wrapper">
		            	<?php echo $term->description;?>
		            	<a href="#" class="eclip-more-link">Read less</a>
		            </div>
				</div>
			<?php } ?>
		</div>
  	</div>
  	<div class="row">
  		<div class="seprator my-2" style="padding:10px">
	        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
	    </div>
  	</div>
  	<div class="row">
  		<?php $therapies = get_field("therapies", $term->taxonomy . '_' . $term->term_id);
  		$tempArr = array();
  		if( have_rows('custom_landing','option') ):
  			while ( have_rows('custom_landing','option') ) : the_row();
  				$selected_taxonomy = get_sub_field('selected_taxonomy');
   				$selected_url = get_sub_field('selected_url');
  				foreach($therapies as $therapy){
					if($therapy->term_id == $selected_taxonomy){
						$therapy->custom_link = $selected_url;
						array_push($tempArr, $therapy);
					}		
				}
  			endwhile;
  		endif;
		if($tempArr) {	?>
			<section class="container section transperrent-section related-therapies">
				<div class="text-center section w-70">
					<div class="therapies_coll">
						<?php //$topTwoTherapies = array_slice($therapies, 0, 4);			
						foreach($tempArr as $therapy){
							set_query_var( 'therapy_term', $therapy);
							get_template_part( 'template-parts/new-content-list-therapies');	
						} ?>
					</div>
					<input id="sub_ailment_therapy" type="hidden" value="<?php echo $term->term_id;?>">
					<?php /* if(count($therapies) > 4){ ?>
						<a href="" class="btn btn-primary text-center" id="therapyByAilment_list_loadmore" data-numposts="4" data-page="1" data-taxonomy="therapy" data-parent="<?php echo $term->term_id;?>" data-spage="0">LOAD MORE</a>	
					<?php }*/ ?>
				</div>
			</section>
			<div class="seprator my-2" style="margin-top: -15px !important;">
		        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
		    </div>
		<?php } ?>
	</div>
	
	<div class="row">
		<?php $blogs_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => '-1',
	        'tax_query' => array(
	            array(
	                'taxonomy' => 'ailment',
	                'field' => 'slug',
	                'terms' => $term->slug,
	            ),
	        ),
	    );
	    $blogs = new WP_Query($blogs_args);
	    if($blogs->post_count > 0){ ?>
			<section class="container search-articles w-70">
				<div class="row  section blog-list-section text-center">
					<h3 class="w-100 text-center">Articles For You</h3>		
					<?php if($blogs->have_posts()){ 
					    while($blogs->have_posts()){
						    $blogs->the_post();
						    $image_url = get_the_post_thumbnail_url();
						    //echo $image_url;		
							//get_template_part( 'template-parts/content-list-blog');
					    	?>

					    	<div class="relation_articles">
	<a href="<?php echo the_permalink();?>"><div class="blog_cont">
	<div class="art_img" style="background-image: url(<?php echo $image_url; ?>);">
		<p><?php the_title(); ?></p>
	</div>
	<div class="art_cont">
		<p class="author_p" style=""><n>By </n>  <n style="color:#F24A50"><?php echo ucwords(get_the_author());?></n> <n style="color:#000;"id="read_now_break">| on <?php echo get_the_date( 'd-m-Y' );?></n><br><a href="<?php echo the_permalink();?>" class="ref_a">Read Now</a><br>			
		</p>
	</div>
</div></a>
</div>


					    <?php }
					    wp_reset_postdata();
				    } ?>						
				</div>
			</section>
			<div class="seprator my-2">
		        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_body.svg'; ?>" alt="">
		    </div>
		<?php } ?>
	</div>
</div>
<script id="ailmentTherapies_list" type="text/html">	
	<div class="col-6 text-center">
		<div class="banner-logo">
			<a href="/therapy/{{slug}}"><img src="{{img}}" alt=""></a>
		</div>
		<h5><a href="/therapy/{{slug}}">{{name}}</a></h5>
		<!--<a href="/therapy/{{slug}}" class="btn btn-primary">KNOW MORE</a>-->
	</div>
</script>
<script>
var t_bg = document.querySelectorAll('.therapy');
var l_bg = document.querySelectorAll('.lower_bg');

var t_colors = ['#CCECE9','#D0DBED','#ECE2EB','#D6D8E7'];
var l_colors = ['#009C91','#426FB3','#815394','#424191'];
var col_count = 0;

for(i=0;i<t_bg.length;i++){
    t_bg[i].style.backgroundColor = t_colors[col_count];
    l_bg[i].style.backgroundColor = l_colors[col_count];
    col_count++;
    if(col_count == t_colors.length){
        col_count = 0;
    }
}
</script>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>