<?php
include 'conf.php';

function clear_param_array($arr, $type = 'str'){
	# code...
	$arr = (array)$arr;
	foreach ($arr as $key => $value) {
		# code...
		if ( is_array($value) ) {
			# code...
			$arr[$key] = clear_param_array($value, $type);
		} else {
			$arr[$key] = clear_param($value, $type);
		}
	}
	return $arr;
}
$a = 123.1;
echo (int)$a;
$mass = [
	0 => '123.1',
	'user' => [
		'age' => '28',
		'date' => '123456'
	],
	2 => ['2', '5555']
];
//$mass = ['123', '333', '66677'];
pr($mass, 0);
$mass2 = clear_param_array($mass, 'int');
/*
$mass2 = [
	0 => 123,
	'user' => [
		'age' => 28,
		'date' => 123456
	],
	2 => [2, 5555]
];
*/
pr($mass2, 1);