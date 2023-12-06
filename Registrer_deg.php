<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <title>Registrer deg</title>
</head>

<body>
    <div class="Logo"></div>

    <header>
        <div class="menu-icon" onclick="toggleMenu()">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <nav class="nav-menu">
            <ul>
                <a id="ulv-logo" href="Index.html">
                    <img src="Logo/Ulv_logo.png" alt=" min Logo" height="70" width="70">
                </a>
                <li><a href="Leaderboard.php">Leaderboard</a></li>
                <li><a href="Logg_inn.php">Logg inn</a></li>
                <li><a href="FAQ.html">FAQ</a></li>
                <li><a href="Registrer_deg.php">Registrer deg</a></li>
            </ul>
        </nav>
    </header>


    
        <!-- Her starter registreringsformen -->
    
    <main>
        <div class="registration-container">
            <h2>Registrering</h2>
            <!-- Registreringsskjema -->
<form class="registration-form" method="post">
                <label for="fornavn">Fornavn:</label>
                <input type="text" id="fornavn" name="fornavn" placeholder="Fornavn" required><br/>

                <label for="etternavn">Etternavn:</label>
                <input type="text" id="etternavn" name="etternavn" placeholder="Etternavn" required><br/>

                <label for="brukernavn">Brukernavn:</label>
                <input type="text" id="brukernavn" name="brukernavn" placeholder="Velg et brukernavn" required><br/>

                <label for="passord">Passord:</label>
                <input type="password" id="passord" name="passord" placeholder="Velg et passord" required><br/>

                <button type="submit">Registrer</button><br/>


                
                <?php
// Inkluderer databasekoblingen
require __DIR__ . '/db.connect.php'; // Juster stien ved behov

// Håndterer registreringslogikk når skjemaet sendes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Funksjon for validering av inndata
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Valider og rens inndata
    $fornavn = validate($_POST['fornavn']);
    $etternavn = validate($_POST['etternavn']);
    $brukernavn = validate($_POST['brukernavn']);
    $passord = validate($_POST['passord']);

    // Sjekk om alle påkrevde felt er oppgitt
    if (empty($fornavn) || empty($etternavn) || empty($brukernavn) || empty($passord)) {
        echo "Alle felt er påkrevd!";
        exit();
    }

    // Hashing av passordet
    $hashed_password = md5($passord);

    // Sjekk om brukernavnet allerede eksisterer ved hjelp av en forberedt uttalelse
    $check_username_query = "SELECT * FROM users WHERE username=?";
    $stmt_check = mysqli_prepare($conn, $check_username_query);

    if ($stmt_check === false) {
        echo "Feil i forberedt uttalelse: " . mysqli_error($conn);
        exit();
    }

    mysqli_stmt_bind_param($stmt_check, "s", $brukernavn);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        echo "Brukernavnet eksisterer allerede! Prøv et annet.";
    } else {
        
        // Sett inn en ny bruker i databasen ved hjelp av en forberedt uttalelse
        $insert_user_query = "INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $insert_user_query);

        if ($stmt_insert === false) {
            echo "Feil i forberedt uttalelse: " . mysqli_error($conn);
            exit();
        }

        mysqli_stmt_bind_param($stmt_insert, "ssss", $fornavn, $etternavn, $brukernavn, $hashed_password);

        if (mysqli_stmt_execute($stmt_insert)) {
            echo "Registrering vellykket! Du kan nå <a href='Logg_inn.php'>logge inn</a>.";
            
            // Redirect brukeren til en annen side hvis ønskelig
        } else {
            echo "Registrering feilet. Prøv igjen senere. " . mysqli_stmt_error($stmt_insert);
        }

        mysqli_stmt_close($stmt_insert);
    }

    mysqli_stmt_close($stmt_check);
}

// Lukk databaseforbindelsen
mysqli_close($conn);
?>



</form>
   </div>
     </main>

<!-- Her starter footer -->
<footer class="footer bottom">


    <ul class="social-icon">
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://www.facebook.com/">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://twitter.com/">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://www.linkedin.com/in/mustapha-lmesbahy-4a9575225//">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>
      </ul>

</footer>
</body>
<script src="menu.js"></script> 
</html>

