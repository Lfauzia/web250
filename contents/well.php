<h2> Wellness practices </h2>
<img src="images/2.png" alt="image 2">
<br><br>

<?php
session_start();

$is_loggedin = isset($_SESSION['username']);

// Function to display the form for adding a new relaxation technique
function displayAddForm() {
    global $is_loggedin;
    // Check if the user is logged in
    if ($is_loggedin) {
        // If logged in, display the form
        ?>
        <form action="index.php?page=process_form" method="post">
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
            <input type="submit" value="Add Technique">
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
    global $is_loggedin;
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
            // Sample data to mimic what others have already input
            $sample_data = array(
                array(123, 'Balasana', 'Focus on your breathing', 'Lavender', 'Easy', 'This changed my life', '2024-04-20'),
                array(456, 'Cat Pose', 'Spend time in nature', 'Sandalwood', 'Medium', 'Practice this, you will feel revived', '2024-04-21'),
                array(243, 'Cow Pose', 'Spend time in nature', 'Lavender', 'Easy', 'Moo energy and tranquility', '2024-04-22')

            );
            foreach ($sample_data as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td style='padding: 8px; border: 1px solid #000;'>$value</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<?php
}

// Display the techniques table
displayTechniquesTable();
?>
