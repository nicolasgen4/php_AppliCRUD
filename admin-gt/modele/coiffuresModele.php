<?php

require_once __DIR__ . '/pdo.php';

/**
 * AJOUTER UNE COIFFURE en bdd
 * @param PDO $bdd objet qui pilote la bdd
 * @param string $photo : input de la photo
 * @param string $titre : input du titre
 * @param string $prix : input du prix
 * @param string $texte : textaera du texte
 * @return bool
 */
function ajouterUneCoiffure(
    PDO $bdd,
    string $photo,
    string $titre,
    string $prix,
    string $texte
) {
    $sql = 'INSERT INTO 
    coiffures(coiffures.photo,
    coiffures.titre,
    coiffures.prix,
    coiffures.texte)
    VALUES(:photo, :titre, :prix, :texte)';
    $q = $bdd->prepare($sql);
    $q->bindParam('photo', $photo, PDO::PARAM_STR);
    $q->bindParam('titre', $titre);
    $q->bindParam('prix', $prix);
    $q->bindParam('texte', $texte);
    return $q->execute();
}

/**
 * MODIFIER UNE COIFFURE en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $photo : input de la photo
 * @param string $titre : input du titre
 * @param string $prix : input du prix
 * @param string $texte : textarea du texte
 * @param integer $id : id de la coiffure à modifier
 * @return bool
 */
function modifierUneCoiffure(
    PDO $bdd,
    string $photo,
    string $titre,
    string $prix,
    string $texte,
    int $id
) {
    $sql = 'UPDATE coiffures
    SET coiffures.photo =:photo,
    coiffures.titre = :titre,
    coiffures.prix = :prix,
    coiffures.texte = :texte,
    coiffures.date_modification = NOW()
    WHERE coiffures.id_coiffures = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':photo', $photo);
    $q->bindParam(':titre', $titre);
    $q->bindParam(':prix', $prix);
    $q->bindParam(':texte', $texte);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * SUPPRIMER UNE COIFFURE en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de la coiffure à supprimer
 * @return bool
 */
function supprimerUneCoiffure(PDO $bdd, int $id)
{
    $sql = 'DELETE FROM coiffures WHERE coiffures.id_coiffures = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    return $q->execute();
}

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
 * RETOURNER UN PRODUIT
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id du produit à retourner
 * @return array tuples : id, nom, photo(src), texte, prix, stock, id_categories(clé étrangère), nom_categories(categories)
 */
function retournerUneCoiffure(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    coiffures.id_coiffures, 
    coiffures.photo, 
    coiffures.titre, 
    coiffures.prix,
    coiffures.texte
    FROM coiffures 
    WHERE coiffures.id_coiffures = :id';
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
//Debug::var_dump(ajouterUneCoiffure($bdd, 'test.png', 'mon test', '5', 'mon texte'));
//Debug::var_dump(modifierUneCoiffure($bdd, 'test.jpg', 'modif', '5', 'text', 11));
//Debug::var_dump(supprimerUneCoiffure($bdd, 10));
//Debug::print_r(retournerLesCoiffures($bdd));
//Debug::print_r(retournerUneCoiffure($bdd, 9));