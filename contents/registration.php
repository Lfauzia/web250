<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laura Fauzia || Legendary Fox || WEB250 || Home</title>
    <link rel="stylesheet" href="../styles/default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trirong:wght@100;200;300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1>Laura Fauzia's Legendary Fox || WEB250</h1>
    <nav>
    <a <?php if(isset($_GET['page']) && $_GET['page'] == 'home') echo 'class="active"'; ?> href="../index.php?page=home">HOME</a>
    <a <?php if(isset($_GET['page']) && $_GET['page'] == 'introduction') echo 'class="active"'; ?> href="../index.php?page=introduction">INTRODUCTION</a>
    <a <?php if(isset($_GET['page']) && $_GET['page'] == 'contract') echo 'class="active"'; ?> href="../index.php?page=contract">CONTRACT</a>
    <a <?php if(isset($_GET['page']) && $_GET['page'] == 'brand') echo 'class="active"'; ?> href="../index.php?page=brand">BRAND</a>
    <a <?php if(isset($_GET['page']) && $_GET['page'] == 'fizz') echo 'class="active"'; ?> href="../index.php?page=fizz">FIZZ</a>
    <a <?php if(isset($_GET['page']) && $_GET['page'] == 'form') echo 'class="active"'; ?> href="../index.php?page=form">FORM</a>
    <?php
        if(!isset($_SESSION["username"])) {
            echo '<a ';
            if(isset($_GET['page']) && $_GET['page'] == 'login') echo 'class="active"';
            echo ' href="../index.php?page=login">LOGIN</a>';
        }
    ?>
</nav> 
</header><br>


<main>
    <h2>Register</h2>
    <img src="../images/2.png" alt="image 2">
       
    <form action="" method="POST" id="register-form">
        <small class="message">
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    include 'components/db_connect.php';

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
        </small>
        <fieldset>
            <div>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" required>
                
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" required>
             
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="15 chars max; only letters and numbers" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="must be 6 characters" required>
                
                <label for="confirmpassword">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required>
            </div>
            <input type="hidden" name="p" value="contents/registration.php">
            <input type="submit" value="Register">
        </fieldset>
        <br>
    </form>
   
</main>  <br>
    <footer>                                                
        <a href="https://github.com/Lfauzia">GitHub |</a> 
        <a href="http://lfauzia.github.io/"> GitHub.io |</a>
        <a href="https://lfauzia.github.io/web215/"> WEB215.io |</a>
        <a href="https://www.codecademy.com/profiles/lnkazan0"> Codecademy |</a>
        <a href="https://www.freecodecamp.org/lnkazan0"> FreeCodeCamp |</a>
        <a href="https://jsfiddle.net/user/Lnkazan0/fiddles/"> JSFiddle |</a>
        <a href="https://www.linkedin.com/in/laura-f-07331a2aa/"> LinkedIn</a>
                 
        <p> &copy; 2024 Allé Youpi. All rights reserved.</p> 
            
        <p> 
            <a href="https://validator.w3.org/check?uri=referer">
            <img src="../images/button_validation_html5.png" width="88" height="31" alt="Validate webpage HTML.">
            </a>
                     
            <a href="https://validator.w3.org/nu/?doc=https%3A%2F%2FLfauzia.github.io%2Fweb250%2Fstyles%2Fdefault.css">
            <img src="../images/button_validation_css.png" width="88" height="31" alt="Validate webpage CSS.">
            </a>
        </p>      
                        
    </footer>
    </body>
</html>


