<?php

require_once 'modele/adminModele.php';

if (
    //MODIFICATION DES ADMINISTRATEURS
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'modifier'
) {
    //Affichage du formulaire de modification
    $admininistrateurModif = retournerUnAdministrateur($bdd, $_GET['id']);
    require_once 'vue/adminVueModifier.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['nomAdminModif'],
        $_POST['prenomAdminModif'],
        $_POST['emailAdminModif'],
        $_POST['idAdminModif']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['emailAdminModif'])
        && !empty($_POST['idAdminModif'])
    ) {
        //Vérification d'un email valide
        if (
            filter_var($_POST['emailAdminModif'], FILTER_VALIDATE_EMAIL) === false
        ) {
            //Erreur email non valide
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Merci de saisir une adresse email valide'
            ];
            $admininistrateurModif = retournerUnAdministrateur($bdd, $_POST['idAdminModif']);
            require_once 'vue/adminVueModifier.php';
        } else {
            //Envoi en bdd
            $succes = modifierUnAdministrateur(
                $bdd,
                strip_tags(trim($_POST['nomAdminModif'])),
                strip_tags(trim($_POST['prenomAdminModif'])),
                strip_tags(trim($_POST['emailAdminModif'])),
                strip_tags(trim($_POST['idAdminModif']))
            );
            $msg['message'] = [
                'code' => 'success',
                'text' => 'L\'administrateur a bien été modifié'
            ];
            $administrateurs = retournerLesAdministrateurs($bdd);
            require_once 'vue/adminVue.php';
        }
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $admininistrateurModif = retournerUnAdministrateur($bdd, $_POST['idAdminModif']);
        require_once 'vue/adminVueModifier.php';
    }
} elseif (
    //AJOUT D'UN ADMINISTRATEUR
    //Vérification des données
    isset(
        $_POST['submit'],
        $_POST['nomAdmin'],
        $_POST['prenomAdmin'],
        $_POST['emailAdmin'],
        $_POST['mdpAdmin']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['emailAdmin'])
        && !empty($_POST['mdpAdmin'])
    ) {
        //Vérification d'un email valide
        if (
            filter_var($_POST['emailAdmin'], FILTER_VALIDATE_EMAIL) === false
        ) {
            //Erreur email non valide
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Merci de saisir une adresse email valide'
            ];
            $administrateurs = retournerLesAdministrateurs($bdd);
            require_once 'vue/adminVue.php';
        } else {
            if (verifierEmailAdmin($bdd, $_POST['emailAdmin']) == false) {
                //Envoi en bdd
                $succes = ajouterUnAdministrateur(
                    $bdd,
                    strip_tags(trim($_POST['nomAdmin'])),
                    strip_tags(trim($_POST['prenomAdmin'])),
                    strip_tags(trim($_POST['emailAdmin'])),
                    strip_tags(trim(password_hash($_POST['mdpAdmin'], PASSWORD_DEFAULT)))
                );
                $msg['message'] = [
                    'code' => 'success',
                    'text' => 'L\'administrateur a bien été ajouté'
                ];
                $administrateurs = retournerLesAdministrateurs($bdd);
                require_once 'vue/adminVue.php';
            } else {
                //Erreur email existe déjà
                $msg['message'] = [
                    'code' => 'warning',
                    'text' => 'Merci de choisir un autre email'
                ];
                $administrateurs = retournerLesAdministrateurs($bdd);
                require_once 'vue/adminVue.php';
            }
        }
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $administrateurs = retournerLesAdministrateurs($bdd);
        require_once 'vue/adminVue.php';
    }
} elseif (
    //SUPPRESSION D'UN ADMINISTRATEUR
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'supprimer'
) {
    //Supprimer l'administrateur
    $succes = supprimerUnAdministrateur($bdd, $_GET['id']);
    $msg['message'] = [
        'code' => 'success',
        'text' => 'L\'administrateur a bien été supprimé'
    ];
    $administrateurs = retournerLesAdministrateurs($bdd);
    require_once 'vue/adminVue.php';
} else {
    //AFFICHER LES ADMINISTRATEURS
    $administrateurs = retournerLesAdministrateurs($bdd);
    require_once 'vue/adminVue.php';
}
