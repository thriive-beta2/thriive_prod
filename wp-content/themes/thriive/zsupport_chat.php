<?php /* Template Name: Support_chat */ 
if(wp_get_current_user()->caps['administrator']){
  if(wp_get_current_user()->caps['administrator'] != 1){
    die('forbidden'); }
}else{die('forbidden');};


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

/*
$json= '{"status":"positive","date":"2021-11-10 19:05:41","administrator":"mokshaa","comment":"tried to connect the call manually but it was getting disconnected so gave RS as 1"}';


if(gettype(json_decode($json)) == 'object'){
          $support_modification = json_decode($json);
echo          $support_by = $support_modification->administrator;
echo          $mantxt = 'Extra Session Manually Given by '.$support_by;
echo          $comment = $support_modification->comment;
        }else{

          echo 'hoho';
        }

*/




include_once get_stylesheet_directory().'/new-header.php';

?>
<style type="text/css">
  #info_table{
    width:90%;
    margin: 0 auto;
    text-align: center;
  }
  #info_table td{
    border: solid 2px black;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div style="text-align: center;width:90%;margin: 1rem auto;">
<!--<h1 style="color:red;text-align: center;">Work is being done here <br> Don't USE this panel for now <br>(13:11 22-09-2022)</h1>-->
<h2 style="color:green;text-align: center;margin-top: -3rem;">This page is in testing phase<br> Please test it thoroughly <br>(14:00 22-09-2022)</h2>
<?php 
//die('Forbidden');
?>
<input type="text" id="txn">
<button onClick="chat_box(document.querySelector('#txn').value)">Search</button>
<!--<button onClick="document.querySelector('#prank').style.display='block';">Search</button>-->
</div>
<table id="info_table">
  <th>
    <tr>
      <td>User</td>
      <td>Therapist</td>
      <td>Session Type</td>
      <td>Duration</td>
      <td>Date</td>
      <td>Status</td>
      <td>Remaining Session</td>
    </tr>
  </th>
    <tr>
      <td id="user">--</td>
      <td id="ther">--</td>
      <td id="type">--</td>
      <td id="dur">--</td>
      <td id="date">--</td>
      <td id="stat">--</td>
      <td id="RS">--</td>
    </tr>
</table>

<div style="text-align: center;width:90%;margin: 1rem auto;">
<p id="add_sess_txn" style="margin:5px auto;padding:5px;border:solid 2px;width:max-content;"></p><br>
<textarea style="height:100px;width:500px;font-size: 18px;text-align: center;font-style: italic;" onkeyup="check_comment_length(this.id);" onkeydown="check_comment_length(this.id);" id="comment" placeholder="COMMENT HERE*"></textarea><br>
<button onclick="add_session(this.id)" id='add_session'>Add a Session to this id</button><br><br>
<button onclick="remove_session(this.id)" id='remove_session'>Remove Remaining Session (WORKING NOW!)</button><br><br>

</div>

<!--
<div style="border: solid 10px red;">
  <h2 style="color: red">Do not use this (In progress)!!</h2>
  <p>Change Therapy For this session</p>
  <select id="therapies">
    <option id="therapy" value="tarot-card-reading">Tarot</option>
    <option id="therapy" value="numerology">Numerology</option>
    <option id="therapy" value="angel-reading">Angel Reading</option>
    <option id="therapy" value="Free Covid Session">Covid</option>
    <option id="therapy" value="counseling-consulting">Counselling</option>
    <option id="therapy" value="sex-therapist">Sex Therapy</option>
    <option id="therapy" value="life-coach">Life Coach</option>
    <option id="therapy" value="pranic-healing">Pranic Healing</option>
    <option id="therapy" value="ayurveda">Ayurveda</option>
    <option id="therapy" value="cosmic-astrology">Cosmic Astrology</option>
  </select>
<button onClick="change_therapy(Curr_ocid)">Change Therapy</button>

</div>
-->
<div class="test_div"></div>






