<?php /* Template Name: Daily-Horoscope	 */ 

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


$_GET['d'] = 'daily-horoscope';

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

	$zod_name_w_date = array(
		'aries' => 'Aries (Mar/21 - Apr/19)',
		'taurus' =>'Taurus (Apr/20 - May/20)',
		'gemini' =>'Gemini(May/21 - Jun/20)',
		'cancer' =>'Cancer(Jun/21 - Jul/22)',
		'leo' =>'Leo(Jul/23 - Aug/22)',
		'virgo' =>'Virgo(Aug/23 - Sep/22)',
		'libra' =>'Libra(Sep/23 - Oct-22)',
		'scorpio' =>'Scorpio(Oct/23 - Nov/21)',
		'sagittarius' =>'Sagittarius(Nov/22 - Dec/21)',
		'capricorn' =>'Capricorn(Dec/22 - Jan/19)',
		'aquarius' =>'Aquarius(Jan/20 - Feb/18)',
		'pisces' =>'Pisces(Feb/19 - Mar/20)'
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

	$horo_desc = array(
	'aries' => "Ariens love to be on top, and it's no surprise that these competitive killers are first in line in the zodiac. Daring and determined, individuals from this group are always up for an impromptu challenge.",
	'taurus' => "Taurians, like their cosmic spirit animal, enjoy blowing off steam in calm, serene environments, surrounded by tranquil sounds, relaxing aromas, and scrumptious flavours. ",
	'gemini' => "Like their celestial spirit animal, Geminians are known to possess dual personalities. This duality represents an exchange of ideas, interaction, communication, and trade. Showcasing utmost adaptility; these individuals are open to dabbling in several different disciplines.",
	'cancer' => "Represented by a mighty crab, Cancerians have the innate ability to exist both in emotional and material realms. Being extremely self-aware, this sign is known to be able to read and absorb the energy of a room in an instant.",
	'leo' => "Famously referred to as kings and queens of the celestial jungle, Leos showcase passion and courage of conviction towards any task they put their minds to. Plus, these individuals are always open to basking in the spotlight when celebrating their own achievements.",
	'virgo' => "Virgoans are the epitome of logic, perfection, and practicality. Known to pave a systematic life approach with diligence and consistency, these individuals, represented by the goddess of wheat and agriculture, aren't afraid of hard work and failure.",
	'libra' => "Librans, intriguingly enough, are represented by the only inanimate object in the zodiac. This sign's ability to create balance, harmony, symmetry, and equilibrium in every aspect of their lives is a rare gift.",
	'scorpio' => `Scorpions are one of the most misunderstood signs in the zodiac. 
Holding enormous passion and might, these "water warriors" derive their strength, confidence, and ambition from the psychic realm. `,
	'sagittarius' => "Sons and daughters of an archer, Sagittarians are always on the quest for knowledge, education, and a chance to change the world. Individuals from this group are known to undertake several successful pursuits during their lifetime.",
	'capricorn' => "Capricorns, represented by a mythical sea-goat, is the last earth sign in the zodiac. Individuals born under this sign are patient, responsible, trustworthy, and extremely well-versed when it comes to navigating their emotional feelings.",
	'aquarius' => "Aquarians, represented by a cosmic healer, are exceptionally future-oriented. These visionaries are intelligent, innovative, and aren't afraid to think outside the box.",
	'pisces' => "Pisces, represented by two fish swimming in opposite directions, is the last constellation in the zodiac. Individuals born under this group are extremely imaginative, often being caught up between fantasy and reality."
);



	


if($_GET['d'] == 'daily-horoscope' AND $_GET['z']){
	$data_stat = 0;
	$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 6202 ORDER BY object_id DESC LIMIT 30";
	$data = $wpdb->get_results($query);
	foreach($data as $key){
		if(get_post_status($key->object_id) == 'publish'){
			$post_id = $key->object_id;
			break;
		}
	}
	$zod = get_post_meta($post_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs'][0];
	$zod_desc = get_post_meta($post_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs_description'][0];
	$post_author = get_post($post_id)->post_author;
	$query = "SELECT ID FROM wp_posts WHERE post_author=$post_author AND post_type='therapist'";
	$data1 = $wpdb->get_results($query);
	$author_post_id = $data1[0]->ID;
	$avatar = get_the_post_thumbnail_url($author_post_id, 'thumbnail');
	$post_author = get_user_meta($post_author)['first_name'][0].' '.get_user_meta($post_author)['last_name'][0];
	//print_r($zod_desc);echo '<br> By -> ';
	//print_r($post_author);
			
}else if($_GET['d'] == 'weekly-horoscope' AND $_GET['z']){
	$data_stat = 0;
	$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 6204 ORDER BY object_id DESC LIMIT 30";
	$data = $wpdb->get_results($query);
	foreach($data as $key){
		if(get_post_status($key->object_id) == 'publish'){
			$post_id = $key->object_id;
			break;
		}
	}
	$zod = get_post_meta($post_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs'][0];
	$zod_desc = get_post_meta($post_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs_description'][0];
	$post_author = get_post($post_id)->post_author;
	$query = "SELECT ID FROM wp_posts WHERE post_author=$post_author AND post_type='therapist'";
	$data1 = $wpdb->get_results($query);
	$author_post_id = $data1[0]->ID;
	$avatar = get_the_post_thumbnail_url($author_post_id, 'thumbnail');
	$post_author = get_user_meta($post_author)['first_name'][0].' '.get_user_meta($post_author)['last_name'][0];
	//print_r($zod_desc);echo '<br> By -> ';
	//print_r($post_author);
}else if($_GET['d'] == 'monthly-horoscope' AND $_GET['z']){
	$data_stat = 0;
	$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 6203	ORDER BY object_id DESC LIMIT 30";
	$data = $wpdb->get_results($query);
	foreach($data as $key){
		if(get_post_status($key->object_id) == 'publish'){
			$post_id = $key->object_id;
			break;
		}
	}
	$zod = get_post_meta($post_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs'][0];
	$zod_desc = get_post_meta($post_id)['tarot_daily_horoscope_'.$zod_array[$_GET['z']].'_sun_signs_description'][0];
	$post_author = get_post($post_id)->post_author;
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
		<h1 class="todays_horo_head">Daily Tarot Horoscope</h1><br>
		<h6 class="chosse_zodiac">Select a Zodiac Sign</h6><br>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/aries';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aries.svg" id="Aries" value="Aries" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aries</p><p class="zod_dob">Mar/21 - Apr/19<br><br>Ariens love to be on top, and it's no surprise that these competitive killers are first in line in the zodiac. Daring and determined, individuals from this group are always up for an impromptu challenge.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/taurus';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/taurus.svg" id="Taurus" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Taurus</p><p class="zod_dob">Apr/20 - May/20<br><br>Taurians, like their cosmic spirit animal, enjoy blowing off steam in calm, serene environments, surrounded by tranquil sounds, relaxing aromas, and scrumptious flavours.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/gemini';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/gemini.svg" id="Gemini" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Gemini</p><p class="zod_dob">May/21 - Jun/20<br><br>Like their celestial spirit animal, Geminians are known to possess dual personalities. This duality represents an exchange of ideas, interaction, communication, and trade. Showcasing utmost adaptility; these individuals are open to dabbling in several different disciplines.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/cancer';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/cancer.svg" id="Cancer" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Cancer</p><p class="zod_dob">Jun/21 - Jul/22<br><br>Represented by a mighty crab, Cancerians have the innate ability to exist both in emotional and material realms. Being extremely self-aware, this sign is known to be able to read and absorb the energy of a room in an instant.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/leo';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/leo.svg" id="Leo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Leo</p><p class="zod_dob">Jul/23 - Aug/22<br><br>Famously referred to as kings and queens of the celestial jungle, Leos showcase passion and courage of conviction towards any task they put their minds to. Plus, these individuals are always open to basking in the spotlight when celebrating their own achievements.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/virgo';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/virgo.svg" id="Virgo" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Virgo</p><p class="zod_dob">Aug/23 - Sep/22<br><br>Virgoans are the epitome of logic, perfection, and practicality. Known to pave a systematic life approach with diligence and consistency, these individuals, represented by the goddess of wheat and agriculture, aren't afraid of hard work and failure.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/libra';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/libra.svg" id="Libra" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Libra</p><p class="zod_dob">Sep/23 - Oct/22<br><br>Librans, intriguingly enough, are represented by the only inanimate object in the zodiac. This sign's ability to create balance, harmony, symmetry, and equilibrium in every aspect of their lives is a rare gift.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/scorpio';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/scorpio.svg" id="Scorpio" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Scorpio</p><p class="zod_dob">Oct/23 - Nov/21<br><br>Scorpions are one of the most misunderstood signs in the zodiac. 
Holding enormous passion and might, these "water warriors" derive their strength, confidence, and ambition from the psychic realm.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/sagittarius';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/sagittarius.svg" id="Sagittarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Sagittarius</p><p class="zod_dob">Nov/22 - Dec/21<br><br>Sons and daughters of an archer, Sagittarians are always on the quest for knowledge, education, and a chance to change the world. Individuals from this group are known to undertake several successful pursuits during their lifetime.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/capricorn';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/capricorn.svg" id="Capricorn" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Capricorn</p><p class="zod_dob">Dec/22 - Jan/19<br><br>Capricorns, represented by a mythical sea-goat, is the last earth sign in the zodiac. Individuals born under this sign are patient, responsible, trustworthy, and extremely well-versed when it comes to navigating their emotional feelings.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/aquarius';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/aquarius.svg" id="Aquarius" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Aquarius</p><p class="zod_dob">Jan/20 - Feb/18<br><br>Aquarians, represented by a cosmic healer, are exceptionally future-oriented. These visionaries are intelligent, innovative, and aren't afraid to think outside the box.</p>	
		</div></a>
		<a href="<?php echo get_site_url().'/'.$daily_catg.'/pisces';?>"><div class="first-zod zod-list-element">
				<img src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/Compatibility/images/svg/pisces.svg" id="Pisces" onclick='doit(this.src , this.id);'><br>
				<p class="zod_sign">Pisces</p><p class="zod_dob">Feb/19 - Mar/20<br><br>Pisces, represented by two fish swimming in opposite directions, is the last constellation in the zodiac. Individuals born under this group are extremely imaginative, often being caught up between fantasy and reality.</p>	
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
		<button class="btnConsult daily_horo_page_btn" style="margin-bottom: 1rem;" onclick="window.open('<?php echo get_site_url();?>/talk-to-best-astrologer-online?utm_source=daily-horoscope');">Consult Now</button>
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

		echo '<div class="zod_desc_cont"><img src="'.$zod_desc_logo.'" class="zod_desc_logo"><h1 class="todays_horo_head">'.ucwords($display_catg).' '.ucwords($_GET['z']).' Horoscope</h1><br><img src="'.$zod_desc_img.'" class="zod_desc_card"><br><br><pre style="text-align:left;font-family: Work Sans,Rupee_Foradian,sans-serif !important;
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
		<button class="btnConsult daily_horo_page_btn" style="margin-bottom: 1rem;" onclick="window.open('<?php echo get_site_url();?>/talk-to-best-astrologer-online?utm_source=daily-horoscope');">Consult Now</button>
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

	<?php if($_GET['z']){?>
	<pre style="text-align:left;font-family: Work Sans,Rupee_Foradian,sans-serif !important;
    font-size: 18px;white-space: break-spaces; font-weight: 400; padding:0px 10%" id="horo_content"><b><?php echo $zod_name_w_date[$_GET['z']]; ?></b><?php echo $horo_desc[$_GET['z']]?>
	</pre>
	<?php }?>









	<div class="container">
        <div class="row">
        <section id="faqblock" class="widgetblock">
            <h2 class="wdgt-head mt-2 mb-1 text-center">FAQs</h2>
            <section id="accordion" class="faqAccordian" itemscope itemtype="https://schema.org/FAQPage">
    	        <?php $i = 0; 
                while(have_rows('faq')) : the_row();?>
                    <div class="card" itemprop="mainEntity" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="card-header <?php echo $i==0 ?'open':''; ?>" id="heading<?php echo $i; ?>" >
                            <h5 class="mb-0" itemprop="name">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                <?php the_sub_field('faq_title') ?>
                                </button>
                                <span class="icon"></span>	
                            </h5>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $i==0 ?'show':''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div class="card-body" style="font-weight: 500;" itemprop="text"><?php the_sub_field('faq_description')?></div>
                        </div>
                    </div>
                    <?php $i++;
                endwhile;?> 
            </section>
        </section>
    </div>
   </div>

	<?php include_once get_stylesheet_directory().'/new-footer.php';?>



