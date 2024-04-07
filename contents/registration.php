<?php
// Include the database connection file
require 'components/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password != $confirmpassword) {
        echo 'Passwords do not match. ';
    } elseif (strlen($password) < 6) {
        echo 'Password must be at least 6 characters. ';
    } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        echo 'Username must contain only letters and numbers. ';
    } elseif (strlen($username) > 15) {
        echo 'Username must be 15 characters or less. ';
    } else {
        $query = $mysqli->prepare("SELECT * FROM account WHERE username = ?");
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            echo 'Username already exists. ';
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = $mysqli->prepare("INSERT INTO account (username, password, email, fname, lname) VALUES (?, ?, ?, ?, ?)");
            $query->bind_param('sssss', $username, $password, $email, $fname, $lname);
            $query->execute();
            echo 'Account created successfully.';
        }
    }
}
?>

<main>
    <h2>Register</h2>
    <form action="" method="POST">
        <div>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
        </div>
        <div>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="15 chars max; only letters and numbers" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="must be 6 characters" required>
        </div>
        <div>
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>
        </div>
        <button type="submit">Register</button>
    </form>
</main>
