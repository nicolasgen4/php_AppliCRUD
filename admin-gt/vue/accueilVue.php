<?php

/**
 * Vue de la page d'accueil'
 * Affiche le contenu HTML de la page accueil
 * Appelle le modèle de l'admin
 */

$title = 'accueil';
$css = 'accueilStyle';

ob_start();

?>

<!--DEBUT DE L'EN-TETE-->
<section class="formulaire wrapper column-start">
    <h2 class="titres">Tableau de bord</h2>
    <p>Bonjour <?= ucfirst(htmlspecialchars($identite)) ?> ! Que voulez-vous faire aujourd'hui ?</p>
</section>

<!--SECTION PRODUITS-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Gérer les produits de ma boutique</h3>
    </div>
    <ul class="column-start">
        <li>
            <a href="soins#ajouter-produit">Ajouter un nouveau produit à ma boutique</a>
        </li>
        <li>
            <a href="soins#modifier-produit">Modifier ou supprimer un produit déjà enregistré dans ma boutique</a>
        </li>
        <li>
            <a href="categories#ajouter-categorie">Ajouter une nouvelle catégorie de produits</a>
        </li>
        <li>
            <a href="categories#liste-categories">Modifier ou supprimer une catégorie de produits déjà enregistrée</a>
        </li>
    </ul>
</section>

<!--SECTION COIFFURES-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Gérer ma galerie de photos</h3>
    </div>
    <ul class="column-start">
        <li>
            <a href="coiffures#ajouter-coiffure">Ajouter une nouvelle coiffure à ma galerie</a>
        </li>
        <li>
            <a href="coiffures#modifier-coiffure">Changer ou supprimer une coiffure déjà enregistrée</a>
        </li>
    </ul>
</section>

<!--SECTION SALON-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Gérer les photos de mon salon</h3>
    </div>
    <ul class="column-start">
        <li><a href="salon">Changer les photos de présentation du salon</a></li>
    </ul>
</section>

<!--SECTION INFORMATIONS-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Gérer les informations de mon salon</h3>
    </div>
    <ul class="column-start">
        <li><a href="informations#coordonnees">Changer mon adresse et mon numéro de téléphone</a></li>
        <li><a href="informations#horaires">Changer mes horaires</a></li>
    </ul>
</section>

<!--SECTION FERMETURE-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Passer en mode vacances</h3>
    </div>
    <ul class="column-start">
        <li><a href="fermeture#fermeture">Fermer automatiquement les réservations de produits en ajoutant un message de fermeture</a></li>
    </ul>
</section>

<!--SECTION ADMINISTRATEURS-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Gérer les administrateurs</h3>
    </div>
    <ul class="column-start">
        <li><a href="administrateurs#ajouter-admin">Ajouter un nouvel administrateur du site</a></li>
        <li><a href="administrateurs#administrateurs">Modifier ou supprimer un administrateur existant du site</a></li>
    </ul>
</section>

<!--SECTION PROFIL-->
<section class="guide wrapper column-start">
    <div class="row-start-center">
        <?= $flecheRose->rendre($flecheRose) ?>
        <h3>Gérer mon profil d'administrateur</h3>
    </div>
    <ul class="column-start">
        <li><a href="profil">Changer mon email ou mon mot de passe</a></li>
    </ul>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
