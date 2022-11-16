<?php
	//Tipo de Eleitor com passagem de parametros
	
	$idade = $_GET["idade"];
	
	
	if(!$idade) {
		echo "Idade Não Informada. Por favor, informe a idade pelo parêmetro \"idade\" via URL.";
		exit;
	}
	
	$texto = "";
	
	if($idade < 16) {
		$texto = "Não eleitor";
		$color = "#FF0000";
		$tamanho = "20px";
	}
	else {
		if(($idade >= 16 && $idade < 18) || $idade > 65) {
			$texto = "Eleitor Facultativo";
			$color = "#FFD100";
			$tamanho = "30px";
		}
		else {
			$texto = "Eleitor Obrigatório";
			$color = "#0DFF00";
			$tamanho = "40px";
		}
	}
	
	
	echo "<p style=\"color: $color; text-align: center; font-size: $tamanho;\">$texto</p>";
?>