<?php
$username = "root";
$password = "qwerty123";
$dbname = "tetris";
// Create connection
$conn = mysqli_connect("mbahnaf-db-2.cjfaahfgehcs.eu-central-1.rds.amazonaws.com", $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
