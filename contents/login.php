<?php
session_start();

$is_loggedin = false;
$isposted = isset($_POST['username']) && isset($_POST['password']);

if ($isposted) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match
    if ($username === 'checkme' && $password === '$uper$ecret') {
        $is_loggedin = true;
        $_SESSION['username'] = $username; // Store username in session
        header('Location: index.php?page=account'); // Redirect to account.php
        exit(); // Stop further execution
    } else {
        $authMessage = 'Invalid username or password.';
    }
}
?> 

<h2><?php echo $is_loggedin ? 'Logged In' : 'Log in'; ?></h2>
<img src="images/2.png" alt="image 2"><br>

<div class="message">
    <?php if (isset($authMessage)) echo $authMessage; ?>
</div>

<div style="display: <?php echo $isposted ? 'none' : 'block'; ?>">
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</div>

<p>If you need an account. <a href="contents/registration.php">Register Here</a></p>
