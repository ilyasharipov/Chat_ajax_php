<?php
include '../conf.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		var last_time = <?=time()?>;
		var session_key = "<?=$USER->session_key?>";
	</script>
	<script type="text/javascript" src="chat.js"></script>
</head>
<body>
<?php
if ($USER->id) {
	# code...
	echo '<a href="'.$CFG->wwwroot.'/test_ajax/chat.php?auth=logout">Exit</a><hr>';
	?>
	<table width="100%" border="1">
		<tr>
			<td height="300px" valign="top"><div id="chat_message" style="overflow: auto; height: 300px;"></div></td>
			<td width="25%"><div id="chat_users"></div></td>
		</tr>
		<tr>
			<td><input type="text" id="chat_text" style="width: 100%"></td>
			<td><input type="submit" id="chat_text_send"></td>
		</tr>
	</table>
	<?php
} else {
	//login form
	?>
		<form method="POST">
			<input type="text" name="login" value="maz"><br>
			<input type="password" name="password" value="123456"><br>
			<input type="submit" name="sub">
		</form>
	<?php
}
?>
</body>
</html>