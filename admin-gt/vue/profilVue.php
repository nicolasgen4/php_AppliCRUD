<?php

/**
 * Vue de la page de profil
 * Affiche le contenu HTML de la page profil
 * Appelle le modèle de l'admin
 */

$title = 'profil';
$css = 'profilStyle';
$js = 'profilScript';

ob_start();

?>

<section class="formulaire wrapper">
    <h2 class="titres">Modifier votre profil</h2>

    <!--DEBUT DU FORMULAIRE DE MODIFICATION DU PROFIL-->
    <form action="index.php?controleur=profil" method="post" class="column-start" onsubmit="return verifierMdp()">
        <div class="column-start">
            <label for="emailProfil">Email *</label>
            <input type="email" name="emailProfil" id="emailProfil" value="<?= htmlspecialchars($profil['email']) ?>" required>
        </div>
        <div class="column-start">
            <label for="nomProfil">Nom</label>
            <input type="text" name="nomProfil" id="nomProfil" value="<?= ucfirst(htmlspecialchars($profil['nom'])) ?>">
        </div>
        <div class="column-start">
            <label for="prenomProfil">Prénom</label>
            <input type="text" name="prenomProfil" id="prenomProfil" value="<?= ucfirst(htmlspecialchars($profil['prenom'])) ?>">
        </div>
        <div class="column-start mdp-actuel">
            <label for="passeProfil">Mot de passe actuel *</label>
            <input type="password" name="passeProfil" id="passeProfil" required>
            <span class="oeil">
                <?= $oeilAct->rendre($oeilAct) ?>
            </span>
        </div>
        <div class="column-start nouveau-mdp">
            <label for="nouveauMdp">Nouveau mot de passe *</label>
            <input type="password" name="nouveauMdp" id="nouveauMdp" required>
            <span class="oeil">
                <?= $oeilNv->rendre($oeilNv) ?>
            </span>
        </div>
        <div class="column-start confirm-mdp">
            <label for="confirmMdp">Confirmer le nouveau mot de passe *</label>
            <input type="password" name="confirmMdp" id="confirmMdp" required>
            <span class="oeil">
                <?= $oeilConf->rendre($oeilConf) ?>
            </span>
        </div>
        <div class="column-start">
            <p>* Ces champs sont obligatoires</p>
        </div>
        <div class="column-start">
            <input type="hidden" name="idProfil" id="idProfil" value="<?= htmlspecialchars($profil['id_administrateurs']) ?>">
        </div>
        <div class="row-center">
            <button type="submit" name="submit">
                Enregistrer
            </button>
        </div>
    </form>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
