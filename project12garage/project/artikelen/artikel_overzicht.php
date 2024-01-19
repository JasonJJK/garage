<html>

<head>
    <title>Artikel overzicht</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>

    <h2><a href="../home.php">Home</a> > <a href="artikel_overzicht.php">Artikel overzicht</a></h2>

    <?php // Database klaarmaken gedeelte

    include("../database.php");

    // query
    $query = "SELECT * FROM artikelen LIMIT 50";
    $result = $dbVerbinding->query($query);

    // omzetten
    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $allerijen[] = $rij;
    }

    ?>

    <a href="artikel_aanmaken.php"><button>Artikel aanmaken</button></a>

    <table>
        <tr class="head">
            <td>artikelnummer</td>
            <td>artikelnaam</td>
            <td>categorie</td>
            <td>inkoopprijs</td>
            <td>verkoopprijs</td>
            <td>voorraad</td>
            <td></td>
        </tr>

        <?php

        // Table maken
        foreach($allerijen as $record)
        {
            echo "<tr>
            <td>$record[artikelnummer]</td>
            <td>$record[artikelnaam]</td>
            <td>$record[categorie]</td>
            <td>$record[inkoopprijs]</td>
            <td>$record[verkoopprijs]</td>
            <td>$record[voorraad]</td>

            <td>
            <form action='artikel_wijzigen.php' method='post'>
            <input type='hidden' name='artikelnr' value='$record[artikelnummer]'>
            <input type='submit' name='wijzig' value='wijzig'>
            </form>
            </td>

            <td>
            <form action='artikel_verwijderen.php' method='post'>
            <input type='hidden' name='artikelnr' value='$record[artikelnummer]'>
            <input type='submit' name='verwijderen' value='verwijderen'>
            </form>
            </td>

            ";
        }

        $result->free_result();
        $dbVerbinding->close();

        ?>

    </table>
    </div>
</body>

</html>