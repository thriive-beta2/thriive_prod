<?php /* Template Name: Admin account dashboard */ ?>
<?php $current_user = wp_get_current_user(); 
if($current_user->roles[0] == 'administrator'){ ?>
<?php get_header(); ?>


<!-- new sections starts here -->
<form class="form-inline form_boxes" method="post">

<section class="sec01">
	<?php echo chat_filters();?>
</section>
</form>
<form class="form-inline form_boxes" method="post">
<section class="sec02">
	<?php echo active_conversation();?>
</section>
</form>



<!-- new sections ends here -->







<!--
<div class="badge_wrapper">
	<p><?php echo $current_user->first_name.' '.$current_user->last_name;?></p>
</div>
<div class="badge_wrapper_download"></div>
-->


 <div class="modal fade" id="show_badge" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body">
        	 <button type="button" class="close" data-dismiss="modal">&times;</button>
        	<div class="badge_view_wrapper">
				<p><?php echo $current_user->first_name.' '.$current_user->last_name;?></p>
			</div>
			<div class="text-center">
				<a href="" download="badge_image.png" class="badge-btn" download> <i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD BADGE</a>
			</div>
        	               
        </div>
      </div>
    </div>
 </div>

<?php get_footer(); ?>
<?php } else {
    echo "<h1>Forbidden</h1>";
} ?>