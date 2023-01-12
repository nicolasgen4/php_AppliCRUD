<?php

/**
 * Connexion à la base de données
 * Objet PDO
 */
try {
    $location = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
    $pdo_options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
    );
    $bdd = new PDO($location, DBUSER, DBPASSWORD, $pdo_options);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
