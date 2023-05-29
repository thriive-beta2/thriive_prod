<?php /* Template Name: New User chat History */ ?>
<?php 
	if (!is_user_logged_in()) {
		wp_redirect('/login/');
		exit();
	} 
?>
<?php 
	include_once get_stylesheet_directory().'/new-header.php';
	//get_header(); ?> 

<section class="section form-element-wrapper">
	<div class="conatiner">
		<div class="row">
			<div class="col-md-1 col-xs-12"></div>
			<div class="col-md-10 col-xs-12">
				<div class="col-sm-12 text-center col-12 mx-sm-auto mt-5">
					<a href="/my-account-page" class="back-btn"> < BACK </a>
					<h3 class="w-100">My Online Consultation</h3>
				</div>
					<div class="section mx-auto" id= "">
					 <?php   
					 	echo user_chat_history(); 
					  	echo user_chat_history_mobile(); 
					 ?>
					</div>
			<div class="col-md-1 col-xs-12"></div>
		</div>
<div class="fieldje field-3">
<p>
<span></span>
</p>
</div>

<?php

if(isset($_GET['to_user']))
{
  $to_user = $_GET['to_user'];

export_csv_single($to_user);
}

				?>
				 </div>
		</div>
</section>
<div style="clear: both;"></div>

<script>
  $('#form').parsley();
</script>
<style>
	.desk_tablevw tbody tr td[4] {
		width: 200px !important;
	}
	@media (min-width:620px) {
		.desk_tablevw{
			display: inline-block;
		}
		.mobi_tableview{
			display: none !important;
		}
	}
	@media (max-width:600px) {
		.desk_tablevw{
			display: none !important;
		}
		.mobi_tableview{
			display: inline-block !important;
		}
		table{
			border: 1px solid #dee2e6 !important;
		}
	}
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
</style>
<?php 
 include_once get_stylesheet_directory().'/new-footer.php';
	//get_footer(); 
?>