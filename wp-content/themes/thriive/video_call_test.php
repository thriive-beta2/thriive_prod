<?php /* Template Name: video_call_test */
//phpinfo();



//include_once get_stylesheet_directory().'/new-header.php';
?>



<?php /* Template Name: User Account Page */ 
$current_user = wp_get_current_user();

$userMeta = get_user_meta($current_user->ID);
//print_r($userMeta['first_name']);


if (!is_user_logged_in()){ 
        wp_redirect('/login/');
        exit();
}
?>
<?php
include_once get_stylesheet_directory().'/new-header.php';?>
    <style>
table, th, td {
  border: 1px solid black !important;
  padding: 5px !important;
}
table {
  border-spacing: 15px !important;
}
</style>
<style type="text/css">
    .userAccountParent{
        width: 40%;
        margin:0 auto;
    }
    .userAccountRow1{
        width: 100%
    }
    .userAccountHeading{
        text-align: center;
        font-size: 24px;
        font-weight: 500;
        color: #26265F;
        margin: 20px 0px;

    }

    .userAccountHeading img{
        width: 15px;
        height: 15px;
    }
    .userAccountQuickLinks{
        width: 100%;
        display: flex;
        justify-content: space-around;
        margin: 40px 0px;
    }
    .userAccountQuickLinksChild{
        width: 30%;
        text-align: center;
    }
    .userAccountQuickLinksChild img{
        width: 75px;
    }
    .userAccountQuickLinksChild section {
        font-weight: 500;
        font-size: 16px;
    }
    .userAccountSeparator {
        width: 100%;
        text-align: center;
    }
    .userAccountRow2ContentHead {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.userAccountRow2ContentHead div {
    font-size: 20px;
    color: #E34444;
    font-weight: 600;
    width: 30%;
    text-align: center;
}


.userAccountRow2ContentAppointments {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.userAccountRow2ContentAppointments div {
    width: 30%;
    text-align: center;
    margin: 10px 0px;
}
.userAccountRow2ContentAppointmentsCol2 div {
    width: 100%;
}

.userAccountRow2ContentAppointmentsCol2Row1{
    border-bottom: 1px solid black;
}


.userAccountSpacer{
    width:100%;
    height:20px;    
}

.userAccountName {
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 500;
}
.userAccountJoined{
    width: 100%;
    text-align: center;
    font-size: 16px;    
}

    .userAccountRow4ContentHead {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.userAccountRow4ContentHead div {
    font-size: 20px;
    color: #E34444;
    font-weight: 600;
    width: 30%;
    text-align: center;
}


.userAccountRow4ContentAppointments {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.userAccountRow4ContentAppointments div {
    width: 30%;
    text-align: center;
    margin: 10px 0px;
}
.userAccountRow4ContentAppointmentsCol2 div {
    width: 100%;
}

.userAccountRow4ContentAppointmentsCol2Row1{
    border-bottom: 1px solid black;
}
.userAccountRow3 {
    width: 100%;
}


@media screen and (max-width:767px) and (min-width:320px){

    .userAccountParent{
        width: 100%;
        margin-top: -25px;
    }
    .userAccountRow1{
        width: 100%
    }
    .userAccountHeading{
        text-align: center;
        font-size: 16px;
        font-weight: 600;
        color: #26265F;
        margin: 20px 0px;

    }

    .userAccountHeading img{
        width: 15px;
        height: 15px;
    }
    .userAccountQuickLinks{
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 40px 0px;
        margin-top: 0px;
    margin-bottom: 10px;
    }
    .userAccountQuickLinksChild{
        width: 30%;
        text-align: center;
    }
    .userAccountQuickLinksChild img{
        width: 55px;
    }
    .userAccountQuickLinksChild section {
        font-weight: 500;
        font-size: 14px;
    }
    .userAccountSeparator {
        width: 100%;
        text-align: center;
    }
    .userAccountRow2ContentHead {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.userAccountRow2ContentHead div {
    font-size: 16px;
    color: #E34444;
    font-weight: 600;
    width: 30%;
    text-align: center;
}


.userAccountRow2ContentAppointments {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.userAccountRow2ContentAppointments div {
    width: 30%;
    text-align: center;
    margin: 3px 0px;
    font-size: 14px;
}
.userAccountRow2ContentAppointmentsCol2 div {
    width: 100%;
}

.userAccountRow2ContentAppointmentsCol2Row1{
    border-bottom: 1px solid black;
}


.userAccountSpacer{
    width:100%;
    height:20px;    
}

.userAccountName {
    width: 100%;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
}
.userAccountJoined{
    width: 100%;
    text-align: center;
    font-size: 16px;    
}

    .userAccountRow4ContentHead {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.userAccountRow4ContentHead div {
    font-size: 18px;
    color: #E34444;
    font-weight: 600;
    width: 30%;
    text-align: center;
}


.userAccountRow4ContentAppointments {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.userAccountRow4ContentAppointments div {
    width: 30%;
    text-align: center;
    margin: 3px 0px;
    font-size: 14px;
}
.userAccountRow4ContentAppointmentsCol2 div {
    width: 100%;
}

.userAccountRow4ContentAppointmentsCol2Row1{
    border-bottom: 1px solid black;
}
.userAccountRow3 {
    width: 100%;
}




}



</style>



<?php
    $userId=$current_user->ID;
    $userName = $current_user->display_name;
    global $wpdb;
    $currDate = date('Y-m-d');
    $currTime = date('H:i:s');



function getAppointments(){
    global $wpdb;
    $query = "SELECT * FROM oc_video_call JOIN online_consultation ON online_consultation.id = oc_video_call.oc_id WHERE oc_video_call.book_date >= '$currDate' AND oc_video_call.uid=$userId ORDER BY oc_video_call.id DESC LIMIT 5";

    $res = $wpdb->get_results($query);
    //print_r($query);    

    $inc = 0;
    $appointmentArray = array();

    foreach($res as $key){

        if($key->book_date == $currDate){
            if($key->book_time > '09:00:00'){
                $appointmentArray[$inc] = $key;
                $inc++;
            }               
        }else{
            $appointmentArray[$inc] = $key;
                $inc++;
        }

    }

    return $appointmentArray;

}

$appointmentArray = getAppointments();

    $goldCount = '0';
    $goldDate = '--';
    $silverCount = '0';
    $silverDate = '--';
function getPendingSessions(){
    global $userId;
    global $wpdb;
    global $goldCount;
    global $goldDate;
    global $silverCount;
    global $silverDate;

    $query = "SELECT uid,category_name,MAX(created_date) AS createdDate, COUNT(remaining_session) AS balance FROM online_consultation WHERE remaining_session = 1 AND uid = $userId GROUP BY category_name;";
    $res = $wpdb->get_results($query);



    if(count($res) > 0){
        foreach($res as $key){
            if($key->category_name == 'gold-readers'){
                $goldCount = $key->balance;
                $goldDate = date('d-M-y',strtotime(explode(' ', $key->createdDate)[0]));
            }else if($key->category_name == 'silver-readers'){
                $silverCount = $key->balance;
                $silverDate = date('d-M-y',strtotime(explode(' ', $key->createdDate)[0]));
            }
        }
    }
}

getPendingSessions();

    //print_r($res);
?>



<!--<div class="userAccountHeading">
    <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
            My Account
    <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
</div>
<div class="userAccountName">
    Akash Kampoowale
</div>
-->


<div class="userAccountParent">

<div class="userAccountRow3">

        <div class="userAccountHeading">
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
            <?php echo $userMeta['first_name'][0]; ?>
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
        </div>
        <div class="userAccountQuickLinks">
            <div class="userAccountQuickLinksChild" onclick="alert('Coming Soon');/*userAccountRedirect('editProfile');*/">
                <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/Thriive_logo/Profile Page Icons_Edit Profile.svg">
                <section>Edit Profile</section>
            </div>
            <div class="userAccountQuickLinksChild" onclick="userAccountRedirect('sessionDetails');">
                <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/Thriive_logo/Profile Page Icons_Session.svg">
                <section>Session Details</section>
            </div>
            <div class="userAccountQuickLinksChild" onclick="userAccountRedirect('feedback');">
                <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/Thriive_logo/Profile Page Icons_Feedback.svg">
                <section>Feedback</section>
            </div>
        </div>
        
    </div>



<!--<div class="userAccountJoined">
    07 Jul 2022
</div>-->

<!--    <div class="userAccountSpacer"></div>-->
<!--    <div class="userAccountSeparator">
        <img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/seperator.svg">
    </div>-->
<!--    <div class="userAccountSpacer"></div>-->





<!--    <div class="userAccountSeparator">
        <img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/seperator.svg">
    </div>-->
    <!--<div class="userAccountSpacer"></div>-->


    <div class="userAccountRow4">

        <div class="userAccountHeading">
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
                Instant Tarot Sessions
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
        </div>
        <div class="userAccountRow4Content">
            <div class="userAccountRow4ContentHead">
                <div class="userAccountRow4ContentHeadCol1">
                    Date
                </div>
                <div class="userAccountRow4ContentHeadCol2">
                    Category
                </div>
                <div class="userAccountRow4ContentHeadCol3">
                    Balance
                </div>
            </div>
            <div class="userAccountRow4ContentAppointments">
                <div class="userAccountRow4ContentAppointmentsCol1">
                    <?php echo $silverDate; ?>
                </div>
                <div class="userAccountRow4ContentAppointmentsCol2">
                    <div class="userAccountRow4ContentAppointmentsCol2Row1">Silver Readers</div>
                </div>
                <div class="userAccountRow4ContentAppointmentsCol3">
                    <?php echo $silverCount; ?>
                </div>
            </div>
            <div class="userAccountRow4ContentAppointments">
                <div class="userAccountRow4ContentAppointmentsCol1">
                    <?php echo $goldDate; ?>
                </div>
                <div class="userAccountRow4ContentAppointmentsCol2">
                    <div class="userAccountRow4ContentAppointmentsCol2Row1">Gold Readers</div>
                </div>
                <div class="userAccountRow4ContentAppointmentsCol3">
                    <?php echo $goldCount; ?>
                </div>
            </div>          
        </div>
        
    </div>







    <div class="userAccountRow2">

        <div class="userAccountHeading">
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
            Upcoming Appointments
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
        </div>
        <div class="userAccountRow2Content">
            <div class="userAccountRow2ContentHead">
                <div class="userAccountRow2ContentHeadCol1">
                    Date
                </div>
                <div class="userAccountRow2ContentHeadCol2">
                    Therapy
                </div>
                <div class="userAccountRow2ContentHeadCol3">
                    Therapist
                </div>
            </div>
            <?php
                if(count($appointmentArray)>0){ 
                foreach($appointmentArray as $key){



            ?>
            <div class="userAccountRow2ContentAppointments" onclick="userAccountRedirect('appointmentPage');">
                <div class="userAccountRow2ContentAppointmentsCol1">
                    <?php echo $key->book_date; ?>
                </div>
                <div class="userAccountRow2ContentAppointmentsCol2">
                    <div class="userAccountRow2ContentAppointmentsCol2Row1"><?php echo ucwords(str_replace('-', ' ', $key->category_name)) ; ?></div>
                    <div class="userAccountRow2ContentAppointmentsCol2Row2"><?php echo $key->call_time; ?> Mins</div>
                </div>
                <div class="userAccountRow2ContentAppointmentsCol3">
                    <?php echo $key->tname; ?>
                </div>
            </div>
            <?php }
        }else{
            ?>
            <div class="userAccountRow2ContentAppointments">
                <div class="userAccountRow2ContentAppointmentsCol1">
                    --
                </div>
                <div class="userAccountRow2ContentAppointmentsCol2">
                    <div class="userAccountRow2ContentAppointmentsCol2Row1">No Upcoming Appointments</div>
                </div>
                <div class="userAccountRow2ContentAppointmentsCol3">
                    --
                </div>
            </div>

            <?php
        }
         ?>
        
        </div>
        
    </div>

<!--<div class="userAccountSpacer"></div>
    <div class="userAccountSeparator">
        <img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/seperator.svg">
    </div>-->
<!--<div class="userAccountSpacer"></div>-->


<!--<div class="userAccountSpacer"></div>
    <div class="userAccountSeparator">
        <img src="https://beta1.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/seperator.svg">
    </div>
-->




    <div class="userAccountRow1">

        <div class="userAccountHeading">
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
            Quick Links for Active Sessions
            <img src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Icon_Sky_blue.svg">
        </div>
        <div class="userAccountQuickLinks">
            <div class="userAccountQuickLinksChild" onclick="userAccountRedirect('callPage');">
                <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/Thriive_logo/Profile Page Icons_Instant Call.svg">
                <section>Instant Call Tarot</section>
            </div>
            <div class="userAccountQuickLinksChild" onclick="userAccountRedirect('chatPage');">
                <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/Thriive_logo/Profile Page Icons_Instant Chat.svg">
                <section>Instant Chat Tarot</section>
            </div>
            <div class="userAccountQuickLinksChild" onclick="userAccountRedirect('appointmentPage');">
                <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/Thriive_logo/Profile Page Icons_Appointment.svg">
                <section>Appointments</section>
            </div>
        </div>
        
    </div>












</div>



<script>
    
    function userAccountRedirect(redirectTo){
        switch(redirectTo){
            case 'editProfile':
                window.location.href = '<?php echo get_site_url(); ?>/seeker-my-account-edit';
            break;
            case 'sessionDetails':
                window.location.href = '<?php echo get_site_url(); ?>/session-details';
            break;
            case 'feedback':
                window.location.href = '<?php echo get_site_url(); ?>/issues-feedback-page';
            break;
            case 'chatPage':
                window.location.href = '<?php echo get_site_url(); ?>/chat-page';
            break;
            case 'callPage':
                window.location.href = '<?php echo get_site_url(); ?>/new-call-page';
            break;
            case 'appointmentPage':
                window.location.href = '<?php echo get_site_url(); ?>/appointment';
            break;                                   
        }
    }

    function fixFooterToBottom(){
        let windowHeight = window.screen.height;
        let documentHeight = document.body.scrollHeight;
        if(typeof(document.querySelector('.footerwrap')) !== null){
            if(windowHeight > documentHeight){
                document.querySelector('.footerwrap').style.position = 'absolute';
            }   
        }else{
            callFixfooterToBottom();
        }
        
    }

    function callFixfooterToBottom(){
        console.log('called');
        fixFooterToBottom();
    }


/*document.onload = fixFooterToBottom();*/

</script>



<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>




















<!-- 

START QA TEST CODE

<?php 


$_POST['mihpayid'] = '403993715526443275';

$_POST['phone'] = '7999886050';

$_POST['udf2'] = '99,1 Session,3 Mins Deep Consult,99,4,chat,silver-readers';

$post->post_author = '15680';

$userId = '29239';



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

<form action="https://beta1.thriive.in/calling-therapist" style="display: none;" method="POST" id="callingForm">
    <input type="text" name="tid" id="tid" value="<?php echo $post->post_author; ?>">
    <input type="text" name="uid" id="uid" value="<?php echo $userId; ?>">
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
      }
    }

    document.querySelector('.qa_dilogue_button1').addEventListener('click', function(){
            if(document.querySelector('#qa_dilogue_name_field').value.length < 3){
                document.querySelector('#qa_dilogue_name_field').style.borderBottom = "solid red";
                return;
            }else if(qaGenderInput == 0){
                alert('Please select a gender');
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
      console.log(data);
      $.post('wp-content/themes/thriive/horoscope_new/QA/API/API.php',{data:data,action:'feedDataToDB'},function(response){
        console.log(response);

        if(response = 'data inserted'){
          document.querySelector('.show_layover').style.display = 'none';
            document.querySelector('.show_layover_inner').innerHTML = 'NAME : '+ qaFeedback['name'] + '<br>' +
                                                                      'DOB : '+ qaFeedback['dob'] + '<br>' +
                                                                      'Issue1 : '+ qaFeedback['issue_catg2'] + '<br>' + 
                                                                      'Issue2 : '+ qaFeedback['issue_catg3'] + '<br>' + 
                                                                      'issue3 : '+ qaFeedback['issue_catg4'] + '<br>' + 
                                                                      'issue4 : '+ qaFeedback['issue_catg5'] + '<br>';
        }

            if(response !== null){
               // redirectToSessionPage();
            }

      });
    }


    function redirectToSessionPage(){

        let page = '<?php echo $_POST['udf2']; ?>';

        if(page.search('chat') > 0){
            let url = 'https://www.thriive.in/chat-page';
            //window.location.replace(url);
            return;
        }
        if(page.search('call') > 0){

            //placeCallWithVars();
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




END  QA TEST CODE

 -->






























<?php 




/*



<script type="text/javascript">
  function play(){
  var audio = new Audio('https://thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/ding.mp3');
  audio.play();
  }
</script>



<?php
*/
/*
$cat_name = $_GET['c'];

if(have_rows('therapist_data', 'option')):
    while(have_rows('therapist_data', 'option')): the_row();
      if($cat_name == get_sub_field('taxonomy')->slug){
        $ids = get_sub_field('display_ids');  
      }
    endwhile;
  endif;


  $idsArray = explode(',', $ids);

if(in_array('81924', $idsArray)){
  echo 'yesyes';
}

print_r(gettype($ids[0]));
*/
?>

<!--
        <script type="text/javascript">
          $(document).ready(function(){
            var date = new Date("YYYY-MM-DD");
            clevertap.event.push("Payment Success", {
                "Page Source": window.location.href,
                "Therapist": "test_therapist",
                "Therapy": "test_therapy",
                "Coupon Applied": "No",
                "Plan Type": "Free",
                "Action": "test_action",
                "Date": date,
            });
          });
        </script>


        <script type="text/javascript"> 
          $(document).ready(function(){
            var date = new Date("YYYY-MM-DD");
            clevertap.event.push("Payment Success", { 
                "Page Source": window.location.href,
                "Therapist": "<?php echo $slug; ?>",
                "Therapy": "<?php echo $therapy; ?>",
                "Plan Title": "<?php echo $plan_title; ?>",
                "Plan Cost": "<?php echo $plan_cost; ?>",
                "Coupon Applied": "<?php echo $is_applied; ?>",
                "Coupon Code": "<?php echo $coupon_code; ?>",
                "Plan Type": "Paid",
                "Action": "<?php echo $action; ?>",
                "Date": date,
            });
          });
        </script>


        <script type="text/javascript">
          $(document).ready(function(){
            var date = new Date("YYYY-MM-DD");
            clevertap.event.push("Payment Failure", {
                "Page Source": window.location.href,
                "Therapist": "<?php echo $slug; ?>",
                "Therapy": "<?php echo $therapy; ?>",
                "Plan Title": "<?php echo $plan_title; ?>",
                "Plan Cost": "<?php echo $plan_cost; ?>",
                "Coupon Applied": "<?php echo $is_applied; ?>",
                "Coupon Code": "<?php echo $coupon_code; ?>",
                "Plan Type": "Paid",
                "Action": "<?php echo $action; ?>",
                "Date": date,
            });
          });
        </script>




        <script type="text/javascript"> 
          $(document).ready(function(){
            var date = new Date("YYYY-MM-DD");
            clevertap.event.push("Payment Success", { 
                "Page Source": window.location.href,
                "Therapist": "<?php echo $slug; ?>",
                "Therapy": "<?php echo $therapy; ?>",
                "Plan Title": "<?php echo $plan_title; ?>",
                "Plan Cost": "test_price",
                "Coupon Applied": "<?php echo $is_applied; ?>",
                "Coupon Code": "<?php echo $coupon_code; ?>",
                "Plan Type": "Paid",
                "Action": "<?php echo $action; ?>",
                "Date": date,
                "test_property": "test_property1",

            });
          });
        </script>
-->
<?php 






/*
$curl = curl_init();

$data = array("k_number"=> "+917411782154","agent_number"=> '+918962155372',"customer_number"=>'+918850630321',"caller_id"=> "+918048891009","additional_params"=>array("object_id"=> "1","user_id"=> "2", "call_log_id" => 1,"timeout"=> '1'));
curl_setopt_array($curl, array(
 CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/makecall',
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => '',
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 0,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => 'POST',
 CURLOPT_POSTFIELDS =>json_encode($data),
 CURLOPT_HTTPHEADER => array(
'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42',
'x-api-key: SkMtfKSbRLaN0hZ4AYvJ26XX2wZU87fzaauQnnKE',
'Content-Type: application/json'
 ),
));



echo $response = curl_exec($curl);

curl_close($curl);





*/











/*
$time = '2021-12-22 11:27:57';
$duration = 10;
$add_duration  = strtotime($time)+($duration*60);
//echo date('Y-m-d H:i:s', $add_duration).'<br>';
*/

/*
$ocid = 94693;

  $query1 = "SELECT chat_start_time,session_duration FROM online_consultation WHERE id = $ocid";
  $res1 = $wpdb->get_results($query1);
  $chat_start_time = $res1[0]->chat_start_time;
  $duration = $res1[0]->session_duration;
  $chat_end_time  = date('Y-m-d H:i:s',strtotime($chat_start_time)+($duration*60));

*/


//"SELECT COUNT(id),payment_txnid,created_date,action FROM online_consultation GROUP BY payment_txnid,created_date,action ORDER BY COUNT(id) DESC LIMIT 500";




//print_r($_COOKIE);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//********************This is Chat Cron Made by Akash LAST UPDATED 22-Nov 2021 22:41*********************//
///////////////////////////////////////////////////////////////////////////////////////////////////////////


global $wpdb;
$row_array = array();
/*
$query = "SELECT max(id) as id, max(payment_txnid) as payment_txnid, max(created_date) as created_date,tid_accept,uid_accept,min(action) as action,max(remaining_session) as remaining_session,min(payment_status) as payment_status FROM online_consultation GROUP BY payment_txnid ORDER BY id DESC LIMIT 1000";
*/




//the queries below are the actual queries uncomment the first query to make this work
//$query = "SELECT * FROM online_consultation WHERE id IN (SELECT max(id) FROM online_consultation GROUP BY payment_txnid) ORDER BY id DESC LIMIT 300";
//$res = $wpdb->get_results($query);

/*
$query = "SELECT id,payment_txnid,tid_accept,uid_accept,created_date,action,remaining_session,payment_status FROM online_consultation GROUP BY payment_txnid,id ORDER BY id DESC LIMIT 1000";
*/
//$res = $wpdb->get_results($query);

//print_r($res);




/* this foreach loop is disabled to enable this func again jus uncomment it
foreach($res as $key){

	//print_r($key);echo '<br>';


	if($key->action == 'chat' AND ($key->tid_accept == 1 OR $key->tid_accept == 0 OR $key->tid_accept == -1) AND $key->uid_accept == 0 AND $key->remaining_session == 0 AND $key->payment_status == 'success'){
		//print_r($key);echo '<br>';
		array_push($row_array, $key->id.'----'.$key->payment_txnid.'----'.$key->created_date);
		
		$created_date = strtotime($key->created_date);
		$created_date_exp = $created_date+300;
		$current_date = strtotime(date('Y-m-d H:i:s'));

		if($current_date>$created_date_exp){
		$ocid = $key->id;
    if($key->tid_accept == 1 AND $key->uid_accept == 0){
      $query = "UPDATE online_consultation SET remaining_session=1,cron_update=4,tid_accept='-5',uid_accept='-5',func_name='{chat cron} Therapist1 & User0' WHERE id=$ocid";
      //print_r($key);echo '<br>';
      echo $wpdb->query($query);
      echo $query.'<br>';
    }else if($key->tid_accept == 0 AND $key->uid_accept == 0){
      $query = "UPDATE online_consultation SET remaining_session=1,cron_update=4,tid_accept='-5',uid_accept='-5',func_name='{chat cron} Therapist0 & User0' WHERE id=$ocid";
      //print_r($key);echo '<br>';
      echo $wpdb->query($query);
      echo $query.'<br>';
    }else if($key->tid_accept == '-1' AND $key->uid_accept == 0){
  		$query = "UPDATE online_consultation SET remaining_session=1,cron_update=4,tid_accept='-5',uid_accept='-5',func_name='{chat cron} wait timer missed' WHERE id=$ocid";
  		//print_r($key);echo '<br>';
  		echo $wpdb->query($query);
  		echo $query.'<br>';
    }
		}		




		//echo $query.'<br>';
	}

}

print_r($row_array);
*/
////////////////////////////////////////////////////////////////////////////
//*****************************Chat Cron END******************************//
////////////////////////////////////////////////////////////////////////////


/*
global $wpdb;
$ocid = 84109;
$query = "SELECT tid FROM online_consultation WHERE id=$ocid";
$res = $wpdb->get_results($query, ARRAY_A);
$tid = $res[0]['tid'];
$date = date('Y-m-d H:i:s');
if(count($res)>0){
echo   $query = "UPDATE therapist_availability_status SET availability_status = availability_status+1 WHERE tid = $tid";
  if($wpdb->query($query) != 1){
    $query = "INSERT INTO therapist_availability_status (tid, prev_session_resp, availability_status, auto_deactive, modified_date) VALUES ('$tid', '0', '1', '0', '$date')";
    $wpdb->query($query);
    echo $query;
  }
}
*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function test(){
    $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat_functions.php', {action:'browse', act:2, ocid:87683}, function(data){
      alert(data);
    })
  }
</script>

<?php

////////////////////////////////////////////////////////////////////////////
//**********************Code for functionality panel**********************//
////////////////////////////////////////////////////////////////////////////
/*
global $wpdb;
$query = 'SELECT meta_value FROM wp_usermeta WHERE umeta_id = 1586037';
$res = $wpdb->get_results($query,ARRAY_A);
print_r($res);
*/




////////////////////////////////////////////////////////////////////////////
//**********************Code for functionality panel END******************//
////////////////////////////////////////////////////////////////////////////




/*
$try = 1;

for($i=$try;$i<6;$i++){
	for($i=0;$i<=$try;$i++){
		echo '*';
	}echo '<br>';
	$try++;
}
*/







/*
global $wpdb;
$query = "SELECT * FROM online_consultation WHERE action='chat' AND payment_status='success' AND cron_update=0  ORDER BY id DESC LIMIT 50";
$res = $wpdb->get_results($query);
$current_date= date('Y-m-d H:i:s');
$id_array = array();
foreach($res as $key){
if($key->uid_accept == 0 AND ($key->tid_accept == 1 OR $key->tid_accept == 0 OR $key->tid_accept == '-1') AND $key->remaining_session==0){
  $ocid = $key->id;
  $created_date = $key->created_date;
  $created_date_exp = strtotime($created_date)+310;
  if(in_array($ocid, $id_array)){
    }else{
      array_push($id_array, $key->payment_txnid);
      if($created_date_exp<strtotime($current_date)){
        $query = "UPDATE online_consultation SET remaining_session=1,tid_accept='-2',cron_update=2 WHERE id=$ocid";
        print_r($key->id.'->'.$query.'<br>');
        //$wpdb->query($query);
    }
  }
      
}
}

print_r($id_array);*/
?>







































<?php
//$var = '{"status": "Success", "call_id": "659ccdd5-1416-4775-ba2c-24661d840166", "custom_params": "123456", "call_status": "Call Triggered Successfully", "error": "None"}';
//print_r(json_decode($var,true));
//$query = "SELECT meta_value FROM wp_usermeta where user_id=15680 AND meta_key='mobile'";
//print_r($wpdb->get_results($query)[0]->meta_value);

//$slug = 'slug';
//$therapy = 'mind';
//$action = 'chat'; 

?>
<!--
<style>
  .accept_modal,.accept_modal_timer{
    width:100%;
    height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
    display: none;
    z-index: 9991;
  }
  .accept_modal1{
    width:100%;
    height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
    z-index: 9991;
  }
  .accept_modal_table{
    display: block;
    background: transparent;
    width: max-content;
    padding: 10px;
    border-radius: 10px;
    margin: 0 auto;
    margin-top: 8vh;
    color:#fff;
  }
  .acc_table{
    width: 100%;
    text-align: center;
    border:none !important;
  }
  .acc_table tr{
  }

.mesgt {
    float: left;
    padding: 15px;
}
.msutn {
    margin-left: 105px;
}
.session-btn {
    padding: 5px;
    border-radius: 5px;
    margin: 5px;
}
p.timer_text,p.timer_text1 {
   color: #fff;
   font-size: 14px;
   text-align: center;
}
.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   float:left;
   margin-top: 15px;
   text-align: center;
}
div#accept_modal1 {
   color: #ffbd2c;
}
.msutn {
   margin-left: 10px;
   clear: both;
}
.session-btn {
   padding: 5px;
   border-radius: 5px;
   margin: 2px;
   width: 135px;
   font-size: 14px;
}
.mainsessin{
  margin-left: 235px;
}
.timer_img{
  width:50px;
  margin-left: 20px;
}

.user_exit{
    width:100%;
  height: 25%;
    position: fixed;
    bottom:0;
    background-color:#19194B;
    display: none;
    z-index: 9991;
  }
 .exit_text{
    color: #ffbd2c;
    margin-top: 2rem;
    text-align: center;
 }
@media screen and (max-width:767px) and (min-width:320px){
.mesgt {
   float: left;
   padding: 10px;
}
div#accept_timer {
   color: #ffbd2c;
   /*float: left;*/
   margin-top: 10px;
   width:100%;
   font-size: 24px;
   text-align: center;
}
.timer_img{
  width:50px;
  margin-left: 65px;
}
div#accept_modal1 {
   color: #ffbd2c;
}
.msutn {
   margin-left: 10px;
   clear: both;
}
.session-btn {
   padding: 5px;
   border-radius: 5px;
   margin: 2px;
   width: 135px;
   font-size: 14px;
}
.mainsessin {
    margin-left: 0px !important;
}
  .accept_modal_table{
    display: block;
    background: transparent;
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    margin: 0 auto;
    margin-top: 8vh;
    color:#fff;
  } 
}

</style>



<div class="accept_modal_timer">
  <div class="col-md-12 col-xs-12 mainsessin">
    <div class="col-md-6 col-xs-6 mesgt">
    <p class="timer_text">Please Wait for your Therapist to start the Chat. You will also receive an SMS.<br>PLEASE DO NOT LEAVE THIS PAGE</p>
    <div class="accept_timer" id="accept_timer">Loading...</div><img class="timer_img" src="">
    </div>
    <div class="col-md-6 col-xs-6 mesgt">
    <div class="col-md-2 col-xs-2 msutn">
    <button class="wait_btn session-btn" disabled="true" data-ocid="0" onclick="user_waiting(this.dataset.ocid);" style="display: none;">Wait Again</button>
    </div>
    <div class="col-md-2 col-xs-2 msutn">
    <button class="browse_btn session-btn" disabled="true" onclick="user_browsing(this.dataset.ocid,this.dataset.action);" data-ocid='0' data-action="0">Change Therapist</button>
    </div>
    <div class="col-md-2 col-xs-2 msutn">
    <button class="browse_btn session-btn" disabled="true" onclick="take_later(this.dataset.ocid,this.dataset.action);" data-ocid='0' data-action="0">Take Session Later</button>
    </div>
    </div>
  </div>
</div>



-->

<?php









/*

$string = 'Programming';
$string = strtolower($string);
$string_array = str_split($string);
for($i=0;$i<count($string_array);$i++){
	$word = $string_array[$i];
	$curr_word_count = 0;
	foreach($string_array as $key){
		if($word== $key){
			$curr_word_count++;
		}
	}
	if($curr_word_count==1){
		print_r($word);
		break;
	}
}







$add_array = array(4,7,9,10);
for($i=1;$i<6;$i++){
	reduce($i);
	echo '<br>';
}
function reduce($add){
	global $add_array;
	echo $add.' ';
	$start = 0;
	for($i=1;$i<$add;$i++){
		echo $add+$add_array[$start].' ';
		$start++;
	}
	$start = 0;
}

*/









/*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://kpi.knowlarity.com/Basic/v1/account/call/campaign',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"ivr_id":"1000057655",
"additional_number":"+917999886050",
"timezone":"Asia/Kolkata",
"priority":8,
"start_time":"2021-04-27 19:09",
"call_scheduling_start_time":"09:00",
"call_scheduling_stop_time":"23:00",
"is_transactional":1,
"k_number":"+918035387035",
"call_scheduling": "[1, 1, 1, 1, 1, 1, 1]",
"end_time":"2021-04-27 19:25"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'x-api-key: OuiqbzxM0B9CvqFFhXf2W8vA5DA78PEO6trfIjsI',
    'Authorization: 28637081-d7a7-4bf5-96aa-c79fbf2aba42'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

*/






































/*
$template_id = '1007549755683210644';
$mob_msg = 'Hi, your chat request has been accepted by our Therapist. Please Click https://bit.ly/3dMghVc to start chatting now. Love & Light - Team Thriive.in.';
$mob_no = 7999886050;
sendSMS($mob_no,$mob_msg,$template_id);
*/
















/*
global $wpdb;
$uid = 2857;
$tid = 51240;
$block_id = 1669;
$chatblock = $wpdb->get_row("SELECT * FROM chat_block_users WHERE (to_user_id = '".$tid."' AND from_user_id = '".$uid."') OR (to_user_id = '".$uid."' AND from_user_id = '".$tid."')");
print_r($chatblock);

*/














































/* Template Name: video_call_test 

$uid = 51814;
$firstname = 'akash';
$email = "akash@thriive.in";
$tid = 35656;
$tfirst_name = 'nazneen';
$temail = 'Nazneen_cupid@hotmail.com';
$action = 'chat';
$package = '12';
$productinfo = 123;
$amount = 99;
$status = 'success';
$txnid = 6565636353;
$sendemail = 'no';
$umobile = 789;
$tmobile = 789;
$freemins = 2;
$coupon = 0;
$book_date_time = date('Y-m-d H:i:s');
$tpid = 789;



saveOCData($uid,$firstname,$email,$tid,$tfirst_name,$temail,$action,$package,$productinfo,$amount,$status,$txnid,$sendemail,$umobile,$tmobile,$freemins,$coupon,$book_date_time,$tpid);

echo 'done';*/