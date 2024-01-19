<?php
$server = "localhost";
$gebruiker = "root";
$wachtwoord = "dikketoeter";
$databasenaam = "garage_nieuwenhuis";

$dbVerbinding = new mysqli($server,$gebruiker,$wachtwoord,$databasenaam);

if ($dbVerbinding -> connect_errno) {
  echo "Failed to connect to MySQL: " . $dbVerbinding -> connect_error;
  exit();
}

?>