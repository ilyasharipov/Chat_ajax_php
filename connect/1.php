<?php
// echo "<pre>";
// print_r($argv);
// print_r($GLOBALS);
// echo "</pre><hr>";
// $cmd = __DIR__.'/test.exe 10 20';
$cmd = 'php '.__DIR__.'/cli.php 10 20';

// system($cmd);
exec($cmd, $out2);
$out = implode('', $out2);
// echo $out;
echo '<pre>';
print_r( json_decode($out) );
echo '</pre>';