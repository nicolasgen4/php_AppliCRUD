<?php

/**
 * Vue de la page des catégories
 * Affiche le contenu HTML de la page categories
 * Appelle le modèle de l'admin
 */

$title = 'categories';
$css = 'categoriesStyle';

ob_start();

?>

<section class="formulaire wrapper">
    <h2 id="ajouter-categorie" class="titres">Ajouter une catégorie</h2>

    <div class="categories column-start">
        <!--DEBUT DU FORMULAIRE D'AJOUT DE CATÉGORIES-->
        <form action="categories" method="post" class="column-start">
            <div class="column-start">
                <label for="nomCategorie">Nom de la catégorie</label>
                <input type="text" name="nomCategorie" id="nomCategorie" required>
            </div>
            <div class="row-center">
                <button type="submit" name="submit">
                    Enregistrer
                </button>
            </div>
        </form>
        <!--DEBUT DES CARTES DE CATÉGORIES-->
        <ul id="liste-categories" class="flex-wrap center">
            <?php foreach ($categories as $categorie) : ?>
                <li class="column-center"><span><?= ucfirst(strtolower(htmlspecialchars($categorie['nom_categories']))) ?></span>
                    <ul class="actions row-center">
                        <li class="row-center">
                            <a href="index.php?controleur=categories&action=modifier&id=<?= htmlspecialchars($categorie['id_categories']) ?>#modifier-categorie">
                                Modifier</a>
                        </li>
                        <li class="row-center">
                            <a onclick='return confirm("Attention : ceci supprimera aussi les produits associés à la catégorie. Supprimer quand même ?")' href="index.php?controleur=categories&action=supprimer&id=<?= htmlspecialchars($categorie['id_categories']) ?>">
                                Supprimer</a>
                        </li>
                    </ul>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>

<!--DEBUT DU FORMULAIRE DE MODIFICATION DE CATÉGORIES-->
<?php if (isset($categorieModifie['id_categories'])) : ?>
    <section id="modifier-categorie" class="formulaire wrapper column-start">
        <h2 class="titres">Modifier une catégorie</h2>

        <form action="categories" method="post" class="column-start">
            <div class="column-start">
                <label for="nomCategorieModif">Nom de la catégorie</label>
                <input type="text" name="nomCategorieModif" id="nomCategorieModif" value="<?php if (isset($categorieModifie['nom_categories'])) : ?><?= ucfirst(htmlspecialchars($categorieModifie['nom_categories'])); ?><?php endif ?>" required>
            </div>
            <div class="column-start">
                <input type="hidden" name="idCategorieModif" id="idCategorieModif" value="<?php if (isset($categorieModifie['id_categories'])) : ?><?= htmlspecialchars($categorieModifie['id_categories']); ?><?php endif ?>">
            </div>
            <div class="row-center">
                <button type="submit" name="submit">
                    Enregistrer
                </button>
            </div>
        </form>
    </section>
<?php endif ?>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
