<?php

require_once __DIR__ . '/pdo.php';

/**
 * RETOURNER UNE CONNEXION - 
 * tentative de connexion
 * @param PDO $bdd
 * @param array $identifiant : type et valeur
 * @return array tuples : id, nom, prenom, email, mot de passe
 */
function retournerUneConnexion(PDO $bdd, array $identifiant)
{
    $sql = 'SELECT 
    administrateurs.id_administrateurs, 
    administrateurs.nom,
    administrateurs.prenom,
    administrateurs.email,
    administrateurs.mot_de_passe,
    administrateurs.role
    FROM administrateurs 
    WHERE ' . $identifiant['type'] . '=?';
    $q = $bdd->prepare($sql);
    $q->execute([$identifiant['valeur']]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * TESTS UNITAIRES
 * Classe Debug
 * Fonctions var_dump et print_r
 */
/*
$identifiant = [
    'type' => 'id_administrateurs',
    'valeur' => '1'
];
Debug::print_r(retournerUneConnexion($bdd, $identifiant));
*/