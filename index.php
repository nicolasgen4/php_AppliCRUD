<?php

/**
 * /index.php: Entrée de l'application
 * Routeur de l'application
 * Appelle la configuration de la bdd
 * Appelle l'autoloader des Classes
 * Analyse la requête HTTP
 * Route vers le bon controleur
 * Mise à jour : 18/10/2022
 */

require_once 'admin-gt/inclure/conf.php';
require_once 'admin-gt/classes/Autoloader.php';
Autoloader::classes();

if (isset($_GET['controleur'])) {
    switch ($_GET['controleur']) {
        case 'accueil':
        case 'soins':
        case 'panier':
        case 'merci':
        case 'coiffures':
        case 'salon':
        case 'contact':
        case 'informations':
        case 'mentions':
            $controleur = $_GET['controleur'];
            break;
        default:
            $controleur = 'erreur404';
    }
} else {
    $controleur = 'accueil';
}

require_once 'controleur/' . $controleur . '.php';
