<?php

require_once 'modele/coiffuresModele.php';

if (
    //MODIFICATION DES COIFFURES
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'modifier'
) {
    //Affichage du formulaire de modification
    $coiffureModifie = retournerUneCoiffure($bdd, $_GET['id']);
    require_once 'vue/coiffuresVueModifier.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['titreCoiffureModif'],
        $_POST['prixCoiffureModif'],
        $_POST['texteCoiffureModif'],
        $_POST['idCoiffureModif'],
        $_POST['photoCoiffure']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['titreCoiffureModif'])
        && !empty($_POST['idCoiffureModif'])
        && !empty($_POST['photoCoiffure'])
    ) {
        //Vérification de l'image modifiée
        if (isset($_FILES['photoCoiffureModif'])) {
            $nomPhotoModifie = (preg_replace('/[^A-Za-z0-9]/', '', $_POST['titreCoiffureModif'])) . '_' . time();
            $extensionPhotoModifie = 'webp';
            $image = new Upload($_FILES['photoCoiffureModif']);
            if ($image->uploaded) {
                $image->file_new_name_body   = $nomPhotoModifie;
                $image->image_resize         = true;
                $image->image_convert        = 'webp';
                $image->webp_quality         = 50;
                $image->image_y              = 460;
                $image->image_x              = 384;
                $image->image_ratio_crop     = true;
                $image->image_no_enlarging   = true;
                $image->process('../public/images/coiffures/');
                //echo $image->log;
            }
        }
        //Vérification du nom et du fichier image
        //Suppression de l'ancienne image
        if ($image->processed && file_exists('../public/images/coiffures/' . $_POST['photoCoiffure'])) {
            $nomPhotoModifie .= '.' . $extensionPhotoModifie;
            unlink('../public/images/coiffures/' . $_POST['photoCoiffure']);
            $image->clean();
        } else {
            $nomPhotoModifie = $_POST['photoCoiffure'];
        }
        //Envoi en bdd
        $succes = modifierUneCoiffure(
            $bdd,
            strip_tags($nomPhotoModifie),
            strip_tags(trim($_POST['titreCoiffureModif'])),
            strip_tags(trim($_POST['prixCoiffureModif'])),
            strip_tags(trim($_POST['texteCoiffureModif'])),
            strip_tags(trim($_POST['idCoiffureModif']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'La coiffure a bien été modifiée'
        ];
        $coiffures = retournerLesCoiffures($bdd);
        require_once 'vue/coiffuresVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $coiffureModifie = retournerUneCoiffure($bdd, $_POST['idCoiffureModif']);
        require_once 'vue/coiffuresVueModifier.php';
    }
} elseif (
    //AJOUT D'UNE COIFFURE
    //Vérification des données
    isset(
        $_POST['submit'],
        $_FILES['photoCoiffure'],
        $_POST['titreCoiffure'],
        $_POST['prixCoiffure'],
        $_POST['texteCoiffure']
    )
) {
    if (
        //Vérification des champs
        !empty($_FILES['photoCoiffure'])
        && !empty($_POST['titreCoiffure'])
    ) {
        //Chargement de l'image
        $nomPhoto = (preg_replace('/[^A-Za-z0-9]/', '', $_POST['titreCoiffure'])) . '_' . time();
        $extensionPhoto = 'webp';
        $image = new Upload($_FILES['photoCoiffure']);
        if ($image->uploaded) {
            $image->file_new_name_body   = $nomPhoto;
            $image->image_resize         = true;
            $image->image_convert        = 'webp';
            $image->webp_quality         = 50;
            $image->image_y              = 460;
            $image->image_x              = 384;
            $image->image_ratio_crop     = true;
            $image->image_no_enlarging   = true;
            $image->process('../public/images/coiffures/');
            //echo $image->log;
        }
        //Envoi en bdd
        if ($image->processed) {
            $nomPhoto .= '.' . $extensionPhoto;
            $succes = ajouterUneCoiffure(
                $bdd,
                strip_tags($nomPhoto),
                strip_tags(trim($_POST['titreCoiffure'])),
                strip_tags(trim($_POST['prixCoiffure'])),
                strip_tags(trim($_POST['texteCoiffure']))
            );
            $msg['message'] = [
                'code' => 'success',
                'text' => 'La coiffure a bien été ajoutée'
            ];
            $image->clean();
        } else {
            //Erreur du chargement d'image
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'La coiffure n\'a pas pu être ajoutée'
            ];
        }
        $coiffures = retournerLesCoiffures($bdd);
        require_once 'vue/coiffuresVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $coiffures = retournerLesCoiffures($bdd);
        require_once 'vue/coiffuresVue.php';
    }
} elseif (
    //SUPPRESSION D'UNE COIFFURE
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'supprimer'
) {
    //Supprimer la coiffure
    $succes = supprimerUneCoiffure($bdd, $_GET['id']);
    //Suppression du fichier image
    if (file_exists('../public/images/coiffures/' . $_GET['image'])) {
        unlink('../public/images/coiffures/' . $_GET['image']);
    }
    $msg['message'] = [
        'code' => 'success',
        'text' => 'La coiffure a bien été supprimée'
    ];
    $coiffures = retournerLesCoiffures($bdd);
    require_once 'vue/coiffuresVue.php';
} else {
    //AFFICHER LES COIFFURES
    $coiffures = retournerLesCoiffures($bdd);
    require_once 'vue/coiffuresVue.php';
}
