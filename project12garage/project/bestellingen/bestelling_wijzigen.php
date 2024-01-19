<html>

<head>
    <title>Bestelling wijzigen</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="bestelling_overzicht.php">Bestelling overzicht</a> > Bestelling wijzigen</h2>



    <?php // Database klaarmaken gedeelte

    include("../database.php");

    $bestellingnr = $_POST["bestellingnr"];
    if (!isset($bestellingnr))
    {
        header("Location: bestelling_overzicht.php");
    }

    $query = "SELECT * FROM bestellingregel WHERE bestellingnummer = $bestellingnr";
    $result = $dbVerbinding->query($query);

    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $allerijen[$rij["artikelnummer"]] = $rij["aantal"];
    }

    $result->free_result();

    ?>

    <h3>Bestellingnummer: <?php echo $bestellingnr; ?></h3>

    <form action='bestelling_wijzigen_def.php' method='post'>
        <table>
            <tr>
                <td><h3>Artikelnummer</h3></td>
                <td><h3>Aantal</h3></td>
            </tr>

            <?php

            // tekstvelden maken en invullen
            foreach ($allerijen as $i=>$v)
            {
                echo "<tr>
                <td><h3>$i</h3></td>
                <td><input type='text' name='$i' value='$v'></td>
                </tr>";
            }

            $dbVerbinding->close();

            ?>

        </table>
        <input type='hidden' name='bestellingnr' value='<?php echo $bestellingnr; ?>'>
        <input type='submit' name='submit' value='Wijzigen'>
    </form> 
        </div>
</body>

</html>