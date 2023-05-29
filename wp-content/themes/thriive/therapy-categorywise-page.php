<?php /* Template Name: Therapy Categorywise Page */ 

//wp_head();
$tab = $_POST['tab'];
if($tab == 1){
	$reader = 'silver-readers';
	$label = 'Silver Readers';
}elseif($tab == 2){
	$reader = 'gold-readers';
	$label = 'Gold Readers';
}	

?>

<h1 class="och1title" style="margin-bottom: 10px !important;"><i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  Consult Best <?php echo $label; ?> Online <i> <img style="width:10px;height:10px;" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg"/></i>  </h1>
	<?php if(have_rows('therapist_data', 'option')):
		while(have_rows('therapist_data', 'option')): the_row();
			if($reader == get_sub_field('taxonomy')->slug){
				$ids = get_sub_field('display_ids');  
			}
		endwhile;
	endif;
	$i =0;
	$posts_per_page = 4; 
	$start = 0;
	$paged = get_query_var( 'paged') ? get_query_var( 'paged', 1 ) : 1; // Current page number
	$start = ($paged-1)*$posts_per_page;
	$idsfilter = array();
	
	if($ids != ""){
		$ids = explode(",",$ids); 
	}
	foreach($ids as $id){
		$idsfilter[] = $id;
	} 
	
	$idstr = implode(",",$idsfilter);
	
	$getPost = $wpdb->get_results( 
		"SELECT DISTINCT p.ID,p.post_author FROM wp_posts AS p WHERE p.post_type = 'therapist' AND (p.post_status = 'publish' OR p.post_status = 'acf-disabled') AND p.ID IN ($idstr)   ORDER BY post_title"
	);
	
	if($getPost) : ?>
		<section class="topreadingList" >
		
			<?php 
				
			$tempArr = $available = $busy = $eavailable = $eavailable1 = $iavailable = $ibusy = $mavailable =  array();
			foreach ( $getPost as $posts ) {
				$post = get_post($posts->ID);
			  
				$getid = $wpdb->get_row("SELECT * FROM therapist_availability_status WHERE tid = '".$posts->post_author ."' AND availability_status != 4");
				if($getid){ 
					$earning_ratio = get_post_meta($posts->ID,'earning_ratio',true);
					if($earning_ratio == 3){		
						array_push($available,$posts->ID);
					}
				}	
			}
			
			$tempArr = array_merge($available,$busy);
			
			$tempArr = array_slice(assoc_array_shuffle($tempArr), 0, 20);
			foreach($tempArr as $t){
				$post = get_post($t);
				setup_postdata( $post );
				set_query_var('therapy',array('tarot-card-reading'));
				set_query_var('category_name',array($reader));
				set_query_var('mi',$i);
				$i++;
				set_query_var( 'inhouse', 0);
				get_template_part( 'template-parts/categorywise-therapist-content');
				
			} 
			//wp_reset_postdata(); ?>		
		</section>
<?php endif; 
function assoc_array_shuffle($array)
{
    $orig = array_flip($array);
    shuffle($array);
    foreach($array AS $key=>$n)
    {
        $data[$n] = $orig[$n];
    }
    return array_flip($data);
}
//wp_footer();

//exit();
?>
<script>
$(".consult_online_link_oc").unbind('click').click(function(e){
	var slug = $(this).data('slug');
    var cat = $(this).data('cat');
    var from_status = $(this).data('from_status');
    if (from_status == 0) {
        $("#login_popup").modal('show');
        return false;
    } else {
		window.location.replace(window.location.protocol + "//" + window.location.host + "/new-payment-apage?q="+slug+"&a=call&t=tarot-card-reading&c="+cat); 
	}	  
	
  });

$(".start_chat_oc").unbind('click').click(function(e){
    var from_status = $(this).data('from_status');
	var slug = $(this).data('slug');
    var cat = $(this).data('cat');
    var from_status = $(this).data('from_status');
    if (from_status == 0) {
        $("#login_popup").modal('show');
        return false;
    } else {
		window.location.replace(window.location.protocol + "//" + window.location.host + "/new-payment-apage?q="+slug+"&a=chat&t=tarot-card-reading&c="+cat); 
	}
});
</script>
