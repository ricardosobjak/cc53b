<?php
	include "conexao.php";

	$sql = "CREATE TABLE tb_usuario (
		  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		  nome varchar(255) NOT NULL default '',
		  nascimento date default NULL,
		  sexo varchar(1) default NULL,
		  cidade varchar(100) default NULL,
		  uf varchar(2) default NULL,
		  pais varchar(50) default NULL,
		  email varchar(100) NOT NULL default '',
		  telefone varchar(15) default NULL,
		  celular varchar(15) default NULL,
		  senha varchar(20) NOT NULL default '',
		  PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
	";
	
	if($_conn->query($sql)) {
		printf("Table tb_usuario created successfully.<br />");
	}
	if ($_conn->errno) {
		printf("Could not create table: %s<br />", $_conn->error);
	}
	$_conn->close();

?>
