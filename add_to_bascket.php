<?php
session_start();
if ($_SESSION['loggued_on_user'] == NULL) {
  error('To start buy just login');
}
$users = file_get_contents("./data/users");
$users = unserialize($users);
foreach ($users as $key => $value) {
	if ($users[$key]['login'] == $_SESSION['loggued_on_user']) {
		break ;
  }
}
if ($_POST['basket']) {
	$index = count($users[$key]['bascket']);
	var_dump($_POST['item']);
	var_dump($key);
	$users[$key]['bascket'][$index] = $_POST['item'];
	print_r($users[$key]);
}
$users = serialize($users);
file_put_contents("./data/users", $users);
// header("Location: index.php");
?>