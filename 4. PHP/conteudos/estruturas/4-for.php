<?php
	//TABUADA
	
	$tabuada = $_GET["tabuada"];
	
	
	if(!$tabuada) {
		echo "Tabuada não Informada. Por favor, informe a tabuada pelo parâmetro \"tabuada\" via URL.";
		exit;
	}
	
	echo "Tabuada do: " . $tabuada;
	echo "<br/>";

	for($i=0; $i<=10; $i++) {
		echo "<br/>";
		echo "$tabuada X $i = " . ($tabuada * $i);
	}
?>