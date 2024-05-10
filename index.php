<?php
session_start();

$is_loggedin = false;

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $is_loggedin = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laura|| Legendary Fox || WEB250 || Home</title>
    <link rel="stylesheet" href="styles/default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trirong:wght@100;200;300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Laura's Legendary Fox || WEB250</h1>
        <nav>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'home') echo 'class="active"'; ?> href="index.php?page=home">HOME</a>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'introduction') echo 'class="active"'; ?> href="index.php?page=introduction">INTRODUCTION</a>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'contract') echo 'class="active"'; ?> href="index.php?page=contract">CONTRACT</a>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'brand') echo 'class="active"'; ?> href="index.php?page=brand">BRAND</a>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'fizz') echo 'class="active"'; ?> href="index.php?page=fizz">FIZZ</a>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'forms') echo 'class="active"'; ?> href="index.php?page=forms">FORMS</a>
            <a <?php if (isset($_GET['page']) && $_GET['page'] == 'well') echo 'class="active"'; ?> href="index.php?page=well">WELL</a>

            <?php
            // Display login/logout link based on login status
            if ($is_loggedin) {
                echo '<a href="index.php?page=account">LOGGED</a>';
            } else {
                echo '<a href="index.php?page=login">LOGIN</a>';
            }
            ?>
        </nav>
    </header><br>

    <main>
        <?php
        // Include content based on the 'page' parameter in the URL
        $pageFound = true;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $content_path = 'contents/' . $_GET['page'] . '.php';
            if (file_exists($content_path)) {
                include $content_path;
            } else {
                $pageFound = false;
            }
        } else {
            include 'contents/home.php';
        }
        // Display "Page not found." message if the page is not found
        if (!$pageFound) {
            echo 'Page not found.';
        }
        ?>
    </main><br>

    <footer>
        <a href="https://github.com/Lfauzia">GitHub |</a>
        <a href="http://lfauzia.github.io/"> GitHub.io |</a>
        <a href="https://lfauzia.github.io/web215/"> WEB215.io |</a>
        <a href="https://www.codecademy.com/profiles/lnkazan0"> Codecademy |</a>
        <a href="https://www.freecodecamp.org/lnkazan0"> FreeCodeCamp |</a>
        <a href="https://jsfiddle.net/user/Lnkazan0/fiddles/"> JSFiddle |</a>
        <a href="https://www.linkedin.com/in/laura-f-07331a2aa/"> LinkedIn</a>
        <p>&copy; 2024 Allé Youpi. All rights reserved.</p>
        <p>
            <a href="https://validator.w3.org/check?uri=referer">
                <img src="images/button_validation_html5.png" width="88" height="31" alt="Validate webpage HTML.">
            </a>
            <a href="https://validator.w3.org/nu/?doc=https%3A%2F%2FLfauzia.github.io%2Fweb250%2Fstyles%2Fdefault.css">
                <img src="images/button_validation_css.png" width="88" height="31" alt="Validate webpage CSS.">
            </a>
        </p>
    </footer>
</body>

</html>
