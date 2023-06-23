<?php

require_once('../auth/validate-jwt.inc.php');

if (!isset($token)) {
    http_response_code(401);
    $responseBody = '{ "message": "Sem token" }';
    exit;
}

$userIdToUpdate = $_GET["id_usuario"] ?? null; //  Verifica se o valor da expressão à esquerda é nulo ou indefinido.

if (!(@$userAuth["admin"] || (isset($userAuth["id"]) && $userAuth["id"] == $userIdToUpdate))) {
    http_response_code(403);
    $responseBody = '{ "message": "Acesso negado" }';
    exit;
}


// Abrir a conexão
require_once('../db/connection.inc.php');
require_once('compra.dao.php');

// Insanciar o DAO
$compraDAO = new compraDAO($pdo);

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
    $compra = json_decode($json);

    // Inserir o usuário no banco de dados
    $compra = $compraDAO->update($id, $compra);
    $responseBody = json_encode($compra); // Transformar em compra JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>