<?php /* Template Name: Therapist Panel */ 
?>
<html>


<head>
<link rel='stylesheet' id='thickbox-css'  href='https://www.thriive.in/wp-includes/js/thickbox/thickbox.css?ver=5.2.2' type='text/css' media='all' />
<script type='text/javascript'>
/* <![CDATA[ */
var thickboxL10n = {"next":"Next >","prev":"< Prev","image":"Image","of":"of","close":"Close","noiframes":"This feature requires inline frames. You have iframes disabled or your browser does not support them.","loadingAnimation":"https:\/\/www.thriive.in\/wp-includes\/js\/thickbox\/loadingAnimation.gif"};
/* ]]> */
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://www.thriive.in/wp-includes/js/thickbox/thickbox.js?ver=3.1-20121105'></script>
</head>


<style>
	#tlist_ind:hover{
		background-color: #6D9B98;
		color: #fff;
		cursor: pointer;
		border-radius: 20px;
	}
</style>
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


if(wp_get_current_user()->caps['administrator']){
  if(wp_get_current_user()->caps['administrator'] != 1){
    die('forbidden'); }
}else{die('forbidden');};



/*
$query = "SELECT DISTINCT tid, MAX(tname) AS tname, MAX(temail) AS temail, COUNT(id) FROM online_consultation WHERE created_date LIKE '%2021-10-01%' GROUP BY tid;";

$res = $wpdb->get_results($query);
//print_r($res);
$increment = 0;
foreach($res as $key){
	$tid = $key->tid;
	$query = "SELECT COUNT(id) as num,id as id FROM online_consultation WHERE created_date LIKE '%2021-10-01%' AND tid = $tid AND tid_accept != 6 AND tid_accept != 1 AND tid_accept != 5";
	$res1 = $wpdb->get_results($query);

	$res[$increment]->rejected = $res1[0]->num;
	$increment++;

//	print_r($res1);echo '<br>';
}
*/














//$created_date = '2021-06-15';

$today = date('Y-m-d');
if(is_null($_GET['val'])){
	$_GET['val'] = 1;
}


if($_GET['val'] == 1){
	$WHERE = 'WHERE DATE(created_date) = "'.$today.'"';
}else if($_GET['val'] == 2){
	$start = $_GET['start'];
	$end   = $_GET['end'];
	$WHERE = 'WHERE DATE(created_date) BETWEEN "'.$start.'" AND "'.$end.'"';
}

?>



<div style="width:max-content;margin:0 auto;">
<table>
	<tr><td>Today</td><td>Start</td><td>End</td><td></td></tr>
	<tr><td><button onclick="fetch_for_today();">TODAY</button></td><td><input type="date" name="start"></td><td><input type="date" name="end"></td><td><button onclick="fetch_range();">Filter</button></td></tr>
</table>


</div>


<style>
	#combined_result tr:nth-child(even){
		background-color: #D5D5D5;
	}

	#combined_result{
		text-align: center;
		font-size: 18px;
		width: 50%;
		margin:0 auto;
		border: solid;
	}


</style>
<?php



//$query = "SELECT DISTINCT tid, MAX(tname) AS tname, MAX(temail) AS temail FROM online_consultation WHERE created_date LIKE '%$created_date%' GROUP BY tid;";

$query = "SELECT DISTINCT tid as tid, MAX(tname) AS tname, MAX(temail) AS temail FROM online_consultation $WHERE GROUP BY tid;";
//echo $query;
$res = $wpdb->get_results($query);
//print_r($res);
//exit();

