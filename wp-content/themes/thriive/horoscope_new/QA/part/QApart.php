<?php 






$payuid = $_POST['mihpayid'];


//echo 'Array ( [mihpayid] => 403993715526443299 [mode] => CC [status] => success [unmappedstatus] => captured [key] => icapBa [txnid] => c019104a13d7e5589a68 [amount] => 99.00 [cardCategory] => domestic [discount] => 0.00 [net_amount_debit] => 99 [addedon] => 2022-06-13 16:55:00 [productinfo] => tarot-card-reading [firstname] => akash@thriive.in [lastname] => [address1] => [address2] => [city] => [state] => [country] => [zipcode] => [email] => akash@thriive.in [phone] => 7999886050 [udf1] => 3 Mins Deep Consult [udf2] => 99,1 Session,3 Mins Deep Consult,99,4,chat,silver-readers [udf3] => manish-k-jadhav [udf4] => [udf5] => [udf6] => [udf7] => [udf8] => [udf9] => [udf10] => [hash] => b4f1aa18036c5081167a48991656fd823e059316947b3e34b01c01cd92dcdca8c3060cdd02043fb4ccefafaefc4910d13664084bb9fe4f68a44e70cabe8ed9de [field1] => 140564 [field2] => 753596 [field3] => 20220613 [field4] => 0 [field5] => 564494225674 [field6] => 00 [field7] => AUTHPOSITIVE [field8] => Approved or completed successfully [field9] => No Error [payment_source] => payu [PG_TYPE] => CC-PG [bank_ref_num] => 140564 [bankcode] => CC [error] => E000 [error_Message] => No Error [name_on_card] => ysdghkj [cardnum] => 512345XXXXXX2346 [cardhash] => This field is no longer supported in postback params. )';





$query1 = "SELECT * FROM QA_questions_level1 JOIN QA_questions_level2 ON QA_questions_level1.qid = QA_questions_level2.qid JOIN QA_questions_level3 ON QA_questions_level2.L2qid = QA_questions_level3.L2qid;";


$query = "SELECT QA_questions_level1.*, QA_questions_level2.question AS question2, QA_questions_level3.question AS question3 FROM QA_questions_level1 JOIN QA_questions_level2 ON QA_questions_level1.qid = QA_questions_level2.qid JOIN QA_questions_level3 ON QA_questions_level2.L2qid = QA_questions_level3.L2qid";

$res = $wpdb->get_results($query);



$catg1 = array(
			$res[0]->question,
			$res[16]->question,
			$res[32]->question,
			$res[48]->question
					);

$catg2 = array(
			$res[0]->question2,
			$res[4]->question2,
			$res[8]->question2,
			$res[12]->question2,
			$res[16]->question2,
			$res[20]->question2,
			$res[24]->question2,
			$res[28]->question2,
			$res[32]->question2,
			$res[36]->question2,
			$res[40]->question2,
			$res[44]->question2,
			$res[48]->question2,
			$res[52]->question2,
			$res[56]->question2,
			$res[60]->question2
					);

$catg3 = array();
$count = 0;
foreach($res as $key){
	$catg3[$count] = $key->question3;
	$count++;
}




//check for existing data


$current_user = wp_get_current_user();



function getCurrentUserId($phone){
global $wpdb;
    $query = "SELECT user_id FROM wp_usermeta WHERE meta_value = '$phone' ORDER BY umeta_id DESC LIMIT 1";
    $res = $wpdb->get_results($query);

    return $res[0]->user_id;

}

//$currentUserId = $current_user->ID;
$currentUserId = $userId;


function checkForExistingData($payuid,$currentUserId){
	global $wpdb;
	$query = "SELECT payuid FROM QA_feedback WHERE payuid = '$payuid'";
	$res = $wpdb->get_results($query);

	if(count($res)>0){
		return 1;
	}else{
		$query = "SELECT feedback FROM QA_feedback WHERE uid = $currentUserId ORDER BY id DESC LIMIT 1";
		$res = $wpdb->get_results($query);
		if(count($res)> 0){
			return $res[0]->feedback;

		}
		return 0;
	}
}


function initCheckForExistingData($payuid,$currentUserId){
	$QALastData = checkForExistingData($payuid,$currentUserId);

	if($QALastData != ''){
		echo '<script>globalThis.existingData = '.$QALastData.';</script>';
		return $QALastData;
	}

};

$QALastData = initCheckForExistingData($payuid,$currentUserId);
//print_r($QALastData);

//check for existing data


//generating options for select



$date_options = '';
for($i=1;$i<=31;$i++){
    $date_options .= '<option>'.$i.'</option>';
}

$curr_year = date('Y');

$year_options = '';
for($i=1900;$i<=$curr_year;$i++){
	if($i == 1998){
		$year_options .= '<option selected="selected">'.$i.'</option>';
	}else{
		$year_options .= '<option>'.$i.'</option>';	
	}
}


//generating options for select



function return_data($arr_catg1='',$arr_catg2='',$arr_catg3=''){
global $catg1;
global $catg3;
global $catg2;

	if($arr_catg1 !== '' AND $arr_catg2 !== '' AND $arr_catg3 !== ''){
		$temp_index = ($arr_catg1*16)+(($arr_catg2*4) + $arr_catg3);
		echo $catg3[$temp_index];
		return;
	}	
	
	if($arr_catg1 !== '' AND $arr_catg2 !== '' AND $arr_catg3 == ''){
		$temp_index = ($arr_catg1*4)+$arr_catg2;
		echo $catg2[$temp_index];
		return;
	}
	if($arr_catg1 !== '' AND $arr_catg2 == '' AND $arr_catg3 == ''){
	echo $catg1[$arr_catg1];
	return;
	}


};

//return_data(0,3,0);
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Poppins:wght@200&family=Roboto:wght@100;300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<style>




    *{
        padding:0;
        margin:0;
        font-family: 'Poppins', sans-serif;
font-family: 'Roboto', sans-serif;
font-family: 'Ubuntu', sans-serif;
    }
.qa_dilogue_container{
    width: 100%;
    height: 100vh;
    /*background-image: url('<?php echo site_url();?>/wp-content/themes/thriive/horoscope_new/QA/images/chang-duong-Sj0iMtq_Z4w-unsplash.jpg');*/
    background: linear-gradient(rgba(114, 0, 198, 0.12), rgba(114, 0, 198, 0.12)), url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/chang-duong-Sj0iMtq_Z4w-unsplash.jpg);
        background-size: cover;
    background-position-x: center;
    position: fixed;
    top: 0px;
    z-index: 9991;
    display:flex;
    align-items: center;
    flex-wrap: wrap;
}   

