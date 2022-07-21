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
                            <a class="nav-link active" href="rules.php">Rules</a>
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

        <div class="container-fluid rules-wrapper">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="rules-content">
                        <h1>Rules</h1>
                        <hr class="rules-hr"><br><br>
                        <h2>General</h2>
                        <ul>
                            <li>All participants must join the <a href="https://discord.gg/vzRYnUgVwq"
                                    target="_blank">discord server</a> for Crypt@trix.</li>
                            <li>This Crypt Hunt will be spanning over 48 hours, commencing on 30th July 2022. All
                                participants will have to try and solve as many stages as possible.</li>
                            <li>If two participants tie up on a level, the one who solved it first would be given a
                                higher rank.</li>
                            <li><b>Any attemt at breaking the platform will lead to a ban and boot from the event and
                                    discord server.</b></li>
                            <li>All participants should read the <a href="format.php" target="_blank">format</a> of the
                                hunt before beginning to get an understanding of the proceedings during the hunt.</li>
                        </ul>
                        <hr class="divider">
                        <h2>Awards</h2>
                        <div class="accordion accordion-flush" id="award-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="award-heading-One">
                                    <button class="accordion-button award-pos pos-1" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#award-pos-1" aria-expanded="false"
                                        aria-controls="award-pos-1">
                                        1st Position
                                    </button>
                                </h2>
                                <div id="award-pos-1" class="accordion-collapse collapse show"
                                    aria-labelledby="award-heading-One" data-bs-parent="#award-accordion">
                                    <div class="accordion-body">
                                        <ul class="three-ul">
                                            <li>kucch toh hai</li>
                                            In addition to
                                            <li>Free <img class="text-logo" src="lib/xyz-logo.png"> domain</li>
                                            <li><img class="text-logo" src="lib/taskade-logo.png"> lifetime
                                                membership</li>
                                            <li>Certificate with rank and name</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="award-heading-Two">
                                    <button class="accordion-button collapsed award-pos pos-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#award-pos2" aria-expanded="false"
                                        aria-controls="award-pos2">
                                        2nd Position
                                    </button>
                                </h2>
                                <div id="award-pos2" class="accordion-collapse collapse"
                                    aria-labelledby="award-heading-Two" data-bs-parent="#award-accordion">
                                    <div class="accordion-body">
                                        <ul class="three-ul">
                                            <li>kucch toh hai</li>
                                            In addition to
                                            <li>Free <img class="text-logo" src="lib/xyz-logo.png"> domain</li>
                                            <li><img class="text-logo" src="lib/taskade-logo.png"> lifetime
                                                membership</li>
                                            <li>Certificate with rank and name</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="award-heading-Three">
                                    <button class="accordion-button collapsed award-pos pos-3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#award-pos-3" aria-expanded="false"
                                        aria-controls="award-pos-3">
                                        3rd Position
                                    </button>
                                </h2>
                                <div id="award-pos-3" class="accordion-collapse collapse"
                                    aria-labelledby="award-heading-Three" data-bs-parent="#award-accordion">
                                    <div class="accordion-body">
                                        <ul class="three-ul">
                                            <li>kucch toh hai</li>
                                            In addition to
                                            <li>Free <img class="text-logo" src="lib/xyz-logo.png"> domain</li>
                                            <li><img class="text-logo" src="lib/taskade-logo.png"> lifetime
                                                membership</li>
                                            <li>Certificate with rank and name</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="award-heading-four">
                                    <button class="accordion-button collapsed award-pos pos-4" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#award-pos-4" aria-expanded="false"
                                        aria-controls="award-pos-3">
                                        Top 10
                                    </button>
                                </h2>
                                <div id="award-pos-4" class="accordion-collapse collapse"
                                    aria-labelledby="award-heading-four" data-bs-parent="#award-accordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Free <img class="text-logo" src="lib/xyz-logo.png"> domain</li>
                                            <li><img class="text-logo" src="lib/taskade-logo.png"> lifetime
                                                membership</li>
                                            <li>Certificate with rank and name</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="award-heading-five">
                                    <button class="accordion-button collapsed award-pos pos-5" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#award-pos-5" aria-expanded="false"
                                        aria-controls="award-pos-5">
                                        All Participants
                                    </button>
                                </h2>
                                <div id="award-pos-5" class="accordion-collapse collapse"
                                    aria-labelledby="award-heading-five" data-bs-parent="#award-accordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><img class="text-logo" src="lib/taskade-logo.png"> lifetime
                                                membership</li>
                                            <li>Certificate of participation with username</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="divider">
                        <h2>Registration</h2>
                        <ul>
                            <li>The event is open for as many participants to register, however <b>multiple accounts by
                                    a single person are not allowed.</b> If caught having multiple accounts, all
                                accounts belonging to that person will be banned.</li>
                        </ul>
                        <hr class="divider">
                        <h2>Hints & Lead Confirmations</h2>
                        <ul>
                            <li>In case the admins feel participants are facing difficulties on a particular level,
                                hints will be released publically totally at the admins discretion.</li>
                            <li>Hints can also be bought on the <a href="dashboard.php">dashboard</a> for 100 points.
                                Upon buying a hint card, participants are required to send a screenshot of the dashboard
                                with a visible timestamp to the admins to redeem their hints.</li>
                            <li>A free hint card is given to everyone upon registration.</li>
                            <li>Admins with the tag 'Leaders' will be confirming leads on discord (a bad pun proundly
                                intended).
                            </li>
                            <li>All important information and hints for this event will be released on the <a
                                    href="https://discord.gg/vzRYnUgVwq" target="_blank">discord server</a>.</li>
                        </ul>
                        <hr class="divider">
                        <h2>Frequently asked questions</h2>
                        <div class="accordion accordion-flush" id="faq-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq-heading-one">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-1" aria-expanded="false" aria-controls="faq-1">
                                        What is a crypt hunt?
                                    </button>
                                </h2>
                                <div id="faq-1" class="accordion-collapse collapse"
                                    aria-labelledby="faq-heading-one" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>
                                        Cryptic hunts are virtual scavenger hunts where the participants are required to hunt the internet for clues, crack ciphers, and reach the final answer for each level.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq-heading-two">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2">
                                        Who can participate in this event?
                                    </button>
                                </h2>
                                <div id="faq-2" class="accordion-collapse collapse"
                                    aria-labelledby="faq-heading-two" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>
                                        Everyone, irrespective of their age or affiliation with an institution, is welcome to participate. You can participate in Crypt@trix even if you are or aren't participating in other events at <a href="https://ordin.teampyro.tech">Ordin@trix 22.0</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq-heading-three">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3">
                                        What are lead confirmations?
                                    </button>
                                </h2>
                                <div id="faq-3" class="accordion-collapse collapse"
                                    aria-labelledby="faq-heading-three" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>
                                        There's a certain period of time in a hunt when you are allowed to ask to moderators if you are on the right track or to validate whatever you have discovered in a level.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq-heading-four">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-4" aria-expanded="false" aria-controls="faq-4">
                                        Can we participate in teams?
                                    </button>
                                </h2>
                                <div id="faq-4" class="accordion-collapse collapse"
                                    aria-labelledby="faq-heading-four" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Only individual participation is allowed. Teaming up is strictly forbidden. If anyone is found sharing answers/hints/leads or collaborating in any other way, it will directly lead to disqualification.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq-heading-five">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-5" aria-expanded="false" aria-controls="faq-5">
                                        How do i register?
                                    </button>
                                </h2>
                                <div id="faq-5" class="accordion-collapse collapse"
                                    aria-labelledby="faq-heading-five" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>
                                            A participant can directly login with their discord account <a href="/crypt22/register.php">here</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
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