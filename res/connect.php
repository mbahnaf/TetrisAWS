<?php
$username = "root";
$password = "bjit1234";
$dbname = "tetris";
// Create connection
$conn = mysqli_connect("samin-db.c5tsce7xtv8b.eu-west-3.rds.amazonaws.com", $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
