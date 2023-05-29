<?php /* Template Name: Free Trial Form */ ?>
<?php include_once get_stylesheet_directory().'/new-header.php';?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta  name="viewport" content="width=device-width, initial-scale=1" />
	<style type="text/css">
		.banner-img{
			display:block;
			width:100%;
			height:20rem;
			overflow: hidden;
			text-align: center;
		}
		.trial-text{
			width:60%;
			margin:0 auto;
		}
		.banner-img img{
			width:100%;
			height:100%;
			margin:0 auto;
		}
		.page-content li-div img{
			float: left;
			width:100%;
			height:100%;

		}
		.page-content{
			width:90%;
			margin:0 auto;
		}
			
		.page-content table{
			width:100%;
			margin:0 auto;
			font-size: 1.2rem;
			border-collapse: separate;
			border-spacing: 0 2rem;
		}
		.page-content table td{
			margin-bottom: 2rem;
		}
		.page-content .separator-trial{
			width:100%;
		}
		.page-content .how-img{
			width:40px;
			height:40px;
			background-color: #fff;
		}
		.page-content .img{
			padding-right: 0.3rem;

		}
		.page-content .terms{
			padding: 0px 15px 0px 15px;
		}
		.terms table{
			width:60%;
			position: relative;
		}
		.terms table td{
			background-color: #fff;
		}
		.separator-trial{
			width:100%;
			border:none;
			outline: none;
		}
		.how-it-works{
			padding:0px 15px 0px 15px;
		}
		.how-content {
			padding-left: 5px;
			font-size: 16px;
		}
		
		h3.conti {
			font-size: 16px;
			font-weight: 600;
			text-align: center;
		}
		p.regdesc {
			text-align: left;
			padding: 0px 15px;
		}
		h2.hwt {
			font-size: 22px;
			text-align: center;
			margin-bottom: -15px;
		}
		.termdesc{
			padding-left: 10px;
		}
		.termh{
			font-size:20px;
			text-align:center;
		}
		h2.freereg {
			text-align: center;
			font-size: 30px;
		}
		h3.conti {
			font-size: 16px;
			font-weight: 600;
			text-align: center;
		}
		.vert-line{
			width: 0px;
    		height: 70%;
    		border-left: solid 2px;
    		position: absolute;
    		top: 64px;
    		left: 2rem;
    		z-index: -1;

		}
		.h-i-w{
			position: relative;
    		width: 40%;
    		margin: 0 auto;
		}

@media screen and (max-width:767px) and (min-width:320px){

		
		.page-content{
			width:100%;

		}
		h2.freereg {
			text-align: center;
			font-size: 22px;
		}
		
		.trial-text{
			width:100%;
			margin:0 auto;
			text-align: center;
		}

		.banner-img{
			display:block;
			width:100%;
			height:15rem;
			overflow: hidden;
			text-align: center;
		}
		.tr
		.banner-img img{
			width:100%;
			height:100%;
			margin:0 auto;
		}
		.page-content table{
			width:100%;
			margin:0 auto;
			font-size: 1rem;
			border-collapse: separate;
			border-spacing: 0 2rem;
			border:none;
			outline: none;
		}
		.separator-trial table{
			width:100%;
			box-sizing: none;

		}
		.page-content .img{
			padding-right: 0.2rem;
			vertical-align: center;

		}

		.terms table{
			border:none !important;
			margin-top: -25px;
		}
		.how-it-works{
			border:none !important;
		}
		.imgt{
			vertical-align: top;
		}
		.termh{
			font-size:20px;
			text-align:center;
		}
		.termh{
			font-size:16px;
			text-align:left !important;
		}
		.regdesc{
			font-size:16px;
		}
		.termdesc{
			font-size:13px;
		}
		.h-i-w{
			position: relative;
    		width: 100%;
		}
	
		

}

	@media screen and (max-width:812px){
		.vert-line{
			width: 0px;
    		height: 70%;
    		border-left: solid 2px;
    		position: absolute;
    		top: 64px;
    		left: 2rem;
    		z-index: -1;
		}
	}
		

	</style>
<script>
var c = document.getElementById("selimg");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.moveTo(20, 20);
ctx.lineTo(20, 100);
ctx.stroke();
</script>
</head>
<body>
<section class="banner">
             <div class="col-md-12" style="padding: 0px;">
                 		<a href="https://www.thriive.in/registered-for-free-online-therapy-sessions-from-indias-leading-experts"><img alt="" class="img-responsive banner_image" src="<?php if (is_mobile()) {echo 'https://www.thriive.in/wp-content/uploads/2020/12/Free-Session-Landing-Page-Mobile-Dark-Theme.jpg';
		}else{echo 'https://www.thriive.in/wp-content/uploads/2020/12/Free-Session-Landing-Page-Desktop-Dark-Theme.jpg';}?>" style="border-radius: 0px"/></a>

             </div>
</section>
	<div class="page-content">
		<div class="trial-text"><br>
		<h2 class="freereg">Register For a Free Trial</h2>
		<h3 class="conti">Connect with India's Leading Experts</h3>
		<p class="regdesc">Welcome to Thriive! we are India's No. 1 platform for curated, verified, alternative therapists for your mind, body and soul. Explore the world of wellness, and the range of therapies it offers to help you with all of your physical, mental or emotional issues.</p>
		<a href="https://www.thriive.in/registered-for-free-online-therapy-sessions-from-indias-leading-experts"><button class="btnConsult">Register Now</button></a>
		<div class="seprator mb-3">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg';?>" alt="" class="seperator-trial">
      	</div>
		
		</div>
		<h2 class="hwt">How it works:</h2>
			<div class="h-i-w">
			<table class="how-it-works" >
				<tr><td class="img" id="selimg"><img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Icon-1.svg" class="how-img"></td><td class="how-content">Select a Therapy you would like to try.</td></tr>
				<tr><td class="img selimg" id="selimg"><img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Icon-2.svg" class="how-img"></td><td class="how-content">Choose from a selection of our most popular Therapies<br>OR<br>Try our search engine that will match you with the right Therapy based on your Ailments.</td></tr>
				<tr><td class="img" id="selimg"><img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Icon-3.svg" class="how-img"></td><td class="how-content">Select your preferred Therapies, register and done.</td></tr>
				<tr><td class="img" id="selimg"><img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Icon-4.svg" class="how-img"></td><td class="how-content">You will recieve an SMS and email confirmation.<br>Our team will get in touch with you shortly.</td></tr>
				<div class="vert-line"></div>
			</table>
			</div>
			<div class="terms">
			<h4 class="ftnc">Terms & Conditions</h4>
				<ul class="ftncul">
					<li class="ftncli ">This is a free online discussion/session with a therapist*.</li>
					<li class="ftncli ">This session will be for a maximum of a 15-20 mins*.</li>
					<li class="ftncli ">There are limited trial sessions, subject to availability*.</li>
					<li class="ftncli ">Each person can avail only one free trial session*.</li>
				</ul> 
				<p class="fdtnc" style="font-size: 14px;">*For detailed terms & condition <a href="#">click here</a></p>
		
		</div>
		</div>
		
	
	<a href="https://www.thriive.in/registered-for-free-online-therapy-sessions-from-indias-leading-experts"><button class="btnConsult">Register</button></a>

</body>
</html>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>