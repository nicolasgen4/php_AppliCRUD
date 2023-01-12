<?php

require_once 'modele/informationsModele.php';

$annonce = retournerUneAnnonce($bdd, 1);
$coordonnees = retournerUneAdresse($bdd, 1);
$horaires = retournerLesHoraires($bdd);

require_once 'vue/informationsVue.php';
