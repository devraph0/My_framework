<?php 
/**
 * Class Model
 *
 * @category Class
 * @package  Model
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://localhost:800/lib/raph/Model.php
 */
namespace raph;

/**
 * User Class Doc Comment
 *
 * @category Class
 * @package  Model
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://localhost:800/lib/raph/Model.php
 */
abstract class Model
{
    static private $_host,
    $_name,
    $_user,
    $_pass,
    $_socket;
    static protected $pdo;

    /**
    * __construct de Bdd
    */
    public function __construct()
    {
        include dirname(__FILE__) . '/../../config.php';
        try {
            if (!isset($socket)) {
                self::$pdo = new \PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $pass);
            } else {
                self::$pdo = new \PDO('mysql:host=' . $host . ';dbname=' . $name . ';unix_socket=' . $socket, $user, $pass);
            }
        }
        catch ( Exception $e ) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /** 
     * Fonction getBdd
     *
     * @return $pdo return bdd
     */
    public function getBdd()
    {
        return $this->pdo;
    }

    /** 
     * Fonction findOne
     *
     * @param string $where   where
     * @param string $execute array
     *
     * @return $donnees return la ligne
     */
    public function findOne($where, $execute)
    {
        $bdd = self::$pdo;
        $from = get_called_class();
        if ((strpos($from, '\\')) !== false) {
            $from = substr($from, strrpos($from, '\\') + 1, strlen($from));
        }
        $from = strstr($from, 'Table', true);
        $from = lcfirst($from) . 's';
        $req = $bdd->prepare('SELECT * FROM ' . $from . ' WHERE ' . $where . 'LIMIT 1');
        $req->execute($execute);
        $donnees = $req->fetchAll();
        return $donnees[0];
    }

    /** 
     * Fonction getHost
     *
     * @return $this->_host return host
     */
    public function getHost()
    {
        return $this->_host;
    }
    /** 
     * Fonction getName
     *
     * @return $this->_name return name
     */
    public function getName()
    {
        return $this->_name;
    }
    /** 
     * Fonction getUser
     *
     * @return $this->_user return user
     */
    public function getUser()
    {
        return $this->_user;
    }
    /** 
     * Fonction getPass
     *
     * @return $this->_pass return pass
     */
    public function getPass()
    {
        return $this->_pass;
    }
    /** 
     * Fonction getSocket
     *
     * @return $this->_socket return socket
     */
    public function getSocket()
    {
        return $this->_socket;
    }
    /** 
     * Fonction setHost
     *
     * @param string $host host
     *
     * @return nothing
     */
    public function setHost($host)
    {
        $this->_host = $host;
    }
    /** 
     * Fonction setName
     *
     * @param string $name name
     *
     * @return nothing
     */
    public function setName($name)
    {
        $this->_name = $name;
    }
    /** 
     * Fonction setUser
     *
     * @param string $user user
     *
     * @return nothing
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }
    /** 
     * Fonction setPass
     *
     * @param string $pass pass
     *
     * @return nothing
     */
    public function setPass($pass)
    {
        $this->_pass = $pass;
    }
    /** 
     * Fonction setSocket
     *
     * @param string $socket socket
     *
     * @return nothing
     */
    public function setSocket($socket)
    {
        $this->_socket = $socket;
    }
    
}
