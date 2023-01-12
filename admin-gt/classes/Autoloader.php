<?php
/**
 * Charge automatiquement les classes
 * depuis les dossiers spécifiés
 */
class Autoloader
{
    /**
     * Enregistre les classes dans l'autoload
     * @return array : classes enregistrées
     */
    public static function classes()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Boucle dans les dossiers spécifiés et retourne le chemin de la classe
     * @param string $class_name : la classe enregistrée
     * @return string : le chemin vers la classe appelée
     */
    public static function autoload(string $class_name)
    {
        $dossiers = array(
            'classes/',
            'librairies/classUpload/src/',
            'librairies/phpSVG/src/',
            'admin-gt/classes/',
            'admin-gt/librairies/phpMailer/src/',
            'admin-gt/librairies/cart/src/',
            'admin-gt/librairies/phpSVG/src/'
        );

        foreach ($dossiers as $dossier) {
            if (file_exists($dossier . $class_name . '.php')) {
                require_once $dossier . $class_name . '.php';
                return;
            }
        }
    }
}
