<?php
session_start();
if ($_SESSION['loged_on_user'] == NULL) {
  echo ('To start buy just login');
  exit (0);
}
$users = file_get_contents("./db/users");
$users = unserialize($users);

foreach ($users as $key=>$value) {
	if ($value['login'] == $_SESSION['loged_on_user']) {
		break ;
  }
}
if ($_POST['bascket']) {
	$index = count($users[$key]['bascket']);
	$users[$key]['bascket'][$index] = $_POST['item'];
	echo "echo add item";
    if (is_order($users[$key]['order'])) {
        echo "You already buy this animal";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    header("Location: index.php");
}
$users = serialize($users);
file_put_contents("./db/users", $users);

function is_order($order)
{
    foreach ($order as $item) {
        if ($item === $_POST['item'])
            return (true);
    }
    return (false);
}
?>