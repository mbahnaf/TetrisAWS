<?php
$username = "tetris";
$password = "tetrispass";
$dbname = "tetris";
// Create connection
$conn = mysqli_connect("192.168.56.110", $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
