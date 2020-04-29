<?php

function get_user(int $userid){
	# code...
	static $users = [];
	if ( empty($users[$userid]) ) {
		# code...
		global $DB;
		// echo "<br>GET_RECORD_USER!<hr>";
		$users[$userid] = $DB->get_record(
			'user',
			['id' => $userid],
			'id, login, firstname, lastname'
		);
	}
	return $users[$userid];
}

function get_user_login(int $userid){
	# code...
	static $users = [];
	if ( empty($users[$userid]) ) {
		# code...
		global $DB;
		// echo "<br>GET_RECORD_USER!<hr>";
		$temp = $DB->get_record(
			'user',
			['id' => $userid],
			'login'
		);
		$users[$userid] = empty($temp) ? null : $temp->login;
	}
	return $users[$userid];
	return get_user($userid)->login;
}