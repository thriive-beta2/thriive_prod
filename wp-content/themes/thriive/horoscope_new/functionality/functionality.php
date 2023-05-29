<?php
require '/var/www/html/wp-config.php';

$query = 'SELECT meta_value FROM wp_usermeta WHERE umeta_id = 1586037';
$res = $wpdb->get_results($query,ARRAY_A);
//print_r($res[0]['meta_value']);
$status = json_decode($res[0]['meta_value'], ARRAY_A);
print_r($status);
if($status['chat'] == 1){
	$chat_status = '<p style="color:Green" class="status_class_active">ACTIVE</p>';
	$chat_func_btn = '<button class="disable_button">Disable Chat</button>'; 
}
if($status['calls'] == 1){
	$call_status = '<p style="color:Green" class="status_class_active">ACTIVE</p>';
	$call_func_btn = '<button class="disable_button">Disable Calls</button>'; 
}
if($status['chat_cron'] == 1){
	$chat_cron_status = '<p style="color:Green" class="status_class_active">ACTIVE</p>';
	$chat_cron_func_btn = '<button class="disable_button">Disable Chat Cron</button>'; 
}
if($status['support_chat'] == 1){
	$support_chat_status = '<p style="color:Green" class="status_class_active">ACTIVE</p>';
	$support_chat_func_btn = '<button class="disable_button">Disable Support Chat</button>'; 
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css">
	.functionality_header{
		text-align: center;
	}

	.functionality_panel{
		width:100%;
		text-align: center;
	}
	.functionality_panel table{
		text-align: center;
		margin: 0 auto;
		width:80%;
		border: solid 2px;
	}
	.functionality_panel table td{
		border: solid 2px;
	}
	.disable_button{
		background-color: red;
	    color: #fff;
	    font-weight: 500;
	    font-size: 16px;
	    padding: 8px;
	    border-radius: 11px;
	    outline: none;
	    border: none;
	    width: 60%;
	}
</style>

<div class="functionality_header">
	<h2>Functionality Panel</h2>
	<h4>This panel can be used to manage certain functionalities of the site</h4>
</div>

<div class="functionality_panel">
	
	<table cellpadding="5px;">
		<tr><td>CHAT</td><td><?php echo $chat_status;?></td><td><?php echo $chat_func_btn;?></td></tr>
		<tr><td>CALLS</td><td><?php echo $call_status;?></td><td><?php echo $call_func_btn;?></td></tr>
		<tr><td>CHAT CRON</td><td><?php echo $chat_cron_status;?></td><td><?php echo $chat_cron_func_btn;?></td></tr>
		<tr><td>SUPPORT CHAT</td><td><?php echo $support_chat_status;?></td><td><?php echo $support_chat_func_btn;?></td></tr>
	</table>


</div>


<script type="text/javascript">
	
	for(i=0;i<=3;i++){
		if(typeof(document.querySelectorAll('.status_class_active')[i] != undefined)){
		document.querySelectorAll('.status_class_active')[i].style.opacity = 1;}
	}
let elem;
let behave;
function flash(){
	elem = Number(document.querySelector('.status_class_active').style.opacity);
		if(elem == 0.5){
		  behave = '+';
		}else if(elem == 1){
		  behave = '-';
		}
		if(behave == '+'){
			for(i=0;i<=3;i++){
				if(typeof(document.querySelectorAll('.status_class_active')[i] != undefined)){
				document.querySelectorAll('.status_class_active')[i].style.opacity = elem + 0.01;}
			}
		}else{
			for(i=0;i<=3;i++){
				if(typeof(document.querySelectorAll('.status_class_active')[i] != undefined)){
				document.querySelectorAll('.status_class_active')[i].style.opacity = elem - 0.01;}
			}
		} 
}

setInterval('flash();',50);
</script>
</body>
</html>