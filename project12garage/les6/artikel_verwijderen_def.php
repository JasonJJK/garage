<HTML>
<HEAD>
<TITLE>De Keukenprins</TITLE>
</HEAD>

<BODY>

<?php

include ("database.php");
$artnr = $_POST['artikelnummer'];
$query = "DELETE FROM artikel WHERE artikelnummer = $artnr";

$resultaat = $dbVerbinding->query($query);
echo "Het artikel is verwijderd<br>";
?>
<input type ="button" value="Naar Overzicht" onClick="window.location.href='artikel_overzicht.php'">

</BODY>
</HTML>