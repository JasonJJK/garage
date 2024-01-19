<?php

session_start();

if (!isset($_SESSION['userid']))
{
    $_SESSION['userid'] = 'kabouter_plop';
    echo "Sessie gegenereerd.<br>";
}

echo $_SESSION["userid"];
echo "<br>Naar <a href='session2.php'>vervolg</a>";

?>