<?php
include '../conf.php';
$add_topic = in_array($USER->role, ['admin', 'new_role']);
//--------------------------------------
//answer
$topic_name = get_param('topic_name');
$topic_start = get_param('topic_start');
$session_key = get_param('session_key');

if ( $add_topic &&
	 $topic_name &&
	 $topic_start &&
	 $session_key == $USER->session_key 
	) {
	# code...
	$DB->insert_record(
		'forum_topic',
		['name' => $topic_name]
	);
	redirect($CFG->wwwroot.'/forum/');
}
//--------------------------------------
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
</head>
<body>
	<?php
		// $USER->role

		if ( $add_topic ) {
			# code...
			?>
				<form method="POST">
					<input type="hidden" name="session_key" value="<?=$USER->session_key?>">
					<input type="text" name="topic_name">
					<input type="submit" name="topic_start">
				</form>
			<?php
		}
		$topics = $DB->get_records('forum_topic');
		$url = $CFG->wwwroot.'/forum/topic.php?id=';
		foreach ($topics as $tid => $topic) {
			# code...
			echo '<a href="'.$url.$tid.'">'.$topic->name.'</a><br>';
		}
	?>
</body>
</html>