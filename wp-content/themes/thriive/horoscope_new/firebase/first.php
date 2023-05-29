<script type="module" src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-storage.js"></script>
<script>
	// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
//import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyD2FP1evAtrtUpSeUwfNB8EwB99uJJAQZw",
  authDomain: "thriive-4bbd3.firebaseapp.com",
  databaseURL: "https://thriive-4bbd3-default-rtdb.firebaseio.com",
  projectId: "thriive-4bbd3",
  storageBucket: "thriive-4bbd3.appspot.com",
  messagingSenderId: "228923631497",
  appId: "1:228923631497:web:6b71a8d7b360c27c87a358",
  measurementId: "G-3E78629LN0"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
</script>