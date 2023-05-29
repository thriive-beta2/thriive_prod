globalThis.dialogue_status = 0;
globalThis.dialog_id = 0;
globalThis.default_size = [];
globalThis.default_size_opp = [];
globalThis.prev_dialog_stat = "";
globalThis.prev_dialog_id;
globalThis.subscribed = false;
globalThis.sessionDuration = "";
globalThis.sessionStartedAt = "";
globalThis.addedSecs = 0;
globalThis.totalAddedSecs = 0;
globalThis.OC_ID = "";
globalThis.networkStatus = "ONLINE";
globalThis.log_name = "";
globalThis.call_conf_msg = 0;
globalThis.wait_timer_end = 0;
globalThis.book_another_session_count = 0;
globalThis.insert_star_rating_count = 0;
globalThis.calling_therapist_shown = 0;
globalThis.timerExpire = 0;


console.log('testscript');

let firestoreDB = firebase.firestore();
let storage = firebase.storage();
let storageRef = storage.ref();
let chatUploadsRef = storageRef.child("chat-uploads");

const BASE_URL = window.location;
let fileUrl =
  BASE_URL + "/wp-content/themes/thriive/horoscope_new/chat-renew/scripts";


function book_another_session(dialogue){

    close_emoji();
    
    if(dialogue == 'first'){
    $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php', {action:'fetch_link',therapist:to}, function(data){
        ////console.log(data);
        if(data.split('').length > 10){
            globalThis.link = JSON.parse(data);
            $('.messages').append(`<div class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Session Over<br>Book Another Session Now !! <a href='#' onClick="book_another_session('second');"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">Yes,</b> with same therapist</section></a><a href='${link[1]}'><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">Yes,</b> with another therapist</section></a><a href='#'><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      " onClick="insert_star_rating();"><b style="font-weight:500;">No,</b> I am done</section></a></div>`);
            scrollToBottom();

        }
    });
  }else if(dialogue == 'second' && book_another_session_count == 0){
      $('.messages').append(`<div class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:20px;
      ">Which mode would you like to go with? <a href='${link[0]}'><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      ">Book a chat session</section></a><a href='${link[3]}'><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      ">Book a call session</section></a><a href='#'><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      " onClick="insert_star_rating();">No I am done</section></a></div>`);
            scrollToBottom();
            book_another_session_count++;

  }else{

  }
  }


function insert_star_rating(){
    if(insert_star_rating_count == 0){
      $('.messages').append(`<div class="book_another_session star_rating" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:20px;
      "><section style="padding:5px;color:#fff;font-weight:500;">Please Share your Feedback</section><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><div class="stars">
      <p class="star_label">Therapist</p>
<img id="star1" onmouseover="star(1,'therapist');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star1" onmouseover="star(2,'therapist');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star1" onmouseover="star(3,'therapist');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star1" onmouseover="star(4,'therapist');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star1" onmouseover="star(5,'therapist');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
</div></section><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><div class="stars">
      <p class="star_label">Experience</p>
<img id="star2" onmouseover="star(1,'experience');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star2" onmouseover="star(2,'experience');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star2" onmouseover="star(3,'experience');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star2" onmouseover="star(4,'experience');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
<img id="star2" onmouseover="star(5,'experience');" src="http://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/star2.png">
</div></section><section style="
        padding: 5px;
        border-radius: 5px;
        color: #fff;
        background-color: #0288d1;
        border: solid;
        width: 50%;
        margin: auto;
        margin-top: 10px;
        font-weight: 500;
      " onclick="calStar();">Submit</section></div>`);
            scrollToBottom();
            insert_star_rating_count++;
          }
  }


  function star(starCount,dialogue){
    if(dialogue == 'therapist'){
      for(i=0;i<starCount;i++){
        document.querySelectorAll('#star1')[i].style.filter = 'invert(0)';
      }
      for(i=4;i>starCount-1;i--){
        document.querySelectorAll('#star1')[i].style.filter = 'invert(1)';
      }
    }else if(dialogue == 'experience'){
      for(i=0;i<starCount;i++){
        document.querySelectorAll('#star2')[i].style.filter = 'invert(0)';
      }
      for(i=4;i>starCount-1;i--){
        document.querySelectorAll('#star2')[i].style.filter = 'invert(1)';
      }      
    }
  }

  function calStar(){
    let therapist_rating = 0;
    let experience_rating = 0;
    for(i=0;i<5;i++){
      if(document.querySelectorAll('#star1')[i].style.filter == 'invert(0)'){
        therapist_rating++;
      }     
    }
    for(i=0;i<5;i++){
      if(document.querySelectorAll('#star2')[i].style.filter == 'invert(0)'){
        experience_rating++;
      }     
    }
    ////console.log('therapist ->  '+ therapist_rating);
    ////console.log('experience -> '+ experience_rating);
    feed_star_rating(OC_ID,therapist_rating,experience_rating);
  }

function feed_star_rating(ocid = 0,therapist_rating,experience_rating){
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php', {ocid:ocid,action:'feed_star_rating',therapist_rating:therapist_rating, experience_rating:experience_rating},function(data){
    ////console.log(data);
    if(data == 1){
      let dialogues = document.querySelectorAll('.star_rating');
      for(i=0;i<dialogues.length;i++){
        dialogues[i].style.display = 'none';
      }
      $('.messages').append(`<div class="book_another_session" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
          margin-top:20px;
      "><section style="padding:5px;color:#fff;font-weight:500;">Thankyou For your feedback</section></div>`);
    }

  });
}

