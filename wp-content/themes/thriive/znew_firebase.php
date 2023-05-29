<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-storage.js"></script>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDVc2ehz2IuYBk-w2SP_TSIcfE3hutsf98",
    authDomain: "new-one-2605a.firebaseapp.com",
    projectId: "new-one-2605a",
    storageBucket: "new-one-2605a.appspot.com",
    messagingSenderId: "600707559068",
    appId: "1:600707559068:web:7ad11af2ae0f4208cb4759",
    measurementId: "G-KZNDP1TFEJ"
  };

  // Initialize Firebase
firebase.initializeApp(firebaseConfig);
let firestoreDB = firebase.firestore();
let storage = firebase.storage();
//let storageRef = storage.ref();
//let chatUploadsRef = storageRef.child("chat-uploads");

firestoreDB.collection('online_consultation').get().then((snapshot)=>{
  console.log(snapshot);
});

</script>