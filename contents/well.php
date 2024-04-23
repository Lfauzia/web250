<?php
session_start();
$is_loggedin = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaxation Techniques and Wellness Practices</title>
</head>
<body>

<h2>Share Your Relaxation Techniques and Wellness Practices</h2>

<?php
// Include db_connect.php
include 'db_connect.php';

// Function to display the form for adding a new relaxation technique
function displayAddForm() {
    global $is_loggedin;
    // Check if the user is logged in
    if ($is_loggedin) {
        // If logged in, display the form
        ?>
        <form method="post" action="components/db_connect.php">
            <label for="user_id">User ID:</label><br>
            <input type="number" id="user_id" name="user_id" required><br><br>

            <label for="yoga_pose">Yoga Pose:</label><br>
            <select id="yoga_pose" name="yoga_pose" required>
                <option value="Balasana">Balasana</option>
                <option value="Cat Pose">Cat Pose</option>
                <option value="Supine Twist">Supine Twist</option>
                <option value="Cow Pose">Cow Pose</option>
            </select><br><br>

            <label for="favorite_idea">Favorite Relaxation Idea:</label><br>
            <select id="favorite_idea" name="favorite_idea" required>
                <option value="Focus on your breathing">Focus on your breathing</option>
                <option value="Spend time in nature">Spend time in nature</option>
                <option value="Picture yourself somewhere serene">Picture yourself somewhere serene</option>
                <option value="Listen to music">Listen to music</option>
            </select><br><br>

            <label for="oil_fragrance">Essential Oils Fragrance:</label><br>
            <select id="oil_fragrance" name="oil_fragrance" required>
                <option value="Clary Sage">Clary Sage</option>
                <option value="Sandalwood">Sandalwood</option>
                <option value="Lavender">Lavender</option>
                <option value="Roman Chamomile">Roman Chamomile</option>
            </select><br><br>

            <label for="difficulty">Difficulty:</label><br>
            <input type="radio" id="easy" name="difficulty" value="easy" required>
            <label for="easy">Easy</label><br>
            <input type="radio" id="medium" name="difficulty" value="medium">
            <label for="medium">Medium</label><br>
            <input type="radio" id="hard" name="difficulty" value="hard">
            <label for="hard">Hard</label><br><br>

            <label for="notes">Notes:</label><br>
            <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
        <?php
    } else {
        // If not logged in, redirect to the login page
        header("Location: login.php"); // Replace 'login.php' with the actual URL of your login page
        exit(); // Terminate the script to prevent further execution
    }
}

// Function to display the table of relaxation techniques
function displayTechniquesTable() {
    // Display your table here
}

// Display the techniques table
displayTechniquesTable();

// Display the add form
displayAddForm();
?>

</body>
</html>
