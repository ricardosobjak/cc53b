<?php
	//Tipo de Eleitor com passagem de parametros
	
	$idade = $_GET["idade"];
	
	
	if(!$idade) {
		echo "Idade Não Informada. Por favor, informe a idade pelo parâmetro \"idade\" via URL.";
		exit;
	}
	
	if($idade < 16)
		echo "Não eleitor";
	else
		if(($idade >= 16 && $idade < 18) || $idade > 65)
			echo "Eleitor Facultativo";
		else
			echo "Eleitor Obrigatório";
?>