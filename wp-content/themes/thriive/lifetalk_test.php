<?php /* Template Name: lifetalk_test */ 

//include_once get_stylesheet_directory().'/new-header.php';  

//echo get_the_id();


?>




<!DOCTYPE html>
<html>
<head>
	<title>LifeTalk</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="https://lifetalk.in/img/logo.png">
	  <meta charset="UTF-8">
  <meta name="description" content="Lifetalk">
  <meta name="keywords" content="tarot reading, tarot card reading, tarot card reading horoscope, indian tarot readers, free tarot reading, live tarot reading, online tarot reading, tarot readers, talk to tarot reader, best tarot reader, online tarot reader, famous tarot reader, tarot reader in India, best tarot reader in India, top tarot reader in India, tarot reader talk, tarot reader  for love, tarot reader  for career, tarot reader  for Business, tarot reader  for family issues,marriage advice,astrology online,tarot reading,top astrologer,relationship advice,marriage issue,tarot reader,online tarot reading,astrology predictions,tarot card reading,psychic reading online,tarot online,physic reading,astrotalk,astrology predictions,astrology reading,marriage prediction,tarot card reading,psychic reading,tarot cards prediction,astrology numerology,love advice,astrosage,tarot cards online,tarot,marriage prediction by date of birth,tarot card reading,career prediction,astrology prediction,tarot card reading online,marriage prediction,yes no tarot,tarot online,numerology online,job issue,tarot prediction,marriage prediction,astrology predictions,astrology online,astroyogi,online tarot,ganesha speaks,marriage age prediction,depression,horoscope of today,love prediction,what's my daily horoscope">
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PPGQ9XD');</script>
<!-- End Google Tag Manager -->


</head>
<body>

	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPGQ9XD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<link rel="stylesheet" href="https://lifetalk.in/style.css?v=1">
	<div class="header1">		
		<div class="header1_col1">
			<a href="<?php echo $siteUrl;?>"><img src="https://lifetalk.in/img/logo.png"></a>
		</div>
		<div class="header1_col2">
			<button class="download_button" onclick="/*coming_soon('open')*/toggleDownloadOverlay('me');" id="download_now_btn">
				Download
			</button><?php //toggleDownloadOverlay('open');?>
			<img src="https://lifetalk.in/img/hamburger.png" class="hamburger" onclick="toggleMenu('open')">
		</div>
	</div>

<style>

</style>


	<div class="menu_cont">
		<div class="menu">
				<div class="menu_item close_btn">
					<button onclick="toggleMenu('close')">X</button>
				</div>
				<div class="menu_item" onclick="toggleMenu('close');scrollToElement('collapsing_therapy4')">
					Therapies @ LifeTalk
				</div>
				<div class="menu_item" onclick="toggleMenu('close');scrollToElement('why_life_talk_main_img')">
					Why LifeTalk
				</div>
				<div class="menu_item" onclick="toggleMenu('close');scrollToElement('why_life_talk_about_us')">
					About Us
				</div>
				<div class="menu_item" onclick="toggleMenu('close');scrollToElement('footer1')">
					Contact Us
				</div>

				<div class="menu_item">
				</div>


		</div>
	</div>
	<div class="coming" >
		<div class="menu">
				<div class="menu_item close_btn">
					<button onclick="coming_soon('close')">X</button>
				</div>
				<div class="menu_item"  style="height: 50px;" onclick="coming_soon('close');scrollToElement('collapsing_therapy4')">
					
					<b>App Will Be Live in 24 Hrs!!!</b>
				</div>	

		</div>
	</div>
	<script type="text/javascript">
		var toggleMenuRun = 0;
	 function toggleMenu(task){

	 		if(task == 'open'){
	 				if(document.querySelector('.menu_cont').style.display == 'none' || toggleMenuRun == 0){
			 			document.querySelector('.menu_cont').style.display = 'flex';
			 			setTimeout(function(){document.querySelector('.menu_cont').style.opacity = '1';},10);
			 			toggleMenuRun++;
	 				}	
	 		}else{
	 			document.querySelector('.menu_cont').style.opacity = '0';
	 			setTimeout(function(){document.querySelector('.menu_cont').style.display = 'none';},1000);
	 		}
	 }
	function coming_soon(task){
			
	 		if(task == 'open'){
	 				if(document.querySelector('.coming').style.display == 'none' || coming == 0){
			 			document.querySelector('.coming').style.display = 'flex';
			 			setTimeout(function(){document.querySelector('.coming').style.opacity = '1';},10);
			 			coming++;
	 				}	
	 		}else{
	 			document.querySelector('.coming').style.opacity = '0';
	 			setTimeout(function(){document.querySelector('.coming').style.display = 'none';},1000);
	 		}
	 }
	</script>


