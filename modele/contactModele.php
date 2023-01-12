<?php

require __DIR__ . '/pdo.php';

/**
 * ENVOI MAIL DE CONTACT
 * @param string $prenom : input du prénom
 * @param string $nom : input du nom
 * @param string $email : input de l'email
 * @param string $sujet : input du sujet
 * @param string $message : textarea du message
 * @return bool
 */
function envoiMail($prenom, $nom, $email, $sujet, $message)
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
        $mail->Subject = 'Message depuis Genac Tif : ' . $sujet;
        $mail->Body    = 'Expéditeur : ' . $prenom . ' '  . $nom . '<br>' . 'Sujet : ' . $sujet . '<br>Email : ' . $email . '<br>Message: ' . $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


/**
 * ENVOI ACCUSÉ DE RÉCEPTION
 * @param string $prenom : input du prénom
 * @param string $nom : input du nom
 * @param string $email : input du mail
 * @return bool
 */
function envoiAccuseReception($prenom, $nom, $email)
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
        $mail->addAddress($email);         //Add a recipient
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
        $mail->Subject = 'Accusé de réception';
        $mail->Body    = 'Bonjour ' . $prenom . ' ' . $nom . ' !<br>' . 'J\'ai bien reçu votre message envoyé depuis Genac Tif (genac-tif.fr).<br>Merci de m\'avoir contacté, je vous répondrai le plus rapidement possible.';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
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
//Debug::print_r(retournerUneAdresse($bdd, 1));
//Debug::print_r(retournerUneAnnonce($bdd, 1));