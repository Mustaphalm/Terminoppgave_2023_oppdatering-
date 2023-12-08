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
}  


