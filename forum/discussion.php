<?php
include '../conf.php';
include __DIR__.'/locallib.php';
$id = get_param('id', false, 'int');
$discussion = $DB->get_record('forum_discussion', ['id' => $id]);
$discussion || die('NOT discussion');
//-------------------------------------------------
//answer
$post_message = get_param('post_message');
$post_start = get_param('post_start');
$session_key = get_param('session_key');

if ($USER->id && $post_message && $post_start && $session_key == $USER->session_key) {
	# code...

	//insert
	$DB->insert_record(
		'forum_posts',
		[
			'userid' => $USER->id,
			'discussionid' => $id,
			'message' => $post_message,
			'date' => time()
		]
	);
	redirect($CFG->wwwroot.'/forum/discussion.php?id='.$id);
}
//-------------------------------------------------
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$discussion->name?></title>
</head>
<body>
	<a href="<?=$CFG->wwwroot?>/forum/topic.php?id=<?=$discussion->topic?>">Назад</a><br>
	<?php
		// pr($discussion);
		echo '<h3>'.$discussion->name.'</h3>';
		$user = get_user($discussion->userid);
		echo $user->login.' '.date('d.m.Y H:i', $discussion->date).'<br>';
		echo $discussion->context.'<hr>';

		$posts = $DB->get_records(
			'forum_posts',
			['discussionid' => $discussion->id],
			'date',
			'id, userid, date, message'
		);
		// dpr($posts);
		foreach ($posts as $row) {
			# code...
			// pr($row);
			// $post_user = get_user($row->userid);
			// echo $post_user->login.' '.date('d.m.Y H:i', $row->date).'<br>';
			echo get_user($row->userid)->login.
			' '.date('d.m.Y H:i', $row->date).'<br>';
			echo $row->message;
			// echo "maz 20.01.2020<br>";
			// echo "My answer!";
			hr();
		}

		if ($USER->id) {
			# code...
			?>
				<form method="POST">
					<textarea name="post_message" style="width: 50%" rows="5"></textarea><br>
					<input type="hidden" name="session_key" value="<?=$USER->session_key?>">
					<input type="submit" name="post_start">
				</form>
			<?php
		}
	?>
</body>
</html>