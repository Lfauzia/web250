<h2> Wellness practices </h2>
<img src="images/2.png" alt="image 2">
<br><br>

<?php
session_start();
include '../components/db_connect.php';

$is_loggedin = isset($_SESSION['username']);

// Initialize sample data array if not already set in session
// if (!isset($_SESSION['sample_data'])) {
//     $_SESSION['sample_data'] = array();
// }

// Function to display the form for adding a new relaxation technique
function displayAddForm() {
    global $is_loggedin;
    // Check if the user is logged in
    if ($is_loggedin) {
        // If logged in, display the form
        ?>
        <form action="index.php?page=well" method="post">
            <label for="yoga">Yoga Pose:</label>
            <select id="yoga" name="yoga" required>
                <option value="Balasana">Balasana</option>
                <option value="Cat Pose">Cat Pose</option>
                <option value="Supine Twist">Supine Twist</option>
                <option value="Cow Pose">Cow Pose</option>
            </select><br>
            <label for="favorite">Favorite Relaxation Idea:</label>
            <select id="favorite" name="favorite" required>
                <option value="Focus on your breathing">Focus on your breathing</option>
                <option value="Spend time in nature">Spend time in nature</option>
                <option value="Picture yourself somewhere serene">Picture yourself somewhere serene</option>
                <option value="Listen to music">Listen to music</option>
            </select><br>
            <label for="oil">Essential Oils Fragrance:</label>
            <select id="oil" name="oil" required>
                <option value="Clary Sage">Clary Sage</option>
                <option value="Sandalwood">Sandalwood</option>
                <option value="Lavender">Lavender</option>
                <option value="Roman Chamomile">Roman Chamomile</option>
            </select><br>
            <label for="difficulty">Difficulty:</label>
            <select id="difficulty" name="difficulty" required>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select><br>
            <label for="notes">Notes:</label><br>
            <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>
            <input type="submit" name="add_technique" value="Add Technique">
        </form>
        <?php
    } else {
        // If not logged in, redirect to the login page
        header("Location: login.php"); 
        exit(); // Terminate the script to prevent further execution
    }
}

// Function to display the table of relaxation techniques
function displayTechniquesTable() {
    global $is_loggedin, $conn;
    ?>
    <?php if ($is_loggedin): ?>
        <?php displayAddForm(); ?>
    <?php else: ?>
        <p>You must be logged in to add a new relaxation technique.</p>
    <?php endif; ?>

    <h3>Recent Relaxation Posts </h3>
    <table style="width: 100%; border-collapse: collapse; border: 1px solid #000;">
        <thead>
            <tr style="background-color: #f0f0f0;">
                <th style="padding: 8px; border: 1px solid #000;">User ID</th>
                <th style="padding: 8px; border: 1px solid #000;">Yoga Pose</th>
                <th style="padding: 8px; border: 1px solid #000;">Favorite Relaxation Idea</th>
                <th style="padding: 8px; border: 1px solid #000;">Essential Oils Fragrance</th>
                <th style="padding: 8px; border: 1px solid #000;">Difficulty</th>
                <th style="padding: 8px; border: 1px solid #000;">Notes</th>
                <th style="padding: 8px; border: 1px solid #000;">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $my_user = $_SESSION['username'];
                // require_once '../components/db_connect.php';
                // Retrieve user_id from user table
                $sql = "SELECT * FROM users WHERE username = '$my_user'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $user_id = $user["id"];
                echo"$user_id ";
            
                // Query to retrieve user's relaxation techniques from the database
                $sql_select = "SELECT * FROM practices WHERE id = '$user_id'";
                $result = $conn->query($sql_select);

                if( $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // Display each column value
                        // Adjust column names according to your database structure
                        echo "<td>{$row['user_id']}</td>";
                        echo "<td>{$row['yoga_pose']}</td>";
                        echo "<td>{$row['favorite_idea']}</td>";
                        echo "<td>{$row['oil_fragrance']}</td>";
                        echo "<td>{$row['difficulty']}</td>";
                        echo "<td>{$row['notes']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "</tr>";
                    }
                }else {
                    echo "<p>No relaxation techniques found.</p>";
                }
            }
            ?>
        </tbody>
    </table>
            

<?php
// Process form submission to add a new technique
if (isset($_POST['add_technique'])) {
    echo"$yoga_pose";
    require_once '../components/db_connect.php';
    $yoga_pose = $_POST['yoga'];
    $favorite_idea = $_POST['favorite'];
    $oil_fragrance = $_POST['oil'];
    $difficulty = $_POST['difficulty'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];

    // Insert data into the database
    $sql_insert = "INSERT INTO practices (yoga_pose, favorite_idea, oil_fragrance, difficulty, notes, date)
            VALUES ( ?, ?, ?, ?, ?, ? )";
    
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql_insert);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"ssssss",$yoga_pose, $favorite_idea,  $oil_fragrance, $difficulty, $notes, $date);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>New record created successfully.</div>";
    }else{
        die("Something went wrong");
    }
}

// Display the techniques table
displayTechniquesTable();
?>