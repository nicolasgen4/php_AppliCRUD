<?php

//SVG oeil
$oeil = new EnteteSVG('../public/images/svg/oeil.svg');
$oeil->redimensionner('29', '29');
$oeil->definirUneCouleur('#FAB2D7');
$oeil->definirUnId('icone-oeil');
$oeil->definirUnTitre('Afficher le mot de passe');

if (
    //TENTATIVE DE CONNEXION
    //Vérification des données
    isset(
        $_POST['identifiant'],
        $_POST['motdepasse']
    )
) {
    //Vérification des champs
    if (
        !empty($_POST['identifiant'])
        && !empty($_POST['motdepasse'])
    ) {
        //Vérification d'un email valide
        if (
            filter_var($_POST['identifiant'], FILTER_VALIDATE_EMAIL) === false
        ) {
            //Erreur email non valide
            $_SESSION['message'] = [
                'code' => 'warning',
                'text' => 'Merci de saisir une adresse email valide'
            ];
            header('Location: connexion');
        } else {
            //Préparation de la connexion
            require_once 'modele/connexionModele.php';
            $identifiant = [
                'type' => 'email',
                'valeur' => $_POST['identifiant']
            ];
            $administrateur = retournerUneConnexion($bdd, $identifiant);
            if ($administrateur) {
                //Comparaison des mots de passe
                if (password_verify($_POST['motdepasse'], $administrateur['mot_de_passe'])) {
                    //Succès de la connexion
                    $_SESSION['administrateur'] = $administrateur;
                    header('Location: accueil');
                } else {
                    //Erreur d'identifiants
                    $_SESSION['message'] = [
                        'code' => 'warning',
                        'text' => 'Les identifiants ne correspondent pas'
                    ];
                    header('Location: connexion');
                }
            } else {
                //Erreur d'identifiants
                $_SESSION['message'] = [
                    'code' => 'warning',
                    'text' => 'Les identifiants ne correspondent pas'
                ];
                header('Location: connexion');
            }
        }
    } else {
        //Erreur champs vides
        $_SESSION['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir tous les champs'
        ];
        header('Location: connexion');
    }
} elseif (
    //DECONNEXION ADMINISTRATEUR
    isset($_GET['action'])
    && $_GET['action'] == 'deconnexion'
) {
    //Déconnecté avec succès
    unset($_SESSION['administrateur']);
    header('Location: connexion');
    $_SESSION['message'] = [
        'code' => 'success',
        'text' => 'Vous avez été déconnecté(e)'
    ];
} else {
    require_once 'vue/connexionVue.php';
}