<style type="text/css">
	
	.appointment_modification{
		border: solid;
		width: 90%;
		margin: 0 auto;
		text-align: center;
	}

	.appointment_modification h2{
		text-align: center;
		text-decoration: underline;
	}
	.default_entries{
		text-align: center;
	}

	.default_entries p{ 
		margin: 5px;
	    font-size: 20px;
	    color: #545454;
	}

	.default_entries input{
		text-align: center;
	    padding: 5px;
	    border-radius: 8px;
	    border: solid 1px #545454;
	    color: #4B50FF;
	    font-style: italic;
	}
	.default_entries_section{
		display: flex;
	    flex-wrap: wrap;
	    justify-content: space-around;
	}
.appointment_modify {
    border-radius: 5px;
    margin: 10px;
    padding: 10px;
    background-color: #FF9F4B;
    font-weight: 600;
    color: #fff;
    border: none;
    outline: none;
    font-size: 18px;
}

.appointment_search{
	    border: none;
    background-color: #A1FF5B;
    padding: 7px;
    padding-top: 8px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    padding-bottom: 6px;
    margin-left: -6px;
}

	.modify_entries input{
		text-align: center;
	    padding: 5px;
	    border-radius: 8px;
	    border: solid 1px #545454;
	    color: #4B50FF;
	    font-style: italic;
	}
	.modify_entries_section{
		display: flex;
	    flex-wrap: wrap;
	    justify-content: space-around;
	}

	.modify_entries p{ 
		margin: 5px;
	    font-size: 20px;
	    color: #545454;
	}

.appointment_apply {
    border-radius: 5px;
    margin: 10px;
    padding: 10px;
    background-color: #B40052;
    font-weight: 600;
    color: #fff;
    border: none;
    outline: none;
    font-size: 18px;
}
.select_therapist{
	    text-align: center;
    padding: 5px;
    border-radius: 8px;
    border: solid 1px #545454;
    color: #4B50FF;
    font-style: italic;
    width: 15rem;
}

.select_therapy{
	    text-align: center;
    padding: 5px;
    border-radius: 8px;
    border: solid 1px #545454;
    color: #4B50FF;
    font-style: italic;
    width: 15rem;
}

#comment1{
	border-radius: 10px;
}

</style>

<div class="appointment_modification">
	
<h2>Appointments</h2>

<div class="default_entries">
	<section class="default_entries_section">
		<section style="margin: 0 auto;">
			<p>payuid</p>
			<input type="text" placeholder="--" id="payuid" style="color: #2A8B00;border-top-right-radius: 0px;border-bottom-right-radius: 0px;">
			<button class="appointment_search" onclick="check_appointment_session(document.querySelector('#payuid').value);">Search</button>
		</section><br>
		<div style="width: 100%"></div>
		<section>
			<p>Uname</p>
			<input type="text" disabled placeholder="--" id="default_uname">
		</section>
		<section>
			<p>Tname</p>
			<input type="text" disabled placeholder="--" id="default_tname">
		</section>
		<section>
			<p>Date</p>
			<input type="text" disabled placeholder="--" id="default_date">
		</section>
		<section>
			<p>Time</p>
			<input type="text" disabled placeholder="--" id="default_time">
		</section>
		<section>
			<p>Therapy</p>
			<input type="text" disabled placeholder="--" id="default_therapy">
		</section>
	</section>

		<button class="appointment_modify" onclick="openModifyEntries()">
			Modify
		</button>

	<hr>
</div>

<script type="text/javascript">
	
function openModifyEntries(){
	if(document.querySelector('#default_uname').value.length < 2){
		alert('Nothing to Modify');
	}else{
		document.querySelector('.modify_entries').style.display = 'block';
	}
}

