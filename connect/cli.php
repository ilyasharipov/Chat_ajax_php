<?php
// echo "string\n";
// echo "<pre>";
// print_r($argv);
array_shift($argv);
// print_r($argv);
// echo $argv[0] + $argv[1];
$out = [
	'a' => $argv[0],
	'b' => $argv[1],
	'summ' => $argv[0] + $argv[1]
];
echo json_encode($out);