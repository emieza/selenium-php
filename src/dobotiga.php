<?php

	echo "Usuari <b>".$_POST["user"]."</b> ha seleccionat els següents productes:"; 

	# Acumulem comanda en una sola línia
	$comanda = $_POST["user"].": ";

	# Imprimim la llista de productes seleccionats
	echo "<ol>\n";
	foreach ($_POST["productes"] as $producte) {
		echo "<li>$producte</li>\n";
		$comanda.= $producte.", ";
	}
	echo "</ol>\n";

	# enregistrem comanda en arxiu de disc
	$comanda.= "\n";
	$file = fopen("comanda.txt","a");
	fwrite($file, $comanda);
	fclose($file);
?>