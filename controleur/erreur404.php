<?php

require_once 'modele/informationsModele.php';

$coordonnees = retournerUneAdresse($bdd, 1);

require_once 'vue/erreur404Vue.php';
