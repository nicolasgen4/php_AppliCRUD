<?php

require_once __DIR__ . '/pdo.php';

/**
 * MODIFIER DES COORDOONNES en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $adresse : input de l'adresse
 * @param string $codepostal : input du code postal
 * @param string $telephone : input du téléphone
 * @param string $complement : input du complément
 * @param string $facebook : input du facebook
 * @param integer $id : id des coordonnees à modifier
 * @return bool
 */
function modifierUneAdresse(
    PDO $bdd,
    string $adresse,
    string $codepostal,
    string $ville,
    string $telephone,
    string $complement,
    string $facebook,
    int $id
) {
    $sql = 'UPDATE coordonnees
    SET coordonnees.adresse =:adresse,
    coordonnees.code_postal = :codepostal,
    coordonnees.ville = :ville,
    coordonnees.telephone = :telephone,
    coordonnees.complement = :complement,
    coordonnees.facebook = :facebook,
    coordonnees.date_modification = NOW()
    WHERE coordonnees.id_coordonnees = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':adresse', $adresse);
    $q->bindParam(':codepostal', $codepostal);
    $q->bindParam(':ville', $ville);
    $q->bindParam(':telephone', $telephone);
    $q->bindParam(':complement', $complement);
    $q->bindParam(':facebook', $facebook);
    $q->bindParam(':id', $id);
    return $q->execute();
}

/**
 * RETOURNER LES COORDONNEES
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de l'adresse à retourner
 * @return array tuples : id, adresse, code postal, ville, téléphone
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
 * MODIFIER UNE HORAIRE en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param string $jour : input du jour
 * @param string $matin : input des horaires du matin
 * @param string $apresmidi : input des horaires de l'après midi
 * @param integer $id : id des horaires à modifier
 * @return bool
 */
function modifierUneHoraire(
    PDO $bdd,
    string $jour,
    string $matin,
    string $apresmidi,
    int $id
) {
    $sql = 'UPDATE horaires
    SET horaires.jour =:jour,
    horaires.matin = :matin,
    horaires.apres_midi = :apresmidi,
    horaires.date_modification = NOW()
    WHERE horaires.id_horaires = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':jour', $jour);
    $q->bindParam(':matin', $matin);
    $q->bindParam(':apresmidi', $apresmidi);
    $q->bindParam(':id', $id);
    return $q->execute();
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
 * RETOURNER UNE HORAIRE
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $id : id de l'horaire à retourner
 * @return array tuples : id, jour, matin, après midi
 */
function retournerUneHoraire(PDO $bdd, int $id)
{
    $sql = 'SELECT 
    horaires.id_horaires, 
    horaires.jour, 
    horaires.matin, 
    horaires.apres_midi
    FROM horaires
    WHERE horaires.id_horaires = :id';
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
//Debug::var_dump(modifierUneAdresse($bdd, '123 Rue bidon', '16000', '0645691257', 'complément', 'url', 1));
//Debug::print_r(retournerUneAdresse($bdd, 1));
//Debug::var_dump(modifierUneHoraire($bdd, 'test', 'modif', '', 1));
//Debug::print_r(retournerLesHoraires($bdd));
//Debug::var_dump(retournerUneHoraire($bdd, 1));