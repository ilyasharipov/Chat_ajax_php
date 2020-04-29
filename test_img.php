<?php
include 'conf.php';
$url = 'http://localhost/MCore/file.php?component=user&space=file&itemid=1&name=11.png';
$data = [
	'component'	=> 'user',
	'space'		=> 'file',
	'itemid'	=> '0',
	'name'		=> '820_yVSC5Jy0M7s.jpg',
];
$url = $CFG->wwwroot.'/file.php?'.http_build_query($data);
pr($url);
?>
<!DOCTYPE html>
<html>
<head>
	<title>test img</title>
</head>
<body>
	<img src="<?=$url?>">
</body>
</html>