<?php
include '../conf.php';

$url = 'http://localhost/MCore/connect/s.php?';
$data = [
	'a' => 20,
	'b' => 30
];

$url .= http_build_query($data, '', '&');
echo $url;
hr();
$answer = file_get_contents($url);
echo $answer;
pr( json_decode($answer) );
hr();
$url = 'http://ip-api.com/json/88.204.72.98';
$answer = @file_get_contents($url);
if ($answer) {
	# code...
	echo $answer;
	pr( json_decode($answer) );
} else {
	//ERROR
	echo "ERROR";
}