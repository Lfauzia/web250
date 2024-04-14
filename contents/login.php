<?php  $isposted = $_SERVER['REQUEST_METHOD'] == 'POST'  ?>
<h2><?php if ($isposted) {echo 'Logged In'; } else {echo 'Log in';} ?></h2>
<img src="images/2.png" alt="image 2"> <br>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // include 'components/db_connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo '<div>You are logged in  '.$username.'!!!! </test>';
        
      
        // Function to authenticate user
        function authenticateUser($username, $password, $mysqli) {
            // echo '<div>test '.$username.'!!!! </test>';
            //          header('Location: contents/account.php');
            //     exit;
            // // header('Location: contents/account.php');
            // exit;

            // $query = $mysqli->prepare("SELECT * FROM account WHERE username = ?");
            // $query->bind_param('s', $username);
            // $query->execute();
            // $result = $query->get_result();
            // if ($result->num_rows == 0) {
            //     header('Location: contents/account.php');
            //     exit;
            //     // return 'Username not found.';
            // } else {
            //     $row = $result->fetch_assoc();
            //     if (password_verify($password, $row['password'])) {
            //         session_start();
            //         $_SESSION['username'] = $username;
            //         $_SESSION['id'] = $row['id'];
            //         $_SESSION['fname'] = $row['fname'];
            //         $_SESSION['lname'] = $row['lname'];
            //         $_SESSION['email'] = $row['email'];
            //         header('Location: contents/account.php');
            //         exit;
            //     } else {
            //         return 'Incorrect password.';
            //     }
            // }
        }

        // Call the authentication function
        // $authMessage = authenticateUser($username, $password, $mysqli);
        $authMessage ="";
       
    }
    ?>

    <div class="message">
        <?php if (isset($authMessage)) echo $authMessage; ?>
    </div>
    <div style="display: <?php if (($isposted)) echo 'none'; ?>">
    <form action="" method="POST" >
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</div>
    <p>If you need an account. Register <a href="contents/registration.php">Here</a></p>


