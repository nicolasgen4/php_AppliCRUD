<?php

/**
 * Vue de la page coiffures
 * Affiche le contenu HTML de la page coiffures
 * Appelle le modèle du site
 */

$title = 'coiffures';
$description = 'Découvrez les coiffures et coupes de cheveux pour femmes et hommes, toutes réalisées dans mon salon de coiffure à Genac, une ville près de Rouillac';
$css = 'coiffuresStyle';
$url = 'https://nicolas.lesacteursduweb.fr/coiffures';


ob_start();

?>

<div class="coiffures-bandeau bandeau">
    <!--TITRE DE PAGE MASQUE-->
    <h1 class="lecteur-ecran lecteur-ecran-focus">Ma galerie de photos de coiffures hommes et femmes</h1>
</div>

<section class="wrapper">
    <!--DEBUT DE l'EN-TETE-->
    <div class="en-tete column-start">
        <h2>Découvrez mes coiffures</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore
            et
            dolore magna aliqua.</p>
    </div>
    <!--DEBUT DES CARTES DE COIFFURES-->
    <div id="galerie" class="row-wrap-center-start">
        <?php foreach ($coiffures as $coiffure) : ?>
            <section id="<?= strtolower(htmlspecialchars($coiffure['titre'])) ?>" class="photo-anime">
                <div class="boite">
                    <a href="#<?= strtolower(htmlspecialchars($coiffure['titre'])) ?>" class="boite-animation column-start">
                        <span class="lecteur-ecran lecteur-ecran-focus">Naviguer à la photo de coiffure suivante</span>
                        <div class="devant">
                            <img src="public/images/coiffures/<?= htmlspecialchars($coiffure['photo']) ?>" alt="<?= ucfirst(strtolower(trim(htmlspecialchars($coiffure['titre'])))) ?>" title="<?= ucfirst(strtolower(trim(htmlspecialchars($coiffure['titre'])))) ?>" width="384" height="460" loading="lazy">
                        </div>
                        <div class="derriere column-center">
                            <h3><?= ucfirst(strtolower(trim(htmlspecialchars($coiffure['titre'])))) ?></h3>
                            <?php if (!empty($coiffure['texte'])) : ?>
                                <p><?= mb_strimwidth(ucfirst(trim(htmlspecialchars($coiffure['texte']))), 0, 400, ' ... ') ?></p>
                            <?php endif ?>
                            <?php if (!empty($coiffure['prix'])) : ?>
                                <p>Prix : <?= ucfirst(trim(htmlentities($coiffure['prix']))) ?> €</p>
                            <?php endif ?>
                        </div>
                    </a>
                </div>
            </section>
        <?php endforeach ?>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
