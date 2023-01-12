<?php

/**
 * Vue de la page des soins
 * Affiche le contenu HTML de la page soins
 * Appelle le modèle du site
 */

$title = 'les soins';
$description = 'Réservez en ligne vos produits pour soigner vos cheveux : vos shampoings, vos soins, vos couleurs, etc., grâce au Click and Collect de Genac Tif';
$css = 'soinsStyle';
$js = 'soinsScript';
$url = 'https://nicolas.lesacteursduweb.fr/soins';

ob_start();

?>

<div class="soins-bandeau bandeau">
    <!--TITRE DE PAGE MASQUE-->
    <h1 class="lecteur-ecran lecteur-ecran-focus">Réservez vos produits pour cheveux grâce au click and collect</h1>
</div>

<section class="wrapper">
    <!--DEBUT DE l'EN-TETE-->
    <div id="reserver-soins" class="en-tete row-btw-center">
        <div class="column-start">
            <h2>Réservez vos soins</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore
                et
                dolore magna aliqua.</p>
        </div>
        <?php if (isset($annonce['id_annonces'])) : ?>
            <!--ANNONCE DE VACANCES-->
            <div class="row-center annonce">
                <p><?= mb_strimwidth(ucfirst(nl2br(trim(htmlspecialchars($annonce['texte'])))), 0, 220, '...') ?></p>
            </div>
        <?php endif ?>
        <!--ICONE DU PANIER-->
        <?php if (!isset($annonce['id_annonces'])) : ?>
            <a href="panier" class="icone-panier column-center center">
                <?php if (isset($_SESSION['cart'])) : ?>
                    <span class="quantite-panier"><?= htmlspecialchars($_SESSION['cart']->getTotalQuantity()) ?></span>
                <?php endif ?>
                <?= $panier->rendre($panier) ?>
                <span class="titre-panier">Votre panier</span>
            </a>
        <?php endif ?>
    </div>

    <!--DEBUT DES BOUTONS POUR FILTRER LES CATEGORIES-->
    <div id="filtres" class="column-center">
        <div class="filtres row-wrap-center">
            <?php foreach ($categories as $categorie) : ?>
                <button class="filtre bouton blanc"><?= strtolower(trim(htmlspecialchars($categorie['nom_categories']))) ?></button>
            <?php endforeach ?>
        </div>
        <div>
            <button id="reinitialiser" class="reinitialiser-filtres">Réinitialiser les filtres</button>
        </div>
    </div>

    <!--DEBUT DES CARTES DE PRODUITS-->
    <div class="produits row-wrap-center">
        <?php foreach ($produits as $produit) : ?>
            <?php if ($produit['stock'] > 0) : ?>
                <section class="item <?= strtolower(trim(htmlspecialchars($produit['nom_categories']))) ?> column-btw">
                    <div class="boite-image">
                        <img src="public/images/produits/<?= htmlspecialchars($produit['photo']) ?>" alt="<?= ucfirst(strtolower(trim(htmlspecialchars($produit['nom'])))) ?>" title="<?= ucfirst(strtolower(trim(htmlspecialchars($produit['nom'])))) ?>" width="358" height="300" loading="lazy">
                    </div>
                    <h3 class="center"><?= ucfirst(strtolower(trim(htmlspecialchars($produit['nom'])))) ?></h3>
                    <p>Catégorie : <?= ucfirst(strtolower(trim(htmlspecialchars($produit['nom_categories'])))) ?></p>
                    <p class="row-start-center"><?= mb_strimwidth(ucfirst(htmlspecialchars($produit['texte'])), 0, 160, ' ... ') ?></p>
                    <p>Prix : <span><?= trim(htmlspecialchars($produit['prix'])) ?> €</span></p>
                    <p>En stock : <span><?= htmlspecialchars($produit['stock']) ?></span></p>
                    <form action="panier#contenu-panier" method="post" class="column-start">
                        <div class="quantite row-start-center">
                            <label for="quantiteProduit">Quantité</label>
                            <input class="center" type="number" name="quantiteProduit" id="quantiteProduit" min="1" max="<?= htmlspecialchars($produit['stock']) ?>" required>
                        </div>
                        <input type="hidden" name="idProduit" id="idProduit" value="<?= htmlspecialchars($produit['id_produits']) ?>">
                        <input type="hidden" name="prixProduit" id="prixProduit" value="<?= trim(htmlspecialchars($produit['prix'])) ?>">
                        <div class="row-start">
                            <button type="submit" name="submit" class="bouton blanc reserver<?php if (isset($annonce['id_annonces'])) : ?><?= strtolower(htmlspecialchars(' ' . $annonce['valeur'])) ?><?php endif ?>">
                                Réserver
                            </button>
                        </div>
                    </form>
                </section>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
