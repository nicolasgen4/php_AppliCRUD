<?php

/**
 * Vue de la page administrateurs
 * Affiche le contenu HTML de la page administrateurs
 * Appelle le modèle de l'admin
 */

$title = 'administrateurs';
$css = 'adminStyle';

ob_start();

?>

<!--DEBUT DU FORMULAIRE D'AJOUT D'ADMIN-->
<section id="ajouter-admin" class="formulaire wrapper column-start">
    <h2 class="titres">Ajouter un administrateur</h2>

    <form action="administrateurs" method="post" class="column-start">
        <div class="column-start">
            <label for="nomAdmin">Nom</label>
            <input type="text" name="nomAdmin" id="nomAdmin">
        </div>
        <div class="column-start">
            <label for="prenomAdmin">Prénom</label>
            <input type="text" name="prenomAdmin" id="prenomAdmin">
        </div>
        <div class="column-start">
            <label for="emailAdmin">Email *</label>
            <input type="email" name="emailAdmin" id="emailAdmin" required>
        </div>
        <div class="column-start">
            <label for="mdpAdmin">Mot de passe *</label>
            <input type="text" name="mdpAdmin" id="mdpAdmin" required>
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

<!--DEBUT DES CARTES DES ADMINISTRATEURS-->
<section id="administrateurs" class="wrapper">
    <h2 class="titres">Liste des administrateurs enregistrés</h2>

    <div class="admin column-start">
        <?php foreach ($administrateurs as $administrateur) : ?>
            <ul class="column-start">
                <?php if (!empty($administrateur['nom']) && !empty([$administrateur['prenom']])) : ?>
                    <li><?= ucfirst(htmlspecialchars($administrateur['nom'])) . ' ' . ucfirst(htmlspecialchars($administrateur['prenom'])) ?></li>
                <?php endif ?>
                <li>Email : <?= htmlspecialchars($administrateur['email']) ?></li>
                <?php if ($_SESSION['administrateur']['role'] !== NULL) : ?>
                    <li>
                        <ul class="actions row-center center">
                            <li class="row-center"><a href="index.php?controleur=administrateurs&action=modifier&id=<?= htmlspecialchars($administrateur['id_administrateurs']) ?>">Modifier</a></li>
                            <?php if ($administrateur['role'] == NULL) : ?>
                                <li onclick='return confirm("Voulez-vous vraiment supprimer ?")' class="row-center"><a href="index.php?controleur=administrateurs&action=supprimer&id=<?= htmlspecialchars($administrateur['id_administrateurs']) ?>">Supprimer</a></li>
                            <?php endif ?>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
        <?php endforeach ?>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
