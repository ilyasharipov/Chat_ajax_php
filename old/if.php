<?php
$m = [];
$m[] = 0;
$m[] = '1';
$m[] = false;
$m[] = null;

$index = 3;
$z = null;
$z .= 'qwe';
if ( isset($z) ) {
	# code...
	echo "Y";
} else echo "N";
echo "<hr>";

if ( isset($m[$index]) ) {
	# code...
	echo "Y";
} else echo "N";
echo "<hr>";

if ( empty($m[$index]) ) {
	echo "Y";
} else echo "N";
echo "<hr>";
//============================
$a = 1;
echo "new if<br>";
function i(){
	# code...
	echo "string ";
	return 1;
}

if ( $a && i() && 1 ) {
	echo "string ";
	echo "string ";
	echo "string ";
	/*
	echo "string ";
	echo "string ";
	*/
	echo "string ";
}