<?php
$server = "localhost";
$user = "root";
$pw = "Admin";
$db = "terminoppgave";

// Opprett tilkobling
$conn = mysqli_connect($server, $user, $pw, $db);

// Sjekk tilkobling
if (!$conn) {
    echo "Database connection failed! ";
    exit();
}