.qa_dilogue_tray_container{
    width: 20%;
    height: 80%;
    margin: 0 auto;
    overflow: hidden;
} 
.qa_dilogue1{
        background-color: #fff;
}
.qa_dilogue2{
        background-color: #fff;
    
}
.qa_dilogue3{
    
        background-color: grey;
}
.qa_dilogue_tray{
    width: 500%;
    height: 100%;
    transition: ease 1s;
    display: flex;
    justify-content: space-between;
}
.qa_dilogue_tray .qa_dilogue{
border-radius: 5px;
    width: 20%;
    height: 80%;
    display: inline-block;
    text-align: center;
    overflow: hidden;
    background-color: rgba(255, 255, 255,0.91);
}
.qa_dilogue_head{
    width: 100%;
    text-align: center;
    font-size: 28px;
    color:#25285F;
}

.qa_dilogue_tray input{
padding: 6px;
    width: 75%;
    margin: 0 auto;
    background-color: transparent;
    border: solid 1px;
    border-radius: 13px;
    color: #25285F;
    font-size: 24px;
    outline: none;

    text-align: center;
}

.qa_dilogue_name_field_label{
    font-size: 20px;
    font-weight: 600;
    color: #25285F;
        -webkit-text-stroke: 0.2px #25285F;
}
.qa_dilogue1_row1{
height: 20%;
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
}

.qa_dilogue1_row2{
    height:20%;
        background-color: unset;
}
.qa_dilogue1_row3{
    height: 40%;
}
.qa_dilogue1_row1_head{
    font-size: 26px;
    color: #25285F;
    font-weight: 500;
    -webkit-text-stroke: 0.5px #25285F;
}
.qa_dilogue1_row2_dob_select{
    font-size: 20px;
    background-color: #A0549E;
    border: 1px solid #fff;
    outline: none;
    color: #fff;
    border-radius: 5px;
    padding: 7px 10px 7px 10px;
    width: 30%;
}
.qa_dilogue1_row2_dob_select option{
    background-color: #25285F;
}
.qa_dilogue1_row2_dob_head{
    font-size: 20px;
    color: #25285F;
    width: 75%;
    text-align: center;
    margin: 0 auto;
    padding: 13px 0px 13px 0px;
    font-weight: 600;
        -webkit-text-stroke: 0.2px #25285F;
}

.qa_dilogue1_row2_dob{
    display: flex;
    width: 75%;
    margin: 0 auto;
    justify-content: space-between;
}
.qa_dilogue_button1{
    padding: 10px 15px;
    border-radius: 15px;
    color: #FFF;
    font-size: 18px;
    font-weight: 600;
    background-color: #292465;
}


/*Dilogue 2*/

    .qa_dilogue2_row1{
        height:45%;
    }
    .qa_dilogue2_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-top: -15%;
    }
    .qa_dilogue2_row1_head{
font-size: 32px;
    padding-top: 14%;
    font-weight: 600;
    color: #25285F;
    width: 100%;
    }
    .qa_dilogue2_issue_catg2_container{
    width: 40%;
    height: 7rem !important;
    font-size: 18px;
    padding: 7px;
    border-radius: 11px;
    background-color: #A0549E;
    display: flex;
    align-items: center;

    }
    .qa_dilogue2_issue_catg2_container img{
        width:100%;
    }
    .qa_dilogue2_issue_text{
    width: 100%;
    color: #fff;
    margin: 0;
    }
    .qa_dilogue_back{
    font-size: 35px;
    text-align: left;
    /* padding: 10px 20px; */
    /* background: rgba(37, 40, 95,0.7); */
    width: max-content;
    border-radius: 50%;
    font-weight: 600;
    color: #fff;
    border: 12px solid transparent;
    width: 16%;
    height: 20%;
    overflow: hidden;
    background-image: url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/Back-Button.png);
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
    }



/*Dilogue 3*/

    
    .qa_dilogue3_row1{
        height:45%;
        background-color: transparent;
    }
    .qa_dilogue3_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-top: -15%;
    }
    .qa_dilogue3_row1_head{
    font-size: 32px;
    padding-top: 13%;
    font-weight: 600;
    color: #25285F;
    }
    .qa_dilogue3_issue_catg3_container{
    width: 70%;
    height: max-content;
    font-size: 20px;
    padding: 7px;
    border-radius: 11px;
    background-color: #A0549E;

    }
    .qa_dilogue3_issue_catg3_container img{
        width:100%;
    }
    .qa_dilogue3_issue_text{
    width: 100%;
    color: #fff;
    margin: 0;
    }


/*Dilogue 4*/

    
    .qa_dilogue4_row1{
        height:45%;
        background-color: transparent;
    }
    .qa_dilogue4_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    }
    .qa_dilogue4_row1_head{
    font-size: 32px;
    padding-top: 13%;
    font-weight: 600;
    color: #25285F;
    }
    .qa_dilogue4_issue_catg4_container{
    width: 70%;
    height: max-content;
    font-size: 20px;
    padding: 7px;
    border-radius: 11px;
    background-color: #A0549E;

    }
    .qa_dilogue4_issue_catg4_container img{
        width:100%;
    }
    .qa_dilogue4_issue_text{
    width: 100%;
    color: #fff;
    margin: 0;
    }


    /*dilogue 5*/

    
    .qa_dilogue5_row1{
        height:28%;
        background-color: transparent
    }
    .qa_dilogue5_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 0px 34px;
    }
    .qa_dilogue5_row3{
    height: 17%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 0px 34px;
    align-items: center;
    }
    .qa_dilogue5_row1_head{
    font-size: 32px;
    padding-top: 5%;
    font-weight: 600;
    color: #25285F;
    }
    .qa_dilogue5_issue_catg5_container{
    width: 30%;
    height: max-content;
    font-size: 20px;
    padding: 7px;
    border-radius: 11px;

    }
    .qa_dilogue5_issue_catg5_container img{
        width:75%;
    }
    .qa_dilogue5_issue_text{
width: 100%;
    color: #23285C;
    margin: 0;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    }
    .qa_dilogue5_button1{
height: max-content;
    padding: 6px 22px;
    border-radius: 12px;
    background-color: #292465;
    color: #fff;
    font-size: 19px;
    }
        .QAlogo{
            width: 100%;
    height: max-content;
    overflow: hidden;
    text-align: center;
    }

    .QAlogo img{
        width: 10%;
    }



.qa_dilogue_back_row{
    display: flex;
    justify-content: space-between;
}

