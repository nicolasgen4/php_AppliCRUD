//Caroussel de la page salon
const images = [
    ["image1.webp", "Visiter le salon",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."],
    ["image2.webp", "Un salon de proximité",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."],
    ["image3.webp", "Une coiffeuse à l'écoute",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."],
    ["image4.webp", "Un moment à soi",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."],
    ["image5.webp", "Un joli bourg",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."]
];

const precedentElt = document.getElementById("precedent");
const suivantElt = document.getElementById("suivant");

let indice = 0;
affichage(indice);

precedentElt.addEventListener("click", function () {
    indice = cremente(indice, 0);
    affichage(indice);
});

suivantElt.addEventListener("click", function () {
    indice = cremente(indice, 1);
    affichage(indice);
});

function cremente(indice, sens) {
    if (sens) {
        indice++;
        indice = (indice > images.length - 1) ? 0 : indice;
    } else {
        indice--;
        indice = (indice < 0) ? images.length - 1 : indice;
    }
    return indice;
};

function affichage(indice) {
    let src = images[indice][0];
    let titre = images[indice][1];
    let legende = images[indice][2];
    document.querySelector("#caroussel img").src = "public/images/carrousel/" + src;
    document.querySelector(".titre-legende").textContent = titre;
    document.querySelector(".texte-legende").textContent = legende;
};