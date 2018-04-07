<?php
session_start();
$fd = fopen("./data/pets.csv", 'r');
$data = get_data($fd);
?>
<html>
<head>
	<title>PetShop - Dogs</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<?php include('header.php'); ?>
	<div class="list">
		<div class="item">
			<img class="item_img" src="./img/4.jpg">
			<label>Name: Karl</label><br>
			<label>Age: 3</label><br>
			<label>Caste: "some caste"</label><br>
			<label>Price: 2000UAN</label>
			<form action="add_to_bascket" method="post">
				<button type="button" value="atb">Buy</button>
			</form>
		</div>
		<hr>
		<div class="item">
			<img class="item_img" src="./img/4.jpg">
			<label>Name: Karl</label><br>
			<label>Age: 3</label><br>
			<label>Caste: "some caste"</label><br>
			<label>Price: 2000UAN</label>
			<form action="add_to_bascket" method="post">
				<button type="button" value="atb">Buy</button>
			</form>
		</div>
		<hr>
		<div class="item">
			<img class="item_img" src="./img/4.jpg">
			<label>Name: Karl</label><br>
			<label>Age: 3</label><br>
			<label>Caste: "some caste"</label><br>
			<label>Price: 2000UAN</label>
			<form action="add_to_bascket" method="post">
				<button type="button" value="atb">Buy</button>
			</form>
		</div>
	</div>
</body>
</html>