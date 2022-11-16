<?php
  $user = "root";
  $pass = "";
  $host = "localhost";
  $db = "db_classiauto";

  // Conectar ao Banco de dados
  #$_conn = mysqli_connect($host, $user, $pass, $db);
  $_conn = mysqli_connect($host, $user, $pass) 
    or die("Erro estabelecer conexão com o banco de dados");
  
  // Selecionar um banco de dados
  mysqli_select_db($_conn, $db);
?>