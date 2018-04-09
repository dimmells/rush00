<?php


// create
if (!file_exists ( "db/categories.csv" )){

    $fd = fopen("db/categories.csv", "w");
    if (!fputcsv($fd,(array)"cats",";"))
        echo "Error";
    if (!fputcsv($fd,(array)"dogs",";"))
        echo "Error";
    echo "<h1>SUCCESSFULLY CREATE CATEGORY FILE</h1>";
}
if (!file_exists ( "db/pets.csv" )){

    fopen("db/pets.csv", "w");
    echo "<h1>SUCCESSFULLY CREATE PETS FILE</h1>";

}
if (!file_exists ( "db/users" )){

    fopen("db/users", "w");
    $pass = hash("sha512", "admin");
    $users[0]['login'] = "admin";
    $users[0]['passwd'] = $pass;
    $users[0]['bascket'] = array();
    $users[0]['order'] = array();
    $users = serialize($users);
    file_put_contents("db/users", $users);
    echo "<h1>SUCCESSFULLY CREATE USERS FILE</h1>";
}