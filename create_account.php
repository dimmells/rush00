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
		<form action="add_user.php" method="post">
			<label>Login:</label><br>
			<input type="text" name="login" required>
			<br>
			<label>Password:</label><br>
			<input type="password" name="passwd" required>
			<input class="submit" type="submit" name="submit" value="Create">
		</form>
		<hr>
	</div>
</body>