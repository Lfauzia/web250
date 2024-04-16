<h2><?php if ($is_loggedin) {echo 'Logged In'; } else {echo 'Log in';} ?></h2>
<img src="images/2.png" alt="image 2"> <br>

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
    <p>If you need an account. <a href="contents/registration.php"> Register Here </a></p>


