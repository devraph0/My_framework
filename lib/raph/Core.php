<?php
/**
 * Class Core
 *
 * @category Class
 * @package  Core
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     /lib/raph/Core.php
 */
namespace raph;
use app\controllers;
/**
 * User Class Doc Comment
 *
 * @category Class
 * @package  Core
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     /lib/raph/Core.php
 */
class Core
{
    /** 
     * Fonction run
     *
     * @return nothing
     */
    static public function run() 
    {
        Core::registerAutoload();
        if (isset($_GET['page'])) {
            $p = ucfirst($_GET['page']) . 'Controller';
            $p = 'app\controllers\\' . $p;
            $o = new $p;
            if (isset($_GET['method'])) {
                $m = $_GET['method'] . 'Action';
                if (method_exists($o, $m)) {
                    echo $o->$m();
                } else {
                    echo 'La method n\'existe pas';
                }
            } else {
                $m = 'IndexAction';
                echo $o->$m();
            }
        } else {
            $p = 'IndexController';
            $p = 'app\controllers\\' . $p;
            $o = new $p;
            $m = 'IndexAction';
            if (method_exists($o, $m)) {
                echo $o->$m();
            } else {
                echo 'La method n\'existe pas';
            }
        }
    }

    /** 
     * Fonction registerAutoload
     *
     * @return nothing
     */
    static public function registerAutoload() 
    {
        spl_autoload_register('self::autoload');
    }

    /** 
     * Fonction autoload
     *
     * @param string $class class
     *
     * @return nothing
     */
    static public function autoload($class) 
    {
        $loc = array(
            '/../..',
            '/../../app/controllers',
            '/../../app/models',
            '/../../lib/' . __NAMESPACE__
            );
        if ((strpos($class, '\\')) !== false) {
            $class = substr($class, strrpos($class, '\\'), strlen($class));
        }
        $p = ucfirst($class);
        $i = 0;
        $end = false;
        do {
            $find = false;
            $c = dirname(__FILE__) . $loc[$i] . $p . '.php';
            $i++;
            if (file_exists($c)) {
                $end = true;
                $find = true;
            }
            if ($i == count($loc)) {
                $end = true;
            }
        } while ($end !== true);
        if ($find !== false) {
            include $c;
        } else {
            echo '404 not found';
            exit;
        }
    }
    
}
