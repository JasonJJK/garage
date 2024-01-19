<?php

session_start();

if (isset($_SESSION["mijnid"]))
{
    echo "Bestaande sessie: ".$_SESSION["mijnid"];

    echo "<br>Naar <a href='session1.php'>begin</a>";
    echo "<br><a href='session3.php'>meld af</a>";
}
else
{
    echo "Je bent hier gekomen zonder session, jij doet iets niet goed.<br>";
}

if (isset($_SESSION["userid"]))
{
    echo "userid bestaat met de waarde: ".$_SESSION["userid"];
}

include ("../functions.php")

?>