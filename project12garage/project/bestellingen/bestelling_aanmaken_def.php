<html>

<head>
    <title>Bestelling aanmaken</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>

    <h2><a href="../home.php">Home</a> > <a href="bestelling_overzicht.php">Bestelling overzicht</a> > Bestelling aanmaken</h2>

    <?php

    include("../database.php");

    if ($_POST["submit"])
    {
        $bestellingnummer = $_POST["bestellingnummer"];
        $klantnummer = $_POST["klantnummer"];
        $besteldatum = $_POST["besteldatum"];
        $betaald = $_POST["betaald"];

        $query = "INSERT INTO bestellingen (`bestellingnummer`, `klantnummer`, `besteldatum`, `betaald`) VALUES ('$bestellingnummer', '$klantnummer', '$besteldatum', '$betaald')";

        $result = $dbVerbinding->query($query);

        unset($_POST["bestellingnummer"]);
        unset($_POST["klantnummer"]);
        unset($_POST["besteldatum"]);
        unset($_POST["betaald"]);
        array_pop($_POST);

        foreach ($_POST as $i=>$v)
        {
            if ($v != 0)
            {
                $query = "INSERT INTO bestellingregel (`bestellingnummer`, `artikelnummer`, `aantal`) VALUES ('$bestellingnummer', '$i', '$v')";

                $result = $dbVerbinding->query($query);
            }
        }

        echo "<h3>Bestelling aangemaakt.</h3>";
    }