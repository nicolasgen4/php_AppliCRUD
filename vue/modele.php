<?php

/**
 * Modèle de l'application
 * Affiche le header et le footer
 * Appelle le contenu des vues 
 * 
 * $title : spécifique à chaque page
 * $description : spécifique à chaque page
 * $js : src spécifique à chaque page
 * $css : src spécifique à chaque page
 */

//SVG du menu burger
$barres = new EnteteSVG('public/images/svg/barres.svg');
$barres->definirUnId('barres');
$barres->definirUneCouleur('#2D2D2D');
$barres->definirUnTitre('Barres du menu');

//SVG du bouton remonter
$remonter = new EnteteSVG('public/images/svg/remonter.svg');
$remonter->redimensionner('30', '18');
$remonter->definirUnTitre('Remonter en haut de page');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="<?php if (isset($description)) : ?><?= $description ?><?php endif ?>">
    <meta name="keywords" content="salon, coiffure, cheveux, hommes, femmes, enfants, 
    Genac, Rouillac, Charente, local, réservation en ligne, click and collect, coiffeuse">
    <meta name="author" content="Genac Tif"><?php if (isset($url)) : ?><link rel="canonical" href="<?= $url ?>"><?php endif ?>
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Salon de coiffure Genac Tif">
    <meta property="og:image" content="https://nicolas.lesacteursduweb.fr/public/images/vignette.webp">
    <meta property="og:description" content="<?php if (isset($description)) : ?><?= $description ?><?php endif ?>">
    <meta property="og:url" content="https://nicolas.lesacteursduweb.fr/">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="nicolas.lesacteursduweb.fr">
    <meta property="twitter:url" content="https://nicolas.lesacteursduweb.fr/">
    <meta name="twitter:title" content="Salon de coiffure Genac Tif">
    <meta name="twitter:description" content="<?php if (isset($description)) : ?><?= $description ?><?php endif ?>">
    <meta name="twitter:image" content="https://nicolas.lesacteursduweb.fr/public/images/vignette.webp">
    <title><?= ucfirst($title) ?> | Genac Tif</title>
    <link rel="stylesheet" href="public/css/normalize.css" media="all">
    <link rel="stylesheet" href="public/css/googleFonts.css" media="all">
    <link rel="stylesheet" href="public/css/global.css" media="screen">
    <?php if (isset($css)) : ?><link rel="stylesheet" href="public/css/<?= $css ?>.css" media="screen"><?php endif ?>
    <link rel="stylesheet" href="public/css/tablette.css" media="screen and (max-width: 1720px)">
    <link rel="stylesheet" href="public/css/mobile.css" media="screen and (max-width: 580px)">
    <link rel="stylesheet" href="public/css/impression.css" media="print">
    <link rel="shortcut icon" href="public/images/favicon.webp" type="image/webp">
    <script src="public/js/global.js" defer></script>
    <?php if (isset($js)) : ?><script src="public/js/<?= $js ?>.js" defer></script><?php endif ?>
</head>

