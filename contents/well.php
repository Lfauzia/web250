<h2> Wellness practices </h2>
<img src="images/2.png" alt="image 2">
<br><br><br><br><br>

<?php
session_start(); // Start session for storing user data

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "$username";
$password = "$password;
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for adding new entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yoga = $_POST["yoga"];
    $favorite = $_POST["favorite"];
    $oils = implode(", ", $_POST["oils"]);
    $difficulty = $_POST["difficulty"];
    $notes = $_POST["notes"];
    $date = date("Y-m-d");

    // Insert new entry into the database
    $sql = "INSERT INTO relaxation_entries (user_id, yoga, favorite, oils, difficulty, notes, date)
            VALUES ('{$_SESSION['user_id']}', '$yoga', '$favorite', '$oils', '$difficulty', '$notes', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New entry added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


    <h2>Add New Entry</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Yoga Practice: 
        <select name="yoga">
            <option value="Hatha">Hatha</option>
            <option value="Vinyasa">Vinyasa</option>
            <option value="Kundalini">Kundalini</option>
        </select><br>
        Favorite Relaxation Idea: <textarea name="favorite"></textarea><br>
        Essential Oils:
        <input type="checkbox" name="oils[]" value="Lavender"> Lavender
        <input type="checkbox" name="oils[]" value="Chamomile"> Chamomile
        <input type="checkbox" name="oils[]" value="Peppermint"> Peppermint<br>
        Difficulty: 
        <input type="radio" name="difficulty" value="1">1
        <input type="radio" name="difficulty" value="2">2
        <input type="radio" name="difficulty" value="3">3
        <input type="radio" name="difficulty" value="4">4
        <input type="radio" name="difficulty" value="5">5<br>
        Notes: <textarea name="notes"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Edit/Delete Entries</h2>
    <?php
    // Fetching and displaying entries from the database
    $sql = "SELECT * FROM relaxation_entries WHERE user_id = '{$_SESSION['user_id']}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>Yoga Practice:</strong> " . $row['yoga'] . "<br>";
            echo "<strong>Favorite Relaxation Idea:</strong> " . $row['favorite'] . "<br>";
            echo "<strong>Essential Oils:</strong> " . $row['oils'] . "<br>";
            echo "<strong>Difficulty:</strong> " . $row['difficulty'] . "<br>";
            echo "<strong>Notes:</strong> " . $row['notes'] . "<br>";
            echo "<strong>Date:</strong> " . $row['date'] . "<br>";
            // Add edit and delete links/buttons
            echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No entries found.";
    }
    ?>


