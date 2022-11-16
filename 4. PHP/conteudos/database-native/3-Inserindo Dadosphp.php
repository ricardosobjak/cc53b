<?php
	include "conexao.php";
	
	//Relizando consultas
	
	$sql = "
		INSERT 
		  INTO tb_usuario (nome, nascimento, sexo, cidade, uf, pais, email, telefone, celular, senha) 
		  VALUES (
			'Tuco', '1978-09-12', 'M', 'Palmital', 'PR', 'Brasil', 'tuco@gmail.com', '','','1234'
		  )
	";
	

	$result = mysqli_query($_conn, $sql);
?>