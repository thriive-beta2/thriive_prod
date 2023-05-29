<?php $current_user = wp_get_current_user();

$appointment_details = get_query_var('appointment_details');
//print_r($appointment_details);	
if(strpos($appointment_details->uname, "@") !== false){
	$uname = explode('@', $appointment_details->uname)[0];
} else{
	$uname = $appointment_details->uname;
}							
?>	
		<table class="table table-bordered table-striped ">	
			<tr>
				<td><a href="<?php echo site_url();?>/appointment"><b><?php echo ucwords(str_replace("-"," ",$appointment_details->category_name)).' '.$uname.' '.date("dS M Y",strtotime($appointment_details->book_date)).' '.date("h:i a",strtotime($appointment_details->book_time));?></b></a></td>
			</tr>
			
		</table>	
	
