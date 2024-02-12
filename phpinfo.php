<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo $sOutputString = "<hr/>";


for($iCounter = 1; $iCounter <= 1000; $iCounter++)
{
     $sOutputString .= $iCounter . ") Laura Fauzia got PHP running on my computer!! ";
}


echo ("<h5>" . $sOutputString . "</h5><hr/>");
;
?>

</body>
</html>