<?php

session_start();

if (!$_POST) {
    exit ;
}
if (isset($_POST['item_dec'])) {
    del_item($_POST['item']);
}
if (isset($_POST['item_acc'])) {
    accept_item($_POST['item']);
}


function del_item($del_item)
{
    $users = file_get_contents("./db/users");
    $users = unserialize($users);
    foreach ($users as $key => $value) {
        if ($users[$key]['login'] == $_SESSION['loged_on_user']) {
            break ;
        }
    }
    $user = $users[$key];

    $basket = $user['bascket'];
    foreach ($basket as $basket_key => $val) {
        if ($val === $del_item) {
            unset($basket[$basket_key]);
            break ;
        }
    }
    $user['bascket'] = $basket;
    $users[$key] = $user;
    $users = serialize($users);
    file_put_contents("./db/users", $users);
//    print_r($user);
    header("Location: basket.php");
}

function accept_item($accept_item)
{
    $users = file_get_contents("./db/users");
    $users = unserialize($users);
    foreach ($users as $key => $value) {
        if ($users[$key]['login'] == $_SESSION['loged_on_user']) {
            break ;
        }
    }
    $user = $users[$key];

    $add_index = count($user['order']);
    $user['order'][$add_index] = $accept_item;

    $basket = $user['bascket'];
    foreach ($basket as $basket_key => $val) {
        if ($val === $accept_item) {
            unset($basket[$basket_key]);
            break ;
        }
    }
    $user['bascket'] = $basket;

    $users[$key] = $user;
    $users = serialize($users);
    file_put_contents("./db/users", $users);
    header("Location: basket.php");

}

?>
