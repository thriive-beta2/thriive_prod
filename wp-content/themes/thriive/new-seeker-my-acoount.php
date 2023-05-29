<?php /* Template Name: New seeker my account page */ 
//session_start();

?>

<?php /* Template Name: User Account Page */ 
$current_user = wp_get_current_user();

$userMeta = get_user_meta($current_user->ID);
//print_r($userMeta['first_name']);


if (!is_user_logged_in()){ 
        wp_redirect('/login/');
        exit();
}
if(in_array("therapist", $current_user->roles))
		{
			wp_redirect('/therapist-account-dashboard/');
			exit();
		}
?>
<?php
include_once get_stylesheet_directory().'/new-header.php';?>


<script type="text/javascript">
	$(document).ready(function(){
		clevertap.profile.push({
			"Site": {
				"Name": "<?php echo $current_user->first_name . ' ' . $current_user->last_name; ?>",
				"Email": "<?php echo $current_user->user_email; ?>",
				"Phone": "<?php echo $current_user->countryCode.$current_user->mobile; ?>",
				"DOB": new Date("<?php echo $current_user->dob; ?>"),
		   		"Role": "Subscriber",
		 	}
		});
	});
</script>


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
    global $currDate;
    global $userId;
    global $currTime;
    global $userName;
    global $wpdb;
    $query = "SELECT * FROM oc_video_call JOIN online_consultation ON online_consultation.id = oc_video_call.oc_id WHERE oc_video_call.book_date >= '$currDate' AND oc_video_call.uid=$userId ORDER BY oc_video_call.id DESC LIMIT 5";

    $res = $wpdb->get_results($query);
    //print_r($query);

    //echo '<script>console.log("'.$query.'"+"'.date('Y-m-d').'");</script>';    

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
		<?php //lert('Coming Soon'); ?>
        <div class="userAccountQuickLinks">
            <div class="userAccountQuickLinksChild" onclick="userAccountRedirect('editProfile');">
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





