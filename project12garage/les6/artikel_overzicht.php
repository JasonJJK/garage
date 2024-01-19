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
    
    <TD>artikelnummer</TD>
    <TD>artikelnaam</TD>
    <TD>Categorie</TD>
    <TD>prijs</TD>
    <TD>aantal_in_voorraad</TD>
    
    </TR>
    
    <?php
    
    // Bepaal query
    // Selecteer de eerste 5 klanten
    $query="SELECT * FROM artikel LIMIT 100";
    
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
    echo"<TR><TD>$record[artikelnummer]</TD>";
    echo"<TD>$record[artikelnaam]</TD>";
    echo"<TD>$record[Categorie]</TD>";
    echo"<TD>$record[prijs]</TD>";
    echo"<TD>$record[aantal_in_voorraad]</TD>";
    
    echo "<TD><FORM action='artikel_wijzigen.php' method='post'>
    <input type='hidden' name='verstopt' value='$record[artikelnummer]'>
    <input type = 'submit' name='wijzig' value='wijzig'>
    </FORM></TD>";
    
    echo "<TD><FORM action='artikel_verwijderen.php' method='post'>
    <input type='hidden' name='verstopt' value='$record[artikelnummer]'>
    <input type = 'submit' name='verwijder' value='verwijder'>
    </FORM></TD></TR>";
    }
    
    // Reset resultaat en sluit de verbinding
    $resultaat->free_result();
    $dbVerbinding->close();
    
    ?>
    </TABLE>
    </BODY>
    </HTML>