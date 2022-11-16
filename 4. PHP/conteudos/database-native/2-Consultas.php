<?php
	require_once('conexao.php');

	//Realizando consultas
	
	$sql = "SELECT * FROM tb_usuario";
	
	//Realiza uma consulta no Banco de Dados MySql
	$result = mysqli_query($_conn, $sql);
	
	
	//Imprime a quantidade de tuplas encontradas na execucao da query
	echo "<b>Quantidade encontrada</b>: " .  mysqli_num_rows($result);
	
	
	
	echo "<br/><br/><b>Lendo Dados com a função mysqli_fetch_row</b><br/>";
	//Pegando apenas um resultado de uma linha e coluna
	//echo mysqli_result($result, 0, "nome");
	

	
	
	
	echo "<br/><br/><b>Lendo Dados com a função mysql_fetch_row</b><br/>";
	
	//Realiza uma consulta no Banco de Dados MySql
	$result = mysqli_query($_conn, $sql);
	
	//Loop para ler os resultados com a fun��o mysql_fetch_row
	while($usuario = mysqli_fetch_row($result)) {
		print $usuario[1];
		print "<br/>";
	}
	
	
	
	
	
	
	
	
	
	echo "<br/><br/><b>Lendo Dados com a função mysql_fetch_array</b><br/>";
	
	//Realiza uma consulta no Banco de Dados MySql
	$result = mysqli_query($_conn, $sql);
	
	//Loop para ler os resultados com a fun��o mysql_fetch_array
	while($usuario = mysqli_fetch_array($result)) {
		print $usuario["nome"];
		print "<br/>";
	}

	?>