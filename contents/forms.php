<?php
// Function to sanitize input data
function sanitizeData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Display HTML forms
echo "
<h2> Forms </h2>
<img src='images/2.png' alt='image 2'>

<section>
    <h4 style='text-align: left;'>Form with POST Method</h4>
    <form action='' method='post' id='form1' name='form1'>
        <label for='postFirstName'>First Name:</label>
        <input type='text' id='postFirstName' name='postFirstName' required><br>
        <label for='postLastName'>Last Name:</label>
        <input type='text' id='postLastName' name='postLastName' required><br>
        <label for='postEmail'>Email:</label>
        <input type='email' id='postEmail' name='postEmail' required><br>
        <label for='postMessage'>Message:</label>
        <textarea id='postMessage' name='postMessage' placeholder='How did you discover us?'></textarea><br>
        <label for='postTranquility'>Tranquility Level:</label>
        <select id='postTranquility' name='postTranquility' required>
            <option value='high'>High</option>
            <option value='medium'>Medium</option>
            <option value='low'>Low</option>
        </select><br>
        <input type='submit' value='Submit POST Form'>
    </form>
</section>
<hr>";

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
        echo "<section>";
        echo "<h4> Post Results:</h4>";
        echo "First Name: $postFirstName <br>";
        echo "Last Name: $postLastName <br>";
        echo "Email: $postEmail <br>";
        echo "Message: $postMessage <br>";
        echo "Tranquility Level: $postTranquility <br>";
        echo "</section>";        
        echo "<hr>";
    }
}

echo "
<section>
    <h4 style='text-align: left;'>Form with GET Method</h4>      
    <form action='' method='GET' id='form2' name='form2' >
        <label for='getFirstName'>First Name:</label>
        <input type='text' id='getFirstName' name='getFirstName' required><br>
        <label for='getLastName'>Last Name:</label>
        <input type='text' id='getLastName' name='getLastName' required><br>
        <label for='getEmail'>Email:</label>
        <input type='email' id='getEmail' name='getEmail' required><br>
        <label for='getMessage'>Message:</label>
        <textarea id='getMessage' name='getMessage' placeholder='How did you discover us?'></textarea><br>
        <label for='getTranquility'>Tranquility Level:</label>
        <select id='getTranquility' name='getTranquility' >
            <option value='high'>High</option>
            <option value='medium'>Medium</option>
            <option value='low'>Low</option>
        </select><br>
        <input type='hidden' name='page' id='page' value='forms'/>
        <input type='submit' value='Submit GET Form'/>
    </form>
</section>
<hr>";

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
        echo "<section>";
        echo "<h4>Thank you, $getFirstName !</h4>";
        echo "<p>We will contact you at the email you have provided: $getEmail</p>";
        echo "</section>";
        
        // Add <hr> tag between results and forms
        echo "<hr>";
    }
}

echo "
<section>
    <h4 style='text-align: left;'>Everything Form</h4>
    <form action='' method='post' id='form3' name='form3' enctype='multipart/form-data'>
        <label for='everythingFirstName'>First Name:</label>
        <input type='text' id='everythingFirstName' name='everythingFirstName' required><br>
        <label for='everythingLastName'>Last Name:</label>
        <input type='text' id='everythingLastName' name='everythingLastName' required><br>
        <label for='everythingEmail'>Email:</label>
        <input type='email' id='everythingEmail' name='everythingEmail' required><br>
        <label for='everythingMessage'>Message:</label>
        <textarea id='everythingMessage' name='everythingMessage' placeholder='How did you discover us?'></textarea><br>
        <label for='everythingTranquility'>Tranquility Level:</label>
        <select id='everythingTranquility' name='everythingTranquility' required>
            <option value='high'>High</option>
            <option value='medium'>Medium</option>
            <option value='low'>Low</option>
        </select><br>
        <label for='everythingColor'>Favorite Color:</label>
        <input type='color' id='everythingColor' name='everythingColor'><br>
        <label for='everythingGender'>Gender:</label><br>
        <input type='radio' id='everythingGenderMale' name='everythingGender' value='Male'> <label for='everythingGenderMale'>Male</label><br>
        <input type='radio' id='everythingGenderFemale' name='everythingGender' value='Female'> <label for='everythingGenderFemale'>Female</label><br>
        <label for='everythingPets'>Pets:</label><br>
        <input type='checkbox' id='everythingPetsDog' name='everythingPets[]' value='Dog'> <label for='everythingPetsDog'>Dog</label><br>
        <input type='checkbox' id='everythingPetsCat' name='everythingPets[]' value='Cat'> <label for='everythingPetsCat'>Cat</label><br>
        <input type='checkbox' id='everythingPetsBird' name='everythingPets[]' value='Bird'> <label for='everythingPetsBird'>Bird</label><br>
        <label for='everythingEnergy'>Energy Level:</label>
        <input type='range' id='everythingEnergy' name='everythingEnergy' min='1' max='5'><br>
        <label for='everythingDate'>Date:</label>
        <input type='date' id='everythingDate' name='everythingDate'><br>
        <label for='everythingFile'>Upload File:</label>
        <input type='file' id='everythingFile' name='everythingFile'><br>
        <input type='submit' value='Submit Everything Form'>
    </form>
</section>";

// Check if Everything Form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['everythingFirstName'])) {
    // Process Everything Form data
    $everythingFirstName = sanitizeData($_POST['everythingFirstName']);
    $everythingLastName = sanitizeData($_POST['everythingLastName']);
    $everythingEmail = sanitizeData($_POST['everythingEmail']);
    $everythingMessage = sanitizeData($_POST['everythingMessage']);
    $everythingTranquility = sanitizeData($_POST['everythingTranquility']);
    $everythingColor = sanitizeData($_POST['everythingColor']);
    $everythingGender = isset($_POST['everythingGender']) ? sanitizeData($_POST['everythingGender']) : "";
    $everythingPets = isset($_POST['everythingPets']) ? $_POST['everythingPets'] : [];
    $everythingPets = array_map('sanitizeData', $everythingPets); // Sanitize each pet value
    $everythingDate = isset($_POST['everythingDate']) ? sanitizeData($_POST['everythingDate']) : "";
    $everythingEnergy = isset($_POST['everythingEnergy']) ? sanitizeData($_POST['everythingEnergy']) : "";

    // Display results for Everything Form
    echo "<hr>";
    echo "<section>";
    echo "<h4>Everything Form Results:</h4>";
    echo "First Name: $everythingFirstName <br>";
    echo "Last Name: $everythingLastName <br>";
    echo "Email: $everythingEmail <br>";
    echo "Message: $everythingMessage <br>";
    echo "Tranquility Level: $everythingTranquility <br>";
    echo "Favorite Color: $everythingColor <br>";
    echo "Gender: $everythingGender <br>";
    echo "Pets: " . implode(", ", $everythingPets) . "<br>";
    echo "Date: $everythingDate <br>";
    echo "Energy Level: $everythingEnergy <br>";
    if (!empty($_FILES['everythingFile']['name'])) {
        echo "Uploaded File: " . $_FILES['everythingFile']['name'] . "<br>";
    }
    echo "</section>";
}
?>
