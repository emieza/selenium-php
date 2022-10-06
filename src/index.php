<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Botiga</title>
</head>
<body>
	<form method="post" action = "dobotiga.php">
		Usuario: <input type="text" name="user"><br>
	<?php
		$products = file("productes.txt");
		foreach ($products as $product) {
			$product = trim($product);
			echo "<label for ='$product'>$product</label>\n";
			echo "<input type= 'checkbox' name='productes[]' value='$product'><br>\n";
		}

	?>
	<input type="submit" id="submit">
	</form>
</body>
</html>
