<?php
include './conf.php';

// $component	= 'user';
// $space		= 'file';
// $itemid		= 1;
// $name		= '11.png';
// http://localhost/MCore/file.php?component=user&space=file&itemid=1&name=11.png

$component	= get_param('component');
$space		= get_param('space');
$itemid		= get_param('itemid');
$name		= get_param('name');

MC_files::download($component, $space, $itemid, $name);