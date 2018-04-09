<?php
include "../menu/menu.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin panel "PETS market - Add Pet"</title>
    <meta charset="utf-8">
</head>
<body>
<br>
    <form action="add_pet.php" method ="post">
        <span>category</span>
        <select name="category">
            <option value="cats">Cats</option>
            <option value="dogs">Dogs</option>
        </select>
        <br>
        <span>name</span>
        <input type="text" name="name" placeholder="name" value="">
        <br>
        <span>age</span>
        <input type="text" name="age" placeholder="age" value="">
        <br>
        <span>img</span>
        <input type="file" name="img">
        <br>
        <span>caste</span>
        <input type="text" name="caste" placeholder="caste" value="">
        <br>
        <span>price</span>
        <input type="text" name="price" placeholder="price" value="">
        <br>
        <input type="submit" name="submit" value="Add This Pet">
    </form>
</body>
</html>