$increment = 0;
foreach($res as $key){
	if($key->tid != 0){
		$tid = $key->tid;
		
		$query = "SELECT payuid,call_id,action FROM online_consultation o $WHERE AND tid = '".$tid ."' AND ((tid_accept != 6 AND tid_accept != 1 AND tid_accept != 5 AND action = 'chat') OR (tid_accept = 2 AND action = 'call')) AND cron_update =0";
		$res1 = $wpdb->get_results($query);
		$rejectpayid = array();
		if(!empty($res1)){	
			foreach($res1 as $rw){
				if($rw->call_id != "" && $rw->action == "call"){
					/* $row = $wpdb->get_row("SELECT drop_id,call_status FROM knowlarity_after_call WHERE call_uuid = '".$rw->call_id."'");
					if($row->call_status != 'Connected'){ */
						$rejectpayid[] = $rw->payuid.' 900';
					//}	
				} else {	
					//if($rw->action != "call"){
						$rejectpayid[] = $rw->payuid.' '.$rw->action;
					//}	
				}
			}
		}	
		$res[$increment]->rejected = count($rejectpayid);
		$query = "SELECT COUNT(id) as total FROM online_consultation $WHERE AND tid = $tid";
		$res2 = $wpdb->get_results($query);	
		$query4 = "SELECT payuid FROM online_consultation $WHERE AND tid = $tid AND (tid_accept = 6 OR tid_accept = 1 OR tid_accept = 5)";
		$row4 = $wpdb->get_results($query4);
		//echo $res1[0]->rejected;echo "<br/>";
		$res[$increment]->total = $res2[0]->total;
		//$res[$increment]->success = $res2[0]->total - $res1[0]->rejected;
		$res[$increment]->success = count($row4);
		$res[$increment]->percentage = round((count($rejectpayid)*100)/$res2[0]->total, 0);
		$increment++;
	}
	//print_r($res);echo '<br>';
}

$increment = 0;
$rejected = array();

foreach($res as $key){
	//if($key->tid != 0){
		$rejected[$increment] = $key->rejected;

		$increment++;
	//}
}

arsort($rejected);
$rejected_keys = array_keys($rejected);
$sorted_res = array();
$increment = 0;
foreach($rejected_keys as $key){
$sorted_res[$increment] = $res[$key];
$increment++;
}
$res = $sorted_res;

add_thickbox();
//print_r($res);
echo '<table id="combined_result" cellpadding="5px"><tr><td>Therapist</td><td>Total Sessions</td><td>Rejected</td><td>Accepted</td><td>Therapist Id</td><td>% Rejection</td></tr>';
foreach($res as $key){
	$tid = $key->tid;
	$query3 = "SELECT payuid,action,call_id FROM online_consultation $WHERE AND tid = '".$tid ."' AND ((tid_accept != 6 AND tid_accept != 1 AND tid_accept != 5 AND action = 'chat') OR (tid_accept != 1 AND action = 'call')) ";
	$row3 = $wpdb->get_results($query3);
	$rejectpayid = array();	

	foreach($row3 as $rw){
		//if($rw->action == "call"){
			/* $row = $wpdb->get_row("SELECT drop_id,call_status FROM knowlarity_after_call WHERE call_uuid = '".$rw->call_id."'");
			if($row->call_status != 'Connected'){ */ 
				$rejectpayid[] = $rw->payuid;
			//}	
		/* } else {	
			$rejectpayid[] = $rw->payuid.' '.$rw->action;
				
		} */
	} 
	
	$query4 = "SELECT payuid,action,tid_accept FROM online_consultation $WHERE AND tid = '".$key->tid ."' AND (tid_accept = 6 OR tid_accept = 1 OR tid_accept = 5)";
	$row4 = $wpdb->get_results($query4);
	$acceptpayid = array();
	foreach($row4 as $rw){
		$acceptpayid[] = $rw->payuid.' '.$rw->action.' '.$rw->tid_accept;
	} 
	//print_r($acceptpayid);	
	echo '<tr><td>'.$key->tname.'</td><td>'.(count($acceptpayid) + count($rejectpayid)).'</td><td><a href="#TB_inline?width=300&inlineId='.$key->tid .'r" class="thickbox">'.count($rejectpayid).'</a></td><td><a href="#TB_inline?width=250&height=250&inlineId='.$key->tid .'a" class="thickbox">'.count($acceptpayid) .'</a></td><td>'.$key->tid.'</td><td>'.$key->percentage.'</td></tr>';	
	echo '<div id="'.$key->tid .'r" style="display:none;"><h2>Payment ID of Rejected Session</h2><p>'.implode("<br/>",$rejectpayid) .'</p></div>';
	echo '<div id="'.$key->tid .'a" style="display:none;"><h2>Payment ID of Accepted Session</h2><p>'.implode("<br/>",$acceptpayid) .'</p></div>';
}
echo '</table>';
?>

