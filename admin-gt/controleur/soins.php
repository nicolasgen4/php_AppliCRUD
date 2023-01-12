<?php

require_once 'modele/soinsModele.php';

if (
    //MODIFICATION DES PRODUITS
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'modifier'
) {
    //Affichage du formulaire de modification
    $produitModifie = retournerUnproduit($bdd, $_GET['id']);
    $categories = retournerLesCategories($bdd);
    require_once 'vue/soinsVueModifier.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['nomProduitModifie'],
        $_POST['prixProduitModifie'],
        $_POST['stockProduitModifie'],
        $_POST['texteProduitModifie'],
        $_POST['categorieProduitModifie'],
        $_POST['idProduitModifie'],
        $_POST['photoProduit']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['nomProduitModifie'])
        && !empty($_POST['categorieProduitModifie'])
        && !empty($_POST['idProduitModifie'])
        && !empty($_POST['photoProduit'])
    ) {
        //Vérification de l'image modifiée
        if (isset($_FILES['photoProduitModifie'])) {
            $nomPhotoModifie = (preg_replace('/[^A-Za-z0-9]/', '', $_POST['categorieProduitModifie'])) . '_' . time();
            $extensionPhotoModifie = 'webp';
            $image = new Upload($_FILES['photoProduitModifie']);
            if ($image->uploaded) {
                $image->file_new_name_body   = $nomPhotoModifie;
                $image->image_resize         = true;
                $image->image_convert        = 'webp';
                $image->webp_quality         = 50;
                $image->image_y              = 300;
                $image->image_x              = 358;
                $image->image_ratio_crop     = true;
                $image->image_no_enlarging   = true;
                $image->process('../public/images/produits/');
                //echo $image->log;
            }
        }
        //Vérification du nom et du fichier image
        //Suppression de l'ancien fichier ou renommer le nouveau
        if ($image->processed && file_exists('../public/images/produits/' . $_POST['photoProduit'])) {
            $nomPhotoModifie .= '.' . $extensionPhotoModifie;
            unlink('../public/images/produits/' . $_POST['photoProduit']);
            $image->clean();
        } elseif (file_exists('../public/images/produits/' . $_POST['photoProduit'])) {
            rename('../public/images/produits/' . $_POST['photoProduit'], '../public/images/produits/' . (preg_replace('/[^A-Za-z0-9]/', '', $_POST['categorieProduitModifie'])) . '_' . time() . '.webp');
            $nomPhotoModifie = (preg_replace('/[^A-Za-z0-9]/', '', $_POST['categorieProduitModifie'])) . '_' . time() . '.webp';
        }
        //Envoi en bdd
        $succes = modifierUnProduit(
            $bdd,
            strip_tags(trim($_POST['nomProduitModifie'])),
            strip_tags($nomPhotoModifie),
            strip_tags(trim($_POST['prixProduitModifie'])),
            strip_tags(trim($_POST['stockProduitModifie'])),
            strip_tags(trim($_POST['texteProduitModifie'])),
            strip_tags(trim($_POST['categorieProduitModifie'])),
            strip_tags(trim($_POST['idProduitModifie']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'Le produit a bien été modifié'
        ];
        $categories = retournerLesCategories($bdd);
        $produits = retournerLesProduits($bdd);
        require_once 'vue/soinsVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $produitModifie = retournerUnproduit($bdd, $_POST['idProduitModifie']);
        $categories = retournerLesCategories($bdd);
        $produits = retournerLesProduits($bdd);
        require_once 'vue/soinsVueModifier.php';
    }
} elseif (
    //AJOUT D'UN PRODUIT
    //Vérification des données
    isset(
        $_POST['submit'],
        $_POST['nomProduit'],
        $_FILES['photoProduit'],
        $_POST['prixProduit'],
        $_POST['stockProduit'],
        $_POST['texteProduit'],
        $_POST['categorieProduit']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['nomProduit'])
        && !empty($_FILES['photoProduit'])
        && !empty($_POST['categorieProduit'])
    ) {
        //Chargement de l'image
        $nomPhoto = (preg_replace('/[^A-Za-z0-9]/', '', $_POST['categorieProduit'])) . '_' . time();
        $extensionPhoto = 'webp';
        $image = new Upload($_FILES['photoProduit']);
        if ($image->uploaded) {
            $image->file_new_name_body   = $nomPhoto;
            $image->image_resize         = true;
            $image->image_convert        = 'webp';
            $image->webp_quality         = 50;
            $image->image_y              = 300;
            $image->image_x              = 358;
            $image->image_ratio_crop     = true;
            $image->image_no_enlarging   = true;
            $image->process('../public/images/produits/');
            //echo $image->log;
        }
        //Envoi en bdd
        if ($image->processed) {
            $nomPhoto .= '.' . $extensionPhoto;
            $succes = ajouterUnProduit(
                $bdd,
                strip_tags(trim($_POST['nomProduit'])),
                strip_tags($nomPhoto),
                strip_tags(trim($_POST['prixProduit'])),
                strip_tags(trim($_POST['stockProduit'])),
                strip_tags(trim($_POST['texteProduit'])),
                strip_tags(trim($_POST['categorieProduit']))
            );
            $msg['message'] = [
                'code' => 'success',
                'text' => 'Le produit a bien été ajouté'
            ];
            $image->clean();
        } else {
            //Erreur du chargement d'image
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Le produit n\'a pas pu être ajouté'
            ];
        }
        $categories = retournerLesCategories($bdd);
        $produits = retournerLesProduits($bdd);
        require_once 'vue/soinsVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $categories = retournerLesCategories($bdd);
        $produits = retournerLesProduits($bdd);
        require_once 'vue/soinsVue.php';
    }
} elseif (
    //SUPPRESSION D'UN PRODUIT
    isset(
        $_GET['action'],
        $_GET['id'],
        $_GET['image']
    ) && $_GET['action'] == 'supprimer'
) {
    //Supprimer le produit
    $succes = supprimerUnProduit($bdd, $_GET['id']);
    //Suppression du fichier image
    if (file_exists('../public/images/produits/' . $_GET['image'])) {
        unlink('../public/images/produits/' . $_GET['image']);
    }
    $msg['message'] = [
        'code' => 'success',
        'text' => 'Le produit a bien été supprimé'
    ];
    $categories = retournerLesCategories($bdd);
    $produits = retournerLesProduits($bdd);
    require_once 'vue/soinsVue.php';
} else {
    //AFFICHER LES PRODUITS
    $categories = retournerLesCategories($bdd);
    $produits = retournerLesProduits($bdd);
    require_once 'vue/soinsVue.php';
}
