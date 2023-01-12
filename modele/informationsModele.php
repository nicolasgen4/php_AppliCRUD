<?php

require __DIR__. '/pdo.php';

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
 * RETOURNER LES HORAIRES
 * @param PDO $bdd : objet qui pilote la bdd
 * @return array tuples : id, jour, matin, après midi
 */
function retournerLesHoraires(PDO $bdd)
{
    $sql = 'SELECT 
    horaires.id_horaires, 
    horaires.jour, 
    horaires.matin, 
    horaires.apres_midi
    FROM horaires
    ORDER BY horaires.id_horaires ASC';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * RETOURNER UNE ANNONCE
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id fixe de l'annonce (1)
 * @return array tuples : id, valeur, texte
 */
function retournerUneAnnonce(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    annonces.id_annonces, 
    annonces.valeur,
    annonces.texte
    FROM annonces 
    WHERE annonces.id_annonces = :id';
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
//Debug::print_r(retournerUneAdresse($bdd, 1));
//Debug::print_r(retournerLesHoraires($bdd));
//Debug::print_r(retournerUneAnnonce($bdd, 1));