<?php
include 'conf.php';

// $DB->update_record('user', [ 'password' => 'new_password']); //ERROR
// $DB->update_record('user', ['id' => 1]); //ERROR
$DB->update_record('user', [
	'id' => '2;dsfgdsgd',
	'password' => 'new_password',
	'firstname' => 'new_firstname'
]);dpr();
$DB->update_record('user', ['id' => 2, 'password' => 'new_password']);

dpr();