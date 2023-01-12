<?php

require_once __DIR__ . '/pdo.php';

/**
 * RETOURNER LES COIFFURES
 * @param PDO $bdd : objet qui pilote la bdd
 * @return array tuples : id, photo(src), titre, prix, texte
 */
function retournerLesCoiffures(PDO $bdd)
{
    $sql = 'SELECT 
    coiffures.id_coiffures, 
    coiffures.photo, 
    coiffures.titre, 
    coiffures.prix, 
    coiffures.texte
    FROM coiffures
    ORDER BY coiffures.date_creation DESC';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * RETOURNER LES COORDONNEES
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de l'adresse à retourner
 * @return array tuples : id, adresse, code postal, ville, téléphone, complement, facebook
 */
function retournerUneAdresse(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    coordonnees.id_coordonnees, 
    coordonnees.adresse, 
    coordonnees.code_postal, 
    coordonnees.ville, 
    coordonnees.telephone,
    coordonnees.complement,
    coordonnees.facebook
    FROM coordonnees 
    WHERE coordonnees.id_coordonnees = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * TESTS UNITAIRES
 * Classe Debug
 * Fonctions var_dump et print_r
 */
//Debug::print_r(retournerLesCoiffures($bdd));
//Debug::print_r(retournerUneAdresse($bdd, 1));