function create_dialog(to, from, mail, msg) {
  var dialogue = '<div class="main-messages"></div>';
  //alert(from +'  '+ to + '  '+ mail);
  if (dialogue_status == 0 && document.getElementsByClassName('main-messages').length == 0) {
    document.body.innerHTML += dialogue;
  }
  var log_name = "";

  document.querySelector(".main-messages").innerHTML = `
      <div class="messages-header" onClick="close_emoji();">
        <p style="color:#fff;margin:0;">${log_name}</p>
        <div class='chat-actions'>
          <div class='minimize' style="cursor: pointer;"
            onclick="hide_chat_box()" id="hide_chat_box">
            <i style='color: #fff' class='fa fa-window-minimize'></i>
          </div>
          <div class='more-options' style="cursor: pointer;" onclick="div_options()">
            <i style='color: #fff' class='fa fa-ellipsis-v'></i>
          </div>
          <div class='close-chat' style="color: #fff;margin: 0;cursor: pointer;pointer-events: none;"   onClick="clear_chatbox()">
            <i style='color: #fff' class='fa fa-close'></i>
          </div>
        </div>
      </div>
      <div id='chat-timer' style="color:#fff"></div>
      <div class="chat_options">
        <table id="chat_options_table">
          <tbody>
            <tr style="display:none;"><td data-from='${from}' data-to='${to}' onClick="block_user(this.dataset.from, this.dataset.to)" style="cursor:pointer" class='t-chat-action' id="nUser">Block</td></tr>
            <tr id="Yuser"><td><a href="https://www.thriive.in" style="cursor:pointer">Home</a></td></tr>
            <tr><td><a href="https://www.thriive.in/faq-chat" style="cursor:pointer">FAQ</a></td></tr>
            <tr><td><a href="#" style="cursor:pointer" onclick="takeActionOnTherapist('user_gen');">Unresponsive Reader</a></td></tr>
            <tr id="Yuser"><td><a href="https://www.thriive.in/issues-feedback-page" style="cursor:pointer">Issues & Feedback</a></td></tr>
            <tr>
              <td class='complete-chat' data-from='${from}' data-to='${to}' onClick="complete_chat(this.dataset.from, this.dataset.to)" class='t-chat-action'  style="cursor:pointer" id="nUser">
                Complete
              </td>
            </tr>
            <tr><td onClick="incomplete()" style="cursor:pointer" class='t-chat-action' id="nUser">Incomplete Chat</td></tr>
          </tbody>
        </table>
      </div>
      <div class="messages">
        <p id='in-conversation-with1' style="font-size:12px;padding: 10px;color: #1565c0;">

        </p>
      </div>
      <div class="emoji_container" style="z-index:9999999999999">
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😊</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😊</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😄</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😁</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😆</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😅</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😂</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">🤣</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">☺️</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😇</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">🙂</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">🙃</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😉</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😌</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😍</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">🥰</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😘</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😋</p>
        <p class="emojis" onClick = "insert_emoji(this.innerHTML)">😛</p>
      </div>
      </div>
      <div class='error-mssg'></div>
      <div class="msg">
        <div class="input_div">
        <button class="emoji_icon" id="emoji_icon" onClick="hide_emoji()">😊</button>
        <input type="text" name="ind-message" id="ind-message" autocomplete="off">
        <input id='add-doc' type="file" name="file" class="file_attatch">
        <button type="button" id="click_attatch" onclick="click_attatch()">
          <i class='fa fa-paperclip'></i>
        </button>
      </div>
      <button type="button" id="send" onclick="write_to_file()">
        <i class="fa fa-paper-plane" aria-hidden="true" style="margin: 0 auto;"></i>
      </button>
      </div>
      <div id='show-img-preview'>
        <div class='action-bar'>
          <i class='fa fa-close' onclick='closeImgPreview()'></i>
          <span>Preview</span>
        </div>
        <div id='img-container'>
        </div>
      </div>
      <div class="scripts" style="display:none"></div>`;

  var action = "create";
  globalThis.mail_to = mail;

  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "tname", to: to, from: from },
    function (data) {
      data = data.trim();
      //console.log(data.length);
      if (data.length > 2) {
        log_name = data.trim();
        //console.log(log_name)
        document.querySelector(".messages-header").children[0].innerText = log_name;
        document.getElementById(
          "in-conversation-with1"
        ).innerHTML = ` We have connected you with ${data} . This conversation is completely private and confidential. In case of any issues, please click on Issues/Feedback in Menu.`;
      } else {
        document.querySelector(".messages-header").children[0].innerText =
          mail.split("@")[0];
        log_name = mail.split("@")[0];
        document.getElementById(
          "in-conversation-with1"
        ).innerHTML = ` We have connected you with ${log_name} . This conversation is completely private and confidential. In case of any issues, please click on Issues/Feedback in Menu.`;
      }
    }
  );

  // $.post(
  //  'wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php?data=1 ',
  //  {from: from, to: to, mail:mail, action:action},
  //  function(data) {
  //    //console.log('data after dialog created : ', data)
  //    $('.messages').append(data);
  //    var elem = document.querySelector('.messages');
  //    elem.scrollTop = elem.scrollHeight;
  //  }
  // );

  //auto_read();
  //alert(this.innerText);
  globalThis.from = from;
  globalThis.to = to;
  globalThis.mail = mail;
  globalThis.msg = msg;
  dialog_id = to;

  if (dialogue_status == 1) {
    //clearInterval(interval_read);
  }

  //globalThis.interval_read = setInterval('read()', 1000);

  if (typeof arr_count == "undefined") {
    globalThis.read_interval = setInterval("read()", 10000);
  }
  if (dialogue_status == 0) {
    setTimeout("read()", 3000);
  }

  dialogue_status = 1;

  globalThis.all_dialogues = document.querySelectorAll(".start_chat");
  globalThis.dialogues_array = [];
  if (prev_dialog_stat.length > 0) {
    all_dialogues[prev_dialog_id].parentElement.nextSibling.innerText =
      prev_dialog_stat;
  }
  for (i = 0; i < all_dialogues.length / 2; i++) {
    dialogues_array[i] = all_dialogues[i].dataset.touserid;
    if (dialog_id == dialogues_array[i]) {
      prev_dialog_stat = all_dialogues[i].parentElement.nextSibling.innerText;
      prev_dialog_id = i;
      all_dialogues[i].parentElement.nextSibling.innerText = "Active";
    }
  }
  var input = document.getElementById("ind-message");
  input.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      // alert(1);
      document.getElementById("send").click();
    }
  });

  //
  // GET CHAT HISTORY
  //

  let documentId = getId();
  firestoreDB
    .collection("chats")
    .doc(documentId)
    .collection("discussion")
    .where('oc_id', '==' , OC_ID)
    .get()
    .then((querySnapshot) => {
      let chatHistory = "";
      querySnapshot.forEach((doc) => {
        if(doc.data()['oc_id'] == OC_ID){
            //console.log(doc.data());
            let chatBubble = generateChatBubble(doc.data(), doc.id);
            chatHistory += chatBubble;  
        }
        
      });
//      console.log(chatHistory);
      $(".messages").append(chatHistory);


    });

  subscribeOnce();
  subscribeToFileUpload();
  setChatTimer();
  checkForTherapistOnline();
}

function close_emoji(){
  document.querySelector(".emoji_container").style.display = "none";
}


function clear_chatbox(num) {
  if (num == 0) {
    document.querySelector(".main-messages").style.display = "block";
  } else {
    dialogue_status = 0;
    document.querySelector(".main-messages").style.display = "none";
  }
}

var attatch_status = 0;
globalThis.documentId;
function write_to_file() {
  // alert(2);
  try {
    var form_data = new FormData();
    var action = "write";
    form_data.append("img", document.querySelector(".file_attatch").files[0]);
    form_data.append("msg", document.querySelector("#ind-message").value);
    form_data.append("action", action);
    form_data.append("from", from);
    form_data.append("to", to);
    form_data.append("mail", mail);
    // form_data.append('filename', filename);
    form_data.append("text_msg", msg);
    let message = document.querySelector("#ind-message").value;

    num_array = ['1','2','3','4','5','6','7','8','9','0'];

    num_count = 0;

    for(i=0;i<=message.length;i++){
        if(num_array.includes(message.split('')[i])){
             num_count++;
        }else{
            num_count = 0;
        }
        
        if(num_count > 8){
            ////console.log('phone number found');
            num_count = 0;
            alert_support('num');
        }

        if(message.split('')[i] == '@'){
          alert_support('email');

        }

    }    

    if (document.querySelector(".file_attatch").files.length > 0) {
      attatch_status = 1;
    }
    if (
      document.querySelector("#ind-message").value.trim().length == 0 &&
      attatch_status == 0
    ) {
      alert("please type in a message");
    } else {
      let id;
      if (from < to) {
        id = `${from}-${to}`;
      } else {
        id = `${to}-${from}`;
      }

      let payload = {
        sender: from,
        message: message,
        timestamp: dayjs().toISOString(),
        serverTimestamp: firebase.firestore.FieldValue.serverTimestamp(),
        oc_id: globalThis.OC_ID,
        seen:0,
        seen_time:0,
      };

      documentId = Date.now().toString();


      let uploadedFile = document.querySelector(".file_attatch").files[0];
      if (uploadedFile !== undefined) {
        let filePathToStorage = uploadFileToFirebaseStorage(
          uploadedFile,
          documentId
        );
        let imgContainerElement = document.getElementById("img-container");
        payload.img = imgContainerElement.children[0].src;
      }

      firestoreDB.collection("chats").doc(id).set({ v: 1 }); // firebase should have atleast one field

      firestoreDB
        .collection("chats")
        .doc(id)
        .collection("discussion")
        .doc(documentId)
        .set(payload)
        .then(() => {
          //console.log("Document successfully written!");
        })
        .catch((error) => {
          console.error("Error writing document: ", error);
        });
    }

    document.querySelector("#ind-message").value = "";
    document.querySelector(".file_attatch").value = "";
    document.querySelector(".emoji_container").style.display = "none";
    attatch_status = 0;
    if (!subscribed) {
      subscribeOnce();
      subscribed = true;
    }
  } catch (err) {
    //console.log("err : ", err);
  }
}

