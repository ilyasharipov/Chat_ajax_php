<?php
defined('MCORE') || die();

function get_param($name, $type = 'str', $def = null){
	# code...
	if ( isset($_POST[$name]) ) {
		# code...
		$p = $_POST[$name];
	} elseif ( isset($_GET[$name]) ) {
		# code...
		$p = $_GET[$name];
	} else return $def;
	return clear_param($p, $type);
}

function get_param_array($name, $type = 'str', $def = []){
	# code...
	if ( isset($_POST[$name]) ) {
		# code...
		$p = $_POST[$name];
	} elseif ( isset($_GET[$name]) ) {
		# code...
		$p = $_GET[$name];
	} else return $def;
	return clear_param_array($p, $type);
}

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

function clear_param($p, $type = 'str'){
	# code...
	switch ($type) {
		case 'int': return (int)$p;
		case 'float': return (float)$p;
		case 'bool': return (bool)$p;
		case 'str':
		default: return (string)$p;
	}
}

function random_string(int $length = 10){
	# code...
	if ( $length < 1 ) $length = 10;
	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$out = '';
	$pool_len = strlen($pool);
	for ($i=0; $i < $length; $i++) { 
		# code...
		$out .= $pool[ mt_rand(0, $pool_len - 1) ];
	}
	return $out;
}

function redirect($url){
	# code...
	header('Location: '.$url);
	die;
}