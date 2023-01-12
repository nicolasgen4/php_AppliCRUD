<?php

require_once 'modele/informationsModele.php';

if (
    //MODIFICATION DES COORDONNEES
    isset(
        $_GET['action'],
        $_GET['id'],
        $_GET['informations']
    )
    && $_GET['action'] == 'modifier'
    && $_GET['informations'] == 'coordonnees'
) {
    //Affichage du formulaire de modification
    $coordonnees = retournerUneAdresse($bdd, 1);
    $coordonneesModif = retournerUneAdresse($bdd, $_GET['id']);
    $horaires = retournerLesHoraires($bdd);
    require_once 'vue/informationsVue.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['adresse'],
        $_POST['codePostal'],
        $_POST['ville'],
        $_POST['telephone'],
        $_POST['complement'],
        $_POST['facebook'],
        $_POST['idCoordonnees']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['adresse'])
        && !empty($_POST['codePostal'])
        && !empty($_POST['ville'])
        && !empty($_POST['telephone'])
        && !empty($_POST['idCoordonnees'])
    ) {
        //Envoi en bdd
        $succes = modifierUneAdresse(
            $bdd,
            strip_tags(trim($_POST['adresse'])),
            strip_tags(trim($_POST['codePostal'])),
            strip_tags(trim($_POST['ville'])),
            strip_tags(trim($_POST['telephone'])),
            strip_tags(trim($_POST['complement'])),
            strip_tags(trim($_POST['facebook'])),
            strip_tags(trim($_POST['idCoordonnees']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'Votre adresse a bien été actualisée'
        ];
        $horaires = retournerLesHoraires($bdd);
        $coordonnees = retournerUneAdresse($bdd, 1);
        require_once 'vue/informationsVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $horaires = retournerLesHoraires($bdd);
        $coordonneesModif = retournerUneAdresse($bdd, $_POST['idCoordonnees']);
        $coordonnees = retournerUneAdresse($bdd, 1);
        require_once 'vue/informationsVue.php';
    }
} elseif (
    //MODIFICATION DES HORAIRES
    isset(
        $_GET['action'],
        $_GET['id'],
        $_GET['informations']
    )
    && $_GET['action'] == 'modifier'
    && $_GET['informations'] == 'horaires'
) {
    //Affichage du formulaire de modification
    $coordonnees = retournerUneAdresse($bdd, 1);
    $horairesModif = retournerUneHoraire($bdd, $_GET['id']);
    $horaires = retournerLesHoraires($bdd);
    require_once 'vue/informationsVue.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['jour'],
        $_POST['matin'],
        $_POST['apresMidi'],
        $_POST['idHoraires']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['jour'])
        && !empty($_POST['idHoraires'])
    ) {
        //Envoi en bdd
        $succes = modifierUneHoraire(
            $bdd,
            strtolower(strip_tags(trim($_POST['jour']))),
            strtolower(strip_tags(trim($_POST['matin']))),
            strtolower(strip_tags(trim($_POST['apresMidi']))),
            strip_tags(trim($_POST['idHoraires']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'Vos horaires ont bien été actualisés'
        ];
        $horaires = retournerLesHoraires($bdd);
        $coordonnees = retournerUneAdresse($bdd, 1);
        require_once 'vue/informationsVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $horaires = retournerLesHoraires($bdd);
        $horairesModif = retournerUneHoraire($bdd, $_POST['idHoraires']);
        $coordonnees = retournerUneAdresse($bdd, 1);
        require_once 'vue/informationsVue.php';
    }
} else {
    //AFFICHER TOUTES LES INFORMATIONS
    $coordonnees = retournerUneAdresse($bdd, 1);
    $horaires = retournerLesHoraires($bdd);
    require_once 'vue/informationsVue.php';
}

