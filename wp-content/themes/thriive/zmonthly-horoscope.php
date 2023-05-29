<?php /* Template Name: Monthly-Horoscope	 */ 





include_once get_stylesheet_directory().'/new-header.php'; 
/*
$exp_get = explode('/', $_GET['q']);
$_GET['d'] = $exp_get[0];
$_GET['z'] = $exp_get[1];
*/

$get_query = get_query_var('q');
if(strlen($get_query)>0){
	$_GET['z'] = $get_query;
}


$_GET['d'] = 'monthly-horoscope';

global $wpdb;
	$zod_array = array(
		'aries' => 0,
		'taurus' =>1,
		'gemini' =>2,
		'cancer' =>3,
		'leo' =>4,
		'virgo' =>5,
		'libra' =>6,
		'scorpio' =>7,
		'sagittarius' =>8,
		'capricorn' =>9,
		'aquarius' =>10,
		'pisces' =>11
	);

	$zod_img = array(
		'aries' => 'Aries-Card.jpg',
		'taurus' =>'Taurus-Card.jpg',
		'gemini' =>'Gemini-Card.jpg',
		'cancer' =>'Cancer-Card.jpg',
		'leo' =>'Leo-Card.jpg',
		'virgo' =>'Virgo-Card.jpg',
		'libra' =>'Libra-Card.jpg',
		'scorpio' =>'Scorpio-Card.jpg',
		'sagittarius' =>'Sagitarius-Card.jpg',
		'capricorn' =>'Capricorn-Card.jpg',
		'aquarius' =>'Aquarius-Card.jpg',
		'pisces' =>'Pices-card.jpg'
	);

	$zod_logo_img = array(
		'aries' => 'Aries.jpg',
		'taurus' =>'Taurus.jpg',
		'gemini' =>'Gemini.jpg',
		'cancer' =>'Cancer.jpg',
		'leo' =>'Leo.jpg',
		'virgo' =>'Virgo.jpg',
		'libra' =>'Libra.jpg',
		'scorpio' =>'Scorpio.jpg',
		'sagittarius' =>'Sagitarius.jpg',
		'capricorn' =>'Capricorn.jpg',
		'aquarius' =>'Aquarius.jpg',
		'pisces' =>'Pices.jpg'
	);

	$data_stat = 1;

	


