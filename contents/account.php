
    <h2>Account</h2>
    <img src="images/2.png" alt="image 2">
    <?php
        if(isset($_POST["logout"])) {
            session_destroy();
            header('Location: ?p=contents/index.php');
        }
        $username = $_SESSION['username'];
        echo "<p>Welcome, $username. You have successfully logged in.</p>";
    ?>
    <form action="" method="POST">
        <input type="hidden" name="p" value="contents/account.php">
        <input type="hidden" name="logout" value="yes">
        <input type="submit" name="logout" value="Logout">
    </form>
</main>

