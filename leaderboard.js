// Lytter på at DOM (Document Object Model) er ferdig lastet
document.addEventListener('DOMContentLoaded', function () {
    // Kaller funksjonen for å hente og vise leaderboard-data
    fetchLeaderboard();
});

// Funksjon for å hente leaderboard-data fra en API-endepunkt
function fetchLeaderboard() {
    // Anta at du har et API-endepunkt for å hente leaderboard-data
    fetch('/api/getLeaderboard.php')
        .then(response => response.json())  // Konverterer JSON-svaret til JavaScript-objekt
        .then(data => populateLeaderboard(data))  // Kaller funksjonen for å fylle leaderboard-tabellen
        .catch(error => console.error('Error fetching leaderboard:', error));  // Håndterer feil ved henting av leaderboard-data
}

// Funksjon for å fylle leaderboard-tabellen med data
function populateLeaderboard(leaderboardData) {
    // Henter referansen til tbody-elementet i leaderboard-tabellen
    const leaderboardBody = document.getElementById('leaderboard-body');
    
    // Går gjennom hvert spillerobjekt i leaderboardData
    leaderboardData.forEach(player => {
        // Oppretter en ny rad (tr-element) i tabellen
        const row = document.createElement('tr');
        
        // Setter inn HTML-innhold i raden med spillerens navn og poengsum
        row.innerHTML = `<td>${player.name}</td><td>${player.score}</td>`;
        
        // Legger til den opprettede raden til tbody-elementet
        leaderboardBody.appendChild(row);
    });
}  // Avsluttende klammer for populateLeaderboard-funksjonen


