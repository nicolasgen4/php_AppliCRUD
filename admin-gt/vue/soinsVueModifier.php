<?php

/**
 * Vue de la page de modification des soins
 * Affiche le contenu HTML de la page soins
 * Appelle le modèle de l'admin
 */

$title = 'les soins';
$css = 'soinsStyle';

ob_start();

?>

<section class="formulaire wrapper column-start">
    <h2 class="titres">Modifier un produit</h2>

    <!--DEBUT DU FORMULAIRE DE MODIFICATION DE PRODUITS-->
    <form action="soins" enctype="multipart/form-data" method="post" class="column-start">
        <div class="charger-photo row-start-end">
            <div class="column-start">
                <label for="photoProduitModifie">Photo du produit *</label>
                <input type="file" name="photoProduitModifie" id="photoProduitModifie" accept=".jpg, .png, .gif, .webp" onchange="prevImage(this)">
            </div>
            <img class="apercu row-btw-center" src="../public/images/produits/<?= htmlspecialchars($produitModifie['photo']) ?>" alt="Aucune photo sélectionnée" title="Aperçu de la photo">
        </div>
        <div class="column-start">
            <label for="categorieProduitModifie">Catégorie de produit *</label>
            <select name="categorieProduitModifie" id="categorieProduitModifie" required>
                <option style="display:none" selected="selected" value="<?= htmlspecialchars($produitModifie['categories_id']) ?>"><?= ucfirst(htmlspecialchars($produitModifie['nom_categories'])) ?></option>
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= htmlspecialchars($categorie['id_categories']) ?>"><?= ucfirst(htmlspecialchars($categorie['nom_categories'])) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="column-start">
            <label for="nomProduitModifie">Nom du produit *</label>
            <input type="text" name="nomProduitModifie" id="nomProduitModifie" value="<?= ucfirst(htmlspecialchars($produitModifie['nom'])) ?>" required>
        </div>
        <div class="column-start">
            <label for="stockProduitModifie">Stock</label>
            <input type="number" name="stockProduitModifie" id="stockProduitModifie" value="<?= htmlspecialchars($produitModifie['stock']) ?>">
        </div>
        <div class="column-start">
            <label for="prixProduitModifie">Prix du produit</label>
            <input type="number" name="prixProduitModifie" id="prixProduitModifie" value="<?= htmlspecialchars($produitModifie['prix']) ?>" step="any">
        </div>
        <div class="column-start">
            <label for="textProduitModifie">Description du produit</label>
            <textarea name="texteProduitModifie" id="texteProduitModifie" maxlength="160" placeholder="(160 caractères maximum)"><?= ucfirst(htmlspecialchars($produitModifie['texte'])) ?></textarea>
        </div>
        <div class="column-start">
            <p>* Ces champs sont obligatoires</p>
        </div>
        <div class="column-start">
            <input type="hidden" name="idProduitModifie" id="idProduitModifie" value="<?= htmlspecialchars($produitModifie['id_produits']) ?>">
        </div>
        <div class="column-start">
            <input type="hidden" name="photoProduit" id="photoProduit" value="<?= htmlspecialchars($produitModifie['photo']) ?>">
        </div>
        <div class="wrap-center modification">
            <button type="submit" name="submit">
                Enregistrer
            </button>
            <a href="soins#modifier-produit" class="annuler">
                Annuler
            </a>
        </div>
    </form>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
