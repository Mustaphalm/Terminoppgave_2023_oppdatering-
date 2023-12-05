// Funksjon for å veksle visningen av navigasjonsmenyen
function toggleMenu() {
    // Hent referanse til navigasjonsmenyen ved å velge elementet med klassen 'nav-menu'
    const navMenu = document.querySelector('.nav-menu');

    // Sett visningsstilen til 'none' hvis den er 'block', ellers sett den til 'block'
    navMenu.style.display = (navMenu.style.display === 'block') ? 'none' : 'block';
}


