<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-analytics.js";
    import { getAuth, signOut } from "firebase/auth";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCMsObpR0OV7jO3HsEwGfBOB_dl6rIaYbs",
        authDomain: "crypt-22-a848b.firebaseapp.com",
        databaseURL: "https://crypt-22-a848b-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "crypt-22-a848b",
        storageBucket: "crypt-22-a848b.appspot.com",
        messagingSenderId: "376947123469",
        appId: "1:376947123469:web:1447960a0ef768a7103c44",
        measurementId: "G-Q0HWKGXX8L"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const authRoot = getAuth(firebaseApp);
    const promise = signOut(auth);
    promise.then(function () {
        console.log('logged out');
        <?php header("location: login.php");?>
    }).catch(function (e) {
        console.log(e);
        <?php header("location: dashboard.php");?>
    });
        
</script>