<?php

/**
 * Vue de la page de fermeture
 * Affiche le contenu HTML de la page fermeture
 * Appelle le modèle de l'admin
 */

$title = 'fermeture';
$css = 'fermetureStyle';

ob_start();

?>

<!--DEBUT DE LA SECTION D'EXPLICATIONS-->
<section id="fermeture" class="formulaire wrapper">
    <h2 class="titres">Fermer mon salon</h2>
    <p class="column-start">
        En quoi consiste ce mode vacances ?</p>
    <ul class="column-start">
        <li>Ce mode permet d'avertir les clients de la fermeture temporaire du salon</li>
        <li>Une annonce de fermeture sera visible sur les pages des soins, des informations, du contact et du panier</li>
        <li>Les réservations de produits seront automatiquement fermées dans la boutique et le panier</li>
        <li>Le formulaire de contact n'est pas désactivé et enverra toujours les messages</li>
    </ul>
    <p class="column-start">
        Comment fonctionne ce mode vacances ?</p>
    <ul class="column-start">
        <li>Pour activer le mode vacances, il vous suffit de publier une nouvelle annonce</li>
        <li>Pour désactiver le mode vacances, supprimez simplement l'annonce publiée</li>
        <li>Une fois l'annonce supprimée, le site réactivera automatiquement toutes les fonctionnalités de réservation</li>
    </ul>

    <?php if (!isset($annonce['id_annonces']) && (!isset($annonceModif['id_annonces']))) : ?>
        <!--DEBUT DU FORMULAIRE D'AJOUT D'ANNONCE-->
        <form action="fermeture" method="post" class="column-start">
            <div class="column-start">
                <label for="texteAnnonce">Publier une nouvelle annonce</label>
                <textarea name="texteAnnonce" id="texteAnnonce" maxlength="220" placeholder="(220 caractères maximum)" required></textarea>
            </div>
                <input type="hidden" name="valeurAnnonce" id="valeurAnnonce" value="ferme">
                <input type="hidden" name="idAnnonce" id="idAnnonce" value="1">
            <div class="row-center">
                <button type="submit" name="submit">
                    Enregistrer
                </button>
            </div>
        </form>
    <?php endif ?>
</section>

<!--DEBUT DE L'AFFICHAGE DE L'ANNONCE-->
<?php if (isset($annonce['id_annonces'])) : ?>
    <section class="wrapper">
        <h2 class="titres">Annonce actuelle</h2>

        <div class="annonce column-start">
            <p class=" column-start">
                <?= ucfirst(nl2br(htmlspecialchars($annonce['texte']))) ?></p>
            <ul class="actions row-center center">
                <a href="index.php?controleur=fermeture&action=modifier&id=<?= htmlspecialchars($annonce['id_annonces']) ?>#modif-annonce">
                    Modifier</a>
                <li class="row-center">
                    <a onclick='return confirm("Voulez-vous vraiment supprimer ?")' href="index.php?controleur=fermeture&action=supprimer&id=<?= htmlspecialchars($annonce['id_annonces']) ?>" class="center">Supprimer</a>
                </li>
            </ul>
        </div>
    </section>
<?php endif ?>

<?php if (isset($annonceModif['id_annonces'])) : ?>
    <section id="modif-annonce" class="formulaire wrapper column-start">
        <h2 class="titres">Modifier une annonce</h2>

        <!--DEBUT DU FORMULAIRE DE MODIFICATION DE L'ANNONCE-->
        <form action="fermeture" method="post" class="column-start">
            <div class="column-start">
                <label for="annonceModifie">Modifier l'annonce</label>
                <textarea name="annonceModifie" id="annonceModifie" required><?php if (isset($annonceModif['texte'])) : ?><?= ucfirst(htmlspecialchars($annonceModif['texte'])); ?><?php endif ?></textarea>
            </div>
            <div class="column-start">
                <input type="hidden" name="idAnnonce" id="idAnnonce" value="<?php if (isset($annonceModif['id_annonces'])) : ?><?= ucfirst(htmlspecialchars($annonceModif['id_annonces'])); ?><?php endif ?>">
            </div>
            <div class="wrap-center modification">
                <button type="submit" name="submit">
                    Enregistrer
                </button>
                <a href="fermeture" class="annuler">
                    Annuler
                </a>
            </div>
        </form>
    </section>
<?php endif ?>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
