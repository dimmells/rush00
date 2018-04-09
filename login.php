<?php
session_start();
include('header.php');
function check_auth($login, $passwd)
{
    $users = file_get_contents("./db/users");
    if (!$users) return (false);
    $users = unserialize($users);
    $pass = hash("sha512", $passwd);
    foreach ($users as $user_information) {
        if ($user_information['login'] === $login && $user_information['passwd'] === $pass){
           echo "ok";
            return (1);
        }

    }
    return (false);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['passwd'])) {
    if (check_auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['loged_on_user'] = $_POST['login'];
          header("Location: index.php");
    } else {
        echo "<h1 style='text-align: center'>This is the wrong password. Please try again.</h1>";
        $_SESSION['loged_on_user'] = NULL;
        unset($_POST);
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