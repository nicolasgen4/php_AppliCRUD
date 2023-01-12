<?php

require_once __DIR__ . '/pdo.php';

/**
 * AJOUTER UNE ANNONCE en bdd
 * @param PDO $bdd objet qui pilote la bdd
 * @param int $id : l'id fixe de l'annonce (1)
 * @param string $valeur : le type de l'annonce (fermé)
 * @param string $texte : le textarea de l'annonce
 * @return bool
 */
function ajouterUneAnnonce(
    PDO $bdd,
    int $id,
    string $valeur,
    string $texte
) {
    $sql = 'INSERT INTO 
    annonces(annonces.id_annonces,
    annonces.valeur,
    annonces.texte)
    VALUES(:id, :valeur, :texte)';
    $q = $bdd->prepare($sql);
    $q->bindParam('id', $id, PDO::PARAM_STR);
    $q->bindParam('valeur', $valeur);
    $q->bindParam('texte', $texte);
    return $q->execute();
}

/**
 * MODIFIER UNE ANNONCE en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $texte : textarea du texte de l'annonce
 * @param integer $id : id de l'annonce à modifier
 * @return bool
 */
function modifierUneAnnonce(
    PDO $bdd,
    string $texte,
    int $id
) {
    $sql = 'UPDATE annonces
    SET annonces.texte = :texte,
    annonces.date_modification = NOW()
    WHERE annonces.id_annonces = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':texte', $texte);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * SUPPRIMER UNE ANNONCE en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id fixe de l'annonce (1)
 * @return bool
 */
function supprimerUneAnnonce(PDO $bdd, int $id)
{
    $sql = 'DELETE FROM annonces WHERE annonces.id_annonces = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    return $q->execute();
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
//Debug::var_dump(ajouterUneAnnonce($bdd, 1, 'ferme', 'cest ferme'));
//Debug::var_dump(modifierUneAnnonce($bdd, 'modif', 1));
//Debug::var_dump(supprimerUneAnnonce($bdd, 1));
//Debug::print_r(retournerUneAnnonce($bdd, 1));