.qa_dilogue_skip{
        padding: 15px;
    font-weight: 800;
    color: #9B9B9B;
}

.qa_gender{
        width: 100%;
    height: max-content;
    display: flex;
    justify-content: center;
}

.qa_gender div {
    width: 60px;
    height: max-content;
    margin: 0px 5px;
    /*
    border-bottom: solid 1px;
    border-right: solid 1px;
    border-radius: 6px;
    */
    padding: 5px;
}
.qa_gender img {
    width: 100%;
}
.qa_gender p {
    margin: 0;
}

.qa_male{}

.qa_female{}

.qa_other{}




@media screen and (max-width:767px) and (min-width:320px){

    *{
        padding:0;
        margin:0;

    font-family: 'Open Sans', sans-serif;
font-family: 'Poppins', sans-serif;
font-family: 'Roboto', sans-serif;
font-family: 'Ubuntu', sans-serif;
    }
.qa_dilogue_container{
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0,0.6);
    position: fixed;
    top: 0px;
    z-index: 9991;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    align-content: flex-start;
}   

.qa_dilogue_tray_container{
    width: 95%;
    height: 80%;
    margin: 0 auto;
    overflow: hidden;
} 
.qa_dilogue1{
        background-color: #fff;
}
.qa_dilogue2{
        background-color: #fff;
    
}
.qa_dilogue3{
    
        background-color: grey;
}
.qa_dilogue_tray{
    width: 500%;
    height: 100%;
    transition: ease 1s;
    display: flex;
    justify-content: space-between;
}
.qa_dilogue_tray .qa_dilogue{
border-radius: 20px;
    width: 20%;
    height: 85%;
    display: inline-block;
    text-align: center;
    overflow: hidden;
}
.qa_dilogue_head{
    width: 100%;
    text-align: center;
    font-size: 28px;
    color:#25285F;
}

.qa_dilogue_tray input{
    padding: 6px;
    width: 75%;
    margin: 0 auto;
    background-color: transparent;
    border: solid 1px #25285F;
    color: #25285F;
    font-size: 24px;
    outline: none;
}
.qa_dilogue1_row1{
    height: 18%;
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
}

.qa_dilogue1_row2{
    height: 20%;
    background-color: unset;
}
.qa_dilogue1_row2_dob_select{
    font-size: 20px;
    background-color: #A0549E;
    border: 1px solid #fff;
    outline: none;
    color: #fff;
    border-radius: 8px;
    padding: 7px 10px 7px 10px;
    width: 30%;
      -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';
  text-align: center;
}
.qa_dilogue1_row2_dob_select option{
    background-color: #A0549E;
}
.qa_dilogue1_row2_dob_head{
    font-size: 20px;
    color: #25285F;
    width: 75%;
    text-align: center;
    margin: 0 auto;
    padding: 13px 0px 13px 0px;
        -webkit-text-stroke: 0.2px #25285F;
}

.qa_dilogue1_row2_dob{
    display: flex;
    width: 90%;
    margin: 0 auto;
    justify-content: space-between;
}
.qa_dilogue_button1{
padding: 10px 30px;
    border-radius: 9px;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    background-color: #292465;
}


/*Dilogue 2*/

    .qa_dilogue2_row1{
        height:45%;
        background-color: transparent;
    }
    .qa_dilogue2_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    }
    .qa_dilogue2_row1_head{
font-size: 21px;
    padding-top: 14%;
    font-weight: bold;
    color: #25285F;
    width: 100%;
    -webkit-text-stroke: 0.8px #25285F;
    font-weight: 900;
    
    }
    .qa_dilogue2_issue_catg2_container{
    width: 40%;
    height: 7rem !important;
    font-size: 18px;
    padding: 7px;
    border-radius: 11px;
    background-color: #A0549E;
    display: flex;
    align-items: center;

    }
    .qa_dilogue2_issue_catg2_container img{
        width:100%;
    }
    .qa_dilogue2_issue_text{
    width: 100%;
    color: #fff;
    margin: 0;
    }
    .qa_dilogue_back{
    font-size: 35px;
    text-align: left;
    /* padding: 10px 20px; */
    /* background: rgba(37, 40, 95,0.7); */
    width: max-content;
    border-radius: 50%;
    font-weight: 600;
    color: #fff;
    border: 12px solid transparent;
    width: 16%;
    height: 20%;
    overflow: hidden;
    background-image: url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/Back-Button.png);
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
    }



/*Dilogue 3*/

    
    .qa_dilogue3_row1{
        height:45%;
        
        background-color: transparent;
    }
    .qa_dilogue3_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    }
    .qa_dilogue3_row1_head{
font-size: 20px;
    padding-top: 13%;
    /* padding: 0px 0px; */
    padding-right: 20px;
    padding-left: 20px;
    color: #25285F;
    -webkit-text-stroke: 0.8px #25285F;
    font-weight: 900;
    }
    .qa_dilogue3_issue_catg3_container{
    width: 70%;
    height: max-content;
    font-size: 20px;
    padding: 7px;
    border-radius: 11px;
    background-color: #A0549E;

    }
    .qa_dilogue3_issue_catg3_container img{
        width:100%;
    }
    .qa_dilogue3_issue_text{
    width: 100%;
    color: #fff;
    margin: 0;
    }


/*Dilogue 4*/

    
    .qa_dilogue4_row1{
        height:45%;
        
        background-color: transparent;
    }
    .qa_dilogue4_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    }
    .qa_dilogue4_row1_head{
font-size: 21px;
    padding-top: 13%;
    /* padding: 0px 0px; */
    padding-right: 20px;
    padding-left: 20px;
    color: #25285F;
    -webkit-text-stroke: 0.8px #25285F;
    font-weight: 900;
    }
    .qa_dilogue4_issue_catg4_container{
    width: 70%;
    height: max-content;
    font-size: 20px;
    padding: 7px;
    border-radius: 11px;
    background-color: #A0549E;

    }
    .qa_dilogue4_issue_catg4_container img{
        width:100%;
    }
    .qa_dilogue4_issue_text{
    width: 100%;
    color: #fff;
    margin: 0;
    }


