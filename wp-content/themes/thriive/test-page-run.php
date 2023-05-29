<?php
/* Template Name: Test Page Run */ 
/* $var1 = '696e1afb4cd9b918cde4';
$hash_string = 'fsZR5l|verify_payment|'.$var1.'|03C5uxbtoeAaw7nDIOvugQATJRTie1xB';
$hash = strtolower(hash('sha512', $hash_string)); 
$data['key'] = 'fsZR5l';
$data['command'] = 'verify_payment';
$data['hash'] = $hash;
$data['var1'] = $var1;
$url = 'https://info.payu.in/merchant/postservice.php?form=2';
// Initializes a new cURL session
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

		
// Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  $data);

// Execute cURL request with all previous settings
//curl_setopt($curl, CURLOPT_URL, $endpoint);
$response = curl_exec($curl);
$alldata = json_decode($response,true);
curl_close($curl);
print_r($alldata);
 */
/* echo  file_get_contents("https://media.smsgupshup.com/GatewayAPI/rest?method=OPT_IN&format=json&userid=2000209699&password=!7Tb5Q@t&phone_number=8850630321&v=1.1&auth_scheme=plain&channel=WHATSAPP"); */
/* $handle = curl_init();
$url = "https://media.smsgupshup.com/GatewayAPI/rest?method=OPT_IN&format=json&userid=2000209699&password=!7Tb5Q@t&phone_number=8850630321&v=1.1&auth_scheme=plain&channel=WHATSAPP
";
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($handle);
curl_close($handle);
			
$alldata = json_decode($handle,true);

print_r($alldata);
 */
global $wpdb;
$lovearr = $lifearr = $stressarr = $sexarr = array(); 
if (($open = fopen("therapydata.csv", "r")) !== FALSE) 
  {
  
while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
{        
	
	$result = $wpdb->get_results("SELECT ID FROM wp_users  WHERE  user_email = '".$data[0]."'");
	foreach($result as $rs){
		if($data[2] == 'Yes'){
			$lovearr[] = $rs->ID;	
		}	
		if($data[3] == 'Yes'){
			$lifearr[] = $rs->ID;	
		}
		if($data[4] == 'Yes'){
			$stressarr[] = $rs->ID;	
		}
		if($data[5] == 'Yes'){
			$sexarr[] = $rs->ID;	
		}
	}  
  
}
//print_r($lovearr);exit();
fclose($open);
} 
//AND post_author IN ($ustr) 
//$ustr = implode(",",$arr1);
$result = $wpdb->get_results("SELECT ID,post_title,post_author,post_content FROM wp_posts  WHERE wp_posts.post_type = 'therapist' AND post_status = 'publish'  ORDER BY ID DESC  ");
//echo "<pre>";print_r($result);exit();

