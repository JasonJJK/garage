<html>

<head>
    <title>Klant overzicht</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div>
    <h1>Garage Nieuwenhuis</h1>

    <h2><a href="../home.php">Home</a> > <a href="klant_overzicht.php">Klant overzicht</a></h2>

    <?php // Database klaarmaken gedeelte

    include("../database.php");

    // query
    $query = "SELECT * FROM klanten LIMIT 50";
    $result = $dbVerbinding->query($query);

    // omzetten
    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $allerijen[] = $rij;
    }

    ?>

    <a href="klant_aanmaken.php"><button>Klant aanmaken</button></a>

    <table>
        <tr class="head">
            <td>klantnummer</td>
            <td>naam</td>
            <td>adres</td>
            <td>postcode</td>
            <td>woonplaats</td>
            <td>email</td>
            <td></td>
        </tr>

        <?php

        // Table maken
        foreach($allerijen as $record)
        {
            echo "<tr>
            <td>$record[klantnummer]</td>
            <td>$record[naam]</td>
            <td>$record[adres]</td>
            <td>$record[postcode]</td>
            <td>$record[woonplaats]</td>
            <td>$record[email]</td>

            <td>
            <form action='klant_wijzigen.php' method='post'>
            <input type='hidden' name='klantnr' value='$record[klantnummer]'>
            <input type='submit' name='wijzig' value='wijzig'>
            </form>
            </td>

            <td>
            <form action='klant_verwijderen.php' method='post'>
            <input type='hidden' name='klantnr' value='$record[klantnummer]'>
            <input type='submit' name='verwijderen' value='verwijderen'>
            </form>
            </td>

            <td>
            <form action='klant_factuur.php' method='post'>
            <input type='hidden' name='klantnr' value='$record[klantnummer]'>
            <input type='submit' name='factuur' value='factuur'>
            </form>
            </td>

            ";
        }

        $result->free_result();
        $dbVerbinding->close();

        ?>
        </div>
    </table>
</body>

</html>