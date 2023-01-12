//Menu burger
const btnElt = document.getElementById("menu-burger");
let menuElt = document.querySelector("ul.menu-mobile");
let barresElt = document.getElementById("barres");
btnElt.addEventListener("click", () => {
    if (menuElt.classList.contains("invisible")) {
        menuElt.classList.remove("invisible");
        barresElt.style.fill = "#FAB2D7";
        if (document.body.contains(document.querySelector(".message")))
            document.querySelector(".message").style.visibility = "hidden";
    } else {
        menuElt.classList.add("invisible");
        barresElt.style.fill = "#2D2D2D";
    }
});

//Afficher l'aperçu d'une image chargée depuis localhost
const image = document.querySelector(".apercu");
prevImage = function (e) {
    const [photo] = e.files
    if (photo) {
        image.src = URL.createObjectURL(photo);
    };
    image.onload = function () {
        URL.revokeObjectURL(image.src);
    };
};

//Affiche/cache le bouton pour remonter la page
window.onscroll = () => {
    if (scrollY >= 800 && window.matchMedia("(min-width: 1350px)").matches) {
        document.getElementById("remonter-haut").style.display = "flex";
    } else {
        document.getElementById("remonter-haut").style.display = "none";
    }
};

//Empêche les formulaires d'être soumis à nouveau lors d'un F5
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}