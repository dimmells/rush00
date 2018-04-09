<?php
session_start();

//var_dump($_POST);
if (key_exists('del', $_POST)){

    $cont = file_get_contents("../db/categories.csv");
    $arr = explode(PHP_EOL, $cont);
    array_pop($arr);
    foreach ($arr as $key=>$val)
    {
        if ($val == $_POST['category'])
            unset($arr[$key]);
    }
    //array_push($arr, PHP_EOL);
    //var_dump($arr);
   // $data =  implode(PHP_EOL, $arr);
    //$data = rtrim($data);
    $i = 0;
    foreach ($arr as $val) {
        if ($i == 0){
            file_put_contents("../db/categories.csv", $val.PHP_EOL);
            $i = 1;
        }else{
            file_put_contents("../db/categories.csv", $val.PHP_EOL, FILE_APPEND);
        }
    }

    echo '<h1 style="text-align: center">deleted category</h1>';
   // header("Refresh:3; categories.php");


}elseif(key_exists('add', $_POST)){
    $fd = fopen("../db/categories.csv", 'a+');
    array_pop($_POST);
    if (!fputcsv($fd,$_POST,";"))
        echo "Error";
    echo '<h1 style="text-align: center">add category</h1>';
    header("Refresh:3; categories.php");
}else{
    echo '<h1 style="text-align: center">NOT VALID DATA</h1>';
    header("Refresh:3; categories.php");

}