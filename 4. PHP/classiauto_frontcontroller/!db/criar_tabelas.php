<?php
include "../conexao.php";

$sqls = array();

array_push(
  $sqls,
  "CREATE TABLE tb_usuario (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    nascimento date,
    sexo varchar(1),
    cidade varchar(100),
    uf varchar(2),
    pais varchar(50),
    email varchar(100) NOT NULL,
    telefone varchar(15) default NULL,
    senha varchar(20) NOT NULL default '',
    PRIMARY KEY  (id),
    UNIQUE(email)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
);

array_push(
  $sqls,
  "CREATE TABLE tb_categoria (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    PRIMARY KEY  (id),
    UNIQUE(nome)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
);

array_push(
  $sqls,
  "CREATE TABLE tb_marca (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    PRIMARY KEY  (id),
    UNIQUE(nome)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
);

array_push(
  $sqls,
  "CREATE TABLE tb_anuncio (
    id int NOT NULL AUTO_INCREMENT,
    id_categoria int UNSIGNED NOT NULL,
    id_usuario int UNSIGNED NOT NULL,
    id_marca int UNSIGNED NOT NULL,
    descricao text NOT NULL,
    destaque varchar(50) NOT NULL,
    preco float NOT NULL,
    foto blob,
    PRIMARY KEY (id),
    CONSTRAINT fk_anuncio_marca FOREIGN KEY (id_marca) REFERENCES tb_marca(id),
    CONSTRAINT fk_anuncio_categoria FOREIGN KEY (id_categoria) REFERENCES tb_categoria(id),
    CONSTRAINT fk_anuncio_usuario FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
);


foreach ($sqls as $sql) {
  if ($_conn->query($sql)) {
    printf("<b>Table created successfully.</b><br />");
    printf("<pre>$sql</pre>");
  }
  if ($_conn->errno) {
    printf("<b>Could not create table.</b><br />");
    printf("%s", $_conn->error);
  }
  echo "<hr/>";
}

exit;

$_conn->close();
