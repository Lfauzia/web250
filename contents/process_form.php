<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        // Get form data
        $yoga = $_POST['yoga'];
        $favorite = $_POST['favorite'];
        $oil = $_POST['oil'];
        $difficulty = $_POST['difficulty'];
        $notes = $_POST['notes'];
        $date = $_POST['date'];

        // Append the new data to the sample data array
        $new_data = array($_SESSION['username'], $yoga, $favorite, $oil, $difficulty, $notes, $date);

        // Display the new data in the table
        echo "<tr>";
        foreach ($new_data as $value) {
            echo "<td style='padding: 8px; border: 1px solid #000;'>$value</td>";
        }
        echo "</tr>";
    } else {
        // If not logged in, redirect to the login page
        header("Location: login.php");
        exit(); // Terminate the script to prevent further execution
    }
}
?>
