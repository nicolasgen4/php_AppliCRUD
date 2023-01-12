<?php

/**
 * Vue de l'erreur 404
 * Affiche le contenu HTML de l'erreur 404
 * Appelle le modèle du site
 */

$title = 'erreur 404';
$css = 'erreur404Style';

ob_start();

?>

<section class="vitrine vitrine-404">
    <div class="wrapper contenu column-center-end">
        <div class="en-tete pleine-page column-start">
            <h1>Oups !</h1>
            <p>Apparemment quelqu’un a mangé cette page, car il semblerait qu’elle n’existe pas...
            </p>
            <div class="boutons-retour row-start-center">
                <a href="accueil" class="bouton noir">Retourner à l'accueil</a>
                <a href="contact" class="bouton noir">Me contacter</a>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
