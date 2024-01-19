<html>
<head>
<title>Formulier: verwijder artikel</title>
</head>

<body>
<H1> Keukenprins - verwijderen artikel</H1>

<TABLE>
<FORM action='verwijder_artikel_def.php' method='POST'>

<?php

include("database.php");

// inlezen recordnummer in variabele;
$artnr = $_POST['verstopt'];

// tonen gegevens record
$query = "SELECT * FROM artikel WHERE artikelnummer = $artnr";

// Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen in een array
while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC))
{
echo"<TR><TD>Artikelnummer: </TD><TD>$rij[artikelnummer]</TD></TR>";
echo"<TR><TD>Artikelnaam: </TD><TD>$rij[artikelnaam]</TD></TR>";
echo"<TR><TD>Categorie: </TD><TD>$rij[Categorie]</TD></TR>";
echo"<TR><TD>Prijs: </TD><TD>$rij[prijs]</TD></TR>";
echo"<TR><TD>Voorraad: </TD><TD>$rij[aantal_in_voorraad]</TD></TR>";
echo "<TD><input type='hidden' name='artikelnummer' value='$rij[artikelnummer]'></TD>";

}
?>
</TABLE>

<input type ='submit' name='Verwijder' value='Verwijder'/>
<input type ='button' value='Terug' onClick="window.location.href='overzicht_artikelen.php'">
</FORM>


</body>
</html>