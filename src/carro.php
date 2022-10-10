<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carro Compra</title>
</head>
<body>
	<?php
	//unset($_SESSION['carro']);
	$carro = [];

	if (isset($_SESSION['carro'])) {
		$carro = $_SESSION['carro'];
	}

	if (!empty($_POST['selectProduct'])) {
		$producte = $_POST['selectProduct'];
		$quantitat = $_POST['quantitat'];
		if ($quantitat > 0) {
			$carro[$producte]= $quantitat;
			$_SESSION['carro'] = $carro;
		}
	}
	echo "<ul>";
	foreach ($carro as $prod => $quant) {
		echo "<li>nom: $prod - quantitat: $quant </li>";

	}
	echo "</ul>";

	?>
	<a href="tria_producte.php">Afegir Producte</a>
</body>
</html>