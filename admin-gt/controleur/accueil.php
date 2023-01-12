<?php

//Affiche le nom de l'admin connecté
if (!empty($_SESSION['administrateur']['prenom'])) {
    $identite = $_SESSION['administrateur']['prenom'];

} elseif (!empty($_SESSION['administrateur']['nom'])) {
    $identite = $_SESSION['administrateur']['nom'];
    
} else {
    $identite = $_SESSION['administrateur']['email'];
}

//SVG des flèches
$flecheRose = new EnteteSVG('../public/images/svg/fleche-rose.svg');
$flecheRose->redimensionner('18', '30');
$flecheRose->definirUneCouleur('#FAB2D7');
$flecheRose->definirUnTitre('Flèche pointant vers le menu');

require_once 'vue/accueilVue.php';
