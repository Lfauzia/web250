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
        <a class="active" href="index.php?page=home">HOME</a>
        <a href="index.php?page=introduction">INTRODUCTION</a>
        <a href="index.php?page=contract">CONTRACT</a>
        <a href="index.php?page=brand">BRAND</a>
    </div>
</header>
<main>
<?php
    // Check if page parameter is set and not empty
    if(isset($_GET['page']) && !empty($_GET['page'])) {
        // Define the content file path based on the page parameter
        $content_path = 'components/' . $_GET['page'] . '.php';
        
        // Check if the content file exists
        if(file_exists($content_path)) {
            // Include the content file
            include $content_path;
        } else {
            // Handle the case where the content file does not exist
            echo 'Page not found.';
        }
    } else {
        // Default content for the home page
        include 'components/home.php';
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
        <a href="https://www.linkedin.com/in/laura-f-07
