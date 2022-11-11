<?php
    // Variáveis
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_classiauto';
    $port = 3306;

    // Faz a conexão com o DB e 
    // armazena na variável $_conn
    //$_conn = mysqli_connect($host, $user, $pass, $db, $port) 
    //    or die('Erro ao estabelecer conexão 
    //    com o banco de dados');

    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port", 
        $user, $pass);