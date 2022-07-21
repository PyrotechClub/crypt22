<?php

session_start();

if (!isset($_SESSION['loggedin'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} extract($_SESSION['userData']);
  
require_once "config.php";

//checking if hint card is active
$result = mysqli_query($link, "SELECT hintca FROM users WHERE discord_id =$discord_id");
$result = mysqli_fetch_row($result);
$hintca = $result[0]??null;
//getting user sides solved
$result = mysqli_query($link, "SELECT sides_solved FROM users WHERE discord_id =$discord_id");
$result = mysqli_fetch_row($result);
$sides = $result[0]??null;
//getting user points
$result = mysqli_query($link, "SELECT points FROM users WHERE discord_id =$discord_id");
$result = mysqli_fetch_row($result);
$points = $result[0]??null;

$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg?size=512";

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
        href="https://fonts.googleapis.com/css2?family=Cabin&family=Lato&family=Open+Sans&family=Poiret+One&family=Poppins&family=Raleway&family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="lib/favicon.png">
</head>

<body>

    <div class="mainbod">

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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="play.php">Play</a>
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

        <div class="container-fluid dashboard-wrapper">
            <div class="row dashboard-content">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="dashboard-box user">
                        <img src="<?php echo $avatar_url; ?>" class="user-avatar">
                        <p><span>Username: </span> <?php echo $name; ?></p>
                        <p><span>Email Id: </span> <?php echo $email; ?></p>
                        <p><span>Points: </span> <?php echo $points; ?></p>
                        <?php if($hintca != 0) :?>
                        <p><span>Inventory: </span> 1x Hint Card</p>
                        <?php endif ?>
                        <?php if($hintca == 0) :?>
                        <p><span>Inventory: </span> --</p>
                        <?php endif ?>
                        <p><span>Sides Completed: </span> <?php echo $sides; ?></p>
                        <a class="btn btn-danger" href="play.php"><i class="fa-solid fa-gamepad"></i> Play</a>
                        <a class="btn btn-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                            Logout</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-box timer">
                        <h3>Hunt Starts In</h3>
                        <hr class="dashboard-hr">
                        <p>
                            <span id="days"></span> :
                            <span id="hours"></span> :
                            <span id="mins"></span> :
                            <span id="secs"></span>
                        </p>
                    </div>
                    <div class="dashboard-box shop">
                        <h3>Stuck? Buy a Hint</h3>
                        <p>Only costs 100 points</p>
                        <?php if($hintca != 0) :?>
                        <a class="btn btn-danger disabled">You already have a Hintcard</a>
                        <?php endif ?>
                        <?php if($hintca == 0 and $points >= 100) :?>
                        <form method="post" action="hint.php">
                            <button type="button" class="btn btn-danger"
                                onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();"
                                type="submit">
                                Buy a Hint Card
                            </button>
                        </form>
                        <?php endif ?>
                        <?php if($hintca == 0 and $points < 100) :?>
                        <a class="btn btn-danger disabled">Insufficient Funds :(</a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-1"></div>
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
    <script src="js/count.js"></script>
    <script>

    </script>

</body>

</html>