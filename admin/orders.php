<?php
session_start();

$users = file_get_contents("../db/users");
$info = unserialize($users);

if (!$info)
{
    echo "<div class = 'error'>No orders, sorry(</div>";
    exit(0);
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin panel PETS SHOP "EDIT USERS"</title>
    <meta charset="utf-8">
</head>
<body>
<?php include_once "../menu/menu.php"; ?>
<div class="container">
    <p id = "order">PAGE ORDERS</p>
    <div class="orders">
        <div class="item">
            <form action="del_orders.php" method="POST">
                <?php
                foreach ($info as $key => $val) {
                    if($info[$key]['login'] == 'admin')
                        continue;
                    ?>

                    <?php echo "<div>USERS: ".$val['login']."</div>";
                    foreach ($val as $name => $informat)
                    {
                        if ($name == 'order')
                        {
                            if (empty($informat)) {
                                continue;
                            }
                            echo "Orders: <br>";
                            foreach ($informat as $order)
                            {
                                echo "<div>".$order."</div>";
                            }
                        }
                    }
                }
                echo "<p>ACCEPTED ORDERS</p><input type='submit' name='submit' value='SUBMIT'></form>";
                ?>
        </div>
    </div>
</div>
</body>
</html>

