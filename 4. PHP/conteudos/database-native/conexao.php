<?php
	$user = "root";       //Variável contendo o nome do usuário do MySql
	$pass = "";           //Variável contendo a senha do usuário
	$host = "localhost";  //Variável contendo o endereço do servidor
	$db   = "teste";      //Nome do Banco de Dados
	
	global $_conn;               //Identificador da Conexao
	
	
	//Conectando-se ao servidor MySql
	$_conn = new mysqli($host, $user, $pass, $db);// or die("Erro na Conexão com o banco de Dados");
	
	//Selecinando a Base de dados que será utilizada
	mysqli_select_db($_conn, $db);
?>