<?php

/**
 * Vue de la page merci
 * Affiche le contenu HTML de la page merci
 * Appelle le modèle du site
 */

$title = 'merci';
$css = 'merciStyle';

ob_start();

?>

<section class="vitrine vitrine-merci">
    <div class="wrapper contenu column-center-end">
        <div class="en-tete pleine-page column-start">
            <h1>Merci !</h1>
            <p>J’ai bien reçu votre réservation, elle vous attend avec impatience à mon salon. À très bientôt !
            </p>
            <div class="boutons-retour row-start-center">
                <a href="soins" class="bouton noir">Retourner aux soins</a>
                <a href="informations" class="bouton noir">Venir sur place</a>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
