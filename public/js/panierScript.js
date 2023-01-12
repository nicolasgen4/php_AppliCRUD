//Si le formulaire de réservation est affiché
//En fonction du jour sélectionné, affiche les horaires disponibles
//Se réinitialise si on sélectionne un autre jour
if (document.body.contains(document.getElementById("reservation"))) {

    const joursElt = document.getElementById("jour");
    const selectMomentElt = document.getElementById("moment");
    let momentsElt = document.querySelectorAll(".moments");

    momentsElt.forEach(momentElt => {
        momentElt.style.display = "none";
        joursElt.addEventListener("change", () => {
            if (!momentElt.classList.contains(joursElt.value)) {
                momentElt.style.display = "none";
                selectMomentElt.selectedIndex = 0;
            } else if (momentElt.textContent !== "Fermé") {
                momentElt.style.display = "flex";
            }
        });
    });
};