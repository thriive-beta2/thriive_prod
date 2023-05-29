<?php

require '../../../../../wp-config.php'; 

if($_POST['action'] == 'feed'){
	
	feed_data($_POST['filename']);
	//feed_data('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/631_46647.json');
}



function feed_data($filename){
	global $wpdb;
	$file_contents = file_get_contents($filename);
	$file_contents = json_decode($file_contents, true);
	//print_r($file_contents);
	//echo $filename;
	if(is_array($file_contents) AND count($file_contents)>0){
		//print_r($file_contents);
		//echo $filename;
		$query_string = '';
		foreach($file_contents as $key){
			$query_string .= '("'.$key['to_user_id'].'","'.$key['from_user_id'].'","'.$key['chat_message'].'","'.$key['chat_time'].'"),';
		}

		echo count($file_contents);
		$query_string = rtrim($query_string, ',');
		$query = "INSERT INTO chat_message_details(from_user_id, to_user_id, chat_message,chat_time) VALUES $query_string";
		if(file_exists($filename)){
			$wpdb->query($query);
			$query_status = 1;
		}

		//echo $query;
		if($query_status<1){
			$query = "INSERT INTO inserted_files_chat (`filename`,`status`)Values('$filename','fatal query Not Ran')";
			$wpdb->query($query);
			echo 'error! query not ran on the file error(&&)'. $filename;
		}else if($query_status>0){
			unlink($filename);
			if(file_exists($filename)){
				$query = "INSERT INTO inserted_files_chat (`filename`,`status`)Values('$filename','no-delete')";
				$wpdb->query($query);
				echo 'data inserted but error! file not deleted error(&&)'.$filename;
			}else{
				/*$file_contents = file_get_contents('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/insertedFiles.json');
				$new_string = $file_contents.'+++++'.$filename;
				$fp = fopen('/var/www/html/wp-content/themes/thriive/horoscope_new/chat-renew/json_files/insertedFiles.json', 'w');
				fwrite($fp, $new_string);
				fclose($fp);*/
				$query = "INSERT INTO inserted_files_chat (`filename`,`status`)Values('$filename','success')";
				$wpdb->query($query);
				echo 'data inserted and file deleted successully';
			}	
		}
	}else{
		unlink($filename);
		if(file_exists($filename)){
			echo 'file contained no data and file not deleted';
			$query = "INSERT INTO inserted_files_chat (`filename`,`status`)Values('$filename','!Empty-File Not-Deleted')";
			$wpdb->query($query);
		}else{
		$query = "INSERT INTO inserted_files_chat (`filename`,`status`)Values('$filename','Empty-File Deleted')";
		$wpdb->query($query);
		echo 'empty file deleted';
	}
	}
}

?>