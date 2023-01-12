<?php

/**
 * Modèle de l'application
 * Affiche le header et le footer
 * Appelle le contenu des vues 
 * 
 * $title : spécifique à chaque page
 * $js : src spécifique à chaque page
 * $css : src spécifique à chaque page
 */

//SVG déconnexion
$deconnexion = new EnteteSVG('../public/images/svg/deconnexion.svg');
$deconnexion->redimensionner('20', '20');
$deconnexion->definirUneCouleur('#2D2D2D');
$deconnexion->definirUnTitre('Déconnexion');

//SVG du menu burger
$barres = new EnteteSVG('../public/images/svg/barres.svg');
$barres->definirUnId('barres');
$barres->definirUneCouleur('#2D2D2D');
$barres->definirUnTitre('Barres du menu');

//SVG du bouton remonter
$remonter = new EnteteSVG('../public/images/svg/remonter.svg');
$remonter->redimensionner('30', '18');
$remonter->definirUnTitre('Remonter en haut de page');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($title) ?> | Administration</title>
    <link rel="stylesheet" href="public/css/normalize.css" media="all">
    <link rel="stylesheet" href="public/css/googleFonts.css" media="all">
    <link rel="stylesheet" href="public/css/global.css" media="screen">
    <?php if (isset($css)) : ?>
        <link rel="stylesheet" href="public/css/<?= $css ?>.css" media="screen"><?php endif ?>
    <link rel="stylesheet" href="public/css/tablette.css" media="screen and (max-width: 1400px)">
    <link rel="stylesheet" href="public/css/mobile.css" media="screen and (max-width: 540px)">
    <link rel="shortcut icon" href="../public/images/favicon.webp" type="image/webp">
    <script src="public/js/global.js" defer></script>
    <?php if (isset($js)) : ?><script src="public/js/<?= $js ?>.js" defer></script><?php endif ?>
</head>

<body>
    <header class="row-btw-center">
        <!--DEBUT DU MENU DE NAVIGATION POUR MOBILE-->
        <div class="navigation-mobile wdth-cent">
            <!--MENU BURGER-->
            <nav id="menu-burger" class="column-start">
                <?= $barres->rendre($barres) ?>
                <ul class="menu-mobile invisible column-start">
                    <li>
                        <a href="accueil" class="<?= Active::page('accueil', $controleur) ?>">Accueil</a>
                    </li>
                    <li>
                        <a href="soins" class="<?= Active::page('soins', $controleur) ?>">Soins</a>
                    </li>
                    <li>
                        <a href="categories" class="<?= Active::page('categories', $controleur) ?>">Catégories</a>
                    </li>
                    <li>
                        <a href="coiffures" class="<?= Active::page('coiffures', $controleur) ?>">Coiffures</a>
                    </li>
                    <li>
                        <a href="salon" class="<?= Active::page('salon', $controleur) ?>">Salon</a>
                    </li>
                    <li>
                        <a href="informations" class="<?= Active::page('informations', $controleur) ?>">Informations</a>
                    </li>
                    <li>
                        <a href="fermeture" class="<?= Active::page('fermeture', $controleur) ?>">Fermeture</a>
                    </li>
                    <li>
                        <a href="administrateurs" class="<?= Active::page('administrateurs', $controleur) ?>">Administrateurs</a>
                    </li>
                    <li>
                        <a href="profil" class="<?= Active::page('profil', $controleur) ?>">Profil</a>
                    </li>
                </ul>
            </nav>
            <!--LOGO-->
            <a href="accueil" class="column-center">
                <img src="../public/images/logo-mobile.webp" alt="Petit logo de Genac Tif" title="Retour à l'accueil" width="114" height="39">
                <span class="lecteur-ecran lecteur-ecran-focus">Retour à l'accueil</span>
            </a>
            <nav>
                <ul>
                    <li class="deco">
                        <a href="deconnexion">
                            <?= $deconnexion->rendre($deconnexion) ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--DEBUT DU MENU DE NAVIGATION VERSION PC/TABLETTES-->
        <nav class="navigation wdth-cent row-btw-center">
            <a href="accueil" title="Revenir à l'accueil"><span class="lecteur-ecran lecteur-ecran-focus">Revenir à l'accueil</span>
                <img src="../public/images/logo-mobile.webp" alt="Petit logo de Genac Tif">
            </a>
            <ul class="wdth-cent row-end">
                <li>
                    <a href="accueil" class="<?= Active::page('accueil', $controleur) ?>">Accueil</a>
                </li>
                <li>
                    <a href="soins" class="<?= Active::page('soins', $controleur) ?>">Soins</a>
                </li>
                <li>
                    <a href="categories" class="<?= Active::page('categories', $controleur) ?>">Catégories</a>
                </li>
                <li>
                    <a href="coiffures" class="<?= Active::page('coiffures', $controleur) ?>">Coiffures</a>
                </li>
                <li>
                    <a href="salon" class="<?= Active::page('salon', $controleur) ?>">Salon</a>
                </li>
                <li>
                    <a href="informations" class="<?= Active::page('informations', $controleur) ?>">Informations</a>
                </li>
                <li>
                    <a href="fermeture" class="<?= Active::page('fermeture', $controleur) ?>">Fermeture</a>
                </li>
                <li>
                    <a href="administrateurs" class="<?= Active::page('administrateurs', $controleur) ?>">Administrateurs</a>
                </li>
                <li>
                    <a href="profil" class="<?= Active::page('profil', $controleur) ?>">Profil</a>
                </li>
                <li class="deco">
                    <a href="deconnexion">
                        <?= $deconnexion->rendre($deconnexion) ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!--DEBUT DU CONTENU DES PAGES-->
    <main>

        <section class="console wrapper">
            <h1>Console d'administration</h1>
            <div class="bloc-message">
                <?php if (isset($msg['message'])) : ?>
                    <div class="message <?= $msg['message']['code'] ?>">
                        <?= $msg['message']['text'] ?>
                    </div>
                <?php endif ?>
            </div>
        </section>

        <?php echo $content; ?>

        <!--BOUTON POUR REMONTER EN HAUT DE LA PAGE-->
        <a href="#" id="remonter-haut" class="remonter row-center" title="Remonter en haut de la page">
            <?= $remonter->rendre($remonter) ?>
            <span class="lecteur-ecran lecteur-ecran-focus">Remonter en haut de la page</span>
        </a>

    </main>

</body>

</html>