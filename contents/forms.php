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
$postFirstName = $postLastName = $postEmail = $postMessage = $postTranquility = ''; // Added $postTranquility
$getFirstName = $getLastName = $getEmail = $getMessage = $getTranquility = ''; // Added $getTranquility

// Check if POST values are present
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process POST form data
    if (isset($_POST['postFirstName']) && isset($_POST['postLastName']) && isset($_POST['postEmail']) && isset($_POST['postMessage']) && isset($_POST['postTranquility'])) {
        $postFirstName = sanitizeData($_POST['postFirstName']);
        $postLastName = sanitizeData($_POST['postLastName']);
        $postEmail = sanitizeData($_POST['postEmail']);
        $postMessage = sanitizeData($_POST['postMessage']);
        $postTranquility = sanitizeData($_POST['postTranquility']); // Assign the value to $postTranquility
        
        // Display POST form results
        echo "<h2>Form Results:</h2>";
        echo "POST Method:<br>";
        echo "First Name: $postFirstName <br>";
        echo "Last Name: $postLastName <br>";
        echo "Email: $postEmail <br>";
        echo "Message: $postMessage <br>";
        echo "Tranquility Level: $postTranquility <br>";
        
        // Add <hr> tag between results and forms
        echo "<hr>";
    }
}

// Check if GET values are present
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Process GET form data
    if (isset($_GET['getFirstName']) && isset($_GET['getLastName']) && isset($_GET['getEmail']) && isset($_GET['getMessage']) && isset($_GET['getTranquility'])) {
        $getFirstName = sanitizeData($_GET['getFirstName']);
        $getLastName = sanitizeData($_GET['getLastName']);
        $getEmail = sanitizeData($_GET['getEmail']);
        $getMessage = sanitizeData($_GET['getMessage']);
        $getTranquility = sanitizeData($_GET['getTranquility']); // Assign the value to $getTranquility
        
        // Display success message for GET form submission
        echo "<h2>Form Results:</h2>";
        echo "GET Method:<br>";
        echo "First Name: $getFirstName <br>";
        echo "Last Name: $getLastName <br>";
        echo "Email: $getEmail <br>";
        echo "Message: $getMessage <br>";
        echo "Tranquility Level: $getTranquility <br>";
        
        // Add <hr> tag between results and forms
        echo "<hr>";
    }
}

// Display HTML forms
echo "
<section>
    <h4 style='text-align: left;'>Form with POST Method</h4>
    <form action='' method='post' id='form1' name='form1'>
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

<section>
    <h4 style='text-align: left;'>Form with GET Method</h4>      
    <form action='' method='GET' id='form2' name='form2' >
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
        <input type='hidden' name='page' id='page' value='forms'/>
        <input type='submit' value='Submit GET Form'/>
    </form>
</section>
";
?>
