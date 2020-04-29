<?php
include '../conf.php';
$id = get_param('id');

if ( $id ) {
	# code...
	$user = $DB->get_record('user', ['id' => $id]);
	if ( $user ) {
		# code...
		pr($user);
	} else echo "not user";
} else echo "not id";