function alert_support(mode){
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER_test.php', {action:'alert_support', ocid:OC_ID, mode:mode}, function(data){
    //console.log(data);
  });
}

function getId() {
  let id;
  if (from < to) {
    id = `${from}-${to}`;
  } else {
    id = `${to}-${from}`;
  }
  return id;
}
//alert('test1');
function subscribeOnce() {
  let id = getId();

  // Create the query to load the last 12 messages and listen for new ones.
  try {
    var query = firestoreDB
      .collection("chats/" + id + "/discussion")
      .orderBy("serverTimestamp", "desc")
      .limit(1);

      ////console.log(query);
    // Start listening to the query.
    query.onSnapshot({ includeMetadataChanges: false }, function (snapshot) {
      snapshot.docChanges().forEach(function (change,i) {
        if (change.type === "removed") {
          // deleteMessage(change.doc.id);
        } else {
          var message = change.doc.data();
          ////console.log(change.doc.data());
          let checkIfExist = document.getElementById(change.doc.id);
          if (checkIfExist !== null) {
            // update chat bubble
            if (document.getElementById("img-" + change.doc.id) !== null) {
              document.getElementById("img-" + change.doc.id).src = message.img;
            }
          } else {
            // new chat bubble
            let chatBubble = generateChatBubble(message, change.doc.id);
            let lastMessage = $(".messages").children().last();
            //console.log(change.doc.id);
            if (lastMessage[0].id !== change.doc.id) {
              $(".messages").append(chatBubble);
              chat_seen_stat(change.doc.id,message);
            }
          }

          let messageContainer = document.getElementsByClassName("messages")[0];
          messageContainer.scrollTop = messageContainer.scrollHeight;
        }
      });
    });
  } catch (e) {
    //console.log("Error subscribing : ", e);
  }
}

function chat_seen_stat(last_id,sender){
//alert(id);
let id = getId();
let seen_time = new Date().toLocaleString();
if(from != sender['sender']){
var db = firebase.firestore();
db.collection("chats/" + id + "/discussion").doc(last_id).update({seen: "1", seen_time:seen_time});


}

    var query = firestoreDB
      .collection("chats/" + id + "/discussion")
      .orderBy("serverTimestamp", "desc")
      .limit(1);

      ////console.log(query);
    // Start listening to the query.
    query.onSnapshot({ includeMetadataChanges: false }, function (snapshot) {
      snapshot.docChanges().forEach(function (change) {
        if(change.doc.data()['seen'] == 1){
        ////console.log(change.doc.id + 'seen');
        //document.getElementById(change.doc.id).style.backgroundColor = 'blue';
      }

      });
    });



/*$.post("wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER_test.php", {action:'delivery_stat', ocid:OC_ID}, function(data){
  alert(data);
})*/

}

function generateChatBubble(message, id) {
  restrictManualUserPrompt();
  let formattedDate = dayjs(message.timestamp).format("DD-MMM HH:mm");

  let className = message.sender === from ? "message-right" : "message-left";


  let response;

  // if(message['oc_id'] != OC_ID){
  //   response = '';
  //   return response;
  // }
//the code above only hides previous session messages, fetching is being done anyway.

  if(message['message'].split(',')[0] == 'hide'){
    //console.log(message['serverTimestamp']);
    generateOnlineNotification(message,id);
    className = '';
    response = `
      <div id='${id}'>
        <div class="" style="display:none;">
          
          <p class="right_date"> ${formattedDate} </p>
        </div>
      </div>`;



  }else{
  if(document.querySelector('.therapistOnlinePrompt') === null){}else{
      removeOnlinePrompt();
      if(userType == 't'){restartOnlineCountdown();}
      
  }
  if (message.img === undefined || message.img === "") {
    response = `
      <div id='${id}'>
        <div class="${className}">
          ${message.message}
          <p class="right_date"> ${formattedDate} </p>
        </div>
      </div>`;
  } else {
    response = `
      <div id='${id}'>
        <div class="${className}">
          <img id='img-${id}' src='${message.img}' />
          ${message.message}
          <p class="right_date"> ${formattedDate} </p>
        </div>
      </div>`;
  }
}

  if(className == 'message-right'){
    checkForTherapistOnline();
  }

  let lastMessage = $(".messages").children().last();

  return response;
}


function read() {
  ////console.log('script');
  // //console.log({from:from, to:to, action:action, filename:filename, arr_count:arr_count,mail_to:mail_to});
  // if (typeof arr_count !== 'undefined') {
  //  clearInterval(read_interval);
  // }
  // if(arr_count || arr_count == 0) {
  //  var action = 'read';
  //  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php',
  //    {from:from, to:to, action:action, filename:filename, arr_count:arr_count,mail_to:mail_to},
  //    function(data) {
  //      $('.messages').append(data);
  //      if(data) {
  //        setTimeout(
  //          'run_read();'
  //          ,1000);
  //      }
  //    });
  // } else{
  //  //console.log('else');
  // }
}

function run_read() {
  // read();
}

function click_attatch() {
  document
    .querySelector(".file_attatch")
    .dispatchEvent(new MouseEvent("click"));
}

var hide_status = 1;

function hide_chat_box() {
  if (hide_status == 1) {
    if (document.body.clientWidth < 700) {
      document.querySelector(".main-messages").style.bottom = "-95%";
      //document.querySelector('.msg').style.display = "none";
      hide_status = 0;
    } else {
      document.querySelector(".main-messages").style.bottom = "-55%";
      //document.querySelector('.msg').style.display = "none";
      hide_status = 0;
    }
  } else {
    document.querySelector(".main-messages").style.bottom = "0%";
    //document.querySelector('.msg').style.display = "block";
    hide_status = 1;
  }
}

