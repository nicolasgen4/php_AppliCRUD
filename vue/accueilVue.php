<?php

/**
 * Vue de l'accueil
 * Affiche le contenu HTML de l'accueil
 * Appelle le modèle du site
 */

$title = 'accueil';
$description = 'Pour les soins de vos cheveux, vos envies de coiffure pour les femmes et les hommes, le salon de coiffure Genac Tif vous accueille à Genac près de Rouillac';
$css = 'accueilStyle';
$url = 'https://nicolas.lesacteursduweb.fr/accueil';

ob_start();

?>

<!--DEBUT DE LA SECTION ACCUEIL EN 100VH-->
<section class="vitrine vitrine-accueil">
    <div class="contenu wrapper row-end">
        <div class="presentation-accueil column-btw-end">
            <h1 class="column-center-end">
                <span class="genac-tif">Genac Tif</span>
                <span class="slogan">Un moment à soi</span>
                <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $coordonnees['telephone'])) ?>" class="bouton noir row-center"><?= htmlspecialchars($coordonnees['telephone']) ?></a>
            </h1>
            <a href="#services" class="ciseaux" title="Descendre vers les services">
                <?= $ciseaux->rendre($ciseaux); ?>
                <span class="lecteur-ecran lecteur-ecran-focus">Voir mes services</span>
            </a>
        </div>
    </div>
</section>

<!--DEBUT DU SOMMAIRE DES SERVICES-->
<section class="wrapper">
    <h2 id="services" class="center">Découvrir tous mes services</h2>
    <div class="services row-wrap-center">
        <section class="service column-start">
            <a href="soins" class="column-start">
                <span class="lecteur-ecran lecteur-ecran-focus">Accéder aux réservations des produits de soins</span>
                <div class="boite-image">
                    <img src="public/images/soins.webp" alt="Petite photo des soins" title="Accéder aux offres de soins" width="358" height="300" loading="lazy">
                </div>
                <h3 class="center">Mes soins</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi
                    ut
                    aliquip ex ea commodo consequat.</p>
                <div class="row-start">
                    <div class="bouton blanc">Réserver</div>
                </div>
            </a>
        </section>
        <section class="service column-start">
            <a href="coiffures" class="column-start">
                <span class="lecteur-ecran lecteur-ecran-focus">Accéder à la galerie des coiffures</span>
                <div class="boite-image">
                    <img src="public/images/coiffures.webp" alt="Petite photo d'une coiffure" title="Accéder à la galerie des coiffures" width="358" height="300" loading="lazy">
                </div>
                <h3 class="center">Mes coiffures</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi
                    ut
                    aliquip ex ea commodo consequat.</p>
                <div class="row-start">
                    <div class="bouton blanc">Découvrir</div>
                </div>
            </a>
        </section>
        <section class="service column-start">
            <a href="salon" class="column-start">
                <span class="lecteur-ecran lecteur-ecran-focus">Accéder aux photos et à la présentation du salon</span>
                <div class="boite-image">
                    <img src="public/images/salon.webp" alt="Petite photo du salon" title="Accéder à la présentation du salon" width="358" height="300" loading="lazy">
                </div>
                <h3 class="center">Mon salon</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi
                    ut
                    aliquip ex ea commodo consequat.</p>
                <div class="row-start">
                    <div class="bouton blanc">Visiter</div>
                </div>
            </a>
        </section>
    </div>
</section>

<!--DEBUT DE LA SECONDE VITRINE-->
<section class="vitrine-2">
    <div class="contenu wrapper row-end-center">
        <div class="column-center-end">
            <h2>Un salon à Genac</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore
                et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip
                ex ea commodo consequat.</p>
            <a href="informations" class="bouton noir row-center">Venir sur place</a>
        </div>
    </div>
</section>

<!--DEBUT DE LA PRÉSENTATION DE LA COIFFEUSE-->
<section class="wrapper portrait row-btw-center">
    <div class="column-start">
        <h2>Hilaire Laurine</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur.</p>
        <div class="row-start">
            <a href="contact" class="bouton blanc">Me contacter</a>
        </div>
    </div>
    <img src="public/images/portrait.webp" alt="Photo de coiffure" title="Photo d'une coiffure" width="600" height="620" loading="lazy">
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
