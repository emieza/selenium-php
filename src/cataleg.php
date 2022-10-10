<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cataleg</title>
	<style type="text/css">
		td{
			border-bottom: 2px solid black;
		}

	</style>
</head>
<body>
	<h1>CATÀLEG</h1>
	<table>
		<?php
		$products = file("productes.txt");
		foreach ($products as $product) {
			$product = trim($product);
			echo "<tr>";
			foreach (explode(";", $product) as $atributos) {
				echo "<td> $atributos</td>";
			}
			echo "</tr>";
		}

	?>
	</table>
	

</body>
</html>