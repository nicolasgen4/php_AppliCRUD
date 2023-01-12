<?php

/**
 * Vue de la page des informations
 * Affiche le contenu HTML de la page informations
 * Appelle le modèle du site
 */

$title = 'les informations';
$description = 'Comment venir au salon de coiffure Genac Tif près de Rouillac : les horaires d’ouverture, les cartes de localisation, les stationnements et la météo locale';
$css = 'informationsStyle';
$js = 'informationsScript';
$url = 'https://nicolas.lesacteursduweb.fr/informations';

ob_start();

?>

<div class="informations-bandeau bandeau">
    <!--TITRE DE PAGE MASQUE-->
    <h1 class="lecteur-ecran lecteur-ecran-focus">Les horaires d'ouverture et les stationnements autour de Genac Tif</h1>
</div>

<!--DEBUT DE l'EN-TETE-->
<section class="wrapper">
    <div class="en-tete row-btw-center">
        <div class="column-start">
            <h2>Informations pratiques</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore
                et
                dolore magna aliqua.</p>
        </div>
        <?php if (isset($annonce['id_annonces'])) : ?>
            <!--ANNONCE DE VACANCES-->
            <div class="row-center annonce">
                <p><?= mb_strimwidth(ucfirst(nl2br(trim(htmlspecialchars($annonce['texte'])))), 0, 220, '...') ?></p>
            </div>
        <?php endif ?>
    </div>

    <!--DEBUT DE L'AFFICHAGE DES HORAIRES-->
    <section class="horaires column-start">
        <h3>Mes horaires d'ouvertures</h3>
        <div class="jours row-wrap-start">
            <?php foreach ($horaires as $horaire) : ?>
                <section>
                    <h4><?= ucfirst(htmlspecialchars($horaire['jour'])) ?></h4>
                    <ul>
                        <?php if (!empty($horaire['matin'])) : ?>
                            <li><?= ucfirst(htmlspecialchars($horaire['matin'])) ?></li>
                        <?php endif ?>
                        <?php if (!empty($horaire['apres_midi'])) : ?>
                            <li><?= ucfirst(htmlspecialchars($horaire['apres_midi'])) ?></li>
                        <?php endif ?>
                    </ul>
                </section>
            <?php endforeach ?>
        </div>
    </section>

    <!--DEBUT DES COORDONNEES-->
    <div class="infos-utiles row-btw-start">
        <section class="coordonnees column-start">
            <h3>Venir au salon</h3>
            <address>
                <ul>
                    <li><?= ucfirst(htmlspecialchars($coordonnees['adresse'])) ?></li>
                    <li><?= htmlspecialchars($coordonnees['code_postal']) . ' ' . strtoupper(htmlspecialchars($coordonnees['ville'])) ?></li>
                    <?php if (!empty($coordonnees['complement'])) : ?>
                        <li><?= ucfirst(htmlspecialchars($coordonnees['complement'])); ?></li>
                    <?php endif ?>
                </ul>
            </address>
            <div class="row-start">
                <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $coordonnees['telephone'])) ?>" class="bouton blanc"><?= htmlspecialchars($coordonnees['telephone']) ?></a>
            </div>
        </section>
        <!--SECTION METEO LOCALE-->
        <section class="meteo column-start">
            <h3>En ce moment à Genac</h3>
            <div class="row-btw-center">
                <img id="icone" src="#icone" alt="La météo actuelle au salon" title="La météo à Genac" loading="lazy" width="125" height="125">
                <ul class="column-start">
                    <li id="condition"></li>
                    <li id="temperature"></li>
                    <li id="vent"></li>
                </ul>
            </div>
        </section>
    </div>

    <!--DEBUT DE LA SECTION DES CARTES ITINERAIRES-->
    <div class="itineraire row-btw-center">
        <div class="google-maps column-start">
            <img src="public/images/carte-google.webp" alt="Carte Google Maps" title="Le salon sur Google Maps" width="784" height="446" loading="lazy">
            <a href="https://goo.gl/maps/yUMW2dvBRWa3EtX46" target="_blank" rel="noreferrer noopener">Voir l'itinéraire sur Google Maps</a>
        </div>
        <div class="parking column-btw">
            <section class="column-start">
                <h4>Parking de la Mairie : Gratuit</h4>
                <img src="public/images/photo-mairie.webp" alt="Photo du parking de la Mairie" title="La Mairie de Genac" width="360" height="190" loading="lazy">
            </section>
            <section class="column-start">
                <h4>Parking de la place du 19 Mars 1962 : Gratuit</h4>
                <img src="public/images/photo-place.webp" alt="Photo du parking de la place du 19 Mars 1962" title="La place du 19 Mars 1962" width="360" height="190" loading="lazy">
            </section>
            <a href="https://goo.gl/maps/rBzsUG5UYLwqEpVA6" target="_blank" rel="noreferrer noopener">Voir les stationnements sur Google Maps</a>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