/*dilogue 5 */

    .qa_dilogue5{
        height:90%;
    }

    .qa_dilogue5_row1{
    height: 25%;
    
        background-color: transparent;
    }
    .qa_dilogue5_row2{
height: 55%;
    background-color: transparent;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    }
    .qa_dilogue5_row1_head{
font-size: 21px;
    padding-top: 0%;
    /* padding: 0px 0px; */
    padding-right: 20px;
    padding-left: 20px;
    color: #25285F;
    -webkit-text-stroke: 0.8px #25285F;
    font-weight: 900;
    }
    .qa_dilogue5_issue_catg5_container{
    width: 30%;
    height: max-content;
    font-size: 24px;
    padding: 7px;
    border-radius: 11px;
    background-color: unset;

    }
    .qa_dilogue5_issue_catg5_container img{
        width: 65%;
    }
    .qa_dilogue5_issue_text{
    width: 100%;
    color: #23285C;
    margin: 0;
    font-size: 14px;
    padding-top: 5px;
    }

    .QAlogo{
            width: 100%;
    height: max-content;
    overflow: hidden;
    text-align: center;
    padding: 5% 0%;
    }

    .QAlogo img{
        width: 30%;

    }


.qa_dilogue_back_row{
    display: flex;
    justify-content: space-between;
}

.qa_dilogue_skip{
        padding: 15px;
    font-weight: 800;
    color: #9B9B9B;
}

.qa_gender{
        width: 100%;
    height: max-content;
    display: flex;
    justify-content: center;
}

.qa_gender div {
    width: 60px;
    height: max-content;
    margin: 0px 5px;
    /*
    border-bottom: solid 1px;
    border-right: solid 1px;
    border-radius: 6px;
    */
    padding: 5px;
}
.qa_gender img {
    width: 100%;
}
.qa_gender p {
    margin: 0;
}

.qa_male{}

.qa_female{}

.qa_other{}


}



</style>



<div class="qa_dilogue_container">
    <div class="QAlogo"><img src="https://thriive.in/wp-content/themes/thriive/horoscope_new/Thriive-logo/thriive-logo.png"></div>
<div class="qa_dilogue_tray_container">
<div class="qa_dilogue_tray" onload="checkForExistingData();">
    
<div class="qa_dilogue1 qa_dilogue">
        <div class="qa_dilogue1_row1"  onclick="check_active_input();">
            <p class="qa_dilogue1_row1_head">
               For Your Tarot Reader     
            </p>
        </div>

        <div class="qa_dilogue1_row2">
            <div class="qa_dilogue_spacer" style="/*height: 20%;*/"  onclick="check_active_input();"></div>
            <p class="qa_dilogue_name_field_label">Full Name</p>
            <input type="text" id="qa_dilogue_name_field" placeholder="" onclick="scroll_top(); clear_qa_name_input();">
            <br>
        </div>
        <div class="qa_dilogue1_row3">
            <div class="qa_dilogue_spacer" style="height: 10%;"  onclick="check_active_input();"></div>
            
                <div class="qa_gender"  onclick="check_active_input();">
                    
                    <div class="qa_male" onclick="changeQAGenderBackground(0);"><img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/maleu.png">
                    </div>
                    <div class="qa_female" onclick="changeQAGenderBackground(1);"><img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/femaleu.png">
                    </div>
                    <div class="qa_other" onclick="changeQAGenderBackground(2);"><img src="https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/othersu.png">
                    </div>

                </div>

<div class="qa_dilogue_spacer" style="height: 10%;"  onclick="check_active_input();"></div>
            <p class="qa_dilogue1_row2_dob_head"  onclick="check_active_input();">
                Date Of Birth
            </p>
            <div class="qa_dilogue1_row2_dob"  onclick="check_active_input();">
                <select class="qa_dilogue_dob_date qa_dilogue1_row2_dob_select">
                    <?php echo $date_options;?>
                </select>
                <select class="qa_dilogue_dob_month qa_dilogue1_row2_dob_select">
                    <option>Jan</option>
                    <option>Feb</option>
                    <option>Mar</option>
                    <option>Apr</option>
                    <option>May</option>
                    <option>Jun</option>
                    <option>Jul</option>
                    <option>Aug</option>
                    <option>Sep</option>
                    <option>Oct</option>
                    <option>Nov</option>
                    <option>Dec</option>
                </select>
                <select class="qa_dilogue_dob_year qa_dilogue1_row2_dob_select">
                    <?php echo $year_options; ?>
                </select>
            </div>

            <div class="qa_dilogue_spacer" style="height: 25%;"  onclick="check_active_input();"></div>
            <button class="qa_dilogue_button1"  onclick="check_active_input();">Continue</button><br><br>
        </div>
</div>
<style type="text/css">

</style>
<div class="qa_dilogue2 qa_dilogue">
        <div class="qa_dilogue2_row1">
            <div class="qa_dilogue_back_row">
                <div class="qa_dilogue_back" onclick="scroll_qa_dilogue(0)" style="width:50px;height:50px;"></div>
                <div class="qa_dilogue_skip" onclick="skip_qa()">SKIP</div>

            </div>
            <p class="qa_dilogue2_row1_head">
                Select your question<br>catagory    
            </p>
        </div>

        <div class="qa_dilogue2_row2">
            <div class="qa_dilogue2_issue_catg2_container" data-issue_catg2="Love & Relationship" onclick="catch_qa_feedback({issue_catg2:this.dataset.issue_catg2});changeScreen2Background(0);" style="
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/love.jpg);
                background-size: 175% 175%;
                background-position: center;
                ">
                <p class="qa_dilogue2_issue_text"><?php return_data(0,'','');?></p>
            </div>
            <div class="qa_dilogue2_issue_catg2_container" data-issue_catg2="Career & Finance" onclick="catch_qa_feedback({issue_catg2:this.dataset.issue_catg2});changeScreen2Background(1);" style="
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/career.jpg);
                background-size: 175% 175%;
                background-position: center;
                ">
                <p class="qa_dilogue2_issue_text"><?php return_data(1,'','');?></p>
            </div>
            <div class="qa_dilogue2_issue_catg2_container" data-issue_catg2="Health" onclick="catch_qa_feedback({issue_catg2:this.dataset.issue_catg2});changeScreen2Background(2);" style="
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/health.jpg);
                background-size: 175% 175%;
                background-position: center;
                ">
                <p class="qa_dilogue2_issue_text"><?php return_data(2,'','');?></p>
            </div>
            <div class="qa_dilogue2_issue_catg2_container" data-issue_catg2="Family" onclick="catch_qa_feedback({issue_catg2:this.dataset.issue_catg2});changeScreen2Background(3);" style="
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/family.jpg);
                background-size: 175% 175%;
                background-position: center;
                ">
                <p class="qa_dilogue2_issue_text"><?php return_data(3,'','');?></p>
            </div>

        </div>
</div>

<style type="text/css">


</style>

