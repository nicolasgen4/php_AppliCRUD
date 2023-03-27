<?php

require_once __DIR__ . '/pdo.php';

/**
 * MODIFIER UN ADMINISTRATEUR en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $nom : input du nom
 * @param string $photo : input du prenom
 * @param string $email : input de l'email
 * @param integer $id : id de l'admin à modifier
 * @return bool
 */
function modifierUnAdministrateur(
    PDO $bdd,
    string $nom,
    string $prenom,
    string $email,
    int $id
) {
    $sql = 'UPDATE administrateurs
    SET administrateurs.nom =:nom,
    administrateurs.prenom = :prenom,
    administrateurs.email = :email,
    administrateurs.date_modification = NOW()
    WHERE administrateurs.id_administrateurs = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':nom', $nom);
    $q->bindParam(':prenom', $prenom);
    $q->bindParam(':email', $email);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * AJOUTER UN ADMINISTRATEUR en bdd
 * @param PDO $bdd objet qui pilote la bdd
 * @param string $nom : input du nom
 * @param string $prenom : input du prenom
 * @param string $email : input de l'email
 * @param string $motdepasse : input du mot de passe
 * @return bool
 */
function ajouterUnAdministrateur(
    PDO $bdd,
    string $nom,
    string $prenom,
    string $email,
    string $motdepasse
) {
    $sql = 'INSERT INTO 
    administrateurs(administrateurs.nom,
    administrateurs.prenom,
    administrateurs.email,
    administrateurs.mot_de_passe)
    VALUES(:nom, :prenom, :email, :mot_de_passe)';
    $q = $bdd->prepare($sql);
    $q->bindParam('nom', $nom, PDO::PARAM_STR);
    $q->bindParam('prenom', $prenom);
    $q->bindParam('email', $email);
    $q->bindParam('mot_de_passe', $motdepasse);
    return $q->execute();
}

/**
 * SUPPRIMER UN ADMINISTRATEUR en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de l'admin à supprimer
 * @return bool
 */
function supprimerUnAdministrateur(PDO $bdd, int $id)
{
    $sql = 'DELETE FROM administrateurs WHERE administrateurs.id_administrateurs = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * RETOURNER LES ADMINISTRATEURS
 * @param PDO $bdd : objet qui pilote la bdd
 * @return array tuples : id, nom, prenom, email
 */
function retournerLesAdministrateurs(PDO $bdd)
{
    $sql = 'SELECT 
    administrateurs.id_administrateurs, 
    administrateurs.nom,
    administrateurs.prenom,
    administrateurs.email,
    administrateurs.role
    FROM administrateurs
    ORDER BY date_creation DESC';
    $q = $bdd->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * RETOURNER UN ADMINISTRATEUR
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de l'admin à retourner
 * @return array tuples : id, nom, prenom, email
 */
function retournerUnAdministrateur(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    administrateurs.id_administrateurs, 
    administrateurs.nom,
    administrateurs.prenom,
    administrateurs.email
    FROM administrateurs 
    WHERE administrateurs.id_administrateurs = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * VERIFIER EMAIL ADMIN
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $email : string à vérifier
 * @return bool : true si l'email existe déjà
 */
function verifierEmailAdmin(PDO $bdd, string $email)
{
    $sql = 'SELECT
    administrateurs.email
    FROM administrateurs
    WHERE administrateurs.email = :email';
    $q = $bdd->prepare($sql);
    $q->bindParam(':email', $email);
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
//Debug::var_dump(modifierUnAdministrateur($bdd, '', '', 'modifier@gmail.com', 2));
//Debug::var_dump(ajouterUnAdministrateur($bdd, 'test', '', 'montest@gmail', 'mdp'));
//Debug::var_dump(supprimerUnAdministrateur($bdd, 2));
//Debug::print_r(retournerLesAdministrateurs($bdd));
//Debug::print_r(retournerUnAdministrateur($bdd, 1));
//Debug::var_dump(verifierEmailAdmin($bdd, 'coiffeuse@gmail.com'));
