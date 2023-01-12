<?php

/**
 * Vue de la page modification administrateurs
 * Affiche le contenu HTML de la page modification administrateurs
 * Appelle le modèle de l'admin
 */

$title = 'administrateurs';
$css = 'adminStyle';

ob_start();

?>

<!--DEBUT DU FORMULAIRE DE MODIFCATION D'UN ADMIN-->
<section class="formulaire wrapper column-start">
    <h2 class="titres">Modifier un administrateur</h2>

    <form action="administrateurs" method="post" class="column-start">
        <div class="column-start">
            <label for="nomAdminModif">Nom</label>
            <input type="text" name="nomAdminModif" id="nomAdminModif" value="<?= ucfirst(htmlspecialchars($admininistrateurModif['nom'])) ?>">
        </div>
        <div class="column-start">
            <label for="prenomAdminModif">Prénom</label>
            <input type="text" name="prenomAdminModif" id="prenomAdminModif" value="<?= ucfirst(htmlspecialchars($admininistrateurModif['prenom'])) ?>">
        </div>
        <div class="column-start">
            <label for="emailAdminModif">Email *</label>
            <input type="email" name="emailAdminModif" id="emailAdminModif" value="<?= htmlspecialchars($admininistrateurModif['email']) ?>" required>
        </div>
        <div class="column-start">
            <p>* Ce champ est obligatoire</p>
        </div>
        <input type="hidden" name="idAdminModif" id="idAdminModif" value="<?= htmlspecialchars($admininistrateurModif['id_administrateurs']) ?>">
        <div class="wrap-center modification">
            <button type="submit" name="submit">
                Enregistrer
            </button>
            <a href="administrateurs#administrateurs" class="annuler">
                Annuler
            </a>
        </div>
    </form>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
