<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="carro.php" method="post">
		<?php
		$products = file("productes.txt");
		echo "<select name='selectProduct'><option selected></option>";
		foreach ($products as $product) {
			$product = explode(";", trim($product));
				echo "<option>$product[0]</option>";
		}
		echo "</select>";
	?>
	<input type="number" name="quantitat">
	<input type="submit" value="enviar">
	</form>
	
</body>
</html>