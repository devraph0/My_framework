<?php
/**
 * Controller
 *
 * @category Class
 * @package  Controller
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     /app/controllers/IndexController.php
 */
namespace app\controllers;

use \raph\Controller;
use \app\models\UserTable;
/**
 * IndexController Class Doc
 *
 * @category Class
 * @package  Controller
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     /app/controllers/Controller.php
 */
class IndexController extends Controller
{
    /** 
     * Fonction IndexAction
     *
     * @return Index view
     */
    public function indexAction()
    {
        $this->render('index:index');
    }

    /** 
     * Fonction databaseExempleAction
     *
     * @return databaseExemple view
     */
    public function databaseExempleAction()
    {
        $u = new UserTable();
        $user = $u->findOne('username = ?', array('raph'));
        $this->render('index:databaseExemple', $user);
    }
    
}