foreach($result as $rs){
	$nationality = $dob = $gender = $mobile_number = $zipcode = "";
	$userresult = $wpdb->get_results("SELECT meta_key,meta_value FROM wp_usermeta WHERE meta_key IN ('dob','nationality','gender')  AND user_id = '".$rs->post_author."'");
	$row = $wpdb->get_row("SELECT user_email FROM wp_users  WHERE  ID = '".$rs->post_author."'");
	$email = $row->user_email;
	foreach($userresult as $td){
		if($td->meta_key == 'dob'){
			$dob = $td->meta_value;
		}if($td->meta_key == 'nationality'){
			
			$nationality = $td->meta_value;
		}
		if($td->meta_key == 'gender'){
			
			$gender = $td->meta_value;
		}
		
	}	
//	echo $rs->post_content;exit();
	$post_content = str_replace(","," ",$rs->post_content);
	
	$therapistresult = $wpdb->get_results("SELECT meta_key,meta_value FROM wp_postmeta WHERE meta_key IN ('mobile_number','address','zipcode','therapy_0_therapy_name','therapy_1_therapy_name','therapy_2_therapy_name','therapy_3_therapy_name','therapy_4_therapy_name','language','area','earning_ratio','therapy_0_experience','therapy_1_experience','therapy_2_experience','therapy_3_experience','therapy_4_experience')  AND post_id = '".$rs->ID."'");
	$therapy_name = "";$flag1=0;$flag2 = 0;$lang = $exp = $therapyarr = $exparr =  array();
	foreach($therapistresult as $td){
		$flag = 0;
		if($td->meta_key == 'mobile_number'){
			
			$mobile_number = $td->meta_value;
		}	
		
		if($td->meta_key == 'address'){
			
			$address = str_replace(","," ",$td->meta_value);
		}
		 
		if($td->meta_key == 'zipcode'){
			
			$zipcode = $td->meta_value;
		}
		if($td->meta_key == 'earning_ratio'){
			if($td->meta_value == 3){
		
				$flag1 = 1;
			}
		}
		if($td->meta_key == 'therapy_0_therapy_name'){
			$term_id = unserialize($td->meta_value);
			$terms = implode(",",$term_id);
			$term = $wpdb->get_row("SELECT name FROM wp_terms WHERE term_id IN ($terms)");//print_r($term);
			//if($terms == '1421'){ $flag = 1;
				$therapyarr[] = $term->name; 
			//}
			
		}
		//if($flag == 1){
			if($td->meta_key == 'therapy_0_experience'){
				//$exparr[] =   date("Y-m-d",strtotime((date("Y-m-d",strtotime($td->meta_value)))));
				$date1 = date("Y-m-d",strtotime($td->meta_value));
				$date2 = date("Y-m-d");

				$diff = abs(strtotime($date2) - strtotime($date1));

				$years = floor($diff / (365*60*60*24));
				$exparr[] = $years.' years';
			}
		//}	
		if($td->meta_key == 'therapy_1_therapy_name'){
			$term_id = unserialize($td->meta_value);
			$terms = implode(",",$term_id);
			
			$term = $wpdb->get_row("SELECT name FROM wp_terms WHERE term_id IN ($terms)");
			$therapyarr[] = $term->name; 
				
		}
		//if($flag == 1){
			/* if($td->meta_key == 'therapy_1_experience'){
				$exparr[] =  date("Y-m-d",strtotime((date("Y-m-d",strtotime($td->meta_value)))));
			} */
		//}	
			if($td->meta_key == 'therapy_2_therapy_name'){ 
				$term_id = unserialize($td->meta_value);
				$terms = implode(",",$term_id);
				$term = $wpdb->get_row("SELECT name FROM wp_terms WHERE term_id IN ($terms)");
				$therapyarr[] = $term->name; 
			
			}
		//if($flag == 1){	
			/* if($td->meta_key == 'therapy_2_experience'){
				$exparr[] = date("Y-m-d",strtotime((date("Y-m-d",strtotime($td->meta_value)))));
			} */
		//}	
		if($td->meta_key == 'therapy_3_therapy_name'){ 
			$term_id = unserialize($td->meta_value);
			$terms = implode(",",$term_id);
			$term = $wpdb->get_row("SELECT name FROM wp_terms WHERE term_id IN ($terms)");
			$therapyarr[] = $term->name; 
		} 
		/* if($td->meta_key == 'therapy_3_experience'){
			$exparr[] =  date("Y-m-d",strtotime((date("Y-m-d",strtotime($td->meta_value)))));
			
		} */
		if($td->meta_key == 'therapy_4_therapy_name'){ 
			$term_id = unserialize($td->meta_value);
			$terms = implode(",",$term_id);
			$term = $wpdb->get_row("SELECT name FROM wp_terms WHERE term_id IN ($terms)");
			$therapyarr[] = $term->name; 
		} 
		/* if($td->meta_key == 'therapy_4_experience'){
			$exparr[] =  $experience = date("Y-m-d",strtotime((date("Y-m-d",strtotime($td->meta_value)))));
			
		} */
		if($td->meta_key == 'language'){
			//echo $td->meta_value;
			$term_id = unserialize($td->meta_value);
			//print_r(implode(",",$term_id));
			$terms = implode(",",$term_id);
			//echo "SELECT name FROM wp_terms WHERE term_id IN ($terms)";
			$term = $wpdb->get_results("SELECT name FROM wp_terms WHERE term_id IN ($terms)");
			//print_r($term);
			
			foreach($term as $tm){
				$lang[] = $tm->name; 
			}
		}
		
		if(in_array($rs->post_author,$lovearr)){
			$therapyarr[] = 'Love Therapy';
			array_splice($lovearr, array_search($rs->post_author, $lovearr ), 1);
			
			$flag2 = 1;
		}
		if(in_array($rs->post_author,$lifearr)){
			$therapyarr[] = 'Life Coaching';
			array_splice($lifearr, array_search($rs->post_author, $lifearr ), 1);
			$flag2 = 1;
		}
		if(in_array($rs->post_author,$stressarr)){
			$therapyarr[] = 'Stress Therapy';
			array_splice($stressarr, array_search($rs->post_author, $stressarr ), 1);
			$flag2 = 1;
		}
		if(in_array($rs->post_author,$sexarr)){
			$therapyarr[] = 'Sexual Wellness';
			array_splice($sexarr, array_search($rs->post_author, $sexarr ), 1);
			$flag2 = 1;
			
		}	
	}
	//print_r($therapyarr);
	$therapy_name = implode("-",$therapyarr); 	
	$experience  = implode("//",$exparr);//echo "<pre>";print_r($exparr);
	if(((in_array('Tarot Card Reading',$therapyarr) || in_array('tarot card reading',$therapyarr)) && $flag1 == 1) || $flag2 == 1){ 
		$language = implode("-",$lang); 
		$str = $rs->ID.','.$rs->post_title.','.$email.','.$therapy_name.','.$gender.','.preg_replace('/\s+/', ' ', htmlspecialchars($post_content)) .','.$language.','.$mobile_number.','.date_format(date_create($dob),'Y-m-d').','.$nationality.','.$experience.','.$address.','.$zipcode;
		$arr = explode(",",$str);
		
		$arr1[] = $arr;
		
	}  
	
}
//echo "<pre>";print_r($arr1);exit();
/* echo "love";print_r($lovearr);echo "life";print_r($lifearr);echo "stress";print_r($stressarr);echo "sex";print_r($sexarr);exit(); */
header('Content-Description: File Transfer');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header("Content-disposition: filename='therapist_data.csv'");
header('Content-Transfer-Encoding: binary');
header('Pragma: public');
header('Content-Disposition: attachment; filename="therapist_data.csv"');
$fp = fopen('php://output', 'wb');
 $headers = explode(",",'ID, Therapist Name,Email,Therapies, Gender, THerapist Description, Language,Mobile No , DOB ,Nationality, Experience,Address,Pincode');
    fputcsv($fp,$headers);
	foreach ($arr1 as $line) {
	  fputcsv($fp, $line);
	}   