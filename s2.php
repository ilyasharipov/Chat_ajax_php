<?php
include 'conf.php';
// 0) записать пользователя в БД с уникальнмы логином и не пустым паролем. в ручную 1 раз
// 1) получить login и password из формы
// 2) если есть попытка входа, то найти пользователя по данным из пункта 1
/*
$id = get_param('id', 'int');
$SQL = 'SELECT * FROM `maz_user` WHERE `id` = '.$_GET['id'];
$SQL = 'SELECT * FROM `maz_user` WHERE `id` = '.$id;
echo $SQL;
*/
$login = get_param('login');
$password = get_param('password');
$sub = get_param('sub');
/*
if ( $login && $password ) {
	$data = ['login' => $login];
	/*
	SELECT * FROM maz_user WHERE `login` = "maz" AND
	 `password` = "123456"
	SELECT * FROM maz_user WHERE `login` = "maz" AND
	 `password` = "1" or id="1"
	SELECT * FROM maz_user WHERE `login` = "maz" AND
	 `password` = "1\" or id=\"1"
	//1" or id="1
	$user = $DB->get_record('user', $data);
	if ( empty($user) ) {
		echo "Incorrect login or password!";
	} else {
		pr($user);
		if ( $user->password != $password ) {
			# code...
			echo "$user->password != {$password}<br>";
			echo "Incorrect login or password!";
		} else {
			$_SESSION['id'] = $user->id;
		}
	}
}
/***/
// пример: $user;
// 3) если user не пустой, тоесть найден, то записать id пользователя в сессию с ключем id
//$user->id;
pr($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<h1>Login:</h1>
	<?php
	if ( $USER->error['auth'] ) {
		# code...
		hr();
		echo implode('<br>', $USER->error['auth']);
		hr();
	}
	//$user = $DB->get_record('user', ['id' => 1]);
	//pr($user);
	if ($USER->id) {
		# code...
		echo '<a href="'.$CFG->wwwroot.'/s2.php?auth=logout">Exit</a><br>';
	} else {
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