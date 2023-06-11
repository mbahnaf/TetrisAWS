<?php
session_start();
$_SESSION["errRegMessage"] = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['score']) && isset($_SESSION["user"])){
        $uname = $_SESSION["user"];
        $score = $_POST['score'];
        require "res/connect.php";
        $sql = "INSERT INTO Scores (Username, Score) 
        VALUES ('$uname', '$score')";

        if ( mysqli_query($conn, $sql) ) {
            echo "New user added successfully";
        } 
        else {
            echo "Error: ". mysqli_error($conn);
        }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" type="text/css" href="res\style.css">
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a href="index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a class="active"href="leaderboard.php">Leaderboard</a></li>
    </ul>
    
    <div class="main">
        <div class="greydiv">
            <h1>Leaderboard</h1>
            <table class = "results">
                <tr>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
                <?php
                    require "res/connect.php";
                    $sql = "SELECT Scores.Username, Score, Display FROM Scores, Users WHERE Scores.Username = Users.Username ORDER BY Score DESC";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['Display']){
                                echo "<tr>";
                                    echo "<td>" . $row['Username'] . "</td>";
                                    echo "<td>" . $row['Score'] . "</td>";
                                echo "</tr>";
                                }
                            }
                        }
                    mysqli_close($conn);
                ?>
            </table>
    </div>
    </div>
</body>
</html>