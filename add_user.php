<?php
$users = file_get_contents("./db/users");
$users = unserialize($users);
$pass = hash("sha512", $_POST['passwd']);
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
	$users[$key]['bascket'] = array();
	$users[$key]['order'] = array();
	$users = serialize($users);
	file_put_contents("./db/users", $users);
	echo "OK";
	header("Location: index.php");
}
else {
	header("Location: create_account.php");
}
?>