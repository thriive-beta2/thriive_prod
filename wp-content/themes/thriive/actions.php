<?php
	add_action( 'after_setup_theme', 'thriive_setup' );
	add_action( 'after_setup_theme', 'thriive_content_width', 0 );
	add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
	add_action( 'after_setup_theme', 'thriive_image_sizes' );
	
	//add_action( 'admin_menu' , 'add_taxonomy_menu' );
	add_action( 'init' , 'user_form_handler' );
	add_action('wp_ajax_getTherapyList', 'getTherapyList');
	add_action('wp_ajax_nopriv_getTherapyList', 'getTherapyList');
	
	add_action('wp_ajax_sendOTP', 'sendOTP');
	add_action('wp_ajax_nopriv_sendOTP', 'sendOTP');
	
	add_action('wp_ajax_verifyOTP', 'verifyOTP');
	add_action('wp_ajax_nopriv_verifyOTP', 'verifyOTP');
	add_action('wp_ajax_changeStage', 'changeStage');
	add_action('wp_ajax_nopriv_changeStage', 'changeStage');	
	
	add_action('wp_ajax_getMainTaxonomyDetails', 'getMainTaxonomyDetails');
	add_action('wp_ajax_nopriv_getMainTaxonomyDetails', 'getMainTaxonomyDetails');
	add_action('wp_ajax_getSubTaxonomyDetails', 'getSubTaxonomyDetails');
	add_action('wp_ajax_nopriv_getSubTaxonomyDetails', 'getSubTaxonomyDetails');
	add_action('wp_ajax_getTherapistData', 'getTherapistData');
	add_action('wp_ajax_nopriv_getTherapistData', 'getTherapistData');
	add_action('wp_ajax_getEventsByTherapist', 'getEventsByTherapist');
	add_action('wp_ajax_nopriv_getEventsByTherapist', 'getEventsByTherapist');
	add_action('wp_ajax_deleteCertificate', 'deleteCertificate');
	add_action('wp_ajax_nopriv_deleteCertificate', 'deleteCertificate');
	
	add_action( 'user_register', 'myplugin_registration_save', 10, 1 );
	add_action('after_setup_theme', 'remove_admin_bar');
	add_action( 'template_redirect', 'wpse8170_activate_user' );
	
	add_action('wp_ajax_submit_feedback', 'submit_feedback');
	add_action('wp_ajax_nopriv_submit_feedback', 'submit_feedback');
	add_action( 'save_post', 'my_acf_save_post', 10 );
	
	add_action('wp_ajax_changeavailability', 'changeavailability');
	add_action('wp_ajax_nopriv_changeavailability', 'changeavailability');
	
	add_action('wp_ajax_filterEvents', 'filterEvents');
	add_action('wp_ajax_nopriv_filterEvents', 'filterEvents');
	
	add_action('wp_ajax_getSimilarEvents', 'getSimilarEvents');
	add_action('wp_ajax_nopriv_getSimilarEvents', 'getSimilarEvents');
	
	add_action('wp_ajax_deleteUser', 'deleteUser');
	add_action('wp_ajax_nopriv_deleteUser', 'deleteUser');
	
	
	//show availability by therapist 
	add_action('wp_ajax_showavailability', 'showavailability');
	add_action('wp_ajax_nopriv_showavailability', 'showavailability');
	
	add_action('wp_ajax_therapist_details', 'therapist_details');
	add_action('wp_ajax_nopriv_therapist_details', 'therapist_details');
	
	add_action('wp_ajax_deleteMyBlog', 'deleteMyBlog');
	add_action('wp_ajax_nopriv_deleteMyBlog', 'deleteMyBlog');

	add_action('wp_ajax_requestForBlog', 'requestForBlog');
	add_action('wp_ajax_nopriv_requestForBlog', 'requestForBlog');
	
	add_action('wp_ajax_requestForNews', 'requestForNews');
	add_action('wp_ajax_nopriv_requestForNews', 'requestForNews');
	
	
	add_action('wp_ajax_addmondaytime', 'addmondaytime');
	add_action('wp_ajax_nopriv_addmondaytime', 'addmondaytime');
	
	add_action('wp_ajax_contactAccountManager', 'contactAccountManager');
	add_action('wp_ajax_nopriv_contactAccountManagers', 'contactAccountManager');
	
	add_action('wp_ajax_chkrejection', 'chkrejection');
	add_action('wp_ajax_nopriv_chkrejection', 'chkrejection');
	 
	
	add_action('wp_ajax_response', 'response');
	add_action('wp_ajax_nopriv_response', 'response');
	
	add_action('wp_ajax_resetwaiting', 'resetwaiting');
	add_action('wp_ajax_nopriv_resetwaiting', 'resetwaiting');
	
	add_action('wp_ajax_browse', 'browse');
	add_action('wp_ajax_nopriv_browse', 'browse');
	add_action('wp_ajax_renewPackage', 'renewPackage');
	add_action('wp_ajax_nopriv_renewPackage', 'renewPackage');
	
	add_action('wp_ajax_upgradePackage', 'upgradePackage');
	add_action('wp_ajax_nopriv_upgradePackage', 'upgradePackage');
	
	add_action('wp_ajax_getAilmentsData', 'getAilmentsData');
	add_action('wp_ajax_nopriv_getAilmentsData', 'getAilmentsData');

	add_action('wp_ajax_generateTherapistFields', 'generateTherapistFields');
	add_action('wp_ajax_nopriv_generateTherapistFields', 'generateTherapistFields');
	
	add_action('wp_ajax_getTherapyByAilmentTerm', 'getTherapyByAilmentTerm');
	add_action('wp_ajax_nopriv_getTherapyByAilmentTerm', 'getTherapyByAilmentTerm');
	
	add_action('wp_ajax_getTherapyDetailTherapist', 'getTherapyDetailTherapist');
	add_action('wp_ajax_nopriv_getTherapyDetailTherapist', 'getTherapyDetailTherapist');
	
	add_action('wp_ajax_getTherapyDetailAilment', 'getTherapyDetailAilment');
	add_action('wp_ajax_nopriv_getTherapyDetailAilment', 'getTherapyDetailAilment');
	
	add_action('wp_ajax_getSubTherapy_load', 'getSubTherapy_load');
	add_action('wp_ajax_nopriv_getSubTherapy_load', 'getSubTherapy_load');
	
	add_action('wp_ajax_getTherapistCommunicationMode', 'getTherapistCommunicationMode');
	add_action('wp_ajax_nopriv_getTherapistCommunicationMode', 'getTherapistCommunicationMode');
	
	// Remove issues with prefetching adding extra views
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	add_action('acf/init', 'google_map_api_key');
	
	add_action( 'transition_post_status', 'change_post_published', 10, 3 );
	//Disable wordpress default search query
	add_action( 'pre_get_posts', 'modify_query' );
	
	add_action('wp_ajax_countryStateChange', 'CountryStateChange');
	add_action('wp_ajax_nopriv_countryStateChange', 'CountryStateChange');
	
	add_action('wp_ajax_stateCityChange', 'StateCityChange');
	add_action('wp_ajax_nopriv_stateCityChange', 'StateCityChange');
	
	add_action( 'edit_ailment', 'save_taxonomy_ailment', 10, 3);
	add_action( 'edit_therapy', 'save_taxonomy_therapy', 10, 3);
	
	//CRON
	add_action( 'therapists_birthday', 'cron_therapists_birthday_eaba0b73', 10, 0 );
	add_action( 'packages_renewal_email_one_month_before_expiry', 'cron_packages_renewal_email_one_month_before_expiry_e072d061', 10, 0 );
	add_action( 'response_calculate_therapist', 'cron_response_calculate_therapist_8e88a211', 10, 0 );
	
	// Update seq no in options
	add_action( 'update_option_options_invoice_number_format', 'wpse_check_settings', 10, 2 );
	
	add_action( 'add_meta_boxes', 'add_user_meta_box' );
	
	//add_action( 'admin_init', 'no_access_to_therapist_seeker', 100 );
	
	add_action('wp_ajax_checkajax', 'checkajax');
	add_action('wp_ajax_nopriv_checkajax', 'checkajax');

	add_action( 'wp_ajax_ajax_search', 'ajax_search' );
	add_action( 'wp_ajax_nopriv_ajax_search', 'ajax_search' );
	
	//SEO Title and Meta Description
	add_filter('wpseo_title', 'custom_wpseo_title');
	add_filter('wpseo_metadesc','custom_wpseo_meta');
	
	//Users GeoLocation
	add_action('wp_ajax_UsersGeoLocation', 'UsersGeoLocation');
	add_action('wp_ajax_nopriv_UsersGeoLocation', 'UsersGeoLocation');
	add_action( 'after_setup_theme', 'main_above_banner' );

	//Get Ailment By Therapy Name
	add_action('wp_ajax_getAilmentByTherapy', 'getAilmentByTherapy');
	add_action('wp_ajax_nopriv_getAilmentByTherapy', 'getAilmentByTherapy');

	//Get Ailment By Therapy Name
	add_action('wp_ajax_getTherapyByAilment', 'getTherapyByAilment');
	add_action('wp_ajax_nopriv_getTherapyByAilment', 'getTherapyByAilment');

	/*
		Custom endpoint registration for my operator api
		- Call connection endpoint
		- Masked number allocation management
		- Delete assigned masked number prior to a month everyday
		- Send SMS & Email for consult online
	*/

	// Endpoint for call connecting API
	add_action( 'rest_api_init', 'call_connecting_endpoint' );
	
	//Manage masked number allocation
	add_action('wp_ajax_assign_masked_number_to_user', 'assign_masked_number_to_user');
	add_action('wp_ajax_nopriv_assign_masked_number_to_user', 'assign_masked_number_to_user');

	//Send SMS and Email for consult online
	add_action('wp_ajax_consult_online_thriive_therapist', 'consult_online_thriive_therapist');
	add_action('wp_ajax_nopriv_consult_online_thriive_therapist','consult_online_thriive_therapist');

	//Validate seeker data in modal
	add_action('wp_ajax_validate_seeker_modal', 'validate_seeker_modal');
	add_action('wp_ajax_nopriv_validate_seeker_modal', 'validate_seeker_modal');

	//get all the therapist area 
	add_action('wp_ajax_get_therapist_area', 'get_therapist_area');
	add_action('wp_ajax_nopriv_get_therapist_area', 'get_therapist_area');

	//save the user location to session 
	add_action('wp_ajax_save_area_session', 'save_area_session');
	add_action('wp_ajax_nopriv_save_area_session', 'save_area_session');

	//Delete allocated masked numbers from my_operator_number_allocation
	add_action( 'delete_my_operator_assigned_users', 'cron_delete_my_operator_assigned_users_dfc62ab2', 10, 0 );
	
	// Creating filer for lead form source	
	add_action('restrict_manage_users', 'make_filter_dropdown_for_lead_form_source');

	// save registration date of therapist backend 
	add_action( 'publish_therapist', 'post_published_notification', 10, 2 );
	// get the registration date on therapist listing backend
	add_action( 'manage_therapist_posts_custom_column', 'custom_posts_table_content', 10, 2 );
	//signup seeker 
	add_action('wp_ajax_seeker_signup', 'seeker_signup');
	add_action('wp_ajax_nopriv_seeker_signup', 'seeker_signup');
	//signup seeker for shreans daga
	add_action('wp_ajax_seeker_signup_sd', 'seeker_signup_sd');
	add_action('wp_ajax_nopriv_seeker_signup_sd', 'seeker_signup_sd');
	//verify seeker mobile
	add_action('wp_ajax_verify_user', 'verify_user');
	add_action('wp_ajax_nopriv_verify_user', 'verify_user');
	add_action('wp_ajax_oc_verify_user', 'oc_verify_user');
	add_action('wp_ajax_nopriv_oc_verify_user', 'oc_verify_user');
	//call signup seeker 
	add_action('wp_ajax_call_seeker_signup', 'call_seeker_signup');
	add_action('wp_ajax_nopriv_call_seeker_signup', 'call_seeker_signup');
	//online consultancy call signup seeker 
	add_action('wp_ajax_oc_call_seeker_signup', 'oc_call_seeker_signup');
	add_action('wp_ajax_nopriv_oc_call_seeker_signup', 'oc_call_seeker_signup');
	//get all the ailment 
	add_action('wp_ajax_getAilmentByAjax', 'getAilmentByAjax');
	add_action('wp_ajax_nopriv_getAilmentByAjax', 'getAilmentByAjax');
	//get all the ailment 
	add_action('wp_ajax_getAilmentByAjaxNew', 'getAilmentByAjaxNew');
	add_action('wp_ajax_nopriv_getAilmentByAjaxNew', 'getAilmentByAjaxNew');
	//save user to qs and thriive
	add_action('wp_ajax_saveUsertoQSNT', 'saveUsertoQSNT');
	add_action('wp_ajax_nopriv_saveUsertoQSNT', 'saveUsertoQSNT');
	//get all the therapies 
	add_action('wp_ajax_get_therapies', 'get_therapies');
	add_action('wp_ajax_nopriv_get_therapies', 'get_therapies');
	//save user review by therapist 
	add_action('wp_ajax_surByTherapist', 'surByTherapist');
	add_action('wp_ajax_nopriv_surByTherapist', 'surByTherapist');
	//call resend button
	add_action('wp_ajax_callresendOTP', 'callresendOTP');
	add_action('wp_ajax_nopriv_callresendOTP', 'callresendOTP');
	//add issues to therapy by therapist 
	add_action('wp_ajax_addIssuesByTherapist', 'addIssuesByTherapist');
	add_action('wp_ajax_nopriv_addIssuesByTherapist', 'addIssuesByTherapist');
	//apply coupon
	add_action('wp_ajax_apply_coupon_code', 'apply_coupon_code');
	add_action('wp_ajax_nopriv_apply_coupon_code', 'apply_coupon_code');
	//checked already booked slot
	add_action('wp_ajax_checkalreadybooked', 'checkalreadybooked');
	add_action('wp_ajax_nopriv_checkalreadybooked', 'checkalreadybooked');
	// get selected card img
	add_action('wp_ajax_getcarddetails', 'getcarddetails');
	add_action('wp_ajax_nopriv_getcarddetails', 'getcarddetails');
	// get user location
	add_action('wp_ajax_userLocations', 'userLocation');
	add_action('wp_ajax_nopriv_userLocation', 'userLocation');
	//Event call signup seeker 
	add_action('wp_ajax_event_call_seeker_signup', 'event_call_seeker_signup');
	add_action('wp_ajax_nopriv_event_call_seeker_signup', 'event_call_seeker_signup');
	//Event mobile verify  
	add_action('wp_ajax_event_verify_user', 'event_verify_user');
	add_action('wp_ajax_nopriv_event_verify_user', 'event_verify_user');
	// register for event
	add_action('wp_ajax_register_for_event', 'register_for_event');
	add_action('wp_ajax_nopriv_register_for_event', 'register_for_event');
	// otp login 
	add_action('wp_ajax_otp_login', 'otp_login');
	add_action('wp_ajax_nopriv_otp_login', 'otp_login');
	// otp login verify
	add_action('wp_ajax_otp_login_verify', 'otp_login_verify');
	add_action('wp_ajax_nopriv_otp_login_verify', 'otp_login_verify');
	// get therapies who has custom pages by ailment 
	add_action('wp_ajax_gettherapy_byailment', 'gettherapy_byailment');
	add_action('wp_ajax_nopriv_gettherapy_byailment', 'gettherapy_byailment');
	// save register for free session 
	add_action('wp_ajax_savefreesession', 'savefreesession');
	add_action('wp_ajax_nopriv_savefreesession', 'savefreesession');
	// send email from free session dashboard backend 
	add_action( 'wp_ajax_fsd_send_email', 'fsd_sendemail_callback' );
	// send sms from free session dashboard backend 
	add_action( 'wp_ajax_fsd_send_sms', 'fsd_sendsms_callback' );
	// send generic email from free session dashboard backend 
	add_action( 'wp_ajax_fsd_gsend_email', 'fsd_gsendemail_callback' );
	// send generic sms from free session dashboard backend 
	add_action( 'wp_ajax_fsd_gsend_sms', 'fsd_gsendsms_callback' );
	// function to call ajax script in footer for free session dashboard backend
	add_action( 'admin_footer', 'my_action_javascript' );
?>