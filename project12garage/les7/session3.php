<?php

session_start();

session_destroy();

echo "Sessie beëindigd";
echo "<br>Naar <a href='session2.php'>vorige pagina</a>";
echo "<br>Naar <a href='session1.php'>begin</a>";

?>