</script>
<div class="modify_entries" style="display: none;">
	<section class="modify_entries_section">
		<section style="margin: 0 auto;">
			<h2>Modify Entries</h2>
		</section><br>
		<div style="width: 100%"></div>
		<section>
			<p>Uname</p>
			<input type="text" placeholder="--" disabled id="modify_uname">
		</section>
		<section>
			<p>Tname</p>
			<select class="select_therapist">
				<option value="2045">Anita Mishra</option>
				<option value="15293">Bhavesh Shah</option>
				<option value="15126">Siji Ravindram</option>
				<option value="9320">Anushri Shah</option>
				<option value="23950">Urvi Sharma</option>
				<option value="15738">Dr Shambhavi Samir Alve</option>
				<option value="28919">Jayapalshri Anil</option>
				<option value="23460">Rachna Nayar</option>
				<option value="8082">Kumudha Jayakumar</option>
				<option value="64663">Seema Rani</option>
				<option value="22690">Kanika Jain</option>
			</select>
		</section>
		<section>
			<p>Date</p>
			<input type="date"  placeholder="--" id="modify_date">
		</section>
		<section>
			<p>Time</p>
			<input type="time" placeholder="--" id="modify_time">
		</section>
		<section>
			<p>Therapy</p>
				<select class="select_therapy" onclick="changeTherapistList(this.selectedIndex);">

					<option onclick="changeTherapistList('EFT');" value="eft-emotional-freedom-technique">EFT</option>
					<option onclick="changeTherapistList('InnerChildHealing');" value="inner-child-healing">Inner Child Healing</option>
					<option onclick="changeTherapistList('Hypnotherapy');" value="hypno-therapy">Hypnotherapy</option>
					<option onclick="changeTherapistList('PLR');" value="past-life-regression">PLR</option>
					<option onclick="changeTherapistList('SexTherapy');" value="sex-therapy">Sex Therapy</option>
					<option onclick="changeTherapistList('SexTherapy');" value="love-therapy">Love Therapy</option>
				</select>
		</section>
	</section>
		<div class="appointment_comment"><br>
			<textarea style="height:100px;width:500px;font-size: 18px;text-align: center;font-style: italic;" onkeyup="check_comment_length(this.id);" onkeydown="check_comment_length(this.id);" id="comment1" placeholder="COMMENT HERE*"></textarea>
		</div>
		<button class="appointment_apply" onclick="applyValues();">
			Apply
		</button>

	<hr>
</div>




</div>


<div style="display:none;position:fixed;top: 0;left: 0;width: 100%;height: 100vh;background-color: rgba(0,0,0,0.5);z-index: 9999;text-align: center;" id="prank">
	<img style="margin-top: 25%;width:25rem" src="https://thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/image.png">
</div>


<br><br><br>





<script type="text/javascript">


async function applyValues(){

	if(document.querySelector('#modify_uname').value == ''){
		alert('Uname Cannot be Null');
		return;
	}else if(document.querySelector('#modify_time').value == ''){
		alert('Time Cannot be null');
		return;
	}else if(document.querySelector('#modify_date').value == ''){
		alert('Date Cannot be null');
		return;
	}else if(document.querySelector('#comment1').value.length < 20){
		alert('Please provide more info in comment');
		return;
	}



	let new_therapist = document.querySelector('.select_therapist').value;
	let new_therapist_name = document.querySelector('.select_therapist').options[document.querySelector('.select_therapist').selectedIndex].text;
	let new_date = document.querySelector('#modify_date').value;
	let new_time = document.querySelector('#modify_time').value;
	let new_therapy = document.querySelector('.select_therapy').value;
	let new_therapist_name_data = '';
	let new_therapist_email_data = '';
	let comment1 = document.querySelector('#comment1').value;
	

	//globalThis.new_therapist_info = await fetchNewTherapist(new_therapist).then((data) => {});

	let new_therapist_info = await fetchNewTherapist(new_therapist);

	if(new_therapist_info == ''){
		alert('some Error');
	}else{
		new_therapist_name_data = new_therapist_info.split(',')[1];
		new_therapist_email_data = new_therapist_info.split(',')[0];
	}



	if(confirm('Updated Changes \n New Therapist -> '+ new_therapist_name_data+'\n New temail -> '+new_therapist_email_data+ '\nNew Date -> '+ new_date + '\n New Time -> ' + new_time + '\n New_therapy -> '+ new_therapy + '\n Reason -> '+ comment1 +'\n--------------------------------------------\n Are You sure about these Changes??? \n -------------------------------------------')){
		if(window.prompt('Enter Temporary Password:', '')== '123789'){
//			console.log(new_therapist+' , '+new_date+' , '+new_time+' , '+new_therapy);

			updateAppointment(new_therapist,new_date,new_time,new_therapy,new_therapist_email_data,new_therapist_name_data,comment1);

		}else{
			alert('Haha Wrong Password');
		}
		
	}

	
}

