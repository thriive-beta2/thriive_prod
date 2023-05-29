<?php /* Template Name: knowlarity-calls-dash */

global $wpdb;


$today = date('Y-m-d');
$query = "SELECT * FROM knowlarity_after_call WHERE call_date='$today' ORDER BY call_time";
$res = $wpdb->get_results($query,ARRAY_A);


$call_uuid_array = array();
$call_missed_user = array();
$call_missed_therapist = array();
$call_successful = array();
$call_matched_array = array();
$repeat_string_array = array();
$missed_string_array = array();
$missed_therapist_array = array();
$successfull_array = array();
$user_call_stat = array();
$repeat_string = '';
$OR_string = '';

foreach($res as $key){
	$curr_num = $key['customer_number'];
	$repeat_count = 0;
	foreach($res as $key1){
		if($curr_num == $key1['customer_number']){
			$repeat_count++;
		}
	}
	$repeat_string_array[$key['customer_number']] = $key['customer_number'].'('.$repeat_count.')';
	$repeat_string .= $key['customer_number'].'('.$repeat_count.'),';
}


//print_r($repeat_string_array);


foreach($res as $key){
	$curr_num = $key['customer_number'];
	$not_connected_count = 0;
	$connected_count = 0;
	foreach($res as $key1){
		if($curr_num==$key1['customer_number'] AND $key1['call_status']=='Connected' AND($key1['call_transfer_status']=='Not Connected' OR $key1['call_transfer_status']=='Missed')){
				$not_connected_count++;
				$user_call_stat[$key['customer_number']]['customer_number'] = $key1['customer_number'];
				$user_call_stat[$key['customer_number']]['missed'] = $not_connected_count;
				if(!$user_call_stat[$key['customer_number']]['connected']){
					$user_call_stat[$key['customer_number']]['connected'] = 0;
				}
					
		}else if($curr_num==$key1['customer_number'] AND $key1['call_status']=='Connected' AND $key1['call_transfer_status']=='Connected'){
				$connected_count++;
				$user_call_stat[$key['customer_number']]['customer_number'] = $key1['customer_number'];
				$user_call_stat[$key['customer_number']]['connected'] = $connected_count;
				if(!$user_call_stat[$key['customer_number']]['missed']){
					$user_call_stat[$key['customer_number']]['missed'] = 0;
				}

		}
				}
	}



//print_r($user_call_stat);







for($i=0;$i<count($res);$i++){
	$call_uuid_array[$i] = $res[$i]['call_uuid'];
	$OR_string .= "'".$res[$i]['call_uuid']."'".' OR ';
	if($res[$i]['call_status']=='Connected' AND ($res[$i]['call_transfer_status']=='Not Connected' OR $res[$i]['call_transfer_status']=='Missed')){
			$call_missed_user[$i] = $res[$i];
			$number = $res[$i]	;
	}
	if($res[$i]['call_status']=='Not Connected'){
			$call_missed_therapist[$i] = $res[$i];
			$call_id = $res[$i]['call_uuid'];	
			$query = "SELECT * FROM online_consultation WHERE call_id LIKE '%$call_id%'";
			//echo $query.'<br>';
			$result = $wpdb->get_results($query,ARRAY_A);
			if(count($result)>0){
				$call_missed_therapist[$i]['tname'] = $result[0]['tname'];
				$call_missed_therapist[$i]['uname'] = $result[0]['uname'];
			}

	}
	if($res[$i]['call_status']=='Connected' AND $res[$i]['call_transfer_status']=='Connected'){
			$call_successful[$i] = $res[$i];	
	}
	$call_id = $res[$i]['call_uuid'];
	$query = "SELECT * FROM online_consultation WHERE call_id LIKE '%$call_id%'";
	$result = $wpdb->get_results($query,ARRAY_A);
	if(count($result)>0){
		$call_matched_array[$i]=$result;
	}
}

foreach($call_missed_user as $key){
	$curr_num = $key['customer_number'];
	$repeat_count = 0;
	foreach($call_missed_user as $key1){
		if($curr_num == $key1['customer_number']){
			$repeat_count++;
		}
	}
	$missed_string_array[$key['customer_number']] = $key['customer_number'].'('.$repeat_count.')';
}


