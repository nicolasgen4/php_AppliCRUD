<?php
/**
 * Fonction ::page permet de cible la page 
 * actuellement affichée par l'utilisateur
 */
class Active
{
    /**
     * Compare les param et echo dans le HTML
     * @param string $lien : nom de la page
     * @param string $controleur : son contrôleur dans le routeur
     * @return bool
     */
    public static function page(string $lien = NULL, string $controleur = NULL)
    {
        if ($lien == $controleur)
        echo 'active';
    }

}