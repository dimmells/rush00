<?php
session_start();

$info = file_get_contents("../db/users");
$info = unserialize($info);

if ($info == NULL)
{
    echo "<h1 style='text-align: center'>Error! MAYBE NOT FOUND USERS</h1>";
    exit(0);
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin panel "HANDLE USERS"</title>
    <meta charset="utf-8">
</head>
<body>
<?php include_once "../menu/menu.php"; ?>
<div class="container">
    <p id = "adm_title">USERS WHICH LOVE PETS:</p>
    <div class="info">
        <?php
        foreach ($info as $key) { ?>
            <div class="item">
                <form action="manage_usr.php" method="POST">
                    <?php echo "<div >Login: ".$key['login'].
                        "<input type='radio' name='name' value='".$key['login']."'></div>"; ?>
                    <input type="submit" class="edit_user" name="action" value="DELETE">
                </form>
            </div>
            <?php
        } ?>
    </div>
</div>
</body>
</html>