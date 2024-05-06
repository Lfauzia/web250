<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <?php
        $is_loggedin = false;
        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
           require_once "../components/db_connect.php";
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    // session_start();
                    $is_loggedin = true;
                    $_SESSION["username"] = $username;
                    header("Location: ../index.php?page=account");
                    die(); 
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>";
            }
        }
        ?>
        
      <form action="contents/login.php" method="post">
      <h2><?php echo $is_loggedin ? 'Logged In' : 'Log in'; ?></h2>
        <div class="form-group">
            <input type="text" placeholder="Enter Username:" name="username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
        <div><p>If you need an account, <a href="contents/registration.php">Sign up<em> Here.</em></a></p></div>
      </form>
     
    </div>
</body>
</html>