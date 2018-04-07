<?php
$users = file_get_contents("./data/users");
$users = unserialize($users);
$pass = hash("whirlpool", $_POST['passwd']);
$is_exist = 0;
$key = 0;
while ($users[$key]) {
  if ($_POST['login'] === $users[$key]['login']) {
  	$is_exist = 1;
  }
  $key++;
}
if (!$is_exist) {
	$users[$key]['login'] = $_POST['login'];
	$users[$key]['passwd'] = $pass;
	$users[$key]['basket'] = array();
	$users[$key]['order'] = array();
	$users = serialize($users);
	file_put_contents("./data/users", $users);
	echo "OK";
	header("Location: login.php");
}
else {
	header("Location: create_account.php");
}
?>