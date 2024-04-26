<?php
    session_start();
    include 'components/db_connect.php'; // Include database connection script

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
        <a <?php if(isset($_GET['page']) && $_GET['page'] == 'forms') echo 'class="active"'; ?> href="../index.php?page=forms">FORMS</a>
        <a <?php if(isset($_GET['page']) && $_GET['page'] == 'well') echo 'class="active"'; ?> href="..index.php?page=well">WELL</a>

        <?php
            if(!isset($_SESSION["username"])) {
                $username = $_SESSION["username"];
                echo '<a ';
                if(isset($_GET['page']) && ($_GET['page'] == 'login' || $_GET['page'] == 'registration')) echo 'class="active"';
                // echo ' href="login.php">LOGIN</a>';
                echo ' href="../index.php?page=login">LOGIN</a>';
            } else { 
                echo '<a ';
                if(isset($_GET['page']) && $_GET['page'] == 'registration') echo 'class="active"';
                echo ' href="../index.php?page=registration">REGISTER</a>';
            }
        ?>

    </nav> 
</header><br>

<main>
    <?php if(isset($_SESSION["successMessage"])): ?>
        <h2><?php echo $_SESSION["successMessage"]; ?></h2>
        <?php unset($_SESSION["successMessage"]); ?> <!-- Remove the success message from the session after displaying -->
    <?php endif; ?>
    <h2>Register</h2>
    <img src="../images/2.png" alt="image 2">
    <?php if(isset($_SESSION["accountCreatedMessage"])): ?>
        <h3><?php echo $_SESSION["accountCreatedMessage"]; ?></h3>
        <?php unset($_SESSION["accountCreatedMessage"]); ?>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="registraction-form"> <!-- Set action to the same page -->
        <small class="message">
            <?php
                if (isset($_POST["submit"])) {
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $email = $_POST["email"];
                    $username = $_POST['username'];
                    $password = $_POST["password"];
                    $confirmpassword = $_POST["confirmpassword"];
                    
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
         
                    $errors = array();
                    
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     array_push($errors, "Email is not valid");
                    }
                    if (strlen($password)<8) {
                     array_push($errors,"Password must be at least 8 charactes long");
                    }
                    if ($password!==$confirmpassword) {
                     array_push($errors,"Password does not match");
                    }
                    require_once "../components/db_connect.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount>0) {
                     array_push($errors,"User already exists!");
                    }
                    if (count($errors)>0) {
                     foreach ($errors as  $error) {
                         echo "<div class='alert alert-danger'>$error</div>";
                     }
                    }else{
                     
                     $sql = "INSERT INTO users (firstname, lastname, email, username, password) VALUES ( ?, ?, ?, ?, ? )";
                     $stmt = mysqli_stmt_init($conn);
                     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                     if ($prepareStmt) {
                         mysqli_stmt_bind_param($stmt,"sssss",$fname, $lname,  $email, $username, $passwordHash);
                         mysqli_stmt_execute($stmt);
                         echo "<div class='alert alert-success'>You are registered successfully.</div>";
                     }else{
                         die("Something went wrong");
                     }
                    }
                   
                 }
            ?>
        </small>

        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="15 chars max; only letters and numbers" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="must be 6 characters" required>
            <!-- Password strength indicator -->
            <div id="password-strength"></div>
        </div>

        <div class="form-group">
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>
        </div>

        <button type="submit" class="btn-register">Register</button>
    </form>
</main> <br>
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