<div class="qa_dilogue3 qa_dilogue">
        <div class="qa_dilogue3_row1">
            <div class="qa_dilogue_back" onclick="scroll_qa_dilogue(-20)"></div>
            <p class="qa_dilogue3_row1_head">
                --     
            </p>
        </div>

        <div class="qa_dilogue3_row2">
            <div class="qa_dilogue3_issue_catg3_container" data-issue_catg3="--" onclick="catch_qa_feedback({issue_catg3:this.dataset.issue_catg3});changeScreen3Background(0)" style="">
                <p class="qa_dilogue3_issue_text">--</p>
            </div>
            <div class="qa_dilogue3_issue_catg3_container" data-issue_catg3="--" onclick="catch_qa_feedback({issue_catg3:this.dataset.issue_catg3});changeScreen3Background(1)">
                <p class="qa_dilogue3_issue_text">--</p>
            </div>
            <div class="qa_dilogue3_issue_catg3_container" data-issue_catg3="--" onclick="catch_qa_feedback({issue_catg3:this.dataset.issue_catg3});changeScreen3Background(2)">
                <p class="qa_dilogue3_issue_text">--</p>
            </div>
            <div class="qa_dilogue3_issue_catg3_container" data-issue_catg3="--" onclick="catch_qa_feedback({issue_catg3:this.dataset.issue_catg3});changeScreen3Background(3)">
                <p class="qa_dilogue3_issue_text">--</p>
            </div>

        </div>
</div>

<style type="text/css">

</style>

<div class="qa_dilogue4 qa_dilogue">
        <div class="qa_dilogue4_row1">
            <div class="qa_dilogue_back" onclick="scroll_qa_dilogue(-40)"></div>
            <p class="qa_dilogue4_row1_head">
                --     
            </p>
        </div>

        <div class="qa_dilogue3_row2">
            <div class="qa_dilogue4_issue_catg4_container" data-issue_catg4="--" onclick="catch_qa_feedback({issue_catg4:this.dataset.issue_catg4});changeScreen4Background(0);" style="">
                <p class="qa_dilogue4_issue_text">--</p>
            </div>
            <div class="qa_dilogue4_issue_catg4_container" data-issue_catg4="--" onclick="catch_qa_feedback({issue_catg4:this.dataset.issue_catg4});changeScreen4Background(1);">
                <p class="qa_dilogue4_issue_text">--</p>
            </div>
            <div class="qa_dilogue4_issue_catg4_container" data-issue_catg4="--" onclick="catch_qa_feedback({issue_catg4:this.dataset.issue_catg4});changeScreen4Background(2);">
                <p class="qa_dilogue4_issue_text">--</p>
            </div>
            <div class="qa_dilogue4_issue_catg4_container" data-issue_catg4="--" onclick="catch_qa_feedback({issue_catg4:this.dataset.issue_catg4});changeScreen4Background(3);">
                <p class="qa_dilogue4_issue_text">--</p>
            </div>

        </div>
</div>




<div class="qa_dilogue5 qa_dilogue">
        <div class="qa_dilogue5_row1">
            <div class="qa_dilogue_back" onclick="scroll_qa_dilogue(-60)" style="height: 35%"></div>
            <p class="qa_dilogue5_row1_head">
                How Are You<br>Feeling Today?     
            </p>
        </div>

        <div class="qa_dilogue5_row2">
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Happy" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(0)" style=""><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/1.png">
                <p class="qa_dilogue5_issue_text">Happy</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Sad" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(1)"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/2.png">
                <p class="qa_dilogue5_issue_text">Sad</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Angry" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(2)"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/3.png">
                <p class="qa_dilogue5_issue_text">Angry</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Lonely" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(3)"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/4.png">
                <p class="qa_dilogue5_issue_text">Lonely</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Anxious" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(4)" style=""><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/5.png">
                <p class="qa_dilogue5_issue_text">Anxious</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Stressed" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(5)"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/6.png">
                <p class="qa_dilogue5_issue_text">Stressed</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Motivated" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(6)"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/7.png">
                <p class="qa_dilogue5_issue_text">Motivated</p>
            </div>
            <div class="qa_dilogue5_issue_catg5_container" data-issue_catg5="Demotivated" onclick="catch_qa_feedback({issue_catg5:this.dataset.issue_catg5});changeScreen5Background(7)"><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/8.png">
                <p class="qa_dilogue5_issue_text">Demotivated</p>
            </div>   

        </div><br>
        <div class="qa_dilogue5_row3">         
                <button class="qa_dilogue5_button1" onclick="submitQAValues();">Submit</button>
        </div>
</div>




</div>


</div>



</div>

<form action="https://www.thriive.in/calling-therapist" style="display: none;" method="POST" id="callingForm">
    <input type="text" name="tid" id="tid" value="<?php echo $post->post_author; ?>">
    <input type="text" name="uid" id="uid" value="<?php echo $userId; ?>">
	<input type="text" name="lastid" id="lastid" value="<?php echo $lastid; ?>">
    <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>">
    <input type="text" name="session_duration" id="session_duration" value="<?php echo $freemins[4]; ?>">
    <input type="text" name="productinfo" id="productinfo" value="<?php echo $productinfo; ?>">
    <input type="text" name="calling" id="calling" value="true">
    <input type="submit" id="callingFormSubmit">
</form>


<div class="show_layover" style="           width: 100%;
    height: 100vh;
    background-color: #CBB7FF;
    position: absolute;
    top: 0;
    z-index: 9999;
    display: flex;
    align-items: center;display:none; " onclick="this.style.display='none'">
    <div class="show_layover_inner" style="       width: 95%;
    height: 45%;
    background-color: #fff;
    margin: 0 auto;
    border-radius: 10px;
    font-size: 20px;">
        Name : --<br>
        DOB : --<br>
        issue catg1 : --<br>
        issue catg2 : --<br>
        issue catg3 : --<br>
    </div>
