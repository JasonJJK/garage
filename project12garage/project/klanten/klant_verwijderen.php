<html>

<head>
    <title>Klant verwijderen</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="klant_overzicht.php">Klant overzicht</a> > Klant verwijderen</h2>



    <?php // Database klaarmaken gedeelte

    include("../database.php");

    // klantnummer check
    $klantnr = $_POST["klantnr"];
    if (!isset($klantnr))
    {
        header("Location: klant_overzicht.php");
    }

    // query + ophalen
    $query = "SELECT * FROM klanten WHERE klantnummer = $klantnr";
    $result = $dbVerbinding->query($query);

    // omzetten
    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $allerijen[] = $rij;
    }

    ?>



    <form action='klant_verwijderen_def.php' method='post'>
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
                <td><input type='text' readonly='readonly' name='$i' value='$v'></td>
                </tr>";
            }

            $result->free_result();
            $dbVerbinding->close();

            ?>

        </table>
        <input type='submit' name='submit' value='Verwijderen'>
    </form> 
        </div>
</body>

</html>