//setInterval('check_all_chats()', 5000);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var waiting_user = 0;
var curr_user;
var check_reload = 0;
globalThis.acc_change_status = 0;
function check_all_chats() {

  var check_chat = document.querySelector('#check_chat');
  if(check_chat != null){
  document.querySelector('#check_btn_text').innerText = 'Checking...';
  document.querySelector('#check_chat').disabled = true;
  }
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER_test.php",
    { action: "get_curr_user" },
    function (data) {
      
      if (data) {
        data = data.trim();
        setUserType(data);
        console.log(data);
        globalThis.ret_data = data.split(",");
        //console.log(ret_data[0]+'this');
        if (ret_data[0] == "t0") {
          ChangeDialogue(11);
          document.querySelector(".accept_modal_table").innerHTML =
            '<table class="acc_table"><tr><td style="color:#fff;font-size:14px">Please Accept chat request from ' +
            ret_data[4] +
            '</td><td><button class="acc_btn" onclick="accept_chat(' +
            ret_data[2] +
            "," +
            ret_data[1] +
            "," +
            ret_data[5] +
            ');" style="background-color:#fec031" class="session-btn">ACCEPT</button></td></tr></table;';
          //document.querySelector(".accept_modal").style.display = "block";
          //init_check_all_chats();
          document.querySelector('#session_data').innerText = "ONE ACTIVE SESSION";
          init_check_all_chats_delay();

        } else if (ret_data[0] == "t1") {
          ChangeDialogue(12);
          document.querySelector(".accept_modal_table").innerHTML =
            '<table class="acc_table"><tr><td style="color:#fff">Please Wait for User to Start Chat</td><td></td></tr></table>';
          //document.querySelector(".accept_modal").style.display = "block";
          init_check_all_chats();
          document.querySelector('#session_data').innerText = "ONE ACTIVE SESSION";

        } else if (ret_data[0] == "t2" && dialogue_status == 0) {
          ChangeDialogue(13);
          // alert(2);
          if (document.querySelector(".main-messages")) {
            if (
              document.querySelector(".main-messages").style.display == "none"
            ) {
              location.reload();
            }
          }
          globalThis.OC_ID = ret_data[5];
          globalThis.sessionStartedAt = ret_data[7];
          globalThis.sessionDuration = ret_data[8];
          create_dialog(ret_data[2], ret_data[1], ret_data[6], "test");
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector('#session_data').innerText = "ONE ACTIVE SESSION";

        } else if (ret_data[0] == "t3" && dialogue_status == 0) {
          ChangeDialogue(15);
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        } else if (ret_data[0] == "t4") {
          ChangeDialogue(15);
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        } else if (ret_data[0] == "t5") {
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
          if (ret_data[6] == 0) {
            ChangeDialogue(14);
            //document.querySelector(".user_exit").style.display = "block";
            //setTimeout(function () {document.querySelector(".user_exit").style.display = "none";}, 10000);
          }else{
            ChangeDialogue(15);
          }
          setTimeout(function () {
            def_warning(ret_data[5]);
          }, 2000);

          if (dialogue_status == 1) {
            clear_chatbox(1);
          }
        } else if (ret_data[0] == "t7") {
          ChangeDialogue(18);
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        } else if (ret_data[0] == "u0") {
          if(ret_data[7]==1){
            if(call_conf_msg == 0){
              if(timerExpire == 0){
                  ChangeDialogue(4);
                }
            calling_therapist_shown++;
            document.querySelector('.timer_text').innerText = "Great news!! Therapist is coming online.";
            document.querySelector('.timer_img').style.display= 'none';
            /*setTimeout(function(){document.querySelector('.timer_img').src="https://thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/hourglass.png";
            document.querySelector('.timer_img').style.display= 'block'; 
            var rd = 0;
            var rotate_deg = setInterval(function(){
                rd++;
                document.querySelector('.timer_img').style.transform = 'rotateZ('+rd+'deg)';
            //console.log(rd)},20);

          });*/

          }
            
            setTimeout(function(){
              if(timerExpire == 0){
                  ChangeDialogue(5);
              }
              calling_therapist_shown++;
              document.querySelector('.timer_text').innerText = "Let's give the Therapist couple of minutes to get ready. Thank you for your patience"; call_conf_msg = 1;
              document.querySelector('.timer_text').style.opacity = 0.0;
              let op = 0.0;
              var fade_in = setInterval(function(){
              document.querySelector('.timer_text').style.opacity = op+0.1;
              op = op+0.1;
              ////console.log(op);
              if(op>1){clearInterval(fade_in);}},100);



          }, 15000);
          }
          if(calling_therapist_shown == 0){
            ChangeDialogue(2);
            calling_therapist_shown++;
          }
          document.querySelector(".wait_btn").dataset.ocid = ret_data[5];
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelectorAll(".browse_btn")[1].dataset.ocid =
            ret_data[5];
          document.querySelectorAll(".browse_btn")[2].dataset.ocid =
            ret_data[5];
          //document.querySelector(".accept_modal_timer").style.display = "block";
          document.querySelector(".accept_modal_timer").style.fontSize = "24px";

          if (waiting_user == 0) {
            run_timer(ret_data[5],'u0');
          }
          init_check_all_chats();
          if(check_chat != null){
          document.querySelector('#session_data').innerText = "ONE ACTIVE SESSION";}
        } else if (ret_data[0] == "u1") {
          ChangeDialogue(6);
          if(acc_change_status == 0){document.querySelector(".accept_modal").innerHTML =
            '<div class="accept_modal_table"><table class="acc_table"><tr><td><p style="margin:0;text-align:left;color:#fff;">Therapist is ready for the session. Please click Start to open the chat window. Have a great session!!</p><p style="margin:0;text-align:left;color:#D4A74D;font-weight:600;">' +
            ret_data[3] +
            '</p></td><td><button class="acc_btn" onclick="accept_chat(' +
            ret_data[1] +
            "," +
            ret_data[2] +
            "," +
            ret_data[5] +
            ');" style="background-color:#fec031" class="session-btn">START</button></td></tr></table></div>'; acc_change_status=1;}
          //document.querySelector(".accept_modal").style.display = "block";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          waiting_user = 5;
          if(check_chat != null){
          document.querySelector('#session_data').innerText = "ONE ACTIVE SESSION";}

        } else if (ret_data[0] == "u2" && dialogue_status == 0) {
          ChangeDialogue(7);
          if (document.querySelector(".main-messages")) {
            if (
              document.querySelector(".main-messages").style.display == "none"
            ) {
              // location.reload();
            }
          }
          waiting_user = 5;
          globalThis.OC_ID = ret_data[5];
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          let therapistEmail = "";
          globalThis.sessionStartedAt = ret_data[6];
          globalThis.sessionDuration = ret_data[7];
          create_dialog(ret_data[1], ret_data[2], therapistEmail, "test");
          if(check_chat != null){
          document.querySelector('#session_data').innerText = "ONE ACTIVE SESSION";}

        } else if (ret_data[0] == "u3") {
          ChangeDialogue(9);

          if (
            dialogue_status == 1 &&
            document.querySelectorAll(".start_chat1").length < 3
          ) {
            // alert(2);
            disableChat();
            clearInterval(customInterval);
            let chatTimerELement = document.getElementById("chat-timer");
            chatTimerELement.innerHTML = `
              <span style="color:#fff;font-weight:500;">
                Your ${sessionDuration} mins are completed.
              </span>`;
              document.querySelector('#chat-timer').style.backgroundColor = '#A256A1';
              document.querySelector('#chat-timer').style.color = '#fff';
              book_another_session('first');
              ChangeDialogue(8);
              document.querySelector('.close-chat').style.pointerEvents = 'auto';
            dialogue_status = 0;
          }
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        } else if (ret_data[0] == "u4") {
          ChangeDialogue(3);
          if (document.querySelector(".main-messages")) {
            if (
              document.querySelector(".main-messages").style.display == "none"
            ) {

              //location.reload();
            }
          }
          if (dialogue_status == 1) {
            clear_chatbox(1);
          }
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        } else if (ret_data[0] == "u5") {
          ChangeDialogue(1);
          if (dialogue_status == 1) {
            clear_chatbox(1);
          }
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".timer_text").style.display = "none";
          document.querySelectorAll(".browse_btn")[0].disabled = false;
          document.querySelectorAll(".browse_btn")[1].disabled = false;
          document.querySelectorAll(".browse_btn")[0].dataset.ocid =
            ret_data[5];
          document.querySelectorAll(".browse_btn")[1].dataset.ocid =
            ret_data[5];
          run_timer(ret_data[5],'u5');
          document.querySelectorAll(".browse_btn")[0].dataset.action = 1;
          document.querySelectorAll(".browse_btn")[1].dataset.action = 1;
          //document.querySelector(".accept_modal_timer").style.display = "block";
          document.querySelector(".accept_timer").style.width = "175px";
          document.querySelector(".accept_timer").style.fontSize = "18px";
          document.querySelectorAll(".browse_btn")[0].style.backgroundColor =
            "#fec031";
          document.querySelectorAll(".browse_btn")[1].style.backgroundColor =
            "#fec031";
          //document.querySelectorAll('.browse_btn')[2].style.backgroundColor = '#fec031';

            if(typeof(timer_timeout)!== 'undefined'){clearTimeout(timer_timeout);}
            document.querySelector(".accept_timer").style.display = 'block';
          document.querySelector(".accept_timer").innerText =
            "Sorry ! Therapist is not available.";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";

        }else if(ret_data[1] == "u3"){
          ChangeDialogue(15);
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        } else if (ret_data[0] == "u6") {
          ChangeDialogue(17);
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
          document.querySelector(".timer_img").style.display = "none";
          document.querySelector('#session_data').innerText = "NO ACTIVE SESSIONS";
        }
      }
      if (data) {
        check_reload = 1;
        //init_check_all_chats();
          if(check_chat != null){
              setTimeout(function(){document.querySelector('#check_btn_text').innerText = "";document.querySelector('#check_chat').disabled = false;},10000);
            }
        
      }else{}
    }
  );
}
check_all_chats();

