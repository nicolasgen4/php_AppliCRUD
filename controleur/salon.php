<?php

require_once 'modele/informationsModele.php';

$coordonnees = retournerUneAdresse($bdd, 1);

//SVG des flèches du carrousel
$flecheSv = new EnteteSVG('public/images/svg/fleche.svg');
$flecheSv->redimensionner('18', '30');
$flecheSv->definirUneCouleur('#FDFDFD');
$flecheSv->definirUnTitre('Passer à l\'image suivante');

$flechePr = new EnteteSVG('public/images/svg/fleche.svg');
$flechePr->redimensionner('18', '30');
$flechePr->definirUneCouleur('#FDFDFD');
$flechePr->definirUnTitre('Revenir à l\'image précédente');

require_once 'vue/salonVue.php';
