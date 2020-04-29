<?php
include './conf.php';
$m = [1,32,5665,89,99];
pr($m);
$json_m = json_encode($m);
echo $json_m;
pr( json_decode($json_m) );
hr();
//-------------------------------
$o = new stdClass();
$o->field = 123;
$o->name = 'maz';
pr($o);
echo json_encode($o);
//-------------------------------
hr();
$user = [
	'login' => 'maz',
	'email' => 'maz@maz.ru'
];
pr($user);
$json_user = json_encode($user);
echo $json_user;
$data = json_decode($json_user, 1);
pr($data);

hr();
$m[100] = 'qwe';
echo json_encode($m);
