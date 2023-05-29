<?php /* Template Name: Session Details */ 

session_start();?>
<?php




	if (!is_user_logged_in()) 
	{ 
		wp_redirect('/login/');
		exit();
	} else {
		$current_user = wp_get_current_user();
		//if user's is Therapist then redirect to therapist dashboard 
		/* if(in_array("therapist", $current_user->roles))
		{
			wp_redirect('/therapist-account-dashboard/');
			exit();
		} */
			if (strpos($_SESSION['chat_page'], '/therapist') !== false) {
				echo $site_referer = $_SESSION['chat_page'];
				unset($_SESSION['chat_page']);
				wp_redirect($site_referer);
				exit();
   }
	}
?>
<?php 
	//get_header(); 
	include_once get_stylesheet_directory().'/new-header.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		clevertap.profile.push({
			"Site": {
				"Name": "<?php echo $current_user->first_name . ' ' . $current_user->last_name; ?>",
				"Email": "<?php echo $current_user->user_email; ?>",
				"Mobile": "<?php echo $current_user->mobile; ?>",
				"DOB": new Date("<?php echo $current_user->dob; ?>"),
		   		"Role": "Subscriber",
		 	}
		});
	});
</script>

<div class="banner-home">
	<div class="container">	
		<div id="therapyres">	
			
			<section class="topreadingList">
			<a href="/my-account-page" class="back-btn"> < BACK </a>
				
<?php
	$sessiondata = $wpdb->get_results("SELECT o.id,o.remaining_session,o.therapy_name,o.tid,o.uid,o.package,o.pkgdescription,o.payment_txnid,o.session_duration FROM online_consultation o WHERE o.uid = '". $current_user->ID ."'  AND payment_status = 'success'  GROUP BY o.payment_txnid    ");
	if(!empty($sessiondata)){
		echo "<h2>Session Completed</h2>";
		$duparr = array();	
		foreach($sessiondata as $sd){
			
			
			//$val = 	$sd->payment_txnid;
			//if(!in_array($val,$duparr)){
				//$duparr[] = $val;
				$posts = $wpdb->get_row( 
					"SELECT DISTINCT p.ID FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.post_author = '". $sd->tid ."'"
				);
			
				if($posts) :
					
						$tempArr = $available = $busy = array();
						
						$post = get_post($posts->ID);
						
						set_query_var('post', $post);
						
						$remaindetails = $wpdb->get_row("SELECT COALESCE(sum(remaining_session), 0) as remaining_session FROM online_consultation WHERE   payment_txnid = '". $sd->payment_txnid ."' AND payment_status = 'success' ");
							
						set_query_var('onlinedetails',$sd);
						set_query_var('therapy',array($sd->therapy_name));
						get_template_part('template-parts/session-details-content');
						wp_reset_postdata(); 
				endif;
			//}
		}
	}
	 ?>			
				
				</section>
			</div>	
		</div>
	</div>		
<style>
	
	.btn_common,.btn-info,.btn_link1,.btn-primary,.anch_link1 {
	    color: #fff !important;
	    background-color: #19194a !important;
	    border-color: #19194a !important;
	    border-top-right-radius: 20px !important;
	    border-bottom-left-radius: 20px !important;
	    padding: 6px 30px !important;
	    margin: 5%;
	}
	.btn_common:hover,.btn-info:hover,.btn_link1:hover,.btn-primary:hover,.anch_link1:hover {
	    color: #19194a !important;
	    background-color:#fff  !important;
	    border-color: #19194a !important;
	    border-top-right-radius: 20px !important;
	    border-bottom-left-radius: 20px !important;
	    padding: 6px 30px !important;
	    margin: 5%;
	}
.user-sub-action-wrapper {
    color: #fff;
    margin: 0;
    padding: 5px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    background: #f9f9f9;
    display: none;
    position: absolute;
    float: none;
    right: 0;
    left: auto;
    width: 267px;
    z-index: 99999;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
    top: 22px;
    border-radius: 10px;
}
.user-sub-action-wrapper .avatar_img {
    position: absolute;
    left: 10px;
    top: 9px;
    width: 40px;
    height: 40px;
    border-radius: 50px;
}
.user-sub-action-wrapper ul li span {
    font-size: 16px;
    display: block;
    color: #000;
}
.btn_box1 {
    width: 22%;
    min-height: 82px;
    border-radius: 5px;
    background: none !important;
    color: #4f0475 !important;
    padding: 10px !important;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    margin: 0px 1% 2% 0;
    border: 1px solid #4d4d4f;
}
.my-event-btn {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    align-content: center;
}
.banner-home a.btn.secondary-btn.btn_box1 {
    width: 23.6%;
}
.icon_txt1 {
    display: inline-block;
    text-align: center;
    font-size: 13px;
    line-height: 20px;
    width: 100%;
    margin: 10px 0 0 0;
    padding: 0;
}
@media (max-width:600px) {
	.banner-home a.btn.secondary-btn.btn_box1 {
	    width: 49%;
	}
	div.active{
		display: block;
	}
}


