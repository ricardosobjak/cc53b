<?php

require_once('../auth/validate-jwt.inc.php');
//print_r($userAuth);

if (!@$userAuth["admin"]) {
    print_r("nao é admin");
    exit;
}

// Abrir a conexão
require_once('../db/connection.inc.php');
require_once('categoria.dao.php');

// Insanciar o DAO
$categoriaDAO = new categoriaDAO($pdo);

// Conteúdo de resposta para o cliente
$responseBody = '';

//obtendo o parâmetro id vindo pela URP da requisição
$id = $_REQUEST["id"];

if (!$id) {
    $respondeBody = '{"message": "Usuário não informado"}';
    http_response_code(404);
} else {
    // Receber os dados do cliente
    $json = file_get_contents('php://input');

    // Criar um objeto apartir do JSON
    $categoria = json_decode($json);

    // Inserir o usuário no banco de dados
    $categoria = $categoriaDAO->update($id, $categoria);
    $responseBody = json_encode($categoria); // Transformar em categoria JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>