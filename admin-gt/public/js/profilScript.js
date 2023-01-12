//Afficher en clair les mots de passe des différents champs
const passeProfilElt = document.getElementById("passeProfil");
const iconeActuelElt = document.getElementById("icone-actuel");

const nouveauMdpElt = document.getElementById("nouveauMdp");
const iconeNouveauElt = document.getElementById("icone-nouveau");

const confirmMdpElt = document.getElementById("confirmMdp");
const iconeConfirmElt = document.getElementById("icone-confirm");

//Champ : mot de passe actuel du profil
iconeActuelElt.addEventListener("click", () => {
    if (passeProfilElt.getAttribute("type") == "password") {
        iconeActuelElt.style.fill = "#2D2D2D";
        passeProfilElt.type = "text";
    } else {
        iconeActuelElt.style.fill = "#FAB2D7";
        passeProfilElt.type = "password";
    }
});

//Champ : nouveau mot de passe
iconeNouveauElt.addEventListener("click", () => {
    if (nouveauMdpElt.getAttribute("type") == "password") {
        iconeNouveauElt.style.fill = "#2D2D2D";
        nouveauMdpElt.type = "text";
    } else {
        iconeNouveauElt.style.fill = "#FAB2D7";
        nouveauMdpElt.type = "password";
    }
});

//Champ : vérifier le nouveau mot de passe
iconeConfirmElt.addEventListener("click", () => {
    if (confirmMdpElt.getAttribute("type") == "password") {
        iconeConfirmElt.style.fill = "#2D2D2D";
        confirmMdpElt.type = "text";
    } else {
        iconeConfirmElt.style.fill = "#FAB2D7";
        confirmMdpElt.type = "password";
    }
});


//Vérification des deux champs de mots de passe
nouveauMdpElt.addEventListener('input', verifierMdp);
confirmMdpElt.addEventListener('input', verifierMdp);

function verifierMdp() {
    if (nouveauMdpElt.value === confirmMdpElt.value) {
        nouveauMdpElt.style.textDecoration = "none"
        confirmMdpElt.style.textDecoration = "none"
        return true;
    } else if (nouveauMdpElt.value != confirmMdpElt.value) {
        nouveauMdpElt.style.textDecoration = "underline wavy #FF0000 1px"
        confirmMdpElt.style.textDecoration = "underline wavy #FF0000 1px"
        return false;
    }
}