function check_for_data(){

  if(check_reload == 0){
    location.reload();
  }
}




function init_check_all_chats() {
  setTimeout("check_all_chats();", 15000);
  //console.log('get_curr user');
}

function init_check_all_chats_delay(){
  setTimeout("check_all_chats();", 90000);
  //console.log('get_curr user'); 
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

globalThis.therapistDuration = 30;
globalThis.therapistOnlineInterval;
function checkForTherapistOnline(){
  if(userType == 't'){
   removeOnlinePrompt();
      therapistDuration = 30;
      if(typeof(therapistOnlineInterval) == 'undefined'){

      }else{
            for(i=0;i<=therapistOnlineInterval;i++){
              clearInterval(therapistOnlineInterval);  
            }
      }
      
      therapistOnlineInterval = setInterval('countTherapistDelay(therapistDuration);', 1000);
      //console.log('t');
  }
}

function countTherapistDelay(duration){
    let remainingSessionDuration = document.querySelector('#chat-timer').children[1].innerText.split('m')[0];
    if(remainingSessionDuration > 0){
    if(duration > (-15)){
      therapistDuration = duration-1;
      console.log(duration-1);
      if(therapistDuration == 0){        
        insertTherapistPrompt();
      }
      return duration-1;
    }else{
      //console.log(0);
      insertSessionLostPrompt();
      clearInterval(therapistOnlineInterval);
      return 0;

    }
  }
}


function test_call(){
  // $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/GET_CURR_USER_test.php', {action:'test_call', ocid:OC_ID}, function(data){
  //   console.log(data);
  // });
}

function insertTherapistPrompt(){
    removeOnlinePrompt();
    $('.messages').append(`<div class="book_another_session therapistOnlinePrompt" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Hey!!<br>Are you online??<a href='#' onClick="restartOnlineCountdown();"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">Yes,</b> I am online.</section></a></div>`);
            scrollToBottom();
}

function insertTherapistManualPrompt(){
    removeOnlinePrompt();
    $('.messages').append(`<div class="book_another_session therapistOnlinePrompt" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Hey!!<br>Are you online??<br>Please type in a Message before you are disconnected.</div>`);
            scrollToBottom();	
}

function restartOnlineCountdown(){
  clearInterval(therapistOnlineInterval);
  therapistDuration = 10;  
  removeOnlinePrompt();
  checkForTherapistOnline();
}

function insertSessionLostPrompt(){
    //removeOnlinePrompt();
    sendSessionLostNotificationToUser();
  $('.messages').append(`<div class="book_another_session therapistOnlinePrompt" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Sorry!!<br>You were not responding for too long.<br>we will try reconecting you but user can change the therapist now</div>`);
  
            scrollToBottom();

}


function sendSessionLostNotificationToUser(){
  document.querySelector('#ind-message').value = 'hide,promt_online,'+from;

  write_to_file();
}

function sendSessionStatusNotificationToTherapist(status){
  if(status == 'continue'){
      document.querySelector('#ind-message').value = 'hide,continue_chat,'+from;
      write_to_file();
  }else if(status == 'end'){
      document.querySelector('#ind-message').value = 'hide,end_chat,'+from;
      write_to_file();
  }else if(status == 'user_gen'){
      document.querySelector('#ind-message').value = 'hide,user_gen,'+from;
      write_to_file();     
  }

}

function generateOnlineNotification(message,id){
    //console.log(message);
    removeOnlinePrompt();
    if(message['message'].split(',')[2] != from){
      if(userType == 'u' && message['message'].split(',')[1] == 'promt_online'){
        insertUserPrompt(message);
        //updatePromptOnline();
        //console.log(message);
      }

      if(userType == 't'){

      var oldDate = new Date(message['timestamp']);
      var newDate = new Date();      
      newDate.setTime(oldDate.getTime() + (1 * 60 * 1000));

      if(new Date() < newDate){
        if(message['message'].split(',')[1] == 'continue_chat'){
            restartOnlineCountdown();
        }else if(message['message'].split(',')[1] == 'end_chat'){
            endChatDueToInactivityMessage();
        }else if(message['message'].split(',')[1] == 'user_gen'){
            //insertTherapistPrompt();
            insertTherapistManualPrompt();
        } 
      }
    }
  }else{
    if(userType == 'u'){
      var oldDate = new Date(message['timestamp']);
      var newDate = new Date();      
      newDate.setTime(oldDate.getTime() + (1 * 60 * 1000));
      if(new Date() < newDate){
      if(message['message'].split(',')[1] == 'user_gen'){
        insertManualPrompt(message,id);
        //console.log(message);
      }
    }
    }
  }

    return '';
}


function endChatDueToInactivityMessage(){
  disableChat();
    removeOnlinePrompt();
  $('.messages').append(`<div class="book_another_session therapistOnlinePrompt" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Sorry!!<br>User opted for change therapist<br>Session ended due to inactivity</div>`);
  document.querySelector('#chat-timer').style.backgroundColor = '#b9e9ff';
  disableChat();
            scrollToBottom();
  disableMoreOptions();

  setTimeout(function(){location.reload()}, 5000);
}

function disableMoreOptions(){
  document.querySelector('.more-options').style.pointerEvents = 'none';
}

function takeActionOnTherapist(action = 'continue'){
  if(action == 'continue'){
    sendSessionStatusNotificationToTherapist('continue');
    removeOnlinePrompt();
  }else if(action == 'end'){
    sendSessionStatusNotificationToTherapist('end');
    endChatDueToInactivity(OC_ID);
  }else if(action == 'user_gen'){
    sendSessionStatusNotificationToTherapist('user_gen');
    document.querySelector('.more-options').click();
    disableManualPrompt();
    setTimeout(function(){
      enableManualPrompt();
    }, 40000);

  }
}

function disableManualPrompt(){
  document.querySelector('#chat_options_table').children[0].children[3].style.pointerEvents = 'none';
  document.querySelector('#chat_options_table').children[0].children[3].style.backgroundColor = '#505050';
}

function enableManualPrompt(){
  document.querySelector('#chat_options_table').children[0].children[3].style.pointerEvents = 'unset';
  document.querySelector('#chat_options_table').children[0].children[3].style.backgroundColor = 'unset';  
}


function endChatDueToInactivity(ocid){
    $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "TLost", ocid: ocid },
    function (data) {
      data = data.trim();
      if(data==1){
        location.reload();
      }else{
        alert('Some error Occurred');
      }
    }
  );
}



function removeOnlinePrompt(){
      if(document.querySelector('.therapistOnlinePrompt') === null){}else{
      for(i=0;i<document.querySelectorAll('.therapistOnlinePrompt').length;i++){
            document.querySelectorAll('.therapistOnlinePrompt')[i].remove();              
      }
    }
}

