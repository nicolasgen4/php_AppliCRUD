<?php

/**
 * Vue de la page salon
 * Affiche le contenu HTML de la page salon
 * Appelle le modèle du site
 */

$title = 'le salon';
$description = 'Visiter mon salon de coiffure à Genac près de Rouillac, en découvrant les photos de ma boutique et les actualités du salon dans mon fil Facebook';
$css = 'salonStyle';
$js = 'salonScript';
$url = 'https://nicolas.lesacteursduweb.fr/salon';

ob_start();

?>

<!--DEBUT DU CAROUSSEL-->
<section class="caroussel">
    <figure id="caroussel" class="column-center">
        <img src="#" alt="Le caroussel de photos du salon Genac Tif" width="1920" height="880">
        <figcaption class="caroussel-legende">
            <h1 class="titre-legende">Titre</h1>
            <p class="texte-legende">Légende</p>
        </figcaption>
    </figure>
    <button id="suivant" class="fleche">
        <?= $flecheSv->rendre($flecheSv); ?>
        <span class="lecteur-ecran lecteur-ecran-focus">Passer à l'image suivante</span>
    </button>
    <button id="precedent" class="fleche inverse">
        <?= $flechePr->rendre($flechePr); ?>
        <span class="lecteur-ecran lecteur-ecran-focus">Revenir à l'image précédente</span>
    </button>
</section>

<!--DEBUT DE LA SECTION DE PRÉSENTATION DU SALON-->
<section class="salon wrapper row-btw-center">
    <div class="conteneur-images wdth-cinquante">
        <img src="public/images/photo-salon.webp" alt="Photo de mon salon à Genac" title="Mon salon à Genac" width="444" height="700" class="grande-image" loading="lazy">
        <img src="public/images/photo-couleurs.webp" alt="Photo des couleurs dans mon salon" title="Des couleurs dans mon salon" width="290" height="340" class="petite-image" loading="lazy">
    </div>
    <div class="presentation column-start">
        <h2 class="column-start">
            <span class="chapeau">Genac Tif</span>
            <span class="titre-presentation">Un salon à Genac</span>
        </h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
            ut
            aliquip ex ea commodo consequat.

            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
            ut
            aliquip ex ea commodo consequat.</p>
        <div class="row-start">
            <a href="informations" class="bouton blanc">Venir sur place</a>
        </div>
    </div>
</section>

<!--DEBUT DE LA SECTION DE PRÉSENTATION DU FACEBOOK-->
<section class="salon wrapper reverse-btw-center">
    <div class="conteneur-images wdth-cinquante inverse">
        <img src="public/images/photo-coiffure.webp" alt="Photo d'une de mes coiffures" title="Une coiffure" width="444" height="700" class="grande-image inverse" loading="lazy">
        <img src="public/images/photo-accessoires.webp" alt="Photo de mes accessoires de coiffure" title="Des accessoires de coiffeur" width="290" height="340" class="petite-image inverse" loading="lazy">
    </div>
    <div class="presentation column-start">
        <h2 class="column-start">
            <span class="chapeau">Suivez-moi</span>
            <span class="titre-presentation">Mon Facebook</span>
        </h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.

            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.</p>
        <div class="row-start">
            <a href="<?= htmlspecialchars($coordonnees['facebook']) ?>" title="Aller sur Facebook" class="bouton blanc">Voir mon facebook</a>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
