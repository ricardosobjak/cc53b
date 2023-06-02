<?php
	//Se der sol, entao eu vou na piscina
	
	$clima = "sol";
	
	if($clima == "sol")
		echo "Hoje tem sol, piscina liberada!";
	else
		echo "Piscina não liberada, porque não tem sol!";
		
	
	
	echo "<br/><br/>";
	//---------------------------------------------------------
	
	//Tipo de Eleitor
	
	$idade = 18;
	
	if($idade < 16)
		echo "Não eleitor";
	else
		if(($idade >= 16 && $idade < 18) || $idade > 65)
			echo "Eleitor Facultativo";
		else
			echo "Eleitor Obrigatório";
?>