function insertUserPrompt(message){
      var oldDate = new Date(message['timestamp']);
      var newDate = new Date(); 
      removeOnlinePrompt();    
      newDate.setTime(oldDate.getTime() + (1 * 60 * 1000));
      if(new Date() > newDate){

      }else{
        $('.messages').append(`<div class="book_another_session therapistOnlinePrompt" id="" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Network Error !!<br>Do you want to change your Reader ?
      <a href='#' onClick="takeActionOnTherapist('continue');"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">No,</b> I will wait</section></a>
      <a href='#' onClick="takeActionOnTherapist('end');"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><b style="font-weight:500;">Yes,</b> Please Change</section></a></div>`);
            scrollToBottom();
      }  
}
globalThis.updateManualPromptTimeout = '';
globalThis.insertManualUserPrompt = 1;

function restrictManualUserPrompt(){
  console.log('called');
  insertManualUserPrompt = 0;
}

function insertManualPrompt(message,id){
      insertManualUserPrompt = 1;
      $('.messages').append(`<div class="book_another_session therapistOnlinePrompt" style="
          width: 100%;
          text-align: center;
          background-color: #A256A1;
          padding: 10px;
          border-radius: 10px;
          color:#fff;
      ">Checking therapist status.<br>Please Wait..<a href="#"><section style="
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
          margin-top: 5px;
          color: #7064A0;
      "><img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/chat-renew/base_img/gif/ongoing session.gif" style="width: 46px;"></section></a></div>`);
      //console.log(message);console.log('message');
      updateManualPromptTimeout = setTimeout(function(){updateManualPrompt(message,id,insertManualUserPrompt)}, 40000);

}


function updateManualPrompt(message,id,insertManualUserPrompt){

  console.log(insertManualUserPrompt);
  removeOnlinePrompt();
  if(insertManualUserPrompt == 1){
      insertUserPrompt(message);  
  }

  let collectionId = getId();

  var db = firebase.firestore();
  
  let newMessageArray = message['message'].split(',');
      newMessageArray[1] = newMessageArray[1]+"_seen";

  let newMessage = newMessageArray.toString();

  db.collection("chats/" + collectionId + "/discussion").doc(id).update({message: newMessage});

  console.log(id);


}

async function updatePromptOnline(){  

  let id = getId();  
  var db = firebase.firestore();
  let last_id = "1659601709313";
/*
    var query = firestoreDB
      .collection("chats/" + id + "/discussion").doc("1659601709313");
    let data = [];
*/  
  
//  db.collection("chats/" + id + "/discussion").doc(last_id).update({message: "hide,user_gen_seen,"});


/*
  let lastids = testobject['serverTimestamp']['seconds'] + testobject['timestamp'].split('.')[1].split('Z')[0];
  let last_id = db.collection("chats/" + id + "/discussion").doc(last_id).update({seen: "1", seen_time:seen_time});*/

}

//////////////////////////////////////////////////////////////////////////////////



function def_warning(ocid) {
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "warn", ocid: ocid },
    function (data) {}
  );
}

globalThis.created_time = '.:.';
globalThis.fetch_time_call = 0;


function run_timer(ocid,run_case){
  if(run_case == 'u5'){
    return;
  }

  if(waiting_user==5){ 
    /*alert('test');*/}else{
  let full_time =  document.querySelector('.accept_timer').innerText;
  let rem_time = full_time.split(':');
if(rem_time[0]==0 && rem_time[1]==0){
    //add_remaining_session(ocid);
    timerExpire++;
    ChangeDialogue(1);
    document.querySelector('.accept_timer').innerText = 'Therapist is not Responding.. Please Wait';
    document.querySelector('.accept_timer').style.display = 'block';
    document.querySelector('.accept_timer').style.fontSize = '14px';
    document.querySelector('#accept_timer').style.width = '100%';
    document.querySelector('.timer_img').style.display="none";  
    document.querySelector('.timer_text').style.display = 'none';
    document.querySelector('.wait_btn').disabled = false;
    /*document.querySelectorAll('.browse_btn')[0].disabled = false;
    document.querySelectorAll('.browse_btn')[1].disabled = false;
    document.querySelectorAll('.browse_btn')[2].disabled = false;
    document.querySelectorAll('.browse_btn')[0].style.backgroundColor = '#fec031';
    document.querySelectorAll('.browse_btn')[1].style.backgroundColor = '#fec031';
    document.querySelectorAll('.browse_btn')[2].style.backgroundColor = '#fec031';*/
    document.querySelector('.wait_btn').style.backgroundColor = '#fec031';
    document.querySelector('.wait_btn').style.color = '#251a2b';
    document.querySelector('.browse_btn').style.color = '#251a2b';
    reject_chat('-','-',ocid);
    

    waiting_user = 2; 
}else{
let min = 'loading';
let sec = '..';





if(created_time.length<4 && fetch_time_call == 0){
  if(fetch_time_call == 0){
    fetch_time_call = 1;
  $.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php',{action:'created_time',ocid:ocid},function(data){
    //console.log(data+'test123'); 
    created_time=data;
    //console.log('function_ran');
  });}
}else{

  full_time = '00:'+full_time;
  full_time = full_time.split(':');
  curr_time = (full_time[0]*3600000) + (full_time[1]*60000) + (full_time[2]*1000);
  ////console.log(created_time+'----');
  created_tim = created_time.split(':');
  created_tim = (created_tim[0]*3600000) + (created_tim[1]*60000) + (created_tim[2]*1000);
  var today = new Date();
  var time_now = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  time_now = time_now.split(':');
  time_now = (time_now[0]*3600000) + (time_now[1]*60000) + (time_now[2]*1000);
  time_diff = time_now-created_tim;
  av_time = 300000 - time_diff;
  if(av_time<0){
    av_time = '00:00';
    min = 00;
    sec = 00;
    //console.log(av_time);
  }else{
  av_time = av_time/60000;
  av_time = av_time.toFixed(2);
    av_time = av_time.split('.');
    av_time = av_time[0]+':'+Math.round(60*(av_time[1]/100));
    av_time = av_time.split(':');
  ////console.log(av_time);

   min = av_time[0];
   sec = av_time[1];
  if(isNaN(min)){
  min = 'loading';
  sec = '...';
}
  }
}





if(sec == 9 || sec == 8 || sec == 7 || sec == 6  || sec == 5  || sec == 4  || sec == 3  || sec == 2  || sec == 1  || sec == 0 ){
  sec = '0'+sec;
}
let time_string = min+':'+sec;
if(isNaN(min)){
  min = 'loading';
  sec = '...';
}
document.querySelector('.accept_timer').innerText = time_string;
//console.log('timer');
if(sec==30 || sec==0 || sec==59 || sec==58){
  /*$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php',{action:'set_time',curr_time:time_string,ocid:ocid},function(data){//console.log(data);
    if(data){
      //console.log(data);
    }
  });*/
}
waiting_user = 1; 
}

init_run_timer(ocid,run_case);
} 
}

function init_run_timer(ocid,run_case){
  //f(user_waiting==5){}
  if(run_case == 'u5'){
    
  }else{
  if(waiting_user==1){
   globalThis.timer_timeout = setTimeout(function(){run_timer(ocid);},1000);}  
  }
  
}

//setInterval('check_all_chats();', 1000);