async function fetchNewTherapist(tid){
		let therapist_data = await $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/test.php',{new_therapist:tid,action:'fetch_new_therapist'},function(data){});
		return therapist_data.trim();
}

function updateAppointment(new_therapist,new_date,new_time,new_therapy,new_therapist_email_data,new_therapist_name_data,comment1){
	$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/test.php',{action:'updateAppointment',new_therapist:new_therapist,new_date:new_date,new_time:new_time,new_therapy:new_therapy,oc_id:oc_id,new_email:new_therapist_email_data,new_name:new_therapist_name_data,comment:comment1},function(data){
//		console.log(data);
		data = data.trim();

		if(data == 1){
			alert('Appointment Updated successfully');
		}else if(data == 2){
			alert('Only consultation table updated call Akash');
		}else{
			alert('Appointment not updated \n Some Error');
		}

	});
}




/*
  function reconnect_chat(ocid){
    $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER.php', {action:'reconnect_chat', ocid:ocid}, function(data){
      console.log(data);
      document.querySelector('.test_div').innerText = data;
    });
  }
*/


  function change_therapy(ocid){
    let selected_index = document.querySelector('#therapies').selectedIndex;
    let therapy = document.querySelectorAll('#therapy')[selected_index].value;
    $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER.php', {action: 'change_therapy', therapy:therapy},function(data){
      
    });
    alert(therapy);
  }





  function chat_box(txnid){
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER.php',{action:'support', txnid:txnid},function(data){
     if(data == 'error'){
    }else{
//      console.log(data);
      data = data.trim();
    let bubble_data = data.split(',');
//    console.log(bubble_data);
    alert('USERNAME = > '+bubble_data[3]);

    globalThis.OC_ID = bubble_data[0];

    document.querySelector('#add_session').id = bubble_data[0];
    document.querySelector('#remove_session').id = bubble_data[0];
    /*document.querySelector('#reconnect_chat').id = bubble_data[0];*/
    document.querySelector('#user').innerText = bubble_data[3];
    document.querySelector('#ther').innerText = bubble_data[4];
    document.querySelector('#type').innerText = bubble_data[5];
    document.querySelector('#dur').innerText = bubble_data[15];
    document.querySelector('#date').innerText = bubble_data[6];
    document.querySelector('#stat').innerText = bubble_data[12];
    document.querySelector('#RS').innerText = bubble_data[8];
    globalThis.Curr_txnid = bubble_data[7];
    globalThis.Curr_ocid = bubble_data[0];
   document.querySelector('#add_sess_txn').innerText = Curr_txnid;
    if(bubble_data[5]=='chat'){
          create_dialog(bubble_data[2],bubble_data[1],'test@test.com','test');
          disableChat();
    }
    }

  })
}

function add_session(ocid){

  let comment = document.querySelector("#comment").value;
  if(comment.length < 10){
    alert('Comment Must be of minimum 10 letters');
  }else{



  if(confirm("Are You Sure This will give an extra session to the User!!!!")){
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER.php',{action:'add_session',ocid:ocid,comment:comment},function(data){
  	data = data.trim();
      if(data == 1){
        document.querySelector("#comment").value = '';
        alert('Session Added Successfully');
      }else{
        alert('no result for this id');
        document.querySelector("#comment").value = '';
      }
  })
}
}
}


function remove_session(ocid){
    if(confirm("This action will remove remaining session from this id!!!!")){
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER.php',{action:'remove_session',ocid:ocid},function(data){
      if(data == 1){
        alert('Session Removed Successfully');
      }else{
        alert('no result for this id');
      }
  })
}
}

