<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PetShop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('header.php');
//        var_dump($_SESSION);
    ?>
	<div>
		<div class="sldr-holder">
	    	<span id="sldr-img-1"></span>
	    	<span id="sldr-img-2"></span>
	    	<span id="sldr-img-3"></span>
	    	<div class="img-holder">
	     		<img src="img/1.jpg" class="sldr-img" />
	     		<img src="img/2.jpg" class="sldr-img" />
	           	<img src="img/3.jpg" class="sldr-img" />
	       </div>
	       <div class="button-holder">
	           <a href="#sldr-img-1" class="sldr-change-1"></a>
	           <a href="#sldr-img-2" class="sldr-change-2"></a>
	           <a href="#sldr-img-3" class="sldr-change-3"></a>
	    	</div>
   		</div>
	</div>
</body>
</html>