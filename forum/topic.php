<?php
include '../conf.php';
$id = get_param('id', false, 'int');
$topic = $DB->get_record('forum_topic', ['id' => $id]);
// pr($topic, 1);
// $a = $topic->userid;
// $user = $DB->get_record('user', ['id' => 1], 'email')->email;
// pr($user);
// $user = $DB->get_record('user', ['id' => $a]);
// pr($user);
$topic || die('NOT topic');
//--------------------------------------
//answer
$discussion_name = get_param('discussion_name');
$discussion_message = get_param('discussion_message');
$discussion_start = get_param('discussion_start');
$session_key = get_param('session_key');

if (
	$USER->id &&
	$discussion_name &&
	$discussion_message &&
	$discussion_start &&
	$session_key == $USER->session_key
) {
	$DB->insert_record(
		'forum_discussion',
		[
			'userid' => $USER->id,
			'topicid' => $id,
			'name' => $discussion_name,
			'context' => $discussion_message,
			'date' => time()
		]
	);
	redirect($CFG->wwwroot.'/forum/topic.php?id='.$id);
}
//--------------------------------------
?>
<!DOCTYPE html>
<html>
<head>
	<title>topic: <?=$topic->name?></title>
</head>
<body>
	<h3><?=$topic->name?></h3>
	<a href="<?=$CFG->wwwroot?>/forum/">Назад</a><br>
	<?php
		if ($USER->id) {
			# code...
			?>
				<form method="POST">
					<input type="hidden" name="session_key" value="<?=$USER->session_key?>">
					Название темы: 
					<input type="text" name="discussion_name"><br>
					Сообщение:<br>
					<textarea name="discussion_message" style="width: 50%" rows="5"></textarea><br>
					<input type="submit" name="discussion_start">
				</form>
				<br><br>
			<?php
		}
		$discussions = $DB->get_records('forum_discussion', ['topicid' => $id]);
		$url = $CFG->wwwroot.'/forum/discussion.php?id=';
		foreach ($discussions as $did => $discussion) {
			# code...
			echo '<a href="'.$url.$did.'">'.$discussion->name.'</a><br>';
		}
	?>
</body>
</html>