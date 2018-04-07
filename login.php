<?php
session_start();
function is_user($login, $passwd) {
	$users = file_get_contents("./data/users");
	$users = unserialize($users);
	$pass = hash("whirlpool", $_POST['passwd']);
	$key = 0;
	while ($users[$key]) {
		if ($login === $users[$key]['login']) {
	  	return (1);
	  	}
	  	$key++;
	}
	return (0);
}
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (is_user($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo $_SESSION['loggued_on_user'];
		//header("Location: index.php");
	}
	else {
		$_SESSION['loggued_on_user'] = NULL;
	}
}
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="form_log">
		<p class="p_sign">Sign In</p>
		<hr>
		<form action="login.php" method="post">
			<input type="text" name="login" required>
			<br>
			<input type="password" name="passwd" required>
			<a href="index.php">
				<input class="submit" type="submit" name="submit" value="Sign In">
			</a>
		</form>
		<hr>
		<p class="p_sign">First on shop?
			<br>
			<a class="a_create_acc" href="create_account.php">Create an account</a>
		</p>
	</div>
</body>
</html>