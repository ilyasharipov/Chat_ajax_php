<?php

$x = 1;
$z = 1.1;
$s = 's';
$b = true;
$n = null;
$x = 12 * 5;
$c = $x > 10;

$m = array();
$m = [];

$m[] = 1;
$m_0 = 1;
echo $m[0];
echo $m_0;
$m[] = 222;
echo $m[1];

$m1 = [55, 6, 2, 4];
$m1 = [
	0 => 55,
	1 => 6,
	2 => 2,
	3 => 4
];
$m2 = [
	'name' => 'maz',
	'email' => 'maz@2i.tusur.ru'
];
$a = 21;
echo count($m1);
echo "string{$a}qwe";// string21qwe
echo 'string';

$a = 1;
$a = true;
if ( $m2 || 0 && $a ) {
	# code...
	echo "Y";
} else echo "N";

for ($i=0; $i < 3; $i++) { 
	# code...
	echo "hi!";
}

$i = 0;
while ($i < 3) {
	# code...
	echo "hi!";
	$i++;
}
//------------------------------
$i = 0;
name:
echo "hi!";

$i++;
if ($i < 3) goto name;
//------------------------------
/*
echo 'qwe';
echo 'qwe';
echo 'qwe';
/**/
unset($b);
$a = 10;
$g = 30;
$g2 = 40;
function hi(){
	# code...
	echo $GLOBALS['g2'];//40
	$GLOBALS['g2'] = 41;
	global $g;
	echo $g;
	$g = 31;
	$b = 20;
	echo $a;//error
	echo "hi";
}

hi();
hi();
hi();
echo $b;//error
echo $g;//31
echo $g1;//41

$i = 0;
$i++;
++$i;
unset($i);
echo $i;//error
/**
 * 
 */
class my_class{
	const 	MY = 111;
	public $a = 90;
	function __construct(){
		# code...
	}

	public function m_a(){
		# code...
		//global $a;
		echo $a;//error
		echo $this->a;
		global $g;
		echo $g;
	}

	public function d(int $value = null): int{
		# code...
		echo $value;
		return $value * 2;
	}

	public function test(){
		# code...
		$this->a++;
		return $this->a;
	}

	public function echo_const(){
		# code...
		//echo my_class::MY;
		echo self::MY;
	}
}
$my = new my_class();



$z = 10;
$z = $my->d($z); //echo 10
//$z -> 20
echo $my->a;//90
echo $my->test();//91
echo $my->a;//91
echo $my->test();//92
echo $my->test();//93
echo $my->a;//93
echo my_class::MY;//111

define('MAZ_PI', 3.14);
//define('TEST', false);

echo M_PI;
echo MAZ_PI;

if ( isset($maz) ) {
	# code...
	echo "Y";
} else echo "N";

if ( defined('TEST') && TEST ) {
	echo "Y";
} else echo "N";

// if ( TEST && defined('TEST') ) {//error
// 	echo "Y";
// } else echo "N";
