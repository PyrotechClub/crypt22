<?php 
require_once "config.php";
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['code'])) {
    echo "No code provided";
    exit();
}

$discord_code = $_GET['code'];

$payload = [
    'code'=>$discord_code,
    'client_id'=>'997424069781757952',
    'client_secret'=>'3ay5q_CXgm1zXc8-oNaXk4PLyB4FkFyL',
    'grant_type'=>'authorization_code',
    'redirect_uri'=>'http://localhost/crypt22/process-oauth.php',
    'scope'=>'email',
];

print_r($payload);

$payload_string = http_build_query($payload);
$discord_token_url = "https://discord.com/api/oauth2/token";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $discord_token_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($ch);
echo $result;

if(!$result) {
    echo curl_error($ch);
}

$result = json_decode($result, true);
$access_token = $result['access_token'];

$discord_users_url = "https://discord.com/api/users/@me";
$header = array("Authorization: Bearer $access_token", "Content-Type: application/x-www-form-urlencoded");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $discord_users_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($ch);

$result = json_decode($result, true);

$_SESSION["loggedin"] = true;
$_SESSION['userData'] = [
    'name'=>$result['username'],
    'discord_id'=>$result['id'],
    'avatar'=>$result['avatar'],
    'email'=>$result['email'],
];

$register = $logged = false;

print_r($result);

$stmt = $link->prepare("SELECT id FROM users WHERE discord_id = ?");
$stmt->bind_param("i", $param_discord_id);

$param_discord_id = $result['id'];

$stmt->execute();
$stmt->store_result();

print_r($stmt);
if(mysqli_stmt_num_rows($stmt) != 0){
    $logged = true;
    $register = false;
    print_r("Logged in");
} else {
    $stmt1 = $link->prepare("INSERT INTO users (discord_id, username, email, hintca) VALUES (?, ?, ?, ?)");
    $stmt1->bind_param("issi", $param_discord_id, $param_username, $param_email, $param_hintca);

    $param_discord_id = $result['id'];
    $param_username = $result['username'];
    $param_email = $result['email'];
    $param_hintca = 1;
    $logged = 0;

    if($stmt1->execute()){
        $register = true;
        $logged = false;
        print_r("Registered");
        $stmt1->close();
    } else{
        echo "Something went wrong. Please try again.";
    }
}

$stmt->close();
$link->close();

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php if($logged) :?>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-analytics.js";
    import { getAuth, signInWithEmailAndPassword } from 'https://www.gstatic.com/firebasejs/9.9.0/firebase-auth.js';
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
    const authRoot = getAuth(app);
    const emailRegis = <?php echo json_encode($result['username']); ?>;
    const passRegis = <?php echo json_encode($result['id']); ?>;
    console.log('hohoho login');

    const mail = emailRegis.replace(/\W+/g, "") + passRegis + "@cryptatrix.com";
    const pass = passRegis;
    const promise = signInWithEmailAndPassword(authRoot, mail, pass);
    promise.then(function () {
        location.replace("dashboard.php");
    }).catch(function (e) {
        console.log(e);
        location.replace("login.php");
    });

</script>
<?php endif ?>

<?php if($register) :?>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-analytics.js";
    import { getAuth, createUserWithEmailAndPassword } from 'https://www.gstatic.com/firebasejs/9.9.0/firebase-auth.js';
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
    const authRoot = getAuth(app);
    const emailRegis = <?php echo json_encode($result['username']); ?>;
    const passRegis = <?php echo json_encode($result['id']); ?>;
    console.log('hohoho register');

    const mail = emailRegis.replace(/\W+/g, "") + passRegis + "@cryptatrix.com";
    const pass = passRegis;
    const promise = createUserWithEmailAndPassword(authRoot, mail, pass);
    promise.then(function () {
        location.replace("dashboard.php");
    }).catch(function (e) {
        console.log(e);
        location.replace("login.php");
    });
        
</script>
<?php endif ?>