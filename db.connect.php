<?php
$server = "localhost";
$user = "root";
$pw = "FeilPassord"; // Gi et feil passord her
$db = "terminoppgave";

// Opprett tilkobling
$conn = mysqli_connect($server, $user, $pw, $db);

// Sjekk tilkobling
if (!$conn) {
    echo "Database connection failed! " . mysqli_connect_error();
    exit();
}
?>
