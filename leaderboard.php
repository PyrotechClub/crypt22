<?php

session_start();


require_once "config.php";


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
                            <a class="nav-link" href="play.php">Play</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rules.php">Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="leaderboard.php">Leaderboard</a>
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

        <div class="container-fluid leaderboard-wrapper">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="leaderboard-content">
                        <h1>Leaderboard</h1>
                        <hr class="leaderboard-hr"><br><br>

                        <div class="table-responsive">
                            <?php 
                                $result = mysqli_query($link,"SELECT username, points, timest FROM users ORDER BY points DESC, timest ASC");
                                echo "
                                <table class='table leaderboard table-borderless'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Rank</th>
                                            <th scope='col'>Username</th>
                                            <th scope='col'>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope='row'>0</td>
                                            <td>Pyrotech</td>
                                            <td>&infin;</td>
                                        </tr> "; 
                                    $rowNumber = 0;
                                    while($row = mysqli_fetch_array($result)){
                                        $rowNumber++;
                                    echo "<tr>";
                                        echo "<td scope='row'>" . $rowNumber . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>". $row['points'] . "</td>";
                                    echo "</tr>";
                                } 
                                echo "
                                    </tbody>
                                </table>
                                ";
                            ?>
                        </div>
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

</body>

</html>