<?php
    session_start();
    $_SESSION["errRegMessage"] = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require "res/connect.php";
        if (isset($_POST['logoutbutton'])){
            $_SESSION["loggedin"] = FALSE;
            $_SESSION["user"] = null;
        }

        if (isset($_POST['loginbutton'])){
            $username = $_POST['username'];
            $password = $_POST['password'];            
            $sql = "SELECT * FROM Users WHERE Username = '".$username."' AND Password = '".$password."'";
            $user = mysqli_query($conn,$sql);
            if (mysqli_num_rows($user) > 0){
                $_SESSION["user"] =  $username;
                $_SESSION["loggedin"] = TRUE;
            }
            else{
                $passwordErr = "Username or Password incorrect.";
            }
        }

        if (isset($_POST['regbutton'])){
            //username has to be unique...
            //passwords have to match
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uname'];
            $pword = $_POST['pword'];
            $confpword = $_POST['confpword'];
            $displayString = $_POST['display'];

            $valid = TRUE;


            $select = mysqli_query($conn, "SELECT * FROM Users WHERE Username = '$uname'");
            if(mysqli_num_rows($select)) {
                $_SESSION["errRegMessage"] .= "- Username is already taken. <br>";
                $valid = FALSE;
            }

            if ($pword != $confpword){
                $_SESSION["errRegMessage"] .= "- Passwords did not match. <br>";
                $valid = FALSE;
            }

            if (!$valid){ 
                ?>
                <meta http-equiv="Refresh" content="0; url='register.php'" />
                <?php
            }

            if (isset($fname) && isset($lname) && 
                isset($uname) && isset($pword) && 
                isset($confpword) && ($valid) && 
                isset($displayString)){

                    $display = 0;
                    if ($displayString == "yes"){
                        $display = 1;
                    }
                    $sql = "INSERT INTO Users (Username, FirstName, LastName, Password, Display) 
                    VALUES ('$uname', '$fname', '$lname', '$pword', '$display')";
                    if ( mysqli_query($conn, $sql) ) {          //try catch
                        echo "New user added successfully";
                    } 
                    else {
                        $_SESSION["errRegMessage"] = "There was an error registering to the database";
                        ?>
                        <meta http-equiv="Refresh" content="0; url='register.php'" />
                        <?php
                    }
                    mysqli_close($conn);
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="res\style.css">
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a class="active" href="index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="leaderboard.php">Leaderboard</a></li>
    </ul>

    <div class="main">
    <div class="greydiv">
        <h1>
            Welcome to Tetris
        </h1>
        <?php
        if ($_SESSION["loggedin"]){ ?>
          <a href="tetris.php" class="playbutton">Click here to play!</a>
          <br>
          <br>

          <form action="/index.php" method="post">
                <input type="submit" name="logoutbutton" ID="logout" value="Logout">
            </form>
        <?php }
        else{ ?>
            <form action="/index.php" method="post">
                <label for="username">Username:  </label><br>
                <input type="text" id="username" name="username" placeholder="username" required="required"><br>
                <label for="password">Password:  </label><br>
                <input type="password" id="password" name="password" placeholder="password" required="required"><br>
                <span class="error"> <?php echo $passwordErr;?></span><br>
                <input type="submit" name="loginbutton" value="Submit">
            </form>
            <p>
            Don't have a user account? <a href="register.php">Register now</a>
            </p>
        <?php }
        ?>



    </div>
    </div>
</body>
</html>
