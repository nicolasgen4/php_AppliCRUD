<?php

/**
 * Contrôleur du formulaire de contact
 * Appelle le modèle du contact : fonctions PHPMailer
 * Affiche la vue
 * honeypot : champ vide anti spam
 */

require_once 'modele/contactModele.php';

$annonce = retournerUneAnnonce($bdd, 1);
$coordonnees = retournerUneAdresse($bdd, 1);

//Vérifie que le formulaire a été soumis
if (isset(
    $_POST['submit'],
    $_POST['name'],
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['sujet'],
    $_POST['message']
)) {
    //Récupère les données du formulaire
    $honeypot = htmlspecialchars(trim($_POST['name']));
    $nom = ucfirst(htmlspecialchars(trim($_POST['nom'])));
    $prenom = ucfirst(htmlspecialchars(trim($_POST['prenom'])));
    $email = strtolower(htmlspecialchars(trim($_POST['email'])));
    $sujet = ucfirst(htmlspecialchars(trim($_POST['sujet'])));
    $message = htmlspecialchars(trim($_POST['message']));
    //Vérifie si le champ anti-spam est vide et si les champs requis ne sont pas vides
    if (
        empty($honeypot)
        && !empty($nom)
        && !empty($prenom)
        && !empty($email)
        && !empty($sujet)
        && !empty($message)
    ) {
        //Succès
        //Vérifie si les nombres de caractères dans les champs sont corrects
        if (
            strlen($nom) >= 3 && strlen($nom) <= 50 &&
            strlen($prenom) >= 3 && strlen($prenom) <= 50 &&
            strlen($sujet) >= 10 && strlen($sujet) <= 70 &&
            strlen($email) >= 10 && strlen($email) <= 50 &&
            strlen($message) >= 10 && strlen($message) <= 2000
        ) {
            //Succès
            //Vérifie si le nom et le prénom n'ont pas de caractères spéciaux (accepte les espaces et tirets)
            if (
                preg_match("/^[A-Za-z .'-]+$/", $prenom) &&
                preg_match("/^[A-Za-z .'-]+$/", $nom)
            ) {
                //Succès
                //Vérifie si le champ email a bien une adresse mail
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    //Échec
                    $msg['message'] = [
                        'code' => 'warning',
                        'text' => 'Merci de saisir une adresse email valide !'
                    ];
                    require_once 'vue/contactVue.php';
                } else {
                    //Envoi du mail
                    envoiMail($prenom, $nom, $email, $sujet, $message);
                    //Envoi de l'accusé de réception
                    envoiAccuseReception($prenom, $nom, $email);
                    //Succès
                    $msg['message'] = [
                        'code' => 'success',
                        'text' => 'Votre message a bien été envoyé !'
                    ];
                    require_once 'vue/contactVue.php';
                }
            } else {
                //Échec du nom ou prénom
                $msg['message'] = [
                    'code' => 'warning',
                    'text' => 'Merci de saisir une identité valide !'
                ];
                require_once 'vue/contactVue.php';
            }
        } else {
            //Échec du nombre de caractères
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Merci de remplir correctement les champs !'
            ];
            require_once 'vue/contactVue.php';
        }
    } else {
        //Échec : champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir tous les champs !'
        ];
        require_once 'vue/contactVue.php';
    }
} else {
    require_once 'vue/contactVue.php';
}
