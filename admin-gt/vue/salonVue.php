<?php

/**
 * Vue de la page des salon
 * Affiche le contenu HTML de la page salon
 * Appelle le modèle de l'admin
 */

$title = 'le salon';
$css = 'salonStyle';
$js = 'salonScript';

ob_start();

?>

<section class="formulaire wrapper column-start">
    <h2 class="titres">Modifier les images</h2>
    <div class="img-carrousel column-start">
        <!--DEBUT DU FORMULAIRE DE L'IMAGE 1-->
        <section class="column-start">
            <div class="img-actuelle column-start">
                <h3>Photo numéro 1</h3>
                <a href="../public/images/carrousel/image1.webp" download="sauvegarde-salon_1" class="column-start">
                    <img src="../public/images/carrousel/image1.webp" alt="Image 1 du carrousel" title="Photo actuellement affichée" id="photo1" width="792">
                    <span>Cliquez pour télécharger l'image</span>
                </a>
            </div>
            <form action="salon" method="post" enctype="multipart/form-data" class="column-start">
                <div class="column-start">
                    <label for="photoCarrousel1">Choisir une nouvelle photo</label>
                    <input type="file" name="photoCarrousel1" id="photoCarrousel1" accept=".jpg, .png, .gif, .webp">
                </div>
                <div class="row-start-center">
                    <button type="submit" name="submit">
                        Enregistrer
                    </button>
                </div>
            </form>
        </section>
        <!--DEBUT DU FORMULAIRE DE L'IMAGE 2-->
        <section class="column-start">
            <div class="img-actuelle column-start">
                <h3>Photo numéro 2</h3>
                <a href="../public/images/carrousel/image2.webp" download="sauvegarde-salon_2" class="column-start">
                    <img src="../public/images/carrousel/image2.webp" alt="Image 2 du carrousel" title="Photo actuellement affichée" id="photo2" width="792" loading="lazy">
                    <span>Cliquez pour télécharger l'image</span>
                </a>
            </div>
            <form action="salon" method="post" enctype="multipart/form-data" class="column-start">
                <div class="column-start">
                    <label for="photoCarrousel2">Choisir une nouvelle photo</label>
                    <input type="file" name="photoCarrousel2" id="photoCarrousel2" accept=".jpg, .png, .gif, .webp">
                </div>
                <div class="row-start-center">
                    <button type="submit" name="submit">
                        Enregistrer
                    </button>
                </div>
            </form>
        </section>
        <!--DEBUT DU FORMULAIRE DE L'IMAGE 3-->
        <section class="column-start">
            <div class="img-actuelle column-start">
                <h3>Photo numéro 3</h3>
                <a href="../public/images/carrousel/image3.webp" download="sauvegarde-salon_3" class="column-start">
                    <img src="../public/images/carrousel/image3.webp" alt="Image 3 du carrousel" title="Photo actuellement affichée" id="photo3" width="792" loading="lazy">
                    <span>Cliquez pour télécharger l'image</span>
                </a>
            </div>
            <form action="salon" method="post" enctype="multipart/form-data" class="column-start">
                <div class="column-start">
                    <label for="photoCarrousel3">Choisir une nouvelle photo</label>
                    <input type="file" name="photoCarrousel3" id="photoCarrousel3" accept=".jpg, .png, .gif, .webp">
                </div>
                <div class="row-start-center">
                    <button type="submit" name="submit">
                        Enregistrer
                    </button>
                </div>
            </form>
        </section>
        <!--DEBUT DU FORMULAIRE DE L'IMAGE 4-->
        <section class="column-start">
            <div class="img-actuelle column-start">
                <h3>Photo numéro 4</h3>
                <a href="../public/images/carrousel/image4.webp" download="sauvegarde-salon_4" class="column-start">
                    <img src="../public/images/carrousel/image4.webp" alt="Image 4 du carrousel" title="Photo actuellement affichée" id="photo4" width="792" loading="lazy">
                    <span>Cliquez pour télécharger l'image</span>
                </a>
            </div>
            <form action="salon" method="post" enctype="multipart/form-data" class="column-start">
                <div class="column-start">
                    <label for="photoCarrousel4">Choisir une nouvelle photo</label>
                    <input type="file" name="photoCarrousel4" id="photoCarrousel4" accept=".jpg, .png, .gif, .webp">
                </div>
                <div class="row-start-center">
                    <button type="submit" name="submit">
                        Enregistrer
                    </button>
                </div>
            </form>
        </section>
        <!--DEBUT DU FORMULAIRE DE L'IMAGE 5-->
        <section class="column-start">
            <div class="img-actuelle column-start">
                <h3>Photo numéro 5</h3>
                <a href="../public/images/carrousel/image5.webp" download="sauvegarde-salon_5" class="column-start">
                    <img src="../public/images/carrousel/image5.webp" alt="Image 5 du carrousel" title="Photo actuellement affichée" id="photo5" width="792" loading="lazy">
                    <span>Cliquez pour télécharger l'image</span>
                </a>
            </div>
            <form action="salon" method="post" enctype="multipart/form-data" class="column-start">
                <div class="column-start">
                    <label for="photoCarrousel5">Choisir une nouvelle photo</label>
                    <input type="file" name="photoCarrousel5" id="photoCarrousel5" accept=".jpg, .png, .gif, .webp">
                </div>
                <div class="row-start-center">
                    <button type="submit" name="submit">
                        Enregistrer
                    </button>
                </div>
            </form>
        </section>
    </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