<style type="text/css">
	
	.thriive_lifetalk{
		/*margin-top: 30px;*/
		    background-image: url(https://lifetalk.in/img/background.png);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    margin-top: -8%;
    position: relative;
    z-index: -1;
	}

	.thriive_is_now{
		width: 100%;
    text-align: center;
	}

	.thriive_is_now img{
		width: 100%;
	}

	.thriive_logo{
		width: 100%;
    	text-align: center;
	}

	.thriive_logo img{
		width: 150px;
	}

	.lifetalk_logo{
		width: 100%;
		text-align: center;
	}

	.lifetalk_logo img{
		width: 150px;
	}
	.download_now{
		text-align: center;
    width: 100%;
    margin-top: -8%;
	}

	.download_now img{
		width: 250px;
	}

	.apple_android{
		    width: 100%;
    text-align: center;
    margin-top: 15px;
	}

	.apple_android img{
		width: 350px;
	}

	.free_session_text{
		margin: 0 auto;
		text-align: center;
		color: #EC4544;
		font-weight: bold;
		font-size: 18px;
	}

	.free_session_text_parent{
		margin: 1rem;
	}


</style>


	<div class="thriive_lifetalk">
		
<!-- 		<div class="thriive_logo">
			<img src="https://lifetalk.in/img/thriive_logo.png">
		</div> -->

		<div class="thriive_is_now">
			<img src="https://lifetalk.in/img/lifetalk_banner2.png">
		</div>

<!-- 		<div class="lifetalk_logo">
			<img src="https://lifetalk.in/img/logo.png">			
		</div> -->



	</div>


	<div class="download_now" onclick="toggleDownloadOverlay('me');" id="download_now_btn">
		<img src="https://lifetalk.in/img/download_now.png">
	</div>
<div class="free_session_text_parent">
	<p class="free_session_text" style="    -webkit-text-stroke: 0.5px #EC4544;letter-spacing: 1px;">
		FIRST SESSION FREE*			
	</p>
	<p class="free_session_text" style="font-size: 12px;font-weight: bold;font-size: 14px;">(upto Rs 100/-)</p>

</div>
	

	<div class="apple_android" onclick="toggleDownloadOverlay('me');" id="download_now_btn">
		<img src="https://lifetalk.in/img/apple_android.png">
	</div>

<!--Header End-->


<div class="therapies_container">
	<div class="therapies">
		<div class="therapy">
			<img src="https://lifetalk.in/img/sexual_wellness.png" onclick="scrollToElement('collapsing_therapy0');collapseTherapy(0)">
		</div>		
		<div class="therapy">
			<img src="https://lifetalk.in/img/tarot_reading.png" onclick="scrollToElement('collapsing_therapy1');collapseTherapy(1)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/love_coach.png" onclick="scrollToElement('collapsing_therapy2');collapseTherapy(2)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/life_coach.png" onclick="scrollToElement('collapsing_therapy3');collapseTherapy(3)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/PLR.png" onclick="scrollToElement('collapsing_therapy4');collapseTherapy(4)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/EFT.png" onclick="scrollToElement('collapsing_therapy5');collapseTherapy(5)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/ICH.png" onclick="scrollToElement('collapsing_therapy6');collapseTherapy(6)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/stress_coach.png" onclick="scrollToElement('collapsing_therapy7');collapseTherapy(7)">
		</div>
		<div class="therapy">
			<img src="https://lifetalk.in/img/hypnotherapy.png" onclick="scrollToElement('collapsing_therapy8');collapseTherapy(8)">
		</div>
	</div>
</div>

<div class="call_chat_now">

	<img src="https://lifetalk.in/img/talk_now.png" onclick="toggleDownloadOverlay('me');" id="download_now_btn">
	<img src="https://lifetalk.in/img/chat_now.png" onclick="toggleDownloadOverlay('me');" id="download_now_btn">
</div>

<div class="download_our_app">
	<button class="download_button2" onclick="toggleDownloadOverlay('me');" id="download_now_btn">
		Download The App
	</button>	
</div>

<p class="page_sub_head">
	<img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/sex-therapy-assets/assets/images/head-des-01.svg" class="circle_dots">
	Therapies @ LifeTalk
	<img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/sex-therapy-assets/assets/images/head-des-01.svg" class="circle_dots">
</p>

<div class="collapsing_therapies_container">
	<div class="collapsing_therapy collapsing_therapy0"  onclick="collapseTherapy(0)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/sexual_wellness.jpg'); 
				background-size: cover;
				background-position: center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
				<div class="head_cont_background"lass="head">
			Sexual Wellness
		</p>
		<p class="cont" >Sexual Wellness offers a safe, private, and non-judgemental way to find solutions for various sexual and intimacy issues. Our Sexual Wellness experts are experienced in solving issues such as incompatibility, lack of intimacy, confusions around sexuality, and more. 
				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy1"  onclick="collapseTherapy(1)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/tarot_card.jpg'); 
				background-size: cover;
				background-position: left;
			    background-position: center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Tarot Reading
		</p>
		<p class="cont">Tarot reading is a form of psychic reading done through reading of Tarot Cards. Tarot card readers can read the energy of the situation and offer clarity and guidance on the best path forward. 

				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy2"  onclick="collapseTherapy(2)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/love_coach.jpg'); 
				background-size: cover;
				background-position: center;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Love Coach
		</p>
		<p class="cont">Love coaching is done by trained, expert counselors who help build healthy relationships by exploring root causes of disharmony. They can help navigate relationship issues such as lack of communication, infiidelity, getting over a failed relationship, finding ways to build a strong connection with your partner, and more.

				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy3"  onclick="collapseTherapy(3)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/life_coach.jpg'); 
				background-size: cover;
				background-position:center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Life Coach
		</p>
		<p class="cont">Save your relationship by building stronger bond and more fulﬁlling connections with your partner.
				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy4"  onclick="collapseTherapy(4)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/past_life_regression.jpg'); 
				background-size: cover;
				background-position: center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"class="head">
			Past Life Regression
		</p>
		<p class="cont">Past life regression is a technique that uses hypnosis as a means to recover memories from previous lives. It helps to get to the root of many issues such as fears & phobias, unexplained recurring conflicts, and  many mental health issues that may have its origins in traumatic experiences of past lives.
				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy5"  onclick="collapseTherapy(5)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/emotional_freedom.jpg'); 
				background-size: cover;
				background-position:center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Emotional Freedom
		</p>
		<p class="cont">Emotional Freedom Technique (EFT) is a revolutionary treatment that was developed based on the idea that "The cause of all negative emotions is a disruption in the body's energy system." EFT uses gentle physical tapping techniques to  free the trauma and negative emotions that are stored in the body. 

				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy6"  onclick="collapseTherapy(6)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/inner_child.jpg'); 
				background-size: cover;
				background-position: center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Inner Child Healing
		</p>
		<p class="cont">Inner Child healing focuses on uncovering and releasing the issues that stem from the trauma and pain one has experienced as a child. Wounds of the inner child subconsciously affect adult behaviour, and inner child work helps heal those wounds.
				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy7"  onclick="collapseTherapy(7)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/sleep_coach.jpg'); 
				background-size: cover;
				background-position:center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Stress Coach
		</p>
		<p class="cont">There’s no escaping stress, but when it makes your everyday life difficult, it is time to learn to manage it better. A stress coach helps you identify your stressors, and teaches you to cope with it. With practical solutions, a stress coach can help you become a calmer and more peaceful person.

				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
	<div class=" collapsing_therapy collapsing_therapy8"  onclick="collapseTherapy(8)" 

	style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/hypno_therapy.jpg'); 
				background-size: cover;
				background-position: center right;

				">
		<div class="head_cont_background_top">
		<div class="add_extra_height_for_image"></div>
		<div class="head_cont_background"lass="head">
			Hypnotherapy
		</p>
		<p class="cont">Hypnotherapy is a process where patients  are induced into a trance-like state, that heightens their focus, and they are able to remember their memories better, especially the ones that are causing behavioral and emotional issues. In this state, the patients respond more readily to suggestions, and become deeply relaxed.
				<br><button class="know_more" onclick="toggleDownloadOverlay('me');">Know More</button>
		</p>
	</div>
	</div>

	</div>
</div>




<div class="why_life_talk_head_container">
	<div class="why_life_talk_head">
			<img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/sex-therapy-assets/assets/images/head-des-01.svg" class="circle_dots">
		Why LifeTalk?
			<img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/sex-therapy-assets/assets/images/head-des-01.svg" class="circle_dots">
	</div>
	<div class="why_life_talk_head_cont">
		<b>LifeTalk</b> helps solve your issues right at the root, and provides long-term solutions.
	</div>
</div>

<div class="why_life_talk_main_img">
	<img src="https://lifetalk.in/img/why_life_talk_main_img1.png">
</div>

<div class="why_life_talk_about_us">
	<div class="why_life_talk_head">
			<img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/sex-therapy-assets/assets/images/head-des-01.svg" class="circle_dots">
		About Us
			<img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/sex-therapy-assets/assets/images/head-des-01.svg" class="circle_dots">
	</div>
	<div class="why_life_talk_about_us_content" ><br/>
		<p>Lifetalk is India's number one app that instantly connects you to verified and curated Emotional Wellness experts. Healing and thriving is just a Talk away. </p><br/>
		<p style="color:#000;"><b>Deep dive into the root of your emotions with a range of emotional wellness therapies.</b>
		</p>
		<ul>
			<li>Looking for clarity? Talk to our Tarot Readers. </li>
			<li>Looking to solve love issues? Talk to Love Coaches. </li>
			<li>Issues in the bedroom? Talk to Sexual Wellness Experts.</li>
			<li>Low on confidence? Talk to a Life Coach.  </li>
		</ul>

		<p>
			To bring you a truly wholesome wellness experience, LifeTalk will soon be launching a range of wellness products. 
		</p>



	</div>
</div>





<div class="download_overlay" onclick="event.stopPropagation();toggleDownloadOverlay('parent')" id="download_now_btn">
	
<div class="OS_download" onclick="event.stopPropagation();toggleDownloadOverlay('child')" id="download_now_btn">
	
	<div class="OS_download_btn"><img src="https://lifetalk.in/img/android.png">Download</div>
	<div class="OS_download_btn"><img src="https://lifetalk.in/img/ios.png">Download</div>

</div>


</div>



<div class="hidden_div">
<div class="collapsing_therapies_container">
	<div class="collapsing_therapy collapsing_therapy_default" 
		style="background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url('https://lifetalk.in/img/Banner.jpg'); 
				background-size: cover;
				background-position: left;
			    background-position: 0px;

				" onclick="collapseTherapyDefault(0)">		
		<div class="add_extra_height_for_image_default">
			
		</div>

		<div class="head_cont_background">
			<p class="head_default">
				Relationship Issues
			</p>
			<p class="cont_default" style="overflow: hidden;">Save your relationship by building stronger bond and more fulﬁlling connections with your partner.
					<br><button class="know_more">Know More</button>
			</p>
		</div>

	</div>
</div>
</div>



<style>
	.footer1{
		width:100%;
		background-color: #26275F;
		color: #fff;
		margin-top: 1rem;
	}
.footer1_row1{
	display: flex;
	text-align: center;
	justify-content: space-around;
	align-items: center;
}

	.footer1_row1_col1{
		font-size: 12px;
	}
	.footer1_row1_col1 p{
		font-size: 14px;
	}
	.footer1_row2{
		text-align: center;
    font-size: 12px;
	}

</style>




<div class="footer1"><br>
	<div class="footer1_row1">
		<div class="footer1_row1_col1">
			<p>Contact Us</p>
			Support@thriive.in<br>
			<span style="display: flex;align-items: center;margin-top: 2px;">
				<img src="https://lifetalk.in/img/whatsapp_icon.png" style="width:20px;height:20px;">
				<a href="https://api.whatsapp.com/send?phone=918451936776" style="color: #fff;text-decoration: underline;">+918451936776</a>
			</span>
		</div>

		<div class="footer1_row1_col2">
			<a href="<?php echo $siteUrl; ?>privacypolicy.php" style="text-decoration: none;color: #fff;">
					Privacy Policy
			</a>
		</div>

		<div class="footer1_row1_col3">
			Follow us<br>
			<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/ss-fb.svg" alt="">
			<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/ss-insta.svg" alt="">
			<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/ss-in.svg" alt="">
			<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/ss-yt.svg" alt="">
			<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/ss-tw.svg" alt="">
		</div>


	</div><br>

	<div class="footer1_row2">
		© <?php echo date("Y"); ?> Thriive Healthcare Pvt Ltd. All Rights Reserved. <br>
		Please ensure to have read the <a  href="img/general-terms-of-use.pdf" style="color: #fff;">T&C </a> and disclaimer prior to using the services of our website.
	</div><br>

</div>





<script type="text/javascript">
	var coming = 0;
	 function coming_soon(task){
			
	 		if(task == 'open'){
	 				if(document.querySelector('.coming').style.display == 'none' || coming == 0){
			 			document.querySelector('.coming').style.display = 'flex';
			 			setTimeout(function(){document.querySelector('.coming').style.opacity = '1';},10);
			 			coming++;
	 				}	
	 		}else{
	 			document.querySelector('.coming').style.opacity = '0';
	 			setTimeout(function(){document.querySelector('.coming').style.display = 'none';},1000);
	 		}
	 }
	setTimeout(function(){document.querySelector('.head_cont_background_top').click();}, 100);

	function toggleDownloadOverlay(target){



		var deviceTypeString = navigator.userAgent.toLowerCase() ;

		if(deviceTypeString.search('android') > 0){
			// alert('android');
			window.location.href = "https://play.google.com/store/apps/details?id=com.lifetalk.thriive";
		}else if(deviceTypeString.search('iphone') > 0){
			//alert('apple');
			//coming_soon('open');
			window.location.href = "https://apps.apple.com/in/app/lifetalk-wellness/id1665833885";
		}else{
			// alert('android');
			window.location.href = "https://play.google.com/store/apps/details?id=com.lifetalk.thriive";
		}


		// if(target == 'parent'){
		// 	document.querySelector('.download_overlay').style.opacity = 0;
		// 	setTimeout(function(){document.querySelector('.download_overlay').style.display = 'none';},1050);
		// 	}else{
		// 	document.querySelector('.download_overlay').style.display = 'flex';
		// 	setTimeout(function(){document.querySelector('.download_overlay').style.opacity = '1';},50);

		// 	}
	}






	var defaultHeight = document.querySelectorAll('.hidden_div .cont_default')[0].clientHeight +25;
	var defaultImageContHeight = document.querySelectorAll('.add_extra_height_for_image_default')[0].clientHeight;




	function collapseTherapy(index){
		if(document.querySelectorAll('.collapsing_therapy .cont')[index].clientHeight == defaultHeight){
			document.querySelectorAll('.collapsing_therapy .cont')[index].style.height = 0;
			document.querySelectorAll('.add_extra_height_for_image')[index].style.height = 0;
		}else{
			document.querySelectorAll('.collapsing_therapy .cont')[index].style.height = 'auto';
			document.querySelectorAll('.add_extra_height_for_image')[index].style.height = defaultImageContHeight+'px';
			for(i=0;i<document.querySelectorAll('.collapsing_therapy .cont').length;i++){
				if(i==index){

				}else{
					document.querySelectorAll('.collapsing_therapy .cont')[i].style.height = 0;
					document.querySelectorAll('.add_extra_height_for_image')[i].style.height = 0;
				}
			}
		}
	}


	function collapseTherapyDefault(index){
		if(document.querySelectorAll('.collapsing_therapy_default .cont_default')[index].clientHeight == defaultHeight){
			document.querySelectorAll('.collapsing_therapy_default .cont_default')[index].style.height = 0;
			document.querySelectorAll('.add_extra_height_for_image_default')[0].style.height = 0;

		}else{
			document.querySelectorAll('.collapsing_therapy_default .cont_default')[index].style.height = defaultHeight+'px';
			document.querySelectorAll('.add_extra_height_for_image_default')[0].style.height = defaultImageContHeight+'px';
			for(i=0;i<document.querySelectorAll('.collapsing_therapy_default .cont_default').length;i++){
				if(i==index){

				}else{
					document.querySelectorAll('.collapsing_therapy_default .cont_default')[i].style.height = 0;
				}
			}
		}
	}	

	function scrollToElement(element){

			try{
				document.querySelector('.'+element).scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
			}catch(e){
					window.location.href = "<?php echo $siteUrl.'?e=';?>"+element;
			}

	}



</script>

	<?php 

		if(isset($_GET['e'])){
	?>

	<script type="text/javascript">
    setTimeout("scrollToElement('<?php echo $_GET['e'];?>')",500) ;
		

	</script>



	<?php
		}

	?>




</body>
</html>
