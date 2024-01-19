<html>

<head>
    <title>Klant aanmaken</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="klant_overzicht.php">Klant overzicht</a> > Klant aanmaken</h2>

    <table>
        <tr>
            <td></td>
            <td></td>
        </tr>

    <?php

    include('../database.php');

    if (isset($_POST['submit']))
    {
        echo "<h3>Klant aangemaakt.</h3>";

        $klantnummer = $_POST["klantnummer"];
        $naam = $_POST["naam"];
        $adres = $_POST["adres"];
        $postcode = $_POST["postcode"];
        $woonplaats = $_POST["woonplaats"];
        $email = $_POST["email"];
        
        $query = "
        INSERT INTO `klanten` (`klantnummer`, `naam`, `adres`, `postcode`, `woonplaats`, `email`) VALUES 
        ('$klantnummer', '$naam', '$naam', '$postcode', '$woonplaats', '$email');";

        foreach ($_POST as $i=>$v)
        {
            if ($i == 'submit')
            {
                continue;
            }
            echo "<tr>
            <td><h3>$i</h3></td>
            <td><input type='text' disabled='disabled' name='$i' value='$v'></td>
            </tr>";
        }

        $resultaat = $dbVerbinding->query($query);
    }
    else
    {
        echo "<h3>Er is iets misgegaan.</h3>";
    }

    ?>

    </table>
</div>
</body>

</html>