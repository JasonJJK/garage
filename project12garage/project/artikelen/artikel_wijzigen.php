<html>

<head>
    <title>Artikel wijzigen</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="artikel_overzicht.php">Artikel overzicht</a> > Artikel wijzigen</h2>



    <?php // Database klaarmaken gedeelte

    include("../database.php");

    // klantnummer check
    $artikelnr = $_POST["artikelnr"];
    if (!isset($artikelnr))
    {
        header("Location: artikel_overzicht.php");
    }

    // query + ophalen
    $query = "SELECT * FROM artikelen WHERE artikelnummer = $artikelnr";
    $result = $dbVerbinding->query($query);

    // omzetten
    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $allerijen[] = $rij;
    }

    ?>



    <form action='artikel_wijzigen_def.php' method='post'>
        <table>
            <tr>
                <td></td>
                <td></td>
            </tr>

            <?php

            // tekstvelden maken en invullen
            foreach ($allerijen[0] as $i=>$v)
            {
                echo "<tr>
                <td><h3>$i</h3></td>
                <td><input type='text' name='$i' value='$v'></td>
                </tr>";
            }

            $result->free_result();
            $dbVerbinding->close();

            ?>

        </table>
        <input type='submit' name='submit' value='Wijzigen'>
    </form> 
        </div>
</body>

</html>