<h2>Forms</h2>
<img src="images/2.png" alt="image 2">

<?php
// Function to sanitize input data
function sanitizeData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize variables to hold form input values
$postFirstName = $postLastName = $postEmail = $postMessage = $postOption = '';
$getFirstName = $getLastName = $getEmail = $getMessage = $getOption = '';

// Check if POST values are present
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process POST form data
    if (isset($_POST['postFirstName']) && isset($_POST['postLastName']) && isset($_POST['postEmail']) && isset($_POST['postMessage'])) {
        $postFirstName = sanitizeData($_POST['postFirstName']);
        $postLastName = sanitizeData($_POST['postLastName']);
        $postEmail = sanitizeData($_POST['postEmail']);
        $postMessage = sanitizeData($_POST['postMessage']);
        
    }
}

// Check if GET values are present
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Process GET form data
    if (isset($_GET['getFirstName']) && isset($_GET['getLastName']) && isset($_GET['getEmail']) && isset($_GET['getMessage'])) {
        $getFirstName = sanitizeData($_GET['getFirstName']);
        $getLastName = sanitizeData($_GET['getLastName']);
        $getEmail = sanitizeData($_GET['getEmail']);
        $getMessage = sanitizeData($_GET['getMessage']);
        
        
        // Display success message for GET form submission
        echo "<p>Thank you for your submission! We have received your message and will contact you soon.</p>";
    }
}

// Display HTML forms
echo "
    <section id='post-form'>
        <h4 style='text-align: left;'>Form with POST Method</h4>
        <form action='' method='post'>
            <label for='postFirstName'>First Name:</label>
            <input type='text' id='postFirstName' name='postFirstName'><br>
            <label for='postLastName'>Last Name:</label>
            <input type='text' id='postLastName' name='postLastName'><br>
            <label for='postEmail'>Email:</label>
            <input type='email' id='postEmail' name='postEmail'><br>
            <label for='postMessage'>Message:</label>
            <textarea id='postMessage' name='postMessage' placeholder='How did you discover us?'></textarea><br>
            <label for='postTranquility'>Tranquility Level:</label>
            <select id='postTranquility' name='postTranquility'>
                <option value='high'>High</option>
                <option value='medium'>Medium</option>
                <option value='low'>Low</option>
            </select><br>
            <input type='submit' value='Submit POST Form'>
        </form>
    </section>

    <hr>

    <section id='get-form'>
        <h4 style='text-align: left;'>Form with GET Method</h4>
        <form action='' method='get'>
            <label for='getFirstName'>First Name:</label>
            <input type='text' id='getFirstName' name='getFirstName'><br>
            <label for='getLastName'>Last Name:</label>
            <input type='text' id='getLastName' name='getLastName'><br>
            <label for='getEmail'>Email:</label>
            <input type='email' id='getEmail' name='getEmail'><br>
            <label for='getMessage'>Message:</label>
            <textarea id='getMessage' name='getMessage' placeholder='How did you discover us?'></textarea><br>
            <label for='getTranquility'>Tranquility Level:</label>
            <select id='getTranquility' name='getTranquility'>
                <option value='high'>High</option>
                <option value='medium'>Medium</option>
                <option value='low'>Low</option>
            </select><br>
            
            <input type='submit' value='Submit GET Form'>
        </form>
    </section>
";

// Process form data and display results
if (!empty($postFirstName)) {
    echo "<h2>Form Results:</h2>";
    echo "POST Method:<br>";
    echo "First Name: $postFirstName <br>";
    echo "Last Name: $postLastName <br>";
    echo "Email: $postEmail <br>";
    echo "Message: $postMessage <br>";
    echo "Tranquility Level: $postTranquility <br>";
}

if (!empty($getFirstName)) {
    echo "<h2>Form Results:</h2>";
    echo "GET Method:<br>";
    echo "First Name: $getFirstName <br>";
    echo "Last Name: $getLastName <br>";
    echo "Email: $getEmail <br>";
    echo "Message: $getMessage <br>";
    echo "Tranquility Level: $getTranquility <br>";
}
?>
