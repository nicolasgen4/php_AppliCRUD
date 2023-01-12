<?php

/**
 * Vue de la page contact
 * Affiche le contenu HTML de la page contact
 * Appelle le modèle du site
 */

$title = 'contact';
$description = 'Contactez le salon de coiffure Genac Tif près de Rouillac, envoyez vos idées de coupes de cheveux et toutes vos questions sur la vente de mes produits';
$css = 'contactStyle';
$url = 'https://nicolas.lesacteursduweb.fr/contact';

ob_start();

?>

<div class="contact-bandeau bandeau">
    <!--TITRE DE PAGE MASQUE-->
    <h1 class="lecteur-ecran lecteur-ecran-focus">Contactez le salon de coiffure Genac Tif</h1>
</div>

<!--DEBUT DE l'EN-TETE-->
<section class="wrapper">
    <div class="en-tete row-btw-center">
        <div class="column-start">
            <h2>Me contacter</h2>
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

    <!--DEBUT DES COORDONNES DE CONTACT-->
    <section class="coordonnees column-start">
        <h3>Mon adresse</h3>
        <address>
            <ul>
                <li><?= ucfirst(htmlspecialchars($coordonnees['adresse'])) ?></li>
                <li><?= htmlspecialchars($coordonnees['code_postal']) . ' ' . strtoupper(htmlspecialchars($coordonnees['ville'])) ?></li>
                <?php if (!empty($coordonnees['complement'])) : ?>
                    <li><?= ucfirst(htmlspecialchars($coordonnees['complement'])); ?></li>
                <?php endif ?>
            </ul>
        </address>
        <div class="row-start">
            <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $coordonnees['telephone'])) ?>" class="bouton blanc"><?= htmlspecialchars($coordonnees['telephone']) ?></a>
        </div>
    </section>

    <!--DEBUT DU FORMULAIRE DE CONTACT-->
    <form action="contact#form-contact" method="post" class="formulaire-contact column-start" id="form-contact">
        <?php if (isset($msg['message'])) : ?>
            <div class="message-contact <?= $msg['message']['code'] ?>">
                <?= $msg['message']['text'] ?>
            </div>
        <?php endif ?>
        <div class="identite">
            <label for="name">Identité *</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="nom-prenom row-btw-center">
            <div class="wdth-cinquante column-start">
                <label for="nom">Nom *</label>
                <input type="text" name="nom" id="nom" minlength="3" maxlength="50" value="<?php echo isset($_POST['nom']) ? $nom : htmlspecialchars(''); ?>" required>
            </div>
            <div class="wdth-cinquante column-start">
                <label for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom" minlength="3" maxlength="50" value="<?php echo isset($_POST['prenom']) ? $prenom : htmlspecialchars(''); ?>" required>
            </div>
        </div>
        <div class="column-start">
            <label for="email">Adresse email *</label>
            <input type="email" name="email" id="email" minlength="10" maxlength="50" value="<?php echo isset($_POST['email']) ? $email : htmlspecialchars(''); ?>" required>
        </div>
        <div class="column-start">
            <label for="sujet">Sujet de votre message *</label>
            <input type="text" name="sujet" id="sujet" minlength="10" maxlength="70" value="<?php echo isset($_POST['sujet']) ? $sujet : htmlspecialchars(''); ?>" required>
        </div>
        <div class="column-start">
            <label for="message">Votre message *</label>
            <textarea name="message" id="message" placeholder="Saisissez votre message (maximum 2000 caractères)" minlength="10" maxlength="2000" required><?php echo isset($_POST['message']) ? $message : htmlspecialchars(''); ?></textarea>
        </div>
        <div>
            <p>* Ces champs sont obligatoires</p>
        </div>
        <div class="column-center">
            <button type="submit" name="submit" class="bouton blanc">
                Envoyer
            </button>
        </div>
    </form>
</section>




<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
