<?php

        include ("database.php");
        $klantnr = $_POST['verstopt'];

        $query = "SELECT * FROM klant WHERE klantnummer = $klantnr";
        // Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
        $resultaat = $dbVerbinding->query($query);

        // De resultaten worden ingelezen
        $rij = $resultaat->fetch_array(MYSQLI_ASSOC);

        echo "

            <H1> Keukenprins - factuur klant</H1>
            <H3> Klantnaam $rij[naam]</H3>
       
            <table>
                <tr><td>Klantnummer: </td><td>$rij[klantnummer]</td></tr>
                <tr><td>Klantnaam: </td><td>$rij[naam]</td></tr>
                <tr><td>Adres: </td><td>$rij[adres]</td></tr>
                <tr><td>Postcode: </td><td>$rij[postcode]</td></tr>
                <tr><td>Woonplaats: </td><td>$rij[woonplaats]</td></tr>              
            </table>
        ";
        // Reset resultaat
        $resultaat->free_result();

        

        echo "<H2>Details bestelling</H2>";

        $query = "SELECT * FROM orderregel
                    INNER JOIN `order` ON `order`.ordernummer = orderregel.ordernummer
                    INNER JOIN artikel ON orderregel.artikelnummer = artikel.artikelnummer
                    WHERE `order`.klantnummer = $klantnr";
       
        // Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
        $resultaat = $dbVerbinding->query($query);

        // De resultaten worden ingelezen in een array
        while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC))
        {
            $allerijen[] = $rij;
        }

        echo "<TABLE border='1'>
                <TR><TH>ordernr</TH>
                <TH>artikelnr</TH>
                <TH>omschrijving</TH>
                <TH>aantal</TH>
                <TH>prijs</TH>
                <TH>bedrag</TH></TR>
        ";

        // Elke regel uit de array wordt in een tabel getoond
        foreach ($allerijen as $record)
        {  
            echo"<TR><TD>$record[ordernummer]</TD>";
            echo"<TD>$record[artikelnummer]</TD>";
            echo"<TD>$record[artikelnaam]</TD>";
            echo"<TD>$record[aantal]</TD>";
            echo"<TD>$record[prijs]</TD>";
            $bedrag = $record['aantal']*$record['prijs'];
            echo"<TD>$bedrag</TD>";
            echo "</TR>";            
        }
        echo "</TABLE>";

        //reset resultaat en sluit de verbinding
        $resultaat->free_result();
        $dbVerbinding->close();
 