function user_waiting(ocid) {
  document.querySelector(".accept_timer").innerText = "4:59";
  document.querySelector("#accept_timer").style.fontSize = "24px";
  document.querySelector(".timer_text").style.display = "block";
  document.querySelector(".timer_img").style.display = "block";
  document.querySelector("#accept_timer").style.width = "25px";
  run_timer(ocid);
  revive_therapist(ocid);
  document.querySelector(".wait_btn").disabled = true;
  document.querySelectorAll(".browse_btn")[0].disabled = true;
  document.querySelectorAll(".browse_btn")[1].disabled = true;
  document.querySelectorAll(".browse_btn")[0].style.backgroundColor = "#fff";
  document.querySelectorAll(".browse_btn")[1].style.backgroundColor = "#fff";
  document.querySelector(".wait_btn").style.backgroundColor = "#fff";
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "busy_ther", ocid: ocid },
    function (data) {
      //console.log(data);
    }
  );
  /*$.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "set_time", curr_time: time_string, ocid: ocid },
    function (data) {
      //console.log(data);
      if (data) {
        //console.log(data);
      }
    }
  );*/
}

function revive_therapist(ocid) {
  //$.post('wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php',{action:'revive',ocid:ocid},function(data){//console.log(data)});
}

function user_browsing(ocid, act) {
  document.querySelectorAll('.browse_btn')[0].innerText = 'Changing Therapist';
  //document.querySelectorAll('.browse_btn')[1].innerText = 'changing Therapist';
  document.querySelectorAll('.browse_btn')[0].disabled = true;
  document.querySelectorAll('.browse_btn')[1].disabled = true;
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "browse", ocid: ocid, act: act },
    function (data) {
      //console.log(data);
      if (data) {
        if ((data = 1)) {
          window.location.replace(
            "https://www.thriive.in/talk-to-best-tarot-card-reader-online"
          );
        } else {
          alert("please try later");
        }
      }
    }
  );
  /*$.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "set_time", curr_time: "reset" },
    function (data) {
      if (data) {
      }
    }
  );*/
}

function hide_emoji() {
  if (
    document.querySelector(".emoji_container").style.display == "" ||
    document.querySelector(".emoji_container").style.display == "none"
  ) {
    document.querySelector(".emoji_container").style.display = "block";
  } else {
    document.querySelector(".emoji_container").style.display = "none";
  }
  ////console.log();
}

function insert_emoji(EL) {
  document.querySelector("#ind-message").value += EL;
}

var default_title = document.title;
var num = 0;
function title() {
  document.tile = default_title;
  if (document.title == "Therapist account dashboard") {
    document.title = "New Message";
  } else {
    document.title = default_title;
  }
}
/*
  function new_message(){
    var check_int = setInterval(function(){num = num+1;//console.log('num');}, 1000);
    if(num<6){
      title();
      //console.log('if');
    }else{
      clearInterval(check_int);
    }
  }
*/

function div_options() {
  if (
    document.querySelector(".chat_options").style.display == "none" ||
    document.querySelector(".chat_options").style.display == ""
  ) {
    document.querySelector(".chat_options").style.display = "block";
  } else {
    document.querySelector(".chat_options").style.display = "none";
  }
}

function feed_data() {
  var test = document.querySelectorAll(".start_chat");
  var test_length = test.length / 2;
  var test_array = [];
  var id_string = "";
  let action = "feed";
  for (i = 0; i < test_length; i++) {
    id_string +=
      test[i].dataset.fromuserid + "_" + test[i].dataset.touserid + "|";
  }
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: action, id_string: id_string },
    function (data) {
      //console.log(data);
    }
  );
}

async function complete_chat(from, to) {
  if (
    confirm(
      "Completing Chat means you will no longer be able to chat within this session are You sure?"
    )
  ) {
    let action = "complete";
    let data = await getCurrentSessionMessages();
    let statusAfterPush = await pushDataToSQL(data);

    if (globalThis.userType === "t") {
      location.reload();
    }
  }
}

async function complete_chat_w_timer_ends(from, to) {

  let data = await getCurrentSessionMessages();
  let statusAfterPush = await pushDataToSQL(data);
  pushDataToSQL(data).then(res => {
    //console.log('res : ', res);
    // alert(1);
    if (globalThis.userType === "t") {
      location.reload();
    }
  });
}

function incomplete() {
  let action = "incomplete";
  if (confirm("Mark This Chat as Incomplete?")) {
    $.post(
      "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
      { action: action, to: to, from: from },
      function (data) {
        if (data == 1) {
          location.reload();
        } else {
          location.reload();
        }
      }
    );
  }
}

function accept_chat(to, from, oc_id) {

  waiting_user = 5;
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "accept_chat", to: to, from: from, oc_id },
    function (data) {
      //console.log(data);
      if (data) {
        init_check_all_chats();
        //console.log(data);
        if(data == 'expired'){
          init_check_all_chats();
          ChangeDialogue(10);
          take_later(oc_id,2);
          return;
        }
        let data_arr1 = data.split(",");
        if (data_arr1[1] == "therapist") {
          //document.querySelector('.accept_modal_table').innerHTML = '<table class="acc_table"><tr><td>Please Wait for the user</td><td><button onclick="reject_chat('+to+','+from+','+oc_id+')">REJECT</button></td></tr></table>';
        } else {
          let msg = "test";
          //console.log(data);
          init_check_all_chats();
          // create_dialog(to, from, data, msg);
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelector(".accept_modal_timer").style.display = "none";
        }
        window.location.replace('https://www.thriive.in/chat-page');
      }
    }
  );

    document.querySelector('.acc_btn').innerText = 'Starting...';
    //document.querySelector('.acc_btn').disabled = true;

}

function reject_chat(to, from, ocid) {
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "reject_chat", to: to, from: from, ocid: ocid },
    function (data) {
      if (data) {
        //console.log(data);
        if (data == "tr") {
          document.querySelector(".accept_modal").style.display = "none";
          document.querySelectorAll('.browse_btn')[0].disabled = false;
          document.querySelectorAll('.browse_btn')[1].disabled = false;
          //document.querySelectorAll('.browse_btn')[2].disabled = false;
          document.querySelectorAll('.browse_btn')[0].style.backgroundColor = '#fec031';
          document.querySelectorAll('.browse_btn')[1].style.backgroundColor = '#fec031';
          //document.querySelectorAll('.browse_btn')[2].style.backgroundColor = '#fec031';


        } else if (data == "error") {
          //console.log("please try later");
        }
      }
    }
  );
}

function take_later(ocid, act) {
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "browse", ocid: ocid, act: 2 },
    function (data) {
      if (data) {
        ChangeDialogue(16);
        document.querySelector(".exit_text").innerHTML =
          "Your session is saved in your account.<br> You can log back on to use it at any convenient time.<br><button class='browse_btn session-btn' onclick='document.querySelector(`.user_exit`).style.display=`none`'>OK</button>";
        //document.querySelector(".user_exit").style.display = "block";
        document.querySelector(".accept_modal_timer").style.display = "none";

        if ((data = 1)) {
        } else {
          alert("please try later");
        }
      }
    }
  );
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    { action: "set_time", curr_time: "reset" },
    function (data) {
      if (data) {
      }
    }
  );
}

function subscribeToFileUpload() {
  let imgInput = document.getElementById("add-doc");
  imgInput.onchange = (evt) => {
    const [file] = imgInput.files;
    let validatedFile = validateUploadedFile(file);
    if (file && validatedFile) {
      let localURL = URL.createObjectURL(file);
      let previewElement = document.getElementById("show-img-preview");
      let imgContainerElement = document.getElementById("img-container");
      imgContainerElement.innerHTML = ""; // remove previous appended img
      previewElement.style.display = "block";
      let imgElement = document.createElement("img");
      imgElement.src = localURL;
      imgContainerElement.appendChild(imgElement);
      return localURL.toString();
    } else {
      document.querySelector(".file_attatch").value = "";
      alert("Invalid File Type or file size exceeds 1MB");
    }
  };
}

function closeImgPreview() {
  document.getElementById("show-img-preview").style.display = "none";
  document.querySelector(".file_attatch").value = "";
}

