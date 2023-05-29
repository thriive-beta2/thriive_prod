<?php
	if ( ! function_exists( 'thriive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	
	function thriive_setup() {	 	
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thriive, use a find and replace
		 * to change 'thriive' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thriive', get_template_directory() . '/languages' );
 
		session_start();
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'thriive' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'thriive_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		date_default_timezone_set('Asia/Kolkata');
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thriive_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'thriive_content_width', 640 );
}

function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

//Image regenerate
function thriive_image_sizes() 
{
    add_image_size('home_banner', 807, 367, true);
    add_image_size('home_banner_mobile', 372, 169, true);
    add_image_size('full_banner', 777, 333, false);
    add_image_size('blog_ailment_detail', 369, 152, true);
    add_image_size('event_img_gallery', 381, 210, true);
    add_image_size('blog_feature_img', 450, 250, true);
    add_image_size('related_blog', 540, 208, true); 
    add_image_size('featured_post_mobile', 94, 94, true);
    add_image_size('featured_blog', 330, 200, true);
    add_image_size('featured_blog_mobile', 185, 150, true);  	
}

function custom_image_sizes_choose($sizes) 
{
    $custom_sizes = array(
        'home_banner' => 'Home banner',
        'home_banner_mobile' => 'Home banner mobile',
        'full_banner' => 'Full Banner',
        'blog_ailment_detail' => 'Blog ailment detail',
        'event_img_gallery' => 'Event image gallery',
        'blog_feature_img' => 'Blog feature image',
        'related_blog' => 'Related Blog',
        'featured_blog' => 'featured blog',
        'featured_blog_mobile' => 'featured blog mobile'
    );
    return array_merge($sizes, $custom_sizes);
}

function add_taxonomy_menu() {
    global $menu;
    $menu[5] = array( __('Therapy'), 'edit_pages', 'edit-tags.php?taxonomy=therapy&post_type=wsp', '', 'menu-top menu-icon-page', 'menu-pages', 'dashicons-admin-page' );
    $menu[10] = array( __('Ailments'), 'edit_pages', 'edit-tags.php?taxonomy=ailment&post_type=wsp', '', 'menu-top menu-icon-page', 'menu-pages', 'dashicons-admin-page' );
}

function includeFiles(){
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );	
}

function wpse_custom_upload_dir( $dir_data ) 
{
    // $dir_data already you might want to use
    $dir = wp_upload_dir();
    return [
        'path' => $dir['path'] . '/',
        'url' => $dir['url'] . '/',
        'subdir' => $dir['subdir'] . '/',
        'basedir' => $dir['basedir'] . '/',
        'error' => $dir['error'] . '/',
    ];
}

function user_form_handler(){
	$response = '';
	if(isset($_POST['signup_submit'])){
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'signup' ) ){
		//	die('Failed security check' );
		//} else{
			$response = signup($_POST);
		//}
	}else if(isset($_POST['personal_details_submit'])) {
		//printData($_POST);
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		$response = savePersonalDetails($_POST);
	}else if(isset($_POST['submit_package_details'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'package_details' ) ){
		//	die('Failed security check' );
		//}else{
			$response = savePackageDetails($_POST);
		//}
	}else if(isset($_POST['submit_about_yourself'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'about_yourself' ) ){
		//	die('Failed security check' );
		//}else{
			$response = saveSocialNetworkDetails($_POST);
		//}
	}else if(isset($_POST['submit_verification_details'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'verification_details' ) ){
		//	die('Failed security check' );
		//}else{
			$response = saveVerificationDetails($_POST);
		//}
	}else if(isset($_POST['login_submit'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'user_login' ) ){
		//	die('Failed security check' );
		//}else{
			$response = login($_POST);
		//}
	}else if(isset($_POST['feedback_submit'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'nonce_feedback' ) ){
		//	die('Failed security check' );
		//}else{
			$response = submitFeedback($_POST);
		//}
	}else if(isset($_POST['signup_seeker_submit'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'signup_seeker' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = signup_seeker($_POST);
		//}
	}else if(isset($_POST['submit_edit_therapies'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'edit_therapies' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = saveEditedTherapies($_POST);
		//}
	}else if(isset($_POST['update_seeker_submit'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'update_seeker' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = update_seeker($_POST);
		//}
	}else if(isset($_POST['submit_review'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'add_review' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = submit_review($_POST);
		//}
	}else if(isset($_POST['submit_add_image'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'add_gallery_image' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = addGalleryImage($_POST,$_FILES);
		//}	
	}else if(isset($_POST['submit_add_video'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'add_video_link' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = addGalleryVideo($_POST);
		//}	
	}else if(isset($_POST['btnDeleteGalleryImg'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'delete_gallery_img' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = deleteGalleryImg($_POST);
		//}	
	}else if(isset($_POST['delete_video'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'delete_video_link' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = deleteGalleryVideo($_POST);
		//}	
	}
	else if(isset($_POST['requestForBlog'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'request_for_blog' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = requestForBlog($_POST);
		//}	
	}else if(isset($_POST['submit_request_news_letter'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'request_news_letter' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = requestForNewsLetter($_POST);
		//}	
	}else if(isset($_POST['btnConnectWithHealer'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'connect_with_healer' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = connectWithHealer($_POST);
		//}	
	}else if(isset($_POST['submit_create_event'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'nonce_create_event' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = createEvent($_POST);
		//}	
	}else if(isset($_POST['btnForgotPassword'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'forgot_password' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = forgotPassword($_POST);
		//}	
	}else if(isset($_POST['btnResetPassword'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'reset_password' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = resetPassword($_POST);
		//}
	}else if(isset($_POST['btnChangePassword'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'reset_password' ) ){
		//	die('Failed security check'.$retrieved_nonce );
		//}else{
			$response = changePassword($_POST);
		//}
	}else if(isset($_POST['btnMyBlog'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'my_blog' ) ){
		//	die('Failed security check' );	
		//}else{
			$response = saveMyBlog($_POST);
		//}
	}else if(isset($_POST['btnFAQSubmit'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'faqQuery' ) ){
		//	die('Failed security check' );
		//}else{
			$response = faqQuery($_POST);
		//}
	}else if(isset($_POST['btnContactUs'])) {
		//$retrieved_nonce = $_REQUEST['_wpnonce'];
		//if (!wp_verify_nonce($retrieved_nonce, 'faqQuery' ) ){
		//	die('Failed security check' );
		//}else{
			$response = contactUs($_POST);
		//}
	}else if(isset($_POST['review_submit'])){
		$response = saveReview($_POST);
	}else if(isset($_POST['paid_promotion'])){
		$response = reqForPromotion($_POST);
	}else if(isset($_POST['submit_issues'])){
		$response = submitIssues($_POST);
	}else if(isset($_POST['submit_business'])){
		$response = submitIssues($_POST);
	}else if(isset($_POST['tc_tool_submit'])){
		$response = savetctooldata($_POST);
	}
	
	return $response;
}

function surByTherapist(){
	global $wpdb;
	$data = array(
		"caller_id" => $_POST['caller_id'],
		"receiver_id" => $_POST['receiver_id'],
		"rating" => $_POST['rate'],
		"review" => $_POST['review']
	);
	$wpdb->insert("user_review_by_therapist",$data);
}

function saveUsertoQSNT($postdata){
	global $qsmsg;
	$url = "https://qsserver.com/APIPublic/Register?Role=".$postdata['user_role']."&Name=".$postdata['name']."&DOB=".$postdata['dob']."&Email=".$postdata['email']."&Mobile=".$postdata['mobile']."&Password=".$postdata['password']."&ConfirmPassword=".$postdata['c_password']."&Agree=true&Address=".$postdata['address']."&CountryCode=".$postdata['country'];
	$url = str_replace(" ", '%20', $url);
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    $decode_response = json_decode($response);
   	if($decode_response[0]->Msg == 'OK'){
   		$user_id = username_exists( $input['email'] );
		if ( !$user_id and email_exists($input['email']) == false ) 
		{
		   	$seekerDetails = array(
			    'user_login' =>  $postdata['email'],
			    'user_email'  =>  $postdata['email'],
			    'user_pass'  =>  $postdata['password'],
			    'user_url' => "quantum-wellness"
			);
			$user_id = wp_insert_user($seekerDetails);
			$user_id->add_role('subscriber');
			update_user_meta($user_id, 'first_name', $postdata['name']);
			update_user_meta($user_id, 'mobile', $postdata['mobile']);
			update_user_meta($user_id, 'address', $postdata['address']);
			update_user_meta($user_id, 'dob', $postdata['dob']);
			auto_login_new_user($user_id);
		}
		$qsmsg = "Success: Your userid or password has been sent to your email id please check your email.";
   	}
   	//  else {
   	// 	$qsmsg = $decode_response[0]->Msg;
   	// }
    curl_close($ch);
    echo json_encode(array('qsmsg'=>$qsmsg));
	wp_die();
}

function calculateUserRating($post_id,$starrating,$existingRows){
	while ( have_rows('review_details', $post_id) ) : the_row();
    	$rating = intval( get_sub_field('rating' ) );
    	if( have_rows('user_rating_value', 'option') ): 
			while( have_rows('user_rating_value', 'option') ): the_row(); 
				if($rating == get_sub_field('star')){
					if ($rating >= 3){
						$starrating = $starrating+(float)get_sub_field('value');
					} else {
						$starrating = $starrating-(float)get_sub_field('value');
					}
				}
			endwhile;
		endif;
  	endwhile;
  	$starrating /= $existingRows;
  	return $starrating;
}

function calculateCallRating($call_connect,$starrating,$avgrating){
	if(intval($call_connect) == 1){
		$avgrating += $starrating+4.15;	
	} else if((intval($call_connect) == 2) || (intval($call_connect) <= 5)) {
		$avgrating += $starrating+4.4;
	} else if((intval($call_connect) == 6) || (intval($call_connect)) <= 10){
		$avgrating += $starrating+4.6;
	} else if(intval($call_connect) > 10){
		$avgrating += $starrating+4.8;
	}
	return $avgrating;
}

function calculateAvgRating($post_id,$existingRows){
	global $wpdb;
	$user_id = $wpdb->get_row("SELECT post_author FROM wp_posts WHERE ID = ".$post_id);
	$mobile = get_user_meta($user_id->post_author,'mobile',true);
	$call_connect = getTCallCountByStatus($mobile, 'connected');
	$user_rating = get_post_meta($post_id, 'review_details');
	$starrating = 0;
	$avgrating = 0;
	if ($user_rating[0]>0 && !empty($call_connect)) {
		//echo 'u and c'; exit;
		$starrating = calculateUserRating($post_id,$starrating,$existingRows);
		$avgrating = calculateCallRating($call_connect,$starrating,$avgrating);
	} else if($user_rating[0]>0){
		//echo 'u'; exit;
		$starrating = calculateUserRating($post_id,$starrating,$existingRows);
		$avgrating += $starrating+get_field('default_rating_value','option');
	} else if(!empty($call_connect)){
		//echo 'c'; exit;
		$avgrating = calculateCallRating($call_connect,$starrating,$avgrating);
	} else {
		//echo 'else'; exit;
		$avgrating += get_field('default_rating_value','option');
	}
	return $avgrating;
}

function saveReview($postdata){
	global $rr_msg; 
	$existingRows = 0;
	$totalRating = 0;
	$therapist = get_page_by_path( $postdata['post_id'], OBJECT, 'therapist' );
	if (get_post_meta($therapist->ID, 'review_details')) {
		$existingRows = get_post_meta($therapist->ID, 'review_details', true);
	}
	$ailment = get_term_by( 'name', $postdata['ailment'], 'ailment');
	$value = array(
        "by" => $postdata['user_id'],
        "rating" => $postdata['rate'],
        "issues" => $ailment->term_id,
        "recommendation" => $postdata['recommend'] == "yes" ? "1" : "0",
        "review" => $postdata['review'],
        "status" => "1"
    );
	update_row( 'review_details',$existingRows+1, $value, $therapist->ID );
	$user_details = get_userdata( $postdata['user_id'] );
	$subject = "Added a Review";
	$msg = "Hello Thriive Team,<br/><br/>".$user_details->data->user_email." has added a review to ".$therapist->post_title;
	sendEmail('productmanager@thriive.in', $subject, $msg);
	$rr_msg = "Rating and Review successfully saved.";
	$avgrate = calculateAvgRating($therapist->ID,$existingRows+1);
	update_field('avg_rating',$avgrate,$therapist->ID);
}

function sendEmailWithInvoice($to, $subject, $msg, $post_users_id, $status, $file)
{		
	$path = get_stylesheet_directory();
	// Require composer autoload
	require_once $path.'/vendor/autoload.php';

	// Create an instance of the class:
	$mpdf = new \Mpdf\Mpdf();
	
	ob_start();
	include get_stylesheet_directory().'/invoices/'.$file; 
	$template = ob_get_contents();
	$stylesheet = file_get_contents($path.'/invoices/invoice.css');
	ob_end_clean();
	
	// Write some HTML code:
	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	$mpdf->WriteHTML($template, \Mpdf\HTMLParserMode::HTML_BODY);
	$location = get_stylesheet_directory().'/invoices';
	$date = time();
	$pdf = $location.'/Invoice_'.$date.'.pdf';
	$mpdf->Output($pdf, 'F');	
	
	$attachments = array( $pdf );
	
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail( $to, $subject, $msg, $headers, $attachments);
	
	// Delete pdf file after mail is sent
    if (file_exists($pdf)) {
    	unlink($pdf);
   	}	
}


function faqQuery($input)
{
	if(isset($input['txtFAQQuery']) && isset($input['txtEventID']))
	{
		$event_id = $input['txtEventID'];
		$questions = urlencode($input['txtFAQQuery']);
		$event_title = get_the_title($event_id);
		
		if(is_user_logged_in())
		{
			$current_user = wp_get_current_user();
			$user_email = $current_user->user_email;
			global $result;
			$result = saveFAQQuery($event_id,$questions,$user_email);
		} 
		else 
		{
			//global $result;
			//$result = "Unable to submit your query. Please try again letter.";
			$seeker_register_page = site_url() . "/seeker-regsiter-landing-page/?event_id=$event_id&query=$questions";
			wp_redirect($seeker_register_page);
			exit;
		}
	}
}

function saveFAQQuery($event_id,$questions,$user_email)
{
	if(is_user_logged_in())
	{
		$current_user = wp_get_current_user();
		$user_email = $current_user->user_email;
		
		$event_title = get_the_title($event_id);
		
		$faq_row = array('questions' => $questions,'users_email' => $user_email);
		$resultData = add_row('frequently_asked_questions', $faq_row, $event_id);
		
		$isThriiveEvent = get_post_meta($event_id, 'thriive_event',true);
		
		$therapist = get_field("therapist",$event_id);
		$therapist_post_id = $therapist[0]->ID;
		$therapist_account = get_users(array('meta_key' => 'post_id', 'meta_value' => $therapist_post_id))[0];
		$therapist_user_email = $therapist_account->user_email;
		$therapist_username = ($therapist_account->first_name) ? $therapist_account->first_name . ' ' . $therapist_account->last_name : $therapist_user_email;
		
		$subject = "New FAQ on your Event $event_title";
		if($isThriiveEvent)
		{
			$msg = "
				Dear Event Manager, <br><br>
				New FAQ on your Thrrive Event $event_title:<br><br>
				Question : $questions<br>
				User Email: $user_email<br><br>
				Love & light,<br>
				Team Thriive<br><br>
				<em style='color: #615c5c;'>
					Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager2@thriive.in'>accountmanager1@thriive.in</a> for help.
				<em>
			";
			sendEmail("accountmanager1@thriive.in", $subject, $msg);
		}
		else
		{
			$msg = "
				Dear $therapist_username, <br><br>
				New FAQ on your Event $event_title:<br><br>
				Question : $questions<br>
				User Email: $user_email<br><br>
				Love & light,<br>
				Team Thriive<br><br>
				<em style='color: #615c5c;'>
					Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager2@thriive.in'>accountmanager2@thriive.in</a> for help.
				<em>
			";
			sendEmail($therapist_user_email, $subject, $msg);
		}
		return "Your query has been submitted successfully.";
	}
}

function addGalleryImage($input,$file){
	if(isset($file['gallery_picture']['tmp_name']) && isset($input['gallery_title']))
	{
		if(is_user_logged_in())
		{
			includeFiles();
			$current_user = wp_get_current_user();
			$userPost = get_post($current_user->post_id);
			$imageCount =  (($userPost->gallery ) ? $userPost->gallery :0);
			$keyValue = 'gallery_'.$imageCount.'_images';
			$identity_picture_id = media_handle_upload( 'gallery_picture', $current_user->post_id );
			//Adding images in gallery repeater fields
			$gallery_row = array('images' => $identity_picture_id,'gallery_title' => $input['gallery_title']);
			$resultData = add_row('gallery',$gallery_row,$current_user->post_id);
			$newCount = $imageCount+1;
			$resultDatasp=update_post_meta($current_user->post_id,'gallery',$newCount,true);
			return generateJSON('success','Image added successfully','');			  
		} 
		else 
		{
			return generateJSON('error','Please login to proceed','');
		}
	}
	else 
	{
		 return generateJSON('error','Enter required fields','');
	}
}

function addGalleryVideo($input){
	if(isset($input['video_link']) && isset($input['video_title'])){
		if(is_user_logged_in()){
			$current_user = wp_get_current_user();
			$userPost = get_post($current_user->post_id);
			$videoCount =  (($userPost->videos ) ? $userPost->videos :0);
			$keyValue = 'videos_'.$videoCount.'_video_link';
			//Adding video in gallery repeater fields
			$gallery_row = array('video_link' => $input['video_link'],'video_title' => $input['video_title']);
			$resultData = add_row('videos',$gallery_row,$current_user->post_id);
			$newCount = $videoCount+1;
			update_post_meta($current_user->post_id,'videos',$newCount,true);
			return generateJSON('success','Video added successfully','');			  
		} else {
			return generateJSON('error','Please login to proceed','');
		}
	} else {
		 return generateJSON('error','Enter required fields','');
	}
}

function deleteGalleryVideo($input) {
	if(is_user_logged_in()) {
		$current_user = wp_get_current_user();
		$post_id = $current_user->post_id;
		$row_index = $input['row_index'] + 1;
		delete_row('videos', $row_index, $post_id);
	}
}

function deleteGalleryImg($input)
{
	if(is_user_logged_in()) 
	{
		$current_user = wp_get_current_user();
		$post_id = $current_user->post_id;
		$row_index = $input['row_index'] + 1;
		delete_row('gallery', $row_index, $post_id);
	}
}

function deleteCertificate()
{
	if(is_user_logged_in()) 
	{
		$row_index = $_POST['row_index'];

		$current_user = wp_get_current_user();
		$post_id = $current_user->post_id;
		$isDelete = delete_row('certificates', $row_index, $post_id);

		$certificates = get_field('certificates',$post_id);
		$results = array('<i class="fa fa-spinner"></i>');
		$x = 0;
		foreach($certificates as $certificate)
		{
			//$results[] =  $certificate['certificate'];
			$imgId =  $certificate['certificate'];
  			ob_start();
  			if(get_post_mime_type($imgId) == 'application/pdf')
			{
				?>
				<div class="preview_wrap">
					<span class="close" data-id="<?php echo $imgId; ?>" data-row_id="<?php echo $x+1; ?>">x</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf_thumbnail.png" class="pdf_certificate" style="max-width:200px;max-height:200px;" alt="">
				</div>
				<?php
			}
			else
			{
				?>
				<div class="preview_wrap">
					<span class="close" data-id="<?php echo $imgId; ?>" data-row_id="<?php echo $x+1; ?>">x</span>
					<?php
						echo wp_get_attachment_image( $imgId, array(120,120), '', array( "class" => "") );
					?>
				</div>
				<?php
			}
  			$results[] = ob_get_clean();
  			$x++;
		}
		$results = implode('', $results);
		//print_r($results);
	}
	echo $results;
	exit;
}

function requestForBlog()
{
	if(is_user_logged_in())
	{
		$current_user = wp_get_current_user();
		$healerName = $current_user->first_name . ' ' . $current_user->last_name;
		$healerEmail = $current_user->user_email;
		$healerMobile = $current_user->mobile;
		$currentDate = date("dS M, Y");
		
		//Email To Therapist
		$to = $healerEmail;
		$subject = "We're going to write about you!";
		$msg = "Dear $healerName,<br><br>
			It's wonderful to hear from you! And we, here at Thriive, are always intrigued when we get a blog request. Words can open up worlds for so many people. Our user base grows every day, and we've already reached a following of more than 28,000 on Facebook & 16,000+ on Instagram. Imagine the impact of our messages. Our dream is to inspire millions everywhere to unleash their potential and Thriive.  With your messages, we come that much closer to making our dream come true. For this, you will always have our gratitude.<br><br>			 
			Our Content Editor will be in touch with you shortly to organize a telephone or personal interview for the blog. <br><br>		 
			Love & Light<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager2@thriive.in'>accountmanager2@thriive.in</a> for help.
			<em>";
		sendEmail($to, $subject, $msg);
		
		//Email to admin
		$to = "accountmanager2@thriive.in";
		$subject = "$healerName has requested for a blog";
		$msg = "Dear Account Manager,<br><br>
			$healerName has sent a request for a blog.<br><br> 				
			Love & light,<br>
			Team Thriive
			";
		sendEmail($to, $subject, $msg);
		
		//Email to content writer
		$to = "contentmanager@thriive.in";
		$subject = "$healerName has requested for a blog";
		$msg = "Dear Content Editor,<br><br>
			Please review the following request for a blog article:<br>
			Name: $healerName <br>
			Ph. No: $healerMobile <br>
			Email: $healerEmail <br>
			Date: $currentDate <br><br>
			You will need to contact them to conduct a phone or personal interview based upon the topic.<br><br> 
			Love & light,<br>
			Team Thriive ";
		sendEmail($to, $subject, $msg);
		
		$userPost = get_post($current_user->post_id);
		$blogRequestCount =  (($userPost->request_for_blog) ? $userPost->request_for_blog :0);
		$blogRequestCount++;
		$resultDatasp=update_post_meta($current_user->post_id,'request_for_blog',$blogRequestCount,true);
			
		echo "Thank you! We've received your request and will get in touch with you shortly.";
		exit;
	}
}

function requestForNews()
{
	if(is_user_logged_in())
	{		
		$current_user = wp_get_current_user();
		$healerName = $current_user->first_name . ' ' . $current_user->last_name;
		$healerEmail = $current_user->user_email;
		$healerMobile = $current_user->mobile;
		$currentDate = date("dS M, Y");

		//Email To Therapist
		$to = $healerEmail;
		$subject = "We’re excited to feature you in our newsletter";
		$msg = "Dear $healerName,<br><br>
			It’s wonderful to hear from you! And we, here at Thriive, are happy to feature you in our newsletter. 
Our user base grows every day, and we’ve already reached a following of more than 28,000 on Facebook,16,000+ on Instagram and a database of more than 40,000. Imagine the impact of our messages. <br>
			We will get inform you in advance of the date you will be featured in our newsletter.<br><br>	 
			Love & Light<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager2@thriive.in'>accountmanager2@thriive.in</a> for help.
			<em>";
		sendEmail($to, $subject, $msg);
		
		
		//Email to admin
		$to = "accountmanager2@thriive.in";
		$subject = "$healerName has requested for a banner in the newsletter.";
		$msg = "Dear Account Manager,<br><br>
			$healerName has sent a request for a banner in the newsletter. Please do the needful.<br><br> 				
			Love & light,<br>
			Team Thriive
			";
		sendEmail($to, $subject, $msg);
				
		$userPost = get_post($current_user->post_id);
		$newslRequestCount =  (($userPost->request_for_news_letter) ? $userPost->request_for_news_letter :0);
		$newslRequestCount++;
		$resultDatasp=update_post_meta($current_user->post_id,'request_for_news_letter',$newslRequestCount,true);
		
		echo "Thank you! We’ve received your request and will get in touch with you shortly.";
		exit;
	}
}


function contactAccountManager()
{
	if(is_user_logged_in())
	{		
		$current_user = wp_get_current_user();
		$healerName = $current_user->first_name . ' ' . $current_user->last_name;
		$healerEmail = $current_user->user_email;
		$healerMobile = $current_user->mobile;
		$currentDate = date("dS M, Y");
		$accountManager = $_POST["accountManager"];
				
		//Email to admin
		$to = "accountmanager2@thriive.in";
		$subject = "A message from $healerName";
		$msg = "Dear Account Manager,<br><br>
			$healerName has sent you this message:<br><br> 	
			$accountManager<br><br>
			Please respond appropriately at the earliest.<br><br>			
			Love & light,<br>
			Team Thriive
			";
		sendEmail($to, $subject, $msg);
				
		echo "We’ve received and forwarded your request to the Account Manager. They will get in touch with you shortly.";
		exit;
	}
}


function connectMsgToSeeker($healer_id)
{
	//Seeker details
	$current_user = wp_get_current_user();
	$current_user_id = $current_user->ID;
	$current_username = ucwords(get_user_meta($current_user_id, 'first_name', true)) . " " . ucwords(get_user_meta($current_user_id, 'last_name', true));
	$seeker_mobile_number = get_user_meta($current_user_id, 'mobile', true);
	$userEmail = $current_user->user_email;
	
	//Healer Details
	$healer_data = get_userdata($healer_id);
	$healer_username = ucwords(get_user_meta($healer_id, 'first_name', true)) . " " . ucwords(get_user_meta($healer_id, 'last_name', true));
	//$healer_mobile_number = get_user_meta($healer_id, 'mobile', true);
	//$healer_email = $healer_data->user_email;
	
	if(get_field('thriive_contact','option')) {
		$healer_mobile_number = get_field('thriive_contact','option');
	}
	if(get_field('thriive_contact_email','option')) {
		$healer_email = get_field('thriive_contact_email','option');
	}
	
	//Sending Email
	$emailMsg = "Dear $current_username,<br><br>
	Thank you for your interest in connecting with $healer_username. Congrats on your decision to connect with our esteemed therapist, verified and recommended by Thriive!<br><br>
	Here are the contact details<br>
	$healer_username<br>
	$healer_mobile_number <br><br>
	Additionally, you must have received an SMS with Manish's details. Please feel free to get in touch with them for a free consultation and get started on your wellness journey :-)<br><br>
	Since our endeavor is to help the healing start without any delays, we have also shared your details with the expert, and chances are they might get in touch with you!<br><br>
	Keep Thriiving!<br><br>
	Love & light,<br>
	Team Thriive<br><br>
	<em style='color: #615c5c;'>
		Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager2@thriive.in'>accountmanager2@thriive.in</a> for help.
	<em>";
	sendEmail($userEmail, 'Connect with Therapist', $emailMsg);
/*
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail( $toEmail, $subject, $msg, $headers);
	doConnectEmail($userEmail, 'Connect with Therapist', $current_username, 'Therapist', $healer_mobile_number);
*/
	
	//Sending SMS
	$msg = "Thank you for your interest in connecting with our Thriive-verified Therapist '$healer_username'. Here are their contact details: Name: $healer_username, Email: $healer_email, Mobile number: $healer_mobile_number. Keep Thriiving!";
	sendSMS($seeker_mobile_number,$msg);
}
function connectMsgToHealer($healer_id)
{
	//Seeker Detail
	$current_user = wp_get_current_user();
	$current_user_id = $current_user->ID;
	$seeker_mobile_number = get_user_meta($current_user_id, 'mobile', true);
	$seeker_username = ucwords(get_user_meta($current_user_id, 'first_name', true)) . " " . ucwords(get_user_meta($current_user_id, 'last_name', true));
	$seeker_Email = $current_user->user_email;
	
	//Healer detail
	$healer_data = get_userdata($healer_id);
	$healer_username = ucwords(get_user_meta($healer_id, 'first_name', true)) . " " . ucwords(get_user_meta($healer_id, 'last_name', true));
	$healer_mobile_number = get_user_meta($healer_id, 'mobile', true);
	$healer_email = $healer_data->user_email;
/*
	if(get_field('thriive_contact','option')) {
		$healer_mobile_number = get_field('thriive_contact','option');
	}
	if(get_field('thriive_contact_email','option')) {
		$healer_email = get_field('thriive_contact_email','option');
	}
*/
	//Sending Email
	$emailMsg = "
		Dear $healer_username,<br><br>
		'$seeker_username' has asked to connect with you.<br><br>
		Here are their contact details:<br>
		Name: $seeker_username<br>
		Email: $seeker_Email<br>
		Mobile No.: $seeker_mobile_number <br><br>
		We have shared your details with them. They might get in touch with you.<br><br>
		Keep Thriiving!<br>
		Love & light,<br>
		Team Thriive<br><br>
		<em style='color: #615c5c;'>
			Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager2@thriive.in'>accountmanager2@thriive.in</a> for help.
		<em>	
	";
	sendEmail($healer_email, 'Connect with Therapist', $emailMsg);
	//doConnectEmail($healer_email, 'Connect with Therapist', $healer_username, 'Seeker', $seeker_mobile_number);
	
	//Sending SMS
	$msg = "$seeker_username has asked to connect with you.Here are their contact details:Name: $seeker_username, Email: $seeker_Email, Mobile No.: $seeker_mobile_number. We have shared your details with them. They might get in touch with you. Keep Thriiving!";
	sendSMS($healer_mobile_number,$msg);
}

function doConnectEmail($toEmail, $subject, $name, $shareOf, $shareNumber)
{
	$msg = "
		Dear $name,<br><br>
		
		Here is the $shareOf's mobile number $shareNumber.<br><br>
		
		Love & light,<br>
		Team Thriive		
	";
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail( $toEmail, $subject, $msg, $headers);

}

function sendEmail($to, $subject, $msg)
{
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail( $to, $subject, $msg, $headers);

}

function generateTherapistFields()
{
	$current_user = wp_get_current_user();
	$userPost = get_post($current_user->post_id);
	$package = get_post($userPost->select_package[0]);
	
	$count = $_POST['total_therapies'];
	
	if($count < $package->number_of_therapies)
	{
		$therapy_terms = get_terms(array(
	      'taxonomy' => 'therapy',
	      'hide_empty' => false ));
		$count++;
		$therapy_option = '';
		foreach($therapy_terms as $therapy) 
		{
			$therapy_option .='<option value="' . $therapy->term_id . '-' . $therapy->name . '">' . $therapy->name . '</option>';
		}
		$field_block = '
				<div class="form-group">
					<label for="therapy-1">Therapy ' . $count  . '*</label>
					<select class="form-control select-list-item select-dropdown-list" id="therapy-list_' . $count  . '" name="t_name_' . $count  . '">' . $therapy_option . '</select>
				</div>
				<div class="form-group">
					<label for="experience">Experience(in years)*</label>
					<input data-parsley-required="true" type="text" data-parsley-required-message="Experience is required." class="date_picker form-control" id="experience_' . $count  . '" name="t_experience_' .$count  . '">
				</div>
				<div class="form-group">
					<label for="charges">Charges</label>
					<input type="number" class="form-control" id="charges_' . $count  . '" name="t_charges_' . $count  . '">
				</div><br>';
		echo $field_block;
	}
	else
	{
		//If condition become false
		echo "FALSE";
	}
	exit;
}

function myplugin_registration_save($user_id) 
{	
	if(isset($_SERVER['QUERY_STRING']))
	{
		$str = $_SERVER['QUERY_STRING'];
		
	    if (strpos($str, 'Facebook') !== false) 
	    {
	        $facebook_sign_up = 'true';
	        if(isset($_SERVER['HTTP_REFERER']))
	        {
		        $facelogin_from = explode("/", $_SERVER['HTTP_REFERER']);	        
		    }
	    }
		$searchArray = array("%3A", "%2F");
	    $replaceArray = array(":", "/");
	    
		$str = str_replace($searchArray,$replaceArray,$str);
	    $page_slug = explode("/", $str);
	    //print_r($page_slug);echo "<hr>----";
	}
	
	if(!empty($_POST)) {
		$first_name = $_POST['firstname'];
		$last_name= $_POST['lastname'];
		$email= $_POST['email'];
	} else {
		$first_name = get_userdata($user_id)->first_name;
		$last_name = get_userdata($user_id)->last_name;	
		$email = get_userdata($user_id)->user_email;	
	}
	
	update_user_meta($user_id, 'first_name',  $first_name);		  
	// update_user_meta($user_id, 'last_name',  $last_name);
	update_user_meta($user_id, 'is_mobile_verify',  0);
	update_user_meta($user_id, 'mobileOTP',  "");
	
	if($_POST['_wp_http_referer'] == '/seeker-regsiter-landing-page/' || ($page_slug[3] == 'seeker-regsiter-landing-page' && $page_slug[6] == 'www.googleapis.com') || ($facebook_sign_up == 'true' && $facelogin_from[3] == 'seeker-regsiter-landing-page') || ($page_slug[3] == 'therapist' && $page_slug[8] == 'www.googleapis.com') || ($facebook_sign_up == 'true' && $facelogin_from[3] == 'therapist'))
	{
/*
		if(!empty($_POST)) 
		{
			$city = $_POST['city'];
		} 
		else 
		{
			$city = get_userdata($user_id)->locale;
		}
		update_user_meta($user_id, 'locale',  $city);
*/
		$user = new WP_User($user_id);  
	    $user->set_role('subscriber');
	}
	else if($_POST['_wp_http_referer'] == '/therapist-landing-page' || ($page_slug[3] == 'therapist-landing-page&code=4' && $page_slug[6] == 'www.googleapis.com') || ($facebook_sign_up == 'true' && $facelogin_from[3] == 'therapist-landing-page'))
	{
		$post_id = wp_insert_post(array (
		  'post_type' => 'therapist',
		  'post_title' => $first_name.' '.$last_name,
		  'post_author' => $user_id,
		  'post_content' => ' ',	
		  'post_status' => 'draft'
		));
		update_user_meta($user_id, 'post_id',  $post_id);
		update_user_meta($user_id, 'stage',  1);
		update_user_meta($user_id, 'last_name',  $last_name);
		update_user_meta($user_id, 'completed_stages',  array('0','0','0','0'));
		//wp_update_user( array ( 'ID' => $user_id, 'user_login' => $email ) ) ;
/*
		global $wpdb;
		$wpdb->update($wpdb->users, array('user_login' => $email), array('ID' => $user_id));
*/
		$user = new WP_User($user_id);  
	    $user->remove_role('subscriber'); 
	    $user->add_role('therapist'); 
	    $user->add_role('author');
	    $rfa_data = array(
		    'firstname'	=> $first_name,
		    'lastname'	=> $last_name,
		    'email'		=> $email
	    );
	    send_email_to_admin_on_therapist_register($rfa_data);
	}
/*
	print_r($_SERVER);
	echo "<hr>";
	print_r($_POST);
	echo "<hr>";
	print_r($page_slug);
	exit;
*/
}


function login($input){
	if(isset($input['email']) && isset($input['password']))
	{
		$user_id = email_exists($input['email']);
		global $error_login;

		if ( !$user_id and username_exists($input['email']) == false ) 
		{
			//exit;
			$error_login = 'Sorry! Your email ID or password is incorrect or this account doesn\'t exist. Please reset your password or create a new account.';
		} 
		else 
		{
			$login_via = get_user_meta($user_id,'thechamp_provider', true);
			if($login_via == "facebook")
			{
				$error_login = 'You chose the Facebook log-in option when you created your account. Please click Login with <strong>Facebook</strong>';
			}
			else if($login_via == "google")
			{
				$error_login = 'You chose the Google log-in option when you created your account. Please click Login with <strong>Google</strong>';
			}
			else
			{
				$userInfo = wp_authenticate( $input['email'], $input['password'] );
				$user_id = $userInfo->ID;
				//print_r($userInfo); exit;
				
				if(!is_wp_error($userInfo))
				{
					//echo "<pre>";print_r($userInfo);echo "</pre>";
					//if(($userInfo->roles[0]) == 'therapist')
					if(in_array("pending_delete", $userInfo->roles))
					{
						$error_login = "You have deleted your account. Please contact administrative  at <u><a href='mailto:accountmanager1@thriive.in'> accountmanager1@thriive.in </a></u>";
					}
					else if(in_array("therapist", $userInfo->roles))
					{
						if(get_post_status(get_user_meta($user_id,'post_id')[0]) == 'pending' || get_post_status(get_user_meta($user_id,'post_id')[0]) == 'review-b4-publish')
						{
							$error_login = "You can't login now as your account is in review, you will be notified once it is completed.";
						} else if(get_post_status(get_user_meta($user_id,'post_id')[0]) == 'rejected'){
							$error_login = "You can't login as your profile is been rejected, please email to accountmanager1@thriive.in for further enquiry.";
						} else if(get_post_status(get_user_meta($user_id,'post_id')[0]) == 'trash')
						{
							$error_login = "You can't login as your profile is been trashed, please email to accountmanager1@thriive.in for further enquiry.";
						}
						else						
						{
							auto_login_new_user($user_id);
							wp_redirect('/therapist-account-dashboard/');
							exit();
						}
					}
					else if(in_array("subscriber", $userInfo->roles)) //if(($userInfo->roles[0]) == 'subscriber')
					{
						auto_login_new_user($user_id);
						if(isset($input['call_consult'])){
							wp_redirect($input['call_consult']);
						}else{
							wp_redirect('/my-account-page/');
						}
						exit();
					}
					else
					{
						$error_login = 'Invalid user role.';
					}
				}	
				else 
				{
						$error_login = 'Sorry! Your email ID or password is incorrect or this account doesn\'t exist. Please reset your password or create a new account.';
				}		
			    return generateJSON('error','User already exists, Please login','');
			}
		}
	} else{
		 return generateJSON('error','Enter required fields','');
	}
}

function addLogoutLinkInNavigation($items, $args) 
{
	if($args->theme_location == 'menu-1')
	{
	    if (is_user_logged_in()) 
	    {
			$items .= '<li class="menu_logout"><a href="' . wp_logout_url('/soul-html/') . '">Logout</a></li>';
		}
	}
	if($args->theme_location == 'menu-2')
	{
	    if (is_user_logged_in()) 
	    {
			$items .= '<li class="menu_logout"><a href="' . wp_logout_url('/soul/') . '">Logout</a></li>';
		}
	}
	return $items;
}

function generateValidUrl($url, $scheme = 'http://')
{
	if(!empty($url))
	{
		return parse_url($url, PHP_URL_SCHEME) === null ? $scheme . $url : $url;
	}
	else
	{
		return $url;
	}	
}

function submitFeedback($input){
	if(isset($input['feedback']) && isset($input['user_id']) && isset($input['feed_ref']))
	{
		$ref_user = get_userdata($input['user_id']);
		update_user_meta($input['user_id'], $input['feed_ref'],  $input['feedback']);
		
		if($input['feed_ref'] == "ref_1")
		{
			$review_field = "first_reference_review";
		}
		else if($input['feed_ref'] == "ref_2")
		{
			$review_field = "second_reference_review";
		}
		else if($input['feed_ref'] == "ref_3")
		{
			$review_field = "third_reference_review";
		}
		update_field($review_field,$input['feedback'],$ref_user->post_id);
		
		//Sending Email to Admin
		
	  	$userName = $ref_user->first_name . " " . $ref_user->last_name;
	  	$feedback = $input['feedback'];
	  	$msg = "
	  	Dear Account Manager,<br><br>
	  	You have received a review for $userName. Here it is: REVIEW.<br><br>	
	  	$feedback <br><br>
		Love & light,<br>
		Team Thriive
		";
		sendEmail('accountmanager2@thriive.in', 'Reviews are in!', $msg);
		//echo '<script type="text/javascript">$(document).ready(function(){ $("#account_in_review_modal").modal(); });</script>';
					
		//wp_redirect(home_url());
		//exit;
	} else {
		return generateJSON('error','Something went wrong','');
	}
}

function wpse8170_activate_user() {
	if ( is_page() && get_the_ID() == 510 ) {
		$user_id = filter_input( INPUT_GET, 'user', FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
    }
    else if(is_page() && get_the_ID() == 274)	//274 => healer-register.php
    {
	    if($_GET['token_id'])
	    {
		    $token = $_GET['token'];
		    $token_for = $_GET['token_for'];
		    $token_id = $_GET['token_id'];
		    if($token != "" && $token_id !="" && $token_for != "")
		    {
			    $current_user = wp_get_current_user();
				$current_user_id = $current_user->ID;
				if($current_user_id == $token_id)
				{
					//Retrieving user data
					$user_data = get_userdata($token_id);
				    if($user_data->payment_token == $token && $user_data->user_email == $token_for && $user_data->ID == $token_id)
					{
						delete_user_meta($token_id, 'payment_token',  $token);
					}
				}
				else
				{
					//echo '<script type="text/javascript">$(document).ready(function(){ $("#account_in_review_modal").modal(); });</script>';
					return generateJSON('error','Invalid payment link','');
				}
		    }
			else
			{
				return generateJSON('error','The payment link has been expired.','');
			}
	    }
		else
		{
			return generateJSON('error','Invalid payment link','');
		}
    }
}

//Therapist signup
function signup($input){
	if(username_exists( $input['email'] ) && email_exists($input['email'])){
		global $signUp_login;
		$link = get_permalink(419);
		$signUp_login = "<div class='error-msg form-error'>Email id already exists,<a href='$link' style='text-decoration:underline;'>click here to login</a></div>";
		return $signUp_login;
	} else {
		if(isset($input['firstname']) && isset($input['lastname']) && isset($input['email']) && isset($input['password']) && isset($input['g-recaptcha-response']) && !empty($input['g-recaptcha-response'])){
/*
			$user_id = username_exists( $input['email'] );
			if ( !$user_id and email_exists($input['email']) == false ) {
			   
*/			$secret = RECAPTCHA_SITE_SECRET;
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$input['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success){
                $user_id = wp_create_user($input['email'],$input['password'],$input['email']);
                auto_login_new_user($user_id);
                //send_email_to_admin_on_therapist_register($input);
                return generateJSON('success','You have successfully signed up.',array('user_id'=>$user_id));
            }else{
                 return generateJSON('error','Enter required fields','');
            }

/*
			} else {
				//update_user_meta($user_id, 'stage',  1);
				//auto_login_new_user($user_id);
				global $signUp_login;
				$link = get_permalink(419);
				$signUp_login = "Email id already exists,<a href='$link' style='text-decoration:underline;'>click here to login</a>";
				//echo $signUp_login;exit;
			    return generateJSON('error','User already exists, Please login','');
			}
*/
		} else {
			 return generateJSON('error','Enter required fields','');
		}
	}
}

function send_email_to_admin_on_therapist_register($input)
{
	$first_name = $input['firstname'];
	$last_name= $input['lastname'];
	$email = $input['email'];
	
	$msg = "
	  	Dear Account Manager,<br><br>				  	
		You have received the registration form from a web applicant. Please review to process their application within two working days. Details are as follows<br><br>					 
		Name of Therapist: $first_name $last_name<br><br>					 
		Email of Therapist: $email<br><br>					
		Love & light,<br>
		Team Thriive
	";
	sendEmail('accountmanager2@thriive.in', "$first_name $last_name has started the registration process!", $msg);
}

function forgotPassword($input)
{
	if(isset($input['email']))
	{
		global $result;
		$email = $input['email'];
		$user_id = email_exists($email);
		if($user_id)
		{
			$codeD = $email.$user_id . time();  
		    $code = sha1( $codeD );
		    $activation_link = add_query_arg( array('token' => $code, 'token_id' => $user_id,'token_for' => $email ), get_permalink( 1781 ));
		    update_user_meta($user_id, 'forgot_password_token',  $code);
		    $msg = "Hey,<br><br>
		    	You sent us a request to reset your password.<br><br>
				Click on the link below for the new password.<br><br>
				$activation_link <br><br>
				You didn't send the request? Ignore this email and log into your account as usual.<br><br>
				Love & light,<br>
				Team Thriive<br><br>
				<em style='color: #615c5c;'>
					Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
				<em>";
			$result = 'Your reset password link has been sent to your email. Kindly check your inbox for further procedure.';
		    sendEmail($email, "Request for password reset", $msg);		    
		}
		else
		{
			$result = 'Sorry! Your email ID doesn’t exist. Please try logging in with Facebook or Google or Create a New Account';
			return generateJSON('error','Sorry! Your email ID doesn’t exist. Please try logging in with Facebook or Google or Create a New Account','');
		}
	}
	else 
	{
		return generateJSON('error','Enter required fields','');
	}
}

function resetPassword($input)
{
	//print_r($input);
	if(isset($input['token_id']) && isset($input['token']) && isset($input['token_for']) && isset($input['password']))
	{
		$user_id = email_exists($input['token_for']);
		if($user_id)
		{
			$token_id = $input['token_id'];
			$token = $input['token'];
			$token_for = $input['token_for'];
			$password = $input['password'];
			
			//Retrieving user role
			$user_data = get_userdata($token_id);
			$user_role = $user_data->roles;
			$user_role[0];

			if($user_data->forgot_password_token == $token && $user_data->user_email == $token_for && $user_data->ID == $token_id)
			{
				$update_user = wp_update_user( array (
                        'ID' => $token_id, 
                        'user_pass' => $password
                    )
                );
                if($update_user)
                {
	                $msg = "Hey,<br><br>
						Your password has beeen changed.<br><br>		    	
						We'll always let you know when there is any activity on your Thriive account. This helps keep your account safe.<br><br>
						If you didn’t make the request, please contact us on <a href='tel:+912266666036'>+91 22 6666 6036</a> <br><br>
						Love & light,<br>
						Team Thriive<br><br>
						<em style='color: #615c5c;'>
							Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
						<em>";	
	                sendEmail($token_for, "Your Thriive account password has been changed", $msg);
	                //auto_login_new_user($token_id);
	                //wp_redirect(get_permalink(548));
	                global $reset_pwd_msg;
	                $link = get_permalink(419);
	                $reset_pwd_msg = "You have successfully reset your Thriive password. <a href='$link' style='text-decoration:underline;'>click here to login</a>";
                }    
			}
			else
			{
				return generateJSON('error','The link has been expired.','');
			}
		}	
		else
		{
			return generateJSON('error','User doesn\'t exist','');
		}			
	}
}

function changePassword($input)
{
	//echo "<pre>";print_r($input);echo "</pre>";
	global $change_pwd_msg;
	if(isset($input['oldPassword']) && isset($input['newPassword']) && isset($input['confNewPassword']))
	{
		$oldPassword = $input['oldPassword'];
		$newPassword = $input['newPassword'];
		
		$current_user = wp_get_current_user();
		$isOldPwdCorerct = wp_check_password($oldPassword, $current_user->user_pass, $current_user->ID);
		if($isOldPwdCorerct)
		{
			if($oldPassword != $newPassword)
			{
				$update_user = wp_update_user( array (
		            'ID' => $current_user->ID, 
		            'user_pass' => $newPassword
		        ));
		        if($update_user)
	            {
		            $current_user = wp_get_current_user();	
					$username = $current_user->first_name . ' ' . $current_user->last_name;
					$useremail = $current_user->user_email; 
		            $msg = "
		            	Dear $username,<br><br>
						This notice confirms that your password was changed on Thriive.in<br><br>						
						If you did not change your password, please contact at accountmanager1@thriive.in<br><br>					
						This email has been sent to $useremail<br><br>						
						Love & light,<br>
						Team Thriive<br><br>
						<em style='color: #615c5c;'>
							Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
						<em>";
					sendEmail($current_user->user_email, "Notice of Password Change", $msg);
		            $change_pwd_msg = "<div style='color:green'>You have successfully change your password.</div><br>";
		        }
		        else
	            {
		            $change_pwd_msg = "<div style='color:red'>Unable to change your password. Please try again later.</div><br>";
		        }
			}
			else
			{
				$change_pwd_msg = "<div style='color:red'>Old password and new password should not be same.</div><br>";
			}
		}
		else
		{
			$change_pwd_msg = "<div style='color:red'>Incorrect old password.</div><br>";
		}
	}
	else
	{
		$change_pwd_msg = "<div style='color:red'>All fields are required.</div><br>";
	}
}

function contactUs($input)
{
	global $form_msg;
	
	if(isset($input['txtFirstName']) && isset($input['txtLastName']) && isset($input['txtEmail']) && isset($input['txtMobile']) && isset($input['txtMessage']))
	{
		$firstName = $input['txtFirstName'];
		$lastName = $input['txtLastName'];
		$email = $input['txtEmail'];
		$mobile = $input['txtMobile'];
		$message = $input['txtMessage'];
		
		//Send email to admin
		$emailMessage = "
			Dear Account Manager,<br><br>	
						  	
			$firstName $lastName trying to contact you. Details are as follows:<br><br>	
							 
			First Name: $firstName<br>					 
			Last Name: $lastName<br>				 
			Email: $email<br>			 
			Mobile: $mobile<br>	
			Message: $message<br><br>
			
			Love & light,<br>
			Team Thriive
		";
		sendEmail("accountmanager2@thriive.in", "Contact us", $emailMessage);
		
		//Send email to user
		$emailMessage = "
			Dear $firstName $lastName,<br><br>
			Thank you for contacting us. Our team will get back to you shortly. <br><br>
			Love & light,<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
			<em>
		";
		sendEmail($email, "Contact us", $emailMessage);
		
		$form_msg = "<div style='color:green'>Your message has been sent successfully<br><br></div>";
	}
	else
	{
		$form_msg = "<div style='color:red'>Unable to send your message. Please try again later.<br><br></div>";
	}
}

function savePersonalDetails($input){
/*
	echo '<pre>';
	print_r($input);echo '</pre>';
	exit();
*/
	if(isset($input['firstname']) && isset($input['lastname']) && isset($input['gender']) && isset($input['dob']) && isset($input['nationality']) && isset($input['address']) && isset($input['country']) && isset($input['state']) && isset($input['city']) && isset($input['zipcode'])){
	  		if(is_user_logged_in()){
		  	    $current_user = wp_get_current_user();
			    $user_id = $current_user->ID;
/*
			    $addressObj->addressline1 = $input['addressline1'];
			    $addressObj->addressline2 = $input['addressline2'];
*/
			    $addressObj->street = $input['street'];
			    $addressObj->city = $input['city'];
			    $addressObj->state = $input['state'];
			 	$addressObj->zipcode = $input['zipcode'];
			  	$addressObj->country = $input['country'];
			  	
			  	update_field('address', $input['address'], $current_user->post_id);
			  	update_field('zipcode', $input['zipcode'], $current_user->post_id);
			  	
			 	$address = json_encode($addressObj);
			 	
			    update_user_meta($user_id, 'first_name',  $input['firstname']);		  
				update_user_meta($user_id, 'last_name',  $input['lastname']);
				update_user_meta($user_id, 'gender', $input['gender']);
				update_user_meta($user_id, 'dob',  $input['dob']);
				update_user_meta($user_id, 'nationality',  $input['nationality']);		  
				update_user_meta($user_id, 'address',  $address);
				update_user_meta($user_id, 'stage',  2);
				saveStage($user_id,1);
				saveLocationTaxonomy($input['country'], $input['state'], $input['city'], $current_user->post_id); // Create Taxonomy for Country, State, City
				sendEmail('prathamesh@thriive.in',$current_user->user_login.' stage 1 completed', $current_user->user_login.' has submitted personal details information.');
				
				sendEmail('accountmanager2@thriive.in',$current_user->user_login.' stage 1 completed', $current_user->user_login.' has submitted personal details information.');
				return generateJSON('success','Personal details added successfully','');			  
			} else {
				return generateJSON('error','Please login to proceed','');
			}
	} else {
		 return generateJSON('error','Enter required fields','');
	}
}

// Create Taxonomy for Country, State, City
function saveLocationTaxonomy($country, $state, $city, $id) {
	$country_name = $country;
	$state_name = $state;
	$city_name = $city;
	$taxonomy_name = 'location';
	$parent_id = '';
	
	//Country
	$country_exists = term_exists($country_name, $taxonomy_name);
	if(empty($country_exists)) {
		$result = wp_insert_term(
		    $country_name,   // the term 
		    $taxonomy_name, // the taxonomy
		    array('parent' => 0)
		);
		$country_exists = term_exists($country_name, $taxonomy_name);
		$parent_id = $country_exists['term_id'];
	} else {
		$parent_id = $country_exists['term_id'];
	}	
	wp_set_post_terms($id, $parent_id, $taxonomy_name);
	
	//State
	
	if($state_name != 'not_available') {
		$state_exists = term_exists($state_name, $taxonomy_name);
		if(empty($state_exists)) {	
			wp_insert_term(
			    $state_name,   // the term 
			    $taxonomy_name, // the taxonomy
			    array('parent' => $parent_id)
			);
			$state_exists = term_exists($state_name, $taxonomy_name);
			$parent_id = $state_exists['term_id'];
		} else {
			$parent_id = $state_exists['term_id'];
		}	
		wp_set_post_terms($id, $parent_id, $taxonomy_name, true);
	}
	
	if($city_name != 'not_available') {
		//City
		$city_exists = term_exists($city_name, $taxonomy_name);
		if(empty($city_exists)) {
			wp_insert_term(
			    $city_name,   // the term 
			    $taxonomy_name, // the taxonomy
			    array('parent' => $parent_id)
			);
			$city_exists = term_exists($city_name, $taxonomy_name);
			$parent_id = $city_exists['term_id'];
		} else {
			$parent_id = $city_exists['term_id'];
		}		
		wp_set_post_terms($id, $parent_id, $taxonomy_name, true);
	}	
	
	
/*
	$terms = get_terms([
	    'taxonomy' => $taxonomy_name,
	    'hide_empty' => false,
	]);
*/
}

function getTherapistExperience($practiceSince) 
{
	$practiceSinceDate = new DateTime($practiceSince);
	$currentDate = new DateTime( date( 'Y-m-d' ) );	
	$experience = $currentDate->diff($practiceSinceDate);	
	
	$year = ($experience->y > 1) ? 'years' : 'year';
	$month = ($experience->m > 1) ? 'months' : 'month';
	
	if($experience->y <= 0)
	{
		$total_experience = $experience->m . " $month";
	}
	else
	{
		$total_experience = $experience->y . " $year";
	}
	if($practiceSinceDate > $currentDate)
	{
		return '-' . $total_experience;
	}
	return $total_experience;
}
function rfa_add_admin_inline_js()
{
	//Disable future date in datepicker for therapist's therapy experience fields.
	?>
	<script type='text/javascript'>;
		jQuery( document ).ready( function( $ ) 
		{
			let $datepicker = $( '.acf-field-5bc5cf61e819d .acf-date-picker input.input' );	
			$datepicker.datepicker( 'option', 
			{
				maxDate: new Date()
			});
		});
	</script>
	<?php
}
add_action( 'admin_print_scripts', 'rfa_add_admin_inline_js' , PHP_INT_MAX);

function formatTherapistExperienceDate($date)
{
	$time = strtotime($date);
	$userExp = date('m/d/Y',$time);
	return $userExp;
}

function signup_seeker($input)
{
	global $seeker_msg;
	if ( username_exists( $input['email'] ) && email_exists($input['email'])) {
		global $signUp_login;
		$link = get_permalink(419);
		$seeker_msg = "<div class='error-msg form-error'>Email id already exists,<a href='$link' style='text-decoration:underline;'>click here to login</a></div>";
    	return $seeker_msg;
	} else {
		// if(isset($input['firstname']) && isset($input['email']) && isset($input['password']) && isset($input['g-recaptcha-response']) && !empty($input['g-recaptcha-response']))
		if(isset($input['firstname']) && isset($input['email']))
		{
			// $secret = RECAPTCHA_SITE_SECRET;
   //          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$input['g-recaptcha-response']);
   //          $responseData = json_decode($verifyResponse);
   //          if(!$responseData->success){
	  //           return generateJSON('error','Enter required fields','');
			// }
			$user_id = username_exists( $input['email'] );
			if ( !$user_id and email_exists($input['email']) == false ) 
			{
			   	$seekerDetails = array(
				    'user_login' =>  $input['email'],
				    'user_email'  =>  $input['email'],
				    'user_pass'  =>  $input['password'],
				);
				$user_id = wp_insert_user($seekerDetails);
				
				// $addressObj->country = $input['country'];
				// $addressObj->state = $input['state'];
				// $addressObj->city = $input['city'];
				// $address = json_encode($addressObj);
				// update_user_meta($user_id, 'address',  $address);
			  	
	/*
				update_user_meta($user_id, 'country',  $input['country']);
				update_user_meta($user_id, 'state',  $input['state']);
				update_user_meta($user_id, 'city',  $input['city']);
	*/
				
				auto_login_new_user($user_id);
				if($input['txtEventId'] != "" && $input['txtQuery'] != "")
				{
					$event_id = $input['txtEventId'];
					$question = $input['txtQuery'];
					$current_user = wp_get_current_user();
					$user_email = $current_user->user_email;
					$result = saveFAQQuery($event_id,$question,$user_email);
					wp_redirect(get_permalink($event_id) . "?event_query=saved");
					exit;
				}
				else if($input['lead_form_id'] != "" && $input['submission_email'] != "")
				{
					update_user_meta($user_id, 'lead_form_source',  get_the_title($input['lead_form_id']));
					$msg = str_replace("{{name}}", $input['firstname'], $input['submission_email']);
					$msg = str_replace("{{email}}", $input['email'], $msg);
					
					sendEmail($input['email'], get_the_title($input['lead_form_id']), $msg);
/*
					wp_redirect($input['destination_url']);
					exit;
*/
				}
				return generateJSON('success','You have successfully signed up.',array('user_id'=>$user_id));
			} 
			else 
			{
				update_user_meta($user_id, 'stage',  1);
				auto_login_new_user($user_id);
			    return generateJSON('error','User already exists, Please login','');
			}
		} 
		else 
		{
			 return generateJSON('error','Enter required fields','');
		}
    }
}

function add_new_user_column( $columns ) 
{	
    $new_columns = array();
    foreach ($columns as $column_name => $column_info) 
    {
        if ('heateor_ss_delete_profile_data' === $column_name) {
            $new_columns['lead_form_source'] = __('Lead Form Source', 'my-textdomain');
        }
        $new_columns[$column_name] = $column_info;
    }
    return $new_columns;
}

function fill_new_user_column_value( $val, $column_name, $user_id ) 
{ 
   	if ($column_name == 'lead_form_source') 
   	{
       $comment_count = get_user_meta($user_id, 'lead_form_source', true);
       return ($comment_count) ? $comment_count : "-";; 
   	}
   	return $val;
}

function make_filter_dropdown_for_lead_form_source( $which ) {

    // create sprintf templates for <select> and <option>s
    $st = '<select name="lead_form_source_%s" style="float:none;"><option value="">%s</option>%s</select>';
    $ot = '<option value="%s" %s>Section %s</option>';

	global $wpdb;
	$options = '';
    $lead_from_sources = $wpdb->get_col("SELECT DISTINCT(meta_value) FROM $wpdb->usermeta WHERE meta_key = 'lead_form_source'" );
    foreach($lead_from_sources as $lead_from_source)
    {   
	    if ($_GET[ 'lead_form_source_top' ] == str_replace(" ", "_", $lead_from_source) ) 
        {
            $options .= "<option value='".str_replace(" ", "_", $lead_from_source)."' selected='selected'>$lead_from_source</option>";
        } 
        else 
        {
            $options .= "<option value='".str_replace(" ", "_", $lead_from_source)."'>$lead_from_source</option>";
        }
    }

    $select = sprintf( $st, $which, __( 'Select Lead form source...' ), $options );

    // output <select> and submit button
    echo $select;
    submit_button(__( 'Filter' ), null, $which, false);
}

function filter_users_by_lead_form_source($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'users.php') 
    {
        if (!empty($_GET[ 'lead_form_source_top'])) 
        {
			$value = str_replace("_", " ", $_GET[ 'lead_form_source_top']);
            $meta_query = [['key' => 'lead_form_source','value' => $value, 'compare' => 'LIKE']];
            $query->set('meta_key', 'lead_form_source');
            $query->set('meta_query', $meta_query);
        }
    }
}

function update_seeker($input)
{
	//$current_user = wp_get_current_user();
	// print_r($input); exit;
	if( isset($input['firstname']) && isset($input['mobile']) )
	{
		$current_user = wp_get_current_user();
		$current_user_id = $current_user->ID;
		$seekerDetails = array(
			'ID' => $current_user_id,
		    //'user_login'  =>  $input['email'],
		    'first_name'  =>  $input['firstname'],
		    'last_name'  =>  $input['lastname'],
		);
		$user_id = wp_update_user($seekerDetails);
		update_user_meta($user_id, 'mobile',  $_POST['mobile']);
		
		// Update Address
		// $addressObj->city = $input['city'];
		// $addressObj->state = $input['state'];
		// $addressObj->country = $input['country'];	  	
		// $address = json_encode($addressObj);
	  	// update_user_meta($user_id, 'address',  $address);	

		echo '<div class="text-center upsuccess">Your profile successfully updated.</div>';	
	} 
	else 
	{
		 echo '<div class="text-center uperror">Enter required fields</div>';
	}
}

function deleteUser()
{
	$current_user = wp_get_current_user();		
	$username = $current_user->first_name . ' ' . $current_user->last_name;
	$useremail = $current_user->user_email;
	$mobileNo = $current_user->mobile;
	
	if($_POST['activity'] == 'deleting_account')
	{
		$u = new WP_User($current_user->ID);
		$u->set_role('pending_delete');
		
		if($current_user->post_id)
		{
			$my_post = array(
		      'ID'           => $current_user->post_id,
		      'post_status'  => 'pending-delete',
		      'post_type' => 'therapist'
			);
			wp_update_post( $my_post );
		}
		$msg = "
			$username has deleted their account. Their details are as follows:<br><br>
			Name: $username <br>
			Phone No: $mobileNo <br>
			Email: $useremail <br><br>
			
			Love & light,<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
			<em>";
		sendEmail("accountmanager2@thriive.in", "$username has deleted their account.", $msg);
		echo "1";
	}
	else if($_POST['activity'] == 'unsubscribe')
	{
		$reason = $_POST['reason'];
		$tell_us_more = $_POST['tell_us_more'];
		$msg = "
			$username has submitted account deleted reason.The reason are as follows:<br><br>
			Reason: $reason <br>
			Message: $tell_us_more <br><br>
			
			Love & light,<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
			<em>";
		sendEmail("accountmanager2@thriive.in", "$username has submitted account deleted reason.", $msg);
		echo "1";
	}	
	exit;
}

function deleteMyBlog()
{
	$current_user = wp_get_current_user();
	$post_id = $current_user->post_id;	
	$row_index = $_POST['row_index'];	
	delete_row('my_blogs', $row_index, $post_id);
	echo "1";
	exit;
}

function submit_review($input)
{
	if(isset($input['txtReview']) && isset($input['txtPostId']))
	{
		$current_user = wp_get_current_user();
        $comment = $input['txtReview'];

        $time = current_time('mysql');

        $data = array(
            'comment_post_ID' => $input['txtPostId'],
            'comment_author' => $current_user->first_name . ' ' .  $current_user->last_name,
            'comment_author_email' => $current_user->user_email,
            'comment_author_url' => get_author_posts_url($current_user->ID),
            'comment_content' => $comment,
            'user_id' => $current_user->ID,
		    'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
            'comment_date' => $time,
            'comment_approved' => 1,
        );
        wp_insert_comment($data);
	}
}
function saveMyBlog($input)
{
	if(isset($input['txtTitle']) && isset($input['txtLink']) && isset($_FILES['event_banner_img']))
	{
		$current_user = wp_get_current_user();
		$post_id = $current_user->post_id;
		
		$title = $input['txtTitle'];
		$link = $input['txtLink'];
		includeFiles();
		
		//If row_index exist it means update the blog , otherwise add the blog
		if(isset($input['row_index']))
		{
			$index = $input['row_index'];
			update_post_meta($post_id,'my_blogs_' . $index . '_blog_title',$title);
			update_post_meta($post_id,'my_blogs_' . $index . '_blog_link',$link);
			if($_FILES['event_banner_img']['name'] != "")
			{
				$img_id = media_handle_upload( 'event_banner_img', $post_id );
				update_field('my_blogs_' . $index . '_blog_image',$img_id,$post_id);
			}
		}
		else
		{
			$img_id = media_handle_upload( 'event_banner_img', $post_id );
			$new_blog = array(
				'blog_title'	=> $title,
				'blog_image'	=> $img_id,
				'blog_link'	=> $link
			);
			add_row('my_blogs', $new_blog,$post_id);
		}
		wp_redirect(get_permalink(1873));
	}
	
}
function getTherapistCommunicationMode()
{
	$post_id = $_POST['post_id'];
	$communication_modes = get_field('communication_mode',$post_id);
	ob_start();
	foreach($communication_modes as $communication_mode) 
	{
		?>						
			<div class="checkbox-wrapper col-6">
				<input type="checkbox" name="communication[]" value="<?php echo $communication_mode ?>" id="<?php echo $communication_mode ?>" data-parsley-multiple="communication" data-parsley-errors-container="#message-holder" required>
				<label for="<?php echo $communication_mode ?>"><?php echo $communication_mode ?></label>
			</div>
		<?php 
	}
	echo $communication_mode = ob_get_clean();
	exit;
}
function connectWithHealer($input)
{
	if (!is_user_logged_in()) 
	{ 
		wp_redirect(get_permalink(419));	//Sending seeker to login page
		exit();
	} 
	else
	{
		//print_r($input['communication']);exit;
		if(isset($input['communication']))
		{
			//Collecting User's details
			$current_user = wp_get_current_user();
			$current_user_id = $current_user->ID;
			$healer_email = "";
			
			//Collecting Therapist's details by post id if exist
			$healer_details = get_users(array('meta_key' => 'post_id','meta_value' => $input['postId']));
			if($healer_details)
			{				
				foreach($healer_details as $healer_detail)
				{
					$healer_id = $healer_detail->ID;
					$healer_email = $healer_detail->user_email;
				}
				
				for($i=0; $i< count($input['communication']); $i++)
				{
					$connect_healer_by = strtolower("connect_with_healer_by_" . str_replace(' ','_',$input['communication'][$i]));
					$connect_healer_with = $healer_id;

					$connect_seeker_by = strtolower("connect_with_seeker_by_" . str_replace(' ','_',$input['communication'][$i]));
					$connect_seeker_with = $current_user_id;
					
					//Updating seeker's account
					$havemeta = get_user_meta($current_user_id, $connect_healer_by, true);
					if($havemeta)
					{	
						if (strpos((string)$havemeta, (string)$healer_id) === false) 
					    {
					        $connect_healer_with = $havemeta . ',' . $healer_id;
							update_user_meta($current_user_id, $connect_healer_by,  $connect_healer_with);
					    }
					}
					else
					{
						update_user_meta($current_user_id, $connect_healer_by,  $connect_healer_with);						
					}
					
					//Updating therapist's account
					$havemetaHealer = get_user_meta($healer_id, $connect_seeker_by, true);
					if($havemetaHealer)
					{	
						if (strpos((string)$havemetaHealer, (string)$current_user_id) === false) 
					    {
					        $connect_seeker_with = $havemetaHealer . ',' . $current_user_id;
							update_user_meta($healer_id, $connect_seeker_by,  $connect_seeker_with);
					    }
					}
					else
					{
						update_user_meta($healer_id, $connect_seeker_by,  $connect_seeker_with);						
					}
					
					//Counting contacted therapist and saving in usermeta table
					$totalContactedTherapist = get_user_meta($current_user_id, 'contacted_therapist_id', true);
					if($totalContactedTherapist)
					{
						if (strpos((string)$totalContactedTherapist, (string)$healer_id) === false) 
					    {
					    	//Updating id
						    $connect_healer_with = $totalContactedTherapist . ',' . $healer_id;
							update_user_meta($current_user_id, 'contacted_therapist_id',  $connect_healer_with);

							//Updating date
							$contacted_therapist_date = get_user_meta($current_user_id,'contacted_therapist_date',true);
							$contacted_therapist_date = $contacted_therapist_date . ', ' . date("Y-m-d");
							update_user_meta($current_user_id, 'contacted_therapist_date', $contacted_therapist_date);

							//Updating time
							$contacted_therapist_time = get_user_meta($current_user_id,'contacted_therapist_time',true);
							$contacted_therapist_time = $contacted_therapist_time . ', ' . date("h:i:sa");
							update_user_meta($current_user_id, 'contacted_therapist_time', $contacted_therapist_time);
						}
					}
					else
					{
					    //Updating id
						update_user_meta($current_user_id, 'contacted_therapist_id', $connect_healer_with);
						//Updating date
						update_user_meta($current_user_id, 'contacted_therapist_date', date("Y-m-d"));
						//Updating time
						update_user_meta($current_user_id, 'contacted_therapist_time', date("h:i:sa"));
					}
					
					
					//Counting contacted seeker and saving in usermeta table
					$totalContactedSeeker = get_user_meta($healer_id, 'contacted_seeker_id', true);
					if($totalContactedSeeker)
					{
						if (strpos((string)$totalContactedSeeker, (string)$current_user_id) === false) 
					    {
					    	//Updating id
						    $connect_seeker_with = $totalContactedSeeker . ',' . $current_user_id;
							update_user_meta($healer_id, 'contacted_seeker_id',  $connect_seeker_with);

							//Updating date
							$contacted_seeker_date = get_user_meta($healer_id,'contacted_seeker_date',true);
							$contacted_seeker_date = $contacted_seeker_date . ', ' . date("Y-m-d");
							update_user_meta($healer_id, 'contacted_seeker_date', $contacted_seeker_date);

							//Updating time
							$contacted_seeker_time = get_user_meta($healer_id,'contacted_seeker_time',true);
							$contacted_seeker_time = $contacted_seeker_time . ', ' . date("h:i:sa");
							update_user_meta($healer_id, 'contacted_seeker_time', $contacted_seeker_time);
						}
					}
					else
					{
					    //Updating id
						update_user_meta($healer_id, 'contacted_seeker_id', $connect_seeker_with);	
						//Updating date
						update_user_meta($healer_id, 'contacted_seeker_date', date("Y-m-d"));
						//Updating time
						update_user_meta($healer_id, 'contacted_seeker_time', date("h:i:sa"));				
					}					
				}

				//connectMsgToSeeker($healer_id);
				//connectMsgToHealer($healer_id);
				//send masked number to both seeker and healer
				consult_online_thriive_therapist($healer_email,$current_user->user_email);
				
				global $connect_msg;
				$connect_msg = "true";
				global $connect_post_id;
				$connect_post_id = $input['postId'];
				return generateJSON('error','Connect request has been sent to therapist.','');
			}
			else
			{
				return generateJSON('error','User doesn\'t exist','');
			}				
		}
	}
}

// Update seq no in options
function wpse_check_settings( $old_value, $new_value )
{
	if($old_value != $new_value) {
		update_option('invoice_seq_no', 1);
	}    
}

function saveStage($user_id,$stage){
	$data = wp_get_current_user()->completed_stages;
	$data[$stage-1]=1;
	update_user_meta($user_id, 'completed_stages',  $data);
}

function isStageCompleted($user_id){
	
	$name = wp_get_current_user()->first_name . " " . wp_get_current_user()->last_name;
	
	$data = wp_get_current_user()->completed_stages;
	if (in_array("0", $data)) {
		$position = array_search(0,$data);
		update_user_meta($user_id, 'stage',  ($position+1));
		$my_post = array(
	      'ID'           => wp_get_current_user()->post_id,
	      'post_status'  => 'draft',
	      'post_type' => 'therapist'
		);
		
		// Update the post into the database
		  wp_update_post( $my_post );
		return  0;
	} else {
		update_user_meta($user_id, 'stage',  5);
		$userPost = get_post(wp_get_current_user()->post_id);
	   for ($x = 1; $x < 4; $x++) {
			  $email = '';
		
			  if($x==1){
				  $email = $userPost->first_reference_email;
			  } else if($x==2){
				  $email = $userPost->second_reference_email;
			  } else if($x==3){
				  $email = $userPost->third_reference_email;
			  }
			$codeD = $email.wp_get_current_user()->ID . time();  
		    $code = sha1( $codeD );
		    $activation_link = add_query_arg( array( 'key' => $code, 'user' => wp_get_current_user()->ID,'feed_ref' => 'ref_'.$x ), get_permalink( 510 ));
	       $resultData =  update_user_meta( wp_get_current_user()->ID, 'ref_'.$x, $code );
	       //$link = $activation_link . " User email address : " . $email;
	       
	       $msg = "Hello from Thriive.in We are India’s leading digital wellness portal that verifies and registers Therapists.  As part of our verification process all our eligible Therapists need to provide us with referrals whom we may contact independently. Your name has been given as a reference for $name.  Please follow the link given below to complete your review. It will take about 2 minutes of your time.<br><br>
		       		
		       		$activation_link <br><br> 
	 
	If you’re in the mood for change, do visit www.thriive.in. A new universe awaits you within these digital walls. Transformation begins at our doorstep (or URL). Whether you’re just exploring or are a serious seeker you will find our free library of talks, articles and guided meditations practical and useful. If wellness overwhelms you we will show you the best way to wellness designed for you! Enlightening events and workshops worldwide are just a click away. Every soul craves evolution.<br><br>
	
	Thank you so much for taking the time to fill out the review! We are grateful to you!<br><br>
	 
	Love & light,<br>
	Team Thriive<br><br>
	<em style='color: #615c5c;'>
		Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
	<em>";
	       sendEmail( $email, "Do you know $name? Let’s chat!", $msg);
		}
		return 1;
	}
}

function getHash($input){
	$retHashSeq = SALT.'|'.$input["status"].'|||||||||'.$input["udf2"].'|'.$input["udf1"].'|'.$input["email"].'|'.$input["firstname"].'|'.$input["productinfo"].'|'.					$input["amount"].'|'.$input["txnid"].'|'.$input["key"];
	$hashKey = hash("sha512", $retHashSeq);
	return $hashKey;
}

function getOCHash($input){
	$retHashSeq = SALT.'|'.$input["status"].'||||||'.$input["udf6"].''.$input["udf5"].'|'.$input["udf4"].'|'.$input["udf3"].'|'.$input["udf2"].'|'.$input["udf1"].'|'.$input["email"].'|'.$input["firstname"].'|'.$input["productinfo"].'|'.					$input["amount"].'|'.$input["txnid"].'|'.$input["key"];
	$hashKey = hash("sha512", $retHashSeq);
	return $hashKey;
}

function updateUserDetails($input){
	$txId= $input['txnid'];
	$amount = $input['amount'];
	$paymentAction = $input['udf1'];	// udf1 have payment action type (Renew, upgrade, purchase)
	$package_id = $input['udf2'];  // udf2 have package Id
	
	if(!empty($txId)){
	  		if(is_user_logged_in()){

		  		$user_id = wp_get_current_user()->ID;
		  		$userPost = get_post(wp_get_current_user()->post_id);
		  		$package = get_post($userPost->select_package[0]);
				
				$date = new DateTime('now');
				$post_id = wp_insert_post(array (
				  'post_type' => 'transaction',
				  'post_title' => $user_id.'-'.$txId,
				  'post_author' => $user_id,
				  'post_content' => ' Payment successful',
				  'post_status' => 'draft'
				));
				
				update_field('transaction_id',$txId,$post_id);
				update_field('product_id',$package_id,$post_id);	//changed
				update_field('product_type',188,$post_id);
				update_field('date',date('F d, Y'),$post_id);
				update_field('payment_mode','Online',$post_id);
				update_field('payment_gateway','payu',$post_id);
				update_field('start_date',date('F d, Y'),$post_id);
				update_field('end_date',$date->modify('+12 month')->format('F d, Y'),$post_id);
				update_field('total_amount',$amount,$post_id); 	//changed				
				//update_field('package_expiry_date',$date->modify('+12 month')->format('F d, Y'),wp_get_current_user()->post_id); 	//changed
								
				update_user_meta($user_id, 'transaction',  $post_id);
				update_user_meta($user_id, 'stage',  6);
				update_user_meta($user_id, 'is_mobile_verify',  1);
				update_user_meta($user_id, 'completed_stages',  array('1','1','1','1'));
				$my_post = array(
				      'ID'           => wp_get_current_user()->post_id,
				      'post_status'  => 'publish',
				      'post_type' => 'therapist'
					);	
				// Update the post into the database
				wp_update_post( $my_post );
				$regdate = current_time('d-m-Y H:i:s');
    			update_post_meta('t_registration_date',$regdate, wp_get_current_user()->post_id);
    			if(empty(get_field("area", wp_get_current_user()->post_id)) && !empty(get_field("address", wp_get_current_user()->post_id)) && !empty(get_field("zipcode", wp_get_current_user()->post_id))){
					$area = get_field("area", wp_get_current_user()->post_id);
					$address = get_field("address", wp_get_current_user()->post_id);
					$zipcode = get_field("zipcode", wp_get_current_user()->post_id);
					update_post_area(wp_get_current_user()->post_id,$area,$address,$zipcode);
				}
				if($paymentAction == "upgrade_package" || $paymentAction == "renew_package")
				{
					//Get Package detail
					$get_package = get_field("select_package",wp_get_current_user()->post_id);
				    $oldPackageName = $get_package[0]->post_title;
					update_post_meta(wp_get_current_user()->post_id, 'old_package', $oldPackageName);
					
					update_field('select_package',$package_id,wp_get_current_user()->post_id);
				}
				
				//Degrading the package
				if($paymentAction == "renew_package")
				{
					degradingUserPackage();
				}
/*
				else if($paymentAction == "renew_package")
				{
					update_field('select_package',$package_id,wp_get_current_user()->post_id);
				}
*/
				return generateJSON('success','payment successful','');			  
			} else {
				return generateJSON('error','payment failed','');
			}
	} else {
		 return generateJSON('error','Enter required fields','');
	}
}
function updateFreeUserDetails($input)
{
	if(is_user_logged_in())
	{
		$paymentAction = $input['udf1'];	// udf1 have payment action type (Renew, upgrade, purchase)
		$package_id = $input['udf2'];  // udf2 have package Id
		
		$user_id = wp_get_current_user()->ID;
  		$userPost = get_post(wp_get_current_user()->post_id);
  		$package = get_post($userPost->select_package[0]);
  		
  		update_user_meta($user_id, 'stage',  6);
		update_user_meta($user_id, 'is_mobile_verify',  1);
		update_user_meta($user_id, 'completed_stages',  array('1','1','1','1'));
		
		$my_post = array(
	      'ID'           => wp_get_current_user()->post_id,
	      'post_status'  => 'publish',
	      'post_type' => 'therapist'
		);
		wp_update_post( $my_post );
		$regdate = current_time('d-m-Y H:i:s');
    	update_post_meta('t_registration_date',$regdate, wp_get_current_user()->post_id);
    	if(empty(get_field("area", wp_get_current_user()->post_id)) && !empty(get_field("address", wp_get_current_user()->post_id)) && !empty(get_field("zipcode", wp_get_current_user()->post_id))){
			$area = get_field("area", wp_get_current_user()->post_id);
			$address = get_field("address", wp_get_current_user()->post_id);
			$zipcode = get_field("zipcode", wp_get_current_user()->post_id);
			update_post_area(wp_get_current_user()->post_id,$area,$address,$zipcode);
		}
		
		if($paymentAction == "upgrade_package" || $paymentAction == "renew_package")
		{
			update_field('select_package',$package_id,wp_get_current_user()->post_id);
		}
		
		//Degrading the package
		if($paymentAction == "renew_package")
		{
			degradingUserPackage();
		}
/*
		else if($paymentAction == "renew_package")
		{
			update_field('select_package',$package_id,wp_get_current_user()->post_id);
		}
*/
		return generateJSON('success','payment successful','');
	} 
	else 
	{
		return generateJSON('error','payment failed','');
	}
}

function degradingUserPackage()
{
	$post_id = wp_get_current_user()->post_id;
	$userPost = get_post($post_id);
	$package = get_post($userPost->select_package[0]);
	
	//Therapies
	if($userPost->therapy > $package->number_of_therapies)
	{
		$total_allowed = $package->number_of_therapies + 1;
		for($i = $total_allowed; $i <= $userPost->therapy; $i = $total_allowed)
		{
			delete_row('therapy', $i, $post_id);	
			//echo $i . "<br>";	
		}
	}
	
	//Gallery images
	if($userPost->gallery > $package->number_of_images)
	{
		$total_allowed = $package->number_of_images + 1;
		for($i = $total_allowed; $i <= $userPost->gallery; $i = $total_allowed)
		{
			delete_row('gallery', $i, $post_id);	
			//echo $i . "<br>";	
		}
	}
	
	//Gallery videos
	if($userPost->videos > $package->number_of_videos)
	{
		$total_allowed = $package->number_of_videos + 1;
		for($i = $total_allowed; $i <= $userPost->videos; $i = $total_allowed)
		{
			delete_row('videos', $i, $post_id);	
			//echo $i . "<br>";	
		}
	}
	
	//Events					
	$createdThriiveEvent = explode(",",get_user_meta($current_user->ID,'my_events',true));
	$totalCreatedThriiveEvent = count(array_filter($createdThriiveEvent));
	if($totalCreatedThriiveEvent > $package->number_of_events)
	{
		$total_allowed = $package->number_of_events;
		for($i = $total_allowed; $i < $totalCreatedThriiveEvent; $i++)
		{
			//Deleting the post
			wp_delete_post($createdThriiveEvent[$i]);							
			//Searching the key
			$key = array_search($createdThriiveEvent[$i], $createdThriiveEvent);
			//Removing the key from the array
			unset($createdThriiveEvent[$key]);
			//convert array to comma separated string
			$createdThriiveEvent = implode(",", $createdThriiveEvent);
			//Updating in user meta
			update_user_meta(wp_get_current_user()->ID, 'my_events', $createdThriiveEvent);
		}
	}
}

// Registering custom post status
function wpb_custom_post_status(){
    register_post_status('pending_payment', array(
        'label'                     => _x( 'Pending payment', 'therapist' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Pending payment <span class="count">(%s)</span>', 'Pending payment <span class="count">(%s)</span>' ),
    ) );
}
 
// Using jQuery to add it to post status dropdown
function wpb_append_post_status_list(){
	global $post;
	$complete = '';
	$label = '';
	if($post->post_type == 'therapist'){
		if($post->post_status == 'pending_payment'){
			$complete = ' selected="selected"';
			$label = '<span id="post-status-display"> Pending payment</span>';
		}
		echo '
		<script>
		jQuery(document).ready(function($){
		$("select#post_status").append("<option value=\"pending_payment\" '.$complete.'>Pending payment</option>");
		$(".misc-pub-section label").append("'.$label.'");
		});
		</script>
		';
	}
}

function getDefaultPackageTherapyCount(){
	$pCount = 0;
	$packageArgs = array( 'post_type' => 'packages', 'posts_per_page' => 10, 'orderby'   => 'meta_value', 'order' => 'ASC' );
    $packages = new WP_Query( $packageArgs );
    
    while ( $packages->have_posts() ) : $packages->the_post();  
    	if(get_field('isdefault') == '1') {
	    	$pCount = get_field('number_of_therapies');
    	} 
	endwhile;	
	wp_reset_postdata();
	return $pCount;	
}

function getTherapyList(){
	$current_user = wp_get_current_user();
	$userPost = get_post($current_user->post_id);
	if(empty($_POST['therapy_count'])) {
		$totalTherapies = getDefaultPackageTherapyCount();
	} else {
		$totalTherapies = intval( $_POST['therapy_count'] );
	}
	if(!empty($_POST['package_name'])) {
		$package_name = $_POST['package_name'];
	}
		
	//$totalTherapies = 3;
	$taxonomyArray = array(
      'taxonomy' => 'therapy',
      'hide_empty' => false 
    );
      	
    $therapy_terms = get_terms($taxonomyArray);
    //echo '<pre>';print_r($therapy_terms);echo '</pre>';
	for ($x = 0; $x < $totalTherapies; $x++) {
		$varExp = 'therapy_'.$x.'_experience';
		$varCharge = 'therapy_'.$x.'_charges';
		$varName = 'therapy_'.$x.'_therapy_name';
		?>
		<div class="add_therapy_section">
			<div class="form-group sel">
				<label for="therapy-1" class="d-block">Therapy <?php echo $x+1;echo ($x == 0)?'*':'' ?></label>
					<select class="form-control select-list-item select-dropdown-list<?php echo ($x == 0)?'':' therapy-select'?>" id="therapy-list_<?php echo $x+1; ?>" name="t_name_<?php echo $x+1; ?>" data-parsley-required-message="Therapy is required." data-parsley-errors-container="#select-therapy-error_<?php echo $x+1; ?>" <?php echo ($x == 0)?'required':''?>>
						<option value="">Select Therapy</option>
						<?php foreach($therapy_terms as $therapy) { 
							if($therapy->parent != 0){
						?>
								<option value="<?php echo $therapy->term_id .'-'. $therapy->name; ?>" data-slug="<?php echo $therapy->slug; ?>"
								<?php
									if(!empty($userPost->$varName)) { echo (($userPost->$varName[0])==($therapy->term_id))?'selected':''; }
								?>								
								><?php echo $therapy->name;?></option>
						<?php }} ?>
					</select>
					<div id="select-therapy-error_<?php echo $x+1; ?>"></div>
			</div>
			<div class="form-group all_ailments">
				<img src = "<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif" class="loader" style="display:none; width: 100px;" id="loader_<?php echo $x+1; ?>">
				<div id="sel_issue_<?php echo $x+1; ?>"></div>
			</div>
 	  		<div class="form-group exp">
				<label for="experience">Experience (Practices since)<?php echo ($x == 0)?'*':''?></label><br/><span style="font-size: 14px; font-weight: bold;">*Select Year , Month and Date</span>
			    <input type="text" class="date_picker form-control<?php echo ($x == 0)?'':' therapy-exp'?>" id="experience_<?php  echo $x+1; ?>" name="t_experience_<?php  echo $x+1; ?>" value="<?php echo $userPost->$varExp;?>" data-parsley-required-message="Experience is required." <?php echo ($x == 0)?'required':''?> readonly>
	  		</div>			  		
	  		<div class="form-group chg">
				<label for="charges">Charges<?php echo ($x == 0)?'*':''?></label>
			    <input type="number" class="form-control therapy-chg" id="charges_<?php echo $x+1; ?>" name="t_charges_<?php  echo $x+1; ?>" value="<?php echo $userPost->$varCharge;?>" data-parsley-required-message="Charges is required." <?php echo ($x == 0)?'required':''?>>
			    <div id="chg_error" style="color:red"></div>
	  		</div>
	  	</div>
<?php
	} 
	if($package_name == 'Fire') { ?>
		<p>If you have selected Fire package you can add more than 5 therapies after the registration process is completed.</p>
	<?php }
	if(!empty($_POST['therapy_count'])) { 
		wp_die();
	}
	//wp_die();
}

function savePackageDetails($input){
	if(isset($input['total_therapies']) && isset($input['package']) && isset($input['communication'])){
			if(is_user_logged_in()){
				$current_user = wp_get_current_user();
				$post_id = $current_user->post_id;
				$total_therapies = intval($input['total_therapies']);
				//$therapy_count_final = 0;
				$i=0;
				for ($x = 0; $x < $total_therapies; $x++) 
				{		
					//Update therapy acf field if therapy name exist
					if(!empty($input['t_name_'.($x+1)]))
					{
						$therapy = explode('-',$input['t_name_'.($x+1)]);
						
						update_field('therapy_'.$i.'_therapy_name', array($therapy[0]),$post_id);
						update_field('therapy_'.$i.'_experience',$input['t_experience_'.($x+1)],$post_id);
						update_field('therapy_'.$i.'_charges',$input['t_charges_'.($x+1)],$post_id);
						update_field('therapy_'.$i.'_issues',$input['issues_'.($x+1)],$post_id);
						foreach($input['issues_'.($x+1)] as $issue){
							$issue_id[] = $issue;
							wp_set_post_terms($current_user->post_id, $issue_id, 'ailment' );
						}
						$i++;
						$parent_id = get_term($therapy[0],'therapy')->parent;
						$therapy_id[] = $therapy[0];
						$therapy_id[] = $parent_id;
						wp_set_post_terms($current_user->post_id, $therapy_id, 'therapy' );
					}														
				}
				
				if(!isset($_GET['edit-step'])){
					if($input['package'] == "")
					{
						update_field('select_package',array(129),$post_id);
					}
					else
					{
						update_field('select_package',array($input['package']),$post_id);					
					}
				}

				if(isset($input['is_review_b4_publish'])){
					$my_post = array(
				    'ID'           => $post_id,
				    'post_status' => 'review-b4-publish',
				    'post_type' => 'therapist'
					);
					wp_update_post($my_post);
					update_user_meta($current_user->ID, 'is_review_b4_publish', 0);
					sendEmail('prathamesh@thriive.in',$current_user->user_login.' stage 2 completed', $current_user->user_email.' has filled all required fields and submitted package details information.');
					sendEmail('accountmanager2@thriive.in',$current_user->user_login.' stage 2 completed', $current_user->user_email.' has filled all required fields and submitted package details information.');
				} else {
					sendEmail('prathamesh@thriive.in',$current_user->user_login.' stage 2 completed', $current_user->user_email.' has submitted package details information.');
					sendEmail('accountmanager2@thriive.in',$current_user->user_login.' stage 2 completed', $current_user->user_login.' has submitted package details information.');
					
				}
				
				update_field('communication_mode',$input['communication'],$post_id);
				//update_post_meta($post_id,'therapy_count',$total_therapies);	
				//update_post_meta($post_id, 'therapy', $therapy_count_final);	
				update_post_meta($post_id, 'therapy', $i);			
				update_user_meta($current_user->ID, 'stage',  3);
				saveStage($current_user->ID,2);
				return generateJSON('success','Package details added successfully','');			  
			} else {
				return generateJSON('error','Please login to proceed','');
			}
	} else {
		return generateJSON('error','Enter required fields','');
	}
}

function saveEditedTherapies($input){
	if(isset($input['total_therapies'])){
		if(is_user_logged_in()){
			$current_user = wp_get_current_user();
			$post_id = $current_user->post_id;
			$total_therapies = intval($input['total_therapies']);
			
			for ($x = 0; $x < $total_therapies; $x++) {				
				update_field('therapy_'.$x.'_charges', $input['t_charges_'.($x+1)], $post_id);				
			}	
			$page = get_page_by_path('edit-therapies');
			wp_redirect(get_permalink($page->ID).'?updated=1');
			return generateJSON('success','Therapies edited successfully','');			  
		} else {
			return generateJSON('error','Please login to proceed','');
		}
	} else {
		return generateJSON('error','Enter required fields','');
	}
}

function saveSocialNetworkDetails($input){
		if(is_user_logged_in()){	
				$current_user = wp_get_current_user();
				$post_id = $current_user->post_id;
				
				//Updating therapist's get_the_content()
				$my_post = array(
				    'ID'           => $post_id,
				    'post_content' => $input['about_you'],
				);
				wp_update_post($my_post);
			 	
			 	//Therapist language
			    if($input['language'])
			    {
				    $getLanguage = str_replace(" ","",$input['language']);
				    $languages = explode(",",$getLanguage);
				    foreach($languages as $language)
				    {
				        $isTermExist = term_exists($language,'language');
						if($isTermExist)
						{
							$language_term_id[] = $isTermExist['term_id'];
						}
						else
						{
							$result = wp_insert_term($language,'language');
							$language_term_id[] = $result['term_id'];
						}
				    }
				    //set term to post
				    wp_set_post_terms($current_user->post_id, $language_term_id, 'language' );
				    $language_term_id = json_encode($language_term_id);
				    update_user_meta($user_id, 'language', $language_term_id);
			    }
				
				update_field('website_url',generateValidUrl($input['website']),$post_id);
				update_field('therapist_title',$input['therapistTitle'],$post_id);
				update_field('facebook_url',generateValidUrl($input['facebook']),$post_id);
				update_field('twitter_url',generateValidUrl($input['twitter']),$post_id);
				update_field('instagram_url',generateValidUrl($input['instagram']),$post_id);
				update_field('linkedin_url',generateValidUrl($input['linkedIn']),$post_id);
				update_field('skype_call',generateValidUrl($input['skype_call']),$post_id);
				update_field('youtube',generateValidUrl($input['youtube']),$post_id);
				//update_field('experience_profile',$input['experience_profile'],$post_id);
				update_user_meta($current_user->ID, 'stage',  4);
				saveStage($current_user->ID,3);
				sendEmail('prathamesh@thriive.in',$current_user->user_login.' stage 3 completed', $current_user->user_login.' has submitted socail network details information.');
				sendEmail('accountmanager2@thriive.in',$current_user->user_login.' stage 3 completed', $current_user->user_login.' has submitted socail network details information.');
				
			return generateJSON('success','Details added successfully','');			  
		} else {
			return generateJSON('error','Please login to proceed','');
			wp_die();
		}
}

function saveVerificationDetails($input){
	//print_r($_FILES);
	//print_r($_FILES['profile_picture']); 
		//print_r($_FILES['identity_picture']['name']);
		//exit;

	if(/* isset($input['identity_option']) && */ isset($input['ref_email_1']) && isset($input['ref_email_2']) && isset($input['ref_email_3']) /* && isset($input['identity_doc_number']) */){
		if(is_user_logged_in()){
				$current_user = wp_get_current_user();
				$post_id = $current_user->post_id;
				$post_status = get_post_status($post_id);
				
				update_field('first_reference_name',$input['reference_name_1'],$post_id);
				update_field('first_reference_email',$input['ref_email_1'],$post_id);
				update_field('second_reference_name',$input['reference_name_2'],$post_id);
				update_field('second_reference_email',$input['ref_email_2'],$post_id);
				update_field('third_reference_name',$input['reference_name_3'],$post_id);
				update_field('third_reference_email',$input['ref_email_3'],$post_id);
				//update_field('select_identity_proof',$input['identity_option'],$post_id);
				//update_field('identity_number',$input['identity_doc_number'],$post_id);
				update_field('gstin_number', $input['gstin_number'], $post_id);
				
				includeFiles();
				
				
				if($_FILES['identity_picture']['name'] != "")
				{
					$identity_picture_id = media_handle_upload( 'identity_picture', $post_id );
					$returnData = update_field('select_identity_image',$identity_picture_id,$post_id);
				}
				
				
				if($_FILES['profile_picture']['name'] != "")
				{
					$profile_picture_id = media_handle_upload( 'profile_picture', $post_id );
					set_post_thumbnail( $post_id, $profile_picture_id );
					update_field('profile_picture',$profile_picture_id,$post_id);
				}
				
				
/*
				if($_FILES['address_picture']['name'] != "")
				{
					$address_picture_id = media_handle_upload( 'address_picture', $post_id );
					update_field('address_proof',$address_picture_id,$post_id);
				}
*/
				
				$files = $_FILES['certificate_picture'];
				
				$total_images=0;
				foreach ($files['name'] as $key => $value) {
					if ($files['name'][$key]) {
			            $file = array(
			                'name' => $files['name'][$key],
			                'type' => $files['type'][$key],
			                'tmp_name' => $files['tmp_name'][$key],
			                'error' => $files['error'][$key],
			                'size' => $files['size'][$key]
			            );
			       
			            $_FILES = array('certificates_'.$key.'_certificate' => $file);
			            //print_r($_FILES);
			            $attachment_id = media_handle_upload( 'certificates_'.$key.'_certificate', wp_get_current_user()->post_id );
			            //echo $attachment_id;
			            $certificate_row = array('certificate' => $attachment_id);
						$resultData = add_row('certificates', $certificate_row, wp_get_current_user()->post_id);
			            //$res = update_field('certificates_'.$key.'_certificate',$attachment_id,wp_get_current_user()->post_id);
			        }
			    $total_images = $key;
			    }
		        
		        //update_post_meta(wp_get_current_user()->post_id,'certificates',($total_images+1),true);
        
				//update_field('identity_number',$input['identity_doc_number'],$post_id);
								
				if($post_status != "publish" && $post_status != "pending-payments" || $post_status == "review-b4-publish")
				{
					saveStage($current_user->ID,4);
					$returnData = isStageCompleted($current_user->ID);
					if($returnData==1) {
						if($post_status != "review-b4-publish"){
							$my_post = array(
						      'ID'           => wp_get_current_user()->post_id,
						      'post_status'  => 'pending',
						      'post_type' => 'therapist'
							);
							// Update the post into the database
							wp_update_post( $my_post );
						}
											
						$therapistMetaData = get_user_meta($current_user->ID);
						$theraistMobileNumber = $therapistMetaData['mobile'][0];
					  	$userName = $current_user->first_name . " " . $current_user->last_name;
					  	$userEmail = $current_user->user_email;
						//echo "Id= " . $theraistMobileNumber;
						$tempid="1007732984363410848";
						//Sending SMS & Email to Therapist
						$customer_msg = "Thank you for submitting your registration form for Thriive.in. Our team is verifying your form and will contact you as soon as it's complete.";
						sendSMS($theraistMobileNumber, $customer_msg,$tempid);
						$msg = "
							Dear $userName,<br><br>
							$customer_msg <br><br>
							Love & light,<br>
							Team Thriive<br><br>
							<em style='color: #615c5c;'>
								Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
							<em>			
						";
						sendEmail($userEmail, 'Your Thriive registration form is in verification!', $msg);
						
						
						//Sending Email to Admin
					  	$userName = $current_user->first_name . " " . $current_user->last_name;
					  	$userEmail = $current_user->user_email;
					  	$msg = "
						  	Dear Account Manager,<br><br>				  	
							You have received the registration form from a web applicant. Please review to process their application within two working days. Details are as follows:<br><br>					 
							Name of Therapist: $userName<br><br>					 
							Email of Therapist: $userEmail<br><br>					 
							Please login to Admin Dashboard to view the details.<br>
							We have sent emails with review links to three reviewers submitted by Therapist. Acknowledgement will be sent once they are received.<br><br>					
							Love & light,<br>
							Team Thriive
						";
						sendEmail('accountmanager2@thriive.in', $userName . ' has submitted the registration form!', $msg);
					}
				}
				sendEmail('manishj@thriive.in',$current_user->user_email.' stage 4 completed', $current_user->user_email.' has submitted the form for verification.');
			return generateJSON('success','Verification details saved successfully','');
		} else {
			return generateJSON('error','Please login to proceed','');
		}
	} else{
		return generateJSON('error','Enter required fields','');
	}
}

function getTherapistLocation($id)
{
	$locations = get_terms('location', array('parent' => 0, 'object_ids' => $id));
	if($locations)
	{
		$country_id = $locations[0]->term_id;
		$country_name = $locations[0]->name;
		$state_name = '';
		
		$state = get_terms('location', array('parent' => $country_id, 'object_ids' => $id));
		if($state)
		{
			$state_id = $state[0]->term_id;
			$state_name = $state[0]->name;
		
			$city = get_terms('location', array('parent' => $state_id, 'object_ids' => $id));
			if($city)
			{
				$city_name = $city[0]->name;
			}
		}
		if(empty($city_name)) 
		{
			if(!empty($state_name))
			{
				$state_name = $state_name . ", ";
			}
			$therapist_location = $state_name . $country_name;
		} else {
			$therapist_location = $city_name . ", " . $country_name;
		} 
	}
	else
	{
		$therapist_location = "";
	}
	return $therapist_location;
}
function getTherapistCity($id)
{
	$locations = get_terms('location', array('parent' => 0, 'object_ids' => $id));
	if($locations)
	{
		$country_id = $locations[0]->term_id;
		$country_name = $locations[0]->name;
		
		$state = get_terms('location', array('parent' => $country_id, 'object_ids' => $id));
		if($state)
		{
			$state_id = $state[0]->term_id;
			$state_name = $state[0]->name;
		
			$city = get_terms('location', array('parent' => $state_id, 'object_ids' => $id));
			if($city)
			{
				$city_name = $city[0]->name;
			}
		}
		if(!empty($city_name)) 
		{
			$therapist_city = $city_name;
		} 
		else 
		{
			$therapist_city = "";
		} 
	}
	else
	{
		$therapist_city = "";
	}
	return $therapist_city;
}
function getTherapistCountry($id)
{
	$locations = get_terms('location', array('parent' => 0, 'object_ids' => $id));
	if($locations)
	{
		$country_name = $locations[0]->name;
	}
	else
	{
		$country_name = "";
	}
	return $country_name;
}

function getTherapistLanguage($post_id)
{
	$languages = get_field("language",$post_id);
	if($languages)
	{
		foreach($languages as $language)
		{
			$tr = get_term( $language, "language");
			$therapist_lang[] = $tr->name;
		}
		$therapist_lang = implode(", ", $therapist_lang);
	}
	else
	{
		$therapist_lang = '';
	}
	echo $therapist_lang;
}

function generateJSON($status,$resMessage,$resData){
	$responseObj->resStatus = $status;
	$responseObj->resMessage = $resMessage;
	$responseObj->resData = $resData;	
	return json_encode($responseObj);
}

function auto_login_new_user( $user_id ) {
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
}

function generatePIN(){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < 4){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}

function verifyOTP(){
	$OTPNumber =  intval($_POST['mobile_otp']);
	$leadformid = $_POST['leadformid'];
	$submission_email = $_POST['submission_email'];
	if(is_user_logged_in()){
		if((wp_get_current_user()->mobileOTP)==$OTPNumber){
			update_user_meta(wp_get_current_user()->ID, 'is_mobile_verify',  1);
			if($leadformid != "" && $submission_email != "")
				{
					update_user_meta(wp_get_current_user()->ID, 'lead_form_source',  get_the_title($leadformid));
					$msg = str_replace("{{name}}", wp_get_current_user()->display_name, $submission_email);
					$msg = str_replace("{{email}}", wp_get_current_user()->user_email, $msg);
					
					sendEmail(wp_get_current_user()->user_email, get_the_title($leadformid), $msg);
/*
					wp_redirect($input['destination_url']);
					exit;
*/
				}
			echo generateJSON('success','OTP verified successfully.','');
			 wp_die();
		} else{
			 echo generateJSON('error','Please enter valid OTP','');
			 wp_die();
		}
	} else {
		echo  generateJSON('error','Please login to proceed','');
		wp_die();
	}	
}

function changeStage(){
	$stage =  intval($_POST['stage_number']);
	if(is_user_logged_in()){
		if((get_post_status(wp_get_current_user()->post_id )=='draft')&&($stage<5)){
			update_user_meta(wp_get_current_user()->ID, 'stage',  $stage);
			echo generateJSON('success','Stage changed.','');
			wp_die();
		} else {
			echo  generateJSON('error','Hold state','');
			wp_die();
		}	
	} else {
		echo  generateJSON('error','Please login to proceed','');
		wp_die();
	}
}

function callresendOTP($postdata){
	$generatedPin = generatePIN();
	$tempid = "1007595354699826301";
	update_user_meta($_POST['user_id'], 'mobileOTP', $generatedPin);
	//$msg = $generatedPin . ' is the one time password (OTP) for your online registration on Thriive.in. This is usable once & valid for 15 min';
	$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
		
	sendSMS($_POST['country_code'] . $_POST['mobile_number'], $msg,$tempid);
	$user_email = get_user_meta($_POST['user_id'],'nickname',true);
	sendEmail($user_email, "one time password (OTP) for your online login on Thriive.in", $msg);
	echo generateJSON('success','','');	
	wp_die();
}

function sendOTP(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	//$mobileNumber =  $countrycode . intval($_POST['mobile_number']);
/*
	$args = array(
		'meta_key'     => 'mobile',
		'meta_value'   => $mobileNumber,
		'meta_compare' => '=',
		'exclude' => array( wp_get_current_user()->ID )
	);
*/
	$args = array(
		'meta_query' => array(
	    	array(
	        	'key' => 'mobile',
				'value' => $mobileNumber,
				'compare' => 'LIKE',
			),
			array(
	        	'key' => 'countryCode',
				'value' => $countrycode,
				'compare' => '='
			)
		),
		'exclude' => array( wp_get_current_user()->ID )
	);
	$user_query = new WP_User_Query( $args );
	// Get the results
	$isMobileExist = $user_query->get_results();

	// Check for results
	if ( !empty( $isMobileExist ) )
	{
		$data = array(); 
    	$mobileExist = "This mobile number is already registered.";
    	$data['msg'] = $mobileExist;
    	$data['success'] = false;
    	echo json_encode($data);
    	wp_die();
    } else {
	    if(is_user_logged_in()){
			$tempid = '1007595354699826301';
			update_user_meta(wp_get_current_user()->ID, 'mobile', $mobileNumber);
			update_user_meta(wp_get_current_user()->ID, 'countryCode', $countrycode);
			update_field('mobile_number',$countrycode . $mobileNumber,wp_get_current_user()->post_id);
			$generatedPin = generatePIN();
			update_user_meta(wp_get_current_user()->ID, 'mobileOTP', $generatedPin);
			if(wp_get_current_user()->post_id > 0) {
				$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
			} else {
				$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
			}
			
			$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			sendEmail(wp_get_current_user()->user_email, 'Your OTP for registering on Thriive.in', $msg);
			echo generateJSON('success','OTP sent successfully.','');
			wp_die();
		} else {
			echo generateJSON('error','Please login to proceed','');	
			wp_die();
		}
    }
}


function sendSMS($mobileNo, $msg,$tempid='')
{
	
	$options = array(
    'http' => array(
        'protocol_version' => '1.0',
        'method' => 'GET'
    )
	);
	$context = stream_context_create($options);
	$url = SMS_URL."&tempid=".$tempid."&destination=".$mobileNo."&message=".urlencode($msg);
	$result = file_get_contents($url, false, $context);


	return $result;
}

function getChildTermByParentTerm($term_id,$taxonomy)
{
	$get_child_taxonomy = get_term_children($term_id, $taxonomy);
	return $get_child_taxonomy;
}
function getSubTherapy_load()
{
	$taxonomy = $_POST['taxonomy'];
	$term_id = (int)$_POST['term_id'];
	$get_child_taxonomy = get_term_children($term_id, $taxonomy);
	
	$terms = get_terms($taxonomy, array(
	    'include' => $get_child_taxonomy,
	    'hide_empty' => false,
	) );
	
	foreach($terms as $term)
	{
		$therapyArr = array();
		$therapy_image = wp_get_attachment_image_src(get_field('therapy_image','therapy_'.$term->term_id), 'thumbnail')[0];
		if(empty($therapy_image)){ $therapy_image = ""; }
		
        $therapyArr['name'] = $term->name;
        $therapyArr['description'] = substr($term->description,0,50);
        $therapyArr['slug'] = $term->slug;
        $therapyArr['img'] = $therapy_image;
        $finalDetails[] = $therapyArr;
	}
	
	echo json_encode($finalDetails); wp_die();
}
function getMainTaxonomyDetails(){
	$taxonomy = $_POST['taxonomy'];
	$parent = (int)$_POST['parent'];
	$filter = $_POST['filter'];
	$finalDetails = array();
	
	$taxonomyArray = array('taxonomy' => $taxonomy,'parent' => $parent,  'hide_empty' => false );
	if($filter != 'all') {
		$sterm  = get_term_by('name',$filter,'ailment');
		$taxonomyArray['meta_query'] = array (
  			array(
		        'key'           => 'ailment', // custom field
		        'compare'       => 'LIKE',
		        'value'         => $sterm->term_id
			)
		);
	}
	$therapy_terms = new WP_Term_Query($taxonomyArray);
	//echo '<pre>'; print_r($therapy_terms); echo '</pre>';
	
	foreach($therapy_terms->get_terms() as $therapy_term){ 
		$therapyArr = array();
		$term_children = get_terms(array('taxonomy' => $taxonomy,'parent' => 0,  'hide_empty' => false));		
		$therapy_image = wp_get_attachment_image_src(get_field('therapy_image','therapy_'.$therapy_term->term_id), 'thumbnail')[0];
		if(empty($therapy_image)){ $therapy_image = ""; }
		$therapist_args =  array(
			'post_type' => 'therapist',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'therapy',
					'field'    => 'slug',
					'terms'    => $therapy_term->slug,
				),
			),
		);
		$therapists = get_posts($therapist_args);
/*
		// Child Terms for ailment Count
		//$termchildren = get_term_children( $therapy_term->term_id, 'therapy');
		//echo '<pre>';print_r($termchildren);echo'</pre>';	
		foreach($term_children as $x) {
			//$ailment_count_child = 0;
			$term_data = get_term_by('id', $x, 'therapy');
			//echo '<pre>';print_r($k);echo '</pre>';
			$ailments = get_field('ailment',$term_data);
			$ailment_count_child += empty($ailments)?0:count($ailments);
		}			

		$ailments = get_field('ailment',$therapy_term);
		$ailment_count_parent += empty($ailments)?0:count($ailments);
*/

		$get_therapy_child_term = getChildTermByParentTerm($therapy_term->term_id,'therapy');
		
		$all_ailments = getMapAilmentByTherapy($therapy_term->term_id);
		//$ailment_count_parent += empty($all_ailments)?0:count($all_ailments);	
		
		$therapyArr['term_id'] = $therapy_term->term_id;
        $therapyArr['name'] = htmlspecialchars_decode($therapy_term->name);
        $therapyArr['slug'] = $therapy_term->slug;
        $therapyArr['term_group'] = $therapy_term->term_group;
        $therapyArr['term_taxonomy_id'] = $therapy_term->term_taxonomy_id;
        $therapyArr['taxonomy'] = $therapy_term->taxonomy;
        $therapyArr['description'] = substr($therapy_term->description,0,50);
        $therapyArr['parent'] = $therapy_term->parent;
        $therapyArr['count'] = $therapy_term->count;
        $therapyArr['filter'] = $therapy_term->filter;
		$therapyArr['therapy_image'] = $therapy_image;
		$therapyArr['sub_cats'] = $term_children;
		$therapyArr['sub_cats_count'] = count($get_therapy_child_term);
		$therapyArr['therapist'] = $therapists;
		$therapyArr['therapist_count'] = count($therapists);
		$therapyArr['ailment'] = $ailments;
		//$therapyArr['ailment_count'] = $ailment_count_parent+$ailment_count_child;
		$therapyArr['ailment_count'] = count($all_ailments);
		$finalDetails[] = $therapyArr;
	} 
	echo json_encode($finalDetails); wp_die();
}

function getSubTaxonomyDetails(){
	$taxonomy = $_POST['taxonomy'];
	$parent = (int)$_POST['parent'];
	$finalDetails = array();
	
	$taxonomyArray = array('taxonomy' => $taxonomy,'parent' => $parent,  'hide_empty' => false);
	$therapy_terms = get_terms($taxonomyArray);
	
	foreach($therapy_terms as $therapy_term){ 
		$therapyArr = array();
		$term_children = get_terms(array('taxonomy' => $taxonomy,'parent' => $therapy_term->term_id,  'hide_empty' => false));		
		$therapy_image = get_field('therapy_image','therapy_'.$therapy_term->term_id);
		$therapist_args =  array(
		'post_type' => 'therapist',
		'tax_query' => array(
			array(
				'taxonomy' => 'therapy',
				'field'    => 'slug',
				'terms'    => $therapy_term->slug,
			),
			),
		);
		$therapists = get_posts($therapist_args);
		$ailments = get_field('ailment',$therapy_term);
		
		$therapyArr['term_id'] = $therapy_term->term_id;
        $therapyArr['name'] = htmlspecialchars_decode($therapy_term->name);
        $therapyArr['slug'] = $therapy_term->slug;
        $therapyArr['term_group'] = $therapy_term->term_group;
        $therapyArr['term_taxonomy_id'] = $therapy_term->term_taxonomy_id;
        $therapyArr['taxonomy'] = $therapy_term->taxonomy;
        $therapyArr['description'] = $therapy_term->description;
        $therapyArr['parent'] = $therapy_term->parent;
        $therapyArr['count'] = $therapy_term->count;
        $therapyArr['filter'] = $therapy_term->filter;
		$therapyArr['therapy_image'] = $therapy_image;
		$therapyArr['sub_cats'] = $term_children;
		$therapyArr['sub_cats_count'] = count($term_children);
		$therapyArr['therapist'] = $therapists;
		$therapyArr['therapist_count'] = count($therapists);
		$therapyArr['ailment'] = $ailments;
		$therapyArr['ailment_count'] = count($ailments);
		$finalDetails[] = $therapyArr;
		
	} 
	echo json_encode($finalDetails); wp_die();
}

function getTherapyByAilmentTerm()
{
	$term_id = $_POST['parent'];
	$therapies = get_field("therapies", 'ailment_' . $term_id);
	$finalDetails = array();
	
	foreach($therapies as $therapy)
	{ 
		$therapyArr = array();
		$therapy_image = wp_get_attachment_image_src(get_field('therapy_image', $therapy), 'thumbnail')[0];
		if(empty($therapy_image)){ $therapy_image = ""; }
		$therapyArr['name'] = htmlspecialchars_decode($therapy->name);
		$therapyArr['slug'] = $therapy->slug;
		$therapyArr['description'] = wp_trim_words($therapy->description,20,"...");
		$therapyArr['img'] = $therapy_image;
		$finalDetails[] = $therapyArr;
	}
	echo json_encode($finalDetails); wp_die();
}

function getTherapyDetailTherapist()
{
	$therapist = $_POST['therapist'];
	$term_id = $_POST['parent'];
	$get_terms = get_term($term_id);
	$therapist_args =  array(
		'post_type' => $therapist,
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
			'taxonomy' => 'therapy',
			'field'    => 'term_id',
			'terms'    => $term_id,
				),
			),
		);
	$therapists = get_posts($therapist_args);
	$finalDetails = array();
	
	foreach($therapists as $therapist)
	{
		$post_wsp_thumb_id = get_post_thumbnail_id( $therapist->ID ); 
		$post_wsp_image = wp_get_attachment_image_src( $post_wsp_thumb_id ); 
		if(empty($post_wsp_image)){ $post_wsp_image = ""; }
		
		$therapyArr = array();
		$therapyArr['therapist_name'] = htmlspecialchars_decode($therapist->post_title);
		$therapyArr['location'] = getTherapistLocation($therapist->ID);
		$therapyArr['therapist_title'] = $therapist->therapist_title;
		$therapyArr['link'] = get_permalink($therapist->ID);
		//$therapyArr['slug'] = $get_terms->name;
		//$therapyArr['description'] = wp_trim_words($therapist->post_content,7);
		$therapyArr['image_url'] = $post_wsp_image[0];
		$finalDetails[] = $therapyArr;
	}
	//print_r($finalDetails);
	echo json_encode($finalDetails); wp_die();
}

function getTherapyDetailAilment()
{
	$taxonomy = $_POST['taxonomy'];
	$term_id = $_POST['parent'];
	
	$all_ailments = getMapAilmentByTherapy($term_id);
	
	foreach($all_ailments as $ailment)
	{
		$ailment_image = wp_get_attachment_image_src(get_field('ailment_image', $ailment), 'thumbnail')[0];
		if(empty($ailment_image)){ $ailment_image = ""; }
		$link = get_term_link( $ailment->slug, 'ailment' );
		
		$therapyArr = array();
		$therapyArr['ailment_name'] = $ailment->name;
		$therapyArr['link'] = $link;
		$therapyArr['image_url'] = $ailment_image;
		$finalDetails[] = $therapyArr;
	}
	//print_r($finalDetails);
	echo json_encode($finalDetails); wp_die();
}

function getMapAilmentByTherapy($term_id)
{
	$termchildren = get_term_children($term_id, 'therapy');
	//echo "<pre>";print_r($termchildren);echo "</pre>";
	//
	$all_ailments = array();
	foreach($termchildren as $x) 
	{
		$term_data = get_term_by('id', $x, 'therapy');
		//echo "<pre>";print_r($term_data);echo "</pre>";
		$ailments = get_field('ailment',$term_data);
		//echo "<pre>";print_r($ailments);echo "</pre>";
		if (is_array($ailments) || is_object($ailments)){
			foreach($ailments as $ailment)
			{
				$ailment = get_term_by('id', $ailment, 'ailment');
			}
			if($ailment->term_id)
			{
				array_push($all_ailments,$ailment);
			}		
		}
	}
	//Parent therapy data
	$term = get_term_by('id', $term_id, 'therapy');
	$ailments = get_field('ailment',$term);
	if(is_array($ailments) || is_object($ailments)){
		foreach($ailments as $ailment){
			if(is_numeric($ailment)){
				$ailment = get_term_by('id', $ailment, 'ailment');
			}
			array_push($all_ailments,$ailment);
		}
	}
	//Removing duplicate arrray from multi-dimentional array
	$all_ailments = array_map("unserialize", array_unique(array_map("serialize", $all_ailments)));
	
	return $all_ailments;
}

/*
function getTherapistData(){
	$post_type = $_POST['post_type'];
	$taxonomy = $_POST['taxonomy'];
	$filter = explode(',',$_POST['filter']);
	$finalDetails = array();
	
	$therapist_args =  array(
		'post_type' => $post_type,
		'post_status' => 'publish',
		'posts_per_page' => '-1',
		'meta_key' => 'featured_post',
		'orderby' => 'meta_value',
		'order' => 'DESC',
		'tax_query' => true,
	);
	
	if($filter != 'all,all,all') {
		if($filter[0] != 'all') {
			$therapist_args['tax_query'] = array(
	            array(
	                'taxonomy' => 'therapy',
	                'field' => 'name',
	                'terms' => array($filter[0]),
	                'operator' => 'IN',
	            )
	        );
		}
		if($filter[1] != 'all') {
			$therapist_args['tax_query'] = array(
	            array(
	                'taxonomy' => 'location',
	                'field' => 'name',
	                'terms' => array($filter[1]),
	                'operator' => 'IN',
	            )
	        );
		}
		if($filter[2] != 'all') {
			$therapist_args['tax_query'] = array(
	            array(
	                'taxonomy' => 'language',
	                'field' => 'name',
	                'terms' => array($filter[2]),
	                'operator' => 'IN',
	            )
	        );
		}
	}
	$therapists = get_posts($therapist_args);
	
	foreach($therapists as $therapist){ 
		$therapistArr = array();
		$url = get_the_post_thumbnail_url( $therapist->ID, 'thumbnail' );
		//$location = get_field('location_city',$therapist->ID);	//getTherapistLanguage($therapist->ID);
		$therapist_title = get_field('therapist_title',$therapist->ID);
		$location = getTherapistLocation($therapist->ID);
		$therapistArr['ID'] = $therapist->ID;
		$therapistArr['slug'] = $therapist->post_slug;
        $therapistArr['post_author'] = $therapist->post_author;
        $therapistArr['post_date'] = $therapist->post_date;
        $therapistArr['post_date_gmt'] = $therapist->post_date_gmt;
        $therapistArr['post_content'] = substr($therapist->post_content,0,50);
        $therapistArr['post_title'] = $therapist->post_title;
        $therapistArr['post_excerpt'] = $therapist->post_excerpt;
        $therapistArr['post_status'] = $therapist->post_status;
        $therapistArr['comment_status'] = $therapist->comment_status;
        $therapistArr['ping_status'] = $therapist->ping_status;
        $therapistArr['post_password'] = $therapist->post_password;
        $therapistArr['post_name'] = $therapist->post_name;
        $therapistArr['to_ping'] = $therapist->to_ping;
        $therapistArr['pinged'] = $therapist->pinged;
        $therapistArr['post_modified'] = $therapist->post_modified;
        $therapistArr['post_modified_gmt'] = $therapist->post_modified_gmt;
        $therapistArr['post_content_filtered'] = $therapist->post_content_filtered;
        $therapistArr['post_parent'] = $therapist->post_parent;
        $therapistArr['guid'] = $therapist->guid;
        $therapistArr['menu_order'] = $therapist->menu_order;
        $therapistArr['post_type'] = $therapist->post_type;
        $therapistArr['post_mime_type'] = $therapist->post_mime_type; 
        $therapistArr['comment_count'] = $therapist->comment_count;
        $therapistArr['filter'] = $therapist->filter;
        $therapistArr['location'] = $location;
        $therapistArr['therapist_title'] = $therapist_title;
        $therapistArr['image'] = $url;
        $finalDetails[] = $therapistArr;
	} 
	//print_r($therapists);exit;
	echo json_encode($finalDetails); wp_die();
}
*/

function getAilmentsData()
{
	$taxonomy = $_POST['taxonomy'];
	$numposts = $_POST['numposts'];
	$page = $_POST['page'];
	$filter = $_POST['filter'];
	$total = $numposts * $page;
	
	$finalDetails = array();
	
	$ailment_args = array(
	    'taxonomy' => 'ailment', 
	    'hide_empty' => false,
	    'meta_query' => true
	);
	if($filter != 'all') {
		$sterm  = get_term_by('name',$filter,'therapy');
		$ailment_args['meta_query'] = array (
  			array(
		        'key'           => 'therapies', // custom field
		        'compare'       => 'LIKE',
		        'value'         => $sterm->term_id
			)
		);
	}
	$ailment_terms = new WP_Term_Query($ailment_args);
	
	foreach($ailment_terms->get_terms() as $ailment_term){ 
		$ailmentArr = array();	
		$ailment_image = get_field('ailment_image','ailment_'.$ailment_term->term_id);
		$therapies = get_field('therapies',$ailment_term);
		
		$ailmentArr['term_id'] = $ailment_term->term_id;
        $ailmentArr['url'] = get_term_link($ailment_term->term_id);
        $ailmentArr['name'] = $ailment_term->name;
        $ailmentArr['image_url'] = get_field('ailment_image', $ailment_term);
        $ailmentArr['slug'] = $ailment_term->slug;
        $ailmentArr['term_group'] = $ailment_term->term_group;
        $ailmentArr['term_taxonomy_id'] = $ailment_term->term_taxonomy_id;
        $ailmentArr['taxonomy'] = $ailment_term->taxonomy;
        $ailmentArr['description'] = substr($ailment_term->description,0,50);
        $ailmentArr['parent'] = $ailment_term->parent;
        $ailmentArr['count'] = $ailment_term->count;
        $ailmentArr['filter'] = $ailment_term->filter;
		$ailmentArr['ailment_image'] = $ailment_image;
		$ailmentArr['therapies'] = $therapies;
		$finalDetails[] = $ailmentArr;
	} 
	echo json_encode($finalDetails); wp_die();
}

function getSingleTherapistData(){
	$post_id = $_POST['post_id'];
	$finalDetails = array();
	
	$therapist = get_post($post_id);
	$location = get_field('location_city',$post_id);
	$therapy = get_field('therapy',$post_id);
	if($therapy){
		while($therapy){
			$st_arr = array();
			$st_arr['therapy_name'] = the_sub_field('therapy_name');
			$st_arr['experience'] = the_sub_field('experience');
			$st_arr['charges'] = the_sub_field('charges');
		}		
	}
	
	echo $location; print_r($st_arr); wp_die();
}

function getEventsByTherapist(){
	$post_id = $_POST['post_id'];
	$post_type = $_POST['post_type'];
	$finalDetails = array();
	$event_args =  array(
		'post_type' => $post_type,
		'post_status' => 'publish'
	);
	$events = get_posts($event_args);
	foreach($events as $event){
		$therapists = get_field('healer',$event->ID);
		foreach($therapists as $therapist){
			$eventArr = array();
			if($therapist->ID == $post_id){
				$url = get_the_post_thumbnail_url( $therapist->ID, 'thumbnail' );
				$eventArr['ID'] = $event->ID;
				$eventArr['slug'] = $event->post_slug;
		        $eventArr['post_author'] = $event->post_author;
		        $eventArr['post_date'] = $event->post_date;
		        $eventArr['post_date_gmt'] = $event->post_date_gmt;
		        $eventArr['post_content'] = $event->post_content;
		        $eventArr['post_title'] = $event->post_title;
		        $eventArr['post_excerpt'] = $event->post_excerpt;
		        $eventArr['post_status'] = $event->post_status;
		        $eventArr['comment_status'] = $event->comment_status;
		        $eventArr['ping_status'] = $event->ping_status;
		        $eventArr['post_password'] = $event->post_password;
		        $eventArr['post_name'] = $event->post_name;
		        $eventArr['to_ping'] = $event->to_ping;
		        $eventArr['pinged'] = $event->pinged;
		        $eventArr['post_modified'] = $event->post_modified;
		        $eventArr['post_modified_gmt'] = $event->post_modified_gmt;
		        $eventArr['post_content_filtered'] = $event->post_content_filtered;
		        $eventArr['post_parent'] = $event->post_parent;
		        $eventArr['guid'] = $event->guid;
		        $eventArr['menu_order'] = $event->menu_order;
		        $eventArr['post_type'] = $event->post_type;
		        $eventArr['post_mime_type'] = $event->post_mime_type; 
		        $eventArr['comment_count'] = $event->comment_count;
		        $eventArr['filter'] = $event->filter;
		        $eventArr['image'] = $url;
				$finalDetails[] = $eventArr;
			}
		}
	}
	echo json_encode($finalDetails); 
	wp_die();
}

/**
 * Created option page in ACF.
 *
 * This function created option page in ACF.
 *
 * @since 0.0.1
 */
if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'page_title' => 'Options',
        'menu_title' => 'Options',
        'menu_slug' => 'options-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}


function calculateProgress($complete, $total){
	$totalProgress = (100*$complete)/$total;
	return $totalProgress;
}

function getEventCountById($user_id){
	$myEvents = array();
	$thriiveEvents = array();
	$event_args =  array(
		'post_type' => 'event',
		'post_status' => 'publish'
	);
	$events = get_posts($event_args);
	foreach($events as $event){
		$therapists = get_field('healer',$event->ID);
		foreach($therapists as $therapist){
			if($therapist->ID == $user_id){
				if($event->thriive_event==true){
					$thriiveEvents[] = $event;					
				} else {
					$myEvents[] = $event;
				}
			}
		}
	}
	return count($thriiveEvents);
}

function getEventById($user_id,$isThriive){
	$myEvents = array();
	$thriiveEvents = array();
	$event_args =  array(
		'post_type' => 'event',
		'post_status' => 'publish'
	);
	$events = get_posts($event_args);
	foreach($events as $event){
		$therapists = get_field('healer',$event->ID);
		foreach($therapists as $therapist){
			if($therapist->ID == $user_id){
				if($event->thriive_event==true){
					$thriiveEvents[] = $event;					
				} else {
					$myEvents[] = $event;
				}

			}
		}
	}
	
	if($isThriive){
		return $thriiveEvents;
	} else {
		return $myEvents;
	}
}

function getEventMonths(){
    $calender_events_args = array(
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
        'meta_key' => 'start_date_',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => true,
        'tax_query' => true,
    );
	$calender_events_args['meta_query'] = array(
	        array(
	            'key' => 'start_date_',
				'value' => date('Ymd'),
				'type' => 'DATE',
				'compare' => '>=',
	        ),
	);
	$all_upcoming_events = get_posts($calender_events_args);
    $currentMonth = date('M Y');
    $event_start_date = array();
    $i=0;
	foreach ($all_upcoming_events as $key=>$event){
        $get_date = date("M Y", strtotime(get_field("start_date_",$event->ID)));        
        //Ignoring past event date
        if(strtotime($get_date) >= strtotime($currentMonth))
        {
            $event_start_date[$i] = $get_date;			                    
            $i++;
        }       
	}
    //Removing dublicate date
  	$event_start_date = array_unique($event_start_date);
    //Sorting date in ascending order
    function sortFunction( $a, $b ) 
    {
	    return strtotime($a) - strtotime($b);
	}
	usort($event_start_date, "sortFunction");	
	
	return $event_start_date;
}

function filterEvents() {
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    $event_data = false;
    
    $calender_events_args = array(
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
        'meta_key' => 'start_date_',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => true,
        'tax_query' => true,
    );
	
	if ($event_date == 'all') {
		$calender_events_args['meta_query'] = array(
	        array(
	            'key' => 'start_date_',
				'value' => date('Ymd'),
				'type' => 'DATE',
				'compare' => '>=',
	        ),
	    );
	} else if(date('m',strtotime($event_date)) == date('m')){
		$calender_events_args['meta_query'] = array(
	        array(
	            'key' => 'start_date_',
				'value' => array(date('Ymd'), date('Ymt',strtotime('today'))),
				'type' => 'DATE',
				'compare' => 'BETWEEN',
	        ),
	    );
	} else {
		$calender_events_args['meta_query'] = array(
	        array(
	            'key' => 'start_date_',
				'value' => array(date('Ym01',strtotime($event_date)), date('Ymt',strtotime($event_date))),
				'type' => 'DATE',
				'compare' => 'BETWEEN',
	        ),
	    );
	}

    if ($event_location != 'all') {
        $calender_events_args['tax_query'] = array(
            array(
                'taxonomy' => 'location',
                'field' => 'slug',
                'terms' => $event_location,
            ),
        );
    }
    
    $calender_events = new WP_Query($calender_events_args);
    //echo $calender_events->request;
	if($calender_events->have_posts()) {
    while ($calender_events->have_posts()) : $calender_events->the_post();
    	get_template_part('template-parts/calender-events');
    endwhile;
    } else {
	    echo 'No Events Found';
    }
    wp_die();
}

function events_google_map_api( $api )
{	
	$api['key'] = 'AIzaSyDw52vclBfuZ079ANaizNMQDHDm13pOM9Y';
	return $api;	
}

function google_map_api_key() 
{
	acf_update_setting('google_api_key', 'AIzaSyDw52vclBfuZ079ANaizNMQDHDm13pOM9Y');
}

function getSimilarEvents(){
	$post_id = $_POST['event_post_id'];
	$event_terms = get_the_terms($post_id, 'therapy');
	$event_term = $event_terms[0]->term_id;
	$event_args = array(
		'post_type' => 'event',
		'post__not_in' => array($post_id),
		'tax_query' => array(
			array(
	    		'taxonomy' => 'therapy',
				'field'    => 'term_id',
				'terms'    => $event_term,
			)
		),
	);
	$related_events = new WP_Query( $event_args );

	$finalDetails = array();
	if($related_events->have_posts()):
		
		while ($related_events->have_posts()) : $related_events->the_post();
			$customArr = array();
			
			$start_time = get_field('start_time');
			$end_time = get_field('end_time');
			$event_location = get_the_terms( $post->ID,  'event-location' );
			$customArr['event_title'] = get_the_title();
			$customArr['event_facilitator'] = get_field('facilitator');
			$customArr['start_date'] = date(' dS M | l', strtotime(get_field('start_date_')));
			$customArr['event_date'] = (!empty($end_time) ? $start_time . ' - ' . $end_time : $start_time . ' Onwards' );
			$customArr['event_venue'] = $event_location[0]->name;
			$customArr['post_link'] = get_permalink($related_events->ID);
			$finalDetails[] = $customArr;
		endwhile;
		
	endif;
	
	echo json_encode($finalDetails); 
	wp_die();
}
add_role(
    'therapist',
    __( 'Therapist' ),
    array(
        'read'         				=> true,
        'edit_posts'   				=> true,
        //'delete_posts' 				=> true,
        //'publish_posts'				=> true,
        //'delete_published_posts' 	=> true,
        //'edit_published_posts'		=> true,
    )
);

add_role(
    'pending_delete',
    __( 'Pending Delete' ),
    array(
        'read'         				=> false,
        'edit_posts'   				=> false,
        //'delete_posts' 				=> true,
        //'publish_posts'				=> true,
        //'delete_published_posts' 	=> true,
        //'edit_published_posts'		=> true,
    )
);

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count = $count+50;
        update_post_meta($postID, $count_key, $count);
    }
}

function custom_wpseo_breadcrumb_output( $links ){
	if( is_singular('post') ){
		$links[0]['text']='Blog';
		$links[0]['url']=home_url( '/blog/' );
	}
return $links;
}

function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}

function createEvent($input)
{
/*
	if(isset($input['event_title']) && isset($input['facilitator_name']) 
	&& isset($input['start_date']) && isset($input['end_date']) && isset($input['start_time']) && isset($input['end_time'])
	 && isset($input['pac-input']) && isset($input['country']) && isset($input['state']) && isset($input['city']) && isset($input['event_description']))
*/
	if(isset($input['start_date']) && isset($input['start_time']) && isset($input['event_description']) && isset($input['event_title']))
	 {
  		if(is_user_logged_in())
  		{
	  	    $current_user = wp_get_current_user();
		    $user_id = $current_user->ID;
		    $post_id = $current_user->post_id;
		    $username = $current_user->first_name . ' ' . $current_user->last_name;
			$useremail = $current_user->user_email;
		    
	    	$event_banner_img_url = $input['event_banner_img_url'];
	    	$post_title = $input['event_title'];
	    	$facilitator_name = $input['facilitator_name'];
	    	$start_date = $input['start_date'];
			$end_date = $input['end_date'];
			$start_time = $input['start_time'];
			$end_time = $input['end_time'];
			
	    	$venue_address = $input['location_details'];
	    	$clean_address = json_decode(stripslashes($venue_address));
	    	$event_description = $input['event_description'];
	    	
			$price = $input['price'];
			$facebook_url = $input['facebook_url'];
			$instagram_url = $input['instagram_url'];
			$website_url = $input['website_url'];
			$therapy = $input['therapy'];
	    	$book_now_link = $input['book_now_link'];
			$about_the_facilitator = $input['about_the_facilitator'];
			$about_the_organisation = $input['about_the_organisation'];
			$contact_information = $input['contact_information'];
			$thriive_event = $input['thriive-event'];
			$therapy = $input['therapy'];
			$gallery_video = $input['gallery_video'];
	    
		    $url = array(
					array(
						'social' => $facebook_url
					),
					array(
						'social' => $instagram_url
					),
					array(
						'social' => $website_url
					),
			);		    
		    
		    global $event_msg;
		    //If it is thriive event
		    if($thriive_event)
		    {
			    $post_status = 'draft';
			    $event_msg = "Your request for create an event has been sent to admin.";

			    //Sending mail to User
			    $msg="Dear $username,<br><br>
					Hello! It’s always great to hear from our network of lightworkers. We, at Thriive, really believe in you and your amazing contribution to the universe. Your light is the beacon of hope this world needs to keep believing—so, shine away!<br><br>
					The request to upload your event has been received. Your account manager is just reviewing the details, and if it meets all required guidelines, the event will be posted shortly. You will receive an email once your event has been posted.<br><br>
					Love & Light<br>
					Team Thriive<br><br>
					<em style='color: #615c5c;'>
						Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
					<em>";
			    sendEmail($useremail, "Get ready to shine! Your event is being worked on!", $msg);

			    //Sending mail to Account manager
			    $msg="Dear Account Manager,<br><br>
					$username has sent you a request to promote an event. Here are the details:<br>
					Event: $post_title<br>
					Date: $start_date <br><br>
					Please ensure that the $username is within their 15 day time limit. The 15 days is calculated from the day they need the posting to be uploaded and not the day of the event. If the deadline has passed, please reject the event post. Ensure that the content is within the guidelines of word count and image quality. Once you are sure that all protocols have been met, please pass the request onto the Promotions Manager. Please do the needful within 1 working day.";
			    sendEmail("accountmanager2@thriive.in", "$username has requested an event promotion", $msg);

			    //Sending mail to Promotional Team
			    $msg="Dear Promotions Team,<br><br>
					The Account Manager has sent you a request to promote an event of $username for the event happening on $start_date. Please log in to your admin panel and schedule Emailer, Social Media post, SMS and listing on the website.";
			    sendEmail("promotions@thriive.in", "Please promote this event by $username", $msg);
		    }
		    else	//If it is not thriive event
		    {
			    $post_status = 'publish';
			    $event_msg = "Event has been created successfully";
		    }
		    $new_post = array(
			    //'ID' => 1956,
				'post_title'    => $post_title,
				'post_content'  => $event_description,
				'post_status'   => $post_status,          
				'post_type'     => 'event' 
			);
			
			$new_post_id = wp_insert_post($new_post);
			
			includeFiles();
			$event_banner_img = media_handle_upload( 'event_banner_img', $new_post_id );
			$event_featured_img = media_handle_upload( 'event_featured_img', $new_post_id );
			set_post_thumbnail( $new_post_id, $event_featured_img );
			update_field('banner_banner_image',$event_banner_img,$new_post_id);
			update_field('banner_image_url',$event_banner_img_url,$new_post_id);
			update_field('therapist',$post_id,$new_post_id);
			update_field('start_date_',date('Ymd', strtotime($start_date)),$new_post_id);
			update_field('end__date',date('Ymd', strtotime($end_date)),$new_post_id);
			update_field('start_time',$start_time,$new_post_id);
			update_field('end_time',$end_time,$new_post_id);
			update_field('venue',(array) $clean_address,$new_post_id);
			update_field('facilitator',$facilitator_name,$new_post_id);
			update_field('price',$price,$new_post_id);
			update_field('url',$url,$new_post_id);
			update_field('book_now_link',$book_now_link,$new_post_id);
			update_field('about_facilitator',$about_the_facilitator,$new_post_id);
			update_field('about_organisation',$about_the_organisation,$new_post_id);
			update_field('about_the_organisation',$about_the_organisation,$new_post_id);
			update_field('contact_information',$contact_information,$new_post_id);
			if($thriive_event)
		    {
			    update_field('thriive_event',$thriive_event,$new_post_id);
		    }
			update_field('therapy',$therapy,$new_post_id);
			//update_field('gallery_video',$gallery_video,$new_post_id);
			$FAQs_img = media_handle_upload( 'FAQs_img', $new_post_id );
			update_field('faqs',$FAQs_img,$new_post_id);
			$terms_conditions = media_handle_upload( 'terms_conditions', $new_post_id );
			update_field('terms_&_conditions',$terms_conditions,$new_post_id);
			
			$post_id = array($post_id);
			update_field('healer',$post_id,$new_post_id);
			
			saveLocationTaxonomy($input['country'], $input['state'], $input['city'], $new_post_id); // Create Taxonomy for Country, State, City
			
			
			//get multiple file and its uploaded id
			$files = $_FILES['gallery_img'];
			$all_gallery_img = array();
			foreach ($files['name'] as $key => $value) 
			{            
            	if ($files['name'][$key]) 
            	{ 
	                $file = array( 
	                    'name' => $files['name'][$key],
	                    'type' => $files['type'][$key], 
	                    'tmp_name' => $files['tmp_name'][$key], 
	                    'error' => $files['error'][$key],
	                    'size' => $files['size'][$key]
	                );
	                
	                $_FILES = array ("gallery_img" => $file); 
	                foreach ($_FILES as $file => $array) 
	                {
		                $gallery_img = array();       
	                    $gallery_img_id = media_handle_upload($file,$new_post_id); 
	                    $gallery_img['gallery_images'] = $gallery_img_id;
	                    $all_gallery_img[] = $gallery_img;
	                }
            	} 
        	}
        	update_field('event_gallery',$all_gallery_img,$new_post_id);
			
			//Updating video			
			$gallery_videos = array(
					array(
						'gallery_videos' => $gallery_video
					),
			);
			update_field('event_video',$gallery_videos,$new_post_id);

			//storing events id in user's meta
			$my_events = $current_user->my_events;
			if($my_events)
			{
				$my_events = explode(",",str_replace('"', "", $my_events));
				if(!in_array($new_post_id,$my_events))
				{
					array_push($my_events,$new_post_id);
				}
				$my_events = implode(",", $my_events);
			}
			else
			{
				$my_events = $new_post_id;
			}
			update_user_meta($user_id, 'my_events', $my_events);
			
			wp_redirect(get_permalink(1909));
			exit;
		} 
	} 
}

function thriive_get_related_content( $post_id, $related_count,$type = 'post',$taxonomy='category', $args = array() ) {
	$terms = get_the_terms( $post_id, $taxonomy);
	
	if ( empty( $terms ) ) $terms = array();
	
	$term_list = wp_list_pluck( $terms, 'slug' );
	
	$related_args = array(
		'post_type' => $type,
		'posts_per_page' => $related_count,
		'post_status' => 'publish',
		'post__not_in' => array( $post_id ),
		'orderby' => 'date',
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);

	return new WP_Query( $related_args );
}

function generateBitlyURL($url){
	require_once('bitly.php');
	$client_id = 'c4e1f9e77ec04b1d8ded179e0e975897919d7c3c';
	$client_secret = '73222991269081e99b9e35b47099e5449b7163dc';
	$user_access_token = 'c0c281d705ef60a2480cfcdfd6c5380e874d2337';
	$user_login = 'productmanager@thriive.in';
	$user_api_key = 'a7421798b27ef34f88150c8b1be35f416c3aaa4b';  
	$params = array();
	$params['access_token'] = $user_access_token;
	$params['longUrl'] = $url;
	$params['domain'] = 'bit.ly';
	$results = bitly_get('shorten', $params);
	return $results;
}

function renewPackage()
{
	$current_user = wp_get_current_user();
	$post_id = $current_user->post_id;
	$users_id = $current_user->ID;	
	$username = $current_user->first_name . ' ' . $current_user->last_name;
	$useremail = $current_user->user_email;
	$mobileNo = $current_user->mobile;
	
	
	//Get Package detail
	$get_package = get_field("select_package",$post_id);
    $packageCharges = get_field("package_charges",$get_package[0]->ID);
    $packageName = $get_package[0]->post_title;

	//Generating payment link
    $codeD = $useremail.$users_id . time();  
    $code = sha1( $codeD );
    $url = add_query_arg( array('package' => "renew", 'token' => $code, 'token_id' => $users_id,'token_for' => $useremail ), get_permalink( 274 ));
    $payment_link = generateBitlyURL($url)['data']['url'];
	if(empty($payment_link)){
		$payment_link_email = $url;
	} else {
		$payment_link_email = $payment_link;
	}
	if($packageCharges > 0)
    {
		$subject = "Renew your Thriive package";
	    $msg = "Dear $username,<br><br>
			Please follow the link below to complete the renewal process.<br><br>
			$url <br><br>
			If you have any queries or concerns please contact <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
			As soon as we receive the complete renewal payment and agreement from you, you will be all good to go!<br><br>
			We look forward to you as a shining star in our worldwide web of light!<br><br>
			Love & light,<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
			<em>";
		update_user_meta($users_id, 'payment_token',  $code);
		update_user_meta($users_id, 'isRenew',1);
		
		//Sendint Email to Therapist
		sendEmail($useremail,$subject,$msg);	
		
		//Sending Email to Account manager
		$msg = "Dear Account Manager,<br><br>
			$username has just sent a request for package renew .<br><br> 				
			Love & light,<br>
			Team Thriive
			";
		sendEmail('accountmanager2@thriive.in', "Renew Thriive package", $msg);

		echo "Renewal link has been sent to your email id.";
    }
    exit;
}


function upgradePackage()
{
	$UpgragePackageId = $_POST['UpgragePackageId'];
	
	$current_user = wp_get_current_user();
	$post_id = $current_user->post_id;
	$users_id = $current_user->ID;	
	$username = $current_user->first_name . ' ' . $current_user->last_name;
	$useremail = $current_user->user_email;
	$mobileNo = $current_user->mobile;
	
	//Get Package detail
	$get_package = get_field("select_package",$post_id);
    $packageCharges = get_field("package_charges",$UpgragePackageId);
    $packageName = $get_package[0]->post_title;
	update_post_meta($post_id, 'old_package', $packageName);

	//Generating payment link
    $codeD = $useremail.$users_id . time();  
    $code = sha1( $codeD );
    $url = add_query_arg( array('upgrade-package' => $UpgragePackageId, 'token' => $code, 'token_id' => $users_id,'token_for' => $useremail ), get_permalink( 406 ));
    $payment_link = generateBitlyURL($url)['data']['url'];
	if(empty($payment_link)){
		$payment_link_email = $url;
	} else {
		$payment_link_email = $payment_link;
	}
	
	$subject = "Upgrade your Thriive package";
	if($packageCharges > 0)
    {
	    $msg = "Dear $username,<br><br>
			Please follow the link below to complete the upgrade process.<br><br>
			$url <br><br>
			If you have any queries or concerns please contact <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
			As soon as we receive the complete upgrade payment and agreement from you, you will be all good to go!<br><br>
			We look forward to you as a shining star in our worldwide web of light!<br><br>
			Love & light,<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
			<em>";
			$tempid="1007825912140792678";
		sendSMS($mobileNo, "Dear $username, you are just a step away from upgrading your Thriive.in package. Don’t delay. Pay now. The link is $payment_link_email",$tempid);
		
    }
    else
    {
	    $msg = "Dear $username,<br><br>
			Please follow the link below to complete the upgrade process.<br><br>
			$url <br><br>
			If you have any queries or concerns please contact <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
			We look forward to you as a shining star in our worldwide web of light!<br><br>
			Love & light,<br>
			Team Thriive<br><br>
			<em style='color: #615c5c;'>
				Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
			<em>";
		sendSMS($mobileNo, "Dear $username, accept your agreement now and upgrade your Thriive.in. The link is $payment_link_email");
    }
    update_user_meta($post_users_id, 'payment_token',  $code);
    $smsMsg = "Dear $username, package upgrade link is $payment_link_email . If you need any further help, call 7045933385 or email to accountmanager1@thriive.in";
    
    //Sending SMS & Email to Therapist
    //sendSMS($mobileNo, $smsMsg);
	sendEmail($useremail,$subject,$msg);
	
	//Sending Email to Account manager
	$msg = "Dear Account Manager,<br><br>
		$username has just sent a request for upgrade the package.<br><br> 				
		Love & light,<br>
		Team Thriive
		";
	sendEmail('accountmanager2@thriive.in', "Upgrade Thriive package", $msg);
	
	echo "Upgrade link has been sent to your email id.";
    exit;
}

function change_post_published( $new_status, $old_status, $post ) 
{
	//When post type is 'therapist'
    if($post->post_type == 'therapist')
	{
		//echo "Status" . $new_status;
		//Get the user of current post by post_id
		$post_users = get_users(array('meta_key' => 'post_id','meta_value' => $post->ID));
		foreach($post_users as $post_user)
		{
			$post_users_id = $post_user->ID;
			$post_users_email = $post_user->user_email;
		}
		//Get user's detail by its id
		$post_usersdata = get_userdata($post_users_id);		
		$username = $post_usersdata->first_name . ' ' . $post_usersdata->last_name;
		$useremail = $post_usersdata->user_email;
		$mobileNo = $post_usersdata->mobile;
				
	    $get_package = get_field("select_package",$post->ID);
	    $packageCharges = get_field("package_charges",$get_package[0]->ID);
	    $packageName = $get_package[0]->post_title;
	    $current_user_email = wp_get_current_user()->data->user_email;
		
		//when post status changed from 'pending review' to 'pending payment'.
		if($old_status == 'pending' && $new_status == 'pending-payments' || $old_status == 'review-b4-publish' && $new_status == 'pending-payments') 
    	{		    
		    //Generating payment link
		    $codeD = $post_users_email.$post_users_id . time();  
		    $code = sha1( $codeD );
		    $url = add_query_arg( array('token' => $code, 'token_id' => $post_users_id,'token_for' => $post_users_email ), get_permalink( 274 ));
			$payment_link = generateBitlyURL($url)['data']['url'];
		    if(empty($payment_link)){
				$payment_link_email = $url;
			} else {
				$payment_link_email = $payment_link;
			}
		    if($packageCharges > 0)
		    {
				$subject = "And you’re in! Thriive tribe welcomes you! Don’t delay! Pay now!";
			    $msg = "Dear $username,<br><br>
					You are just steps away from beginning your exciting journey as part of our Thriive Tribe. We can’t wait to get you started. Please follow the link below to complete the payment process.<br><br>
					$url <br><br>
					If you have any queries or concerns please contact <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
					As soon as we receive the complete payment and agreement from you, you will be all good to go!<br><br>
					We look forward to adding you as a shining star in our worldwide web of light!<br><br>
					Love & light,<br>
					Team Thriive<br><br>
					<em style='color: #615c5c;'>
						Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
					<em>";
				$smsMsg = "Dear $username, you are just a step away from completing your Thriive.in registration process. The payment link is $payment_link_email.";
		    }
		    else
		    {
				$subject = "And you’re in! Thriive tribe welcomes you!";
				$package_page_link = get_permalink(414);
			    $msg = "Dear $username,<br><br>
					Congratulations and welcome to our ever growing network of Wellness Service Providers! Thriive.in is proud to claim you as part of its tribe!<br><br>
					$url <br><br>
					As soon as you accept the agreement, you will be all good to go!<br><br>
					If you have any queries or concerns, please contact <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
					There are many benefits to upgrading to a higher package...check them <a href='$package_page_link'>here</a>.<br><br>
					We look forward to adding you as a shining star in our worldwide web of light!<br><br>
					Love & light,<br>
					Team Thriive<br><br>
					<em style='color: #615c5c;'>
						Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
					<em>";
				$smsMsg = "Dear $username, accept your agreement now and complete your Thriive.in registration process: Here's the link: $payment_link_email. If you need help, get in touch with us on 7045933385.";
		    }
/*
		    if($get_package[0]->ID == '129'){
			    $aggrementLink = get_permalink(414);
			    $smsMsg = "Dear $username, accept your agreement now and complete your Thriive Art & Soul registration process: Here's the link: $aggrementLink. If you need help, get in touch with us on 7045933385.";
		    } else {
			    $smsMsg = "Dear $username, you are just a step away from completing your Thriive Art & Soul registration process. The payment link is $payment_link_email.";
		    }
*/
		    
		    update_user_meta($post_users_id, 'stage',  5);
			update_user_meta($post_users_id, 'completed_stages',  array('1','1','1','1')); 
			update_user_meta($post_users_id, 'payment_token',  $code);
		    sendEmail($useremail,$subject,$msg);
		    sendEmail("manishj@thriive.in","Therapist status Changed from $old_status to $new_status","by '$current_user_email' updated the '$post->post_title' --- $post->ID '$new_status'");
		    sendSMS($mobileNo, $smsMsg);
	    } 
	    else if($old_status == 'pending-payments' && $new_status == 'review-b4-publish'){
	    	sendEmail("manishj@thriive.in","$username has submitted the form again to review.","$username missed to filled some important data, the therapist has again submitted the form for review please review the form.");
	    } 
	    else if($old_status == 'pending-payments' && $new_status == 'publish') 
    	{
			//when post status changed from 'pending payment' to 'pending publish'.
	    	$dashboard = get_permalink(339);
	    	if($packageCharges > 0)
		    {
				$subject = "Payment Received with Gratitude. You’re now officially ready to shine and Thriive!";
			    $msg = "Dear $username,<br><br>
				    Your payment of Rs. $packageCharges for $packageName package has been received.
					Thriive officially welcomes you to our Tribe! It’s time to give yourself a pat on the back! You are now a part of an elite group of lightworkers who’ve done some amazing work in our Universe. It’s time to show the world 					your light! You are now ready to shine and Thriive!<br><br>
					You can set up your profile page and customize it using this link: <a href='$dashboard'>Dashboard</a><br><br>
					Once your profile page is up and running, doing these 4 things will help spread your reach further:<br>
					<ol type='number'>
						<li>Keep updating your profile page with latest pictures and information.</li>
						<li>Display positive reviews from clients on your page.</li>
						<li>Conduct workshops that relate to your modalities (We can help you with a venue. Call us now to know more).</li>
						<li>Encourage your family and friends to share the link to your Thriive Profile Page with their own networks.</li>
					</ol>
					If you need any further help, call <a href='tel:7045933385'>7045933385</a> / send email to <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
					Love & light,<br>
					Team Thriive<br><br>
					<em style='color: #615c5c;'>
						Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
					<em>";
					
				sendEmailWithInvoice($useremail,$subject,$msg, $post_users_id, 'subscriber','invoice.php');
				//sendEmail($useremail,$subject,$msg);
					
				//Send email to admin
				$current_date = date("d/m/Y");
				$msg = "Dear Account Manager,<br><br>
				    Payment of Rs. $packageCharges has been received from $username on $current_date for $packageName package.</a><br><br>
					Love & light,<br>
					Team Thriive";
				sendEmail("accountmanager2@thriive.in", "Money is here!", $msg);
				
				//Send email to Finance team
				$current_date = date("d/m/Y");
				$msg = "Dear Accounts Team,<br><br>
				    Payment of Rs. $packageCharges has been received from $username on $current_date for $packageName package. Please prepare the invoice and forward it to the $username.</a><br><br>
					Love & light,<br>
					Team Thriive";
				sendEmailWithInvoice("finance@thriive.in", "Prepare invoice for $username", $msg, $post_users_id, 'subscriber','invoice.php');
				//sendEmail("finance@thriive.in", "Prepare invoice for $username", $msg);
		    }
		    else
		    {
				$subject = "You’re now officially ready to shine and Thriive!";				
			    $msg = "Dear $username,<br><br>
					Thriive officially welcomes you to our Tribe! It’s time to give yourself a pat on the back! You are now a part of an elite group of lightworkers who’ve done some amazing work in our Universe. It’s time to show the world 					your light! You are now ready to shine and Thriive!<br><br>
					You can set up your profile page and customize it using this link: <a href='$dashboard'>Dashboard</a><br><br>
					Once your profile page is up and running, doing these 4 things will help you to spread your reach further:<br>
					<ol type='number'>
						<li>Keep updating your profile page with latest pictures and information.</li>
						<li>Display positive reviews from clients on your page.</li>
						<li>Conduct workshops that relate to your modalities (We can help you with a venue. Call us now to know more).</li>
						<li>Encourage your family and friends to share the link to your Thriive Profile Page with their own networks.</li>
					</ol>
					If you need any further help, call <a href='tel:7045933385'>7045933385</a> / send email to <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
					Love & light,<br>
					Team Thriive<br><br>
					<em style='color: #615c5c;'>
						Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
					<em>";
				sendEmail($useremail,$subject,$msg);				
		    }
		    $subject = "Here’s how you can get more clients!";
		    $msg = file_get_contents(get_template_directory().'/email-template/tmailafterpublish.html');
			sendEmail($useremail,$subject,$msg);
			sendEmail("manishj@thriive.in","Therapist status Changed from $old_status to $new_status","by '$current_user_email' updated the '$post->post_title' --- $post->ID '$new_status'");
		    //Send therapist msg with payment link after checking package plan
	    }
	    else if($new_status == 'rejected')
	    {
		    $msg = "We regret to inform you that at this point in time your application to be a registered Therapist with Thriive.in does not comply with our verification requirements . We wish you great luck on your healing journey.  You will be eligible to reapply next year. We hope to see you then!<br><br>
				Love & light,<br>
				Team Thriive<br><br>
				<em style='color: #615c5c;'>
					Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
				<em>";
			sendEmail($useremail,"Sorry!",$msg);
			sendEmail("manishj@thriive.in","Therapist status Changed to $new_status","by '$current_user_email' updated the '$post->post_title' --- $post->ID '$new_status'");
	    }
	}
	else if($post->post_type == 'event')
	{
		//Getting user by event's id
		$getUser = get_users( array(
	        'meta_query' => array(
	            array(
	                'key'     => 'my_events',
	                'value'   => $post->ID,
	                'compare' => 'LIKE',
	            )
	        ),
	    ));
	    $username = $getUser[0]->first_name . ' ' . $getUser[0]->last_name;
	    $useremail = $getUser[0]->user_email;
		
		if($old_status == 'draft' && $new_status == 'publish') 
    	{
	    	$event_link = get_permalink($post->ID);
	    	$msg = "Dear $username,<br><br>
				Your event is successfully published on Thriive website. Here is the link of your event:<br><br>
				$event_link <br><br>
				Thriive hopes you have a super successful event! And don’t forget to get good pictures, and post them on your profile page. We look forward to hearing how it went. Good luck!<br><br>
				If there’s anything more that we can help you with please email us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a><br><br>
				Love & light,<br>
				Team Thriive<br><br>
				<em style='color: #615c5c;'>
					Note:This is an automatically generated email, please do not reply. Any questions, feel free to contact us at <a href='mailto:accountmanager1@thriive.in'>accountmanager1@thriive.in</a> for help.
				<em>";
	    	sendEmail($useremail, "Here’s the link for your event!", $msg);
	    }
	}
}

//Aucomplete Search
function ajax_search() 
{
	// //Searching in post
	// $results = new WP_Query( array(
	// 	'post_type'     => array( 'post', 'therapist' ), 	//post name
	// 	'post_status'   => 'publish',
	// 	'posts_per_page'=> 10,
	// 	's'             =>  $_POST['search'],
	//     'orderby' => 'name',
	//     'order' => 'ASC'
	// ));
	// //print_r($results);exit;
	// $items = array();
	// if ( !empty( $results->posts ) ) 
	// {
	// 	foreach ( $results->posts as $result ) 
	// 	{
	// 		$items[] = $result->post_title;
	// 	}
	// }

	// //Searching in taxonomy
	// $args = array(
	//     'taxonomy'      => array( 'ailment', 'therapy','location' ,'language' ), // taxonomy name
	//     'orderby'       => 'name',
	//     'order'         => 'ASC',
	//     'hide_empty'    => false,
	// 	'hierarchical'=>false,
	// 	'childless'=>true,
	//     'name__like'    => stripslashes( $_POST['search'] )
	// ); 
	// $results = get_terms( $args );
	// if( !empty( $results ) )
	// {
	// 	foreach ( $results as $result ) 
	// 	{
	// 		$items[] = $result->name;
	// 	}
	// }
	// $items = array_unique($items);	//Removing duplicate data
	// sort($items);	//Sorting in ascending order
	// $items = array_slice($items, 0, 10, true); 	//take top 10 records
	// //print_r($items);exit;
	// wp_send_json_success( $items );

	global $wpdb;
	$search_text = $_POST['search'];
	$sql_query = "
		SELECT t.name as title FROM wp_terms
		AS t INNER JOIN wp_term_taxonomy
		AS tt ON
		t.term_id = tt.term_id
		WHERE tt.taxonomy IN ('ailment','therapy','language','location') and t.name Like '$search_text%'
		UNION
		SELECT post_title as title FROM `wp_posts` WHERE `post_title` LIKE '$search_text%' and post_type = 'therapist' and post_status = 'publish' 
		order by title
		limit 10
	";
	//print_r($sql_query);exit;
	$results = $wpdb->get_results($sql_query);
	//print_r($results);exit;
	$items = array();
	if( !empty( $results ) )
	{
		foreach ( $results as $result ) 
		{
			$items[] = $result->title;
		}
	}
	wp_send_json_success( $items );exit;
}
function thriive_get_search_query($content_type='post',$entity_type='post',$query,$num_results=2,$page=0){
	$search_query = null;
	switch ($content_type):

		case 'taxonomy':
				$tax_args = array(
				    'taxonomy' => $entity_type,
				    'orderby' => 'name', 
					'order' => 'ASC',
					'number' => $num_results,
					'offset' => ($num_results * $page),
					'name__like'    => $query,
					'description__like'=>$query,
					'hide_empty'=>false,
					'hierarchical'=>false,
					'childless'=>true
					);
				$search_query = new WP_Term_Query( $tax_args );
				break;

		case 'post':
		default:
				$post_args = array(
					's'=>$query,
					'post_type'=>$entity_type,
					'posts_per_page'=>$num_results,
					'paged'=>$page,
				);
				$search_query = new WP_Query($post_args);
				break;
	endswitch;
	return $search_query;
}

function modify_query( $query ) {
//     if ( !is_admin() && $query->is_post_type_archive('therapist') && $query->is_main_query()) {
// 	    $query->set( 'posts_per_page', 4 );
// 		$query->set('meta_key', 'featured_post');
// 		//echo '<pre>';print_r();echo '</pre>';
// /*
// 		$query->set('orderby', 'meta_value');
// 		$query->set('order', 'DESC');
// */	
// 	    $query->set('orderby', array( 'meta_value' => 'DESC', 'post_title' => 'ASC' ));
// 	 //    $query->set( 'meta_query', array(
// 	 //        array(
// 	 //              'key' => 'area',
// 	 //              'value' => $_SESSION['user_area'],
// 	 //              'compare' => '='
// 	 //        )
// 		// ));

// 	    //$getAllNearBy = "SELECT *, (6371 * acos (cos ( radians($user_lat) ) * cos( radians( lat ) ) * cos( radians( lng ) -radians($user_lng) ) + sin ( radians($user_lat) ) * sin( radians( lat ) ) ) ) AS distance FROM `zipcode_area` HAVING distance < 50 ORDER BY distance LIMIT 0 , 50";
// 	} 
// 	else 
		if ( !is_admin() && $query->is_post_type_archive('event') && $query->is_main_query()) {
        $query->set( 'posts_per_page', -1 );
    }
    else if ( $query->is_search )
    {
	    $query->set( 'hide_empty', false );
    }  
  return $query;
}

function thriive_get_terms( $taxonomies, $args=array() ){
    //Parse $args in case its a query string.
    $args = wp_parse_args($args);

    if( !empty($args['post_types']) ){
        $args['post_types'] = (array) $args['post_types'];
        add_filter( 'terms_clauses','thriive_filter_terms_by_cpt',10,3);

        function thriive_filter_terms_by_cpt( $pieces, $tax, $args){
            global $wpdb;

            // Don't use db count
            $pieces['fields'] .=", COUNT(*) " ;

            //Join extra tables to restrict by post type.
            $pieces['join'] .=" INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id 
                                INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id ";

            // Restrict by post type and Group by term_id for COUNTing.
            $post_types_str = implode(',',$args['post_types']);
            $pieces['where'].= $wpdb->prepare(" AND p.post_type IN(%s) AND t.term_id NOT IN (1414) GROUP BY t.term_id", $post_types_str);

            remove_filter( current_filter(), __FUNCTION__ );
            return $pieces;
        }
    } // endif post_types set

    return get_terms($taxonomies, $args);           
}

function thriive_get_post_filters($taxonomy,$post_type){
	$args =array(
	    'hide_empty' => 0,
	    'post_types' =>array($post_type),
	);

	return thriive_get_terms($taxonomy,$args);
}

function thriive_get_therapy_ailments() {
	$args = array( 'taxonomy' => 'therapy', 'hide_empty' => 0);  
	$therapyTerms = get_terms( $args );  
	$selectedAilments = array();
	
	foreach($therapyTerms as $term) {
	    $ailment = get_field('ailment',$term);
	    foreach($ailment as $a) {
	    	$selectedAilments[$a->term_id] = $a->name;
	    }
    }
	return array_unique($selectedAilments);
}

function modify_category_title ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } else {
	        $title = __( 'Blog' );
        }

    return $title;

}

function thriive_get_ailments_therapy(){
	$args = array( 'taxonomy' => 'ailment', 'hide_empty' => 0);  
	$ailmentTerms = get_terms( $args );  
	$selectedTherapy = array();
	
	foreach($ailmentTerms as $term) {
	    $therapy = get_field('therapies',$term);
	    foreach($therapy as $t) {
	    	if($t->term_id != '1414'){
	    		$selectedTherapy[$t->term_id] = $t->name;
	    	}
	    }
    }
	return array_unique($selectedTherapy);
}

function save_taxonomy_ailment($term_id) {
	$selected_therapy = get_field('therapies', 'ailment_'.$term_id);
	$ailmentIds = array();
	
/*
    foreach($selected_therapy as $st){
	    $existing_ailment = get_field('ailment', 'therapy_'.$st->term_id);
	    
	    if( empty( $existing_ailment ) ) {
		    $ailmentIds[] = $term_id;
		} else {
		    $ailment_arr = unserialize($existing_ailment);
		    if(!in_array($term_id, $ailment_arr)){
			    $ailmentIds[] = $term_id;
		    }
		}
		update_term_meta( $st->term_id, 'ailment', $ailmentIds );
    }
*/
    
    foreach($selected_therapy as $st)
    {
	    $getAilmentIds = array();
	    //echo "<pre>";print_r($sa);echo "</pre>";
	    $existing_ailment = get_field('ailment', 'therapy_'.$st->term_id);
	    
	    if( empty( $existing_ailment ) ) 
	    {
		    $getAilmentIds[] = $term_id;
		} 
		else 
		{
			foreach($existing_ailment as $single_existing_ailment)
		    {
			    $getAilmentIds[] = $single_existing_ailment->term_id;
		    }
		    
		    if(!in_array($term_id, $getAilmentIds))
		    {
			    $getAilmentIds[] = $term_id;
		    }
		}
		$getAilmentIds = array_unique($getAilmentIds);
		//echo "<pre>";print_r($getTherapiesIds);echo"</pre>";
		update_term_meta( $st->term_id, 'ailment', $getAilmentIds );
    }
    //exit;
}

function save_taxonomy_therapy($term_id) {
    $selected_ailment = get_field('ailment', 'therapy_'.$term_id);
	$therapyIds = array();
	
    foreach($selected_ailment as $sa)
    {
	    $getTherapiesIds = array();
	    //echo "<pre>";print_r($sa);echo "</pre>";
	    $existing_therapy = get_field('therapies', 'ailment_'.$sa->term_id);
	    
	    if( empty( $existing_therapy ) ) 
	    {
		    $getTherapiesIds[] = $term_id;
		} 
		else 
		{
			foreach($existing_therapy as $single_existing_therapy)
		    {
			    $getTherapiesIds[] = $single_existing_therapy->term_id;
		    }
		    
		    if(!in_array($term_id, $getTherapiesIds))
		    {
			    $getTherapiesIds[] = $term_id;
		    }
		}
		$getTherapiesIds = array_unique($getTherapiesIds);
		//echo "<pre>";print_r($getTherapiesIds);echo"</pre>";
		update_term_meta( $sa->term_id, 'therapies', $getTherapiesIds );
    }
    //exit;
    
    $is_has_child = get_terms( 'therapy', array(
		'parent'    => $term_id,
		'hide_empty' => false
	) );
	
	if(empty($is_has_child)){
		$term = get_term_by('id',$term_id,'therapy');
		$childrens = get_term_children( $term->parent, 'therapy' );
		$finalArr = array();
		foreach($childrens as $children){
			$child_ailment = get_field('ailment', 'therapy_'.$children);
			foreach($child_ailment as $ca){
				$finalArr[] = $ca->term_id;
			}
		}
		update_term_meta( $term->parent, 'ailment', array_unique($finalArr) );
	}
}

// Changing state dynamically on therapist registration
function CountryStateChange() {
	global $wpdb;
	
	if(!empty($_POST['country_id'])){
	    //Fetch all state data
	    $states = $wpdb->get_results('SELECT * FROM states WHERE country_id = '.$_POST['country_id']); 
	    ?>
	    <option value="">No state selected</option><?php
	    if(count($states) != 0) {
		    foreach($states as $key => $value) { ?>
				<option state_id="<?php print_r( $value->id );?>" value="<?php print_r( $value->name );?>"><?php print_r( $value->name );?></option>
	<?php   } 
	    } 
	    else { ?>
		    <option state_id="not_available" value="not_available" <?php echo ($address->state == 'not_available')?'selected':''?>>State not available</option>
<?php   }
    } else {
	    $current_user = wp_get_current_user();
	    $address = json_decode($current_user->address);
	    $selected_country_name = $address->country;
	    $selected_country_id = $wpdb->get_results("SELECT id FROM countries WHERE name = '".$selected_country_name."'"); 
	    $states = $wpdb->get_results('SELECT * FROM states WHERE country_id = '.$selected_country_id[0]->id); 
	    ?>
	    <option value="">No state selected</option><?php
 
	    if(count($states) != 0) {
		    foreach($states as $key => $value) { ?>
				<option state_id="<?php print_r( $value->id );?>" value="<?php print_r( $value->name );?>" <?php echo ($value->name == $address->state)?'selected':''?>><?php print_r( $value->name );?></option>
	<?php   } 
	    } else { ?>
		    <option state_id="not_available" value="not_available" <?php echo ($address->state == 'not_available')?'selected':''?>>State not available</option>
<?php   }
	}
}

// Changing state dynamically on therapist registration
function StateCityChange() {
	global $wpdb;
	
	if(!empty($_POST['state_id'])) {
	    //Fetch all city data
	    $cities = $wpdb->get_results('SELECT * FROM cities WHERE state_id = '.$_POST['state_id']); 
	    ?>
	    <option value="">No city selected</option><?php
	    if(count($cities) != 0) {
		    foreach($cities as $key => $value) { ?>
				<option city_id="<?php echo $value->id;?>" value="<?php print_r( $value->name );?>"><?php print_r( $value->name );?></option>
	<?php   } 
	    } else { ?>
		    <option city_id="not_available" value="not_available" <?php echo ($address->city == 'not_available')?'selected':''?>>City not available</option>
<?php   }
		exit();
	}
    else {
	    $current_user = wp_get_current_user();
	    $address = json_decode($current_user->address);
	    $selected_state_name = $address->state;
	    $selected_state_id = $wpdb->get_results("SELECT id FROM states WHERE name = '".$selected_state_name."'"); 
	    $cities = $wpdb->get_results('SELECT * FROM cities WHERE state_id = '.$selected_state_id[0]->id); 
	    ?>
	    <option value="">No city selected</option><?php
	    if(count($cities) != 0) {
		    foreach($cities as $key => $value) { ?>
				<option city_id="<?php print_r( $value->id );?>" value="<?php print_r( $value->name );?>" <?php echo ($value->name == $address->city)?'selected':''?>><?php print_r( $value->name );?></option>
	<?php   } 
	    } else { ?>
		    <option city_id="not_available" value="not_available" <?php echo ($address->city == 'not_available')?'selected':''?>>City not available</option>
<?php   }
	}  
}


function get_therapist_language(){
	$therapist_args =  array(
        'taxonomy' => 'language',
        'post_type' => array('therapist'),
        'hide_empty' => true,
    );
	return get_terms($therapist_args);
}

function get_therapist_area(){
	$keyword = strval($_POST['area']);
	$search_param = "{$keyword}%";

	global $wpdb;
	$results = $wpdb->get_results( "SELECT pm.meta_value FROM {$wpdb->prefix}posts AS p LEFT JOIN {$wpdb->prefix}postmeta AS pm ON pm.post_id = p.id WHERE meta_key = 'area' AND meta_value LIKE '$search_param'", OBJECT );

	foreach ($results as $result) {
		if(!empty($result->meta_value)){
			$splitarea = explode(",",$result->meta_value);
			if(!in_array($splitarea[0],$areaResult)){
				$areaResult[] = $splitarea[0];
			}
		}
	}
	echo json_encode($areaResult);
	wp_die();
}
function save_area_session(){
	$areaResult = getLatLng($_POST['area']);
	$_SESSION['user_latitude'] = $areaResult['lat'];
	$_SESSION['user_longitude'] = $areaResult['lng'];
	$_SESSION['user_area'] = $areaResult['area'];
	$_SESSION['user_city'] = $areaResult['city'];
	echo json_encode($areaResult);
	wp_die();
}

function get_therapist_location(){
	$finalArr = array();
	$country_args =  array(
        'taxonomy' => 'location',
        'parent' => 0,
        'hide_empty' => true,
    );
	$countries = get_terms($country_args);
	foreach($countries as $country){
		$state_args =  array(
	        'taxonomy' => 'location',
	        'parent' => $country->term_id,
	        'hide_empty' => true,
	    );
		$states = get_terms($state_args);
		foreach($states as $state){
			$city_args =  array(
		        'taxonomy' => 'location',
		        'parent' => $state->term_id,
		        'hide_empty' => true,
		    );
			$cities = get_terms($city_args);
			foreach($cities as $city){
				array_push($finalArr, $city);
				// $finalArr[] = str_replace(' ', '-', $city->name);
			}
		}
	}
	// Sort Alphabetically by Term Names
	usort($finalArr, 'comparator');
	return $finalArr;
}

// Sort Alphabetically by Term Names
function comparator($object1, $object2) { 
    return strcasecmp($object1->name, $object2->name); 
} 

function getAllTherapistByRole($role)
{
	$args = array(
	    'role__in' => array($role)
	);
	$query = new WP_User_Query($args);
	
	if($query->total_users > 0)
	{
		$results = $query->get_results();
		
		$user_data = array();
		$user_row = array();
		
		foreach($results as $result)
		{	
			$user_row['id'] = $result->ID;
			$user_row['dob'] = $result->dob;
			$user_row['mobile'] = $result->mobile;
			$user_row['email'] = $result->user_email;
			$user_row['name'] = $result->first_name . " " . $result->last_name;
			$user_row['post_id'] = $result->post_id;
			if(!empty($result->post_id))
			{
				$userPost = get_post($result->post_id);
				if(!empty($userPost->select_package[0]))
				{
					$user_row['package'] = get_post($userPost->select_package[0]);					
				}
			}
			if($result->transaction > 0)
			{
				$user_row['transaction'] = get_post($result->transaction);
			}
			
			$user_data[] = $user_row;
			$user_row['transaction'] = "";
			$user_row['package'] = "";
		}
		return $user_data;		
	}
}

function getContactedTherapistSeekers(){
	global $wpdb;
	$users = [];
	$result = $wpdb->get_results("SELECT * from my_operator_call_history WHERE is_seeker = 1");
	if($result){
		foreach($result as $each_user){
			$therapist = get_user_by("id",$each_user->receiver_id);
			$seeker = get_user_by("id",$each_user->caller_id);
			$user_row['id'] = $seeker->ID;
			$user_row['name'] = $seeker->display_name;
			$user_row['uname'] = $seeker->user_login;
			$user_row['email'] = $seeker->user_email;
			$user_row['therapist_name'] = $therapist->display_name;
			$user_row['timestamp'] = $each_user->timestamp;
			$user_row['is_call'] = $each_user->is_call;
			$users[] = $user_row;
		}
	}

	return $users;
}

function getTReviewRatingCount($id,$searchby){
	if(get_field('review_details',$id)):
		$arr = array();
		while (the_repeater_field('review_details',$id)):
			if(!empty(get_sub_field('status'))){
				array_push($arr,get_sub_field($searchby));
			}
		endwhile;
	endif;
	return $arr;
}

function getTherapistTrendingEvents($post_id){
	$events_args = array( 
		'posts_per_page' => 2,
		'post_type' => 'event',
		'post_status' => 'publish',
		'meta_query' => array(
			array(
	            'key' => 'therapist',
	            'value' => '"' . $post_id . '"', 
	            'compare' => 'LIKE'
	        )
	    ),
	);
	return new WP_Query( $events_args );
}

// Convert Indian Rupees Digits to Words
function currencyToWords(float $number) {
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 82 => 'Eighty Two', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    } 
    $Rupees = implode('', array_reverse($str));
	
    $paise = ($decimal) ? "and " . $words[$decimal].' Paise' : 'and Zero Paise';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

function add_user_meta_box() {
    add_meta_box( 'm_param_therapist', 'User Details', 'display_user_details', 'therapist', 'normal', 'high' );
}

function display_user_details( $post )
{
    $user = get_userdata( $post->post_author );
	$expiry_date = get_post_meta($user->transaction)['end_date'][0];
?>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><label for="user_meta_email">Email</label></th>
		<td><input type="email" disabled name="user_meta_email" value="<?php echo $user->user_email; ?>" style="min-width:275px"></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="user_meta_mobile">Mobile Number</label></th>
		<td><input type="text" disabled name="user_meta_mobile" value="<?php echo $user->mobile; ?>" style="min-width:275px"></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="user_meta_gender">Gender</label></th>
		<td><input type="email" disabled name="user_meta_gender" value="<?php echo $user->gender; ?>" style="min-width:275px"></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="user_meta_dob">Date of Birth</label></th>
		<?php
			if(!empty($user->dob))
			{
			    $time = strtotime($user->dob);
				$dob = date('d/m/Y',$time);
			}
			else
			{
				$dob = "";
			}
	    ?>
		<td><input type="email" disabled name="user_meta_dob" value="<?php echo $dob; ?>" style="min-width:275px"></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="user_meta_nationality">Nationality</label></th>
		<td><input type="email" disabled name="user_meta_nationality" value="<?php echo $user->nationality; ?>" style="min-width:275px"></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="user_meta_package_expity">Package Expiry Date</label></th>
		<td><input type="email" disabled name="user_meta_package_expity" value="<?php echo $expiry_date; ?>" style="min-width:275px"></td>
	</tr>
</table>

<?php
}

/*
function no_access_to_therapist_seeker()
{
    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
    if ( 
        current_user_can( 'therapist' ) OR current_user_can( 'subscriber' )
    )
        exit( wp_redirect( $redirect ) );
}
*/

function change_excerpt( $text )
{
    $pos = strrpos( $text, '[');
    if ($pos === false)
    {
        return $text;
    }

    return rtrim (substr($text, 0, $pos) );
}
add_filter('get_the_excerpt', 'change_excerpt');




function add_attachment_pdf( $notification, $form, $entry ) {
    //There is no concept of user notifications anymore, so we will need to target notifications based on other criteria,
    //such as name or subject
    if( $notification['name'] == 'User Notification' ) {
        //get upload root for WordPress
        $upload = wp_upload_dir();
        $upload_path = $upload['basedir'];
 
        //add file, use full path , example -- $attachment = "C:\\xampp\\htdocs\\wpdev\\wp-content\\uploads\\test.txt"
        $attachment = get_stylesheet_directory() . '/assets/pdf/thriive-detox-planner.pdf';
 
        GFCommon::log_debug( __METHOD__ . '(): file to be attached: ' . $attachment );
 
        if ( file_exists( $attachment ) ) {
            $notification['attachments']   = rgar( $notification, 'attachments', array() );
            $notification['attachments'][] = $attachment;
            GFCommon::log_debug( __METHOD__ . '(): file added to attachments list: ' . print_r( $notification['attachments'], 1 ) );
        } else {
            GFCommon::log_debug( __METHOD__ . '(): not attaching; file does not exist.' );
        }
    }
    //return altered notification object
    return $notification;
}

function custom_seo_therapist() {
	if (is_singular('therapist')) {
	    $category_name = get_the_terms(get_the_id(), 'therapy');
	    $cat_array = array();
	    foreach ($category_name as $cat_name) {
	        $cat_array[] = $cat_name->name;
	    }
	} 
	return $cat_array;
}

function custom_seo_ailments() {
	if (is_tax('ailment')) {
	    $taxonomy_name = get_queried_object();
	    $selected_therapies = get_field('therapies', $taxonomy_name->taxonomy . '_' . $taxonomy_name->term_id);
	    $therapies_array = array();
	    foreach ($selected_therapies as $selected_therapy) {
	        $therapies_array[] = $selected_therapy->name;
	    }	
    }
    return $therapies_array;
}

function custom_wpseo_title($title) {
    if(is_singular('therapist')) {
        $cat_array = custom_seo_therapist();
	    $title = get_the_title() . '- Therapist -' . implode(", ", $cat_array) . ' | Thriive.in';
    }
    // therapy and area
    if (is_tax('therapy') && !empty($_GET['area']) && empty(is_tax('ailment')) && is_post_type_archive('therapist')) {
	    $taxonomy_name = get_queried_object();
	    $area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
	    $title = $taxonomy_name->name." in ".$area.", ".$taxonomy_name->name." in ".$area." Near Me, ".$taxonomy_name->name." Near Me, Best ".$taxonomy_name->name." therapist, List of ".$taxonomy_name->name." therapist in ".$_SESSION['user_area'].", Top ".$taxonomy_name->name." therapist in ".$_SESSION['user_city'].", ".$taxonomy_name->name." Clinic, ".$taxonomy_name->name." Treatment  - Book Therapist Appointment Online, Call Therapist, Consult Therapist Online, View Fees, Feedbacks | Thriive.in";
	}
    // ailment and area
    if (is_tax('ailment') && !empty($_GET['area']) && empty(is_tax('therapy')) && is_post_type_archive('therapist')) {
	    $taxonomy_name = get_queried_object();
	    $therapies_array = implode(", ", custom_seo_ailments());
	    $area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
	    $title = $taxonomy_name->name.' in '.$_SESSION['user_area'].', '.$taxonomy_name->name.' therapist Near Me, Cure '.$taxonomy_name->name.' by '.$therapies_array.', Treat '.$taxonomy_name->name.' by '.$therapies_array.' - Book Therapist Appointment Online, Call Therapist Online, Consult Therapist Online, View Fees, Feedbacks | Thriive.in';
	}
	// area
	if (is_archive('therapist') && !empty($_GET['area']) && empty(is_tax('therapy')) && empty(is_tax('ailment')) && is_post_type_archive('therapist')) {
		$area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
	    $title = 'Therapist In '.$area.', Therapist Near Me, Therapist Near You, List of therapist in '.$_SESSION['user_city'].', List of therapist Near Me - Book Therapist Appointment Online, Call Therapist Online, Consult Therapist Online, View Fees, Feedbacks | Thriive.in';
	}
	// area, therapy and ailment
	if(!empty(is_tax('therapy')) && !empty($_GET['area']) && !empty($_GET['ailment'])  && is_post_type_archive('therapist')){
		$taxonomy_name = get_queried_object();
		$ailment = str_replace("-", " ", $_GET['ailment']);
		$area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
		$title = $taxonomy_name->name." for ".$ailment." in ".$area.", ".$taxonomy_name->name." in ".$_SESSION['user_city'].", ".$taxonomy_name->name." Near Me, Therapist for ".$ailment.", Therapist for ".$ailment." Near Me, List of ".$taxonomy_name->name." therapist in ".$_SESSION['user_city'].", Cure ".$ailment." by ".$taxonomy_name->name.", Treat ".$ailment." by ".$taxonomy_name->name." - Book Therapist Appointment Online, Call Therapist Online, Consult Therapist Online, View Fees, Feedbacks | Thriive.in";
	}
	//therapy listing page
	if(get_queried_object('therapy')->post_title == "Therapies"){
		$title = "Find Alternative Therapies, Alternative Remedies, List of therapies, Find reliable therapies information on common health problems, Get Therapist.";
	}
	//therapy detail page
	if(is_tax('therapy') && !isset($_GET['area'])){
		$title = get_queried_object()->name." in Mumbai, ".get_queried_object()->name." near me,   Therapist for ".get_queried_object()->name.", List of ".get_queried_object()->name." in mumbai, Top ".get_queried_object()->name." Therapist, Find Verified Therapist for ".get_queried_object()->name.", Articles on ".get_queried_object()->name.", Issues Cured by ".get_queried_object()->name.", Book Online, View Fees, Feedbacks | Thriive.in";
	}
	//ailment detail page
	if(is_tax('ailment') && !isset($_GET['area'])){
		$therapies = array_slice(custom_seo_ailments(), 0, 5, true);
		$title = $therapies[0]." for ".get_queried_object()->name.", ".$therapies[1]." for ".get_queried_object()->name.", ".$therapies[2]." for ".get_queried_object()->name.", ".$therapies[3]." for ".get_queried_object()->name.", Alternative therapies curing ".get_queried_object()->name.", List of Alternative therapies curing ".get_queried_object()->name.", Therapist curing ".get_queried_object()->name.", Articles on ".get_queried_object()->name.", Book Appointment Online, View Fees, Feedbacks | Thriive.in";
	}
    
    return $title;
}

function custom_wpseo_meta( $desc ){
    if (is_singular('therapist')) {
        $cat_array = custom_seo_therapist();
	    $desc = get_the_title() . ' is a therapist of ' . implode(", ", $cat_array) . ', Connect with ' . get_the_title() . ', View User Feedbacks for ' . get_the_title() . ' | Thriive.in';
    } 
	// therapy and area
    if (is_tax('therapy') && !empty($_GET['area']) && empty(is_tax('ailment')) && is_post_type_archive('therapist')) {
	    $taxonomy_name = get_queried_object();
	    $area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
	    $desc = $taxonomy_name->name." therapist in ".$area.". Book Therapist's Appointment Online, Call Therapist, View Fees, User feedbacks, Address & Phone Numbers of ".$taxonomy_name->name." in ".$area." | thriive.in";
	}
    // ailment and area
    if (is_tax('ailment') && !empty($_GET['area']) && empty(is_tax('therapy')) && is_post_type_archive('therapist')) {
	    $taxonomy_name = get_queried_object();
	    $therapies_array = implode(", ", custom_seo_ailments());
	    $desc = "Find a Therapist Curing ".$taxonomy_name->name." in ".$_SESSION['user_city'].", Therapist in ".$_SESSION['user_city'].". Book Therapist's Appointment Online, Call Therapist, View Fees, User feedbacks, Address & Phone Numbers of ".$taxonomy_name->name." in ".$_SESSION['user_city'].", Therapist in ".$_SESSION['user_city']." | thriive.in";
	}
	// area
	if (is_archive('therapist') && !empty($_GET['area']) && empty(is_tax('therapy')) && empty(is_tax('ailment')) && is_post_type_archive('therapist')) {
		$area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
	    $desc = "Therapist in ".$area.", Therapist in ".$_SESSION['user_city'].", Therapist Near Me, Book Therapist's Appointment Online, Call Therapist, View Fees, User feedbacks, Address & Phone Numbers of Therapist in ".$area." | thriive.in";
	}
	// area, therapy and ailment
	if(!empty(is_tax('therapy')) && !empty($_GET['area']) && !empty($_GET['ailment'])){
		$taxonomy_name = get_queried_object();
		$ailment = str_replace("-", " ", $_GET['ailment']);
		$area = ($_SESSION['user_area']==$_SESSION['user_city']) ? $_SESSION['user_area'] : $_SESSION['user_area'].", ".$_SESSION['user_city'];
		$desc = $taxonomy_name->name." therapist in ".$area.". Book Therapist's Appointment Online, Call Therapist, View Fees, User feedbacks, Address & Phone Numbers of ".$taxonomy_name->name." in ".$area." | thriive.in";
	}
	//therapy listing page
	if(get_queried_object('therapy')->post_title == "Therapies"){
		$desc = "Find trusted therapies information that can heal/cure your problems. Get the Alternative Remedies Curing health issues, Find yoga teachers, Yoga therapist.";
	}
	//therapy detail page
	if(is_tax('therapy') && !isset($_GET['area'])){
		$therapies_array = implode(", ", custom_seo_ailments());
		$desc = get_queried_object()->name." in Mumbai, Therapist for ".get_queried_object()->name.", Find Verified Therapist for ".get_queried_object()->name.", Cure you health problems by ".get_queried_object()->name.", Connect with therapist for healing your cure by ".get_queried_object()->name.", Issues  Cured by ".get_queried_object()->name." ".$therapies_array.", Book Online, View Fees, Feedbacks | Thriive.in";
	}
	//ailment detail page
	if(is_tax('ailment') && !isset($_GET['area'])){
		$therapies = implode(', ', custom_seo_ailments());
		$desc = "Get the List of therapies healing Ailment name,  Cure Ailment name with ".$therapies.", List of Verified therapist curing Ailment name problems.";
	}

    return $desc;
}

//Modified Canonical Url
function change_cannonical_url($url){
	if(is_post_type_archive('therapist')) {
		$url = esc_url(home_url('/therapist/'));	
	}
   return $url;
}

function is_in_array($array, $key, $key_value){
      $within_array = 'no';
      foreach( $array as $k=>$v ){
        if( is_array($v) ){
            $within_array = is_in_array($v, $key, $key_value);
            if( $within_array == 'yes' ){
                break;
            }
        } else {
                if( $v == $key_value && $k == $key ){
                        $within_array = 'yes';
                        break;
                }
        }
      }
      return $within_array;
}

//Users GeoLocation
function UsersGeoLocation() {
	//Get Location
	$geolocation = $_POST['latitude'] . ',' . $_POST['longitude'];
	$request = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&key=AIzaSyDw52vclBfuZ079ANaizNMQDHDm13pOM9Y'; 
	$file_contents = file_get_contents($request);
	$json_decode = json_decode($file_contents);
	$area = extractFromAdress($json_decode->results[0]->address_components,'sublocality_level_1');
	$city = extractFromAdress($json_decode->results[0]->address_components,'locality');
	$state = extractFromAdress($json_decode->results[0]->address_components,'administrative_area_level_1');
	$country = extractFromAdress($json_decode->results[0]->address_components,'country');
	$_SESSION['user_latitude'] = $_POST['latitude'];
	$_SESSION['user_longitude'] = $_POST['longitude'];
	$_SESSION['user_area'] = $area;
	$_SESSION['user_city'] = $city;

	global $wpdb;
	if (is_user_logged_in()) {
    	$current_user = wp_get_current_user();
    	$user_id = $current_user->ID;
    	$user_name = $current_user->first_name . ' ' . $current_user->last_name;
    	$user_email = $current_user->user_email;
	} else {
		$user_id = '';
		$user_name = '';
		$user_email = '';
	}
	$user_location = array(
						'date_time' => $_POST['user_date'].' '.$_POST['user_time'],
					 	'latitude' => $_POST['latitude'],
					 	'longitude' => $_POST['longitude'],
					 	'area' => $area,
					 	'city' => $city,
					 	'state' => $state,
					 	'country' => $country
					 );
	//echo serialize($user_location);
	$user_data = array(
					'user_id'		=> $user_id,
					'user_name' 	=> $user_name,
					'user_email'	=> $user_email,
					'user_ip'		=> $_SERVER['REMOTE_ADDR'],
					'user_location' => serialize($user_location)
				);
	
	if(is_user_logged_in()){
		$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}thriive_geolocation WHERE user_id = $user_id", OBJECT );
		if($results){
			$tempArr = array();
			$isDiffArea = false;
			foreach($results as $result){
				$db_ul = unserialize($result->user_location);
				$tempArr = $db_ul;
				array_push($tempArr,$user_location);
				if(is_in_array($db_ul, 'area', $area) == 'no'){
					$wpdb->update('wp_thriive_geolocation', array('user_location' => ""), array('id' => $result->id));
					$user_data['user_location'] = serialize($tempArr);
					$wpdb->update('wp_thriive_geolocation', $user_data, array('id' => $result->id));
				}
			} 
		} else {
			$user_data['user_location'] = serialize(array($user_location));
			$wpdb->insert('wp_thriive_geolocation', $user_data);
		}
	} else {
		$user_data['user_location'] = serialize(array($user_location));
		$wpdb->insert('wp_thriive_geolocation', $user_data);
	}
	echo $area;
	wp_die();
}

function extractFromAdress($components, $type){
    for ($i=0; $i<count($components); $i++){
        for ($j=0; $j<count($components[$i]->types); $j++){
            if ($components[$i]->types[$j]==$type) return $components[$i]->long_name;
        }
    }
    return "";
}

function main_above_banner() {
	register_nav_menus( array(
		'menu-2' => 'New Menu',
		'main_above_banner' => 'Menu for above banner',
		'footer_menu1' => 'Footer Menu 1',
		'footer_menu2' => 'Footer Menu 2',
		'footer_menu3' => 'Footer Menu 3',
		'footer_menu4' => 'Footer Menu 4',
	) );
}

// Get Ailment by Therapy Slug
function getAilmentByTherapy() {
	$var = $_POST['therapySlug'];
	$ailments = get_ailment_by_therapy($var);
	if(empty($ailments)) {
		echo 'empty';
	} else {
		echo json_encode($ailments);
	}
	wp_die();
}

// Get Ailments by Therapy Slug
function get_ailment_by_therapy($therapy) {
	if(empty($therapy)) {
		$data = get_all_ailments();
		return $data;
	} else {
		$term = get_term_by('slug', $therapy, 'therapy');
		$ailments = get_field('ailment', $term);
		if(empty($ailments)) {
			return '';
		} else {
			return $ailments;
		}	
	}	
}

function getAilmentByAjax(){
	global $wpdb;
	$search_text = $_POST['issue'];
	$sql_query = "
		SELECT t.name AS title, t.slug AS slug FROM wp_terms
		AS t INNER JOIN wp_term_taxonomy
		AS tt ON
		t.term_id = tt.term_id
		WHERE tt.taxonomy IN ('ailment') and t.name Like '$search_text%'
		limit 10
	";
	//print_r($sql_query);exit;
	$results = $wpdb->get_results($sql_query);
	// $keyword = strval($_POST['issue']);
	// print_r($keyword); 
	// $db_ailments = get_terms(array('taxonomy'=>'ailment','name__like'=>$keyword,'hide_empty'=>false));
	$ailments = array();
	$i = 0;
	foreach($results as $dba){
		$ailments[$i]['slug'] = $dba->slug;
		$ailments[$i]['name'] = $dba->title;
		$i++;
	}
	echo json_encode($ailments);
	wp_die();
}

function get_all_ailments() {
	$terms = get_terms( 'ailment', array(
		'hide_empty' => false,
	) );
	return $terms;
}

// Get Therapy by Ailment Slug
function getTherapyByAilment() {
	$var = $_POST['ailmentSlug'];
	$therapies = get_therapy_by_ailment($var);
	if(empty($therapies)) {
		echo 'empty';
	} else {
		echo json_encode($therapies);
	}
	wp_die();
}

function get_therapy_by_ailment($ailment) {
	if(empty($ailment)) {
		$data = get_all_therapies();
		return $data;
	} else {
		$term = get_term_by('slug', $ailment, 'ailment');
		$therapies = get_field('therapies', $term);
		if(empty($therapies)) {
			return '';
		} else {
			return $therapies;
		}	
	}	
}

function get_all_therapies() {
	$terms = get_terms( 'therapy', array(
		'hide_empty' => true,
	) );
	return $terms;
}

function validate_seeker_modal(){
	parse_str($_POST['seeker_form_data'], $input);
	global $seeker_msg,$wpdb;
	if ( username_exists( $input['email'] ) && email_exists($input['email'])) {
		echo generateJSON('error','Email ID already registered, Please login','');exit;
	} else {
		if(isset($input['firstname']) && isset($input['email']) && isset($input['password']))
		{
			$user_id = username_exists( $input['email'] );
			if ( !$user_id and email_exists($input['email']) == false ) 
			{
			   	$seekerDetails = array(
				    'user_login' =>  $input['email'],
				    'user_email'  =>  $input['email'],
				    'user_pass'  =>  $input['password'],
				);
				$user_id = wp_insert_user($seekerDetails);
				$result = update_user_meta($user_id, 'first_name',  $input['firstname']);
				$data = array(
					"user_id"=>$user_id,
					"user_email"=>$input['email'],
					"user_name"=>$input['firstname'],
					"lead_source"=>$input['lead_source'],
					"actions"=>"call",
					"call_connected"=>"0"
				);
				$wpdb->insert('user_connecting',$data);
				//var_dump($result);
				// $addressObj->country = $input['country'];
				// $addressObj->state = $input['state'];
				// $addressObj->city = $input['city'];
				// $address = json_encode($addressObj);
				// update_user_meta($user_id, 'address',  $address);
			  	
	/*
				update_user_meta($user_id, 'country',  $input['country']);
				update_user_meta($user_id, 'state',  $input['state']);
				update_user_meta($user_id, 'city',  $input['city']);
	*/
				
				auto_login_new_user($user_id);
				if($input['txtEventId'] != "" && $input['txtQuery'] != "")
				{
					$event_id = $input['txtEventId'];
					$question = $input['txtQuery'];
					$current_user = wp_get_current_user();
					$user_email = $current_user->user_email;
					$result = saveFAQQuery($event_id,$question,$user_email);
					wp_redirect(get_permalink($event_id) . "?event_query=saved");
					exit;
				}
				if($input['lead_source'] != "" )
				{
					$current_user = wp_get_current_user();
					update_user_meta($current_user->ID, 'lead_form_source',  $input['lead_source']);
				}
				//$login_url = add_query_arg('flg', '1', get_permalink(419));
				//wp_redirect($login_url);exit;
				echo generateJSON('success','You have successfully signed up.Please login',array('user_id'=>$user_id));exit;
			} 
			else 
			{
				update_user_meta($user_id, 'stage',  1);
				auto_login_new_user($user_id);
			    echo generateJSON('error','User already exists','');exit;
			}
		} 
		else 
		{
			 echo generateJSON('error','','');exit;
		}
    }
}

function assign_masked_number_to_user(){
	global $wpdb;
	$therapist_email = $_POST['therapist_email'];
	$seeker_email = $_POST['seeker_email'];
	$therapist = get_user_by("email",$therapist_email);
	$seeker = get_user_by("email",$seeker_email);
	$r_masked_number = $c_masked_number = "";

	$callcount = $wpdb->get_var("SELECT count(*) FROM my_operator_number_allocation WHERE caller_id = ".$seeker->ID." AND Date(call_timestamp) = CURRENT_DATE()");
	if($callcount < 3){
		$check_caller_entry = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE caller_id = ".$seeker->ID." and is_deleted = 0");
		if($check_caller_entry){
			$check_receiver_entry = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE receiver_id = ".$therapist->ID." and caller_id = ".$seeker->ID." and is_deleted = 0");

			if($check_receiver_entry){ 
				$get_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.caller_id = ".$seeker->ID." and mo.receiver_id = ".$therapist->ID." and mo.is_deleted = 0");
				$c_masked_number = $get_masked_number->masked_number;

				$get_t_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.caller_id = ".$therapist->ID." and mo.receiver_id = ".$seeker->ID." and mo.is_deleted = 0");
				$r_masked_number = $get_t_masked_number->masked_number;

			}else{
				$get_unused_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 1 LIMIT 1");
				if(!$get_unused_number){
					// If unused masked number is not available
					$first_row = $wpdb->get_row("SELECT * FROM my_operator_call_masking_details WHERE status = 0 ORDER BY id LIMIT 1");

					$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE cmd_id = ".$first_row->id." AND caller_id = ".$seeker->ID);
					
					$data = array('caller_id' => $seeker->ID, 'receiver_id' => $therapist->ID, 'cmd_id' => $first_row->id);
					$wpdb->insert('my_operator_number_allocation',$data);

					$c_masked_number = $first_row->masked_number;

					//check for other masked number

					$get_receiver_row = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE cmd_id = ".$first_row->id." AND caller_id = ".$therapist->ID);


					if($get_receiver_row){
						$get_receiver_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number,m.id as id from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.cmd_id != ".$first_row->id." ORDER BY m.id LIMIT 1");


						if(!$get_receiver_masked_number){
							$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE cmd_id = ".$first_row->id." AND caller_id = ".$therapist->ID);

							$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $first_row->id);
							$wpdb->insert('my_operator_number_allocation',$data);
							$r_masked_number = $first_row->masked_number;

						}else{
							$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_receiver_masked_number->id);
							$wpdb->insert('my_operator_number_allocation',$data);
							$r_masked_number = $get_receiver_masked_number->masked_number;	
						}
								
					}else{
						$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $first_row->id);
						$wpdb->insert('my_operator_number_allocation',$data);
						$r_masked_number = $first_row->masked_number;
					}

				}else{
					//If unused masked number is available
					$data = array('caller_id' => $seeker->ID, 'receiver_id' => $therapist->ID, 'cmd_id' => $get_unused_number->id);
					$wpdb->insert('my_operator_number_allocation',$data);

					$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_unused_number->id);
					$wpdb->insert('my_operator_number_allocation',$data);

					$wpdb->query("UPDATE my_operator_call_masking_details SET status = 0 WHERE id = ".$get_unused_number->id);
					$r_masked_number = $c_masked_number = $get_unused_number->masked_number;	
				}
			}
		}else{
			//pick any used masked number, make an entry in allocation table
			$get_used_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
			if(!$get_used_number){
				$get_used_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 1 ORDER BY id LIMIT 1");

				$wpdb->query("UPDATE my_operator_call_masking_details SET status = 0 WHERE id = ".$get_used_number->id);
			}
			$data = array('caller_id' => $seeker->ID, 'receiver_id' => $therapist->ID, 'cmd_id' => $get_used_number->id);
			$wpdb->insert('my_operator_number_allocation',$data);

			$c_masked_number = $get_used_number->masked_number;

			//check existing connection already exists for the therapist
			$get_receiver_row = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE cmd_id = ".$get_used_number->id." AND caller_id = ".$therapist->ID);

				if($get_receiver_row){
					$get_receiver_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number,m.id as id from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.cmd_id != ".$get_used_number->id." ORDER BY m.id LIMIT 1");


					if(!$get_receiver_masked_number){
						$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE cmd_id = ".$get_used_number->id." AND caller_id = ".$therapist->ID);

						$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_used_number->id);
						$wpdb->insert('my_operator_number_allocation',$data);
						$r_masked_number = $get_used_number->masked_number;

					}else{
						$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_receiver_masked_number->id);
						$wpdb->insert('my_operator_number_allocation',$data);
						$r_masked_number = $get_receiver_masked_number->masked_number;	
					}
							
				}else{
					$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_used_number->id);
					$wpdb->insert('my_operator_number_allocation',$data);
					$r_masked_number = $get_used_number->masked_number;
				}
			} 
			$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '0'");
			$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '1' WHERE caller_id = ".$seeker->ID." AND receiver_id = ".$therapist->ID." AND is_deleted = 0");

			// send_mail_to_therapist($therapist,$seeker,$r_masked_number);
			// send_mail_to_seeker($therapist,$seeker,$c_masked_number);

			// send_sms_to_therapist($seeker,$therapist,$r_masked_number);
			// send_sms_to_seeker($seeker,$therapist,$c_masked_number);

			send_mail_to_product_manager_thriive($therapist,$seeker,$r_masked_number,$c_masked_number);
			$msg = "Caller Email: ".$seeker->user_email."<br/>Caller Number: ".$c_masked_number."<br/><br/>Receiver Email: ".$therapist->user_email."<br/>Receiver Number: ".$r_masked_number;
			sendEmail('prathamesh@thriive.in','Assigned masked number',$msg);
			sendEmail('manishj@thriive.in','Assigned masked number',$msg);

			$result = array("status"=>"success","masked_number"=>$c_masked_number);
		} else {
			$result = array("status"=>"error","error_msg"=>"Dear user, thank you for using Thriive. You have reached the limit for the maximum number of calls a user can make in a day. Feel free to call again tomorrow.");
		}
		wp_send_json_success($result);
}
function consult_online_thriive_therapist($therapist_email_val = NULL,$seeker_email_val = NULL){

	global $wpdb;
	$therapist_email = $seeker_email = "";
	$is_ajax = 1;

	if($therapist_email_val == NULL && $seeker_email_val == NULL){
		$therapist_email = $_POST['therapist_email'];
		$seeker_email = $_POST['seeker_email'];
	}else{
		$therapist_email = $therapist_email_val;
		$seeker_email = $seeker_email_val;
		$is_ajax = 0;
	}

	$therapist = get_user_by("email",$therapist_email);
	$seeker = get_user_by("email",$seeker_email);
	$r_masked_number = $c_masked_number = "";
	
	$check_caller_entry = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE caller_id = ".$seeker->ID." and is_deleted = 0");

	if($check_caller_entry){

		$check_receiver_entry = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE receiver_id = ".$therapist->ID." and caller_id = ".$seeker->ID." and is_deleted = 0");

		if($check_receiver_entry){

			$get_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.caller_id = ".$seeker->ID." and mo.receiver_id = ".$therapist->ID." and mo.is_deleted = 0");
			$c_masked_number = $get_masked_number->masked_number;

			$get_t_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.caller_id = ".$therapist->ID." and mo.receiver_id = ".$seeker->ID." and mo.is_deleted = 0");
			$r_masked_number = $get_t_masked_number->masked_number;

		}else{
			$get_unused_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 1 LIMIT 1");
			if(!$get_unused_number){
				// If unused masked number is not available
				$first_row = $wpdb->get_row("SELECT * FROM my_operator_call_masking_details WHERE status = 0 ORDER BY id LIMIT 1");

				$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE cmd_id = ".$first_row->id." AND caller_id = ".$seeker->ID);
				
				$data = array('caller_id' => $seeker->ID, 'receiver_id' => $therapist->ID, 'cmd_id' => $first_row->id);
				$wpdb->insert('my_operator_number_allocation',$data);

				$c_masked_number = $first_row->masked_number;

				//check for other masked number

				$get_receiver_row = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE cmd_id = ".$first_row->id." AND caller_id = ".$therapist->ID);


				if($get_receiver_row){
					$get_receiver_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number,m.id as id from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.cmd_id != ".$first_row->id." ORDER BY m.id LIMIT 1");


					if(!$get_receiver_masked_number){
						$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE cmd_id = ".$first_row->id." AND caller_id = ".$therapist->ID);

						$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $first_row->id);
						$wpdb->insert('my_operator_number_allocation',$data);
						$r_masked_number = $first_row->masked_number;

					}else{
						$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_receiver_masked_number->id);
						$wpdb->insert('my_operator_number_allocation',$data);
						$r_masked_number = $get_receiver_masked_number->masked_number;	
					}
							
				}else{
					$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $first_row->id);
					$wpdb->insert('my_operator_number_allocation',$data);
					$r_masked_number = $first_row->masked_number;
				}

			}else{
				//If unused masked number is available
				$data = array('caller_id' => $seeker->ID, 'receiver_id' => $therapist->ID, 'cmd_id' => $get_unused_number->id);
				$wpdb->insert('my_operator_number_allocation',$data);

				$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_unused_number->id);
				$wpdb->insert('my_operator_number_allocation',$data);

				$wpdb->query("UPDATE my_operator_call_masking_details SET status = 0 WHERE id = ".$get_unused_number->id);
				$r_masked_number = $c_masked_number = $get_unused_number->masked_number;	
			}
		}
	}else{
		//pick any used masked number, make an entry in allocation table
		$get_used_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
		if(!$get_used_number){
			$get_used_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 1 ORDER BY id LIMIT 1");

			$wpdb->query("UPDATE my_operator_call_masking_details SET status = 0 WHERE id = ".$get_used_number->id);
		}
		$data = array('caller_id' => $seeker->ID, 'receiver_id' => $therapist->ID, 'cmd_id' => $get_used_number->id);
		$wpdb->insert('my_operator_number_allocation',$data);

		$c_masked_number = $get_used_number->masked_number;

		//check existing connection already exists for the therapist
		$get_receiver_row = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE cmd_id = ".$get_used_number->id." AND caller_id = ".$therapist->ID);

			if($get_receiver_row){
				$get_receiver_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number,m.id as id from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.cmd_id != ".$get_used_number->id." ORDER BY m.id LIMIT 1");


				if(!$get_receiver_masked_number){
					$wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE cmd_id = ".$get_used_number->id." AND caller_id = ".$therapist->ID);

					$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_used_number->id);
					$wpdb->insert('my_operator_number_allocation',$data);
					$r_masked_number = $get_used_number->masked_number;

				}else{
					$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_receiver_masked_number->id);
					$wpdb->insert('my_operator_number_allocation',$data);
					$r_masked_number = $get_receiver_masked_number->masked_number;	
				}
						
			}else{
				$data = array('receiver_id' => $seeker->ID, 'caller_id' => $therapist->ID, 'cmd_id' => $get_used_number->id);
				$wpdb->insert('my_operator_number_allocation',$data);
				$r_masked_number = $get_used_number->masked_number;
			}
	}

	$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '0'");
	$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '1' WHERE caller_id = ".$seeker->ID." AND receiver_id = ".$therapist->ID." AND is_deleted = 0");


	send_mail_to_therapist($therapist,$seeker,$r_masked_number);
	send_mail_to_seeker($therapist,$seeker,$c_masked_number);

	send_sms_to_therapist($seeker,$therapist,$r_masked_number);
	send_sms_to_seeker($seeker,$therapist,$c_masked_number);

	send_mail_to_product_manager_thriive($therapist,$seeker,$r_masked_number,$c_masked_number);

	//save call details in my_operator_call_history table
    $data = array('caller_id' => $seeker->ID,
                  'receiver_id' => $therapist->ID,
                  'is_call'=>0 ,
                  'is_seeker'=>1);
    $format = array('%s','%d','%d','%d','%d');
    $wpdb->insert('my_operator_call_history',$data,$format);


	$result = array("status"=>"success");
	if($is_ajax){
		wp_send_json_success($result);
	}
}

function send_mail_to_therapist($therapist,$seeker,$masked_number){

	$therapist_name = get_user_meta($therapist->ID,"first_name",true)." ".get_user_meta($therapist->ID,"last_name",true);
	$seeker_name = get_user_meta($seeker->ID,"first_name",true)." ".get_user_meta($seeker->ID,"last_name",true);
	$therapist_email = $therapist->user_email;
	
	$subject = "Thriive user is trying to connect to you";
	$msg = "Dear ".$therapist_name.",<br/>
			We are pleased to inform you that ".$seeker_name." wishes to connect with you.<br/><br/>
			Here are the contact details:<br/>
			Name: ".$seeker_name."<br/>
			Number.: ".$masked_number."<br/><br/>
			We have shared your details with them. They might get in touch with you. Hope you have a pleasant experience!<br/><br/>
			Keep Thriiving!<br/>
			Love & light,<br/>
			Team Thriive<br/><br/><br/>
			Note: This is an automatically generated email, please do not reply. For any further questions, please feel free to contact us at accountmanager1@thriive.in for help. ";

	sendEmail($therapist_email, $subject, $msg);

}

function send_mail_to_seeker($therapist,$seeker,$masked_number){

	$therapist_name = get_user_meta($therapist->ID,"first_name",true)." ".get_user_meta($therapist->ID,"last_name",true);
	$seeker_name = get_user_meta($seeker->ID,"first_name",true)." ".get_user_meta($seeker->ID,"last_name",true);
	$seeker_email = $seeker->user_email;

	$subject = "Thriive user is trying to connect to you";
	$msg = "Dear ".$seeker_name.",<br/>
			Thank you for your interest in connecting with our Thriive-verified Therapist ".$therapist_name.". We have sent you an SMS and an email with their details. Please feel free to get in touch with them to get healed :-)<br/><br/>  
				Here are the contact details:<br/>
				Name: ".$therapist_name."<br/>
				Number.: ".$masked_number."<br/><br/>
				We have shared your details with them. They might get in touch with you. Hope you have a pleasant experience!<br/><br/>
				Keep Thriiving!<br/>
				Love & light,<br/>
				Team Thriive<br/><br/><br/>
				Note: This is an automatically generated email, please do not reply. For any further questions, please feel free to contact us at accountmanager1@thriive.in for help.";

	sendEmail($seeker_email, $subject, $msg);
}

function send_mail_to_product_manager_thriive($therapist,$seeker,$r_masked_number,$c_masked_number){
	
	$subject = "Thriive user is trying to connect to a therapist";
	$msg = "Hello,<br/>User has tried to connect to a therapist.Following is the detail for both caller and the receiver<br/><br/>
		Therapist:".get_user_meta($therapist->ID,"first_name",true)." ".get_user_meta($therapist->ID,"last_name",true)."<br/>
		seeker:".get_user_meta($seeker->ID,"first_name",true)." ".get_user_meta($seeker->ID,"last_name",true)."<br/>

		Caller Masked Number:".$c_masked_number."<br/>
		Receiver Masked Number:".$r_masked_number;

	sendEmail("productmanager@thriive.in", $subject, $msg);
}

function send_sms_to_therapist($seeker,$therapist,$masked_number){

	$seeker_name = get_user_meta($seeker->ID,"first_name",true)." ".get_user_meta($seeker->ID,"last_name",true);
	$therapist_mobile = $therapist->mobile;

	$msg = $seeker_name ." ". $masked_number."\n wants to consult with you. We have shared your details with the user. You can also call & connect by using your registered mobile no. on Thriive. Hope you have a pleasant experience! Keep Thriiving!";

	sendSMS($therapist_mobile,$msg);
}

function send_sms_to_seeker($seeker,$therapist,$masked_number){

	$therapist_name = get_user_meta($therapist->ID,"first_name",true)." ".get_user_meta($therapist->ID,"last_name",true);
	$seeker_mobile = $seeker->mobile;

	$msg = "Thank you for showing interest in connecting with our Thriive-verified Therapist, ".$therapist_name.". You can contact them on ".$masked_number.".\nPlease note that you can contact a therapist only with a mobile number registered with Thriive.in. Hope you have a pleasant experience!\nKeep Thriiving!";

	sendSMS($seeker_mobile,$msg);
}

function search_query_ailment() {
	$therapy_arr = [];
	$therapy_list = '';
	$therapies = get_therapy_by_ailment($_GET['ailments']);

	foreach($therapies as $key => $val) {
		array_push($therapy_arr, $val->slug);
		$therapy_list .= $val->slug;

		if($key != count($therapies) - 1) {
			$therapy_list .= ',';
		}
	}

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type' => 'therapist',
		'post_status' => 'publish',
		'posts_per_page' => 4,
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'therapy',
				'terms' => $therapy_arr,
				'field' => 'slug',
				'operator' => 'IN',
				'include_children' => 0
			)
		),
	);

	$custom_query = new WP_Query($args);

	// Pagination fix
	global $wp_query;
	$GLOBALS['temp_query'] = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $custom_query;
}

function search_query_therapy() {
	$therapy = $_GET['therapy'];

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type' => 'therapist',
		'post_status' => 'publish',
		'posts_per_page' => 4,
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'therapy',
				'terms' => $therapy,
				'field' => 'slug',
				'operator' => 'IN',
				'include_children' => 0
			)
		),
	);

	$custom_query = new WP_Query($args);

	// Pagination fix
	global $wp_query;
	$GLOBALS['temp_query'] = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $custom_query;
}

function reset_main_query_object() {
	// Reset main query object
	global $wp_query;
	$wp_query = NULL;
	$wp_query = $GLOBALS['temp_query'];
	wp_reset_query();
}

// Get term by Slug
function get_term_by_slug($slug, $type) {
	$term = get_term_by('slug', $slug, $type);
	return $term->name;
}

function register_geolocation_menu_page() {
    add_menu_page('Geolocation Page', 'Geolocation', 'add_users', 'geolocationpage', '_geolocation_menu_page', null, 6);
    add_menu_page('Call Report Page', 'Call Report', 'add_users', 'callreportpage', '_callreport_menu_page', null, 6); 
    add_menu_page('Call Count Report Page', 'Call Count Report', 'add_users', 'callcountreportpage', '_callcountreport_menu_page', null, 6);
    add_menu_page('Custom Export Page', 'Custom Export', 'add_users', 'customexportpage', '_customexport_menu_page', null, 6);
    add_menu_page('Business Module Page', 'Business Module', 'add_users', 'businessmodulepage', '_businessmodule_menu_page', null, 6);
}
add_action('admin_menu', 'register_geolocation_menu_page');

function _geolocation_menu_page(){
   echo "<h1>Insert location area and code</h1><form action='' method='post'><button type='submit' name='insertgeolocation'>Insert</button><br/><br/><button type='submit' name='emptygeolocation'>Empty</button><br/><br/><button type='submit' name='insertavgrating'>Insert Rating</button><br/><br/><button type='submit' name='insert_regdate'>Insert Registration Date</button><br/><br/><button type='submit' name='inserttherapyparent'>Assign Parent Therapy</button></form>";  
}

function _customexport_menu_page(){
	$args = array(
		'taxonomy' => 'therapy',
        'orderby' => 'slug'
    );
    $categories = get_categories( $args );
    $nonce = wp_create_nonce( 'exp_therapy_therapist' ); 
    $html = "<a href='admin.php?page=customexportpage&action=exp_therapy_therapist&_wpnonce=$nonce' class='page-title-action'>Export to CSV</a>";
  //   foreach( $categories as $category ){
  //   	$args = array(
		// 	'post_type' => 'therapist',
		// 	'posts_per_page' => -1,
		// 	'tax_query' => array(
		// 	    array(
		// 	    'taxonomy' => 'therapy',
		// 	    'field' => 'term_id',
		// 	    'terms' => $category->term_id
		// 	     )
		// 	  )
		// );
		// $query = new WP_Query( $args );
		// $name = array();
		// foreach($query->posts as $p){
		// 	array_push($name,$p->post_title);
		// } 
  //       $html .= '<li class="list-group-item d-flex align-items-center"><a href="' . get_category_link( $category->term_id ) . '" rel="bookmark"><i class="fa fa-chevron-right" aria-hidden="true"></i>' . $category->name . '<span>, ' . $category->category_count . '</span></a></li><br/>';
  //       $html .= implode(', ', $name).'<br/><br/>';
  //   }
    echo $html;
}

function getTTData(){
	$args = array(
		'taxonomy' => 'therapy',
        'orderby' => 'slug'
    );
    $categories = get_categories( $args );
    $result = array();
    foreach( $categories as $category ){
    	$temp = array();
    	$temp['name'] = $category->name;
    	$temp['count'] = $category->category_count;
    	$args = array(
			'post_type' => 'therapist',
			'posts_per_page' => -1,
			'tax_query' => array(
			    array(
			    'taxonomy' => 'therapy',
			    'field' => 'term_id',
			    'terms' => $category->term_id
			     )
			  )
		);
		$query = new WP_Query( $args );
		$name = array();
		foreach($query->posts as $p){
			array_push($name,$p->post_title);
		} 
		$temp['therapist'] = implode(',', $name);
		array_push($result, $temp);
	}
    return $result;
}

if ( isset($_GET['action'] ) && $_GET['action'] == 'exp_therapy_therapist' )  {
	// Handle CSV Export
	add_action( 'admin_init', 'csv_export1') ;
}

function csv_export1() {
    // Check for current user privileges 
    if( !current_user_can( 'manage_options' ) ){ return false; 
    }

    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    // Nonce Check
    $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'exp_therapy_therapist' ) ) {
        die( 'Security check error' );
    }
    
    ob_start();

    $domain = $_SERVER['SERVER_NAME'];
    $filename = 'exptt-' . date("d-m-Y_h-i-s_A") . '.csv';
    
    $header_row = array(
        'Therapy Name',
        'Therapy Count',
        'Therapist List'
    );
    $data_rows = array();
    $getttdata = getTTData();
    
    foreach ( $getttdata as $key => $value ) {
        $row = array(
        	$value['name'],
            $value['count'],
            $value['therapist']
        );
        $data_rows[] = $row;
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );
    
    ob_end_flush();
    
    die();
}

function _callreport_menu_page(){
	global $wpdb;
	$posts_per_page = 20;
	$start = 0;
	$paged = $_GET['paged'] ? $_GET['paged'] : 1;
	$start = ($paged-1)*$posts_per_page;
	$wac_count = $wpdb->get_var("SELECT count(*) FROM webhook_after_call");
	$total_pages = ceil($wac_count / $posts_per_page);
    $webhook_after_call = $wpdb->get_results("SELECT * FROM webhook_after_call LIMIT $start,$posts_per_page",OBJECT);
    $html = "<table class='wp-list-table widefat fixed striped pages'>";
    $html .= "<tr><th class='manage-column column-myoperator'>Myoperator</th><th class='manage-column column-callername'>Caller Name</th><th class='manage-column column-calleremail'>Caller Email</th><th class='manage-column column-callernumber'>Caller Number</th><th class='manage-column column-callerrole'>Caller Role</th><th class='manage-column column-callduration'>Call Duration</th><th class='manage-column column-receivername'>Receiver Name</th><th class='manage-column column-receiveremail'>Receiver Email</th><th class='manage-column column-receivermobile'>Receiver Mobile</th><th class='manage-column column-callstatus'>Call Status</th><th class='manage-column column-datetime'>Date & Time</th></tr>";
    
    foreach($webhook_after_call as $wac){
    	$caller = get_users(array(
    		'meta_key'     => 'mobile',
    		'meta_value'   => $wac->caller_number,
    		'meta_compare' => '=',
		));
		if($caller){
			$cname = $caller[0]->data->display_name;
			$crole = $caller[0]->roles[0];
			$cemail = $caller[0]->user_email;
		} else {
			$cname = "";
			$crole = "";
			$cemail = "";
		}
		$html .= "<tr><td></td><td>$cname</td><td>$cemail</td><td>$wac->caller_number</td><td>$crole</td><td>$wac->call_duration</td>";
		if($wac->received_by != 'null'){
			$received_by = json_decode($wac->received_by);
			$receiver = get_users(array(
	    		'meta_key'     => 'mobile',
	    		'meta_value'   => substr($received_by->_rr[0]->_na,2),
	    		'meta_compare' => '=',
			));
			if($receiver){
				$rname = $receiver[0]->data->display_name;
				$remail = $receiver[0]->user_email;
				$rmobile = $received_by->_rr[0]->_na;
			} else {
				$rname = "";
				$remail = "";
				$rmobile = $received_by->_rr[0]->_na;
			}
			$html .= "<td>$rname</td><td>$remail</td><td>$rmobile</td>";
		} else {
			$html .= "<td></td><td></td><td></td>";
		}
		$html .= "<td>$wac->call_status</td><td>$wac->created_date $wac->time</td></tr>";
    }
    $html .= "</table><div style='text-align: right;display: inline-flex;'>";
    $html .= "<div style='margin: 5px 10px;'><a href='admin.php?page=callreportpage&paged=1'>First</a></div>";
	if($paged <= 1){
		$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Prev</a></div>";
    } else {
    	$pageno = $paged-1;
    	$html .= "<div style='margin: 5px 10px;'><a href='admin.php?page=callreportpage&paged=$pageno'>Prev</a></div>";
    }
    if($paged >= $total_pages){
		$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Next</a></div>";
    } else {
    	$pageno = $paged+1;
    	$html .= "<div style='margin: 5px 10px;'><a href='admin.php?page=callreportpage&paged=$pageno'>Next</a></div>";
    }
	$html .= "<div style='margin: 5px 10px;'><a href='admin.php?page=callreportpage&paged=$total_pages'>Last</a></div></div>";
    echo $html;
}

// get the therapist total count of call
function getTTotalCountCall($limit, $returnVal){
	global $wpdb;
	$results = $wpdb->get_results("SELECT p.ID, p.post_title, u.user_email, um.meta_value AS u_mobile, (SELECT count(*) FROM webhook_after_call WHERE caller_number LIKE CONCAT('%',(SELECT u_mobile),'%') OR received_by LIKE CONCAT('%',(SELECT u_mobile),'%')) AS wac_count FROM wp_posts AS p INNER JOIN wp_users AS u ON u.id = p.post_author INNER JOIN wp_usermeta AS um ON um.user_id = u.id AND um.meta_key = 'mobile' WHERE p.post_status = 'publish' AND p.post_type = 'therapist' $limit",$returnVal);
	return $results;
}

// get the therapist call count by status
function getTCallCountByStatus($mobile, $status){
	global $wpdb;
	//$results = $wpdb->get_var("SELECT Count(*) FROM webhook_after_call WHERE call_status = '".$status."' AND (caller_number LIKE '%".$mobile."%' OR received_by LIKE '%".$mobile."%')");
	$results = $wpdb->get_var("SELECT Count(*) FROM knowlarity_after_call WHERE call_status = '".$status."' AND (agent_number LIKE '%".$mobile."%' OR customer_number LIKE '%".$mobile."%')");
	return $results;
}

function _callcountreport_menu_page(){
	$posts_per_page = 20;
	$start = 0;
	$paged = $_GET['paged'] ? $_GET['paged'] : 1;
	$start = ($paged-1)*$posts_per_page;
	$tcount = getTTotalCountCall("",ARRAY_A);
	$therapist = getTTotalCountCall("LIMIT $start,$posts_per_page",OBJECT);
	$nonce = wp_create_nonce( 'download_csv' ); 
    $html = "<a href='admin.php?page=callcountreportpage&action=download_csv&_wpnonce=$nonce' class='page-title-action'>Export to CSV</a>";
	$total_pages = ceil(count($tcount) / $posts_per_page);
	if($therapist){
		$html .= "<table class='wp-list-table widefat fixed striped pages'>";
   		$html .= "<tr><th class='manage-column column-therapistname'>Therapist Name</th><th class='manage-column column-therapistemail'>Therapist Email</th><th class='manage-column column-connectcount'>Connected Call</th><th class='manage-column column-missedcount'>Missed Count</th></tr>";
		foreach ($therapist as $key => $value) {
			$html .= "<tr><td>$value->post_title</td><td>$value->user_email</td>";
			$connected_count = getTCallCountByStatus($value->u_mobile, 'connected');
			$missed_count = getTCallCountByStatus($value->u_mobile, 'missed'); 
			$html .= "<td>$connected_count</td><td>$missed_count</td></tr>";
		}
		$html .= "</table><div>";
		$html .= "<div><a href='admin.php?page=callcountreportpage&paged=1'>First</a></div>";
		if($paged <= 1){
			$html .= "<div class='disabled'><a href='#'>Prev</a></div>";
	    } else {
	    	$pageno = $paged-1;
	    	$html .= "<div><a href='admin.php?page=callcountreportpage&paged=$pageno'>Prev</a></div>";
	    }
	    if($paged >= $total_pages){
			$html .= "<div class='disabled'><a href='#'>Next</a></div>";
	    } else {
	    	$pageno = $paged+1;
	    	$html .= "<div><a href='admin.php?page=callcountreportpage&paged=$pageno'>Next</a></div>";
	    }
		$html .= "<div><a href='admin.php?page=callcountreportpage&paged=$total_pages'>Last</a></div></div>";
		echo $html;
	}
}

if ( isset($_GET['action'] ) && $_GET['action'] == 'download_csv' )  {
	// Handle CSV Export
	add_action( 'admin_init', 'csv_export') ;
}

function csv_export() {
    // Check for current user privileges 
    if( !current_user_can( 'manage_options' ) ){ return false; 
    }

    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    // Nonce Check
    $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'download_csv' ) ) {
        die( 'Security check error' );
    }
    
    ob_start();

    $domain = $_SERVER['SERVER_NAME'];
    $filename = 'callcountreport-' . date("d-m-Y_h-i-s_A") . '.csv';
    
    $header_row = array(
        'Therapist Name',
        'Therapist Email',
        'Connected Count',
        'Missed Count'
    );
    $data_rows = array();
    $callreport = getTTotalCountCall("",OBJECT);
    foreach ( $callreport as $key => $value ) {
		$connected_count = getTCallCountByStatus($value->u_mobile, 'connected');
		$missed_count = getTCallCountByStatus($value->u_mobile, 'missed'); 
            
        $row = array(
        	$value->post_title,
            $value->user_email,
            $connected_count,
            $missed_count
        );
        $data_rows[] = $row;
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );
    
    ob_end_flush();
    
    die();
}

if(isset($_POST['insertavgrating'])){
	$args = array (
	    'post_type' => 'therapist',
	    'post_status' => 'publish',
	    'orderby' => ASC,
	    'posts_per_page' => -1
	);

	// The Query
	$wp_query = new WP_Query( $args );
	if($wp_query->have_posts()) {
		while($wp_query->have_posts()) {
			$wp_query->the_post();
	      	$post_id = get_the_id();
	      	$existingRows = get_post_meta($post_id, 'review_details', true);
	      	$avgrate = calculateAvgRating($post_id,$existingRows);
			update_field('avg_rating',$avgrate,$post_id);
		}
	}
}

if(isset($_POST['insert_regdate'])){
	$filename = get_template_directory()."/framework/registration_date.csv";
	$f = fopen($filename, "r");
    $result = array();
    while ($row = fgetcsv($f)) {
        $post = get_page_by_path($row[0], '', 'therapist');
        if(!empty($post)){
        	$reg_dt = get_post_meta($post->ID,'t_registration_date',true);
        	if(empty($reg_dt)){
				update_post_meta($post->ID,'t_registration_date',$row[1]);
			}
		}
    } 
    fclose($f);
}

if(isset($_POST['insertgeolocation'])){
	global $wpdb;
	$results = $wpdb->get_results("SELECT p.id,pm.meta_value AS address, pm1.meta_value AS zipcode, pm2.meta_value AS area, pm3.meta_value AS latitude, pm4.meta_value AS longitude FROM wp_posts AS p INNER JOIN wp_postmeta AS pm ON pm.post_id = p.id AND pm.meta_key = 'address' INNER JOIN wp_postmeta AS pm1 ON pm1.post_id = p.id AND pm1.meta_key = 'zipcode' INNER JOIN wp_postmeta AS pm2 ON pm2.post_id = p.id AND pm2.meta_key = 'area' INNER JOIN wp_postmeta AS pm3 ON pm3.post_id = p.id AND pm3.meta_key = 'latitude' INNER JOIN wp_postmeta AS pm4 ON pm4.post_id = p.id AND pm4.meta_key = 'longitude' WHERE p.id IN (36689,36790,36802,36836,36917,36935,36980,37009,37154,37233,37396,37563,37584,37671,37678,37710,37711,37732,37795,38002,38043,38051,38060,38078,38081,38103,38135,38142,38222,38346,38428,38518,38588,38610,38632,38641,38656,38678,38686,38781,38783,38848,38874,38929,38957,39041,39233,39244,39254,39268,39276,39277,39297,39450,39451,39467,39511,39520,39541,39634,39641,39648,39678,39729,39764,39853,39894,39957,39980,40002,40003,40077,40146,40187,40190,40231,40307,40308,40350,40446,40582,40698,40793,40843,40852,40868,40881,40884,40923,40937,41066,41189,41218,41227,41237,41289,41290,41332,41432,41444,41522,41570,41585,41606,41638,41656,41695,41759,41970,42019,42320,42324,42535,42619,43109,43186,43299,43329,43358,43373,43429,43782,44380,44650,44678,44909,45433,45792,45903,45904,46636,47211,47708,47720,48502,48554,48846,49067,49664,49820,49841,49843,49896,49985) AND p.post_type = 'therapist' AND p.post_status = 'publish'");
	if($results){
		foreach ($results as $value) {
			//print_r($value); exit;
			// $value->zipcode
			update_post_area($value->id,$value->area,$value->address,$value->zipcode);
		}
	}
	// $tempPostid = array();
	// $args = array (
	//     'post_type' => 'therapist',
	//     'post_status' => 'publish',
	//     'orderby' => ASC,
	//     'posts_per_page' => 200,
	//     'paged' => 3
	// );
	// // The Query
	// $wp_query = new WP_Query( $args );
	// if($wp_query->have_posts()) {
	// 	while($wp_query->have_posts()) {
	// 		$wp_query->the_post();
	//       	$post_id = get_the_id();
	//       	$area = get_post_meta($post_id,"area",true);
	// 		$address = get_post_meta($post_id,"address",true);
	// 		$zipcode = get_post_meta($post_id,"zipcode",true);
	// 		$lat = get_post_meta($post_id,"latitude",true);
	// 		$lng = get_post_meta($post_id,"longitude",true);
	// 		if(!empty($area) && !empty($address) && !empty($zipcode) && empty($lat) && empty($lng)){
	//       		update_post_area($post_id,$area,$address,$zipcode);
	//       		echo $post_id."<br/>";
	//       	}
	// 	} 
	// }
} 

if(isset($_POST['inserttherapyparent'])){
	global $wpdb;
	$args = array (
	    'post_type' => 'therapist',
	    'post_status' => 'publish',
	    'orderby' => ASC,
	    'paged' => 33, 
	    'posts_per_page' => 100
	);
	$posts = get_posts($args);
	if($posts){
		$ids = array();
		foreach ($posts as $post) {
			$total_therapies = intval($post->therapy);
			for ($x = 0; $x < $total_therapies; $x++) {
				$varName = 'therapy_'.$x.'_therapy_name';
				$parent_id = $wpdb->get_var("SELECT parent FROM wp_terms t INNER JOIN wp_term_taxonomy tax ON `tax`.term_id = t.term_id WHERE ( `tax`.taxonomy = 'therapy') AND t.term_id = ".$post->$varName[0]);
				$data = array('object_id'=>$post->ID,'term_taxonomy_id'=>$parent_id);
				$wpdb->insert( 'wp_term_relationships', $data );
				array_push($ids, $post->ID);
			}
		}
		$msg = implode(', ', array_unique($ids));
		sendEmail('pooja@thriive.in','Assign parent theray',$msg.' has been assigned parent therapy');
	} else {
		sendEmail('pooja@thriive.in','Assign parent theray','no data');
	}
}

if(isset($_POST['emptygeolocation'])){
	$tempPostid = array();
	$args = array (
	    'post_type' => 'therapist',
	    'post_status' => 'publish',
	    'orderby' => ASC,
	    'posts_per_page' => -1
	);

	// The Query
	$wp_query = new WP_Query( $args );
	if($wp_query->have_posts()) {
		while($wp_query->have_posts()) {
			$wp_query->the_post();
	      	$post_id = get_the_id();
	      	update_field('area','',$post_id);
		    update_field('latitude','',$post_id);
		    update_field('longitude','',$post_id);
	    }
	}
}

function find_zipcode($filename, $zipcode) {
    $f = fopen($filename, "r");
    $result = array();
    while ($row = fgetcsv($f)) {
        if ($row[1] == $zipcode) {
        	$area_city = $row[0].", ".$row[2];
            array_push($result,$area_city);
        }
    }
    fclose($f);
    return $result;
}

function getLatLng($address){
	$results = array();
	$rp_address = str_replace(' ', '+', $address);
	$key = "AIzaSyDw52vclBfuZ079ANaizNMQDHDm13pOM9Y";
	$ch = curl_init("https://maps.googleapis.com/maps/api/geocode/json?address=".$rp_address."&key=".$key);
	
    // Returns the data/output as a string instead of raw data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Good practice to let people know who's accessing their servers. See https://en.wikipedia.org/wiki/User_agent
    curl_setopt($ch, CURLOPT_USERAGENT, 'YourScript/0.1 (contact@email)');
    
    //Set your auth headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $key
        ));
    
    // get stringified data/output. See CURLOPT_RETURNTRANSFER
    $data = curl_exec($ch);
    
    // get info about the request
    $info = curl_getinfo($ch);
    
    $decodeData = json_decode($data);

    curl_close($ch);
    if(!empty($decodeData->results)){
		$results['area'] = $address;
		$results['city'] = extractFromAdress($decodeData->results[0]->address_components,'locality');
		$results['lat'] = $decodeData->results[0]->geometry->location->lat;
		$results['lng'] = $decodeData->results[0]->geometry->location->lng;
	}
    return $results;
} 

function update_post_area($post_id,$area,$address,$zipcode){
  	$get_area_lists_by_zipcode = find_zipcode(get_template_directory()."/framework/list-of-area-by-zipcodes.csv",$zipcode);
	$getLatLng = getLatLng($zipcode);
	if(count($get_area_lists_by_zipcode) > 1){
  		foreach ($get_area_lists_by_zipcode as $csv_area) {
  			$spiltAreaCity = explode(",", $csv_area);
  			if(strpos( strtolower($address), strtolower($spiltAreaCity[0]) ) !== false) {
  				update_post_meta($post_id,'area',$csv_area);
			} else {
				update_post_meta($post_id,'area',$get_area_lists_by_zipcode[0]);
			}
			update_post_meta($post_id,'latitude',$getLatLng['lat']);
			update_post_meta($post_id,'longitude',$getLatLng['lng']);
  		}
  	} else {
  		update_post_meta($post_id,'area',$get_area_lists_by_zipcode[0]);
  		update_post_meta($post_id,'latitude',$getLatLng['lat']);
		update_post_meta($post_id,'longitude',$getLatLng['lng']);
    }
}

function my_acf_save_post($post_id) {
	global $post;
	if($post->post_type == 'therapist' && ($post->post_status == 'draft' || $post->post_status == 'pending' || $post->post_status == 'pending-payments' || $post->post_status == 'review-b4-publish' || $post->post_status == 'publish')){
		$total_therapies = intval($post->therapy);
		for ($x = 0; $x < $total_therapies; $x++) {
			$varName = 'therapy_'.$x.'_therapy_name';
			$parent_id = get_term($post->$varName[0],"therapy")->parent;
			if($parent_id != 0){
				$therapy_id[] = $post->$varName[0];
				$therapy_id[] = $parent_id;
				wp_set_post_terms($post_id, $therapy_id, 'therapy' );
			}
			
		}
	}
	// if($post->post_type == 'therapist' && $post->post_status == 'publish'){
	// 	$existingRows = get_post_meta($post_id, 'review_details', true);
	// 	$avgrate = calculateAvgRating($post_id,$existingRows);
	// 	update_field('avg_rating',$avgrate,$post_id);
	// 	if(empty(get_field("area", $post_id)) && !empty(get_field("address", $post_id)) && !empty(get_field("zipcode", $post_id))){
	// 		$area = get_field("area", $post_id);
	// 		$address = get_field("address", $post_id);
	// 		$zipcode = get_field("zipcode", $post_id);
	// 		update_post_area($post_id,$area,$address,$zipcode);
	// 	}
	// }
}

function post_published_notification( $ID, $post ) {
	$regdate = date('d-m-Y H:i:s');
    update_post_meta($ID,'t_registration_date',$regdate);
}

function custom_posts_table_head( $columns ) {
    $columns['t_registration_date'] = 'Registration Date';
    return $columns;
}

function custom_posts_table_content( $column_name, $post_id ) {
    if( $column_name == 't_registration_date' ) {
        $t_regiration_date = get_post_meta( $post_id, 't_registration_date', true );
        echo $t_regiration_date;
    }
}

function seeker_signup(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	global $wpdb;
	if(!empty($mobileNumber)){
		$query = "SELECT meta_value FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
		$isMobileExist = $wpdb->get_var($query);
	}
	if ( username_exists( $email ) && email_exists($email)) {
		echo generateJSON('error','Email id already exists!','');
			 wp_die();
	} else if(!empty($isMobileExist)) {
    	echo generateJSON('error','Mobile number already exists!','');
			 wp_die();
	} else {
		if(!empty($fullname) && !empty($email) && !empty($pwd) && !empty($mobileNumber)) {
			$user_id = username_exists($email);
			if (!$user_id and email_exists($email) == false) 
			{
			   	$seekerDetails = array(
				    'user_login' =>  $email,
				    'user_email' =>  $email,
				    'user_pass' =>  $pwd,
				    'role' => 'subscriber'
				);
				$user_id = wp_insert_user($seekerDetails);
				update_user_meta($user_id, 'mobile', $mobileNumber);
				update_user_meta($user_id, 'countryCode', $countrycode);
				$generatedPin = generatePIN();
				update_user_meta($user_id, 'mobileOTP', $generatedPin);
				$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
				$tempid="1007595354699826301";
				if($input['txtEventId'] != "" && $input['txtQuery'] != "") {
					$event_id = $input['txtEventId'];
					$question = $input['txtQuery'];
					$current_user = wp_get_current_user();
					$user_email = $current_user->user_email;
					$result = saveFAQQuery($event_id,$question,$user_email);
					wp_redirect(get_permalink($event_id) . "?event_query=saved");
					exit;
				} else if($input['lead_form_id'] != "" && $input['submission_email'] != "") {
					update_user_meta($user_id, 'lead_form_source',  get_the_title($input['lead_form_id']));
					$msg = str_replace("{{name}}", $input['firstname'], $input['submission_email']);
					$msg = str_replace("{{email}}", $input['email'], $msg);
					
					sendEmail($input['email'], get_the_title($input['lead_form_id']), $msg);
				}
				$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
				sendEmail($email, 'Your OTP for registering on Thriive.in', $msg);
				
				echo generateJSON('success','OTP sent on your email address and mobile number.',$user_id);
				wp_die();
			} else {
				update_user_meta($user_id, 'stage',  1);
				auto_login_new_user($user_id);
				echo generateJSON('error','User already exists, Please login','');
			 	wp_die();
			}
		} else {
			 echo generateJSON('error','','');
			 wp_die();
		}
    }	
	wp_die();
}

// function seeker_signup_sd(){
// 	$countrycode = intval($_POST['country_code']);
// 	$mobileNumber = intval($_POST['mobile_number']);
// 	$fullname = $_POST['fullname'];
// 	$email = $_POST['email'];
// 	$pwd = $_POST['pwd'];
// 	$lead_form_id = $_POST['lead_form_id'];
// 	global $wpdb;
// 	if(!empty($mobileNumber)){
// 		$query = "SELECT meta_value FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
// 		$isMobileExist = $wpdb->get_var($query);
// 	}
// 	if ( username_exists( $email ) && email_exists($email)) {
// 		echo generateJSON('error','Email id already exists!','');
// 			 wp_die();
// 	} else if(!empty($isMobileExist)) {
//     	echo generateJSON('error','Mobile number already exists!','');
// 			 wp_die();
// 	} else {
// 		if(!empty($fullname) && !empty($email) && !empty($pwd) && !empty($mobileNumber)) {
// 			$user_id = username_exists($email);
// 			if (!$user_id and email_exists($email) == false) 
// 			{
// 			   	$seekerDetails = array(
// 				    'user_login' =>  $email,
// 				    'user_email' =>  $email,
// 				    'user_pass' =>  $pwd,
// 				    'role' => 'subscriber'
// 				);
// 				$user_id = wp_insert_user($seekerDetails);
// 				update_user_meta($user_id, 'mobile', $mobileNumber);
// 				update_user_meta($user_id, 'countryCode', $countrycode);
// 				$generatedPin = generatePIN();
// 				update_user_meta($user_id, 'mobileOTP', $generatedPin);
// 				$msg = $generatedPin . ' is the one time password (OTP) for your online registration on Thriive.in. This is usable once & valid for 15 min';

// 				if($input['txtEventId'] != "" && $input['txtQuery'] != "") {
// 					$event_id = $input['txtEventId'];
// 					$question = $input['txtQuery'];
// 					$current_user = wp_get_current_user();
// 					$user_email = $current_user->user_email;
// 					$result = saveFAQQuery($event_id,$question,$user_email);
// 					wp_redirect(get_permalink($event_id) . "?event_query=saved");
// 					exit;
// 				} else if($lead_form_id) {
// 					update_user_meta($user_id, 'lead_form_source',  $lead_form_id);
// 				}
// 				$result = sendSMS($countrycode . $mobileNumber, $msg);
// 				echo generateJSON('success','OTP sent on your mobile number.',$user_id);
// 				wp_die();
// 			} else {
// 				update_user_meta($user_id, 'stage',  1);
// 				auto_login_new_user($user_id);
// 				echo generateJSON('error','User already exists, Please login','');
// 			 	wp_die();
// 			}
// 		} else {
// 			 echo generateJSON('error','','');
// 			 wp_die();
// 		}
//     }	
// 	wp_die();
// }

function seeker_signup_sd(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$pwd = generatePwd($permitted_chars);
	$lead_form_id = $_POST['lead_form_id'];
	global $wpdb;
	if(!empty($mobileNumber)){
		$query = "SELECT meta_value FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
		$isMobileExist = $wpdb->get_var($query);
	}
    if(!empty($fullname) && !empty($email) && !empty($pwd) && !empty($mobileNumber)) {
		$user_id = username_exists($email);
		if (!$user_id and email_exists($email) == false && empty($isMobileExist)) 
		{
		   	$seekerDetails = array(
			    'user_login' =>  $email,
			    'user_email' =>  $email,
			    'user_pass' =>  $pwd,
			    'role' => 'subscriber'
			);
			$user_id = wp_insert_user($seekerDetails);
			update_user_meta($user_id, 'mobile', $mobileNumber);
			update_user_meta($user_id, 'countryCode', $countrycode);
			$generatedPin = generatePIN();
			update_user_meta($user_id, 'mobileOTP', $generatedPin);
			$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';
			if($lead_form_id) {
				update_user_meta($user_id, 'lead_form_source',  $lead_form_id);
			}
			$tempid="1007595354699826301";
			sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			$emsg = "Hello<br/><br/>Login Details:<br/>Username: ".$email."<br/>Password: ".$pwd;
			sendEmail('prathamesh@thriive.in','New signup on shreans daga live event pages',$emsg);
			echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
			wp_die();
		} else {
			$generatedPin = generatePIN();
			update_user_meta($user_id, 'mobileOTP', $generatedPin);
			$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';
			update_user_meta($user_id, 'stage',  1);
			$tempid="1007595354699826301";
			sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
			wp_die();
		}
	} else {
		 echo generateJSON('error','','');
		 wp_die();
	}
}

function call_seeker_signup(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	$email = $_POST['email'];
	global $wpdb;
	if(!empty($mobileNumber)){
		$query = "SELECT meta_value FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
		$isMobileExist = $wpdb->get_var($query);
	}
	if ( username_exists( $email ) && email_exists($email)) {
		echo generateJSON('error','Email id already exists!','');
			 wp_die();
	} else if(!empty($isMobileExist)) {
    	echo generateJSON('error','Mobile number already exists!','');
			 wp_die();
	} else {
		if(!empty($email) && !empty($mobileNumber)) {
			$user_id = username_exists($email);
			if (!$user_id and email_exists($email) == false)
			{
			   	$seekerDetails = array(
				    'user_login' =>  $email,
				    'user_email' =>  $email,
				    'role' => 'subscriber'
				);
				$user_id = wp_insert_user($seekerDetails);
				update_user_meta($user_id, 'mobile', $mobileNumber);
				update_user_meta($user_id, 'countryCode', $countrycode);
				$generatedPin = generatePIN();
				update_user_meta($user_id, 'mobileOTP', $generatedPin);
				$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  

				if($input['txtEventId'] != "" && $input['txtQuery'] != "") {
					$event_id = $input['txtEventId'];
					$question = $input['txtQuery'];
					$current_user = wp_get_current_user();
					$user_email = $current_user->user_email;
					$result = saveFAQQuery($event_id,$question,$user_email);
					wp_redirect(get_permalink($event_id) . "?event_query=saved");
					exit;
				} else if($input['lead_form_id'] != "" && $input['submission_email'] != "") {
					update_user_meta($user_id, 'lead_form_source',  get_the_title($input['lead_form_id']));
					$msg = str_replace("{{name}}", $input['firstname'], $input['submission_email']);
					$msg = str_replace("{{email}}", $input['email'], $msg);
					
					sendEmail($input['email'], get_the_title($input['lead_form_id']), $msg);
				}
				$tempid="1007595354699826301";
				$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
				sendEmail($email, 'Your OTP for registering on Thriive.in', $msg);
				
				echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
				wp_die();
			} else {
				update_user_meta($user_id, 'stage',  1);
				auto_login_new_user($user_id);
				echo generateJSON('error','User already exists, Please login','');
			 	wp_die();
			}
		} else {
			 echo generateJSON('error','','');
			 wp_die();
		}
    }	
	wp_die();
}

function generatePwd($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

function oc_call_seeker_signup(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	$email = $_POST['email'];
	$username = $_POST['username'];
	$lead_source = $_POST['lead_source'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$pwd = generatePwd($permitted_chars);
	global $wpdb;
	if(!empty($mobileNumber)){
		$query = "SELECT user_id FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
		$isMobileExist = $wpdb->get_var($query); 
	}
	if(!empty($email) && !empty($mobileNumber) && !empty($username)) {
		if(email_exists($email) == false){
			$user_id = $isMobileExist;
		} else {
			$user_id = username_exists($email);
		}
		if (!$user_id and email_exists($email) == false && empty($isMobileExist)) {
		   	$seekerDetails = array(
			    'user_login' =>  $username,
			    'user_email' =>  $email,
			    'user_pass' =>  $pwd,
			    'role' => 'subscriber'
			);
			$user_id = wp_insert_user($seekerDetails);
			update_user_meta($user_id, 'mobile', $mobileNumber);
			update_user_meta($user_id, 'countryCode', $countrycode);
			$generatedPin = generatePIN();
			update_user_meta($user_id, 'mobileOTP', $generatedPin);
			$msg = $generatedPin . ' is the one time password (OTP) for your online registration on Thriive.in. This is usable once & valid for 15 min';

			if($input['txtEventId'] != "" && $input['txtQuery'] != "") {
				$event_id = $input['txtEventId'];
				$question = $input['txtQuery'];
				$current_user = wp_get_current_user();
				$user_email = $current_user->user_email;
				$result = saveFAQQuery($event_id,$question,$user_email);
				wp_redirect(get_permalink($event_id) . "?event_query=saved");
				exit;
			} else if($lead_source != "") {
				update_user_meta($user_id, 'lead_form_source', $lead_source);
				// $msg = str_replace("{{name}}", $input['firstname'], $input['submission_email']);
				// $msg = str_replace("{{email}}", $input['email'], $msg);
				
				// sendEmail($input['email'], get_the_title($input['lead_form_id']), $msg);
			}
			$tempid="1007595354699826301";
			$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			//sendEmail($email, 'Your OTP for registering on Thriive.in', $msg);
			echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
			wp_die();
		} else {
			$generatedPin = generatePIN();
			update_user_meta($user_id, 'mobileOTP', $generatedPin);
			$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
			update_user_meta($user_id, 'stage',  1);
			$tempid="1007595354699826301";
			$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			//sendEmail($email, 'Your OTP for registering on Thriive.in', $msg);
			echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
			wp_die();
		}
	} else {
		 echo generateJSON('error','','');
		 wp_die();
	}
    	
	wp_die();
}

function event_call_seeker_signup(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	$email = $_POST['email'];
	$lead_source = $_POST['lead_source'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$pwd = generatePwd($permitted_chars);
	global $wpdb;
	if(!empty($mobileNumber)){
		$query = "SELECT user_id FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
		$isMobileExist = $wpdb->get_var($query);
	}
	if(!empty($email) && !empty($mobileNumber)) {
		if(email_exists($email) == false){
			$user_id = $isMobileExist;
		} else {
			$user_id = username_exists($email);
		}
		if (!$user_id and email_exists($email) == false && empty($isMobileExist)) {
		   	$seekerDetails = array(
			    'user_login' =>  $email,
			    'user_email' =>  $email,
			    'user_pass' =>  $pwd,
			    'role' => 'subscriber'
			);
			$user_id = wp_insert_user($seekerDetails);
			update_user_meta($user_id, 'mobile', $mobileNumber);
			update_user_meta($user_id, 'countryCode', $countrycode);
			$generatedPin = generatePIN();
			update_user_meta($user_id, 'mobileOTP', $generatedPin);
			$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
			if($lead_source != "") {
				update_user_meta($user_id, 'lead_form_source', $lead_source);
			}
			$tempid="1007595354699826301";
			$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			$surl = "https://www.thriive.in";
			$lurl = "https://www.thriive.in/login";
			$emsg = "Hello,<br/><br/>Your signup is successful.<br/><br/>Talk right now to India’s best Astrologers, Numerologists, Tarot & Angel Card Readers online.<br/><br/>100% Confidential  I 100% Genuine Results<br/><br/>You can login to our site, <a href=".$lurl.">click here</a> to login<br/>Username: ".$email."<br/>Password: ".$pwd."<br/><br/>Get upto 20 minutes of FREE* consultation!<br/><a href='".$url."'>Click Here Now</a><br/><br/>Love and Light,<br/>Team Thriive<br/><a href=".$surl.">www.thriive.in</a><br/><br/>*Terms & conditions apply";
			// sendEmail($email, 'Welcome to the Thriive family!', $emsg);
			sendEmail('pooja@thriive.in','New signup on live event pages',$emsg);
			sendEmail('kazi@thriive.in','New signup on live event pages',$emsg);
			//sendEmail($email, 'Your OTP for registering on Thriive.in', $msg);
			echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
			wp_die();
		} else {
			$generatedPin = generatePIN();
			update_user_meta($user_id, 'mobileOTP', $generatedPin);
			$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
			update_user_meta($user_id, 'stage',  1);
			$tempid="1007595354699826301";
			$result = sendSMS($countrycode . $mobileNumber, $msg,$tempid);
			//sendEmail($email, 'Your OTP for registering on Thriive.in', $msg);
			echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
			wp_die();
		}
	} else {
		 echo generateJSON('error','','');
		 wp_die();
	}
    	
	wp_die();
}

function verify_user(){
	$otp =  intval($_POST['otp']);
	$user_id = intval($_POST['user_id']);
	$dbotp = get_user_meta($user_id,'mobileOTP',true);
	$user = get_userdata($user_id);
	if(!empty($otp)){
		if($dbotp==$otp){
			update_user_meta($user_id, 'is_mobile_verify',  1);
			$msg = file_get_contents(get_template_directory().'/email-template/seeker-signup-email.html');

			sendEmail($user->data->user_email, 'Welcome to Thriive.in. Let\'s get you started.', $msg);
			echo generateJSON('success','You have verify your mobile number successfully.',$user_id);
			auto_login_new_user($user_id);
			wp_die();
		} else {
			echo generateJSON('error','Entered OTP doesn’t match.',$user_id);
			wp_die();
		}
	} else {
		echo generateJSON('error','OTP is required.',$user_id);
			wp_die();
	}
} 

function oc_verify_user(){
	global $wpdb;
	$otp =  intval($_POST['otp']);
	$user_id = intval($_POST['user_id']);
	$dbotp = get_user_meta($user_id,'mobileOTP',true);
	$user = get_userdata($user_id);
	if(!empty($otp)){
		if($dbotp==$otp){
			update_user_meta($user_id, 'is_mobile_verify',  1);
			$url = get_site_url()."/talk-to-astrologer-online";
			echo generateJSON('success','You have verified your mobile number successfully.',$user_id);
			auto_login_new_user($user_id);
			wp_die();
		} else {
			echo generateJSON('error','Entered OTP doesn’t match.',$user_id);
			wp_die();
		}
	} else {
		echo generateJSON('error','OTP is required.',$user_id);
			wp_die();
	}
} 

function event_verify_user(){
	global $wpdb;
	$otp =  intval($_POST['otp']);
	$user_id = intval($_POST['user_id']);
	$dbotp = get_user_meta($user_id,'mobileOTP',true);
	$user = get_userdata($user_id);
	$event_position = $_POST['event_position'];
	if(!empty($otp)){
		if($dbotp==$otp){
			liveeventdetails($event_position,$user_id,$user->data->user_email,$user->countryCode.$user->mobile);
			update_user_meta($user_id, 'is_mobile_verify',  1);
			$url = get_site_url()."/talk-to-astrologer-online";
			echo generateJSON('success','You have verified your mobile number successfully.',$user_id);
			auto_login_new_user($user_id);
			wp_die();
		} else {
			echo generateJSON('error','Entered OTP doesn’t match.',$user_id);
			wp_die();
		}
	} else {
		echo generateJSON('error','OTP is required.',$user_id);
			wp_die();
	}
}

// Add the image and thumbnail node to RSS feed
function add_rss_node_image_thumbnail() {
    global $post;
    if (has_post_thumbnail($post->ID)):
        $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $thumbnail = wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
        echo "<enclosure url='{$image}' type='image/jpg' />
        <thumbnail>{$thumbnail}</thumbnail>";
    endif;
}
add_action('rss2_item', 'add_rss_node_image_thumbnail');

function star_rating( $args = array() ) {
	$defaults = array(
		'rating' => 0,
		'type' => 'rating',
		'number' => 0,
	);
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );
	 
	// Non-english decimal places when the $rating is coming from a string
	$rating = str_replace( ',', '.', $rating );
	 
	// Convert Percentage to star rating, 0..5 in .5 increments
	if ( 'percent' == $type ) {
		$rating = round( $rating / 10, 0 ) / 2;
	}
	 
	// Calculate the number of each type of star needed
	$full_stars = floor( $rating );
	$half_stars = ceil( $rating - $full_stars );
	$empty_stars = 5 - $full_stars - $half_stars;
	 
	if ( $number ) {
		/* translators: 1: The rating, 2: The number of ratings */
		$title = _n( '%1$s rating based on %2$s rating', '%1$s rating based on %2$s ratings', $number );
		$title = sprintf( $title, number_format_i18n( $rating, 1 ), number_format_i18n( $number ) );
	} else {
		/* translators: 1: The rating */
		$title = sprintf( __( '%s rating' ), number_format_i18n( $rating, 1 ) );
	}
	 
	echo '<div class="star-rating" title="' . esc_attr( $title ) . '">';
	echo str_repeat( '<div class="star star-full"></div>', $full_stars );
	echo str_repeat( '<div class="star star-half"></div>', $half_stars );
	echo str_repeat( '<div class="star star-empty"></div>', $empty_stars);
	echo '<span class="n-rate">('.number_format_i18n( $rating, 1 ).')</span></div>';
}
function getConnectedData($by,$user_id){ 
	global $wpdb;
	$users = [];
	$result = $wpdb->get_results("SELECT * from my_operator_number_allocation WHERE caller_id = $user_id GROUP BY receiver_id ORDER BY call_timestamp DESC");
	if($result){
		foreach($result as $each_user){
			$receiver = get_user_by("id",$each_user->receiver_id);
			$caller = get_user_by("id",$each_user->caller_id);
			$caller_number = get_user_meta($each_user->caller_id, 'mobile', true);
			$receiver_number = get_user_meta($each_user->receiver_id, 'mobile', true);
			$getFeedback = $wpdb->get_results("SELECT rating, review from `user_review_by_therapist` WHERE caller_id = $user_id AND receiver_id = $each_user->receiver_id");
			$getDateFromWAC = $wpdb->get_results("SELECT created_date,time FROM `webhook_after_call` WHERE `received_by` LIKE '%$receiver_number%' AND caller_number LIKE '%$caller_number%' ORDER BY created_date DESC LIMIT 1");
			if($getDateFromWAC[0]->created_date && $getDateFromWAC[0]->time){
				$user_row['timestamp'] = $getDateFromWAC[0]->created_date.' '.$getDateFromWAC[0]->time;
			} else {
				$user_row['timestamp'] = $each_user->call_timestamp;
			}
			$user_row['caller_id'] = $each_user->caller_id;
			$user_row['receiver_id'] = $each_user->receiver_id;
			if($receiver->first_name){
				$user_row['receiver_name'] = $receiver->first_name.' '.$receiver->last_name.' '.$each_user->receiver_id;
			} else {
				$user_row['receiver_name'] = $receiver->user_email;
			}
			$user_row['is_call'] = $each_user->is_call;
			$user_row['receiver_url'] = get_permalink( $receiver->post_id );
			$user_row['r_review_url'] = get_permalink( get_page_by_path('review-form')).'/'.'?t='.get_post_field('post_name',$receiver->post_id);
			$user_row['r_rating'] = $getFeedback[0]->rating;
			$user_row['r_review'] = $getFeedback[0]->review;
			$users[] = $user_row;
		}
	}
	return $users;
}
function get_therapies(){
	$keyword = strval($_POST['therapy']);
	$db_therapies = get_terms('therapy',array("name__like"=>$keyword));
	$therapies = array();
	$i = 0;
	foreach($db_therapies as $dbt){
		$therapies[$i]['slug'] = $dbt->slug;
		$therapies[$i]['name'] = $dbt->name;
		$i++;
	}
	echo json_encode($therapies);
	wp_die();
}

function getLatestReview($post_id){
	$latestArr = array();
	if(get_field("first_reference_review", $post_id) != "" || get_field("second_reference_review", $post_id) != "" || get_field("third_reference_review", $post_id) != "" || have_rows('review_details', $post_id)) {
		if(get_field("first_reference_review", $post_id) != ""){
			$latestArr['1'] = get_field("first_reference_review", $post_id);
		}
		if(get_field("second_reference_review", $post_id) != ""){
			$latestArr['2'] = get_field("second_reference_review", $post_id);
		}
		if(get_field("third_reference_review", $post_id) != ""){
			$latestArr['3'] = get_field("third_reference_review", $post_id);
		}
		while ( have_rows('review_details', $post_id) ) : the_row();
			if(!empty(get_sub_field('review'))){
				$latestArr[] = get_sub_field('review');
			}
		endwhile;
	}
	return $latestArr;
}

function getTherapyDtChg($post_id,$query){
	$tdc = $tdcq = $finalArr = array();
	if(have_rows('therapy',$post_id)):
		$i=0;
		while(have_rows('therapy',$post_id)): the_row();
			$tname = !empty(get_sub_field('therapy_name')[0]->name) ? get_sub_field('therapy_name')[0]->name : '';
			$tdc[] = array('tname'=>$tname, 'experience'=>get_sub_field('experience'), 'charges'=>get_sub_field('charges'));
			if(!empty($query)){
				if(get_sub_field('therapy_name')[0]->name == $query){
					$tdcq[] = array('tname'=>$query,'experience'=>$tdc[$i]['experience'],'charges'=>$tdc[$i]['charges']);
				}
			}
			$i++;
		endwhile;
	endif;
	if(!empty($query)){
		$finalArr = $tdcq;
	} else {
		$finalArr = $tdc;
	}
	return $finalArr;
}

function getConnectedCallCount($caller_id){
	global $wpdb;
	$connected_call = $wpdb->get_var("SELECT count(*) FROM webhook_after_call WHERE (caller_number LIKE '%$caller_id%' OR received_by LIKE '%$caller_id%') AND call_status = 'connected'");
	return $connected_call;
}
add_action( 'rest_api_init', function () {
  register_rest_route( 'mo/v1', '/therapistbyslug/therapyid/(?P<term_id>\d+)/page/(?P<page>\d+)/count/(?P<per_page>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getTherapybyslug',
  ) );
} ); 

function getTherapybyslug( $data ) {
	global $wpdb;
	$finalArr = array();
	
	$term = get_term($data['term_id']);
	/* print_r($term);
	echo 'term'.$term->name;exit(); */
	if($data['per_page'] <= 1000){
		if(have_rows('therapist_data', 'option')):
			while(have_rows('therapist_data', 'option')): the_row();
				if($term->slug == get_sub_field('taxonomy')->slug){
				  $ids = get_sub_field('display_ids');  
				}
			endwhile;
		endif;
//'tarot-card-reading'
		
		$idsfilter = array();
		if($ids != ""){
			$ids = explode(",",$ids); 
		}
		foreach($ids as $id){
			$paid_session_count = get_post_meta($id ,'paid_session_count');
			if($paid_session_count[0] > 0){
				
				$idsfilter[] = $id;
			}
		}	
		$idstr = implode(",",$idsfilter);
		$getPost = $wpdb->get_results( 
			"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($idstr)"
		);
		$tempArr = $available = $busy = array();
		
		foreach ( $getPost as $posts ) {
			$post = get_post($posts->ID);
			$status = getTherapistStatus($post->ID);
			if($status == "Available"){
				array_push($available,$posts->ID);
			} 
			if($status == "Busy"){
				array_push($busy,$posts->ID);
			}                           
		}
		$tempArr = array_merge($available,$busy);
		foreach($tempArr as $t){
			$post = get_post($t);
			$data_array['post_author'] = $post->post_author;
			$data_array['post_id'] = $t;
			$experience_order = array();
			$tdtchg = array();
			$term = get_term_by('slug',$term->slug, 'therapy');
			$tdtchg = getTherapyDtChg($post->ID,$term->name);
				
			$total_count = count($tdtchg);
			$count = 1;
			$charges = '';
			foreach($tdtchg as $t){
			  
				$experience_order [$count] = $t['experience'];
				$charges += $t['charges']; 
				$count++;
			}
			//print_r($experience_order);
			$current_year = date("Y");
			$current_month = date("m");
			foreach ($experience_order as $key => $value){
				$ord[] = strtotime($value);
			}
			array_multisort($ord, SORT_ASC, $experience_order);
			if(is_array($experience_order) || is_object($experience_order)){
				$therapy_Exp = getTherapistExperience($experience_order['0']);
				
			} 
			$data_array['therapy_Exp'] = $therapy_Exp;
			$data_array['avg_rating'] = get_post_meta($post->ID,'avg_rating',true);
			$data_array['title'] = $post->post_title;
			$data_array['status'] = getTherapistStatus($post->ID);
			$bank_details = get_field('bank_details',$post->ID);
		
			if($bank_details){
				$data_array['account_holder_name'] = $bank_details['account_holder_name'];
				$data_array['bank_name'] = $bank_details['bank_name'];
				$data_array['account_number'] = $bank_details['account_number'];
				$data_array['ifsc_code'] = $bank_details['ifsc_code'];
				array_push($finalArr,$data_array); 
			}
			$querystr2 = "SELECT * FROM wp_postmeta WHERE post_id = '".$post->ID."' AND meta_key LIKE '%availability%' ORDER BY `wp_postmeta`.`meta_id` ASC ";
			$result2 = $wpdb->get_results( $querystr2, OBJECT ); 
			for($r=0;$r < count($result2);$r++){ 	
				$availdays = get_post_meta($post->ID,'availability_0_all_days',true);
				if($availdays == 1){
					$data_array['weekday'] = 'All Days';
					$availtime = get_post_meta($post->ID,'availability_0_time',true);
					for($p=0;$p < $availtime;$p++){ 
						$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
						$data_array['start_time'] = get_post_meta($post->ID,$startvar,true);			
						$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
						$data_array['end_time'] = get_post_meta($post->ID,$startvar,true);	
						array_push($finalArr,$data_array);
					} 
				} else {
					$weekday = get_post_meta($post->ID,'availability_'.$r.'_day',true);
					$data_array['weekday'] = $weekday;
					$availtime = get_post_meta($post->ID,'availability_'.$r.'_time',true);
					for($p=0;$p < $availtime;$p++){ 
						$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
						$data_array['start_time'] = get_post_meta($post->ID,$startvar,true);			
						$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
						$data_array['end_time'] = get_post_meta($post->ID,$startvar,true);	
						array_push($finalArr,$data_array);
					} 
				}
				
			}  
			$userPost = get_post($post->ID);
			$therapy_terms = get_terms(array('taxonomy' => 'therapy','hide_empty' => false));
			
			$costcounter = get_post_meta($post->ID,'business_therapy_cost_model',true);
			$data_array1 = array();
			for ($x = 0; $x < $costcounter; $x++) {
				$varName = 'business_therapy_cost_model_'.$x.'_therapy_name';
				$data_array['therapy_name']  = $term->name;
				$termid = get_post_meta($post->ID,$varName,true);
				if($termid == $data['term_id']){
					$counter = get_post_meta($post->ID,'business_therapy_cost_model_'.$x.'_therapy_cost',true);
					array_push($finalArr,$data_array);
					for($y = 0;$y < $counter;$y++){
						$data_array1['varDuration'] = get_post_meta($post->ID,'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_select_duration',true);
						$data_array1['varigst'] = get_post_meta($post->ID,'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_price_including_gst',true);
						$data_array1['vargst'] = get_post_meta($post->ID,'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_gst_amount',true);
						$data_array1['varEarning'] = get_post_meta($post->ID,'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_therapist_earning',true);
						array_push($finalArr,$data_array1);
					}
					 	
				}	
			}
			
			
		}	
	}  else {
		$data_array['msg'] = "Maximum Limit is only 1000";
		array_push($finalArr,$data_array);  	
	}
	return $finalArr;
}	
add_action( 'rest_api_init', function () {
  register_rest_route( 'mo/v1', '/therapist/page/(?P<page>\d+)/count/(?P<per_page>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getAllTherapist',
  ) );
} );

function getAllTherapist( $data ) {

	$finalArr = array();
	if($data['per_page'] <= 500){
		$args = array(
			'post_status' => 'publish',
			'post_type' => 'therapist',
			'post_parent' => 0,
			'paged' => $data['page'],
			'posts_per_page' => $data['per_page'],
		);
		$posts = get_posts($args);
		// $certificate = $gimage = $gtitle = $vlink = $vtitle =
		foreach ($posts as $post) {
			$therapy = $ailment = $experience = $charges = $rev_by = $rating = $issue = $recommend = $review = $status = $data_array = $language = array();
			$keyarr = array_keys(get_object_vars($post));
			$user = get_userdata($post->post_author);
			for($i = 0; $i < $post->therapy; $i++){
				$vtname = "therapy_".$i."_therapy_name";
				$viname = "therapy_".$i."_issues";
				$vename = "therapy_".$i."_experience";
				$vcname = "therapy_".$i."_charges";
				$tname = get_term($post->$vtname[0],'therapy');
				$therapy[$i] = $tname->name;
				$aarr = array();
				if(is_array($post->$viname) || is_object($post->$viname)){
					foreach($post->$viname as $ti){
						$iname = get_term($ti,'ailment');
						array_push($aarr, $iname->name);
					}
				}
				$ailment[$i] = $aarr;
				$experience[$i] = $post->$vename;
				$charges[$i] = $post->$vcname;
			}
			for($i = 0; $i < $post->review_details; $i++){
				$vby = "review_details_".$i."_by";
				$vrating = "review_details_".$i."_rating";
				$vissues = "review_details_".$i."_issues";
				$vrecommendation = "review_details_".$i."_recommendation";
				$vreview = "review_details_".$i."_review";
				$vstatus = "review_details_".$i."_status";
				$byemail = get_user_by('ID',$post->$vby);
				$rev_by[$i] = $byemail->data->user_email;
				$rating[$i] = $post->$vrating;
				$issue[$i] = get_term($post->$vissues,'ailment')->name;
				$recommend[$i] = $post->$vrecommendation;
				$review[$i] = $post->$vreview;
				$status[$i] = $post->$vstatus; 
			}
			if(is_array($post->language) || is_object($post->language)){
				foreach($post->language as $lang){
                    $lname = get_term($lang,'language');
					array_push($language, $lname->name);
				}
			}
			// for($i = 0; $i < $post->certificates; $i++){
			// 	$vcertificate = "certificates_".$i."_certificate";
			// 	$certificate[$i] = wp_get_attachment_url($post->$vcertificate);
			// }
			// for($i = 0; $i < $post->gallery; $i++){
			// 	$vgimage = "gallery_".$i."_images";
			// 	$vgtitle = "gallery_".$i."_gallery_title";
			// 	$gimage[$i] = wp_get_attachment_url($post->$vgimage);
			// 	$gtitle[$i] = $post->$vgtitle;
			// }
			// for($i = 0; $i < $post->videos; $i++){
			// 	$vvlink = "videos_".$i."_video_link";
			// 	$vvtitle = "videos_".$i."_video_title";
			// 	$vlink[$i] = $post->$vvlink;
			// 	$vtitle[$i] = $post->$vvtitle;
			// }
			foreach ($keyarr as $key => $value) {
				$data_array[$value] = $post->$value;
				
				$data_array['therapy'] = $therapy;
				$data_array['ailment'] = $ailment;
				$data_array['experience'] = $experience;
				$data_array['charges'] = $charges;
				$data_array['review_by'] = $rev_by;
				$data_array['review_rating'] = $rating;
				$data_array['review_issue'] = $issue;
				$data_array['review_recommend'] = $recommend;
				$data_array['review_review'] = $review;
				$data_array['review_status'] = $status;
				// $data_array['certificate'] = $certificate;
				// $data_array['gallery_image'] = $gimage;
				// $data_array['gallery_title'] = $gtitle;
				// $data_array['video_link'] = $vlink;
				// $data_array['video_title'] = $vtitle;
				$data_array['mobile_number'] = $user->mobile;
				$data_array['countryCode'] = $user->countryCode;
				$data_array['email'] = $user->user_email;
				$data_array['dob'] = $user->dob;
				$data_array['gender'] = $user->gender;
				$data_array['address'] = $post->address;
				$data_array['zipcode'] = $post->zipcode;
				$data_array['area'] = $post->area;
				$data_array['nationality'] = $user->nationality;
				$data_array['free_session_count'] = $post->free_session_count;
				$data_array['paid_session_count'] = $post->paid_session_count;
				$data_array['interested_in_business_model'] = $post->interested_in_business_model;
				$data_array['communication_channel'] = implode(',', $post->communication_channel);
				$data_array['communication_channel_appointmet'] = implode(',', $post->communication_channel_appointmet);
				$data_array['package'] = !empty($post->select_package) ? get_the_title($post->select_package[0]): 'Earth';
				$data_array['communication_mode'] = implode(',', $post->communication_mode);
				$data_array['therapist_title'] = $post->therapist_title;
				$data_array['language'] = implode(',', $language);
				$data_array['registration_date'] = $post->t_registration_date;
				$data_array['promotion_count'] = $post->promotion_count;
				$data_array['response_count'] = $post->response_count;
				$data_array['average_rating'] = $post->avg_rating;
				$data_array['badge_image'] = wp_get_attachment_url($post->badge_image);
				$data_array['first_reference_name'] = $post->first_reference_name;
				$data_array['first_reference_email'] = $post->first_reference_email;
				$data_array['first_reference_review'] = $post->first_reference_review;
				$data_array['second_reference_name'] = $post->second_reference_name;
				$data_array['second_reference_email'] = $post->second_reference_email;
				$data_array['second_reference_review'] = $post->second_reference_review;
				$data_array['third_reference_name'] = $post->thrird_reference_name;
				$data_array['third_reference_email'] = $post->third_reference_email;
				$data_array['third_reference_review'] = $post->third_reference_review;
				$data_array['identity_image'] = wp_get_attachment_url($post->select_identity_image);
				$data_array['profile_image'] = wp_get_attachment_url($post->profile_picture);
				$data_array['identity_proof'] = $post->select_identity_proof;
				$data_array['identity_number'] = $post->identity_number;
				$data_array['address_proof'] = wp_get_attachment_url($post->address_proof);
				$data_array['post_permalink'] = get_permalink($post->ID);
				$data_array['account_holder_name'] = $post->bank_details_account_holder_name;
				$data_array['bank_name'] = $post->bank_details_bank_name;
				$data_array['account_number'] = $post->bank_details_account_number;
				$data_array['ifsc_code'] = $post->bank_details_ifsc_code;
			}
			array_push($finalArr, $data_array);
		}
	} else {
		$data_array['msg'] = "Maximum Limit is only 500";
		array_push($finalArr,$data_array);  	
	}
	return $finalArr;
}

//=====User API Bunty kazi
add_action('rest_api_init', function () {
  register_rest_route( 'mo/v1', '/users/page/(?P<page>\d+)/count/(?P<per_page>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getAllUsers',
  ));
});
function getAllUsers($data) {
    $finalArr = array();
    if($data['per_page'] <= 1000){
        $args = array(
            'meta_key'     => 'wp_capabilities',
            'meta_value'   => 'subscriber',
            'meta_compare' => 'LIKE',
            'number' => $data['per_page'],
            'offset' => ($data['page']-1)*$data['per_page'],
        );
        $users = get_users($args);
        foreach($users as $u){
            $data_array = array(
                'user_id' => $u->data->ID,
                'name' => $u->first_name ." ".$u->last_name,
                'description' => $u->description,
                'email' => $u->data->user_email,
                'mobile_number' => $u->mobile,
                'countryCode' => $u->countryCode,
                'gender' => $u->gender,
                'nationality' => $u->nationality,
                'profile_picture' => $u->thechamp_avatar,
                'user_registered' => $u->user_registered,
                'lead_source' => $u->lead_form_source,
            );
        	array_push($finalArr, $data_array);
        }
        return $finalArr;
    } else {
        echo "ERROR!!!!!You only can Get 1000 data at a time";
    }
}
add_action('rest_api_init', function () {
  register_rest_route( 'mo/v1', '/regdate/(?P<regdate>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getAllUsersbydate',
  ));
});
function getAllUsersbydate($data) {
    $finalArr = array();
    global $wpdb;
	
	$regdate = date("Y-m-d",strtotime($data['regdate']));
	
	$users =  $wpdb->get_results("SELECT u.* FROM `wp_users` as u,`wp_usermeta` as w  WHERE DATE(`user_registered`) > '".$regdate."' AND  meta_key = 'wp_capabilities' AND w.meta_value LIKE '%subscriber%' AND w.user_id = u.ID");
	//echo "<pre>";print_r($users);exit();
	if(!empty($users)){
		foreach($users as $u){
			$data_array = array(
				'user_id' => $u->ID,
				/* 'name' => $u->first_name ." ".$u->last_name,
				'description' => $u->description,*/
				'email' => $u->user_email,
			//	'mobile_number' => $u->mobile,
				/* 'countryCode' => $u->countryCode,
				'gender' => $u->gender,
				'nationality' => $u->nationality,
				'profile_picture' => $u->thechamp_avatar, */
				'user_registered' => $u->user_registered,
				'lead_source' => $u->lead_form_source
			);
			$usrdet = get_user_meta($u->ID);
			//echo "<pre>";print_r($usrdet);exit();
			$data_array['name'] = $usrdet['first_name'][0] ." ".$usrdet['last_name'][0];
			$data_array['description'] = $usrdet['description'][0];
			$data_array['gender'] = $usrdet['gender'][0] ;
			$data_array['mobile_number'] = $usrdet['mobile'][0] ;
			$data_array['nationality'] = $usrdet['nationality'][0];
			$data_array['countryCode'] = $usrdet['countryCode'][0];
			$data_array['profile_picture'] = $usrdet['thechamp_avatar'][0];
			$data_array['lead_source'] = $usrdet['lead_form_source'][0];
			//print_r($usrdet);exit();
			array_push($finalArr, $data_array);
		}
		return $finalArr;
	} else {
        echo "No Records";
    }
	
    
}
function reqForPromotion($input){
	$current_user = wp_get_current_user();
	$exist_count = get_post_meta($current_user->post_id, 'promotion_count',true);
	update_post_meta($current_user->post_id,'promotion_count', $exist_count+1);
	$msg = "$current_user->first_name $current_user->last_name has requested for promotion on Thriive.in";
	sendEmail('manishj@thriive.in', "$current_user->first_name $current_user->last_name has requested for promotion!", $msg);
}
function showavailability(){
	global $wpdb;
	//$mobile = $_POST['mobile'];
	$mobile = '7208811389';
	$members = get_users(array(
			'meta_key' => 'mobile', 
			'meta_value' => $mobile
		)
	);
	$html = "";
	$existData = array();
	if(in_array('therapist', $members[0]->roles)) {
		$postID = get_user_meta($members[0]->data->ID, 'post_id', true);
		$html .= "<input type='hidden' name='post_id' value='".$postID."' />";
		if($bank_details){
			$ahn = $bank_details['account_holder_name'];
			$bn = $bank_details['bank_name'];
			$an = $bank_details['account_number'];
			$ifsc = $bank_details['ifsc_code'];
		}else{
			$ahn = "";
			$bn = "";
			$an = "";
			$ifsc = "";
		}
		
		$html .= "
		<div class='border'>
			<div class='form-group'>
				<div class='col-md-12  col-xs-12'>
					<label for='timming' class='yttimming'>Timing</label>
				</div>
			</div>
		
			<div class='form-group'>
				<div class='col-md-12  col-xs-12'>
					<div class='col-md-3 col-xs-3'>
						<label for='availability' class='ytavailability' >Availability</label>
					</div>
					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<label for='time' class='ytstarttime'>Start Time</label>
						</div>
						<div class='col-md-3 col-xs-3'><label for='time' class='ytendtime'>End Time</label></div>
					</div>
				</div>
			</div> ";
		
		$querystr2 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key LIKE '%availability%' ORDER BY `wp_postmeta`.`meta_id` ASC ";
		$result2 = $wpdb->get_results( $querystr2, OBJECT ); 
		
		
		$r=0;$monday =$tuesday =$wednesday = $thursday = $friday = $saturday = $sunday  = 0;
		//echo 'r'.$r;echo "<br/>";
		$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key = 'availability_0_all_days' AND meta_value=1";
		$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
		$alldays = count($result4);
		$weekday = 'alldays';	
		if($alldays == 0){
			$html .= "<div class='form-group' id='alldays1'>
					<div class='row'>
						<div class='col-md-12  col-xs-12'>
							<div class='checkbox col-md-3 col-xs-3'>
								<label for='alldays' class='alldays' style='float:left'>
									<input type='checkbox'  onclick='enabledays();' id='alldays' name='availability_all_days['alldays'][]' value='1' />
									<span class='fake-input'></span>
									<span class='fake-label'>All Days</span>
								</label>

							</div>
							<div class=''>
								<div class='col-md-3 col-xs-3'>
									<input type='text' placeholder='Start Time' name='availability_start_time[alldays][]' id='start0$weekday' class='form-control ' readonly />


								</div>
								<div class='col-md-3 col-xs-3'>
									<input type='text' placeholder='End Time' name='availability_end_time[alldays][]'  id='end0$weekday' class='form-control' readonly />
								</div>
							</div>	
							<div class='col-md-3 col-xs-3'>
								<button type='button' class='form-control  btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add</button>
							</div>
					
						</div>	
					</div>
				</div>";
			
		} else {
			$k=1;$m=0;
			//echo "<pre>";print_r($result2);exit();
			for($g=0;$g < count($result2);$g++){
				
				$weekday = 'alldays';
				$label = 'All Days';
					
				if($result2[$g]->meta_key == 'availability_0_all_days' && $result2[$g]->meta_value == 1){
					//if($result2[$g]->meta_key == 'availability_0_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_0_time'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						//if($result5[0]->meta_value =='Monday'){
							$counter = $result5[0]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="
								<div class='form-group' id='$weekday$k'>
									<div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='checkbox  col-md-3 col-xs-3'>";
												if($m == 0){
													$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
													<input type='checkbox'   onClick='enabledays(\"$weekday\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
													<span class='fake-input'></span>
													<span class='fake-label'>".$label."</span>
													</label>";
												}
											$html .="</div>
											<div class=''>
												<div class='col-md-3 col-xs-3'>
													<input type='text' id='start$p$weekday' placeholder='Start Time'  name='availability_start_time[$weekday][]' class='form-control alldays ' value='".$start_time."' required/>
												</div>
												<div class='col-md-3 col-xs-3'>
													<input type='text' id='end$p$weekday' placeholder='End Time' name='availability_end_time[$weekday][]' class='form-control alldays ' value='".$end_time."' required/>
												</div>
											</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control  btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$startarr = explode(":",$start_time);
								$endarr = explode(":",$end_time);
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});
								$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							$r++;
							
						//} 
					//}
				}	
			} 
				
		}
			$html .= "<div id='alldaysdiv'></div>";
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Monday' ";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$monday = count($result4);
			$weekday = 'monday';	
			if($monday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='monday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Monday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Monday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start$weekday0' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value=''  readonly/>


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='End Time' id='end$weekday0' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=1;$m=0;$r=0;
				//echo "<pre>";print_r($result2);exit();
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						if($result5[0]->meta_value =='Monday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'monday';
							$label = 'Monday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$endarr = explode(":",$end_time);
								$startarr = explode(":",$start_time);
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			
			$html .= "<div id='mondaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Tuesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$tuesday = count($result4);
			$weekday = 'tuesday';	
			if($tuesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3' >
							<label for='tuesday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Tuesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Tuesday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value=''  readonly/>


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			} else {
				$k=0;$r=0;$m=0;
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Tuesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'tuesday';
							$label = 'Tuesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3' style='float:left'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='tuesdaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Wednesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$wednesday = count($result4);
			$weekday = 'wednesday';
			if($wednesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3' >
							<label for='wednesday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Wednesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Wednesday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			}  else {
				$k=1;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Wednesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'wednesday';
							$label = 'Wednesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){ 
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required />
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
									disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='wednesdaydiv'></div>";  	
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Thursday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$thursday = count($result4);
			$weekday = 'thursday';
			if($thursday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='thursday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Thursday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Thursday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>
				
				";
				$html .= "<div id='thursdaydiv'></div>";  
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Thursday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'thursday';
							$label = 'Thursday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required />
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
									disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='thursdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Friday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$friday = count($result4);
			$weekday = 'friday';
			if($friday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='friday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Friday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Friday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday'  name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Friday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'friday';
							$label = 'Friday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$weekday$p' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$weekday$p' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='fridaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Saturday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$saturday = count($result4);
			$weekday = 'saturday';
			if($saturday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='saturday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Saturday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Saturday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Saturday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'saturday';
							$label = 'Saturday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  id='start$p$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='saturdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Sunday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$sunday = count($result4);
			$weekday = 'sunday';
			if($sunday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='sunday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Sunday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Sunday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				 
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
					
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Sunday'){
							$weekday = 'sunday';
							$label = 'Sunday';
							$counter = $result2[$g]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='sundaydiv'></div>"; 	
		$html .= "</div></div>";
		
							
				//print_r($checked);
		//if(in_array('0',$existData)){
			$html .= "<div class='text-center'><input class='login_btn' type='submit' name='submit_business' value='Save'/></div>";
		//}
	} else {
		$html .= "Sorry, this is not a registered number";
	}
	echo $html;
//	echo generateJSON('success','',$html);
	wp_die();	
}
/* function sendmasknumber(){
	global $wpdb;
	$temail = $_POST['temail'];
	$email  = $_POST['email'];
	$result = oc_assign_masked_number_to_user($temail,$email);
	
}	 */
function addBusinessModelByTherapist(){ 
	global $wpdb;
/* 	$current_user = wp_get_current_user(); 
	echo "<pre>";print_r($current_user);exit(); */
	$mobile = $_POST['mobile'];
	$members = get_users(array(
			'meta_key' => 'mobile', 
			'meta_value' => $mobile
		)
	);
	$html = "";
	$existData = array();
	if(in_array('therapist', $members[0]->roles)) {
		$postID = get_user_meta($members[0]->data->ID, 'post_id', true);
		$html .= "<input type='hidden' name='post_id' value='".$postID."' />";
		$communication_channel = get_field('communication_channel',$postID);
		$communication_channel_appointment = get_field('communication_channel_appointment',$postID);
		$interested_in_business_model = get_field('interested_in_business_model',$postID);
		$interested_in_free_session = get_field('interested_in_free_session',$postID);
		$userPost = get_post($postID);
	 	// echo "<pre>";print_r($userPost);exit();
		// echo $userPost->therapy;
		$therapy_terms = get_terms(array('taxonomy' => 'therapy','hide_empty' => false));
		$bank_details = get_field('bank_details',$postID);
		
		if($bank_details){
			$ahn = $bank_details['account_holder_name'];
			$bn = $bank_details['bank_name'];
			$an = $bank_details['account_number'];
			$ifsc = $bank_details['ifsc_code'];
		}else{
			$ahn = "";
			$bn = "";
			$an = "";
			$ifsc = "";
		}
		$html .= '
				<div class="border">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<label for="Business_model" class="business_model businesstitle" >Business Model</label>
								<p>
								We are delighted to announce the launch of Thrive 2.0, not just a new website but a totally new business model that creates a great market platform and business opportunity for all our verified therapists. <a onclick="interested()" class="bmknmore">Know  More</a>
								</p>
									
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="col-md-1 col-xs-1">
								</div>
								<div class="col-md-11 col-xs-11"> 
									<span  id="interested" style="display:none;" class="ytbminteresteddesc">
										<ol>
											<li>All the experts will need to pay a 30% commission to Thriive basis their consultation charges per session.</li>
											<li>You receive an SMS or email alert, with a masked number for contacting the user.</li>
											<li>Now you have to call the user within 2 minutes of receiving the alert and start your session. </li>
										</ol>
									</span>
								</div>
							</div>	
						</div>	
					</div>
				
					<div class="form-group">
						<div class="row">
							
						
							<div class="col-md-12 col-xs-12">
							
								<div class="col-md-8 col-xs-8">
									<label for="interested_in_business_model" class="interested">I am Interested</label>
									
								</div>
									
								<div class="col-md-4 col-xs-4">
									<label class="switch">
										<input type="checkbox" class="interested" name= "interested_in_business_model" ';
										if($interested_in_business_model == 1){
											$html .= 'checked';
										}
										
						$html .= '>
								<span class="slider round"></span>
							</label>
						</div>
					</div>	
						
					<div class="col-md-12 col-xs-12">
						
						<div class="col-md-8 col-xs-8">
							<label for="interested_in_free_session" class="interested">Offer up-to 5 free 20 min sessions a month     
							</label>
							<a class="bmknmore" onclick="popup();">Know  More</a><br/>
							  <span  id="offer" class="ytbmfreedesc" style="display:none;">We offer free trials so that our users can get a feel of the connection themselves, once they are comfortable 95% sign up for a longer sessions, and more than 50% come back for extra sessions. </span>
							
						</div>
						<div class="col-md-4 col-xs-4">
							<label class="switch interested">
								<input type="checkbox" name= "interested_in_free_session" ';
									if($interested_in_free_session == 1){
										$html .= 'checked';
									} 
									
					$html .='>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>		
			';	

		
			
					$m = 0;
					/* $html .= "<div class='border'>
					<div class='form-group'>
						
							<label for='business-therapy' class='col-12'>Business Therapy Cost Model</label>
						
					</div> "; */
				
				//$checked  = array();
				
				$html .="<div class='border'><div class='form-group'>
							<div class='col-md-12 col-xs-12' >
								<label for='therapy' class='yttitle'>Your Therapies</label>
							</div>		
						</div>";
				$checked   = $price = array();	$g=0;$k=0;$l=0;			
				for ($x = 0; $x < $userPost->therapy; $x++) {
					$z=0;	
					//$checked   = $price = array();
					$varExp = 'therapy_'.$x.'_experience';	
					$varIssue = 'therapy_'.$x.'_issues';					
					$varCharge = 'therapy_'.$x.'_charges';
					$varName = 'therapy_'.$x.'_therapy_name';
					$varCost = 'business_therapy_cost_model_'.$x.'_therapy_cost';
					$therapy_name = ($userPost->$varName)[0];
					$html .= "<input type='hidden' id='total_therapies' name='total_therapies' value='$userPost->therapy'><input type='hidden' name='post_id' value='$postID' />";
					
					foreach($therapy_terms as $therapy) {
						if($therapy->parent != 0){ 
							if($therapy_name==$therapy->term_id){ 
								$termrow = $wpdb->get_row("SELECT meta_key  FROM $wpdb->postmeta WHERE meta_value = '". $therapy->term_id ."' ");
								$term_name = $termrow->name;
								//echo 'term'.($userPost->$varName)[0];
								//$y=0;
							/* 	echo $varName;echo "<br/>";
								 echo ($userPost->$varName);echo "<br/>"; */
								$html .= "<input type='hidden' id='therapy_id' name='therapy_id[]' value='".$therapy_name."'>
							
								
								<div class='form-group'>
									<div class='col-md-12 col-xs-12' >
										<label for='therapy' class='ytherapy' >$therapy->name</label>
									</div>
									<div class='col-md-12 col-xs-12'>
										<div class='col-md-3 col-xs-3'>
											<label for='duration' class='ytduration'>Select Duration</label>
										</div>
										<div class='col-md-3 col-xs-3'>
											<label for='price' class='ytprice'>Price (+GST)</label>
										</div>
										<div class='col-md-3 col-xs-3'>
											<label for='price' class='ytgstprice'>GST Amount</label>
										</div>
										<div class='col-md-3 col-xs-3'>
											<label for='price' class='ytearning'>Your Earnings (70%)</label>
										</div>
									</div>
								</div> "; 
								
							for($y = 0;$y < 5;$y++){
									
									$varcost = 'business_therapy_cost_model_'.$l.'_therapy_name';
									//echo "SELECT meta_value  FROM $wpdb->postmeta WHERE meta_value = '".$userPost->$varcost."' ";
									/* $termrow = $wpdb->get_row("SELECT meta_value  FROM $wpdb->postmeta WHERE meta_key = '".$userPost->$varcost."' "); */
									//$term_name = $termrow[0];echo $term_name;exit();
									if($userPost->$varcost == $therapy_name){
										$varDuration = 'business_therapy_cost_model_'.$l.'_therapy_cost_'.$y.'_select_duration';
										//echo ($userPost->$varDuration);echo "<br/>";
										$varigst = 'business_therapy_cost_model_'.$l.'_therapy_cost_'.$y.'_price_including_gst';
										
										$vargst = 'business_therapy_cost_model_'.$l.'_therapy_cost_'.$y.'_gst_amount';
										$varEarning ='business_therapy_cost_model_'.$l.'_therapy_cost_'.$y.'_therapist_earning';
								
										
									}
									
								//	echo $userPost->$varigst;echo "<br/>";
								//	echo ($userPost->$varDuration);echo "<br/>";
									if(($userPost->$varDuration) == '5 mins' && (($userPost->$varcost) == $therapy_name)){ $checked[$x][] = '5 mins';	$price[$x][] = $userPost->$varigst;} /* else {
										$checked[$x][] = "";
									}   */
									if(($userPost->$varDuration)  == '10 mins' && (($userPost->$varcost) == $therapy_name)){ $checked[$x][] = '10 mins';	$price[$x][] = $userPost->$varigst;}/*  else {
										$checked[$x][] = "";
									}    */
									if(($userPost->$varDuration)  == '20 mins' && (($userPost->$varcost) == $therapy_name)){ $checked[$x][] = '20 mins';	$price[$x][] = $userPost->$varigst;}/*  else {
										$checked[$x][] = "";
									}   */
									if(($userPost->$varDuration ) == '40 mins' && (($userPost->$varcost) == $therapy_name)){ $checked[$x][] = '40 mins';	$price[$x][] = $userPost->$varigst;} /*  else {
										$checked[$x][] = "";
									}   */
									if(($userPost->$varDuration) == '60 mins' && (($userPost->$varcost) == $therapy_name)){ $checked[$x][] = '60 mins';	$price[$x][] = $userPost->$varigst;}/* else {
										$checked[$x][] = "";
									}  */
									
								}	//print_r($checked);
							if($userPost->$varcost == $therapy_name){
								$l++;
								
							}	
					$html .= "<input type='hidden' name='mins[$x][5]' value='5 mins'/>";
					$html .= "
							<div class='form-group'>
								<div class='row'>
									<div class='col-md-12 col-xs-12'>
										<div class='col-md-3 col-xs-3'>
											<label for='mins5$x' class='minstitle'>
											<input type='checkbox' name='cmins[$x][".($userPost->$varName)[0]."][5]' onclick='enablecost(5,$x);' id='mins5$x' "; 
											if(in_array('5 mins',$checked[$x])){ $html .= "checked";}
											$html .= "/><span class='fake-input'></span><span class='fake-label'>5 Mins</span>
											</label>
										</div>
										<div class='col-md-3 col-xs-3'>
											<input type='text' name = 'price[".($userPost->$varName)[0]."][5]' id='price5$x' class='form-control cost5$x' onkeyup = 'calcamt(5,\"$x\");' value='";if(in_array('5 mins',$checked[$x])){ $key = array_search('5 mins',$checked[$x]); $html .= $amt = $price[$x][$key];	 } else { $html .=$amt = 99; }
											
										$html .= "'"; 
										if(!in_array('5 mins',$checked[$x])){ $html .= "readonly"; }
										$gstamt = (0.15 * $amt);
										$html .= "/>
										</div>
										<div class='col-md-3 col-xs-3'>
											<input type='text' name = 'gst[".($userPost->$varName)[0]."][5]'  class='form-control ytgst' id='gst5$x' value='";/* if(in_array('5 mins',$checked[$x])){ */ $html .= ceil($gstamt) ; // } 
										$gstamt = $amt - (0.15 * $amt);
										$html .= "' readonly/>
										</div>
										<div class='col-md-3 col-xs-3'>
											<input type='text' name = 'earn[".($userPost->$varName)[0]."][5]'  class='form-control ytearn' id= 'earn5$x' value='";/* if(in_array('5 mins',$checked[$x])){ */ $html .=  $amt = floor(0.7 * $gstamt) ;//$html .= $amt - (0.3 * $amt);
											$z = $z+1; //} 
										$html .= "' readonly/>
										</div>
									</div>	
								</div>
							</div> ";
							$html .= "<input type='hidden' name='mins[$x][10]' value='10 mins'/>";
							$html .= "<div class='form-group'>	
							<div class='row'>
								<div class='col-md-12 col-xs-12'>
									<div class='col-md-3 col-xs-3'>
										<label for='mins10$x' class='minstitle'>
										<input type='checkbox'  name='cmins[$x][".($userPost->$varName)[0]."][10]' onclick='enablecost(10,$x);'  id='mins10$x' ";  if(in_array('10 mins',$checked[$x])){ $html .= "checked";}
										$html .= "/><span class='fake-input'></span><span class='fake-label'>10 Mins</span>
										</label>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'price[".($userPost->$varName)[0]."][10]' id='price10$x' onkeyup = 'calcamt(10,\"$x\");' class='form-control cost10$x' value='";if(in_array('10 mins',$checked[$x])){  $key = array_search('10 mins',$checked[$x]);$html .= $amt = $price[$x][$key]; }  else { $html .= $amt = 199; }
									$html .= "'"; 
									if(!in_array('10 mins',$checked[$x])){ $html .= "readonly"; }
									$gstamt = (0.15 * $amt);
									$html .= "/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'gst[".($userPost->$varName)[0]."][10]'  class='form-control ytgst' id='gst10$x'  value='";/* if(in_array('10 mins',$checked[$x])){  */
									$html .= ceil($gstamt) ; //} 
									$gstamt = $amt - (0.15 * $amt);
									$html .= "' readonly/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text'  class='form-control ytearn' name ='earn[".($userPost->$varName)[0]."][10]'  id='earn10$x'  value='";/* if(in_array('10 mins',$checked[$x])){ */ $html .= $amt = floor(0.7 * $gstamt)  ;//$html .= $amt - (0.3 * $amt);
										$z = $z+1; //} 
									$html .= "' readonly/>
									</div>
								</div>	
							</div> </div> ";
								$html .= "<input type='hidden' name='mins[$x][20]' value='20 mins'/>";
							$html .= "<div class='form-group'>
								<div class='row'>
								<div class='col-md-12 col-xs-12'>
									<div class='col-md-3 col-xs-3'>
										<label for='mins20$x' class='minstitle'>
										<input type='checkbox'  name='cmins[$x][".($userPost->$varName)[0]."][20]' onclick='enablecost(20,$x);'  id='mins20$x' "; 
										if(in_array('20 mins',$checked[$x])){ $html .= "checked";}
										$html .= "/><span class='fake-input'></span><span class='fake-label'>20 Mins</span>
										</label>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'price[".($userPost->$varName)[0]."][20]' id='price20$x' class='form-control cost20$x' onkeyup = 'calcamt(20,\"$x\");' value='";if(in_array('20 mins',$checked[$x])){ $key = array_search('20 mins',$checked[$x]);$html .= $amt = $price[$x][$key]; }  else { $html .= $amt = 299; }
									$html .= "'"; 
									if(!in_array('20 mins',$checked[$x])){ $html .= "readonly"; }
									$gstamt = (0.15 * $amt);
									$html .= "/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'gst[".($userPost->$varName)[0]."][20]'  class='form-control ytgst' id='gst20$x' value='";/* if(in_array('20 mins',$checked[$x])){  */ $html .= ceil($gstamt) ; //} 
									$gstamt = $amt - (0.15 * $amt);	
									$html .= "' readonly/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text'  class='form-control ytearn' name = 'earn[".($userPost->$varName)[0]."][20]'  id='earn20$x'  value='";/* if(in_array('20 mins',$checked[$x])){  */$html .= $amt = floor(0.7 * $gstamt)  ;$z = $z+1;  //}
									$html .= "' readonly/>
									</div>
								</div>	
							</div> 
						</div> 	
						";
							$html .= "<input type='hidden' name='mins[$x][40]' value='40 mins'/>";
							$html .= "<div class='form-group'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
									<div class='col-md-3 col-xs-3'>
										<label for='mins40$x' class='minstitle'>
										<input type='checkbox'  name='cmins[$x][".($userPost->$varName)[0]."][40]' onclick='enablecost(40,$x);'  id='mins40$x' "; 
										if(in_array('40 mins',$checked[$x])){ $html .= "checked";}
										$html .= "/><span class='fake-input'></span><span class='fake-label'>40 Mins</span>
										</label>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'price[".($userPost->$varName)[0]."][40]' id='price40$x' class='form-control cost40$x' onkeyup = 'calcamt(40,\"$x\");' value='";if(in_array('40 mins',$checked[$x])){ $key = array_search('40 mins',$checked[$x]); $html .= $amt = $price[$x][$key]; }  else { $html .=  $amt = 499; }
									$html .= "'"; 
									if(!in_array('40 mins',$checked[$x])){ $html .= "readonly"; }
									$gstamt = (0.15 * $amt);
									$html .= "/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'gst[".($userPost->$varName)[0]."][40]'  class='form-control ytgst' id='gst40$x' value='";/* if(in_array('40 mins',$checked[$x])){ */ $html .= ceil($gstamt) ; // } 
										
									$gstamt = $amt - (0.15 * $amt);	
									$html .= "' readonly/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text'  class='form-control' name = 'earn[".($userPost->$varName)[0]."][40]'  id='earn40$x' value='";/* if(in_array('40 mins',$checked[$x])){  */  $html .= $amt = floor(0.7 * $gstamt) ; $z = $z+1; //} 
									$html .= "' readonly/>
									</div>
								</div>	
							</div> 
						</div>";
					
							$html .= "<input type='hidden' name='mins[$x][60]' value='60 mins'/>";
							$html .= "<div class='form-group'>
							<div class='row'>
								<div class='col-md-12  col-xs-12'>
									<div class='col-md-3 col-xs-3'>
										<label for='mins60$x' class='minstitle'>
										<input type='checkbox'  name='cmins[$x][".($userPost->$varName)[0]."][60]' onclick='enablecost(60,$x);'  id='mins60$x' "; 
										if(in_array('60 mins',$checked[$x])){ $html .= "checked";}
										$html .= "/><span class='fake-input'></span><span class='fake-label'>60 Mins</span>
										</label>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'price[".($userPost->$varName)[0]."][60]' id='price60$x' class='form-control cost60$x' onkeyup = 'calcamt(60,\"$x\");' value='";if(in_array('60 mins',$checked[$x])){ $key = array_search('60 mins',$checked[$x]); $html .=  $amt = $price[$x][$key];	 }  else { $html .= $amt = 999; }
									
									$html .= "'"; 
									if(!in_array('60 mins',$checked[$x])){ $html .= "readonly"; }
									$gstamt =(0.15 * $amt);
									$html .= "/>
									
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text' name = 'gst[".($userPost->$varName)[0]."][60]' class='form-control' id='gst60$x' value='";/* if(in_array('60 mins',$checked[$x])){ */  $html .= ceil($gstamt) ; //} 
									$gstamt = $amt - (0.15 * $price[$x][$key]);		
									$html .= "' readonly/>
									</div>
									<div class='col-md-3 col-xs-3'>
										<input type='text'  class='form-control ytearn' name = 'earn[".($userPost->$varName)[0]."][60]'  id='earn60$x' value='";/* if(in_array('60 mins',$checked[$x])){ */   $html .= $amt = floor(0.7 * $gstamt) ;$z = $z+1;  //}
									$html .= "' readonly/>
									</div>
								</div>	 
							</div>
						</div>
							
						";
					}
					
				}
			
			}
		} // exit();
//	exit();
		$html .= "</div></div>
		<div class='border'>
			<div class='form-group'>
				<div class='col-md-12  col-xs-12'>
					<label for='timming' class='yttimming'>Timing</label>
				</div>
			</div>
		
			<div class='form-group'>
				<div class='col-md-12  col-xs-12'>
					<div class='col-md-3 col-xs-3'>
						<label for='availability' class='ytavailability' >Availability</label>
					</div>
					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<label for='time' class='ytstarttime'>Start Time</label>
						</div>
						<div class='col-md-3 col-xs-3'><label for='time' class='ytendtime'>End Time</label></div>
					</div>
				</div>
			</div> ";
		
		$querystr2 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key LIKE '%availability%' ORDER BY `wp_postmeta`.`meta_id` ASC ";
		$result2 = $wpdb->get_results( $querystr2, OBJECT ); 
		
		
		$r=0;$monday =$tuesday =$wednesday = $thursday = $friday = $saturday = $sunday  = 0;
		//echo 'r'.$r;echo "<br/>";
		$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key = 'availability_0_all_days' AND meta_value=1";
		$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
		$alldays = count($result4);
		$weekday = 'alldays';	
		if($alldays == 0){
			$html .= "<div class='form-group' id='alldays1'>
					<div class='row'>
						<div class='col-md-12  col-xs-12'>
							<div class='checkbox col-md-3 col-xs-3'>
								<label for='alldays' class='alldays' style='float:left'>
									<input type='checkbox'  onclick='enabledays();' id='alldays' name='availability_all_days['alldays'][]' value='1' />
									<span class='fake-input'></span>
									<span class='fake-label'>All Days</span>
								</label>

							</div>
							<div class=''>
								<div class='col-md-3 col-xs-3'>
									<input type='text' placeholder='Start Time' name='availability_start_time[alldays][]' id='start0$weekday' class='form-control ' readonly />


								</div>
								<div class='col-md-3 col-xs-3'>
									<input type='text' placeholder='End Time' name='availability_end_time[alldays][]'  id='end0$weekday' class='form-control' readonly />
								</div>
							</div>	
							<div class='col-md-3 col-xs-3'>
								<button type='button' class='form-control  btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add</button>
							</div>
					
						</div>	
					</div>
				</div>";
			
		} else {
			$k=1;$m=0;
			//echo "<pre>";print_r($result2);exit();
			for($g=0;$g < count($result2);$g++){
				
				$weekday = 'alldays';
				$label = 'All Days';
					
				if($result2[$g]->meta_key == 'availability_0_all_days' && $result2[$g]->meta_value == 1){
					//if($result2[$g]->meta_key == 'availability_0_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_0_time'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						//if($result5[0]->meta_value =='Monday'){
							$counter = $result5[0]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="
								<div class='form-group' id='$weekday$k'>
									<div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='checkbox  col-md-3 col-xs-3'>";
												if($m == 0){
													$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
													<input type='checkbox'   onClick='enabledays(\"$weekday\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
													<span class='fake-input'></span>
													<span class='fake-label'>".$label."</span>
													</label>";
												}
											$html .="</div>
											<div class=''>
												<div class='col-md-3 col-xs-3'>
													<input type='text' id='start$p$weekday' placeholder='Start Time'  name='availability_start_time[$weekday][]' class='form-control alldays ' value='".$start_time."' required/>
												</div>
												<div class='col-md-3 col-xs-3'>
													<input type='text' id='end$p$weekday' placeholder='End Time' name='availability_end_time[$weekday][]' class='form-control alldays ' value='".$end_time."' required/>
												</div>
											</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control  btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$startarr = explode(":",$start_time);
								$endarr = explode(":",$end_time);
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});
								$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							$r++;
							
						//} 
					//}
				}	
			} 
				
		}
			$html .= "<div id='alldaysdiv'></div>";
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Monday' ";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$monday = count($result4);
			$weekday = 'monday';	
			if($monday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='monday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Monday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Monday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start$weekday0' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value=''  readonly/>


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='End Time' id='end$weekday0' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=1;$m=0;$r=0;
				//echo "<pre>";print_r($result2);exit();
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						if($result5[0]->meta_value =='Monday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'monday';
							$label = 'Monday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$endarr = explode(":",$end_time);
								$startarr = explode(":",$start_time);
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			
			$html .= "<div id='mondaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Tuesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$tuesday = count($result4);
			$weekday = 'tuesday';	
			if($tuesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3' >
							<label for='tuesday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Tuesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Tuesday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value=''  readonly/>


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			} else {
				$k=0;$r=0;$m=0;
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Tuesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'tuesday';
							$label = 'Tuesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3' style='float:left'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$startarr[0]\",\"$startarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='tuesdaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Wednesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$wednesday = count($result4);
			$weekday = 'wednesday';
			if($wednesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3' >
							<label for='wednesday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Wednesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Wednesday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			}  else {
				$k=1;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Wednesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'wednesday';
							$label = 'Wednesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){ 
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required />
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
								max_hour_value:23,
								start_time: [\"$endarr[0]\",\"$endarr[1]\"],
								overflow_minutes:true,
								increase_direction:'up',
								disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
									disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='wednesdaydiv'></div>";  	
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Thursday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$thursday = count($result4);
			$weekday = 'thursday';
			if($thursday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='thursday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Thursday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Thursday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>
				
				";
				$html .= "<div id='thursdaydiv'></div>";  
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Thursday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'thursday';
							$label = 'Thursday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required />
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
									disable_keyboard_mobile: true});</script>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='thursdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Friday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$friday = count($result4);
			$weekday = 'friday';
			if($friday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='friday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Friday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Friday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday'  name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Friday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'friday';
							$label = 'Friday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$weekday$p' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$weekday$p' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='fridaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Saturday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$saturday = count($result4);
			$weekday = 'saturday';
			if($saturday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='saturday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Saturday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Saturday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Saturday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'saturday';
							$label = 'Saturday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  id='start$p$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='saturdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Sunday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$sunday = count($result4);
			$weekday = 'sunday';
			if($sunday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-3 col-xs-3'>
							<label for='sunday' class='weekdaytitle' style='float:left'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Sunday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Sunday</span>
						</label>
					</div>

					<div class=''>
						<div class='col-md-3 col-xs-3'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week starttme' value='' readonly />


						</div>
						<div class='col-md-3 col-xs-3'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				 
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
					
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Sunday'){
							$weekday = 'sunday';
							$label = 'Sunday';
							$counter = $result2[$g]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-3 col-xs-3'>";
								if($m == 0){
									$html .= "<label for='$weekday' class='weekdaytitle' style='float:left'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class=''>
								<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week starttme' value='".$start_time."' required/>
								</div>
								<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week endtme' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday ytadd'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div><script>$('#end$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$endarr[0]\",\"$endarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});$('#start$p$weekday').timepicki({show_meridian:false,min_hour_value:0,
									max_hour_value:23,
									start_time: [\"$startarr[0]\",\"$startarr[1]\"],
									overflow_minutes:true,
									increase_direction:'up',
										disable_keyboard_mobile: true});</script>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='sundaydiv'></div>"; 	
		$html .= "</div></div>
		<div class='border'>
			<div class='form-group'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
					
						<label for='bank_details' class='bank_details'>Bank Details</label>
					
				</div>
			</div>
		</div>
		"; 
		
		$html .= "<div class='form-group'><div class='row'><div class='col-md-12  col-xs-12'><div class='col-md-6 col-xs-6'><label for='acc_holder_name' class='acc_holder_name'>Account Holder Name</label></div><div class='col-md-6 col-xs-6'><input type='text' class='form-control' id='acc_holder_name' name='acc_holder_name' value='$ahn' data-parsley-required-message='Account Holder Name is required.' /><div id='ahn_error' style='color:red'></div></div></div></div></div>";
		
		$html .= "<div class='form-group'><div class='row'><div class='col-md-12  col-xs-12'><div class='col-md-6 col-xs-6'><label for='bank_name' class='bank_name'>Bank Name</label></div><div class='col-md-6 col-xs-6'><input type='text' class='form-control' id='bank_name' name='bank_name' value='$bn' data-parsley-required-message='Bank Name is required.' /><div id='bn_error' style='color:red'></div></div></div></div></div>";
		
		$html .= "<div class='form-group'><div class='row'><div class='col-md-12  col-xs-12'><div class='col-md-6 col-xs-6'><label for='acc_number' class='acc_number'>Account Number</label></div><div class='col-md-6 col-xs-6'><input type='text' class='form-control' id='acc_number' name='acc_number' value='$an' data-parsley-required-message='Account Number is required.' /><div id='ahn_error' style='color:red'></div></div></div></div></div>";
		
		$html .= "<div class='form-group'><div class='row'><div class='col-md-12  col-xs-12'><div class='col-md-6 col-xs-6'><label for='ifsc_code' class='ifsc_code'>IFSC Code</label></div><div class='col-md-6 col-xs-6'><input type='text' class='form-control' id='ifsc_code' name='ifsc_code' value='$ifsc' data-parsley-required-message='IFSC Code is required.' /><div id='ifsc_error' style='color:red'></div></div></div></div></div>";
		
		$html .='</div>
		<div class="border">
			<div class="form-group">
				<label for="communication-channel" class="col-12 communication-channel ">Communication Channel</label>
				
				<div class="row">
					<label for="communication-channel" class="col-12 ytinstantservice ">Instant Service</label>
					<p class="intdesc">Select the services are you will be immediately available for</p>
					<div class="checkbox col-md-4 col-xs-4">
						<label for="call" class="call">
						<input type="checkbox" name="communication-channel[]" value="Call" id="call" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required ';
						if(in_array("Call" , $communication_channel)){ 
						$html .= "checked"; }
						$html .= '><span class="fake-input"></span>
							<span class="fake-label">Call</span></label>
					</div>
					
					<div class="checkbox col-md-4 col-xs-4">
						<label for="chat" class="chat">
						<input type="checkbox" name="communication-channel[]" value="Chat" id="chat" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required ';
						if(in_array("Chat" , $communication_channel)){ $html .= "checked"; }
						$html .= '>
						<span class="fake-input"></span>
							<span class="fake-label">Chat</span></label>
					</div>
					
					<div class="checkbox col-md-4 col-xs-4">
						<label for="video-call" class="video-call">
						<input type="checkbox" value="Video Call" name="communication-channel[]" id="video-call" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required '; 
						if(in_array("Video Call" , $communication_channel)){ $html .= "checked"; }
						$html .= '>
						<span class="fake-input"></span>
						<span class="fake-label">Video Call</span></label>
					</div>
					<div id="message-holder"></div>
				</div>
			</div>';
		$html .= '
			<div class="form-group">
				
				<div class="row">
					<label for="communication-channel-appointment" class="col-12 communication-channel-appointment title">Appointment Booking</label>
					<p class="appdesc">Select the services for which you can give appointments</p>
					<div class="checkbox col-md-4 col-xs-4">
						<label for="acall" class="acall">
						<input type="checkbox" name="communication-channel-appointment[]" value="Call" id="acall"  ';
						if(in_array("Call" , $communication_channel_appointment)){ 
						$html .= "checked"; }
						$html .= '><span class="fake-input"></span>
							<span class="fake-label">Call</span></label>
					</div>
					
					<div class="checkbox col-md-4 col-xs-4">
						<label for="achat" class="achat">
						<input type="checkbox" name="communication-channel-appointment[]" value="Chat" id="achat" ';
						if(in_array("Chat" , $communication_channel_appointment)){ $html .= "checked"; }
						$html .= '>
						<span class="fake-input"></span>
							<span class="fake-label">Chat</span></label>
					</div>
					
					<div class="checkbox col-md-4 col-xs-4">
						<label for="avideo-call" class="avideo-call">
						<input type="checkbox" value="Video Call" name="communication-channel-appointment[]" id="avideo-call"  '; 
						if(in_array("Video Call" , $communication_channel_appointment)){ $html .= "checked"; }
						$html .= '>
						<span class="fake-input"></span>
						<span class="fake-label">Video Call</span></label>
					</div>
					
					
					
					<div id="message-holder"></div>
				</div>
			</div>
		</div>';
		$html .='<div class="">
			<div class="form-group">
				<div class="row">
					<div class="col-md-12  col-xs-12">
						<div class="checkbox col-md-1">
						
						</div>
						<div class="checkbox col-md-12 col-xs-12" style="text-align:left;">
							<ul style="display:none;">
								<li>All the experts will need to pay a 30% commission to Thriive basis their consultation charges per session. 
								</li>
								<li> All the experts are required to give five complementary sessions each month. Each session should be at least 15-20 minutes long. In lieu Thriive will promote experts on all its platforms. 
								</li>
								<li>To maintain the sanctity of this partnership, experts are forbidden from privately consulting the clients they have acquired through thriive. Experts found to do so will be penalised likewise. 
								</li>
								<li>Experts cannot, through their words or actions, can show Thrive in any negative light.
								</li>
								<li>Thrive would highly appreciate it if experts can promote Thrive on their personal social media and within their social network; and invite their peers to join thrive. 
								</li>
							</ul>
							<div class="checkbox col-md-6 col-xs-6">
								<label for="acceptterm" class="acceptterm">
								<input type="checkbox"  id="acceptterm" required >
								<span class="fake-input"></span>
								<span class="yttnc"><a href="https://www.thriive.in/wp-content/themes/thriive/assets/pdf/general-terms-of-use.pdf" target="_blank">Accept Terms and Condition</a> </span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
							
				//print_r($checked);
		//if(in_array('0',$existData)){
			$html .= "<div class='text-center'><input class='login_btn' type='submit' name='submit_business' value='Save'/></div>";
		//}
	} else {
		$html .= "Sorry, this is not a registered number";
	}
	echo generateJSON('success','',$html);
	wp_die();	
}
function addIssuesByTherapist(){
	global $wpdb;
	$mobile = $_POST['mobile'];
	$members = get_users(array(
			'meta_key' => 'mobile', 
			'meta_value' => $mobile
		)
	);
	$html = "";
	$existData = array();
	
	if(in_array('therapist', $members[0]->roles)) {
		$postID = get_user_meta($members[0]->data->ID, 'post_id', true);
		$communication_channel = get_field('communication_channel',$postID);
		$interested_in_business_model = get_field('interested_in_business_model',$postID);
		$interested_in_free_session = get_field('interested_in_free_session',$postID);
		$userPost = get_post($postID);
		/* echo "<pre>";print_r($userPost);//exit();
		echo $userPost->therapy;exit();  */
		$therapy_terms = get_terms(array('taxonomy' => 'therapy','hide_empty' => false));
		$bank_details = get_field('bank_details',$postID);
		
		for ($x = 0; $x < $userPost->therapy; $x++) { 
			$varExp = 'therapy_'.$x.'_experience';	
			$varIssue = 'therapy_'.$x.'_issues';					
			$varCharge = 'therapy_'.$x.'_charges';
			$varName = 'therapy_'.$x.'_therapy_name';
			$tclass = ($x == 0)?'':'therapy-select';
			$eclass = ($x == 0)?'':'therapy-exp';
			$xVal = $x+1;
			$astrik = ($x == 0)?'*':'';
			$required = 'required';
			$html .= "<input type='hidden' id='total_therapies' name='total_therapies' value='$userPost->therapy'><input type='hidden' name='post_id' value='$postID' /><div class='add_therapy_section'><div class='form-group sel'><label for='therapy-1' class='d-block'>Therapy $xVal$astrik</label><select class='form-control select-list-item select-dropdown-list $tclass' id='therapy-list_$xVal' name='t_name_$xVal' data-parsley-required-message='Therapy is required.' data-parsley-errors-container='#select-therapy-error_$xVal' $required disabled>";
			$html .= "<option value=''>Select Therapy</option>";
			foreach($therapy_terms as $therapy) {
				if($therapy->parent != 0){
					$selected = (($userPost->$varName)[0]==($therapy->term_id))?'selected':'';
					$html .= "<option value='$therapy->term_id - $therapy->name' $selected>$therapy->name</option>";
				}
			}
			$html .= "</select>";
			if(!empty($userPost->$varIssue)) {
				array_push($existData, 1);
				$html .= "<div class='form-group issue'><p>If the issues you practice is not listed here, please get in touch with us at <u>accountmanager1@thriive.in</u></p><div id='sel_issue_$xVal'><label for='issue-$xVal' class='d-block'>Issues you are specialized in</label><div id='selected_issues_$xVal' class='selected_issues'>";
				foreach($userPost->$varIssue as $issue) {
					$ailment = get_term( $issue, 'ailment', OBJECT );
					$html .= "<div class='issue_tag' id='tag_$ailment->slug'>$ailment->name</div>";
				}
				$html .= "</div></div>";
			} else {
				array_push($existData, 0);
				$html .= "<div class='form-group all_ailments'><div id='sel_issue_$xVal'><label for='issue-$xVal' class='d-block'>Select top 3 issues you specialize to match with right users.<br/>(ex: migraine, backpain)</label><div id='selected_issues_$xVal' class='selected_issues'></div><div class='issue_box' style='overflow: scroll; border: 1px solid #000; height: 200px;'><div style='margin-bottom: 5px;''><input type='text' class='form-control search_issues' id='search_issues_$xVal' placeholder='Search Issues' style='border-color: #c6c6c6 !important;'></div>";
				$ailments = get_ailment_by_therapy();
				foreach ($ailments as $k => $v) {
					$name = str_replace("'", "*", $v->name);
					$htmlname = "issues_$xVal"."[]";
					if($k == 0){
						$html .= "<div class='row therapy_issues' style='padding: 0 5%;'><div class='col-md-2 col-xs-2 col-xs-2'><input type='checkbox' name='$htmlname' id='input_$v->slug' data-parsley-mincheck='1' data-parsley-maxcheck='5' data-parsley-mincheck-message='Please select minimum 1 issues' data-parsley-maxcheck-message='Only 5 issues can be selected' data-parsley-errors-container='#issue_error_$xVal' required value='$v->term_id' onClick='selectIssueTag(\"$name\",\"$v->slug\",\"$xVal\");' style='opacity: initial; position: relative; height: 14px;'></div><div class='col-md-10 col-xs-10 label_issues' style='padding-left: 0px'><label for='$v->slug' style='padding-left: 10px;'>$v->name</label></div></div>";
					} else {
						$html .= "<div class='row therapy_issues' style='padding: 0 5%;'><div class='col-md-2 col-xs-2 col-xs-2'><input type='checkbox' name='$htmlname' id='input_$v->slug' value='$v->term_id' onClick='selectIssueTag(\"$name\",\"$v->slug\",\"$xVal\");' style='opacity: initial; position: relative; height: 14px;'></div><div class='col-md-10 col-xs-10 label_issues' style='padding-left: 0px'><label for='$v->slug' style='padding-left: 10px;'>$v->name</label></div></div>";			
					}
				}
				$html .= "</div></div><div id='issue_error_$xVal'></div></div>";
			} 
			//if(!empty($userPost->$varExp)) {
				/* array_push($existData, 1);
				$userExp = formatTherapistExperienceDate($userPost->$varExp); */
			/* }
			else {
				array_push($existData, 0);
				$userExp = "";
			} */
			/* $html .= "<div class='form-group exp'><label for='xperience'>Experience (Practice since)$astrik</label><input type='text' class='date_picker form-control $eclass' placeholder='Add your experience' id='experience_$xVal' name='t_experience_$xVal' value='$userExp' data-parsley-required-message='Experience is required.' $required readonly>";
			if(!empty($userExp)) {
				$html .= "<input type='hidden' value='$userExp' name='t_experience_$xVal'/>";
			}
			$html .= "</div>"; */
			//if(!empty($userPost->$varCharge)) {
				/* array_push($existData, 1);
				$userChg = $userPost->$varCharge; */
			/* }
			else {
				array_push($existData, 0);
				$userChg = "";
			} */
			$html .= "<div class='form-group'>
		<div class='col-md-12  col-xs-12'>
			<label for='bank_details' >Bank Details</label>
		</div>
		</div>";
		/* $html .= "<div class='form-group chg'><label for='charges'>Charges$astrik</label><input type='number' class='form-control therapy-chg' id='charges_$xVal' placeholder='Add your charges' name='t_charges_$xVal' value='$userChg' data-parsley-required-message='Charges is required.' $required /><div id='chg_error' style='color:red'></div></div>"; */
		}
		if($bank_details){
			$ahn = $bank_details['account_holder_name'];
			$bn = $bank_details['bank_name'];
			$an = $bank_details['account_number'];
			$ifsc = $bank_details['ifsc_code'];
		}else{
			$ahn = "";
			$bn = "";
			$an = "";
			$ifsc = "";
		}

		$html .= "<div class='form-group'><label for='acc_holder_name'>Account Holder Name</label><input type='text' class='form-control' id='acc_holder_name' name='acc_holder_name' value='$ahn' data-parsley-required-message='Account Holder Name is required.' /><div id='ahn_error' style='color:red'></div></div>";
		$html .= "<div class='form-group'><label for='bank_name'>Bank Name</label><input type='text' class='form-control' id='bank_name' name='bank_name' value='$bn' data-parsley-required-message='Bank Name is required.' /><div id='bn_error' style='color:red'></div></div>";
		$html .= "<div class='form-group'><label for='acc_number'>Account Number</label><input type='text' class='form-control' id='acc_number' name='acc_number' value='$an' data-parsley-required-message='Account Number is required.' /><div id='ahn_error' style='color:red'></div></div>";
		$html .= "<div class='form-group'><label for='ifsc_code'>IFSC Code</label><input type='text' class='form-control' id='ifsc_code' name='ifsc_code' value='$ifsc' data-parsley-required-message='IFSC Code is required.' /><div id='ifsc_error' style='color:red'></div></div>";

		$html .= "<div class='form-group'>
		<div class='col-md-12  col-xs-12'>
			<label for='bank_details'>Timing</label>
		</div>
		</div>
		</div><div class='form-group'>
		<div class='col-md-12  col-xs-12'>
		<div class='col-md-2 col-xs-2'><label for='availability'>Availability</label></div><div class='col-md-7 col-xs-7'><div class='col-md-4'><label for='time'>Start Time</label></div><div class='col-md-4'>End Time</div></div>
		</div>
		</div> ";
		
		$querystr2 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key LIKE '%availability%' ORDER BY `wp_postmeta`.`meta_id` ASC ";
		$result2 = $wpdb->get_results( $querystr2, OBJECT ); 
		
		
		$r=0;$monday =$tuesday =$wednesday = $thursday = $friday = $saturday = $sunday  = 0;
		//echo 'r'.$r;echo "<br/>";
		$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_key = 'availability_0_all_days' AND meta_value=1";
		$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
		$alldays = count($result4);
		$weekday = 'alldays';	
		if($alldays == 0){
			$html .= "<div class='form-group' id='alldays1'>
					<div class='row'>
					<div class='col-md-12  col-xs-12'>
					<div class='checkbox col-md-2 col-xs-2'>
					<label for='alldays'>
					<input type='checkbox'  onclick='enabledays();' id='alldays' name='availability_all_days['alldays'][]' value='1' />
					<span class='fake-input'></span>
					<span class='fake-label'>All Days</span>
					</label>

					</div>

						 
					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='time' placeholder='Start Time' name='availability_start_time[alldays][]' id='start0$weekday' class='form-control' readonly />


						</div>
						<div class='col-md-4'>
							<input type='time' placeholder='End Time' name='availability_end_time[alldays][]'  id='end0$weekday' class='form-control ' readonly />
						</div>
					</div>	
					<div class='col-md-3 col-xs-3'>
						<button type='button' class='form-control  btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
					</div>
					
				</div>	
			</div></div>";
			
		} else {
			$k=1;$m=0;
			//echo "<pre>";print_r($result2);exit();
			for($g=0;$g < count($result2);$g++){
				
				$weekday = 'alldays';
				$label = 'All Days';
					
				if($result2[$g]->meta_key == 'availability_0_all_days' && $result2[$g]->meta_value == 1){
					//if($result2[$g]->meta_key == 'availability_0_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_0_time'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						//if($result5[0]->meta_value =='Monday'){
							$counter = $result5[0]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="
								<div class='form-group' id='$weekday$k'>
									<div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='checkbox  col-md-2 col-xs-2'>";
												if($m == 0){
													$html .= "<label for='$weekday'>
													<input type='checkbox'   onClick='enabledays(\"$weekday\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
													<span class='fake-input'></span>
													<span class='fake-label'>".$label."</span>
													</label>";
												}
											$html .="</div>
											<div class='col-md-7 col-xs-7'>
												<div class='col-md-4'>
													<input type='time' id='start$p$weekday' placeholder='Start Time'  name='availability_start_time[$weekday][]' class='form-control alldays ' value='".$start_time."' required/>
												</div>
												<div class='col-md-4'>
													<input type='time' id='end$p$weekday' placeholder='End Time' name='availability_end_time[$weekday][]' class='form-control alldays ' value='".$end_time."' required/>
												</div>
											</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-2 col-xs-2'>
									<button type='button' class='form-control  btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div></div>";
								$k++;
							} 
							$r++;
							
						//} 
					//}
				}	
			} 
				
		}
			$html .= "<div id='alldaysdiv'></div>";
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Monday' ";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$monday = count($result4);
			$weekday = 'monday';	
			if($monday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='monday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Monday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Monday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='time' placeholder='Start Time' id='start$weekday0' name='availability_start_time[$weekday][]' class='form-control $weekday week' value=''  readonly/>


						</div>
						<div class='col-md-4'>
							<input type='time' placeholder='End Time' id='end$weekday0' name='availability_end_time[$weekday][]' class='form-control $weekday week' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=1;$m=0;$r=0;
				//echo "<pre>";print_r($result2);exit();
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						//print_r($result5);exit();
						if($result5[0]->meta_value =='Monday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'monday';
							$label = 'Monday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='time' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week' value='".$start_time."' required/>
								</div>
								<div class='col-md-4'>
								<input type='time'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-2 col-xs-2'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='mondaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Tuesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$tuesday = count($result4);
			$weekday = 'tuesday';	
			if($tuesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='tuesday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Tuesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Tuesday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='time' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week' value=''  readonly/>


						</div>
						<div class='col-md-4'>
							<input type='time'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value=''  readonly/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			} else {
				$k=0;$r=0;$m=0;
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Tuesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'tuesday';
							$label = 'Tuesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='time' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week' value='".$start_time."' required/>
								</div>
								<div class='col-md-4'>
								<input type='time'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='tuesdaydiv'></div>"; 
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Wednesday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$wednesday = count($result4);
			$weekday = 'wednesday';
			if($wednesday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='wednesday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Wednesday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Wednesday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='time' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week' value='' readonly />


						</div>
						<div class='col-md-4'>
							<input type='time'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
			}  else {
				$k=1;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Wednesday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'wednesday';
							$label = 'Wednesday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){ 
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='time' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week' value='".$start_time."' required />
								</div>
								<div class='col-md-4'>
								<input type='time'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='wednesdaydiv'></div>";  	
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Thursday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$thursday = count($result4);
			$weekday = 'thursday';
			if($thursday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='thursday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Thursday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Thursday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='time' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week' value='' readonly />


						</div>
						<div class='col-md-4'>
							<input type='time'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>
				
				";
				$html .= "<div id='thursdaydiv'></div>";  
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Thursday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'thursday';
							$label = 'Thursday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='time' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week' value='".$start_time."' required />
								</div>
								<div class='col-md-4'>
								<input type='time'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
							
							
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='thursdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Friday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$friday = count($result4);
			$weekday = 'friday';
			if($friday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='friday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Friday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Friday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='time' placeholder='Start Time' id='start0$weekday'  name='availability_start_time[$weekday][]' class='form-control $weekday week' value='' readonly />


						</div>
						<div class='col-md-4'>
							<input type='time'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Friday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'friday';
							$label = 'Friday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$weekday$p' class='form-control $weekday week' value='".$start_time."' required/>
								</div>
								<div class='col-md-4'>
								<input type='text'  placeholder='End Time' id='end$weekday$p' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
						} 
						$r++;
					}	
				} 
				
			}
			$html .= "<div id='fridaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Saturday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$saturday = count($result4);
			$weekday = 'saturday';
			if($saturday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='saturday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Saturday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Saturday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week' value='' readonly />


						</div>
						<div class='col-md-4'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Saturday'){
							$counter = $result2[$g]->meta_value;
							$weekday = 'saturday';
							$label = 'Saturday';
							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='text' placeholder='Start Time'  id='start$p$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week' value='".$start_time."' required/>
								</div>
								<div class='col-md-4'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add </button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='saturdaydiv'></div>";  
			$querystr4 = "SELECT * FROM wp_postmeta WHERE post_id = '".$postID."' AND meta_value = 'Sunday' LIMIT 1";
			$result4 = $wpdb->get_results( $querystr4, OBJECT ); 
			$sunday = count($result4);
			$weekday = 'sunday';
			if($sunday == 0){
				$html .="<div class='form-group' id='$weekday1'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class='checkbox  col-md-2 col-xs-2'>
							<label for='sunday'>
							<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",0);' id='$weekday' name='availability_day[]' value='Sunday'  />
							<span class='fake-input'></span>
							<span class='fake-label'>Sunday</span>
						</label>
					</div>

					<div class='col-md-7 col-xs-7'>
						<div class='col-md-4'>
							<input type='text' placeholder='Start Time' id='start0$weekday' name='availability_start_time[$weekday][]' class='form-control $weekday week' value='' readonly />


						</div>
						<div class='col-md-4'>
							<input type='text'  placeholder='End Time' id='end0$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='' readonly />
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");' disabled >Add </button>
						</div>
					</div>
				</div>
				</div>";
				 
			} else {
				$k=0;$r=0;$m=0; 
				for($g=0;$g < count($result2);$g++){
					if($result2[$g]->meta_key == 'availability_'.$r.'_time'){ 
					
						$querystr5 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='availability_".$r."_day'";
						$result5 = $wpdb->get_results( $querystr5, OBJECT );
						if($result5[0]->meta_value =='Sunday'){
							$weekday = 'sunday';
							$label = 'Sunday';
							$counter = $result2[$g]->meta_value;

							for($p=0;$p < $counter;$p++){ 
								$startvar = 'availability_'.$r.'_time_'.$p.'_start_time';
								$endvar = 'availability_'.$r.'_time_'.$p.'_end_time';
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$startvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$start_time = $result1[0]->meta_value;
								$querystr1 = "SELECT * FROM wp_postmeta  WHERE post_id = '".$postID."' AND meta_key ='".$endvar."'";
								$result1 = $wpdb->get_results( $querystr1, OBJECT );
								$end_time = $result1[0]->meta_value;
								$html .="<div class='form-group' id='$weekday$k'>
								<div class='row'>
								<div class='col-md-12  col-xs-12'>
								<div class='checkbox  col-md-2 col-xs-2'>";
								if($m == 0){
									$html .= "<label for='$weekday'>
									<input type='checkbox'  class='days' onClick='enabletime(\"$weekday\",\"$p\");' id='$weekday' name='availability_day[]' value='".$label."'  checked/>
									<span class='fake-input'></span>
									<span class='fake-label'>".$label."</span>
									</label>";
								}
								$html .="</div>
								<div class='col-md-7 col-xs-7'>
								<div class='col-md-4'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[$weekday][]' id='start$p$weekday' class='form-control $weekday week' value='".$start_time."' required/>
								</div>
								<div class='col-md-4'>
								<input type='text'  placeholder='End Time' id='end$p$weekday' name='availability_end_time[$weekday][]' class='form-control $weekday week' value='".$end_time."' required/>
								</div>
								</div>";
								if($m == 0){
									$html .= "<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday'  onClick='addmondaytime(\"$weekday\");'  >Add</button>
									</div>";$m++;
								}  else {
									$html .="<div class='col-md-3 col-xs-3'>
									<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$k\");' >Remove</button>
									</div>";
								}
								$html .= "</div>
								</div>
								</div>";
								$k++;
							} 
						}
						$r++;	
					}	
				} 
				
			}
			$html .= "<div id='sundaydiv'></div>"; 	
			$html .= '<div class="form-group">
			  			<div class="row">
							<label for="interested_in_business_model" class="col-12">Interested in Business Model</label>
							<label class="switch">
								<input type="checkbox" name= "interested_in_business_model" ';
								if($interested_in_business_model == 1){
									$html .= 'checked';
								}
								
							$html .= '>
								<span class="slider round"></span>
							</label>
						</div>
					</div>';
			$html .= '<div class="form-group">
			  			<div class="row">
							<label for="interested_in_free_session" class="col-12">Interested in Free Session</label>
							<label class="switch">
								<input type="checkbox" name= "interested_in_free_session" ';
								if($interested_in_free_session == 1){
									$html .= 'checked';
								} 
								
					$html .='>
								<span class="slider round"></span>
							</label>
						</div>
					</div>';		
			$html .='<div class="form-group">
			  			<div class="row">
					  		<label for="communication-channel" class="col-12">Communication Channel</label>
					  		<div class="checkbox-wrapper col-6">
						  		<input type="checkbox" name="communication-channel[]" value="Call" id="call" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required ';
						  		if(in_array("Call" , $communication_channel)){ 
								$html .= "checked"; }
								$html .= '><label for="call">Call</label>
					  		</div>
					  		
					  		<div class="checkbox-wrapper col-6">
						  		<input type="checkbox" name="communication-channel[]" value="Chat" id="chat" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required ';
								if(in_array("Chat" , $communication_channel)){ $html .= "checked"; }
								$html .= '>
						  		<label for="chat">Chat</label>
					  		</div>
					  		
					  		<div class="checkbox-wrapper col-6">
						  		<input type="checkbox" value="Video Call" name="communication-channel[]" id="video-call" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required '; 
								if(in_array("Video Call" , $communication_channel)){ $html .= "checked"; }
								$html .= '>
						  		<label for="video-call">Video Call</label>
					  		</div>
					  		
					  		<div class="checkbox-wrapper col-6">
						  		<input type="checkbox" value="Appointment Booking" name="communication-channel[]" id="appointment-booking" data-parsley-multiple="communication-channel" data-parsley-errors-container="#message-holder" required ';
								if(in_array("Appointment Booking" , $communication_channel)){ $html .= "checked"; } 
								$html .= '>
						  		<label for="appointment-booking">Appointment Booking</label>
					  		</div>
					  		
					  		
					  		<div id="message-holder"></div>
			  			</div>
			  		</div>';
					
					$m = 0;
					$html .= "<div class='form-group'>
					<div class='row'>
						<label for='business-therapy' class='col-12'>Business Therapy Cost Model</label>
					</div>
					</div> ";
					$html .= "<div class='form-group'>
						<div class='col-md-12  col-xs-12'>
							<div class='col-md-3 col-xs-3'><label for='duration'>Select Duration</label></div><div class='col-md-3 col-xs-3'><label for='price'>Price Cost</label></div><div class='col-md-3 col-xs-3'><label for='price'>GST Amount</label></div><div class='col-md-3 col-xs-3'><label for='price'>Your Earnings</label></div>
						</div>
					</div> ";
				//$checked  = array();
				
				for ($x = 0; $x < $userPost->therapy; $x++) {
					$z=0;	
					$checked   = $price = array();
					$varExp = 'therapy_'.$x.'_experience';	
					$varIssue = 'therapy_'.$x.'_issues';					
					$varCharge = 'therapy_'.$x.'_charges';
					$varName = 'therapy_'.$x.'_therapy_name';
					$varCost = 'business_therapy_cost_model_'.$x.'_therapy_cost';
					//echo ($userPost->$varName)[0];echo "<br/>";
					//echo $userPost->$varCost;echo "<br/>";
					//business_therapy_cost_model_0_therapy_cost_0_select_duration
					//business_therapy_cost_model_0_therapy_cost_0_price_including_gst
					//business_therapy_cost_model_0_therapy_cost_0_gst_amount
					//business_therapy_cost_model_0_therapy_cost_0_therapist_earning
					//business_therapy_cost_model_0_therapy_cost
			
					foreach($therapy_terms as $therapy) {
					
						if($therapy->parent != 0){
							
							if((($userPost->$varName)[0])==($therapy->term_id)){
								//$y=0;
							/* 	echo $varName;echo "<br/>";
								 echo ($userPost->$varName);echo "<br/>"; */
								$html .="<div class='form-group' ><div class='row'><div class='col-md-12  col-xs-12'>$therapy->name</div></div>";
							for($y = 0;$y < 5;$y++){
									
									$varDuration = 'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_select_duration';
									//echo ($userPost->$varDuration);echo "<br/>";
									$varigst = 'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_price_including_gst';
									
									$vargst = 'business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_gst_amount';
									$varEarning ='business_therapy_cost_model_'.$x.'_therapy_cost_'.$y.'_therapist_earning';
								
									//echo $userPost->$varDuration;echo "<br/>";
								//	echo ($userPost->$varDuration);echo "<br/>";
									if(($userPost->$varDuration) == '5 mins'){ $checked[$x][] = '5 mins';	$price[$x][] = $userPost->$varigst;} /* else {
										$checked[$x][] = "";
									}   */
									if(($userPost->$varDuration) == '10 mins'){ $checked[$x][] = '10 mins';	$price[$x][] = $userPost->$varigst;}/*  else {
										$checked[$x][] = "";
									}    */
									if(($userPost->$varDuration) == '20 mins'){ $checked[$x][] = '20 mins';	$price[$x][] = $userPost->$varigst;}/*  else {
										$checked[$x][] = "";
									}   */
									if(($userPost->$varDuration) == '40 mins'){ $checked[$x][] = '40 mins';	$price[$x][] = $userPost->$varigst;} /*  else {
										$checked[$x][] = "";
									}   */
									if(($userPost->$varDuration) == '60 mins'){ $checked[$x][] = '60 mins';	$price[$x][] = $userPost->$varigst;}/* else {
										$checked[$x][] = "";
									}  */
									
								}	//print_r($checked);print_r($price);exit();
					//	print_r($price);print_r($checked);
						/*print_r($checked10);	
						print_r($checked60); */
							//	echo ($userPost->$varDuration);
								$html .= "<input type='text' name='mins[$x][]' value='5 mins'/>";
									$html .="<div class='form-group' ><div class='row'><div class='col-md-12  col-xs-12'>";
												
										$html .= "<div class='form-group'>
											<div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='col-md-3 col-xs-3'>
												<label for='mins5$x'>
												<input type='checkbox' name='mins[$x][]' onclick='enablecost(5,$x);' id='mins5$x' value='5 mins'"; 
												if(in_array('5 mins',$checked[$x])){ $html .= "checked";}
												$html .= "/><span class='fake-input'></span><span class='fake-label'>5 Mins</span>
												</label>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'price[$x][5]' id='price5$x' class='form-control cost5$x' onkeyup = 'calcamt(5,\"$x\");' value='";if(in_array('5 mins',$checked[$x])){ $key = array_search('5 mins',$checked[$x]); $html .= $amt = $price[$x][$key];	 } 
												
											$html .= "'"; 
											if(!in_array('5 mins',$checked[$x])){ $html .= "readonly"; }
											$html .= "/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'gst[$x][5]'  class='form-control ' id='gst5$x' value='";if(in_array('5 mins',$checked[$x])){ $html .= $gstamt = (0.18 * $price[$x][$key]); } 
											$html .= "' readonly/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'earn[$x][5]'  class='form-control' id= 'earn5$x' value='";if(in_array('5 mins',$checked[$x])){ $amt = $amt - $gstamt ;$html .= $amt - (0.3 * $amt);$z = $z+1; } 
											$html .= "' readonly/>
											</div>
										</div>	
									</div></div> ";
									$html .= "<input type='text' name='mins[$x][]' value='10 mins'/>";
									$html .= "<div class='form-group'>	<div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='col-md-3 col-xs-3'>
												<label for='mins10$x'>
												<input type='checkbox' onclick='enablecost(10,$x);'  id='mins10$x' ";  if(in_array('10 mins',$checked[$x])){ $html .= "checked";}
												$html .= "/><span class='fake-input'></span><span class='fake-label'>1044 Mins</span>
												</label>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'price[$x][10]' id='price10$x' onkeyup = 'calcamt(10,\"$x\");' class='form-control cost10$x' value='";if(in_array('10 mins',$checked[$x])){  $key = array_search('10 mins',$checked[$x]);$html .= $amt = $price[$x][$key]; } 
											$html .= "'"; 
											if(!in_array('10 mins',$checked[$x])){ $html .= "readonly"; }
											$html .= "/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'gst[$x][10]'  class='form-control' id='gst10$x'  value='";if(in_array('10 mins',$checked[$x])){ $html .= $gstamt = (0.18 * $price[$x][$key]); } 
											$html .= "' readonly/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text'  class='form-control ' name ='earn[$x][10]'  id='earn10$x'  value='";if(in_array('10 mins',$checked[$x])){  $amt = $amt - $gstamt ;$html .= $amt - (0.3 * $amt);$z = $z+1; } 
											$html .= "' readonly/>
											</div>
										</div>	
									</div> </div> ";
									$html .= "<input type='text' name='mins[$x][]' value='20 mins'/>";
									$html .= "<div class='form-group'><div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='col-md-3 col-xs-3'>
												<label for='mins20$x'>
												<input type='checkbox' onclick='enablecost(20,$x);'  id='mins20$x' "; 
												if(in_array('20 mins',$checked[$x])){ $html .= "checked";}
												
												$html .= "/><span class='fake-input'></span><span class='fake-label'>20 Mins</span>
												</label>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'price[$x][20]' id='price20$x' class='form-control cost20$x' onkeyup = 'calcamt(20,\"$x\");' value='";if(in_array('20 mins',$checked[$x])){ $key = array_search('20 mins',$checked[$x]);$html .= $amt = $price[$x][$key]; } 
											$html .= "'"; 
											if(!in_array('20 mins',$checked[$x])){ $html .= "readonly"; }
											$html .= "/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'gst[$x][20]'  class='form-control ' id='gst20$x' value='";if(in_array('20 mins',$checked[$x])){  $html .= $gstamt = (0.18 * $price[$x][$key]); } 
											$html .= "' readonly/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text'  class='form-control ' name = 'earn[$x][20]'  id='earn20$x'  value='";if(in_array('20 mins',$checked[$x])){ $amt = $amt - $gstamt ;$html .= $amt - (0.3 * $amt);$z = $z+1;  }
											$html .= "' readonly/>
											</div>
										</div>	
									</div> 	</div>";
									$html .= "<input type='text' name='mins[$x][]' value='40 mins'/>";
									$html .= "<div class='form-group'><div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='col-md-3 col-xs-3'>
												<label for='mins40$x'>
												<input type='checkbox' onclick='enablecost(40,$x);'  id='mins40$x' "; 
												if(in_array('40 mins',$checked[$x])){ $html .= "checked";}
											
												$html .= "/><span class='fake-input'></span><span class='fake-label'>40 Mins</span>
												</label>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'price[$x][40]' id='price40$x' class='form-control cost40$x' onkeyup = 'calcamt(40,\"$x\");' value='";if(in_array('40 mins',$checked[$x])){ $key = array_search('40 mins',$checked[$x]); $html .= $amt = $price[$x][$key]; } 
											$html .= "'"; 
											if(!in_array('40 mins',$checked[$x])){ $html .= "readonly"; }
											$html .= "/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'gst[$x][40]'  class='form-control' id='gst40$x' value='";if(in_array('40 mins',$checked[$x])){ $html .= $gstamt =  (0.18 * $price[$x][$key]); } 
											$html .= "' readonly/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text'  class='form-control' name = 'earn[$x][40]'  id='earn40$x' value='";if(in_array('40 mins',$checked[$x])){  $amt = $amt - $gstamt ;$html .= $amt - (0.3 * $amt);$z = $z+1; } 
											$html .= "' readonly/>
											</div>
										</div>	
									</div> </div>";
									
									$html .= "<div class='form-group'><div class='row'>
										<div class='col-md-12  col-xs-12'>
											<div class='col-md-3 col-xs-3'>
												<label for='mins60$x'>
												<input type='checkbox' onclick='enablecost(60,$x);'  id='mins60$x' "; 
												if(in_array('60 mins',$checked[$x])){ $html .= "checked";}
											
												$html .= "/><span class='fake-input'></span><span class='fake-label'>60 Mins</span>
												</label>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'price[$x][60]' id='price60$x' class='form-control cost60$x' onkeyup = 'calcamt(60,\"$x\");' value='";if(in_array('60 mins',$checked[$x])){ $key = array_search('60 mins',$checked[$x]); $html .=  $amt = $price[$x][$key];	 } 
											
											$html .= "'"; 
											if(!in_array('60 mins',$checked[$x])){ $html .= "readonly"; }
											$html .= "/>
											
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text' name = 'gst[$x][60]' class='form-control' id='gst60$x' value='";if(in_array('60 mins',$checked[$x])){  $html .= $gstamt = (0.18 * $price[$x][$key]); } 
											$html .= "' readonly/>
											</div>
											<div class='col-md-3 col-xs-3'>
												<input type='text'  class='form-control' name = 'earn[$x][60]'  id='earn60$x' value='";if(in_array('60 mins',$checked[$x])){  $amt = $amt - $gstamt ;$html .= $amt - (0.3 * $amt);$z = $z+1;  }
											$html .= "' readonly/>
											</div>
										</div>	 
									</div>
								</div>";
							}
							
						}
					
					}
				}	
				//print_r($checked);
		//if(in_array('0',$existData)){
			$html .= "<input class='login_btn' type='submit' name='submit_issues' value='Save'/>";
		//}
	} else {
		$html .= "Sorry, this is not a registered number";
	}
	echo generateJSON('success','',$html);
	wp_die();	
}

function submitIssues($input){ 
	//echo "<pre>"; 
	//exit();
//	$input['mins']  = array("5 mins","10 mins","20 mins","40 mins","60 mins");
	//print_r($input); exit(); 
	global $wpdb;
	$current_user = wp_get_current_user();

	$availability_start_time = $input['availability_start_time'];
	$availability_end_time = $input['availability_end_time'];
	$price = $input['price'];
	$mins = $input['mins']  ;	
	$cmins = $input['cmins'];	
	$gst = $input['gst'];
	$earn = $input['earn'];
	$therapy_id = $input['therapy_id'];
	$postID = $input['post_id'];
	 //a:2:{i:0;s:9:"Overphone";i:1;s:6:"Online";}
	//print_r($therapy_id); 
	$changetime = 0;
	$post_id = $postID;
	$userPost = get_post($postID);
//	echo "<pre>";print_r($price);
	//echo "<pre>";print_r($price);exit();
	$orgmins = array("5 mins","10 mins","20 mins","40 mins","60 mins");	
	$therapy_details = get_field('business_therapy_cost_model',$postID);
	/* echo "<pre>";print_r($input['therapy_id']);
	echo count($input['therapy_id']);exit(); */
	$therapy_cont = 0;
	//echo 'check'.$userPost->therapy;
	$querystr ="DELETE FROM `wp_postmeta` WHERE `post_id` = ".$postID." AND meta_key LIKE '%business_therapy_cost_model_%'";
	$wpdb->query( $querystr); $g=0;
	for ($x = 0; $x < $userPost->therapy; $x++) {
		$varExp = 'therapy_'.$x.'_experience';	
		$varIssue = 'therapy_'.$x.'_issues';					
		$varCharge = 'therapy_'.$x.'_charges';
		$varName = 'therapy_'.$x.'_therapy_name';
		$varCost = 'business_therapy_cost_model_'.$x.'_therapy_cost';
			//business_therapy_cost_model_0_therapy_cost_0_select_duration
					//business_therapy_cost_model_0_therapy_cost_0_price_including_gst
					//business_therapy_cost_model_0_therapy_cost_0_gst_amount
					//business_therapy_cost_model_0_therapy_cost_0_therapist_earning
					//business_therapy_cost_model_0_therapy_cost
		$z=0;			
		$finalmins  = array_diff($orgmins,$cmins[$x]);
		//print_r($cmins[$x]);//exit();
		$key1 = key($cmins[$x]);
		//for ($y = 0; $y < 5; $y++) {	
	
		
		
		/* $therapy_details = get_field('business_therapy_cost_model_'.$x.'_therapy_name',$postID);
		if($therapy_details){
			update_post_meta($postID,'business_therapy_cost_model_'.$x.'_therapy_name',$therapy_id[$x]);
		} else { */
			
		//}
		//print_r($cmins);
		if(!empty($cmins[$x])){ $therapy_cont++; 
		
			
			foreach($cmins[$x] as  $key1 => $val1){	/* echo $key1;echo "<br/>";echo $price[$x][$key1];echo "<br/>";;echo $mins[$x][$key1];echo "<br/>"; */
			/* echo "hghhg";
			exit(); */
					$y=0;	
				/* $count1 = get_post_meta($postID, 'business_therapy_cost_model_'.$g.'_therapy_name',true);
						if($count1 > 0){ //echo "hello";echo $g;exit();
							update_post_meta($postID,'business_therapy_cost_model_'.$g.'_therapy_name',$therapy_id[$x]);
							
						} else {  */
							add_post_meta($postID,'business_therapy_cost_model_'.$g.'_therapy_name',$therapy_id[$x]);
						//}		
				foreach($val1 as  $key2 => $val2){ 
					
								add_post_meta($postID,'business_therapy_cost_model_'.$g.'_therapy_cost_'.$y.'_select_duration', $key2.' mins');
								add_post_meta( $postID,'business_therapy_cost_model_'.$g.'_therapy_cost_'.$y.'_price_including_gst', $price[$key1][$key2]);
								add_post_meta( $postID,'business_therapy_cost_model_'.$g.'_therapy_cost_'.$y.'_gst_amount', $gst[$key1][$key2]);
								add_post_meta( $postID,'business_therapy_cost_model_'.$g.'_therapy_cost_'.$y.'_therapist_earning', $earn[$key1][$key2]);
								
								/* add_post_meta($postID,'therapy_'.$g.'_therapy_name',serialize(array($therapy_id[$x]))); */
								$z++;
								//next($cmins[$x]); 
								//echo 'key'.$key1 =  key($cmins[$x][$key1]);echo "<br/>";
							//}
							$y++;
						
				} 
					$count = $wpdb->get_row("SELECT COUNT(*) AS THE_COUNT FROM $wpdb->postmeta WHERE meta_key = 'business_therapy_cost_model_".$g."_therapy_cost' AND post_id = ".$postID."");
			

					if($count->THE_COUNT > 0){

						update_post_meta($postID,'business_therapy_cost_model_'.$g.'_therapy_cost',$y);
					} else {
						add_post_meta($postID,'business_therapy_cost_model_'.$g.'_therapy_cost', $y);
					}
				$g++;		
			}  
		}
		
	}	
		//exit();
	//$result = get_post_meta(30227, 'post_id', true);
	$querystr = "SELECT meta_key,meta_value  FROM $wpdb->postmeta  WHERE post_id = '".$postID."' AND meta_key LIKE '%availability%' ORDER BY meta_value ASC";

	$result = $wpdb->get_results( $querystr, OBJECT );//echo 'therapy_cont'.$therapy_cont;exit();
	//if($therapy_details){
		update_post_meta($postID,'business_therapy_cost_model',$therapy_cont);
	//} 
	/* echo "<pre>";print_r($result);
	exit(); */
	$querystr ="DELETE FROM `wp_postmeta` WHERE `post_id` = ".$postID." AND meta_key LIKE '%availa%'";
	$wpdb->query( $querystr); 
	$k=0;//exit();
	if(!empty($availability_start_time)){
		if(!empty(array_filter($availability_start_time['alldays']))){
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 1);
			$wpdb->insert('wp_postmeta',$data);
			for($i = 0;$i < count($availability_start_time['alldays']);$i++){ 
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['alldays'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['alldays'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['alldays']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
			
		}
		if(!empty(array_filter($availability_start_time['monday']))){
		//echo "fdfd";print_r($availability_start_time['monday']);exit();
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' => 'Monday');
			$wpdb->insert('wp_postmeta',$data);
			
			for($i = 0;$i < count($availability_start_time['monday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['monday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['monday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
			}
			
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['monday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		if(!empty(array_filter($availability_start_time['tuesday']))){
		
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' =>'Tuesday');
			$wpdb->insert('wp_postmeta',$data);
			
			for($i = 0;$i < count($availability_start_time['tuesday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['tuesday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['tuesday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['tuesday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		if(!empty(array_filter($availability_start_time['wednesday']))){
		
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' => 'Wednesday');
			$wpdb->insert('wp_postmeta',$data);
			for($i = 0;$i < count($availability_start_time['wednesday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['wednesday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['wednesday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['wednesday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		if(!empty(array_filter($availability_start_time['thursday']))){
			
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' => 'Thursday');
			$wpdb->insert('wp_postmeta',$data);
			
			for($i = 0;$i < count($availability_start_time['thursday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['thursday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['thursday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['thursday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		if(!empty(array_filter($availability_start_time['friday']))){

			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' => 'Friday');
			$wpdb->insert('wp_postmeta',$data);
			
			for($i = 0;$i < count($availability_start_time['friday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['friday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['friday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['friday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		if(!empty(array_filter($availability_start_time['saturday']))){
	
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' => 'Saturday');
			$wpdb->insert('wp_postmeta',$data);
			for($i = 0;$i < count($availability_start_time['saturday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['saturday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['saturday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['saturday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		if(!empty(array_filter($availability_start_time['sunday']))){

			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_all_days', 'meta_value' => 0);
			$wpdb->insert('wp_postmeta',$data);
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_day', 'meta_value' => 'Sunday');
			$wpdb->insert('wp_postmeta',$data);
			for($i = 0;$i < count($availability_start_time['sunday']);$i++){
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_start_time', 'meta_value' => date("H:i:s",strtotime($availability_start_time['sunday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time_'.$i.'_end_time', 'meta_value' => date("H:i:s",strtotime($availability_end_time['sunday'][$i])));
				$wpdb->insert('wp_postmeta',$data);
				
				
			}
			$data = array('post_id' => $post_id, 'meta_key' => 'availability_'.$k.'_time', 'meta_value' => count($availability_start_time['sunday']));
			$wpdb->insert('wp_postmeta',$data);
			$changetime = 1;
			$k++;
		}
		
		$data = array('post_id' => $post_id, 'meta_key' => 'availability', 'meta_value' => $k);
		$wpdb->insert('wp_postmeta',$data);
		$first_name = get_userdata($current_user->ID)->first_name;
		$last_name = get_userdata($current_user->ID)->last_name;	
		if($changetime == 1){
			//sendEmail('manishj@thriive.in','Therapist updated Time','Therapist '. $first_name .' '.$last_name.' has updated the Time');
			sendEmail('accountmanager2@thriive.in','Therapist updated Time','Therapist '.$first_name .' '.$last_name.' has updated the Time');
			
		}
	} 
	if(!empty($input['communication-channel-appointment'])){
		$input['communication-channel'][] = "Appointment Booking";
	}
	$communication_channel = serialize($input['communication-channel']);
	$data = array('meta_key' => 'communication_channel','post_id' => $postID,'meta_value' => serialize($input['communication-channel'])); //print_r($data);
	$getrow = $wpdb->get_row("SELECT * from wp_postmeta where post_id = '".$postID."' AND meta_key ='communication_channel'");
	if($getrow){
		$wpdb->update('wp_postmeta',$data,array('meta_key' => 'communication_channel','post_id' => $postID));
	} else {
		$wpdb->insert('wp_postmeta',$data);
	}
	$communication_channel_appointment = serialize($input['communication-channel-appointment']);
	$data = array('meta_key' => 'communication_channel_appointment','post_id' => $postID,'meta_value' => serialize($input['communication-channel-appointment'])); //print_r($data);
	$getrow = $wpdb->get_row("SELECT * from wp_postmeta where post_id = '".$postID."' AND meta_key ='communication_channel_appointment'");
	if($getrow){
		$wpdb->update('wp_postmeta',$data,array('meta_key' => 'communication_channel_appointment','post_id' => $postID));
	} else {
		$wpdb->insert('wp_postmeta',$data);
	}
	$interested_in_business_model = $input['interested_in_business_model'];
	if($interested_in_business_model == 'on'){
		$interested_in_business_model = 1;
	} else {
		$interested_in_business_model = 0;
	}
	$data = array('meta_key' => 'interested_in_business_model','post_id' => $postID,'meta_value' => $interested_in_business_model); 
	$getrow = $wpdb->get_row("SELECT * from wp_postmeta where post_id = '".$postID."' AND meta_key ='interested_in_business_model'");
	if($getrow){
		$wpdb->update('wp_postmeta',$data,array('meta_key' => 'interested_in_business_model','post_id' => $postID));
	} else {
		$wpdb->insert('wp_postmeta',$data);
	}
	$interested_in_free_session = $input['interested_in_free_session'];
	if($interested_in_free_session == 'on'){
		$interested_in_free_session = 1;
	} else {
		$interested_in_free_session = 0;
	}
	
	$data = array('meta_key' => 'interested_in_free_session','post_id' => $postID,'meta_value' => $interested_in_free_session); //print_r($data);
	$getrow = $wpdb->get_row("SELECT * from wp_postmeta where post_id = '".$postID."' AND meta_key ='interested_in_free_session'");
	
	if($getrow){
		$wpdb->update('wp_postmeta',$data,array('meta_key' => 'interested_in_free_session','post_id' => $postID));
	} else {
		$wpdb->insert('wp_postmeta',$data);
	}
	global $ti_msg;
	//echo 'total_therapies'.$input['total_therapies'];exit();
	if(isset($input['total_therapies'])){
		$post_id = $input['post_id'];
		$total_therapies = intval($input['total_therapies']);
		$i=0;
		/* for ($x = 0; $x < $total_therapies; $x++) {	
			update_field('therapy_'.$i.'_experience',$input['t_experience_'.($x+1)],$post_id);
			update_field('therapy_'.$i.'_charges',$input['t_charges_'.($x+1)],$post_id);
			if($input['issues_'.($x+1)]){
				update_field('therapy_'.$i.'_issues',$input['issues_'.($x+1)],$post_id);
				foreach($input['issues_'.($x+1)] as $issue){
					wp_set_post_terms($post_id, $issue, 'ailment' );
				}
			}
			$i++;													
		} */
		
		
		update_field('bank_details_account_holder_name',$input['acc_holder_name'],$post_id);
		update_field('bank_details_bank_name',$input['bank_name'],$post_id);
		update_field('bank_details_account_number',$input['acc_number'],$post_id);
		update_field('bank_details_ifsc_code',$input['ifsc_code'],$post_id);
		sendEmail('manishj@thriive.in','Issues and therapies updated',get_the_title($post_id).' has saved issues from add issue form');
		sendEmail('accountmanager2@thriive.in','Issues and therapies updated',get_the_title($post_id).' has saved issues from add issue form');
		sendEmail('accountmanager4@thriive.in','Issues and therapies updated',get_the_title($post_id).' has saved issues from add issue form');
		sendEmail('accountmanager5@thriive.in','Issues and therapies updated',get_the_title($post_id).' has saved issues from add issue form');
		sendEmail('accountmanager6@thriive.in','Issues and therapies updated',get_the_title($post_id).' has saved issues from add issue form');
		$ti_msg = "Your data successfully saved.";
		return generateJSON('success','Issues added successfully','');
	} else {
		return generateJSON('error','Enter required fields','');
	}
}

function my_disable_quick_edit( $actions = array(), $post = null ) {
    // Remove the Quick Edit link
    if ( isset( $actions['inline hide-if-no-js'] ) ) {
        unset( $actions['inline hide-if-no-js'] );
    }

    // Return the set of links without Quick Edit
    return $actions;

} 

// function oc_assign_masked_number_to_user($therapist_email,$seeker_email){
// 	global $wpdb;
// 	$therapist = get_user_by("email",$therapist_email);
// 	$seeker = get_user_by("email",$seeker_email);
// 	$r_masked_number = $c_masked_number = "";

// 	$check_caller_entry = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE caller_id = ".$therapist->ID." and receiver_id = ".$seeker->ID." and is_deleted = 0");
// 	if($check_caller_entry){
// 		$get_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.caller_id = ".$therapist->ID." and mo.receiver_id = ".$seeker->ID." and mo.is_deleted = 0");
// 			$c_masked_number = $get_masked_number->masked_number;
// 	} else {
// 		$get_used_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
// 		if($get_used_number){
// 			$check_masked_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
// 			if($check_masked_number ){
// 				$get_next_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
// 				$data = array('caller_id' => $therapist->ID, 'receiver_id' => $seeker->ID, 'cmd_id' => $get_next_number->id);
// 				$wpdb->insert('my_operator_number_allocation',$data);
// 				$c_masked_number = $get_next_number->masked_number;
// 			} else {
// 				$data = array('caller_id' => $therapist->ID, 'receiver_id' => $seeker->ID, 'cmd_id' => $check_masked_number->id);
// 				$wpdb->insert('my_operator_number_allocation',$data);
// 				$c_masked_number = $check_masked_number->masked_number;
// 			}
// 		}
// 	}
// 		$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '0'");
// 		$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '1' WHERE caller_id = ".$therapist->ID." AND receiver_id = ".$seeker->ID." AND is_deleted = 0");

// 		// send_mail_to_therapist($therapist,$seeker,$c_masked_number);
// 		// send_mail_to_seeker($therapist,$seeker,$c_masked_number);

// 		// send_sms_to_therapist($seeker,$therapist,$r_masked_number);
// 		// send_sms_to_seeker($seeker,$therapist,$c_masked_number);

// 		send_mail_to_product_manager_thriive($therapist,$seeker,$r_masked_number,$c_masked_number);

// 		$result = array("status"=>"success","masked_number"=>$c_masked_number);
// 		return $result;
// 		//wp_send_json_success($result);
// }

function oc_assign_masked_number_to_user($therapist_email,$seeker_email){
	global $wpdb;
	$therapist = get_user_by("email",$therapist_email);
	$seeker = get_user_by("email",$seeker_email);
	$r_masked_number = $c_masked_number = "";

	$check_caller_entry = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE caller_id = ".$therapist->ID." and receiver_id = ".$seeker->ID." and is_deleted = 0");
	if($check_caller_entry){
		$get_masked_number = $wpdb->get_row("SELECT m.masked_number as masked_number from my_operator_call_masking_details m JOIN my_operator_number_allocation mo on m.id = mo.cmd_id WHERE mo.caller_id = ".$therapist->ID." and mo.receiver_id = ".$seeker->ID." and mo.is_deleted = 0");
			$c_masked_number = $get_masked_number->masked_number;
	} else {
		$get_used_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
		if($get_used_number){
			$check_masked_number = $wpdb->get_row("SELECT * FROM my_operator_number_allocation WHERE caller_id = ".$therapist->ID." and cmd_id = ".$get_used_number->id." and is_deleted = 0");
			if($check_masked_number ){
				$get_next_number = $wpdb->get_row("SELECT * from my_operator_call_masking_details where status = 0 ORDER BY RAND() LIMIT 1");
				$data = array('caller_id' => $therapist->ID, 'receiver_id' => $seeker->ID, 'cmd_id' => $get_next_number->id);
				$wpdb->insert('my_operator_number_allocation',$data);
				$c_masked_number = $get_next_number->masked_number;
			} else {
				$data = array('caller_id' => $therapist->ID, 'receiver_id' => $seeker->ID, 'cmd_id' => $get_used_number->id);
				$wpdb->insert('my_operator_number_allocation',$data);
				$c_masked_number = $get_used_number->masked_number;
			}
		}
	}
		$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '0'");
		$wpdb->query("UPDATE my_operator_number_allocation SET is_called_now = '1' WHERE caller_id = ".$therapist->ID." AND receiver_id = ".$seeker->ID." AND is_deleted = 0");

		send_mail_to_therapist($therapist,$seeker,$c_masked_number);
		// send_mail_to_seeker($therapist,$seeker,$c_masked_number);

		// send_sms_to_therapist($seeker,$therapist,$r_masked_number);
		// send_sms_to_seeker($seeker,$therapist,$c_masked_number);

		send_mail_to_product_manager_thriive($therapist,$seeker,$r_masked_number,$c_masked_number);
		$msg = "Caller Email: ".$seeker->user_email."<br/>Caller Number: ".$c_masked_number."<br/><br/>Receiver Email: ".$therapist->user_email."<br/>Receiver Number: ".$r_masked_number;
		sendEmail('prathamesh@thriive.in','Assigned masked number',$msg);
		//sendEmail('kazi@thriive.in','Assigned masked number',$msg);

		$result = array("status"=>"success","masked_number"=>$c_masked_number);
		return $result;
		//wp_send_json_success($result);
}
function get_pending_onlinesession($uid,$therapist_id,$package){
	global $wpdb;
	$data = array();
	//$userdetails = $wpdb->get_row("SELECT (SUM(remaining_session)) as pending_session,SUM(no_of_sessions) as total_sessions FROM online_consultation WHERE uid = '". $uid ."' AND payment_status = 'success' ORDER BY id DESC");
	echo "SELECT tid,remaining_session,no_of_sessions,therapy_name FROM online_consultation WHERE uid = '". $uid ."' AND tid = '". $therapist_id ."' AND no_of_sessions = '". $package ."'  AND payment_status = 'success' ORDER BY id DESC";
	$userdetails = $wpdb->get_results("SELECT tid,remaining_session,no_of_sessions,therapy_name FROM online_consultation WHERE uid = '". $uid ."' AND tid = '". $therapist_id ."' AND no_of_sessions = '". $package ."'  AND payment_status = 'success' ORDER BY id DESC");
	foreach($userdetails as $ud){
		$data[$ud->tid][$ud->therapy_name]['remaining_session'] += $ud->remaining_session;
		$data[$ud->tid][$ud->therapy_name]['no_of_sessions'] += $ud->no_of_sessions;
		$usrdet = get_user_meta($ud->tid,0);
		$data[$ud->tid][$ud->therapy_name]['therapist_name'] = $usrdet['first_name'][0] ." ".$usrdet['last_name'][0];
	}
	return $data;
	
}
function get_therapistpending_onlinesession($uid,$therapist_id){
	global $wpdb;
	$data = array();
	$userdetails = $wpdb->get_results("SELECT tid,remaining_session,no_of_sessions,therapy_name FROM online_consultation WHERE  tid = '". $therapist_id ."'  AND no_of_sessions > 1 AND remaining_session > 0 AND payment_status = 'success' ORDER BY id DESC");
	foreach($userdetails as $ud){
		$data[$ud->tid][$ud->therapy_name]['remaining_session'] += $ud->remaining_session;
		$data[$ud->tid][$ud->therapy_name]['no_of_sessions'] += $ud->no_of_sessions;
		$usrdet = get_user_meta($ud->tid,0);
		$data[$ud->tid][$ud->therapy_name]['therapist_name'] = $usrdet['first_name'][0] ." ".$usrdet['last_name'][0];
	}
	return $data;
	
}
 
function saveOCData($uid,$firstname,$email,$tid,$tfirst_name,$temail,$action,$package,$productinfo,$amount,$status,$txnid,$sendemail,$umobile,$tmobile,$freemins,$coupon,$book_date_time,$tpid,$mihpayid=''){
	
	global $wpdb;
	
	$date = date("Y-m-d H:i:s");
	$data = array( 
		'uid' => $uid,
		'uname'	=> $firstname,
		'uemail' => $email,
		'tid' => $tid,
		'tname'	=> $tfirst_name,
		'temail' => $temail,
		'action' => $action,
		'package' => $package,
		'therapy_name' => $productinfo,
		'amount' => $amount,
		'waiting' => 1,
		'payment_status' => $status,
		'payment_txnid' => $txnid,
		'payuid' => $mihpayid,
		'coupon_code' => $coupon,
		'created_date' => $date,
		'modified_date' => $date
	);
	/* if($package != ""){
		$pkgname = explode(",",$package); */
		$data['package'] = $package;
	//}	
	if($freemins != ""){
		$sessionarr = explode(",",$freemins);
	
		$no_of_sessions = explode(" ", $sessionarr[1]);
		$data['no_of_sessions'] = 1;
		
		$data['pkgdescription'] = $sessionarr[2];
		$data['session_duration'] = $sessionarr[4];
		$session_duration = $sessionarr[4] + 5;
		$data['busy_date'] = date('Y-m-d H:i:s', strtotime("+". $session_duration . " mins"));
		if($status == 'success'){
			//$data['remaining_session'] = $data['no_of_sessions'] - 1;
			$data['remaining_session'] = 1;
		}	
	}	
	$busy_date = $data['busy_date'];
	if($action == 'book_latercall'){
		$data['action'] =  "call";
	}elseif($action == 'book_laterchat'){
		$data['action'] =  "chat";	
	}	
	
	$isexist = $wpdb->get_var("SELECT count(*) FROM `online_consultation` WHERE payment_txnid = '$txnid'");
	if($isexist == 0){
		$wpdb->insert("online_consultation",$data);
		
		$lastid = $wpdb->insert_id; 
		
		$wpdb->insert("call_chat_history",array('oc_id'=>$lastid,'tid' => $tid,'uid' => $uid));
		update_field('oc_invoice_number',$lastid,'option');
		if($status == 'success'){
			$data = array('oc_id'=>$lastid,'uid' => $uid,'tid' => $tid,'therapy_name' => $productinfo ,'action' => $data['action'],'created_date' => $date);
			$wpdb->insert("online_session_details",$data); 
		}
		
		
		if($status == 'success' ){
			$session_count = get_post_meta($tpid, 'paid_session_count',true);
			if($session_count > 0){
				update_post_meta($tpid,'paid_session_count', $session_count-1);
			}
		}
		
		if(strpos($firstname, "@") !== false){
		    $uname = explode('@', $firstname)[0];
		} else{
		    $uname = $firstname;
		}
		if($action == 'call'  && $status == 'success' && $productinfo != 'Appointment'){
		//	$result = oc_assign_masked_number_to_user($temail,$email);
			$link = site_url()."/accept-reject?ocid=".$lastid; 
			$cgenerated_url = generateBitlyURL($link)['data']['url'];
			$tmsg = "Your client ".$uname." has taken ".$sessionarr[2]." and is waiting for a session with you. Please click on link given to accept the session with client within the next 2 minutes on thriive.in";
			//$string_to_encrypt=$tid;
			$password="password"; 
			$encrypted_ocid = openssl_encrypt($lastid,"AES-128-ECB",$password);
			$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
			$uidmobile = get_user_meta($uid,'mobile',true);
			$uidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $uidmobile);
			$tidmobile = get_user_meta($tid,'mobile',true);
			$tidmobile = preg_replace('/(?<=\d)\s+(?=\d)/', '', $tidmobile);
			$curl = curl_init();
			$data = array("k_number"=> "+917411782154","agent_number"=> '+91'.$tidmobile,"customer_number"=>'+91'.$uidmobile,"caller_id"=> "+918048166487","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> ($sessionarr[4])));
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/makecall',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>json_encode($data),
			  CURLOPT_HTTPHEADER => array(
				'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
				'x-api-key: lF4vZUSwA8Jab0ABWsITtxwM1ZwL6h2jZDdCTX30',
				'Content-Type: application/json'
			  ),
			));

			$response = curl_exec($curl);
			
			curl_close($curl);
			$callresp = json_decode($response,true);
			//print_r($callresp);
		
	
			if(!empty($callresp)){
				if($callresp['success']['status'] == 'success'){
					$connected = 1; 
					$uid_accept = 1;
					$tid_accept = 1;
					$call_id = $callresp['success']['call_id'];
					$remaining_session =0;

				}
			} 
			$wpdb->query("UPDATE online_consultation SET tid_accept='".$tid_accept."',uid_accept='".$uid_accept."',connected='".$connected."',remaining_session = '".$remaining_session."',waiting=1,email_sms=1,call_id = '".$call_id."',busy_date = '".$busy_date."' WHERE id='".$lastid."'");
			//$decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$password);
			 
			$tempid = '1007507627626666229';
			sendSMS($tidmobile,$tmsg,$tempid);
		//	sendSMS('8850630321',$tmsg,$tempid);
			$tsubject = "New Session from ".$uname." -".$lastid;
		    $tmsg = "Hello ".$tfirst_name.",<br/>Your client ".$uname." has taken ".$sessionarr[2]." and is waiting for a session with you.<br/>Call needs to begin within 2 minutes<br/>Their payment is completed for ".$sessionarr[2]."<br/><br/> Please Note:<br/>There is no auto disconnect for calls. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.";
			
			$password="password";
			$encrypted_ocid = openssl_encrypt($lastid,"AES-128-ECB",$password);
			$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
			//$tmsg .= site_url()."/accept-reject?ocid=".$lastid; 
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
		    //sendEmailWithInvoice($temail, $tsubject, $tmsg, $uid, 'therapist', 'oc_invoice.php');
		    sendEmail($temail, $tsubject, $tmsg);		
			
			//sendSMS('8850630321',$tmsg,$tempid);
		}
		if(($action == 'chat' || $action == 'book_laterchat') && $status == 'success'){
			/*$chat_data = array(
				'to_user_id' => $tid,
				'from_user_id' => $uid,
				'chat_message' => 'hello',
				'oc_id' => $lastid
			);
			$wpdb->insert("chat_message_details",$chat_data);*/
			/* $chatblock = $wpdb->get_row("SELECT * FROM chat_block_users WHERE to_user_id = '".$tid."' AND from_user_id = '".$uid."'");
			if($chatblock){
				$wpdb->query("UPDATE chat_block_users SET block_status = 0,complete_status=0,incomplete_status=0,oc_id = '".$lastid."' WHERE to_user_id = '".$tid."' AND from_user_id = '".$uid."'");
				$wpdb->query("UPDATE chat_block_users SET block_status = 0,complete_status=0,incomplete_status=0,oc_id = '".$lastid."' WHERE to_user_id = '".$uid."' AND from_user_id = '".$tid."'");
			} else {
				$chat_block_data = array(
					'to_user_id' => $tid, 
					'from_user_id' => $uid,
					'oc_id' => $lastid,
					'block_status' => 0,
					'complete_status'=>0
				);
				$wpdb->insert("chat_block_users",$chat_block_data);
			}	
			 */
			$tmsg = "Your client ".$uname." has taken ".$sessionarr[2]." and is waiting for a response from you. Please login to your account and start online chat with the client on thriive.";
			/* if($_GET['t'] == "nutritionist"){
				$tmsg .= "Goals :".$goals[$last_user['goals']];
				if($last_user['height'] != ""){
					$tmsg .= ". Their BMI index is  ".round($last_user['bmi'],2).". Their Height is  ".$last_user['height'].". Their Weight is  ".$last_user['weight'].". DOB :".$last_user['dob'];
				}
				if($last_user['medcon'] != ""){
					$tmsg .= "<br/> Medical Condition : ";
					$medconarr =  explode(",",$last_user['medcon']);
					foreach($medconarr as $ma){
						$tmsg .= $medcon[$ma];
						
					}
					
				}	
				$tmsg .= "Love and Light,Team Thriive";
			} */
			$tempid = '1007102003722838536';
			sendSMS($tmobile,$tmsg,$tempid);
			sendSMS('8369415594',$tmsg,$tempid);
			$tsubject = "New Session from ".$uname." -".$lastid;
			
		    $tmsg = "Hello ".$tfirst_name.",<br/>Your client ".$uname." is waiting for a session with you.<br/><br/>Chat needs to begin within 2 minutes<br/>Their payment is completed for ".$sessionarr[2]."<br/><br/>Connect NOW with the client on your dashboard<br/><br/> Please Note:<br/>There is no auto complete for chat. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.";
		    //sendEmailWithInvoice($temail, $tsubject, $tmsg, $uid, 'therapist', 'oc_invoice.php');
			/* if($_GET['t'] == "nutritionist"){
				$tmsg .= "<br/><br/>Goals :".$goals[$last_user['goals']]."<br/>";
				if($last_user['height'] != ""){
					$tmsg .= "Their BMI index is  ".round($last_user['bmi'],2)."<br/><br/>Their Height is  ".$last_user['height']."<br/><br/> Their Weight is  ".$last_user['weight']."<br/><br/>DOB :".$last_user['dob'];
				}
				if($last_user['medcon'] != ""){
					$tmsg .= " Medical Condition : ";
					$medconarr =  explode(",",$last_user['medcon']);
					foreach($medconarr as $ma){
						$tmsg .= $medcon[$ma]."<br/>";
						
					}
					
				}	
			}
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive"; */
		    sendEmail($temail, $tsubject, $tmsg);
		}
		if(($action == 'book_latercall' || $action == 'book_laterchat'  || $action == 'videocall' || $productinfo == 'Appointment') && $status == 'success'){
			//$split_datetime = explode('_', $book_date_time);
			if($action == 'book_latercall'){
				$baction = "call";
			}elseif($action == 'book_laterchat'){
				$baction = "chat";	
			} else {
				$baction = "videocall";
			}	
			$split_datetime = explode(",",$book_date_time);
			$timestamp = strtotime($split_datetime[1]) + 300*60;
			$endtime = date('H:i:s', $timestamp);
			$video_data = array(
				'oc_id' => $lastid,
				'tid' => $tid,
				'uid' => $uid,
				'call_time' => '40',
				'channel' => rand().time(),
				'action' => $baction,
				'book_date' => date("Y-m-d",strtotime($split_datetime[0])),
				'book_time' => date("H:i:s",strtotime($split_datetime[1])),
				'end_time' => $endtime == '00:00:00'?'23:59:59':$endtime,
				'page_id' => 0,
				'status' => 0
			);
			if($baction == "videocall" ||  $baction == "call" || $baction == "chat"){
				$video_data['channel'] = rand().time();
				create_room($video_data['channel']);
			}	
			$wpdb->insert("oc_video_call",$video_data);
			$tmsg = "Your client ".$uname." has taken  taken a slot for video call session on ".date("dS M Y",strtotime($split_datetime[0]))." at ".date("h:i a",strtotime($split_datetime[1])).". Please login to your account and start online video call with the client on thriive.in";
			
			$tempid = '1007025056493402663';
		//	$tmsg .= site_url()."/accept-reject?tid=".$encrypted_tid.'&uid='.$encrypted_uid.'&ocid='.$lastid;
			sendSMS($tmobile,$tmsg,$tempid);
			$tsubject = "Client has taken a video call session on ".$split_datetime[0]." at ".$split_datetime[1];
		    $tmsg = "Hello ".$tfirst_name.",<br/>Your client ".$uname." has taken a video call session  on ".$split_datetime[0]." at ".$split_datetime[1].".<br/><br/>Please Note:<br/>There is no auto complete for video call. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.";   
			$tmsg .= "<br/><br/>Love and Light,<br/>Team Thriive";
		    sendEmail($temail, $tsubject, $tmsg);
		}
		if($sendemail == "yes" && $status == 'success'){
			
			if($action == 'call' && ($productinfo == 'all-page' || $productinfo == 'cosmic-astrology' || $productinfo == 'numerology' || $productinfo == 'tarot-card-reading' || $productinfo == 'angel-reading' )){
				
				$umsg = "Your session is initiated."; 
				if($data['no_of_sessions'] > 1){
					$umsg .= "You have used 1 session for ".$package .'. ';
				}
				$umsg = "Your payment is successful for  ".$package." . You will get a call from ".$tfirst_name." within 24 hrs so please keep your phone line free.";
			//	$umsg .= site_url()."/accept-reject?tid=".$encrypted_tid.'&uid='.$encrypted_uid.'&ocid='.$lastid;
				 
				$tempid = '1007536510685468677';
				sendSMS($umobile,$umsg,$tempid);
				$subject = "Your payment is successful";
			    $msg = "Hello,<br/><br/>Your payment is successful for ".$package." .<br/><br/>You will get a call from ".$tfirst_name." within 24 hrs so please keep your phone line free..<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
				sendEmailWithInvoice($email, $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
				sendEmailWithInvoice('manishj@thriive.in', $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
			} 
			if($action == 'call' && ($productinfo == 'counseling-consulting' || $productinfo == 'life-coach' || $productinfo == 'meditation')){
				$umsg = "Your payment is successful for  ".$package." . You will get a call from ".$tfirst_name." within 24 hrs so please keep your phone line free.";
				$tempid = '1007536510685468677';
				$password="password";
				$encrypted_tid = openssl_encrypt($tid,"AES-128-ECB",$password);
				$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
				//$umsg .= site_url()."/accept-reject?tid=".$encrypted_tid.'&uid='.$encrypted_uid.'&ocid='.$lastid;
				sendSMS($umobile,$umsg,$tempid);
				$subject = "Your payment is successful";
			    $msg = "Hello,<br/><br/>Your payment is successful for ".$package." .<br/><br/>Please keep your phone line free. You will receive a call from ".$tfirst_name." soon.<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
				sendEmailWithInvoice($email, $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
				sendEmailWithInvoice('manishj@thriive.in', $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
			} 
			if($action == 'chat'){
				$umsg = "Your payment is successful for  ".$package.". To connect with ".$tfirst_name." click on start chat to connect with an expert on thriive.in";
				$tempid = '1007671932057109060';       
				$password = "password";
				$encrypted_tid = openssl_encrypt($tid,"AES-128-ECB",$password);
				$encrypted_uid = openssl_encrypt($uid,"AES-128-ECB",$password);
				//$umsg .= site_url()."/accept-reject?tid=".$encrypted_tid.'&uid='.$encrypted_uid.'&ocid='.$lastid;
				sendSMS($umobile,$umsg,$tempid);
				$subject = "Your payment is successful";
			    $msg = "Hello,<br/><br/>Your payment is successful for ".$package.". To connect with ".$tfirst_name." click on start chat to connect with an expert.<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
				sendEmailWithInvoice($email, $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
				sendEmailWithInvoice('manishj@thriive.in', $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
			}
			//$productinfo .=" (Changed Therapist)"; 
			$alertmsg = $uname." connected via ".$action." to ".$tfirst_name." for ".$sessionarr[2]." and for therapy ".$productinfo." on thriive"; 
			if(($action == 'book_latercall' || $action == 'book_laterchat' || $action == 'videocall')){
				$umsg = "Your payment is successful. Your video call session is taken on ".date("dS M Y",strtotime($split_datetime[0]))." at ".date("h:i a",strtotime($split_datetime[1]));
				sendSMS($umobile,$umsg);
				$subject = "Your payment is successful and your video call session is taken on ".date("dS M Y",strtotime($split_datetime[0]))." at ".date("h:i a",strtotime($split_datetime[1]));
			    $msg = "Hello,<br/><br/>Your payment is successful. To connect on video call with ".$tfirst_name." will share a link to connect with a therapist at your schedule time.<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
				sendEmailWithInvoice($email, $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
				sendEmailWithInvoice('manishj@thriive.in', $subject, $msg, $uid, 'subscriber', 'oc_invoice.php');
				$alertmsg = $uname." connected via video call  to ".$tfirst_name." on ".date("dS M Y",strtotime($split_datetime[0]))." at ".date("h:i a",strtotime($split_datetime[1]))." on thriive";
			}
			
			sendEmail('accountmanager2@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			sendEmail('thriivefive@gmail.com','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			sendEmail('accountmanager4@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg); 
			sendEmail('accountmanager6@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			sendEmail('admin@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			sendEmail('support@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			sendEmail('manishj@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			//sendEmail('accountmanager1@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			// sendSMS('9702917993',$alertmsg);
			//sendSMS('9820686971',$alertmsg);
			$tempid = "1007921355648742887"; 
			sendSMS('9930502459',$alertmsg,$tempid);
			//sendSMS('8850630321',$alertmsg,$tempid);
			sendSMS('8369415594',$alertmsg,$tempid);
			sendSMS('9821717700',$alertmsg,$tempid);
			sendSMS('9022107852',$alertmsg,$tempid);
			sendSMS('9137582401',$alertmsg,$tempid);
			sendSMS('7506765361',$alertmsg,$tempid);
		} elseif($sendEmail == "no") {
			$subject = "Payment Failed";
			$msg = "Payment has been failed of ".$uname." for package ".$package;
			sendEmail('manishj@thriive.in',$subject,$msg);
		}
	}
}




function create_room($room_id){
global $wpdb;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://vapi.knowlarity.com/v1/apis/auth/token?scope=API',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'refresh_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im1hbmlzaGpAdGhyaWl2ZS5pbiIsInByb2ZpbGVfaWQiOjEsImFjY291bnRfaWQiOjIwNiwiaWF0IjoxNjE5Nzg4MDU5fQ.IyRFtB3GSIaQ5NOn-hgXCYRBDqzQPuWk5R1fctHz_h0',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: u1KsTH3zwr0rh2z7x1Wz2fAZToirNHh6c2ibqT58',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


$response = json_decode($response,true);
//print_r($response);

if($response['status']=='success'){
	$token = $response['access_token'];
} 


if($token){
	$curl = curl_init();
	$password = 123456;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://vapi.knowlarity.com/v1/apis/room?scope=API',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'project_id=294&roomname='.$room_id.'&password=123456',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: u1KsTH3zwr0rh2z7x1Wz2fAZToirNHh6c2ibqT58',
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: '.$token
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$created_room_id = json_decode($response,true);
$created_room_id = $created_room_id['data']['id'];

$query = "UPDATE oc_video_call SET page_id=$created_room_id WHERE channel=$room_id";
$wpdb->query($query);
$cemail = 'akash@thriive.in';
$csub = 'video';
$cbody = $response.$query;

sendEmail($cemail,$csub,$cbody);
//echo $response;
}
}

















function getOCData($id){
	global $wpdb;
	$result = $wpdb->get_row("SELECT * FROM `online_consultation` WHERE id=$id",OBJECT);
	return $result;
}

function cron_after_call_api_a95e14d1() {
    global $wpdb;
	$last_id = $wpdb->get_results("SELECT id FROM webhook_after_call ORDER BY id DESC LIMIT 1");
    $handle = curl_init();
	$url = "http://thriivecrm.com/thriive-api/thriive_api.php/?tag=connecting_call&id=".$last_id[0]->id;
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($handle);
	curl_close($handle);
	$decode = json_decode($output);
	$uid_array = array(1538,2866,13196,1342,13136,23830,15004,15006,21067,25051,24515,22618,15240,14630,4399,13569,8982,7922,14179,15222,24641,27748,22366,21793,21643,19939,13567,14903,15434,19860,14676,15119,2843,992,13039,24033,8796,21952,17752,20416,14749,24407,18644,21245,19533,23780,17723,18105,15586,1721,993,1893,17858,19370,14717,14336,15518,17848,15680,18770,15940,18008,2553,25264,24374,23896,23291,25616,25651,25302,16429,21421,21238,25317,24802,25463,24632,24123,21750,25043,21407,20689,22491,24376,18149,19902,19371,17959,19004,18091,18933,24503,24171,23905,24031,24034,22923,8004,22953,22235,22205,16626,4476,18081,17540,16477,21539,17702,26391,22918,22648,23463,23061,18929,22690,22480,21417,20143,15291,15673,13179,6843,689,18556,9406,16709,648,2869,23963,2000,3993,24865,15203,17149,17891,950,14249,7006,21388,24937);
	if($decode->status == "success"){
		foreach($decode->data as $d){
	    	$wpdb->insert("webhook_after_call",array(
				"id" => $d->id,
				"uid" => $d->uid,
				"caller_number" => $d->caller_number,
				"call_starttime_sec" => $d->call_starttime_sec,
				"call_endtime_sec" => $d->call_endtime_sec,
				"call_duration" => $d->call_duration,
				"call_status" => $d->call_status,
				"event" => $d->event,
				"file_url" => $d->file_url,
				"received_by" => $d->received_by,
				"feedback" => $d->feedback,
				"comments" => $d->comments,
				"created_date" => $d->created_date,
				"time" => $d->time
			));
			$caller = get_users(array(
	    		'meta_key'     => 'mobile',
	    		'meta_value'   => $d->caller_number,
	    		'meta_compare' => '=',
			));
			if($caller){
				if(in_array($caller[0]->data->ID,$uid_array)){
					$cemail = $caller[0]->data->user_email;
					$cmobile = $caller[0]->countryCode.$caller[0]->mobile;
					$ctid = $caller[0]->post_id;
					$cslug = get_post($ctid)->post_name; 
					$call_url = get_site_url()."/therapist-account-dashboard";
					$cgenerated_url = generateBitlyURL($call_url)['data']['url'];
					$cmsg = "Your valuable feedback will help us serve you better! Click here ".$cgenerated_url." to share your feedback.";
					sendSMS($cmobile,$cmsg);
					$csub = "Your feedback is important to us";
					$cbody = "Hello ".$caller[0]->first_name.",<br/><br/>We hope you are enjoying using our platform.<br/><br/>To serve you and our users better, we are constantly working on the constructive feedback we receive from our experts and users.<br/><br/>We would love to hear from you as well! Please <a href='".$call_url."'>CLICK HERE</a> to share your valuable feedback.<br/><br/>Love and Light,<br/>Team Thriive";
					sendEmail($cemail,$csub,$cbody);
					if($d->received_by != 'null'){
						$received_by = json_decode($d->received_by);
						$receiver = get_users(array(
				    		'meta_key'     => 'mobile',
				    		'meta_value'   => substr($received_by->_rr[0]->_na,2),
				    		'meta_compare' => '=',
						));
						if($receiver){
							$remail = $receiver[0]->data->user_email;
							$rmobile = $received_by->_rr[0]->_na;
							$rev_url = get_site_url()."/review-form?t=".$cslug;
							$rgenerated_url = generateBitlyURL($rev_url)['data']['url'];
							$rmsg = "We want to serve you better & would love to hear from you. Click Here ".$rgenerated_url." to share your valuable feedback.";
							sendSMS($rmobile,$rmsg);
							// $rsub = "Got more questions? Talk to your expert again";
							// $rbody = "Hello,<br/><br/>We are sure you got good insights about your life, but sometimes everyone needs a little more guidance.<br/><br/>For more clarity continue your consultation further.<br/><br/>Talk to $receiver[0]->first_name now!<br/><br/>A combination of different types of prediction like tarot reading with astrology or numerology can give you more specific answers.<br/><br/>Select a new expert now!<br/><br/>Love & Light<br/><br/>Team Thriive";
							$rsub = "Your feedback is important to us";
							$rbody = "Hello,<br/><br/>We want to serve you better & would love to hear from you.<br/><br/><a href='".$rev_url."'>Click Here</a> to share your valuable feedback & insights on your experience of talking to an expert on Thriive.<br/><br/>Continue your consultation further.<br/>Talk to ".$caller[0]->first_name." now!<br/><br/>Love & Light,<br/>Team Thriive";
							sendEmail($remail,$rsub,$rbody);					
						}
					}
				}
			}			
		}
	}
}
add_action( 'after_call_api', 'cron_after_call_api_a95e14d1', 10, 0 ); 
function getTherapistConsultStatus($tid,$created_date=''){ 
	global $wpdb;
	if($created_date == ''){ 
		$currentdate = date("Y-m-d");
	} else {
		$currentdate = $created_date;
	}
	
	
	$consultrow = $wpdb->get_results("SELECT * FROM online_consultation WHERE tid = '". $tid ."' AND DATE(created_date) = '".$currentdate."' AND action='call'");
	
	$consultrow1 =0;
	if($consultrow){
		foreach($consultrow as $cr){
			/* if($cr->call_id != ''){
				$knowrow = $wpdb->get_row("SELECT * FROM knowlarity_after_call WHERE call_uuid = '". $cr->call_id ."'");
				if(!$knowrow){
					$consultrow1->connected = 1;
				} else {
					$consultrow1 = 0;
				}
			} else { */
				$session_duration = $cr->session_duration + 5;
				$currenttime = date('H:i:s', strtotime($cr->busy_date ."+". $session_duration . " mins"));
				
				$consultrow1 = $wpdb->get_row("SELECT * FROM online_consultation WHERE tid = '". $tid ."' AND DATE(created_date)  = '".$currentdate."' AND TIME(busy_date) BETWEEN '". date('H:i:s') ."' AND '".$currenttime."' AND payment_status = 'success' AND action='call' ");
				if($consultrow1 > 0){
					return $consultrow1;
				} else {
					 $consultrow1 =0;
				}
			//}	AND remaining_session > 0
		} 
	}  
	return $consultrow1;
}
function getTherapistConsultStatus1($tid,$id){ 
	global $wpdb;
	if($created_date == ''){ 
		$currentdate = date("Y-m-d");
	} else {
		$currentdate = $created_date;
	}
	
	
	$consultrow = $wpdb->get_results("SELECT * FROM online_consultation WHERE tid = '". $tid ."' AND id= '".$id."' ");
	$consultrow1 =0;
	if($consultrow){
		
		foreach($consultrow as $cr){
			$currentdate = $cr->created_date; 
			$session_duration = $cr->session_duration + 5;
			$currenttime = $cr->busy_date;
			
			$consultrow1 = $wpdb->get_var("SELECT COUNT(*) FROM online_consultation WHERE tid = '". $tid ."' AND (busy_date BETWEEN '". date('Y-m-d H:i:s') ."' AND '".$currenttime."') AND payment_status = 'success' AND action='call' AND connected=1 ORDER BY busy_date DESC");
		
			/* if($consultrow1 > 0){
				return $consultrow1;
			} else {
				 $consultrow1 =0;
			} */
			
		} 
	}  
	return $consultrow1;
}
function getTherapistChatStatus($tid,$created_date=''){ 
	global $wpdb;
	//$currentdate = date("Y-m-d");
	if($created_date == ''){
		$currentdate = date("Y-m-d");
	} else {
		$currentdate = $created_date;
	}
	$crow = 0;
	$consultrow = $wpdb->get_row("SELECT * FROM online_consultation WHERE tid = '". $tid ."' AND DATE(created_date) = '".$currentdate."' AND action='chat' AND remaining_session > 0");	
	if($consultrow > 0){ 
		$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM chat_block_users WHERE (to_user_id = '".$tid ."' OR from_user_id = '". $tid ."')  AND (complete_status = 1 || incomplete_status = 1)");
		$session_duration = $consultrow->session_duration + 5;
		if($chatrow){	
			$currenttime = date('H:i:s', strtotime($consultrow->busy_date ."+". $session_duration . " mins"));
			$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM online_consultation WHERE tid = '". $tid ."' AND DATE(created_date)  = '".$currentdate."' AND TIME(busy_date) BETWEEN '". date('H:i:s') ."' AND '".$currenttime."' AND payment_status = 'success' AND action='chat' AND remaining_session > 0");
			if($chatrow){	
				$crow = 1;
			}	
		} 
	}
	return $crow;
}
function getTherapistStatus($post_id=''){ 
	$current_day = date("l"); 
	$current_time = date("H:i:s");
	$status = 'Busy';
	if($post_id != ""){
		$availability = get_post_meta($post_id,'availability',true);
			
		for($k=0;$k < $availability;$k++) {
			$timecnt = get_post_meta($post_id,'availability_'.$k.'_time',true);
			$all_days = get_post_meta($post_id,'availability_'.$k.'_all_days',true);
			$day = get_post_meta($post_id,'availability_'.$k.'_day',true);
				
			if($all_days){
				for($j=0;$j < $timecnt;$j++) { 
					$start_time = get_post_meta($post_id,'availability_'.$k.'_time_'.$j.'_start_time',true);
					$end_time = get_post_meta($post_id,'availability_'.$k.'_time_'.$j.'_end_time',true);
					
					$starthr = date('H',strtotime($start_time));
					//if($starthr < 13){
						if (strtotime($current_time) >= strtotime($start_time) && strtotime($current_time) <= strtotime($end_time)){
							$status = 'Available';
						}
					/* }
					if($starthr > 13){
						if ($current_time <= $end_time){
							$status = 'Available';
						}
					} */
				}	
				
			} else {
				for($j=0;$j < $timecnt;$j++) { 
					$start_time = get_post_meta($post_id,'availability_'.$k.'_time_'.$j.'_start_time',true);
					$end_time = get_post_meta($post_id,'availability_'.$k.'_time_'.$j.'_end_time',true);
					$starthr = date('H',strtotime($start_time));
					/* if($starthr < 13){ */
						if ($current_day == $day && (strtotime($current_time) >= strtotime($start_time) && strtotime($current_time) <= strtotime($end_time))){
							$status = 'Available';
						}
					/* }
					if($starthr > 13){
						if ($current_day == $day && $current_time <= $end_time){
							$status = 'Available';
						}
					} */
				}
			}
		}	
	} else {  	
	
		/* $availability = get_field('availability'); 
		$status = 'Busy';
			
		foreach ($availability as $a) { 
			if($a['all_days']){
				foreach($a['time'] as $t){
					$starthr = date('H',strtotime($t['start_time']));
					if($starthr < 13){
						if ($current_time >= $t['start_time'] && $current_time <= $t['end_time']){
							$status = 'Available';
						}
					}
					if($starthr > 13){
						if ($current_time <= $t['end_time']){
							$status = 'Available';
						}
					}
					
				}
			} else {
				foreach($a['time'] as $t){
					$starthr = date('H',strtotime($t['start_time']));
					if($starthr < 13){
						if ($current_day == $a['day'] && ($current_time >= $t['start_time'] && $current_time <= $t['end_time'])){
							$status = 'Available';
						}
					}
					if($starthr > 13){
						if ($current_day == $a['day'] && $current_time <= $t['end_time']){
							$status = 'Available';
						}
					}
				}
			}
		} */
	}
	return $status;
} 

add_action('admin_menu', 'online_consultation_dashboard_admin_menu');
function online_consultation_dashboard_admin_menu() {
    add_submenu_page('index.php', 'Online Consultation Dashboard Page', 'Online Consultation', 'manage_options', 'onlineconsultationdashboard', 'getOnlineConsultation', 1);
    add_submenu_page('index.php', 'Free Consultation Dashboard Page', 'Free Consultation', 'manage_options', 'freeonlineconsultationdashboard', 'getFreeOnlineConsultation', 1);
    add_submenu_page('index.php', 'Inprogress Online Consultation', 'Inprogress Online Consultation', 'manage_options', 'inprogressonlineconsultation', 'getInprogressConsultation', 1);
	
    add_submenu_page('index.php', 'User Dashboard Page', 'User Dashboard', 'manage_options', 'ocuserdashboard', 'getOCUser', 1);
    add_submenu_page('index.php', 'Free Session Count by Therapist', 'FS Count', 'manage_options', 'fsbytdashboard', 'getFSCByTherapist', 1);
} 
function getOnlineConsultation(){
	global $wpdb;
	$posts_per_page = 20;
	$start = 0;
	$paged = $_GET['paged'] ? $_GET['paged'] : 1;
	$sdval = $_GET['sd'];
	$edval = $_GET['ed'];
	$sdate = ($sdval != "")?$sdval:"";
	$edate = ($edval != "")?$edval:"";
	$sval = $_GET['s'];
	$mval = $_GET['m'];
	$start = ($paged-1)*$posts_per_page;
	
	$failed_count = $wpdb->get_var("SELECT count(*) FROM `online_consultation` WHERE payment_status = 'failed' GROUP BY payment_txnid");
	$success_count = $wpdb->get_var("SELECT count(*) FROM `online_consultation` WHERE payment_status = 'success' GROUP BY payment_txnid");
	$sql = "SELECT DISTINCT(payment_txnid)  as pytx FROM `online_consultation` WHERE 1 ";
	if($mval != ""){
		$sql .= " AND payment_status = '". $mval."'";
	} else {
		$sql .= " AND payment_status = 'success'";
		
	} 
	if($sdval != "" && $edval != ""){
		$sql .= " AND DATE(created_date) BETWEEN '".$sdval."' AND '".$edval."'";
		
	}
	if($sval != "" ){
		$sql .= " AND uname LIKE '%".$sval."%' OR uemail LIKE '%".$sval."%' OR package LIKE '%".$sval."%' OR therapy_name LIKE '%".$sval."%' OR amount LIKE '%".$sval."%' OR payment_txnid LIKE '%".$sval."%'";
	}  

	 $sql .= " ORDER BY payment_txnid DESC";
	$oc_count = count($wpdb->get_results($sql));
	
	$total_pages = ceil($oc_count / $posts_per_page);
	$nonce = wp_create_nonce( 'exp_oc_session_data' );
	
	
	$inputval = ($sval != "")?$sval:"";
	$bstatusval = ($mval == 'success')?"selected":"";
	$nobstatusval = ($mval == 'failed')?"selected":"";
	
	$sql = "SELECT * FROM `online_consultation` WHERE 1 ";
	if($mval != ""){
		$sql .= " AND payment_status = '". $mval."'";
	}  else {
		$sql .= " AND payment_status = 'success'";
		
	} 
	if($sdval != "" && $edval != ""){
		$sql .= " AND DATE(created_date) BETWEEN '".$sdval."' AND '".$edval."'";
		
	}
	if($sval != "" ){
		$sql .= " AND uname LIKE '%".$sval."%' OR uemail LIKE '%".$sval."%' OR package LIKE '%".$sval."%' OR therapy_name LIKE '%".$sval."%' OR amount LIKE '%".$sval."%' OR payment_txnid LIKE '%".$sval."%'";
	}  
	/* if($mval == "" && $sdval == "" && $edval == "" && $sval == "" ) {
		$sql = "SELECT * FROM `online_consultation` ";
	} */
	$sql .= " ORDER BY id DESC LIMIT $start,$posts_per_page";   
	$result = $wpdb->get_results($sql,OBJECT);//getConnectedData
	$html = "<div class='wrap'><h1 class='wp-heading-inline'>".esc_html( get_admin_page_title() )."</h1><a href='admin.php?page=onlineconsultationdashboard&action=exp_oc_session_data&sd=".$sdval."&ed=".$edval."&s=".$sval."&m=".$mval."&_wpnonce=$nonce' class='page-title-action'>Export to CSV</a><hr class='wp-header-end'>";
	$html .= "<ul class='subsubsub'><li class='all'>Total Consultation Count: <span class='count'>(".$oc_count.")</span></li> | <li class='all'>Total Success Count: <span class='count'>(".$success_count."/".$oc_count.")</span></li> | <li class='all'>Total Failed Count: <span class='count'>(".$failed_count."/".$oc_count.")</span></li> </ul>";
	$html .= "<table class='wp-list-table widefat fixed striped pages'>";
	$html .= "<thead><tr><td>User Name</td><td>User Email</td><td>User Mobile</td><td>Action</td><td>Chat Menu</td><td>Therapist Response</td><td>User Response</td><td>Remaining Session </td><td>Booked Therapist</td><td>Changed Therapist</td><td>Therapist Mobile</td><td>Total Therapist Change Count</td><td>Package</td><td>Therapy Name</td><td>Amount</td><td>Call/Chat Status</td><td>Payment Status</td><td>Txid</td><td>Payu ID</td><td>Created Date</td><td>Call / Chat  Time </td><td>Duration </td></tr></thead>";
	$html .= "<form id='fsd-filter' action='".esc_html(admin_url('index.php'))."' method='get'><p class='search-box'><label class='screen-reader-text' for='fsd-search-input'>Search Posts:</label><input type='hidden' value='onlineconsultationdashboard' name='page' /><input type='search' id='fsd-search-input' name='s' value='".$inputval."'><input type='submit' id='search-submit' class='button' value='Search'></p><div class='tablenav top'><div class='alignleft actions'><label for='filter-by-status' class='screen-reader-text'>Filter by Status</label><select name='m' id='filter-by-status'><option value=''>All status</option><option value='success' ".$bstatusval.">Success</option><option value='failed' ".$nobstatusval.">Failed</option></select></div><div class='alignleft actions'><input type='submit' name='filter_action' id='fsd-query-submit' class='button' value='Filter'></div><p><input type='date' name='sd' value='".$sdate."'/><input type='date' name='ed' value='".$edate."'/><input type='submit' name='date_filter_action' id='fsd-date-submit' class='button' value='Date Filter' /></p>";
	$paytxarr = array();
	foreach($result as $r){
		
		if(!in_array($r->payment_txnid,$paytxarr) || $r->payment_txnid == ''){
			$paytxarr[] = $r->payment_txnid;
			$umobile = get_user_meta($r->uid, 'mobile', true);
			$tmobile = get_user_meta($r->tid, 'mobile', true);
			$html .= "<tr>";
			$html .= "<td>".$r->uname."</td>";
			$html .= "<td>".$r->uemail."</td>";
			$html .= "<td>".$umobile."</td>";
			$html .= "<td>".$r->action."</td>";
			if($r->action == 'chat'){
				$chat_menu = $wpdb->get_row("SELECT * FROM chat_call_conf WHERE oc_id = '".$r->id ."' "); 
				$html .= "<td>".$chat_menu->menu."</td>";
				
			} else {
				$html .= "<td>--</td>";
			}		
			if($r->action == 'chat'){
				if($r->tid_accept >= 1){
					$html .= "<td>Accepted</td>";
				}elseif($r->tid_accept == 0){
					$html .= "<td>No Response</td>";
				}elseif($r->tid_accept < 0) {
					$html .= "<td>Rejected</td>";
				}		
				if($r->uid_accept >= 1){
					$html .= "<td>Accepted</td>";
				}elseif($r->uid_accept == 0){
					$html .= "<td>No Response</td>";
				}elseif($r->uid_accept < 0) {
					$html .= "<td>Rejected</td>";
				}
				
			} else {
				$html .= "<td>--</td>";
				$html .= "<td>--</td>";
			}
			if($r->payment_txnid != ''){
				$html .= "<td>".$r->remaining_session ."</td>";
			} else {
				$html .= "<td>NA</td>";
			}
			if($r->payment_txnid != ""){
				$first_therapist = $wpdb->get_row("SELECT * FROM online_consultation WHERE payment_txnid = '".$r->payment_txnid ."' AND action='".$r->action ."' LIMIT 1"); 
			} else {
				$first_therapist = $wpdb->get_row("SELECT * FROM online_consultation WHERE id='". $r->id ."'  LIMIT 1"); 
			}	
			if($r->action == 'call'){
				if(strpos($r->call_id,"_0")){
					$connected =  "Connected";	
				} else {
					$connected =  "Not Connected";	
				}
			} else {
				if($r->uid_accept == 1 && $r->tid_accept == 1){
					$connected =  "Connected";	
				} else {
					$connected =  "Not Connected";	
				}
			}	
			$html .= "<td>".$first_therapist->tname ."</td>";
			if($r->payment_txnid != ""){
				$second_therapist = $wpdb->get_row("SELECT * FROM online_consultation WHERE payment_txnid = '".$r->payment_txnid ."' AND id != '".$r->id ."' AND action='".$r->action ."' ORDER BY id DESC  LIMIT 1");
				if($second_therapist){
					if($second_therapist > 1){
						$html .= "<td>". $second_therapist->tname ."</td>";
					} else {
						$html .= "<td>". $r->tname ."</td>";
					}
					
					/* if($second_therapist->connected == 1){
						$connected =  "Connected";	
					} else {
						$connected =  "Not Connected";	
					} */
					
				} else {
					$html .= "<td>--</td>";
				}
			} else {
				$second_therapist = $wpdb->get_results("SELECT * FROM online_consultation WHERE uid = '".$r->uid ."' AND id != '".$r->id ."' AND therapy_name = 'Free Covid Session' AND remaining_session > 0 ORDER BY id DESC ");
				if(count($second_therapist) > 0){
					if(count($second_therapist) > 1){
						$html .= "<td>". $second_therapist[0]->tname ."</td>";
					} else {
						$html .= "<td>". $r->tname ."</td>";
					}
					
				} else {
					$html .= "<td>--</td>";
				}
			}
			$tidmobile = get_user_meta($r->tid,'mobile',true);
			$html .= "<td>".$tidmobile."</td>";
			$changetpcnt = $wpdb->get_var("SELECT count(DISTINCT(tid)) FROM online_consultation WHERE  payment_txnid = '".$r->payment_txnid ."'");
				
			$html .= "<td><button type='button' onclick='therapistdetails();' >".($changetpcnt-1) ."</button></td>";
			/* $html .= "<td>".$tmobile."</td>"; */
			$html .= "<td>".$r->package."</td>";
			$html .= "<td>".$r->therapy_name."</td>";
			$html .= "<td>".$r->amount."</td>";
			if($r->action == 'call'){
				/* $callrow = $wpdb->get_row("SELECT is_call FROM my_operator_call_history WHERE (caller_id = '". $r->tid ."' AND receiver_id = '".$r->uid ."') OR (caller_id = '". $r->uid ."' AND receiver_id = '".$r->tid ."') AND DATE(timestamp) = '".$r->created_date ."' AND is_call = 1 ORDER BY id DESC"); */
				$html .= "<td>".$connected."</td>";	
				
			}
			if($r->action == 'chat'){
				//$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM chat_message_details WHERE (from_user_id = '". $r->uid ."' AND to_user_id = '".$r->tid ."') OR (from_user_id = '". $r->tid ."' AND to_user_id = '".$r->uid ."') AND DATE(chat_time) = '".$r->created_date ."'");	
				$curr_uid = $r->uid;
				$curr_tid = $r->tid;
				
				$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM chat_block_users WHERE (from_user_id = '". $r->uid ."' AND to_user_id = '".$r->tid ."') OR (from_user_id = '". $r->tid ."' AND to_user_id = '".$r->uid ."') AND DATE(chat_init) = '".date("d-m-Y",strtotime($r->created_date)) ."' ");	
				if($chatrow > 0){
					$html .= "<td>Connected</td>";	
				} else {
					$html .= "<td>Not Connected</td>";	
				}
			}		
			if($r->action == 'videocall'){
				$videorow = $wpdb->get_var("SELECT COUNT(*) FROM oc_video_call WHERE  oc_id = '".$r->id ."'  AND (utime !=0 AND ttime !=0)");	
				if($videorow > 0){
					$html .= "<td>Connected</td>";	
				} else {
					$html .= "<td>Not Connected</td>";	
				}
			}	
			$html .= "<td>". $r->payment_status ."</td>";
			$html .= "<td>".$r->payment_txnid ."</td>";
			$html .= "<td>".$r->payuid ."</td>";
			$html .= "<td>". date("dS M Y",strtotime($r->created_date)) ."</td>";
			if($r->action == 'call' || $r->action == 'chat' || $r->action == 'videocall'){
				if($r->action == 'call'){
					if($r->call_id != "" && strpos($r->call_id,"_0")){
						$callrow = $wpdb->get_row("SELECT call_date,call_duration,call_time FROM knowlarity_after_call WHERE call_uuid = '".$r->call_id ."'");
						if(!empty($callrow)){
							
							
							$secs = strtotime($callrow->call_duration)-strtotime("00:00:00");
							$call_end_time = date("H:i:s",strtotime($callrow->call_time)+$secs);
							//$call_end_time =  date("H:i:s",$call_duration);
							//$html .= "<td>".$call_end_time."</td>";
							$html .= "<td>". $callrow->call_time ." |".$call_end_time."</td>";
							$html .= "<td>". $callrow->call_duration ."</td>";
							
						} else {
							$html .= "<td>--</td>";
							$html .= "<td>--</td>";
						}
					} else {
						$html .= "<td>--</td>";
						$html .= "<td>--</td>";
					}
				}elseif($r->action == 'chat'){
					$chatrow = $wpdb->get_results("SELECT chat_time FROM chat_message_details WHERE (from_user_id = '". $r->uid ."' AND to_user_id = '".$r->tid ."') OR (from_user_id = '". $r->tid ."' AND to_user_id = '".$r->uid ."') AND DATE(chat_time) = '".$r->created_date ."'");
					$k=0;
					if(!empty($chatrow) && count($chatrow) > 1){
						
						$start_chat_time = date("H:i:s",strtotime($r->chat_start_time));
						if($r->chat_end_time != ''){
							$end_chat_time =  date("H:i:s",strtotime($r->chat_end_time));
						}	else {
							$end_chat_time = "--";
							
						}
						if($r->chat_end_time != ''){
							$duration = (strtotime($end_chat_time) - strtotime($start_chat_time)) / 60;
						
						} else {
							$duration = "--";
						}	
						$html .= "<td>".$start_chat_time." |".$end_chat_time."</td>";
						$html .= "<td>".$duration."</td>";
					} else {
						$html .= "<td>--</td>";
						$html .= "<td>--</td>";
					}
				}elseif($r->action == 'videocall'){	
					$videorow = $wpdb->get_row("SELECT utime,ttime,book_time FROM oc_video_call WHERE  oc_id = '".$r->id ."' AND (utime !=0 AND ttime !=0)");	
					if($videorow){	
						if($videorow->utime > $videorow->ttime){
							$vtime = ($videorow->ttime)/60;
						} else {
							$vtime = ($videorow->utime)/60;	
						}
					
						//$html .= "<td>".date("H:i:s",strtotime('+'. $vtime .' mins',strtotime($videorow->book_time)))."</td>";
							$html .= "<td>". $videorow->book_time ." | ".date("H:i:s",strtotime('+'. $vtime .' mins',strtotime($videorow->book_time)))."</td>";
					} else {
						$html .= "<td>--</td>";
						$html .= "<td>--</td>";
					}	
				}	
			} else {
				$html .= "<td>--</td>";
				$html .= "<td>--</td>";
			}
			$html .= "<tr>";
		}	
		
		$html .= '<div class="modal fade" id="'.$r->id .'" data-backdrop="static" data-keyboard="false" style="display:none;">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="row">
				  
				  <div class="col-sm-12 col-xs-12 text-center" style="margin-bottom: -40px;">
					<img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/svglogo.svg" width="100" height="100" alt="Thriive" style="margin-left: 40px;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 10px;">
							<span aria-hidden="true" style="font-size: 33px;">&times;</span>
					</button>
				  </div>
				</div>
				<div class="modal-body text-center">
					
				</div>
			</div>
		</div>
	</div>';
	}
	$html .= "</table><div style='text-align: right;display: inline-flex;'>";
	if($paged > 1){
		$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=1'>First</a></div>";
	}
	if($paged <= 1){
		//$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Prev</a></div>";
    } else {
    	$pageno = $paged-1;
    	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=$pageno&sd=$sdval&ed=$edval&s=$sval&m=$mval'>Prev</a></div>";
    }
    if($paged >= $total_pages){
		//$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Next</a></div>";
    } else {
    	$pageno = $paged+1;
    	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=$pageno&sd=$sdval&ed=$edval&s=$sval&m=$mval'>Next</a></div>";
    }
	if($paged < $total_pages){
		$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=$total_pages'>Last</a></div></div>";
	}
	
    echo $html;
}
function getInprogressConsultation(){ 
	global $wpdb;
	
	$sql = "SELECT * FROM `online_consultation` WHERE 1 ORDER BY id DESC LIMIT 50";
	
	$result = $wpdb->get_results($sql,OBJECT);//getConnectedData
	$html = "<div class='wrap'><h1 class='wp-heading-inline'>".esc_html( get_admin_page_title() )."</h1><hr class='wp-header-end'>";
	//$html .= "<ul class='subsubsub'><li class='all'>Total Consultation Count: <span class='count'>(".$oc_count.")</span></li> | <li class='all'>Total Success Count: <span class='count'>(".$success_count."/".$oc_count.")</span></li> | <li class='all'>Total Failed Count: <span class='count'>(".$failed_count."/".$oc_count.")</span></li> </ul>";
	$html .= "<table class='wp-list-table widefat fixed striped pages'>";
	$html .= "<thead><tr><td>User Name</td><td>User Email</td><td>User Mobile</td><td>Action</td><td>Therapist Name</td><td>Therapist Email</td><td>Therapist Mobile</td><td>Package</td><td>Therapy Name</td><td>Amount</td><td>Call/Chat Status</td><td>Payment Status</td><td>Busy Date</td><td>Created Date</td></tr></thead>";
	//$html .= "<form id='fsd-filter' action='".esc_html(admin_url('index.php'))."' method='get'><p class='search-box'><label class='screen-reader-text' for='fsd-search-input'>Search Posts:</label><input type='hidden' value='onlineconsultationdashboard' name='page' /><input type='search' id='fsd-search-input' name='s' value='".$inputval."'><input type='submit' id='search-submit' class='button' value='Search'></p><div class='tablenav top'><div class='alignleft actions'><label for='filter-by-status' class='screen-reader-text'>Filter by Status</label><select name='m' id='filter-by-status'><option value=''>All status</option><option value='success' ".$bstatusval.">Success</option><option value='failed' ".$nobstatusval.">Failed</option></select></div><div class='alignleft actions'><input type='submit' name='filter_action' id='fsd-query-submit' class='button' value='Filter'></div><p><input type='date' name='sd' value='".$sdate."'/><input type='date' name='ed' value='".$edate."'/><input type='submit' name='date_filter_action' id='fsd-date-submit' class='button' value='Date Filter' /></p>";
	foreach($result as $r){
		$post_id = $wpdb->get_row("SELECT ID FROM wp_posts WHERE post_status = 'publish' AND post_author = '".$r->tid ."'");
	//	echo 'tid'.$r->tid;	echo "<br/>";
		$status = getTherapistStatus($post_id->ID);
		$consultrow = getTherapistConsultStatus1($r->tid,$r->id);
		$chatrow =  getTherapistChatStatus($r->tid);
		//if($status == "Available"){ 
			if($consultrow > 0){
				$cstatus = "On Call";
			} else {
				if($chatrow > 0){ 
					$cstatus = "On Chat";
				}/* else {
					$status = "Available";
					echo '<p class="r-available">Available Now</p>';
				} */
				
			} 
			 
		//} 
		//echo $cstatus;	
		if($consultrow > 0 || $chatrow > 0){ 
			$umobile = get_user_meta($r->uid, 'mobile', true);
			$tmobile = get_user_meta($r->tid, 'mobile', true);
			$html .= "<tr>";
			$html .= "<td>".$r->uname."</td>";
			$html .= "<td>".$r->uemail."</td>";
			$html .= "<td>".$umobile."</td>";
			$html .= "<td>".$r->action."</td>";
			$html .= "<td>".$r->tname."</td>";
			$html .= "<td>".$r->temail."</td>";
			$html .= "<td>".$tmobile."</td>";
			$html .= "<td>".$r->package."</td>";
			$html .= "<td>".$r->therapy_name."</td>";
			$html .= "<td>".$r->amount."</td>";         
			$html .= "<td>".$cstatus."</td>";
		
			/* if($r->action == 'call'){
				
				if($r->call_id != ""){
					$callrow = $wpdb->get_row("SELECT call_duration FROM knowlarity_after_call WHERE call_uuid = '".$r->call_id ."'");
					if(!empty($callrow)){
						$html .= "<td>Connected</td>";
						
					} else {
						$html .= "<td>Not Connected</td>";	
					}
				} else {
					$html .= "<td>Not Connected</td>";	
				}	
			} */
			if($r->action == 'chat'){
				//$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM chat_message_details WHERE (from_user_id = '". $r->uid ."' AND to_user_id = '".$r->tid ."') OR (from_user_id = '". $r->tid ."' AND to_user_id = '".$r->uid ."') AND DATE(chat_time) = '".$r->created_date ."'");	
				$curr_uid = $r->uid;
				$curr_tid = $r->tid;
				
				$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM chat_block_users WHERE (from_user_id = '". $r->uid ."' AND to_user_id = '".$r->tid ."') OR (from_user_id = '". $r->tid ."' AND to_user_id = '".$r->uid ."') AND DATE(chat_init) = '".date("d-m-Y",strtotime($r->created_date)) ."' ");	
				if($chatrow > 0){
					$html .= "<td>Connected</td>";	
				} else {
					$html .= "<td>Not Connected</td>";	
				}
			}		
			if($r->action == 'videocall'){
				$videorow = $wpdb->get_var("SELECT COUNT(*) FROM oc_video_call WHERE  oc_id = '".$r->id ."'  AND (utime !=0 AND ttime !=0)");	
				if($videorow > 0){
					$html .= "<td>Connected</td>";	
				} else {
					$html .= "<td>Not Connected</td>";	
				}
			}	
			$html .= "<td>". $r->payment_status ."</td>";
			$html .= "<td>".$r->busy_date ."</td>";
			$html .= "<td>". $r->created_date ."</td>";
			
			
			$html .= "<tr>";
		}	
	}
	$html .= "</table><div style='text-align: right;display: inline-flex;'>";
	if($paged > 1){
		//$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=1'>First</a></div>";
	}
	if($paged <= 1){
		//$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Prev</a></div>";
    } else {
    	$pageno = $paged-1;
    	//$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=$pageno&sd=$sdval&ed=$edval&s=$sval&m=$mval'>Prev</a></div>";
    }
    if($paged >= $total_pages){
		//$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Next</a></div>";
    } else {
    	$pageno = $paged+1;
    	//$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=$pageno&sd=$sdval&ed=$edval&s=$sval&m=$mval'>Next</a></div>";
    }
	if($paged < $total_pages){
		//$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=onlineconsultationdashboard&paged=$total_pages'>Last</a></div></div>";
	}
    echo $html;
}
function getFSCByTherapist(){
	$html = "";
	$html .= "<div class='wrap'><h1 class='wp-heading-inline'>".esc_html( get_admin_page_title() )."</h1>";
	if(have_rows('free_therapist_data', 'option')):
		$html .= "<table class='wp-list-table widefat fixed striped pages'><thead><tr><td>Taxonomy</td><td>Therapist</td></tr></thead>";
        while(have_rows('free_therapist_data', 'option')): the_row();
        	$html .= "<tr><td>".get_sub_field('taxonomy')->slug."</td>";
            $ids = explode(',', get_sub_field('display_ids')); 
            $html .= "<td><ul>";
            foreach($ids as $id){
            	$therapist = get_post($id);
            	$html .= "<li>".$therapist->post_title."(".$therapist->free_session_count.")</li>";
            }
            $html .= "</ul></td></tr>";
        endwhile;
    endif;
    $html .= "</div>";
    echo $html;
}

function getOCUser(){
	global $wpdb;
	$posts_per_page = 20;
	$start = 0;
	$paged = $_GET['paged'] ? $_GET['paged'] : 1;
	$start = ($paged-1)*$posts_per_page;
	$oc_count = $wpdb->get_var("SELECT count(*) FROM wp_users AS u INNER JOIN wp_usermeta AS um ON u.id = um.user_id AND um.meta_key='lead_form_source' AND (um.meta_value='all-page' OR um.meta_value='tarot-card-reading' OR um.meta_value='cosmic-astrology' OR um.meta_value='angel-reading' OR um.meta_value='numerology') INNER JOIN wp_usermeta AS um1 ON u.id = um1.user_id AND um1.meta_key='mobile' LEFT JOIN online_consultation AS oc ON u.id = oc.uid WHERE u.user_registered >= '2020-07-11'");
	$total_pages = ceil($oc_count / $posts_per_page);
	$result = $wpdb->get_results("SELECT u.id, u.user_email, um.meta_value AS lead_form_source, um1.meta_value AS mobile, oc.payment_status, u.user_registered FROM wp_users AS u INNER JOIN wp_usermeta AS um ON u.id = um.user_id AND um.meta_key='lead_form_source' AND (um.meta_value='all-page' OR um.meta_value='tarot-card-reading' OR um.meta_value='cosmic-astrology' OR um.meta_value='angel-reading' OR um.meta_value='numerology') INNER JOIN wp_usermeta AS um1 ON u.id = um1.user_id AND um1.meta_key='mobile' LEFT JOIN online_consultation AS oc ON u.id = oc.uid WHERE u.user_registered >= '2020-07-11' GROUP BY u.id ORDER BY u.user_registered DESC LIMIT $start,$posts_per_page",OBJECT);
	$html = "<table class='wp-list-table widefat fixed striped pages'>";
	$html .= "<thead><tr><td>User Email</td><td>User Mobile</td><td>Lead Source</td><td>Payment Status</td><td>Registration Date</td></tr></thead>";
	foreach($result as $r){
		$html .= "<tr>";
		$html .= "<td>".$r->user_email."</td>";
		$html .= "<td>".$r->mobile."</td>";
		$html .= "<td>".$r->lead_form_source."</td>";
		$html .= "<td>".$r->payment_status."</td>";
		$html .= "<td>".$r->user_registered."</td>";
		$html .= "<tr>";
	}
	$html .= "</table><div style='text-align: right;display: inline-flex;'>";
    $html .= "<div style='margin: 5px 10px;'><a href='index.php?page=ocuserdashboard&paged=1'>First</a></div>";
	if($paged <= 1){
		$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Prev</a></div>";
    } else {
    	$pageno = $paged-1;
    	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=ocuserdashboard&paged=$pageno'>Prev</a></div>";
    }
    if($paged >= $total_pages){
		$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Next</a></div>";
    } else {
    	$pageno = $paged+1;
    	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=ocuserdashboard&paged=$pageno'>Next</a></div>";
    }
	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=ocuserdashboard&paged=$total_pages'>Last</a></div></div>";
    echo $html;
}



function getFreeOnlineConsultation(){
	global $wpdb;
	$posts_per_page = 30;
	$start = 0;
	$paged = $_GET['paged'] ? $_GET['paged'] : 1;
	$start = ($paged-1)*$posts_per_page;
	$oc_count = $wpdb->get_var("SELECT count(*) FROM `register_for_free_session`");
	$booking_count = $wpdb->get_var("SELECT count(*) FROM `register_for_free_session` WHERE booked_status = 1");
	$email_count = $wpdb->get_var("SELECT count(*) FROM `register_for_free_session` WHERE email_status = 1");
	$sms_count = $wpdb->get_var("SELECT count(*) FROM `register_for_free_session` WHERE sms_status = 1");
	$total_pages = ceil($oc_count / $posts_per_page);
	$sval = $_GET['s'];
	$mval = $_GET['m'];
	$sdval = $_GET['sd'];
	$edval = $_GET['ed'];
	if($sval != "" && $mval == "0"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%' ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval != "" && $mval == "book"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE (uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%') AND booked_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval != "" && $mval == "nobook"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE (uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%') AND booked_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval != "" && $mval == "email"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE (uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%') AND email_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval != "" && $mval == "noemail"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE (uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%') AND email_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval != "" && $mval == "sms"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE (uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%') AND sms_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval != "" && $mval == "nosms"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE (uname LIKE '%$sval%' OR uemail LIKE '%$sval%' OR umobile LIKE '%$sval%' OR select_ailment LIKE '%$sval%' OR type_ailment LIKE '%$sval%') AND sms_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval == "" && $edval == "" && $mval == "book"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE booked_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval == "" && $edval == "" && $mval == "nobook"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE booked_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval == "" && $edval == "" && $mval == "email"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE email_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval == "" && $edval == "" && $mval == "noemail"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE email_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval == "" && $edval == "" && $mval == "sms"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE sms_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval == "" && $edval == "" && $mval == "nosms"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE sms_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "0"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "book"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' AND booked_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "nobook"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' AND booked_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "email"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' AND email_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "noemail"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' AND email_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "sms"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' AND sms_status = 1 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else if($sval == "" && $sdval != "" && $edval != "" && $mval == "nosms"){
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` WHERE created_date BETWEEN '$sdval' AND '$edval' AND sms_status = 0 ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	} else {
		$result = $wpdb->get_results("SELECT * FROM `register_for_free_session` ORDER BY id DESC LIMIT $start,$posts_per_page",OBJECT);
	}
	$inputval = ($sval != "")?$sval:"";
	$bstatusval = ($mval == 'book')?"selected":"";
	$nobstatusval = ($mval == 'nobook')?"selected":"";
	$estatusval = ($mval == 'email')?"selected":"";
	$noestatusval = ($mval == 'noemail')?"selected":"";
	$sstatusval = ($mval == 'sms')?"selected":"";
	$nosstatusval = ($mval == 'nosms')?"selected":"";
	$sdate = ($sdval != "")?$sdval:"";
	$edate = ($edval != "")?$edval:"";
	$nonce = wp_create_nonce( 'exp_free_session_data' );
	$html = "<div class='wrap'><h1 class='wp-heading-inline'>".esc_html( get_admin_page_title() )."</h1><a href='admin.php?page=freeonlineconsultationdashboard&action=exp_free_session_data&_wpnonce=$nonce' class='page-title-action'>Export to CSV</a><button class='page-title-action fsd_sendemail'>Send Email</button><button class='page-title-action fsd_sendsms'>Send SMS</button><button class='page-title-action fsd_gsendemail'>Generic Send Email</button><button class='page-title-action fsd_gsendsms'>Generic Send SMS</button><hr class='wp-header-end'>";
	$html .= "<ul class='subsubsub'><li class='all'>Total Registered Count: <span class='count'>(".$oc_count.")</span></li> | <li class='all'>Total Email Count: <span class='count'>(".$email_count."/".$oc_count.")</span></li> | <li class='all'>Total SMS Count: <span class='count'>(".$sms_count."/".$oc_count.")</span></li> | <li class='all'>Total Booking Count: <span class='count'>(".$booking_count."/".$oc_count.")</span></li></ul>";
	$html .= "<form id='fsd-filter' action='".esc_html(admin_url('index.php'))."' method='get'><p class='search-box'><label class='screen-reader-text' for='fsd-search-input'>Search Posts:</label><input type='hidden' value='freeonlineconsultationdashboard' name='page' /><input type='search' id='fsd-search-input' name='s' value='".$inputval."'><input type='submit' id='search-submit' class='button' value='Search'></p><div class='tablenav top'><div class='alignleft actions'><label for='filter-by-status' class='screen-reader-text'>Filter by Status</label><select name='m' id='filter-by-status'><option value='0'>All status</option><option value='book' ".$bstatusval.">Booked</option><option value='nobook' ".$nobstatusval.">Not Booked</option><option value='email' ".$estatusval.">Email send</option><option value='noemail' ".$noestatusval.">Email not send</option><option value='sms' ".$sstatusval.">SMS send</option><option value='nosms' ".$nosstatusval.">SMS not send</option></select></div><div class='alignleft actions'><input type='submit' name='filter_action' id='fsd-query-submit' class='button' value='Filter'></div><p><input type='date' name='sd' value='".$sdate."'/><input type='date' name='ed' value='".$edate."'/><input type='submit' name='date_filter_action' id='fsd-date-submit' class='button' value='Date Filter' /></p>";
	$html .= "<table class='wp-list-table widefat fixed striped pages' id='fsd-datatable'>";
	$html .= "<thead><tr><td>Action</td><td>User Name</td><td>User Email</td><td>User Mobile</td><td>Ailment Selected</td><td>Type Ailment</td><td>Therapy Selected</td><td>Reg. Date</td><td>Email Status</td><td>Email Date</td><td>SMS Status</td><td>SMS Date</td><td>Booked Status</td><td>Booked Date</td><td>Therapy Booked</td><td>Therapist Booked</td></tr></thead>";
	foreach($result as $r){
		$html .= "<tr>";
		$html .= "<td><input type='checkbox' class='fsd-checkbox' value='".$r->id."'/></td>";
		$html .= "<td>".$r->uname."</td>";
		$html .= "<td>".$r->uemail."</td>";
		$html .= "<td>".$r->umobile."</td>";
		$html .= "<td>".$r->select_ailment."</td>";
		$html .= "<td>".$r->type_ailment."</td>";
		$html .= "<td>".$r->therapies."</td>";
		$html .= "<td>".$r->created_date."</td>";
		$html .= "<td>".$r->email_status."</td>";
		$html .= "<td>".$r->email_date."</td>";
		$html .= "<td>".$r->sms_status."</td>";
		$html .= "<td>".$r->sms_date."</td>";
		$html .= "<td>".$r->booked_status."</td>";
		$html .= "<td>".$r->booked_date."</td>";
		$html .= "<td>".$r->booked_therapy."</td>";
		$html .= "<td>".$r->booked_therapist."</td>";
		$html .= "<tr>";
	}
	$html .= "</table><div style='text-align: right;display: inline-flex;'>";
    $html .= "<div style='margin: 5px 10px;'><a href='index.php?page=freeonlineconsultationdashboard&paged=1'>First</a></div>";
	if($paged <= 1){
		$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Prev</a></div>";
    } else {
    	$pageno = $paged-1;
    	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=freeonlineconsultationdashboard&paged=$pageno'>Prev</a></div>";
    }
    if($paged >= $total_pages){
		$html .= "<div class='disabled' style='margin: 5px 10px;'><a href='#'>Next</a></div>";
    } else {
    	$pageno = $paged+1;
    	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=freeonlineconsultationdashboard&paged=$pageno'>Next</a></div>";
    }
	$html .= "<div style='margin: 5px 10px;'><a href='index.php?page=freeonlineconsultationdashboard&paged=$total_pages'>Last</a></div></div></form><br class='clear'></div>";
    echo $html;
}

if ( isset($_GET['action'] ) && $_GET['action'] == 'exp_free_session_data' )  {
	// Handle CSV Export
	add_action( 'admin_init', 'csv_export_free_data') ;
}


function csv_export_free_data() {
	global $wpdb;
    // Check for current user privileges 
    if( !current_user_can( 'manage_options' ) ){ return false; 
    }

    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    // Nonce Check
    $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'exp_free_session_data' ) ) {
        die( 'Security check error' );
    }
    
    ob_start();

    $domain = $_SERVER['SERVER_NAME'];
    $filename = 'expfs-' . date("d-m-Y_h-i-s_A") . '.csv';
    
    $header_row = array(
        'User Name',
        'User Email',
        'User Mobile',
        'Ailment Selected',
        'Type Ailment',
        'Therapy Selected',
        'Reg. Date',
        'Email Status',
        'Email Date',
        'SMS Status',
        'SMS Date',
        'Booked Status',
        'Booked Date',
        'Therapy Booked',
        'Therapist Booked'
    );
    $data_rows = array();
    $result = $wpdb->get_results("SELECT * FROM `register_for_free_session` ORDER BY id DESC",OBJECT);
    
		$html .= "<tr>";
    foreach ( $result as $r ) {
         $row = array(
        	$r->uname,
        	$r->uemail,
        	$r->umobile,
        	$r->select_ailment,
        	$r->type_ailment,
        	$r->therapies,
        	$r->created_date,
        	$r->email_status,
        	$r->email_date,
        	$r->sms_status,
        	$r->sms_date,
        	$r->booked_status,
        	$r->booked_date,
        	$r->booked_therapy,
        	$r->booked_therapist
        );
        $data_rows[] = $row;
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );
    
    ob_end_flush();
    
    die();
}
if ( isset($_GET['action'] ) && $_GET['action'] == 'exp_oc_session_data' )  {
	// Handle CSV Export
	add_action( 'admin_init', 'csv_export_oc_data') ;
}
function csv_export_oc_data() {
	global $wpdb;
    // Check for current user privileges 
    if( !current_user_can( 'manage_options' ) ){ return false; 
    }

    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    // Nonce Check
    $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'exp_oc_session_data' ) ) {
        die( 'Security check error' );
    }
    
    ob_start();

    $domain = $_SERVER['SERVER_NAME'];
    $filename = 'expoc-' . date("d-m-Y_h-i-s_A") . '.csv';
  
    $header_row = array(
        'User Name',
        'User Email',
        'User Mobile',
		'Action',
		'Remaining Session',
		'Booked Therapist',
		'Changed Therapist',
        'Therapist Name',
        'Therapist Email',
        'Therapist Mobile',
        'Package',
        'Therapy Name',
        'Amount',
		'Remaining Session',
		'Call/Chat Status',
        'Payment Status',
	//	'Transaction ID',
        'Created Date',
		'Call / Chat Start Time',
		'Call / Chat End Time',
    );
    $data_rows = array();
	
	$sdval = $_GET['sd'];
	$edval = $_GET['ed'];
	$sdate = ($sdval != "")?$sdval:"";
	$edate = ($edval != "")?$edval:"";
	$sval = $_GET['s'];
	$mval = $_GET['m'];
	
	$inputval = ($sval != "")?$sval:"";
	$bstatusval = ($mval == 'success')?"selected":"";
	$nobstatusval = ($mval == 'failed')?"selected":"";
	
	$sql = "SELECT * FROM `online_consultation` WHERE ";
	if($mval != ""){
		$sql .= "  payment_status = '". $mval."'";
	}   else {
		$sql .= "  payment_status = 'success'";
		
	} 
	if($sdval != "" && $edval != ""){
		$sql .= " AND DATE(created_date) BETWEEN '".$sdval."' AND '".$edval."'";
		
	}
	if($sval != "" ){
		$sql .= " AND uname LIKE '%".$sval."%' OR uemail LIKE '%".$sval."%' OR package LIKE '%".$sval."%' OR therapy_name LIKE '%".$sval."%' OR amount LIKE '%".$sval."%' OR payment_txnid LIKE '%".$sval."%'";
	} 
	$sql .= "  ORDER BY id DESC";
	$result = $wpdb->get_results($sql,OBJECT);
	$paytxarr = array();
    foreach ( $result as $r ) {
		if(!in_array($r->payment_txnid,$paytxarr) || $r->payment_txnid == ''){
			$umobile = get_user_meta($r->uid, 'mobile', true);
			$tmobile = get_user_meta($r->tid, 'mobile', true);
			if($r->action == 'call'){
				if($r->call_id != "" && strpos($r->call_id,"_0")){
					$callrow = $wpdb->get_row("SELECT call_date,call_duration,call_time FROM knowlarity_after_call WHERE call_uuid = '".$r->call_id ."'");
					if(!empty($callrow)){
						$start_call_time = $callrow->call_time;
						
						$secs = strtotime($callrow->call_duration)-strtotime("00:00:00");
						$end_call_time = date("H:i:s",strtotime($callrow->call_time)+$secs);
						//$call_end_time =  date("H:i:s",$call_duration);
						
					} else {
						$start_call_time = "--";
						$end_call_time =  "--";
					}
				} else {
					$start_call_time = "--";
					$end_call_time =  "--";
				}
				
				
			}
			$first_therapist = $wpdb->get_row("SELECT * FROM online_consultation WHERE payment_txnid = '".$r->payment_txnid ."' AND action='".$r->action ."' LIMIT 1"); 
			if($r->connected == 1){
				$connected =  "Connected";	
			} else {
				$connected =  "Not Connected";	
			}
			$ft =  $first_therapist->tname ;
			if($r->payment_txnid != ""){
				$second_therapist = $wpdb->get_row("SELECT * FROM online_consultation WHERE payment_txnid = '".$r->payment_txnid ."' AND id != '".$r->id ."' AND action='".$r->action ."' ORDER BY id DESC  LIMIT 1");
				if($second_therapist){
					
					if($second_therapist > 1){
						$st = $second_therapist->tname ;
					} else {
						$st =  $r->tname ;
					}
				} else {
					$st = "--";
				}
			} else {
				$second_therapist = $wpdb->get_row("SELECT * FROM online_consultation WHERE uid = '".$r->uid ."' AND id != '".$r->id ."' AND therapy_name = 'Free Covid Session' AND remaining_session > 0 ORDER BY id DESC LIMIT 1");
				if($second_therapist){
					if($second_therapist > 1){
						$st = $second_therapist->tname ;
					} else {
						$st =  $r->tname ;
					}
					
				} else {
					$st = "--";
				}
			}
			if($r->action == 'chat'){
				$chatrow = $wpdb->get_var("SELECT COUNT(*) FROM chat_message_details WHERE (from_user_id = '". $r->uid ."' AND to_user_id = '".$r->tid ."') OR (from_user_id = '". $r->tid ."' AND to_user_id = '".$r->uid ."') AND DATE(chat_time) = '".$r->created_date ."'");	
				if($chatrow > 1){
					$connected = "Connected";
					$start_call_time = date("H:i:s",strtotime($r->created_date));
					$end_call_time = date("H:i:s",strtotime('+'. $r->session_duration .' mins',strtotime($r->created_date)));
				} else {
					$connected = "Not Connected";	
					$start_call_time =	$end_call_time = "--";
				}
			}	
			if($r->action == 'videocall'){	
				$videorow = $wpdb->get_row("SELECT utime,ttime,book_time FROM oc_video_call WHERE  oc_id = '".$r->id ."' AND (utime !=0 AND ttime !=0)");	
				if($videorow){	
					if($videorow->utime > $videorow->ttime){
						$vtime = ($videorow->ttime)/60;
					} else {
						$vtime = ($videorow->utime)/60;	
					}
					$connected = "Connected";
					$start_call_time = $videorow->book_time;
					$end_call_time = date("H:i:s",strtotime('+'. $vtime .' mins',strtotime($videorow->book_time)));
				} else {
					$connected = "Not Connected";	
					$start_call_time =	$end_call_time = "--";
				}	
			}
			
			if($r->payment_txnid != ''){
				$remaining_session = $r->remaining_session;
			} else {
				$remaining_session = "NA";
			}
			$row = array(
				$r->uname,
				$r->uemail,
				$umobile,
				$r->action,
				$ft,
				$st,
				$remaining_session,
				$r->tname,
				$r->temail,
				$tmobile,
				$r->package,
				$r->therapy_name,
				$r->amount,
			
				$connected,
				$r->payment_status,
				//$r->payment_txnid,
				$r->created_date,
				$start_call_time,
				$end_call_time,
			);
			$data_rows[] = $row;
		}	
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );
    
    ob_end_flush();
    
    die();
}

function my_action_javascript() {
	$nonce_email = wp_create_nonce( 'fsd_send_email' );
	$nonce_sms = wp_create_nonce( 'fsd_send_sms' );
	$nonce_gemail = wp_create_nonce( 'fsd_gsend_email' );
	$nonce_gsms = wp_create_nonce( 'fsd_gsend_sms' ); ?>
	<script>
	  	jQuery( '.fsd_sendemail' ).click(function( $ ) {
	  		var ids = jQuery(".fsd-checkbox:checked").map(function() {return this.value;}).toArray().join(", ");
	  		if(ids == ""){
	  			alert("Please select atleast one to send email");
	  		} else {
	  			var data = {
			      action: 'fsd_send_email',
			      security: '<?php echo $nonce_email; ?>',
			      ids: ids
			    };
			    jQuery.post( ajaxurl, data, function( response ) {
			      jQuery('#fsd-datatable').load(' #fsd-datatable');
			    });
	  		}
		});
		jQuery( '.fsd_sendsms' ).click(function( $ ) {
	  		var ids = jQuery(".fsd-checkbox:checked").map(function() {return this.value;}).toArray().join(", ");
		    if(ids == ""){
	  			alert("Please select atleast one to send sms");
	  		} else {
	  			var data = {
			      action: 'fsd_send_sms',
			      security: '<?php echo $nonce_sms; ?>',
			      ids: ids
			    };
			    jQuery.post( ajaxurl, data, function( response ) {
			    	jQuery('#fsd-datatable').load(' #fsd-datatable');
			    });
			}
		});
		jQuery( '.fsd_gsendemail' ).click(function( $ ) {
	  		var ids = jQuery(".fsd-checkbox:checked").map(function() {return this.value;}).toArray().join(", ");
	  		if(ids == ""){
	  			alert("Please select atleast one to send email");
	  		} else {
	  			var data = {
			      action: 'fsd_gsend_email',
			      security: '<?php echo $nonce_gemail; ?>',
			      ids: ids
			    };
			    jQuery.post( ajaxurl, data, function( response ) {
			      jQuery('#fsd-datatable').load(' #fsd-datatable');
			    });
	  		}
		});
		jQuery( '.fsd_gsendsms' ).click(function( $ ) {
	  		var ids = jQuery(".fsd-checkbox:checked").map(function() {return this.value;}).toArray().join(", ");
		    if(ids == ""){
	  			alert("Please select atleast one to send sms");
	  		} else {
	  			var data = {
			      action: 'fsd_gsend_sms',
			      security: '<?php echo $nonce_gsms; ?>',
			      ids: ids
			    };
			    jQuery.post( ajaxurl, data, function( response ) {
			    	jQuery('#fsd-datatable').load(' #fsd-datatable');
			    });
			}
		});
	</script>
<?php
}


function fsd_sendemail_callback() {
  	check_ajax_referer( 'fsd_send_email', 'security' );
  	$ids = $_POST['ids'];
	$date = date("Y-m-d H:i:s");
	global $wpdb;
	foreach (explode(',', $ids) as $id) {
		$email = $wpdb->get_row("SELECT uname,uemail FROM register_for_free_session WHERE id = $id AND email_status = 0",OBJECT);
		if($email){
			$url = site_url()."/tarot-free-session";
			$subject = "Free session confirmation";
			$body = "Hi $email->uname,<br/><br/>Congrats!<br/><br/>We are happy to inform you that you are getting a free session on Thriive!<br/><br/>Click <a href='$url'>here</a> to select your therapy and choose your therapist.<br/><br/>All the best!<br/><br/>Love & Light,<br/>Team Thriive";
			sendEmail($email->uemail, $subject, $body);
			$udata = array('email_status' => '1','email_date' => $date);
			$wpdb->update("register_for_free_session",$udata,array('id'=>$id));
		}		
	}
	wp_die();
}


function fsd_sendsms_callback() {
  	check_ajax_referer( 'fsd_send_sms', 'security' );
  	$ids = $_POST['ids'];
  	$date = date("Y-m-d H:i:s");
	global $wpdb;
	foreach (explode(',', $ids) as $id) {
		$email = $wpdb->get_row("SELECT umobile FROM register_for_free_session WHERE id = $id AND sms_status = 0",OBJECT);
		if($email){
			$url = site_url()."/tarot-free-session";
			$link = generateBitlyURL($url)['data']['url'];
			$msg = "Thriive is giving you a free consultation with your choice of therapist! Click $link to start your session.";
			sendSMS($email->umobile, $msg);
			$udata = array('sms_status' => '1','sms_date' => $date);
			$wpdb->update("register_for_free_session",$udata,array('id'=>$id));
		}		
	}
	wp_die();
}

function fsd_gsendemail_callback() {
  	check_ajax_referer( 'fsd_gsend_email', 'security' );
  	$ids = $_POST['ids'];
	$date = date("Y-m-d H:i:s");
	global $wpdb;
	foreach (explode(',', $ids) as $id) {
		$email = $wpdb->get_row("SELECT uname,uemail FROM register_for_free_session WHERE id = $id AND email_status = 0",OBJECT);
		if($email){
			$url = site_url()."/tarot-free-session";
			$subject = "Generic";
			$body = "Hi $email->uname,<br/><br/>Generic<br/><br/>Love & Light,<br/>Team Thriive";
			sendEmail($email->uemail, $subject, $body);
			$udata = array('email_status' => '2','email_date' => $date);
			$wpdb->update("register_for_free_session",$udata,array('id'=>$id));
		}		
	}
	wp_die();
}


function fsd_gsendsms_callback() {
  	check_ajax_referer( 'fsd_gsend_sms', 'security' );
  	$ids = $_POST['ids'];
  	$date = date("Y-m-d H:i:s");
	global $wpdb;
	foreach (explode(',', $ids) as $id) {
		$email = $wpdb->get_row("SELECT umobile FROM register_for_free_session WHERE id = $id AND sms_status = 0",OBJECT);
		if($email){
			$url = site_url()."/tarot-free-session";
			$link = generateBitlyURL($url)['data']['url'];
			$msg = "Generic";
			sendSMS($email->umobile, $msg);
			$udata = array('sms_status' => '2','sms_date' => $date);
			$wpdb->update("register_for_free_session",$udata,array('id'=>$id));
		}		
	}
	wp_die();
}

function cron_delete_my_operator_assigned_users_34496053() {
    global $wpdb;
    $ten_hours_ago = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")))."-10 hours"));
    $wpdb->query("UPDATE my_operator_number_allocation SET is_deleted = 1 WHERE call_timestamp = '".$ten_hours_ago."'");
}
add_action( 'delete_my_operator_assigned_users', 'cron_delete_my_operator_assigned_users_34496053', 10, 0 );

function apply_coupon_code(){
	$code = str_replace(' ','',strtolower($_POST['code']));
	$db_code = str_replace(' ','',strtolower(get_field('coupon_code','option')));
	if($db_code == $code){
		echo generateJSON('success','Coupon code applied.');
	} else {
		echo generateJSON('error','Invalid coupon code.');
	}
	wp_die();	
}
function addalldaystime(){ 
	$html = "<div class='form-group'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
						<div class=''>
							<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='Start Time'  name='availability_start_time[alldays][]' class='form-control' disabled/>
							
								
							</div>
							<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='End Time' name='availability_end_time[alldays][]' class='form-control' disabled/>
							</div>
						</div>
						
					</div>	
				</div>
			</div>";
	echo $html;	exit();  
}
function addmondaytime(){ 
	$weekday = $_POST['weekday'];
	$i = $_POST['i'];
	$i = $i + 1;
	$html = "<div class='form-group' id='$weekday$i'>
				<div class='row'>
					<div class='col-md-12  col-xs-12'>
					
						<div class='checkbox-wrapper  col-md-3 col-xs-3'>
							
						</div>
						
						<div class=''>
							<div class='col-md-3 col-xs-3'>
								<input type='text'  placeholder='Start Time'  id='start$i$weekday'  class='form-control $weekday week starttme' name='availability_start_time[$weekday][]' required/>
							
								
							</div>
							<div class='col-md-3 col-xs-3'>
								<input type='text' placeholder='End Time' id='end$i$weekday' name='availability_end_time[$weekday][]'    class='form-control $weekday week endtme' required/>
							</div>
						</div>
						<div class='col-md-3 col-xs-3'>
							<button type='button' class='form-control btnweek btn$weekday' onClick='removerow(\"$weekday\",\"$i\");' >Remove</button>
						</div>
					</div>
				</div>
			</div><script>$('#end$i$weekday').timepicki({show_meridian:false,min_hour_value:0,
			max_hour_value:23,
			overflow_minutes:true,
			increase_direction:'up',
				disable_keyboard_mobile: true});
				$('#start$i$weekday').timepicki({show_meridian:false,min_hour_value:0,
			max_hour_value:23,
			
			overflow_minutes:true,
			increase_direction:'up',
			disable_keyboard_mobile: true});</script>";
	echo $html;	exit();
}

// check already booked slot by therapist user id
function checkalreadybooked1(){
	$tid = $_POST['tid'];
	$date = $_POST['date'];
	global $wpdb;
	$result = $wpdb->get_results("SELECT book_time FROM `oc_video_call` WHERE tid = ".$tid." AND status = 0 AND book_date = '".$date."'",OBJECT);
	if($result){ 
		$tempArr = array();
		foreach($result as $r){
			array_push($tempArr, $r->book_time);
		}		
		echo generateJSON('success','Already book date',$tempArr);
	} else {
		echo generateJSON('error','No booking dates','');
	}	
	wp_die();
}
function checkalreadybooked(){
	$tid = $_POST['tid'];
	$date = $_POST['date'];
	$data = array(
		'post_author' => $tid
		
	);
	$slug = $_POST['slug'];

	$action = $_POST['mode'];
	global $wpdb;
	$querystr = "SELECT ID FROM wp_posts  WHERE post_author = '".$tid."' ";
	$dates = array(
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
    );
	
	$weekday = date('l', strtotime( $date));
	$therapist = $wpdb->get_row( $querystr,OBJECT);
	
	$availability = get_post_meta($therapist->ID,'availability',true);
	if($availability > 0){
		$tempArr['resData'] = $tempArr['greyData'] = $tempArr['dateData'] = array();
		for($i =0;$i < $availability;$i++){
			$count =  get_post_meta($therapist->ID,'availability_'.$i.'_time',true);
			$day =  get_post_meta($therapist->ID,'availability_'.$i.'_day',true);
			$days =  get_post_meta($therapist->ID,'availability_'.$i.'_all_days',true);
			if($weekday == $day || $days == 1){
				
				for($j = 0;$j < $count;$j++){ 
					
					$start_time = date("H:i:s",strtotime(get_post_meta($therapist->ID,'availability_'.$i.'_time_'.$j.'_start_time',true)));
					$end_time = date("H:i:s",strtotime(get_post_meta($therapist->ID,'availability_'.$i.'_time_'.$j.'_end_time',true)));
					$seconds = strtotime($end_time) - strtotime($start_time);
					$hours = $seconds /3600;
					
					for($k=1;$k <= $hours;$k++){ 
						if($k ==1){ 
							$newstart_time = $start_time;
						}
						$newend_time = date('H:i:s',strtotime($newstart_time.'+1 hour'));
						$result = $wpdb->get_results("SELECT book_time FROM `oc_video_call` WHERE tid = ".$tid." AND status = 0 AND book_date = '".$date."' AND (HOUR(book_time) BETWEEN '".$newstart_time."' AND '".$newend_time."')",OBJECT); 
						if(empty($result)){
							/* $tempArr['start_time'][] = $newstart_time;
							$tempArr['end_time'][] = $newend_time;	 */
							$tempArr['resData'][] = $newstart_time;
							$tempArr['dateData'][] = $date;
						} else {
						
							$tempArr['greyData'][] = $newstart_time;
							$tempArr['dateData'][] = $date;
						}	
						
						$newstart_time = $newend_time;
					} 
						
				}
				
			}
		}
		if(!empty($tempArr)){
			echo json_encode($tempArr);	
		} else {
			$tempArr['resData'][] = 'No Slot Available';
			echo json_encode($tempArr);
		}	
	}  else {
		echo generateJSON('error','No booking dates','');
	}	
	wp_die();
}

function savetctooldata($input){
	global $wpdb;
	$uid = $input['uid'];
	$name = $input['uname'];
	$gender = $input['gender'];
	$dob = $input['birthday'];
	$issue = $input['issue'];
	$question = $input['question'];
	$card = $input['card'];
	if($name != ""){
		update_user_meta($uid, 'first_name', $name);
	}
	if($gender != ""){
		update_user_meta($uid, 'gender', $gender);
	}
	if($dob != ""){
		update_user_meta($uid, 'dob', $dob);
	}
	if($_SESSION['user_area']){
		update_user_meta($uid, 'location', $_SESSION['user_area']);
	}
	$data = array(
		'uid' => $uid,
		'issues' => $issue,
		'question' => $question,
		'selected_card' => $card
	);
	$wpdb->insert("tc_tool_user_details",$data);
	$lastid = $wpdb->insert_id;
	return generateJSON('success','Tarot card reading details added successfully',array($lastid));
}

function getTarotCardTool(){
	global $wpdb;
	$data = array(
		'post_type' => 'tarot_card_tool',
		'post_status' => 'publish',
		'orderby'   => 'rand',
		'numberposts' => '-1'
	);
	$cards = get_posts($data);
	return $cards;
}

function getcarddetails(){
	$id = $_POST['cid'];
	$card_img = get_the_post_thumbnail_url($id);
	echo generateJSON('success','',array($card_img));
	wp_die();
}

function userLocation(){
	$geolocation = $_POST['latitude'] . ',' . $_POST['longitude'];
	$request = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&key=AIzaSyCHEVeic8bw_V4TquYvp95g7W-eq5R741k'; 
	$file_contents = file_get_contents($request);
	$json_decode = json_decode($file_contents);
	$area = extractFromAdress($json_decode->results[0]->address_components,'sublocality_level_1');
	$_SESSION['user_area'] = $area;
}

function my_acf_set_repeater( $value, $post_id, $field ){
	$i=0;
    foreach($value as $v){
    	$enabledbtn = 0;
    	if($v['field_5f311d2014a89'] == 1){
			$enabledbtn += 1;
		}
		if($v['field_5f311d2f14a8a'] == 1){
			$enabledbtn += 1;
		}
		if($v['field_5f311d3d14a8b'] == 1){
			$enabledbtn += 1;
		}
		if($v['field_5f311d6314a8c'] == 1){
			$enabledbtn += 1;
		}
		if($enabledbtn == 1){
			$value[$i]['field_5f56461fc1cf5'] = 'col-md-6';
		}
		if($enabledbtn == 2){
			$value[$i]['field_5f56461fc1cf5'] = 'col-md-6';
		}
		if($enabledbtn == 3){
			$value[$i]['field_5f56461fc1cf5'] = 'col-md-4';
		}
		$i++;
    }
    return $value;

}

add_filter('acf/load_value/name=button_enabled', 'my_acf_set_repeater', 10, 3);

add_filter('acf/load_field/key=field_5f56461fc1cf5', 'acf_read_only');
function acf_read_only($field) {
	$field['readonly'] = 1;
	return $field;
}

function geteventtext($title,$uid){
	global $wpdb;
	$result = $wpdb->get_results("SELECT * FROM register_for_event WHERE event_name LIKE '%".$title."%' AND uid = '".$uid."'");
	return $result;
}

function register_for_event(){
	$event_position = $_POST['position'];
	$user_id = intval($_POST['uid']);
	$user = get_userdata($user_id);
	liveeventdetails($event_position,$user_id,$user->data->user_email,$user->countryCode.$user->mobile);
	echo generateJSON('success','','');
	wp_die();
}

function liveeventdetails($event_position,$user_id,$user_email,$user_mobile){
	global $wpdb;
	$cdate = date('Y-m-d H:i:s');
	$i = 0; 
	while(have_rows('custom_shreans_events',32466)) : the_row();
		if($i == $event_position){
			$title = get_sub_field('event_title');
			$date = get_sub_field('event_date');
			$time = get_sub_field('event_time');
			$zoomlink = get_sub_field('zoom_link');
		}
		$i++;
	endwhile;
	$emsg = "Hello,<br/><br/>Thank you for registering for the ".$title.".<br/><br/>Online Session Details:<br/>Title: ".$title."<br/>Date: ".$date."<br/>Time: ".$time."<br/>Zoom Link: ".$zoomlink."<br/><br/><b>How to Join?</b><br/>- Click on the zoom link on the scheduled date and time<br/>- Enter your registered email ID<br/>- Attend the session<br/><br/>In case of any questions, email us on support@thriive.in<br/><br/>We are eager to see you at the session!<br/><br/>Love & Light,<br/><br/>Team Thriive";
	sendEmail($user_email, "Registration successful for ".$title, $emsg);
	$zlink = generateBitlyURL($zoomlink)['data']['url'];
	$msg = "Your registration for the ".$title." confirmed. Join on ".$date." @ ".$time.". Zoom link ".$zlink;
	sendSMS($user->countryCode.$user->mobile,$msg);
	$data = array(
		'uid' => $user_id,
		'uemail' => $user_email,
		'umobile' => $user_mobile,
		'event_name' => $title,
		'created_date' => $cdate
	);
	return $wpdb->insert('register_for_event',$data);
}

function otp_login(){
	$countrycode = intval($_POST['country_code']);
	$mobileNumber = intval($_POST['mobile_number']);
	global $wpdb;
	if(!empty($mobileNumber)){
		$query = "SELECT user_id FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
		$isMobileExist = $wpdb->get_var($query);
	}
	if(!empty($mobileNumber) && !empty($isMobileExist)) {
		$user_id = $isMobileExist;
		$generatedPin = generatePIN();
		update_user_meta($user_id, 'mobileOTP', $generatedPin);
		$user_email = get_user_meta($user_id,'nickname',true);
		//$msg = $generatedPin . ' is the one time password (OTP) for your online registration on Thriive.in. This is usable once &amp valid for 15 min';
		$msg = $generatedPin . ' is the one time password (OTP) for your online registration as Therapist with Thriive Art & Soul. This is usable once & valid for 15 min from the request. PLEASE DO NOT SHARE WITH ANYONE.';  
		$tempid="1007595354699826301";		
		$result = sendSMS($countrycode . $mobileNumber,$msg ,$tempid);
		
		sendEmail($user_email, "one time password (OTP) for your online login on Thriive.in", $msg);
		echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
		wp_die();
	} else {
		 echo generateJSON('error','This phone number is not registered with us.','');
		 wp_die();
	}
	wp_die();
}

// function otp_verify_user(){
// 	$countrycode = intval($_POST['country_code']);
// 	$mobileNumber = intval($_POST['mobile_number']);
// 	global $wpdb;
// 	if(!empty($mobileNumber)){
// 		$query = "SELECT user_id FROM wp_usermeta WHERE `meta_key` = 'mobile' AND `meta_value` LIKE '%$mobileNumber%'";
// 		$isMobileExist = $wpdb->get_var($query);
// 	}
// 	if(!empty($mobileNumber)) {
// 		$user_id = $isMobileExist;
// 		$generatedPin = generatePIN();
// 		update_user_meta($user_id, 'mobileOTP', $generatedPin);
// 		$msg = $generatedPin . ' is the one time password (OTP) for your online registration on Thriive.in. This is usable once & valid for 15 min';
// 		$result = sendSMS($countrycode . $mobileNumber, $msg);
// 		echo generateJSON('success','OTP sent on '.$mobileNumber, $user_id.'-'.$countrycode.'-'.$mobileNumber);
// 		wp_die();
// 	} else {
// 		 echo generateJSON('error','','');
// 		 wp_die();
// 	}
// 	wp_die();
// }

function otp_login_verify(){
	$otp =  intval($_POST['otp']);
	$user_id = intval($_POST['user_id']);
	$dbotp = get_user_meta($user_id,'mobileOTP',true);
	$user = get_userdata($user_id);
	if(!empty($otp)){
		if($dbotp==$otp){
			update_user_meta($user_id, 'is_mobile_verify',  1);
			echo generateJSON('success','You have verify your mobile number successfully.',$user_id);
			auto_login_new_user($user_id);
			wp_die();
		} else {
			echo generateJSON('error','Entered OTP doesn’t match.',$user_id);
			wp_die();
		}
	} else {
		echo generateJSON('error','OTP is required.',$user_id);
			wp_die();
	}
}

function call_astro_api($resource_name, $data = array()){
	$apiEndPoint = "http://json.astrologyapi.com/v1";
    $serviceUrl = $apiEndPoint.'/'.$resource_name.'/';
    $authData = '614214'.":".'6d2112a6a1cb430434c6a2710fa1f9ec';

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $serviceUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    $header[] = 'Authorization: Basic '. base64_encode($authData);
    /* Setting the Language of Response */
    if( $language != NULL ) {
        array_push( $header , 'Accept-Language: ' .$language );
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}

function aa_get_tzone($lat, $lng, $date){
	$data = array(
	    'latitude' => $lat,
	    'longitude' => $lng,
	    'date' => "$date"
	);
	$response = json_decode(call_astro_api('timezone_with_dst', $data),true);
	return $response['timezone'];
}

function aa_birth_details(){
	$date = $_POST['month'].'-'.$_POST['day'].'-'.$_POST['year'];
	$tzone = aa_get_tzone($_POST['lat'], $_POST['lon'], $date);
	$data = array(
		'day' => intval($_POST['day']),
		'month' => intval($_POST['month']),
		'year' => intval($_POST['year']),
		'hour' => intval($_POST['hour']),
		'min' => intval($_POST['minutes']),
		'lat' => floatval($_POST['lat']),
		'lon' => floatval($_POST['lon']),
		'tzone' => floatval($tzone)
	);
	echo '<pre>'; print_r(json_decode(call_astro_api('birth_details', $data),true)); echo '</pre>';
	wp_die();
}

function add_acf_menu_pages(){
    acf_add_options_sub_page(array(
        'page_title' => 'Business Module',
        'menu_title' => 'Business Module',
        'parent_slug' => 'options-settings',
    ));
}
add_action('acf/init', 'add_acf_menu_pages');

function saveFreeOCData($uid,$firstname,$email,$tid,$tfirst_name,$temail,$action,$productinfo,$amount,$freemins,$sendemail,$book_date_time,$tpid,$umobile,$tmobile){
	global $wpdb;
	$date = date("Y-m-d H:i:s");
	$data = array(
		'uid' => $uid,
		'uname'	=> $firstname,
		'uemail' => $email,
		'tid' => $tid,
		'tname'	=> $tfirst_name,
		'temail' => $temail,
		'action' => $action,
		'therapy' => $productinfo,
		'amount' => $amount,
		'created_date' => $date
	);
	$isexist = $wpdb->get_var("SELECT count(*) FROM `free_online_consultation` WHERE uid = '$uid'");
	if($isexist == 0){
		$wpdb->insert("free_online_consultation",$data);
		$lastid = $wpdb->insert_id;
		$session_count = get_post_meta($tpid, 'free_session_count',true);
		$udata = array('booked_status' => '1', 'booked_date' => $date, 'booked_therapy' => $productinfo, 'booked_therapist' => $tfirst_name);
		$wpdb->update("register_for_free_session",$udata,array('uid'=>$uid));
		if($session_count > 0){
			update_post_meta($tpid,'free_session_count', $session_count-1);
			update_post_meta($tpid,'active_for_free_session',0);
		}
		
		if(strpos($firstname, "@") !== false){
		    $uname = explode('@', $firstname)[0];
		} else{
		    $uname = $firstname;
		}
		if($action == 'call'){
			$result = oc_assign_masked_number_to_user($temail,$email);
			$tempid = '1007631596005333862';
			$tmsg = "Your client ".$uname." has taken free session and is waiting for a session with you. Please call on the ".$result['masked_number']." to connect with client within the next 2 minutes on thriive.in";
			sendSMS($tmobile,$tmsg,$tempid);
			$tsubject = "Action required in 2 mins";
		    $tmsg = "Hello ".$tfirst_name.",<br/>Your client ".$uname." is waiting for a session with you.<br/><br/>Call needs to begin within 2 minutes<br/><br/>Connect NOW with the client on ".$result['masked_number']."<br/><br/> Please Note:<br/>There is no auto disconnect for calls. It is your responsibility to end the session within the stipulated time.<br/><br/>Thriive will only make payment for the number of minutes purchased by the client.<br/><br/>You can encourage your client to extend the session, a link for which will be shared with the client after this call ends.<br/><br/>Love and Light,<br/>Team Thriive";
		    sendEmail($temail, $tsubject, $tmsg);
		}	
		if($sendemail == "yes"){
			if($action == 'call' && ($productinfo == 'all-page' || $productinfo == 'cosmic-astrology' || $productinfo == 'numerology' || $productinfo == 'tarot-card-reading' || $productinfo == 'angel-reading')){
				$umsg = "Your payment is successful. Get first ".$freemins." minutes FREE*. You will get a call from ".$tfirst_name." within 24 hrs so please keep your phone line free.";
				sendSMS($umobile,$umsg);
				$subject = "Your payment is successful";
			    $msg = "Hello,<br/><br/>Your payment is successful. Get the first ".$freemins." mins are FREE*<br/><br/>Please keep your phone line free. You will receive a call from ".$tfirst_name." soon.<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
			    sendEmail($email, $subject, $msg);
			} 
			if($action == 'call' && ($productinfo == 'counseling-consulting' || $productinfo == 'life-coach' || $productinfo == 'meditation')){
				$umsg = "Your payment is successful. You will get a call from ".$tfirst_name." within 24 hrs so please keep your phone line free.";
				sendSMS($umobile,$umsg);
				$subject = "Your payment is successful"; 
			    $msg = "Hello,<br/><br/>Your payment is successful.<br/><br/>Please keep your phone line free. You will receive a call from ".$tfirst_name." soon.<br/><br/>Love and Light,<br/>Team Thriive<br/><br/>*Terms & conditions apply";
				sendEmail($email, $subject, $msg);
			} 
			$alertmsg = $email." connected via ".$action." to ".$tfirst_name." for free session and for therapy ".$productinfo;
			sendEmail('manishj@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			// sendEmail('accountmanager1@thriive.in','Alert! User made the payment and wants to connect with therapist',$alertmsg);
			//sendSMS('9702917993',$alertmsg);
			// sendSMS('9820686971',$alertmsg);
			// sendSMS('9930502459',$alertmsg);
			// sendSMS('9323322504',$alertmsg);
			// sendSMS('8369415594',$alertmsg);
		}
	}
}

function checkfreesessionbyuser($uid){
	global $wpdb;
	$result = $wpdb->get_row("SELECT count(*) AS count FROM `free_online_consultation` WHERE uid=$uid",OBJECT);
	return $result;
}

function checkuserisallowedfs($uid){
	global $wpdb;
	$result = $wpdb->get_row("SELECT count(*) AS count FROM `register_for_free_session` WHERE uid=$uid",OBJECT);
	return $result;
}

function cron_active_therapist_free_session_3b913877() {
	$ids = array();
    if(have_rows('free_therapist_data', 'option')):
        while(have_rows('free_therapist_data', 'option')): the_row();
            $temp = explode(",",get_sub_field('display_ids'));  
            foreach($temp as $t){
                array_push($ids,$t);
            }
        endwhile;
    endif;
    foreach ($ids as $id) {
    	$session_count = get_post_meta($id, 'free_session_count',true);
    	$is_active = get_post_meta($id, 'active_for_free_session',true);
    	if($session_count > 0 && $is_active == 0){
    		update_post_meta($id,'active_for_free_session',1);
    	}
    }
}

add_action( 'active_therapist_free_session', 'cron_active_therapist_free_session_3b913877', 10, 0 );

function gettherapy_byailment(){
	$tempArr = array();
	$termid = $_POST['ailment'];
	$therapies = get_field("therapies", 'ailment_' . $termid);
	if( have_rows('custom_landing','option') ):
		while ( have_rows('custom_landing','option') ) : the_row();
			$selected_taxonomy = get_sub_field('selected_taxonomy');
			$selected_url = get_sub_field('selected_url');
			foreach($therapies as $therapy){
			if($therapy->term_id == $selected_taxonomy){
				$therapy->custom_link = $selected_url;
				array_push($tempArr, $therapy->name);
			}		
		}
		endwhile;
	endif; 
	echo json_encode($tempArr); 
	wp_die();
}

function savefreesession(){
	$uid = $_POST['uid'];
	global $wpdb;
	$result = $wpdb->get_results("SELECT uid FROM `register_for_free_session` WHERE uid = ".$uid,OBJECT);
	if($result){
		echo generateJSON('error','You are already registered for trial session. Our team will get in touch with you.','');
	} else {
		$date = date('Y-m-d H:i:s');
		$data = array(
			'uid' => $_POST['uid'],
			'uname' => $_POST['uname'],
			'uemail' => $_POST['uemail'],
			'umobile' => $_POST['umobile'],
			'select_ailment' => $_POST['select_ailment'],
			'type_ailment' => $_POST['type_ailment'],
			'therapies' => $_POST['therapies'],
			'created_date' => $date
		);
		// $uid = $_POST['uid'];
		// $uname = $_POST['uname'];
		// $uemail = $_POST['uemail'];
		// $umobile = $_POST['umobile'];
		// $ailment = $_POST['ailment'];
		// $therapies = $_POST['therapies'];
		$wpdb->insert('register_for_free_session',$data);
		$name = $_POST['uname'];
		$email = $_POST['uemail'];
		$mob = $_POST['umobile'];
		$subject = "Registration for free session is successfully completed";
		$body = "Hi $name,<br/><br/>Thank you for registering for a free session with Thriive.<br/>Our team will get in touch with you super soon!<br/><br/>Love & Light,<br/>Team Thriive";
		sendEmail($email,$subject,$body);
		$msg = "Thank you for registering for a free session with Thriive! Our team will get in touch with you soon.";
		sendSMS($mob,$msg);
		echo generateJSON('success','','');
	}	
	wp_die();
}

add_action('after_setup_theme','remove_core_updates');
function remove_core_updates()
{
 if(! current_user_can('update_core')){return;}
 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
 add_filter('pre_option_update_core','__return_null');
 add_filter('pre_site_transient_update_core','__return_null');
}
?>