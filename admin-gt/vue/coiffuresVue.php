<?php

/**
 * Vue de la page des coiffures
 * Affiche le contenu HTML de la page coiffures
 * Appelle le modèle de l'admin
 */

$title = 'les coiffures';
$css = 'coiffuresStyle';

ob_start();

?>

<!--DEBUT DU FORMULAIRE D'AJOUT DE COIFFURES-->
<section class="formulaire wrapper column-start">
    <h2 id="ajouter-coiffure" class="titres">Ajouter une coiffure</h2>

    <form action="coiffures" enctype="multipart/form-data" method="post" class="column-start">
        <div class="charger-photo row-start-end">
            <div class="column-start">
                <label for="photoCoiffure">Choisir la photo de la coiffure *</label>
                <input type="file" name="photoCoiffure" id="photoCoiffure" accept=".jpg, .png, .gif, .webp" onchange="prevImage(this)" required>
            </div>
            <img class="apercu row-center" src="#" alt="Aucune photo sélectionnée" title="Aperçu de la photo">
        </div>
        <div class="column-start">
            <label for="titreCoiffure">Titre de la coiffure *</label>
            <input type="text" name="titreCoiffure" id="titreCoiffure" required>
        </div>
        <div class="column-start">
            <label for="prixCoiffure">Prix de la coiffure</label>
            <input type="number" name="prixCoiffure" id="prixCoiffure" step="any">
        </div>
        <div class="column-start">
            <label for="texteCoiffure">Description de la coiffure</label>
            <textarea name="texteCoiffure" id="texteCoiffure" maxlength="400" placeholder="(400 caractères maximum)"></textarea>
        </div>
        <div class="column-start">
            <p>* Ces champs sont obligatoires</p>
        </div>
        <div class="row-center">
            <button type="submit" name="submit" class="">
                Enregistrer
            </button>
        </div>
    </form>
</section>

<!--DEBUT DES CARTES DES COIFFURES DANS L'ADMIN-->
<section class="affichage wrapper column-start">
    <h2 id="modifier-coiffure" class="titres">Liste des coiffures enregistrées</h2>
    <div class="liste-coiffures flex-wrap-center">
        <?php foreach ($coiffures as $coiffure) : ?>
            <div class="column-center">
                <div class="column-start">
                    <img src="../public/images/coiffures/<?= htmlspecialchars($coiffure['photo']) ?>" alt="<?= ucfirst(strtolower(trim(htmlspecialchars($coiffure['titre'])))) ?>" title="<?= ucfirst(strtolower(trim(htmlspecialchars($coiffure['titre'])))) ?>" loading="lazy" width="280" height="460">
                    <p><?= ucfirst(trim(htmlspecialchars($coiffure['titre']))) ?></p>
                </div>
                <div class="actions row-center">
                    <a href="index.php?controleur=coiffures&action=modifier&id=<?= htmlspecialchars($coiffure['id_coiffures']) ?>" class="center">Modifier</a>
                    <a onclick='return confirm("Voulez-vous vraiment supprimer ?")' href="index.php?controleur=coiffures&action=supprimer&id=<?= htmlspecialchars($coiffure['id_coiffures']) ?>&image=<?= (htmlspecialchars($coiffure['photo'])) ?>" class="center">Supprimer</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
