<?php

function get_full_arr($fd){
    $data = array();
    $i = 0;
    while (($data[$i] = fgetcsv($fd)) != NULL)
        $i++;
    return $data;
}

function get_info($fd)
{
    $data = get_full_arr($fd);
    foreach ($data as &$pets) {
        if ($pets[0] === NULL){
            $pets = NULL;
        }
        else{
            $pets = explode(";", $pets[0]);
        }
    }
    $data = array_filter($data);

    return ($data);
}
function find_item($data, $name, &$kluch)
{
    foreach ($data as $key => $val)
    {
        if ($val[0] === $name)
        {
            $kluch = $key;
            return (1);
        }
    }
    return(0);
}
?>
<!doctype html>
<html>
<head>
    <title>Admin panel PETS SHOP EDIT USER</title>
    <meta charset="utf-8">
</head>
<body>
<?php
include "../menu/menu.php";

if ($_POST['name'] == NULL && $_POST['delete'] == NULL)
{
    header( "Refresh: 3; admin_panel.php" );
    echo "<h1 class='error'>You haven't chosen user</h1>";
}
elseif ($_POST['name'] === 'admin')
{
    echo "<h1 class='error'>You can't delete admin</h1>";
}
else
{

$fd = fopen("../db/users", 'r');
$data = get_info($fd);


$key = 0;
find_item($data, $_POST['name'], $key);
if ($key != -1)
    $data = $data[$key];

if ($_POST['action'] == "EDIT")
{
?>

        <?php
        }
        else if ($_POST['action'] == "DELETE")
        {
            $info = file_get_contents("../db/users");
            $info = unserialize($info);
            foreach ($info as $key=>$val) {
                if ($val['login'] == $_POST['name'])
                {
                    unset($info[$key]);
                    sort($info);
                    break;
                }
            }
            $info = serialize($info);
            file_put_contents("../db/users", $info);
            header( "Refresh: 3; admin_panel.php" );
            echo "<h1 style='text-align: center'>Users deleted!</h1>";
        }
}
        ?>
</body>
</html>