<body>

    <header class="menu-principal wdth-cent">
        <!--DEBUT DU MENU DE NAVIGATION POUR MOBILE-->
        <div class="navigation-mobile">
            <!--MENU BURGER-->
            <nav id="menu-burger" class="column-start">
                <?= $barres->rendre($barres); ?>
                <ul class="menu-mobile invisible column-start">
                    <li>
                        <a href="accueil" class="<?= Active::page('accueil', $controleur) ?>">Accueil</a>
                    </li>
                    <li>
                        <a href="soins" class="<?= Active::page('soins', $controleur) ?> ?>">Les soins</a>
                    </li>
                    <li>
                        <a href="coiffures" class="<?= Active::page('coiffures', $controleur) ?> ?>">Les coiffures</a>
                    </li>
                    <li>
                        <a href="salon" class="<?= Active::page('salon', $controleur) ?> ?>">Le salon</a>
                    </li>
                    <li>
                        <a href="informations" class="<?= Active::page('informations', $controleur) ?> ?>">Informations pratiques</a>
                    </li>
                </ul>
            </nav>
            <!--LOGO VERSION MOBILE-->
            <a href="accueil" class="column-center">
                <img src="public/images/logo-mobile.webp" alt="Petit logo de Genac Tif" title="Retour à l'accueil" width="114" height="39">
                <span class="lecteur-ecran lecteur-ecran-focus">Retour à l'accueil</span>
            </a>
            <nav>
                <ul>
                    <li>
                        <a href="contact" class="<?= Active::page('contact', $controleur) ?> ?>">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!--DEBUT DU MENU DE NAVIGATION VERSION PC/TABLETTES-->
        <div class="navigation row-btw-center wrapper-nav">
            <nav>
                <ul class="row-btw-center">
                    <li class="nav-gauche">
                        <a href="accueil" class="<?= Active::page('accueil', $controleur) ?> ?>">Accueil</a>
                    </li>
                    <li class="nav-gauche">
                        <a href="soins" class="<?= Active::page('soins', $controleur) ?> ?>">Les soins</a>
                    </li>
                    <li class="nav-gauche">
                        <a href="coiffures" class="<?= Active::page('coiffures', $controleur) ?> ?>">Les coiffures</a>
                    </li>
                </ul>
            </nav>
            <!--LOGO VERSION PC-->
            <a href="accueil" class="column-center logo">
                <img src="public/images/logo.webp" alt="Logo de Genac Tif" title="Retour à l'accueil" width="317" height="164">
                <span class="lecteur-ecran lecteur-ecran-focus">Retour à l'accueil</span>
            </a>
            <nav>
                <ul class="row-btw-center">
                    <li class="nav-droite">
                        <a href="salon" class="<?= Active::page('salon', $controleur) ?> ?>">Le salon</a>
                    </li>
                    <li class="nav-droite">
                        <a href="contact" class="<?= Active::page('contact', $controleur) ?> ?>">Contact</a>
                    </li>
                    <li class="nav-droite">
                        <a href="informations" class="<?= Active::page('informations', $controleur) ?> ?>">Informations pratiques</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!--DEBUT DU CONTENU DES PAGES-->
    <main>

        <?php echo $content; ?>

        <!--BOUTON POUR REMONTER EN HAUT DE LA PAGE-->
        <a href="#" id="remonter-haut" class="remonter row-center" title="Remonter en haut de la page">
            <?= $remonter->rendre($remonter); ?>
            <span class="lecteur-ecran lecteur-ecran-focus">Remonter en haut de la page</span>
        </a>

    </main>

    <footer>
        <div class="wrapper-nav footer-principal row-btw-start">
            <a href="accueil" class="logo-footer">
                <span class="lecteur-ecran lecteur-ecran-focus">Retour à l'accueil</span>
                <img src="public/images/logo-blanc.webp" alt="Logo blanc de Genac Tif" title="Retour à l'accueil" width="317" height="164" loading="lazy">
            </a>
            <div class="liens-footer row-btw-start">
                <section class="column-start">
                    <h3>Mes prestations</h3>
                    <hr>
                    <ul class="column-start">
                        <li><a href="soins">Mes soins</a></li>
                        <li><a href="coiffures">Mes coiffures</a></li>
                        <li><a href="salon">Mon salon</a></li>
                    </ul>
                </section>
                <section class="column-start">
                    <h3>Mes coordonnées</h3>
                    <hr>
                    <address>
                        <ul class="column-start">
                            <li>Genac Tif</li>
                            <li><?= ucfirst(htmlspecialchars($coordonnees['adresse'])) ?></li>
                            <li><?= htmlspecialchars($coordonnees['code_postal']) . ' ' . strtoupper(htmlspecialchars($coordonnees['ville'])) ?></li>
                            <?php if (!empty($coordonnees['complement'])) : ?>
                                <li><?= ucfirst(htmlspecialchars($coordonnees['complement'])); ?></li>
                            <?php endif ?>
                            <li><a href="tel:<?= htmlspecialchars(str_replace(' ', '', $coordonnees['telephone'])) ?>"><?= htmlspecialchars($coordonnees['telephone']) ?></a></li>
                        </ul>
                    </address>
                </section>
                <section class="column-start">
                    <h3>Le salon</h3>
                    <hr>
                    <ul class="column-start">
                        <li><a href="<?= htmlspecialchars($coordonnees['facebook']) ?>" title="Aller sur Facebook">Mon Facebook</a></li>
                        <li><a href="contact">Me contacter</a></li>
                    </ul>
                </section>
                <section class="column-start">
                    <h3>Informations pratiques</h3>
                    <hr>
                    <ul class="column-start">
                        <li><a href="informations">Horaires</a></li>
                        <li><a href="mentions">Mentions légales</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </footer>

</body>

</html>
<!--  |
      |   
      |
     _|         
///\(o_o)/\\\  <(MIAOU)
|||  ` '  |||

-->