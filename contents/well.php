<h2> Wellness practices </h2>
<img src="images/2.png" alt="image 2">
<br>
<?php


// Database connection
$servername = "localhost";
$username = "$username";
$password = "$password";
$dbname = "$database";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sort entries from newest to oldest
function sortEntries($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
}

// Handle form submission for adding new entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yoga = $_POST["yoga"];
    $favorite = $_POST["favorite"];
    $oil = $_POST["oil"];
    $difficulty = $_POST["difficulty"];
    $notes = $_POST["notes"];
    $date = date("Y-m-d");

    // Insert new entry into the database
    $sql = "INSERT INTO relaxation_entries (yoga, favorite, oil, difficulty, notes, date)
            VALUES ('$yoga', '$favorite', '$oil', '$difficulty', '$notes', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New entry added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetching and displaying entries from the database
$sql = "SELECT * FROM relaxation_entries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $entries = array();
    while ($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }
    usort($entries, 'sortEntries');

    // Displaying sorted entries
    echo "<h1>Relaxation Techniques and Wellness Practices</h1>";
    echo "<ul>";
    foreach ($entries as $entry) {
        echo "<li>";
        echo "<strong>Yoga Practice:</strong> " . $entry['yoga'] . "<br>";
        echo "<strong>Favorite Relaxation Idea:</strong> " . $entry['favorite'] . "<br>";
        echo "<strong>Essential Oils:</strong> " . $entry['oil'] . "<br>";
        echo "<strong>Difficulty:</strong> " . $entry['difficulty'] . "<br>";
        echo "<strong>Notes:</strong> " . $entry['notes'] . "<br>";
        echo "<strong>Date:</strong> " . $entry['date'] . "<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "No entries found.";
}

$conn->close();
?>


    <h2>Add New Entry</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Yoga Practice: <input type="text" name="yoga"><br>
        Favorite Relaxation Idea: <input type="text" name="favorite"><br>
        Essential Oils: <input type="text" name="oil"><br>
        Difficulty: 
        <input type="radio" name="difficulty" value="1">1
        <input type="radio" name="difficulty" value="2">2
        <input type="radio" name="difficulty" value="3">3
        <input type="radio" name="difficulty" value="4">4
        <input type="radio" name="difficulty" value="5">5<br>
        Notes: <textarea name="notes"></textarea><br>
        <input type="submit" value="Submit">
    </form>

