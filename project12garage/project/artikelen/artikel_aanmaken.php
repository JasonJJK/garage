<html>

<head>
    <title>Artikel aanmaken</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div>
    <h1>Garage Nieuwenhuis</h1>
    <h2><a href="../home.php">Home</a> > <a href="artikel_overzicht.php">Artikel overzicht</a> > Artikel aanmaken</h2>


    <form action='artikel_aanmaken_def.php' method='post'>
        <table>
            <tr>
                <td></td>
                <td></td>
            </tr>

            <?php

            $fields = ["artikelnummer", "artikelnaam", "categorie", "inkoopprijs", 'verkoopprijs', 'voorraad'];

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
        <input type='submit' name='submit' value='Aanmaken'>
    </form> 
        </div>
</body>

</html>