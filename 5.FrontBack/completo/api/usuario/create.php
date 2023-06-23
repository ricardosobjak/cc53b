<?php
    // Abrir a conexão
    require_once('../db/connection.inc.php');
    require_once('usuario.dao.php');

    // Insanciar o DAO
    $usuarioDAO = new usuarioDAO($pdo);
    
    // Receber os dados do cliente
    $json = file_get_contents('php://input');

    // Criar um objeto apartir do JSON
    $usuario = json_decode($json);

    // Conteúdo de resposta para o cliente
    $responseBody = '';

    // Inserir o usuário no banco de dados
    $usuario = $usuarioDAO->insert($usuario);
    $responseBody = json_encode($usuario); // Transformar em usuario JSON
   
    // Gerar a resposta para o cliente
    header("Content-type: application/json");
    print_r($responseBody);

?>