<?php
// Database connection parameters
$host = "localhost"; // Change this if your database is hosted elsewhere
$username = "your_username"; // Your database username
$password = "your_password"; // Your database password
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
