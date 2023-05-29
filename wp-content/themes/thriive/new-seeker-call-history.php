<?php /* Template Name: New Seeker Call History */ 
if (!is_user_logged_in()) {
	wp_redirect('/login/');
	exit();
}
//get_header(); 
include_once get_stylesheet_directory().'/new-header.php';
?>
<section class="section form-element-wrapper">
	<div class="container">
        <div class="row">
            <div class="col-sm-4 text-center col-md-12 mx-sm-auto">
                <a href="/my-account-page" class="back-btn"> <span class="fa fa-angle-left fa-lg"> </span> BACK </a>
                <h3 class="w-100">User Call History</h3>
            </div>
            
            <?php if (is_mobile()) { ?>
                <div class="section text-center col-md-12">
			        <div class="col-md-12">
			            <?php $result = getConnectedData('seeker',$current_user->ID); ?>
			            <table class="table table-bordered table-striped" style="width:100%">
			               
			                <?php foreach ($result as $r){ ?>
			                <tr>
			                    <th>Therapist Name</th>
			                    <td><a href="<?php echo $r['receiver_url'];?>"><?php echo $r['receiver_name']; ?></a></td>
			                </tr>
			                <tr>
			                    <th>Communication Mode</th>
			                    <td><?php echo 'Call'; ?></td>
			                </tr>
			                <tr>
			                    <th>Date</th>
			                    <td><?php echo $r['timestamp']; ?></td>
			                </tr>
			                <tr>
			                    <th>Reveiw</th>
			                    <td><a href="<?php echo $r['r_review_url']; ?>" class=" btn btn_common btnMobi">Add Review</a></td>
			                </tr>
			                <?php } ?>
			            </table>
			        </div>
		        </div>
            <?php }else{ ?>
                <div class="section text-center col-md-12">
			        <div class="col-md-12">
			            <?php $result = getConnectedData('seeker',$current_user->ID); ?>
			            <table class="table table-bordered table-striped" style="width:100%">
			                <tr>
			                    <th>Therapist Name</th>
			                    <th>Communication Mode</th>
			                    <th>Date</th>
			                    <th>Reveiw</th>
			                </tr>
			                <?php foreach ($result as $r){ ?>
			                <tr>
			                    <td><a href="<?php echo $r['receiver_url'];?>"><?php echo $r['receiver_name']; ?></a></td>
			                    <td><?php echo 'Call'; ?></td>
			                    <td><?php echo $r['timestamp']; ?></td>
			                    <td><a href="<?php echo $r['r_review_url']; ?>" class=" btn btn_common btnMobi">Add Review</a></td>
			                </tr>
			                <?php } ?>
			            </table>
			        </div>
		        </div>
            <?php }?>
        </div>
	</div>
</section>

<?php 
	include_once get_stylesheet_directory().'/new-footer.php';
	//get_footer();
?>