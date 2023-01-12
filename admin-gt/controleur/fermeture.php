<?php

require_once 'modele/fermetureModele.php';

if (
    //MODIFICATION DES COORDONNEES
    isset(
        $_GET['action'],
        $_GET['id'],
    )
    && $_GET['action'] == 'modifier'
) {
    //Affichage du formulaire de modification
    $annonceModif = retournerUneAnnonce($bdd, $_GET['id']);
    require_once 'vue/fermetureVue.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['annonceModifie'],
        $_POST['idAnnonce']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['annonceModifie'])
        && !empty($_POST['idAnnonce'])
    ) {
        //Envoi en bdd
        $succes = modifierUneAnnonce(
            $bdd,
            strip_tags(trim($_POST['annonceModifie'])),
            strip_tags(trim($_POST['idAnnonce']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'Votre annonce a bien été modifiée'
        ];
        $annonce = retournerUneAnnonce($bdd, 1);
        require_once 'vue/fermetureVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
    }
    $annonce = retournerUneAnnonce($bdd, 1);
    require_once 'vue/fermetureVue.php';
} elseif (
    //AJOUT D'UNE ANNONCE
    //Vérification des données
    isset(
        $_POST['submit'],
        $_POST['valeurAnnonce'],
        $_POST['texteAnnonce'],
        $_POST['idAnnonce']
    )
) {
    if (
        //Vérification des champs
        !empty([$_POST['valeurAnnonce']])
        && !empty($_POST['texteAnnonce'])
        && !empty($_POST['idAnnonce'])
    ) {
        //Envoi en bdd
        $succes = ajouterUneAnnonce(
            $bdd,
            strip_tags(trim($_POST['idAnnonce'])),
            strip_tags(trim($_POST['valeurAnnonce'])),
            strip_tags(trim($_POST['texteAnnonce']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'Votre salon est désormais fermé'
        ];
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
    }
    $annonce = retournerUneAnnonce($bdd, 1);
    require_once 'vue/fermetureVue.php';
} elseif (
    //SUPPRESSION DE L'ANNONCE
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'supprimer'
) {
    //Supprimer l'annonce
    $succes = supprimerUneAnnonce($bdd, $_GET['id']);
    $msg['message'] = [
        'code' => 'success',
        'text' => 'Votre salon est désormais ouvert'
    ];
    require_once 'vue/fermetureVue.php';
} else {
    //AFFICHER L'ANNONCE
    $annonce = retournerUneAnnonce($bdd, 1);
    require_once 'vue/fermetureVue.php';
}
