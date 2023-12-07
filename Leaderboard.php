<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hentet ikoner fra Ionicons -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>

    <title>Leaderboard</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <!-- Logo og navigasjonslenker -->
            <a id="ulv-logo" href="index.html"><img src="Logo/Ulv_logo.png" alt=" min Logo" height="70" width="70"></a>
            <li><a href="Leaderboard.php">Leaderboard</a></li>
            <li><a href="Logg_inn.php">Logg inn</a></li>
            <li><a href="FAQ.html">FAQ</a></li>
            <li><a href="Registrer_deg.php">Registrer deg</a></li>
        </ul>
    </nav>
</header>

<div class="leaderboard">
    <!-- Tabell for leaderboard -->
    <table id="leaderboard-table">
        <thead>
            <tr>
                <th>Spiller</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody id="leaderboard-body">
            <!-- Leaderboard data vil bli satt inn her dynamisk -->
            <tr>
                <td>Mustapha</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Per</td>
                <td>10</td>
            </tr>
            <tr>
                <td>Ahmed</td>
                <td>15</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>11</td>
            </tr>
            <tr>
                <td>Olav</td>
                <td>8</td>
            </tr>
        </tbody>
    </table>
</div>

<?php
// Koble til database
$server = "localhost";
$user = "root";
$pw = "Admin";
$db = "terminoppgave";

$conn = new mysqli($server, $user, $pw, $db);

// Sjekk tilkoblingen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hent leaderboard-data fra databasen
$sql = "SELECT name, score FROM leaderboard ORDER BY score DESC LIMIT 10";
$result = $conn->query($sql);

$leaderboardData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $leaderboardData[] = $row;
    }
}

$conn->close();
?>

   <!-- Footer-seksjon -->
   <footer class="footer3">
    <div class="footer-content">
        <div class="contact-info">
            <p>Kontakt oss: +47 455 456 789 | info@Flappy wolf.com</p>
        </div>
        <div class="quick-links">
            <ul>
                <li><a href="index.html">Hjem</a></li>
                <li><a href="Leaderboard.php">Leaderboard</a></li>
                <li><a href="FAQ.html">FAQ</a></li>
                <!-- Legg til flere lenker etter behov -->
            </ul>
        </div>
        <div class="social-media">
            <a href="https://nb-no.facebook.com/" target="_blank" rel="noopener noreferrer">Facebook</a>
            <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer">Twitter</a>
            <a href="https://www.linkedin.com/in/mustapha-lmesbahy-4a9575225/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
            <!-- Legg til flere sosiale medie-lenker etter behov -->
        </div>
        <div class="it-apprentice-guide">
            <a href="Dokumentasjon/IT_lærling/Opplærringsmateriale_It_lærling.pdf" target="_blank" rel="noopener noreferrer">Brukerveiledning for IT-lærling.</a>
            <a href="Dokumentasjon/Sluttbruker/Opplæringsmateriale_for_sluttbruker.pdf" target="_blank" rel="noopener noreferrer"> Brukerveiledning for Sluttbruker.</a>
          </div>
    </div>
    <div class="copyright">
        <p>&copy; 2023 Eksempelnettsted. Alle rettigheter reservert.</p>
    </div>
</footer>

<!-- Hentet JavaScript-fil for menyfunksjonalitet -->
<script src="menu.js"></script>

</body>
</html>
  