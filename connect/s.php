<?php
include '../conf.php';
$a = get_param('a', 'int', 0);
$b = get_param('b', 'int', 0);

$out = [
	'a' => $a,
	'b' => $b,
	'summ' => ($a + $b)
];
echo json_encode($out);