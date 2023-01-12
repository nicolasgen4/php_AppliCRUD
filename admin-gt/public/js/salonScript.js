//Aperçu de la nouvelle image lors du changement des photos du carrousel
let boutonsEtl = document.querySelectorAll("button");

photoCarrousel1.onchange = evt => {
    const [file] = photoCarrousel1.files;
    if (file) {
        photo1.src = URL.createObjectURL(file);
    };
    photo1.onload = function () {
        URL.revokeObjectURL(photo1.src);
    };
};

photoCarrousel2.onchange = evt => {
    const [file] = photoCarrousel2.files;
    if (file) {
        photo2.src = URL.createObjectURL(file);
    };
    photo2.onload = function () {
        URL.revokeObjectURL(photo2.src);
    };
};

photoCarrousel3.onchange = evt => {
    const [file] = photoCarrousel3.files;
    if (file) {
        photo3.src = URL.createObjectURL(file);
    };
    photo3.onload = function () {
        URL.revokeObjectURL(photo3.src);
    };
};

photoCarrousel4.onchange = evt => {
    const [file] = photoCarrousel4.files;
    if (file) {
        photo4.src = URL.createObjectURL(file);
    };
    photo4.onload = function () {
        URL.revokeObjectURL(photo4.src);
    };
};

photoCarrousel5.onchange = evt => {
    const [file] = photoCarrousel5.files;
    if (file) {
        photo5.src = URL.createObjectURL(file);
    };
    photo5.onload = function () {
        URL.revokeObjectURL(photo5.src);
    };
};
