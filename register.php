<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="res\style.css">
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a href="index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">
        <div class="greydiv">
            <h1>
                Registration
            </h1>
            <?php
            if (!empty($_SESSION["errRegMessage"])){
                $err = $_SESSION["errRegMessage"];

                echo "<p class='error'> $err </p>";
                ?>

                <?php
            }
            ?>
            <form action="/index.php" method="post">

                <label for="firstname">First Name:</label><br>
                <input type="text" id="firstname" name="fname" placeholder="First name" required="required"><br>

                <label for="lastname">Last Name:</label><br>
                <input type="text" id="lastname" name="lname" placeholder="Last name" required="required"><br>

                <label for="username">Username:</label><br>
                <input type="text" id="username" name="uname" placeholder="Username" required="required"><br>

                <label for="pass">Password:</label><br>
                <input type="password" id="pass" name="pword" placeholder="Password" required="required"><br>

                <label for="confirmpassword">Confirm password:</label><br>
                <input type="password" id="confirmpassword" name="confpword" placeholder="Confirm password" required="required"><br>

                <p>Display Scores on Leaderboard:</p>
                <input type="radio" id="dodisplay" name="display" value="yes" required="required">
                <label for="dodisplay">Yes</label><br>
                <input type="radio" id="dontdisplay" name="display" value="no" required="required">
                <label for="dontdisplay">No</label><br> 
                <input type="submit" name="regbutton" value="Submit">
            </form>
            <br></br>
            <a href="index.php">Go Back</a>
        </div>
    </div>
</body>
</html>