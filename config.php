<?php
/**
 * Config
 *
 * @category Config
 * @package  Config
 * @author   bleuze_r <raphael.bleuzet@epitech.eu>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     config.php
 */
return [
	'databases' => [
		'default' => [
			'host' => 'localhost',
			'port' => '3306',
			'dbname' => 'database',
			'username' => 'root',
			'password' => '',
			/*'socket' => '/home/raph/.mysql/mysql.sock'*/
		],
		'tests' => [
			'host' => 'localhost',
			'port' => '3306',
			'dbname' => 'database-test',
			'username' => 'test',
			'password' => 'test',
			/*'socket' => '/home/raph/.mysql/mysql.sock'*/
		]
	],
	'salt' => 'please change salt',
];