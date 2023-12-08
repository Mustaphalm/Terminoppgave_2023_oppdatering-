
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg inn</title>
</head>

<body>    <!-- logo for nettsiden -->

           <div class="Logo"></div>

    <header>
        <div class="menu-icon" onclick="toggleMenu()">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <nav class="nav-menu">            <!-- Navigasjonsmeny -->
            <ul>                     
                <li><a href="index.html"><img src="Logo/Ulv_logo.png" alt="min Logo" height="70" width="70"></a></li>
                <li><a href="Leaderboard.php">Leaderboard</a></li>
                <li><a href="Logg_inn.php">Logg inn</a></li>
                <li><a href="FAQ.html">FAQ</a></li>
                <li><a href="Registrer_deg.php">Registrer deg</a></li>
            </ul>
        </nav>
    </header>


                          <!--  logg inn form -->
    <main>
        <div class="login-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
                <!-- Overskrift for innloggingsformularet -->
                <h2 class ="h2-3">Logg Inn</h2>
                <!-- Inndatafelt for brukernavn -->
                <label for="brukernavn">Brukernavn:</label>
                <input type="text" id="brukernavn" name="brukernavn" placeholder="Brukernavn" required><br/>

                <!-- Inndatafelt for passord -->
                <label for="passord">Passord:</label>
                <input type="password" id="passord" name="passord" placeholder="Passord" required><br/>

                <!-- Knapp for å sende inn logindata -->
                <button type="submit">Logg Inn</button><br/>

                      <!-- Her slutter logg inn form-->



            
                             
                <?php
                    // Starte økten for å lagre brukerdata
                    session_start();
                    // Inkludere koblingen til databasen
                    include "db.connect.php";
    
                    // Sjekke om skjemaet er sendt
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Funksjon for å validere skjemadata
                        function validate($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        // Hente og validere brukernavn og passord fra skjemaet
                        $brukernavn = validate($_POST['brukernavn']);
                        $passord = validate($_POST['passord']);

                        // Sjekke om brukernavn eller passord er tomme
                        if (empty($brukernavn) || empty($passord)) {
                            echo "<p class='error-message'>Både brukernavn og passord er påkrevd!</p>";
                        } else {
                            // Hashing av passordet
                            $hashed_password = md5($passord);

                            // SQL-spørring for å hente brukeren basert på brukernavn og passord
                            $sql = "SELECT * FROM users WHERE username='$brukernavn' AND password='$hashed_password'"; 
                             //echo $sql;
                            // Utfører spørringen
                            $result = mysqli_query($conn, $sql);

                            // Sjekker om brukeren ble funnet
                            if ($result && mysqli_num_rows($result) === 1) {
                                // Henter brukerdata
                                $row = mysqli_fetch_assoc($result);
                                // Lagrer brukernavn og ID i økten
                                $_SESSION['brukernavn'] = $row['username'];
                                $_SESSION['id'] = $row['id'];
                                // Utgive en suksessmelding
                                echo "<p class='success-message'>Du har nå logget inn. <a href='flappy_wolf.html'>Trykk her for å starte spillet</a></p>";
                            } else {
                                // Utgive en feilmelding hvis brukeren ikke ble funnet
                                echo "<p class='error-message'>Feil brukernavn eller passord!</p>";
                            } 
                        }
                    }
                ?>
            </form>
        </div>
    </main>

                   

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


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script src="menu.js"></script>
</html>
