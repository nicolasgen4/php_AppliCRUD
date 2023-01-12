<?php

/**
 * Vue de la page des soins
 * Affiche le contenu HTML de la page soins
 * Appelle le modèle de l'admin
 */

$title = 'les soins';
$css = 'soinsStyle';

ob_start();

?>

<section class="formulaire wrapper column-start">
    <h2 id="ajouter-produit" class="titres">Ajouter un produit</h2>

    <!--DEBUT DU FORMULAIRE D'AJOUT DE PRODUITS-->
    <form action="soins" enctype="multipart/form-data" method="post" class="column-start">
        <div class="charger-photo row-start-end">
            <div class="column-start">
                <label for="photoProduit">Choisir la photo du produit *</label>
                <input type="file" name="photoProduit" id="photoProduit" accept=".jpg, .png, .gif, .webp" onchange="prevImage(this)" required>
            </div>
            <img class="apercu row-btw-center" src="#" alt="Aucune photo sélectionnée" title="Aperçu de la photo">
        </div>
        <div class="column-start">
            <label for="categorieProduit">Catégorie du produit *</label>
            <select name="categorieProduit" id="categorieProduit" required>
                <option style="display:none" selected="selected" value="">Choisissez une catégorie</option>
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= htmlspecialchars($categorie['id_categories']) ?>">
                        <?= ucfirst(htmlspecialchars($categorie['nom_categories'])) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="column-start">
            <label for="nomProduit">Nom du produit *</label>
            <input type="text" name="nomProduit" id="nomProduit" required>
        </div>
        <div class="column-start">
            <label for="stockProduit">Stock</label>
            <input type="number" name="stockProduit" id="stockProduit">
        </div>
        <div class="column-start">
            <label for="prixProduit">Prix du produit</label>
            <input type="number" name="prixProduit" id="prixProduit" step="any">
        </div>
        <div class="column-start">
            <label for="texteProduit">Description du produit</label>
            <textarea name="texteProduit" id="texteProduit" maxlength="160" placeholder="(160 caractères maximum)"></textarea>
        </div>
        <div class="column-start">
            <p>* Ces champs sont obligatoires</p>
        </div>
        <div class="row-center">
            <button type="submit" name="submit">
                Enregistrer
            </button>
        </div>
    </form>
</section>

<!--DEBUT DES CARTES DE PRODUITS DANS L'ADMIN-->
<section class="affichage wrapper">
    <h2 id="modifier-produit" class="titres">Liste des produits enregistrés</h2>
    <div class="conteneur-soins flex-wrap-center">
        <?php foreach ($produits as $produit) : ?>
            <section class="item-soins column-start">
                <div class="donnees column-btw">
                    <div class="row-center boite-img">
                        <img src="../public/images/produits/<?= htmlspecialchars($produit['photo']) ?>" alt="<?= ucfirst(strtolower(htmlspecialchars($produit['nom']))) ?>" title="<?= ucfirst(strtolower(htmlspecialchars($produit['nom']))) ?>" loading="lazy" width="296" height="248">
                    </div>
                    <h3 class="center"><?= ucfirst(strtolower(htmlspecialchars($produit['nom']))) ?></h3>
                    <p>Catégorie : <?= ucfirst(strtolower(htmlspecialchars($produit['nom_categories']))) ?></p>
                    <p class="row-start-center"><?= mb_strimwidth(ucfirst(htmlspecialchars($produit['texte'])), 0, 160, ' ... ') ?></p>
                    <p>Prix : <?= htmlspecialchars($produit['prix']) ?></p>
                    <p <?php if($produit['stock'] < 2) : ?>class="stock-alerte"<?php endif ?>>Stock : <?= htmlspecialchars($produit['stock']) ?></p>
                </div>
                <div class="actions row-center">
                    <a href="index.php?controleur=soins&action=modifier&id=<?= htmlspecialchars($produit['id_produits']) ?>" class="center">
                        Modifier</a>
                    <a onclick='return confirm("Voulez-vous vraiment supprimer ?")' href="index.php?controleur=soins&action=supprimer&id=<?= htmlspecialchars($produit['id_produits']) ?>&image=<?= (htmlspecialchars($produit['photo'])) ?>" class="center">
                        Supprimer</a>
                </div>
            </section>
        <?php endforeach ?>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
