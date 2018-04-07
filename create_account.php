<?php
?>
<html>
<head>
	<title>Create account</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="form_create">
		<p class="p_sign">Create account</p>
		<hr>
		<form action="login.php" method="GET">
			First name:<br>
			<input type="text" name="f_name" required>
			<br>
			<hr>
			Last Name:<br>
			<input type="text" name="l_name" required>
			<br>
			<hr>
			Login:<br>
			<input type="text" name="login" required>
			<br>
			<hr>
			Password:<br>
			<input type="password" name="passwd" required>
			<hr>
			<a href="index.php">
				<input class="submit" type="submit" name="submit" value="Sign In">
			</a>
		</form>
	</div>
</body>