<?php

require_once 'modele/coiffuresModele.php';

$coordonnees = retournerUneAdresse($bdd, 1);

$coiffures = retournerLesCoiffures($bdd);

require_once 'vue/coiffuresVue.php';