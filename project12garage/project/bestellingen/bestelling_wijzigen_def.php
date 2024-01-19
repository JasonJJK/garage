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

    if ($_POST["submit"])
    {
        array_pop($_POST);
        $bestellingnr = $_POST["bestellingnr"];
        array_pop($_POST);

        foreach ($_POST as $i=>$v)
        {
            $query = "UPDATE bestellingregel SET aantal = '$v' WHERE bestellingnummer = '$bestellingnr' AND artikelnummer = '$i'";
            $resultaat = $dbVerbinding->query($query);
        }

        echo "<h3>Bestelling gewijzigd.</h3>";
    }
    
    ?>

    </div>
</body>

</html>