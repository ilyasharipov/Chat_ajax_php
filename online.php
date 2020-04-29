<?php
include './conf.php';

if ( $USER->id ) {
	# code...
	echo $USER->login;
}

// $data = ['id' => $USER->id, 'time_online' => time()];
// $DB->update_record('user', $data);