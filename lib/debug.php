<?php
defined('MCORE') || die();

function hr(){
	echo "<hr>";
}

function pr($value = '', $type = false){
	# code...
	echo '<pre>';
	if ($type) var_dump($value); else print_r($value);
	echo '</pre>';
}

function dpr($value = '', $type = false){
	# code...
	pr($value, $type);
	die('[[DIE DPR]]');
}

function debuging($msg){
	# code...
	if ( defined('DEBUG') && DEBUG ) {
		# code...
		echo '<hr>'.$msg.'<hr>';
	}
}