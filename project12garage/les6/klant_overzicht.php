<HTML>
    <HEAD>
    <TITLE>De Keukenprins</TITLE>
    </HEAD>
    
    <BODY>
    
    <?php
    //in database.php wordt de verbinding naar de database gemaakt
    include("database.php");
    ?>
    
    <H1> Overzicht klanten</H1>
    <TABlE border="1">
    <TR>
    
    <TD>klantnummer</TD>
    <TD>naam</TD>
    <TD>adres</TD>
    <TD>postcode</TD>
    <TD>woonplaats</TD>
    <TD>email</TD>
    <TD>wijzig</TD>
    
    </TR>
    
    <?php
    
    // Bepaal query
    // Selecteer de eerste 5 klanten
    $query="SELECT * FROM klant LIMIT 100";
    
    // Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
    $resultaat = $dbVerbinding->query($query);
    
    // De resultaten worden ingelezen in een array
    while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC))
    {
    $allerijen[] = $rij;
    }
    
    // Elke regel uit de array wordt in een tabel getoond
    foreach ($allerijen as $record)
    {
    echo"<TR><TD>$record[klantnummer]</TD>";
    echo"<TD>$record[naam]</TD>";
    echo"<TD>$record[adres]</TD>";
    echo"<TD>$record[postcode]</TD>";
    echo"<TD>$record[woonplaats]</TD>";
    echo"<TD>$record[email]</TD>";
    
    echo "<TD><FORM action='klant_wijzigen.php' method='post'>
    <input type='hidden' name='verstopt' value='$record[klantnummer]'>
    <input type = 'submit' name='wijzig' value='wijzig'>
    </FORM></TD>";

    echo "<TD><FORM action='klant_verwijderen.php' method='post'>
    <input type='hidden' name='verstopt' value='$record[klantnummer]'>
    <input type = 'submit' name='verwijder' value='verwijder'>
    </FORM></TD>";

    echo "<TD><FORM action='klant_factuur.php' method='post'>
    <input type='hidden' name='verstopt' value='$record[klantnummer]'>
    <input type = 'submit' name='factuur' value='factuur'>
    </FORM></TD></TR>";
    }
    
    // Reset resultaat en sluit de verbinding
    $resultaat->free_result();
    $dbVerbinding->close();
    
    ?>
    </TABLE>
    </BODY>
    </HTML>