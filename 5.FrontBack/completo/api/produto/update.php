<?php

require_once('../auth/validate-jwt.inc.php');
//print_r($userAuth);

if (!@$userAuth["admin"]) {
    print_r("nao é admin");
    exit;
}

// Abrir a conexão
require_once('../db/connection.inc.php');
require_once('produto.dao.php');

// Insanciar o DAO
$produtoDAO = new produtoDAO($pdo);

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
    $produto = json_decode($json);

    // Inserir o usuário no banco de dados
    $produto = $produtoDAO->update($id, $produto);
    $responseBody = json_encode($produto); // Transformar em produto JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>