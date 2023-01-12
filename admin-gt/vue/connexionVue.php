<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à l'administration</title>
    <link rel="stylesheet" href="public/css/normalize.css" media="all">
    <link rel="stylesheet" href="public/css/googleFonts.css" media="all">
    <link rel="stylesheet" href="public/css/global.css" media="screen">
    <link rel="stylesheet" href="public/css/connexionStyle.css" media="screen">
    <link rel="stylesheet" href="public/css/tablette.css" media="screen and (max-width: 1240px)">
    <link rel="stylesheet" href="public/css/mobile.css" media="screen and (max-width: 384px)">
    <link rel="shortcut icon" href="../public/images/favicon.webp" type="image/webp">
    <script src="public/js/connexionScript.js" defer></script>
</head>

<body>

    <main>
        <div class="column-center">
            <section class="column-center entree-admin">
                <!--LOGO-->
                <a href="../accueil">
                    <img src="../public/images/logo.webp" alt="Logo de Genac Tif" title="Retour à l'accueil du site" width="317" height="164">
                    <span class="lecteur-ecran lecteur-ecran-focus">Retour à l'accueil du site</span>
                </a>

                <h1>Console d'administration</h1>

                <?php if (isset($_SESSION['message'])) : ?>
                    <!--MESSAGE D'INFORMATIONS DE SESSION-->
                    <div class="connexion <?= $_SESSION['message']['code'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php unset($_SESSION['message']);
                endif ?>

                <!--DEBUT DU FORMULAIRE DE CONNEXION-->
                <form action="connexion" method="post" class="column-start connexion-form wdth-cent">
                    <div class="champ column-start">
                        <label for="identifiant">Email</label>
                        <input type="email" name="identifiant" id="identifiant" required>
                    </div>
                    <div class="champ champ-mdp column-start">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" name="motdepasse" id="motdepasse" required>
                        <span class="oeil">
                            <?= $oeil->rendre($oeil) ?>
                        </span>
                    </div>
                    <div class="row-center">
                        <button type="submit" name="submit">
                            Connexion
                        </button>
                    </div>
                </form>
            </section>
        </div>

    </main>

</body>

</html>