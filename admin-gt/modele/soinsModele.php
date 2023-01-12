<?php

require_once __DIR__ . '/pdo.php';

/**
 * AJOUTER UN PRODUIT en bdd
 * @param PDO $bdd objet qui pilote la bdd
 * @param string $nom : input du nom
 * @param string $photo : input de la photo
 * @param string $prix : input du prix
 * @param string $stock : input du stock
 * @param string $texte : textarea du texte
 * @param integer $categorie_id : clé étrangère vers la table categories
 * @return bool
 */
function ajouterUnProduit(
    PDO $bdd,
    string $nom,
    string $photo,
    string $prix,
    string $stock,
    string $texte,
    int $categorie_id
) {
    $sql = 'INSERT INTO 
    produits(produits.nom, 
    produits.photo, 
    produits.prix, 
    produits.stock, 
    produits.texte, 
    produits.categories_id)
    VALUES(:nom, :photo, :prix, :stock, :texte, :categorie_id)';
    $q = $bdd->prepare($sql);
    $q->bindParam('nom', $nom, PDO::PARAM_STR);
    $q->bindParam('photo', $photo);
    $q->bindParam('prix', $prix);
    $q->bindParam('stock', $stock);
    $q->bindParam('texte', $texte);
    $q->bindParam('categorie_id', $categorie_id);
    return $q->execute();
}

/**
 * MODIFIER UN PRODUIT en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $nom : input du nom
 * @param string $photo : input de la photo
 * @param string $prix : input du prix
 * @param string $stock : input du stock
 * @param string $texte : textarea du texte
 * @param integer $categories_id : clé étrangère vers la table categories
 * @param integer $id : id du produit à modifier
 * @return bool
 */
function modifierUnProduit(
    PDO $bdd,
    string $nom,
    string $photo,
    string $prix,
    string $stock,
    string $texte,
    int $categories_id,
    int $id
) {
    $sql = 'UPDATE produits
    SET produits.nom =:nom,
    produits.photo = :photo,
    produits.prix = :prix,
    produits.stock = :stock,
    produits.texte = :texte,
    produits.categories_id = :categories_id,
    produits.date_modification = NOW()
    WHERE produits.id_produits = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':nom', $nom);
    $q->bindParam(':photo', $photo);
    $q->bindParam(':prix', $prix);
    $q->bindParam(':stock', $stock);
    $q->bindParam(':texte', $texte);
    $q->bindParam(':categories_id', $categories_id);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * SUPPRIMER UN PRODUIT en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id du produit à supprimer
 * @return bool
 */
function supprimerUnProduit(PDO $bdd, int $id)
{
    $sql = 'DELETE FROM produits WHERE produits.id_produits = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    return $q->execute();
}

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
    ORDER BY produits.date_creation DESC';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * RETOURNER UN PRODUIT
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id du produit à retourner
 * @return array tuples : id, nom, photo(src), texte, prix, stock, id_categories(clé étrangère), nom_categories(categories)
 */
function retournerUnProduit(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    produits.id_produits, 
    produits.nom, 
    produits.photo, 
    produits.texte, 
    produits.prix, 
    produits.stock, 
    produits.categories_id,
    categories.nom_categories 
    FROM produits 
    INNER JOIN categories ON produits.categories_id = categories.id_categories
    WHERE produits.id_produits = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
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
    FROM categories';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * TESTS UNITAIRES
 * Classe Debug
 * Fonctions var_dump et print_r
 */
//Debug::var_dump(ajouterUnProduit($bdd, 'test', 'photo', 12, 5, 'texte', 1));
//Debug::var_dump(modifierUnProduit($bdd, 'modif', 'modif.png', 5, 5, 'moditxt', 1, 30));
//Debug::var_dump(supprimerUnProduit($bdd, 9));
//Debug::print_r(retournerLesProduits($bdd));
//Debug::print_r(retournerUnProduit($bdd, 83));
//Debug::print_r(retournerLesCategories($bdd));