<?php

/**
 * Vue de la page de modification des coiffures
 * Affiche le contenu HTML de la page modification coiffures
 * Appelle le modèle de l'admin
 */

$title = 'les coiffures';
$css = 'coiffuresStyle';

ob_start();

?>

<section class="formulaire wrapper column-start">
    <h2 class="titres">Modifier une coiffure</h2>

    <!--DEBUT DU FORMULAIRE DE MODIFICATION DE COIFFURES-->
    <form action="coiffures" enctype="multipart/form-data" method="post" class="column-start">
        <div class="charger-photo row-start-end">
            <div class="column-start">
                <label for="photoCoiffureModif">Modifier la photo de la coiffure *</label>
                <input type="file" name="photoCoiffureModif" id="photoCoiffureModif" accept=".jpg, .png, .gif, .webp" onchange="prevImage(this)">
            </div>
            <img class="apercu row-btw-center" src="../public/images/coiffures/<?= htmlspecialchars($coiffureModifie['photo']) ?>" alt="Aucune photo sélectionnée" title="Aperçu de la photo">
        </div>
        <div class="column-start">
            <label for="titreCoiffureModif">Titre de la coiffure *</label>
            <input type="text" name="titreCoiffureModif" id="titreCoiffureModif" value="<?= ucfirst(htmlspecialchars($coiffureModifie['titre'])) ?>" required>
        </div>
        <div class="column-start">
            <label for="prixCoiffureModif">Prix de la coiffure</label>
            <input type="number" name="prixCoiffureModif" id="prixCoiffureModif" value="<?= ucfirst(htmlspecialchars($coiffureModifie['prix'])) ?>" step="any">
        </div>
        <div class="column-start">
            <label for="texteCoiffureModif">Description de la coiffure</label>
            <textarea name="texteCoiffureModif" id="texteCoiffureModif" maxlength="400" placeholder="(400 caractères maximum)"><?= ucfirst(htmlspecialchars($coiffureModifie['texte'])) ?></textarea>
        </div>
        <div class="column-start">
            <p>* Ces champs sont obligatoires</p>
        </div>
        <input type="hidden" name="idCoiffureModif" id="idCoiffureModif" value="<?= htmlspecialchars($coiffureModifie['id_coiffures']) ?>">
        <input type="hidden" name="photoCoiffure" id="photoCoiffure" value="<?= htmlspecialchars($coiffureModifie['photo']) ?>">
        <div class="wrap-center modification">
            <button type="submit" name="submit">
                Enregistrer
            </button>
            <a href="coiffures#modifier-coiffure" class="annuler">
                Annuler
            </a>
        </div>
    </form>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
