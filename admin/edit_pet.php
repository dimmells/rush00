<?php
session_start();

include"../menu/menu.php";


function find_item($info, $str, &$m)
{
    foreach ($info as $key => $val)
    {
        if ($val[1] === $str)
        {
            $m = $key;
            return (1);
        }
    }
    return(0);
}

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
  $info = array_filter($info);
  return ($info);
}

if (!isset($_POST['name']) && !isset($_POST['DELETE']))
{
  header( "Refresh: 3; admin_panel.php" );
    echo "You haven't chosen this pet!";
}
else 
{
?>
<head>
    <title>Admin Pet Edit</title>
</head>
<body>
<?php
  if ($_POST['action'] === "Edit")
  {
    $fd = fopen("../db/pets.csv", 'r');
    $info = get_info($fd);

$key = 0;
find_item($info, $_POST['name'], $key);
if ($key >= 0)
    $info = $info[$key];
?>
    <div class="all">
        <div class="page_item">
      <form action="edit_pet.php" method="POST">
          <?php echo "Name:".$info[1].""; ?> </br>
          <?php echo "<img class=\"images\" src = '../img/".$info[3]."' width=200 height=200>"; ?> </br>
          <?php echo "Age: ".$info[2].""; ?> </br> 
          <?php echo "Price:".$info[5].""; ?> </br>
          <?php echo "Category:".$info[0].""; ?> </br>
          <?php echo "Caste:".$info[4].""; ?> </br>
      </form>
       </div>

    <div class="edit_form">

          <form class="form_adm" action="edit_pet.php" method ="post">
              <span>category</span>
              <select name="category">
                  <option value="cats">Cats</option>
                  <option value="dogs">Dogs</option>
              </select>
              <br>
              <span>name</span>
              <input type="text" name="new_name" placeholder="name" value="">
              <br>
              <span>img</span>
              <input type="file" name="img">
              <br>
              <span>age</span>
              <input type="text" name="age" placeholder="age" value="">
              <br>
              <span>price</span>
              <input type="text" name="price" placeholder="price" value="">
              <br>
              <span>caste</span>
              <input type="text" name="caste" placeholder="caste" value="">
              <br>
              <input type="hidden" name="old_name" value='"<?php echo $info[1]?>"'>
            <input class="loginformbutton" type="submit" name="submit" value="ACCEPT">
          </form>
    <div>
    </div>
    <?php
}
else if ($_POST['action'] == "Remove")
{
    $fd = fopen("../db/pets.csv", 'r');
    print($fd);
    $info = get_info($fd);
    $name =  str_replace('"',"", $_POST['name']);
    $k = 0;
    var_dump($name);
    find_item($info, $name, $k);
    echo "key".PHP_EOL;
    var_dump($k);
    unset($info[$k]);
    sort($info);
    $fd = fopen("../db/pets.csv", 'w+');
    $i = 0;
    while ($i < count($info))
    {
        if (!fputcsv($fd, $info[$i],";"))
          echo "The problem with writing in this file occurred!";
        $i++;
    }
   header( "Refresh: 2; admin_panel.php" );
    echo "The pet has been deleted";
}
    }
    ?>
</body>
</html>
