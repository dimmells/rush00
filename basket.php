<?php
include "index.php";

if (!$_SESSION['loged_on_user']){
    echo "BASKET ONLY FOR SIGNED USER";
}
function get_data($fd)
{
$data = array();
$i = 0;
while (($data[$i] = fgetcsv($fd)) != NULL)
    $i++;
foreach ($data as &$player_information) {
    if ($player_information[0] === NULL)
        $player_information = NULL;
    else
        $player_information = explode(";", $player_information[0]);
}
$data = array_filter($data);

    return ($data);
}
function get_user()
{

  $users = file_get_contents("./db/users");
  $users = unserialize($users);
  foreach ($users as $key => $value) {
      if ($_SESSION['loged_on_user'] === $users[$key]['login']) {
          return ($users[$key]);
      }
  }
  return (NULL);
}

$user = get_user();
if ($user == NULL) {
    echo "BASKET ONLY FOR SIGNED USER";
}
$fd = fopen("./db/pets.csv", 'r');
$data = get_data($fd);
//print_r($db);
//echo "??????".PHP_EOL;
fclose($fd);


function find_item($name, $data)
{
    foreach ($data as $key => $value) {
        //echo $db[$key][1].PHP_EOL;
        if ($data[$key][1] == $name){
           // echo "OK";
            return ($data[$key]);
        }
    }
    return (NULL);
}
//print_r($user['bascket']);
?>


<!doctype html>
<html lang="en">
<head>
    <title>Basket</title>
    <meta charset="utf-8">

</head>
<body>
<div class="container">
    <div class="all">

        <?php
            if (key_exists("item_dec", $_POST) || key_exists("item_acc", $_POST)){
                header("Refresh:3 index.php");
            }
            if ($user['bascket']){
                $summ = 0;
            foreach ($user['bascket'] as $key => $value) {
            $item = find_item($value, $data);
            ?>
            <div class="item">
                <?php echo "<div class=\"name\">Name".$item[1]."</div>"; ?>
                <?php echo "<img class=\"image\" src = 'img/".$item[3]."'>"; ?>
                <?php echo "<div class=\"age\">Category: ".$item[0]."</div>"; ?>
                <?php echo "<div class=\"age\">Age: ".$item[2]."</div>"; ?>
                <?php echo "<div class=\"club\">Coast: ".$item[4]."</div>"; ?>
                <?php echo "<div class=\"cost\">Cost: ".$item[5]."</div>"; ?>
                <form action="edit_bascket.php" method="POST">

        <?php
            $summ += $item[5];

            }?>
                <input type="hidden" name="item" value="<?php echo $item[1];?>">
                    <input type="submit" class="adm_edit_item" name="item_dec" value="Cancel">
                    <input type="submit" class="adm_edit_item" name="item_acc" value="Accept">
                </form>
            </div>
                <?php
            echo "<h1 style='text-align: left'>TOTAL COST:".$summ."</h1>";
            }else{
                echo "<h1 style='text-align: center'>YOU have not ordered yet or you send order to execute</h1>";
            }

            ?>
    </div>
</div>
</body>
</html>
