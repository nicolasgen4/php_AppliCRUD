<?php

require_once 'modele/profilModele.php';

//SVG oeil : mdp actuel
$oeilAct = new EnteteSVG('../public/images/svg/oeil.svg');
$oeilAct->redimensionner('29', '29');
$oeilAct->definirUneCouleur('#FAB2D7');
$oeilAct->definirUnId('icone-actuel');
$oeilAct->definirUnTitre('Afficher le mot de passe');

//SVG oeil : nouveau mdp
$oeilNv = new EnteteSVG('../public/images/svg/oeil.svg');
$oeilNv->redimensionner('29', '29');
$oeilNv->definirUneCouleur('#FAB2D7');
$oeilNv->definirUnId('icone-nouveau');
$oeilNv->definirUnTitre('Afficher le mot de passe');

//SVG oeil : confirmer mdp
$oeilConf = new EnteteSVG('../public/images/svg/oeil.svg');
$oeilConf->redimensionner('29', '29');
$oeilConf->definirUneCouleur('#FAB2D7');
$oeilConf->definirUnId('icone-confirm');
$oeilConf->definirUnTitre('Afficher le mot de passe');

$profil = retournerUnProfil($bdd, $_SESSION['administrateur']['id_administrateurs']);

if (
    //MODIFICATION D'UN PROFIL
    isset(
        //Vérification des données
        $_POST['nomProfil'],
        $_POST['prenomProfil'],
        $_POST['passeProfil'],
        $_POST['nouveauMdp'],
        $_POST['confirmMdp'],
        $_POST['emailProfil'],
        $_POST['idProfil']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['passeProfil'])
        && !empty($_POST['nouveauMdp'])
        && !empty($_POST['confirmMdp'])
        && !empty($_POST['emailProfil'])
        && !empty($_POST['idProfil'])
    ) {
        if (
            //Vérification des mots de passe
            password_verify($_POST['passeProfil'], $profil['mot_de_passe'])
            && $_POST['nouveauMdp'] == $_POST['confirmMdp']
        ) {
            if (
                filter_var($_POST['emailProfil'], FILTER_VALIDATE_EMAIL) === false
            ) {
                //Erreur email non valide
                $msg['message'] = [
                    'code' => 'warning',
                    'text' => 'Merci de saisir une adresse email valide'
                ];
                $profil = retournerUnProfil($bdd, $_SESSION['administrateur']['id_administrateurs']);
                require_once 'vue/profilVue.php';
            } else {
                //Envoi en bdd
                $mot_de_passe = password_hash($_POST['confirmMdp'], PASSWORD_DEFAULT);
                $succes = modifierUnProfil(
                    $bdd,
                    strip_tags(trim($_POST['nomProfil'])),
                    strip_tags(trim($_POST['prenomProfil'])),
                    strip_tags(trim($mot_de_passe)),
                    strip_tags(trim($_POST['emailProfil'])),
                    strip_tags(trim($_POST['idProfil']))
                );
                $msg['message'] = [
                    'code' => 'success',
                    'text' => 'Votre profil a été mis à jour'
                ];
                $profil = retournerUnProfil($bdd, $_SESSION['administrateur']['id_administrateurs']);
                require_once 'vue/profilVue.php';
            }
        } else {
            //Erreur identifiants
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Votre profil n\'a pas pu être modifié'
            ];
            $profil = retournerUnProfil($bdd, $_SESSION['administrateur']['id_administrateurs']);
            require_once 'vue/profilVue.php';
        }
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $profil = retournerUnProfil($bdd, $_SESSION['administrateur']['id_administrateurs']);
        require_once 'vue/profilVue.php';
    }
} else {
    require_once 'vue/profilVue.php';
}
