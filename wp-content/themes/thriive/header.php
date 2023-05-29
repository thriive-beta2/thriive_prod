<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thriive
 */


if(get_the_id() != /*'86748'*/ '78206'){

	include 'lifetalk_test.php';
	die();

}



?>
<?php
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'register')
		{
			wp_redirect(site_url());exit;
		}
	}
	global $wp;
	$current_url = add_query_arg( array(), $wp->request );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msvalidate.01" content="4F185E3CCF66C83AB727028487C9CD26" />
	<?php if($current_url == "talk-to-astrologer-online"){ ?>
		<meta name="keywords" content="astrology, astrology online, online astrology, online astrology India, online astrologer, online astrology for love, online astrology for career, online astrology for job, astrology horoscope, astrology chart, astrology reading,indian astrology, free astrology, live astrology, astrologer, astrologers, talk to astrologer, best astrologers, online astrologers, famous astrologer, astrologers in India, best astrologers in India, vedic astrologers, top astrologers in India, astrologer talk, astrologers  for love, astrologers  for career, astrologers  for Business, astrologers  for family issues, job issues talk to online astrologer, consult online astrology,marriage advice,astrology online,tarot reading,top astrologer,relationship advice,marriage issue,tarot reader,online tarot reading,astrology predictions,tarot card reading,psychic reading online,tarot online,physic reading,astrotalk,astrology predictions,astrology reading,marriage prediction,tarot card reading,psychic reading,tarot cards prediction,astrology numerology,love advice,astrosage,tarot cards online,tarot,marriage prediction by date of birth,tarot card reading,career prediction,astrology prediction,tarot card reading online,marriage prediction,yes no tarot,tarot online,numerology online,job issue,tarot prediction,marriage prediction,astrology predictions,astrology online,astroyogi,online tarot,ganesha speaks,marriage age prediction,depression,horoscope of today,love prediction,what's my daily horoscope" />
	<?php } ?>
	<?php if($current_url == "talk-to-best-angel-card-reader-online"){ ?>
		<meta name="keywords" content="angel card reading, angel card reading horoscope, astrology online, online astrology, indian angel card readers, free angel card reading, live angel card reading, online angel card reading, angel card readers, talk to angel card reader, best angel card reader, online angel card reader, famous angel card reader, angel card reader in India, best angel card reader in India, top angel card reader in India, angel card reader talk, angel card reader  for love, angel card reader  for career, angel card reader  for Business, angel card reader  for family issues." />
	<?php } ?>
	<?php if($current_url == "talk-to-best-astrologer-online"){ ?>
		<meta name="keywords" content="astrology, astrology online, online astrology, astrology horoscope, astrology chart, astrology reading,indian astrology, free astrology, live astrology, online astrology, astrologer, astrologers, talk to astrologer, best astrologers, online astrologers, famous astrologer, astrologers in India, best astrologers in India, vedic astrologers, top astrologers in India, astrologer talk, astrologers  for love, astrologers  for career, astrologers  for Business, astrologers  for family issues, cosmic astrology,marriage advice,astrology online,tarot reading,top astrologer,relationship advice,marriage issue,tarot reader,online tarot reading,astrology predictions,tarot card reading,psychic reading online,tarot online,physic reading,astrotalk,astrology predictions,astrology reading,marriage prediction,tarot card reading,psychic reading,tarot cards prediction,astrology numerology,love advice,astrosage,tarot cards online,tarot,marriage prediction by date of birth,tarot card reading,career prediction,astrology prediction,tarot card reading online,marriage prediction,yes no tarot,tarot online,numerology online,job issue,tarot prediction,marriage prediction,astrology predictions,astrology online,astroyogi,online tarot,ganesha speaks,marriage age prediction,depression,horoscope of today,love prediction,what's my daily horoscope" />
	<?php } ?>
	<?php if($current_url == "talk-to-best-numerologist-online"){ ?>
		<meta name="keywords" content="numerology calculator, name numerology, numerology number, numerology, indian numerology, numerology reading, numerology compatibility, free numerology, numerology calculation, numerologist in india, numerologist, find your birth number, find your path number" />
	<?php } ?>
	<?php if($current_url == "talk-to-best-tarot-card-reader-online"){ ?>
		<meta name="keywords" content="tarot reading, tarot card reading, tarot card reading horoscope, indian tarot readers, free tarot reading, live tarot reading, online tarot reading, tarot readers, talk to tarot reader, best tarot reader, online tarot reader, famous tarot reader, tarot reader in India, best tarot reader in India, top tarot reader in India, tarot reader talk, tarot reader  for love, tarot reader  for career, tarot reader  for Business, tarot reader  for family issues,marriage advice,astrology online,tarot reading,top astrologer,relationship advice,marriage issue,tarot reader,online tarot reading,astrology predictions,tarot card reading,psychic reading online,tarot online,physic reading,astrotalk,astrology predictions,astrology reading,marriage prediction,tarot card reading,psychic reading,tarot cards prediction,astrology numerology,love advice,astrosage,tarot cards online,tarot,marriage prediction by date of birth,tarot card reading,career prediction,astrology prediction,tarot card reading online,marriage prediction,yes no tarot,tarot online,numerology online,job issue,tarot prediction,marriage prediction,astrology predictions,astrology online,astroyogi,online tarot,ganesha speaks,marriage age prediction,depression,horoscope of today,love prediction,what's my daily horoscope" />
	<?php } ?>
	<?php if($current_url == "consult-online-with-counselor"){ ?>
		<meta name="keywords" content="Therapist, Psychologist & counselor for Depression, Anxiety, Relationship Issues, Stress, Career via Chat/Call. Feel Free to Connect and Heal Your Negative Thinking & Irrational Thoughts, Obsessions & Compulsions, Troubling Emotions, Fear & Phobias, Sleep Disorders, Addiction Issues, Anger management, Family Issues, Career Management, Eating Disorders, Parenting, Personal Empowerment, Spirituality, Corporate Wellness, Healing Past Traumas, Goal Manifestation & Motivation, Self Image & Esteem Issues" />
	<?php } ?>
	<?php if($current_url == "talk-to-best-counselor-online"){ ?>
		<meta name="keywords" content="Therapist, Psychologist & counselor for Depression, Anxiety, Relationship Issues, Stress, Career via Chat/Call. Feel Free to Connect and Heal Your Negative Thinking & Irrational Thoughts, Obsessions & Compulsions, Troubling Emotions, Fear & Phobias, Sleep Disorders, Addiction Issues, Anger management, Family Issues, Career Management, Eating Disorders, Parenting, Personal Empowerment, Spirituality, Corporate Wellness, Healing Past Traumas, Goal Manifestation & Motivation, Self Image & Esteem Issues" />
	<?php } ?>
	<?php if($current_url == "talk-to-best-life-coach-online"){ ?>
		<meta name="keywords" content="Therapist, Psychologist & counselor for Depression, Anxiety, Relationship Issues, Stress, Career via Chat/Call. Feel Free to Connect and Heal Your Negative Thinking & Irrational Thoughts, Obsessions & Compulsions, Troubling Emotions, Fear & Phobias, Sleep Disorders, Addiction Issues, Anger management, Family Issues, Career Management, Eating Disorders, Parenting, Personal Empowerment, Spirituality, Corporate Wellness, Healing Past Traumas, Goal Manifestation & Motivation, Self Image & Esteem Issues" />
	<?php } ?>
	<?php if($current_url == "talk-to-best-meditation-online"){ ?>
		<meta name="keywords" content="Meditation for Depression, Anxiety,  Stress, Asthma, Chronic pain, High blood pressure, Sleep problems, Tension headaches, headaches" />
	<?php } ?>	
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="https://www.thriive.in/wp-content/themes/thriive/assets/images/fev_icon_THRIIVE_Logo.png" type="image/png" sizes="20x20">

	<?php if($_SERVER['SERVER_NAME'] != 'localhost' && $_SERVER['SERVER_NAME'] != 'thriive.co.in')
		{ ?>
		<script data-obct type="text/javascript">
		  /** DO NOT MODIFY THIS CODE**/
		  !function(_window, _document) {
		    var OB_ADV_ID='008a24ac4b74afe7d529ada2793d3c054f';
		    if (_window.obApi) {var toArray = function(object) {return Object.prototype.toString.call(object) === '[object Array]' ? object : [object];};_window.obApi.marketerId = toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));return;}
		    var api = _window.obApi = function() {api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);};api.version = '1.1';api.loaded = true;api.marketerId = OB_ADV_ID;api.queue = [];var tag = _document.createElement('script');tag.async = true;tag.src = '//amplify.outbrain.com/cp/obtp.js';tag.type = 'text/javascript';var script = _document.getElementsByTagName('script')[0];script.parentNode.insertBefore(tag, script);}(window, document);
		obApi('track', 'PAGE_VIEW');
		</script>
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-58ZT96Z');</script>
		<!-- End Google Tag Manager -->
		
		<script data-obct type="text/javascript">
		  /** DO NOT MODIFY THIS CODE**/
		  !function(_window, _document) {
		    var OB_ADV_ID='008a24ac4b74afe7d529ada2793d3c054f';
		    if (_window.obApi) {var toArray = function(object) {return Object.prototype.toString.call(object) === '[object Array]' ? object : [object];};_window.obApi.marketerId = toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));return;}
		    var api = _window.obApi = function() {api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);};api.version = '1.1';api.loaded = true;api.marketerId = OB_ADV_ID;api.queue = [];var tag = _document.createElement('script');tag.async = true;tag.src = '//amplify.outbrain.com/cp/obtp.js';tag.type = 'text/javascript';var script = _document.getElementsByTagName('script')[0];script.parentNode.insertBefore(tag, script);}(window, document);
		obApi('track', 'PAGE_VIEW');
		</script>
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-58ZT96Z');</script>
		<!-- End Google Tag Manager -->
		
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58ZT96Z"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133934191-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-133934191-1');
		</script>
		
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-3547338815367924",
		    enable_page_level_ads: true
		  });
		</script>


		<!-- Global site tag (gtag.js) - Google Ads: 804170448 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-804170448"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'AW-804170448');
		</script>
		<!-- End -->
		
		<!-- Global site tag (gtag.js) - Google Ads: 804170448 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-804170448"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'AW-804170448');
		</script>
		<!-- End -->
		
		<!-- Taboola Pixel Code -->
		<script type='text/javascript'>
		  window._tfa = window._tfa || [];
		  window._tfa.push({notify: 'event', name: 'page_view', id: 1193366});
		  !function (t, f, a, x) {
		         if (!document.getElementById(x)) {
		            t.async = 1;t.src = a;t.id=x;f.parentNode.insertBefore(t, f);
		         }
		  }(document.createElement('script'),
		  document.getElementsByTagName('script')[0],
		  '//cdn.taboola.com/libtrc/unip/1193366/tfa.js',
		  'tb_tfa_script');
		</script>
		<noscript>
		  <img src='//trc.taboola.com/1193366/log/3/unip?en=page_view'
		      width='0' height='0' style='display:none'/>
		</noscript>
		<!-- End of Taboola Pixel Code -->
		
		

		<script>
		
		  !function(f,b,e,v,n,t,s)
		
		  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		
		  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		
		  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		
		  n.queue=[];t=b.createElement(e);t.async=!0;
		
		  t.src=v;s=b.getElementsByTagName(e)[0];
		
		  s.parentNode.insertBefore(t,s)}(window, document,'script',
		
		  'https://connect.facebook.net/en_US/fbevents.js');
		
		  fbq('init', '594508334368782');
		
		  fbq('track', 'PageView');
		
		</script>
		
		<noscript><img height="1" width="1" style="display:none"
		
		  src="https://www.facebook.com/tr?id=594508334368782&ev=PageView&noscript=1"
		
		/></noscript>
	
		<!-- End Facebook Pixel Code -->

		<script type="application/ld+json">
			{
			  	"@context": "http://schema.org",
			  	"@type": "Organization",
				"name": "Thriive Art and Soul",
				"description": "Find & book appointment with top verified alternative health therapist in India, consult them for any kind of medical assistance and therapy, ask health queries, book appointment, read health articles, attend our events on yoga, meditation and other alternative therapies.",
				"foundingDate": "2016",
			  	"url": "<?php echo site_url(); ?>",
			  	"logo": "<?php echo get_template_directory_uri(); ?>/assets/images/thriive_logo.svg",
			  	"sameAs": [
				    "https://www.facebook.com/thriiveindia",
				    "https://www.facebook.com/thriiveindia",
				    "https://www.youtube.com/thriiveartandsoul",
				    "https://www.instagram.com/thriiveindia/"
			  	]
			}
		</script>
		<script type="application/ld+json">
		{
		    "@context": "http://schema.org",
		    "@type": "WebSite",
		    "url": "<?php echo get_site_url(); ?>",
		    "potentialAction": {
		      "@type": "SearchAction",
		      "target": "<?php echo get_site_url(); ?>?&s={query}",
		      "query-input": "required name=query"
		    }
		}
		</script>
		<!-- Begin comScore Tag -->
		<script>
			var _comscore = _comscore || [];
			_comscore.push({ c1: "2", c2: "31509269" });
			(function() {
		    	var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
				s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
				el.parentNode.insertBefore(s, el);
			})();
		</script>
		<noscript>
			<img src="https://sb.scorecardresearch.com/p?c1=2&c2=31509269&cv=2.0&cj=1" />
		</noscript>
		<!-- End comScore Tag -->
		<!-- Start Hotjar Tracking Code for www.thriive.in --> 
		<script>    (function(h,o,t,j,a,r){        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};        h._hjSettings={hjid:1541596,hjsv:6};        a=o.getElementsByTagName('head')[0];        r=o.createElement('script');r.async=1;        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;        a.appendChild(r);    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); 
		</script>
		<!-- End Hotjar Tracking Code for www.thriive.in --> 
		
		<!-- snippet AFTER the Hotjar tracking code. -->
		<script>
		//var userId = your_user_id || null; // Replace your_user_id with your own if available.
		//window.hj('identify', userId, {
			//'Signed up': '2019—06-20Z', // Signup date in ISO-8601 format.
			// Add your own custom attributes here. Some examples:
			// 'Last purchase category': 'Electronics', // Send strings with quotes around them.
			// 'Total purchases': 15, // Send numbers without quotes.
			// 'Last purchase date': '2019-06-20Z', // Send dates in ISO-8601 format. 
			// 'Last refund date': null, // Send null when no value exists for a user.
		//});
		</script>
		<!-- End snippet AFTER the Hotjar tracking code. -->
		
		<!-- start izooto script -->
		<script> window._izq = window._izq || []; window._izq.push(["init" ]); </script> <script src="https://cdn.izooto.com/scripts/a2bcd29447654a6bcd3e9916b696c133525931d9.js"></script>
		<!-- End izooto script. -->
		
	<?php } ?>
	<?php
		if(is_singular('therapist'))
		{
			?>
				<script type="application/ld+json">
					{
						"@context": "http://schema.org",
						"@type": "BreadcrumbList",
						"itemListElement": [
						    {
						      	"@type": "ListItem",
						      	"position": 1,
						      	"item": {
						        	"@id": "<?php echo site_url(); ?>",
						        	"name": "Home"
						      	}
						    },
						    {
						      	"@type": "ListItem",
						      	"position": 2,
						      	"item": {
									"@id": "<?php echo site_url(); ?>/therapist",
						        	"name": "Therapist"
						      	}
						    }
						]
					}
				</script>
				<?php 
					if ( have_posts() ) { while ( have_posts() ) { the_post(); 

						//Get all therapy
						$get_all_therapy = get_the_terms(get_the_id(),'therapy');		
						$medical_speciality = array();
						foreach ($get_all_therapy as $single_therapy)
						{
							$medical_speciality[] = $single_therapy->name;
						}
						$medical_speciality = '"'.implode('","', $medical_speciality).'"';

						//Therapy with charges
						$therapist_makesOffer = get_field('therapy');
						//echo "<pre>"; print_r($therapist_makesOffer); echo "</pre>";
						$make_offer = "";
						foreach ($therapist_makesOffer as $treatment) 
						{
							$make_offer .= '"makesOffer": {
							        "@type": "Offer",
							        "name": [
						          		"'.$treatment["therapy_name"][0]->name.'"
						        	],
						        	"priceRange": "INR '.$treatment["charges"].'",
						        	"currenciesAccepted": "INR"
						      	},
						      	';
						}
						$reviewArr = array();
						if(!empty(get_field('first_reference_review')))
						{
							$reviewArr[0]['reviewContent'] = get_field('first_reference_review');
							$reviewArr[0]['reviewBy'] = get_field('first_reference_name');
						}
						if(!empty(get_field('second_reference_review')))
						{
							$reviewArr[1]['reviewContent'] = get_field('second_reference_review');
							$reviewArr[1]['reviewBy'] = get_field('second_reference_name');
						}
						if(!empty(get_field('third_reference_review')))
						{
							$reviewArr[2]['reviewContent'] = get_field('third_reference_review');
							$reviewArr[2]['reviewBy'] = get_field('third_reference_name');
						}
						if(have_rows('review_details', get_the_id()))
						{
							$i = 2;
							while ( have_rows('review_details', get_the_id()) ) : the_row();
								if(!empty(get_sub_field('review'))){
										$i++;
										$reviewArr[$i]['reviewContent'] = get_sub_field('review');
										$reviewArr[$i]['reviewBy'] = get_sub_field('by')['user_firstname'].' '.get_sub_field('by')['user_lastname'];
									}
							endwhile; 
						}
				?> 
				<script type="application/ld+json">
					{
						"@context": "https://schema.org/",
						"@type": "Physician",
						"name": "<?php echo get_the_title(); ?>",
						"url": "<?php echo get_the_permalink(); ?>",
						"description": "<?php echo esc_html(wp_strip_all_tags(get_the_content())); ?>",
						"medicalSpecialty": [<?php echo $medical_speciality; ?>],
						"address": {
							"@type": "PostalAddress",
							"streetAddress": "<?php echo get_field('address'); ?>",
							"addressLocality": "<?php echo getTherapistCity(get_the_id()); ?>",
							"addressCountry": "<?php echo getTherapistCountry(get_the_id()); ?>"
						},
						<?php $review_count = count($reviewArr); 
						if($review_count > 0){ ?>
							"aggregateRating": {
							    "@type": "AggregateRating",
							    "ratingValue": <?php echo number_format_i18n(get_field('avg_rating',get_the_id()),1); ?>,
							    "reviewCount": "<?php echo $review_count; ?>"
							},
							"review": [
								<?php if($reviewArr) { 
									$i = 0;
									foreach($reviewArr as $ra) { 
										$i++; ?> 
										{
											"@type": "Review",
											"datePublished": "<?php echo get_the_date('Y-m-d'); ?>",
											"reviewBody": "<?php echo $ra['reviewContent']; ?>",
											"author": {
												"@type": "Person",
												"name": "<?php echo $ra['reviewBy']; ?>"
											}
										}<?php if($i != $review_count){echo ','; } ?>
									<?php }
								} ?>
							],
						<?php } ?>
						"image": "<?php echo get_the_post_thumbnail_url(); ?>"
					}
				</script>
				<?php }} ?>
			<?php
		}
	?>
	 <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58ZT96Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<nav class="nav-header-top custom">
        <div class="container h-100">
            <div class="row align-items-center">
              
                <?php if (is_page(22890)) {?>
                 <div class="col-md-3 col-sm-2 col-lg-3 col-xs-3">
                        <div class="mobile-button-wrapper">
                            <div class="menu">
                                <span class="menu1"></span>
                                <span class="menu2"></span>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                
                <div class="col-md-6 col-sm-6 col-lg-6 col-6 text_center p_0">
                    <h1 style="margin:0px">
                        <a href="<?php echo get_site_url()?>">
                            <img title="Thriive | Book Appointment &amp; Consult Online with Top Verified Alternative Health Therapist in India." alt="Thriive | Book Appointment &amp; Consult Online with Top Verified Alternative Health Therapist in India." src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-new.png" alt="thriive logo" class="main-logo">
                        </a>
                    </h1>
                    <!-- 	if cicle logo needs to home page  -->
                    <!--
					<?php if(is_front_page()){ ?>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="" class="main-logo">
					<?php } else { ?>
					<a href="<?php echo get_site_url()?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/thriive_logo.svg" alt="" class="main-logo"></a>
					<?php } ?>
                    -->



                    <!--
					<form role="search" method="get" class="search-form icon-search" action="<?php echo home_url( '/' ); ?>">
							<input type="search" class="search-field"
								placeholder="<?php echo esc_attr_x( 'Search Ailments', 'placeholder' ) ?>"
								value="<?php echo get_search_query() ?>" name="s"
								title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					</form>-->
                </div>
                
                <div class="col-md-3 col-sm-4 col-lg-3 col-xs-3 icons-set head_iconsList">
                	<div class="head_iconsList_item col-xs-12" style="text-align: right;padding-right: 0px;">
	                    <span href="" class="location-wrapper-top hidden-lg hidden-md" id="openlocationbox_mobile">
	                        <span class="fa fa-map-marker fa_font"></span>
	                        <span id="menu_geolocation" class="tl-txt hidden-xs">
	                            <?php if($_SESSION['user_area']){echo $_SESSION['user_area'];} else {echo 'Mumbai';} ?>
	                        </span>
	                    </span>
                    </div>
                    
                    <!-- <a href="<?php echo get_permalink( get_page_by_path( 'search-page' ) ); ?>" class="right-icons icon-search head_iconsList_item hidden-xs"></a> -->
                    
                    <?php if (!is_user_logged_in()) { ?>
                    <a style="margin-left:1px" href="<?php echo get_permalink( get_page_by_path( 'seeker-regsiter-landing-page' ) );?>" class="right-icons fa fa-user-o"></a>
                    <?php }else{ 
					$current_user = wp_get_current_user();
					if(in_array("therapist", $current_user->roles))
					{
						$page_link = site_url() . "/" . "therapist-account-dashboard";
					}
					else if(in_array("subscriber", $current_user->roles))
					{
						$page_link = site_url() . "/" . "my-account-page";
					}
					else
					{
						$page_link = site_url() . "/";
					}
					
				?>
                    <span class="user-loggedin head_iconsList_item"><a href="" class="link_profile login_icon_size"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        <div class="user-sub-action-wrapper">
                            <ul class="user-sub-action">
                                <li class="user-sub-action-user-info">
                                    <!-- <a class="ua-item" tabindex="-1" href="<?php echo $therapist_profile_url; ?>"> -->
                                    <?php 
									if($userPost->profile_picture)
									{
										$profile_img_src = wp_get_attachment_image_src($userPost->profile_picture)[0];
									}
									else
									{
										$profile_img_src = get_stylesheet_directory_uri( ) . "/assets/images/dummy-profile-img.png";
									}
								?>
                                    <img alt="" src="<?php echo $profile_img_src ?>" srcset="<?php echo $profile_img_src ?>" class="avatar_img" height="40" width="40">
                                    <span class="display-name"><?php echo wp_get_current_user()->first_name . ' ' . wp_get_current_user()->last_name; ?></span>
                                    <span class="user-email ellipsis"><?php echo wp_get_current_user()->user_email; ?></span>
                                    <!-- </a> -->
                                </li>
                                <?php if(in_array("therapist", wp_get_current_user()->roles)) {  ?>
                                <li id="user-sub-action-profile">
                                    <a class="ab-item" href="<?php echo $therapist_profile_url; ?>">View Profile</a>
                                </li>
                                <?php } ?>
                                <li id="user-sub-action-dashboard">
                                    <?php
								if(in_array("therapist", wp_get_current_user()->roles))
								{
									$dashboard = "/therapist-account-dashboard/";
								}
								else
								{
									$dashboard = "/my-account-page/";
								}
							?>
                                    <a class="ab-item" href="<?php echo $dashboard; ?>">View Dashboard</a>
                                </li>
                                <li id="user-sub-action-logout">
                                    <a class="ab-item" href="<?php echo wp_logout_url('/login/')  ?>">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </span>
                    <?php }?>
                </div>
                
                <?php }else{ ?>
                <div class="col-md-3 col-sm-2 col-lg-3 col-xs-2">
                    <div class="mobile-button-wrapper">
                        <div class="menu">
                            <span class="menu1"></span>
                            <span class="menu2"></span>
                            <span class=""></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-lg-6 col-6 text_center logo_cent">
                    <a href="<?php echo get_site_url()?>"><img title="Thriive | Book Appointment &amp; Consult Online with Top Verified Alternative Health Therapist in India." alt="Thriive | Book Appointment &amp; Consult Online with Top Verified Alternative Health Therapist in India." src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-new.png" alt="thriive logo" class="main-logo"></a>
                    <!-- 	if cicle logo needs to home page  -->
                    <!--
					<?php if(is_front_page()){ ?>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="" class="main-logo">
					<?php } else { ?>
					<a href="<?php echo get_site_url()?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/thriive_logo.svg" alt="" class="main-logo"></a>
					<?php } ?>
                    -->



                    <!--
					<form role="search" method="get" class="search-form icon-search" action="<?php echo home_url( '/' ); ?>">
							<input type="search" class="search-field"
								placeholder="<?php echo esc_attr_x( 'Search Ailments', 'placeholder' ) ?>"
								value="<?php echo get_search_query() ?>" name="s"
								title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					</form>-->
                </div>
                
                <div class="col-md-3 col-sm-4 col-lg-3 col-4 icons-set head_iconsList">
                	<div class="head_iconsList_item">
	                    <span href="" class="location-wrapper-top hidden-lg hidden-md" id="openlocationbox_mobile">
	                        <span class="fa fa-map-marker fa_font"></span>
	                        <span id="menu_geolocation" class="tl-txt hidden-xs">
	                            <?php if($_SESSION['user_area']){echo $_SESSION['user_area'];} else {echo 'Mumbai';} ?>
	                        </span>
	                    </span>
                    </div>
                    
                    <a href="<?php echo get_permalink( get_page_by_path( 'search-page' ) ); ?>" class="right-icons icon-search head_iconsList_item"></a>
                    
                    <?php if (!is_user_logged_in()) { ?>
                    <a style="margin-left:1px" href="<?php echo get_permalink( get_page_by_path( 'seeker-regsiter-landing-page' ) );?>"  class="right-icons fa fa-user-o"></a>
                    <?php }else{ 
					$current_user = wp_get_current_user();
					if(in_array("therapist", $current_user->roles))
					{
						$page_link = site_url() . "/" . "therapist-account-dashboard";
					}
					else if(in_array("subscriber", $current_user->roles))
					{
						$page_link = site_url() . "/" . "my-account-page";
					}
					else
					{
						$page_link = site_url() . "/";
					}
					
				?>
                    <span class="user-loggedin head_iconsList_item"><a href="" class="link_profile login_icon_size"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        <div class="user-sub-action-wrapper">
                            <ul class="user-sub-action">
                                <li class="user-sub-action-user-info">
                                    <!-- <a class="ua-item" tabindex="-1" href="<?php echo $therapist_profile_url; ?>"> -->
                                    <?php 
									if($userPost->profile_picture)
									{
										$profile_img_src = wp_get_attachment_image_src($userPost->profile_picture)[0];
									}
									else
									{
										$profile_img_src = get_stylesheet_directory_uri( ) . "/assets/images/dummy-profile-img.png";
									}
								?>
                                    <img alt="" src="<?php echo $profile_img_src ?>" srcset="<?php echo $profile_img_src ?>" class="avatar_img" height="40" width="40">
                                    <span class="display-name"><?php echo wp_get_current_user()->first_name . ' ' . wp_get_current_user()->last_name; ?></span>
                                    <span class="user-email ellipsis"><?php echo wp_get_current_user()->user_email; ?></span>
                                    <!-- </a> -->
                                </li>
                                <?php if(in_array("therapist", wp_get_current_user()->roles)) {  ?>
                                <li id="user-sub-action-profile">
                                    <a class="ab-item" href="<?php echo $therapist_profile_url; ?>">View Profile</a>
                                </li>
                                <?php } ?>
                                <li id="user-sub-action-dashboard">
                                    <?php
								if(in_array("therapist", wp_get_current_user()->roles))
								{
									$dashboard = "/therapist-account-dashboard/";
								}
								else
								{
									$dashboard = "/my-account-page/";
								}
							?>
                                    <a class="ab-item" href="<?php echo $dashboard; ?>">View Dashboard</a>
                                </li>
                                <li id="user-sub-action-logout">
                                    <a class="ab-item" href="<?php echo wp_logout_url('/login/')  ?>">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </span>
                    <?php }?>
                </div>
                <?php } ?>
            </div>

            <div class="row hidden-xs">
                <div class="col-md-2 col-sm-12 col-xs-12 banner-above-menu-wrapper">
                 
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 banner-above-menu-wrapper">
                    <?php
					// wp_nav_menu(array(
					// 	'theme_location' => 'main_above_banner',
					// 	'menu_id' => 'main_above_banner',
					// 	'menu_class' => 'menu-inline',            
					// ));
				?>
                </div>
                <div class="col-md-2 hidden-xs hidden-sm">
                    <span href="" class="location-wrapper-top" id="openlocationbox">
                        <span class="fa fa-map-marker fa-md mg-5"></span>
                        <span id="menu_geolocation" class="tl-txt hidden-xs">
                            <?php if($_SESSION['user_area']){echo $_SESSION['user_area'];} else {echo 'Mumbai';} ?>
                        </span>
                    </span>
                </div>
            </div>

            <div id="locationsearch" style="display: none; float: right;" class="row">
                <!-- <button class="col-md-2 btnlocation" type="button" id="savesearch"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></button> -->
                <input type="text" name="area" id="searchArea" autocomplete="off" class="form-control col-md-10" value="" placeholder="Search Location" />
                <div id="resultsearch"></div>
            </div>
        </div>
    </nav>

<div class="mobile-menu-wrapper ping-bg">
<!--
		<div class="menu-open open">
           	<span class="menu1"></span>
            <span class="menu2"></span>
            <span class=""></span>
        </div>
-->
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
            'menu_class' => 'menu-list',            
        ));
        ?>
</div>

<div class="spacer-header"></div>

<?php if (is_post_type_archive('event')) { ?>
    <script>
        var event = true;
    </script>
<?php } elseif(is_singular('event')){ ?>
	<script>
		var event_post_id = '';
	</script>
<?php } ?>