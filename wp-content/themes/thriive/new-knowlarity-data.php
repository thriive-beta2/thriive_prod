<?php /* Template Name: Knowlarity-data */
if(wp_get_current_user()->roles[0] == 'administrator'){}else{die('forbidden');
}

if(/*wp_get_current_user()->data->ID != 38533*/ 1==2){

	echo '<br><br><br><br><br><h1 style="color:red;text-align:center;">Work in progress (Access Forbidden)</h1>';
	die;
}else{

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
	.sub_form{
		background-color: #55B8FF;
		padding:10px;
		border-radius: 10px;
		width:max-content;
		margin:0 auto;
	}
	.sub_form input{
		font-size:18px;
		margin: 10px;
	}
		.sub_form button{
		font-size:18px;

	}
	.err_red{
		color:red;
		text-align: center;
		margin:5px !important;
		font-weight: 400;
		font-size: 18px;
	}
	.knowlarity_table{
		margin:0 auto;
	}
	.knowlarity_table td{
		width: 30%;
    font-size: 20px;
	}
	.button_container{
		width:100%;
		text-align: center;
	}
	.button_container button{
		width:6rem;
		padding: 5px;
		border-radius: 10px;
		text-align: center;
	}
</style>


<h1 style="text-align: center;color:green">Working now insert payuid to proceed</h1>
<table class="knowlarity_table">
	<tr>
		<td id="therapist" style="text-align: center">
			<p class="title_head">Therapist</p>
			<p class="title_name">---</p>
			<p class="title_mob">---</p>
		</td>
		<td>
			<form action="/wp-content/themes/thriive/horoscope_new/knowlarity/api_data.php" method="POST" class="sub_form">
				<!--<label for="agent">Enter Agent Number</label><br>-->
				<input type="number" maxlength="10" name="agent" placeholder="Enter Therapist Number" required onkeyup="validate();" id="therapist_number"><br>
				<!--<label for="customer">Enter Agent Number</label><br>-->
				<input type="number" maxlength="10" name="customer" placeholder="Enter User Number" required onkeyup="validate();" id="user_number"><br>
				<!--<label for="timer">Enter Time</label><br>-->
				<input type="number" maxlength="10" name="timer" placeholder="Enter Time" required onkeyup="validate();" id="duration"><br>
				<input type="text"  name="payment_id" placeholder="Payment ID" id="payuid" required onkeyup="validate_txn();"><br>
				<p class="err_red">All Fields Are Mandatory</p>
				<div class="button_container">
				<button disabled="true" id="check_txn" onclick="payuid_check(document.querySelector('#payuid').value);" type="button">Validate</button><br>
				<button disabled="true" id="submit" onclick="submit_values();" type="button" style="margin-top: 5px;">Submit</button>
				</div>
			</form>
		</td>
		<td id="user" style="text-align: center">
			<p class="title_head">USER</p>
			<p class="title_name">---</p>
			<p class="title_mob">---</p>
		</td>	
	</tr>
</table>

<div style="text-align:center">
	<?php if($_GET){
		if($_GET['stat']=='success'){
			echo '<h1 style="color:green">Call Successfully Placed</h1>';
		}else{
			echo '<h1 style="color:red">Failed To Place the call</h1>';
		}
	}?>

</div>

<script>
function validate_txn(){
	let payuid = document.querySelector('#payuid').value;
	if(payuid.length >7){
		document.querySelector('#check_txn').disabled = false;
	}else{
		document.querySelector('#check_txn').disabled = true;
	}
}

function payuid_check(payuid){
	$.post('wp-content/themes/thriive/horoscope_new/knowlarity/manual_functions.php', {action:'payuid_check',payuid:payuid}, function(data){
		//alert(data);
		if(data){
			let return_data = JSON.parse(data);
			//console.log(return_data);
			if(return_data['status'] == 'fail'){
				//console.log('fail');
			}else if(return_data['status'] == 'success'){
				document.querySelector('#therapist_number').value = return_data['msg1'];
				document.querySelector('#user_number').value = return_data['msg2'];
				document.querySelector('#check_txn').disabled = true;
				validate();
			}
		}
	})
}


function submit_values(){
	let payuid = document.querySelector('#payuid').value;
	let therapist_number = document.querySelector('#therapist_number').value;
	let user_number = document.querySelector('#user_number').value;
	let duration = document.querySelector('#duration').value;
	$.post('wp-content/themes/thriive/horoscope_new/knowlarity/manual_functions.php', {action:'submit_values',payuid:payuid,therapist_number:therapist_number,user_number:user_number,duration:duration}, function(data){
		data = data.trim();
		alert(data);
		if(data == 0){
			alert('Call tech dep');
		}else if(data == 'success'){
			alert('Call Placed Successfully');
		}else if(data == 'fail'){
			alert('the call was not placed');
		}
	});
}



	var val = 0;
	function validate(){
var inputs = document.querySelectorAll('input');
if(inputs[0].value.length != 10){
document.querySelector('.err_red').style.color = "red";
document.querySelector('.err_red').innerText = "Agent number must be 10 digits";
document.querySelector('#submit').disabled = true;
inputs[0].style.border = "2px solid red";
inputs[0].style.outline = "2px solid red";
val=0
}else{
inputs[0].style.border = "2px solid green";
inputs[0].style.outline = "2px solid green";
var pass = 1;
if(val!=1){ 
fetch_data('therapist');val=1}
}

if(pass == 1){
if(inputs[1].value.length != 10){
document.querySelector('.err_red').style.color = "red";
document.querySelector('.err_red').innerText = "Customer number must be 10 digits";
document.querySelector('#submit').disabled = true;
inputs[1].style.border = "2px solid red";
inputs[1].style.outline = "2px solid red";
val=1
}else{
inputs[1].style.border = "2px solid green";
inputs[1].style.outline = "2px solid green";
var pass = 2;
if(val!=2){ 
fetch_data('user');val=2}

}
}
if(pass == 2){
if(inputs[2].value < 1){
document.querySelector('.err_red').style.color = "red";
document.querySelector('.err_red').innerText = "INVALID TIMER COUNT";
document.querySelector('#submit').disabled = true;
inputs[2].style.border = "2px solid red";
inputs[2].style.outline = "2px solid red";
}else{
inputs[2].style.border = "2px solid green";
inputs[2].style.outline = "2px solid green";
document.querySelector('.err_red').innerText = "All Fields Are VALID";
document.querySelector('.err_red').style.color = "green";
document.querySelector('#submit').disabled = false;
}
}
}


function fetch_data(para){
if(para == 'therapist'){
	let static_data = document.querySelector('#therapist').children;
	para = '#'+para;
	let entered_num = document.getElementsByName('agent')[0].value;
	$.post('wp-content/themes/thriive/horoscope_new/knowlarity/fetch_num.php',{num:entered_num},function(data){
		let ret_vars = data.split(',');
		if(ret_vars[0] != 'error404'){
		static_data[1].innerText = ret_vars[0]+' '+ret_vars[1];
		static_data[2].innerText = ret_vars[2];	
		//console.log(ret_vars);
		}else{static_data[1].innerText = 'No Therapist with that number';
			static_data[2].innerText = '---';
		}
	});
	
}
if(para == 'user'){
	let static_data = document.querySelector('#user').children;
	para = '#'+para;
	let entered_num = document.getElementsByName('customer')[0].value;
	$.post('wp-content/themes/thriive/horoscope_new/knowlarity/fetch_num.php',{num:entered_num},function(data){
		let ret_vars = data.split(',');
		if(ret_vars[0] != 'error404'){
		static_data[1].innerText = ret_vars[0]+' '+ret_vars[1];
		static_data[2].innerText = ret_vars[2];	
		//console.log(ret_vars);
		}else{static_data[1].innerText = 'No Therapist with that number';
			static_data[2].innerText = '---';
		}
	});
	
}
}

</script>

<?php } ?>