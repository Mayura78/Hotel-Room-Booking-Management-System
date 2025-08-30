<?php
$servername = "localhost"; // usually localhost
$username   = "root";      // mysql username (change if needed)
$password   = "";          // mysql password (change if needed)
$database   = "hotelbookingmanagement";  // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
