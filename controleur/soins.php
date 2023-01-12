<?php

require_once 'modele/soinsModele.php';

//Ouverture d'une session pour le panier
if (empty($_SESSION)) {
    session_set_cookie_params(['SameSite' => 'Lax', 'Secure' => true]);
    session_start();
}

$annonce = retournerUneAnnonce($bdd, 1);

$coordonnees = retournerUneAdresse($bdd, 1);

$produits = retournerLesProduits($bdd);

$categories = retournerLesCategories($bdd);

//SVG du panier
$panier = new EnteteSVG('public/images/svg/panier.svg');
$panier->redimensionner('60', '60');
$panier->definirUneCouleur('#2D2D2D');
$panier->definirUnTitre('Votre panier');

require_once 'vue/soinsVue.php';
