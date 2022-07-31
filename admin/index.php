<?php

session_start();
  
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u574663510_root');
define('DB_PASSWORD', 'UrMotherG4e');
define('DB_NAME', 'u574663510_crypt22');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Error logs
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/log.txt');
error_reporting(E_ALL);

$input_id = '';
$error = '';

if(isset($_POST['info'])) {
    $input_id = $_POST['discord_id'];
}
if(isset($_POST['hint'])) {
    $input_id = $_POST['discord_id'];
    if(empty($input_id)) {
        $error = "<p><span>Please enter a Discord ID</span></p>";
    } else {
        $sql = "UPDATE users SET hintca = 0 WHERE discord_id = $input_id";
        // Prepare statement
        $stmt = $link->prepare($sql);
        // execute the query
        $stmt->execute();

        $stmt->close();
    }
}
if(isset($_POST['log'])) {
    $input_id = $_POST['discord_id'];
    if(empty($input_id)) {
        $error = "<p><span>Please enter a Discord ID</span></p>";
    } else {
        header ("Location: log/$input_id.txt");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypt@trix 22.0</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin&family=Lato&family=Open+Sans&family=Poiret+One&family=Poppins&family=Raleway&family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/lib/sharesuspeare.png">
</head>

<body>

    <div class="mainbod">

        <div class="container-fluid admin-wrapper">
            <div class="row admin-content">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <center>
                        <img src="/lib/sharesuspeare.png" class="admin-home-img">
                    </center>
                </div>
                <div class="col-md-8">
                    <div class="admin-box">
                        <h3>Get user info</h3>
                        <form method="post">
                            <input type="text" name="discord_id" id="hint-id" placeholder="Discord ID"><br><br>
                            <input type="submit" name ="info" value="Get info" class="btn btn-danger">
                            <input type="submit" name ="hint" value="Remove Hint card" class="btn btn-danger">
                            <input type="submit" name ="log" value="Download logs file" class="btn btn-danger">
                            <input type="submit" name ="clear" value="Clear" class="btn btn-danger"><br><br>
                            <?php echo $error; ?>
                        </form>
                        
                        <div class="table-responsive">
                            <?php 
                            if ($input_id == '') {} 
                            else {
                                $result = mysqli_query($link,"SELECT * FROM users WHERE discord_id = $input_id");
                                echo "
                                <table class='table admin-table table-borderless'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Username</th>
                                            <th scope='col'>Discord Id</th>
                                            <th scope='col'>Email Id</th>
                                            <th scope='col'>Points</th>
                                            <th scope='col'>Side</th>
                                            <th scope='col'>Sides Completed</th>
                                            <th scope='col'>Hint available</th>
                                        </tr>
                                    </thead>
                                    <tbody> "; 
                                    while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td scope='row'>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['discord_id'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['points'] . "</td>";
                                        echo "<td>" . $row['die_side'] . "</td>";
                                        echo "<td>" . $row['sides_solved'] . "</td>";
                                        echo "<td>" . $converted_res = $row['hintca'] ? 'Yes' : 'No' . "</td>";
                                    echo "</tr>";
                                } 
                                echo "
                                    </tbody>
                                </table>
                                ";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="admin-box timer">
                    <h3>Hunt Ends In</h3>
                    <hr class="admin-hr">
                    <p>
                        <span id="days"></span> :
                        <span id="hours"></span> :
                        <span id="mins"></span> :
                        <span id="secs"></span>
                    </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/552124b7dc.js" crossorigin="anonymous"></script>
    <script>
        // COUNT-DOWN

        var myfunc = setInterval(function () {
            var countDownDate = new Date("Aug 1, 2022 00:00:00").getTime();
            var now = new Date().getTime();
            var timeleft = countDownDate - now;
            var distance = countDownDate - now;
            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
            document.getElementById("days").innerHTML = days
            document.getElementById("hours").innerHTML = hours
            document.getElementById("mins").innerHTML = minutes
            document.getElementById("secs").innerHTML = seconds
            if (timeleft < 0) {
                clearInterval(myfunc);
                document.getElementById("days").innerHTML = ""
                document.getElementById("hours").innerHTML = ""
                document.getElementById("mins").innerHTML = ""
                document.getElementById("secs").innerHTML = "";
            }
        }, 1000);
    </script>

</body>

</html>