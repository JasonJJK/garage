<html>

<head>
    <title>Artikel wijzigen</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="artikel_overzicht.php">Artikel overzicht</a> > Artikel wijzigen</h2>

    <table>
        <tr>
            <td></td>
            <td></td>
        </tr>

    <?php

    include('../database.php');

    if (isset($_POST['submit']))
    {
        echo "<h3>Artikel gewijzigd.</h3>";

        $artikelnummer = $_POST["artikelnummer"];
        $artikelnaam = $_POST["artikelnaam"];
        $categorie = $_POST["categorie"];
        $inkoopprijs = $_POST["inkoopprijs"];
        $verkoopprijs = $_POST["verkoopprijs"];
        $voorraad = $_POST["voorraad"];
        
        $query = "
        UPDATE artikelen SET 
        artikelnummer = '$artikelnummer', 
        artikelnaam = '$artikelnaam', 
        categorie = '$categorie', 
        inkoopprijs = '$inkoopprijs', 
        verkoopprijs = '$verkoopprijs', 
        voorraad = '$voorraad'
        WHERE artikelnummer = $artikelnummer";

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