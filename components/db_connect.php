<?php
// Database connection parameters
$host = "localhost"; // Change this if your database is hosted elsewhere
$username = "checkme"; // Your database username
$password = "$uper$ecret"; // Your database password
$database = "your_database"; // Your database name

// Create connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Set character set to utf8 (optional)
$mysqli->set_charset("utf8");
?>
