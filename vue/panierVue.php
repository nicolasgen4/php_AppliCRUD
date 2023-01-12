<?php

/**
 * Vue du panier
 * Affiche le contenu HTML du panier
 * Appelle le modèle du site
 */

$title = 'panier';
$css = 'panierStyle';
$js = 'panierScript';

ob_start();

?>

<div class="panier-bandeau bandeau">
    <!--TITRE DE PAGE MASQUE-->
    <h1 class="lecteur-ecran lecteur-ecran-focus">Votre panier de produits réservés grâce au click and collect</h1>
</div>

<!--DEBUT DE l'EN-TETE-->
<section class="wrapper">
    <div id="contenu-panier" class="en-tete row-btw-center">
        <div class="column-start">
            <h2>Votre panier</h2>
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
    </div>

    <!--DEBUT DU CONTENU DU PANIER-->
    <div class="panier column-start">
        <?php if ($cart->isEmpty()) : ?>
            <section class="column-center panier-vide">
                <img src="public/images/panier-vide.webp" alt="Des chatons dans un panier" title="Oups, mon panier est vide !" width="640" height="454">
                <h3>Votre panier est vide !</h3>
            </section>
        <?php endif ?>
        <?php foreach ($allItems as $items) : ?>
            <?php foreach ($items as $item) : ?>
                <?php $produit = retournerUnProduit($bdd, htmlspecialchars($item['id'])); ?>
                <div class="etiquette row-start">
                    <img src="public/images/produits/<?= htmlspecialchars($produit['photo']) ?>" alt="<?= ucfirst(htmlspecialchars($produit['nom'])) ?>" title="<?= ucfirst(htmlspecialchars($produit['nom'])) ?>" width="180" height="180" loading="lazy">
                    <section class="column-btw wdth-cent">
                        <div class="titre-prix row-btw-center">
                            <h3><?= ucfirst(htmlspecialchars($produit['nom'])) ?> <span>(Quantité : <?= htmlspecialchars($item['quantity']) ?>)</span></h3>
                            <p><?= htmlspecialchars($produit['prix']) ?> € / unité</p>
                        </div>
                        <p>Catégorie : <?= ucfirst(htmlspecialchars($produit['nom_categories'])) ?></p>
                        <p><?= htmlspecialchars($produit['texte']) ?></p>
                        <div class="row-btw-center">
                            <form action="index.php?controleur=panier&action=modifier#contenu-panier" method="post" class="row-start">
                                <div class="row-start-center">
                                    <label for="quantiteModif">Changer la quantité :</label>
                                    <input type="number" name="quantiteModif" id="quantiteModif" min="1" max="<?= htmlspecialchars($produit['stock']) ?>" value="<?= htmlspecialchars($item['quantity']) ?>">
                                    <div class="column-center">
                                        <button type="submit" name="submit">
                                            OK
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="idProduit" id="idProduit" value="<?= htmlspecialchars($item['id']) ?>">
                                <input type="hidden" name="prixProduit" id="prixProduit" value="<?= htmlspecialchars($item['attributes']['price']) ?>">
                            </form>
                            <a href="index.php?controleur=panier&action=supprimer&id=<?= htmlspecialchars($item['id']) ?>#contenu-panier" class="row-center">Supprimer ce produit
                                <?= $corbeille->rendre($corbeille); ?>
                            </a>
                        </div>
                    </section>
                </div>
            <?php endforeach ?>
        <?php endforeach ?>
        <!--DEBUT DE LA SECTION DE FIN DU PANIER-->
        <?php if (!$cart->isEmpty() && (!isset($annonce['id_annonces']))) : ?>
            <div class="column-center-end somme">
                <p>Nombre total d'articles : <?= htmlspecialchars($cart->getTotalQuantity()) ?></p>
                <p>Somme totale : <?= htmlspecialchars($cart->getAttributeTotal('price')) ?> €</p>
            </div>
            <div class="actions-panier row-center">
                <a href="soins#reserver-soins" class="bouton blanc">Réserver d'autres soins</a>
                <a href="#reservation" class="bouton blanc">Finaliser la réservation</a>
            </div>
        <?php endif ?>
    </div>
</section>