</div>
<script type="text/javascript">





    globalThis.qaFeedback = {name:'',dob:'',gender:'',issue_catg2:'',issue_catg3:'',issue_catg4:'',issue_catg5:''};
    globalThis.qa_name_input = 0;
    globalThis.qaGenderInput = 0;

    function clear_qa_name_input(){
    	if(qa_name_input == 0){
    		qa_name_input = 1;
    		document.querySelector('#qa_dilogue_name_field').value = '';
    	}else if(qaGenderInput == 0){
                alert('Please select a gender');
                return;
            }
    }

    document.querySelector('.qa_dilogue_button1').addEventListener('click', function(){
            if(document.querySelector('#qa_dilogue_name_field').value.length < 3){
                document.querySelector('#qa_dilogue_name_field').style.borderBottom = "solid red";
                return;
            }
            let qa_date = document.querySelector('.qa_dilogue_dob_date ').value;
            let qa_month = document.querySelector('.qa_dilogue_dob_month ').value;
            let qa_year = document.querySelector('.qa_dilogue_dob_year ').value;
            let qa_dob = qa_date + '/' + qa_month + '/' + qa_year;
            catch_qa_feedback({dob:qa_dob});
            catch_qa_feedback({name:document.querySelector('#qa_dilogue_name_field').value});

            scroll_qa_dilogue(-20);

    });
    function scroll_qa_dilogue(para){
        document.querySelector('.qa_dilogue_tray').style.transform = 'translateX('+para+'%)';
    }

    setTimeout(function () {
        let viewheight = $(window).height();
        let viewwidth = $(window).width();
        let viewport = document.querySelector("meta[name=viewport]");
        viewport.setAttribute("content", "height=" + viewheight + "px, width=" + viewwidth + "px, initial-scale=1.0");
    }, 300);

    function scroll_top(){
        document.querySelector('.qa_dilogue_tray').style.transform = 'translateY(-20%)';
    }

    function check_active_input(){
        if(document.activeElement.getAttribute('id') != 'qa_dilogue_name_field'){
            document.querySelector('.qa_dilogue_tray').style.transform = 'translateY(0%)';
        }
    }

    var date_options = '';
    for(i=0;i<=31;i++){
    date_options += '<option>'+i+'</option>'
    }

    function catch_qa_feedback({name='',dob='',issue_catg2='',issue_catg3='',issue_catg4='',issue_catg5=''} = {}){
        if(name == ''){}else{qaFeedback['name'] = name}
        if(dob == ''){}else{qaFeedback['dob'] = dob}
        if(issue_catg2 == ''){}else{
            qaFeedback['issue_catg2'] = issue_catg2; 
            scroll_qa_dilogue(-40);
            insert_qa_feedback_screen({screen:3,issue_catg:issue_catg2});
            let checkForRepeatedData = checkForRecurrentData(issue_catg2);

            if(checkForRepeatedData == 1){
            	selectPreviousIssue3();
            }else{
            	resetScreenBackground();
            }

        }
        if(issue_catg3 == ''){}else{
            qaFeedback['issue_catg3'] = issue_catg3;
            scroll_qa_dilogue(-60);
            insert_qa_feedback_screen({screen:4,issue_catg:issue_catg3})
        }
        if(issue_catg4 == ''){}else{
            qaFeedback['issue_catg4'] = issue_catg4;
            qaFeedback['payuid'] = '<?php echo $payuid; ?>';
            qaFeedback['uid'] = <?php echo $currentUserId; ?>;            
            scroll_qa_dilogue(-80);

        }
        if(issue_catg5 == ''){}else{
            qaFeedback['issue_catg5'] = issue_catg5;        
            

            //feedQAData(JSON.stringify(qaFeedback));

            //scroll_qa_dilogue(-60);

        }

        	console.log(qaFeedback);
    }



    function selectPreviousGender(){
        let previousGender = existingData['gender'];
        let genderClickIndex = 4;
        switch(previousGender){
            case 'Male':
            genderClickIndex = 0;
            break;
            case 'Female':
            genderClickIndex = 1;
            break;
            case 'Other':
            genderClickIndex = 2;
            break;
        }

        if(genderClickIndex != 4){
            document.querySelectorAll('.qa_gender div')[genderClickIndex].click();
        }

    }

    function changeQAGenderBackground(index){
        qaGenderInput = 1;
        let QAGenderBlock = document.querySelectorAll('.qa_gender div');
        let unSelArr = [
                'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/maleu.png',
                'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/femaleu.png',
                'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/othersu.png',
            ];
        let SelArr = [
                'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/male-selected.png',
                'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/female-selected.png',
                'https://www.thriive.in/wp-content/themes/thriive/horoscope_new/QA/images/others-selected.png',
            ];
        for(i=0;i<3;i++){
            QAGenderBlock[i].style.backgroundColor = 'unset';
            //QAGenderBlock[i].style.borderBottom = 'solid 1px';
            //QAGenderBlock[i].style.borderRight = 'solid 1px';
            QAGenderBlock[i].children[0].setAttribute('src', unSelArr[i]);
        }
        //QAGenderBlock[index].style.backgroundColor = '#3C4155';
        //QAGenderBlock[index].children[1].style.color = '#fff';
        QAGenderBlock[index].children[0].setAttribute('src', SelArr[index]);
        feedGenderInQAArray(index);

    }

    function feedGenderInQAArray(data){
        let selGender = '';
        switch(data){
            case 0:
            selGender = 'Male';
            break;
            case 1:
            selGender = 'Female';
            break;
            case 2:
            selGender = 'Other';
            break;
        }

        qaFeedback['gender'] = selGender;
        console.log(qaFeedback);
    }



	function checkForRecurrentData(current_val){
		if(typeof(existingData)  == 'object'){
			
			return(existingData['issue_catg2'] == current_val)? 1 : 0 ;

		}
	}

	function selectPreviousIssue3(){
		qaFeedback['issue_catg3'] = existingData['issue_catg3'];
		let issue_catg3val = document.querySelectorAll('.qa_dilogue3_issue_catg3_container');
		for(i=0;i<issue_catg3val.length;i++){
			if(issue_catg3val[i].firstElementChild.innerText == existingData['issue_catg3']){
				document.querySelectorAll('.qa_dilogue3_issue_catg3_container')[i].click();
			}
		}

		selectPreviousIssue4();

	}

	function selectPreviousIssue4(){
		qaFeedback['issue_catg4'] = existingData['issue_catg4'];
		let issue_catg3val = document.querySelectorAll('.qa_dilogue4_issue_catg4_container');
		for(i=0;i<issue_catg3val.length;i++){
			if(issue_catg3val[i].firstElementChild.innerText == existingData['issue_catg4']){
				document.querySelectorAll('.qa_dilogue4_issue_catg4_container')[i].click();
			}
		}
	};

    function changeScreen2Background(index){
    	let smile = document.querySelectorAll('.qa_dilogue2_issue_catg2_container');
    	for(i=0;i<smile.length;i++){
		    smile[i].style.backgroundColor = '#A0549E';
		}
		smile[index].style.backgroundColor = '#292465';
    }


    function changeScreen3Background(index){
    	let smile = document.querySelectorAll('.qa_dilogue3_issue_catg3_container');
    	for(i=0;i<smile.length;i++){
		    smile[i].style.backgroundColor = '#A0549E';
		}
		smile[index].style.backgroundColor = '#292465';
    }


    function changeScreen4Background(index){
    	let smile = document.querySelectorAll('.qa_dilogue4_issue_catg4_container');
    	for(i=0;i<smile.length;i++){
		    smile[i].style.backgroundColor = '#A0549E';
		}
		smile[index].style.backgroundColor = '#292465';
    }

