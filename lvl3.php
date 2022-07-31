<?php

session_start();

if (!isset($_SESSION['loggedin'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} extract($_SESSION['userData']);
  
require_once "config.php";

$result = $link->query("SELECT die_side, levels_solved FROM users WHERE discord_id = $discord_id");
$result = mysqli_fetch_row($result);
$dieside = $result[0]??null;
$levels_solved = $result[1]??null;
$levels_no = strlen($levels_solved);
$file = fopen("admin/log/" . $discord_id .  ".txt", "a");

$error = '';

if($dieside == 0){
    header('location: play.php');
} else if($levels_no % 4 == 0 and $levels_no > 0){
    header('location: lvlselect.php');
} else if($dieside == 6){
    header('location: lvl6.php');
} else if(strpos($levels_solved, "c") !== false){
    header('location: lvlselect.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer="";
    if (empty($_POST["answer"])) {
        $error = "<p class='text-danger'>Answer is required</p>";
    } else {
        $answer = str_replace(' ', '', strtolower($_POST["answer"]));
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s', time());
        $log = $answer . " ". $time . "\n";
        fwrite($file, "Side " . $dieside . ", Level 3" . "\n");
        fwrite($file, $log);
        fclose($file);
    }
    
    if ($answer == "interstellar" and $dieside == 3) {
        $levels_solved = $levels_solved . "c";
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s', time());
        $stmt = $link->prepare("UPDATE users SET points = points + 200, levels_solved = ?, timest = ? WHERE discord_id = ?");
        $stmt -> bind_param("ssi", $levels_solved, $time, $discord_id);
        // execute the query
        $stmt->execute();
        $stmt->close();
        header('location: lvlselect.php');
    } elseif ($answer == "drjekyll" and $dieside == 1) {
        $levels_solved = $levels_solved . "c";
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s', time());
        $stmt = $link->prepare("UPDATE users SET points = points + 200, levels_solved = ?, timest = ? WHERE discord_id = ?");
        $stmt -> bind_param("ssi", $levels_solved, $time, $discord_id);
        // execute the query
        $stmt->execute();
        $stmt->close();
        header('location: lvlselect.php');
    } elseif ($answer == "pabloescobar" and $dieside == 2) {
        $levels_solved = $levels_solved . "c";
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s', time());
        $stmt = $link->prepare("UPDATE users SET points = points + 200, levels_solved = ?, timest = ? WHERE discord_id = ?");
        $stmt -> bind_param("ssi", $levels_solved, $time, $discord_id);
        // execute the query
        $stmt->execute();
        $stmt->close();
        header('location: lvlselect.php');
    } elseif ($answer == "oscarwilde" and $dieside == 4) {
        $levels_solved = $levels_solved . "c";
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s', time());
        $stmt = $link->prepare("UPDATE users SET points = points + 200, levels_solved = ?, timest = ? WHERE discord_id = ?");
        $stmt -> bind_param("ssi", $levels_solved, $time, $discord_id);
        // execute the query
        $stmt->execute();
        $stmt->close();
        header('location: lvlselect.php');
    } elseif ($answer == "9d" and $dieside == 4) {
        $error = "<p class='text-danger'>Man is least himself when he talks in his own person. Give him a mask, and he will tell the truth.</p>";
    } elseif ($answer == "immigrantsong" and $dieside == 5) {
        $levels_solved = $levels_solved . "c";
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s', time());
        $stmt = $link->prepare("UPDATE users SET points = points + 200, levels_solved = ?, timest = ? WHERE discord_id = ?");
        $stmt -> bind_param("ssi", $levels_solved, $time, $discord_id);
        // execute the query
        $stmt->execute();
        $stmt->close();
        header('location: lvlselect.php');
    } else {
        $error = "<p class='text-danger'>Wrong answer</p>";
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
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin&family=Lato&family=Open+Sans&family=Uchen&family=Poiret+One&family=Poppins&family=Raleway&family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="lib/favicon.png">
</head>

<body>
    <?php if ($dieside == 1): ?>
    <link href='css/1.css' rel='stylesheet' type='text/css'>
    <?php endif; ?>
    <?php if ($dieside == 2): ?>
    <link href='css/2.css' rel='stylesheet' type='text/css'>
    <?php endif; ?>
    <?php if ($dieside == 3): ?>
    <link href='css/3.css' rel='stylesheet' type='text/css'>
    <?php endif; ?>
    <?php if ($dieside == 4): ?>
    <link href='css/4.css' rel='stylesheet' type='text/css'>
    <?php endif; ?>
    <?php if ($dieside == 5): ?>
    <link href='css/5.css' rel='stylesheet' type='text/css'>
    <?php endif; ?>

    <div class="mainbod lvls-page">

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img class="d-inline-block align-text-top nav-logo"
                        src="lib/nav-logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="play.php">Play</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rules.php">Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="leaderboard.php">Leaderboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="resources.php">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://discord.gg/vzRYnUgVwq">Join the Discord</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid play-wrapper">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="play-content">

                        <?php if ($dieside == 3): ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="inbox-left">
                                    <div class="nav">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                Compose Mail
                                            </li>
                                            <li class="nav-item active">
                                                <a href="play.php">Inbox (<?php echo 4 - $levels_no; ?>)</a>
                                            </li>
                                            <li class="nav-item">
                                                All Mail
                                            </li>
                                            <li class="nav-item">
                                                Spam
                                            </li>
                                            <li class="nav-item">
                                                <i class="fa-solid fa-trash-can"></i> &nbsp;
                                                <i class="fa-solid fa-book-bookmark"></i> &nbsp;
                                                <i class="fa-solid fa-address-book"></i> &nbsp;
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="inbox">
                                    <div class="tab-content">
                                        <div class="inbox-body">
                                            <span onclick="window.location.reload()" class="inbox-top-a">Refresh</span>
                                            <b class="right">3 of 4</b>
                                            <div class="inbox-item">
                                                <div class="inbox-item-head">
                                                    <h1 class="lvlno">Level 3</h1>
                                                    <small><i class='fa-regular fa-star'></i> <b>Crypt@trix</b>
                                                        &lt;cryptatrix@gmail.com&gt;</small><br><br>
                                                    <p class="lvltext">Feel like screaming?</p>
                                                    <!-- BhRCYr5 -->
                                                </div>
                                                <div class="inbox-item-body">
                                                    <small>Quick Reply</small><br>
                                                    <small><b>To:</b> &lt;cryptatrix@gmail.com&gt;</small>
                                                    <form method="post"
                                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                        <input type="text" class="form-control" id="answer"
                                                            name="answer" placeholder="Enter your answer here"><br>
                                                        <?php echo $error ?>
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <b class="right">3 of 4</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php elseif ($dieside == 5): ?>
                        <div class="playlist">
                            <div class="tab-content">
                                <div class="playlist-body">
                                    <span onclick="window.location.replace('play.php')" class="playlist-top-a"><i
                                            class="fa-solid fa-chevron-left"></i> Back</span>
                                    <b class="right">3 of 4</b>
                                    <div class="playlist-item">
                                        <div class="playlist-item-head">
                                            <h1 class="lvlno">Level 3</h1>
                                            <p class="lvltext">nevaeh ot yawriats</p>
                                        </div>
                                        <div class="playlist-item-body">
                                            <form method="post"
                                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <input type="text" class="form-control" id="answer" name="answer"
                                                    placeholder="Enter your answer here"><br>
                                                <?php echo $error ?>
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <b class="right">3 of 4</b>
                                </div>
                            </div>
                        </div>

                        <?php else: ?>
                        <div class="play-box">
                            <h1 class="lvlno">Level 3</h1>
                            <?php if($dieside == 1): ?>
                            <p class="lvltext">
                                <img src="lib/avgn.png" alt="avgn">
                            </p>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="text" class="form-control" id="answer" name="answer"
                                    placeholder="Enter your answer here"><br>
                                <?php echo $error ?>
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </form>
                            <?php endif;?>
                            <?php if($dieside == 2): ?>
                            <p class="lvltext">Money isn't the only thing he burns</p>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="text" class="form-control" id="answer" name="answer"
                                    placeholder="Enter your answer here"><br>
                                <?php echo $error ?>
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </form>
                            <?php endif;?>
                            <?php if($dieside == 4): ?>
                            <p class="lvltext">
                                <img src="lib/time.png" alt="time">
                            </p>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="text" class="form-control" id="answer" name="answer"
                                    placeholder="Enter your answer here"><br>
                                <?php echo $error ?>
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </form>
                            <?php endif;?>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="footer container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="footer-content">
                        <div class="footer-links">
                            <a href="index.php">Home</a>
                            |
                            <a href="login.php">Login</a>
                            |
                            <a href="play.php">Play</a>
                            |
                            <a href="rules.php">Rules</a>
                            |
                            <a href="leaderboard.php">Leaderboard</a>
                            |
                            <a href="resources.php">Resources</a>
                        </div>
                        <div class="footer-copy">
                            © Pyrotech Club 2022
                        </div>
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
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</body>

</html>