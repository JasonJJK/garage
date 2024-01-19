<HTML>
<HEAD>
<TITLE>De Keukenprins</TITLE>
</HEAD>

<BODY>
<?php

include("database.php");

if(isset($_POST["submit"]))
{
$klantnummer = $_POST["klantnummer"];
$naam = $_POST["naam"];
$adres = $_POST["adres"];
$postcode = $_POST["postcode"];
$woonplaats = $_POST["woonplaats"];
$email = $_POST["email"];

echo "U hebt de volgende gegevens gewijzigd: <br>";
echo "Klantnummer: ".$klantnummer."<br>";
echo "Naam: ".$naam."<br>";
echo "Adres: ".$adres."<br>";
echo "Postcode: ".$postcode."<br>";
echo "Woonplaats: ".$woonplaats."<br>";
echo "Email: ".$email."<br>";

$query = "UPDATE klant SET klantnummer = '$klantnummer', naam = '$naam', adres = '$adres', postcode = '$postcode', woonplaats = '$woonplaats', email = '$email'
WHERE klantnummer = $klantnummer";

$resultaat = $dbVerbinding->query($query);

// sluiten database
$dbVerbinding->close();

}

?>

<p><input type ="button" value="Naar Overzicht" onClick="window.location.href='klant_overzicht.php'"></p>

</BODY>
</HTML>