<table cellpadding="5px;" style="float:left">
	<?php
		if($_GET['val'] == 1){
	 foreach($res as $key){ ?>
		<tr id="tlist_ind"><td id="<?php echo $key->tid; ?>" onclick="fetch_info(this.id);"><?php echo $key->tname; if(strlen($key->tname)<1){echo $key->temail;}?></td></tr>
	<?php }}else if($_GET['val'] == 2){
	 foreach($res as $key){ ?>
	 	<script type="text/javascript">
		 	document.getElementsByName('start')[0].value = '<?php echo $_GET['start']; ?>';
			document.getElementsByName('end')[0].value = '<?php echo $_GET['end']; ?>';
	 	</script>
		<tr id="tlist_ind"><td id="<?php echo $key->tid; ?>" onclick="fetch_info_range(this.id);"><?php echo $key->tname; if(strlen($key->tname)<1){echo $key->temail;}?></td></tr>
	<?php }}?>
</table>
<style>
	#tdetails{
		border:solid 2px;
	}



</style>
<table id="tdetails" cellpadding="5px;">
<th><tr style="border:solid 2px #000;">
	<td>Therapist_name</td>
	<td>User Name</td>
	<td>Action</td>
	<td>AMOUNT</td>
	<td>TXNID</td>
	<td>Payment_status</td>
	<td>SESSION STATUS</td>
	<td>Chat-Acc</td>
	<td>Created Date</td>
	<td></td>


