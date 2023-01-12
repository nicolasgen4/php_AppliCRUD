<?php

require_once __DIR__ . '/pdo.php';

/**
 * ENVOI MAIL DE RÉSERVATION
 * @param string $nom : input du prénom
 * @param string $prenom : input du nom
 * @param string $telephone : input du téléphone
 * @param string $jour : select du jour
 * @param string $moment : select du moment
 * @param string $message : textarea du message
 * @param string $reservation : ul du panier
 * @return bool
 */
function envoiReservation($nom, $prenom, $email, $jour, $moment, $message, $reservation)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                                     //SMTP username
        $mail->Password   = '';                                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('', '');
        $mail->addAddress('');                                      //Add a recipient
        //$mail->addAddress('ellen@example.com');                   //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');             //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        //Optional name

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->CharSet = "UTF-8";
        $mail->Subject = 'Réservation de ' . $prenom . ' ' . $nom;
        $mail->Body    = 'Expéditeur : ' . $prenom . ' '  . $nom . '<br>' . 'Email : ' . $email . '<br>' . 'Le client passera ' . strtolower($jour) . ' vers ' . strtolower($moment) . '.<br> Produits réservés : ' . $reservation . '<br> Message du client : ' . $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

/**
 * ENVOI RÉCAPITULATIF DE LA RÉSERVATION
 * @param string $prenom : input du prénom
 * @param string $nom : input du nom
 * @param string $email : input du mail
 * @param string $jour : select du jour
 * @param string $moment : select de l'horaire
 * @param string $reservation : ul du panier
 * @return bool
 */
function envoiRecap($nom, $prenom, $email, $jour, $moment, $reservation)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                                     //SMTP username
        $mail->Password   = '';                                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('', '');
        $mail->addAddress($email);                                  //Add a recipient
        //$mail->addAddress('ellen@example.com');                   //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');             //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        //Optional name

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->CharSet = "UTF-8";
        $mail->Subject = 'Votre réservation de produits';
        $mail->Body    = 'Bonjour ' . $prenom . ' ' . $nom . '.<br> J\'ai bien reçu votre réservation de produits pour ' . $jour . ' vers ' . $moment . '.<br> Récapitulatif de votre réservation : ' . $reservation . '<br> À bientôt au salon !';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

/**
 * MODIFIER UN STOCK en bdd
 * @param PDO $bdd : objet qui pilote la bdd
 * @param integer $stock : le stock du produit
 * @param integer $id : id du produit à modifier
 * @return bool
 */
function modifierUnStock(
    PDO $bdd,
    int $stock,
    int $id
) {
    $sql = 'UPDATE produits
    SET produits.stock =:stock,
    produits.date_modification = NOW()
    WHERE produits.id_produits = :id';
    $q = $bdd->prepare($sql);
    $q->bindParam(':stock', $stock);
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
 * TESTS UNITAIRES
 * Classe Debug
 * Fonctions var_dump et print_r
 */
//Debug::var_dump(modifierUnStock($bdd, 6, 1));
//Debug::print_r(retournerLesHoraires($bdd));
//Debug::print_r(retournerUneAdresse($bdd, 1));
//Debug::print_r(retournerUneAnnonce($bdd, 1));
//Debug::print_r(retournerUnProduit($bdd, 83));