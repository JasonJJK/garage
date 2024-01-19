<html>

<head>
    <title>Klant verwijderen</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="klant_overzicht.php">Klant overzicht</a> > Klant verwijderen</h2>

    <table>
        <tr>
            <td></td>
            <td></td>
        </tr>

    <?php

    include('../database.php');

    if (isset($_POST['submit']))
    {
        $klantnummer = $_POST['klantnummer'];
        $query = "DELETE FROM klanten WHERE klantnummer = $klantnummer";

        echo "<h3>Klant verwijdered.</h3>";

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