<?php /* Template Name: Therapist Call History */ 
if (!is_user_logged_in()) {
	wp_redirect('/login/');
	exit();
}
get_header(); ?>
<section class="section form-element-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center col-md-12 mx-sm-auto">
                <a href="/therapist-account-dashboard" class="back-btn"><span class="fa fa-angle-left fa-lg"> </span> BACK</a>
                <h3 class="w-100">Therapist Call History</h3>
            </div>
            <?php if (is_mobile()) { ?>
                <div class="section text-center">
                <div class="col-md-12">
                    <?php $result = getConnectedData('therapist',$current_user->ID); ?>
                    <table class="table table-responsive table-bordered table-striped" style="width:100%">
                        <?php foreach ($result as $r){ ?>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $r['receiver_name']; ?></td>
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
                            <th>Review</th>
                            <td class="feedback">
                                <?php if($r['r_rating'] && $r['r_review']){
					    			for($i=1;$i<=$r['r_rating'];$i++){ ?>
                                <span class="fa fa-star"></span>
                                <?php } 
			        				$leftstar = 5 - (int)$r['r_rating'];
			        				for($i=1;$i<=$leftstar;$i++){ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } 
					        		echo $r['r_review'];
					    		} else { ?>
                                <form method="POST" id="surbytherapist_<?php echo $r['receiver_id']; ?>">
                                    <div id="msg_<?php echo $r['receiver_id']; ?>"></div>
                                    <div class="rate">
                                        <input type="radio" id="rate5_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="5" required />
                                        <label for="rate5_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate4_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="4" />
                                        <label for="rate4_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate3_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="3" />
                                        <label for="rate3_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate2_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="2" />
                                        <label for="rate2_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate1_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="1" />
                                        <label for="rate1_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                    </div>
                                    <textarea name="review" id="review_<?php echo $r['receiver_id']; ?>"></textarea>
                                    <input type="hidden" name="caller_id" value="<?php echo $r['caller_id']; ?>" />
                                    <input type="hidden" name="receiver_id" value="<?php echo $r['receiver_id']; ?>" />
                                    <input type="submit" name="user_review" value="Save Review" id="<?php echo $r['receiver_id']; ?>" class="user_review btn btn-primary btnMobi">
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr style="background-color:#4f047580">
                            <td colspan="2"></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <?php }else{ ?>
                <div class="section text-center">
                <div class="col-12">
                    <?php $result = getConnectedData('therapist',$current_user->ID); ?>
                    <table class="table table-bordered table-striped" style="width:100%">
                        <tr>
                            <th>Name</th>
                            <th>Communication Mode</th>
                            <th>Date</th>
                            <th>Review</th>
                        </tr>
                        <?php foreach ($result as $r){ ?>
                        <tr>
                            <td><?php echo $r['receiver_name']; ?></td>
                            <td><?php echo 'Call'; ?></td>
                            <td><?php echo $r['timestamp']; ?></td>
                            <td class="feedback">
                                <?php if($r['r_rating'] && $r['r_review']){
					    			for($i=1;$i<=$r['r_rating'];$i++){ ?>
                                <span class="fa fa-star"></span>
                                <?php } 
			        				$leftstar = 5 - (int)$r['r_rating'];
			        				for($i=1;$i<=$leftstar;$i++){ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } 
					        		echo $r['r_review'];
					    		} else { ?>
                                <form method="POST" id="surbytherapist_<?php echo $r['receiver_id']; ?>">
                                    <div id="msg_<?php echo $r['receiver_id']; ?>"></div>
                                    <div class="rate">
                                        <input type="radio" id="rate5_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="5" required />
                                        <label for="rate5_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate4_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="4" />
                                        <label for="rate4_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate3_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="3" />
                                        <label for="rate3_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate2_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="2" />
                                        <label for="rate2_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                        <input type="radio" id="rate1_hidden_<?php echo $r['receiver_id']; ?>" name="rate" value="1" />
                                        <label for="rate1_hidden_<?php echo $r['receiver_id']; ?>" title="rate"></label>
                                    </div>
                                    <textarea name="review" id="review_<?php echo $r['receiver_id']; ?>"></textarea>
                                    <input type="hidden" name="caller_id" value="<?php echo $r['caller_id']; ?>" />
                                    <input type="hidden" name="receiver_id" value="<?php echo $r['receiver_id']; ?>" />
                                    <input type="submit" name="user_review" value="Save Review" id="<?php echo $r['receiver_id']; ?>"  class="user_review btn btn-primary btnMobi">
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>