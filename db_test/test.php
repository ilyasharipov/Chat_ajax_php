<?php
/*
topic - темы
-id //int
-userid //int
-name //varchar
#discussion 
-id
-topicid
-userid
-name
-date //int
-context //text
##posts
-id
-discussionid
-userid
-date
-message //text
*/
include '../conf.php';
//Объявления
//Общие вопросы
//--Рейтинг
echo $USER->id;
if (0) {
	# code...
	$DB->insert_record('forum_topic', ['userid' => $USER->id, 'name' => 'Объявления']);
	$DB->insert_record('forum_topic', ['userid' => $USER->id, 'name' => 'Общие вопросы']);
}

$topics = $DB->get_records('forum_topic');
pr($topics);

//-------------
$topicsid = end($topics)->id;
pr('topicsid: '.$topicsid);
//-------------
if (0) {
	# code...
	$DB->insert_record('forum_discussion', [
		'topicid' => $topicsid,
		'userid' => $USER->id,
		'name' => 'first name',
		'context' => 'hi!',
		'date' => time()
	]);
}
hr();
$discussions = $DB->get_records('forum_discussion', ['topicid' => $topicsid]);
pr($discussions);
hr();
$discussionid = end($discussions)->id;
pr('discussionid: '.$discussionid);

if (0) {
	# code...
	$DB->insert_record('forum_posts', [
		'discussionid' => $discussionid,
		'userid' => $USER->id,
		'date' => time(),
		'message' => 'msg1'
	]);
}
$posts = $DB->get_records('forum_posts', ['discussionid' => $discussionid]);
pr($posts);