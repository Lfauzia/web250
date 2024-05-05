<?php
// Database connection parameters
$servername = "localhost";
$username = "test";
$password = "test";
$database = "relaxation_techniques_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

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

//Create relaxation_techniques table
$sql_create_table = "CREATE TABLE IF NOT EXISTS practices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    yoga_pose VARCHAR(50) NOT NULL,
    favorite_idea VARCHAR(50) NOT NULL,
    oil_fragrance VARCHAR(50) NOT NULL,
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
    notes TEXT,
    date DATE
)";

// Create user_accounts table
$sql_create_account_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(128) NOT NULL,
    lastname VARCHAR(128) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(255) NOT NULL
)";





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

    // Process form submission for user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_registration'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Note: You should hash the password for security purposes before storing it in the database.


    //hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert data into the users table
    $sql_insert_user = "INSERT INTO users (firstname, lastname, email, username, password)
            VALUES ('$firstname', '$lastname', '$email', '$username', '$hashed_password')";

    if ($conn->query($sql_insert_user) === TRUE) {
        echo "<p>New user registered successfully</p>";
    } else {
        echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
    }
}



$conn->close();
?>
