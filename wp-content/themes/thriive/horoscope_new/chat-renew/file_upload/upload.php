<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
		.file{
			display:none;
		}
		#paperclip{
			background-image: url('attatch.png');
			background-size:contain;
			background-color:transparent;
			border:none;
			padding:5px;
			width:50px;
			height: 50px;
		}
		#paperclip:focus{
			border:none;
			outline: none;
		}
	</style>
</head>
<body>
	<button id="paperclip" onclick="clic()"></button>
	<input type="file" name="file" class="file">
	<button onclick="func()">sub</button>
	<div id="cont">
		
	</div>
	<script type="text/javascript">
		/*function func(){
		globalThis.	form_data = new FormData();
		globalThis.file = document.querySelector('input').files[0];
		var test = 'test';
		form_data.append("file", file);
		form_data.append('test', test);
		//$.post('file.php', {form_data}, function(data){$('#cont').html(data);});
		$.ajax({
			url:'file.php',
			method:'post',
			data:form_data,
			contentType:false,
			cache: false,
			processData:false,
			success:function(data){$('#cont').html(data);}
		});
	}

		function clic(){
			document.querySelector('.file').dispatchEvent(new MouseEvent('click'));

		}*/

		function func(){

		var img_data = new FormData();
		var action = 'write';
		img_data.append('img', document.querySelector('.file').files[0]);
		//img_data.append('msg', document.querySelector('#ind-message').value);
		img_data.append('action', action);
		//var msg = document.querySelector('#ind-message').value;
		//var action = 'write';
		//$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {from:from, to:to, mail:mail, action:action, msg:msg, filename:filename},function(data){$('.messages').append(data);});
		$.ajax({
			url:'file.php',
			method:'post',
			data:img_data,
			contentType:false,
			cache: false,
			processData:false,
			success:function(data){$('#cont').html(data);}
		});
}
		function clic(){
			document.querySelector('.file').dispatchEvent(new MouseEvent('click'));

		}

	</script>
</body>
</html>