<html>
<head>
<title>Formulier: verwijder klant</title>
</head>

<body>
<H1> Keukenprins - verwijderen klant</H1>

<TABLE>
<FORM action='klant_verwijderen_def.php' method='POST'>

<?php

include("database.php");

// inlezen recordnummer in variabele;
$artnr = $_POST['verstopt'];

// tonen gegevens record
$query = "SELECT * FROM klant WHERE klantnummer = $artnr";

// Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen in een array
while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC))
{
echo"<TR><TD>Klantnummer:: </TD><TD>$rij[klantnummer]</TD></TR>";
echo"<TR><TD>Naam: </TD><TD>$rij[naam]</TD></TR>";
echo"<TR><TD>Adres: </TD><TD>$rij[adres]</TD></TR>";
echo"<TR><TD>Postcode: </TD><TD>$rij[postcode]</TD></TR>";
echo"<TR><TD>Woonplaats: </TD><TD>$rij[woonplaats]</TD></TR>";
echo"<TR><TD>Email: </TD><TD>$rij[email]</TD></TR>";
}
?>
</TABLE>

<input type ='submit' name='Verwijder' value='Verwijder'/>
<input type ='button' value='Terug' onClick="window.location.href='klant_overzicht.php'">
</FORM>


</body>
</html>