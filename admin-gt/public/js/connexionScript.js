//Afficher en clair les mots de passe du champ
const motdepasseElt = document.getElementById("motdepasse");
const iconeElt = document.getElementById("icone-oeil");

iconeElt.addEventListener("click", () => {
    if (motdepasseElt.getAttribute("type") == "password") {
        iconeElt.style.fill = "#2D2D2D";
        motdepasseElt.type = "text";
    } else {
        iconeElt.style.fill = "#FAB2D7";
        motdepasseElt.type = "password";
    }
});