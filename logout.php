<?php
session_start();
unset($_SESSION['loged_on_user']);
header("Location: index.php");

?>
