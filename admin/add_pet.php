<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="test.css" <?php echo time(); ?>
</head>
<body>
<?php

function get_info($fd)
{
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
    $new_info = array_filter($info);

    return ($new_info);
}

function    put_add_line_to_csv($post, $path)
{
    $fd = fopen($path, 'a+');
    if (!fputcsv($fd, $post,";"))
        echo "Error";
}
array_pop($_POST);
put_add_line_to_csv($_POST, "../db/pets.csv");
if ($_POST != NULL)
{
    $info = get_arr_from_csv("../db/pets.csv");
    unset ($_POST);
    echo "<div id='add_pet'>You have successfully added the pet!</div>";
    header( "Refresh: 2; admin_panel.php" );

}
else
{
    echo "<div class='err_message'>Ooops! Error occurred</div>";
}

function get_arr_from_csv($path)
{
    $fd = fopen($path, 'r');
    $info = get_info($fd);
    return $info;
}
?>
</body>
</html>