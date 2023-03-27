<?php

require_once __DIR__ . '/pdo.php';

/**
 * AJOUTER UNE CATÉGORIE en bdd
 * @param PDO $bdd objet qui pilote la bdd
 * @param string $nom_categories : input du nom_categories
 * @return bool
 */
function ajouterUneCategorie(
    PDO $bdd,
    string $nom_categories
) {
    $sql = 'INSERT INTO 
    categories(categories.nom_categories)
    VALUES(:nom_categories)';
    $q = $bdd->prepare($sql);
    $q->bindParam('nom_categories', $nom_categories, PDO::PARAM_STR);
    return $q->execute();
}

/**
 * MODIFIER UNE CATÉGORIE en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $nom_categories : input du nom_categories
 * @param integer $id : id de la catégorie à modifier
 * @return bool
 */
function modifierUneCategorie(
    PDO $bdd,
    string $nom_categories,
    int $id
) {
    $sql = 'UPDATE categories
    SET categories.nom_categories =:nom_categories,
    categories.date_modification = NOW()
    WHERE categories.id_categories = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':nom_categories', $nom_categories);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * SUPPRIMER UNE CATÉGORIE ET SES PRODUITS en bdd -
 * contrainte : on delete cascade
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de la catégorie à supprimer
 * @return bool
 */
function supprimerUneCatégorie(PDO $bdd, int $id)
{
    $sql = 'DELETE FROM categories WHERE categories.id_categories = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * RETOURNER LES CATÉGORIES
 * @param PDO $bdd : objet qui pilote la bdd
 * @return array tuples : id, nom_categories
 */
function retournerLesCategories(PDO $bdd)
{
    $sql = 'SELECT 
    categories.id_categories, 
    categories.nom_categories
    FROM categories
    ORDER BY nom_categories ASC';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * RETOURNER UNE CATÉGORIE
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de la Categorie à retourner
 * @return array tuples : id, nom, photo(src), texte, prix, stock, id_categories(clé étrangère), nom_categories(categories)
 */
function retournerUneCategorie(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    categories.id_categories, 
    categories.nom_categories
    FROM categories 
    WHERE categories.id_categories = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * VERIFIER NOM CATEGORIE
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $nom : string à vérifier
 * @return bool : true si le nom existe déjà
 */
function verifierNomCategorie(PDO $bdd, string $nom) {
    $sql = 'SELECT
    categories.nom_categories
    FROM categories
    WHERE nom_categories = :nom';
    $q = $bdd->prepare($sql);
    $q->bindParam(':nom', $nom);
    $q->execute();
    $result = $q->rowCount();
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * TESTS UNITAIRES
 * Classe Debug
 * Fonctions var_dump et print_r
 */
//Debug::var_dump(modifierUneCategorie($bdd, 'test5', 15));
//Debug::var_dump(ajouterUneCategorie($bdd, 'test'));
//Debug::var_dump(supprimerUneCatégorie($bdd, 6));
//Debug::print_r(retournerLesCategories($bdd));
//Debug::print_r(retournerUneCategorie($bdd, 15));
//Debug::var_dump(verifierNomCategorie($bdd, 'test'));
