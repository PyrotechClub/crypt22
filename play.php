<?php

session_start();

if (!isset($_SESSION['loggedin'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} extract($_SESSION['userData']);
  
require_once "config.php";

$result = $link->query("SELECT die_side, levels_solved, sides_solved FROM users WHERE discord_id = $discord_id");
$result = mysqli_fetch_row($result);
$dieside = $result[0]??null;
$levels_solved = $result[1]??null;
$levels_no = strlen($levels_solved)/2;
$sidessolved = $result[2]??null;
$sidessolved = str_split($sidessolved);
if($dieside != 0 and  $levels_no % 4 != 0){
    header('location: lvlselect.php');
}
$sides_available = array('a', 'b', 'c', 'd', 'e');
$sides_available = array_diff($sides_available, $sidessolved);

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    $random_side = array_rand($sides_available) + 1;

    $stmt1 = $link->prepare("UPDATE users SET die_side = ? WHERE discord_id = ?");
    $stmt1->bind_param("ii", $random_side, $discord_id);
    if($stmt1->execute()){
        header('location: lvlselect.php');
    } else{
        echo "Something went wrong. Please try again.";
    }
    $stmt1->close();
}

$link->close();
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
                        <h1>Play</h1>
                        <div class="cube-container">
                            <model-viewer camera-controls src="lib/cube.glb" style="background-color: unset;"
                                camera-orbit="-29.18deg 65.58deg auto">
                            </model-viewer>
                        </div>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="dice-form">
                            <button type="button" class="btn btn-danger"
                                onclick="roll()"
                                type="submit">
                                <i class="fa-solid fa-dice-d6"></i> Roll the dice
                            </button>
                        </form>
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
    <script>
        function roll() {
            $(".cube-container model-viewer").addClass("roll");
            setTimeout(function () {
                $(".dice-form").submit();
            }, 1500);
        }
    </script>

</body>

</html>