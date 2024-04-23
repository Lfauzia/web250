<?php
// Database connection parameters
$servername = "localhost";
$username = "test";
$password = "test";
$database = "relaxation_techniques_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($database);

// Create relaxation_techniques table
$sql_create_table = "CREATE TABLE IF NOT EXISTS practices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    yoga_pose VARCHAR(50) NOT NULL,
    favorite_idea VARCHAR(50) NOT NULL,
    oil_fragrance VARCHAR(50) NOT NULL,
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
    notes TEXT,
    date DATE
)";

// if ($conn->query($sql_create_table) === TRUE) {
//     echo "Table practices created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $yoga_pose = $_POST['yoga_pose'];
    $favorite_idea = $_POST['favorite_idea'];
    $oil_fragrance = $_POST['oil_fragrance'];
    $difficulty = $_POST['difficulty'];
    $notes = $_POST['notes'];
    $date = date('Y-m-d');

    // Insert data into the relaxation techniques table
    $sql_insert = "INSERT INTO practices (id, yoga_pose, favorite_idea, oil_fragrance, difficulty, notes, date)
            VALUES ('$id', '$yoga_pose', '$favorite_idea', '$oil_fragrance', '$difficulty', '$notes', '$date')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