<!--DEBUT DE LA SECTION DE RÉSERVATION-->
<?php if (!$cart->isEmpty() && (!isset($annonce['id_annonces']))) : ?>
    <section id="reservation" class="test wrapper">
        <div class="en-tete column-start">
            <h2>Retirer vos produits</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore
                et
                dolore magna aliqua.</p>
        </div>
        <?php if (isset($msg['message'])) : ?>
            <div class="message-reservation <?= $msg['message']['code'] ?>">
                <?= $msg['message']['text'] ?>
            </div>
        <?php endif ?>
        <!--DEBUT DU FORMULAIRE DE RÉSERVATION-->
        <form action="panier#reservation" method="post" class="formulaire-reservation">
            <div class="haut column-start">
                <div class="row-btw-center">
                    <div class="client row-btw-center wdth-cinquante">
                        <div class="champ column-start wdth-cinquante">
                            <label for="nomClient">Votre nom *</label>
                            <input type="text" name="nomClient" id="nomClient" minlength="3" maxlength="50" value="<?php echo isset($_POST['nomClient']) ? $nom : htmlspecialchars(''); ?>" required>
                        </div>
                        <div class="champ column-start wdth-cinquante">
                            <label for="prenomClient">Votre prénom *</label>
                            <input type="text" name="prenomClient" id="prenomClient" minlength="3" maxlength="50" value="<?php echo isset($_POST['prenomClient']) ? $prenom : htmlspecialchars(''); ?>" required>
                        </div>
                    </div>
                    <div class="champ column-start wdth-cinquante">
                        <label for="emailClient">Votre email *</label>
                        <input type="email" name="emailClient" id="emailClient" minlength="10" maxlength="50" value="<?php echo isset($_POST['emailClient']) ? $email : htmlspecialchars(''); ?>" required>
                    </div>
                </div>
                <div class="row-btw-center">
                    <div class="champ column-start wdth-cinquante">
                        <label for="jour">Quel jour souhaitez-vous venir ?</label>
                        <select name="jour" id="jour" required>
                            <option style="display:none" selected="selected" value="">Choisissez le jour de votre collecte</option>
                            <?php foreach ($horaires as $horaire) : ?>
                                <?php if ($horaire['matin'] !== 'fermé' && $horaire['apres_midi'] !== NULL || $horaire['matin'] !== 'fermé' && $horaire['apres_midi'] !== 'fermé') : ?>
                                    <option value="<?= strtolower(trim(htmlspecialchars($horaire['jour']))) ?>"><?= ucfirst(trim(htmlspecialchars($horaire['jour']))) ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="champ column-start wdth-cinquante">
                        <label for="moment">À quel moment de la journée ?</label>
                        <select name="moment" id="moment" required>
                            <option style="display:none" selected="selected" value="">Choisissez l'heure de votre collecte</option>
                            <?php foreach ($horaires as $horaire) : ?>
                                <option class="moments <?= strtolower(trim(htmlspecialchars($horaire['jour']))) ?>"><?= ucfirst(trim(htmlspecialchars($horaire['matin']))) ?></option>
                                <option class="moments <?= strtolower(trim(htmlspecialchars($horaire['jour']))) ?>"><?= ucfirst(trim(htmlspecialchars($horaire['apres_midi']))) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="column-start">
                <label for="messageClient">Votre message (optionnel)</label>
                <textarea name="messageClient" id="messageClient" placeholder="Une précision pour votre collecte ? Un message à m'adresser ? (maximum 2000 caractères)" minlength="10" maxlength="2000"><?php echo isset($_POST['messageClient']) ? $message : htmlspecialchars(''); ?></textarea>
            </div>
            <input type="hidden" name="reservation" value="<ul><?php foreach ($allItems as $items) : ?><?php foreach ($items as $item) : ?><?php $produit = retournerUnProduit($bdd, htmlspecialchars($item['id'])); ?><li><?= htmlspecialchars($item['quantity']) ?> <?= ucfirst(htmlspecialchars($produit['nom'])) ?></li><?php endforeach ?><?php endforeach ?></ul>">
            <div class="column-start">
                <p>* Ces champs sont obligatoires</p>
            </div>
            <div class="column-center">
                <button type="submit" name="submit" class="bouton blanc">
                    Réserver
                </button>
            </div>
        </form>
    </section>
<?php endif ?>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
