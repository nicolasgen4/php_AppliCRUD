<?php

require_once __DIR__ . '/pdo.php';

/**
 * RETOURNER LES PRODUITS
 * @param PDO $bdd : objet qui pilote la bdd
 * @return array tuples : id, nom, photo(src), texte, prix, stock, nom_categories(categories)
 */
function retournerLesProduits(PDO $bdd)
{
    $sql = 'SELECT 
    produits.id_produits, 
    produits.nom, 
    produits.photo, 
    produits.texte, 
    produits.prix, 
    produits.stock,
    categories.nom_categories
    FROM produits
    INNER JOIN categories ON categories.id_categories = produits.categories_id
    ORDER BY produits.nom ASC';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
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
    ORDER BY categories.nom_categories ASC';
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
//Debug::print_r(retournerLesProduits($bdd));
//Debug::print_r(retournerLesCategories($bdd));
//Debug::print_r(retournerUneAdresse($bdd, 1));
//Debug::print_r(retournerUneAnnonce($bdd, 1));