<html>

<head>
    <title>Klant factuur</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="klant_overzicht.php">Klant overzicht</a> > Klant factuur</h2>



    <?php // Database klaarmaken gedeelte

    include("../database.php");

    // klantnummer check
    $klantnr = $_POST["klantnr"];
    if (!isset($klantnr))
    {
        header("Location: klant_overzicht.php");
    }

    // klantinfo ophalen
    $query = "SELECT * FROM klanten WHERE klantnummer = $klantnr";
    $result = $dbVerbinding->query($query);

    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $klantinfo[] = $rij;
    }
    $klantinfo=$klantinfo[0];
    $result->free_result();

    ?>



    <table>
            <tr>
                <td></td>
                <td></td>
            </tr>
    
            <tr>
                <td><h3>Klantnaam:</h3></td>
                <td><h3><?php echo $klantinfo['naam'];?></h3></td>
            </tr>
    
            <tr>
                <td><h3>Adres:</h3></td>
                <td><h3><?php echo $klantinfo['adres'];?></h3></td>
            </tr>
    
            <tr>
                <td><h3>Woonplaats:</h3></td>
                <td><h3><?php echo $klantinfo['woonplaats'];?></h3></td>
            </tr>
    </table>


    <h2>Bestellingen</h2>

    <?php

    // bestellingen ophalen
    $query = "SELECT * FROM bestellingen WHERE klantnummer = $klantnr";
    $result = $dbVerbinding->query($query);

    while ($rij = $result->fetch_array(MYSQLI_ASSOC))
    {
        $bestellingen[] = $rij;
    }
    $result->free_result();




    foreach ($bestellingen as $i=>$v)
    {
        ?>
        <div>
        <table>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><h3>Bestellingnummer:</h3></td>
                <td><h3><?php echo $bestellingen[$i]['bestellingnummer'];?></h3></td>
            </tr>
            <tr>
                <td><h3>Factuurdatum:</h3></td>
                <td><h3><?php echo $bestellingen[$i]['besteldatum'];?></h3></td>
            </tr>
        </table>

        <table>
            <tr>
                <td><h3>Artikelnummer</h3></td>
                <td><h3>Aantal</h3></td>
            </tr>
        <?php

        $query = "SELECT * FROM bestellingregel WHERE bestellingnummer = ".$v["bestellingnummer"];
        $result = $dbVerbinding->query($query);

        while ($rij = $result->fetch_array(MYSQLI_ASSOC))
        {
            $artikelen[] = $rij;
        }
        $result->free_result();

        foreach ($artikelen as $a=>$b)
        {
            echo "<tr><td>".$b["artikelnummer"]."</td>
            <td>".$b["aantal"]."</td></tr>";
        }

        echo "</table></div>";
    }



    $dbVerbinding->close();

    ?>
    </div>

</body>

</html>