<?php

session_start();

if (!isset($_SESSION["mijnid"]))
{
    $_SESSION["mijnid"] = uniqid();
    echo "Sessie gegenereerd: ".$_SESSION["mijnid"];
}
else
{
    echo "Bestaande sessie: ".$_SESSION["mijnid"];
}

echo "<br>Naar <a href='session2.php'>vervolg</a>";

?>