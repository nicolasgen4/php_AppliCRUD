<?php

/**
 * Vue de la page des informations
 * Affiche le contenu HTML de la page informations
 * Appelle le modèle de l'admin
 */

$title = 'informations';
$css = 'informationsStyle';

ob_start();

?>

<section id="coordonnees" class="wrapper">
    <h2 class="titres">Coordonnées actuelles</h2>

    <!--DEBUT DES COORDONNEES-->
    <div class="adresse column-start">
        <ul class="column-start">
            <li><?= ucfirst(htmlspecialchars($coordonnees['adresse'])) ?></li>
            <li><?= htmlspecialchars($coordonnees['code_postal']) . ' ' . strtoupper(htmlspecialchars($coordonnees['ville'])) ?></li>
            <li><?= htmlspecialchars($coordonnees['telephone']) ?></li>
            <?php if (!empty($coordonnees['complement'])) : ?>
                <li><?= ucfirst(htmlspecialchars($coordonnees['complement'])); ?></li>
            <?php endif ?>
            <li>
                <a id="facebook" href="<?= htmlspecialchars($coordonnees['facebook']) ?>" target="_blank" rel="noreferrer noopener">Mon facebook</a>
            </li>
            <li>
                <ul class="actions row-center center">
                    <li class="row-center"><a href="index.php?controleur=informations&action=modifier&informations=coordonnees&id=<?= htmlspecialchars($coordonnees['id_coordonnees']) ?>#coordonneesModif">Modifier</a></li>
                </ul>
            </li>
        </ul>
    </div>
</section>

<?php if (isset($coordonneesModif['id_coordonnees'])) : ?>
    <!--DEBUT DU FORMULAIRE DE MODIFICATION DES COORDONNEES-->
    <section id="coordonneesModif" class="formulaire wrapper column-start">
        <h2 class="titres">Modifier mes coordonnées</h2>

        <form action="informations" method="post" class="column-start">
            <div class="column-start">
                <label for="adresse">Adresse *</label>
                <input type="text" name="adresse" id="adresse" value="<?php if (isset($coordonneesModif['adresse'])) : ?><?= ucfirst(htmlspecialchars($coordonneesModif['adresse'])); ?><?php endif ?>" required>
            </div>
            <div class="column-start">
                <label for="codePostal">Code postal *</label>
                <input type="text" name="codePostal" id="codePostal" value="<?php if (isset($coordonneesModif['code_postal'])) : ?><?= ucfirst(htmlspecialchars($coordonneesModif['code_postal'])); ?><?php endif ?>" required>
            </div>
            <div class="column-start">
                <label for="ville">Ville *</label>
                <input type="text" name="ville" id="ville" value="<?php if (isset($coordonneesModif['ville'])) : ?><?= strtoupper(htmlspecialchars($coordonneesModif['ville'])); ?><?php endif ?>" required>
            </div>
            <div class="column-start">
                <label for="telephone">Numéro de téléphone *</label>
                <input type="text" name="telephone" id="telephone" value="<?php if (isset($coordonneesModif['telephone'])) : ?><?= ucfirst(htmlspecialchars($coordonneesModif['telephone'])); ?><?php endif ?>" required>
            </div>
            <div class="column-start">
                <label for="complement">Complément d'adresse</label>
                <input type="texte" name="complement" id="complement" value="<?php if (isset($coordonneesModif['complement'])) : ?><?= ucfirst(htmlspecialchars($coordonneesModif['complement'])); ?><?php endif ?>">
            </div>
            <div class="column-start">
                <label for="facebook">Mon adresse facebook *</label>
                <input type="texte" name="facebook" id="facebook" value="<?php if (isset($coordonneesModif['facebook'])) : ?><?= htmlspecialchars($coordonneesModif['facebook']); ?><?php endif ?>">
            </div>
            <div class="column-start">
                <p>* Ces champs sont obligatoires</p>
            </div>
            <div class="column-start">
                <input type="hidden" name="idCoordonnees" id="idCoordonnes" value="<?php if (isset($coordonneesModif['id_coordonnees'])) : ?><?= htmlspecialchars($coordonneesModif['id_coordonnees']); ?><?php endif ?>">
            </div>
            <div class="row-center">
                <button type="submit" name="submit">
                    Enregistrer
                </button>
            </div>
        </form>
    </section>
<?php endif ?>

<!--DEBUT DES HORAIRES-->
<section id="horaires" class="wrapper">
    <h2 class="titres">Horaires actuels</h2>
    <div class="horaires flex-wrap">
        <?php foreach ($horaires as $horaire) : ?>
            <div class="horaire column-start">
                <ul class="column-btw">
                    <li><?= ucfirst(htmlspecialchars($horaire['jour'])) ?></li>
                    <?php if (!empty($horaire['matin'])) : ?>
                        <li><?= ucfirst(htmlspecialchars($horaire['matin'])) ?></li>
                    <?php endif ?>
                    <?php if (!empty($horaire['apres_midi'])) : ?>
                        <li><?= ucfirst(htmlspecialchars($horaire['apres_midi'])) ?></li>
                    <?php endif ?>
                    <li>
                        <ul class="actions row-center center">
                            <li class="row-center"><a href="index.php?controleur=informations&action=modifier&informations=horaires&id=<?= htmlspecialchars($horaire['id_horaires']) ?>#horairesModif">Modifier</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php endforeach ?>
    </div>
</section>

<?php if (isset($horairesModif['id_horaires'])) : ?>
    <!--DEBUT DU FORMULAIRE DE MODIFICATION DES HORAIRES-->
    <section id="horairesModif" class="formulaire wrapper column-start">
        <h2 class="titres">Modifier mes horaires</h2>

        <form action="informations" method="post" class="column-start">
            <div class="column-start">
                <label for="jour">Jour de la semaine *</label>
                <input type="text" name="jour" id="jour" value="<?php if (isset($horairesModif['jour'])) : ?><?= ucfirst(htmlspecialchars($horairesModif['jour'])); ?><?php endif ?>" required>
            </div>
            <div class="column-start">
                <label for="matin">Horaires de la matinée</label>
                <input type="text" name="matin" id="matin" value="<?php if (isset($horairesModif['matin'])) : ?><?= ucfirst(htmlspecialchars($horairesModif['matin'])); ?><?php endif ?>">
            </div>
            <div class="column-start">
                <label for="apresMidi">Horaires de l'après-midi</label>
                <input type="text" name="apresMidi" id="apresMidi" placeholder="(Laissez ce champ vide si le salon est fermé toute la journée)" value="<?php if (isset($horairesModif['apres_midi'])) : ?><?= ucfirst(htmlspecialchars($horairesModif['apres_midi'])); ?><?php endif ?>">
            </div>
            <div class="column-start">
                <p>* Ce champ est obligatoire</p>
            </div>
            <div class="column-start">
                <input type="hidden" name="idHoraires" id="idHoraires" value="<?php if (isset($horairesModif['id_horaires'])) : ?><?= htmlspecialchars($horairesModif['id_horaires']); ?><?php endif ?>">
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
