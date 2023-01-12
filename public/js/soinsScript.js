//Boutons de filtres de la page des soins
let filtresElt = document.querySelectorAll(".filtre");
let cartesElt = document.querySelectorAll(".item");

filtresElt.forEach(filtreElt => {
    filtreElt.addEventListener("click", () =>
        cartesElt.forEach(carteElt => {
            if (!carteElt.classList.contains(filtreElt.textContent)) {
                carteElt.style.display = "none";
            } else {
                carteElt.style.display = "flex";
            }
        }));
});


//Boutons pour retirer les filtres
const resetElt = document.getElementById("reinitialiser");

resetElt.addEventListener("click", () => {
    cartesElt.forEach(carteElt => {
        carteElt.style.display = "flex";
    })
});


//Mode vacances pour empêcher les réservations
let boutonsElt = document.querySelectorAll(".reserver");

boutonsElt.forEach(boutonElt => {
    if (boutonElt.classList.contains("ferme")) {
        boutonElt.textContent = "Fermé";
        boutonElt.setAttribute("type", "button");
    }
});