globalThis.finalInput = 0;

    function changeScreen5Background(index){
      let smile = document.querySelectorAll('.qa_dilogue5_issue_catg5_container');
      for(i=0;i<smile.length;i++){
        smile[i].style.backgroundColor = 'unset';
        smile[i].childNodes[2].style.color = '#23285C';
    }
    smile[index].style.backgroundColor = 'rgba(41, 36, 101,0.7)';
    smile[index].childNodes[2].style.color = '#fff';

    finalInput = 1;
    }

    function resetScreenBackground(){
    	let screen3Backgrounds = document.querySelectorAll('.qa_dilogue3_issue_catg3_container');
    	for(i=0;i<screen3Backgrounds.length;i++){
		    screen3Backgrounds[i].style.backgroundColor = '#A0549E';
		}
		let screen4Backgrounds = document.querySelectorAll('.qa_dilogue4_issue_catg4_container');
    	for(i=0;i<screen4Backgrounds.length;i++){
		    screen4Backgrounds[i].style.backgroundColor = '#A0549E';
		}
    }

    function submitQAValues(){
        document.querySelector('.qa_dilogue5_button1').style.backgroundColor = "#fff";
        document.querySelector('.qa_dilogue5_button1').style.color = "#292465";
        document.querySelector('.qa_dilogue5_button1').style.fontWeight = "700";

    	if(finalInput == 0){
    		alert('Please Select a Value');
    	}else{
    	feedQAData(JSON.stringify(qaFeedback));
    	}
    }

    function feedQAData(data){
    	//console.log(data);
    	$.post('wp-content/themes/thriive/horoscope_new/QA/API/API.php',{data:data,action:'feedDataToDB'},function(response){
    		console.log(response);
			var gender;
    		if(response = 'data inserted'){
				if(qaFeedback['gender'] == 'Female'){
					gender = 'F';
					
				}else if(qaFeedback['gender'] == 'Male'){
					gender = 'M';
				}	
				clevertap.onUserLogin.push({
					Site: {
						"Gender" : gender
					}
				});
				clevertap.event.push("QNA", {
					"NAME": qaFeedback['name'],
					"DOB": qaFeedback['dob'],
					"Issue1" : qaFeedback['issue_catg2'],
					"Issue2" : qaFeedback['issue_catg3'], 
					"issue3" : qaFeedback['issue_catg4'], 
					"issue4" : qaFeedback['issue_catg5'],
					"Gender" : qaFeedback['gender']
	   
				});
    			document.querySelector('.show_layover').style.display = 'none';
            document.querySelector('.show_layover_inner').innerHTML = 'NAME : '+ qaFeedback['name'] + '<br>' +
                                                                      'DOB : '+ qaFeedback['dob'] + '<br>' +
                                                                      'Issue1 : '+ qaFeedback['issue_catg2'] + '<br>' + 
                                                                      'Issue2 : '+ qaFeedback['issue_catg3'] + '<br>' + 
                                                                      'issue3 : '+ qaFeedback['issue_catg4'] + '<br>' + 
                                                                      'issue4 : '+ qaFeedback['issue_catg5'] + '<br>';
    		}

            if(response !== null){
                redirectToSessionPage();
            }

    	});
    }


    function redirectToSessionPage(){

        let page = '<?php echo $_POST['udf2']; ?>';

        if(page.search('chat') > 0){
            let url = 'https://www.thriive.in/chat-page';
            window.location.replace(url);
            return;
        }
        if(page.search('call') > 0){

            placeCallWithVars();
            return;
        }
    }


    function placeCallWithVars(){
            document.querySelector('#callingForm').submit();

    }

    function skip_qa(){

        if(confirm('Are you sure?? you are not submitting any data to therapist.')){

            qaFeedback['issue_catg2'] = 'Skip';
            qaFeedback['issue_catg3'] = 'Skip';
            qaFeedback['issue_catg4'] = 'Skip';
            qaFeedback['issue_catg5'] = 'Skip';
            qaFeedback['payuid'] = '<?php echo $payuid; ?>';
            qaFeedback['uid'] = <?php echo $currentUserId; ?>;
            finalInput = 1;
            document.querySelector('.qa_dilogue5_button1').click();

        }
    }

    function insert_qa_feedback_screen({screen='',issue_catg=''}={}){


//console.log(screen+issue_catg);
        if(screen == 3){
            switch (issue_catg){
                case 'Love & Relationship':
                    generate_qa_feedback_screen('Love & Relationship');
                return;
                case 'Career & Finance':
                    generate_qa_feedback_screen('Career & Finance');
                return;
                case 'Health':
                    generate_qa_feedback_screen('Health');
                return;
                case 'Family':
                    generate_qa_feedback_screen('Family');
                return;
            }
        }

        if(screen == 4){
            switch (issue_catg){
                //Love & RelationShip
                case 'Single':
                    generate_qa_feedback_screen('Single');
                return;
                case 'In a Relationship':
                    generate_qa_feedback_screen('In a Relationship');
                return;
                case 'Married':
                    generate_qa_feedback_screen('Married');
                return;
                case 'Divorced':
                    generate_qa_feedback_screen('Divorced');
                return;

                //Career and Finance

                case 'Employed / Salaried':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Entrepreneur':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Family business':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'In-between jobs':
                    generate_qa_feedback_screen(issue_catg);
                return;

                //health

                case 'Emotional health':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Mental health':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Physical health':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Sexual health':
                    generate_qa_feedback_screen(issue_catg);
                return;

                //health

                case 'Parenting':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Family conflicts':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Issues with teenagers':
                    generate_qa_feedback_screen(issue_catg);
                return;
                case 'Issues with spouse':
                    generate_qa_feedback_screen(issue_catg);
                return;

            }            
        }

    }

