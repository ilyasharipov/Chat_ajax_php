<?php
date_default_timezone_set('Etc/GMT-7');
global $CFG;
unset($CFG);

$CFG = new stdClass();
$CFG->wwwroot = 'http://localhost/MCore';
$CFG->dirroot = __DIR__;
$CFG->dataroot = 'C:\xampp\htdocs\MCore_data';
$CFG->db = [
	'host'		=> 'localhost',
	'user'		=> 'root',
	'password'	=> '',
	'db_name'	=> 'gk150m',
	'prefix'	=> 'maz_',
	'debug'		=> true
];
define('DEBUG', true);
define('MCORE', true);

include $CFG->dirroot.'/lib/setup.php';