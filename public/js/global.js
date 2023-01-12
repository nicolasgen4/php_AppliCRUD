//Menu burger
const btnElt = document.getElementById("menu-burger");
let menuElt = document.querySelector("ul.menu-mobile");
let barresElt = document.getElementById("barres");

btnElt.addEventListener("click", () => {
    if (menuElt.classList.contains("invisible")) {
        menuElt.classList.remove("invisible");
        barresElt.style.fill = "#FAB2D7";
    } else {
        menuElt.classList.add("invisible");
        barresElt.style.fill = "#2D2D2D";
    }
});


//Affiche/cache le bouton pour remonter la page
window.onscroll = () => {
    if (scrollY >= 800 && window.matchMedia("(min-width: 1350px)").matches) {
        document.getElementById("remonter-haut").style.display = "flex";
    } else {
        document.getElementById("remonter-haut").style.display = "none";
    }
};


//Transition entre le chargement des pages
window.onpageshow = () => {
    document.body.style.opacity = "1";
    document.body.style.transition = "ease-in-out 0.8s";
}


//Empêche les formulaires d'être soumis à nouveau lors d'un F5
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}