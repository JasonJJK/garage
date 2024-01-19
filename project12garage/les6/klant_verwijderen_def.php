<HTML>
<HEAD>
<TITLE>De Keukenprins</TITLE>
</HEAD>

<BODY>

<?php

include ("database.php");
$artnr = $_POST['klantnummer'];
$query = "DELETE FROM klant WHERE klantnummer = $artnr";

$resultaat = $dbVerbinding->query($query);
echo "De klant is verwijderd<br>";
?>
<input type ="button" value="Naar Overzicht" onClick="window.location.href='klant_overzicht.php'">

</BODY>
</HTML>