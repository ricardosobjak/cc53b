<?php

require_once('../auth/validate-jwt.inc.php');
//print_r($userAuth);


require_once('../auth/validate-jwt.inc.php');

if (!isset($token)) {
    http_response_code(401);
    $responseBody = '{ "message": "Sem token" }';
    exit;
}

$userIdToUpdate = $_GET["id_usuario"] ?? null;

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

$id = $_REQUEST['id'];

// Conteúdo de resposta para o cliente
$responseBody = '';

if (!$id) {
    http_response_code(400);
    $responseBody = '{ "message:" "ID não informado"}';
} else {
    $qtd = $compraDAO->delete($id);
    if ($qtd == 0) {
        $responseBody = '{ "message": "ID não existe"}';
    }
}

// Inserir o usuário no banco de dados
$compra = $compraDAO->delete($id);
$responseBody = json_encode($compra); // Transformar em compra JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>