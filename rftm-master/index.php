<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Official website of the Instagram fanpage followed worldwide: @rogerfedererthemaster. Click to get all the information about Roger Federer!">
    <link rel="stylesheet" href="style.css"/>
    <title>Roger Federer the Master | Official Website</title>
    <link rel="icon" type="image/png" sizes="16x16" href="Images/Onglet/logoTab2.png">
    <link rel="apple-touch-icon" href="Images/RFTM6.png">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- https://getbootstrap.com/docs/4.0/components/alerts/ -->
</head>


<body class="bodyHome">
<?php include("entete.php"); ?>

<?php
if (isset($_GET['newsletter'])) {

    if ($_GET['newsletter'] == 1)
        echo '<script>alert("This email adress is already registered.")</script>';
    if ($_GET['newsletter'] == 2)
        //echo "<p style='color:#22ff00; text-align: center; font-size: 20px;font-weight: bold'><br>Signed up!</p>";
        echo '<script>alert("Subscription to the newsletter is registered.")</script>';
} ?>

<div class="container mt-5" style="color: rgb(255, 255, 255);">
    <div class="row" style="border-left: 2px solid;">
        <div class="col-sm-2">
            <img src="Images/RogerFedererPNG.png" width="170px">
        </div>

        <div class="col-sm-4">
            <p style="font-size: 16px;"><br>
                <b>Name:</b> Roger Federer<br>
                <b>Nationality:</b> Switzerland<br>
                <b>Age:</b> 41 (1981.08.08)<br>
                <b>ATP Ranking:</b> Retired<br>
                <b>Grand Slams:</b> 20<br>
                <b>Masters 1000:</b> 28<br>
                <b>Titles:</b> 103<br>
                <b>Plays:</b> Right-Handed, One-Handed Backhand<br>
                <b>Coach:</b> Severin Lüthi, Ivan Ljubičić<br>
            </p>
        </div>

        <div class="col-sm-1"></div>

        <div class="col-sm-5">
            <a href="https://www.instagram.com/rogerfedererthemaster/" target="_blank">
                <img src="Images/screen2.png" width="350px" id="screen">
            </a>
        </div>
    </div>
</div>

<div class="container mt-5" style="color: rgb(255, 255, 255);">
    <div class="row">

        <div class="col-sm-3" id="welcomeAll">
            <h3>Welcome all!</h3>
            <p>
                More than three years ago, I started to share pictures of my idol Roger Federer on Instagram.
                As of today, more than 85,000 fans have joined the community by subscribing to my fanpage.<br>
                Be a part of it too!
            </p>
        </div>

        <div class="col-sm-4" id="lastMatches">
            <h3>Last matches</h3>
            <ul>
                <?php include("getLastMatches.php"); ?>
            </ul>
            <p>> More results on
                <a href="https://www.flashscore.com/player/federer-roger/GrsQDFC0/results/" target="_blank">
                    <img src="Images/Logos/logoFlashscore.png" width="20px">
                    <u>Flashscore</u>
                </a>
            </p>
        </div>

        <div class="col-sm-5" id="nextTournaments">
            <h3>Next tournaments</h3>
            <ul>
                <?php include("getTournaments.php"); ?>
            </ul>
            <p>&#9989 <i>He will play</i> | &#10067 <i>No information</i> | &#10060 <i>He will not play</i></p>
        </div>
    </div>
</div>


<?php include("footer.php"); ?>
</body>

</html>