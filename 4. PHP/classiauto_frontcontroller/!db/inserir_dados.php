<?php
include "../conexao.php";

$sqls = array();

/**
 * SQL para inserir algumas categorias
 */
array_push(
  $sqls,
  "INSERT INTO tb_categoria (nome) VALUES ('Carro'), ('Moto'), ('Caminhão'), ('Barco'), ('Aeronave');"
);

/**
 * SQL para inserir algumas Marcas
 */
array_push(
  $sqls,
  "INSERT INTO tb_marca (nome) VALUES ('Chevrolet'), ('Volkswagen'), ('Fiat'), ('Ford'), ('Honda'), ('Toyota'), ('BMW'), ('Yamaha');"
);

foreach ($sqls as $sql) {
  if ($_conn->query($sql)) {
    printf("<b>SQL executada com sucesso.</b><br />");
    printf("<pre>$sql</pre>");
  }
  if ($_conn->errno) {
    printf("<b>Falha ao executar SQL.</b><br />");
    printf("%s", $_conn->error);
  }
  echo "<hr/>";
}

exit;

$_conn->close();