function check_appointment_session(payuid){
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/test.php',{action:'check_appointment_session',payuid:payuid},function(data){
 //    console.log(data); 
     data = data.trim();
     let data_array = data.split(',');
     if(data !== 'none'){
     	document.querySelector('#default_uname').value = data_array[1];
     	document.querySelector('#modify_uname').value = data_array[1];
     	document.querySelector('#modify_date').value = data_array[3];
     	document.querySelector('#modify_time').value = data_array[4];
     	document.querySelector('#default_tname').value = data_array[0];
     	document.querySelector('#default_date').value = data_array[3];
     	document.querySelector('#default_time').value = data_array[4];
     	document.querySelector('#default_therapy').value = data_array[2];
     	selectModifyTherapist(data_array[2],data_array[5]);
     	globalThis.oc_id = data_array[6];
     	
     }else{
     	alert('payuid not found')
     }
  });



}
let x = 515758497146;
function selectModifyTherapist(therapy,therapist){

	let sTherapy = '';
	switch(therapy){
		case 'eft-emotional-freedom-technique':
			sTherapy = 'EFT';
			changeTherapistList(0);
		break;
		case 'inner-child-healing':
			sTherapy = 'inner-child-healing';
			changeTherapistList(1);
		break;
		case 'sex-therapy':
			sTherapy = 'sex-therapy';
			changeTherapistList(4);
		break;
		case 'love-therapy':
			sTherapy = 'love-therapy';
			changeTherapistList(4);
		break;
		case 'past-life-regression':
			sTherapy = 'past-life-regression';
			changeTherapistList(3);
		break;
		case 'hypno-therapy':
			sTherapy = 'hypno-therapy';
			changeTherapistList(2);
		break;		
	}

	changeModifyTherapy(sTherapy);
	changeModifyTherapist(therapist,sTherapy);


}


function changeModifyTherapy(therapy){
		let therapies = ['EFT', 'inner-child-healing','hypno-therapy','past-life-regression','sex-therapy','love-therapy'];
		let therapyIndex = therapies.indexOf(therapy);
		document.querySelector('.select_therapy').selectedIndex = therapyIndex;

}


function changeModifyTherapist(tid,therapy){
	let InnerChildHealing = ['1732','705','706','3351','27954','13978','6150'];
	let EFT = ['2045','15293','15126','9320','23950','15738','28919','23460','8082','64663','22690'];
	let sexTherapy = ['6975','3872','8765','24632','27940','24314','21421','23896','18598','24636','648','23291','26806','26536','28097','15903','27265','8254','2045','51248','15113','26952','32344','17261','15680'];
	let PLR = ['619','1152','692','28015','13978','18054','17849','1138','23460'];
	let Hypnotherapy = ['8149','14904','23460','706','1152','3840','22694','13534','25050','78924'];
	let therapistIndex = '';


	switch(therapy){
		case 'EFT':
			therapistIndex = EFT.indexOf(tid);
		break;
		case 'inner-child-healing':
			therapistIndex = InnerChildHealing.indexOf(tid);
		break;
		case 'sex-therapy':
			therapistIndex = sexTherapy.indexOf(tid);
		break;
		case 'love-therapy':
			therapistIndex = sexTherapy.indexOf(tid);
		break;
		case 'past-life-regression':
			therapistIndex = PLR.indexOf(tid);
		break;
		case 'hypno-therapy':
			therapistIndex = Hypnotherapy.indexOf(tid);
		break;			
	}

	if(therapistIndex < 0){
		alert('Therapist not found in current list');
		document.querySelector('.select_therapist').selectedIndex = therapistIndex;
	}else{
	document.querySelector('.select_therapist').selectedIndex = therapistIndex;
	}

//	console.log(therapistIndex);
//	console.log(typeof(tid));
}


