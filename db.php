<?php
$host = "localhost";
$username = "root";   // default for XAMPP
$password = "";       // default for XAMPP
$database = "hotbeans";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
