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

$id = $_REQUEST['id'];

// Conteúdo de resposta para o cliente
$responseBody = '';

if (!$id) {
    http_response_code(400);
    $responseBody = '{ "message:" "ID não informado"}';
} else {
    $qtd = $categoriaDAO->delete($id);
    if ($qtd == 0) {
        $responseBody = '{ "message": "ID não existe"}';
    }
}

// Inserir o usuário no banco de dados
$categoria = $categoriaDAO->delete($id);
$responseBody = json_encode($categoria); // Transformar em categoria JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>