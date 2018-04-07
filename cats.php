<?php
session_start();
$fd = fopen("./data/pets.csv", 'r');
$data = array();
$i = 0;
while (($data[$i] = fgetcsv($fd)) != NULL)
$i++;
foreach ($data as &$pet) {
if ($pet[0] === NULL)
  $pet = NULL;
else
  $pet = explode(";", $pet[0]);
}
$data = array_filter($data);
?>
<html>
<head>
	<title>PetShop - Cats</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="list">
		<?php foreach ($data as $pet) {
			if ($pet[0] === "Cat") {
		?>
		<div class="item">
		<?php echo "<img class=\"item_img\" src=\"./img/" . $pet[3] . "\">"; ?>
		<?php echo "<label>Name: " . $pet[1] . "</label><br>"; ?>
		<?php echo "<label>Age: " . $pet[2] . "</label><br>"; ?>
		<?php echo "<label>Caste: " . $pet[4] . "</label><br>"; ?>
		<?php echo "<label>Price: " . $pet[5] . "</label>"; ?>
		<form action="add_to_bascket" method="post">
		<button type="button" value="atb">Buy</button>
		</form>
		</div>
		<hr>
		<?php }} ?>
	</div>
</body>
</html>