function changeTherapistList(therapy){

//	console.log(therapy);

	let InnerChildHealing = `
				<option value="1732">Sonal Waikul</option>
				<option value="705">Jaya Gupta</option>
				<option value="706">Swati Mishra</option>
				<option value="3351">Sonal Pardiwala</option>
				<option value="27954">Siddhi Priya</option>
				<option value="13978">Geetanjali Dutta</option>
				<option value="6150">Neha Goyal</option>			
  `;

  let EFT = `
				<option value="2045">Anita Mishra</option>
				<option value="15293">Bhavesh Shah</option>
				<option value="15126">Siji Ravindram</option>
				<option value="9320">Anushri Shah</option>
				<option value="23950">Urvi Sharma</option>
				<option value="15738">Dr Shambhavi Samir Alve</option>
				<option value="28919">Jayapalshri Anil</option>
				<option value="23460">Rachna Nayar</option>
				<option value="8082">Kumudha Jayakumar</option>
				<option value="64663">Seema Rani</option>
				<option value="22690">Kanika Jain</option>
  `;

  let Hypnotherapy = `
				<option value="8149">Anju Bhargava</option>
				<option value="14904">Archana Kulkarni</option>
				<option value="23460">Rachna Nayar</option>
				<option value="706">Swati Mishra</option>
				<option value="1152">Archana Singh</option>
				<option value="3840">Sarla Bhutoria</option>
				<option value="22694">Hema Shah</option>
				<option value="13534">Sangeeta Dasgupta</option>
				<option value="25050">Sarita Dhankani</option>
				<option value="78924">Babitaa Saxena</option>
  `;





  let PLR = `
				<option value="619">Smita M. Wankhede</option>
				<option value="1152">Archana Singh</option>
				<option value="692">Bhumika Chandiramani</option>
				<option value="28015">Manju jain</option>
				<option value="13978">Geetanjali Dutta</option>
				<option value="18054">Shalini Nigam</option>
				<option value="17849">Nirmal Mozumdar</option>
				<option value="1138">Latika Narang</option>
				<option value="23460">Rachna Nayar</option>
  `;


  let sexTherapy = `
  				<option value="6975">Shivanya Yogamaya</option>
				<option value="3872">Dr. Senthil Kumar</option>
				<option value="8765">Yogesh Gadage</option>
				<option value="24632">Vikas Goyal</option>
				<option value="27940">Manuja Suresh</option>
				<option value="24314">Annapurna Dusi</option>
				<option value="21421">Shanta Gupta</option>
				<option value="23896">Ujjwal Sangawar</option>
				<option value="18598">Jayan Namboodiri</option>
				<option value="24636">K.V. Anand</option>
				<option value="648">Dr. Hetal Kumar Doshi</option>
				<option value="23291">Neelu Khanna</option>
				<option value="26806">Sridevi Duggi</option>		
				<option value="26536">Premlata Saxena</option>		
				<option value="28097">Shahla Sahab</option>		
				<option value="15903">Vinita Hariya</option>	
				<option value="27265">Sharmila Buddy</option>	
				<option value="8254">Urmi Chapiya</option>	
				<option value="2045">Anita Mishra</option>	
				<option value="51248">Vennila Mary</option>
				<option value="15113">Farheen Hussain</option>
				<option value="26952">Arisha Salman</option>
				<option value="32344">Dr. D.H Bagalkot</option>
				<option value="17261">Nilima Patil</option>
				<option value="15680">Manish K Jadhav</option>						
  `;


  	if(therapy == '1'){
  		document.querySelector('.select_therapist').innerHTML = InnerChildHealing;
  	}else if(therapy == '0'){
  		document.querySelector('.select_therapist').innerHTML = EFT;
  	}else if(therapy == '4'){
  		document.querySelector('.select_therapist').innerHTML = sexTherapy;
  	}else if(therapy == '5'){
  		document.querySelector('.select_therapist').innerHTML = sexTherapy;
  	}else if(therapy == '3'){
  		document.querySelector('.select_therapist').innerHTML = PLR;
  	}else if(therapy == '2'){
  		document.querySelector('.select_therapist').innerHTML = Hypnotherapy;
  	}



}


</script>

<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-storage.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyD2FP1evAtrtUpSeUwfNB8EwB99uJJAQZw",
    authDomain: "thriive-4bbd3.firebaseapp.com",
    databaseURL: "https://thriive-4bbd3-default-rtdb.firebaseio.com",
    projectId: "thriive-4bbd3",
    storageBucket: "gs://thriive-4bbd3.appspot.com",
    messagingSenderId: "228923631497",
    appId: "1:228923631497:web:6b71a8d7b360c27c87a358",
    measurementId: "G-3E78629LN0"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


  function check_comment_length(id){
    if(document.querySelector('#'+id).value.length < 10){
      document.querySelector('#'+id).style.color = 'red';
    }else if(document.querySelector('#'+id).value.length < 20){
      document.querySelector('#'+id).style.color = 'blue';
    }else{
      document.querySelector('#'+id).style.color = '#188F00';
    }
  }

</script>




<script src="<?php echo get_site_url();?>/wp-content/themes/thriive/horoscope_new/chat-renew/scripts/chat-script-test-12Apr2022.js?v=20220729.2"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"></script>