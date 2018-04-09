<?php
function del_item(&$info, &$inform, $key){
    foreach ($inform as $key2 => $val)
    {
        echo "DEL";
        unset($info[$key]['order'][$key2]);
    }
}
if ($_POST['submit'] = "submit")
{
    $users = file_get_contents("../db/users");
    $info = unserialize($users);
    //print_r($info);
    foreach ($info as $key => $value)
    {
        if($info[$key]['login'] == 'admin')
            continue;
        foreach ($value as $name => $inform)
        {
            if ($name == 'order')
            {
                del_item($info, $inform, $key);
            }
        }
    }
    array_filter($info);
    $info = serialize($info);
    file_put_contents("../db/users", $info);
    header( "Refresh: 2; admin_panel.php" );
    echo "<h1 style='text-align: center'>ORDER SENT TO EXECUTE</h1>";
}
?>