</tr></th>
</table>
<script type="text/javascript">


	function fetch_range(){
		let start = document.getElementsByName('start')[0].value;
		let end = document.getElementsByName('end')[0].value;
		location.replace('https://www.thriive.in/therapist_panel?val=2&start='+start+'&end='+end);		
		
	}


	function fetch_for_today(){
		location.replace('https://www.thriive.in/therapist_panel?val=1');
	}

	function fetch_info_range(tid){
		let start = document.getElementsByName('start')[0].value;
		let end = document.getElementsByName('end')[0].value;

		//alert(date);
		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/fetch_tdata.php',{action:'range', tid:tid,start:start, end:end },function(data){
			//alert(data);
			//console.log(data);
			reset_table();
			globalThis.ret_array = JSON.parse(data);
			alert(ret_array.length);
			var table = document.querySelector('#tdetails');
			for(i=0;i<=ret_array.length;i++){
				let Stat = 'NaN';
				if(ret_array[i]['tid_accept'] == 6 || ret_array[i]['tid_accept'] == 5){
					Stat = 'SUCCESS';
				}else if(ret_array[i]['tid_accept'] == 1 && ret_array[i]['uid_accept'] == 1 && ret_array[i]['action'] == 'call'){
					Stat = 'Call Placed';
				}else if(ret_array[i]['tid_accept'] == 1 && ret_array[i]['uid_accept'] == 1){
					Stat = 'ONGOING';
				}else if(ret_array[i]['tid_accept'] == 1 && ret_array[i]['uid_accept'] == 0){
					Stat = 'User Reject';
				}else if(ret_array[i]['tid_accept'] == 0 && ret_array[i]['uid_accept'] == 0){
					Stat = 'Both Not Acc';
				}else if(ret_array[i]['uid_accept'] == '-3'){
					Stat = 'Therapist Switched';
				}else if(ret_array[i]['tid_accept'] == 2 && (ret_array[i]['uid_accept'] == 0 || ret_array[i]['uid_accept'] == 1 )){
					Stat = 'Call Rejected';
				}else if(ret_array[i]['tid_accept'] == '-2' && ret_array[i]['uid_accept'] == '-2'){
					Stat = 'Therapist Reject';
				}else if(ret_array[i]['tid_accept'] == '-5' && ret_array[i]['uid_accept'] == '-5'){
					Stat = 'Timer Expired';
				}
				console.log(Stat);

				let row = table.insertRow(-1);
				let cell1 = row.insertCell(0);
				let cell2 = row.insertCell(1);
				let cell3 = row.insertCell(2);
				let cell4 = row.insertCell(3);
				let cell5 = row.insertCell(4);
				let cell6 = row.insertCell(5);
				let cell7 = row.insertCell(6);
				let cell8 = row.insertCell(7);
				let cell9 = row.insertCell(8);
//				let cell9 = row.insertCell(8);

				cell1.innerText = ret_array[i]['tname'];
				cell2.innerText = ret_array[i]['uname'];
				cell3.innerText = ret_array[i]['action'];
				cell4.innerText = ret_array[i]['amount'];
				cell5.innerText = ret_array[i]['payuid'];
				cell6.innerText = ret_array[i]['payment_status'];
				cell7.innerText = Stat;
				cell8.innerText = ret_array[i]['menu'];
				cell9.innerText = ret_array[i]['created_date'];
//				cell9.innerText = ret_array[i]['tname'];



			}
			/*var table = document.querySelector('#tdetails');
			var row = table.insertRow(0);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			cell1.innerHTML = 'new data';
			cell2.innerText = 'new data';*/
		});








	}




	globalThis.date = '<?php echo $today; ?>';

	function fetch_info(tid){
		//alert(date);
		$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/fetch_tdata.php',{action:'date', tid:tid, date:date },function(data){
			//alert(data);
			console.log(JSON.parse(data));
			reset_table();
			globalThis.ret_array = JSON.parse(data);
			alert(ret_array.length);
			var table = document.querySelector('#tdetails');
			for(i=0;i<=ret_array.length;i++){
				let Stat = 'NaN';
				if(ret_array[i]['tid_accept'] == 6){
					Stat = 'SUCCESS';
				}else if(ret_array[i]['tid_accept'] == 1 && ret_array[i]['uid_accept'] == 1 && ret_array[i]['action'] == 'call'){
					Stat = 'Call Placed';
				}else if(ret_array[i]['tid_accept'] == 1 && ret_array[i]['uid_accept'] == 1){
					Stat = 'ONGOING';
				}else if(ret_array[i]['tid_accept'] == 1 && ret_array[i]['uid_accept'] == 0){
					Stat = 'User Reject';
				}else if(ret_array[i]['tid_accept'] == 0 && ret_array[i]['uid_accept'] == 0){
					Stat = 'Both Not Acc';
				}else if(ret_array[i]['uid_accept'] == '-3'){
					Stat = 'Therapist Switched';
				}else if(ret_array[i]['tid_accept'] == 2 && ret_array[i]['uid_accept'] == 0){
					Stat = 'Call Rejected';
				}else if(ret_array[i]['tid_accept'] == '-2' && ret_array[i]['uid_accept'] == '-2'){
					Stat = 'Therapist Reject';
				}
				console.log(Stat);

				let row = table.insertRow(-1);
				let cell1 = row.insertCell(0);
				let cell2 = row.insertCell(1);
				let cell3 = row.insertCell(2);
				let cell4 = row.insertCell(3);
				let cell5 = row.insertCell(4);
				let cell6 = row.insertCell(5);
				let cell7 = row.insertCell(6);
				let cell8 = row.insertCell(7);
				let cell9 = row.insertCell(8);
//				let cell9 = row.insertCell(8);

				cell1.innerText = ret_array[i]['tname'];
				cell2.innerText = ret_array[i]['uname'];
				cell3.innerText = ret_array[i]['action'];
				cell4.innerText = ret_array[i]['amount'];
				cell5.innerText = ret_array[i]['payuid'];
				cell6.innerText = ret_array[i]['payment_status'];
				cell7.innerText = Stat;
				cell8.innerText = ret_array[i]['menu'];
				cell9.innerText = ret_array[i]['created_date'];
//				cell9.innerText = ret_array[i]['tname'];



			}
			/*var table = document.querySelector('#tdetails');
			var row = table.insertRow(0);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			cell1.innerHTML = 'new data';
			cell2.innerText = 'new data';*/
		});
	}

	function reset_table(){
		var rowlist = document.querySelectorAll('#tdetails tr');
		for(i=2;i<rowlist.length;i++){
      		rowlist[i].remove();   
		}
	}


</script>

</html>