foreach($call_missed_therapist as $key){
	$curr_num = $key['customer_number'];
	$repeat_count = 0;
	foreach($call_missed_therapist as $key1){
		if($curr_num == $key1['customer_number']){
			$repeat_count++;
		}
	}
	$missed_therapist_array[$key['customer_number']] = $key['customer_number'].'('.$repeat_count.')';
}

foreach($call_successful as $key){
	$curr_num = $key['customer_number'];
	$repeat_count = 0;
	foreach($call_successful as $key1){
		if($curr_num == $key1['customer_number']){
			$repeat_count++;
		}
	}
	$successfull_array[$key['customer_number']] = $key['customer_number'].'('.$repeat_count.')';
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>Daily Calls</title>
	<style type="text/css">
		*{
			padding: 0;
			margin:0;
		}
		.header_wrap{
			width:100%;
			background-color: #8B8B8B;
			color:#fff;
			text-align: center;
			padding:25px;
		}
		.total_calls{
			margin:0 auto;
			font-size: 25px;
			border:solid 3px;
		}
		.total_calls td{
			padding:10px;
		}

		.total_calls tr:nth-child(even){
			background-color: #C8C8C8;
		}
		.desc_calls{
			font-size:16px;
			border:solid 3px;			
		}
		.desc_calls tr:nth-child(even){
			background-color: #C8C8C8;
		}
		.desc_calls td{
			padding:10px;
		}


	</style>
</head>
<body>
<header><div class="header_wrap"><h1>Daily Calls From Knowlarity</h1></div></header>
<table class="total_calls">
	<tr><td colspan="3" style="text-align: center;"> <?php echo $today;?></td></tr>
	<tr><td><p>Total calls Placed</p></td><td style="color:#0006FF;"><?php echo count($call_uuid_array);?></td><td style="color:red"><?php echo count($repeat_string_array); ?></td></tr>
	<tr><td><p>Total calls missed or rejected by user</p></td><td style="color:#0006FF;"><?php echo count($call_missed_user);?></td><td style="color:red"><?php echo count($missed_string_array);?></td></tr>
	<tr><td><p>Total calls missed or rejected by Therapist</p></td><td style="color:#0006FF;"><?php echo count($call_missed_therapist);?></td><td style="color:red"><?php echo count($missed_therapist_array);?></td></tr>
	<tr><td><p>Total calls Successfully connected</p></td><td style="color:#0006FF;"><?php echo count($call_successful);?></td><td style="color:red"><?php echo count($successfull_array);?></td></tr>
</table>
<table class="total_calls">
	<tr><td><p style="color:blue">Blue->Total Calls</p></td><td style="color:#0006FF;"><p style="color:red">Red->Manual Calls</p></td><td style="color:red"></td></tr>
	<tr><td><p style="color:blue"><a href="https://www.thriive.in/knowlarity-calls-dash?desc=1">User Statics</a></p></td><td style="color:#0006FF;"></td><td style="color:red"></td></tr>
</table>


<br><br><br><br><br><br><br><br>

<?php if($_GET['desc']){
	if($_GET['desc']==2){
?>

<div class="desc_calls_cont">
<table class="desc_calls">
<tr><td colspan="3" style="text-align: center;">Matched Calls</td></tr>
<tr style="outline:3px solid;"><td><b><p>Therapist</p></td><td><b><p>USER</p></td><td style="color:#0006FF;">TIME</b></td></tr>
<?php foreach ($call_matched_array as $key){?>
	<tr><td><p><?php echo $key[0]['tname'];?></p></td><td><p><?php echo $key[0]['uname'];?></p></td><td style="color:#0006FF;"></td></tr>
<?php }?>
</table>
</div>

<?php
	}
}?>

<?php if($_GET['desc']){
	if($_GET['desc']==1){
?>

<div class="desc_calls_cont">
<table class="desc_calls">
<tr><td colspan="3" style="text-align: center;">USER STATICS</td></tr>
<tr style="outline:3px solid;"><td><b><p>USER</p></td><td><b><p>CONNECTED</p></td><td style="color:#0006FF;">NOT-CONNECTED</b></td></tr>
<?php foreach ($user_call_stat as $key){?>
	<tr><td><p><?php echo $key['customer_number'];?></p></td><td><p><?php echo $key['connected'];?></p></td><td style="color:#0006FF;"><p><?php echo $key['missed'];?></p></td></tr>
<?php }?>
</table>
</div>

<?php
	}
}?>





</body>
</html>