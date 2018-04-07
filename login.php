<?php
$csv=array("");
if (($handle = fopen("log.csv", "r")) !== FALSE) {
    $csv = fgetcsv($handle, 1000, ",");
    fclose($handle);
}
	if ($_GET['login'] === "admin" && $_GET['passwd'] === "nimda") {
    	echo "\nADMIN_MODE'\n";
    }
    else {
		$fd = fopen("log.csv", "w");
		$new_log = array($_GET['login'], $_GET['passwd']);
		$csv = array_merge($new_log, $csv);
	    fputcsv($fd, $csv);
	    fclose($fd);
	}
	session_start();
	if ($_GET['login'] && $_GET['passwd'] && $_GET['submit' ] && $_GET['submit'] === "OK") {
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['passwd'] = $_GET['passwd'];
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
		<form action="login.php" method="GET">
			<input type="text" name="login" required>
			<br>
			<input type="password" name="passwd" required>
			<a href="index.php">
				<input class="submit" type="submit" name="submit" value="Sign In">
			</a>
		</form>
		<hr>
		<p class="p_sign">New on shop?
			<br>
			<a class="a_create_acc" href="create_account.php">Create an account</a>
		</p>
	</div>
</body>
</html>