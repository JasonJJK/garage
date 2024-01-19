<html>

<head>
    <title>Bestelling aanmaken</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="bestelling_overzicht.php">Bestelling overzicht</a> > Bestelling aanmaken</h2>


    <form action='bestelling_aanmaken_def.php' method='post'>
        <table>
            <tr>
                <td></td>
                <td></td>
            </tr>

            <?php

            include("../database.php");

            $fields = ["bestellingnummer", "klantnummer", "besteldatum", "betaald"];

            // tekstvelden maken en invullen
            foreach ($fields as $i)
            {
                echo "<tr>
                <td><h3>$i</h3></td>
                <td><input type='text' name='$i' value=''></td>
                </tr>";
            }

            ?>  

            </table>

            <table>
            <tr>
                <td><h3>Artikelnummer</h3></td>
                <td><h3>Aantal</h3></td>
            </tr>


            <?php

            $query = "SELECT * FROM artikelen";

            $result = $dbVerbinding->query($query);

            while ($rij = $result->fetch_array(MYSQLI_ASSOC))
            {
                $artikelnummer = $rij["artikelnummer"];
                echo "<tr>
                <td><h3>$artikelnummer</h3></td>
                <td><input type='text' name='$artikelnummer' value='0'></td>
                </tr>";
            }

            $result->free_result();

            ?>

        </table>
        <input type='submit' name='submit' value='Aanmaken'>
    </form> 
        </div>
</body>

</html>