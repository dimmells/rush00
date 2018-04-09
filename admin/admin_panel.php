<?php
session_start();

include "../menu/menu.php";

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

$fd = fopen("../db/pets.csv", 'r');;
$info = get_info($fd);
?>

<!doctype html>
<head>
    <title>Admin panel pets</title>
    <link rel="stylesheet" type="text/css" href="test.css" <?php echo time(); ?>
</head>
<body>
<div class="menu">
    <div class = "title"> Our Pets</div>
    <div class="all pets">
        <?php
        $i = 0;
        if ($info){
        foreach ($info as &$dogs) { ?>
            <div class="pets">
                <form action="edit_pet.php" method="POST">
                    <?php echo "".$dogs[1]."<label for=\"$i\"><input type='radio' id='".$i."' name='name' value='".$dogs[1]."'></label>";?> </br>
                    <?php echo "<img class=\"images\" src = '../img/".$dogs[3]."' width=200 height=200>"; ?> </br>
                    <?php echo "Age: ".$dogs[2].""; ?> </br>
                    <?php echo "Price: ".$dogs[5].""; ?> </br>
                    <?php echo "Caste: ".$dogs[4].""; ?> </br>
                    <input type="submit" class="item" name="action" value="Edit">
                    <input type="submit" class="item" name="action" value="Remove">
                </form>
                <hr>
            </div>
            <?php
            $i++;
        } }
        else{
           echo "<h1 style='text-align: center'>NOT ADDED YET</h1>";

        }?>
    </div>
</div>
</body>
</html>

