<?php
/**
 * Fonctions ::print_r et ::var_dump
 * pour tester avec <\pre>
 */
class Debug
{
    /**
     * Affiche un tableau avec <\pre>
     * @param array $tableau
     * @return array le tableau testé
     */
    public static function print_r(array $tableau)
    {
        echo '<pre>';
        print_r($tableau);
        echo '</pre>';
    }

    /**
     * Affiche une variable avec <\pre>
     * @param string ...$variables
     * @return string la variable testée
     */
    public static function var_dump(...$variables)
    {
        echo '<pre>';
        var_dump($variables);
        echo '</pre>';
    }
}
