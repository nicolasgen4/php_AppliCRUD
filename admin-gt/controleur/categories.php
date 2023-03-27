<?php

require_once 'modele/categoriesModele.php';

if (
    //MODIFICATION DES CATÉGORIES
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'modifier'
) {
    //Affichage du formulaire de modification
    $categorieModifie = retournerUneCategorie($bdd, $_GET['id']);
    $categories = retournerLesCategories($bdd);
    require_once 'vue/categoriesVue.php';
} elseif (
    isset(
        //Vérification des données
        $_POST['submit'],
        $_POST['nomCategorieModif'],
        $_POST['idCategorieModif']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['nomCategorieModif'])
        && !empty($_POST['idCategorieModif'])
    ) {
        //Envoi en bdd
        $succes = modifierUneCategorie(
            $bdd,
            strip_tags(trim($_POST['nomCategorieModif'])),
            strip_tags(trim($_POST['idCategorieModif']))
        );
        $msg['message'] = [
            'code' => 'success',
            'text' => 'La catégorie a bien été modifiée'
        ];
        $categories = retournerLesCategories($bdd);
        require_once 'vue/categoriesVue.php';
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $categorieModifie = retournerUneCategorie($bdd, $_POST['idCategorieModif']);
        $categories = retournerLesCategories($bdd);
        require_once 'vue/categoriesVue.php';
    }
} elseif (
    //AJOUT D'UNE CATÉGORIE
    //Vérification des données
    isset(
        $_POST['submit'],
        $_POST['nomCategorie']
    )
) {
    if (
        //Vérification des champs
        !empty($_POST['nomCategorie'])
    ) {
        //Vérification du nom de catégorie
        if (verifierNomCategorie($bdd, $_POST['nomCategorie']) == false) {
            //Envoi en bdd
            $succes = ajouterUneCategorie(
                $bdd,
                strip_tags(trim($_POST['nomCategorie']))
            );
            $msg['message'] = [
                'code' => 'success',
                'text' => 'La catégorie a bien été ajouté'
            ];
            $categories = retournerLesCategories($bdd);
            require_once 'vue/categoriesVue.php';
        } else {
            //Erreur nom existe déjà
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Cette catégorie existe déjà'
            ];
            $categories = retournerLesCategories($bdd);
            require_once 'vue/categoriesVue.php';
        }
    } else {
        //Erreur champs vides
        $msg['message'] = [
            'code' => 'warning',
            'text' => 'Merci de remplir les champs obligatoires'
        ];
        $categories = retournerLesCategories($bdd);
        require_once 'vue/categoriesVue.php';
    }
} elseif (
    //SUPPRESSION D'UNE CATÉGORIE
    isset(
        $_GET['action'],
        $_GET['id']
    ) && $_GET['action'] == 'supprimer'
) {
    //Supprimer la catégorie
    $succes = supprimerUneCatégorie($bdd, $_GET['id']);
    //Suppression des fichiers image des produits
    array_map('unlink', glob('../public/images/produits/' . $_GET['id'] . '_*.webp'));
    $msg['message'] = [
        'code' => 'success',
        'text' => 'La catégorie a bien été supprimée'
    ];
    $categories = retournerLesCategories($bdd);
    require_once 'vue/categoriesVue.php';
} else {
    //AFFICHER LES CATÉGORIES
    $categories = retournerLesCategories($bdd);
    require_once 'vue/categoriesVue.php';
}