function uploadFileToFirebaseStorage(file, timestamp) {
  // Validations goes here
  // File size and extension check
  let id = getId();
  let type = file.type;
  let extension = type.split("/")[1];
  let fileName = `${id}-${timestamp}.${extension}`;

  // Uploading Image to Firebase
  var imgRef = chatUploadsRef.child(fileName);
  imgRef.put(file).then((snapshot) => {
    closeImgPreview();
    snapshot.ref.getDownloadURL().then((downloadURL) => {
      firestoreDB
        .doc(`chats/${id}/discussion/${timestamp}`)
        .update({ img: downloadURL })
        .then((res) => {
          // replacing temp Blob URL with firebase storage URL
          document.getElementById("img-" + id).src = downloadURL;
        });
    });
  });
  return fileName;
}

function validateUploadedFile(file) {
  let validImageTypes = ["image/png", "image/jpeg", "image/jpg"];
  let maxFileSizeAllowed = 1 * 1000000; // 1 MB
  if (
    validImageTypes.indexOf(file.type) !== -1 &&
    file.size < maxFileSizeAllowed
  ) {
    return true;
  } else {
    return false;
  }
}

var customInterval;

function setChatTimer() {
  //console.log('set timer called')
  let targetElement = document.getElementById("chat-timer");
  let currentTime = dayjs();
  let sessionStartTime = dayjs(sessionStartedAt);
  let timeDiff = currentTime.diff(sessionStartTime, "m"); // time diff in mins
  if (timeDiff > sessionDuration) {
    disableChat();
    targetElement.innerHTML = `
      <span style="color:#fff;font-weight:500;">Your ${sessionDuration} mins are completed.</span>
    `;
              document.querySelector('#chat-timer').style.backgroundColor = '#A256A1';
              document.querySelector('#chat-timer').style.color = '#fff';
              book_another_session('first');
              ChangeDialogue(8);
              document.querySelector('.close-chat').style.pointerEvents = 'auto';
  } else {
      customInterval = setInterval(() => {
      let tdiff = dayjs().diff(sessionStartTime, "s");
      let min = parseInt(tdiff / 60);
      let secs = parseInt(tdiff % 60);
      let reverseMin = parseInt(sessionDuration) - (min + 1);
      if (reverseMin < 0) {
        // stop session

        // if user is a therapist,
        // complete chat on his side
        // and refresh page
        disableChat();
        //window.location.replace('https://www.thriive.in');
        // let completeChat = document.getElementsByClassName("complete-chat");
        if (globalThis.userType === "t") {
          clearInterval(customInterval);
          complete_chat_w_timer_ends(from, to);
        }
      }
      let reverseSecs = 60 - (secs + 1);
      if (tdiff > sessionDuration * 60) {
        targetElement.innerHTML = `
          <span style="color:#fff;font-weight:500;">Your ${sessionDuration} mins are completed.</span>
        `;
              document.querySelector('#chat-timer').style.backgroundColor = '#A256A1';
              document.querySelector('#chat-timer').style.color = '#fff';
              book_another_session('first');
              ChangeDialogue(8);
              document.querySelector('.close-chat').style.pointerEvents = 'auto';
        clearInterval(customInterval);
      } else {
        if(reverseMin < 1){
          removeOnlinePrompt();
        }
        targetElement.innerHTML = `
        <span> ${sessionDuration} mins session </span>
        <span>
          ${reverseMin >= 0 ? reverseMin : "--"}m
          ${reverseMin >= 0 ? reverseSecs : "--"}s
        </span>`;
      }
    }, 1000);
  }
}

async function getCurrentSessionMessages() {
  let id = getId();
  let sessionData = await firestoreDB
    .collection("chats/" + id + "/discussion")
    .where("oc_id", "==", globalThis.OC_ID)
    .get()
    .then((querySnapshot) => {
      let data = [];
      querySnapshot.forEach((doc) => {
        // doc.data() is never undefined for query doc snapshots
        data.push(doc.data());
      });
      return data;
    })
    .catch((error) => {
      //console.log("Error getting documents: ", error);
    });
  return sessionData;
}

function disableChat() {
  let inputBox = document.getElementById("ind-message");
  let emojiIcon = document.getElementById("emoji_icon");
  let attachBtn = document.getElementById("click_attatch");
  let sendBtn = document.getElementById("send");

  inputBox.disabled = true;
  emojiIcon.disabled = true;
  attachBtn.disabled = true;
  sendBtn.disabled = true;

  inputBox.style.cursor = "not-allowed";
  emojiIcon.style.cursor = "not-allowed";
  attachBtn.style.cursor = "not-allowed";
  sendBtn.style.cursor = "not-allowed";
}

function setUserType(data) {
  let dataArr = data.split(",");
  const typeOne = ["t0", "t1", "t2", "t3", "t4", "t5"];
  const typeTwo = ["u0", "u1", "u2", "u3", "u4", "u5"];
  if (typeOne.indexOf(dataArr[0]) !== -1) {
    globalThis.userType = "t";
  }
  if (typeTwo.indexOf(dataArr[0]) !== -1) {
    globalThis.userType = "u";
    document.querySelectorAll('.t-chat-action').forEach(e => e.remove());
  }
}

async function pushDataToSQL(data) {

  const action = "complete_and_write_to_sql";
  // alert("pushing data to SQL");

  let formData = new FormData();
  formData.append("data", JSON.stringify(data));
  formData.append("action", action);
  formData.append("to", to);
  formData.append("from", from);

  let response = await fetch(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    {
      method: "POST",
      body: formData,
    }
  );
  return response;
}

var offlineTimer = 0;
let offlineInterval;
const offlineColor = "linear-gradient(45deg, #039be5, #e91e63)";
const onlineColor = "#039be5";

window.addEventListener("offline", (event) => {
  globalThis.networkStatus = "OFFLINE";
  let chatTimerELement = document.getElementById("chat-timer");
  chatTimerELement.style.background = offlineColor;

  offlineInterval = setInterval(() => {
    offlineTimer++;
  }, 1000);
});

window.addEventListener("online", (event) => {

  globalThis.networkStatus = "ONLINE";
  let chatTimerELement = document.getElementById("chat-timer");
  chatTimerELement.style.background = onlineColor;
  // XHR call to add duration
  $.post(
    "wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
    {
      action: "add_offline_duration",
      secs: offlineTimer,
      oc_id: globalThis.OC_ID,
    },
    function (data) {
      jsonRes = JSON.parse(data);
      globalThis.addedSecs = parseInt(jsonRes.added_seconds);
      globalThis.totalAddedSecs = parseInt(jsonRes.total_duration_in_secs);
    }
  );
  // increase duration
  clearInterval(offlineInterval);
});

function scrollToBottom() {
  let messageContainer = document.getElementsByClassName("messages")[0];
  messageContainer.scrollTop = messageContainer.scrollHeight;
}


function add_remaining_session(ocid){
      if(wait_timer_end == 0){
      wait_timer_end++;
      $.post("wp-content/themes/thriive/horoscope_new/chat-renew/php/chat-functions-test12Apr2022.php",
          {action:'add_remaining_session',ocid:ocid},
          function(data){            
            if(data){
              ////console.log('worked');
          document.querySelectorAll('.browse_btn')[0].disabled = false;
          document.querySelectorAll('.browse_btn')[1].disabled = false;
          //document.querySelectorAll('.browse_btn')[2].disabled = false;
          document.querySelectorAll('.browse_btn')[0].style.backgroundColor = '#fec031';
          document.querySelectorAll('.browse_btn')[1].style.backgroundColor = '#fec031';
          //document.querySelectorAll('.browse_btn')[2].style.backgroundColor = '#fec031';
            }
          }
        );
    }
}
