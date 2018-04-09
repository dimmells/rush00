<?php
session_start();



function get_arr_csv($path)
{
    $fd = fopen($path, 'r');
    $info = array();
    $i = 0;
    while ($info[$i++] = fgetcsv($fd))
        ;
    foreach ($info as &$dogs)
    {
        if (!$dogs[0])
            $dogs = NULL;
        else if($dogs)
            $dogs = explode(";", $dogs[0]);
    }
    $info = array_filter($info);

    return $info;
}


$categories = get_arr_csv("../db/categories.csv");

include "../menu/menu.php";

 ?>

<!doctype html>
<head>
    <title>Admin panel pets - CATEGORIES</title>
</head>
<body>
<h3>Categories </h3>
<form action="hndl_cat.php" method="post">
<select name="category">
<?php
foreach ($categories as $cat){
    echo " <option value=".$cat[0].">".$cat[0]."</option>";
}
?>
</select>
    <input type="submit" name="del" value="del">
</form>
<form action="hndl_cat.php" method="post">
    <input type="text" name="category">
<input type="submit" name="add" value="add category">
</form>







</body>