.user-sub-action-wrapper ul li a{
	color: #000 !important;
}

.myacctn{
	font-size:22px !important;
}

body {
    color: unset;
    overflow-x: hidden;
    font-family: "Work Sans",'Rupee_Foradian', sans-serif !important;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Work Sans",'Rupee_Foradian', sans-serif !important;
    color: #153483;
}



</style>

<style type="text/css">
		
				.main-messages{
			width:320px;
			height:50%;
			background-color: #F7F4F9;
			position:fixed;
			bottom:0%;
			right:10px;
			border:1px solid;
		}
		.messages{
			overflow-y: scroll;
			overflow-x: hidden;
			width:100%;
			height:80%;
			position:relative;
			background-color: #F7F4F9;
		}

		.message-left{
			margin-left:0;
			background-color: #E5EAED;
			width:max-content;
			max-width: 85%;
			min-width: 40%;
			padding:3px;
			border-radius:5px;
			color:#6B2E8B;
		}
		.message-left img{
			width:50px;
			height:50px;
		}
		
		.message-right{
			margin-right: 0;
			margin-left: auto;
			width:max-content;
			max-width: 85%;
			min-width: 40%;
			background-color: #E5EAED;
			padding: 3px;
			border-radius:5px;
			color:#6B2E8B;			
		}
		.message-right img{
			width:50px;
			height:50px;
		}
		
		.msg{
			position: absolute;
			bottom:3px;
			width:100%;
			background-color: #E5EAED;
			padding:5px;	
			height:3rem;
			overflow: hidden;
			display: flex;
			justify-content: space-evenly;
		}
		.messages-header{
			background-color: #4F0475;
			position:sticky;
			top:0;
			display:flex;
			width: 100%;
			padding:0.5rem;
			justify-content: space-between;
		}
		.file_attatch{
			display:none;
		}
		#click_attatch{
			width: 25px;
		    height: 2.5rem;
		    background-image: url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/attatch.png);
		    background-color: #F7F4F9;
		    background-size: contain;
		    background-position: center;
		    background-repeat: no-repeat;
		    border: none;
		    position: relative;
		    top: 0px;
		    border-top-right-radius: 3rem;
		    border-bottom-right-radius: 3rem;
		}
		#click_attatch:focus{
			border:none;
			outline:none;
		}
		.emoji_icon{
			display: inline-block;
			border-top-left-radius: 5rem;
		    display: inline-block;
		    height: 2.5rem;
		    position: relative;
		    top: -24px;
		    border-bottom-left-radius: 5rem;
		    background-color: #F7F4F9;
		}
		.emoji_icon img{
			position: relative;
    		top: 10px !important;
		}
		.emoji_container{
			display:none;
			position:fixed;
			bottom:43px;
			padding:5px;
		}
		.emojis{
			display:inline-block;
		}
		.input_div{
			background-color: #F7F4F9;
		    border-radius: 18px;
		    width: max-content;
		    display: inline-block;
		    height: 2.4rem;
		    overflow: hidden;
		}
		#send{
			border-radius: 50%;
		    height: 2.5rem;
		    width: 2.5rem;
		    color: #fff;
		    background-color: #4F0475;
		    border:none;
		    outline:none;
		    text-align: center;
		}
		#send:hover{
			background-color: #fff;
			cursor: pointer;
		}
		#send:hover .fa-paper-plane{
			color: #4F0475;
			background-color: #fff;
		}
		#ind-message{
			border: none;
		    outline: none;
		    background-color: #F7F4F9;
		    position: relative;
		    top: -14px;
		    height: 2rem;
		}
		.right_date{
			text-align: right;
			font-size: 10px;
			margin:2px;
		}
		.chat_options{
				display:block;
				position: fixed;
				background-color: red;
				right: 12px;
				display: none;
		}

		@media screen and (max-width:767px) and (min-width:320px){
		.main-messages{
			height:70%;
		}
		}

	</style>



<script src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/scripts/chat-script.js"></script>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>