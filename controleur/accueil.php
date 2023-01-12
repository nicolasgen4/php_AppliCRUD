<?php

require_once 'modele/informationsModele.php';

$coordonnees = retournerUneAdresse($bdd, 1);

//SVG des ciseaux
$ciseaux = new EnteteSVG('public/images/svg/ciseaux.svg');
$ciseaux->redimensionner('50', '50');
$ciseaux->definirUneCouleur('#2D2D2D');
$ciseaux->definirUnTitre('Descendre vers les services');

require_once 'vue/accueilVue.php';