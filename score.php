<?php
// PHP-skript for å oppdatere poengsummen i databasen

// Hente dataene fra AJAX-forespørselen
$spiller_id = $_POST['spiller_id'];
$ny_poengsum = $_POST['score'];

// Koble til databasen 
$server = "localhost";
$user = "root";
$pw = "Admin";
$db_name = "terminoppgave";

include("db.connect.php");

try {
    // Oppdaterer poengsummen i databasen
    $sql = "INSERT INTO poengsum (spiller_id, score) VALUES ('$spiller_id', '$ny_poengsum');";
    mysqli_query($connection, $sql);

    // Lukk databasetilkoblingen
    mysqli_close($connection);

    echo "Poengsum oppdatert!";
}
    echo "Feil: " . $e->getMessage();

?>
