<?php
include 'conf.php';

$pass = '123456';
$hash = 'MCore_user#HNCxP0FiWlqgd0a#ebfb1ceb5f7a0b2325a83a18fcdd8f945571dae7';
//echo $pass. ' = ' .$USER->hashWithPassword($pass, '132');
// hr();
pr( $USER->checkPassword($pass, $hash), 1);
hr();
echo $pass. ' = ' .$USER->hashPassword($pass);

