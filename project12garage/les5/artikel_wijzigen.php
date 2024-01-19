<html>
<head>
<title>Formulier: wijzig artikel</title>
</head>

<body>

<?php
include ("database.php");
$artnr = $_POST['verstopt'];

$query = "SELECT * FROM artikel WHERE artikelnummer = $artnr";
// Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen
$rij = $resultaat->fetch_array(MYSQLI_ASSOC);

?>

<H1> Keukenprins - wijzigen artikel</H1>
<H3> Wijzig een artikel : </H3>

<FORM action="artikel_wijzigen_def.php" method="POST">
<table>
<tr><td>Artikelnummer: </td>
<td><input name ="artikelnummer" value="<?php echo "$rij[artikelnummer]"; ?>" /></td></tr>
<tr><td>Artikelnaam: </td>
<td><input name ="artikelnaam" value="<?php echo "$rij[artikelnaam]"; ?>" /></td></tr>
<tr><td>Categorie: </td>
<td><input name ="categorie" value="<?php echo "$rij[Categorie]"; ?>" /></td></tr>
<tr><td>Prijs: </td>
<td><input name ="prijs" value="<?php echo "$rij[prijs]"; ?>"/></td></tr>
<tr><td>aantal_in_voorraad: </td>
<td><input name ="voorraad" value="<?php echo "$rij[aantal_in_voorraad]"; ?>"/></td></tr>
<tr>
<td colspan="2" >
<input type ="submit" name="submit"/>
<input type ="button" value="naar overzicht" onClick="window.location.href='overzicht_artikelen.php'">
</td>
</tr>
</table>
</FORM>

</body>
</html>
<?php

// sluiten database
$dbVerbinding->close();