if($_GET['d'] == 'daily-horoscope' AND $_GET['z']){
	$data_stat = 0;
	$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 6202 ORDER BY object_id DESC LIMIT 1";
	$data = $wpdb->get_results($query);
	$zod = get_post_meta($data[0]->object_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs'][0];
	$zod_desc = get_post_meta($data[0]->object_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs_description'][0];
	$post_author = get_post($data[0]->object_id)->post_author;
	$query = "SELECT ID FROM wp_posts WHERE post_author=$post_author AND post_type='therapist'";
	$data1 = $wpdb->get_results($query);
	$author_post_id = $data1[0]->ID;
	$avatar = get_the_post_thumbnail_url($author_post_id, 'thumbnail');
	$post_author = get_user_meta($post_author)['first_name'][0].' '.get_user_meta($post_author)['last_name'][0];
	//print_r($zod_desc);echo '<br> By -> ';
	//print_r($post_author);
			
}else if($_GET['d'] == 'weekly-horoscope' AND $_GET['z']){
	$data_stat = 0;
	$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 6204 ORDER BY object_id DESC LIMIT 1";
	$data = $wpdb->get_results($query);
	$zod = get_post_meta($data[0]->object_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs'][0];
	$zod_desc = get_post_meta($data[0]->object_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs_description'][0];
	$post_author = get_post($data[0]->object_id)->post_author;
	$query = "SELECT ID FROM wp_posts WHERE post_author=$post_author AND post_type='therapist'";
	$data1 = $wpdb->get_results($query);
	$author_post_id = $data1[0]->ID;
	$avatar = get_the_post_thumbnail_url($author_post_id, 'thumbnail');
	$post_author = get_user_meta($post_author)['first_name'][0].' '.get_user_meta($post_author)['last_name'][0];
	//print_r($zod_desc);echo '<br> By -> ';
	//print_r($post_author);
}else if($_GET['d'] == 'monthly-horoscope' AND $_GET['z']){
	$data_stat = 0;
	$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 6203	ORDER BY object_id DESC LIMIT 1";
	$data = $wpdb->get_results($query);
	$zod = get_post_meta($data[0]->object_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs'][0];
	$zod_desc = get_post_meta($data[0]->object_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs_description'][0];
	$post_author = get_post($data[0]->object_id)->post_author;
	$query = "SELECT ID FROM wp_posts WHERE post_author=$post_author AND post_type='therapist'";
	$data1 = $wpdb->get_results($query);
	$author_post_id = $data1[0]->ID;
	$avatar = get_the_post_thumbnail_url($author_post_id, 'thumbnail');
	$post_author = get_user_meta($post_author)['first_name'][0].' '.get_user_meta($post_author)['last_name'][0];
	//print_r($zod_desc);echo '<br> By -> ';
	//print_r($post_author);
}

if($_GET['z']){
	$zod_desc_img = get_site_url().'/wp-content/themes/thriive/horoscope_new/daily-horoscope/'.$zod_img[$_GET['z']];
	$zod_desc_logo = get_site_url().'/wp-content/themes/thriive/horoscope_new/daily-horoscope/'.$zod_logo_img[$_GET['z']];
}


if($_GET['d'] == 'daily-horoscope'){
	$display_catg = 'Daily';
	$daily_catg = 'daily-horoscope/';
}else if($_GET['d'] == 'weekly-horoscope'){
	$display_catg = 'Weekly';
	$daily_catg = 'weekly-horoscope/';
}else if($_GET['d'] == 'monthly-horoscope'){
	$display_catg = 'Monthly';
	$daily_catg = 'monthly-horoscope/';
}else if(count($_GET)<1){
	$display_catg = 'Daily';
	$daily_catg = 'daily-horoscope/';
}else{die('no');}


?>

<div class="daily_horo">

<?php if($data_stat !=0){?>
<div class=zod-list>
		<!--<h1 class="todays_horo_head">Today's Free <?php echo ucwords($display_catg); ?> Horoscope</h1><br>-->
		<h1 class="todays_horo_head">Monthly Tarot Horoscope</h1><br>
		<h6 class="chosse_zodiac">Select a Zodiac Sign</h6><br>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/aries';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aries.svg" id="Aries" value="Aries" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aries</p><p class="zod_dob">3/21 - 4/19</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/taurus';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/taurus.svg" id="Taurus" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Taurus</p><p class="zod_dob">4/20 - 5/20</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/gemini';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/gemini.svg" id="Gemini" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Gemini</p><p class="zod_dob">5/21 - 6/20</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/cancer';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/cancer.svg" id="Cancer" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Cancer</p><p class="zod_dob">6/21 - 7/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/leo';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/leo.svg" id="Leo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Leo</p><p class="zod_dob">7/23 - 8/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/virgo';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/virgo.svg" id="Virgo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Virgo</p><p class="zod_dob">8/23 - 9/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/libra';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/libra.svg" id="Libra" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Libra</p><p class="zod_dob">9/23 - 10/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/scorpio';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/scorpio.svg" id="Scorpio" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Scorpio</p><p class="zod_dob">10/23 - 11/21</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/sagittarius';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/sagittarius.svg" id="Sagittarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Sagittarius</p><p class="zod_dob">11/22 - 12/21</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/capricorn';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/capricorn.svg" id="Capricorn" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Capricorn</p><p class="zod_dob">12/22 - 1/19</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/aquarius';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aquarius.svg" id="Aquarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aquarius</p><p class="zod_dob">1/20 - 2/18	</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/pisces';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/pisces.svg" id="Pisces" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Pisces</p><p class="zod_dob">2/19 - 3/20	</p>	
		</div></a>
	</div>

</div>


	<div class="">
				<p class="zod_dob day_catg" >More Horoscopes - </p><a href="<?php echo get_site_url().'/daily-horoscope/?d=daily';?>"><p class="zod_dob day_catg" >Daily</p></a><a href="<?php echo get_site_url().'/daily-horoscope/?d=weekly';?>"><p class="zod_dob day_catg">Weekly</p></a><a href="<?php echo get_site_url().'/daily-horoscope/?d=monthly';?>"><p class="zod_dob day_catg">Monthly</p></a>
 <div class="seprator mb-3">
  <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div><br>

				<div class="ask_ques_daily">
		<img src="<?php echo get_site_url(); ?>/wp-content/themes/thriive/horoscope_new/daily-horoscope/Question-Mark.jpg" class="question_mark_img">
		<h2 style="display:inline-block;">Ask a Question</h2>
		<h2><b class="expert_tarot_font">To our Expert Tarot Card Reader<b></h2>
		<p></p>
		<button class="btnConsult daily_horo_page_btn" style="margin-bottom: 1rem;" onclick="window.open('<?php echo get_site_url();?>/talk-to-best-astrologer-online?utm_source=monthly-horoscope');">Consult Now</button>
	</div>



	<?php }else{ 

		if($_GET['d'] == 'weekly-horoscope'){
			$next_sunday = date('d-m-y', strtotime('next sunday'));
			$this_sunday = date('d-m-y',strtotime('next sunday')-604800);
			$date_range = $this_sunday.' - '.$next_sunday;
		}else if ($_GET['d'] == 'monthly-horoscope'){
			$date_range = date('F');
		}else if ($_GET['d'] == 'daily-horoscope'){
			$date_range = date('d-M-Y');
		}		

		echo '<div class="zod_desc_cont"><img src="'.$zod_desc_logo.'" class="zod_desc_logo"><h1 class="todays_horo_head"> '.ucwords($display_catg).' '.ucwords($_GET['z']).' Horoscope</h1><br><img src="'.$zod_desc_img.'" class="zod_desc_card"><br><br><pre style="text-align:left;font-family: Work Sans,Rupee_Foradian,sans-serif !important;
    font-size: 18px;white-space: break-spaces;" id="horo_content"><b>'.$date_range.' - </b> '.$zod_desc.'</pre></div>'.'<br><img src="'.$avatar.'" class="post_avatar"><br><br><b> By '.$post_author.'</b>'; ?>
<div class="seprator mb-3">
  <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>
<br>
	<div class="ask_ques_daily">
		<img src="<?php echo get_site_url(); ?>/wp-content/themes/thriive/horoscope_new/daily-horoscope/Question-Mark.jpg" class="question_mark_img">
		<h2 style="display:inline-block;">Ask a Question</h2>
		<h2><b class="expert_tarot_font">To our Expert Tarot Card Reader<b></h2>
		<p></p>
		<button class="btnConsult daily_horo_page_btn" style="margin-bottom: 1rem;" onclick="window.open('<?php echo get_site_url();?>/talk-to-best-astrologer-online?utm_source=monthly-horoscope');">Consult Now</button>
	</div>
<div class="seprator mb-3">
  <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="">
  </div>
<br>

	<div class=zod-list>
		<h4 style="color:#000">Choose the Zodiac Sign</h4><br>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/aries';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aries.svg" id="Aries" value="Aries" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aries</p><p class="zod_dob">3/21 - 4/19</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/taurus';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/taurus.svg" id="Taurus" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Taurus</p><p class="zod_dob">4/20 - 5/20</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/gemini';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/gemini.svg" id="Gemini" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Gemini</p><p class="zod_dob">5/21 - 6/20</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/cancer';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/cancer.svg" id="Cancer" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Cancer</p><p class="zod_dob">6/21 - 7/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/leo';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/leo.svg" id="Leo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Leo</p><p class="zod_dob">7/23 - 8/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/virgo';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/virgo.svg" id="Virgo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Virgo</p><p class="zod_dob">8/23 - 9/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/libra';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/libra.svg" id="Libra" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Libra</p><p class="zod_dob">9/23 - 10/22</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/scorpio';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/scorpio.svg" id="Scorpio" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Scorpio</p><p class="zod_dob">10/23 - 11/21</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/sagittarius';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/sagittarius.svg" id="Sagittarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Sagittarius</p><p class="zod_dob">11/22 - 12/21</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/capricorn';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/capricorn.svg" id="Capricorn" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Capricorn</p><p class="zod_dob">12/22 - 1/19</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/aquarius';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aquarius.svg" id="Aquarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aquarius</p><p class="zod_dob">1/20 - 2/18	</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/pisces';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/pisces.svg" id="Pisces" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Pisces</p><p class="zod_dob">2/19 - 3/20	</p>	
		</div></a>
	</div>

</div>


<script>
var iframe;
for(i=0;i<document.querySelectorAll('iframe').length;i++){
    if(document.querySelectorAll('iframe')[i].width){
    iframe = '<div style="text-align:center !important">'+document.querySelectorAll('iframe')[i].outerHTML+'</div>';
    iframe1 = document.querySelectorAll('iframe')[i];
    iframe1.remove();
    let horo_cont ='<br>'+document.querySelector('#horo_content').innerHTML;
    document.querySelector('#horo_content').innerHTML = iframe +horo_cont+'<br><br>';
}
}
</script>
	<?php }?>	</div>
	<?php include_once get_stylesheet_directory().'/new-footer.php';?>





