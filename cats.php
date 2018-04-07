<?php
session_start();
$fd = fopen("./data/pets.csv", 'r');
$data = get_data($fd);
?>
<html>
<head>
	<title>PetShop - Cats</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('header.php');
		foreach ($data as $pet) {
			echo $pet[0] . "<br>";
		}
	?>
</body>
</html>