<?php
/**
 * Controller
 *
 * @category Class
 * @package  Controller
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     /app/controllers/Controller.php
 */
namespace raph;
/**
 * Controller Abstract Class
 *
 * @category Class
 * @package  Controller
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     /app/controllers/Controller.php
 */
abstract class Controller
{
    /** 
     * Fonction render
     *
     * Fonction permettant d'afficher les views
     *
     * @param string $view  Nom de la vue
     * @param string $array Permet d'envoyer des infos sur la vue
     *
     * @return nothing
     */
    public function render($view, $array = null) 
    {
        if (is_string($view)) {
            // Premiere valeur du render
            $controller = strstr($view, ':', true);
            // Seconde valeur
            $view = substr(strstr($view, ':'), 1);
            $c = dirname(__FILE__) . '/../views/' . $controller . '/' . $view . '.html';
            if (file_exists($c)) {
                // Ouverture du fichier
                $get = file_get_contents($c);
                if (!is_null($array)) {
                    while (current($array)) {
                        $get = str_replace('{{ ' . key($array) . ' }}', $array[key($array)], $get);
                        $get = str_replace('{{' . key($array) . '}}', $array[key($array)], $get);
                        $get = str_replace('{{' . key($array) . ' }}', $array[key($array)], $get);
                        $get = str_replace('{{ ' . key($array) . '}}', $array[key($array)], $get);
                        next($array);
                    }
                }
                echo $get;
            } else {
                echo 'Erreur dans le render';
            }
            
        }
    }
}
