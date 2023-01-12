<?php

require_once __DIR__ . '/pdo.php';

/**
 * MODIFIER UN PROFIL en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $nom : input du nom
 * @param string $prenom : input du prenom
 * @param string $motdepasse : input du mot de passe
 * @param string $email : input de l'email
 * @param integer $id : id de l'admin à modifier
 * @return bool
 */
function modifierUnProfil(
    PDO $bdd,
    string $nom,
    string $prenom,
    string $motdepasse,
    string $email,
    int $id
) {
    $sql = 'UPDATE administrateurs
    SET administrateurs.nom =:nom,
    administrateurs.prenom = :prenom,
    administrateurs.mot_de_passe = :motdepasse,
    administrateurs.email = :email,
    administrateurs.date_modification = NOW()
    WHERE administrateurs.id_administrateurs = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':nom', $nom);
    $q->bindParam(':prenom', $prenom);
    $q->bindParam(':motdepasse', $motdepasse);
    $q->bindParam(':email', $email);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * RETOURNER UN PROFIL
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de l'admin à retourner
 * @return array tuples : id, nom, prenom, email, mot de passe
 */
function retournerUnProfil(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    administrateurs.id_administrateurs, 
    administrateurs.nom,
    administrateurs.prenom,
    administrateurs.email,
    administrateurs.mot_de_passe
    FROM administrateurs 
    WHERE administrateurs.id_administrateurs = :id';
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
//Debug::var_dump(modifierUnProfil($bdd, 'test', '', '123', 'test5@gmail.com', 4));
//Debug::print_r(retournerUnProfil($bdd, 1));