<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laura Fauzia || Legendary Fox || WEB250 || Home</title>
    <link rel="stylesheet" href="styles/default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trirong:wght@100;200;300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1>Laura Fauzia's Legendary Fox || WEB250</h1>
    <div>
        <a <?php if(isset($_GET['page']) && $_GET['page'] == 'home') echo 'class="active"'; ?> href="index.php?page=home">HOME</a>
        <a <?php if(isset($_GET['page']) && $_GET['page'] == 'introduction') echo 'class="active"'; ?> href="index.php?page=introduction">INTRODUCTION</a>
        <a <?php if(isset($_GET['page']) && $_GET['page'] == 'contract') echo 'class="active"'; ?> href="index.php?page=contract">CONTRACT</a>
        <a <?php if(isset($_GET['page']) && $_GET['page'] == 'brand') echo 'class="active"'; ?> href="index.php?page=brand">BRAND</a>
    </div>
</header>
<main>
<?php
    // Check if page parameter is set and not empty
    if(isset($_GET['page']) && !empty($_GET['page'])) {
        // Define the content file path based on the page parameter
        $content_path = 'contents/' . $_GET['page'] . '.php';
        
        // if the content file exists
        if(file_exists($content_path)) {
            // the content file
            include $content_path;
        } else {
            // if file does not exist
            echo 'Page not found.';
        }
    } else {
        // Default content for the home page
        include 'contents/home.php';
    }
?>
</main>
<br>
<br>
<br>
<footer>     
        <div>                                    
            <a href="https://github.com/Lfauzia">GitHub |</a> 
            <a href="http://lfauzia.github.io/"> GitHub.io |</a>
            <a href="https://lfauzia.github.io/web215/"> WEB215.io |</a>
            <a href="https://www.codecademy.com/profiles/lnkazan0"> Codecademy |</a>
            <a href="https://www.freecodecamp.org/lnkazan0"> FreeCodeCamp |</a>
            <a href="https://jsfiddle.net/user/Lnkazan0/fiddles/"> JSFiddle |</a>
            <a href="https://www.linkedin.com/in/laura-f-07331a2aa/"> LinkedIn</a>
                 
            <p> &copy; 2024 Allé Youpi. All rights reserved.</p> 
            
            <p> 
                <a href="https://validator.w3.org/nu/?doc=https%3A%2F%2Flfauzia.github.io%2Fweb250%2Findex.html">
                <img src="images/button_validation_html5.png" width="88" height="31" alt="Validate webpage HTML.">
                </a>
                     
                <a href="https://validator.w3.org/nu/?doc=https%3A%2F%2FLfauzia.github.io%2Fweb250%2Fstyles%2Fdefault.css">
                <img src="images/button_validation_css.png" width="88" height="31" alt="Validate webpage CSS.">
                </a>
            </p>         
        </div>         
    </footer>
</body>    