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
			'password' => ''
		],
		'tests' => [
			'host' => 'localhost',
			'port' => '3306',
			'dbname' => 'database-test',
			'username' => 'test',
			'password' => 'test'
		]
	],
	'salt' => 'please change salt',
];