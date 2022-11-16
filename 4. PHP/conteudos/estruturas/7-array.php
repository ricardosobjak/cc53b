<?php
	//Instanciação de Array com o método array()
	echo "<b>[EXEMPLO DE ARRAY 1]</b>";
	echo "<br/><br/>";
	
	$frutas = array("Maçã", "Banana", "Melão", "Melancia", "Abacate", "Jaca", "Pera"); //Atribuindo valores para o array
	
	foreach($frutas as $fruta) { 	//Laço de Repetição, percorre o array $frutas 
		echo $fruta . "<br/>";
	}
	
	array_push($frutas, "Amora");     //Adicionando valor no final do array
	array_push($frutas, "Abacaxi");		//Adicionando valor no final do array
	array_push($frutas, "Morango");		//Adicionando valor no final do array
	
	echo "<br/><br/>";
	
	for($i=0; $i<sizeof($frutas); $i++) {
		echo $i . " - ". $frutas[$i] . "<br/>";
	}
		
	
	
	
	
	//Array com Chave Numérica
	
	echo "<br/>---------------------------------------<br/>";
	echo "<b>[EXEMPLO DE ARRAY 2]</b>";
	echo "<br/><br/>";
		
	$cores[0] = "Amarelo";		//Atribuindo valor para o array
	$cores[1] = "Verde";		//Atribuindo valor para o array
	$cores[2] = "Azul";			//Atribuindo valor para o array
	$cores[3] = "Vermelho";		//Atribuindo valor para o array
	$cores[4] = "Marrom";		//Atribuindo valor para o array
	$cores[5] = "Preto";		//Atribuindo valor para o array
	$cores[6] = "Laranja";		//Atribuindo valor para o array
	$cores[7] = "Roxo";			//Atribuindo valor para o array
	$cores[8] = "Rosa";			//Atribuindo valor para o array

	echo "Este array contém " . count($cores) . " cores!<br/><br/>";

	echo "<br/><b>Array Desordenado: </b><br/><br/>";
	foreach($cores as $cor) {
		echo $cor . "<br/>";
	}
	
	sort($cores);   //Ordenando o Array em ordem crescente

	echo "<br/><b>Array Ordenado (Crescente): </b><br/><br/>";
	foreach($cores as $cor) {
		echo $cor . "<br/>";
	}
	
	rsort($cores);   //Ordenando o Array em ordem decrescente

	echo "<br/><b>Array Ordenado (Decrescente): </b><br/><br/>";
	foreach($cores as $cor) {
		echo $cor . "<br/>";
	}
	








	//Array com chave de STRING
	
	echo "<br/>---------------------------------------<br/>";
	echo "<b>[EXEMPLO DE ARRAY 3]</b>";
	echo "<br/><br/>";
	
	$arrayMisto["nome"] = "Juca da Silva";	//Atribuindo valor para o array
	$arrayMisto["idade"] = 32;				//Atribuindo valor para o array
	$arrayMisto["endereco"] = "Rua Acre";	//Atribuindo valor para o array
	$arrayMisto["numero"] = "1233";			//Atribuindo valor para o array
	$arrayMisto["cidade"] = "Medianeira";	//Atribuindo valor para o array
	$arrayMisto["uf"] = "PR";				//Atribuindo valor para o array
	$arrayMisto["cep"] = "85884-000";		//Atribuindo valor para o array
	
	echo "Este array contém " . sizeof($arrayMisto) . " itens!<br/><br/>";
	
	foreach(array_keys($arrayMisto) as $obj ) {
		echo $obj . ": " . $arrayMisto[$obj] . "<br/>";
	}











	//CONCATENAÇÃO DE ARRAYS
	
	echo "<br/>---------------------------------------<br/>";
	echo "<b>[EXEMPLO DE ARRAY 4] - Concatenação de Arrays</b>";
	echo "<br/><br/>";

	$arrayConcatenado = array_merge($cores, $frutas);

	echo "<br/><b>Array Concatenado (Cores + Frutas): </b><br/><br/>";
	foreach($arrayConcatenado as $obj) {
		echo $obj . "<br/>";
	}
