<?php

/**
 * /index.php: Entrée de l'administration
 * Routeur de l'application
 * Appelle la configuration de la bdd
 * Appelle l'autoloader des Classes
 * Ouvre une session de connexion
 * Analyse la requête HTTP
 * Analyse la session d'admin
 * Route vers le bon controleur
 * Mise à jour : 18/10/2022
 */

session_set_cookie_params(['SameSite' => 'Lax', 'Secure' => true]);
session_start();

require_once 'inclure/conf.php';
require_once 'classes/Autoloader.php';
Autoloader::classes();

if (isset($_SESSION['administrateur'])) {
    if (isset($_GET['controleur'])) {
        switch ($_GET['controleur']) {
            case 'connexion':
            case 'accueil':
            case 'soins':
            case 'categories':
            case 'coiffures':
            case 'salon':
            case 'informations':
            case 'fermeture':
            case 'administrateurs':
            case 'profil':
                $controleur = $_GET['controleur'];
                break;
            default:
                $controleur = 'soins';
        }
    } else {
        $controleur = 'accueil';
    }
} else {
    $controleur = 'connexion';
}

require_once 'controleur/' . $controleur . '.php';
