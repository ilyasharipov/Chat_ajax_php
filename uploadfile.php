<?php
include './conf.php';
MC_files::uploaded('userfile', 'user', 'file');
?>
<!DOCTYPE html>
<html>
<head>
	<title>files</title>
</head>
<body>
	<form enctype="multipart/form-data" method="POST">
		<input type="file" name="userfile" multiple>
		<input type="submit">
	</form>
</body>
</html>