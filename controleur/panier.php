<?php

require_once 'modele/panierModele.php';

$annonce = retournerUneAnnonce($bdd, 1);
$horaires = retournerLesHoraires($bdd);
$coordonnees = retournerUneAdresse($bdd, 1);

//SVG du panier
$corbeille = new EnteteSVG('public/images/svg/corbeille.svg');
$corbeille->redimensionner('19', '24');
$corbeille->definirUneCouleur('#2D2D2D');
$corbeille->definirUnTitre('Corbeille');

//GESTION DU CONTENU DU PANIER
if (empty($_SESSION['cart'])) {
    //Création d'un nouveau panier
    $_SESSION['cart'] =
        $cart = new Cart([
            'cartMaxItem'      => 0,
            'itemMaxQuantity'  => 99,
            'useCookie'        => false,
        ]);
    if (
        //MODIFICATION DE LA QUANTITÉ
        isset($_GET['action'])
        && $_GET['action'] == 'modifier'
    ) {
        if (isset(
            //Vérification des données
            $_POST['submit'],
            $_POST['quantiteModif'],
            $_POST['idProduit'],
            $_POST['prixProduit']
        )) {
            if (
                //Vérification des champs
                !empty($_POST['quantiteModif'])
                && !empty($_POST['idProduit'])
                && !empty($_POST['prixProduit'])
            ) {
                //Modification de la quantité
                $cart->update(
                    $_POST['idProduit'],
                    $_POST['quantiteModif'],
                    [
                        'price'  => $_POST['prixProduit'],
                    ]
                );
            }
        }
    } elseif (
        //AJOUT D'UN PRODUIT
        //Vérification des données
        isset(
            $_POST['submit'],
            $_POST['quantiteProduit'],
            $_POST['idProduit'],
            $_POST['prixProduit']
        )
    ) {
        if (
            //Vérification des champs
            !empty($_POST['quantiteProduit'])
            && !empty($_POST['idProduit'])
            && !empty($_POST['prixProduit'])
        ) {
            //Ajout d'un produit
            $cart->add(
                $_POST['idProduit'],
                $_POST['quantiteProduit'],
                [
                    'price'  => $_POST['prixProduit'],
                ]
            );
        }
    } elseif (
        isset(
            //SUPPRESSION D'UN PRODUIT
            $_GET['action'],
            $_GET['id']
        ) && $_GET['action'] == 'supprimer'
    ) {
        $cart->remove($_GET['id']);
    }
    //AFFICHAGE DU CONTENU
    $allItems = $cart->getItems();
}


//ENVOI DU FORMULAIRE DE RÉSERVATION
//Vérifie que le formulaire a été soumis
if (isset(
    $_POST['submit'],
    $_POST['nomClient'],
    $_POST['prenomClient'],
    $_POST['emailClient'],
    $_POST['jour'],
    $_POST['moment'],
    $_POST['messageClient'],
    $_POST['reservation']
)) {
    //Récupère les données du formulaire
    $nom = ucfirst(htmlspecialchars(trim($_POST['nomClient'])));
    $prenom = ucfirst(htmlspecialchars(trim($_POST['prenomClient'])));
    $email = strtolower(htmlspecialchars(trim($_POST['emailClient'])));
    $jour = strtolower(htmlspecialchars(trim($_POST['jour'])));
    $moment = strtolower(htmlspecialchars(trim($_POST['moment'])));
    $message = htmlspecialchars(trim($_POST['messageClient']));
    $reservation = trim($_POST['reservation']);
    //Vérifie si les champs requis ne sont pas vides
    if (
        !empty($nom)
        && !empty($prenom)
        && !empty($email)
        && !empty($jour)
        && !empty($moment)
        && !empty($reservation)
    ) {
        //Succès
        //Vérifie si les nombres de caractères dans les champs sont corrects
        if (
            strlen($nom) >= 3 && strlen($nom) <= 50 &&
            strlen($prenom) >= 3 && strlen($prenom) <= 50 &&
            strlen($email) >= 10 && strlen($email) <= 50
        ) {
            //Succès
            //Vérifie si le nom et le prénom n'ont pas de caractères spéciaux (accepte les espaces et tirets)
            if (
                preg_match("/^[A-Za-z .'-]+$/", $nom) &&
                preg_match("/^[A-Za-z .'-]+$/", $prenom)
            ) {
                //Succès
                //Vérifie si le champ email a bien une adresse mail
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    //Échec
                    $msg['message'] = [
                        'code' => 'warning',
                        'text' => 'Merci de saisir une adresse email valide !'
                    ];
                    require_once 'vue/panierVue.php';
                } else {
                    //Envoi du mail
                    envoiReservation($nom, $prenom, $email, $jour, $moment, $message, $reservation);
                    //Envoi de l'accusé de réception
                    envoiRecap($nom, $prenom, $email, $jour, $moment, $reservation);
                    //Mettre à jour les stocks
                    foreach ($allItems as $items) {
                        foreach ($items as $item) {
                            $produit = retournerUnProduit($bdd, $item['id']);
                            $nvStock = $produit['stock'] - $item['quantity'];
                            modifierUnStock($bdd, $nvStock, $item['id']);
                        }
                    }
                    //Vider le panier
                    $cart->destroy();
                    //Succès
                    require_once 'vue/merciVue.php';
                }
            } else {
                //Échec du nom ou prénom
                $msg['message'] = [
                    'code' => 'warning',
                    'text' => 'Merci de saisir une identité valide !'
                ];
                require_once 'vue/panierVue.php';
            }
        } else {
            //Échec du nombre de caractères
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Merci de remplir correctement les champs !'
            ];
            require_once 'vue/panierVue.php';
        }
    } else {
        //Échec : champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir tous les champs !'
        ];
        require_once 'vue/panierVue.php';
    }
} else {
    require_once 'vue/panierVue.php';
}
