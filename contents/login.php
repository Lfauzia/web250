<h2>Log in</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'components/db_connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Function to authenticate user
        function authenticateUser($username, $password, $mysqli) {
            $query = $mysqli->prepare("SELECT * FROM account WHERE username = ?");
            $query->bind_param('s', $username);
            $query->execute();
            $result = $query->get_result();
            if ($result->num_rows == 0) {
                return 'Username not found.';
            } else {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['email'] = $row['email'];
                    header('Location: ?p=contents/account.php');
                    exit;
                } else {
                    return 'Incorrect password.';
                }
            }
        }

        // Call the authentication function
        $authMessage = authenticateUser($username, $password, $mysqli);
    }
    ?>

    <div class="message">
        <?php if (isset($authMessage)) echo $authMessage; ?>
    </div>
    <form action="account.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p>If you need an account. Register <a href="?p=contents/registration.php">Here</a></p>
