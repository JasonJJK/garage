<html>

<head>
    <title>Bestelling overzicht</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>

    <h2><a href="../home.php">Home</a> > <a href="bestelling_overzicht.php">Bestelling overzicht</a></h2>

    <?php // Database klaarmaken gedeelte

    include("../database.php");

    // query
    $query = "SELECT * FROM bestellingen";
    $result = $dbVerbinding->query($query);

    // omzetten
    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $allerijen[] = $rij;
    }

    ?>

    <a href="bestelling_aanmaken.php"><button>Bestelling aanmaken</button></a>

    <table>
        <tr class="head">
            <td>bestellingnummer</td>
            <td>klantnummer</td>
            <td>besteldatum</td>
            <td>betaald</td>
            <td></td>
        </tr>

        <?php

        // Table maken
        foreach($allerijen as $record)
        {
            echo "<tr>
            <td>$record[bestellingnummer]</td>
            <td>$record[klantnummer]</td>
            <td>$record[besteldatum]</td>
            <td>$record[betaald]</td>

            <td>
            <form action='bestelling_wijzigen.php' method='post'>
            <input type='hidden' name='bestellingnr' value='$record[bestellingnummer]'>
            <input type='submit' name='wijzig' value='wijzig'>
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