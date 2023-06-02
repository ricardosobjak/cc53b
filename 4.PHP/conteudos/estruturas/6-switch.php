<?php
	$opcao = $_GET["opcao"];
	
	
	echo "[1] Frase<br/>";
	echo "[2] Piada<br/>";
	echo "[3] Provérbio";
	
	
	echo "<br/><br/><br/>";
	
	switch($opcao) {
		case 1 : {
			echo "Começe onde está, Use o que você tem, Faça o que você pode!";
			break;
		}
		case 2 : {
			echo "Qual é o animal que não vale mais nada? R.:O javali!";
			break;
		}
		case 3 : {
			echo "Gato escaldado tem medo de água fria.";
			break;
		}
		default : {
			echo "Opção Inválida ou não informada";
		}
	}
?>