<?php

/**
 * Enqueue scripts and styles.
 */

function thriive_scripts() {
	global $page_cat;
	
	if(is_page(69664) || is_page(69662) || is_page(69660) || is_page(69701) || is_page(69703) || is_page(69705) || is_page(69707) || is_page(69709) || is_page(69724) || is_tax('ailment') || is_page(69856) || is_singular('videos')  || is_page(66092)  || is_page(64220)  || is_page(67256)  || is_page(67254)  || is_page(67251) || is_page(24768) || is_page(419) || is_page(59009) || is_page(59023) || is_page(60366) || is_page(60369) || is_page(61300) || is_page(62436) || is_page(62438) || is_page(62440) || is_page(66774) || is_page(68872) || is_page(68880) || is_page(27706) || is_page(27701) || is_page(30276) || is_page(593) || is_page(548) || is_page(60372) || is_page(63262) || is_page(536) || is_page(59025) || is_page(439)|| is_post_type_archive('videos') || is_page(70689)  || is_page(59025) || is_category() || is_page(307) || $page_cat=='70'   || is_singular('post') || is_page(71087) || is_page(71089) || is_page(71106) || is_page(72290) || is_page(72288) || is_page(72294) || is_page(72326)  || is_page(72318) || is_page(72307) || is_page(72309) || is_page(72311) || is_page(72320) || is_page(72324) || is_page(72316) || is_page(72305) || is_page(72299) || is_page(72313) || is_page(72322) || is_page(72303) || is_page(72616) || is_page(72732) || is_page(72745) || is_page(72747) || is_page(72749) || is_singular('therapist') || is_page(73236) || is_page(73238) || is_page(73401) || is_page(73405) || is_page(74069) || is_page(74071) || is_page(74073) || is_page(74075) || is_page(74344) || is_page(74354) || is_page(74349) || is_page(74347)|| is_page(74401) || is_page(73826) || is_page(74794) || is_page(74883) || is_page(74931) || is_page(74934) || is_page(75093) || is_page(75425) || is_page(75427) || is_page(75429) || is_page(75431) || is_page(75436) || is_page(75439) || is_page(75447) || is_page(75614) || is_page(76055) || is_page(76201) || is_page(76782) || is_page(77166) || is_page(77692) || is_page(77790) || is_page(78002) || is_page(78433) || is_page(79089) || is_page(79449) || is_page(79506) || is_page(79565) || is_page(79616) || is_page(79688) || is_page(79609) || is_page(79921) || is_page(80445) || is_page(82474) || is_page(82492) || is_page(82757) || is_page(82834) || is_page(83137) || is_page(83139) || is_page(83330) || is_page(83354) || is_page(83394) || is_page(83396) || is_page(83398) || is_page(83401) || is_page(83404) || is_page(83620) || is_page(83694) || is_page(83707) || is_page(83747) || is_page(83806) || is_page(76051) || is_page(84093)){         
		wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', true);
 		wp_enqueue_style('thriive-css', get_template_directory_uri() . '/assets/css/newsoul/thriive.css', true, '20210204');
 		wp_enqueue_style('thriive-custom-css', get_template_directory_uri() . '/assets/css/newsoul/thriive-custom.css', true, time());
 		wp_enqueue_style('fontawosome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', true);
 		wp_enqueue_style('thriive-international-number-css', get_template_directory_uri() . '/build/css/intlTelInput.css', true);
 		wp_enqueue_style('datepicker-css', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', true);
		wp_enqueue_style('style-css', get_template_directory_uri() . '/horoscope_new/style.css', true, time());
 		wp_enqueue_style('emoji-css', get_template_directory_uri() . '/assets/css/newsoul/emojionearea.min.css', true, '20200924');
 		wp_enqueue_script('thriive-jquery', get_template_directory_uri() . '/assets/js/newsoul/jquery.min.js', array(), time(), false);
 		wp_enqueue_script('datepicker-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array("jquery"), true);
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/newsoul/bootstrap.min.js', array('jquery'), '20201002', true);
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/newsoul/owl.carousel.min.js', array('jquery'), '20200928', true);
		wp_enqueue_script('thriive-international-number-js', get_template_directory_uri().'/build/js/intlTelInput.js', array('jquery'), '', true);
		wp_enqueue_script('parsley-js', get_template_directory_uri() . '/assets/js/parsley.min.js',array("jquery"), true); 
		wp_enqueue_script('thriive-custom-js', get_template_directory_uri() . '/assets/js/newsoul/thriive-custom.js', array('jquery'), time(), true);
		wp_localize_script('thriive-custom-js', 'myajax', array('ajax_url' => admin_url('admin-ajax.php')));
		wp_enqueue_script('emoji-js', get_template_directory_uri() . '/assets/js/newsoul/emojionearea.min.js', array("jquery"), true);
		wp_enqueue_script('thriive-chat-js', get_template_directory_uri() . '/assets/js/newsoul/ajax06122019.js', array('jquery'), time(), true);
		//wp_enqueue_script('thriive-horoscope-js', get_template_directory_uri() . '/horoscope_new/script.js', array('jquery'), '20201120.2', true);
		wp_localize_script('thriive-chat-js', 'chatajax', array('ajax_url' => admin_url('admin-ajax.php')));
		if(is_page(72288)){
			wp_enqueue_style('select-2-css', get_template_directory_uri() . '/assets/css/select2.min.css', true);
			wp_enqueue_script('select-2-js', get_template_directory_uri() . '/assets/js/select2.min.js', array("thriive-jquery"), true);
		}
		if(is_singular('therapist')){ 
			wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.min.css', true);
			wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array('thriive-jquery'), '20201222', true);
		}
	} else {
		wp_enqueue_style('style-css', get_template_directory_uri() . '/horoscope_new/style.css', true, time());
		wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', true);
		wp_enqueue_style('swiperslider-css', get_template_directory_uri() . '/assets/css/swiper.min.css', true);
		wp_enqueue_style('fontawosome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', true);
		wp_enqueue_style('datepicker-css', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', true);
		wp_enqueue_style('select-2-css', get_template_directory_uri() . '/assets/css/select2.min.css', true);
		wp_enqueue_style('thriive-timepicki', get_template_directory_uri() . '/assets/css/timepicki.css', true);
		wp_enqueue_style('thriive-international-number-css', get_template_directory_uri() . '/build/css/intlTelInput.css', true);
		wp_enqueue_style('common-css', get_template_directory_uri() . '/assets/css/common.css', array(), '20200422', false);

		wp_enqueue_style( 'thriive-style', get_stylesheet_uri(),array(), date('Ymd`His') );
		wp_enqueue_script('thriive-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151217', false);
		
		wp_enqueue_script('thriive-chat-js', get_template_directory_uri() . '/assets/js/newsoul/ajax06122019.js', array('jquery'), '20210106.2', true);	

		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('thriive-jquery'), '20151215', false);
		wp_enqueue_script('thriive-typeahead', get_template_directory_uri().'/assets/js/typeahead.js', 'jquery', '', true);
		wp_enqueue_script('swiperslider-swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array("thriive-jquery"), true);
		wp_enqueue_script('parsley-js', get_template_directory_uri() . '/assets/js/parsley.min.js',array("thriive-jquery"), true);
	 	wp_enqueue_script('datepicker-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array("thriive-jquery"), true);
	 	wp_enqueue_script('select-2-js', get_template_directory_uri() . '/assets/js/select2.min.js', array("thriive-jquery"), true);
	 	wp_enqueue_script('html2canvas', get_template_directory_uri() . '/assets/js/html2canvas.js', array("thriive-jquery"),time(), true);
	 	wp_enqueue_script('thriive-international-number-js', get_template_directory_uri().'/build/js/intlTelInput.js', 'jquery', '', true);
	 	wp_enqueue_script('slick-js', get_template_directory_uri().'/assets/js/slick.js', 'jquery', '20191212.1', true);
	 	
	 	// if(is_home() || is_front_page()){
	  //       wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css', true, date('YmdHis'));
	  //   }

	 	if(is_page(22890) || is_page(50855) || is_page(60374) || is_page(60369) || is_page(60366) || is_page(60372) || is_page(59009) || is_page(61300) || is_page(62442) || is_page(62436) || is_page(62440) || is_page(62438) || is_page(66774) || is_page(68872) || is_page(68880)) {
	        wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css', true, date('YmdHis'));
	    }

	 	if(is_page('test') || is_page('therapies')){
		 	wp_enqueue_script('thriive-mustache', get_template_directory_uri().'/assets/js/mustache.min.js', 'jquery', '', true);	
			wp_enqueue_script('thriive-jquery-mustache', get_template_directory_uri().'/assets/js/jquery.mustache.js', 'thriive-mustache', '', true);
			wp_enqueue_script('thriive-therapies', get_template_directory_uri().'/assets/js/therapies.js', 'jquery', '20191224', true);
	 	}

	 	if(is_page('therapist-registration'))
	 	{
	 		wp_enqueue_style('jquery-fileupload-css', get_template_directory_uri() . '/lib/file-upload/css/jquery.fileupload.css', true);
	 	}
	 	
	 	if(is_page('therapist-registration'))
	 	{
	 		wp_enqueue_style('jquery-fileupload-css', get_template_directory_uri() . '/lib/file-upload/css/jquery.fileupload.css', true, date('YmdHis'));
	 		// wp_enqueue_style('jquery-fileupload-ui-css', get_template_directory_uri() . '/lib/file-upload/css/jquery.fileupload-ui.css', true);

	 		wp_enqueue_script('jquery-ui-widget-js', get_template_directory_uri().'/lib/file-upload/js/vendor/jquery.ui.widget.js', 'jquery', '', true);

	 		// wp_enqueue_script('tmpl-js', get_template_directory_uri().'/lib/file-upload/js/tmpl.min.js', 'jquery', '', true);
	 		// wp_enqueue_script('load-image-all-js', get_template_directory_uri().'/lib/file-upload/js/load-image.all.min.js', 'jquery', '', true);
	 		// wp_enqueue_script('canvas-to-blob-js', get_template_directory_uri().'/lib/file-upload/js/canvas-to-blob.min.js', 'jquery', '', true);

	 		wp_enqueue_script('jquery-iframe-transport-js', get_template_directory_uri().'/lib/file-upload/js/jquery.iframe-transport.js', 'jquery', '', true);
	 		wp_enqueue_script('jquery-fileupload-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload.js', 'jquery', '', true);
	 		// wp_enqueue_script('jquery-fileupload-process-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload-process.js', 'jquery', '', true);
	 		// wp_enqueue_script('jquery-fileupload-image-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload-image.js', 'jquery', '', true);
	 		// wp_enqueue_script('jquery-fileupload-audio-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload-audio.js', 'jquery', '', true);
	 		// wp_enqueue_script('jquery-fileupload-video-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload-video.js', 'jquery', '', true);
	 		// wp_enqueue_script('jquery-fileupload-validate-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload-validate.js', 'jquery', '', true);
	 		// // wp_enqueue_script('jquery-fileupload-ui-js', get_template_directory_uri().'/lib/file-upload/js/jquery.fileupload-ui.js', 'jquery', '', true);
	 		wp_enqueue_script('fileupload-common-js', get_template_directory_uri().'/lib/file-upload/js/common.js', 'jquery',time(), true);
	 		// wp_enqueue_script('fileupload-main-js', get_template_directory_uri().'/lib/file-upload/js/main.js', 'jquery', date('YmdHis'), true);
	 	}
	 	
	 	if(taxonomy_exists('ailment')){
			wp_enqueue_script('thriive-ailment-therapy', get_template_directory_uri().'/assets/js/therapy-by-ailment-id.js', 'jquery', '', true);
	 	}
	 	if(taxonomy_exists('therapy')){
			wp_enqueue_script('thriive-sub-therapy', get_template_directory_uri().'/assets/js/sub-therapy.js', 'jquery', '', true);
			wp_enqueue_script('thriive-therapy-detail-therapist', get_template_directory_uri().'/assets/js/therapy-detail-therapist.js', 'jquery', '', true);
			wp_enqueue_script('thriive-therapy-deatil-ailment', get_template_directory_uri().'/assets/js/therapy-deatil-ailment.js', 'jquery', '', true);
	 	}
	 	
	 	if(is_archive('therapist')){
		 	 wp_enqueue_script('thriive-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.js', array(), '20191011.3', true);
		 	 wp_enqueue_script('thriive-waypoints-sticky', get_template_directory_uri() . '/assets/js/sticky.min.js', array(), '20191011.3', true);
		 	wp_enqueue_script('thriive-mustache', get_template_directory_uri().'/assets/js/mustache.min.js', 'jquery', '', true);	
			wp_enqueue_script('thriive-jquery-mustache', get_template_directory_uri().'/assets/js/jquery.mustache.js', 'thriive-mustache', '', true);
			wp_enqueue_script('thriive-therapist', get_template_directory_uri().'/assets/js/therapist.js', 'jquery', '', true);
			
	 	}
	 	
	 	wp_enqueue_script('thriive-timepicki', get_template_directory_uri() . '/assets/js/timepicki.js', array("thriive-jquery"), '20191011.4', true);
		wp_enqueue_script('thriive-common', get_template_directory_uri() . '/assets/js/common.js', array("thriive-jquery"),  time(), true);
		
		wp_localize_script('thriive-common', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		if(is_page('ailments-listing')){
		 	wp_enqueue_script('thriive-mustache', get_template_directory_uri().'/assets/js/mustache.min.js', 'jquery', '', true);	
			wp_enqueue_script('thriive-jquery-mustache', get_template_directory_uri().'/assets/js/jquery.mustache.js', 'thriive-mustache', '', true);
			wp_enqueue_script('thriive-events', get_template_directory_uri().'/assets/js/ailment.js', 'jquery', '20191224', true);
			
	 	}

	 	if(is_page('therapist') || is_singular('therapist')){
		 	wp_enqueue_script('thriive-therapist', get_template_directory_uri().'/assets/js/therapist.js', 'jquery', '', true);
		}
 	}
 	
}
add_action( 'wp_enqueue_scripts', 'thriive_scripts' );
 ?>
