<?php
include '../conf.php';
$USER->id || die;

$type = get_param('type');
// pr($type);
switch ($type) {
	case 'send_message':
		# code...
		$message = get_param('message');
		if ( $USER->session_key != get_param('session_key') ) die;
		if (!$message) die;
		// pr($message);
		$ins = [
			'userid' => $USER->id,
			'message' => $message,
			'date' => time()
		];
		$DB->insert_record('char_message', $ins);
		break;
	case 'get_message':
		# code...
		$out = ['message' => [], 'users' => []];
		$last_time = get_param('last_time', time());
		$SQL = '
			SELECT
				m.*,
				u.login
			FROM 
				{char_message} AS m,
				{user} AS u
			WHERE 
				m.date > '.$last_time.' AND
				u.id = m.userid
		';
		$message = $DB->get_records_sql($SQL);
		foreach ($message as $row) {
			# code...
			$out['message'][] = [
				'date' => date('H:d:s', $row->date),
				'unix' => $row->date,
				'login' => $row->login,
				'message' => $row->message
			];
		}
		//==============================
		//get user online
		// $out['users']
		$temp = time() - 10;
		$SQL = 'SELECT id, login FROM {user} WHERE time_online > '.$temp;
		$users = $DB->get_records_sql($SQL);
		foreach ($users as $user) {
			# code...
			$out['users'][] = [ 'id' => $user->id, 'login' => $user->login];
		}
		//==============================
		echo json_encode($out);
		break;
	
	default:
		# code...
		break;
}