function generate_qa_feedback_screen(screen){
	console.log(screen);
//screen 3
            switch (screen){
                case 'Love & Relationship':                
                    document.querySelector('.qa_dilogue3_row1_head').innerText = 'Select Your Relationship Status';                
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[0].innerText = '<?php return_data(0,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[1].innerText = '<?php return_data(0,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[2].innerText = '<?php return_data(0,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[3].innerText = '<?php return_data(0,3,"");?>';

                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[0].dataset.issue_catg3 = '<?php return_data(0,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[1].dataset.issue_catg3 = '<?php return_data(0,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[2].dataset.issue_catg3 = '<?php return_data(0,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[3].dataset.issue_catg3 = '<?php return_data(0,3,"");?>';
                return;
                case 'Career & Finance':                
                    document.querySelector('.qa_dilogue3_row1_head').innerText = 'Select an option that’s closest to being accurate';                
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[0].innerText = '<?php return_data(1,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[1].innerText = '<?php return_data(1,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[2].innerText = '<?php return_data(1,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[3].innerText = '<?php return_data(1,3,"");?>';

                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[0].dataset.issue_catg3 = '<?php return_data(1,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[1].dataset.issue_catg3 = '<?php return_data(1,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[2].dataset.issue_catg3 = '<?php return_data(1,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[3].dataset.issue_catg3 = '<?php return_data(1,3,"");?>';
                return;
                case 'Health':                
                    document.querySelector('.qa_dilogue3_row1_head').innerText = 'Select an option that’s closest to being accurate';                
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[0].innerText = '<?php return_data(2,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[1].innerText = '<?php return_data(2,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[2].innerText = '<?php return_data(2,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[3].innerText = '<?php return_data(2,3,"");?>';

                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[0].dataset.issue_catg3 = '<?php return_data(2,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[1].dataset.issue_catg3 = '<?php return_data(2,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[2].dataset.issue_catg3 = '<?php return_data(2,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[3].dataset.issue_catg3 = '<?php return_data(2,3,"");?>';
                return;
                case 'Family':                
                    document.querySelector('.qa_dilogue3_row1_head').innerText = 'Select an option that’s closest to being accurate';                
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[0].innerText = '<?php return_data(3,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[1].innerText = '<?php return_data(3,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[2].innerText = '<?php return_data(3,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_text ')[3].innerText = '<?php return_data(3,3,"");?>';

                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[0].dataset.issue_catg3 = '<?php return_data(3,0,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[1].dataset.issue_catg3 = '<?php return_data(3,1,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[2].dataset.issue_catg3 = '<?php return_data(3,2,"");?>';
                    document.querySelectorAll('.qa_dilogue3_issue_catg3_container ')[3].dataset.issue_catg3 = '<?php return_data(3,3,"");?>';
                return;

//screen 4

//Love & Relationship
                case 'Single':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(0,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(0,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(0,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(0,0,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(0,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(0,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(0,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(0,0,3);?>';
                return;

                case 'In a Relationship':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(0,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(0,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(0,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(0,1,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(0,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(0,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(0,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(0,1,3);?>';
                return;
                case 'Married':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(0,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(0,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(0,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(0,2,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(0,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(0,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(0,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(0,2,3);?>';
                return;
                case 'Divorced':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(0,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(0,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(0,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(0,3,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(0,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(0,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(0,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(0,3,3);?>';
                return;

//career and finance

                case 'Employed / Salaried':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(1,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(1,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(1,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(1,0,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(1,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(1,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(1,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(1,0,3);?>';
                return;

                case 'Entrepreneur':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(1,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(1,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(1,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(1,1,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(1,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(1,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(1,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(1,1,3);?>';
                return;
                case 'Family business':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(1,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(1,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(1,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(1,2,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(1,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(1,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(1,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(1,2,3);?>';
                return;
                case 'In-between jobs':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(1,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(1,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(1,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(1,3,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(1,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(1,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(1,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(1,3,3);?>';
                return;

//Health

                case 'Emotional health':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(2,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(2,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(2,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(2,0,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(2,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(2,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(2,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(2,0,3);?>';
                return;

                case 'Mental health':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(2,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(2,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(2,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(2,1,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(2,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(2,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(2,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(2,1,3);?>';
                return;
                case 'Physical health':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(2,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(2,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(2,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(2,2,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(2,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(2,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(2,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(2,2,3);?>';
                return;
                case 'Sexual health':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(2,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(2,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(2,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(2,3,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(2,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(2,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(2,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(2,3,3);?>';
                return;

//Family

                case 'Parenting':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(3,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(3,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(3,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(3,0,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(3,0,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(3,0,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(3,0,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(3,0,3);?>';
                return;

                case 'Family conflicts':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(3,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(3,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(3,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(3,1,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(3,1,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(3,1,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(3,1,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(3,1,3);?>';
                return;
                case 'Issues with teenagers':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(3,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(3,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(3,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(3,2,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(3,2,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(3,2,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(3,2,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(3,2,3);?>';
                return;
                case 'Issues with spouse':                
                    document.querySelector('.qa_dilogue4_row1_head').innerText = 'Please Select Your Issue';                
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[0].innerText = '<?php return_data(3,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[1].innerText = '<?php return_data(3,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[2].innerText = '<?php return_data(3,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_text ')[3].innerText = '<?php return_data(3,3,3);?>';

                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[0].dataset.issue_catg4 = '<?php return_data(3,3,0);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[1].dataset.issue_catg4 = '<?php return_data(3,3,1);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[2].dataset.issue_catg4 = '<?php return_data(3,3,2);?>';
                    document.querySelectorAll('.qa_dilogue4_issue_catg4_container ')[3].dataset.issue_catg4 = '<?php return_data(3,3,3);?>';
                return;


            }


            }
    




function checkForExistingData(){

	if(typeof(existingData)  == 'object'){

		let name = existingData['name'];

		let month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
		let yearIndex = 0;

		let currYear = new Date().getFullYear();
		let monthIndex = 0;
		let split_date = existingData['dob'].split('/');
		document.querySelector('.qa_dilogue_dob_date').selectedIndex = split_date[0]-1;

		for(i=0;i<month.length;i++){
			if(month[i] == split_date[1]){
				monthIndex = i;
			}
		}
		document.querySelector('.qa_dilogue_dob_month').selectedIndex = monthIndex;
		
		for(i=1900;i<=currYear;i++){
			if(i == split_date[2]){
				break;
			}
			yearIndex++;
		}
		document.querySelector('.qa_dilogue_dob_year').selectedIndex = yearIndex;	
		console.log(yearIndex);	

		document.querySelector('#qa_dilogue_name_field').value = name;
		qa_name_input = 1;

        selectPreviousGender();
		
        document.querySelector('.qa_dilogue_button1').click();


	}else if(existingData == 1){
		console.log('data existing');
		document.querySelector('.qa_dilogue_container').innerHTML = '<p style="color:#fff;font-size:24px;text-align:center; width:100%;">Data Exists For this session</p>';
        redirectToSessionPage();
	}else{

	}
};

document.onload = checkForExistingData();

</script>







